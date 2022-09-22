<?php
require_once 'models/BitacoraValidacion.php';
require_once 'models/VentasPospago.php';
require_once 'controllers/HomeController.php';

class HistoricoController 
{
	public function index(){
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

			echo json_encode($reporteCentro);
			//var_dump($reporteCentro);
	}


}
?>