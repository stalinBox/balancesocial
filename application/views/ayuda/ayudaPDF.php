<?php
//include('../balancesocial/libPDF/mpdf.php');
include("../mpdf.php");

$mpdf = new mPDF();

$mpdf->SetImportUse();

$mpdf->Thumbnail('sample_orientation3.pdf', 4);

$mpdf->Output();


?>