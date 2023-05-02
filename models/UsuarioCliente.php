<?php

class UsuarioCliente 
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

		$sql   = "SELECT Id,Nro_nomina,Usuario,IdGrupo_sistema as idgrupo,Pass,Nombre FROM USUARIO_CLIENTE WHERE Usuario = '$usuario' AND IdGrupo_sistema IN(42,220,227,157,193,150,226,237,32,16,21,12) AND Nro_nomina NOT IN ('VGCONTACT','AGLCONTACT') AND Estado = 1";
		$login = $this->db->query($sql);

		if ($login && $login->num_rows == 1) {
			
			$usuario = $login->fetch_object();

			if ($password == $usuario->Pass) {
				$result = $usuario;
			}
		}

		return $result;
	}



	public function getCoaches($iduserclient,$rol,$admin){

		if(in_array($rol,$admin) || $iduserclient == '4561' ){

			$table = "SELECT Nombre, Id FROM `USUARIO_CLIENTE` WHERE IdGrupo_sistema =150 AND Estado =1";

		}else{

			$table = "SELECT Nombre, Id FROM `USUARIO_CLIENTE` WHERE Id = '".$iduserclient."' AND Estado =1";
		}
        
        $data = $this->db->query($table);
        return $data;
    }

	public static function getUsuariosCoach($idsuper){
        $table = "SELECT Id,Nombre,Nro_nomina FROM USUARIO_CLIENTE WHERE IdSupervisor = '".$idsuper."' AND Estado =1";
		$data = Database::connect()->query($table);
        return $data;
    }

	public function getSectores($fecha_i,$fecha_f){
		
		$table = "SELECT UC.Idcampania as idsector,C.Nombre, COUNT(UC.Idcampania) AS ventas
		FROM BITACORA_VALIDACION AS BV
		LEFT JOIN USUARIO_CLIENTE AS UC ON UC.Id = BV.IdUsuario_ejecutivo
		LEFT JOIN CAMPANIA AS C ON C.Id = UC.Idcampania
		WHERE BV.IdEstatus_bitacora_validador =2
		AND (
		BV.Fecha >= '".$fecha_i."'
		AND BV.Fecha <= '".$fecha_f."'
		)
		GROUP BY UC.Idcampania";
			
        $data = $this->db->query($table);
        return $data;

	}

}

?>