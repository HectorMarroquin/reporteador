<?php

class UsuarioReporte 
{
	private $id;
	private $usuario;
	private $nombre;
	private $apellidos;
	private $password;
	private $rol;
	private $imagen;
	private $ultimologin;
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

	function getNombre(){
		return $this->nombre;
	}

	function getApellidos(){
		return $this->apellidos;
	}

	function getPassword(){
		return $this->db->real_escape_string($this->password);
	}

	function getRol(){
		return $this->rol;
	}

	function getImagen(){
		return $this->imagen;
	}

	function getUltimoLogin(){
		return $this->ultimologin;
	}

	function getEstado(){
		return $this->estado;
	}
	

	function setId(){
		$this->id = $this->db->real_escape_string($id);
	}

	function setUsuario($usuario){
		$this->usuario = $this->db->real_escape_string($usuario);
	}

	function setNombre($nombre){
		$this->nombre = $this->db->real_escape_string($nombre);
	}

	function setApellidos($apellidos){
		$this->apellidos = $this->db->real_escape_string($apellidos);
	}

	function setPassword($password){
		$this->password = $password;
	}

	function setRol($rol){
		$this->rol = $rol;
	}

	function setImagen($imagen){
		$this->imagen = $imagen;
	}

	function setUltimoLogin($ultimologin){
		$this->ultimologin = $this->db->real_escape_string($ultimologin);
	}


	function setEstado($estado){
		$this->estado = $this->db->real_escape_string($estado);
	}
	
	
	public function login(){
		
		$result = false;
		$usuario = $this->usuario;
		$pass  = $this->password;
		$password = md5($pass);

		$sql   = "SELECT * FROM USUARIOS_REPORTE WHERE usuario = '$usuario'";
		$login = $this->db->query($sql);

		if ($login && $login->num_rows == 1) {
			
			$usuario = $login->fetch_object();

			if ($password == $usuario->password) {
				$result = $usuario;
			}
		}

		return $result;
	}


}


?>