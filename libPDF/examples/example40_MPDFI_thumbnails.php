<?php
//include('../balancesocial/libPDF/mpdf.php');
include("../mpdf.php");

$mpdf=new mPDF(); 
$mpdf->SetImportUse();	

//$mpdf->Thumbnail('sample_orientation2.pdf', 1, 2);	// number per row	// spacing in mm

//$mpdf->WriteHTML('<pagebreak /><div>Now with rotated pages</div>');

$mpdf->Thumbnail('ayuda_SI_RSE.pdf', 1);	// number per row	// spacing in mm


$mpdf->Output();

exit;


?>