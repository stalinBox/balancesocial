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
           <th >Cédula</th>
           <th >Nombres</th>
           <th >Apellidos</th>
           <th >Fecha de Nacimiento</th>
           <th >Sexo</th>
           <th >Etnia</th>
           <th >Organismo</th>
           <th >Fecha de Inicio de Gestión</th>
           <th >Fecha Fin de Gestión</th>
           <th >Cargo</th>
           <th >Funciones</th>           
         </tr>
       </thead>
       <tbody > ';
       if (!empty($representantes))
         foreach ($representantes as $key){
          $html .= '
          <tr class="horizontalpdfcuerpo1">
            <td scope="col" >'.$key->CedulaRepresentante.'</td>
            <td scope="col" >'.$key->NombresRepresentante.'</td>
            <td scope="col" >'.$key->ApellidoPaternoRepresentante. " ".$key->ApellidoMaternoRepresentante.'</td>            
            <td scope="col" >'.$key->FNacimientoRepresentante.'</td>
            <td scope="col" >'.$key->SexoRepresentante.'</td>
            <td scope="col" >'.$key->EtniaRepresentante.'</td>            
            <td scope="col" >'.$key->Organismo.'</td>
            <td scope="col" >'.$key->FechaInicioPeriodo.'</td>
            <td scope="col" >'.$key->FechaFinPeriodo.'</td>
            <td scope="col" >'.$key->Cargo.'</td>
            <td scope="col" >'.$key->Funciones.'</td>
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

include('../balancesocial/libPDF/mpdf.php');
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
