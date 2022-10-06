<?php

use LDAP\Result;

require_once 'models/BitacoraValidacion.php';
require_once 'models/VentasPospago.php';
require_once 'controllers/HomeController.php';
require_once 'models/UsuarioCliente.php';

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

	// ******************** EN PROCESO ***************************
	public function HoraCoach()
	{
		

		$nameCoach = new UsuarioCliente();
		$getCoach = $nameCoach->getNameCoach();


		$desgloseHoraCoach = $this->desgloseHoraCoach($getCoach);
		
		echo json_encode($desgloseHoraCoach);
	}

	public function desgloseHoraCoach($getCoach)
	{
		$fecha_i = $_POST['date1'];
		$fecha_f = $_POST['date2'];

		$HoraCoach = new BitacoraValidacion();

		foreach ($getCoach as $IdCoach){
			$idCoach = $IdCoach['Id'];
			//var_dump($idCoach); exit();
			$gethoracoach = $HoraCoach->getHoracoach($fecha_i, $fecha_f, $idCoach);
			
			foreach ($gethoracoach as $value) {
				$gethora = $value['Hora'];
				//var_dump($gethora); exit();
				
				$assocCoach = $this->getCoachHora($gethora,$value);
				//var_dump($assocCoach);
				$resultHorasCoach = $assocCoach;
			}
			return $resultHorasCoach;
		}
		
	}
	// ******************** EN PROCESO ***************************
	public function getCoachHora($horacoach, $value)
	{
		// var_dump($horacoach); exit();
		$NameCoach = $value['Supervisor'];
		//var_dump($NameCoach); exit();
		$n = 1;
		switch ($horacoach) {
			case ($horacoach >= '08:00:00') && ($horacoach <= '09:00:00'):
				//echo "esta en el rango 8 a 9";
				$contador1 =+ $n;
				break;
			case ($horacoach >= '09:00:00') && ($horacoach <= '10:00:00'):
				//echo "esta en el rango 9 a 10";
				$contador2 =+ $n;
				break;
			case ($horacoach >= '10:00:00') && ($horacoach <= '11:00:00'):
				//echo "esta en el rango de 10 a 11";
				$contador3 =+ $n;
				break;
			case ($horacoach >= '11:00:00') && ($horacoach <= '12:00:00'):
				//echo "esta en el rango de 11 a 12";
				$contador4 =+ $n;
				break;
			case ($horacoach >= '12:00:00') && ($horacoach <= '13:00:00'):
				//echo "esta en el rango de 12 a 1";
				$contador5 =+ $n;
				break;
			case ($horacoach >= '13:00:00') && ($horacoach <= '14:00:00'):
				//echo "esta en el rango de 1 a 2 PM";
				$contador6 =+ $n;
				break;
			case ($horacoach >= '14:00:00') && ($horacoach <= '15:00:00'):
				//echo "esta en el rango de 2 a 3 PM";
				$contador7 =+ $n;
				break;
			case ($horacoach >= '15:00:00') && ($horacoach <= '16:00:00'):
				//echo "esta en el rango de 3 a 4 PM";
				$contador8 =+ $$n;
				break;
			case ($horacoach >= '16:00:00') && ($horacoach <= '17:00:00'):
				//echo "esta en el rango de 4 a 5 PM";
				$contador9 =+ $n;
				break;
			case ($horacoach >= '17:00:00') && ($horacoach <= '18:00:00'):
				//echo "esta en el rango de 5 a 6 PM";
				$contador10 =+ $n;
				break;
			case ($horacoach >= '18:00:00') && ($horacoach <= '19:00:00'):
				//echo "esta en el rango de 6 a 7 PM";
				$contador11["18a19"] =+ $n;
				break;
			case ($horacoach >= '19:00:00') && ($horacoach <= '20:00:00'):
				//echo "esta en el rango de 7 a 8 PM";
				$contador12 =+ $n;
				break;
			case ($horacoach >= '20:00:00') && ($horacoach <= '21:00:00'):
				//echo "esta en el rango de 8 a 9 PM";
				$contador13 =+ $n;
				break;
			case ($horacoach >= '21:00:00:') && ($horacoach <= '22:00:00'):
				//echo "esta en el rango de 9 a 10 PM";
				$contador14 =+ $n;
				break;

		}
		$totalH = [
		$hora8a9["8a9"] = $contador1,
		$hora9a10["9a10"] = $contador2,
		$hora10a11["10a11"] = $contador3,
		$hora11a12["11a12"] = $contador4,
		$hora12a13["12a13"] = $contador5,
		$hora13a14["13a14"] = $contador6,
		$hora14a15["14a15"] = $contador7,
		$hora15a16["15a16"] = $contador8,
		$hora16a17["16a17"] = $contador9,
		$hora17a18["17a18"] = $contador10,
		$hora18a19["18a19"] = $contador11,
		$hora19a20["19a20"] = $contador12,
		$hora20a21["20a21"] = $contador13,
		$hora20a21["21a22"] = $contador14,
		];
		return $totalH;
		
		
	}
}