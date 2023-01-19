<?php

class CmReporteador {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }


    //*Obtener usuarios telemarketing

    public function getDataCm($fechas) {
        //$dbcmr = 'SELECT Usuario FROM CM_REPORTEADOR WHERE Fecha_encuesta >= "'.$fechas['Inicio'].'" AND Fecha_encuesta <= "'.$fechas['Fin'].'"  AND Estado =1 AND (Usuario LIKE "ECI%" OR Usuario LIKE "LCC%") GROUP BY Usuario ORDER BY Id DESC LIMIT 0, 8';
        $dbcmr = 'SELECT P.Nro_nomina as nomina, UC.Nombre as ejecutivo, UCC.Id as idcoach,UCC.Nombre as coach, CM.Usuario as tlmk
        FROM CM_REPORTEADOR AS CM
        LEFT JOIN PERSONA AS P ON P.Usuario_telemarketing = CM.Usuario
        LEFT JOIN USUARIO_CLIENTE AS UC ON UC.IdPersona = P.Id
        LEFT JOIN USUARIO_CLIENTE AS UCC ON UCC.Id = UC.IdSupervisor
        WHERE (CM.Fecha_encuesta >= "'.$fechas['Inicio'].'" AND CM.Fecha_encuesta <= "'.$fechas['Fin'].'")
        AND (CM.Usuario LIKE "ECI%" OR CM.Usuario LIKE "LCC%") AND CM.Estado =1
        GROUP BY CM.Usuario
        ORDER BY CM.Id DESC';

        $result = $this->db->query($dbcmr);
        
        return $result;
    }

    //*Obtner el idsupervisor 
    public function getTlmk($usuarionomina) {
        
        $dbcmr2 = "SELECT P.Usuario_telemarketing AS TLMK, UC.Nombre, UC.IdSupervisor
        FROM PERSONA AS P
        INNER JOIN USUARIO_CLIENTE AS UC ON UC.Nro_nomina = P.Nro_Nomina
        WHERE P.Usuario_telemarketing = '".$usuarionomina."' AND P.Estado =1";

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
    public function getVenta($telemarketing,$fechas){
        $dbcmr4 = 'SELECT COUNT(DISTINCT(DN)) AS TOTAL FROM CM_REPORTEADOR WHERE Usuario="'.$telemarketing.'" AND (Fecha_encuesta >= "'.$fechas['Inicio'].'" AND Fecha_encuesta <= "'.$fechas['Fin'].'")';

        $result = $this->db->query($dbcmr4);

        while ($venta = $result->fetch_object()) {
            $resultventa = $venta->TOTAL;
        }
        return $resultventa;
    }

    //*Contar los FVC de cada telemarketing
    public function getFVC($telemarketing, $fechas, $fechas_alta){
        $dbcmr5 = 'SELECT COUNT(DISTINCT(DN)) AS TOTAL FROM CM_REPORTEADOR WHERE Usuario="'.$telemarketing.'" AND (Fecha_encuesta >= "'.$fechas['Inicio'].'" AND Fecha_encuesta <= "'.$fechas['Fin'].'") AND (Fecha_FVC <> "0000-00-00")';
        $result = $this->db->query($dbcmr5);

        while ($fvc = $result->fetch_object()) {
            $resultfvc = $fvc->TOTAL;
        }
        //var_dump($resultfvc);
        return $resultfvc;
    }

    public function getAltas($tlmk, $fechas, $fechas_alta){

        $alta = 0;
        
        $dbcmr6 = 'SELECT * FROM ( SELECT DN, Fecha,Status
                          FROM CM_REPORTEADOR
                          WHERE Usuario = "'.$tlmk.'"
                          AND (Fecha_encuesta >= "'.$fechas['Inicio'].'" AND Fecha_encuesta <= "'.$fechas['Fin'].'")
                          AND (Fecha_FVC >= "0000-00-00")
                          AND (Fecha_alta >= "'.$fechas_alta['Inicio'].'"     AND Fecha_alta <= "'.$fechas_alta['Fin'].'")
          ORDER BY Fecha DESC) AS C
          GROUP BY DN';

        $result = $this->db->query($dbcmr6);

        return $result;
    }
     
    public function Coaches(){
        
        $db = "SELECT Id, Nombre, IdCampania as idcampania FROM USUARIO_CLIENTE WHERE Estado =1 AND IdGrupo_sistema IN (150, 157, 193,50 ,227,148) ORDER BY IdGrupo_sistema";
        $result = $this->db->query($db);

        return $result;
    }

    public function getCampanias(){
        
        $db = "SELECT Id, Nombre FROM CAMPANIA WHERE Estado =1";
        $result = $this->db->query($db);

        return $result;
    }
    
}
