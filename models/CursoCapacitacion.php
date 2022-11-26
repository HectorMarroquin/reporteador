<?php

class CursoCapacitacion
{
	private $id;
	private $idUsuario_cliente;
	private $nombre;
	private $fecha_inicio_capa;
	private $fecha_fin_capa;
	private $fecha_entrega_operacion;
	private $responsable_curso;
	private $idTurno_cartera_capa;
	private $campania;
	private $centro;
	private $grupo;
	private $fecha;
	private $hora;
	private $estado;
	private $db;

	public function __construct(){

		$this->db = Database::connect();
	}

	public function getCurso($fecha_i, $fecha_f){
		
		$sql = "SELECT C.Id,C.Nombre AS curso,T.nombre AS turno,C.Campania, C.Grupo, C.Fecha_inicio_capa,C.Fecha_fin_capa, C.Fecha_entrega_operacion FROM CURSO_CAPACITACION AS C INNER JOIN TURNO_CARTERA_CAPA AS T ON C.IdTurno_cartera_capa = T.Id WHERE C.Fecha_inicio_capa BETWEEN '".$fecha_i."' AND '".$fecha_f."' AND C.Estado = 1 ORDER BY C.Id ASC";
	
		$registros = $this->db->query($sql);

		return $registros;
	}

	public function getConteoCurso($idCurso){
		$sql = "SELECT SUM(CASE WHEN CRC.Estado IN (0,1,2) THEN 1 ELSE 0 END) AS citados, SUM(CASE WHEN CRC.Estado= 1 THEN 1 ELSE 0 END) AS asistidos, SUM(CASE WHEN CRC.SINO_EntregaAO= 1 THEN 1 ELSE 0 END) AS entregados FROM `CURSO_CAPACITACION` AS C INNER JOIN `CARTERA_RECLUTADOS_CAPA` AS CRC ON C.Nombre = CRC.Nro_curso  WHERE C.Id = '".$idCurso."' AND CRC.Estado = 1 GROUP BY CRC.IdUsuario_cliente ORDER BY Asistidos DESC";

		$registros = $this->db->query($sql);

		return $registros;
	}
	
}

	

?>