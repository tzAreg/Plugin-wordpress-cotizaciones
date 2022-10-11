<?php

    require dirname(__FILE__) . '/conexion.php';

    $country = $_POST['country'];
    $weight = $_POST['weight'];
    $price = $_POST['price'];

    $sql = "SELECT * FROM wp_rates_country WHERE rate_country = '$country'";
	$resultConsulta = $conexion->query($sql);
	$count = mysqli_num_rows($resultConsulta);

    if ($count > 0){
        $sql1 = "SELECT * FROM wp_rates_maritime WHERE rate_country = '$country'";
        $resultConsulta1 = $conexion->query($sql1);

        if ($resultConsulta1->num_rows > 0){
            $row = mysqli_fetch_array($resultConsulta1);
            $newWeight = $row[$weight];

            if (empty($newWeight)){
                $update = "UPDATE wp_rates_maritime SET $weight = '$price' WHERE rate_country = '$country'";
                $conexion->query($update);
                $register = 'correcto';
            }else{
                $register = 'exists';
            }  
        }else{
            $query = "INSERT INTO wp_rates_maritime(aid, rate_country, $weight) VALUES ('', '$country', $price)";
            $conexion->query($query);
            $register = 'correcto';
        }
    }else{
        $sql1 = "INSERT INTO wp_rates_country(aid, rate_country) VALUES ('', '$country')";
        if ($conexion->query($sql1) === TRUE){

            $sql1 = "SELECT * FROM wp_rates_maritime WHERE rate_country = '$country'";
            $resultConsulta = $conexion->query($sql1);
            $count1 = mysqli_num_rows($resultConsulta);

            if($count1 > 0){
                $update = "UPDATE wp_rates_maritime SET $weight = '$price' WHERE rate_country = '$country'";
                $conexion->query($update);
                $register = 'correcto';
            }else{
                $query = "INSERT INTO wp_rates_maritime(aid, rate_country) VALUES ('', '$country')";
                $conexion->query($query);

                $update = "UPDATE wp_rates_maritime SET $weight = '$price' WHERE rate_country = '$country'";
                $conexion->query($update);
                $register = 'correcto';
            }
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