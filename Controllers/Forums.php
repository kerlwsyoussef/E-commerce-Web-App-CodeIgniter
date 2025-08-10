<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Forums extends Controller
{
    public function index()
    {
        $postModel = new \App\Models\PostModel();
        $data['posts'] = $postModel->findAll(); // Retrieve all blog posts from the database
        
        echo view('templates/header');
        echo view('forums', $data);
    }

    public function create()
    {
        $validation = \Config\Services::validation();

        // Validate form input
        if (!$this->validate([
            'title' => 'required|max_length[255]',
            'content' => 'required'
        ])) {
            echo view('templates/header');
            return view('create_post', ['validation' => $validation]);
        }

        $postModel = new \App\Models\PostModel();
        $postModel->insert([
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content')
        ]);

        return redirect()->to('/forums'); // Corrected redirect URL
    }
}
