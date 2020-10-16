<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Memoria de Sustentabilidad </title>
  <link href="<?php echo base_url()?>css/estilospdf.css" rel="stylesheet" type="text/css">
  <script type="text/javascript" language="javascript" src="<?php echo base_url();?>ajax/libs/jquery/1.8.2/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>libHighCharts/js/highcharts.js"></script>
  <script src="<?php echo base_url() ?>libHighCharts/js/highcharts-more.js"></script>
  <script src="<?php echo base_url() ?>libHighCharts/js/modules/exporting.js"></script>
</head>
<script type="text/javascript">
  $(function () {
    $('#graficaCreditosSocios').highcharts({
        chart: {
            type: 'area'
        },
        title: {
            text: 'Créditos Concedidos a Socios'
        },
        xAxis: {
            categories: ['','Consumo de Socios', 'Vivienda a Socios', 'Microcrédito a Socios', 'Comercial a Socios', 'Inmobiliario a Socios',''],
                tickmarkPlacement: 'on',
                lineWidth: 0,
            allowDecimals: false,
            labels: {
                formatter: function () {
                    return this.value; // clean, unformatted number for year
                }
            }
        },
        yAxis: {
            title: {
                text: 'Valor en Dólares'
            },
            labels: {
                formatter: function () {
                    return this.value / 1 + ' US$';
                }
            }
        },
        tooltip: {
            pointFormat: '{series.name} Créditos <b>{point.y:,.0f}</b><br/>Item {point.x}'
        },
        legend: {
            align: 'right',
            verticalAlign: 'top',
            y: 50,
            layout: 'vertical'
            },
        series: [{
            name: 'Periodo Actual',
            data: [0, 3000, 2500, 2000, 3500, 3000, 0],
                dataLabels: {
                enabled: true,                
                style: {
                    color: 'blue',
                    fontWeight: 'bold',
                    textShadow: '0px 0px 0px blue'
                }
            },
                pointPlacement: 'on'
        },{
            name: 'Periodo Anterior',
            data: [0, 2000, 1500, 2500, 3000, 2500, 0],
                dataLabels: {
                enabled: true,                
                style: {
                    color: '#000000',
                    fontWeight: 'bold',
                    textShadow: '0px 0px 0px black'
                }
            },
                pointPlacement: 'on'
            }]
        });
  });
  $(function () {
    $('#graficaContratoProveedores').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Contratos con Proveedores'
        },
        xAxis: {
            categories: [
                'Periodo Anterior',
                'Periodo Actual'
            ],
            crosshair: true
        },
        yAxis: {
            title: {
                text: 'Contratos (%)'
            },
            labels: {
                formatter: function () {
                    return this.value + ' %';
                }
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' + '<td style="padding:0"><b>{point.y:.1f} %</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        legend: {
            align: 'right',
            verticalAlign: 'top',
            y: 50,
            layout: 'vertical'
            },
        plotOptions: {
            column: {
                pointPadding: 0.1,
                borderWidth: 1
            }
        },
        series: [{
            name: 'Locales',
            data: [
            <?php echo (@$contratosProveedoresLocalesPA[0]->ContratosLocales * 100) / (@$contratosProveedoresPA[0]->Contratos); ?>
            ,
            <?php echo (@$contratosProveedoresLocales[0]->ContratosLocales * 100) / (@$contratosProveedores[0]->Contratos); ?>
            ],
            dataLabels: {
                enabled: true,                
                style: {
                    color: '#000000',
                    fontWeight: 'bold',
                    textShadow: '0px 0px 0px black'
                }
            },
                pointPlacement: 'on'
        }, {
            name: 'Nacionales',
            data: [
            <?php echo (@$contratosProveedoresNacionalesPA[0]->ContratosNacionales * 100) / (@$contratosProveedoresPA[0]->Contratos); ?>
            ,
            <?php echo (@$contratosProveedoresNacionales[0]->ContratosNacionales * 100) / (@$contratosProveedores[0]->Contratos); ?>
            ],
            dataLabels: {
                enabled: true,                
                style: {
                    color: '#000000',
                    fontWeight: 'bold',
                    textShadow: '0px 0px 0px black'
                }
            }
        }]
    });
  });
  $(function () {
    $('#graficaSatisfaccionClienteServicios').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Monitoreo de Satisfacción y atención al Cliente'
        },
        xAxis: {
            categories: [
                'Periodo Actual',
                'Periodo Anterior'
            ],
            crosshair: true
        },
        yAxis: {
            title: {
                text: 'Satisfacción (%)'
            },
            labels: {
                formatter: function () {
                    return this.value + ' %';
                }
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' + '<td style="padding:0"><b>{point.y:.1f} %</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        legend: {
            align: 'right',
            verticalAlign: 'top',
            y: 50,
            layout: 'vertical'
            },
        plotOptions: {
            column: {
                pointPadding: 0.1,
                borderWidth: 1
            }
        },
        series: [{
            name: 'Clientes',
            data: [
            <?php echo @$satisfaccionClienteServicios[0]->ValorTPorcentajeSatisfaccionCliente; ?>
            ,
            <?php echo @$satisfaccionClienteServiciosPA[0]->ValorTPorcentajeSatisfaccionCliente; ?>
            ],
            dataLabels: {
                enabled: true,                
                style: {
                    color: '#000000',
                    fontWeight: 'bold',
                    textShadow: '0px 0px 0px black'
                }
            },
                pointPlacement: 'on'
        }, {
            name: 'Servicios',
            data: [
            <?php echo @$satisfaccionClienteServicios[0]->ValorTPorcentajeSatisfaccionServicioFinancieros; ?>
            ,
            <?php echo @$satisfaccionClienteServiciosPA[0]->ValorTPorcentajeSatisfaccionServicioFinancieros; ?>
            ],
            dataLabels: {
                enabled: true,                
                style: {
                    color: '#000000',
                    fontWeight: 'bold',
                    textShadow: '0px 0px 0px black'
                }
            }
        }]
    });
  });
 $(function () {
    $('#graficaReclamos').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Gestión de Quejas o Reclamos'
        },
        xAxis: {
            categories: [
                'Periodo Actual',
                'Periodo Anterior'
            ],
            crosshair: true
        },
        yAxis: {
            title: {
                text: 'Reclamos (%)'
            },
            labels: {
                formatter: function () {
                    return this.value + ' %';
                }
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' + '<td style="padding:0"><b>{point.y:.1f} %</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        legend: {
            align: 'right',
            verticalAlign: 'top',
            y: 50,
            layout: 'vertical'
            },
        plotOptions: {
            column: {
                pointPadding: 0.1,
                borderWidth: 1
            }
        },
        series: [{
            name: 'Reclamos',
            data: [
            <?php echo @$datosTotales[0]->NumTReclamos; ?>
            ,
            <?php echo @$datosTotalesPA[0]->NumTReclamos; ?>
            ],
            dataLabels: {
                enabled: true,                
                style: {
                    color: '#000000',
                    fontWeight: 'bold',
                    textShadow: '0px 0px 0px black'
                }
            },
                pointPlacement: 'on'
        }, {
            name: 'Atendidos',
            data: [
            <?php echo @$datosTotales[0]->NumTReclamosResueltos; ?>
            ,
            <?php echo @$datosTotalesPA[0]->NumTReclamosResueltos; ?>
            ],
            dataLabels: {
                enabled: true,                
                style: {
                    color: '#000000',
                    fontWeight: 'bold',
                    textShadow: '0px 0px 0px black'
                }
            }
        }]
    });
  });
  $(function () {
    $('#graficaCrecimientoSocios').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Crecimiento sustentable de la Cooperativa'
        },
        xAxis: {
            categories: [
                'Periodo Actual',
                'Periodo Anterior'
            ],
            crosshair: true
        },
        yAxis: {
            title: {
                text: 'Crecimiento de Socios'
            },
            labels: {
                formatter: function () {
                    return this.value;
                }
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' + '<td style="padding:0"><b>{point.y:.1f} %</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        legend: {
            align: 'right',
            verticalAlign: 'top',
            y: 50,
            layout: 'vertical'
            },
        plotOptions: {
            column: {
                pointPadding: 0.1,
                borderWidth: 1
            }
        },
        series: [{
            name: 'Socios',
            data: [ 
            <?php echo @$datosTotales[0]->NumTSocios; ?>
            ,
            <?php echo @$datosTotalesPA[0]->NumTSocios; ?>
            ],
            dataLabels: {
                enabled: true,                
                style: {
                    color: '#000000',
                    fontWeight: 'bold',
                    textShadow: '0px 0px 0px black'
                }
            },
                pointPlacement: 'on'
        }]
    });
  });
 $(function () {
    $('#graficaColaboradoresXGenero').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Distribución por Género'
        },
        xAxis: {
            categories: [
                'Periodo Anterior',
                'Periodo Actual'
            ],
            crosshair: true
        },
        yAxis: {
            title: {
                text: 'Colaboradores (%)'
            },
            labels: {
                formatter: function () {
                    return this.value + ' %';
                }
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' + '<td style="padding:0"><b>{point.y:,.0f} %</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        legend: {
            align: 'right',
            verticalAlign: 'top',
            y: 50,
            layout: 'vertical'
            },
        plotOptions: {
            column: {
                pointPadding: 0.1,
                borderWidth: 1
            }
        },
        series: [{
            name: 'Mujeres',
            data: [
            <?php 
            if (@$datosTotalesPA[0]->NumTEmpleados == 0) {@$datosTotalesPA[0]->NumTEmpleados = 1;}            
            if (@$datosTotales[0]->NumTEmpleados == 0) {@$datosTotales[0]->NumTEmpleados = 1;}            
            echo number_format((@$datosTotalesPA[0]->NumTEmpleadosM*100)/@$datosTotalesPA[0]->NumTEmpleados, 0); ?>
            ,
            <?php echo number_format((@$datosTotales[0]->NumTEmpleadosM*100)/@$datosTotales[0]->NumTEmpleados, 0); ?>
            ],
            dataLabels: {
                enabled: true,                
                style: {
                    color: '#000000',
                    fontWeight: 'bold',
                    textShadow: '0px 0px 0px black'
                }
            },
                pointPlacement: 'on'
        }, {
            name: 'Hombres',
            data: [
            <?php 
            if (true) {}
            echo number_format((@$datosTotalesPA[0]->NumTEmpleadosH*100)/@$datosTotalesPA[0]->NumTEmpleados, 0); ?>
            ,
            <?php echo number_format((@$datosTotales[0]->NumTEmpleadosH*100)/@$datosTotales[0]->NumTEmpleados, 0); ?>
            ],
            dataLabels: {
                enabled: true,                
                style: {
                    color: '#000000',
                    fontWeight: 'bold',
                    textShadow: '0px 0px 0px black'
                }
            }
        }]
    });
  });
