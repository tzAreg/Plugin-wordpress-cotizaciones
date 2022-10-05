<?php
    require __DIR__ . '/conexion.php';

    $consulta = "SELECT * FROM wp_cotizacion";
	$resultConsulta = $conexion->query($consulta);
	$count = mysqli_num_rows($resultConsulta);
	$row = mysqli_fetch_array($resultConsulta);

    $sres = $_POST['sres'];
    $atc = $_POST['atc'];
    $subtotal = $_POST['subtotal'];
    $desc = $_POST['desc'];
    $subtotal2 = $_POST['subtotal2'];
    $envio = $_POST['envio'];
    $total = $_POST['total'];
    $mEnvio = $_POST['mEnvio'];
    $destino = $_POST['destino'];
    $zipcode = $_POST['zipcode'];
    $incoterm = $_POST['incoterm'];
    $divisa = $_POST['divisa'];
    $pago = $_POST['pago'];
    $datas = $_POST['datas'];
    $newUrl = $_POST['newUrl'];
    $item = $datas[0];

	if ($count > 0) {
		$register = "INSERT INTO wp_cotizacion(cotizacion_id, cotizacion_domain, cotizacion_sres, cotizacion_atencion, cotizacion_create_at, cotizacion_metodo_envio, cotizacion_destino, cotizacion_zipcode, cotizacion_incoterm, cotizacion_divisa, cotizacion_metodo_pago, cotizacion_submit, cotizacion_iva, cotizacion_descuento, cotizacion_subtotal, cotizacion_envio, cotizacion_total) VALUES ('', '$newUrl', '$sres', '$atc', CURRENT_TIMESTAMP, '$mEnvio', '$destino', '$zipcode', '$incoterm', '$divisa', '$pago', '$subtotal', '0.00', '$desc', '$subtotal2', '$envio', '$total')";

        if ($conexion -> query($register) === TRUE) {
            $registro = 'correcto';
            $query = "SELECT * FROM wp_cotizacion ORDER BY cotizacion_id DESC";
            $result = $conexion->query($query);
            $col = mysqli_fetch_array($result);
            $id = $col['cotizacion_id'];
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
        }else{
            $registro = 'incorrecto';
        }
	}else{
		$register = "INSERT INTO wp_cotizacion(cotizacion_id, cotizacion_domain, cotizacion_sres, cotizacion_atencion, cotizacion_create_at, cotizacion_metodo_envio, cotizacion_destino, cotizacion_zipcode, cotizacion_incoterm, cotizacion_divisa, cotizacion_metodo_pago, cotizacion_submit, cotizacion_iva, cotizacion_descuento, cotizacion_subtotal, cotizacion_envio, cotizacion_total) VALUES ('1000', '$newUrl', '$sres', '$atc', CURRENT_TIMESTAMP, '$mEnvio', '$destino', '$zipcode', '$incoterm', '$divisa', '$pago', '$subtotal', '0.00', '$desc', '$subtotal2', '$envio', '$total')";
        if ($conexion -> query($register) === TRUE) {
            $registro = 'correcto';
            $query = "SELECT * FROM wp_cotizacion ORDER BY cotizacion_id DESC";
            $result = $conexion->query($query);
            $col = mysqli_fetch_array($result);
            $id = $col['cotizacion_id'];
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

                $query2 = "INSERT INTO wp_cotizacion_detalle(cotizacion_detalle_aid, cotizacion_detalle_id, cotizacion_detalle_name, cotizacion_detalle_model, cotizacion_detalle_maker, cotizacion_detalle_image,cotizacion_detalle_cant, cotizacion_detalle_unid, cotizacion_detalle_valor_unit, cotizacion_detalle_valor_total) VALUES ('', '$id', '$name', '$model', '$maker', '$image', '$cant', '$unid', '$precio', '$totalprecio')"; 
                $conexion->query($query2);
            }
        }else{
            $registro = 'incorrecto';
        }
    }
        

    $datos = array(
        'registro' => $registro,
        'id' => $id
    );

    echo json_encode($datos, JSON_FORCE_OBJECT);
    $conexion->close();
?>