<?php namespace App\Controllers;


class Playstationconsoles extends BaseController
{
	public function index()
	{
		

		

	echo view('templates/header');
	echo view('playstationconsoles');
	echo view('templates/footer');
    
  
    }

}