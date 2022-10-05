<?php 

	require __DIR__ . '/conexion.php';



	$salida = "";
    $cant = $_POST['consulta1'];
	$i = 1;

	if (isset($_POST['consulta'])) {
		$q = $conexion->real_escape_string($_POST['consulta']);
		$consulta = "SELECT * FROM wp_dgwt_wcas_index WHERE attributes LIKE '%".$q."%' OR name LIKE '%".$q."%'";
	}		

	$result = $conexion->query($consulta);
	$count = mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);

	$result2 = $conexion2->query($consulta);
	$row2 = mysqli_fetch_array($result2);	

	$model = $q;
    $name = $row["name"];
	$description = $row["description"];
	$image = $row['image'];
    $price = $row2["price"];
	

	$datos = array(
		'name' => $name,
		'cant' => $cant,
		'price' => $price,
		'model' => $model,
		'image' => $image,
		'description' => $description
	);

	echo json_encode($datos, JSON_FORCE_OBJECT);
	$conexion->close();
?>

