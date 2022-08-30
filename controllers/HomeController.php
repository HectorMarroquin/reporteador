<?php
require_once 'models/BitacoraValidacion.php';

class HomeController 
{
	public function index(){

		$fecha_i = date('Y-m-d'); 
		$fecha_f = date('Y-m-d');

		Utils::checkSession();
		
		$ultRegistro = new BitacoraValidacion();
		$reg = $ultRegistro->ultimoRegistro();

		$ventasCentros  = new BitacoraValidacion();
		$centros = $ventasCentros->getAll($fecha_i,$fecha_f);

		require_once 'views/home/home.php';
	
	}
}

?>