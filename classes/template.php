<?php
    session_start();
	if (isset($_SESSION['idCotizacion'])) {
		$idCotizacion = $_SESSION['idCotizacion'];
	}

    require __DIR__ . '/conexion.php';

	$consulta = "SELECT * FROM wp_cotizacion WHERE cotizacion_id = '$idCotizacion'";
    $consulta2 = "SELECT * FROM wp_cotizacion_detalle WHERE cotizacion_detalle_id = '$idCotizacion'";
		
    $result = $conexion->query($consulta);
	$row = mysqli_fetch_array($result);

    $id = $row["cotizacion_id"];
    $sres = $row["cotizacion_sres"];
    $atc = $row["cotizacion_atencion"];
    $created = $row["cotizacion_create_at"];
    $fecha = new DateTime($created);
    $onlyDate = date_format($fecha, 'd-m-y');  
    $onlyHours = date_format($fecha, 'h:i A'); 
    $subtotal = $row["cotizacion_submit"];
    $iva = $row["cotizacion_iva"];
    $desc = $row["cotizacion_descuento"];
    $subtotal2 = $row["cotizacion_subtotal"];
    $envio = $row["cotizacion_envio"];
    $total = $row["cotizacion_total"];    
    $incoterm = $row["cotizacion_incoterm"];
    $divisa = $row["cotizacion_divisa"];
    $pago = $row["cotizacion_metodo_pago"];
    $paginaMaxima = "5";
    $pg3 = "3";
    $pg4 = "4";
    $pg5 = "5";

    $resultado = $conexion->query($consulta2);
    $countRow = mysqli_num_rows($resultado);
    
    if ($countRow >= 4){
        $paginaMaxima = "6";
    }
?> 
    <link rel="stylesheet" type="text/css" href="pdf.css">
<div class='cp01'>
    <div class='h-01'>
        <img src="http://127.0.0.1/wp-local/wp-content/plugins/kalsteinCotizacion/assets/images/francia-pais.jpg" style='float: right; width: 18%; margin-top: 25mm; margin-right: 45mm;'>
    </div>
    <div class='b-01' style='background-image: url(http://127.0.0.1/wp-local/wp-content/plugins/kalsteinCotizacion/assets/images/fondo.png)'>
        <div class='id'>
            <div class='logo'>
                <img src="http://127.0.0.1/wp-local/wp-content/plugins/kalsteinCotizacion/assets/images/logo.png" style='float: right; width: 70%; margin-top: 55mm; margin-right: 2%;'>
            </div>
            <div class='hr'></div>
            <div class='n-id'>
                <p class='co'>QUOTE</p>
                <p class='id-title'>QUO<span class='id-n'><?php echo $id?></span></p>
                <p class='msj'>A DIFFERENT ACCOMPANIMENT, AT YOUR SERVICE</p>
            </div>
        </div> 
        <div class='f-01'>
            <div class='qr'>
                <img src="http://127.0.0.1/wp-local/wp-content/plugins/kalsteinCotizacion/assets/images/qr.jpg" style='width: 100%;'>
            </div>
            <div class='f-text'>
                <p class='l-1'>All rights reserved ® KALSTEIN France S. A. S.,</p>
                <p class='l-2'>2 Rue Jean Lantier •  75001 Paris •</p>
                <p class='l-3'>+33 1 78 95 87 89 / +33 6 80 76 07 10 •</p>
                <p class='l-4'>https://kalstein.eu</p>
                <p class='l-5'>KALSTEIN FRANCE, S. A. S</p>
            </div>
            <div class='hr-2'></div>
            <div class='img-logo2'>
            <img src="http://127.0.0.1/wp-local/wp-content/plugins/kalsteinCotizacion/assets/images/logo-blanco.png" style='width: 50%; float: right;'>
            </div>
        </div>       
    </div>    
