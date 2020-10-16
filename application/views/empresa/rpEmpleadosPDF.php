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
         <th >Nombre</th>         
         <th >Fecha de Nacimiento</th>
         <th >Sexo</th>
         <th >Etnia</th>
         <th >Estado Civil</th>
         <th >Nacionalidad</th>
         <th >Región</th>
         <th >Fecha de Ingreso</th>
         <th >Fecha de Salida</th>
         <th >Fecha de Reincorporación</th>
         <th >Fecha Salida de Reincorporación</th>
         <th >Salario</th>
         <th >Tipo de Contrato</th>
         <th >Cargo Estructural</th>
         <th >Claúsulas en Contrato</th>
         <th >Afiliado al IESS</th>
         <th >Discapacitado</th>
         <th >Tipo de Discapacidad</th>
         <th >% de Discapacidad</th>
         <th >Condición de Discapacitado</th>
         <th >Instrucción</th>
         <th >Estado Laboral</th>
         <th >Pertence a Sindicato</th>        
       </tr>
     </thead>
     <tbody > ';
     if (!empty($empleadosEmpresa))
     foreach ($empleadosEmpresa as $key){
     	$sindicato = "";
     	if ($key->PerteneceSindicato != 0) {
     		$sindicato = "SI";
     	}else{
     		$sindicato = "NO";
     	}
        $html .= '
        <tr class="horizontalpdfcuerpo1">
          <td scope="col" >'.$key->CedulaEmpleado.'</td>
          <td scope="col" >'.$key->ApellidoPaternoEmpleado." ".$key->ApellidoMaternoEmpleado." ".$key->NombresEmpleado.'</td>
          <td scope="col" >'.$key->FNacimientoEmpleado.'</td>
          <td scope="col" >'.$key->SexoEmpleado.'</td>
          <td scope="col" >'.$key->EtniaEmpleado.'</td>
          <td scope="col" >'.$key->EstadoCivil.'</td>
          <td scope="col" >'.$key->Nacionalidad.'</td>
          <td scope="col" >'.$key->RegionEmpleado.'</td>
          <td scope="col" >'.$key->FIngresoContratoEmpleado.'</td>
          <td scope="col" >'.$key->FSalidaEmpleado.'</td>
          <td scope="col" >'.$key->FReincorporacion.'</td>
          <td scope="col" >'.$key->FFinReincorporacion.'</td>
          <td scope="col" >'.$key->SalarioEmpleado.'</td>
          <td scope="col" >'.$key->TipoContrato.'</td>
          <td scope="col" >'.$key->CargoEstructural.'</td>
          <td scope="col" >'.$key->NumClausulasContrato.'</td>
          <td scope="col" >'.$key->AfiliadoIESSEmpleado.'</td>
          <td scope="col" >'.$key->DiscapacidadEmpleado.'</td>
          <td scope="col" >'.$key->TipoDiscapacidadEmpleado.'</td>
          <td scope="col" >'.$key->PorcentajeDiscapacidadEmpleado.'</td>
          <td scope="col" >'.$key->CondicionDiscapacidadEmpleado.'</td>
          <td scope="col" >'.$key->InstruccionEmpleado.'</td>
          <td scope="col" >'.$key->EstadoLaboralEmpleado.'</td>
          <td scope="col" >'.$sindicato.'</td>
          </tr>
        ';
     }

      $html .='
   </tbody>
   </table>
  </div>
 </div> 
</div>';
	  
$html .='</body>
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
