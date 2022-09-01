<?php
require_once 'models/BitacoraValidacion.php';

class HomeController 
{
	public function index(){

		$fecha_i = date('Y-m-d'); 
		$fecha_f = date('Y-m-d');

		// $fecha_i = "2022-09-30";
		// $fecha_f = "2022-09-30";

		Utils::checkSession();

		$ultRegistro = new BitacoraValidacion();
		$registro = $ultRegistro->ultimoRegistro($fecha_i);
		$reg = $registro ? $registro->Hora : 'S/N';

		$ventasCentros  = new BitacoraValidacion();
		$centros = $ventasCentros->getAll($fecha_i,$fecha_f);

		$desglose = $this->getDesgloseCentros($centros,$fecha_i,$fecha_f);

		$total_acum = $this->getTotalAcumulado($desglose);
		

		require_once 'views/home/home.php';
	
	}

	public function getDesgloseCentros($centros,$fecha_i,$fecha_f){

		$contadorv = 0;
		$arreglo = array();

		while ($centro = $centros->fetch_object()) {
		
			$name_c      = $centro->nombre;
			$id_cen      = $centro->id;
			$ventas_pre  = $centro->ventas;
			$ventas_pos  = Utils::getVentasPos($id_cen,$fecha_i,$fecha_f);
			$ventas_t    = intval($ventas_pre) + intval($ventas_pos);
			$user_group  = $centro->ugroup;
			$asistencia  = Utils::getAsistenciaCentro($user_group,$fecha_i,$fecha_f);
			$factor      = Utils::getFactor($ventas_t,$asistencia);
			$porc_venpos = Utils::getFactor($ventas_pos,$ventas_t);


			$arreglo[$name_c] = array(
                            'nombre'    =>$name_c,
                            'prepago'   =>$ventas_pre,
                            'pospago'   =>$ventas_pos,
                            'totales'   =>$ventas_t,
                            'porcentaje'=>$porc_venpos,
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
			$factor      = Utils::getFactor($pospre,$asiste);
			$por_pos = Utils::getFactor($pospago,$pospre);

			$arreglo["TOTAL"] = array(
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

}// fin de la clase HomeController

?>