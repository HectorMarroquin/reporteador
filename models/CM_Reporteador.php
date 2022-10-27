<?php

class CM_Reporteador {
    private $db;

    function __construct() {
        $this->db = Database::connect();
    }
    
    //* Consulatar fechas
    //*Restar un dia de la fecha final del mes anterior y restar un dia de la fecha final del mes actual
    
    function ObtenerFechasPrincipales(){
        $fechas = array();
        $base_fecha  = date('Y-m');
        $fechas['Inicio'] = $base_fecha.'-01';
        $fecha_temp = date('Y').'-'.intval(date('m')+1).'-01';
        $fecha_fin = $this->SumarRestarFechas($fecha_temp,0,1);
        $fechas['Fin'] = $fecha_fin;
        
        return $fechas;
     
     }
    
    public function SumarRestarFechas($fecha,$sumaresta,$dias){
        if ($sumaresta == 1) {
            $fecha_res = date("Y-m-d",strtotime($fecha."+ ".$dias." days"));  
        }else{
            $fecha_res = date("Y-m-d",strtotime($fecha."- ".$dias." days")); 
        }
            return $fecha_res;
      }

      function recorreFechas($fecha){
        //extrae las fechas
        $fecha_r = array();
        $fecha_r['Inicio'] = date("Y-m-d", strtotime($fecha['Inicio']."- 1 days"));
        $fecha_r['Fin'] = date("Y-m-d", strtotime($fecha['Fin']."- 1 days"));
    
        return $fecha_r;
    }
    
    //*Obtner usuarios telemarketing

    public function getusuariotlmk($fechas) {
		//$dbcmr = 'SELECT Usuario FROM CM_REPORTEADOR WHERE Fecha_encuesta >= "'.$fechas['Inicio'].'" AND Fecha_encuesta <= "'.$fechas['Fin'].'"  AND Estado =1 AND (Usuario LIKE "ECI%" OR Usuario LIKE "LCC%") GROUP BY Usuario ORDER BY Id DESC LIMIT 0, 8';
        $dbcmr = 'SELECT Usuario FROM CM_REPORTEADOR WHERE Fecha_encuesta >= "'.$fechas['Inicio'].'" AND Fecha_encuesta <= "'.$fechas['Fin'].'" AND Estado = 1 AND (Usuario LIKE "ECI%" OR Usuario LIKE "LCC%") GROUP BY Usuario ORDER BY Id DESC LIMIT 0, 8';
        $result = $this->db->query($dbcmr);
        
        return $result;
    }

    //*Obtner el idsupervisor 
    public function getTlmk($usuarionomina) {
        $dbcmr2 = "SELECT P.Usuario_telemarketing AS TLMK, UC.Nombre, UC.IdSupervisor
        FROM PERSONA AS P
        INNER JOIN USUARIO_CLIENTE AS UC ON UC.Nro_nomina = P.Nro_Nomina
        WHERE P.Usuario_telemarketing = '".$usuarionomina."' AND P.Estado =1    AND UC.Estado =1 ";

        $result = $this->db->query($dbcmr2);
        return $result;
    }
    //*Obtner de cada telemarketing el coach correspondiente 
    public function getcoachxtlmk($idcoach){
        $dbcmr3 = "SELECT Nombre FROM USUARIO_CLIENTE WHERE Id =".$idcoach ." AND Estado =1 GROUP BY Nombre";
        //echo $dbcmr3; exit();
        $result = $this->db->query($dbcmr3);
        $nombre ="";
        while ($coach = $result->fetch_object()) {
            $nombre = $coach->Nombre;   
        }
        return $nombre;
    }
    //*Ventas acomuladas de cada telemarketing 
    public function getVenta($telemarketing,$getfechas){
        $dbcmr4 = 'SELECT COUNT(DISTINCT(DN)) AS TOTAL FROM CM_REPORTEADOR WHERE Usuario="'.$telemarketing.'" AND (Fecha_encuesta >= "'.$getfechas['Inicio'].'" AND Fecha_encuesta <= "'.$getfechas['Fin'].'")';
        $result = $this->db->query($dbcmr4);

        while ($venta = $result->fetch_object()) {
            $resultventa = $venta->TOTAL;
        }
        return $resultventa;
    }

    //*Contar los FVC de cada telemarketing
    public function getFVC($telemarketing, $fechas, $getfechas){
        $dbcmr5 = 'SELECT COUNT(DISTINCT(DN)) AS TOTAL FROM CM_REPORTEADOR WHERE Usuario="'.$telemarketing.'" AND (Fecha_encuesta >= "'.$getfechas['Inicio'].'" AND Fecha_encuesta <= "'.$getfechas['Fin'].'") AND (Fecha_FVC >= "'.$fechas['Inicio'].'" AND Fecha_FVC <= "'.$fechas['Fin'].'")';
        $result = $this->db->query($dbcmr5);

        while ($fvc = $result->fetch_object()) {
            $resultfvc = $fvc->TOTAL;
        }
        //var_dump($resultfvc);
        return $resultfvc;
    }

    //* consultar el porcentaje 
    public function getPorcentajes($dividendo, $divisor){
        $porcentaje = 0;
            if ($dividendo != 0 && $divisor != 0) {
        $porcentaje = ($divisor * 100)/$dividendo;
    }
        $porcentaje = number_format(round($porcentaje, 2),2).'%';
        return $porcentaje;
    }



    public function getAltas($tlmk, $fechas, $getfechas){
        $dbcmr6 = 'SELECT COUNT(Status) AS ALTAS FROM ( SELECT DN, Fecha,Status FROM CM_REPORTEADOR WHERE Usuario = "'.$tlmk.'"
        AND (Fecha_encuesta >= "'.$getfechas['Inicio'].'" AND Fecha_encuesta <= "'.$getfechas['Fin'].'")
        AND (Fecha_FVC >= "'.$fechas['Inicio'].'"      AND Fecha_FVC <= "'.$fechas['Fin'].'")
        AND (Fecha_alta >= "'.$fechas['Inicio'].'"     AND Fecha_alta <= "'.$fechas['Fin'].'")
        ORDER BY Fecha DESC) AS C
        GROUP BY DN';

        $result = $this->db->query($dbcmr6);
        $resultado = 0;
        while ($row = $result->fetch_object()) {
            $resultado = $row->ALTAS;
        }
        return $resultado;
    }
    
    public function Coaches(){
        
        $db = "SELECT Id, Nombre FROM USUARIO_CLIENTE WHERE Estado =1 AND IdGrupo_sistema IN ( 150, 157, 193, 50 ) ORDER BY IdGrupo_sistema";
        $result = $this->db->query($db);

        return $result;
    }
    
}
