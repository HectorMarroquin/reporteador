<?php

class VentasPospago
{

	private $db;

	public function __construct(){

		$this->db = Database::connect();
	}

	public function getVentasPosCentro($id_centro,$fecha_i,$fecha_f){

		$venta = 0;

		$sql = "SELECT COUNT(*) AS ventas FROM VENTAS_POSPAGO_VAL WHERE (Fecha_capturo >= '".$fecha_i."' AND Fecha_capturo <= '".$fecha_f."') AND IdEstatusBitacoraValPos =1 AND Estado =1 AND IdCentro= '".$id_centro."'";

		$result = $this->db->query($sql);

		if (!empty($result)) {
			
			$datos = $result->fetch_object();
			$venta = $datos->ventas;
		}

		return $venta;

	}

	public function getAll($fecha_i,$fecha_f,$rol,$admin,$iduserclient){

		if(in_array($rol,$admin) || $rol == "237"){

			$sql = "SELECT UC.IdSupervisor as idSuper,UCC.Nombre AS coach, COUNT( UCC.Id ) AS ventas,LC.User_group AS usergroup,LC.Prefijo as prefijo
					FROM VENTAS_POSPAGO_VAL AS VP
					INNER JOIN USUARIO_CLIENTE AS UC ON UC.Id = VP.IdUsuario_vendio
					INNER JOIN USUARIO_CLIENTE AS UCC ON UCC.Id = UC.IdSupervisor
					INNER JOIN LISTA_CENTROS AS LC ON LC.Id = VP.IdCentro
					WHERE (Fecha_capturo >= '$fecha_i' AND Fecha_capturo <= '$fecha_f')
					AND VP.Estado =1 AND VP.IdEstatusPospago =2 AND VP.SINO_migrada IN(3) GROUP BY UCC.Id";

		}else{

			$sql = "SELECT UC.IdSupervisor as idSuper,UCC.Nombre AS coach, COUNT( UCC.Id ) AS ventas,LC.User_group AS usergroup, LC.Prefijo as prefijo
					FROM VENTAS_POSPAGO_VAL AS VP
					INNER JOIN USUARIO_CLIENTE AS UC ON UC.Id = VP.IdUsuario_vendio
					INNER JOIN USUARIO_CLIENTE AS UCC ON UCC.Id = UC.IdSupervisor
					INNER JOIN LISTA_CENTROS AS LC ON LC.Id = VP.IdCentro
					WHERE (Fecha_capturo >= '$fecha_i' AND Fecha_capturo <= '$fecha_f' AND UC.IdSupervisor = '".$iduserclient."' )
					AND (VP.Estado =1 AND VP.IdEstatusPospago =2 AND VP.SINO_migrada IN(3) ) GROUP BY UCC.Id";



		}

		$res = $this->db->query($sql);

		return $res;
	} 

	public function getIngresadas($coach,$fecha_i,$fecha_f){

		$sql = "SELECT UCC.Nombre AS coach, COUNT( UCC.Id ) AS ventas
				FROM VENTAS_POSPAGO_VAL AS VP
				INNER JOIN USUARIO_CLIENTE AS UC ON UC.Id = VP.IdUsuario_vendio
				INNER JOIN USUARIO_CLIENTE AS UCC ON UCC.Id = UC.IdSupervisor
				WHERE (Fecha_capturo >= '$fecha_i' AND Fecha_capturo <= '$fecha_f')
				AND VP.Estado =1 AND VP.IdEstatusPospago =2  AND VP.IdEstatusBitacoraValPos = 1 AND VP.SINO_migrada IN(3) AND UCC.Nombre = '".$coach."'";

		$resultado = $this->db->query($sql);
		$ingresa   = $resultado->fetch_object();
		$ingresada = $ingresa->ventas;

		if (empty($ingresada)) {
			$ingresada = 0;
		}
		
		return $ingresada;

	}

	public function getIngresadasVal($fecha_i,$fecha_f){

		$ingresada = 0;

		$sql = "SELECT SUM(SINO_migrada) AS migradas FROM VENTAS_POSPAGO_VAL WHERE (Fecha_capturo >= '".$fecha_i."' AND Fecha_capturo <= '".$fecha_f."') AND IdEstatusBitacoraValPos = 1 AND IdEstatusPospago = 2 AND Estado = 1 AND SINO_migrada = 1";

		
		$result = $this->db->query($sql);
		$ingresa = $result->fetch_object();
				
		if (!empty($ingresa)) {
			$ingresada = $ingresa->migradas;	
		}

		return $ingresada;

	}

	public function getMigradasCoach($idcoach,$fecha_i,$fecha_f){

	$complement = "";

	if ($idcoach != "24897") {

		$complement = "UC.IdSupervisor=".$idcoach ." AND";
	}

	$sql = "SELECT SUM(VP.SINO_migrada) AS migradas FROM VENTAS_POSPAGO_VAL AS VP INNER JOIN USUARIO_CLIENTE AS UC ON UC.Id = VP.IdUsuario_vendio INNER JOIN USUARIO_CLIENTE AS UCC ON UCC.Id = UC.IdSupervisor WHERE (VP.Fecha_capturo >= '$fecha_i' AND VP.Fecha_capturo <= '$fecha_f') AND VP.IdEstatusPospago =2 AND VP.SINO_migrada =1 AND $complement VP.Estado =1";
    $migradas = $this->db->query($sql);

    $result = $migradas->fetch_object();
	$result = $result->migradas;
    
	if (empty($result)) {
		
		$result = 0;

	}
    	return $result;
	} 	

}// se termina clase ventaspospago


?>