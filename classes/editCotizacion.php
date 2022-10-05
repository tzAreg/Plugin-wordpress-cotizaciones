<?php 

	require __DIR__ . '/conexion.php';


	$salida = "";
    $id = $_POST['consulta'];

	$query = "SELECT * FROM wp_cotizacion WHERE cotizacion_id = '$id'";
    $query2 = "SELECT * FROM wp_cotizacion_detalle WHERE cotizacion_detalle_id = '$id'";

	$result = $conexion->query($query);
    $result2 = $conexion->query($query2);
	$row = mysqli_fetch_array($result);

	

	$sres = $row["cotizacion_sres"];
    $atc = $row["cotizacion_atencion"];
	$subtotal = $row["cotizacion_submit"];
	$desc = $row['cotizacion_descuento'];
    $subtotal2 = $row["cotizacion_subtotal"];
    $envio = $row["cotizacion_envio"];
    $total = $row["cotizacion_total"];
    $mEnvio = $row['cotizacion_metodo_envio'];
    $destino = $row['cotizacion_destino'];
    $zipcode = $row['cotizacion_zipcode'];
    $incoterm = $row['cotizacion_incoterm'];
    $divisa = $row['cotizacion_divisa'];
    $pago = $row['cotizacion_metodo_pago'];
    $data = [];



    while ($fila = $result2->fetch_assoc()){
        $aid = $fila['cotizacion_detalle_aid'];
        $name = $fila['cotizacion_detalle_name'];
        $cant = $fila['cotizacion_detalle_cant'];
        $valorU = $fila['cotizacion_detalle_valor_unit'];
        $valorT = $fila['cotizacion_detalle_valor_total']; 

        $array = array( 
            'aid' => $aid,
            'name' => $name,
            'cant' => $cant,
            'valorU' => $valorU,
            'valorT' => $valorT
        );

        array_push($data, $array);
    }

		

	

	$datos = array(
		'sres' => $sres,
		'atc' => $atc,
		'subtotal' => $subtotal,
		'desc' => $desc,
		'subtotal2' => $subtotal2,
		'envio' => $envio,
        'total' => $total,
        'mEnvio' => $mEnvio,
        'destino' => $destino,
        'zipcode' => $zipcode,
        'incoterm' => $incoterm,
        'divisa' => $divisa,
        'pago' => $pago,
        'data' => $data
	);



	echo json_encode($datos, JSON_FORCE_OBJECT);
	$conexion->close();
 ?>

