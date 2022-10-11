<?php

    require dirname(__FILE__) . '/conexion.php';

    $weight = $_POST['consulta'];
    $newWeight = $weight.'m³';

    $sql = "SELECT * FROM wp_weights_maritime WHERE weight_detalle = '$newWeight'";
	$resultConsulta = $conexion->query($sql);
	$count = mysqli_num_rows($resultConsulta);

    if ($count > 0){
        $register = 'exists';
    }else{
        $sql1 = "INSERT INTO wp_weights_maritime(aid, weight_detalle) VALUES ('', '$newWeight')";
        if ($conexion->query($sql1) === TRUE){
            $register = 'correcto';

            $query = "ALTER TABLE wp_rates_maritime ADD $newWeight TEXT CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL;";
            $conexion->query($query);
        }else{
            $register = 'incorrecto';
        }
    }

    $datos = array(
        'register' => $register
    );

    echo json_encode($datos, JSON_FORCE_OBJECT);
    $conexion->close();

?>