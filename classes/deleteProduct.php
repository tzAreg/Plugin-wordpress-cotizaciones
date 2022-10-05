<?php 
	require __DIR__ . '/conexion.php';

    $aid = $_POST['consulta'];

	$query = "DELETE FROM wp_cotizacion_detalle WHERE cotizacion_detalle_aid = '$aid'";	
	$conexion->query($query);
    $delete = "correcto";

	$datos = array(
		'delete' => $delete
	);

	echo json_encode($datos, JSON_FORCE_OBJECT); 
 ?>