</div>
<br/>
<br/>
<br/>
<div class='cp02'>
    <div class='style-01'></div>
    <div class='style-02'></div>
    <div class='h-02'>
        <div class='logo-02'>
            <img src="http://127.0.0.1/wp-local/wp-content/plugins/kalsteinCotizacion/assets/images/logo.png" style='float: right; width: 70%; margin-top: 15mm; margin-right: 2mm;'>
        </div>
        <div class='hr-02'></div>
        <div class='h-text-02'>
            <p class='lt-01'>OUR SERVICES</p>
            <p class='lt-02'>Benefits and support</p>
            <p class='lt-03'>At Kalstein France, we take care of the full satisfaction of our clients, that is why we provide value-added services of the highest level based on our experience.</p>
        </div>
    </div>
    <div class='p2img-01'>
        <img src="http://127.0.0.1/wp-local/wp-content/plugins/kalsteinCotizacion/assets/images/imagen1.jpg" style='float: right; width: 100%;'>
    </div>
    <div class='p2img-02'>
        <img src="http://127.0.0.1/wp-local/wp-content/plugins/kalsteinCotizacion/assets/images/imagen2.jpg" style='float: right; width: 100%;'>
    </div>
    <div class='p2img-03'>
        <img src="http://127.0.0.1/wp-local/wp-content/plugins/kalsteinCotizacion/assets/images/imagen3.jpg" style='float: right; width: 100%;'>
    </div>
    <div class='cmsj-01'>
        <div class='i'>
            <img src="http://127.0.0.1/wp-local/wp-content/plugins/kalsteinCotizacion/assets/images/icono1.png" style='float: right; width: 100%; margin-top: 50%'>
        </div>
        <div class='hr-03'></div>
        <div class='i-text'>
            <p class='i-title'>Inductions and Online Trainings</p>
            <p class='i-p'>In any part of the world, receive your induction or training from our specialized team of engineers.</p>
        </div>
    </div>
    <div class='cmsj-02'>
        <div class='i'>
            <img src="http://127.0.0.1/wp-local/wp-content/plugins/kalsteinCotizacion/assets/images/icono2.png" style='float: right; width: 90%; margin-top: 45%'>
        </div>
        <div class='hr-03'></div>
        <div class='i-text'>
            <p class='i-title'>Fast answer</p>
            <p class='i-p'>Our work team is always available to answer all your queries or questions, in order to help in any situation.</p>
        </div>
    </div>
    <div class='cmsj-03'>
        <div class='i'>
            <img src="http://127.0.0.1/wp-local/wp-content/plugins/kalsteinCotizacion/assets/images/icono3.png" style='float: right; width: 100%; margin-top: 48%'>
        </div>
        <div class='hr-03'></div>
        <div class='i-text'>
            <p class='i-title'>#Letsgivemore <img src="http://127.0.0.1/wp-local/wp-content/plugins/kalsteinCotizacion/assets/images/corazon.png" style='width: 12px'></p>
            <p class='i-p'>Thanks to your purchase, a donation will be made to a non-profit foundation that fights breast cancer and helps the most vulnerable communities.</p>
        </div>
    </div>
    <div class='cmsj-04'>
        <div class='i'>
            <img src="http://127.0.0.1/wp-local/wp-content/plugins/kalsteinCotizacion/assets/images/icono4.png" style='float: right; width: 100%; margin-top: 48%'>
        </div>
        <div class='hr-03'></div>
        <div class='i-text'>
            <p class='i-title1'>Technical support</p>
            <p class='i-p'>Enjoy personalized advice for the correct preventive and corrective maintenance of your equipment, thanks to Kalstein manuals and articles, special catalogs and video tutorials.</p>
        </div>
    </div>
    <div class='cmsj-05'>
        <div class='i'>
            <img src="http://127.0.0.1/wp-local/wp-content/plugins/kalsteinCotizacion/assets/images/icono5.png" style='float: right; width: 100%; margin-top: 58%'>
        </div>
        <div class='hr-03'></div>
        <div class='i-text'>
            <p class='i-title2'>Shipping Logistics</p>
            <p class='i-p'>We take care of all the logistics necessary for the shipment of your products, whether by sea, land or air.</p>
        </div>
    </div>
    <div class='cmsj-06'>
        <div class='i'>
            <img src="http://127.0.0.1/wp-local/wp-content/plugins/kalsteinCotizacion/assets/images/icono6.png" style='float: right; width: 100%; margin-top: 48%'>
        </div>
        <div class='hr-03'></div>
        <div class='i-text'>
            <p class='i-title3'>Kalstein Worldwide</p>
            <p class='i-p'>With over 25 years growing with our clients, Kalstein's modern, multi-format content is now present in over 10 countries and growing.</p>
        </div>
    </div>
    <div class='f2-text'>
        <p class='t-1'>All rights reserved ® KALSTEIN France S. A. S.,</p>
    </div>
    <div class='style-03'><p style='text-align: right; color: #fff; font-size: 9px; margin-right: 12mm; margin-top: 6.5mm; font-weight: bold;'>Page [[page_cu]] of [[page_nb]]</p></div>
    <div class='style-04'></div>
