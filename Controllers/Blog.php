<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Forums extends Controller
{
    public function index()
    {
        // Load the view for displaying the blog page
        
        $postModel = new \App\Models\PostModel();
    
        // Retrieve all blog posts from the database
        $data['posts'] = $postModel->findAll(); // Assuming you have a method to retrieve all posts
        
        // Load the view for displaying the blog page with the retrieved posts data
        echo view('templates/header');
        echo view('blog', $data);
        
    }

    public function create()
    {
        // Load the validation library
        $validation = \Config\Services::validation();

        // Validate form input
        if (!$this->validate([
            'title' => 'required|max_length[255]',
            'content' => 'required'
        ])) {
            // Validation failed, show the form again with validation errors
            echo view('templates/header');
            return view('create_post', ['validation' => $validation]);
        }

        // Insert new post into the database
        $postModel = new \App\Models\PostModel();
        $postModel->insert([
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content')
        ]);

        // Redirect to the blog page or show a success message
        return redirect()->to('/');
    }
}
