<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!--
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
-->
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<style type="text/css">
    ${demo.css}
</style>
<script type="text/javascript">

$(function () {
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: ''
        },
        xAxis: {
            categories: ['Asociación Voluntaria', 'Autogestión y Autonomía', 'Compromiso Comunitario','Participación Económica','Trabajo Sobre Capital']
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Anális de Indicadores Cualitativos por Principios SEPS <?php echo @$cualitativosCalificados[0]->Periodo; ?>'
            },
            stackLabels: {
                enabled: true,
                style: {
                    fontWeight: 'bold',
                    color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                }
            }
        },
        legend: {
            align: 'right',
            x: -30,
            verticalAlign: 'top',
            y: 10,
            floating: true,
            backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
            borderColor: '#CCC',
            borderWidth: 1,
            shadow: false
        },
        tooltip: {
            formatter: function () {
                return '<b>' + this.x + '</b><br/>' +
                    this.series.name + ': ' + this.y + '<br/>' +
                    'Total: ' + this.point.stackTotal;
            }
        },
        plotOptions: {
            column: {
                stacking: 'normal',
                dataLabels: {
                    enabled: true,
                    color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                    style: {
                        textShadow: '0 0 3px black'
                    }
                }
            }
        },
        series: [{
            name: 'SI',
            data: [
            <?php if (@$totalAsociacionVoluntariaSi[0]->Si != NULL){echo @$totalAsociacionVoluntariaSi[0]->Si;}else{echo "0";} ?>,
             <?php if (@$totalAutogestionYAutonomiaSi[0]->Si != NULL){echo @$totalAutogestionYAutonomiaSi[0]->Si;}else{echo "0";} ?>,
              <?php if (@$totalCompromisoComunitarioSi[0]->Si != NULL){echo @$totalCompromisoComunitarioSi[0]->Si;}else{echo "0";} ?>,
              <?php if (@$totalParticipacionEconomicaSi[0]->Si != NULL){echo @$totalParticipacionEconomicaSi[0]->Si;}else{echo "0";} ?>,
              <?php if (@$totalTrabajoSobrecapitalSi[0]->Si != NULL){echo @$totalTrabajoSobrecapitalSi[0]->Si;}else{echo "0";} ?>              
              ]
        }, {
            name: 'NO',
            data: [
            <?php if (@$totalAsociacionVoluntariaNo[0]->No != NULL){echo @$totalAsociacionVoluntariaNo[0]->No;}else{echo "0";} ?>,
            <?php if (@$totalAutogestionYAutonomiaNo[0]->No != NULL){echo @$totalAutogestionYAutonomiaNo[0]->No;}else{echo "0";} ?>,
            <?php if (@$totalCompromisoComunitarioNo[0]->No != NULL){echo @$totalCompromisoComunitarioNo[0]->No;}else{echo "0";} ?>,
            <?php if (@$totalParticipacionEconomicaNo[0]->No != NULL){echo @$totalParticipacionEconomicaNo[0]->No;}else{echo "0";} ?>,
            <?php if (@$totalTrabajoSobrecapitalNo[0]->No != NULL){echo @$totalTrabajoSobrecapitalNo[0]->No;}else{echo "0";} ?>
              ]
        }, {
            name: 'Nunca se ha tratado',
            data: [
            <?php if (@$totalAsociacionVoluntariaNunca[0]->Nunca != NULL){echo @$totalAsociacionVoluntariaNunca[0]->Nunca;}else{echo "0";} ?>,
            <?php if (@$totalAutogestionYAutonomiaNunca[0]->Nunca != NULL){echo @$totalAutogestionYAutonomiaNunca[0]->Nunca;}else{echo "0";} ?>,
            <?php if (@$totalCompromisoComunitarioNunca[0]->Nunca != NULL){echo @$totalCompromisoComunitarioNunca[0]->Nunca;}else{echo "0";} ?>,
            <?php if (@$totalParticipacionEconomicaNunca[0]->Nunca != NULL){echo @$totalParticipacionEconomicaNunca[0]->Nunca;}else{echo "0";} ?>,
            <?php if (@$totalTrabajoSobrecapitalNunca[0]->Nunca != NULL){echo @$totalTrabajoSobrecapitalNunca[0]->Nunca;}else{echo "0";} ?>
             ]
        }, {
            name: 'No consideramos su aplicación',
            data: [
            <?php if (@$totalAsociacionVoluntariaNoConcidera[0]->NoConcidera != NULL){echo @$totalAsociacionVoluntariaNoConcidera[0]->NoConcidera;}else{echo "0";} ?>,
            <?php if (@$totalAutogestionYAutonomiaNoConcidera[0]->NoConcidera != NULL){echo @$totalAutogestionYAutonomiaNoConcidera[0]->NoConcidera;}else{echo "0";} ?>,
            <?php if (@$totalCompromisoComunitarioNoConcidera[0]->NoConcidera != NULL){echo @$totalCompromisoComunitarioNoConcidera[0]->NoConcidera;}else{echo "0";} ?>,
            <?php if (@$totalParticipacionEconomicaNoConcidera[0]->NoConcidera != NULL){echo @$totalParticipacionEconomicaNoConcidera[0]->NoConcidera;}else{echo "0";} ?>,
            <?php if (@$totalTrabajoSobrecapitalNoConcidera[0]->NoConcidera != NULL){echo @$totalTrabajoSobrecapitalNoConcidera[0]->NoConcidera;}else{echo "0";} ?>
              ]
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
