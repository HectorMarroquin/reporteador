<?php

class VentasAltasUsuariosController 
{
	public function index(){
		
		Utils::checkSession();
		Utils::isAdmin();
		require_once 'views/ventasaltas/ventasaltas.php';
	}
}

?>