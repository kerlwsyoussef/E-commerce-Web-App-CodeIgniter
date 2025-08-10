<?php namespace App\Controllers;


class PlaystationGames extends BaseController
{
	public function index()
	{
		

		

	echo view('templates/header');
	echo view('playstationgames');
	echo view('templates/footer');
    
  
    }

}