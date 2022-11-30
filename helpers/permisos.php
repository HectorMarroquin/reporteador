<?php

class Permisos{
    public static function reporteCentro($centro){
        $centros = "<td>". $centro['prefijo'] ."</td>
        <td> " .$centro['prepago']."</td>
        <td> " .$centro['pospago']."</td>
        <td> " .$centro['totales']."</td>
        <td> " .$centro['porcentaje']. "%</td>
        <td> " .$centro['asistencia']. "</td>
        <td> " .$centro['factor'] ."%</td>
    </tr>";
    echo $centros;
    }

    public static function reportePospago($pospago){
        $tablaPospago = "
            <td>" .$pospago['coach']."</td>
            <td>" .$pospago['exitosa']. "</td>
            <td>" .$pospago['ingresada']."</td>
            <td>" .$pospago['asistencia']."</td>
            <td>" .$pospago['factor']."%</td>
        </tr>";

        echo $tablaPospago;
    }

    public static function reporteCoach($coach){
        $tablaCoach = "
        <td>". $coach['coach']."</td>
        <td>". $coach['prepago']."</td>
        <td>". $coach['migradas']."</td>
        <td>". $coach['base']."</td>
        <td>". $coach['total']."</td>
        <td>". $coach['asistencia']."</td>
        <td>". $coach['factor']."%</td>
        <td>". $coach['conexion']."</td>
        <td>". $coach['talk']."</td>
        <td>". $coach['sph']."</td>
        </tr>";

        echo $tablaCoach;
    }

    public static function tablaHoras($key, $centrosHora, $res){
        $tablaHoracentro = "
        <td> ". $key." </td>
        <td> ". $centrosHora['hora08']."</td>
        <td> ". $centrosHora['hora09']."</td>
        <td> ". $centrosHora['hora10']."</td>
        <td> ". $centrosHora['hora11']."</td>
        <td> ". $centrosHora['hora12']."</td>
        <td> ". $centrosHora['hora13']."</td>
        <td> ". $centrosHora['hora14']."</td>
        <td> ". $centrosHora['hora15']."</td>
        <td> ". $centrosHora['hora16']."</td>
        <td> ". $centrosHora['hora17']."</td>
        <td> ". $centrosHora['hora18']."</td>
        <td> ". $centrosHora['hora19']."</td>
        <td> ". $centrosHora['hora20']."</td>
        <td> ". $centrosHora['hora21']."</td>
        <td class=".$res."> ".$centrosHora['total']."</td>
        </tr>";

        echo $tablaHoracentro;
    }

    public static function cmEjecutivos($dato){
        $tablaCmEjecutivos = "
        <td>". $dato["nomina"]."</td>
        <td>". $dato["tlmk"]."</td>
        <td>". $dato["user"]."</td>
        <td>". $dato["venta"]."</td>
        <td>". $dato["fvc"]."</td>
        <td>". $dato["porcentajefvc"]."</td>
        <td>". $dato["alta"]."</td>
        <td>". $dato["porcentajealta"]."</td>
        <td>". $dato["nomCoach"]."</td>
        ";
        echo $tablaCmEjecutivos;
    }
}