<?php 

	require __DIR__ . '/conexion.php';



    $id = $_POST['consulta'];



	$query = "DELETE FROM wp_cotizacion WHERE cotizacion_id = '$id'";	

	if ($conexion->query($query) === TRUE) {

        $query2 = "DELETE FROM wp_cotizacion_detalle WHERE cotizacion_detalle_id = '$id'";

        if ($conexion->query($query2) === TRUE) {

            $delete = "correcto";

        }else{

            $delete = "incorrecto";

        }

	}else{

		$delete = "incorrecto";

	}



	$datos = array(

		'delete' => $delete

	);



	echo json_encode($datos, JSON_FORCE_OBJECT); 

 ?>