</script>
<body>
  <div id="contenedorpdf">

   <div class="caratulajpg">
  <img src="data:image/jgp;base64, <?php echo base64_encode(@$imagenesInstitucionales[0]->ImgPrincipalMemoria) ?>" width="500" height="600" alt=""/>
  <!-- <img src="<?php echo base_url()?>imagenes/img_pdf/caratula.jpg" width="590" height="820" alt=""/> -->
  </div>
  
  <div id="cabeceraprincipalpdf">
    <div id="logorsempresarial">
      <img src="<?php echo base_url()?>imagenes/img_pdf/SI-RSE-logo.jpg" width="110" height="40" alt=""/>
    </div>
    <div id="derechacolor">        
    </div>
  </div>

<br>

  <div id="tablapdf">
    <!--Hoja 1 -->
    <div class="hoja0">
      <div class="h0izq">
        <p class="titulos2">INTRODUCCION</p>
        <p class="texto">
          <?php echo @$detalleEstructuraMemoria[0]->IntroduccionMemoria;?> 
        </p>
      </div>

      <div class="h0dere">
        <img src="data:image/jgp;base64, <?php echo base64_encode(@$imagenesInstitucionales[0]->ImgIntroduccionMemoria) ?>" width="160" height="500" alt=""/>
      </div>
      1
    </div>
    <!--Fin de Hoja 1 -->
<br><br><br><br><br>
    <!--Hoja 2 -->
    <div class="hoja0">
      <!--Izquierda -->
      <div class="h0izq">
        <p class="titulos2">EL R.S.E</p>
        <p class="texto">
          <?php echo @$detalleEstructuraMemoria[0]->IntroRSE;?> 
        </p>
        <section class="jpg1">
          <table width="100%%" border="0" cellspacing="0" class="imagen1">
            <tbody>
              <tr>
                <td class="img1">
                  <!-- <img src="<?php echo base_url()?>imagenes/img_pdf/jpg1.jpg" width="150" height="250" alt=""/> -->
                  <img src="data:image/jpg;base64, <?php echo base64_encode(@$declaracionPresidenteDecripcionInforme[0]->Foto) ?>" width="200" height="240" alt=""/></td>
                </td>
                <td class="descimg1">
                  Declaración del Presidente
                  <p><?php  echo @$declaracionPresidenteDecripcionInforme[0]->Declaracion; ?></p>
                </td>
              </tr>
            </tbody>
          </table>
        </section>

      </div>
      <!--Fin de Izquierda -->
      <!--Derecha -->
      <div class="h0dere">
        <br>
        <br>
        <section class="jpg1">
          <table width="100%%" border="0" cellspacing="0" class="imagen1">
            <tbody>
              <tr>
                <td class="img1">              
                  <img src="data:image/jpg;base64, <?php echo base64_encode(@$imagenesInstitucionales[0]->FotoPresidente) ?>" width="220" height="250" alt=""/></td>            
                  <td class="descimg1">
                    Mensaje del Presidente
                    <p><?php  echo @$detalleEstructuraMemoria[0]->MensajePresidente; ?></p>
                    <br>
                    <br>
                    <br><br>
                  </td>
                </tr>
              </tbody>
            </table>
        </section>
          <br>          
        <section class="jpg1">
            <table width="100%%" border="0" cellspacing="0" class="imagen1">
              <tbody>
                <tr>
                  <td class="img1">
                    <!-- <img src="<?php echo base_url()?>fotosPruebas/gerencia.jpg" width="220" height="250" alt=""/> -->
                    <img src="data:image/jpg;base64, <?php echo base64_encode(@$imagenesInstitucionales[0]->FotoGerencia) ?>" width="220" height="250" alt=""/></td>
                  </td>
                  <td class="descimg1">
                    Declaración de la Gerencia
                    <p><?php  echo @$detalleEstructuraMemoria[0]->MensajeGerencia; ?></p>
                  </td>
                </tr>
              </tbody>
            </table>
        </section>

      </div>
        <!--Fin de Derecha -->
    2
    </div><!--Fin de Hoja 2 -->
