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
<link href="css/estilospdf.css" rel="stylesheet" type="text/css">    
</head>

<body>
<div id="contenedorpdf"><!--Este el contenedor de la tabla principal -->
  <div id="cabecerapdf">
      <section id="Imagen1">
           <img src="imagenes/logo_icono.jpg" width="120" height="120" alt=""/>
      </section>
      <section id="caracteristicas">
        <p>INGRESAR DATOS ACORDE AL TEMA VER CARACTERISTICAS NUEVAS.....   ESCRIBIR TEXTO AQUI... BALANCE SOCIAL ANUAL VISITANOS EN SLKJVH   </p>
      </section>
   </div>
  <div class="tablapdf">
    <div id="tablapdf">    
     <table id="tablaPaginada" border="0" cellspacing="4px" width="100%">
       <thead>
        <tr class="encabezado">
         <th >Fase</th>
         <th >Indicador</th>
         <th >Pregunta</th>
         <th >CódigoGRI</th>
         <th >Dimensión</th>
         <th >Sub-Dimensión</th>
       </tr>
     </thead>
     <tbody > ';
     foreach ($indicadoresCualitativos as $key){
        $html .= '
        <tr class="filas">
          <td class="columnas">'.$key->Fase.'</td>
          <td class="columnas">'.$key->IndicadorCualitativo.'</td>
          <td class="columnas">'.$key->Pregunta.'</td>
          <td class="columnas">'.$key->CodigoGRI.'</td>
          <td class="columnas">'.$key->Dimension.'</td>
          <td class="columnas">'.$key->SubDimension.'</td>
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

/*
  $html = '    
<head>
    <meta charset="utf-8">
    <title>AC-Store</title>
  </head>
  <header class="clearfix">
      <div id="logo">
        <img src="imagenes/update.jpg">
      </div>
      <h1>Amante de la Comida Store</h1>
      <div id="company" class="clearfix">
        <div>Amante de la Comida Store</div>
        <div>Ecuador,<br /> Tungurahu, Ambato</div>
        <div>(032) 000000</div>
        <div><a href="correo_company@example.com">correo_company@example.com</a></div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">Fase</th>
            <th class="desc">Indicador</th>
            <th>Pregunta</th>
            <th>Código GRI</th>
            <th>Dimesión</th>
            <th>Sub-Dimensión</th>
          </tr>
        </thead>
        <tbody>';

foreach ($indicadoresCualitativos as $cualitativos) {
  $html .='<tr>
            <td class="service">'.$cualitativos->Fase.'</td>
            <td class="service">'.$cualitativos->IndicadorCualitativo.'</td>
            <td class="service">'.$cualitativos->Pregunta.'</td>
            <td class="service">'.$cualitativos->CodigoGRI.'</td>
            <td class="service">'.$cualitativos->Dimension.'</td>
            <td class="service">'.$cualitativos->SubDimension.'</td>
          </tr>';
}
 
$html .='
        </tbody>
      </table>
      <div id="notices">
        <div>NOTA:</div>
        <div class="notice">Agregar nota</div>
      </div>
    </main>>';
    */
  include('libPDF/mpdf.php');
  $mpdf = new mPDF('c','A4');
  //$mpdf->SetDisplayMode('fullpage');
  $cssFact = file_get_contents('css/estilospdf.css');
  //$cssFact = file_get_contents('css/styleFact.css');
  $mpdf->WriteHTML($cssFact, 1);

  $mpdf->WriteHTML($html);
  $mpdf->Output('reporte.pdf', 'I');
?>