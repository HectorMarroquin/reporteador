<?php

require_once 'models/BitacoraValidacion.php';

class BitacoraValidacionController
{

	public function index(){

	$bitacora = new BitacoraValidacion();
		$bitacora->ultimoRegistro();

		var_dump($bitacora->fetch_object()); exit();
		
	}
	
}



?>