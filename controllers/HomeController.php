<?php
require_once 'models/BitacoraValidacion.php';
require_once 'models/VentasPospago.php';

class HomeController 
{
	public function index(){

		$fecha_i = date('Y-m-d'); 
		$fecha_f = date('Y-m-d');

		$fecha_i = "2022-08-31";
		$fecha_f = "2022-08-31";

		Utils::checkSession();

		//extrae la hora de la ultima venta ingresada
		$ultRegistro = new BitacoraValidacion();
		$registro = $ultRegistro->ultimoRegistro($fecha_i);
		$reg = $registro ? $registro->Hora : 'S/N';

		//extraer todas las ventas prepago
		$ventasCentros  = new BitacoraValidacion();
		$centros = $ventasCentros->getAll($fecha_i,$fecha_f);

		//extraer centro,prepago,pospago,pos/pre,%pos,asistencia,factor
		$desglose   = $this->getDesgloseCentros($centros,$fecha_i,$fecha_f);

		$ventasPospago = new VentasPospago();
		$pospago       = $ventasPospago->getAll($fecha_i,$fecha_f);

		$ventasCoach = new BitacoraValidacion();
		$coachPrepago       = $ventasCoach->getVentasCoach($fecha_i,$fecha_f);

		$desglosePos   = $this->getDesglosePospago($pospago,$fecha_i,$fecha_f);

		require_once 'views/home/home.php';
	
	}

	public function getDesgloseCentros($centros,$fecha_i,$fecha_f){

		$contadorv = 0;
		$arreglo = array();
		$ventasp = new VentasPospago();

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
			$asistencia  = Utils::getAsistenciaCentro($userGroup,$fecha_i,$fecha_f);
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


	public function getDesglosePospago($datos,$fecha_i,$fecha_f){

		// hay que insertar los centros externos en tabla alcance meta para poder optimizar esta parte
		$arreglo = array();
		$ventasPos = new VentasPospago();

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
			$asistencia = Utils::getAsistencia($coach,$fecha_i,$fecha_f);
			$ingresada  = $ventasPos->getIngresadas($coach,$fecha_i,$fecha_f);


		     if ($idcoach == "24897") {
		      	$existe = true;
		        $migradas   = $ventasPos->getMigradasCoach($idcoach,$fecha_i,$fecha_f);
		        $ingresa  = $ventasPos->getIngresadasVal($fecha_i,$fecha_f);
		        $ingresada  = $ventasPos->getIngresadas($coach,$fecha_i,$fecha_f);
		        $ingresada += $ingresa;
		  
		      }

		      if (!empty($group)) {
		        $asistencia = Utils::getAsistenciaCentro($group,$fecha_i,$fecha_f);
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

		if (!$existe && !empty($arreglo)) {

			$coach      = "MELENDEZ SERRANO CECILIA MICHEL";
			$migradas   = $ventasPos->getMigradasCoach("24897",$fecha_i,$fecha_f);
			$ingresada  = $ventasPos->getIngresadasVal($fecha_i,$fecha_f);
			$asistencia = Utils::getAsistencia($coach,$fecha_i,$fecha_f);
			$factor     = Utils::getPromedio($migradas,$asistencia);

		    $arreglo[] = array(
                'coach'     =>$coach,
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

}// fin de la clase HomeController

?>