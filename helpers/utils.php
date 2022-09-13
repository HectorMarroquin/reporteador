<?php

class Utils
{
	private $db;
	private $dbv;

	public function __construct(){

		$this->db = Database::connect();
		$this->dbv = Database::connectvicidial();
	}

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

	public function getAsistenciaCentro($centro,$fecha_i,$fecha_f){

		if ($centro == "") {

			$sql = "SELECT SUM(Asistencias) as asistencia FROM REPORTES_ALCANCE_META WHERE Fecha >= '$fecha_i' and Fecha <= '$fecha_f' AND Coach != 'TOTAL' AND Estado = 1";

			$result     = $this->db->query($sql);
			$datos      = $result->fetch_object();
		 	$asistencia = $datos->asistencia;

		}else{
			
			$sql ="SELECT count(user) as asistencia,sum(talk_sec) as tiempo FROM vicidial_agent_log WHERE (event_time BETWEEN '$fecha_i 00:00:00' AND '$fecha_f 23:59:59') AND (campaign_id ='4040' OR campaign_id='3330' OR campaign_id='3333' OR campaign_id= '3336') AND user_group = '$centro' group by user HAVING tiempo >= 1800";

			$result = $this->dbv->query($sql);
			$asistencia = $result->num_rows;
		
		}

		return $asistencia;
	}

	public static function getPromedio($ventas,$asistencias){

		  $factor = 0;

		  if (intval($asistencias) != 0) {
		    $factor = intval($ventas)/$asistencias;
		  }

		  $factor = number_format(round($factor,2),2);

		  return $factor;
		}

	public function getAsistencia($coach,$fecha_i,$fecha_f){

		$asistencia = 0;

		$sql = "SELECT SUM(Asistencias) as asistencia FROM REPORTES_ALCANCE_META WHERE Fecha >= '$fecha_i' and Fecha <= '$fecha_f' AND Coach = '$coach' AND Estado = 1";

		$resul = $this->db->query($sql);
		$dato = $resul->fetch_object();
		$asistencia = $dato->asistencia;

		return $asistencia;
	}

}//fin de la clase utils


?>