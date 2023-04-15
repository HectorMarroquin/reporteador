<?php
require_once "models/CmReporteador.php";
require_once 'models/UsuarioCliente.php';
class VentasAltasUsuariosController 
{
	public function index(){
		
		Utils::checkSession();

		$rol          = $_SESSION['identity']->idgrupo;
		$iduserclient = $_SESSION['identity']->Id;
		$admin        = ['42','220','227','157','32','193','237','212'];
		
		$fechas_alta = Utils::ObtenerFechasPrincipales();
		$fechas_enc  = Utils::recorreFechas($fechas_alta);
		
		$fechas_enc      = ['Inicio' => "2023-03-31",'Fin' => "2023-04-28"];
		$fechas_alta     = ['Inicio' => "2023-04-01",'Fin' => "2023-04-31"];
		
		//extrae el fecha y hora del ultimo reg cargado del cm
		$ultRegistro = new CmReporteador();
		$registro = $ultRegistro->ultimoRegistro();
		$reg = $registro ? $registro->Fecha . " " .$registro->Hora : 'S/N';

		$mes_actual = Utils::getMes($registro->Fecha);
		
		$desglose     = $this->desgloseAltas($fechas_alta, $fechas_enc,$rol,$iduserclient,$admin);
		$desglosCoach = $this->VentaAltasCoach($desglose);

		$desgloSector = $this->ventasAltasSector($desglosCoach);
		
		require_once 'views/ventasaltas/ventasaltas.php';
	}

	public static function desgloseAltas($fechas_alta, $fechas_enc,$rol,$iduserclient,$admin) {

		$datos    = new CmReporteador();
		$usuarios = $datos->getDataCm($fechas_enc,$rol,$iduserclient,$admin);
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

			$venta 	         = $datos->getVenta($usertlmk, $fechas_enc);
			$fvc 	         = $datos->getFVC($usertlmk, $fechas_enc, $fechas_alta);
			$porcentajefvc   = Utils::getPorcentaje($venta, $fvc);
			$alta 	         = $datos->getAltas($usertlmk, $fechas_enc, $fechas_alta);
			$altasfinal      = Utils::getAltasfinal($alta);
			$porcentajealtas = Utils::getPorcentaje($fvc, $altasfinal);

			$ventasT += $venta;
			$fvcT    += $fvc;
			$altaT   += $altasfinal;

			if(empty($user)){

				$user = "S/N";
				$idcoach = 0;
				$nomina = 0;
				$coach   = "SIN COACH";
			}

			$array[]  = array(
				"nomina" 		  => $nomina,
				"tlmk" 		      => $usertlmk,
				"user" 		      => $user,
				"venta" 	      => $venta,
				"fvc" 		      => $fvc,
				"porcentajefvc"   => $porcentajefvc,
				"alta" 		      => $altasfinal,
				"porcentajealta" => $porcentajealtas,
				"nomCoach" 	      => $coach,
				"idcoach" 	      => $idcoach
			);
			
		}

		$porcenfvc   = Utils::getPorcentaje($ventasT, $fvcT);
		$porcenaltas = Utils::getPorcentaje($fvcT, $altaT);

		$array[]  = array(
			"nomina" 		  => "",
			"tlmk" 		      => "",
			"user" 		      => "TOTAL",
			"venta" 	      => $ventasT,
			"fvc" 		      => $fvcT,
			"porcentajefvc"   => $porcenfvc,
			"alta" 		      => $altaT,
			"porcentajealta"  => $porcenaltas,
			"nomCoach" 	      => "---",
			"idcoach" 	      => "---"
		);

