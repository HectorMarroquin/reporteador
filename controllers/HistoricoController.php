<?php

require_once 'models/BitacoraValidacion.php';
require_once 'models/VentasPospago.php';
require_once 'controllers/HomeController.php';
require_once 'models/UsuarioCliente.php';
require_once 'helpers/utils.php';

class HistoricoController
{
	public function index()
	{
		Utils::checkSession();

		require 'views/historico/historico.php';
	}

	public function desglose()
	{

		$fecha_i = $_POST['date1'];
		$fecha_f = $_POST['date2'];

		$centrosPre = new BitacoraValidacion();
		$centrosPrepagos = $centrosPre->getAll($fecha_i, $fecha_f);

		$datosObtenidos = new HomeController();
		$reporteCentro = $datosObtenidos->getDesgloseCentros($centrosPrepagos, $fecha_i, $fecha_f);

		echo json_encode($reporteCentro);
	}

	public function desglosePos()
	{

		$fecha_i = $_POST['date1'];
		$fecha_f = $_POST['date2'];

		$ventasPos = new VentasPospago();
		$ventaPos = $ventasPos->getAll($fecha_i, $fecha_f);

		$ventasPospago = HomeController::getDesglosePospago($ventaPos, $fecha_i, $fecha_f);
		echo json_encode($ventasPospago);
	}

	public function desgloseCoach()
	{
		$fecha_i = $_POST['date1'];
		$fecha_f = $_POST['date2'];

		$ventasCoach = new BitacoraValidacion();
		$ventaCoach = $ventasCoach->getVentasCoach($fecha_i, $fecha_f);

		$reporteCoach = HomeController::getDesgloseCoaches($ventaCoach, $fecha_i, $fecha_f);
		echo json_encode($reporteCoach);
	}

	public function HoraCoach()
	{
		$fecha_i = $_POST['date1'];
		$fecha_f = $_POST['date2'];

		$nameCoach = new UsuarioCliente();
		$getCoach = $nameCoach->getNameCoach();


		$desgloseHoraCoach = $this->desgloseHoraCoach($getCoach, $fecha_i, $fecha_f);

		echo json_encode($desgloseHoraCoach);
	}

	public function desgloseHoraCoach($getCoach, $fecha_i, $fecha_f)
	{
		
		$HoraCoach = new BitacoraValidacion();
		
		while ($coach = $getCoach->fetch_object()) {
			$coachId = $coach->Id;
			//$namecoach = $coach->Nombre;
			
			$getCoachHora = $HoraCoach->getHoraCoach($fecha_i, $fecha_f, $coachId);
			$horasCoach[$coach->Nombre] = Utils::segmentaHoras($getCoachHora);
		}
		
		return $horasCoach;
	}

}
