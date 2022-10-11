<?php 
	require __DIR__ . '/conexion.php';

	$salida = "";

	$consulta = "SELECT * FROM wp_rates_country ORDER BY rate_country ASC";	

	if (isset($_POST['consulta'])) {
		$q = $conexion->real_escape_string($_POST['consulta']);
		$consulta = "SELECT * FROM wp_rates_country WHERE rate_country LIKE '%".$q."%' ORDER BY rate_country ASC";
	}

	$resultado = $conexion->query($consulta);
		
	if ($resultado->num_rows > 0) {
		while ($value = $resultado->fetch_assoc()) {
            $country = $value['rate_country'];

            $consulta1 = "SELECT * FROM wp_paises WHERE iso = '$country'";	
            $resultado1 = $conexion->query($consulta1);  
	        $row = mysqli_fetch_array($resultado1);
            $en = $row['en'];

			$consulta2 = "SELECT * FROM wp_rates_air WHERE rate_country = '$country'";
			$resultado2 = $conexion->query($consulta2);  
	        $row1 = mysqli_fetch_array($resultado2);

			$consulta3 = "SELECT * FROM wp_weights_air";
			$resultado3 = $conexion->query($consulta3); 
			$count = mysqli_num_rows($resultado3);
			$newWidth = $count * 20;

			$consulta4 = "SELECT * FROM wp_rates_maritime WHERE rate_country = '$country'";
			$resultado4 = $conexion->query($consulta4);  
	        $row2 = mysqli_fetch_array($resultado4);

			$consulta5 = "SELECT * FROM wp_weights_maritime";
			$resultado5 = $conexion->query($consulta5); 
			$count1 = mysqli_num_rows($resultado5);
			$newWidth1 = $count1 * 20;

            $salida.="
				<tr'>
					<td class='fw-bold' style='padding-top: 18mm;'><center>$en</center></td>
					<td style='padding: 0; width: auto;'>
						<div class='content-rates'>
							<div class='subContent-rates'>
								<div class='h-air'>Air</div>
								<div class='b-air' style='width: $newWidth".""."mm;'>
									"; 
									while ($a = $resultado3->fetch_assoc()){
										$aid = $a['aid'];
										$weights = $a['weight_detalle'];
										$salida.="
											<div class='c-hAir'>
												<div class='hAir'>$weights</div>";
												if (empty($row1[$weights])){
													$salida.="
													<div class='bAir'></div>";
												}else{
													$salida.="
													<div class='bAir'>$row1[$weights]$</div>";
												}
											$salida.="
											</div>
										";
									}							
									$salida.="
								</div><br>
								<div class='h-maritime'>Maritime</div>
								<div class='b-maritime' style='width: $newWidth1".""."mm;'>
									"; 
									while ($b = $resultado5->fetch_assoc()){
										$weights1 = $b['weight_detalle'];
										$salida.="
											<div class='c-hMaritime'>
												<div class='hMaritime'>$weights1</div>";
												if (empty($row2[$weights1])){
													$salida.="
													<div class='bMaritime'></div>";
												}else{
													$salida.="
													<div class='bMaritime'>$row2[$weights1]$</div>";
												}
											$salida.="
											</div>
										";
									}							
									$salida.="
								</div>
							</div>							
						</div>
					</td>					
				</tr>
            ";
		}
	} else {
		$salida.="<div class='nodatos'><h5>No data found in your search</h5></div>";
	}
	
	echo $salida;
	$conexion->close();
 ?>
