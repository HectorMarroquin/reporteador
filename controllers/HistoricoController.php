<?php

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
			$namecoach = $coach->Nombre;
			
			$getCoachHora = $HoraCoach->getHoraCoach($fecha_i, $fecha_f, $coachId);

			$resulthoras[] = $this->getCoachHora($getCoachHora, $namecoach);

		}

		return $resulthoras;
	}
	public function getCoachHora($getCoachHora,$namecoach)
	{
		
		$contador1=$contador2=$contador3=$contador4=$contador5=$contador6=$contador7=$contador8=$contador9=$contador10=$contador11=$contador12=$contador13=$contador14=0;
		while ($keyHora = $getCoachHora->fetch_object()) {
			
			$horas = $keyHora->Hora;
			
			$n = 1;
			switch ($horas) {
				case ($horas >= '08:00:00') && ($horas <= '08:59:59'):
					$contador1 += $n; // si encuentra hace un incremento a uno 1
					break;
				case ($horas >= '09:00:00') && ($horas <= '09:59:59'):
					$contador2 += $n;
					break;
				case ($horas >= '10:00:00') && ($horas <= '10:59:59'):
						$contador3 += $n;
					break;
				case ($horas >= '11:00:00') && ($horas <= '11:59:59'):
						$contador4 += $n;
					break;
				case ($horas >= '12:00:00') && ($horas <= '12:59:59'):
						$contador5 += $n;
					break;
				case ($horas >= '13:00:00') && ($horas <= '13:59:59'):
						$contador6 += $n;
					break;
				case ($horas >= '14:00:00') && ($horas <= '14:59:59'):
						$contador7 += $n;
					break;
				case ($horas >= '15:00:00') && ($horas <= '15:59:59'):
						$contador8 += $n;
					break;
				case ($horas >= '16:00:00') && ($horas <= '16:59:59'):
						$contador9 += $n;
					break;
				case ($horas >= '17:00:00') && ($horas <= '17:59:59'):
						$contador10 += $n;
					break;
				case ($horas >= '18:00:00' && $horas <= '18:59:59'):
						$contador11 += $n;
					break;
				case ($horas >= '19:00:00') && ($horas <= '19:59:59'):
						$contador12 += $n;
					break;
				case ($horas >= '20:00:00') && ($horas <= '20:59:59'):
						$contador13 += $n;
					break;
				case ($horas >= '21:00:00:') && ($horas <= '21:59:59'):
						$contador14 += $n;
					break;
			} // fin switch
			
		}// fin while
		
		$totalhoras = $contador1+$contador2+$contador3+$contador4+$contador5+$contador6+$contador7+$contador8+$contador9+$contador10+$contador11+$contador12+$contador13+$contador14;
		

		$ArrayTotalHoras = array(
			'name'	  => $namecoach,
			'hora1'  => $contador1,
			'hora2'  => $contador2,
			'hora3'  => $contador3,
			'hora4'  => $contador4,
			'hora5'  => $contador5,
			'hora6'  => $contador6,
			'hora7'  => $contador7,
			'hora8'  => $contador8,
			'hora9'  => $contador9,
			'hora10' => $contador10,
			'hora11' => $contador11,
			'hora12' => $contador12,
			'hora13' => $contador13,
			'hora14' => $contador14,
			'total' => $totalhoras,
		);
		
		return $ArrayTotalHoras; 
		
	}

}
