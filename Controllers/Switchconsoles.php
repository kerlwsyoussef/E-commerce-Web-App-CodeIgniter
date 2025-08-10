<?php namespace App\Controllers;


class Switchconsoles extends BaseController
{
	public function index()
	{
		

		

	echo view('templates/header');
	echo view('switchconsoles');
	echo view('templates/footer');
    
  
    }

}