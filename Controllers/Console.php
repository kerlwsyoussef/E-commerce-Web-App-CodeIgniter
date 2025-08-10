<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Console extends BaseController
{
    public function index()
    {
        echo view('templates/header');
        echo view('console');
    }

    public function getConsoleView()
    {
        // You can load the console view here and return it as a JSON response
        // Replace the echo statement with the logic to load the console view
        
        // For demonstration, I'm just returning a dummy JSON response
        $data = [
            'html' => view('console')->render(),
        ];

        // Return the console view HTML as a JSON response
        return $this->response->setJSON($data);
    }
}
