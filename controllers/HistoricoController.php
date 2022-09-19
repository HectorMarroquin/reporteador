<?php
require_once 'models/BitacoraValidacion.php';
require_once 'models/VentasPospago.php';
require_once 'controllers/HomeController.php';

class HistoricoController 
{
	public function index(){
		$fecha_i = $_POST['date1'];
		$fecha_f = $_POST['date2'];

		//var_dump($fecha_i);


		Utils::checkSession();

		require 'views/historico/historico.php';
	}


	public function desglose(){

		$fecha_i = $_POST['date1'];
		$fecha_f = $_POST['date2'];

		$centrosPre = new BitacoraValidacion();
		$centrosPrepagos = $centrosPre->getAll($fecha_i,$fecha_f);
		
		$datosObtenidos = new HomeController();
		$reporteCentro = $datosObtenidos->getDesgloseCentros($centrosPrepagos,$fecha_i,$fecha_f);

		var_dump($reporteCentro); exit();

			echo json_encode($reporteCentro);
			exit();

	}


}




?>