<?php 
	require __DIR__ . '/conexion.php';

    $data = $_POST['consulta'];
    $data2 = $_POST['consulta2'];

	$consulta = "SELECT * FROM wp_rates_air WHERE rate_country = '$data2'";		
	$resultado = $conexion->query($consulta);
    $row = mysqli_fetch_array($resultado);
    $price = $row[$data];

	
	 $datos = array(
        'price' => $price
    );

    echo json_encode($datos, JSON_FORCE_OBJECT);
	$conexion->close();
 ?>