</div>
    

<page backtop="58mm" backbottom="30mm" backleft="0mm" backright="0mm"> 
    <page_header> 
        <div class='ht'>
            <div class='logo-03'>
                <img src="http://127.0.0.1/wp-local/wp-content/plugins/kalsteinCotizacion/assets/images/logo.png" style='float: right; width: 70%; margin-top: 15mm; margin-right: 2mm;'>
            </div>
            <div class='tp-01'>
                <p>KALSTEIN FRANCE SIREN: 819 970 815</p>
            </div>
            <div class='tp-02'>
                <p style='font-weight: bold; margin: 0; padding: 0;'>Quote N°: <span style='font-weight: lighter;'>QUO<?php echo $id?></span></p>
                <p style='margin: 0; padding: 0; margin-top: 1mm;'>Paris, <?php echo $onlyDate?> <?php echo $onlyHours?></p>
            </div>
        </div>
        <div class='hr-04'></div>   
        <div class='cliente'>
            <div class='sres'>
                <p style='margin: 0; padding: 0; font-weight: bold; margin-top: 2mm;'>Sirs:</p>
                <p style='margin: 0; padding: 0; margin-top: 1mm;'><?php echo $sres?></p>
            </div>
            <div class='atc'>
                <p style='margin: 0; padding: 0; font-weight: bold; margin-top: 2mm;'>Attention:</p>
                <p style='margin: 0; padding: 0; margin-top: 1mm;'><?php echo $atc?></p>
            </div>
        </div>  
        <div class='c-table'>
            <table>
                <tr>
                    <td class='td-i'>Item</td>
                    <td class='td-m'>Model</td>
                    <td class='td-im'>Image</td>
                    <td class='td-d'>Description</td>
                    <td class='td-c'>Qty</td>
                    <td class='td-u'>Unid</td>
                    <td class='td-v'>Unit Value.</td>
                    <td class='td-vt'>Total Value</td>
                </tr>
            </table>
        </div>
    </page_header> 
    <page_footer> 
        <div class='ft'>
            <div class='ft-01'>
                <div class='img-ce'>
                    <img src="http://127.0.0.1/wp-local/wp-content/plugins/kalsteinCotizacion/assets/images/img-ce.jpg" style='float: right; width: 100%; margin-top: 5mm;'>
                </div>
                <div class='text-ce'>
                    <p style='margin: 0; padding: 0; font-weight: bold; font-size: 12px;'>CE marking: to buy with peace of mind</p>
                    <p style='margin: 0; padding: 0; font-size: 10px; margin-top: 1mm;'>All Kalstein equipment complies with the requirements of the EU, in accordance with the relevant regulations.</p>
                </div>
                <div class='img-cora'>
                    <img src="http://127.0.0.1/wp-local/wp-content/plugins/kalsteinCotizacion/assets/images/icono3.png" style='float: right; width: 90%; margin-top: 7mm;'>
                </div>
                <div class='text-cora'>
                    <p style='margin: 0; padding: 0; font-weight: bold; font-size: 12px;'>With the acquisition of a Kalstein equipment</p>
                    <p style='margin: 0; padding: 0; font-size: 10px; margin-top: 1mm;'>You make a contribution to the Jacinto Convit Foundation, OneTreePlanted, Humatem Foundation and the Maniapure Foundation.</p>
                </div>
            </div>
            <div class='hr-05'></div>
            <div class='ft-02'>
                <div class='ft-02-text'>
                    <p style='margin: 0; padding: 0; font-size: 9px; margin-top: 5mm;'>KALSTEIN FRANCE S.A.S</p>
                    <p style='margin: 0; padding: 0; font-size: 9px; margin-top: 1mm;'>• 2 Rue Jean Lantier, • 75001 Paris •</p>
                    <p style='margin: 0; padding: 0; font-size: 8px; margin-top: 1mm;'>+33 1 78 95 87 89 / +33 6 80 76 07 10 • https://kalstein.eu</p>
                </div>
                <div class='ftn-3'>
                    <p style='text-align: right; font-size: 9px; margin-top: 6.5mm; font-weight: bold;'>Page [[page_cu]] of [[page_nb]]</p>
                </div>
            </div>
        </div>
    </page_footer>
        <?php
        
            if ($resultado->num_rows > 0) {
                $i = 0;
                while ($value = $resultado->fetch_assoc()) {
                    $model = $value['cotizacion_detalle_model'];
                    $name = $value['cotizacion_detalle_name'];
                    $image = $value['cotizacion_detalle_image'];
                    $cant = $value['cotizacion_detalle_cant'];
                    $unid = $value['cotizacion_detalle_unid'];
                    $maker = $value['cotizacion_detalle_maker'];
                    $valorUnit = $value['cotizacion_detalle_valor_unit'];
                    $valorTotal = $value['cotizacion_detalle_valor_total'];
                    $newModel = str_replace("|", " ", $model);
                    $newMaker = str_replace("Fabricante", "Marca", $maker);
                    $i = $i + 1;
                    echo "
                        <table>
                            <tr>
                                <td class='tdb-i'>$i</td>
                                <td class='tdb-m'>$newModel</td>
                                <td class='tdb-img'>
                                    <img src='$image' style='width: 50%; margin-left: 25%;'>
                                </td>
                                <td class='tdb-d'>
                                    <p style='margin: 0; padding: 0; font-size: 11px;'>$newMaker</p>
                                    <p style='margin: 0; padding: 0; font-size: 11px;'>$name</p>
                                </td>
                                <td class='tdb-c'>$cant,00</td>
                                <td class='tdb-u'>$unid</td>
                                <td class='tdb-v'>$valorUnit</td>
                                <td class='tdb-vt'>$valorTotal</td>                            
                            </tr>
                        </table>
                    ";
                }
            }
        ?>
    <div class='bt-02'>
        <div class='sbt-02'>
            <div class='ob'>
                <div class='sob'>
                    <div class='ob-title'>
                        <p style='font-weight: bold; font-size: 18px; margin: 0; padding: 0;'>Observations:</p>
                        <p style='font-weight: bold; font-size: 12px; margin: 0; padding: 0; text-align: right; margin-top: 2mm;'>Delivery times:</p>
                        <p style='font-weight: bold; font-size: 12px; margin: 0; padding: 0; text-align: right; margin-top: 3mm;'>Sales representative:</p>
                        <p style='font-weight: bold; font-size: 12px; margin: 0; padding: 0; text-align: right; margin-top: 12mm;'>Commercial terms:</p>
                        <p style='font-weight: bold; font-size: 12px; margin: 0; padding: 0; text-align: right; margin-top: 7mm;'>Incoterm:</p>
                        <p style='font-weight: bold; font-size: 12px; margin: 0; padding: 0; text-align: right; margin-top: 3mm;'>Coins:</p>
                        <p style='font-weight: bold; font-size: 12px; margin: 0; padding: 0; text-align: right; margin-top: 3mm;'>Warranty:</p>
                        <p style='font-weight: bold; font-size: 12px; margin: 0; padding: 0; text-align: right; margin-top: 3mm;'>Payment methods:</p>
                    </div>
                    <div class='ob-p'>
                        <p style='font-size: 12px; margin: 0; padding: 0; text-align: left; margin-top: 7mm; margin-left: 3mm;'>45 days approx.</p>
                        <p style='font-size: 12px; margin: 0; padding: 0; text-align: left; margin-top: 3mm; margin-left: 3mm;'>Yuleana Mia</p>
                        <p style='font-size: 12px; margin: 0; padding: 0; text-align: left; margin-top: 1mm; margin-left: 3mm;'>Email: mia@kalstein.eu</p>
                        <p style='font-size: 12px; margin: 0; padding: 0; text-align: left; margin-top: 1mm; margin-left: 3mm;'>Tlf: +33 1 7895 8789 / +33 6 8076 0710</p>
                        <p style='font-size: 12px; margin: 0; padding: 0; text-align: left; margin-top: 3mm; margin-left: 3mm;'>Prepayment with Purchase Order.</p>
                        <p style='font-size: 12px; margin: 0; padding: 0; text-align: left; margin-top: 1mm; margin-left: 3mm;'>Special Discount (18%), applied.</p>
                        <p style='font-size: 12px; margin: 0; padding: 0; text-align: left; margin-top: 3mm; margin-left: 3mm;'><?php echo $incoterm?>.</p>
                        <p style='font-size: 12px; margin: 0; padding: 0; text-align: left; margin-top: 3mm; margin-left: 3mm;'><?php echo $divisa?>.</p>
                        <p style='font-size: 12px; margin: 0; padding: 0; text-align: left; margin-top: 3mm; margin-left: 3mm;'>1 year against manufacturing defects.</p>
                        <p style='font-size: 12px; margin: 0; padding: 0; text-align: left; margin-top: 3mm; margin-left: 3mm;'><?php echo $pago?>.</p>
                    </div>
                </div>
            </div>
            <div class='totales'>
                <div class='subtotales'>
                    <div class='totales-t'>
                        <p style='font-weight: bold; font-size: 12px; margin: 0; padding: 0; text-align: right;'>Subtotal:</p>
                        <p style='font-weight: bold; font-size: 12px; margin: 0; padding: 0; text-align: right;
                        margin-top: 2mm;'>IVA:</p>
                        <p style='font-weight: bold; font-size: 12px; margin: 0; padding: 0; text-align: right;
                        margin-top: 2mm;'>Discont (18%):</p>
                        <p style='font-weight: bold; font-size: 12px; margin: 0; padding: 0; text-align: right;
                        margin-top: 2mm;'>Subtotal:</p>
                        <p style='font-weight: bold; font-size: 12px; margin: 0; padding: 0; text-align: right;
                        margin-top: 2mm;'>Shipping:</p>
                        <p style='font-weight: bold; font-size: 12px; margin: 0; padding: 0; text-align: right;
                        margin-top: 2mm;'>Total:</p>
                    </div>
                    <div class='totales-n'>
                        <p style='font-size: 12px; margin: 0; padding: 0; text-align: right; margin-left: 3mm;'><?php echo $subtotal?></p>
                        <p style='font-size: 12px; margin: 0; padding: 0; text-align: right; margin-top: 2.1mm; margin-left: 3mm;'><?php echo $iva?></p>
                        <p style='font-size: 12px; margin: 0; padding: 0; text-align: right; margin-top: 2.1mm; margin-left: 3mm;'><?php echo $desc?></p>
                        <p style='font-size: 12px; margin: 0; padding: 0; text-align: right; margin-top: 2.1mm; margin-left: 3mm;'><?php echo $subtotal2?></p>
                        <p style='font-size: 12px; margin: 0; padding: 0; text-align: right; margin-top: 2.1mm; margin-left: 3mm;'><?php echo $envio?></p>
                        <p style='font-size: 12px; margin: 0; padding: 0; text-align: right; margin-top: 2.1mm; margin-left: 3mm;'><?php echo $total?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</page>
