<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.min.css"> 
<script src="<?php echo base_url(); ?>js/bootstrap.min.js" ></script>
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datepicker.css" >
<script type="text/javascript" src="<?php echo base_url()?>js/loadFiles/loadFiles.js"></script>

<script type="text/javascript">
  function regresar(){
    window.location="<?php echo base_url()?>datoBase/datosBase";
  }
</script>

<h3 class="page-header" align="center"><span class="glyphicon glyphicon-th-list"></span> <?php echo $titulo; ?></h3> 
<div class="error">
  <center>
    <?php messages_flash('danger',validation_errors(),'Errores del formulario', true); ?>
  </center>
</div>

<!--NUEVO COMPONENTE-->
  <form action="<?php echo base_url()?>datoBase/reemplazar" id="idFrmFile" name="idFrmFile" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
    <!-- COMPONENT START -->
    <input type="hidden" name="accion" value="<?php echo $accion; ?>">
    <input type="hidden" name="idBaseData" value="<?php echo $idBaseData; ?>">

    <div class="form-group">
      <div class="input-group input-file" id="userfile" name='userfile' accept=".xls,.xlsx" required>
        <span class="input-group-btn">
              <button class="btn btn-default btn-choose" type="button">Seleccione</button>
          </span>
          <input type="text" class="form-control" placeholder='Seleccione un archivo Excel...' />
          <span class="input-group-btn">
               <button class="btn btn-warning btn-reset" type="button">Restaurar</button>
          </span>
      </div>
    </div>
    <!-- COMPONENT END -->
    
    <div class="form-group">
      <button type="submit" name='txtSubmitFile' class="btn btn-primary ">Importar Datos</button>
    </div>
  </form>
          
