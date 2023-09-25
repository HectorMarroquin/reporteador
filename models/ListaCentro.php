<?php

class ListaCentro{

    private $db;

        public function __construct(){

            $this->db = Database::connect();
        }

        public function getAll($rol,$admin,$idusuario,$sucursales){

            $sql = "";
            $coord    = ['237'];
            $coach    = ['150','16','212','157'];
            $externos = ['226'];


            if(in_array($rol,$admin)){

                $sql = "SELECT Id,Centro,Prefijo FROM LISTA_CENTROS WHERE Comentario = 'ACTIVO' AND Estado = 1";

            }elseif(in_array($rol,$coord) || in_array($rol,$coach)){

                $sql = "SELECT Id,Centro,Prefijo FROM LISTA_CENTROS WHERE Comentario = 'ACTIVO' AND Id IN(1) AND Estado = 1";

            }
            // elseif(in_array($rol,$externos) && in_array($idusuario,$sucursales) ){

            //     $sql = "SELECT Id,Centro,Prefijo FROM LISTA_CENTROS WHERE Comentario = 'ACTIVO' AND Estado = 1";
               
            // }
            else{
                
                $sql = "SELECT Id,Centro,Prefijo FROM LISTA_CENTROS WHERE Comentario = 'ACTIVO' AND IdUsuarioCliente = '".$idusuario."' AND Estado = 1";
            }

      //echo $sql; exit();
            
            $registros = $this->db->query($sql);

            return $registros; 

        }

        public function getAllExternos($idusuario){

            $sql = "";

            $sql = "SELECT Id,Centro,Prefijo FROM LISTA_CENTROS WHERE Comentario = 'ACTIVO' AND IdUsuarioCliente = '".$idusuario."' AND Estado = 1";
            
            $registros = $this->db->query($sql);

            return $registros; 

        }
}

?>