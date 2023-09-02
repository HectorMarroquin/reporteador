<?php

class UsuarioLogin
{
	private $id;
	private $idUsuarioCliente;
	private $ip;
	private $ip_address;
	private $mac;
	private $state;
	private $extension;
	private $fecha;
	private $hora;
	private $estado;
	private $db;

	public function __construct(){

		$this->db = Database::connect();
	}


	public function consulta_general(){
		
	$sql = "SELECT USUARIO_CLIENTE.Nombre, USUARIO_LOGIN.IP_ADDRESS
	FROM USUARIO_LOGIN
	INNER JOIN USUARIO_CLIENTE ON USUARIO_LOGIN.IdUsuario_cliente = USUARIO_CLIENTE.Id
	WHERE USUARIO_CLIENTE.IdGrupo_sistema =148 AND USUARIO_CLIENTE.Logueado = 1 AND USUARIO_LOGIN.state=1
	GROUP BY IdUsuario_cliente
	LIMIT 6,6";

	$registros = $this->db->query($sql);

	return $registros;

	}


}


?>