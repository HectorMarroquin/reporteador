<?php

class VentasPospago
{
	private $id;
	private $idUsuarioCliente;
	private $idUsuarioVendio;
	private $idCentro;
	private $usuarioVenta;
	private $IdPlanContrato;
	private $dn;
	private $metodoEntrega;
	private $cac;
	private $sinoScore;
	private $nip;
	private $fechaCapturo;
	private $horaCapturo;
	private $idDatosClientes;
	private $idEstatusPospago;
	private $comentario;
	private $idEstatusBitacoraVal;
	private $idEstatusRechazo;
	private $fechaFVC;
	private $fechaCorte;
	private $fechaLimite;
	private $sinoMigrada;
	private $estado;
	private $db;

	public function __construct(){

		$this->db = Database::connect();
	}

	public function getVentasPosCentro($id_centro,$fecha_i,$fecha_f){

		$venta = 0;

		$sql = "SELECT COUNT(*) AS ventas FROM VENTAS_POSPAGO_VAL WHERE Fecha_capturo = '".$fecha_i."' AND Fecha_capturo <= '".$fecha_f."' AND IdEstatusPospago =2 AND Estado =1 AND IdCentro= '".$id_centro."'";
 
		$result = $this->db->query($sql);

		if (!empty($result)) {
			
			$datos = $result->fetch_object();
			$venta = $datos->ventas;
		}

		return $venta;

	}

	public function getAll($fecha_i,$fecha_f){

		$sql = "SELECT UC.IdSupervisor as idSuper,UCC.Nombre AS coach, COUNT( UCC.Id ) AS ventas,LC.User_group AS usergroup
				FROM VENTAS_POSPAGO_VAL AS VP
				INNER JOIN USUARIO_CLIENTE AS UC ON UC.Id = VP.IdUsuario_vendio
				INNER JOIN USUARIO_CLIENTE AS UCC ON UCC.Id = UC.IdSupervisor
				INNER JOIN LISTA_CENTROS AS LC ON LC.Id = VP.IdCentro
				WHERE (Fecha_capturo >= '$fecha_i' AND Fecha_capturo <= '$fecha_f')
				AND VP.Estado =1 AND VP.IdEstatusPospago =2 AND VP.SINO_migrada = 0 GROUP BY UCC.Id";

		$res = $this->db->query($sql);

		return $res;
	} 

	public function getIngresadas($coach,$fecha_i,$fecha_f){

		$ingresada = 0;

		$sql = "SELECT UCC.Nombre AS coach, COUNT( UCC.Id ) AS ventas
				FROM VENTAS_POSPAGO_VAL AS VP
				INNER JOIN USUARIO_CLIENTE AS UC ON UC.Id = VP.IdUsuario_vendio
				INNER JOIN USUARIO_CLIENTE AS UCC ON UCC.Id = UC.IdSupervisor
				WHERE (Fecha_capturo >= '$fecha_i' AND Fecha_capturo <= '$fecha_f')
				AND VP.Estado =1 AND VP.IdEstatusPospago =2  AND VP.IdEstatusBitacoraValPos = 1 AND VP.SINO_migrada = 0 AND UCC.Nombre = '".$coach."'";

		$ingresada = $this->db->query($sql);
		$ingresada = $ingresada->fetch_object();


		return $ingresada->ventas;

	}

	public function getIngresadasVal($fecha_i,$fecha_f){

		$ingresada = 0;

		$sql = "SELECT SUM(SINO_migrada) AS migradas FROM VENTAS_POSPAGO_VAL WHERE (Fecha_capturo >= '".$fecha_i."' AND Fecha_capturo <= '".$fecha_f."') AND IdEstatusBitacoraValPos =1 AND IdEstatusPospago = 2 AND Estado = 1";


		$ingresada = $this->db->query($sql);
		$ingresada = $ingresada->fetch_object();


		return $ingresada->migradas;

	}

	public function getMigradasCoach($idcoach,$fecha_i,$fecha_f){

	$result = 0;
	$complement = "";

	if ($idcoach != "24897") {

		$complement = "UC.IdSupervisor=".$idcoach ." AND";
	}

	$sql = "SELECT SUM(VP.SINO_migrada) AS migradas FROM VENTAS_POSPAGO_VAL AS VP INNER JOIN USUARIO_CLIENTE AS UC ON UC.Id = VP.IdUsuario_vendio INNER JOIN USUARIO_CLIENTE AS UCC ON UCC.Id = UC.IdSupervisor WHERE (VP.Fecha_capturo >= '$fecha_i' AND VP.Fecha_capturo <= '$fecha_f') AND VP.IdEstatusPospago =2 AND $complement VP.Estado =1";

    $migradas = $this->db->query($sql);

    if ($migradas && !empty($migradas)) {
    	
    	$result = $migradas->fetch_object();
    	$result = $result->migradas;
    }

    	return $result;

	} 	

}// se termina clase ventaspospago


?>