<page backtop="0mm" backbottom="0mm" backleft="0mm" backright="0mm">
    <div class='style-05'></div>
    <div class='style-06'></div>
    <div class='h4-02'>
        <div class='logo4-02'>
            <img src="http://127.0.0.1/wp-local/wp-content/plugins/kalsteinCotizacion/assets/images/logo.png" style='float: right; width: 70%; margin-top: 12mm; margin-right: 2mm;'>
        </div>
        <div class='hr4-02'></div>
        <div class='h4-text-02'>
            <p class='lt4-01'>COMMERCIAL TERMS</p>
        </div>
    </div>
    <div class='p2img-01'>
        <img src="http://127.0.0.1/wp-local/wp-content/plugins/kalsteinCotizacion/assets/images/imagen1.jpg" style='float: right; width: 100%;'>
    </div>
    <div class='p2img-02'>
        <img src="http://127.0.0.1/wp-local/wp-content/plugins/kalsteinCotizacion/assets/images/imagen2.jpg" style='float: right; width: 100%;'>
    </div>
    <div class='p2img-03'>
        <img src="http://127.0.0.1/wp-local/wp-content/plugins/kalsteinCotizacion/assets/images/imagen3.jpg" style='float: right; width: 100%;'>
    </div>
    <div class='main-text'>
        <p style='margin: 0; padding: 0; color: #213280; font-weight: bold; font-size: 12px;'>PURCHASE ORDER ACCEPTANCE</p>
        <div class='i-list'>
            <p style='text-align: center; margin: 0; padding: 0; margin-top: 3mm;'>•</p>
            <p style='text-align: center; margin: 0; padding: 0; margin-top: 7mm;'>•</p>
            <p style='text-align: center; margin: 0; padding: 0; margin-top: 6mm;'>•</p>
        </div>
        <div class='i-txt'>
            <p style='margin: 0; padding: 0; font-size: 11px; text-align: justify; margin-top: 3mm;'>Kalstein France SAS receives a purchase order satisfaction, when this document faithfully expresses the commercial conditions established in the offer.</p>
            <p style='margin: 0; padding: 0; font-size: 11px; text-align: justify; margin-top: 1mm;'>Cash payments: For the processing and dispatch of the requested merchandise, verification of payment in Kalstein France bank accounts is required.</p>
            <p style='margin: 0; padding: 0; font-size: 11px; text-align: justify; margin-top: 1mm; margin-left: 0.2mm;'>Customers with Credit: For the processing and dispatch of the requested merchandise, proof of payment in Kalstein France bank accounts is required.</p>
        </div>
        <p style='margin: 0; padding: 0; color: #213280; font-weight: bold; font-size: 12px; margin-top: 10mm;'>TRADING CURRENCY</p>
        <div class='i-list'>
            <p style='text-align: center; margin: 0; padding: 0; margin-top: 3mm;'>•</p>
            <p style='text-align: center; margin: 0; padding: 0; margin-top: 7mm;'>•</p>
        </div>
        <div class='i-txt2'>
            <p style='margin: 0; padding: 0; font-size: 11px; text-align: justify; margin-top: 3mm;'>Offers in foreign currency, the currency conversion calculation will be carried out in accordance with the provisions of the Bank of France, set on the day of invoicing.</p>
            <p style='margin: 0; padding: 0; font-size: 11px; text-align: justify; margin-top: 1mm;'>The established trading currency for this listing is EUR.</p>
        </div>
        <p style='margin: 0; padding: 0; color: #213280; font-weight: bold; font-size: 12px; margin-top: 5mm;'>WARRANTY</p>
        <div class='i-list'>
            <p style='text-align: center; margin: 0; padding: 0; margin-top: 3mm;'>•</p>
            <p style='text-align: center; margin: 0; padding: 0; margin-top: 4.5mm;'>•</p>
            <p style='text-align: center; margin: 0; padding: 0; margin-top: 4.5mm;'>•</p>
        </div>
        <div class='i-txt3'>
            <p style='margin: 0; padding: 0; font-size: 11px; text-align: justify; margin-top: 3mm;'>All equipment sold by Kalstein France has a one-year warranty for manufacturing purposes from the date of invoice of the goods.</p>
            <p style='margin: 0; padding: 0; font-size: 11px; text-align: justify; margin-top: 1mm;'>The warranty does not cover damage caused by poor installation or operation, transport defects or by uses other than those specified by the manufacturer.</p>
            <p style='margin: 0; padding: 0; font-size: 11px; text-align: justify; margin-top: 1mm;'>Warranty excludes electrical or consumable parts.</p>
        </div>
        <p style='margin: 0; padding: 0; color: #213280; font-weight: bold; font-size: 12px; margin-top: 5mm;'>DELIVERY TIMES</p>
        <div class='i-list'>
            <p style='text-align: center; margin: 0; padding: 0; margin-top: 7mm;'>•</p>
        </div>
        <div class='i-txt4'>
            <p style='margin: 0; padding: 0; font-size: 11px; text-align: justify; margin-top: 3mm;'>The delivery times indicated in this quote are estimates subject to variables.</p>
        </div>
        <p style='margin: 0; padding: 0; color: #213280; font-weight: bold; font-size: 12px; margin-top: 7mm;'>CANCELLATIONS AND RETURNS WITHOUT JUST CAUSE</p>
        <div class='i-list'>
            <p style='text-align: center; margin: 0; padding: 0; margin-top: 3mm;'>•</p>
            <p style='text-align: center; margin: 0; padding: 0; margin-top: 3.5mm;'>•</p>
            <p style='text-align: center; margin: 0; padding: 0; margin-top: 9.5mm;'>•</p>
        </div>
        <div class='i-txt5'>
            <p style='margin: 0; padding: 0; font-size: 11px; text-align: justify; margin-top: 3mm;'>Merchandise in inventory will have a penalty equivalent to 20% of the value of the purchase order.</p>
            <p style='margin: 0; padding: 0; font-size: 11px; text-align: justify; margin-top: 1mm;'>Import Merchandise, after receiving the purchase order to satisfaction, there is a maximum of (3) days to cancel the purchase order, after this time cancellations are not accepted and the merchandise will be invoiced as established.</p>
            <p style='margin: 0; padding: 0; font-size: 11px; text-align: justify; margin-top: 1mm;'>The return of the merchandise will be the responsibility of the Client, the box, packaging and all the parts that make up the equipment to be returned, must be in perfect condition without mistreatment, scratches and additional labels, the Kalstein France Technical Support and Logistics team, carrying out technical report and will indicate the satisfactory receipt of the merchandise. If it is not received satisfactorily, the equipment will be invoiced in accordance with the provisions of the Purchase Order.</p>
        </div>
        <p style='margin: 0; padding: 0; color: #213280; font-weight: bold; font-size: 12px; margin-top: 22mm;'>GENERAL POLICIES, TERMS AND CONDITIONS</p>
        <p style='margin: 0; padding: 0; font-size: 11px; margin-top: 1mm;'>https://kalstein.eu/p12/Terms-and-Conditions/pages.html</p>
    </div>
    <div class='style-07'><p style='text-align: right; color: #fff; font-size: 9px; margin-right: 12mm; margin-top: 6.5mm; font-weight: bold;'>Page [[page_cu]] of [[page_nb]]</p></div>
    <div class='style-08'></div>
