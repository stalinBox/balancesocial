<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Highcharts Example</title>

        <script type="text/javascript" language="javascript" src="<?php echo base_url();?>ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <link href="<?php echo base_url()?>css/estilospdf.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" language="javascript" src="<?php echo base_url();?>ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>libHighCharts/js/highcharts.js"></script>
        <script src="<?php echo base_url() ?>libHighCharts/js/highcharts-more.js"></script>
        <script src="<?php echo base_url() ?>libHighCharts/js/modules/exporting.js"></script>
        <?php 
$dato1PA = 3;
$dato1 = 5;
$dato2PA = 5;
$dato2 = 7;
$datoTotalPA = 9;
$datoTotal = 12;
 ?>
        <script type="text/javascript">
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
            name: 'Hombres',
            data: [
            <?php echo number_format(($dato1PA*100)/$datoTotalPA, 0); ?>
            ,
            <?php echo number_format(($dato1*100)/$datoTotal, 0); ?>
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
            name: 'Mujeres',
            data: [
            <?php echo number_format(($dato2PA*100)/$datoTotalPA, 0); ?>
            ,
            <?php echo number_format(($dato2*100)/$datoTotal, 0); ?>
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
    </head>
    <body>
<script src="../../js/highcharts.js"></script>
<script src="../../js/modules/exporting.js"></script>

<div id="graficaColaboradoresXGenero" style="min-width: 300px; max-width: 500px; height: 350px; margin: 0 auto"></div>

    </body>
</html>
