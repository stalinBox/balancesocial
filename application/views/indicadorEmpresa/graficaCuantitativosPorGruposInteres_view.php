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
                text: 'Análisis de Indicadores Cuantitativos por Grupos de Interés del Periodo <?php echo $periodo; ?>',
                x: -40
            },

            pane: {
                size: '76%'
            },

            xAxis: {
                categories: ['CLIENTES', 'COMUNIDAD', 'EMPLEADOS', 'PROVEEDORES', 'SOCIOS - ACCIONISTAS'],
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
    if ($gruposInteresCuantitativosClientes->num_rows() == 0) {
         echo "0";
    }else{        
            foreach ($gruposInteresCuantitativosClientes->result() as $key) {
                echo $key->Promedio;
            }
    }
?>
                ,
<?php  
    if ($gruposInteresCuantitativosComunidad->num_rows() == 0) {
         echo "0";
    }else{        
            foreach ($gruposInteresCuantitativosComunidad->result() as $key) {
                echo $key->Promedio;
            }
    }
?>
                ,
<?php  
    if ($gruposInteresCuantitativosEmpleados->num_rows() == 0) {
         echo "0";
    }else{        
            foreach ($gruposInteresCuantitativosEmpleados->result() as $key) {
                echo $key->Promedio;
            }
    }
?>
                ,
<?php  
    if ($gruposInteresCuantitativosProveedores->num_rows() == 0) {
         echo "0";
    }else{        
            foreach ($gruposInteresCuantitativosProveedores->result() as $key) {
                echo $key->Promedio;
            }
    }
?>
                ,
<?php  
    if ($gruposInteresCuantitativosSocAccionista->num_rows() == 0) {
         echo "0";
    }else{        
            foreach ($gruposInteresCuantitativosSocAccionista->result() as $key) {
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
