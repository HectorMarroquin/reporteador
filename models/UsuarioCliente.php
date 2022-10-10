<?php
class UsuarioCliente{
    private $id;
    private $idclientesistema;
    private $ipersona;
    private $idtipousuario;
    private $idtipomarcacion;
    private $sinoCentroexterno;
    private $sinoSupervisor;
    private $sinorvt;
    private $sinoAccesoExternoPermitido;
    private $nroNomina;
    private $nombre;
    private $usuario;
    private $pass;
    private $idSupervisor;
    private $camposTablas;
    private $idGrupoSistema;
    private $idTurno;
    private $perfil;
    private $idCentro;
    private $idCompañia;
    private $logueo;
    private $intentosIngreso;
    private $regdate;
    private $actdate;
    private $state;
    private $email;
    private $sinoReseteadPass;
    private $Estado;
    private $db;


    public function __construct() {
        $this->db = Database::connect();
    }

    public function getNameCoach(){
        $table = "SELECT Nombre, Id FROM `USUARIO_CLIENTE` WHERE IdGrupo_sistema =150 AND Estado =1";
        
        $data = $this->db->query($table);
        return $data;
    }
}
?>