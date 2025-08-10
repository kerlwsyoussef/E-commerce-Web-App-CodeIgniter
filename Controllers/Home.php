<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Home extends BaseController
{
    public function index()
    {
      
        echo view('templates/header');
        echo view('home');
        echo view('templates/footer');
      
    }

}