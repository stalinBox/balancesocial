<?php

$hoy = getdate();
$dir = base_url();

$html = 
'<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Informe de Balance Social</title>
  <link href="'.$dir.'css/estilospdf.css" rel="stylesheet" type="text/css">
  <style type="text/css">
    .tituloReporte { font-size:10pt; font-family:Liberation Serif; writing-mode:page; text-align:center ! important; }
    .colorTituloReporte { color:#006699; font-size:28pt; font-style:italic; font-weight:bold;text-align:center }
    .colorSubTituloReporte { color:#006699; font-size:22pt; font-style:italic; font-weight:bold; text-align:center }
    .colorPeriodoReporte { color:#006699; font-size:16pt; font-style:italic; font-weight:bold; text-align:center }
    .colorFechaReporte { color:#006699; font-size:12pt; font-style:italic; font-weight:bold; text-align:center}
  </style>
</head>';

$html .='<body>
  <div id="contenedorpdf">
    <div id="cabeceraprincipalpdf">
      <div id="logorsempresarial">

        <img src="file://C:/wamp64/www/imagenes/RSELOGO.png" width="174" height="40" alt=""/> </div>
        <div id="derechacolor"> </div>
      </div>

      <p class="tituloReporte"><span class="colorTituloReporte">Informe del Balance Social</span></p>
      <p class="tituloReporte"><span class="colorSubTituloReporte">'.$nombreEmpresa[0]->NombreEmpresa.'</span></p>
      <p class="tituloReporte"><span class="colorPeriodoReporte">Periodo '.$periodo.'</span></p>
      <p class="tituloReporte"><span class="colorFechaReporte">'.$fechaSistema.'</span></p>

      <div id="cabecerapdf">
        <section id="Imagen1">
          <img src="data:image/jgp;base64,'.base64_encode(@$imagenesInstitucionales[0]->Logotipo).'" width="90" height="80" alt=""/>
        </section>
        <section id="caracteristicas">
          <p>'.$imagenesInstitucionales[0]->Eslogan.'</p>
        </section>
      </div>';

      $html .='<div id="tablapdf">
        <div id="tablaceldaspdf">
        <table border="1" cellspacing="0px" class="tablclpelpdf">
            <thead>
              <tr class="horizontalcabpdf">
                <th scope="col" class="clmnpdf1">Código</th>
                <th scope="col" class="clmnpdf2">Indicador</th>
                <th scope="col" class="clmnpdf2">Principios ACI</th>
                <th scope="col" class="clmnpdf2">Dimensiones ACI</th>
                <th scope="col" class="clmnpdf2">Resultado</th>
                <th scope="col" class="clmnpdf2">Fórmula</th>
                <th scope="col" class="clmnpdf2">Resultado</th>
                <th scope="col" class="clmnpdf2">Calificación</th>
                <th scope="col" class="clmnpdf4">Compromiso / Comentario</th>
              </tr>
            </thead>           

            <tbody>';

            foreach ($indicadoresCuantitativoCalifiacadoEmpresa as $key) {
              $html .='
              <tr class="horizontalpdfcuerpo1">
                <th scope="col" class="clmnpdf1">'. $key->IdIndicadorCalificado.'</th>
                <th scope="col" class="clmnpdf2">'. $key->ICIndicador.'</th>
                <th scope="col" class="clmnpdf2">'. $key->principiosACI.'</th>
                <th scope="col" class="clmnpdf2">'. $key->dimensionesACI.'</th>
                <th scope="col" class="clmnpdf2">'. $key->ICTextoResultado.'</th>
                <th scope="col" class="clmnpdf2">'. $key->ICFormula.'</th>
                <th scope="col" class="clmnpdf2">'. number_format($key->ICResultado, 1).' '. $key->UnidadMedida.'</th>';
                
                if($key->ICCalificacion==5){
                    $html.='<th scope="col" class="clmnpdf3verde">'.$key->ICCalificacion.' '.'<img src="file://C:/wamp64/www/imagenes/img_pdf/excelente.png" width="15" height="15" alt=""/></th>';
                }elseif($key->ICCalificacion==4){
                    $html.='<th scope="col" class="clmnpdf3verde">'.$key->ICCalificacion.' '.'<img src="file://C:/wamp64/www/imagenes/img_pdf/azul.png" width="15" height="15" alt=""/></th>';
                }elseif ($key->ICCalificacion==3) {
                    $html.='<th scope="col" class="clmnpdf3verde">'.$key->ICCalificacion.' '.'<img src="file://C:/wamp64/www/imagenes/img_pdf/celeste.png" width="15" height="15" alt=""/></th>';
                }elseif ($key->ICCalificacion==2) {
                    $html.='<th scope="col" class="clmnpdf3verde">'.$key->ICCalificacion.' '.'<img src="file://C:/wamp64/www/imagenes/img_pdf/amarillo.png" width="15" height="15" alt=""/></th>';
                }elseif ($key->ICCalificacion==1) {
                    $html.='<th scope="col" class="clmnpdf3verde">'.$key->ICCalificacion.' '.'<img src="file://C:/wamp64/www/imagenes/img_pdf/regular.png" width="15" height="15" alt=""/></th>';
                }elseif ($key->ICCalificacion==0) {
                    $html.='<th scope="col" class="clmnpdf3verde">'.$key->ICCalificacion.' '.'<img src="file://C:/wamp64/www/imagenes/img_pdf/deficiente.png" width="15" height="15" alt=""/></th>';
                }
                $html .= '
                <th scope="col" class="clmnpdf4">'. $key->ICComentario.'</th>
              </tr>';
            }
              $html .='
            </tbody>
               <tfoot class="pdf">
              <tr class="pietablapdf">
                <td>
                  FIN DE TABLA
                </td>
              </tr>
            </tfoot>
          </table>

        </div>
      </div>

      <div id="piefuerapdf">
        <table width="100%%" border="0" cellspacing="0" class="tablapie">
          <tbody>
            <tr>
              <td class="clmnpiepdf1">&nbsp;</td>
              <td class="clmnpiepdfmedio">
                www.responsabilidadsocialempresarial.ec
              </td>
              <td class="clmnpiepdf1">&nbsp;</td>
            </tr>
          </tbody>
        </table>
      </div>

    </div>
  </body>
  </html> ';
 
  include('libPDF/mpdf.php');
  $mpdf = new mPDF('c','A4');
 
 // $cssFact = file_get_contents('css/estilospdf.css');
// $mpdf->WriteHTML($cssFact, 1);

  $mpdf->WriteHTML($html);
  $mpdf->Output('indicadores_cuantitativos.pdf', 'I');

   ?>