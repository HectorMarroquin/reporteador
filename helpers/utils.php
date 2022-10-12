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

		//$rol = $_SESSION['identity']->rol;

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

	public static function getPorcentaje($total,$parte){
		  //porcentaje
		  $porc =number_format(0,1);

		  if(!empty($total)){
		    $porc  = ($parte*100)/$total;
		    $porc = number_format($porc,1);
		  }

		  return $porc;
	}
	


	public static function segmentaHoras($ventas){

		$indice1=$indice2=$indice3=$indice4=$indice5=$indice6=$indice7=$indice8=$indice9=$indice10=$indice11=$indice12=$indice13=$indice14=0;		
		
		while($venta = $ventas->fetch_object()){

			$horaventa = $venta->Hora;
			
			switch ($horaventa) {
				case ($horaventa >= '08:00:00') && ($horaventa <= '08:59:59'):
					$indice1++; // si encuentra hace un incremento a uno 1
					break;
				case ($horaventa >= '09:00:00') && ($horaventa <= '09:59:59'):
					$indice2++;
					break;
				case ($horaventa >= '10:00:00') && ($horaventa <= '10:59:59'):
						$indice3++;
					break;
				case ($horaventa >= '11:00:00') && ($horaventa <= '11:59:59'):
						$indice4++;
					break;
				case ($horaventa >= '12:00:00') && ($horaventa <= '12:59:59'):
						$indice5++;
					break;
				case ($horaventa >= '13:00:00') && ($horaventa <= '13:59:59'):
						$indice6++;
					break;
				case ($horaventa >= '14:00:00') && ($horaventa <= '14:59:59'):
						$indice7++;
					break;
				case ($horaventa >= '15:00:00') && ($horaventa <= '15:59:59'):
						$indice8++;
					break;
				case ($horaventa >= '16:00:00') && ($horaventa <= '16:59:59'):
						$indice9++;
					break;
				case ($horaventa >= '17:00:00') && ($horaventa <= '17:59:59'):
						$indice10++;
					break;
				case ($horaventa >= '18:00:00' && $horaventa <= '18:59:59'):
						$indice11++;
					break;
				case ($horaventa >= '19:00:00') && ($horaventa <= '19:59:59'):
						$indice12++;
					break;
				case ($horaventa >= '20:00:00') && ($horaventa <= '20:59:59'):
						$indice13++;
					break;
				case ($horaventa >= '21:00:00:') && ($horaventa <= '21:59:59'):
						$indice14++;
					break;
			} // fin switch
			
		}//fin del while

		$total = $indice1+$indice2+$indice3+$indice4+$indice5+$indice6+$indice7+$indice8+$indice9+$indice10+$indice11+$indice12+$indice13+$indice14;		

		$centroHora = array(
					'hora08' => $indice1,
					'hora09' => $indice2,
					'hora10' => $indice3,
					'hora11' => $indice4,
					'hora12' => $indice5,
					'hora13' => $indice6,
					'hora14' => $indice7,
					'hora15' => $indice8,
					'hora16' => $indice9,
					'hora17' => $indice10,
					'hora18' => $indice11,
					'hora19' => $indice12,
					'hora20' => $indice13,
					'hora21' => $indice14,
					'total' => $total,
					
		);

		return $centroHora;

	}


}//fin de la clase utils


?>