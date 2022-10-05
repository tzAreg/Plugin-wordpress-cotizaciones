<?php

    header("Content-Type: text/html;charset=utf-8");
    $hostdb = "localhost";
    $userdb = "root";
    $passdb = "";
    $namedb = "kalsteindb";
    $namedb2 = "kalsteindb_fr";

    $conexion = new mysqli($hostdb, $userdb, $passdb, $namedb);
    $acentos = $conexion->query("SET NAMES 'utf8'");

    $conexion2 = new mysqli($hostdb, $userdb, $passdb, $namedb2);
    $acentos2 = $conexion2->query("SET NAMES 'utf8'");

    if ($conexion -> connect_error) {
        die("La conexión falló: " .$conexion -> connect_error);
    }

    if ($conexion2 -> connect_error) {
        die("La conexión falló: " .$conexion2 -> connect_error);
    }
?>