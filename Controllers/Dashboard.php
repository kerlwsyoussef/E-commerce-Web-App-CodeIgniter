<?php

namespace App\Controllers;

use App\Models\UserModel;

class Dashboard extends BaseController
{
    private function checkLoggedIn()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('login');
        }
    }

    public function index()
    {
        $this->checkLoggedIn();
    
        $userId = session()->get('id');
        $userModel = new UserModel();
        $userData = $userModel->find($userId);
    
        // Redirect if no user data is found
        if (!$userData) {
            return redirect()->to('login');
        }
    
        $data['userData'] = $userData;
    
        echo view('templates/header');
        return view('dashboard', $data);
        echo view('templates/footer');
    }
    
    public function profile()
    {
        $this->checkLoggedIn();
    
        $userId = session()->get('id');
        $userModel = new UserModel();
        $userData = $userModel->find($userId);
    
        if (!$userData) {
            return redirect()->to('dashboard');
        }
    
        $data['userData'] = $userData;
    
        
        echo view('profile', $data);
    }

    public function editProfile()
    {
        $this->checkLoggedIn();
    
        $userId = session()->get('id');
        $userModel = new UserModel();
        $userData = $userModel->find($userId);
    
        if (!$userData) {
            return redirect()->to('dashboard');
        }
    
        $data['userData'] = $userData;
    
        echo view('templates/header');
        echo view('edit_profile', $data); // Load the view for editing profile
    }

    public function deleteProfile()
    {
        $this->checkLoggedIn();
    
        $userId = session()->get('id');
        $userModel = new UserModel();
    
        // Delete the user's profile
        $userModel->delete($userId);
    
        // Logout the user after deleting the profile
        session()->destroy();
    
        // Redirect the user to the login page with a success message
        return redirect()->to('login')->with('success', 'Your profile has been deleted.');
    }

    public function updateProfile()
    {
        $this->checkLoggedIn();
    
        // Validate user input
        $validationRules = [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|valid_email', // Add more validation rules if needed
            'password' => 'min_length[6]' // Example validation for the password field, adjust as needed
        ];
    
        if (!$this->validate($validationRules)) {
            // If validation fails, redirect back to the edit profile page with validation errors
            return redirect()->to('dashboard/editProfile')->withInput()->with('errors', $this->validator->getErrors());
        }
    
        $userId = session()->get('id');
        $userModel = new UserModel();
    
        // Prepare updated user data
        $updatedData = [
            'firstname' => $this->request->getPost('firstname'),
            'lastname' => $this->request->getPost('lastname'),
            'email' => $this->request->getPost('email'),
            
            // Add other fields you want to allow users to update
        ];
    
        // Check if password field is not empty (i.e., user wants to update the password)
        $password = $this->request->getPost('password');
        if (!empty($password)) {
            // Hash the new password
           
            // Include hashed password in the updated data
            if (!empty($password)) {
                $updatedData['password'] = $password; // 
            }
            
        }
    
        // Use the update method of the UserModel to update the user's data
        $userModel->update($userId, $updatedData);
    
        // Redirect the user to the edit profile page with a success message
        return redirect()->to('dashboard/editProfile')->with('success', 'Profile updated successfully.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}

