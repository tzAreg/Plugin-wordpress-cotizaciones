<?php

	require __DIR__.'/../vendor/autoload.php';

	use Spipu\Html2Pdf\Html2Pdf;

	// Recoger el contenido del otro fichero
	ob_start();
	require_once __DIR__.'/template.php';
	$html = ob_get_clean();

	$html2pdf = new HTML2PDF('P', 'letter', 'es', true, 'UTF-8', 3);
    $html2pdf->pdf->SetDisplayMode('fullpage');
	$html2pdf -> writeHTML($html);
	$html2pdf -> output('cotizacion.pdf');
	
?>