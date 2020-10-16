<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Documento sin título</title>
  <link href="<?php echo base_url()?>css/estilospdf.css" rel="stylesheet" type="text/css">
</head>

<body>
  <div id="contenedorpdf">
    <div id="cabeceraprincipalpdf">
      <div id="logorsempresarial">
        <img src="<?php echo base_url()?>imagenes/RSELOGO.png" width="174" height="40" alt=""/> </div>
        <div id="derechacolor"> </div>
      </div>
      <div id="cabecerapdf">
        <section id="Imagen1">
          Ingresar Logo tamaño máximo
          110px
        </section>
        <section id="caracteristicas">
          <p>COOPERATIVA DE AHORRO Y CREDITO OSCUS CIUDAD DE AMBATO</p>
        </section>
      </div>
      <div id="tablapdf">
        <div id="tablaceldaspdf">
        <table border="1" cellspacing="0px" class="tablclpelpdf">
            <thead>
              <tr class="horizontalcabpdf">
                <th scope="col" class="clmnpdf1">Principio SEPS</th>
                <th scope="col" class="clmnpdf2">Resultado</th>
                <th scope="col" class="clmnpdf2">Fórmula</th>
                <th colspan="2" class="clmnpdf3" scope="col">RESULTADO</th>
                <th scope="col" class="clmnpdf4">COMENTARIO - COMPROMISO</th>
              </tr>
            </thead>           

            <tbody>
      <?php 
            foreach ($indicadoresCuantitativoCalifiacadoEmpresa as $key) { ?>
              <tr class="horizontalpdfcuerpo1">
                <th scope="col" class="clmnpdf1"><?php echo $key->ICIndicador ?></th>
                <th scope="col" class="clmnpdf2"><?php echo $key->ICTextoResultado ?></th>
                <th scope="col" class="clmnpdf2"><?php echo $key->ICFormula ?></th>
                <th scope="col" class="clmnpdf3resultado"><?php echo $key->ICResultado ." ".$key->UnidadMedida ?></th>
                <?php if ($key->ICCalificacion == 0){ ?>
                  <th scope="col" class="clmnpdf3deficiente">Bajo</th>
                <?php }else{ if ($key->ICCalificacion < 4){ ?>
                  <th scope="col" class="clmnpdf3regular">Medio</th>
                <?php }else { ?>
                <th scope="col" class="clmnpdf3excelente">Excelente</th>
                <?php }
                 } ?>
                <th scope="col" class="clmnpdf4"><?php echo $key->ICComentario ?></th>
              </tr>
      <?php
          }
      ?>
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
  </html>