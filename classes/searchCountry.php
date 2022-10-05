<?php 
	require __DIR__ . '/conexion.php';

	$salida = "<option selected style='text-align: center;' value='0'>-- Select --</option>";

	$consulta = "SELECT * FROM wp_paises";		
		
	$resultado = $conexion->query($consulta);
		
	if ($resultado->num_rows > 0) {
		while ($value = $resultado->fetch_assoc()) {
            $id = $value["id"];
            $iso = $value["iso"];
            $nombre = $value["es"]; 

            $salida.="
                <option value='$iso'>$iso - $nombre</option>
            ";
		}
	
		$salida.="</tbody></table>";
	} else {
		$salida.="<div class='nodatos'><h5>No data found in your search</h5></div>";
	}
	
	echo $salida;
	$conexion->close();
 ?>