		return $array;
	}

	public static function VentaAltasCoach($desglose){

		$altascoach = new CmReporteador();
		$getcoach = $altascoach->Coaches();

		while ($coaches = $getcoach->fetch_object()) {
			
			$id    = $coaches->Id;
			$coach = $coaches->Nombre;
			$campania = $coaches->idcampania;
			$venta = $FVC = $altas = $porcentajeFvc = $porcentajeAlta = 0; 	
			
			foreach ($desglose as $value) {
				
				$idCoach = $value["idcoach"];
				$ventas  = $value["venta"];
				$fvc     = $value["fvc"];
				$alta    = $value["alta"];

				if ($id == $idCoach) {
					$venta += $ventas;
					$FVC += $fvc;
					$altas += $alta;
					$porcentajeFvc  = Utils::getPorcentaje($ventas, $fvc);
					$porcentajeAlta = Utils::getPorcentaje($fvc, $alta);
					
				}elseif($id == "27569" && $idCoach == "0"){

					$coach = "SIN COACH";
					$venta += $ventas;
					$FVC += $fvc;
					$altas += $alta;
					$porcentajeFvc = Utils::getPorcentaje($ventas, $fvc);
					$porcentajeAlta= Utils::getPorcentaje($fvc, $alta);

				}
			}

			if($venta != "0"){

				$altasxCoach[] = array(
					"idcampania" => $campania,
					"coach" => $coach,
					"venta" => $venta,
					"fvc" 	=> $FVC,
					"altas" => $altas,
					"porcentajefvc" => $porcentajeFvc,
					"porcentajealta" => $porcentajeAlta,
				);
			}
			
			$arrayventa[] = $venta;
			$arrayfvc[]   = $FVC;
			$arrayaltas[] = $altas;
		}

		$totalventa     = array_sum($arrayventa);
		$totalfvc       = array_sum($arrayfvc);
		$totalaltas     = array_sum($arrayaltas);
		$porcentajeFvc  = Utils::getPorcentaje($totalventa, $totalfvc);
		$porcentajeAlta = Utils::getPorcentaje($totalfvc, $totalaltas);

		$altasxCoach[] = array(
			    "idcampania"    => "",
				"coach"         => "TOTAL",
				"venta"         => $totalventa,
				"fvc" 	        => $totalfvc,
				"altas"         => $totalaltas,
				"porcentajefvc" => $porcentajeFvc,
				"porcentajealta"=> $porcentajeAlta,
		);
		
		return $altasxCoach;
	}

	public function ventasAltasSector($desgloses){

		$datos = new CmReporteador();
		$campanias = $datos->getCampanias();
		$altasxSector = [];
		$ventasf = 0;
		$fvcf    = 0;
		$altasf  = 0;

		while($campania = $campanias->fetch_object()){

			$idcamp   = $campania->Id; 
			$campname = $campania->Nombre; 
			$ventas   = 0;
			$fvcs     = 0;
			$altas    = 0;

			foreach($desgloses as $desglose){

				$idcampania = $desglose['idcampania'];
				$venta      = $desglose['venta'];
				$fvc        = $desglose['fvc'];
				$alta       = $desglose['altas'];

				if($idcamp == $idcampania){

					$ventas   += $venta;
					$fvcs     += $fvc;
					$altas    += $alta;
					$fvcporc  = Utils::getPorcentaje($venta,$fvc);
					$altaporc = Utils::getPorcentaje($fvc,$altas);

				}
			}

			if($ventas != "0"){

				$ventasf += $ventas;
				$fvcf    += $fvcs;
				$altasf  += $altas;

				$altasxSector[] = array(
					"lugar"     => $campname,
					"ventas"    => $ventas,
					"fvc"       => $fvcs,
					"fvcporc" 	=> $fvcporc,
					"alta"      => $altas,
					"altaporc"  => $altaporc,
				);

			}

		}

		$fvcporcf  = Utils::getPorcentaje($ventasf,$fvcf);
		$altaporcf = Utils::getPorcentaje($fvcf,$altasf);

		$altasxSector[] = array(
			"lugar"     => "TOTAL",
			"ventas"    => $ventasf,
			"fvc"       => $fvcf,
			"fvcporc" 	=> $fvcporcf,
			"alta"      => $altasf,
			"altaporc"  => $altaporcf,
		);

		return $altasxSector;

	}
	
}
?>
