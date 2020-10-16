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

  <div >
    <div >
      <table border="1" cellspacing="0px" width="100%" >
        <thead>        
          <tr bgcolor="#086A87">
           <th >Id</th>
           <th >Nombre</th>
           <th >Resultado</th>
           <th >Dimensión</th>
           <th >Sub-Dimensión</th>
           <th >Principios SEPS</th>
           <th >Principios Pacto Mundial</th>
           <th >Grupo Interés</th>
           <th >Herramienta</th>
           <th >Códigos GRI</th>
           <th >Códigos ISO2600</th>
           <th >Periodo</th>
           <th >Sector </th>
         </tr>
       </thead>
       <tbody > ';
       if (!empty($indicadoresCuantativosEmpresa))
         foreach ($indicadoresCuantativosEmpresa as $key){
          $html .= '
          <tr class="horizontalpdfcuerpo1">
            <td scope="col" >'.$key->IdIndicador.'</td>
            <td scope="col" >'.$key->Nombre.'</td>
            <td scope="col" >'.$key->Resultado.'</td>
            <td scope="col" >'.$key->Dimension.'</td>
            <td scope="col" >'.$key->SubDimension.'</td>
            <td scope="col" >'.$key->PrincipiosSEPS.'</td>
            <td scope="col" >'.$key->PrincipiosPactoMundial.'</td>
            <td scope="col" >'.$key->GrupoInteres.'</td>
            <td scope="col" >'.$key->Herramienta.'</td>
            <td scope="col" >'.$key->CodigosGRI.'</td>
            <td scope="col" >'.$key->CodigosISO2600.'</td>
            <td scope="col" >'.$key->Periodo.'</td>
            <td scope="col" >'.$key->Sector .'</td>
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
