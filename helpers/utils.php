<?php

class Utils
{
	
	public static function deleteSession($name){

			if (isset($_SESSION[$name])) {
			
				$_SESSION[$name] = null;
				unset($_SESSION[$name]);

			}

			return $name;
	}

	public static function isAdmin(){

		$rol = $_SESSION['identity']->Permisos;

		if ($rol != "admin") {
			header("Location:".base_url);

		}else{
			return true;
		}

	}

	public static function checkSession(){

		if (!isset($_SESSION['identity'])) {

			header("Location:".base_url);

		}else{

			return true;
		}
	}

	public static function getAsistenciaCentro($centro,$fecha_i,$fecha_f){

		$db = Database::connect();
		
		if ($centro == "") {

			$sql = "SELECT SUM(Asistencias) as asistencia FROM REPORTES_ALCANCE_META WHERE Fecha >= '$fecha_i' and Fecha <= '$fecha_f' AND Coach != 'TOTAL' AND Estado = 1";

			$result     = $db->query($sql);
			$datos      = $result->fetch_object();
		 	$asistencia = $datos->asistencia;

		}else{

			$dbv = Database::connectvicidial();
			
			$sql ="SELECT count(user) as asistencia,sum(talk_sec) as tiempo FROM vicidial_agent_log WHERE (event_time BETWEEN '$fecha_i 00:00:00' AND '$fecha_f 23:59:59') AND (campaign_id ='4040' OR campaign_id='3330' OR campaign_id='3333' OR campaign_id= '3336') AND user_group = '$centro' group by user HAVING tiempo >= 1800";

			$result = $dbv->query($sql);
			$asistencia = $result->num_rows;
		
		}

		return $asistencia;
	}

	public static function getFactor($ventas,$asistencias){

		  $factor = 0;

		  if (intval($asistencias) != 0) {
		    $factor = intval($ventas)/$asistencias;
		  }

		  $factor = number_format(round($factor,2),2);

		  return $factor;
		}

	public static function getVentasPos($id_centro,$fecha_i,$fecha_f){

		$db = Database::connect();
		$venta = 0;

		$sql = "SELECT COUNT(*) AS ventas FROM VENTAS_POSPAGO_VAL WHERE Fecha_capturo = '".$fecha_i."' AND Fecha_capturo <= '".$fecha_f."' AND IdEstatusPospago =2 AND Estado =1 AND IdCentro= '".$id_centro."'";

		$result = $db->query($sql);

		if (!empty($result)) {
			
			$datos = $result->fetch_object();
			$venta = $datos->ventas;
		}

		return $venta;

	}

}//fin de la clase utils


?>