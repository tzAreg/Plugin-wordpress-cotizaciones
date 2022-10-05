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
    $mEnvio = $_POST['mEnvio'];
    $destino = $_POST['destino'];
    $zipcode = $_POST['zipcode'];
    $id = $_POST['idEdit'];



    $update = "UPDATE wp_cotizacion SET cotizacion_sres = '$sres', cotizacion_atencion = '$atc', cotizacion_metodo_envio = '$mEnvio', cotizacion_destino = '$destino', cotizacion_zipcode = '$zipcode', cotizacion_incoterm = '$incoterm', cotizacion_divisa = '$divisa', cotizacion_metodo_pago = '$pago', cotizacion_submit = '$subtotal', cotizacion_descuento = '$desc', cotizacion_subtotal = '$subtotal2', cotizacion_envio = '$envio', cotizacion_total = '$total' WHERE cotizacion_id = '$id'";



    if($conexion -> query($update) === TRUE) {
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