<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<script type="text/javascript" language="javascript" src="<?php echo base_url();?>ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<style type="text/css">
    ${demo.css}
</style>
<?php $m = "mundo"; ?>
<script type="text/javascript">
    $(function () {

        $('#container').highcharts({

            chart: {
                polar: true,
                type: 'line'
            },

            title: {
                text: 'Análisis de Indicadores Cuantitativos por Principios SEPS del Periodo <?php echo $periodo; ?>',
                x: -40
            },

            pane: {
                size: '76%'
            },

            xAxis: {
                categories: ['ASOCIACIÓN VOLUNTARIA', 'AUTOGESTIÓN Y AUTONOMÍA', 'CAPACITACIÓN Y FORMACIÓN', 'COMPROMISO COMUNITARIO', 'INTEGRACIÓN SEPS', 'PARTICIPACIÓN ECONÓMICA', 'TRABAJO SOBRE CAPITAL'],
                tickmarkPlacement: 'on',
                lineWidth: 0
            },

            yAxis: {
                gridLineInterpolation: 'polygon',
                lineWidth: 0,
                min: 0
            },

            tooltip: {
                shared: true,
                pointFormat: '<span style="color:{series.color}">{series.name}: <b>Calificación {point.y:,.0f} / 5</b><br/>'
            },

            legend: {
                align: 'right',
                verticalAlign: 'top',
                y: 70,
                layout: 'vertical'
            },

            series: [{
                name: 'Calificación sobre 5',
                data: [
<?php  
    if ($principioSEPSCuantitativosAsoVol->num_rows() == 0) {
         echo "0";
    }else{        
            foreach ($principioSEPSCuantitativosAsoVol->result() as $key) {
                echo $key->Promedio;
            }
    }
?>
                ,
<?php  
    if ($principioSEPSCuantitativosAutAut->num_rows() == 0) {
         echo "0";
    }else{        
            foreach ($principioSEPSCuantitativosAutAut->result() as $key) {
                echo $key->Promedio;
            }
    }
?>
                ,
<?php  
    if ($principioSEPSCuantitativosCapFor->num_rows() == 0) {
         echo "0";
    }else{        
            foreach ($principioSEPSCuantitativosCapFor->result() as $key) {
                echo $key->Promedio;
            }
    }
?>
                ,
<?php  
    if ($principioSEPSCuantitativosComCom->num_rows() == 0) {
         echo "0";
    }else{        
            foreach ($principioSEPSCuantitativosComCom->result() as $key) {
                echo $key->Promedio;
            }
    }
?>
                ,
<?php  
    if ($principioSEPSCuantitativosIntSep->num_rows() == 0) {
         echo "0";
    }else{        
            foreach ($principioSEPSCuantitativosIntSep->result() as $key) {
                echo $key->Promedio;
            }
    }
?>
                ,
<?php  
    if ($principioSEPSCuantitativosParEco->num_rows() == 0) {
         echo "0";
    }else{        
            foreach ($principioSEPSCuantitativosParEco->result() as $key) {
                echo $key->Promedio;
            }
    }
?>
                ,
<?php  
    if ($principioSEPSCuantitativosTraCap->num_rows() == 0) {
         echo "0";
    }else{        
            foreach ($principioSEPSCuantitativosTraCap->result() as $key) {
                echo $key->Promedio;
            }
    }
?>
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
</script>

<script src="<?php echo base_url() ?>libHighCharts/js/highcharts.js"></script>
<script src="<?php echo base_url() ?>libHighCharts/js/highcharts-more.js"></script>
<script src="<?php echo base_url() ?>libHighCharts/js/modules/exporting.js"></script>

<div id="container" style="min-width: 450px; max-width: 650px; height: 450px; margin: 0 auto"></div>
<?php 

?>
