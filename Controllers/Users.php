<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    // Method to handle user registration
    public function register()
    {
        $data = [];
        helper(['form']);
    
        if ($this->request->getMethod() == 'post') {
            // Validation rules for registration form
            $rules = [
                'firstname' => 'required|min_length[3]|max_length[20]',
                'lastname' => 'required|min_length[3]|max_length[20]',
                'email' => 'required|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[8]|max_length[255]',
                'password_confirm' => 'matches[password]',
            ];
    
            // Custom error messages for validation
            $messages = [
                'password_confirm' => [
                    'matches' => 'The password confirmation does not match.',
                ],
            ];
    
            // Validating the form input
            if (!$this->validate($rules, $messages)) {
                $data['validation'] = $this->validator; // Capture validation errors
            } else {
                // Generate verification token
                $verificationToken = bin2hex(random_bytes(16));
                log_message('info', 'Generated verification token: ' . $verificationToken);
    
                // Prepare data for insertion
                $newData = [
                    'firstname' => $this->request->getVar('firstname'),
                    'lastname' => $this->request->getVar('lastname'),
                    'email' => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password'), // Will be hashed automatically
                    'verification_token' => $verificationToken,
                    'email_verified' => 0,
                ];
    
                $model = new UserModel();
    
                // Insert new user data into database
                if ($model->insert($newData)) {
                    // Send verification email
                    $this->sendVerificationEmail($newData['email'], $verificationToken);
    
                    // Set flash message for successful registration
                    return redirect()->to('register_success'); // Redirect to the success page
                }
            }
        }
    
        // Load the registration view with validation errors or success message
        echo view('templates/header', $data);
        echo view('register', $data);
        echo view('templates/footer', $data);
    }
    
    public function success()
    {
        $data = []; // Initialize the $data array to avoid the "undefined variable" error
        
        // Display the registration success message
        echo view('templates/header', $data);
        echo view('register_success', $data); // This is the confirmation view
        echo view('templates/footer', $data);
    }

    
    // Method to send verification email
    private function sendVerificationEmail($emailAddress, $verificationToken)
    {
        $emailConfig = config('Email'); // Load email configuration from config/Email.php

        // Email message content
        $message = "Hello,\n\n";
        $message .= "Please click on the following link to verify your email:\n";
        $message .= site_url('verify-account/' . $verificationToken); // Generates the full URL for verification

        // Initialize email service
        $email = \Config\Services::email();
        $email->initialize($emailConfig);
        $email->setFrom($emailConfig->fromEmail, $emailConfig->fromName); // Set sender's email and name
        $email->setTo($emailAddress); // Set recipient's email address
        $email->setSubject('Account Verification'); // Email subject
        $email->setMessage($message); // Email message

        // Attempt to send the email
        if (!$email->send()) {
            // Handle email sending failure
            log_message('error', 'Failed to send verification email to ' . $emailAddress . '. Error: ' . $email->printDebugger(['headers']));
        } else {
            // Log successful email sending
            log_message('info', 'Verification email sent to ' . $emailAddress);
        }
    }

    // Method to verify user account via verification token
    public function verifyAccount($token)
    {
        $model = new UserModel();
        $user = $model->where('verification_token', $token)->first();

        if ($user) {
            // Update user to set email_verified to 1 and clear verification token
            $model->update($user->id, ['email_verified' => 1, 'verification_token' => null]);
            log_message('info', 'Email verified for user ID: ' . $user->id);

            return redirect()->to('login')->with('success', 'Email verification successful. You can now log in.');
        } else {
            log_message('error', 'Invalid verification token: ' . $token);
            return redirect()->to('login')->with('error', 'Invalid verification link.');
        }
    }

    // Method to handle user login
    public function login()
    {
        helper(['form']);
        $data = [];
    
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'email' => 'required|valid_email',
                'password' => 'required|min_length[8]',
            ];
    
            if ($this->validate($rules)) {
                $model = new UserModel();
                $email = $this->request->getVar('email');
                $password = $this->request->getVar('password');
    
                $user = $model->where('email', $email)->first();
    
                if ($user) {
                    // Check if the user's email is verified
                    if ($user->email_verified == 0) {
                        $data['error'] = 'Please verify your email address first.';
                    } else {
                        // Verify the password
                        if (password_verify($password, $user->password)) {
                            // Set user session upon successful login
                            $this->setUserSession($user);
    
                            return redirect()->to('dashboard'); // Redirect to dashboard upon successful login
                        } else {
                            $data['error'] = 'Invalid email or password';
                        }
                    }
                } else {
                    $data['error'] = 'Invalid email or password';
                }
            } else {
                $data['validation'] = $this->validator;
            }
        }
    
        // Load login view with data (errors or validation messages)
        echo view('templates/header', $data);
        echo view('login', $data);
        echo view('templates/footer', $data);
    }
    
    // Method to set user session upon successful login
    private function setUserSession($user)
    {
        // Session data to store user information
        $userData = [
            'id' => $user->id,
            'firstname' => $user->firstname,
            'lastname' => $user->lastname,
            'email' => $user->email,
            'isLoggedIn' => true,
        ];

        // Set session
        session()->set($userData);
    }

    // Method to display welcome page after login
    public function dashboard()
    {
        // Check if user is logged in
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('login'); // Redirect to login page if not logged in
        }

        // Load dashboard view (replace with your actual dashboard view)
        echo view('templates/header');
        echo view('dashboard');
        echo view('templates/footer');
    }

    // Password reset request method
    public function resetPasswordRequest()
    {
        helper(['form']);
        $data = [];
        
        // When the form is submitted via POST
        if ($this->request->getMethod() == 'post') {
            // Validation rules for reset password request form
            $rules = [
                'email' => 'required|valid_email',
            ];
        
            if ($this->validate($rules)) {
                $model = new UserModel();
                $email = $this->request->getVar('email');
                $user = $model->where('email', $email)->first();
        
                if ($user) {
                    // Generate a unique reset token
                    $resetToken = bin2hex(random_bytes(16));
                    log_message('info', 'Generated password reset token: ' . $resetToken);
        
                    // Prepare the data for updating the user record
                    $dataToUpdate = [
                        'reset_token' => $resetToken,
                        'reset_token_expiry' => date('Y-m-d H:i:s', strtotime('+2 hour')),
                    ];
                    log_message('info', 'Reset Token Expiry Date: ' . $dataToUpdate['reset_token_expiry']);
        
                    // Save the reset token to the database
                    $model->update($user->id, $dataToUpdate);
        
                    // Send password reset email
                    $this->sendResetPasswordEmail($user->email, $resetToken);
        
                    // Redirect to success page
                    return redirect()->to('reset-password-request-success')->with('success', 'Please check your email for password reset instructions.');
                } else {
                    $data['error'] = 'Email not found in our records.';
                }
            } else {
                $data['validation'] = $this->validator;
            }
        }
        
        // Load the reset password request view
        echo view('templates/header', $data);
        echo view('reset_password_request', $data);
        echo view('templates/footer', $data);
    }
    
    public function resetPasswordRequestSuccess()
    {
        $data = [];
    
        // Display the reset password request success page
        echo view('templates/header', $data);
        echo view('reset_password_request_success', $data); // This is your success view
        echo view('templates/footer', $data);
    }
    


    private function sendResetPasswordEmail($emailAddress, $resetToken)
    {
        $emailConfig = config('Email');

        $message = "Hello,\n\n";
        $message .= "Please click on the following link to reset your password:\n";
        $message .= site_url('reset-password/' . $resetToken); // Generates the full URL for reset password

        $email = \Config\Services::email();
        $email->initialize($emailConfig);
        $email->setFrom($emailConfig->fromEmail, $emailConfig->fromName);
        $email->setTo($emailAddress);
        $email->setSubject('Password Reset Request');
        $email->setMessage($message);

        if (!$email->send()) {
            log_message('error', 'Failed to send password reset email to ' . $emailAddress . '. Error: ' . $email->printDebugger(['headers']));
        } else {
            log_message('info', 'Password reset email sent to ' . $emailAddress);
        }
    }

    // Reset password method
    public function resetPassword($token)
    {
        helper(['form']);
        $data = [];
        
        // Fetch the user by reset token
        $model = new UserModel();
        $user = $model->where('reset_token', $token)
                     ->where('reset_token_expiry >', date('Y-m-d H:i:s')) // Ensure the expiry check is correct
                     ->first();
        
        if (!$user) {
            return redirect()->to('login')->with('error', 'Invalid or expired reset token.');
        }
        
        if ($this->request->getMethod() == 'post') {
            // Validation rules for password reset form
            $rules = [
                'password' => 'required|min_length[8]',
                'password_confirm' => 'matches[password]',
            ];
        
            if ($this->validate($rules)) {
                // Hash the new password
                $password = $this->request->getVar('password');
                
        
                // Update the password and clear the reset token
                $model->update($user->id, [
                    'password' => $password,
                    'reset_token' => null, 
                    'reset_token_expiry' => null, 
                ]);
    
                return redirect()->to('login')->with('success', 'Your password has been reset successfully. You can now log in.');
            } else {
                $data['validation'] = $this->validator;
            }
        }
    
        // Load the reset password form view
        echo view('templates/header', $data);
        echo view('reset_password_form', ['token' => $token]);
    }

    // Method to handle user logout
 
    // Update password method
    public function updatePassword($token)
    {
        helper(['form']);
        $data = [];
    
        // Check if token exists
        $model = new UserModel();
        $user = $model->where('reset_token', $token)->first(); // Retrieve the user based on the token
    
        if ($this->request->getMethod() == 'post') {
            // Validation rules for updating password
            $rules = [
                'password' => 'required|min_length[8]|max_length[255]',
                'password_confirm' => 'matches[password]',
            ];
    
            if ($this->validate($rules)) {
                // Check if token is valid and not expired
                if ($user && strtotime($user->reset_token_expiry) > time()) {
                    // Hash the new password
                    $newPassword = $this->request->getVar('password');
                  
    
                    // Prepare update data
                    $updateData = [
                        'password' => $newPassword,
                        'reset_token' => null,
                        'reset_token_expiry' => null,
                    ];
    
                    // Update user password
                    if ($model->update($user->id, $updateData)) {
                        return redirect()->to('login')->with('success', 'Your password has been updated successfully. You can now log in.');
                    } else {
                        log_message('error', 'Failed to update password for user with token: ' . $token);
                        return redirect()->to('login')->with('error', 'There was an issue updating your password.');
                    }
                } else {
                    log_message('error', 'Invalid or expired reset token: ' . $token);
                    return redirect()->to('login')->with('error', 'Invalid or expired reset token.');
                }
            } else {
                // If validation fails, return errors
                $data['validation'] = $this->validator;
            }
        }
    
        // Display the reset password form with the token
        echo view('templates/header', $data);
        echo view('reset_password_form', ['token' => $token]);
        echo view('templates/footer', $data);
    }
}    