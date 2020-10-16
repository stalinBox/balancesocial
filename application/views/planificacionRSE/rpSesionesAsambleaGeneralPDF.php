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
           <th >Nombre de la Runión</th>
           <th >Tipo</th>
           <th >Fecha de Planificación</th>
           <th >Representantes Planificados</th>
           <th >Estado</th>
           <th >Fehca de Ejecución</th>
           <th >Asistentes</th>
           <th >Observaciones</th>
           <th >Periodo</th>                     
         </tr>
       </thead>
       <tbody > ';
       if (!empty($sesionesAsambleaGeneral))
         foreach ($sesionesAsambleaGeneral as $key){
          $html .= '
          <tr class="horizontalpdfcuerpo1">
            <td scope="col" >'.$key->NombreReunion.'</td>
            <td scope="col" >'.$key->TipoReunion.'</td>
            <td scope="col" >'.$key->FechaPlanificacion.'</td>
            <td scope="col" >'.$key->RepresentantesPlanificados.'</td>
            <td scope="col" >'.$key->EstadoReunion.'</td>
            <td scope="col" >'.$key->FechaEjecucion.'</td>
            <td scope="col" >'.$key->RepresentantesPresentes.'</td>            
            <td scope="col" >'.$key->Observaciones.'</td>
            <td scope="col" >'.$key->Periodo.'</td>
          </tr>
          ';
        }
        echo "hola";
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
