<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Logout extends Controller
{
    public function index()
    {
        // Destroy the session
        session()->destroy();

        // Load the logout view
        return view('logout');
    }
}