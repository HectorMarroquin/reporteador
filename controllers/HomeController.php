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
		$total_acum = $this->getTotalAcumulado($desglose);
		
		$ventasPospago = new VentasPospago();
		$pospago       = $ventasPospago->getAll($fecha_i,$fecha_f);

		$desglosePos   = $this->getDesglosePospago($pospago,$fecha_i,$fecha_f);

		require_once 'views/home/home.php';
	
	}

	public function getDesgloseCentros($centros,$fecha_i,$fecha_f){

		$contadorv = 0;
		$arreglo = array();
		$ventasp = new VentasPospago();

		while ($centro = $centros->fetch_object()) {
			
			$nameCentro = $centro->centro;
			$prefijo    = $centro->prefijo;
			$id_cen     = $centro->id;
			$ventasPre  = $centro->ventas;
			$ventasPos  = $ventasp->getVentasPosCentro($id_cen,$fecha_i,$fecha_f);
			$ventasT    = intval($ventasPre) + intval($ventasPos);
			$userGroup  = $centro->ugroup;
			$asistencia = Utils::getAsistenciaCentro($userGroup,$fecha_i,$fecha_f);
			$factor     = Utils::getPromedio($ventasT,$asistencia);
			$porcentaje = Utils::getPromedio($ventasPos,$ventasT);

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

		return $arreglo;

	}

	public function getTotalAcumulado($datos){

		$prepago = 0;
		$pospago = 0;
		$pospre  = 0;
		$asiste  = 0;
		$arreglo = array();

		foreach ($datos as $key => $dato) {
				
				$prepago += $dato['prepago'];
				$pospago += $dato['pospago'];
				$pospre  += $dato['totales'];
				$asiste  += $dato['asistencia'];

		}
			$factor  = Utils::getPromedio($pospre,$asiste);
			$por_pos = Utils::getPromedio($pospago,$pospre);

			$arreglo[] = array(
                'nombre'    =>"TOTAL",
                'prepago'   =>$prepago,
                'pospago'   =>$pospago,
                'totales'   =>$pospre,
                'porcentaje'=>$por_pos,
                'asistencia'=>$asiste,
                'factor'    =>$factor,
              );

			return $arreglo;
	}


	public function getDesglosePospago($datos,$fecha_i,$fecha_f){

		// hay que insertar los centros externos en tabla alcancemeta para poder optimizar esta parte
		$arreglo = array();

		while ($dato = $datos->fetch_object()) {
				
			$coach = $dato->coach;
			$group = $dato->usergroup;
			$asistencia = Utils::getAsistencia($coach,$fecha_i,$fecha_f);

		      if (!empty($group)) {

		        $asistencia = Utils::getAsistenciaCentro($group,$fecha_i,$fecha_f);
		      }

			$exitosa    = $dato->ventas;
			$ingresada  = "3";
			$factor     = Utils::getPromedio($exitosa,$asistencia);

			$arreglo[] = array(
                'coach'     =>$coach,
                'exitosa'   =>$exitosa,
                'ingresada' =>$ingresada,
                'asistencia'=>$asistencia,
                'factor'    =>$factor,
              );
		}

		return $arreglo;
		
	}




}// fin de la clase HomeController

?>