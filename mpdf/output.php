<?php

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new mPDF();
$mpdf->WriteHTML($html);
 
//call watermark content aand image
$mpdf->SetWatermarkText('phpflow.COM');
$mpdf->showWatermarkText = true;
$mpdf->watermarkTextAlpha = 0.1;
 
 
//save the file put which location you need folder/filname
$mpdf->Output("phpflow.pdf", 'F');
 
 
//out put in browser below output function
$mpdf->Output();
?>