</page>
<page backtop="0mm" backbottom="0mm" backleft="0mm" backright="0mm">
    <div class='style-05'></div>
    <div class='style-06'></div>
    
    <div class='logo-05'>
        <img src="http://127.0.0.1/wp-local/wp-content/plugins/kalsteinCotizacion/assets/images/logo.png" style='float: left; width: 60%; margin-top: 15mm; margin-left: 10mm;'><br><br><br><br><br><br><br><br>
        <p style='margin: 0; padding: 0; color: #213280; font-size: 9px; margin-top: -2mm; margin-left: 28mm;'>A different accompaniment, at your service</p>
    </div>
    <div class='img-loc'>
        <img src="http://127.0.0.1/wp-local/wp-content/plugins/kalsteinCotizacion/assets/images/imagen4.jpg" style='float: left; width: 100%;'>
    </div>
    <div class='inf-cont'>
        <p style='margin: 0; padding: 0; color: #213280; font-weight: bold; font-size: 18px;'>ANY QUESTIONS?</p>
        <p style='margin: 0; padding: 0; color: #213280; font-size: 11px; margin-top: 1mm;'>Contact us:</p>
        <p style='margin: 0; padding: 0; color: #213280; font-size: 11px; margin-top: 4mm;'>PARIS - FRANCE</p>
        <p style='margin: 0; padding: 0; color: #213280; font-weight: bold; font-size: 12px; margin-top: 1mm;'>S E D E</p>
        <p style='margin: 0; padding: 0; color: #213280; font-size: 11px; margin-top: 1mm;'>2 Rue Jean Lantier</p>
        <p style='margin: 0; padding: 0; color: #213280; font-size: 11px; margin-top: 1mm;'>Paris - France</p>
        <p style='margin: 0; padding: 0; color: #213280; font-weight: bold; font-size: 11px; margin-top: 1mm;'>Fax: <span style='color: #213280; font-size: 11px; font-weight: lighter;'>+33 (0) 1 78 95 87 89</span></p>
        <p style='margin: 0; padding: 0; color: #213280; font-weight: bold; font-size: 11px; margin-top: 1mm;'>Tlf: <span style='color: #213280; font-size: 11px; font-weight: lighter;'>+33 (0) 6 80 76 07 10</span></p>
        <p style='margin: 0; padding: 0; color: #213280; font-size: 11px; margin-top: 1mm;'>sales@kalstein.eu</p>
        <p style='margin: 0; padding: 0; color: #213280; font-weight: bold; font-size: 11px; margin-top: 1mm;'>https://kalstein.net/</p>    
    </div>
    <div class='img-cont'>
        <img src="http://127.0.0.1/wp-local/wp-content/plugins/kalsteinCotizacion/assets/images/FAQ.png" style='float: left; width: 100%; height: 100%;'>
    </div>   
    <div class='f-last'>
        <p style='margin: 0; padding: 0; text-align: center; font-size: 7px; margin-top: 5mm;'>KALSTEIN FRANCE S.A.S</p>
        <p style='margin: 0; padding: 0; text-align: center; font-size: 7px; margin-top: 0.1mm;'>• 2 Rue Jean Lantier, • 75001 Paris •</p>
        <p style='margin: 0; padding: 0; text-align: center; font-size: 7px; margin-top: 0.1mm;'>+33 1 78 95 87 89 / +33 6 80 76 07 10 • https://kalstein.eu</p>
    </div>
    <div class='style-07'><p style='text-align: right; color: #fff; font-size: 9px; margin-right: 12mm; margin-top: 6.5mm; font-weight: bold;'>Page [[page_cu]] of [[page_nb]]</p></div>
    <div class='style-08'></div>
</page>