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

		$admin = ['42','220','227','157','193','32','237'];

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
			
			$sql ="SELECT count(user) as asistencia,sum(talk_sec) as tiempo FROM vicidial_agent_log WHERE (event_time BETWEEN '$fecha_i 00:00:00' AND '$fecha_f 23:59:59') AND user_group = '$centro' group by user HAVING tiempo >= 1800";

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

	public function getAsistencia($idcoach,$fecha_i,$fecha_f){

		$sql = "SELECT SUM(Asistencias) as asistencia FROM REPORTES_ALCANCE_META WHERE Fecha >= '$fecha_i' and Fecha <= '$fecha_f' AND IdCoach = '$idcoach' AND Estado = 1";

		$resul = $this->db->query($sql);
		$dato = $resul->fetch_object();
		$asistencia = $dato->asistencia;

		if(!isset($asistencia)){

			$asistencia = 0;
		}
		return $asistencia;
	}

	public function getHoraConexion($coach,$fecha_i,$fecha_f){

		$datos = [];

		$sql = "SELECT Horas_conexion,Talk,Talk1 FROM REPORTES_ALCANCE_META WHERE Fecha >= '$fecha_i' and Fecha <= '$fecha_f' AND Coach = '$coach' AND Estado = 1";
		
		$resul = $this->db->query($sql);

		if ($resul && $resul->num_rows == 1) {

			$dato = $resul->fetch_object();
			$datos = [$dato->Horas_conexion,$dato->Talk,$dato->Talk1];
		}
		
		return $datos;

	}

	public static function getSegundosConversor($horas){

		$segundos = 0;

		if(!empty($horas)){
			
			$tiempo = explode(":",$horas);
			$segundosh = floor($tiempo[0] * 3600);
			$segundomin = floor($tiempo[1] * 60);
			$segundos = floor($segundosh+$segundomin+$tiempo[2]);
		}

		return $segundos;

	}

	public static function getHorasConversor($segundos){

		$hora_formato = "";

		if(!empty($segundos)){

			$horas    = floor($segundos / 3600);
			$minutos  = floor(($segundos - ($horas * 3600)) / 60);
			$segundos = floor($segundos - ($horas * 3600) - ($minutos * 60));

			if($minutos<10){	
				$minutos="0".$minutos; 
			}
			
			if($segundos<10){
				$segundos="0".$segundos;
			}
			
			if($horas<10){
				$horas="0".$horas; 
			}
			
			$hora_formato = $horas . ':' . $minutos. ":" . $segundos;
			
		}

		return $hora_formato;

	}

	public static function getSPH($ventas,$segundos){
		$sph = 0;
		if ($segundos != 0) {
		  $sph = $ventas/($segundos/3600);
		  $sph =number_format(round($sph,2),2);
		}
		return $sph;
	}

    public static function getPorcentaje($dividendo, $divisor){
        $porcentaje = 0;
            if ($dividendo != 0 && $divisor != 0) {
        $porcentaje = ($divisor * 100)/$dividendo;
    }
        $porcentaje = number_format(round($porcentaje, 2),2).'%';
        return $porcentaje;
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


	public static function concatenarDatos($datos){

		$nominas = "";

		while($dato = $datos->fetch_object()){

			$nominas .= $dato->Nro_nomina.",";
		}
		$nominas = substr($nominas, 0, -1);

		return $nominas;

	}

	public function getAsistenciaSector($idsector,$fecha_i,$fecha_f){

		$sql_coaches = "SELECT Id as idcoach
		FROM USUARIO_CLIENTE
		WHERE Idcampania = '".$idsector."'
		AND Estado =1 AND IdGrupo_sistema IN (150,50,151,157,167)";

		$resul = $this->db->query($sql_coaches);	
		$total = 0;
		
		while($dato = $resul->fetch_object()){

			$idcoach = $dato->idcoach; 
			$asistencia = $this->getAsistencia($idcoach,$fecha_i,$fecha_f);
			$total += intval($asistencia);

		}
		return $total;

	}


    // Consulatar fechas
    // Restar un dia de la fecha final del mes anterior y restar un dia de la fecha final del mes actual
    public static function ObtenerFechasPrincipales(){
        $fechas = array();
        $base_fecha  = date('Y-m');
        $fechas['Inicio'] = $base_fecha.'-01';
        $fecha_temp = date('Y').'-'.intval(date('m')+1).'-01';
        $fecha_fin = Utils::SumarRestarFechas($fecha_temp,0,1);
        $fechas['Fin'] = $fecha_fin;
        
        return $fechas;
     
     }

	 public static function sumarRestarFechas($fecha,$sumaresta,$dias){
        if ($sumaresta == 1) {
            $fecha_res = date("Y-m-d",strtotime($fecha."+ ".$dias." days"));  
        }else{
            $fecha_res = date("Y-m-d",strtotime($fecha."- ".$dias." days")); 
        }
            return $fecha_res;
      }

	public static function recorreFechas($fecha){
        //extrae las fechas
        $fecha_r = array();
        $fecha_r['Inicio'] = date("Y-m-d", strtotime($fecha['Inicio']."- 1 days"));
        $fecha_r['Fin'] = date("Y-m-d", strtotime($fecha['Fin'].      "- 1 days"));
    
        return $fecha_r;
    }

    public static function getAltasFinal($res){

            $contador = 0;
            $estatus = array("ALTA","ALTA/POSPAGO","ALTA/REC_TRANSITORIA");

          while ($alta = $res->fetch_object()) {

                if (in_array($alta->Status, $estatus)) {
                  
                      $contador++;
                 }
          }

           return $contador;

}


	public static function getMes($mes){

		$mes = explode("-",$mes);

		$mes = $mes[1];

		switch($mes){

			case '01' : $mesActual = 'ENERO';
			break;

			case '02' : $mesActual = 'FEBRERO';
			break;

			case '03' : $mesActual = 'MARZO';
			break;

			case '04' : $mesActual = 'ABRIL';
			break;

			case '05' : $mesActual = 'MAYO';
			break;

			case '06' : $mesActual = 'JUNIO';
			break;

			case '07' : $mesActual = 'JULIO';
			break;

			case '08' : $mesActual = 'AGOSTO';
			break;

			case '09' : $mesActual = 'SEPTIEMBRE';
			break;

			case '10' : $mesActual = 'OCTUBRE';
			break;

			case '11' : $mesActual = 'NOVIEMBRE';
			break;

			case '12' : $mesActual = 'DICIEMBRE';
			break;

		}

		return $mesActual;

}

	public static function extraerPrefijoFicticio(&$arrCentros){

		$aleatorio= array_rand($arrCentros, 1);
		$newPrefijo = $arrCentros[$aleatorio];
		unset($arrCentros[$aleatorio]);
		return $newPrefijo;

	}

	public static function crearArrCentros($elementos){

		$arr = [];

		for ($i=1; $i < $elementos; $i++) { 
			$arr[] = "Centro" . $i;
		}
		return $arr;
	}

}//fin de la clase utils


?>