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
            categories: ['Económico', 'Legal', 'Social']
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Anális de Indicadores Cualitativos por Dimensión <?php echo @$cualitativosCalificados[0]->Periodo; ?>'
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
            <?php if (@$totalTodosDeEconomicoSi[0]->Si != NULL){echo @$totalTodosDeEconomicoSi[0]->Si;}else{echo "0";} ?>,
             <?php if (@$totalTodosDeLegalSi[0]->Si != NULL){echo @$totalTodosDeLegalSi[0]->Si;}else{echo "0";} ?>,
              <?php if (@$totalTodosDeSocialSi[0]->Si != NULL){echo @$totalTodosDeSocialSi[0]->Si;}else{echo "0";} ?>
              ]
        }, {
            name: 'NO',
            data: [
            <?php if (@$totalTodosDeEconomicoNo[0]->No != NULL){echo @$totalTodosDeEconomicoNo[0]->No;}else{echo "0";} ?>,
            <?php if (@$totalTodosDeLegalNo[0]->No != NULL){echo @$totalTodosDeLegalNo[0]->No;}else{echo "0";} ?>,
            <?php if (@$totalTodosDeSocialNo[0]->No != NULL){echo @$totalTodosDeSocialNo[0]->No;}else{echo "0";} ?>
              ]
        }, {
            name: 'Nunca se ha tratado',
            data: [
            <?php if (@$totalTodosDeEconomicoNunca[0]->Nunca != NULL){echo @$totalTodosDeEconomicoNunca[0]->Nunca;}else{echo "0";} ?>,
            <?php if (@$totalTodosDeLegalNunca[0]->Nunca != NULL){echo @$totalTodosDeLegalNunca[0]->Nunca;}else{echo "0";} ?>,
            <?php if (@$totalTodosDeSocialNunca[0]->Nunca != NULL){echo @$totalTodosDeSocialNunca[0]->Nunca;}else{echo "0";} ?>
             ]
        }, {
            name: 'No consideramos su aplicación',
            data: [
            <?php if (@$totalTodosDeEconomicoNoConcidera[0]->NoConcidera != NULL){echo @$totalTodosDeEconomicoNoConcidera[0]->NoConcidera;}else{echo "0";} ?>,
            <?php if (@$totalTodosDeLegalNoConcidera[0]->NoConcidera != NULL){echo @$totalTodosDeLegalNoConcidera[0]->NoConcidera;}else{echo "0";} ?>,
            <?php if (@$totalTodosDeSocialNoConcidera[0]->NoConcidera != NULL){echo @$totalTodosDeSocialNoConcidera[0]->NoConcidera;}else{echo "0";} ?>
              ]
        }]
    });
});
</script>

<script src="<?php echo base_url() ?>libHighCharts/js/highcharts.js"></script>
<script src="<?php echo base_url() ?>libHighCharts/js/highcharts-more.js"></script>
<script src="<?php echo base_url() ?>libHighCharts/js/modules/exporting.js"></script>

<div id="container" style="min-width: 450px; max-width: 650px; height: 450px; margin: 0 auto"></div>
