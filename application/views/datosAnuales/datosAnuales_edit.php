<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/jquery.js"></script>
<script src="<?php echo base_url(); ?>js/bootstrap.min.js" ></script> 
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.min.css"> 
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datepicker.css" >
<script type="text/javascript" src="<?php echo base_url()?>js/loadFiles/loadFiles.js"></script>

<script type="text/javascript">
  function denegado() {
    alert("No cuenta con el permiso");
  }
</script>
<div class="error">
  <center>
    <?php echo validation_errors();?>
  </center>
</div>

<div id="contenedor">
  <input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" <?php if ($seleccionado == 1){echo 'checked="checked"';} ?> />
  <label for="tab-1" class="tab-label-1">Sección A</label>

  <input id="tab-2" type="radio" name="radio-set" class="tab-selector-2" <?php if ($seleccionado == 2){echo 'checked="checked"';} ?>/>
  <label for="tab-2" class="tab-label-2">Sección B</label>

  <input id="tab-3" type="radio" name="radio-set" class="tab-selector-3" <?php if ($seleccionado == 3){echo 'checked="checked"';} ?>/>
  <label for="tab-3" class="tab-label-3">Sección C</label>

  <input id="tab-4" type="radio" name="radio-set" class="tab-selector-4" <?php if ($seleccionado == 4){echo 'checked="checked"';} ?>/>
  <label for="tab-4" class="tab-label-4">Sección D</label>

  <input id="tab-5" type="radio" name="radio-set" class="tab-selector-5" <?php if ($seleccionado == 5){echo 'checked="checked"';} ?>/>
  <label for="tab-5" class="tab-label-5">Sección E</label>

  <input id="tab-6" type="radio" name="radio-set" class="tab-selector-6" <?php if ($seleccionado == 6){echo 'checked="checked"';} ?>/>
  <label for="tab-6" class="tab-label-6">Sección F</label>

  <div class="content">
    <div class="content-1" name="cont1">
    <?php if ($seleccionado == 1) { ?>
      <form action="<?php echo base_url()?>datosAnuales/guardarDGASA" id="TABLABOTON1" method="POST">
        <table class="table table-striped table-bordered table-hover" width="100%" border="0" cellspacing="5px"> 
          <tbody>
            <input type="hidden" name="accion" value="<?php echo $accion; ?>">
            <input type="hidden" name="id" value="<?php echo @$datoDGASA[0]->IdDGASA; ?>">

            <tr class="tabla4col">
              <td class="c1-c3">Porcentaje de Discapacidad:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtPorcentajeDiscapacidad"  placeholder="Ingresar datos" value="<?php echo set_value('txtPorcentajeDiscapacidad', @$datoDGASA[0]->PorcentajeEmpleadosDiscapacitadosPorLey);?>" <?php if(isset($componentBlock['txtPorcentajeDiscapacidad'])){ echo $componentBlock['txtPorcentajeDiscapacidad'];}else{ echo "";} ?> >
              </td>
              <td class="c1-c3">PIB Percapita:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtPIBPercapita"  placeholder="Ingresar datos" value="<?php echo set_value('txtPIBPercapita', @$datoDGASA[0]->PIBPercapita);?>" <?php if(isset($componentBlock['txtPIBPercapita'])){ echo $componentBlock['txtPIBPercapita'];}else{ echo "";} ?> >
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Inflación Mensual:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtInflacionMensual"  placeholder="Ingresar datos" value="<?php echo set_value('txtInflacionMensual', @$datoDGASA[0]->InflacionMensual);?>" <?php if(isset($componentBlock['txtInflacionMensual'])){ echo $componentBlock['txtInflacionMensual'];}else{ echo "";} ?> >
              </td>
              <td class="c1-c3">Inflación Anual:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtInflacionAnualizada"  placeholder="Ingresar datos" value="<?php echo set_value('txtInflacionAnualizada', @$datoDGASA[0]->InflacionAnualizada);?>" <?php if(isset($componentBlock['txtInflacionAnualizada'])){ echo $componentBlock['txtInflacionAnualizada'];}else{ echo "";} ?> >
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Salario Básico:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorSalarioMinimoMensual"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorSalarioMinimoMensual', @$datoDGASA[0]->ValorSalarioMinimoMensual);?>" <?php if(isset($componentBlock['txtValorSalarioMinimoMensual'])){ echo $componentBlock['txtValorSalarioMinimoMensual'];}else{ echo "";} ?> >
              </td>
              <td class="c1-c3">Número de Días Laborables:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTDiasLaborados"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTDiasLaborados', @$datoDGASA[0]->NumTDiasLaborados);?>" <?php if(isset($componentBlock['txtNumTDiasLaborados'])){ echo $componentBlock['txtNumTDiasLaborados'];}else{ echo "";} ?> >
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Ingresar el valor cuota mínima para apertura de cuenta:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValMinAperturaCuenta"  placeholder="Ingresar datos" value="<?php echo set_value('txtValMinAperturaCuenta', @$datoDGASA[0]->ValorCuotaIngreso);?>"  <?php if(isset($componentBlock['txtValMinAperturaCuenta'])){ echo $componentBlock['txtValMinAperturaCuenta'];}else{ echo "";} ?> >
              </td>
              <td class="c1-c3">TEA Máxima por el BCE:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtTEAMaximaBCE"  placeholder="Ingresar datos" value="<?php echo set_value('txtTEAMaximaBCE', @$datoDGASA[0]->TEAMaximaBCE);?>"  <?php if(isset($componentBlock['txtTEAMaximaBCE'])){ echo $componentBlock['txtTEAMaximaBCE'];}else{ echo "";} ?> >
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">TEA Máxima por el Cooperativa:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtTEAMaximaCooperativa"  placeholder="Ingresar datos" value="<?php echo set_value('txtTEAMaximaCooperativa', @$datoDGASA[0]->TEAMaximaCooperativa);?>"  <?php if(isset($componentBlock['txtTEAMaximaCooperativa'])){ echo $componentBlock['txtTEAMaximaCooperativa'];}else{ echo "";} ?> >
              </td>
              <td class="c1-c3">Dias de descanso forzoso:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTDiasDescansoForzoso"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTDiasDescansoForzoso', @$datoDGASA[0]->NumTDiasDescansoForzoso);?>"  <?php if(isset($componentBlock['txtNumTDiasDescansoForzoso'])){ echo $componentBlock['txtNumTDiasDescansoForzoso'];}else{ echo "";} ?> >
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Número de baterías sanitarias establecidas por normativa:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTBateriasSanitariasPorNormativa"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTBateriasSanitariasPorNormativa', @$datoDGASA[0]->NumTBateriasSanitariasPorNormativa);?>"  <?php if(isset($componentBlock['txtNumTBateriasSanitariasPorNormativa'])){ echo $componentBlock['txtNumTBateriasSanitariasPorNormativa'];}else{ echo "";} ?> >
              </td>
              <td class="c1-c3">Número de empleados que cubre el número de baterías:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumEmpleadosQueCubreLasBaterias"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumEmpleadosQueCubreLasBaterias', @$datoDGASA[0]->NumEmpleadosQueCubreLasBaterias);?>"  <?php if(isset($componentBlock['txtNumEmpleadosQueCubreLasBaterias'])){ echo $componentBlock['txtNumEmpleadosQueCubreLasBaterias'];}else{ echo "";} ?> >
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Cantidad de días de descanso forzoso laborados por los empleados:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTDiasDescansoForzosoLaborados"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTDiasDescansoForzosoLaborados', @$datoDGASA[0]->NumTDiasDescansoForzosoLaborados);?>"  <?php if(isset($componentBlock['txtNumTDiasDescansoForzosoLaborados'])){ echo $componentBlock['txtNumTDiasDescansoForzosoLaborados'];}else{ echo "";} ?> >
              </td>
              <td class="c1-c3">Total de horas trabajadas en el año:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTHorasTrabajadas"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTHorasTrabajadas', @$datoDGASA[0]->NumTHorasTrabajadas);?>"  <?php if(isset($componentBlock['txtNumTHorasTrabajadas'])){ echo $componentBlock['txtNumTHorasTrabajadas'];}else{ echo "";} ?> >
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Promedio de cuentas por cobrar:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtPromedioCuentasPorCobrar"  placeholder="Ingresar datos" value="<?php echo set_value('txtPromedioCuentasPorCobrar', @$datoDGASA[0]->PromedioCuentasPorCobrar);?>"  <?php if(isset($componentBlock['txtPromedioCuentasPorCobrar'])){ echo $componentBlock['txtPromedioCuentasPorCobrar'];}else{ echo "";} ?> >
              </td>
              <td class="c1-c3">Número de proveedores  que trabajan con la organización:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTProveedoresTrabajanOrganizacion"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTProveedoresTrabajanOrganizacion', @$datoDGASA[0]->NumTProveedoresTrabajanOrganizacion);?>"  <?php if(isset($componentBlock['txtNumTProveedoresTrabajanOrganizacion'])){ echo $componentBlock['txtNumTProveedoresTrabajanOrganizacion'];}else{ echo "";} ?>  >
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Número de empleados nuevos generados para socios:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTEmpleadosGeneradosParaSocios"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadosGeneradosParaSocios', @$datoDGASA[0]->NumTEmpleadosGeneradosParaSocios);?>"  <?php if(isset($componentBlock['txtNumTEmpleadosGeneradosParaSocios'])){ echo $componentBlock['txtNumTEmpleadosGeneradosParaSocios'];}else{ echo "";} ?> >
              </td>
              <td class="c1-c3">Número de políticas de contratación de personal :</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTPoliticasDeCotratacionDePersonal"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTPoliticasDeCotratacionDePersonal', @$datoDGASA[0]->NumTPoliticasDeCotratacionDePersonal);?>"  <?php if(isset($componentBlock['txtNumTPoliticasDeCotratacionDePersonal'])){ echo $componentBlock['txtNumTPoliticasDeCotratacionDePersonal'];}else{ echo "";} ?> >
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Número de contrataciones en función de la CV:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTContratosEnFuncionDeCV"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTContratosEnFuncionDeCV', @$datoDGASA[0]->NumTContratosEnFuncionDeCV);?>"  <?php if(isset($componentBlock['txtNumTContratosEnFuncionDeCV'])){ echo $componentBlock['txtNumTContratosEnFuncionDeCV'];}else{ echo "";} ?> >
              </td>
              <td class="c1-c3">Número de socios que están dentro del programa seguros exequia:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumtSociosEnProgramaDeSeguroExequial"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumtSociosEnProgramaDeSeguroExequial', @$datoDGASA[0]->NumtSociosEnProgramaDeSeguroExequial);?>"  <?php if(isset($componentBlock['txtNumtSociosEnProgramaDeSeguroExequial'])){ echo $componentBlock['txtNumtSociosEnProgramaDeSeguroExequial'];}else{ echo "";} ?> >
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Número de empleados y socios que aportan al fondo de cesantía:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTSociosAportanAlFondoDeCesantia"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTSociosAportanAlFondoDeCesantia', @$datoDGASA[0]->NumTSociosAportanAlFondoDeCesantia);?>"  <?php if(isset($componentBlock['txtNumTSociosAportanAlFondoDeCesantia'])){ echo $componentBlock['txtNumTSociosAportanAlFondoDeCesantia'];}else{ echo "";} ?> >
              </td>
              <td class="c1-c3">Número de empleados y socios que aportan al fondo mortuorio:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTSociosAportanAlFondoMortuorio"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTSociosAportanAlFondoMortuorio', @$datoDGASA[0]->NumTSociosAportanAlFondoMortuorio);?>"  <?php if(isset($componentBlock['txtNumTSociosAportanAlFondoMortuorio'])){ echo $componentBlock['txtNumTSociosAportanAlFondoMortuorio'];}else{ echo "";} ?> >
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Número de empleados y socios que aportan al fondo de empleados o cooperativos:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTSociosAportanAlFondoDeEmpleadosOCooperativa"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTSociosAportanAlFondoDeEmpleadosOCooperativa', @$datoDGASA[0]->txtNumTSociosAportanAlFondoDeEmpleadosOCooperativa);?>"  <?php if(isset($componentBlock['txtNumTSociosAportanAlFondoDeEmpleadosOCooperativa'])){ echo $componentBlock['txtNumTSociosAportanAlFondoDeEmpleadosOCooperativa'];}else{ echo "";} ?>  >
              </td>
              <td class="c1-c3">Número de empleados o socios que aportan al fondo de accidentes o calamidades:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTSociosAportanAlFondoDeAccidenteOCalamidades"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTSociosAportanAlFondoDeAccidenteOCalamidades', @$datoDGASA[0]->NumTSociosAportanAlFondoDeAccidenteOCalamidades);?>"  <?php if(isset($componentBlock['txtNumTSociosAportanAlFondoDeAccidenteOCalamidades'])){ echo $componentBlock['txtNumTSociosAportanAlFondoDeAccidenteOCalamidades'];}else{ echo "";} ?> >
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Número de practicantes establecidos mediante política:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTPracticantesRequeridos"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTPracticantesRequeridos', @$datoDGASA[0]->NumTPracticantesRequeridos);?>"  <?php if(isset($componentBlock['txtNumTPracticantesRequeridos'])){ echo $componentBlock['txtNumTPracticantesRequeridos'];}else{ echo "";} ?> >
              </td>
              <td class="c1-c3">Número total de representantes empadronados:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTRepresentantesEmpadronados"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTRepresentantesEmpadronados', @$datoDGASA[0]->NumTRepresentantesEmpadronados);?>"  <?php if(isset($componentBlock['txtNumTRepresentantesEmpadronados'])){ echo $componentBlock['txtNumTRepresentantesEmpadronados'];}else{ echo "";} ?> >
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Energía renovable utilizada (kwh):</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtCantTKwhEnergiaUtilizadaRenovable"  placeholder="Ingresar datos" value="<?php echo set_value('txtCantTKwhEnergiaUtilizadaRenovable', @$datoDGASA[0]->CantTKwhEnergiaUtilizadaRenovable);?>"  <?php if(isset($componentBlock['txtCantTKwhEnergiaUtilizadaRenovable'])){ echo $componentBlock['txtCantTKwhEnergiaUtilizadaRenovable'];}else{ echo "";} ?> >
              </td>
              <td class="c1-c3">Energia renovable y no renovable (kwh):</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtCantTKwhEnergiaRenovableNoRenovable"  placeholder="Ingresar datos" value="<?php echo set_value('txtCantTKwhEnergiaRenovableNoRenovable', @$datoDGASA[0]->CantTKwhEnergiaRenovableNoRenovable);?>"  <?php if(isset($componentBlock['txtCantTKwhEnergiaRenovableNoRenovable'])){ echo $componentBlock['txtCantTKwhEnergiaRenovableNoRenovable'];}else{ echo "";} ?> >
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Cantidad de agua reutilizada o reciclada (m3):</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtCantTm3Reutilizada"  placeholder="Ingresar datos" value="<?php echo set_value('txtCantTm3Reutilizada', @$datoDGASA[0]->CantTm3Reutilizada);?>"  <?php if(isset($componentBlock['txtCantTm3Reutilizada'])){ echo $componentBlock['txtCantTm3Reutilizada'];}else{ echo "";} ?> >
              </td>
              <td class="c1-c3">Sumatoria de accidentes últimos 5 años:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTAccidentes5Anios"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTAccidentes5Anios', @$datoDGASA[0]->NumTAccidentes5Anios);?>"  <?php if(isset($componentBlock['txtNumTAccidentes5Anios'])){ echo $componentBlock['txtNumTAccidentes5Anios'];}else{ echo "";} ?> >
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Periodo:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtPeriodo"  placeholder="Ingresar datos" value="<?php echo set_value('txtPeriodo');?>"  <?php if(isset($componentBlock['txtPeriodo'])){ echo $componentBlock['txtPeriodo'];}else{ echo "";} ?> >
              </td>
              <td class="c1-c3"></td>
              <td class="c2-c4">
                
              </td>
            </tr>

            <tr class="tabla4col">
              <td class="c1-c3">
              <?php /* if ((@$permisosSeccionA[0]->Agregar == 1) && @$accion == "Nuevo"){echo '<input type="submit" name="submit" class="botones" value="Guardar">'; }elseif ((@$permisosSeccionA[0]->Actualizar ==1) && @$accion == "Editar") { echo '<input type="submit" name="submit" class="botones" value="Guardar">'; } */ ?>
              <?php if (@$permisosSeccionA[0]->Actualizar ==1) { ?>
                <input type="submit" name="submit" class="botones" value="Guardar">                
              <?php } ?>
              </td>
              <td class="c2-c4">        
              </td>
              <td class="c1-c3">
                <input type="reset" class="botones" value="Restaurar">                      
              </td>
              <td class="c2-c4">        
              </td>
            </tr>

          </tbody>
        </table>
      </form>
    <?php } ?>
    </div>

    <div class="content-2">
    <?php if ($seleccionado == 2) { ?>
      <form action="<?php echo base_url()?>datosAnuales/guardarDGASB" id="TABLABOTON2" method="POST">
        <table class="table table-striped table-bordered table-hover" width="100%" bo10der="0" cellspacing="5px">
          <tbody>
            <input type="hidden" name="accion" value="<?php echo $accion; ?>">
            <input type="hidden" name="id" value="<?php echo @$datoDGASB[0]->IdDGASB; ?>">
            <tr class="tabla4col">
              <td class="c1-c3">Número de socios que sumados represente el 50% o más del total de depósitos:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTSocios50PorcientoOMasTotalDeDepositos"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTSocios50PorcientoOMasTotalDeDepositos', @$datoDGASB[0]->NumTSocios50PorcientoOMasTotalDeDepositos);?>">
              </td>
              <td class="c1-c3">Número de Sugerencias constructivas:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTSugerenciasConstructivas"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTSugerenciasConstructivas', @$datoDGASB[0]->NumTSugerenciasConstructivas);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Total sugerencias revisadas en el buzón de sugerencias:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTSugerenciasRevisadas"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTSugerenciasRevisadas', @$datoDGASB[0]->NumTSugerenciasRevisadas);?>">
              </td>
              <td class="c1-c3">Cantidad de productos y servicios entregados a tiempo a los clientes:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTProductosServiciosEntregadosATiempoAClientes"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTProductosServiciosEntregadosATiempoAClientes', @$datoDGASB[0]->NumTProductosServiciosEntregadosATiempoAClientes);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Número de eventos que mantiene con otras COAC:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTEventosMantieneConOtrasCOAC"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEventosMantieneConOtrasCOAC', @$datoDGASB[0]->NumTEventosMantieneConOtrasCOAC);?>">
              </td>
              <td class="c1-c3">Número de beneficios dirigidos a socios en el ámbito distintos a servicios financieros:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTBeneficiosNoFinancierosASocios"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTBeneficiosNoFinancierosASocios', @$datoDGASB[0]->NumTBeneficiosNoFinancierosASocios);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Número socios participantes en elecciones:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTSociosParticipanEnElecciones"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTSociosParticipanEnElecciones', @$datoDGASB[0]->NumTSociosParticipanEnElecciones);?>">
              </td>
              <td class="c1-c3">Empleados que gozaron  de las vacaciones:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTEmpeladosQueGozaronVacaciones"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpeladosQueGozaronVacaciones', @$datoDGASB[0]->NumTEmpeladosQueGozaronVacaciones);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Número de empleados a los que se entrego equipos de protección:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTEmpleadosRecibenEquipoDeProteccion"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadosRecibenEquipoDeProteccion', @$datoDGASB[0]->NumTEmpleadosRecibenEquipoDeProteccion);?>">
              </td>
              <td class="c1-c3">Número de empleados que utilizan los equipos de protección:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTEmpleadosQueUsanEquiposDeProteccion"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadosQueUsanEquiposDeProteccion', @$datoDGASB[0]->NumTEmpleadosQueUsanEquiposDeProteccion);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Empleados que deberían utilizar los  equipos de protección:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTEmpleadosQueDebemUsarEquiposDeProteccion"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadosQueDebemUsarEquiposDeProteccion', @$datoDGASB[0]->NumTEmpleadosQueDebemUsarEquiposDeProteccion);?>">
              </td>
              <td class="c1-c3">Número de evaluaciones efectuadas utilización de equipos de protección:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTEvaluacionesAUtilizacionDeEquiDeProteccionEjecutadas"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEvaluacionesAUtilizacionDeEquiDeProteccionEjecutadas', @$datoDGASB[0]->NumTEvaluacionesAUtilizacionDeEquiDeProteccionEjecutadas);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Evaluaciones programadas en la utilización de equipos de protección:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTEvaluacionesAUtilizacionDeEquiDeProteccionProgramadas"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEvaluacionesAUtilizacionDeEquiDeProteccionProgramadas', @$datoDGASB[0]->NumTEvaluacionesAUtilizacionDeEquiDeProteccionProgramadas);?>">
              </td>
              <td class="c1-c3">Cantidad de mantenimientos realizados a la infraestructura:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTMantenimientosAInfraestructuraEjecutados"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTMantenimientosAInfraestructuraEjecutados', @$datoDGASB[0]->NumTMantenimientosAInfraestructuraEjecutados);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Número de Mantenimientos de Infraestructura requeridos :</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTMantenimientosAInfraestructuraRequeridos"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTMantenimientosAInfraestructuraRequeridos', @$datoDGASB[0]->NumTMantenimientosAInfraestructuraRequeridos);?>">
              </td>
              <td class="c1-c3">Número de oficinas en comunidades que no existe otras instituciones de servicio financiero:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTPuntosEnComunidadesSinOtrasInstitucionesFinancieras"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTPuntosEnComunidadesSinOtrasInstitucionesFinancieras', @$datoDGASB[0]->NumTPuntosEnComunidadesSinOtrasInstitucionesFinancieras);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Total puntos de atención:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTPuntosDeAtencion"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTPuntosDeAtencion', @$datoDGASB[0]->NumTPuntosDeAtencion);?>">
              </td>
              <td class="c1-c3">Puntos de atención que brinda acceso a personas con discapacidad:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTOficinasConAccesoADiscapacitados"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTOficinasConAccesoADiscapacitados', @$datoDGASB[0]->NumTPuntosDeAtencionConAccesoADiscapacitados);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Número de participaciones en la posición de políticas públicas y actividades de lobbying:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTParticipacionesLobbying"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTParticipacionesLobbying', @$datoDGASB[0]->NumTParticipacionesLobbying);?>">
              </td>
              <td class="c1-c3">Asuntos acordados no respetados por los directivos:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTAsuntosAcordadosNoRespetadosPorDirectivos"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTAsuntosAcordadosNoRespetadosPorDirectivos', @$datoDGASB[0]->NumTAsuntosAcordadosNoRespetadosPorDirectivos);?>">
              </td>
            </tr>
            <tr class="tabla4col">                    
              <td class="c1-c3">Total de asuntos acordados en los convenios sindicales:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTAsuntosAcordadosEnConveniosSindicales"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTAsuntosAcordadosEnConveniosSindicales', @$datoDGASB[0]->NumTAsuntosAcordadosEnConveniosSindicales);?>">
              </td>
              <td class="c1-c3">Asuntos acordados con los directivos no respetados por los trabajadores:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTAsuntosAcordadosNoRespetadosPorEmpleados"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTAsuntosAcordadosNoRespetadosPorEmpleados', @$datoDGASB[0]->NumTAsuntosAcordadosNoRespetadosPorEmpleados);?>">
              </td>
            </tr>
            <tr class="tabla4col">                    
              <td class="c1-c3">Número de créditos vigentes otorgados a mujeres:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTCreditosVigentesAMujeres"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTCreditosVigentesAMujeres', @$datoDGASB[0]->NumTCreditosVigentesAMujeres);?>">
              </td>
              <td class="c1-c3">Total cartera de crédito mujeres:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorTCarteraCreditoMujeres"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTCarteraCreditoMujeres', @$datoDGASB[0]->ValorTCarteraCreditoMujeres);?>">
              </td>
            </tr>
            <tr class="tabla4col">                    
              <td class="c1-c3">Número de operaciones de créditos con montos <=al 30% del PIB per cápita:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTOperacionesDeCreditosConMontoMenorA30PorcientoPIB"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTOperacionesDeCreditosConMontoMenorA30PorcientoPIB', @$datoDGASB[0]->NumTOperacionesDeCreditosConMontoMenorA30PorcientoPIB);?>">
              </td>
              <td class="c1-c3">Número Total de operaciones de crédito vigentes:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTOperacionesDeCreditoVigentes"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTOperacionesDeCreditoVigentes', @$datoDGASB[0]->NumTOperacionesDeCreditoVigentes);?>">
              </td>
            </tr>
            <tr class="tabla4col">                    
              <td class="c1-c3">Número de operaciones de créditos  con cuotas vigentes <= 1% del PIB Per capita:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTOperacionesCreditoConCuotasVigentesMenosA1PorcientoPIB"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTOperacionesCreditoConCuotasVigentesMenosA1PorcientoPIB', @$datoDGASB[0]->NumTOperacionesCreditoConCuotasVigentesMenosA1PorcientoPIB);?>">
              </td>
              <td class="c1-c3">Número de pedidos entregados a tiempo:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTPedidosEntregadosATiempo"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTPedidosEntregadosATiempo', @$datoDGASB[0]->NumTPedidosEntregadosATiempo);?>">
              </td>
            </tr> 
            <tr class="tabla4col">                    
              <td class="c1-c3">Total pedidos entregados:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTPedidosEntregados"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTPedidosEntregados', @$datoDGASB[0]->NumTPedidosEntregados);?>">
              </td>
              <td class="c1-c3">Número de productos y servicios que se adquiere en el ámbito local:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTProductosYServiciosAdquiereLocalmente"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTProductosYServiciosAdquiereLocalmente', @$datoDGASB[0]->NumTProductosYServiciosAdquiereLocalmente);?>">
              </td>
            </tr>
            <tr class="tabla4col">                    
              <td class="c1-c3">Total productos y servicios:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTProductosYServicios"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTProductosYServicios', @$datoDGASB[0]->NumTProductosYServicios);?>">
              </td>
              <td class="c1-c3">Número de Certificaciones requeridas en el POA:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTCertificacionesRequeridasEnElPOA"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTCertificacionesRequeridasEnElPOA', @$datoDGASB[0]->NumTCertificacionesRequeridasEnElPOA);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Periodo:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtPeriodo"  placeholder="Ingresar datos" value="<?php echo set_value('txtPeriodo');?>">
              </td>
              <td class="c1-c3"></td>
              <td class="c2-c4">
                
              </td>
            </tr>

            <tr class="tabla4col">
              <td class="c1-c3">
              <?php if (@$permisosSeccionB[0]->Actualizar ==1) { ?>
                <input type="submit" name="submit" class="botones" value="Guardar">
                <?php } ?>
              </td>
              <td class="c2-c4">        
              </td>
              <td class="c1-c3">
                <input type="reset" class="botones" value="Restaurar">
              </td>
              <td class="c2-c4">        
              </td>
            </tr>

          </tbody>
        </table>
      </form>
    <?php } ?>
    </div>

    <div class="content-3">
    <?php if ($seleccionado == 3) { ?>
      <form action="<?php echo base_url()?>datosAnuales/guardarDGASC" id="TABLABOTON3" method="POST">
        <table class="table table-striped table-bordered table-hover" width="100%" border="0" cellspacing="5px">
          <tbody>
            <input type="hidden" name="accion" value="<?php echo $accion; ?>">
            <input type="hidden" name="id" value="<?php echo @$datoDGASC[0]->IdDGASC; ?>">
            <tr class="tabla4col">
              <td class="c1-c3">Número de Demandas administrativas atendidas</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTDemandasAdministrativasAtendidas"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTDemandasAdministrativasAtendidas', @$datoDGASC[0]->NumTDemandasAdministrativasAtendidas);?>">
              </td>
              <td class="c1-c3">Total de demandas Administrativas</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTDemandasAdministrativas"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTDemandasAdministrativas', @$datoDGASC[0]->NumTDemandasAdministrativas);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Total de productos y servicios entregados a los clientes</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTProductosServiciosEntregadosAClientes"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTProductosServiciosEntregadosAClientes', @$datoDGASC[0]->NumTProductosServiciosEntregadosAClientes);?>">
              </td>
              <td class="c1-c3">Número de denuncias por aspectos poco éticos resueltas</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTDenunciasAspectosNoEticosResueltos"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTDenunciasAspectosNoEticosResueltos', @$datoDGASC[0]->NumTDenunciasAspectosNoEticosResueltos);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Total de denuncias por aspectos no éticos</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTDenunciasAspectosNoEticos"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTDenunciasAspectosNoEticos', @$datoDGASC[0]->NumTDenunciasAspectosNoEticos);?>">
              </td>
              <td class="c1-c3">Total casos de discriminación </td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTCasosDiscriminacion"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTCasosDiscriminacion', @$datoDGASC[0]->NumTCasosDiscriminacion);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Número de casos de discriminación ocurridos durante el perido resueltos </td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTCasosDiscriminacionResueltos"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTCasosDiscriminacionResueltos', @$datoDGASC[0]->NumTCasosDiscriminacionResueltos);?>">
              </td>
              <td class="c1-c3">Número de procesos con riesgo de efectos de corrupción analizados</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTProcesosConRiesgosDeCorrupcionAnalizados"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTProcesosConRiesgosDeCorrupcionAnalizados', @$datoDGASC[0]->NumTProcesosConRiesgosDeCorrupcionAnalizados);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Total de procesos con riesgo de corrupción identificados</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTProcesosConRiesgosDeCorrupcionIdentificados"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTProcesosConRiesgosDeCorrupcionIdentificados', @$datoDGASC[0]->NumTProcesosConRiesgosDeCorrupcionIdentificados);?>">
              </td>
              <td class="c1-c3">Número de medidas tomadas en respuesta de corrupción</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTMedidasAnteIncidentesDeCorrupcion"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTMedidasAnteIncidentesDeCorrupcion', @$datoDGASC[0]->NumTMedidasAnteIncidentesDeCorrupcion);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Número total de incidentes de corrupción ocurridos</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTIncidentesDeCorrupcionOcurridos"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTIncidentesDeCorrupcionOcurridos', @$datoDGASC[0]->NumTIncidentesDeCorrupcionOcurridos);?>">
              </td>
              <td class="c1-c3">Dias destinados a la educación familiar en el año</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTDiasDestinadosAEducacionFamiliar"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTDiasDestinadosAEducacionFamiliar', @$datoDGASC[0]->NumTDiasDestinadosAEducacionFamiliar);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Número de transacciones realizadas en el periodo</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTTransacciones"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTTransacciones', @$datoDGASC[0]->NumTTransacciones);?>">
              </td>
              <td class="c1-c3">Número de programas o iniciativas de reciclaje </td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTProgramasDeReciclaje"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTProgramasDeReciclaje', @$datoDGASC[0]->NumTProgramasDeReciclaje);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Total de comprobantes Emitidos</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTComprobantesEmitidos"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTComprobantesEmitidos', @$datoDGASC[0]->NumTComprobantesEmitidos);?>">
              </td>
              <td class="c1-c3">Comprobantes electronicos</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTComprobantesElectronicosEmitidos"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTComprobantesElectronicosEmitidos', @$datoDGASC[0]->NumTComprobantesElectronicosEmitidos);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Número de baterias sanitarias por departamento</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTBateriasSanitarias"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTBateriasSanitarias', @$datoDGASC[0]->NumTBateriasSanitariasPorDepartamentos);?>">
              </td>
              <td class="c1-c3">Número de beneficios sociales adicionales que reciben los colaboradores con otro tipo de contrato o relación laboral</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTBeneficiosAdicionalesAEmpleadosConContratoNoIndefinido"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTBeneficiosAdicionalesAEmpleadosConContratoNoIndefinido', @$datoDGASC[0]->NumTBeneficiosAdicionalesAEmpleadosConContratoNoIndefinido);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Número de beneficios sociales adicionales que reciben colaboradores con contrato indefinido</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTBeneficiosAdicionalesAEmpleadosConContratoIndefinido"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTBeneficiosAdicionalesAEmpleadosConContratoIndefinido', @$datoDGASC[0]->NumTBeneficiosAdicionalesAEmpleadosConContratoIndefinido);?>">
              </td>
              <td class="c1-c3">Trabajadores laboran más de un año</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTEmpleadosLaboranMasDeAnio"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadosLaboranMasDeAnio', @$datoDGASC[0]->NumTEmpleadosLaboranMasDeAnio);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Número de Mujeres embarazadas</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTEmpleadasEmbarazadas"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadasEmbarazadas', @$datoDGASC[0]->NumTEmpleadasEmbarazadas);?>">
              </td>
              <td class="c1-c3">Hombres con permiso de paternidad </td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTEmpleadosConPermisoPaternidad"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadosConPermisoPaternidad', @$datoDGASC[0]->NumTEmpleadosConPermisoPaternidad);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Mujeres reincorporadas después permiso maternidad</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTEmpleadasReincorporadasPorMaternidad"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadasReincorporadasPorMaternidad', @$datoDGASC[0]->NumTEmpleadasReincorporadasPorMaternidad);?>">
              </td>
              <td class="c1-c3">Mujeres con permiso de maternidad</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTEmpleadasConPermisoMaternidad"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadasConPermisoMaternidad', @$datoDGASC[0]->NumTEmpleadasConPermisoMaternidad);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Hombres reincorporados después permiso paternidad</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTEmpleadosReincorporadosPorPaternidad"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadosReincorporadosPorPaternidad', @$datoDGASC[0]->NumTEmpleadosReincorporadosPorPaternidad);?>">
              </td>
              <td class="c1-c3">Empleados reincorporados por un tiempo mayor al establecido  en caso de permiso de partenidad</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTEmpleadosReincorporadosFueraDeTiempoEstablecido"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadosReincorporadosFueraDeTiempoEstablecido', @$datoDGASC[0]->NumTEmpleadosReincorporadosFueraDeTiempoEstablecido);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Total de empleados reincorporados en el tiempo establecido en caso de permiso de paternidad</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTEmpleadosReincorporadosATiempoEstablecido"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadosReincorporadosATiempoEstablecido', @$datoDGASC[0]->NumTEmpleadosReincorporadosATiempoEstablecido);?>">
              </td>

              <td class="c1-c3">Empleadas reincorporados por un tiempo mayor al establecido  en caso de permiso de maternidad</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTEmpleadasReincorporadasFueraDeTiempoEstablecido"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadasReincorporadasFueraDeTiempoEstablecido', @$datoDGASC[0]->NumTEmpleadasReincorporadasFueraDeTiempoEstablecido);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Total de empleadas reincorporados en el tiempo establecido en caso de permiso de maternidad</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTEmpleadasReincorporadasATiempoEstablecido"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadasReincorporadasATiempoEstablecido', @$datoDGASC[0]->NumTEmpleadasReincorporadasATiempoEstablecido);?>">
              </td>
              <td class="c1-c3">Número de trabajadores a jornada completa de trabajo</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTEmpleadosAJornadaCompleta"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadosAJornadaCompleta', @$datoDGASC[0]->NumTEmpleadosAJornadaCompleta);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Número Trabajadores con jornada parcial de trabajo</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTEmpleadosAJornadaParcial"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadosAJornadaParcial', @$datoDGASC[0]->NumTEmpleadosAJornadaParcial);?>">
              </td>
              <td class="c1-c3">Cantidad de horas suplementarias trabajadas</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTHorasSuplementariasTrabajadas"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTHorasSuplementariasTrabajadas', @$datoDGASC[0]->NumTHorasSuplementariasTrabajadas);?>">
              </td>
            </tr>
            <tr class="tabla4col">           
              <td class="c1-c3">Cantidad de horas extras trabajadas</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTHorasExtrasTrabajadas"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTHorasExtrasTrabajadas', @$datoDGASC[0]->NumTHorasExtrasTrabajadas);?>">
              </td>
              <td class="c1-c3">Cantidad de productos defectuosos rechazados</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTProductosDefectuososRechazados"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTProductosDefectuososRechazados', @$datoDGASC[0]->NumTProductosDefectuososRechazados);?>">
              </td>              
            </tr>
            <tr class="tabla4col">              
              <td class="c1-c3">Total productos recibidos</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTProductosRecibidos"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTProductosRecibidos', @$datoDGASC[0]->NumTProductosRecibidos);?>">
              </td>
              <td class="c1-c3">Número de sanciones monetarias </td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTSancionesMonetarias"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTSancionesMonetarias', @$datoDGASC[0]->NumTSancionesMonetarias);?>">
              </td>
            </tr>
            <tr class="tabla4col">              
              <td class="c1-c3">Número de horas de trabajo al día según lo establece el Código de Trabajo</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTHorasLaboradasPorDiaEmpleados"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTHorasLaboradasPorDiaEmpleados', @$datoDGASC[0]->NumTHorasLaboradasPorDiaEmpleados);?>">
              </td>
              <td class="c1-c3">Número de sesiones establecidas por la ley</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTSesionesDeConsejosEstablecidasPorLey"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTSesionesDeConsejosEstablecidasPorLey', @$datoDGASC[0]->NumTSesionesDeConsejosEstablecidasPorLey);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Periodo:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtPeriodo"  placeholder="Ingresar datos" value="<?php echo set_value('txtPeriodo');?>">
              </td>
              <td class="c1-c3"></td>
              <td class="c2-c4">
                
              </td>
            </tr>

            <tr class="tabla4col">
              <td class="c1-c3">
              <?php if (@$permisosSeccionC[0]->Actualizar ==1) { ?>
                <input type="submit" name="submit" class="botones" value="Guardar">
                <?php } ?>
              </td>
              <td class="c2-c4">        
              </td>
              <td class="c1-c3">
                <input type="reset" class="botones" value="Restaurar">
              </td>
              <td class="c2-c4">        
              </td>
            </tr>
          </tbody>
        </table>
      </form>
    <?php } ?>
    </div>

    <div class="content-4">
    <?php if ($seleccionado == 4) { ?>
      <form action="<?php echo base_url()?>datosAnuales/guardarDGASD" id="TABLABOTON4" method="POST">
        <table class="table table-striped table-bordered table-hover" width="100%" border="0" cellspacing="5px">
          <tbody>
            <input type="hidden" name="accion" value="<?php echo $accion; ?>">
            <input type="hidden" name="id" value="<?php echo @$datoDGASD[0]->IdDGASD; ?>">
            <tr class="tabla4col">
              <td class="c1-c3">Saldo 10 mayores depositantes</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtSaldoT10MayoresDepositantes"  placeholder="Ingresar datos" value="<?php echo set_value('txtSaldoT10MayoresDepositantes', @$datoDGASD[0]->SaldoT10MayoresDepositantes);?>">
              </td>
              <td class="c1-c3">Valor Depósitos a la vista</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorTDepositoALaVista"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTDepositoALaVista', @$datoDGASD[0]->ValorTDepositoALaVista);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Valor depósitos a plazo</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorTDepositoAplazo"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTDepositoAplazo', @$datoDGASD[0]->ValorTDepositoAplazo);?>">
              </td>
              <td class="c1-c3">Monto invertido en  infraestructura</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtMontoTInvertidoEnInfraestructura"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTInvertidoEnInfraestructura', @$datoDGASD[0]->MontoTInvertidoEnInfraestructura);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Ingresos operacionales </td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorTIngresosOperacionales"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTIngresosOperacionales', @$datoDGASD[0]->ValorTIngresosOperacionales);?>">
              </td>
              <td class="c1-c3">Total ingresos</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorTIngresos"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTIngresos', @$datoDGASD[0]->ValorTIngresos);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Ingresos por venta de activos fijos</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorTIngresosPorVentaDeActivosFijos"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTIngresosPorVentaDeActivosFijos', @$datoDGASD[0]->ValorTIngresosPorVentaDeActivosFijos);?>">
              </td>
              <td class="c1-c3">Total Ventas en el periodo</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorTVentas"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTVentas', @$datoDGASD[0]->ValorTVentas);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Total ingresos por intereses</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorTIngresosPorIntereses"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTIngresosPorIntereses', @$datoDGASD[0]->ValorTIngresosPorIntereses);?>">
              </td>
              <td class="c1-c3">Ventas a crédito</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtVentasACreditos"  placeholder="Ingresar datos" value="<?php echo set_value('txtVentasACreditos', @$datoDGASD[0]->VentasACreditos);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Ventas a contado</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorTVentasAContado"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTVentasAContado', @$datoDGASD[0]->ValorTVentasAContado);?>">
              </td>
              <td class="c1-c3">Margen Financiero</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorTMargenFinanciero"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTMargenFinanciero', @$datoDGASD[0]->ValorTMargenFinanciero);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Gastos Operacionales</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorTGastosOperacionales"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTGastosOperacionales', @$datoDGASD[0]->ValorTGastosOperacionales);?>">
              </td>
              <td class="c1-c3">Total gastos no operacionales del periodo</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorTGastosNoOperacionales"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTGastosNoOperacionales', @$datoDGASD[0]->ValorTGastosNoOperacionales);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Gastos sueldos y salarios</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorTSueldosYSalarios"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTSueldosYSalarios', @$datoDGASD[0]->ValorTSueldosYSalarios);?>">
              </td>
              <td class="c1-c3">Monto de créditos de consumo socios</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtMontoTCreditoConsumoSocios"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTCreditoConsumoSocios', @$datoDGASD[0]->MontoTCreditoConsumoSocios);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Monto total de créditos otorgados </td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtMontoTCreditos"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTCreditos', @$datoDGASD[0]->MontoTCreditos);?>">
              </td>
              <td class="c1-c3">Monto de créditos de vivienda socios </td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtMontoTCreditoViviendaSocios"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTCreditoViviendaSocios', @$datoDGASD[0]->MontoTCreditoViviendaSocios);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Monto de microcréditos socios</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtMontoTCreditoMicrocreditoSocios"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTCreditoMicrocreditoSocios', @$datoDGASD[0]->MontoTCreditoMicrocreditoSocios);?>">
              </td>
              <td class="c1-c3">Monto de créditos comercial socios</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtMontoTCreditoComercialSocios"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTCreditoComercialSocios', @$datoDGASD[0]->MontoTCreditoComercialSocios);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Monto de créditos inmobiliario  socios</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtMontoTCreditoInmobiliarioSocios"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTCreditoInmobiliarioSocios', @$datoDGASD[0]->MontoTCreditoInmobiliarioSocios);?>">
              </td>
              <td class="c1-c3">Valor de Cartera de crédito</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorTCarteraCredito"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTCarteraCredito', @$datoDGASD[0]->ValorTCarteraCredito);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Saldo de cartera de credito para necesidades sociales</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtSaldoTCarteraCreditoParaNecesidadSocial"  placeholder="Ingresar datos" value="<?php echo set_value('txtSaldoTCarteraCreditoParaNecesidadSocial', @$datoDGASD[0]->SaldoTCarteraCreditoParaNecesidadSocial);?>">
              </td>
              <td class="c1-c3">Saldo de cartera de credito para necesidades productivas</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtSaldoTCarteraCreditoParaNecesidadProductiva"  placeholder="Ingresar datos" value="<?php echo set_value('txtSaldoTCarteraCreditoParaNecesidadProductiva', @$datoDGASD[0]->SaldoTCarteraCreditoParaNecesidadProductiva);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Cartera vencida</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorTCarteraVencida"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTCarteraVencida', @$datoDGASD[0]->ValorTCarteraVencida);?>">
              </td>
              <td class="c1-c3">Endeudamiento externo (Obligaciones con Instituciones Financieras sector público, privado o del exterior)</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorTEndeudamientoExterno"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTEndeudamientoExterno', @$datoDGASD[0]->ValorTEndeudamientoExterno);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Monto de las compras a contado</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtMontoTComprasAContado"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTComprasAContado', @$datoDGASD[0]->MontoTComprasAContado);?>">
              </td>
              <td class="c1-c3">Monto de las compras a crédito</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtMontoTComprasACredito"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTComprasACredito', @$datoDGASD[0]->MontoTComprasACredito);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Monto de compras a proveedores locales</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtMontoTComprasAProveedoresLocales"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTComprasAProveedoresLocales', @$datoDGASD[0]->MontoTComprasAProveedoresLocales);?>">
              </td>
              <td class="c1-c3">Monto de compras a proveedores internacionales </td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtMontoTComprasAProveedoresInternacionales"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTComprasAProveedoresInternacionales', @$datoDGASD[0]->MontoTComprasAProveedoresInternacionales);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Compras a asociaciones</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtMontoTComprasAAsociaciones"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTComprasAAsociaciones', @$datoDGASD[0]->MontoTComprasAAsociaciones);?>">
              </td>
              <td class="c1-c3">Presupuesto para adquisiciones de operac. significativas proveedores locales</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtPresupuestoAdquisicionesDestinadasAProveedoresLocales"  placeholder="Ingresar datos" value="<?php echo set_value('txtPresupuestoAdquisicionesDestinadasAProveedoresLocales', @$datoDGASD[0]->PresupuestoAdquisicionesDestinadasAProveedoresLocales);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Total presupuesto para adquisiciones</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorTPresupuestoAdquisicion"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPresupuestoAdquisicion', @$datoDGASD[0]->ValorTPresupuestoAdquisicion);?>">
              </td>
              <td class="c1-c3">Valor por sanciones impuestos por los organismos de control</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorTSancionesPorOrganismosDeControl"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTSancionesPorOrganismosDeControl', @$datoDGASD[0]->ValorTSancionesPorOrganismosDeControl);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Valor por IVA Pagado en el periodo </td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorTPagadoPorIVA"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPagadoPorIVA', @$datoDGASD[0]->ValorTPagadoPorIVA);?>">
              </td>
              <td class="c1-c3">Total contribuciones al Estado</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorTContribucionesAlEstado"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTContribucionesAlEstado', @$datoDGASD[0]->ValorTContribucionesAlEstado);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Valor pagado por retenciones en el periodo</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorTPagadoPorRetenciones"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPagadoPorRetenciones', @$datoDGASD[0]->ValorTPagadoPorRetenciones);?>">
              </td>
              <td class="c1-c3">Valor pagado del Impuesto a la Renta en el periodo</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorTPagadoPorImpuestoALaRenta"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPagadoPorImpuestoALaRenta', @$datoDGASD[0]->ValorTPagadoPorImpuestoALaRenta);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Valor de subvenciones gubernamentales</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorTSubvencionesGubernamentales"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTSubvencionesGubernamentales', @$datoDGASD[0]->ValorTSubvencionesGubernamentales);?>">
              </td>
              <td class="c1-c3">Valor Total de Captación procedente de COAC</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorTCaptacionProcedenteCOAC"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTCaptacionProcedenteCOAC', @$datoDGASD[0]->ValorTCaptacionProcedenteCOAC);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Valor Total de Captaciones</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorTCaptaciones"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTCaptaciones', @$datoDGASD[0]->ValorTCaptaciones);?>">
              </td>            
              <td class="c1-c3">Periodo:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtPeriodo"  placeholder="Ingresar datos" value="<?php echo set_value('txtPeriodo');?>">
              </td>
            </tr>

            <tr class="tabla4col">
              <td class="c1-c3">
              <?php if (@$permisosSeccionD[0]->Actualizar ==1) { ?>
                <input type="submit" name="submit" class="botones" value="Guardar">
                <?php } ?>
              </td>
              <td class="c2-c4">        
              </td>
              <td class="c1-c3">
                <input type="reset" class="botones" value="Restaurar">
              </td>
              <td class="c2-c4">        
              </td>
            </tr>
          </tbody>
        </table>
      </form>
    <?php } ?>
    </div>

    <div class="content-5">
    <?php if ($seleccionado == 5) { ?>
      <form action="<?php echo base_url()?>datosAnuales/guardarDGASE" id="TABLABOTON5" method="POST">
        <table class="table table-striped table-bordered table-hover" width="100%" border="0" cellspacing="5px">
          <tbody>
            <input type="hidden" name="accion" value="<?php echo $accion; ?>">
            <input type="hidden" name="id" value="<?php echo @$datoDGASE[0]->IdDGASE; ?>">
            <tr class="tabla4col">
              <td class="c1-c3">Monto gastado en informar sobre Asambleas:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtMontoTGastoEnInformarSobreAsambleas"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTGastoEnInformarSobreAsambleas', @$datoDGASE[0]->MontoTGastoEnInformarSobreAsambleas);?>">
              </td>
              <td class="c1-c3">Gasto total de la organización :</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtGastoTotalDeOrganizacion"  placeholder="Ingresar datos" value="<?php echo set_value('txtGastoTotalDeOrganizacion', @$datoDGASE[0]->GastoTotalDeOrganizacion);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Monto gastado en informar sobre Consejo de Administración:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtMontoTGastoEnInformarSobreConsejoAdministracion"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTGastoEnInformarSobreConsejoAdministracion', @$datoDGASE[0]->MontoTGastoEnInformarSobreConsejoAdministracion);?>">
              </td>
              <td class="c1-c3">Monto gastado en transmisión de otra información:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtMontoTGastoEnInformarSobreOtraInformacion"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTGastoEnInformarSobreOtraInformacion', @$datoDGASE[0]->MontoTGastoEnInformarSobreOtraInformacion);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Total Activos del periodo:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorTActivos"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTActivos', @$datoDGASE[0]->ValorTActivos);?>">
              </td>
              <td class="c1-c3">Costo de comprobantes de venta y retención antes de facturación electrónica:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtCostoComprobanteVentaRetencionAntesFacturacionElectronica"  placeholder="Ingresar datos" value="<?php echo set_value('txtCostoComprobanteVentaRetencionAntesFacturacionElectronica', @$datoDGASE[0]->CostoComprobanteVentaRetencionAntesFacturacionElectronica);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Costo de adquisición de facturación electrónica despues de facturación electrónica:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtCostoComprobanteVentaRetencionDespuesFacturaElectronica"  placeholder="Ingresar datos" value="<?php echo set_value('txtCostoComprobanteVentaRetencionDespuesFacturaElectronica', @$datoDGASE[0]->CostoComprobanteVentaRetencionDespuesFacturaElectronica);?>">
              </td>
              <td class="c1-c3">Valor del combustible utilizado en el trasporte de productos y servicios:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtGastoTGasolinaEnEnvioProductosServicios"  placeholder="Ingresar datos" value="<?php echo set_value('txtGastoTGasolinaEnEnvioProductosServicios', @$datoDGASE[0]->GastoTGasolinaEnEnvioProductosServicios);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Gasto de multas por normas ambientales:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtGastoTMultasNormasAmbientales"  placeholder="Ingresar datos" value="<?php echo set_value('txtGastoTMultasNormasAmbientales', @$datoDGASE[0]->GastoTMultasNormasAmbientales);?>">
              </td>
              <td class="c1-c3">Gasto en equipamiento año actual :</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtGastoTEquipamiento"  placeholder="Ingresar datos" value="<?php echo set_value('txtGastoTEquipamiento', @$datoDGASE[0]->GastoTEquipamiento);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Gastos asignados a la eliminación residuos año actual:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtGastoTAsignadoAEliminarResiduo"  placeholder="Ingresar datos" value="<?php echo set_value('txtGastoTAsignadoAEliminarResiduo', @$datoDGASE[0]->GastoTAsignadoAEliminarResiduo);?>">
              </td>
              <td class="c1-c3">Gasto de limpieza año actual:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtGastoTLimpieza"  placeholder="Ingresar datos" value="<?php echo set_value('txtGastoTLimpieza', @$datoDGASE[0]->GastoTLimpieza);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Valor aportación del trabajador:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorTAportacionEmpleados"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTAportacionEmpleados', @$datoDGASE[0]->ValorTAportacionEmpleados);?>">
              </td>
              <td class="c1-c3">Valor de aportación del patrono:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorTAportacionPatrono"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTAportacionPatrono', @$datoDGASE[0]->ValorTAportacionPatrono);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Valor total de aportaciones en el periodo:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorTAportaciones"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTAportaciones', @$datoDGASE[0]->ValorTAportaciones);?>">
              </td>
              <td class="c1-c3">Aportes a empleados a jornada completa:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorTAportesAEmpleadosAJornadaCompleta"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTAportesAEmpleadosAJornadaCompleta', @$datoDGASE[0]->ValorTAportesAEmpleadosAJornadaCompleta);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Valor pagado a los empleados menores de un año por vacaciones no tomadas :</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorTPagadoAEmpleadosPorVacacionesNoTomadasEnMenosDeAnio"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPagadoAEmpleadosPorVacacionesNoTomadasEnMenosDeAnio', @$datoDGASE[0]->ValorTPagadoAEmpleadosPorVacacionesNoTomadasEnMenosDeAnio);?>">
              </td>
              <td class="c1-c3">Valor por vacaciones a los empleados:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorTPagadoPorVacaciones"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPagadoPorVacaciones', @$datoDGASE[0]->ValorTPagadoPorVacaciones);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Valor pagado del Décimo Tercero:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorTPagadoDecimoTercero"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPagadoDecimoTercero', @$datoDGASE[0]->ValorTPagadoDecimoTercero);?>">
              </td>
              <td class="c1-c3">Total provisionado en el periodo :</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorTProvisionAnio"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTProvisionAnio', @$datoDGASE[0]->ValorTProvisionAnio);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Valor por pagar provisión del Décimo Tercero en el periodo :</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorTPorPagarProvisionDecimoTercero"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPorPagarProvisionDecimoTercero', @$datoDGASE[0]->ValorTPorPagarProvisionDecimoTercero);?>">
              </td>
              <td class="c1-c3">Valor pagado del Décimo Cuarto en el periodo:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorTPagadoDecimoCuarto"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPagadoDecimoCuarto', @$datoDGASE[0]->ValorTPagadoDecimoCuarto);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Valor del fondo de reserva pagado mensualmente:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorTFondoReservaPagadoMensual"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTFondoReservaPagadoMensual', @$datoDGASE[0]->ValorTFondoReservaPagadoMensual);?>">
              </td>
              <td class="c1-c3">Total fondo de reserva:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorTFondoReserva"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTFondoReserva', @$datoDGASE[0]->ValorTFondoReserva);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Valor pasivos en el periodo:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorTPasivos"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPasivos', @$datoDGASE[0]->ValorTPasivos);?>">
              </td>
              <td class="c1-c3">Valor del patrimonio en el periodo actual:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorTPatrimonio"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPatrimonio', @$datoDGASE[0]->ValorTPatrimonio);?>">
              </td>
            </tr>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">capital social aportado en el periodo:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorTCapitalSocial"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTCapitalSocial', @$datoDGASE[0]->ValorTCapitalSocial);?>">
              </td>
              <td class="c1-c3">Patrimonio técnico constituido:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorTPatrimonioTecnicoConstituido"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPatrimonioTecnicoConstituido', @$datoDGASE[0]->ValorTPatrimonioTecnicoConstituido);?>">
              </td>
            </tr>
            <tr class="tabla4col">              
              <td class="c1-c3">Patrimonio técnico requerido:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorTPatrimonioTecnicoRequerido"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPatrimonioTecnicoRequerido', @$datoDGASE[0]->ValorTPatrimonioTecnicoRequerido);?>">
              </td>
              <td class="c1-c3">Utilidad del Ejercicio del periodo :</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtUtilidadTEjercicio"  placeholder="Ingresar datos" value="<?php echo set_value('txtUtilidadTEjercicio', @$datoDGASE[0]->UtilidadTEjercicio);?>">
              </td>
            </tr>
            <tr class="tabla4col">              
              <td class="c1-c3">Valor de reserva legal periodo actual:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorTReservaLegal"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTReservaLegal', @$datoDGASE[0]->ValorTReservaLegal);?>">
              </td>
              <td class="c1-c3">Total reservas:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorTReserva"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTReserva', @$datoDGASE[0]->ValorTReserva);?>">
              </td>
            </tr>
            <tr class="tabla4col">              
              <td class="c1-c3">Activo corriente:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorTActivosCorriente"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTActivosCorriente', @$datoDGASE[0]->ValorTActivosCorriente);?>">
              </td>
              <td class="c1-c3">Pasivo corriente:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorTPasivosCorriente"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPasivosCorriente', @$datoDGASE[0]->ValorTPasivosCorriente);?>">
              </td>
            </tr>
            <tr class="tabla4col">              
              <td class="c1-c3">Valor atribuido al estado por organismos de control sobre sanciones y multas en el periodo:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorTAtribuidoAlEstadoPorOrganismosDeControl"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTAtribuidoAlEstadoPorOrganismosDeControl', @$datoDGASE[0]->ValorTAtribuidoAlEstadoPorOrganismosDeControl);?>">
              </td>
              <td class="c1-c3">Periodo:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtPeriodo"  placeholder="Ingresar datos" value="<?php echo set_value('txtPeriodo', @$datoDGASE[0]->Periodo);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">
                <input type="submit" name="submit" class="botones" value="Guardar">
              </td>
              <td class="c2-c4">        
              </td>
              <td class="c1-c3">
                <input type="reset" class="botones" value="Restaurar">
              </td>
              <td class="c2-c4">        
              </td>
            </tr>
          </tbody>
        </table>
      </form>
    <?php } ?>
    </div>

    <div class="content-6">
    <?php if ($seleccionado == 6) { ?>
      <form action="<?php echo base_url()?>datosAnuales/guardarDGASF" id="TABLABOTON6" method="POST">
        <table class="table table-striped table-bordered table-hover" width="100%" border="0" cellspacing="5px">
          <tbody>
            <input type="hidden" name="accion" value="<?php echo $accion; ?>">
            <input type="hidden" name="id" value="<?php echo @$datoDGASF[0]->IdDGASF; ?>">
            <tr class="tabla4col">
              <td class="c1-c3">Valor de créditos otorgados a socios con depósitos inferiores al 20%</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorCreditoASociosConDepositoMenorA20Porciento"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorCreditoASociosConDepositoMenorA20Porciento', @$datoDGASF[0]->ValorCreditoASociosConDepositoMenorA20Porciento);?>">
              </td>
              <td class="c1-c3">Valor de créditos otorgados a socios con aportes inferiores a la media</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorCreditoASociosConAporteMenorALaMedia"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorCreditoASociosConAporteMenorALaMedia', @$datoDGASF[0]->ValorCreditoASociosConAporteMenorALaMedia);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Valor de créditos a socios que poseen el mínimo de capital exigido</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorCreditoASociosConMinCapitalExigido"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorCreditoASociosConMinCapitalExigido', @$datoDGASF[0]->ValorCreditoASociosConMinCapitalExigido);?>">
              </td>
              <td class="c1-c3">Monto promedio de créditos de consumo concedidos por primera vez periodo actual</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtMontoPromedioCreditoConsumoConcedidoPrimeraVez"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoPromedioCreditoConsumoConcedidoPrimeraVez', @$datoDGASF[0]->MontoPromedioCreditoConsumoConcedidoPrimeraVez);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Monto promedio de créditos de vivienda a socios nuevos concedido por primera vez en el periodo</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtMontoPromedioCreditoViviendaConcedidoPrimeraVez"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoPromedioCreditoViviendaConcedidoPrimeraVez', @$datoDGASF[0]->MontoPromedioCreditoViviendaConcedidoPrimeraVez);?>">
              </td>
              <td class="c1-c3">Monto promedio de microcréditos a socios nuevos cencedidos por primera vez en el periodo</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtMontoPromedioMicrocreditoASociosNuevosPrimeraVez"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoPromedioMicrocreditoASociosNuevosPrimeraVez', @$datoDGASF[0]->MontoPromedioMicrocreditoASociosNuevosPrimeraVez);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Monto promedio de créditos de comercio a socios nuevos concedidos por primera vez en el periodo</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtMontoPromedioCreditoComercioASociosNuevosPrimeraVez"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoPromedioCreditoComercioASociosNuevosPrimeraVez', @$datoDGASF[0]->MontoPromedioCreditoComercioASociosNuevosPrimeraVez);?>">
              </td>
              <td class="c1-c3">Monto promedio de créditos vinculadosen el periodo</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtMontoPromedioCreditosVinculados"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoPromedioCreditosVinculados', @$datoDGASF[0]->MontoPromedioCreditosVinculados);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Monto de certificados de aportación poseídos por el socio mayoritario</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtMontoCertificadosAportacionPoseidosPorSocioMayoritario"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoCertificadosAportacionPoseidosPorSocioMayoritario', @$datoDGASF[0]->MontoCertificadosAportacionPoseidosPorSocioMayoritario);?>">
              </td>
              <td class="c1-c3">Monto de certificados de aportación poseídos por el socio minoristas</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtMontoCertificadosAportacionPoseidosPorSocioMinorista"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoCertificadosAportacionPoseidosPorSocioMinorista', @$datoDGASF[0]->MontoCertificadosAportacionPoseidosPorSocioMinorista);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Tasa media de interés sobre los certificados de aportación</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtTasaMediaInteresSobreCertificadosDeAportacion"  placeholder="Ingresar datos" value="<?php echo set_value('txtTasaMediaInteresSobreCertificadosDeAportacion', @$datoDGASF[0]->TasaMediaInteresSobreCertificadosDeAportacion);?>">
              </td>
              <td class="c1-c3">Valor agregado cooperativo distribuido a trabajadores</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorAgregadoCooperativoDistribuidoATrabajadores"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorAgregadoCooperativoDistribuidoATrabajadores', @$datoDGASF[0]->ValorAgregadoCooperativoDistribuidoATrabajadores);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Prestaciones personales</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorPrestacionesPersonales"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorPrestacionesPersonales', @$datoDGASF[0]->ValorPrestacionesPersonales);?>">
              </td>
              <td class="c1-c3">Prestaciones colectivas</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorPrestacionesColectivas"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorPrestacionesColectivas', @$datoDGASF[0]->ValorPrestacionesColectivas);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Gasto de formación para trabajadores</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtGastoEnFormacionATrabajadores"  placeholder="Ingresar datos" value="<?php echo set_value('txtGastoEnFormacionATrabajadores', @$datoDGASF[0]->GastoEnFormacionATrabajadores);?>">
              </td>
              <td class="c1-c3">Valor por becas, ayudas, servicios</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorBecasAyudasServicios"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorBecasAyudasServicios', @$datoDGASF[0]->ValorBecasAyudasServicios);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Impuesto y tasa varias</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorImpuestoYTasaVarias"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorImpuestoYTasaVarias', @$datoDGASF[0]->ValorImpuestoYTasaVarias);?>">
              </td>
              <td class="c1-c3">Donación del fondo de Educación a la comunidad</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorDonacionFondoEducacion"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorDonacionFondoEducacion', @$datoDGASF[0]->ValorDonacionFondoEducacion);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Fondo de Solidariadad</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorFondoDeSolidaridad"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorFondoDeSolidaridad', @$datoDGASF[0]->ValorFondoDeSolidaridad);?>">
              </td>
              <td class="c1-c3">Donativos a la comunidad</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorDonativosAComunidad"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorDonativosAComunidad', @$datoDGASF[0]->ValorDonativosAComunidad);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Excedente Bruto</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorExcedenteBruto"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorExcedenteBruto', @$datoDGASF[0]->ValorExcedenteBruto);?>">
              </td>
              <td class="c1-c3">Impuestos sobre excedentes</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorImpuestosSobreExcedentes"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorImpuestosSobreExcedentes', @$datoDGASF[0]->ValorImpuestosSobreExcedentes);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Dotación del fondo de Educación a los Socios</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorDotacionDeFondoEducacion"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorDotacionDeFondoEducacion', @$datoDGASF[0]->ValorDotacionDeFondoEducacion);?>">
              </td>
              <td class="c1-c3">Fondo de Reserva Irrepartibles</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorFondoDeReservaIrrepartibles"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorFondoDeReservaIrrepartibles', @$datoDGASF[0]->ValorFondoDeReservaIrrepartibles);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Fondo de Reserva Repartibles</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorFondoDeReservaRepartibles"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorFondoDeReservaRepartibles', @$datoDGASF[0]->ValorFondoDeReservaRepartibles);?>">
              </td>
              <td class="c1-c3">Precio pagado a los asociados por compra de materias</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtPrecioPagadoAAsociadosPorCompraDeMaterial"  placeholder="Ingresar datos" value="<?php echo set_value('txtPrecioPagadoAAsociadosPorCompraDeMaterial', @$datoDGASF[0]->PrecioPagadoAAsociadosPorCompraDeMaterial);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Descuento realizado a socios en ventas a productores</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtDescuentoRealizadoASociosEnVentasAProductores"  placeholder="Ingresar datos" value="<?php echo set_value('txtDescuentoRealizadoASociosEnVentasAProductores', @$datoDGASF[0]->DescuentoRealizadoASociosEnVentasAProductores);?>">
              </td>
              <td class="c1-c3">Gastos por servicos voluntarios gratuitos a socios</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtGastosPorServiciosVoluntariosGratuitosASocios"  placeholder="Ingresar datos" value="<?php echo set_value('txtGastosPorServiciosVoluntariosGratuitosASocios', @$datoDGASF[0]->GastosPorServiciosVoluntariosGratuitosASocios);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Dotación Fondo de Reservas  Irrepartibles</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorDotacionFondoDeReservaIrrepartibles"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorDotacionFondoDeReservaIrrepartibles', @$datoDGASF[0]->ValorDotacionFondoDeReservaIrrepartibles);?>">
              </td>
              <td class="c1-c3">Otras Reservas</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorOtrasReservas"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorOtrasReservas', @$datoDGASF[0]->ValorOtrasReservas);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Total depósitos realizados</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtSaldoTDepositos"  placeholder="Ingresar datos" value="<?php echo set_value('txtSaldoTDepositos', @$datoDGASF[0]->SaldoTDepositos);?>">
              </td>
              <td class="c1-c3">Total comprobantes físicos emitidos</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTComprobantesFisicosEmitidos"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTComprobantesFisicosEmitidos', @$datoDGASF[0]->NumTComprobantesFisicosEmitidos);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Gasto total multas </td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtGastoTMultas"  placeholder="Ingresar datos" value="<?php echo set_value('txtGastoTMultas', @$datoDGASF[0]->GastoTMultas);?>">
              </td>
              <td class="c1-c3">Valor Beneficios de ley</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorTBeneficiosDeLey"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTBeneficiosDeLey', @$datoDGASF[0]->ValorTBeneficiosDeLey);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Número de limpiezas realizadas por día</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTLimpiezasPorDia"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTLimpiezasPorDia', @$datoDGASF[0]->NumTLimpiezasPorDia);?>">
              </td>
              <td class="c1-c3">Número de limpiezas programadas por día</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTLimpiezasProgramadasPorDia"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTLimpiezasProgramadasPorDia', @$datoDGASF[0]->NumTLimpiezasProgramadasPorDia);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Empleados que no gozaron de las vacaciones</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTEmpeladosQueNoGozaronVacaciones"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpeladosQueNoGozaronVacaciones', @$datoDGASF[0]->NumTEmpeladosQueNoGozaronVacaciones);?>">
              </td>
              <td class="c1-c3">Provisión Décimo Cuarto</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorTPorPagarProvisionDecimoCuarto"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPorPagarProvisionDecimoCuarto', @$datoDGASF[0]->ValorTPorPagarProvisionDecimoCuarto);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Numero de accidentes </td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTAccidentes5Anios"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTAccidentes5Anios', @$datoDGASF[0]->NumTAccidentes5Anios);?>">
              </td>
              <td class="c1-c3">Empleados evaluados en el desempeño profesional </td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtNumTEmpleadosEvaluadosDesempenioProfesional"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadosEvaluadosDesempenioProfesional', @$datoDGASF[0]->NumTEmpleadosEvaluadosDesempenioProfesional);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Valor aportación capital social </td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorTAportacionesCapitalSocial"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTAportacionesCapitalSocial', @$datoDGASF[0]->ValorTAportacionesCapitalSocial);?>">
              </td>
              <td class="c1-c3">Tasa pasiva captacion del público </td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtTasaPasivaCaptacionDelPublicoPonderada"  placeholder="Ingresar datos" value="<?php echo set_value('txtTasaPasivaCaptacionDelPublicoPonderada', @$datoDGASF[0]->TasaPasivaCaptacionDelPublicoPonderada);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Monto total compras </td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtMontoTCompras"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTCompras', @$datoDGASF[0]->MontoTCompras);?>">
              </td>
              <td class="c1-c3">Valro agregado cooperativo distribuido a la comunidad</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorAgregadoCooperativoDistribuidoAComunidad"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorAgregadoCooperativoDistribuidoAComunidad', @$datoDGASF[0]->ValorAgregadoCooperativoDistribuidoAComunidad);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Valor agregado cooperativo distribuido a socios </td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorAgregadoCooperativoDistribuidoASocios"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorAgregadoCooperativoDistribuidoASocios', @$datoDGASF[0]->ValorAgregadoCooperativoDistribuidoASocios);?>">
              </td>
              <td class="c1-c3">Valor agregado cooperativo incorporado a Patrimonio común</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorAgregadoCooperativoIncorporadoAPatrimonioComun"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorAgregadoCooperativoIncorporadoAPatrimonioComun', @$datoDGASF[0]->ValorAgregadoCooperativoIncorporadoAPatrimonioComun);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Compras a entidades reconocidas como de comercio justo </td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorComprasRealizadasAEntidadesReconocidasComoDeComercioJusto"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorComprasRealizadasAEntidadesReconocidasComoDeComercioJusto', @$datoDGASF[0]->ValorComprasRealizadasAEntidadesReconocidasComoDeComercioJusto);?>">
              </td>
              <td class="c1-c3">Ventas a entidades reconocidas como de comercio justo</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorVentasRealizadasAEntidadesReconocidasComoComercioJusto"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorVentasRealizadasAEntidadesReconocidasComoComercioJusto', @$datoDGASF[0]->ValorVentasRealizadasAEntidadesReconocidasComoComercioJusto);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Valor depósitos procedentes de entidades como de comercio justo </td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorDepositosProcedenteDeEntidadesReconocidasComoComercioJusto"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorDepositosProcedenteDeEntidadesReconocidasComoComercioJusto', @$datoDGASF[0]->ValorDepositosProcedenteDeEntidadesReconocidasComoComercioJusto);?>">
              </td>
              <td class="c1-c3">Valor créditos otorgados a entidades reconocidas como comercio justo</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorCreditosOtorgadosAEntidadesReconocidasComoComercioJusto"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorCreditosOtorgadosAEntidadesReconocidasComoComercioJusto', @$datoDGASF[0]->ValorCreditosOtorgadosAEntidadesReconocidasComoComercioJusto);?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Valor aportes (capital social) ingresados en el año </td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtValorTAportesIngresados"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTAportesIngresados', @$datoDGASF[0]->ValorTAportesIngresados);?>">
              </td>
              <td class="c1-c3">Periodo:</td>
              <td class="c2-c4">
                <input class="form-control" type="text" name="txtPeriodo"  placeholder="Ingresar datos" value="<?php echo set_value('txtPeriodo');?>">
              </td>
            </tr>

            <tr class="tabla4col">
              <td class="c1-c3">
              <?php if (@$permisosSeccionF[0]->Actualizar ==1) { ?>
                <input type="submit" name="submit" class="botones" value="Guardar">
                <?php } ?>
              </td>
              <td class="c2-c4">        
              </td>
              <td class="c1-c3">
                <input type="reset" class="botones" value="Restaurar">
              </td>
              <td class="c2-c4">        
              </td>
            </tr>

          </tbody>
        </table>
      </form>
    <?php } ?>
    </div>

  </div> <!--final div content-->
</div> <!--final div contenedor-->
