<?php

    require __DIR__ . '/conexion.php';



    $country = $_POST['country'];
    $weight = $_POST['weight'];
    $price = $_POST['price'];



    $update = "UPDATE wp_rates_maritime SET $weight = '$price' WHERE rate_country = '$country'";



    if($conexion -> query($update) === TRUE) {
        $update = 'correcto';
    }else{
        $update = 'incorrecto';
    }    



    $datos = array(
        'update' => $update
    );



    echo json_encode($datos, JSON_FORCE_OBJECT);
    $conexion->close();

?>