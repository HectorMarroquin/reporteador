<?php
require_once 'models/BitacoraValidacion.php';
require_once 'models/VentasPospago.php';
require_once 'models/ListaCentro.php';
require_once 'models/UsuarioCliente.php';

class HomeController 
{
	public function index(){

		$rol          = $_SESSION['identity']->idgrupo;
		$iduserclient = $_SESSION['identity']->Id;
		$admin        = ['42','220','227','157','32','193'];

		//$fecha_i = date('Y-m-d'); 
		//$fecha_f = date('Y-m-d');

		 $fecha_i = "2023-02-23";
		 $fecha_f = "2023-02-23";
		 

		Utils::checkSession();

		//extrae la hora de la ultima venta ingresada
		$ultRegistro = new BitacoraValidacion();
		$registro = $ultRegistro->ultimoRegistro($fecha_i);
		$reg = $registro ? $registro->Hora : 'S/N';

		//extraer todas las ventas prepago
		$ventasCentros  = new BitacoraValidacion();
		$centros = $ventasCentros->getAll($fecha_i,$fecha_f,$rol,$admin);

		//extraer centro,prepago,pospago,pos/pre,%pos,asistencia,factor
		
		$desglose   = $this->getDesgloseCentros($centros,$fecha_i,$fecha_f);

		$ventasPospago = new VentasPospago();
		$pospago       = $ventasPospago->getAll($fecha_i,$fecha_f,$rol,$admin,$iduserclient);
		
		$ventasCoach   = new BitacoraValidacion();
		$coachPrepago  = $ventasCoach->getVentasCoach($fecha_i,$fecha_f);
		
		$desgloseCoach = $this->getDesgloseCoaches($coachPrepago,$fecha_i,$fecha_f);
		$desglosePos   = $this->getDesglosePospago($pospago,$fecha_i,$fecha_f,$rol,$admin);
		
		$sectores      = new UsuarioCliente();
		$ventaSector   = $sectores->getSectores($fecha_i,$fecha_f); 
		$desgloSector  = $this->getDesgloSector($ventaSector,$fecha_i,$fecha_f);
		
		
		$centros       = new ListaCentro();
		$centrosActivos= $centros->getAll();

		$coaches = new UsuarioCliente();

		$coachActivos = $coaches->getCoaches($iduserclient,$rol,$admin); 
		
		$desgloseCentrosHoras = $this->getDesgloseHoraCentros($fecha_i,$fecha_f,$centrosActivos);
		$desgloseCoachHoras   = $this->getDesgloseHoraCoach($fecha_i,$fecha_f,$coachActivos);
		

		require_once 'views/home/home.php';
	
	}

	public static function getDesgloseCentros($centros,$fecha_i,$fecha_f){

		$arreglo = array();
		$ventasp = new VentasPospago();
		$utils = new Utils();

		$ventasPreT  = 0;
		$ventasPosT  = 0;
		$ventasAcum  = 0;
		$porcentajeT = 0;
		$asistenciaT = 0;
		$factorT     = 0;

		
		while ($centro = $centros->fetch_object()) {
			
			$nameCentro  = $centro->centro;
			$prefijo     = $centro->prefijo;
			$id_cen      = $centro->id;
			$ventasPre   = $centro->ventas;
			$ventasPreT  += $ventasPre;
			$ventasPos   = $ventasp->getVentasPosCentro($id_cen,$fecha_i,$fecha_f);
			$ventasPosT  += $ventasPos;
			$ventasT     = intval($ventasPre) + intval($ventasPos);
			$ventasAcum  += $ventasT;
			$userGroup   = $centro->ugroup;
			$asistencia  = $utils->getAsistenciaCentro($userGroup,$fecha_i,$fecha_f);
			$asistenciaT += $asistencia;
			$factor      = Utils::getPromedio($ventasT,$asistencia);
			$factorT     = Utils::getPromedio($ventasAcum,$asistenciaT);
			$porcentaje  = Utils::getPromedio($ventasPos,$ventasT);
			$porcentajeT = Utils::getPromedio($ventasPosT,$ventasAcum);
		
			
			$arreglo[] = array(
							'centro'    =>$nameCentro,
                            'prefijo'   =>$prefijo,
                            'prepago'   =>$ventasPre,
                            'pospago'   =>$ventasPos,
                            'totales'   =>$ventasT,
                            'porcentaje'=>$porcentaje,
                            'asistencia'=>$asistencia,
                            'factor'    =>$factor,
                          );

		}

		$arreglo[] = array(
							'centro'    =>"TOTAL",
                            'prefijo'   =>"TOTAL",
                            'prepago'   =>$ventasPreT,
                            'pospago'   =>$ventasPosT,
                            'totales'   =>$ventasAcum,
                            'porcentaje'=>$porcentajeT,
                            'asistencia'=>$asistenciaT,
                            'factor'    =>$factorT,
                          );
						  
		return $arreglo;


	}


