<?php
class CarteraReclutado
{
	private $id;
	private $idCliente_sistema;
	private $idUsuario_cliente;//genera registro
	private $idCurso_capacitacion;//Curso
	private $fecha_reclutamiento;//fecha
	private $idEstatus_cartera;//estatus dado
	private $SINO_asistio;
	private $idTurno_cartera;//tunro
	private $idEstatus_reclutado;//estatus del reclutado
	private $idRechazo_cartera;//estatus de rechazo
	private $fecha;
	private $Estado;
	private $db;

	public function __construct(){

		$this->db = Database::connect();
	}


	public function getReclutador($fecha_i, $fecha_f){
		
		$sql = "SELECT U.Id,U.nombre, COUNT(CR.Id) AS citados, SUM(CASE WHEN CR.SINO_asistio = 1 THEN 1 ELSE 0 END) AS entrevistas, SUM(CASE WHEN CR.IdEstatus_reclutado = 4 THEN 1 ELSE 0 END) AS aceptados, SUM(CASE WHEN CR.IdEstatus_reclutado = 3 THEN 1 ELSE 0 END) AS cartera FROM CARTERA_RECLUTADOS AS CR INNER JOIN USUARIO_CLIENTE AS U ON CR.IdUsuario_cliente = U.Id WHERE CR.Estado = 1 AND CR.Fecha_reclutamiento BETWEEN '".$fecha_i."' AND '".$fecha_f."' GROUP BY CR.IdUsuario_cliente ORDER BY citados DESC";


		$registros = $this->db->query($sql);

		return $registros;

	}

	public function getdesgloseReclutador($idCurso){

		$sql = "SELECT C.Id, U.Nombre AS reclutador,SUM(CASE WHEN CRC.Estado IN (0,1,2) THEN 1 ELSE 0 END) AS Citados, SUM(CASE WHEN CRC.Estado= 1 THEN 1 ELSE 0 END) AS Asistidos, SUM(CASE WHEN CRC.SINO_EntregaAO= 1 THEN 1 ELSE 0 END) AS Entregados FROM `CURSO_CAPACITACION` AS C INNER JOIN `CARTERA_RECLUTADOS_CAPA` AS CRC ON C.Nombre = CRC.Nro_curso INNER JOIN `USUARIO_CLIENTE` AS U ON CRC.IdUsuario_cliente = U.Id WHERE C.Id = '".$idCurso."' AND CRC.Estado = 1 GROUP BY CRC.IdUsuario_cliente ORDER BY Asistidos DESC";

		

		$registros = $this->db->query($sql);
		return $registros;
	}

	
}
?>