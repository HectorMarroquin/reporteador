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

		$admin = ['42','220','227','157','193'];

		$rol = $_SESSION['identity']->idgrupo;

		if (!in_array($rol,$admin)) {
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

		$sql = "SELECT SUM(Asistencias) as asistencia FROM REPORTES_ALCANCE_META WHERE Fecha >= '$fecha_i' and Fecha <= '$fecha_f' AND Coach = '$coach' AND Estado = 1";

		$resul = $this->db->query($sql);
		$dato = $resul->fetch_object();
		$asistencia = $dato->asistencia;

		if(!isset($asistencia)){

			$asistencia = 0;
		}
		return $asistencia;
	}



	public static function segmentaHoras($ventas){

		$indice1=$indice2=$indice3=$indice4=$indice5=$indice6=$indice7=$indice8=$indice9=$indice10=$indice11=$indice12=$indice13=0;		
		
		while($venta = $ventas->fetch_object()){

			$horaventa = $venta->Hora;

			if($horaventa >= '09:00:00' && $horaventa <= '09:59:59'){
				$indice1++;
			}elseif($horaventa >= '10:00:00' && $horaventa <= '10:59:59'){
				$indice2++;
			}elseif($horaventa >= '11:00:00' && $horaventa <= '11:59:59'){
				$indice3++;
			}elseif($horaventa >= '12:00:00' && $horaventa <= '12:59:59'){
				$indice4++;
			}elseif($horaventa >= '13:00:00' && $horaventa <= '13:59:59'){
				$indice5++;
			}elseif($horaventa >= '14:00:00' && $horaventa <= '14:59:59'){
				$indice6++;
			}elseif($horaventa >= '15:00:00' && $horaventa <= '15:59:59'){
				$indice7++;
			}elseif($horaventa >= '16:00:00' && $horaventa <= '16:59:59'){
				$indice8++;
			}elseif($horaventa >= '17:00:00' && $horaventa <= '17:59:59'){
				$indice9++;
			}elseif($horaventa >= '18:00:00' && $horaventa <= '18:59:59'){
				$indice10++;
			}elseif($horaventa >= '19:00:00' && $horaventa <= '19:59:59'){
				$indice11++;
			}elseif($horaventa >= '20:00:00' && $horaventa <= '20:59:59'){
				$indice12++;
			}elseif($horaventa >= '21:00:00' && $horaventa <= '21:59:59'){
				$indice13++;
			}
			
		}//fin del while

		$total = $indice1+$indice2+$indice3+$indice4+$indice5+$indice6+$indice7+$indice8+$indice9+$indice10+$indice11+$indice12+$indice13;		

		$centroHora = array(
					'09-10' => $indice1,
					'10-11' => $indice2,
					'11-12' => $indice3,
					'12-13' => $indice4,
					'13-14' => $indice5,
					'14-15' => $indice6,
					'15-16' => $indice7,
					'16-17' => $indice8,
					'17-18' => $indice9,
					'18-19' => $indice10,
					'19-20' => $indice11,
					'20-21' => $indice12,
					'21-22' => $indice13,
					'total' => $total,
					
		);

		return $centroHora;

	}

}//fin de la clase utils


?>