	public static function getDesglosePospago($datos,$fecha_i,$fecha_f,$rol,$admin){

		// hay que insertar los centros externos en tabla alcance meta para poder optimizar esta parte
		$arreglo = array();
		$ventasPos = new VentasPospago();
        $utils = new Utils();

		$exitosaT    = 0;
		$ingresadaT  = 0;
		$asistenciaT = 0;
		$factorT     = 0;
		$existe      = false;

		
		while ($dato = $datos->fetch_object()) {
						
		    $migradas   = 0;
			$idcoach    = $dato->idSuper;
			$coach      = $dato->coach;
			$group      = $dato->usergroup;
			$asistencia = $utils->getAsistencia($idcoach,$fecha_i,$fecha_f);
			$ingresada  = $ventasPos->getIngresadas($coach,$fecha_i,$fecha_f);


		     if ($idcoach == "24897" && in_array($rol,$admin)) { // permite que en la vista de coach no salga cecilia, solo los del mismo coach
		      	$existe = true;
		        $migradas   = $ventasPos->getMigradasCoach($idcoach,$fecha_i,$fecha_f);
		        $ingresa  = $ventasPos->getIngresadasVal($fecha_i,$fecha_f);
		        $ingresada  = $ventasPos->getIngresadas($coach,$fecha_i,$fecha_f);
		        $ingresada += $ingresa;
		  
		      }

		      if (!empty($group)) {
		        $asistencia = $utils->getAsistenciaCentro($group,$fecha_i,$fecha_f);
		      }

		    $asistenciaT += $asistencia; 
			$exitosa     = $dato->ventas;
			$exitosa     += $migradas;
			$exitosaT    += $exitosa;
			$ingresadaT  += $ingresada;
			$factor      = Utils::getPromedio($exitosa,$asistencia);
			$factorT     = Utils::getPromedio($exitosaT,$asistenciaT);

			$arreglo[] = array(
                'coach'     =>$coach,
                'exitosa'   =>$exitosa,
                'ingresada' =>$ingresada,
                'asistencia'=>$asistencia,
                'factor'    =>$factor,
              );

		}

		if (!$existe && in_array($rol,$admin)){  // permite que en la vista de coach no salga cecilia, solo los del mismo coach

			$idcoach      = "24897";
			$migradas   = $ventasPos->getMigradasCoach("24897",$fecha_i,$fecha_f);
			$ingresada  = $ventasPos->getIngresadasVal($fecha_i,$fecha_f);
			$asistencia = $utils->getAsistencia($idcoach,$fecha_i,$fecha_f);
			$factor     = $utils->getPromedio($migradas,$asistencia);

		    $arreglo[] = array(
                'coach'     =>"MELENDEZ SERRANO CECILIA MICHEL",
                'exitosa'   =>$migradas,
                'ingresada' =>$ingresada,
                'asistencia'=>$asistencia,
                'factor'    =>$factor,
              );


			$exitosaT    += $migradas; 
			$ingresadaT  += $ingresada;
			$asistenciaT += $asistencia;
			$factorT     = Utils::getPromedio($exitosaT,$asistenciaT);
		}


		    $arreglo[] = array(
                'coach'     =>"TOTAL",
                'exitosa'   =>$exitosaT,
                'ingresada' =>$ingresadaT,
                'asistencia'=>$asistenciaT,
                'factor'    =>$factorT,
              );


		return $arreglo;
		
	}

