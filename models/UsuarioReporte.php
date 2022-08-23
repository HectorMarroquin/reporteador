<?php

class UsuarioReporte 
{
	private $id;
	private $usuario;
	private $password;
	private $ultimologin;
	private $permisos;
	private $estado;
	private $db;

	public function __construct(){

		$this->db = Database::connect();
	}


	function getId(){
		return $this->id;
	}

	function getUsuario(){
		return $this->usuario;
	}

	function getPassword(){
		return $this->db->real_escape_string($this->password);
	}

	function getUltimoLogin(){
		return $this->Ultimo_login;
	}
	
	function getPermisos(){
		return $this->Permisos;
	}

	function getEstado(){
		return $this->Estado;
	}

	function setId(){
		$this->Id = $this->db->real_escape_string($id);
	}

	function setUsuario($usuario){
		$this->usuario = $this->db->real_escape_string($usuario);
	}

	function setPassword($password){
		$this->password = $password;
	}

	function setUltimoLogin(){
		$this->Ultimo_login = $this->db->real_escape_string($ultimologin);
	}

	function setPermisos(){
		$this->Permisos = $this->db->real_escape_string($permisos);
	}

	function setEstado(){
		$this->Estado = $this->db->real_escape_string($estado);
	}
	
	
	public function login(){
		
		$result = false;
		$email = $this->usuario;
		$pass  = $this->password;
		$password = md5($pass);

		$sql   = "SELECT * FROM USUARIOS_REPORTEADOR WHERE Usuario = '$email'";
		$login = $this->db->query($sql);

		if ($login && $login->num_rows == 1) {
			
			$usuario = $login->fetch_object();

			if ($password == $usuario->Password) {
				$result = $usuario;
			}
		}

		return $result;
	}


}


?>