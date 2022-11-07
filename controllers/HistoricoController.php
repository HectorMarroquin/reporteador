<?php

require_once 'models/BitacoraValidacion.php';
require_once 'models/VentasPospago.php';
require_once 'controllers/HomeController.php';
require_once 'models/UsuarioCliente.php';
require_once 'helpers/utils.php';
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Csv;

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

		$coaches = new UsuarioCliente();
		$coaches = $coaches->getCoaches();


		$desgloseHoraCoach = $this->desgloseHoraCoach($fecha_i, $fecha_f, $coaches);

		echo json_encode($desgloseHoraCoach);
	}

	public function desgloseHoraCoach($fecha_i, $fecha_f, $getCoach)
	{
		$ventashoracoaches = new BitacoraValidacion();
		
		while ($coach = $getCoach->fetch_object()) {
			//$coachId = $coach->Id;
			$getCoachHora = $ventashoracoaches->gethoraventaCoach($fecha_i, $fecha_f, $coach->Id);
				$horasCoach[$coach->Nombre] = Utils::segmentaHoras($getCoachHora);
			}
		return $horasCoach;
	}

	public function desgloseSector()
	{
		$fecha_i = $_POST['date1'];
		$fecha_f = $_POST['date2'];

		$sector = new UsuarioCliente();
		$getSectores = $sector->getSectores($fecha_i, $fecha_f);
		$desglosector = new HomeController();
		$getdesgloseSector = $desglosector->getDesgloSector($getSectores, $fecha_i, $fecha_f);
		echo json_encode($getdesgloseSector);
	}

	public function generarCSV(){

		$fecha_i = $_POST['date1'];
		$fecha_f = $_POST['date2'];
		$ventasCoach = new BitacoraValidacion();
		$ventaCoach = $ventasCoach->getVentasCoach($fecha_i, $fecha_f);
		$reporteCoach = HomeController::getDesgloseCoaches($ventaCoach, $fecha_i, $fecha_f);
		
		$header = [array("Coach", "Pagos", "Migradas", "Pos/Base", "Total", "Asistencia", "Factor", "Horas Conexion", "Talk", "SPH")];
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->fromArray($header, NULL, 'A1')
		->fromArray($reporteCoach, NULL, 'A2');     

		$ruta = __DIR__ .'/save/ReporteCoaches.csv';
		$writer = new Csv($spreadsheet);
		$writer->save($ruta);
	}
}
