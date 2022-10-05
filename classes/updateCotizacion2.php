<?php

    require __DIR__ . '/conexion.php';



    $sres = $_POST['sres'];
    $atc = $_POST['atc'];
    $subtotal = $_POST['subtotal'];
    $desc = $_POST['desc'];
    $subtotal2 = $_POST['subtotal2'];
    $envio = $_POST['envio'];
    $total = $_POST['total'];
    $incoterm = $_POST['incoterm'];
    $divisa = $_POST['divisa'];
    $pago = $_POST['pago'];
    $id = $_POST['idEdit'];
    $mEnvio = $_POST['mEnvio'];
    $destino = $_POST['destino'];
    $zipcode = $_POST['zipcode'];
    $datas = $_POST['datas'];
    $length = count($datas);



    $update = "UPDATE wp_cotizacion SET cotizacion_sres = '$sres', cotizacion_atencion = '$atc', cotizacion_metodo_envio = '$mEnvio', cotizacion_destino = '$destino', cotizacion_zipcode = '$zipcode', cotizacion_incoterm = '$incoterm', cotizacion_divisa = '$divisa', cotizacion_metodo_pago = '$pago', cotizacion_submit = '$subtotal', cotizacion_descuento = '$desc', cotizacion_subtotal = '$subtotal2', cotizacion_envio = '$envio', cotizacion_total = '$total' WHERE cotizacion_id = '$id'";

    

    if ($conexion -> query($update) === TRUE) {

        foreach ($datas as $key => $value) {
            $name = $value['name'];
            $model = $value['model'];
            $image = $value['image'];
            $maker = $value['maker'];
            $cant = $value['cant'];
            $precio = $value['precio'];
            $totalprecio = $value['totalprecio'];

    

            if ($cant == 1){
                $unid = "A";
            }else{
                if($cant == 2){
                    $unid = "TWO";
                }else{
                    if($cant == 3){
                         $unid = "THREE";
                    }else{
                        if($cant == 4){
                            $unid = "FOUR";
                        }else{
                            if($cant == 5){
                                $unid = "FIVE";
                            }else{
                                if($cant == 6){
                                    $unid = "SIX";
                                }else{
                                     if($cant == 7){
                                         $unid = "SEVEN";
                                     }else{
                                         if($cant == 8){
                                            $unid = "EIGHT";
                                        }else{
                                            if($cant == 9){
                                                $unid = "NINE";
                                            }else{
                                                if($cant == 10){
                                                    $unid = "TEEN";
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }

    

            $query2 = "INSERT INTO wp_cotizacion_detalle(cotizacion_detalle_aid, cotizacion_detalle_id, cotizacion_detalle_name, cotizacion_detalle_model, cotizacion_detalle_maker, cotizacion_detalle_image, cotizacion_detalle_cant, cotizacion_detalle_unid, cotizacion_detalle_valor_unit, cotizacion_detalle_valor_total) VALUES ('', '$id', '$name', '$model', '$maker', '$image', '$cant', '$unid', '$precio', '$totalprecio')"; 

                $conexion->query($query2);

        }

        $update = 'correcto';
    }else{
        $update = 'incorrecto';

    }



    $datos = array(
        'update' => $update,
        'id' => $id
    );



    echo json_encode($datos, JSON_FORCE_OBJECT);
    $conexion->close();

?>