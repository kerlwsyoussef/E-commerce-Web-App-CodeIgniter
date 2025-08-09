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

                // Prepare data for insertion (hashedPassword will be hashed automatically)
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
                    return redirect()->to('login')->with('success', 'Registration successful. Please check your email for verification.');
                }
            }
        }
        // Load the registration view with validation errors or success message
        echo view('templates/header', $data);
        echo view('register', $data);
        echo view('templates/footer',$data);
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
            // Validation rules for login form
            $rules = [
                'email' => 'required|valid_email',
                'password' => 'required|min_length[8]',
            ];

            // Validating the login form input
            if ($this->validate($rules)) {
                $model = new UserModel();
                $email = $this->request->getVar('email');
                $password = $this->request->getVar('password');
                $user = $model->where('email', $email)->first();

                if ($user) {
                    // Check if the user's email is verified
                    if ($user->email_verified == 0) {
                        $data['error'] = 'Please verify your email address first.';
                        // log_message('error', 'User email not verified. Email: ' . $user->email); // Removed for security
                    } else {
                        // Verify the password
                        if (password_verify($password, $user->password)) {
                            // Set user session upon successful login
                            $this->setUserSession($user);

                            return redirect()->to('dashboard'); // Redirect to dashboard upon successful login
                        } else {
                            $data['error'] = 'Invalid email or password';
                            // log_message('error', 'Invalid password. Email: ' . $user->email); // Removed for security
                        }
                    }
                } else {
                    $data['error'] = 'Invalid email or password';
                    // log_message('error', 'User not found. Email: ' . $email); // Removed for security
                }
            } else {
                // Validation errors
                $data['validation'] = $this->validator;
                // log_message('error', 'Validation failed. Errors: ' . print_r($this->validator->getErrors(), true)); // Removed for security
            }
        }

        // Load login view with data (errors or validation messages)
        echo view('templates/header', $data);
        echo view('login', $data);
        echo view('templates/footer',$data);
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
}