<br><br><br><br><br>
    <!--Hoja 3 -->
    <div class="hoja0">
      <!--Izquierda -->
      <div class="h0izq">
        <p class="titulos2">Sistema de Gobierno Cooperativo</p>
        <p class="texto">
          <?php  echo @$detalleEstructuraMemoria[0]->IntroGobierno; ?>
        </p>
        <br>
        <section class="jpg1">
          <table width="100%%" border="0" cellspacing="0" class="imagen1">
            <tbody>
              <tr>
                <td class="img1">              
                  <img src="data:image/jpg;base64, <?php echo base64_encode(@$sesionAsambleaGeneral[0]->Foto) ?>" width="220" height="250" alt=""/></td>            
                  <td class="descimg1">
                    Asamblea de Representantes
                    <p><?php  echo @$detalleEstructuraMemoria[0]->IntroGobiernoRepresentantes; ?></p>
                  </td>
                </tr>
              </tbody>
            </table>
        </section>
      </div>
      <!--Fin de Izquierda -->
      <!--Derecha -->
      <div class="h0dere">
        <br>
        <br>
        <section class="jpg1">
            <table width="100%%" border="0" cellspacing="0" class="imagen1">
              <tbody>
                <tr>
                  <td class="img1">              
                    <img src="data:image/jpg;base64, <?php echo base64_encode(@$consejoAdministracion[0]->ImagenConsejos) ?>" width="280" height="250" alt=""/></td>            
                    <td class="descimg1">
                      Consejo de Administración
                      <p><?php  echo @$detalleEstructuraMemoria[0]->IntroGobiernoCosejoAdministracion; ?></p>
                    </td>
                  </tr>
                </tbody>
              </table>
          </section>
          <br>
          <section class="jpg1">
              <table width="100%%" border="0" cellspacing="0" class="imagen1">
                <tbody>
                  <tr>
                    <td class="img1">              
                      <img src="data:image/jpg;base64, <?php echo base64_encode(@$consejoVIgilancia[0]->ImagenConsejos) ?>" width="280" height="250" alt=""/></td>            
                      <td class="descimg1">
                        Consejo de Vigilancia
                        <p><?php  echo @$detalleEstructuraMemoria[0]->IntroGobiernoConsejoVigilancia; ?></p>
                      </td>
                    </tr>
                  </tbody>
                </table>
          </section>
      </div>
      <!--Fin de Derecha -->
    3
    </div><!--Fin de Hoja 3 -->
