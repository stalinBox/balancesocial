<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/jquery.js"></script>
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
<?php
/*
  echo "Permisos Sección A ";
  echo @$permisosSeccionA[0]->Ver;
  echo @$permisosSeccionA[0]->Agregar;
  echo @$permisosSeccionA[0]->Actualizar;
  echo @$permisosSeccionA[0]->Eliminar;
  echo "<br>";
  echo "Permisos Sección B ";
  echo @$permisosSeccionB[0]->Ver;
  echo @$permisosSeccionB[0]->Agregar;
  echo @$permisosSeccionB[0]->Actualizar;
  echo @$permisosSeccionB[0]->Eliminar;
  echo "<br>";
  echo "Permisos Sección C ";
  echo @$permisosSeccionC[0]->Ver;
  echo @$permisosSeccionC[0]->Agregar;
  echo @$permisosSeccionC[0]->Actualizar;
  echo @$permisosSeccionC[0]->Eliminar;
  echo "<br>";
  echo "Permisos Sección D ";
  echo @$permisosSeccionD[0]->Ver;
  echo @$permisosSeccionD[0]->Agregar;
  echo @$permisosSeccionD[0]->Actualizar;
  echo @$permisosSeccionD[0]->Eliminar;
  echo "<br>";
  echo "Permisos Sección E ";
  echo @$permisosSeccionE[0]->Ver;
  echo @$permisosSeccionE[0]->Agregar;
  echo @$permisosSeccionE[0]->Actualizar;
  echo @$permisosSeccionE[0]->Eliminar;
  echo "<br>";
  echo "Permisos Sección F ";
  echo @$permisosSeccionF[0]->Ver;
  echo @$permisosSeccionF[0]->Agregar;
  echo @$permisosSeccionF[0]->Actualizar;
  echo @$permisosSeccionF[0]->Eliminar
*/
;?>
<div id="contenedor">
  <input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" <?php if ($seleccionado == 1){echo 'checked="checked"';} ?> />
  <label for="tab-1" class="tab-label-1"<?php if (@$permisosSeccionA[0]->Agregar == 0 ) { echo 'onclick="denegado()"'; } ?>>Sección A</label>

  <input id="tab-2" type="radio" name="radio-set" class="tab-selector-2" <?php if ($seleccionado == 2){echo 'checked="checked"';} ?>/>
  <label for="tab-2" class="tab-label-2"<?php if (@$permisosSeccionB[0]->Agregar == 0 ) { echo 'onclick="denegado()"'; } ?>>Sección B</label>

  <input id="tab-3" type="radio" name="radio-set" class="tab-selector-3" <?php if ($seleccionado == 3){echo 'checked="checked"';} ?>/>
  <label for="tab-3" class="tab-label-3"<?php if (@$permisosSeccionC[0]->Agregar == 0 ) { echo 'onclick="denegado()"'; } ?>>Sección C</label>

  <input id="tab-4" type="radio" name="radio-set" class="tab-selector-4" <?php if ($seleccionado == 4){echo 'checked="checked"';} ?>/>
  <label for="tab-4" class="tab-label-4"<?php if (@$permisosSeccionD[0]->Agregar == 0 ) { echo 'onclick="denegado()"'; } ?>>Sección D</label>

  <input id="tab-5" type="radio" name="radio-set" class="tab-selector-5" <?php if ($seleccionado == 5){echo 'checked="checked"';} ?>/>
  <label for="tab-5" class="tab-label-5"<?php if (@$permisosSeccionE[0]->Agregar == 0 ) { echo 'onclick="denegado()"'; } ?>>Sección E</label>

  <input id="tab-6" type="radio" name="radio-set" class="tab-selector-6" <?php if ($seleccionado == 6){echo 'checked="checked"';} ?>/>
  <label for="tab-6" class="tab-label-6"<?php if (@$permisosSeccionF[0]->Agregar == 0 ) { echo 'onclick="denegado()"'; } ?>>Sección F</label>

  <div class="content">

    <div class="content-1" name="cont1">
    <?php if (@$permisosSeccionA[0]->Agregar == 1 ) { ?>
      <form action="<?php echo base_url()?>datosAnuales/guardarDGASA" id="TABLABOTON1" method="POST">
        <table width="100%" border="0" cellspacing="5px">
          <tbody>
            <input type="hidden" name="accion" value="<?php echo $accion; ?>">
            <input type="hidden" name="id" value="<?php echo @$datoDGASA[0]->IdDGASA; ?>">

            <tr class="tabla4col">
              <td class="c1-c3">Porcentaje de Discapacidad:</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtPorcentajeDiscapacidad"  placeholder="Ingresar datos" value="<?php echo set_value('txtPorcentajeDiscapacidad');?>">
              </td>
              <td class="c1-c3">PIB Percapita:</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtPIBPercapita"  placeholder="Ingresar datos" value="<?php echo set_value('txtPIBPercapita');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Inflación Mensual:</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtInflacionMensual"  placeholder="Ingresar datos" value="<?php echo set_value('txtInflacionMensual');?>">
              </td>
              <td class="c1-c3">Inflación Anual:</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtInflacionAnualizada"  placeholder="Ingresar datos" value="<?php echo set_value('txtInflacionAnualizada');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Salario Básico:</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtValorSalarioMinimoMensual"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorSalarioMinimoMensual');?>">
              </td>
              <td class="c1-c3">Número de Días Laborables:</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtNumTDiasLaborados"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTDiasLaborados');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Ingresar el valor cuota mínima para apertura de cuenta:</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtValMinAperturaCuenta"  placeholder="Ingresar datos" value="<?php echo set_value('txtValMinAperturaCuenta');?>">
              </td>
              <td class="c1-c3">TEA Máxima por el BCE:</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtTEAMaximaBCE"  placeholder="Ingresar datos" value="<?php echo set_value('txtTEAMaximaBCE');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">TEA Máxima por el Cooperativa:</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtTEAMaximaCooperativa"  placeholder="Ingresar datos" value="<?php echo set_value('txtTEAMaximaCooperativa');?>">
              </td>
              <td class="c1-c3">Dias de descanso forzoso:</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtNumTDiasDescansoForzoso"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTDiasDescansoForzoso');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Número de baterías sanitarias establecidas por normativa:</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtNumTBateriasSanitariasPorNormativa"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTBateriasSanitariasPorNormativa');?>">
              </td>
              <td class="c1-c3">Número de empleados que cubre el número de baterías:</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtNumEmpleadosQueCubreLasBaterias"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumEmpleadosQueCubreLasBaterias');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Cantidad de días de descanso forzoso laborados por los empleados:</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtNumTDiasDescansoForzosoLaborados"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTDiasDescansoForzosoLaborados');?>">
              </td>
              <td class="c1-c3">Total de horas trabajadas en el año:</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtNumTHorasTrabajadas"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTHorasTrabajadas');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Promedio de cuentas por cobrar:</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtPromedioCuentasPorCobrar"  placeholder="Ingresar datos" value="<?php echo set_value('txtPromedioCuentasPorCobrar');?>">
              </td>
              <td class="c1-c3">Número de proveedores  que trabajan con la organización:</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtNumTProveedoresTrabajanOrganizacion"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTProveedoresTrabajanOrganizacion');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Número de empleados nuevos generados para socios:</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtNumTEmpleadosGeneradosParaSocios"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadosGeneradosParaSocios');?>">
              </td>
              <td class="c1-c3">Número de políticas de contratación de personal :</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtNumTPoliticasDeCotratacionDePersonal"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTPoliticasDeCotratacionDePersonal');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Número de contrataciones en función de la CV:</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtNumTContratosEnFuncionDeCV"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTContratosEnFuncionDeCV');?>">
              </td>
              <td class="c1-c3">Número de socios que están dentro del programa seguros exequia:</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtNumtSociosEnProgramaDeSeguroExequial"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumtSociosEnProgramaDeSeguroExequial');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Número de empleados y socios que aportan al fondo de cesantía:</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtNumTSociosAportanAlFondoDeCesantia"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTSociosAportanAlFondoDeCesantia');?>">
              </td>
              <td class="c1-c3">Número de empleados y socios que aportan al fondo mortuorio:</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtNumTSociosAportanAlFondoMortuorio"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTSociosAportanAlFondoMortuorio');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Número de empleados y socios que aportan al fondo de empleados o cooperativos:</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtNumTSociosAportanAlFondoDeEmpleadosOCooperativa"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTSociosAportanAlFondoDeEmpleadosOCooperativa');?>">
              </td>
              <td class="c1-c3">Número de empleados o socios que aportan al fondo de accidentes o calamidades:</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtNumTSociosAportanAlFondoDeAccidenteOCalamidades"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTSociosAportanAlFondoDeAccidenteOCalamidades');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Número de practicantes establecidos mediante política:</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtNumTPracticantesRequeridos"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTPracticantesRequeridos');?>">
              </td>
              <td class="c1-c3">Número total de representantes empadronados:</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtNumTRepresentantesEmpadronados"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTRepresentantesEmpadronados');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Energía renovable utilizada (kwh):</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtCantTKwhEnergiaUtilizadaRenovable"  placeholder="Ingresar datos" value="<?php echo set_value('txtCantTKwhEnergiaUtilizadaRenovable');?>">
              </td>
              <td class="c1-c3">Energia renovable y no renovable (kwh):</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtCantTKwhEnergiaRenovableNoRenovable"  placeholder="Ingresar datos" value="<?php echo set_value('txtCantTKwhEnergiaRenovableNoRenovable');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Cantidad de agua reutilizada o reciclada (m3):</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtCantTm3Reutilizada"  placeholder="Ingresar datos" value="<?php echo set_value('txtCantTm3Reutilizada');?>">
              </td>
              <td class="c1-c3">Sumatoria de accidentes últimos 5 años:</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtNumTAccidentes5Anios"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTAccidentes5Anios');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Periodo:</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtPeriodo"  placeholder="Ingresar datos" value="<?php echo set_value('txtPeriodo');?>">
              </td>
              <td class="c1-c3"></td>
              <td class="c2-c4">
                
              </td>
            </tr>

            <tr class="tabla4col">
              <td class="c1-c3">
              <?php /* if ((@$permisosSeccionA[0]->Agregar == 1 ) && @$accion == "Nuevo"){echo '<input type="submit" name="submit" class="botones" value="Guardar">'; }elseif ((@$permisosSeccionA[0]->Actualizar ==1 ) && @$accion == "Editar") { echo '<input type="submit" name="submit" class="botones" value="Guardar">'; } */ ?>
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

    <div class="content-2">
    <?php  if (@$permisosSeccionB[0]->Agregar == 1 ) { ?>
      <form action="<?php echo base_url()?>datosAnuales/guardarDGASB" id="TABLABOTON2" method="POST">
        <table width="100%" bo10der="0" cellspacing="5px">
          <tbody>
            <input type="hidden" name="accion" value="<?php echo $accion; ?>">
            <input type="hidden" name="id" value="<?php echo @$datoDGASB[0]->IdDGASB; ?>">
            <tr class="tabla4col">
              <td class="c1-c3">Número de socios que sumados represente el 50% o más del total de depósitos:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTSocios50PorcientoOMasTotalDeDepositos"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTSocios50PorcientoOMasTotalDeDepositos');?>">
              </td>
              <td class="c1-c3">Número de Sugerencias constructivas:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTSugerenciasConstructivas"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTSugerenciasConstructivas');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Total sugerencias revisadas en el buzón de sugerencias:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTSugerenciasRevisadas"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTSugerenciasRevisadas');?>">
              </td>
              <td class="c1-c3">Cantidad de productos y servicios entregados a tiempo a los clientes:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTProductosServiciosEntregadosATiempoAClientes"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTProductosServiciosEntregadosATiempoAClientes');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Número de eventos que mantiene con otras COAC:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTEventosMantieneConOtrasCOAC"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEventosMantieneConOtrasCOAC');?>">
              </td>
              <td class="c1-c3">Número de beneficios dirigidos a socios en el ámbito distintos a servicios financieros:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTBeneficiosNoFinancierosASocios"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTBeneficiosNoFinancierosASocios');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Número socios participantes en elecciones:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTSociosParticipanEnElecciones"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTSociosParticipanEnElecciones');?>">
              </td>
              <td class="c1-c3">Empleados que gozaron  de las vacaciones:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTEmpeladosQueGozaronVacaciones"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpeladosQueGozaronVacaciones');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Número de empleados a los que se entrego equipos de protección:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTEmpleadosRecibenEquipoDeProteccion"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadosRecibenEquipoDeProteccion');?>">
              </td>
              <td class="c1-c3">Número de empleados que utilizan los equipos de protección:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTEmpleadosQueUsanEquiposDeProteccion"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadosQueUsanEquiposDeProteccion');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Empleados que deberían utilizar los  equipos de protección:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTEmpleadosQueDebemUsarEquiposDeProteccion"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadosQueDebemUsarEquiposDeProteccion');?>">
              </td>
              <td class="c1-c3">Número de evaluaciones efectuadas utilización de equipos de protección:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTEvaluacionesAUtilizacionDeEquiDeProteccionEjecutadas"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEvaluacionesAUtilizacionDeEquiDeProteccionEjecutadas');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Evaluaciones programadas en la utilización de equipos de protección:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTEvaluacionesAUtilizacionDeEquiDeProteccionProgramadas"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEvaluacionesAUtilizacionDeEquiDeProteccionProgramadas');?>">
              </td>
              <td class="c1-c3">Cantidad de mantenimientos realizados a la infraestructura:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTMantenimientosAInfraestructuraEjecutados"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTMantenimientosAInfraestructuraEjecutados');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Número de Mantenimientos de Infraestructura requeridos :</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTMantenimientosAInfraestructuraRequeridos"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTMantenimientosAInfraestructuraRequeridos');?>">
              </td>
              <td class="c1-c3">Número de oficinas en comunidades que no existe otras instituciones de servicio financiero:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTPuntosEnComunidadesSinOtrasInstitucionesFinancieras"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTPuntosEnComunidadesSinOtrasInstitucionesFinancieras');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Total puntos de atención:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTPuntosDeAtencion"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTPuntosDeAtencion');?>">
              </td>
              <td class="c1-c3">Puntos de atención que brinda acceso a personas con discapacidad:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTOficinasConAccesoADiscapacitados"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTOficinasConAccesoADiscapacitados');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Número de participaciones en la posición de políticas públicas y actividades de lobbying:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTParticipacionesLobbying"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTParticipacionesLobbying');?>">
              </td>
              <td class="c1-c3">Asuntos acordados no respetados por los directivos:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTAsuntosAcordadosNoRespetadosPorDirectivos"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTAsuntosAcordadosNoRespetadosPorDirectivos');?>">
              </td>
            </tr>
            <tr class="tabla4col">                    
              <td class="c1-c3">Total de asuntos acordados en los convenios sindicales:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTAsuntosAcordadosEnConveniosSindicales"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTAsuntosAcordadosEnConveniosSindicales');?>">
              </td>
              <td class="c1-c3">Asuntos acordados con los directivos no respetados por los trabajadores:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTAsuntosAcordadosNoRespetadosPorEmpleados"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTAsuntosAcordadosNoRespetadosPorEmpleados');?>">
              </td>
            </tr>
            <tr class="tabla4col">                    
              <td class="c1-c3">Número de créditos vigentes otorgados a mujeres:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTCreditosVigentesAMujeres"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTCreditosVigentesAMujeres');?>">
              </td>
              <td class="c1-c3">Total cartera de crédito mujeres:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtValorTCarteraCreditoMujeres"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTCarteraCreditoMujeres', @$datoDGASB[0]->ValorTCarteraCreditoMujeres);?>">
              </td>
            </tr>
            <tr class="tabla4col">                    
              <td class="c1-c3">Número de operaciones de créditos con montos <=al 30% del PIB per cápita:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTOperacionesDeCreditosConMontoMenorA30PorcientoPIB"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTOperacionesDeCreditosConMontoMenorA30PorcientoPIB');?>">
              </td>
              <td class="c1-c3">Número Total de operaciones de crédito vigentes:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTOperacionesDeCreditoVigentes"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTOperacionesDeCreditoVigentes');?>">
              </td>
            </tr>
            <tr class="tabla4col">                    
              <td class="c1-c3">Número de operaciones de créditos  con cuotas vigentes <= 1% del PIB Per capita:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTOperacionesCreditoConCuotasVigentesMenosA1PorcientoPIB"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTOperacionesCreditoConCuotasVigentesMenosA1PorcientoPIB');?>">
              </td>
              <td class="c1-c3">Número de pedidos entregados a tiempo:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTPedidosEntregadosATiempo"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTPedidosEntregadosATiempo');?>">
              </td>
            </tr> 
            <tr class="tabla4col">                    
              <td class="c1-c3">Total pedidos entregados:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTPedidosEntregados"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTPedidosEntregados');?>">
              </td>
              <td class="c1-c3">Número de productos y servicios que se adquiere en el ámbito local:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTProductosYServiciosAdquiereLocalmente"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTProductosYServiciosAdquiereLocalmente');?>">
              </td>
            </tr>
            <tr class="tabla4col">                    
              <td class="c1-c3">Total productos y servicios:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTProductosYServicios"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTProductosYServicios');?>">
              </td>
              <td class="c1-c3">Número de Certificaciones requeridas en el POA:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTCertificacionesRequeridasEnElPOA"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTCertificacionesRequeridasEnElPOA');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Periodo:</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtPeriodo"  placeholder="Ingresar datos" value="<?php echo set_value('txtPeriodo');?>">
              </td>
              <td class="c1-c3"></td>
              <td class="c2-c4">
                
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

    <div class="content-3">
    <?php if (@$permisosSeccionC[0]->Agregar == 1 ) { ?>
      <form action="<?php echo base_url()?>datosAnuales/guardarDGASC" id="TABLABOTON3" method="POST">
        <table width="100%" border="0" cellspacing="5px">
          <tbody>
            <input type="hidden" name="accion" value="<?php echo $accion; ?>">
            <input type="hidden" name="id" value="<?php echo @$datoDGASC[0]->IdDGASC; ?>">
            <tr class="tabla4col">
              <td class="c1-c3">Número de Demandas administrativas atendidas</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTDemandasAdministrativasAtendidas"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTDemandasAdministrativasAtendidas');?>">
              </td>
              <td class="c1-c3">Total de demandas Administrativas</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTDemandasAdministrativas"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTDemandasAdministrativas');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Total de productos y servicios entregados a los clientes</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTProductosServiciosEntregadosAClientes"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTProductosServiciosEntregadosAClientes');?>">
              </td>
              <td class="c1-c3">Número de denuncias por aspectos poco éticos resueltas</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTDenunciasAspectosNoEticosResueltos"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTDenunciasAspectosNoEticosResueltos');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Total de denuncias por aspectos no éticos</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTDenunciasAspectosNoEticos"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTDenunciasAspectosNoEticos');?>">
              </td>
              <td class="c1-c3">Total casos de discriminación</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTCasosDiscriminacion"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTCasosDiscriminacion');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Número de casos de discriminación ocurridos durante el perido resueltos</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTCasosDiscriminacionResueltos"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTCasosDiscriminacionResueltos');?>">
              </td>
              <td class="c1-c3">Número de procesos con riesgo de efectos de corrupción analizados</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTProcesosConRiesgosDeCorrupcionAnalizados"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTProcesosConRiesgosDeCorrupcionAnalizados');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Total de procesos con riesgo de corrupción identificados</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTProcesosConRiesgosDeCorrupcionIdentificados"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTProcesosConRiesgosDeCorrupcionIdentificados');?>">
              </td>
              <td class="c1-c3">Número de medidas tomadas en respuesta de corrupción</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTMedidasAnteIncidentesDeCorrupcion"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTMedidasAnteIncidentesDeCorrupcion');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Número total de incidentes de corrupción ocurridos</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTIncidentesDeCorrupcionOcurridos"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTIncidentesDeCorrupcionOcurridos');?>">
              </td>
              <td class="c1-c3">Dias destinados a la educación familiar en el año</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTDiasDestinadosAEducacionFamiliar"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTDiasDestinadosAEducacionFamiliar');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Número de transacciones realizadas en el periodo</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTTransacciones"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTTransacciones');?>">
              </td>
              <td class="c1-c3">Número de programas o iniciativas de reciclaje </td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTProgramasDeReciclaje"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTProgramasDeReciclaje');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Total de comprobantes Emitidos</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTComprobantesEmitidos"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTComprobantesEmitidos');?>">
              </td>
              <td class="c1-c3">Comprobantes electronicos</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTComprobantesElectronicosEmitidos"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTComprobantesElectronicosEmitidos');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Número de baterias sanitarias por departamento</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTBateriasSanitarias"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTBateriasSanitarias');?>">
              </td>
              <td class="c1-c3">Número de beneficios sociales adicionales que reciben los colaboradores con otro tipo de contrato o relación laboral</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTBeneficiosAdicionalesAEmpleadosConContratoNoIndefinido"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTBeneficiosAdicionalesAEmpleadosConContratoNoIndefinido');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Número de beneficios sociales adicionales que reciben colaboradores con contrato indefinido</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTBeneficiosAdicionalesAEmpleadosConContratoIndefinido"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTBeneficiosAdicionalesAEmpleadosConContratoIndefinido');?>">
              </td>
              <td class="c1-c3">Trabajadores laboran más de un año</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTEmpleadosLaboranMasDeAnio"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadosLaboranMasDeAnio');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Número de Mujeres embarazadas</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTEmpleadasEmbarazadas"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadasEmbarazadas');?>">
              </td>
              <td class="c1-c3">Hombres con permiso de paternidad </td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTEmpleadosConPermisoPaternidad"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadosConPermisoPaternidad');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Mujeres reincorporadas después permiso maternidad</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTEmpleadasReincorporadasPorMaternidad"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadasReincorporadasPorMaternidad');?>">
              </td>
              <td class="c1-c3">Mujeres con permiso de maternidad</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTEmpleadasConPermisoMaternidad"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadasConPermisoMaternidad');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Hombres reincorporados después permiso paternidad</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTEmpleadosReincorporadosPorPaternidad"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadosReincorporadosPorPaternidad');?>">
              </td>
              <td class="c1-c3">Empleados reincorporados por un tiempo mayor al establecido  en caso de permiso de partenidad</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTEmpleadosReincorporadosFueraDeTiempoEstablecido"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadosReincorporadosFueraDeTiempoEstablecido');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Total de empleados reincorporados en el tiempo establecido en caso de permiso de paternidad</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTEmpleadosReincorporadosATiempoEstablecido"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadosReincorporadosATiempoEstablecido');?>">
              </td>

              <td class="c1-c3">Empleadas reincorporados por un tiempo mayor al establecido  en caso de permiso de maternidad</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTEmpleadasReincorporadasFueraDeTiempoEstablecido"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadasReincorporadasFueraDeTiempoEstablecido');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Total de empleadas reincorporados en el tiempo establecido en caso de permiso de maternidad</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTEmpleadasReincorporadasATiempoEstablecido"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadasReincorporadasATiempoEstablecido');?>">
              </td>
              <td class="c1-c3">Número de trabajadores a jornada completa de trabajo</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTEmpleadosAJornadaCompleta"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadosAJornadaCompleta');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Número Trabajadores con jornada parcial de trabajo</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTEmpleadosAJornadaParcial"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadosAJornadaParcial');?>">
              </td>
              <td class="c1-c3">Cantidad de horas suplementarias trabajadas</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTHorasSuplementariasTrabajadas"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTHorasSuplementariasTrabajadas');?>">
              </td>
            </tr>
            <tr class="tabla4col">           
              <td class="c1-c3">Cantidad de horas extras trabajadas</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTHorasExtrasTrabajadas"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTHorasExtrasTrabajadas');?>">
              </td>
              <td class="c1-c3">Cantidad de productos defectuosos rechazados</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTProductosDefectuososRechazados"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTProductosDefectuososRechazados');?>">
              </td>              
            </tr>
            <tr class="tabla4col">              
              <td class="c1-c3">Total productos recibidos</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTProductosRecibidos"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTProductosRecibidos');?>">
              </td>
              <td class="c1-c3">Número de sanciones monetarias </td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTSancionesMonetarias"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTSancionesMonetarias');?>">
              </td>
            </tr>
            <tr class="tabla4col">              
              <td class="c1-c3">Número de horas de trabajo al día según lo establece el Código de Trabajo</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTHorasLaboradasPorDiaEmpleados"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTHorasLaboradasPorDiaEmpleados');?>">
              </td>
              <td class="c1-c3">Número de sesiones establecidas por la ley</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtNumTSesionesDeConsejosEstablecidasPorLey"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTSesionesDeConsejosEstablecidasPorLey');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Periodo:</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtPeriodo"  placeholder="Ingresar datos" value="<?php echo set_value('txtPeriodo');?>">
              </td>
              <td class="c1-c3"></td>
              <td class="c2-c4">
                
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

    <div class="content-4">
    <?php if (@$permisosSeccionD[0]->Agregar == 1 ) { ?>
      <form action="<?php echo base_url()?>datosAnuales/guardarDGASD" id="TABLABOTON4" method="POST">
        <table width="100%" border="0" cellspacing="5px">
          <tbody>
            <input type="hidden" name="accion" value="<?php echo $accion; ?>">
            <input type="hidden" name="id" value="<?php echo @$datoDGASD[0]->IdDGASD; ?>">
            <tr class="tabla4col">
              <td class="c1-c3">Saldo 10 mayores depositantes</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtSaldoT10MayoresDepositantes"  placeholder="Ingresar datos" value="<?php echo set_value('txtSaldoT10MayoresDepositantes');?>">
              </td>
              <td class="c1-c3">Valor Depósitos a la vista</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtValorTDepositoALaVista"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTDepositoALaVista');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Valor depósitos a plazo</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtValorTDepositoAplazo"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTDepositoAplazo');?>">
              </td>
              <td class="c1-c3">Monto invertido en  infraestructura</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtMontoTInvertidoEnInfraestructura"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTInvertidoEnInfraestructura');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Ingresos operacionales </td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtValorTIngresosOperacionales"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTIngresosOperacionales');?>">
              </td>
              <td class="c1-c3">Total ingresos</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtValorTIngresos"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTIngresos');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Ingresos por venta de activos fijos</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtValorTIngresosPorVentaDeActivosFijos"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTIngresosPorVentaDeActivosFijos');?>">
              </td>
              <td class="c1-c3">Total Ventas en el periodo</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtValorTVentas"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTVentas');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Total ingresos por intereses</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtValorTIngresosPorIntereses"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTIngresosPorIntereses');?>">
              </td>
              <td class="c1-c3">Ventas a crédito</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtVentasACreditos"  placeholder="Ingresar datos" value="<?php echo set_value('txtVentasACreditos');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Ventas a contado</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtValorTVentasAContado"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTVentasAContado');?>">
              </td>
              <td class="c1-c3">Margen Financiero</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtValorTMargenFinanciero"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTMargenFinanciero');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Gastos Operacionales</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtValorTGastosOperacionales"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTGastosOperacionales');?>">
              </td>
              <td class="c1-c3">Total gastos no operacionales del periodo</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtValorTGastosNoOperacionales"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTGastosNoOperacionales');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Gastos sueldos y salarios</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtValorTSueldosYSalarios"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTSueldosYSalarios');?>">
              </td>
              <td class="c1-c3">Monto de créditos de consumo socios</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtMontoTCreditoConsumoSocios"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTCreditoConsumoSocios');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Monto total de créditos otorgados </td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtMontoTCreditos"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTCreditos');?>">
              </td>
              <td class="c1-c3">Monto de créditos de vivienda socios </td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtMontoTCreditoViviendaSocios"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTCreditoViviendaSocios');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Monto de microcréditos socios</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtMontoTCreditoMicrocreditoSocios"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTCreditoMicrocreditoSocios');?>">
              </td>
              <td class="c1-c3">Monto de créditos comercial socios</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtMontoTCreditoComercialSocios"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTCreditoComercialSocios');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Monto de créditos inmobiliario  socios</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtMontoTCreditoInmobiliarioSocios"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTCreditoInmobiliarioSocios');?>">
              </td>
              <td class="c1-c3">Valor de Cartera de crédito</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtValorTCarteraCredito"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTCarteraCredito');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Saldo de cartera de credito para necesidades sociales</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtSaldoTCarteraCreditoParaNecesidadSocial"  placeholder="Ingresar datos" value="<?php echo set_value('txtSaldoTCarteraCreditoParaNecesidadSocial');?>">
              </td>
              <td class="c1-c3">Saldo de cartera de credito para necesidades productivas</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtSaldoTCarteraCreditoParaNecesidadProductiva"  placeholder="Ingresar datos" value="<?php echo set_value('txtSaldoTCarteraCreditoParaNecesidadProductiva');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Cartera vencida</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtValorTCarteraVencida"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTCarteraVencida');?>">
              </td>
              <td class="c1-c3">Endeudamiento externo (Obligaciones con Instituciones Financieras sector público, privado o del exterior)</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtValorTEndeudamientoExterno"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTEndeudamientoExterno');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Monto de las compras a contado</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtMontoTComprasAContado"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTComprasAContado');?>">
              </td>
              <td class="c1-c3">Monto de las compras a crédito</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtMontoTComprasACredito"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTComprasACredito');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Monto de compras a proveedores locales</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtMontoTComprasAProveedoresLocales"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTComprasAProveedoresLocales');?>">
              </td>
              <td class="c1-c3">Monto de compras a proveedores internacionales </td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtMontoTComprasAProveedoresInternacionales"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTComprasAProveedoresInternacionales');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Compras a asociaciones</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtMontoTComprasAAsociaciones"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTComprasAAsociaciones');?>">
              </td>
              <td class="c1-c3">Presupuesto para adquisiciones de operac. significativas proveedores locales</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtPresupuestoAdquisicionesDestinadasAProveedoresLocales"  placeholder="Ingresar datos" value="<?php echo set_value('txtPresupuestoAdquisicionesDestinadasAProveedoresLocales');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Total presupuesto para adquisiciones</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtValorTPresupuestoAdquisicion"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPresupuestoAdquisicion');?>">
              </td>
              <td class="c1-c3">Valor por sanciones impuestos por los organismos de control</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtValorTSancionesPorOrganismosDeControl"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTSancionesPorOrganismosDeControl');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Valor por IVA Pagado en el periodo </td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtValorTPagadoPorIVA"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPagadoPorIVA');?>">
              </td>
              <td class="c1-c3">Total contribuciones al Estado</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtValorTContribucionesAlEstado"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTContribucionesAlEstado');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Valor pagado por retenciones en el periodo</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtValorTPagadoPorRetenciones"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPagadoPorRetenciones');?>">
              </td>
              <td class="c1-c3">Valor pagado del Impuesto a la Renta en el periodo</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtValorTPagadoPorImpuestoALaRenta"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPagadoPorImpuestoALaRenta');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Valor de subvenciones gubernamentales</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtValorTSubvencionesGubernamentales"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTSubvencionesGubernamentales');?>">
              </td>
              <td class="c1-c3">Valor Total de Captación procedente de COAC</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtValorTCaptacionProcedenteCOAC"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTCaptacionProcedenteCOAC');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Valor Total de Captaciones</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtValorTCaptaciones"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTCaptaciones');?>">
              </td>
              <td class="c1-c3">Periodo:</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtPeriodo"  placeholder="Ingresar datos" value="<?php echo set_value('txtPeriodo');?>">
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

    <div class="content-5">
    <?php if (@$permisosSeccionE[0]->Agregar == 1 ) { ?>
      <form action="<?php echo base_url()?>datosAnuales/guardarDGASE" id="TABLABOTON5" method="POST">
        <table width="100%" border="0" cellspacing="5px">
          <tbody>
            <input type="hidden" name="accion" value="<?php echo $accion; ?>">
            <input type="hidden" name="id" value="<?php echo @$datoDGASE[0]->IdDGASE; ?>">
            <tr class="tabla4col">
              <td class="c1-c3">Monto gastado en informar sobre Asambleas:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtMontoTGastoEnInformarSobreAsambleas"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTGastoEnInformarSobreAsambleas');?>">
              </td>
              <td class="c1-c3">Gasto total de la organización :</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtGastoTotalDeOrganizacion"  placeholder="Ingresar datos" value="<?php echo set_value('txtGastoTotalDeOrganizacion');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Monto gastado en informar sobre Consejo de Administración:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtMontoTGastoEnInformarSobreConsejoAdministracion"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTGastoEnInformarSobreConsejoAdministracion');?>">
              </td>
              <td class="c1-c3">Monto gastado en transmisión de otra información:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtMontoTGastoEnInformarSobreOtraInformacion"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTGastoEnInformarSobreOtraInformacion');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Total Activos del periodo:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtValorTActivos"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTActivos');?>">
              </td>
              <td class="c1-c3">Costo de comprobantes de venta y retención antes de facturación electrónica:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtCostoComprobanteVentaRetencionAntesFacturacionElectronica"  placeholder="Ingresar datos" value="<?php echo set_value('txtCostoComprobanteVentaRetencionAntesFacturacionElectronica');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Costo de adquisición de facturación electrónica despues de facturación electrónica:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtCostoComprobanteVentaRetencionDespuesFacturaElectronica"  placeholder="Ingresar datos" value="<?php echo set_value('txtCostoComprobanteVentaRetencionDespuesFacturaElectronica');?>">
              </td>
              <td class="c1-c3">Valor del combustible utilizado en el trasporte de productos y servicios:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtGastoTGasolinaEnEnvioProductosServicios"  placeholder="Ingresar datos" value="<?php echo set_value('txtGastoTGasolinaEnEnvioProductosServicios');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Gasto de multas por normas ambientales:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtGastoTMultasNormasAmbientales"  placeholder="Ingresar datos" value="<?php echo set_value('txtGastoTMultasNormasAmbientales');?>">
              </td>
              <td class="c1-c3">Gasto en equipamiento año actual :</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtGastoTEquipamiento"  placeholder="Ingresar datos" value="<?php echo set_value('txtGastoTEquipamiento');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Gastos asignados a la eliminación residuos año actual:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtGastoTAsignadoAEliminarResiduo"  placeholder="Ingresar datos" value="<?php echo set_value('txtGastoTAsignadoAEliminarResiduo');?>">
              </td>
              <td class="c1-c3">Gasto de limpieza año actual:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtGastoTLimpieza"  placeholder="Ingresar datos" value="<?php echo set_value('txtGastoTLimpieza');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Valor aportación del trabajador:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtValorTAportacionEmpleados"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTAportacionEmpleados');?>">
              </td>
              <td class="c1-c3">Valor de aportación del patrono:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtValorTAportacionPatrono"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTAportacionPatrono');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Valor total de aportaciones en el periodo:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtValorTAportaciones"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTAportaciones');?>">
              </td>
              <td class="c1-c3">Aportes a empleados a jornada completa:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtValorTAportesAEmpleadosAJornadaCompleta"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTAportesAEmpleadosAJornadaCompleta');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Valor pagado a los empleados menores de un año por vacaciones no tomadas :</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtValorTPagadoAEmpleadosPorVacacionesNoTomadasEnMenosDeAnio"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPagadoAEmpleadosPorVacacionesNoTomadasEnMenosDeAnio');?>">
              </td>
              <td class="c1-c3">Valor por vacaciones a los empleados:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtValorTPagadoPorVacaciones"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPagadoPorVacaciones');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Valor pagado del Décimo Tercero:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtValorTPagadoDecimoTercero"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPagadoDecimoTercero');?>">
              </td>
              <td class="c1-c3">Total provisionado en el periodo :</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtValorTProvisionAnio"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTProvisionAnio');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Valor por pagar provisión del Décimo Tercero en el periodo :</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtValorTPorPagarProvisionDecimoTercero"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPorPagarProvisionDecimoTercero');?>">
              </td>
              <td class="c1-c3">Valor pagado del Décimo Cuarto en el periodo:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtValorTPagadoDecimoCuarto"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPagadoDecimoCuarto');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Valor del fondo de reserva pagado mensualmente:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtValorTFondoReservaPagadoMensual"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTFondoReservaPagadoMensual');?>">
              </td>
              <td class="c1-c3">Total fondo de reserva:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtValorTFondoReserva"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTFondoReserva');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Valor pasivos en el periodo:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtValorTPasivos"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPasivos');?>">
              </td>
              <td class="c1-c3">Valor del patrimonio en el periodo actual:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtValorTPatrimonio"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPatrimonio');?>">
              </td>
            </tr>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">capital social aportado en el periodo:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtValorTCapitalSocial"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTCapitalSocial', @$datoDGASE[0]->ValorTCapitalSocial);?>">
              </td>
              <td class="c1-c3">Patrimonio técnico constituido:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtValorTPatrimonioTecnicoConstituido"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPatrimonioTecnicoConstituido', @$datoDGASE[0]->ValorTPatrimonioTecnicoConstituido);?>">
              </td>
            </tr>
            <tr class="tabla4col">              
              <td class="c1-c3">Patrimonio técnico requerido:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtValorTPatrimonioTecnicoRequerido"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPatrimonioTecnicoRequerido', @$datoDGASE[0]->ValorTPatrimonioTecnicoRequerido);?>">
              </td>
              <td class="c1-c3">Utilidad del Ejercicio del periodo :</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtUtilidadTEjercicio"  placeholder="Ingresar datos" value="<?php echo set_value('txtUtilidadTEjercicio', @$datoDGASE[0]->UtilidadTEjercicio);?>">
              </td>
            </tr>
            <tr class="tabla4col">              
              <td class="c1-c3">Valor de reserva legal periodo actual:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtValorTReservaLegal"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTReservaLegal', @$datoDGASE[0]->ValorTReservaLegal);?>">
              </td>
              <td class="c1-c3">Total reservas:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtValorTReserva"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTReserva', @$datoDGASE[0]->ValorTReserva);?>">
              </td>
            </tr>
            <tr class="tabla4col">              
              <td class="c1-c3">Activo corriente:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtValorTActivosCorriente"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTActivosCorriente', @$datoDGASE[0]->ValorTActivosCorriente);?>">
              </td>
              <td class="c1-c3">Pasivo corriente:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtValorTPasivosCorriente"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPasivosCorriente', @$datoDGASE[0]->ValorTPasivosCorriente);?>">
              </td>
            </tr>
            <tr class="tabla4col">              
              <td class="c1-c3">Valor atribuido al estado por organismos de control sobre sanciones y multas en el periodo:</td>
              <td class="c2-c4">
                <input class="formulario1" type="text" name="txtValorTAtribuidoAlEstadoPorOrganismosDeControl"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTAtribuidoAlEstadoPorOrganismosDeControl', @$datoDGASE[0]->ValorTAtribuidoAlEstadoPorOrganismosDeControl);?>">
              </td>
              <td class="c1-c3">Periodo:</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtPeriodo"  placeholder="Ingresar datos" value="<?php echo set_value('txtPeriodo', @$datoDGASE[0]->Periodo);?>">
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
    <?php if (@$permisosSeccionF[0]->Agregar == 1 ) { ?>
      <form action="<?php echo base_url()?>datosAnuales/guardarDGASF" id="TABLABOTON6" method="POST">
        <table width="100%" border="0" cellspacing="5px">
          <tbody>
            <input type="hidden" name="accion" value="<?php echo $accion; ?>">
            <input type="hidden" name="id" value="<?php echo @$datoDGASF[0]->IdDGASF; ?>">
            <tr class="tabla4col">
              <td class="c1-c3">Valor de créditos otorgados a socios con depósitos inferiores al 20%</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtValorCreditoASociosConDepositoMenorA20Porciento"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorCreditoASociosConDepositoMenorA20Porciento');?>">
              </td>
              <td class="c1-c3">Valor de créditos otorgados a socios con aportes inferiores a la media</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtValorCreditoASociosConAporteMenorALaMedia"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorCreditoASociosConAporteMenorALaMedia');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Valor de créditos a socios que poseen el mínimo de capital exigido</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtValorCreditoASociosConMinCapitalExigido"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorCreditoASociosConMinCapitalExigido');?>">
              </td>
              <td class="c1-c3">Monto promedio de créditos de consumo concedidos por primera vez periodo actual</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtMontoPromedioCreditoConsumoConcedidoPrimeraVez"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoPromedioCreditoConsumoConcedidoPrimeraVez');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Monto promedio de créditos de vivienda a socios nuevos concedido por primera vez en el periodo</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtMontoPromedioCreditoViviendaConcedidoPrimeraVez"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoPromedioCreditoViviendaConcedidoPrimeraVez');?>">
              </td>
              <td class="c1-c3">Monto promedio de microcréditos a socios nuevos cencedidos por primera vez en el periodo</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtMontoPromedioMicrocreditoASociosNuevosPrimeraVez"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoPromedioMicrocreditoASociosNuevosPrimeraVez');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Monto promedio de créditos de comercio a socios nuevos concedidos por primera vez en el periodo</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtMontoPromedioCreditoComercioASociosNuevosPrimeraVez"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoPromedioCreditoComercioASociosNuevosPrimeraVez');?>">
              </td>
              <td class="c1-c3">Monto promedio de créditos vinculadosen el periodo</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtMontoPromedioCreditosVinculados"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoPromedioCreditosVinculados');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Monto de certificados de aportación poseídos por el socio mayoritario</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtMontoCertificadosAportacionPoseidosPorSocioMayoritario"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoCertificadosAportacionPoseidosPorSocioMayoritario');?>">
              </td>
              <td class="c1-c3">Monto de certificados de aportación poseídos por el socio minoristas</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtMontoCertificadosAportacionPoseidosPorSocioMinorista"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoCertificadosAportacionPoseidosPorSocioMinorista');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Tasa media de interés sobre los certificados de aportación</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtTasaMediaInteresSobreCertificadosDeAportacion"  placeholder="Ingresar datos" value="<?php echo set_value('txtTasaMediaInteresSobreCertificadosDeAportacion');?>">
              </td>
              <td class="c1-c3">Valor agregado cooperativo distribuido a trabajadores</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtValorAgregadoCooperativoDistribuidoATrabajadores"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorAgregadoCooperativoDistribuidoATrabajadores');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Prestaciones personales</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtValorPrestacionesPersonales"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorPrestacionesPersonales');?>">
              </td>
              <td class="c1-c3">Prestaciones colectivas</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtValorPrestacionesColectivas"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorPrestacionesColectivas');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Gasto de formación para trabajadores</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtGastoEnFormacionATrabajadores"  placeholder="Ingresar datos" value="<?php echo set_value('txtGastoEnFormacionATrabajadores');?>">
              </td>
              <td class="c1-c3">Valor por becas, ayudas, servicios</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtValorBecasAyudasServicios"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorBecasAyudasServicios');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Impuesto y tasa varias</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtValorImpuestoYTasaVarias"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorImpuestoYTasaVarias');?>">
              </td>
              <td class="c1-c3">Donación Fondo Educación</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtValorDonacionFondoEducacion"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorDonacionFondoEducacion');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Fondo de Solidaridad</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtValorFondoDeSolidaridad"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorFondoDeSolidaridad');?>">
              </td>
              <td class="c1-c3">Donativos a la comunidad</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtValorDonativosAComunidad"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorDonativosAComunidad');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Excedente Bruto</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtValorExcedenteBruto"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorExcedenteBruto');?>">
              </td>
              <td class="c1-c3">Impuestos sobre excedentes</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtValorImpuestosSobreExcedentes"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorImpuestosSobreExcedentes');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Dotación del fondo de educación</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtValorDotacionDeFondoEducacion"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorDotacionDeFondoEducacion');?>">
              </td>
              <td class="c1-c3">Fondo de Reserva Irrepartibles</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtValorFondoDeReservaIrrepartibles"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorFondoDeReservaIrrepartibles');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Fondo de Reserva Repartibles</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtValorFondoDeReservaRepartibles"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorFondoDeReservaRepartibles');?>">
              </td>
              <td class="c1-c3">Precio pagado a los asociados por compra de materias</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtPrecioPagadoAAsociadosPorCompraDeMaterial"  placeholder="Ingresar datos" value="<?php echo set_value('txtPrecioPagadoAAsociadosPorCompraDeMaterial');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Descuento realizado a socios en ventas a productores</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtDescuentoRealizadoASociosEnVentasAProductores"  placeholder="Ingresar datos" value="<?php echo set_value('txtDescuentoRealizadoASociosEnVentasAProductores');?>">
              </td>
              <td class="c1-c3">Gastos por servicos voluntarios gratuitos a socios</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtGastosPorServiciosVoluntariosGratuitosASocios"  placeholder="Ingresar datos" value="<?php echo set_value('txtGastosPorServiciosVoluntariosGratuitosASocios');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Dotación Fondo de Reservas  Irrepartibles</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtValorDotacionFondoDeReservaIrrepartibles"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorDotacionFondoDeReservaIrrepartibles');?>">
              </td>
              <td class="c1-c3">Otras Reservas</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtValorOtrasReservas"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorOtrasReservas');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Total depósitos realizados</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtSaldoTDepositos"  placeholder="Ingresar datos" value="<?php echo set_value('txtSaldoTDepositos');?>">
              </td>
              <td class="c1-c3">Total comprobantes físicos emitidos</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtNumTComprobantesFisicosEmitidos"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTComprobantesFisicosEmitidos');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Gasto total multas </td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtGastoTMultas"  placeholder="Ingresar datos" value="<?php echo set_value('txtGastoTMultas');?>">
              </td>
              <td class="c1-c3">Valor Beneficios de ley</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtValorTBeneficiosDeLey"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTBeneficiosDeLey');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Número de limpiezas realizadas por día</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtNumTLimpiezasPorDia"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTLimpiezasPorDia');?>">
              </td>
              <td class="c1-c3">Número de limpiezas programadas por día</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtNumTLimpiezasProgramadasPorDia"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTLimpiezasProgramadasPorDia');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Empleados que no gozaron de las vacaciones</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtNumTEmpeladosQueNoGozaronVacaciones"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpeladosQueNoGozaronVacaciones');?>">
              </td>
              <td class="c1-c3">Provisión Décimo Cuarto</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtValorTPorPagarProvisionDecimoCuarto"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPorPagarProvisionDecimoCuarto');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Numero de accidentes </td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtNumTAccidentes5Anios"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTAccidentes5Anios');?>">
              </td>
              <td class="c1-c3">Empleados evaluados en el desempeño profesional </td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtNumTEmpleadosEvaluadosDesempenioProfesional"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadosEvaluadosDesempenioProfesional');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Valor aportación capital social </td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtValorTAportacionesCapitalSocial"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTAportacionesCapitalSocial');?>">
              </td>
              <td class="c1-c3">Tasa pasiva captacion del público </td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtTasaPasivaCaptacionDelPublicoPonderada"  placeholder="Ingresar datos" value="<?php echo set_value('txtTasaPasivaCaptacionDelPublicoPonderada');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Monto total compras </td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtMontoTCompras"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTCompras');?>">
              </td>
              <td class="c1-c3">Valro agregado cooperativo distribuido a la comunidad</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtValorAgregadoCooperativoDistribuidoAComunidad"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorAgregadoCooperativoDistribuidoAComunidad');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Valor agregado cooperativo distribuido a socios </td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtValorAgregadoCooperativoDistribuidoASocios"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorAgregadoCooperativoDistribuidoASocios');?>">
              </td>
              <td class="c1-c3">Valor agregado cooperativo incorporado a Patrimonio común</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtValorAgregadoCooperativoIncorporadoAPatrimonioComun"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorAgregadoCooperativoIncorporadoAPatrimonioComun');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Compras a entidades reconocidas como de comercio justo </td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtValorComprasRealizadasAEntidadesReconocidasComoDeComercioJusto"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorComprasRealizadasAEntidadesReconocidasComoDeComercioJusto');?>">
              </td>
              <td class="c1-c3">Ventas a entidades reconocidas como de comercio justo</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtValorVentasRealizadasAEntidadesReconocidasComoComercioJusto"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorVentasRealizadasAEntidadesReconocidasComoComercioJusto');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Valor depósitos procedentes de entidades como de comercio justo </td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtValorDepositosProcedenteDeEntidadesReconocidasComoComercioJusto"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorDepositosProcedenteDeEntidadesReconocidasComoComercioJusto');?>">
              </td>
              <td class="c1-c3">Valor créditos otorgados a entidades reconocidas como comercio justo</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtValorCreditosOtorgadosAEntidadesReconocidasComoComercioJusto"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorCreditosOtorgadosAEntidadesReconocidasComoComercioJusto');?>">
              </td>
            </tr>
            <tr class="tabla4col">
              <td class="c1-c3">Valor aportes (capital social) ingresados en el año </td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtValorTAportesIngresados"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTAportesIngresados');?>">
              </td>
              <td class="c1-c3">Periodo:</td>
              <td class="c2-c4">
                <input class="formulario2" type="text" name="txtPeriodo"  placeholder="Ingresar datos" value="<?php echo set_value('txtPeriodo');?>">
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

  </div> <!--final div content-->
</div> <!--final div contenedor-->
