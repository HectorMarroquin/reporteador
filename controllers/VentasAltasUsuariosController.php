<?php

class VentasAltasUsuariosController 
{
	public function index(){
		
		Utils::checkSession();

		require_once 'views/ventasaltas/ventasaltas.php';
	}
}

?>