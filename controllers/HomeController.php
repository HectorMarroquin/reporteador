<?php

class HomeController 
{
	public function index(){

		Utils::checkSession();
		require_once 'views/home/home.php';
	
	}
}

?>