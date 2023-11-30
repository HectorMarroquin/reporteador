<?php
require_once 'models/BitacoraValidacion.php';
require_once 'models/VentasPospago.php';
require_once 'models/ListaCentro.php';
require_once 'models/UsuarioCliente.php';
require_once 'models/UsuarioLogin.php';

class UsuarioLoginController 
{
	public function index(){
	
		// $fecha_i = "2023-06-02";
		// $fecha_f = "2023-06-02";
		 

		Utils::checkSession();

		$inicio = new UsuarioLogin();

		$iniciados = $inicio->consulta_general();

		$couches = $inicio->usuariosCoaches();


		require_once 'views/mapeo/mapeo.php';
	
	}


}// fin de la clase HomeController

?>