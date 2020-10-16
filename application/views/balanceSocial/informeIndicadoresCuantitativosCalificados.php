<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Informe de Balance Social</title>
  <link href="<?php echo base_url()?>css/estilospdf.css" rel="stylesheet" type="text/css">
  <style type="text/css">
    .tituloReporte { font-size:12pt; font-family:Liberation Serif; writing-mode:page; text-align:center ! important; }
    .colorTituloReporte { color:#006699; font-size:28pt; font-style:italic; font-weight:bold; }
    .colorSubTituloReporte { color:#006699; font-size:22pt; font-style:italic; font-weight:bold; }
    .colorPeriodoReporte { color:#006699; font-size:16pt; font-style:italic; font-weight:bold; }
    .colorFechaReporte { color:#006699; font-size:12pt; font-style:italic; font-weight:bold; }
  </style>
  
</head>
<body>
  <div id="contenedorpdf">
    <div id="cabeceraprincipalpdf">
      <div id="logorsempresarial">
        <img src="<?php echo base_url()?>imagenes/RSELOGO.png" width="174" height="40" alt=""/> </div>
        <div id="derechacolor"> </div>
      </div>
      <p class="tituloReporte"><span class="colorTituloReporte">Informe del Balance Social</span></p>
      <p class="tituloReporte"><span class="colorSubTituloReporte"><?php echo $nombreEmpresa[0]->NombreEmpresa; ?></span></p>
      <p class="tituloReporte"><span class="colorPeriodoReporte">Periodo <?php echo $periodo; ?></span></p>
      <p class="tituloReporte"><span class="colorFechaReporte"><?php echo $fechaSistema; ?></span></p>

      <div id="cabecerapdf">
        <section id="Imagen1">
          <img src="data:image/jgp;base64, <?php echo base64_encode(@$imagenesInstitucionales[0]->Logotipo) ?>" width="90" height="80" alt=""/>
        </section>
        </br>
        </br>
        </br>
        <section id="caracteristicas">
         <!--  <p><?php echo $imagenesInstitucionales[0]->Eslogan; ?></p> -->
        </section>
      </div>
      <div id="tablapdf">
        <div id="tablaceldaspdf">
        <table border="1" cellspacing="0px" class="tablclpelpdf">
            <thead>
              <tr class="horizontalcabpdf">
                <th width="10%" scope="col" class="clmnpdf4">Id</th>
                <th scope="col" class="clmnpdf4">Nombre</th>
                 <th scope="col" class="clmnpdf4">PrincipiosACI</th>
                <th scope="col" class="clmnpdf4">DimensionesACI</th> 
                <th scope="col" class="clmnpdf4">Descripción</th>
                <th scope="col" class="clmnpdf4">Fórmula</th>
                <th width="10%" scope="col" class="clmnpdf4">Resultado</th>
                <th scope="col" class="clmnpdf4">Calificación</th>
                <th scope="col" class="clmnpdf4">Compromiso - Comentario</th>
              </tr>
            </thead>           

            <tbody>
      <?php //number_format($numero, 2, ",", ".");
      if (!empty($indicadoresCuantitativoCalifiacadoEmpresa)) {

            foreach ($indicadoresCuantitativoCalifiacadoEmpresa as $key) { ?>
              <tr class="horizontalpdfcuerpo1">
                <th scope="col" class="clmnpdf4"><?php echo $key->ICIndicador ?></th>
                <th scope="col" class="clmnpdf4"><?php echo $key->Nombre ?></th>
                 <th scope="col" class="clmnpdf4"><?php echo $key->principiosACI ?></th>
                <th scope="col" class="clmnpdf4"><?php echo $key->dimensionesACI ?></th>
                <th scope="col" class="clmnpdf4"><?php echo $key->ICTextoResultado ?></th>
                <th scope="col" class="clmnpdf4"><?php echo $key->ICFormula ?></th>
                <th scope="col" class="clmnpdf3resultado"><?php echo number_format($key->ICResultado, 1) ." ".$key->UnidadMedida ?></th>

                <?php if ($key->ICCalificacion == 5) { ?>
                <th scope="col" class="clmnpdf3verde">
                <?php echo $key->ICCalificacion ?>
                        <img src="<?php echo base_url()?>imagenes/img_pdf/excelente.png" width="15" height="15" alt=""/> 
                </th>

                <?php }elseif ($key->ICCalificacion == 4) { ?>
                <th scope="col" class="clmnpdf3azul">
                <?php echo $key->ICCalificacion ?>
                        <img src="<?php echo base_url()?>imagenes/img_pdf/azul.png" width="15" height="15" alt=""/> 
                </th>

                <?php }elseif ($key->ICCalificacion == 3) { ?>
                <th scope="col" class="clmnpdf3celeste">
                <?php echo $key->ICCalificacion ?>
                        <img src="<?php echo base_url()?>imagenes/img_pdf/celeste.png" width="15" height="15" alt=""/> 
                </th>

                <?php }elseif ($key->ICCalificacion == 2) { ?>
                <th scope="col" class="clmnpdf3amarillo">
                <?php echo $key->ICCalificacion ?>
                        <img src="<?php echo base_url()?>imagenes/img_pdf/amarillo.png" width="15" height="15" alt=""/> 
                </th>

                <?php }elseif ($key->ICCalificacion == 1) { ?>
                <th scope="col" class="clmnpdf3naranja">
                <?php echo $key->ICCalificacion ?>
                        <img src="<?php echo base_url()?>imagenes/img_pdf/regular.png" width="15" height="15" alt=""/> 
                </th>

                <?php }elseif ($key->ICCalificacion == 0) { ?>
                <th scope="col" class="clmnpdf3rojo">
                <?php echo $key->ICCalificacion ?>
                        <img src="<?php echo base_url()?>imagenes/img_pdf/deficiente.png" width="15" height="15" alt=""/> 
                </th> 
                <?php } ?>
                
                <th scope="col" class="clmnpdf4"><?php echo $key->ICComentario ?></th>
              </tr>
      <?php
          }        
      }            
      ?>
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
  </html>