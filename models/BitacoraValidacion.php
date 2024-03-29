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

	public function getAll($fecha_i,$fecha_f,$allcentros){

		$registros = [];
	
		while ($cen = $allcentros->fetch_object()) {

			$idcentro = $cen->Id; 

			$sql = "SELECT LC.IdUsuarioCliente as iduser ,LC.Centro as centro,LC.Prefijo as prefijo,COUNT(*) as ventas, LC.User_group as ugroup,LC.Id as id FROM BITACORA_VALIDACION AS BV INNER JOIN LISTA_CENTROS AS LC ON LC.Id = BV.Id_ListaCentros WHERE (BV.Fecha >= '$fecha_i' AND BV.Fecha <= '$fecha_f') AND BV.IdEstatus_bitacora_validador = 2 AND BV.Estado = 1 AND BV.Id_ListaCentros = '".$idcentro."' ";

			$centros = $this->db->query($sql);

			while ($centro = $centros->fetch_object()) {

				$registros[$centro->id] = array(
					'iduser'  =>$centro->iduser,
					'centro'  =>$centro->centro,
					'prefijo' =>$centro->prefijo,
					'ventas'  =>$centro->ventas,
					'ugroup'  =>$centro->ugroup,
					'id'      =>$centro->id
				  );

			}

		}

		return $registros;
	}

	public function getVentasCoach($fecha_i,$fecha_f){

		$sql = "SELECT UC.Id,UC.Nombre, COUNT( BV.Id ) AS ventas FROM BITACORA_VALIDACION AS BV INNER JOIN USUARIO_CLIENTE AS UC ON UC.Id = BV.IdUsuario_supervisor WHERE (BV.Fecha >= '$fecha_i' AND BV.Fecha <= '$fecha_f') AND (BV.Estado =1 AND UC.IdCampania NOT IN (62) AND IdEstatus_bitacora_validador = 2) GROUP BY BV.IdUsuario_supervisor";

		$registros = $this->db->query($sql);

		return $registros;

	}

	public function gethoraventaCoach($fecha_i,$fecha_f, $coach){

		if($coach == "22919239"){
			$horacoachdb = "SELECT Supervisor, Hora FROM `BITACORA_VALIDACION` where (Fecha >= '$fecha_i' AND Fecha <= '$fecha_f') AND IdEstatus_bitacora_validador = 2 AND IdUsuario_supervisor IN ('$coach','22920642','22921141') ";
		}else{

			$horacoachdb = "SELECT Supervisor, Hora FROM `BITACORA_VALIDACION` where (Fecha >= '$fecha_i' AND Fecha <= '$fecha_f') AND IdEstatus_bitacora_validador = 2 AND IdUsuario_supervisor = '$coach'";
		}


		$horaCoach = $this->db->query($horacoachdb);
		return $horaCoach;
		
	}

	public function getHoraCentro($fecha_i,$fecha_f,$idcoach){

		$sql = "SELECT Hora FROM BITACORA_VALIDACION WHERE (Fecha >= '".$fecha_i."' AND Fecha <= '".$fecha_f."') AND Id_ListaCentros = ".$idcoach." AND IdEstatus_bitacora_validador = 2 AND Estado = 1";

		$result = $this->db->query($sql);
		return $result;

	}

}


?>