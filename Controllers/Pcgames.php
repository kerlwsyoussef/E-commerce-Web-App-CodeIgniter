<?php namespace App\Controllers;


class Pcgames extends BaseController
{
	public function index()
	{
		

		

	echo view('templates/header');
	echo view('pcgames');
	echo view('templates/footer');
    
  
    }

}