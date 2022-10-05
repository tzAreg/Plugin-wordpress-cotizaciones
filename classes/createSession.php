<?php
    session_start();
    $idCotizacion = $_POST['consulta'];
    $_SESSION['idCotizacion'] = $idCotizacion;
?>