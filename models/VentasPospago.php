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

		$sql = "SELECT UCC.Nombre AS coach, COUNT( UCC.Id ) AS ventas,LC.User_group AS usergroup
				FROM VENTAS_POSPAGO_VAL AS VP
				INNER JOIN USUARIO_CLIENTE AS UC ON UC.Id = VP.IdUsuario_vendio
				INNER JOIN USUARIO_CLIENTE AS UCC ON UCC.Id = UC.IdSupervisor
				INNER JOIN LISTA_CENTROS AS LC ON LC.Id = VP.IdCentro
				WHERE (Fecha_capturo >= '$fecha_i' AND Fecha_capturo <= '$fecha_f')
				AND VP.Estado =1 AND VP.IdEstatusPospago =2 AND VP.SINO_migrada = 0 GROUP BY UCC.Id";	

		$res = $this->db->query($sql);

		return $res;
	} 




}// se termina clase ventaspospago


?>