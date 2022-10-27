<?php
require_once "models/CM_Reporteador.php";
require_once 'models/UsuarioCliente.php';
class VentasAltasUsuariosController 
{
	public function index(){
		
		Utils::checkSession();
		
		$usuarios = new CM_Reporteador();
		$fechas = $usuarios->ObtenerFechasPrincipales();
		$getfechas = $usuarios->recorreFechas($fechas);
		
		$desglose = $this->desgloseAltas($fechas, $getfechas);
		$desglosAltasCoach = $this->VentaAltasCoach($desglose);
		
		require_once 'views/ventasaltas/ventasaltas.php';
	}

	public static function desgloseAltas($fechas, $getfechas) {
		$altas = new CM_Reporteador();
		$usuarioalta = $altas->getusuariotlmk($fechas);
		
		while ($getTelemarketing = $usuarioalta->fetch_object()) {
			$getTlmk = $getTelemarketing->Usuario;

			$usariotlmk = $altas->getTlmk($getTlmk); 
			
			while ($datostlmk = $usariotlmk->fetch_object()) {
				$coach   = $datostlmk->IdSupervisor;
				$tlmk    = $datostlmk->TLMK;
				$nomTlmk = $datostlmk->Nombre;

				$nomcoach = $altas->getcoachxtlmk($coach);
				$venta 	  = $altas->getVenta($tlmk, $getfechas);
				$fvc 	  = $altas->getFVC($tlmk, $getfechas, $fechas);
				$porcentajefvc = $altas->getPorcentajes($venta, $fvc);
				$alta 	  = $altas->getAltas($tlmk, $fechas, $getfechas);
				$porcentajealtas = $altas->getPorcentajes($fvc, $alta);
				
				$array[]  = array(
					"id" 		=> $coach,
					"nomCoach" 	=> $nomcoach,
					"tlmk" 		=> $tlmk,
					"venta" 	=> $venta,
					"fvc" 		=> $fvc,
					"porcentajefvc" => $porcentajefvc,
					"alta" 		=> $alta,
					"porcentajealtas" => $porcentajealtas
				);
			}
		}
		return $array;
	}

	public static function VentaAltasCoach($desglose){
		$altascoach = new CM_Reporteador();
		$getcoach = $altascoach->Coaches();
		while ($coaches = $getcoach->fetch_object()) {
			$id = $coaches->Id;
			$coach = $coaches->Nombre;
			
			$venta = $FVC = $altas = $porcentajeFvc = $porcentajeAlta = 0; 	
			
			foreach ($desglose as $value) {
				
				$idCoach = $value["id"];
				$ventas = $value["venta"];
				$fvc = $value["fvc"];
				$alta = $value["alta"];

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