<?php

class ReclutamientoController 
{
	public function index(){
		
		Utils::checkSession();
		Utils::isAdmin();
		require_once 'views/reclutamiento/reclutamiento.php';
	}
}

?>