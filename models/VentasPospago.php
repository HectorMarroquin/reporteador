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

	public function getVentasPos($id_centro,$fecha_i,$fecha_f){

		$venta = 0;

		$sql = "SELECT COUNT(*) AS ventas FROM VENTAS_POSPAGO_VAL WHERE Fecha_capturo = '".$fecha_i."' AND Fecha_capturo <= '".$fecha_f."' AND IdEstatusPospago =2 AND Estado =1 AND IdCentro= '".$id_centro."'";
 
		$result = $this->db->query($sql);

		if (!empty($result)) {
			
			$datos = $result->fetch_object();
			$venta = $datos->ventas;
		}

		return $venta;

	}




}// se termina clase ventaspospago


?>