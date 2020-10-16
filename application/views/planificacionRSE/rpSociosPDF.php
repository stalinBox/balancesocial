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
           <th >Socios Incorporados</th>
           <th >Socios Retirados</th>
           <th >Socios Activos</th>
           <th >Socios Mujeres Activas</th>
           <th >Socios con Cunetas de Ahorro</th>
           <th >Personas Naturales Incorporadas</th>
           <th >Personas Jurídicas Incorporadas</th>
           <th >Socios Menores de Edad</th>
           <th >Socios con Certificado de Aportación</th>
           <th >Socios sin Certificado de Aportación</th>
           <th >Valor Total del Certificado de Aportación</th>
           <th >Valor Total del Certificado de Aportación Devueltos</th>
           <th >Socios Hombres con Certificado de Aportación</th>
           <th >Socios Mujeres con Certificado de Aportación</th>
           <th >Clientes Nuevos en el Periodo</th>
           <th >Clientes Retirados en el Periodo</th>
           <th >Mes de Registro</th>
         </tr>
       </thead>
       <tbody > ';       
       if (!empty($socios))
         foreach ($socios as $key){
          $html .= '
          <tr class="horizontalpdfcuerpo1">
            <td scope="col" >'.number_format($key->NumSociosIncorporados, 0).'</td>
            <td scope="col" >'.number_format($key->NumSociosRetirados, 0).'</td>
            <td scope="col" >'.number_format($key->NumSociosActivos, 0).'</td>
            <td scope="col" >'.number_format($key->NumSociosMujeresActivas, 0).'</td>
            <td scope="col" >'.number_format($key->NumSociosConCuentasDeAhorro, 0).'</td>
            <td scope="col" >'.number_format($key->NumPersonasNaturalesIncorporadas, 0).'</td>
            <td scope="col" >'.number_format($key->NumPersonasJuridicasIncorporadas, 0).'</td>
            <td scope="col" >'.number_format($key->NumSociosConCuentaAhorroMenorA18Anios, 0).'</td>
            <td scope="col" >'.number_format($key->CantSociosConCertAportacion, 0).'</td>
            <td scope="col" >'.number_format($key->CantSociosSinCertAportacion, 0).'</td>
            <td scope="col" >'.number_format($key->ValorTCertificadoAportacion, 2).'</td>
            <td scope="col" >'.number_format($key->ValorCertificadoAportacionDevueltos, 2).'</td>
            <td scope="col" >'.number_format($key->NumSociosHombresConCertAportacion, 0).'</td>
            <td scope="col" >'.number_format($key->NumSociosMujeresConCertAportacion, 0).'</td>
            <td scope="col" >'.number_format($key->NumTClientesNuevosPeriodo, 0).'</td>
            <td scope="col" >'.number_format($key->NumTClientesRetiradosPeriodo, 0).'</td>
            <td scope="col" >'.$key->MesPertenece.'</td>        
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