<br><br><br><br><br>
    <!--Hoja 4-->
    <div class="hoja1">
      <div class="h1izquierda">
        <br>
        <br>
        <br>
        <section class="jpg1">
          <p class="titulos2">Consejos</p>
          <p class="texto">
            <p><?php  echo @$detalleEstructuraMemoria[0]->IntroGobiernoConsejos; ?></p>            
          </p>
          <div id="tablapdf">

            <div id="tablaceldaspdf">
              <table border="1" cellspacing="0px" class="tablclpelpdf">
                <thead>          
                  <tr class="horizontalcabpdf">
                    <th scope="col" class="clmnpdf1">Consejo</th>
                    <th scope="col" class="clmnpdf2">Funciones</th>
                    <th scope="col" class="clmnpdf2">Sesiones</th>
                    <th colspan="2" class="clmnpdf3" scope="col">Género<br>H &nbsp; &nbsp; &nbsp; &nbsp;M</th>
                  </tr>              
                </thead>
                <tbody>
                  <?php
                  if (!empty($sesionesConsejos)) {
                    foreach ($sesionesConsejos as $key) { ?>
                    <tr class="horizontalpdfcuerpo1">
                      <th scope="col" class="clmnpdf1"><?php echo $key->NombreConsejos ?></th>
                      <th scope="col" class="clmnpdf2"><?php echo $key->FuncionConsejos ?></th>
                      <th scope="col" class="clmnpdf2"><?php echo $key->Sesiones ?></th>
                      <th scope="col" class="clmnpdf3verde"><?php echo $key->NumeroHombres ?></th>
                      <th scope="col" class="clmnpdf3verde"><?php echo $key->NumeroMujeres ?></th>
                    </tr>
                    <?php }
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </section>
        <br>
        <section class="jpg1">
          <p class="titulos2">Comités</p>
          <p class="texto">
          <p><?php  echo @$detalleEstructuraMemoria[0]->IntroGobiernoComites; ?></p>
          </p>
          <div id="tablapdf">
            <div id="tablaceldaspdf">
              <table border="1" cellspacing="0px" class="tablclpelpdf">
                <thead>          
                  <tr class="horizontalcabpdf">
                    <th scope="col" class="clmnpdf1">Comité</th>
                    <th scope="col" class="clmnpdf2">Funciones</th>
                    <th scope="col" class="clmnpdf2">Integrantes</th>
                  </tr>              
                </thead>
                <tbody>
                  <?php
                  if (!empty($comites)) {
                    foreach ($comites as $key) { ?>
                    <tr class="horizontalpdfcuerpo1">
                      <th scope="col" class="clmnpdf1"><?php echo $key->NombreComite ?></th>
                      <th scope="col" class="clmnpdf2"><?php echo $key->FuncionComite ?></th>
                      <th scope="col" class="clmnpdf2"><?php echo $key->IntegrantesComite ?></th>
                    </tr>
                    <?php }
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </section>
      </div> <!--Fin de  h1izquierda-->
      
      <div class="h1derecha">
        <br>
        <br>
        <br>
        <section class="jpg1">
          <table width="100%%" border="0" cellspacing="0" class="imagen1">
            <tbody>
              <tr>
                <td class="img1">              
                  <img src="data:image/jpg;base64, <?php echo base64_encode(@$imagenesInstitucionales[0]->FotoEjecutivos) ?>" width="220" height="250" alt=""/>
                  <td class="descimg1">
                    Ejecutivos
                    <p><?php  echo @$detalleEstructuraMemoria[0]->IntroGobiernoEjecutivos; ?></p>
                  </td>
                </tr>
              </tbody>
          </table>
        </section>
          <div id="tablapdf">
            <div id="tablaceldaspdf">
              <table border="1" cellspacing="0px" class="tablclpelpdf">
                <thead>          
                  <tr class="horizontalcabpdf">
                    <th scope="col" class="clmnpdf1">Nombre</th>
                    <th scope="col" class="clmnpdf2">Nivel Ejecutivo</th>
                    <th scope="col" class="clmnpdf2">Funciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if (!empty($representantesEjecutivos)) {
                    foreach ($representantesEjecutivos as $key) { ?>
                    <tr class="horizontalpdfcuerpo1">
                      <th scope="col" class="clmnpdf1"><?php echo $key->NombresRepresentante. " ".$key->ApellidoPaternoRepresentante ." ".$key->ApellidoMaternoRepresentante ?></th>
                      <th scope="col" class="clmnpdf2"><?php echo $key->NombreOrganismo ?></th>
                      <th scope="col" class="clmnpdf2"><?php echo $key->Funciones ?></th>
                    </tr>
                    <?php }
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
      </div> <!--Fin de  h1derecha-->
    4
    </div><!--Fin de  Hoja 4-->
<br><br><br><br><br>

    <!--Hoja 5 -->
    <div class="hoja0">
      <!--Izquierda -->
      <div class="h0izq">
        <p class="titulos2">Certificaciones</p>
        <p class="texto">          
        <?php  echo @$detalleEstructuraMemoria[0]->IntroCertificaciones; ?></p>
        <br>
        <?php if (count(@$certificaciones) >= 1)  { ?> 
        <section class="jpg1">
          <table width="100%%" border="0" cellspacing="0" class="imagen1">
            <tbody>
              <tr>
                <td class="img1">              
                  <img src="data:image/jpg;base64, <?php echo base64_encode(@$certificaciones[0]->Imagen) ?>" width="280" height="250" alt=""/></td>            
                  <td class="descimg1">
                    <?php echo @$certificaciones[0]->NombreCertificacion; ?>
                    <p> Certificación de tipo
                      <?php echo @$certificaciones[0]->TipoCertificacion; ?>, Otorgado por la la Entidad <?php echo @$certificaciones[0]->EmisorCertificacion; ?>
                    </p>
                  </td>
                </tr>
              </tbody>
            </table>
        </section>
        <?php } ?>
      </div>
      <!--Fin de Izquierda -->
      <!--Derecha -->
      <div class="h0dere">
        <br>
        <br>
        <?php if (count(@$certificaciones) >= 2)  { ?> 
        <section class="jpg1">
          <table width="100%%" border="0" cellspacing="0" class="imagen1">
            <tbody>
              <tr>
                <td class="img1">              
                  <img src="data:image/jpg;base64, <?php echo base64_encode(@$certificaciones[1]->Imagen) ?>" width="280" height="250" alt=""/></td>            
                  <td class="descimg1">
                    <?php echo @$certificaciones[1]->NombreCertificacion; ?>
                    <p> Certificación de tipo
                      <?php echo @$certificaciones[1]->TipoCertificacion; ?>, Otorgado por la la Entidad <?php echo @$certificaciones[1]->EmisorCertificacion; ?>
                    </p>
                  </td>
                </tr>
              </tbody>
            </table>
        </section>
        <?php } ?>
          <br>
          <br>
          <br>
          <br>
          <br>
          <?php if (count(@$certificaciones) >= 3)  { ?>            
        <section class="jpg1">
          <table width="100%%" border="0" cellspacing="0" class="imagen1">
            <tbody>
              <tr>
                <td class="img1">              
                  <img src="data:image/jpg;base64, <?php echo base64_encode(@$certificaciones[2]->Imagen) ?>" width="280" height="250" alt=""/></td>            
                  <td class="descimg1">
                    <?php echo @$certificaciones[2]->NombreCertificacion; ?>
                    <p> Certificación de tipo
                      <?php echo @$certificaciones[2]->TipoCertificacion; ?>, Otorgado por la la Entidad <?php echo @$certificaciones[2]->EmisorCertificacion; ?>
                    </p>
                  </td>
                </tr>
              </tbody>
            </table>
        </section>
          <?php } ?>

      </div>
      <!--Fin de Derecha -->
    5
    </div><!--Fin de Hoja 5 -->
<br><br><br><br><br>

    <!--Hoja 6 -->
    <div class="hoja0">
      <!--Izquierda -->
      <div class="h0izq">
        <p class="titulos2">Balance General</p>
        <p class="texto">
          <?php  echo @$detalleEstructuraMemoria[0]->IntroBalanceGeneral; ?>
        </p>
        <br>
        <section class="jpg1">
        <div id="tablapdf">
            <div id="tablaceldaspdf">
              <table border="1" cellspacing="0px" class="tablclpelpdf">
                <thead>          
                  <tr class="horizontalcabpdf">
                    <th scope="col" class="clmnpdf1">Cuentas</th>
                    <th scope="col" class="clmnpdf2">Periodo Anterior (USD$)</th>
                    <th scope="col" class="clmnpdf2">Periodo Actual (USD$)</th>
                    <th scope="col" class="clmnpdf2">Valoración (USD$)</th>
                  </tr>
                </thead>
                <tbody>                
                    <tr class="horizontalpdfcuerpo1">
                      <th scope="col" class="clmnpdf1">Activos</th>
                      <th scope="col" class="clmnpdf1"><?php echo number_format(@$balanceGeneral[0]->ValorTActivosAnioAnterior, 2, '.', ' '); ?></th>
                      <th scope="col" class="clmnpdf1"><?php echo number_format(@$balanceGeneral[0]->ValorTActivos, 2, '.', ' '); ?></th>
                      <th scope="col" class="clmnpdf2"><?php echo number_format((@$balanceGeneral[0]->ValorTActivos - @$balanceGeneral[0]->ValorTActivosAnioAnterior), 2, '.', ' '); ?></th>
                    </tr>
                    <tr class="horizontalpdfcuerpo1">
                      <th scope="col" class="clmnpdf1">Pasivos</th>
                      <th scope="col" class="clmnpdf1"><?php echo number_format(@$balanceGeneral[0]->ValorTPasivosAnioAnterior, 2, '.', ' '); ?></th>
                      <th scope="col" class="clmnpdf1"><?php echo number_format(@$balanceGeneral[0]->ValorTPasivos, 2, '.', ' '); ?></th>
                      <th scope="col" class="clmnpdf1"><?php echo number_format((@$balanceGeneral[0]->ValorTPasivos - @$balanceGeneral[0]->ValorTPasivosAnioAnterior), 2, '.', ' '); ?></th>
                    </tr>
                    <tr class="horizontalpdfcuerpo1">
                      <th scope="col" class="clmnpdf1">Patrimonio</th>
                      <th scope="col" class="clmnpdf1"><?php echo number_format(@$balanceGeneral[0]->ValorTPatrimonioAnioAnterior, 2, '.', ' '); ?></th>
                      <th scope="col" class="clmnpdf1"><?php echo number_format(@$balanceGeneral[0]->ValorTPatrimonio, 2, '.', ' '); ?></th>
                      <th scope="col" class="clmnpdf1"><?php echo number_format((@$balanceGeneral[0]->ValorTPatrimonio - @$balanceGeneral[0]->ValorTPatrimonioAnioAnterior), 2, '.', ' '); ?></th>
                    </tr>
                    <tr class="horizontalpdfcuerpo1">
                      <th scope="col" class="clmnpdf1">Utilidad</th>
                      <th scope="col" class="clmnpdf1"><?php echo number_format(@$balanceGeneral[0]->UtilidadTEjercicioAnioAnterior, 2, '.', ' '); ?></th>
                      <th scope="col" class="clmnpdf1"><?php echo number_format(@$balanceGeneral[0]->UtilidadTEjercicio, 2, '.', ' '); ?></th>
                      <th scope="col" class="clmnpdf1"><?php echo number_format((@$balanceGeneral[0]->UtilidadTEjercicio - @$balanceGeneral[0]->UtilidadTEjercicioAnioAnterior), 2, '.', ' '); ?></th>
                    </tr>
                </tbody>
              </table>
            </div>
          </div>

        </section>
      </div>
      <!--Fin de Izquierda -->
      <!--Derecha -->
      <div class="h0dere">
        <br>
        <br>
        <section class="jpg1">
          <p class="titulos2">Valor Económico Generado</p>
          <p class="texto">
            <?php // echo @$detalleEstructuraMemoria[0]->IntroValorEconomicoGenerado; ?>
          </p>
          <div id="tablapdf">
            <div id="tablaceldaspdf">
              <table border="1" cellspacing="0px" class="tablclpelpdf">
                <thead>          
                  <tr class="horizontalcabpdf">
                    <th scope="col" class="clmnpdf1">Cuenta</th>
                    <th scope="col" class="clmnpdf2">Sub-Tipo de Distribución</th>
                    <th scope="col" class="clmnpdf2">Saldo</th>
                  </tr>              
                </thead>
                <tbody>
                  <?php
                  if (!empty($distribValorEconomicoGenerado)) {
                    foreach ($distribValorEconomicoGenerado as $key) { ?>
                    <tr class="horizontalpdfcuerpo1">
                      <th scope="col" class="clmnpdf1"><?php echo $key->NombreSubCuenta ?></th>
                      <th scope="col" class="clmnpdf2"><?php echo $key->SubTipoDistribucion ?></th>
                      <th scope="col" class="clmnpdf2"><?php echo number_format($key->Saldo, 2, '.', ' '); ?></th>
                    </tr>
                    <?php }
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </section>
          <br>
        <section class="jpg1">
          <p class="titulos2">Valor Económico Distribuido</p>
          <p class="texto">
            <?php // echo @$detalleEstructuraMemoria[0]->IntroValorEconomicoDistribuido; ?>
          </p>
          <div id="tablapdf">
            <div id="tablaceldaspdf">
              <table border="1" cellspacing="0px" class="tablclpelpdf">
                <thead>          
                  <tr class="horizontalcabpdf">
                    <th scope="col" class="clmnpdf2">Sub-Tipo de Distribución</th>
                    <th scope="col" class="clmnpdf1">Cuenta</th>
                    <th scope="col" class="clmnpdf2">Saldo</th>
                  </tr>              
                </thead>
                <tbody>
                  <?php
                  if (!empty($distribValorEconomicoDistribuido)) {
                    foreach ($distribValorEconomicoDistribuido as $key) { ?>
                    <tr class="horizontalpdfcuerpo1">
                      <th scope="col" class="clmnpdf2"><?php echo $key->SubTipoDistribucion ?></th>
                      <th scope="col" class="clmnpdf1"><?php echo $key->NombreSubCuenta ?></th>
                      <th scope="col" class="clmnpdf2"><?php echo number_format($key->Saldo, 2, '.', ' '); ?></th>
                    </tr>
                    <?php }
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </section>
      </div>
      <!--Fin de Derecha -->
    6
    </div><!--Fin de Hoja 6 -->
<br><br><br><br><br>

    <!--Hoja 7 -->
    <div class="hoja0">
      <!--Izquierda -->
      <div class="h0izq">
        <p class="titulos2">Créditos Concedidos a Socios</p>
        <p class="texto">          
          <?php  echo @$detalleEstructuraMemoria[0]->IntroCreditosASocios; ?>
        </p>
        <br>

        <section class="jpg1">
          <div id="graficaCreditosSocios" style="min-width: 200px; max-width: 400px; height: 250px; margin: 0 auto"></div>
          <!-- Posible Consulta 
          SELECT MontoTCreditos, MontoTCreditoConsumoSocios, MontoTCreditoViviendaSocios, MontoTCreditoMicrocreditoSocios, MontoTCreditoComercialSocios, MontoTCreditoInmobiliarioSocios FROM DatosTotales WHERE Periodo = 2017 AND IdEmpresa = 1; -->
        </section>
      </div>
      <!--Fin de Izquierda -->
      <!--Derecha -->
      <div class="h0dere">
        <br>
        <br>
        <p class="titulos2">Impulso a las compras y contrataciones locales de bienes y servicios</p>
        <p class="texto">
          <?php  echo @$detalleEstructuraMemoria[0]->IntroContratosConProveedores; ?>
        </p>
        <br>
        <section class="jpg1">
        <?php if (!(empty(@$contratosProveedoresLocalesPA) OR empty(@$contratosProveedoresLocales))) { ?>
          <div id="graficaContratoProveedores" style="min-width: 200px; max-width: 400px; height: 350px; margin: 0 auto"></div>          
        <?php } ?>        

        </section>
      </div>
      <!--Fin de Derecha -->
    7
    </div><!--Fin de Hoja 7 -->
<br><br><br><br><br>

    <!--Hoja 8 -->    
    <div class="hoja0">
      <!--Izquierda -->
      <div class="h0izq">
        <p class="titulos2">Monitoreo de Satisfacción y atención al Cliente</p>
        <p class="texto">
          <?php  echo @$detalleEstructuraMemoria[0]->IntroSatisfaccionAlCliente; ?>
        </p>
        <br>
        <section class="jpg1">
          
          <div id="graficaSatisfaccionClienteServicios" style="min-width: 200px; max-width: 400px; height: 250px; margin: 0 auto"></div>          

        </section>
      </div>
      <!--Fin de Izquierda -->
      <!--Derecha -->
      <div class="h0dere">
        <br>
        <br>
        <p class="titulos2">Gestión de Quejas o Reclamos</p>
        <p class="texto">
          <?php  echo @$detalleEstructuraMemoria[0]->IntroQuejasYReclamos; ?>
        </p>
        <br>

        <section class="jpg1">
        
          <div id="graficaReclamos" style="min-width: 200px; max-width: 400px; height: 250px; margin: 0 auto"></div>          
                
        </section>
          <br>
          <br>
          <br>
          <br>
          <br>

      </div>
      <!--Fin de Derecha -->
    8
    </div><!--Fin de Hoja 8 -->

<br><br><br><br><br>
    <!--Hoja 9 -->    
    <div class="hoja0">
      <!--Izquierda -->
      <div class="h0izq">
        <p class="titulos2">Crecimiento sustentable de la Cooperativa</p>
        <p class="texto">
          <?php  echo @$detalleEstructuraMemoria[0]->IntroCrecimientoSustentableDeSociosEnCooperativa; ?>
        </p>
        <br>
        <section class="jpg1">
     
          <div id="graficaCrecimientoSocios" style="min-width: 200px; max-width: 400px; height: 250px; margin: 0 auto"></div>          
        
        </section>
      </div>
      <!--Fin de Izquierda -->
      <!--Derecha -->
      <div class="h0dere">
        <br>
        <br>
      
          <p class="titulos2">Productos y Servicios sustentables al servicio del centro del País</p>
          <p class="texto">
          <?php  echo @$detalleEstructuraMemoria[0]->IntroProductosYSevicios; ?>
          </p>
          <div id="tablapdf">
            <div id="tablaceldaspdf">
              <table border="1" cellspacing="0px" class="tablclpelpdf">
                <thead>          
                  <tr class="horizontalcabpdf">
                    <th scope="col" class="clmnpdf1">Nombre</th>
                    <th scope="col" class="clmnpdf2">Descripción</th>
                    <th scope="col" class="clmnpdf2">Observación</th>
                  </tr>              
                </thead>
                <tbody>
                  <?php
                  if (!empty($productosEmpresa)) {
                    foreach ($productosEmpresa as $key) { ?>
                    <tr class="horizontalpdfcuerpo1">
                      <th scope="col" class="clmnpdf1"><?php echo $key->NombreProductosEmpresa ?></th>
                      <th scope="col" class="clmnpdf2"><?php echo $key->DescripcionProductosEmpresa ?></th>
                      <th scope="col" class="clmnpdf2"><?php echo $key->ObservacionProductosEmpresa ?></th>
                    </tr>
                    <?php }
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
      </div>
      <!--Fin de Derecha -->
    9
    </div><!--Fin de Hoja 9 -->

<br><br><br><br><br>

    <!--Hoja 10 -->
    <div class="hoja0">
      <!--Izquierda -->
      <div class="h0izq">
        <p class="titulos2">Productos que brinda la Empresa</p>
        <p class="texto">
          <?php  echo @$detalleEstructuraMemoria[0]->IntroProductos; ?>
        </p>
        <br>
        <section class="jpg1">
          <table width="100%%" border="0" cellspacing="0" class="imagen1">
            <tbody>
              <tr>
                <td class="img1">              
                  <img src="data:image/jpg;base64, <?php echo base64_encode(@$imagenesInstitucionales[0]->FotoProductosServicios) ?>" width="400" height="250" alt=""/>           
                    <p>
                        
                    </p>
                  </td>
                </tr>
              </tbody>
            </table>
        </section>
      </div>
      <!--Fin de Izquierda -->
      <!--Derecha -->
      <div class="h0dere">
        <br>
        <br>
        <p class="titulos2">Servicios que brinda la Empresa</p>
            <p class="texto">
            <?php  echo @$detalleEstructuraMemoria[0]->IntroSevicios; ?>
            </p>
            <br>
            <div id="tablapdf">
            <div id="tablaceldaspdf">
              <table border="1" cellspacing="0px" class="tablclpelpdf">
                <thead>          
                  <tr class="horizontalcabpdf">
                    <th scope="col" class="clmnpdf1">Nombre</th>
                    <th scope="col" class="clmnpdf2">Descripción</th>
                  </tr>              
                </thead>
                <tbody>
                  <?php
                  if (!empty($serviciosEmpresa)) {
                    foreach ($serviciosEmpresa as $key) { ?>
                    <tr class="horizontalpdfcuerpo1">
                      <th scope="col" class="clmnpdf1"><?php echo $key->NombreServicios ?></th>
                      <th scope="col" class="clmnpdf2"><?php echo $key->DescripcionServicios ?></th>
                    </tr>
                    <?php }
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
      </div>
      <!--Fin de Derecha -->
    10
    </div><!--Fin de Hoja 10 -->
<br><br><br><br><br>

    <!--Hoja 11 -->
    <div class="hoja0">
      <!--Izquierda -->
      <div class="h0izq">
        <p class="titulos2">Talento Humano</p>
        <p class="texto">
        <?php  echo @$detalleEstructuraMemoria[0]->IntroTalentoHumano; ?>
        </p>
        <br>

        <section class="jpg1">
          <div id="graficaColaboradoresXGenero" style="min-width: 200px; max-width: 400px; height: 250px; margin: 0 auto"></div>

        </section>
      </div>
      <!--Fin de Izquierda -->
      <!--Derecha -->
      <div class="h0dere">
      <br>
      <br>        
        <section class="jpg1">
        <br>
        <p class="titulos2">Edad de Colaboradores</p>
        <p class="texto">
        <?php  echo @$detalleEstructuraMemoria[0]->IntroEdadTalentoHumano; ?>

        </p>
        <br>
        <div id="tablapdf">
            <div id="tablaceldaspdf">
              <table border="1" cellspacing="0px" class="tablclpelpdf">
                <thead>          
                  <tr class="horizontalcabpdf">
                    <th></th>
                    <th scope="col" class="clmnpdf1">Menos de 30 años</th>
                    <th scope="col" class="clmnpdf2">Entre 30 y 50 años</th>
                    <th scope="col" class="clmnpdf2">Más de 50 años</th>
                  </tr>
                </thead>
                <tbody>
                    <tr class="horizontalpdfcuerpo1">
                    <th scope="col" class="clmnpdf1">Número de Colaboradores</th>
                      <th scope="col" class="clmnpdf1"><?php echo number_format((@$datosTotales[0]->NumTEmpleados18A30Anios*100)/@$datosTotales[0]->NumTEmpleados, 0,'.', ' '). " %"; ?></th>
                      <th scope="col" class="clmnpdf1"><?php echo number_format((@$datosTotales[0]->NumTEmpleados31A50Anios*100)/@$datosTotales[0]->NumTEmpleados, 0,'.', ' '). " %"; ?></th>
                      <th scope="col" class="clmnpdf2"><?php echo number_format((@$datosTotales[0]->NumTEmpleados51AniosAdelante*100)/@$datosTotales[0]->NumTEmpleados, 0,'.', ' '). " %";?></th>
                    </tr>
                    <tr class="horizontalpdfcuerpo1">
                        <th scope="col" class="clmnpdf1">Edad Promedio</th>
                        <th colspan="3" class="clmnpdf3" scope="col"><?php echo number_format(@$edadPromedioEmpleados[0]->EdadPromedio, 0,'.', ' '). " años"; ?></th>
                    </tr>
                </tbody>
              </table>
            </div>
          </div>

        </section>
      <br>
      <br>        
        <section class="jpg1">
        <br>
        <br>
        <p class="titulos2">Colaboradores Contratados</p>
        <p class="texto">
          <?php  echo @$detalleEstructuraMemoria[0]->IntroContratoTalentoHumano; ?>
        </p>
        <br>
        <div id="tablapdf">
            <div id="tablaceldaspdf">
              <table border="1" cellspacing="0px" class="tablclpelpdf">
                <thead>          
                  <tr class="horizontalcabpdf">
                    <th></th>
                    <th scope="col" class="clmnpdf1">Mujeres</th>
                    <th scope="col" class="clmnpdf2">Hombres</th>
                  </tr>
                </thead>
                <tbody>
                    <tr class="horizontalpdfcuerpo1">
                        <th scope="col" class="clmnpdf1">Número de Colaboradores</th>
                        <th scope="col" class="clmnpdf1"><?php echo @$datosTotales[0]->NumTEmpleadosHContratados; ?></th>
                        <th scope="col" class="clmnpdf1"><?php echo @$datosTotales[0]->NumTEmpleadosMContratados; ?></th>
                    </tr>
                    <tr class="horizontalpdfcuerpo1">
                        <th scope="col" class="clmnpdf1">Total Contratados</th>
                        <th colspan="2" class="clmnpdf3" scope="col"><?php echo @$datosTotales[0]->NumTEmpleadosHContratados; ?></th>
                    </tr>
                </tbody>
              </table>
            </div>
          </div>

        </section>

      </div>
      <!--Fin de Derecha -->
    11
    </div><!--Fin de Hoja 11 -->


<br><br><br><br><br>
    <!--Hoja 12 -->
    <div class="hoja0">
      <!--Izquierda -->
      <div class="h0izq">
        <p class="titulos2">Capacitación y Desarrollo de personas</p>
        <p class="texto">
          <?php  echo @$detalleEstructuraMemoria[0]->IntroCapacitaciones; ?>
        </p>
        <br>

        <section class="jpg1">
        <br>
        <br>
        <div id="tablapdf">
            <div id="tablaceldaspdf">
              <table border="1" cellspacing="0px" class="tablclpelpdf">
                <thead>          
                  <tr class="horizontalcabpdf">
                    <th scope="col" class="clmnpdf1">Capacitación</th>
                    <th scope="col" class="clmnpdf1">Periodo</th>
                  </tr>
                </thead>
                <tbody>
                    <tr class="horizontalpdfcuerpo1">
                      <th scope="col" class="clmnpdf1">Inverisón Total</th>
                      <th scope="col" class="clmnpdf1"><?php echo number_format(@$datosTotales[0]->CostoTCapacitacionEmpleados, 0,'.', ' '). " $"; ?></th>
                    </tr>
                    <tr class="horizontalpdfcuerpo1">
                      <th scope="col" class="clmnpdf1">Inverisón Presupuestado</th>
                      <th scope="col" class="clmnpdf1"><?php echo number_format(@$datosTotales[0]->CostoTPresupuestoCapacitacionEmpleados, 0,'.', ' '). " $"; ?></th>
                    </tr>
                    <tr class="horizontalpdfcuerpo1">
                      <th scope="col" class="clmnpdf2">Inversión por Colaborador</th>
                      <th scope="col" class="clmnpdf1"><?php echo number_format((@$datosTotales[0]->CostoTCapacitacionEmpleados/@$datosTotales[0]->NumTEmpleadosCapacitados), 0,'.', ' '). " $"; ?></th>
                    </tr>
                    <tr class="horizontalpdfcuerpo1">
                      <th scope="col" class="clmnpdf2">Capacitaciones Planificadas</th>
                      <th scope="col" class="clmnpdf1"><?php echo number_format(@$datosTotales[0]->NumTCapacitacionesPlanificadas, 0,'.', ' '); ?></th>
                    </tr>
                    <tr class="horizontalpdfcuerpo1">
                      <th scope="col" class="clmnpdf2">Capacitaciones Ejecutadas</th>
                      <th scope="col" class="clmnpdf1"><?php echo number_format(@$datosTotales[0]->NumTCapacitacionesEjecutadas, 0,'.', ' '); ?></th>
                    </tr>
                    <tr class="horizontalpdfcuerpo1">
                      <th scope="col" class="clmnpdf2">Número de Empleados Capacitados</th>
                      <th scope="col" class="clmnpdf1"><?php echo number_format(@$datosTotales[0]->NumTEmpleadosCapacitados, 0,'.', ' '); ?></th>
                    </tr>
                    <tr class="horizontalpdfcuerpo1">
                      <th scope="col" class="clmnpdf2">Número de horas de Capacitación por Empleados</th>
                      <th scope="col" class="clmnpdf1"><?php echo number_format(@$datosTotales[0]->NumTHorasCapacitacionEjecutadasPorEmpleados, 0,'.', ' '). " h"; ?></th>
                    </tr>
                    <tr class="horizontalpdfcuerpo1">
                      <th scope="col" class="clmnpdf2">Porcentaje de Capacitaciones ejecutadas</th>
                      <th scope="col" class="clmnpdf1"><?php echo number_format(((@$datosTotales[0]->NumTCapacitacionesEjecutadas*100)/@$datosTotales[0]->NumTCapacitacionesPlanificadas), 0,'.', ' '). " %"; ?></th>
                    </tr>
                </tbody>
              </table>
            </div>
          </div>

        </section>

      </div>
      <!--Fin de Izquierda -->
      <!--Derecha -->
      <div class="h0dere">
        <br>
        <br>
        <?php if (count(@$capacitacionesEmpleados) >= 1)  { ?> 
        <section class="jpg1">
          <table width="100%%" border="0" cellspacing="0" class="imagen1">
            <tbody>
              <tr>
                <td class="img1">              
                  <img src="data:image/jpg;base64, <?php echo base64_encode(@$capacitacionesEmpleados[0]->Imagen) ?>" width="280" height="250" alt=""/></td>            
                  <td class="descimg1">
                    <?php echo @$capacitacionesEmpleados[0]->NombreCapacitacion; ?>
                    <p> Capacitación en
                      <?php echo @$capacitacionesEmpleados[0]->TipoCapacitacion; ?>, impartida al área de <?php echo @$capacitacionesEmpleados[0]->AreaImpartida; ?>
                    </p>
                  </td>
                </tr>
              </tbody>
            </table>
        </section>
        <?php } ?>
          <br>
          <br>
          <br>
          <br>
          <br>
          <?php if (count(@$capacitacionesEmpleados) >= 2)  { ?>            
        <section class="jpg1">
          <table width="100%%" border="0" cellspacing="0" class="imagen1">
            <tbody>
              <tr>
                <td class="img1">              
                  <img src="data:image/jpg;base64, <?php echo base64_encode(@$capacitacionesEmpleados[1]->Imagen) ?>" width="280" height="250" alt=""/></td>            
                  <td class="descimg1">
                    <?php echo @$capacitacionesEmpleados[1]->NombreCapacitacion; ?>
                    <p> Capacitación en
                      <?php echo @$capacitacionesEmpleados[1]->TipoCapacitacion; ?>, impartida al área de <?php echo @$capacitacionesEmpleados[1]->AreaImpartida; ?>
                    </p>
                  </td>
                </tr>
              </tbody>
            </table>
        </section>
          <?php } ?>

      </div>
      <!--Fin de Derecha -->
    12
    </div><!--Fin de Hoja 12 -->

<br><br><br><br><br>

    <!--Hoja 13 -->
    <div class="hoja0">
      <!--Izquierda -->
      <div class="h0izq">
        <p class="titulos2">Seguridad y Salud Ocupacional</p>
        <p class="texto">
          <?php  echo @$detalleEstructuraMemoria[0]->IntroSeguridadOcupacional; ?>
        </p>
        <br>

        <section class="jpg1">
        <br>
        <br>
        <div id="tablapdf">
            <div id="tablaceldaspdf">
              <table border="1" cellspacing="0px" class="tablclpelpdf">
                <thead>          
                  <tr class="horizontalcabpdf">
                    <th scope="col" class="clmnpdf1"></th>
                    <th scope="col" class="clmnpdf1">Mujeres</th>
                    <th scope="col" class="clmnpdf1">Hombres</th>
                  </tr>
                </thead>
                <tbody>
                    <tr class="horizontalpdfcuerpo1">
                      <th scope="col" class="clmnpdf1">Permiso de Maternidad</th>
                      <th scope="col" class="clmnpdf1"><?php echo @$datosTotales[0]->NumTEmpleadasConPermisoMaternidad; ?></th>
                      <th scope="col" class="clmnpdf1">-</th>
                    </tr>
                    <tr class="horizontalpdfcuerpo1">
                      <th scope="col" class="clmnpdf1">Permiso de Paternidad</th>
                      <th scope="col" class="clmnpdf1">-</th>
                      <th scope="col" class="clmnpdf1"><?php echo @$datosTotales[0]->NumTEmpleadosConPermisoPaternidad; ?></th>
                    </tr>
                    <tr class="horizontalpdfcuerpo1">
                        <th scope="col" class="clmnpdf1">Total de permisos</th>
                        <th colspan="3" class="clmnpdf3" scope="col"><?php echo (@$datosTotales[0]->NumTEmpleadasConPermisoMaternidad + @$datosTotales[0]->NumTEmpleadosConPermisoPaternidad); ?></th>
                    </tr>
                </tbody>
              </table>
            </div>
          </div>

        </section>

      </div>
      <!--Fin de Izquierda -->
      <!--Derecha -->
      <div class="h0dere">
        <br>
        <br>
      
          <p class="titulos2">Programas de Salud Laboral del Empleado</p>
          <p class="texto">
           <?php  echo @$detalleEstructuraMemoria[0]->IntroProgramasSaludLaboral; ?>
          </p>
        <div id="tablapdf">
            <div id="tablaceldaspdf">
              <table border="1" cellspacing="0px" class="tablclpelpdf">
                <thead>          
                  <tr class="horizontalcabpdf">
                    <th scope="col" class="clmnpdf1"></th>
                    <th scope="col" class="clmnpdf1">Horas planificadas</th>
                    <th scope="col" class="clmnpdf1">Horas ejecutadas</th>
                  </tr>
                </thead>
                <tbody>
                    <tr class="horizontalpdfcuerpo1">
                      <th scope="col" class="clmnpdf1">Ejercio físico</th>
                      <th scope="col" class="clmnpdf1"><?php echo @$datosTotales[0]->NumTHorasEjerFisicoPlanificadaPorEmpleado; ?></th>
                      <th scope="col" class="clmnpdf1"><?php echo @$datosTotales[0]->NumTHorasEjerFisicoEjecutadaPorEmpleado; ?></th>                      
                    </tr>
                    <tr class="horizontalpdfcuerpo1">
                      <th scope="col" class="clmnpdf1">Programas anti estres</th>                      
                      <th scope="col" class="clmnpdf1"><?php echo @$datosTotales[0]->NumTHorasEjerAntiEstresPlanificadaPorEmpleado; ?></th>
                      <th scope="col" class="clmnpdf1"><?php echo @$datosTotales[0]->NumTHorasEjerAntiEstresEjecutadaPorEmpleado; ?></th>
                    </tr>
                    <tr class="horizontalpdfcuerpo1">
                        <th scope="col" class="clmnpdf1">Total de horas ejecutadas</th>
                        <th colspan="3" class="clmnpdf3" scope="col"><?php echo (@$datosTotales[0]->NumTHorasEjerFisicoEjecutadaPorEmpleado + @$datosTotales[0]->NumTHorasEjerAntiEstresEjecutadaPorEmpleado); ?></th>
                    </tr>
                </tbody>
              </table>
            </div>
          </div>
      </div>
      <!--Fin de Derecha -->
    13
    </div><!--Fin de Hoja 13 -->

<br><br><br><br><br>
    <!--Hoja 14 -->
    <div class="hoja0">
      <!--Izquierda -->
      <div class="h0izq">
        <p class="titulos2">Nuestra Comunidad</p>
        <p class="texto">          
          <?php  echo @$detalleEstructuraMemoria[0]->IntroAportesComunidad; ?>
        </p>
        <br>

        <section class="jpg1">
        <center>
        <img src="data:image/jgp;base64, <?php echo base64_encode(@$imagenesInstitucionales[0]->FotosAporteComunidad) ?>" width="260" height="240" alt=""/>
        </center>
        </section>

      </div>
      <!--Fin de Izquierda -->
      <!--Derecha -->
      <div class="h0dere">
        <br>
        <br>
      
        <br>
        <br>
        <div id="tablapdf">
            <div id="tablaceldaspdf">
              <table border="1" cellspacing="0px" class="tablclpelpdf">
                <thead>          
                  <tr class="horizontalcabpdf">
                    <th scope="col" class="clmnpdf2">Donación</th>
                    <th scope="col" class="clmnpdf2">Imagen</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if (!empty(@$donaciones)) {
                    foreach (@$donaciones as $key) { ?>
                    <tr class="horizontalpdfcuerpo1">
                      <th scope="col" class="clmnpdf2"><?php echo $key->ObjetivoDonacion ?></th>
                      <th scope="col" class="clmnpdf2">
                            <img src="data:image/jpg;base64, <?php echo base64_encode($key->Imagen);?>" width="70" height="50" alt="" />    
                        </th>
                    </tr>
                    <?php }
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
          <br>

      </div>
      <!--Fin de Derecha -->
    14
    </div><!--Fin de Hoja 14 -->

<br><br><br><br><br>
    <!--Hoja 15 -->
    <div class="hoja0">
      <!--Izquierda -->
      <div class="h0izq">
        <p class="titulos2">Manejo Respomsable de energía eléctrica</p>
        <p class="texto">          
          <?php  echo @$detalleEstructuraMemoria[0]->IntroManejoRespomsableDeEnergiaElectrica; ?>
        </p>
        <br>
        <section class="jpg1">
        <br>
        <div id="tablapdf">
            <div id="tablaceldaspdf">
              <table border="1" cellspacing="0px" class="tablclpelpdf">
                <thead>          
                  <tr class="horizontalcabpdf">
                    <th scope="col" class="clmnpdf1"></th>
                    <th scope="col" class="clmnpdf1">Periodo Anterior</th>
                    <th scope="col" class="clmnpdf1">Periodo Actual</th>
                  </tr>
                </thead>
                <tbody>
                    <tr class="horizontalpdfcuerpo1">
                      <th scope="col" class="clmnpdf1">Cantidad de Energía </th>
                      <th scope="col" class="clmnpdf1"><?php echo number_format(@$datosTotales[0]->CantTKwhElectricidadAnioAnterior, 0,'.', ' '). " kw"; ?></th>
                      <th scope="col" class="clmnpdf1"><?php echo number_format(@$datosTotales[0]->CantTKwhElectricidad, 0,'.', ' '). " kw"; ?></th>                      
                    </tr>
                    <tr class="horizontalpdfcuerpo1">
                      <th scope="col" class="clmnpdf1">Cantidad de Energía Renovable</th>                      
                      <th scope="col" class="clmnpdf1"><?php echo number_format(@$datosTotales[0]->CantTKwhEnergiaRenovable, 0,'.', ' '). " kw"; ?></th>
                      <th scope="col" class="clmnpdf1"><?php echo number_format(@$datosTotales[0]->CantTKwhEnergiaUtilizadaRenovable, 0,'.', ' '). " kw"; ?></th>
                    </tr>
                </tbody>
              </table>
            </div>
          </div>

        </section>

      </div>
      <!--Fin de Izquierda -->
      <!--Derecha -->
      <div class="h0dere">

      
          <br>
          <br>
          <br>
          <br>
          <br>

      </div>
      <!--Fin de Derecha -->
    15
    </div><!--Fin de Hoja 15 -->



  </div><!--Fin de tablapdf -->

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

  </div><!--Fin de contenedorpdf -->
</body>
</html>