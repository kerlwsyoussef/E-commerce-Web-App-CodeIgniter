<?php

namespace App\Controllers;

use App\Models\UserModel;

class Welcome extends BaseController
{
    public function welcome($userId)
{
    // Check if user is logged in
    if (!session()->get('isLoggedIn') || session()->get('id') != $userId) {
        return redirect()->to('login');
    }

    // Load the user model
    $userModel = new UserModel();

    // Fetch user data based on ID
    $userData = $userModel->find($userId);

    // Pass user data to the view
    $data['userData'] = $userData;

    // Load the welcome view with user data
    echo view('welcome', $data);

}
}