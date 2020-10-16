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
            type: 'column'
        },
        title: {
            text: ''
        },
        xAxis: {
            categories: ['Asamblea', 'Asociatividad de Grupos', 'Ausentismo', 'Comercio Justo', 'Comunidad', 'Contratos Trabajao', 'Despidos o Rotación', 'Donaciones', 'Remuneraciones', 'transparencia']
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Anális de Indicadores Cualitativos por Sub-Dimensión <?php echo @$cualitativosCalificados[0]->Periodo; ?>'
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
            y: -20,
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
            <?php if (@$totalAsambleaSi[0]->Si != NULL){echo @$totalAsambleaSi[0]->Si;}else{echo "0";} ?>,
             <?php if (@$totalAsociatividadGruposInteresSi[0]->Si != NULL){echo @$totalAsociatividadGruposInteresSi[0]->Si;}else{echo "0";} ?>,
              <?php if (@$totalAusentismoSi[0]->Si != NULL){echo @$totalAusentismoSi[0]->Si;}else{echo "0";} ?>,
              <?php if (@$totalComercioJustoSi[0]->Si != NULL){echo @$totalComercioJustoSi[0]->Si;}else{echo "0";} ?>,
              <?php if (@$totalComunidadSi[0]->Si != NULL){echo @$totalComunidadSi[0]->Si;}else{echo "0";} ?>,
              <?php if (@$totalContratosTrabajoSi[0]->Si != NULL){echo @$totalContratosTrabajoSi[0]->Si;}else{echo "0";} ?>,
              <?php if (@$totalDespidosRotaciónSi[0]->Si != NULL){echo @$totalDespidosRotaciónSi[0]->Si;}else{echo "0";} ?>,
              <?php if (@$totalDonacionesSi[0]->Si != NULL){echo @$totalDonacionesSi[0]->Si;}else{echo "0";} ?>,
              <?php if (@$totalRemuneracionSi[0]->Si != NULL){echo @$totalRemuneracionSi[0]->Si;}else{echo "0";} ?>,
              <?php if (@$totalTransparenciaSi[0]->Si != NULL){echo @$totalTransparenciaSi[0]->Si;}else{echo "0";} ?>              
              ]
        }, {
            name: 'NO',
            data: [
            <?php if (@$totalAsambleaNo[0]->No != NULL){echo @$totalAsambleaNo[0]->No;}else{echo "0";} ?>,
            <?php if (@$totalAsociatividadGruposInteresNo[0]->No != NULL){echo @$totalAsociatividadGruposInteresNo[0]->No;}else{echo "0";} ?>,
            <?php if (@$totalAusentismoNo[0]->No != NULL){echo @$totalAusentismoNo[0]->No;}else{echo "0";} ?>,
            <?php if (@$totalComercioJustoNo[0]->No != NULL){echo @$totalComercioJustoNo[0]->No;}else{echo "0";} ?>,
            <?php if (@$totalComunidadNo[0]->No != NULL){echo @$totalComunidadNo[0]->No;}else{echo "0";} ?>,
            <?php if (@$totalContratosTrabajoNo[0]->No != NULL){echo @$totalContratosTrabajoNo[0]->No;}else{echo "0";} ?>,
            <?php if (@$totalDespidosRotaciónNo[0]->No != NULL){echo @$totalDespidosRotaciónNo[0]->No;}else{echo "0";} ?>,
            <?php if (@$totalDonacionesNo[0]->No != NULL){echo @$totalDonacionesNo[0]->No;}else{echo "0";} ?>,
            <?php if (@$totalRemuneracionNo[0]->No != NULL){echo @$totalRemuneracionNo[0]->No;}else{echo "0";} ?>,
            <?php if (@$totalTransparenciaNo[0]->No != NULL){echo @$totalTransparenciaNo[0]->No;}else{echo "0";} ?>
              ]
        }, {
            name: 'Nunca se ha tratado',
            data: [
            <?php if (@$totalAsambleaNunca[0]->Nunca != NULL){echo @$totalAsambleaNunca[0]->Nunca;}else{echo "0";} ?>,
            <?php if (@$totalAsociatividadGruposInteresNunca[0]->Nunca != NULL){echo @$totalAsociatividadGruposInteresNunca[0]->Nunca;}else{echo "0";} ?>,
            <?php if (@$totalAusentismoNunca[0]->Nunca != NULL){echo @$totalAusentismoNunca[0]->Nunca;}else{echo "0";} ?>,
            <?php if (@$totalComercioJustoNunca[0]->Nunca != NULL){echo @$totalComercioJustoNunca[0]->Nunca;}else{echo "0";} ?>,
            <?php if (@$totalComunidadNunca[0]->Nunca != NULL){echo @$totalComunidadNunca[0]->Nunca;}else{echo "0";} ?>,
            <?php if (@$totalContratosTrabajoNunca[0]->Nunca != NULL){echo @$totalContratosTrabajoNunca[0]->Nunca;}else{echo "0";} ?>,
            <?php if (@$totalDespidosRotaciónNunca[0]->Nunca != NULL){echo @$totalDespidosRotaciónNunca[0]->Nunca;}else{echo "0";} ?>,
            <?php if (@$totalDonacionesNunca[0]->Nunca != NULL){echo @$totalDonacionesNunca[0]->Nunca;}else{echo "0";} ?>,
            <?php if (@$totalRemuneracionNunca[0]->Nunca != NULL){echo @$totalRemuneracionNunca[0]->Nunca;}else{echo "0";} ?>,
            <?php if (@$totalTransparenciaNunca[0]->Nunca != NULL){echo @$totalTransparenciaNunca[0]->Nunca;}else{echo "0";} ?>
             ]
        }, {
            name: 'No consideramos su aplicación',
            data: [
            <?php if (@$totalAsambleaNoConcidera[0]->NoConcidera != NULL){echo @$totalAsambleaNoConcidera[0]->NoConcidera;}else{echo "0";} ?>,
            <?php if (@$totalAsociatividadGruposInteresNoConcidera[0]->NoConcidera != NULL){echo @$totalAsociatividadGruposInteresNoConcidera[0]->NoConcidera;}else{echo "0";} ?>,
            <?php if (@$totalAusentismoNoConcidera[0]->NoConcidera != NULL){echo @$totalAusentismoNoConcidera[0]->NoConcidera;}else{echo "0";} ?>,
            <?php if (@$totalComercioJustoNoConcidera[0]->NoConcidera != NULL){echo @$totalComercioJustoNoConcidera[0]->NoConcidera;}else{echo "0";} ?>,
            <?php if (@$totalComunidadNoConcidera[0]->NoConcidera != NULL){echo @$totalComunidadNoConcidera[0]->NoConcidera;}else{echo "0";} ?>,
            <?php if (@$totalContratosTrabajoNoConcidera[0]->NoConcidera != NULL){echo @$totalContratosTrabajoNoConcidera[0]->NoConcidera;}else{echo "0";} ?>,
            <?php if (@$totalDespidosRotaciónNoConcidera[0]->NoConcidera != NULL){echo @$totalDespidosRotaciónNoConcidera[0]->NoConcidera;}else{echo "0";} ?>,
            <?php if (@$totalDonacionesNoConcidera[0]->NoConcidera != NULL){echo @$totalDonacionesNoConcidera[0]->NoConcidera;}else{echo "0";} ?>,
            <?php if (@$totalRemuneracionNoConcidera[0]->NoConcidera != NULL){echo @$totalRemuneracionNoConcidera[0]->NoConcidera;}else{echo "0";} ?>,
            <?php if (@$totalTransparenciaNoConcidera[0]->NoConcidera != NULL){echo @$totalTransparenciaNoConcidera[0]->NoConcidera;}else{echo "0";} ?>
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
