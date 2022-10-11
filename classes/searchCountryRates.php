<?php 
	require __DIR__ . '/conexion.php';

	$salida = "<option selected style='text-align: center;' value='0'>-- Select --</option>";

	$consulta = "SELECT * FROM wp_rates_country ORDER BY rate_country ASC";	
		
	$resultado = $conexion->query($consulta);
		
	if ($resultado->num_rows > 0) {
		while ($value = $resultado->fetch_assoc()) {            	
            $country = $value["rate_country"];

            $consulta2 = "SELECT * FROM wp_paises WHERE iso = '$country'";
            $resultado2 = $conexion->query($consulta2);
            $row = mysqli_fetch_array($resultado2);
            $en = $row['en'];

            $salida.="
                <option value='$country'>$country - $en</option>
            ";
		}
	
		$salida.="</tbody></table>";
	} else {
		$salida.="<div class='nodatos'><h5>No data found in your search</h5></div>";
	}
	
	echo $salida;
	$conexion->close();
 ?>
