<?php 
$dir = base_url();
//die();
$html = '
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Sistema Web RSE</title>
  <link rel="shortcut icon" href="'.$dir.'imagenes/logo_icono.jpg">
  <link href="'.$dir.'css/estilospdf.css" rel="stylesheet" type="text/css">
</head>

<body>

  <div id="contenedorpdf">
    <div id="cabecerapdf">
      <table width="100%"><tr>
        <td width="80%" style="color:#000000; ">
          <span style="font-weight: bold; font-size: 14pt;">'.@$empresa[0]->NombreEmpresa.'</span><br/>
          Dirección: '.@$empresa[0]->DireccionEmpresa.'<br />
          <span style="font-family:dejavusanscondensed;">&#9742;</span> '.@$empresa[0]->TelefonoEmpresa.'<br/>    
          Creado por: '.@$usuario.'<br />
        </td>
        <td width="20%" style="text-align: right;">
          <img src="'.$dir."".@$imgIcono.'" width="50" height="50" alt=""/>
        </td>
      </tr>
    </table>
  </div>

  <div id="tablapdf">
    <div id="tablaceldaspdf">
      <table border="1" cellspacing="0px" width="100%" class="tablclpelpdf">
        <thead>        
          <tr class="horizontalcabpdf">
           <th >N. Productos y Servicios</th>
           <th >Frecuencia de Evaluación</th>
           <th >Nombre del Responsable</th>
           <th >Objetivo</th>
           <th >N. Evluaciones Efectuadas</th>
           <th >N. Productos</th>
           <th >N. Servicios</th>
           <th >N. Productos con Reclamos por afectar a la Salud</th>
           <th >N. Servicios con Reclamos</th>
           <th >N. Productos Etiquetados</th>
           <th >N. Productos Retirados</th>
           <th >N. Productos con Normas de Etiquetado</th>
           <th >Fecha de Registro</th>
         </tr>
       </thead>
       <tbody > ';       
       if (!empty($evaluacionProductosServicios))
         foreach ($evaluacionProductosServicios as $key){
          $html .= '
          <tr class="horizontalpdfcuerpo1">
            <td scope="col" >'.number_format($key->NumEvaProdServProgramado, 0).'</td>
            <td scope="col" >'.$key->FrecuenciaEvaluacion.'</td>
            <td scope="col" >'.$key->NombreResponsable.'</td>
            <td scope="col" >'.$key->Objetivo.'</td>
            <td scope="col" >'.number_format($key->NumEvaProdSerEfectuados, 0).'</td>
            <td scope="col" >'.number_format($key->NumProductos, 0).'</td>
            <td scope="col" >'.number_format($key->NumServicios, 0).'</td>
            <td scope="col" >'.number_format($key->NumProductosReclamadosAfectaSalud, 0).'</td>
            <td scope="col" >'.number_format($key->NumServiciosReclamados, 0).'</td>
            <td scope="col" >'.number_format($key->NumProductosEtiquetados, 0).'</td>
            <td scope="col" >'.number_format($key->NumProductosRetirados, 0).'</td>
            <td scope="col" >'.number_format($key->NumProdConNormasEtiquetado, 0).'</td>
            <td scope="col" >'.$key->FechaMes.'</td>
          </tr>
          ';
        }
        $html .='
      </tbody>
    </table>
  </div>
</div> 
</div>
</body>
</html>
';

include('libPDF/mpdf.php');
$mpdf = new mPDF('utf-8','A4-L');
  //$cssFact = file_get_contents('css/estilospdf.css');
  //$cssFact = file_get_contents('css/styleFact.css');
  //$mpdf->WriteHTML($cssFact, 1);
$mpdf->SetHeader(@$empresa[0]->NombreEmpresa);

$mpdf->SetFooter('{DATE j-m-Y}|'.@$nombreTabla.'|{PAGENO}/{nbpg}');
$mpdf->SetDisplayMode('fullpage');
$mpdf->WriteHTML($html);
$mpdf->Output('reporte'.@$nombreTabla.'.pdf', 'I');

?>
