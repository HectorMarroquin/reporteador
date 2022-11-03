<?php
require_once "models/CmReporteador.php";
require_once 'models/UsuarioCliente.php';
class VentasAltasUsuariosController 
{
	public function index(){
		
		Utils::checkSession();
		
		$usuarios = new CmReporteador();
		$fechas = Utils::ObtenerFechasPrincipales();
		$fechas_ant = Utils::recorreFechas($fechas);

		$fechas     = ['Inicio' => "2022-10-01",'Fin' => "2022-10-31"];
		$fechas_ant = ['Inicio' => "2022-09-29",'Fin' => "2022-10-30"];
		
		$desglose = $this->desgloseAltas($fechas, $fechas_ant);
		//$desglosAltasCoach = $this->VentaAltasCoach($desglose);
		
		require_once 'views/ventasaltas/ventasaltas.php';
	}

	public static function desgloseAltas($fechas, $fechas_ant) {

		$datos    = new CmReporteador();
		$usuarios = $datos->getDataCm($fechas_ant);
		$array    = [];
		$ventasT  = 0;
		$fvcT     = 0;
		$altaT    = 0;

		while ($usuario = $usuarios->fetch_object()) {
			
			$usertlmk = $usuario->tlmk;
			$idcoach  = $usuario->idcoach;
			$coach    = $usuario->coach;
			$user     = $usuario->ejecutivo;
			$nomina   = $usuario->nomina;

			$venta 	         = $datos->getVenta($usertlmk, $fechas_ant);
			$fvc 	         = $datos->getFVC($usertlmk, $fechas_ant, $fechas);
			$porcentajefvc   = $datos->getPorcentajes($venta, $fvc);
			$alta 	         = $datos->getAltas($usertlmk, $fechas, $fechas_ant);
			$porcentajealtas = $datos->getPorcentajes($fvc, $alta);

			$ventasT += $venta;
			$fvcT    += $fvc;
			$altaT   += $alta;

			if(empty($user)){

				$user = "S/N";
				$idcoach = 0;
				$nomina = 0;
				$coach   = "S/N";
			}

			$array[]  = array(
				"nomina" 		  => $nomina,
				"tlmk" 		      => $usertlmk,
				"user" 		      => $user,
				"venta" 	      => $venta,
				"fvc" 		      => $fvc,
				"porcentajefvc"   => $porcentajefvc,
				"alta" 		      => $alta,
				"porcentajealta" => $porcentajealtas,
				"nomCoach" 	      => $coach
			);
			
		}

		$porcenfvc   = $datos->getPorcentajes($ventasT, $fvcT);
		$porcenaltas = $datos->getPorcentajes($fvcT, $altaT);

		$array[]  = array(
			"nomina" 		  => "",
			"tlmk" 		      => "",
			"user" 		      => "TOTAL",
			"venta" 	      => $ventasT,
			"fvc" 		      => $fvcT,
			"porcentajefvc"   => $porcenfvc,
			"alta" 		      => $altaT,
			"porcentajealta"  => $porcenaltas,
			"nomCoach" 	      => ""
		);

		return $array;
	}

	public static function VentaAltasCoach($desglose){
		$altascoach = new CmReporteador();
		$getcoach = $altascoach->Coaches();

		while ($coaches = $getcoach->fetch_object()) {
			
			$id = $coaches->Id;
			$coach = $coaches->Nombre;
			
			$venta = $FVC = $altas = $porcentajeFvc = $porcentajeAlta = 0; 	
			
			foreach ($desglose as $value) {
				
				$idCoach = $value["id"];
				$ventas  = $value["venta"];
				$fvc     = $value["fvc"];
				$alta    = $value["alta"];

				if ($id == $idCoach) {
					$venta += $ventas;
					$FVC += $fvc;
					$altas += $alta;
					$porcentajeFvc = $altascoach->getPorcentajes($venta, $fvc);
					$porcentajeAlta = $altascoach->getPorcentajes($fvc, $altas);
					
				}
			}
		
			$altasxCoach[] = array(
				"coach" => $coach,
				"venta" => $venta,
				"fvc" 	=> $FVC,
				"altas" => $altas,
				"porcentajefvc" => $porcentajeFvc,
				"porcentajealta" => $porcentajeAlta,
			);
			
			$arrayventa[] = $venta;
			$arrayfvc[] = $FVC;
			$arrayaltas[] = $altas;
		}
		$totalventa = array_sum($arrayventa);
		$totalfvc = array_sum($arrayfvc);
		$totalaltas = array_sum($arrayaltas);
		$porcentajeFvc = $altascoach->getPorcentajes($totalventa, $totalfvc);
		$porcentajeAlta = $altascoach->getPorcentajes($totalfvc, $totalaltas);

		$altasxCoach[] = array(
				"coach" => "TOTAL",
				"venta" => $totalventa,
				"fvc" 	=> $totalfvc,
				"altas" => $totalaltas,
				"porcentajefvc" => $porcentajeFvc,
				"porcentajealta" => $porcentajeAlta,
		);
		
		return $altasxCoach;
	}
	
}
?>
