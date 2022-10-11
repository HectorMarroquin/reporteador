<?php

class ListaCentro{

    private $db;

        public function __construct(){

            $this->db = Database::connect();
        }

        public function getAll(){

            $sql = "SELECT Id,Centro,Prefijo FROM LISTA_CENTROS WHERE Comentario = 'ACTIVO' AND Estado = 1";

            $registros = $this->db->query($sql);

            return $registros; 

        }




}

?>