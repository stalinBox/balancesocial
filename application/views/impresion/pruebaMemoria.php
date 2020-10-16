<?php 
$html = 'Hola mundo';
include('../balancesocial/libPDF/mpdf.php');
$mpdf = new mPDF('c','A4');
$mpdf->SetHeader('MEMORIA DE BALANCE SOCIAL Y SUSTENTABILIDAD');
$mpdf->SetFooter('|Center Text|{PAGENO}|{DATE j-m-Y}');
$mpdf->WriteHTML($html);

$mpdf->AddPage('c','A4');
$mpdf->SetHTMLHeader('<div style="text-align: right; font-weight: bold;">My document</div>');
$mpdf->SetFooter('<table width="100%" style="vertical-align: bottom; font-family: serif; font-size: 8pt; color: #000000; font-weight: bold; font-style: italic;"><tr><td width="33%"><span style="font-weight: bold; font-style: italic;">{DATE j-m-Y}</span></td><td width="33%" align="center" style="font-weight: bold; font-style: italic;">{PAGENO}/{nbpg}</td><td width="33%" style="text-align: right; ">My document</td></tr></table>');

$mpdf->Output('reporte.pdf', 'I');

?>