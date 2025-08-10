<?php namespace App\Controllers;


class Xboxgames extends BaseController
{
	public function index()
	{
		

		

	echo view('templates/header');
	echo view('xboxgames');
	echo view('templates/footer');
    
  
    }

}