<!-- FIN DEL NUEVO COMPONENTE -->
<form action="<?php echo base_url()?>datoBase/guardarDatoBase" id="TABLA4COLUMNAS" method="POST">
  <input type="hidden" name="accion" value="<?php echo $accion; ?>">
  <input type="hidden" name="id" value="<?php echo @$datoBase[0]->IdDatosBase; ?>">
    <table class="table table-striped table-bordered table-hover table-condensed">
    <tbody>
      <tr class="tabla4col">
          <td style="width: 200px">Total clientes año anterior</td>
          <td >
            <input class="form-control" type="text" id="txtNumTClientesAnioAnterior" name="txtNumTClientesAnioAnterior"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTClientesAnioAnterior',  @$resultado['txtNumTClientesAnioAnterior']);?>">
          </td>
          <td style="width: 200px">Valor Total por Certificados de aportación del año anterior</td>
          <td >
            <input class="form-control" type="text" id="txtValorTPorCertificadosDeAportacionAnioAnterior" name="txtValorTPorCertificadosDeAportacionAnioAnterior"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPorCertificadosDeAportacionAnioAnterior',  @$resultado['txtValorTPorCertificadosDeAportacionAnioAnterior']);?>">
          </td>
      </tr>
      <tr class="tabla4col">
          <td >Valor Total por Certificados de aportación devueltos del año anterior</td>
          <td >
            <input class="form-control" type="text" id="txtValorTCertificadoAportacionDevueltosAnioAnterior" name="txtValorTCertificadoAportacionDevueltosAnioAnterior"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTCertificadoAportacionDevueltosAnioAnterior', @$resultado['txtValorTCertificadoAportacionDevueltosAnioAnterior']);?>">
          </td>
          <td >Gasto Total en Servicios Básicos del año anterior por Empleado</td>
          <td >
            <input class="form-control" type="text" id="txtGastoTServiciosBasicosAnioAnterior" name="txtGastoTServiciosBasicosAnioAnterior"  placeholder="Ingresar datos" value="<?php echo set_value('txtGastoTServiciosBasicosAnioAnterior', @$resultado['txtGastoTServiciosBasicosAnioAnterior']);?>">
          </td>
      </tr>
      <tr class="tabla4col">
          <td >Gasto Total en gasto de energía eléctrica del año anterior</td>
          <td >
            <input class="form-control" type="text" id="txtGastoTElectricidadAnioAnterior" name="txtGastoTElectricidadAnioAnterior"  placeholder="Ingresar datos" value="<?php echo set_value('txtGastoTElectricidadAnioAnterior', @$resultado['txtGastoTElectricidadAnioAnterior']);?>">
          </td>
          <td >Cantidad de energía eléctrica (kw) de del año anterior</td>
          <td >
            <input class="form-control" type="text" id="txtCantTKwhElectricidadAnioAnterior" name="txtCantTKwhElectricidadAnioAnterior"  placeholder="Ingresar datos" value="<?php echo set_value('txtCantTKwhElectricidadAnioAnterior', @$resultado['txtCantTKwhElectricidadAnioAnterior']);?>">
          </td>
      </tr>
      <tr class="tabla4col">
          <td >Cantidad de Galones de combustible del año anterior</td>
          <td >
            <input class="form-control" type="text" id="txtCantTGalonesGasolinaAnioAnterior" name="txtCantTGalonesGasolinaAnioAnterior"  placeholder="Ingresar datos" value="<?php echo set_value('txtCantTGalonesGasolinaAnioAnterior', @$resultado['txtCantTGalonesGasolinaAnioAnterior']);?>">
          </td>
          <td >Gasto Total en gasto de combustible del año anterior</td>
          <td >
            <input class="form-control" type="text" id="txtGastoTGasolinaAnioAnterior" name="txtGastoTGasolinaAnioAnterior"  placeholder="Ingresar datos" value="<?php echo set_value('txtGastoTGasolinaAnioAnterior', @$resultado['txtGastoTGasolinaAnioAnterior']);?>">
          </td>
      </tr>
      <tr class="tabla4col">
          <td >Gasto Total en consumo de agua del año anterior</td>
          <td >
            <input class="form-control" type="text" id="txtGastoTConsumoAguaAnioAnterior" name="txtGastoTConsumoAguaAnioAnterior"  placeholder="Ingresar datos" value="<?php echo set_value('txtGastoTConsumoAguaAnioAnterior', @$resultado['txtGastoTConsumoAguaAnioAnterior']);?>">
          </td>
          <td >Cantidad de agua (m³) consumidos en el año anterior</td>
          <td >
            <input class="form-control" type="text" id="txtCantTm3AguaConsumidaAnioAnterior" name="txtCantTm3AguaConsumidaAnioAnterior"  placeholder="Ingresar datos" value="<?php echo set_value('txtCantTm3AguaConsumidaAnioAnterior', @$resultado['txtCantTm3AguaConsumidaAnioAnterior']);?>">
          </td>
      </tr>
      <tr class="tabla4col">
          <td >Gasto Total en Consumo telefónico del año anterior</td>
          <td >
            <input class="form-control" type="text" id="txtGastoTTelefonoAnioAnterior" name="txtGastoTTelefonoAnioAnterior"  placeholder="Ingresar datos" value="<?php echo set_value('txtGastoTTelefonoAnioAnterior', @$resultado['txtGastoTTelefonoAnioAnterior']);?>">
          </td>
          <td >Cantidad de minutos telefónicos del año anterior</td>
          <td >
            <input class="form-control" type="text" id="txtCantTMinutosTelefonoAnioAnterior" name="txtCantTMinutosTelefonoAnioAnterior"  placeholder="Ingresar datos" value="<?php echo set_value('txtCantTMinutosTelefonoAnioAnterior', @$resultado['txtCantTMinutosTelefonoAnioAnterior']);?>">
          </td>
      </tr>
      <tr class="tabla4col">
          <td >Gasto Total en resmas de papel del año anterior</td>
          <td >
            <input class="form-control" type="text" id="txtGastoTPapelAnioAnterior" name="txtGastoTPapelAnioAnterior"  placeholder="Ingresar datos" value="<?php echo set_value('txtGastoTPapelAnioAnterior', @$resultado['txtGastoTPapelAnioAnterior']);?>">
          </td>
          <td >Cantidad de resmas de papel consumidas el año anterior</td>
          <td >
            <input class="form-control" type="text" id="txtCantTResmasPapelAnioAnterior" name="txtCantTResmasPapelAnioAnterior"  placeholder="Ingresar datos" value="<?php echo set_value('txtCantTResmasPapelAnioAnterior', @$resultado['txtCantTResmasPapelAnioAnterior']);?>">
          </td>
      </tr>
      <tr class="tabla4col">
          <td >Cantidad de energía renovable (kw) de del año anterior</td>
          <td >
            <input class="form-control" type="text" id="txtCantTKwhEnergiaRenovable" name="txtCantTKwhEnergiaRenovable"  placeholder="Ingresar datos" value="<?php echo set_value('txtCantTKwhEnergiaRenovable', @$resultado['txtCantTKwhEnergiaRenovable']);?>">
          </td>
          <td >Gasto de  equipo de mantenimiento del año anterior</td>
          <td >
            <input class="form-control" type="text" id="txtGastoTEquipamientoAnioAnterior" name="txtGastoTEquipamientoAnioAnterior"  placeholder="Ingresar datos" value="<?php echo set_value('txtGastoTEquipamientoAnioAnterior', @$resultado['txtGastoTEquipamientoAnioAnterior']);?>">
          </td>
      </tr>
      <tr class="tabla4col">
          <td >Gasto Total en eliminación de residuos del año anterior</td>
          <td >
            <input class="form-control" type="text" id="txtGastoTAsignadoAEliminarResiduoAnioAnterior" name="txtGastoTAsignadoAEliminarResiduoAnioAnterior"  placeholder="Ingresar datos" value="<?php echo set_value('txtGastoTAsignadoAEliminarResiduoAnioAnterior',@$resultado['txtGastoTAsignadoAEliminarResiduoAnioAnterior']);?>">
          </td>
          <td >Gasto Total en limpieza año anterior</td>
          <td >
            <input class="form-control" type="text" id="txtGastoTLimpiezaAnioAnterior" name="txtGastoTLimpiezaAnioAnterior"  placeholder="Ingresar datos" value="<?php echo set_value('txtGastoTLimpiezaAnioAnterior', @$resultado['txtGastoTLimpiezaAnioAnterior']);?>">
          </td>
      </tr>
      <tr class="tabla4col">
          <td >Número Total de empleados contratados del período anterior</td>
          <td >
            <input class="form-control" type="text" id="txtNumTEmpleadosContratadosAnioAnterior" name="txtNumTEmpleadosContratadosAnioAnterior"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadosContratadosAnioAnterior', @$resultado['txtNumTEmpleadosContratadosAnioAnterior']);?>">
          </td>
          <td >Número Total de empleados en el periodo anterior</td>
          <td >
            <input class="form-control" type="text" id="txtNumTEmpleadosPeriodoAnioAnterior" name="txtNumTEmpleadosPeriodoAnioAnterior"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadosPeriodoAnioAnterior', @$resultado['txtNumTEmpleadosPeriodoAnioAnterior']);?>">
          </td>
      </tr>
      <tr class="tabla4col">
          <td >Número Total de empleados Hombres en el periodo anterior</td>
          <td >
            <input class="form-control" type="text" id="txtNumTEmpleadosHAnioAnterior" name="txtNumTEmpleadosHAnioAnterior"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadosHAnioAnterior', @$resultado['txtNumTEmpleadosHAnioAnterior']);?>">
          </td>
          <td >Número Total de empleados Mujeres en el periodo anterior</td>
          <td >
            <input class="form-control" type="text"  id="txtNumTEmpleadosMAnioAnterior"  name="txtNumTEmpleadosMAnioAnterior"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadosMAnioAnterior', @$resultado['txtNumTEmpleadosMAnioAnterior']);?>">
          </td>
      </tr>
      <tr class="tabla4col">
          <td >Valor del activo del periodo anterior</td>
          <td >
            <input class="form-control" type="text" id="txtValorTActivosAnioAnterior" name="txtValorTActivosAnioAnterior"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTActivosAnioAnterior', @$resultado['txtValorTActivosAnioAnterior']);?>">
          </td>
          <td >Valor del pasivo en el periodo anterior</td>
          <td >
            <input class="form-control" type="text" id="txtValorTPasivosAnioAnterior" name="txtValorTPasivosAnioAnterior"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPasivosAnioAnterior', @$resultado['txtValorTPasivosAnioAnterior']);?>">
          </td>
      </tr>
      <tr class="tabla4col">
          <td >Valor del patrimonio en el periodo anterior</td>
          <td >
            <input class="form-control" type="text" id="txtValorTPatrimonioAnioAnterior" name="txtValorTPatrimonioAnioAnterior"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPatrimonioAnioAnterior', @$resultado['txtValorTPatrimonioAnioAnterior']);?>">
          </td>
          <td >Utilidad del ejercicio periodo anterior</td>
          <td >
            <input class="form-control" type="text" id="txtUtilidadTEjercicioAnioAnterior"  name="txtUtilidadTEjercicioAnioAnterior"  placeholder="Ingresar datos" value="<?php  echo set_value('txtUtilidadTEjercicioAnioAnterior', @$resultado['txtUtilidadTEjercicioAnioAnterior']);?>">
          </td>
      </tr>
      <tr class="tabla4col">
          <td >Reserva legal periodo anterior</td>
          <td >
            <input class="form-control" type="text" id="txtValorTReservaLegalAnioAnterior" name="txtValorTReservaLegalAnioAnterior"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTReservaLegalAnioAnterior', @$resultado['txtValorTReservaLegalAnioAnterior']);?>">
          </td>
          <td >Total Ventas Anteriores</td>
          <td >
            <input class="form-control" type="text" id="txtValorTVentasAnioAnterior" name="txtValorTVentasAnioAnterior"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTVentasAnioAnterior', @$resultado['txtValorTVentasAnioAnterior']);?>">
          </td>
      </tr>
      <tr class="tabla4col">
          <td >Total gastos operacionales  periodo anterior</td>
          <td >
            <input class="form-control" type="text" id="txtValorTGastosOperacionalesAnioAnterior" name="txtValorTGastosOperacionalesAnioAnterior"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTGastosOperacionalesAnioAnterior', @$resultado['txtValorTGastosOperacionalesAnioAnterior']);?>">
          </td>
          <td >Total gastos no operacionales periodo anterior</td>
          <td >
            <input class="form-control" type="text" id="txtValorTGastosNoOperacionalesAnioAnterior"  name="txtValorTGastosNoOperacionalesAnioAnterior"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTGastosNoOperacionalesAnioAnterior', @$resultado['txtValorTGastosNoOperacionalesAnioAnterior']);?>">
          </td>
      </tr>
      <tr class="tabla4col">
          <td >Valor cartera de crédito año anterior</td>
          <td >
            <input class="form-control" type="text" id="txtValorTCarteraCreditoAnioAnterior" name="txtValorTCarteraCreditoAnioAnterior"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTCarteraCreditoAnioAnterior', @$resultado['txtValorTCarteraCreditoAnioAnterior']);?>">
          </td>
          <td >Monto promedio de créditos  a nivel consolidado año anterior</td>
          <td >
            <input class="form-control" type="text" id="txtMontoPromedioCreditoANivelConsolidadoAnioAnterior" name="txtMontoPromedioCreditoANivelConsolidadoAnioAnterior"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoPromedioCreditoANivelConsolidadoAnioAnterior', @$resultado['txtMontoPromedioCreditoANivelConsolidadoAnioAnterior']);?>">
          </td>
      </tr>
      <tr class="tabla4col">
          <td >Monto promedio de créditos  a concedidos por primera vez año anterior</td>
          <td >
            <input class="form-control" type="text" id="txtMontoPromedioCreditoConcedidoPrimeraVezAnioANterior" name="txtMontoPromedioCreditoConcedidoPrimeraVezAnioANterior"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoPromedioCreditoConcedidoPrimeraVezAnioANterior', @$resultado['txtMontoPromedioCreditoConcedidoPrimeraVezAnioANterior']);?>">
          </td>
          <td >Monto promedio de créditos  a concedidos a mujeres año anterior</td>
          <td >
            <input class="form-control" type="text" id="txtMontoPromedioCreditoConcedidoAMujeresAnioAnterior" name="txtMontoPromedioCreditoConcedidoAMujeresAnioAnterior"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoPromedioCreditoConcedidoAMujeresAnioAnterior', @$resultado['txtMontoPromedioCreditoConcedidoAMujeresAnioAnterior']);?>">
          </td>
      </tr>
      <tr class="tabla4col">
          <td >Monto promedio de créditos  de consumo concedidos por primera vez año anterior</td>
          <td >
            <input class="form-control" type="text" id="txtMontoPromedioCreditoConsumoConcedidoPrimeraVezAnioAnterior" name="txtMontoPromedioCreditoConsumoConcedidoPrimeraVezAnioAnterior"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoPromedioCreditoConsumoConcedidoPrimeraVezAnioAnterior', @$resultado['txtMontoPromedioCreditoConsumoConcedidoPrimeraVezAnioAnterior']);?>">
          </td>
          <td >Monto promedio de créditos de  vivienda concedidos por primera vez en el año anterior</td>
          <td >
            <input class="form-control" type="text" id="txtMontoPromedioCreditoViviendaConcedidoPrimeraVezAnioAnterior" name="txtMontoPromedioCreditoViviendaConcedidoPrimeraVezAnioAnterior"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoPromedioCreditoViviendaConcedidoPrimeraVezAnioAnterior', @$resultado['txtMontoPromedioCreditoViviendaConcedidoPrimeraVezAnioAnterior']);?>">
          </td>
      </tr>
      <tr class="tabla4col">
          <td >Monto promedio de microcréditos a socios nuevos concedidos por primera vez en el año anterior</td>
          <td >
            <input class="form-control" type="text" id="txtMontoPromedioMicrocreditoASociosNuevosPrimeraVezAnioAnterior" name="txtMontoPromedioMicrocreditoASociosNuevosPrimeraVezAnioAnterior"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoPromedioMicrocreditoASociosNuevosPrimeraVezAnioAnterior', @$resultado['txtMontoPromedioMicrocreditoASociosNuevosPrimeraVezAnioAnterior']);?>">
          </td>
          <td >Monto promedio de créditos de comercio a socios nuevos concedidos por primera vez en el año anterior</td>
          <td >
            <input class="form-control" type="text" id="txtMontoPromedioCreditoComercioASociosNuevosPrimeraVezAnioAnterior" name="txtMontoPromedioCreditoComercioASociosNuevosPrimeraVezAnioAnterior"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoPromedioCreditoComercioASociosNuevosPrimeraVezAnioAnterior', @$resultado['txtMontoPromedioCreditoComercioASociosNuevosPrimeraVezAnioAnterior']);?>">
          </td>
      </tr>
      <tr class="tabla4col">
          <td >Monto promedio de créditos vinculados periodo anterior</td>
          <td >
            <input class="form-control" type="text" id="txtMontoPromedioCreditosVinculadosAnioAnterior"  name="txtMontoPromedioCreditosVinculadosAnioAnterior"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoPromedioCreditosVinculadosAnioAnterior', @$resultado['txtMontoPromedioCreditosVinculadosAnioAnterior']);?>">
          </td>
          <td >Capital social del periodo anterior</td>
          <td >
            <input class="form-control" type="text" id="txtValorTCapitalSocialAnioAterior" name="txtValorTCapitalSocialAnioAterior"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTCapitalSocialAnioAterior', @$resultado['txtValorTCapitalSocialAnioAterior']);?>">
          </td>
      </tr>
          <tr class="tabla4col">
          <td >Periodo</td>
          
          <td >
                <div class='input-group date' id='divPeriodo'>
                  <input type='text' id="txtPeriodo" name="txtPeriodo" class="form-control" value="<?php echo set_value('txtPeriodo', @$resultado['txtPeriodo']);?>" readonly/>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
          </td>
          <td ></td>
          <td >
            
          </td>
      </tr>
       <tr class="tabla4col">
        <td >
        <input type="button" onclick="regresar()" name="" class="botones" value="Regresar">
        </td>
        <td></td>
        <td >        
          <input type="submit" name="submit" class="botones" value="Guardar">
        </td>
        
      </tr>

    </tbody>
  </table>
</form>

   <script src="<?php echo base_url()?>js/calendario/moment.min.js"></script>
   <script src="<?php echo base_url()?>js/calendario/bootstrap-datetimepicker.min.js"></script>
   <script src="<?php echo base_url()?>js/calendario/bootstrap-datetimepicker.es.js"></script>
   <script src="<?php echo base_url()?>js/calendario/bootstrap-datepicker.js"></script>

   <script type="text/javascript">
     $('#divPeriodo').datepicker({
            format: "yyyy",
        viewMode: "years", 
        minViewMode: "years"
    });
   </script>