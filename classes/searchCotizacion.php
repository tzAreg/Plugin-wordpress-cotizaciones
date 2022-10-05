<?php 
	require __DIR__ . '/conexion.php';

	$salida = "";

	$consulta = "SELECT * FROM wp_cotizacion";

    if (isset($_POST['consulta'])) {
		$q = $conexion->real_escape_string($_POST['consulta']);
		$consulta = "SELECT * FROM wp_cotizacion WHERE cotizacion_id LIKE '%".$q."%' OR cotizacion_sres LIKE '%".$q."%' OR cotizacion_create_at LIKE '%".$q."%' OR cotizacion_domain LIKE '%".$q."%'";
	}
		
		
	$resultado = $conexion->query($consulta);
		
	if ($resultado->num_rows > 0) {
		while ($value = $resultado->fetch_assoc()) {
            $numero = $value["cotizacion_id"];
            $domain = $value["cotizacion_domain"];
            $client = $value["cotizacion_sres"];  
            $created = $value["cotizacion_create_at"]; 
            $fecha = new DateTime($created);
            $onlyDate = date_format($fecha, 'd/m/y');  
            $onlyHours = date_format($fecha, 'h:i s A'); 
            if ($_POST['newUrl'] == $domain){
                $salida.="
                    <tr>
                        <td class='fw-bold'>QUO$numero</td>
                        <td>$domain</td>
                        <td>$client</td>
                        <td>$onlyDate</td>
                        <td>$onlyHours</td>
                        <td>
                            <button value='$numero' id='view' class='btn btn-outline-primary'>See</button>
                            <button value='$numero' id='edit' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#editCotizacion'>Edit</button>
                            <button value='$numero' id='erased' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#confirmDelete'>Delete</button>
                        </td>
                    </tr>
                ";
            }else{
                $salida.="
                    <tr>
                        <td class='fw-bold'>QUO$numero</td>
                        <td>$domain</td>
                        <td>$client</td>
                        <td>$onlyDate</td>
                        <td>$onlyHours</td>
                        <td>
                        
                        </td>
                    </tr>
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