	public static function getDesgloseCoaches($datos,$fecha_i,$fecha_f){

		$pospagoV = new VentasPospago();
		$utils = new Utils();
		$prepagoT   = 0;
		$migradasT  = 0;
		$baseT      = 0;
		$totalF     = 0;
		$asistenciaT= 0;
		$factorT    = 0;
		$segundos   = 0;
		$seg        = 0;
		$segTalk    = 0;
		$segT       = 0;

		while ($dato = $datos->fetch_object()) {

			$idcoach        = $dato->Id;
			$coach        = $dato->Nombre;
			$prepago      = $dato->ventas;
			$prepagoT    += $prepago;
			$migradas     = $pospagoV->getMigradasCoach($dato->Id,$fecha_i,$fecha_f);
			$migradasT   += $migradas;
			$basePos      = $pospagoV->getIngresadas($coach,$fecha_i,$fecha_f);
			$baseT       += $basePos;
			$total        = intval($prepago)+intval($migradas)+intval($basePos);
			$totalF      += $total;
			$asistencia   = $utils->getAsistencia($idcoach,$fecha_i,$fecha_f);
			$asistenciaT += $asistencia;
			$factor       = Utils::getPromedio($total,$asistencia);
			$alcance      = $utils->getHoraConexion($coach,$fecha_i,$fecha_f);
			
			if(!empty($alcance)){
				$horas   = $alcance[0];
				$talk    = $alcance[1];
				$talkseg = $alcance[2];
			}else{
				$horas   = 0;
				$talk    = 0;
				$talkseg = 0;
			}

			
			$seg  = Utils::getSegundosConversor($horas);
			$segundos += $seg;

			$segT  = Utils::getSegundosConversor($talkseg);
			$segTalk += $segT;

			
			$sph = Utils::getSPH($total,$seg);

		    $arreglo[] = array(
                'coach'     =>$coach,
                'prepago'   =>$prepago,
                'migradas'  =>$migradas,
                'base'      =>$basePos,
                'total'     =>$total,
                'asistencia'=>$asistencia,
                'factor'    =>$factor,
				'conexion'  =>$horas,
				'talk'      =>$talk,
				'sph'       =>$sph,
              );
		
		}	

			$factorT       = Utils::getPromedio($totalF,$asistenciaT);
			$conexionTotal = Utils::getHorasConversor($segundos);
			$sphTotal      = Utils::getSPH($totalF,$segundos);
			$talkT       = Utils::getPorcentaje($segundos,$segTalk);

			$arreglo[] = array(
                'coach'     =>"TOTAL",
                'prepago'   =>$prepagoT,
                'migradas'  =>$migradasT,
                'base'      =>$baseT,
                'total'     =>$totalF,
                'asistencia'=>$asistenciaT,
                'factor'    =>$factorT,
				'conexion'  =>$conexionTotal,
				'talk'      =>$talkT,
				'sph'       =>$sphTotal,
              );

		return $arreglo;

	}

	public static function getDesgloseHoraCentros($fecha_i,$fecha_f,$centros){

		$ventascentro = new BitacoraValidacion();

		while($centro = $centros->fetch_object()){

			$ventas = $ventascentro->getHoraCentro($fecha_i,$fecha_f,$centro->Id);
			$horascentro[$centro->Prefijo] = Utils::segmentaHoras($ventas);
		}
		return $horascentro;
	}


	public static function getDesgloseHoraCoach($fecha_i,$fecha_f,$coaches){

		$ventascoach = new BitacoraValidacion();

		while($coach = $coaches->fetch_object()){

			$ventas = $ventascoach->gethoraventaCoach($fecha_i,$fecha_f,$coach->Id);
			$horascoach[$coach->Nombre] = Utils::segmentaHoras($ventas);
	
		}

		return $horascoach;
	}

	public function getDesgloSector($sectores,$fecha_i,$fecha_f){

		$util        = new Utils();
		$ventasT     = 0;
		$asistenciaT = 0;

		
		while($sector = $sectores->fetch_object()){
			
			if($sector->idsector != "62"){
				
				
				$idsector    = $sector->idsector;
				$name_sector = $sector->Nombre;
				$ventas      = $sector->ventas;
				$ventasT     += $sector->ventas;
				$asistencia  = $util->getAsistenciaSector($idsector,$fecha_i,$fecha_f);
				$asistenciaT += $asistencia;			
				$factor      = Utils::getPromedio($ventas,$asistencia);
	
				$arreglo[] = array(
					'sector'     =>$name_sector,
					'ventas'     =>$ventas,
					'asistencia' =>$asistencia,
					'factor'     =>$factor,
				  );
			}

		}
		$factorT      = Utils::getPromedio($ventasT,$asistenciaT);

		$arreglo[] = array(
			'sector'     =>"TOTAL",
			'ventas'     =>$ventasT,
			'asistencia' =>$asistenciaT,
			'factor'     =>$factorT,
		  );
$asistencia;


		return $arreglo;


	}

}// fin de la clase HomeController

?>