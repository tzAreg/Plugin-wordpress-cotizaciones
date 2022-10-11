<?php 
	require __DIR__ . '/conexion.php';

	$salida = "<option selected style='text-align: center;' value='0'>-- Select --</option>";

	$consulta = "SELECT * FROM wp_weights_maritime";		
		
	$resultado = $conexion->query($consulta);
		
	if ($resultado->num_rows > 0) {
		while ($value = $resultado->fetch_assoc()) {
            $detalle = $value["weight_detalle"];

            $consulta2 = "SELECT * FROM wp_rates_maritime";
            $respuesta2 = $conexion->query($consulta2);
            $row = mysqli_fetch_array($respuesta2);
            $precio = $row[$detalle];

            if (empty($precio)){

            }else{
                $salida.="
                    <option value='$detalle'>$detalle</option>
                ";
            }
		}
	
		$salida.="</tbody></table>";
	} else {
		$salida.="<div class='nodatos'><h5>No data found in your search</h5></div>";
	}
	
	echo $salida;
	$conexion->close();
 ?>
