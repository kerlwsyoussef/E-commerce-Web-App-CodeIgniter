<?php namespace App\Controllers;


class Xboxconsoles extends BaseController
{
	public function index()
	{
		

		

	echo view('templates/header');
	echo view('xboxconsoles');
	echo view('templates/footer');
    
  
    }

}