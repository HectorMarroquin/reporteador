<?php

class BitacoraValidacion
{
	private $id;
	private $idUsuarioCliente;
	private $dn;
	private $idUsuarioEjecutivo;
	private $ejecutivo;
	private $supervisor;
	private $nip;
	private $curp;
	private $idEstatusBitacoraValidador;
	private $idListaCentros;
	private $motivoPendiente;
	private $motivoRechazo;
	private $fvc;
	private $email;
	private $referido;
	private $referido2;
	private $comentario;
	private $comentario2;
	private $comentario3;
	private $fecha;
	private $hora;
	private $estatusEncuesta;
	private $estado;
	private $db;

	public function __construct(){

		$this->db = Database::connect();
	}

	public function getHora(){

		 return $this->hora;
	}

	public function ultimoRegistro($fecha_i){

		$reg = false;

		$sql = "SELECT Hora FROM BITACORA_VALIDACION WHERE Estado = 1 AND Fecha = '$fecha_i' ORDER BY Id DESC LIMIT 1";

		$registro = $this->db->query($sql);

		if ($registro && $registro->num_rows == 1) {
			
			$reg = $registro->fetch_object();
		}

		return $reg; 

	}

	public function getAll($fecha_i,$fecha_f){

		$sql = "SELECT LC.Centro as centro,LC.Prefijo as prefijo,COUNT(*) as ventas, LC.User_group as ugroup,LC.Id as id FROM BITACORA_VALIDACION AS BV INNER JOIN LISTA_CENTROS AS LC ON LC.Id = BV.Id_ListaCentros WHERE (BV.Fecha >= '$fecha_i' AND BV.Fecha <= '$fecha_f') AND BV.IdEstatus_bitacora_validador = 2 AND BV.Estado = 1 GROUP BY BV.Id_ListaCentros";

		$registros = $this->db->query($sql);

		return $registros; 


	}

	public function getVentasCoach($fecha_i,$fecha_f){

		$sql = "SELECT UC.Nombre, COUNT( BV.Id ) AS ventas FROM BITACORA_VALIDACION AS BV INNER JOIN USUARIO_CLIENTE AS UC ON UC.Id = BV.IdUsuario_supervisor WHERE (BV.Fecha >= '$fecha_i' AND BV.Fecha <= '$fecha_f') AND BV.Estado =1 GROUP BY BV.IdUsuario_supervisor";

		$registros = $this->db->query($sql);

		$result = $registros->fetch_object();


	}
}


?>