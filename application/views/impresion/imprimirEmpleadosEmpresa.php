<?php 
$hoy = getdate();
$dir = base_url();
//print_r($hoy);
//die();
$html = '
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Sistema Web RSE</title>
<link rel="shortcut icon" href="imagenes/logo_icono.jpg">
<link href="<?php echo base_url();?>css/estilospdf.css" rel="stylesheet" type="text/css">    
<link href="css/estilospdf.css" rel="stylesheet" type="text/css">    
</head>

<body>
<div id="contenedorpdf">
  <div id="cabecerapdf">
      <section id="Imagen1">
           <img src="imagenes/logo.jpg" width="220" height="120" alt=""/>
      </section>
      <section id="caracteristicas">
        <p>'.@$empresa[0]->NombreEmpresa.'</p>
      </section>
   </div>
  <div class="tablapdf">
    <div id="tablapdf">    
     <table id="tablaPaginada" border="0" cellspacing="4px" width="100%">
       <thead>
        <tr class="encabezado">
         <th >Cédula</th>
         <th >Nombres</th>
         <th >Apellidos</th>
         <th >Sexo</th>
         <th >Étnia</th>
         <th >Estado Civil</th>
         <th >Nacionalidad</th>
         <th >Instrucción</th>
         <th >TipoContrato</th>
         <th >Cargo</th>
         <th >Afiliado al IESS</th>
         <th >Discapacidad</th>
         <th >Estado</th>
         <th >Fecha de Ingreso</th>
         <th >Fecha de Salida</th>
       </tr>
     </thead>
     <tbody > ';
     foreach ($empleadosEmpresa as $key){
        $html .= '
        <tr class="filas">
          <td class="columnas">'.$key->CedulaEmpleado.'</td>
          <td class="columnas">'.$key->NombresEmpleado.'</td>
          <td class="columnas">'.$key->ApellidoPaternoEmpleado." ".$key->ApellidoMaternoEmpleado.'</td>
          <td class="columnas">'.$key->SexoEmpleado.'</td>
          <td class="columnas">'.$key->EtniaEmpleado.'</td>
          <td class="columnas">'.$key->EstadoCivil.'</td>
          <td class="columnas">'.$key->Nacionalidad.'</td>
          <td class="columnas">'.$key->InstruccionEmpleado.'</td>
          <td class="columnas">'.$key->TipoContrato.'</td>
          <td class="columnas">'.$key->CargoEstructural.'</td>
          <td class="columnas">'.$key->AfiliadoIESSEmpleado.'</td>
          <td class="columnas">'.$key->DiscapacidadEmpleado.'</td>
          <td class="columnas">'.$key->EstadoLaboralEmpleado.'</td>
          <td class="columnas">'.$key->FIngresoContratoEmpleado.'</td>
          <td class="columnas">'.$key->FSalidaEmpleado.'</td>
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
  $mpdf = new mPDF('c','A4');
  //$mpdf->SetDisplayMode('fullpage');
  $cssFact = file_get_contents('css/estilospdf.css');
  //$cssFact = file_get_contents('css/styleFact.css');
  $mpdf->WriteHTML($cssFact, 1);

  $mpdf->WriteHTML($html);
  $mpdf->Output('reporte.pdf', 'I');
?>
