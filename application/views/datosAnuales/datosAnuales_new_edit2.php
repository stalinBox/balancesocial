<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/jquery.js"></script>
<script src="<?php echo base_url(); ?>js/bootstrap.min.js" ></script> 
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.min.css"> 
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datepicker.css" >
<script type="text/javascript" src="<?php echo base_url()?>js/loadFiles/loadFiles.js"></script>

<script type="text/javascript">
  function denegado() {
    alert("No cuenta con el permiso");
  }

  function regresar(){
    window.location="<?php echo base_url()?>datoBase/editarDGA";
  }  
</script>

<h3 id="idTitulo" class="page-header" align="center"><span class="glyphicon glyphicon-th-list"></span> Datos Anuales Sección A </h3>

<div class="error">
  <center>
    <?php messages_flash('danger',validation_errors(),'Errores del formulario', true);?>
  </center>
</div>

<!-- FORMULARIO PARA EL NUEVO COMPONENTE-->
  <form action="<?php echo base_url()?>datosAnuales/reemplazar" id="idFrmFile" name="idFrmFile" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
    <input type="hidden" name="accion" value="">
    <input type="hidden" name="idBaseData" value="">

    <div class="form-group">
      <div id="userfile" name='userfile' class="input-group input-file"  required>
        <span class="input-group-btn">
              <button class="btn btn-default btn-choose" type="button">Seleccione</button>
          </span>
          <input type="text" class="form-control" placeholder='Seleccione un archivo Excel...' />
          <span class="input-group-btn">
               <button class="btn btn-warning btn-reset" type="button">Restaurar</button>
          </span>
      </div>
    </div>
    <div class="form-group">
      <button type="submit" name='txtSubmitFile' class="btn btn-primary ">Importar Datos</button>
    </div>
  </form>

  <div class="page-header"></div>

<!-- CABECERA DE LOS TABS -->

<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#menu1">Sección A</a></li>
  <li><a data-toggle="tab" href="#menu2">Sección B</a></li>
  <li><a data-toggle="tab" href="#menu3">Sección C</a></li>
  <li><a data-toggle="tab" href="#menu4">Sección D</a></li>
  <li><a data-toggle="tab" href="#menu5">Sección E</a></li>
  <li><a data-toggle="tab" href="#menu6">Sección F</a></li>
</ul>

<div class="tab-content">

<!-- SECCION A -->
  <div id="menu1" class="tab-pane fade in active">
    <div class="table-responsive" name="cont1">
      <form action="<?php echo base_url()?>datosAnuales/guardarDGASA" id="TABLABOTON1" method="POST">        
        <table class="table table-striped table-bordered table-hover table-condensed">
        <tbody>
            <input type="hidden" name="accion" value="<?php echo $accion; ?>">
            <input type="hidden" name="id" value="<?php echo @$datoDGASA[0]->IdDGASA; ?>">

            <tr>
              <td style="width: 200px">Porcentaje de Discapacidad:</td>
              <td>

                <input class="form-control" type="text" name="txtPorcentajeDiscapacidad"  placeholder="Ingresar datos" value="<?php echo set_value('txtPorcentajeDiscapacidad',  @$resultado['txtPorcentajeDiscapacidad']);?>" >
              </td>
              <td style="width: 200px">PIB Percapita:</td>
              <td>
                <input class="form-control" type="text" name="txtPIBPercapita"  placeholder="Ingresar datos" value="<?php echo set_value('txtPIBPercapita',  @$resultado['txtPIBPercapita']);?>">
              </td>
            </tr>
            <tr>
              <td>Inflación Mensual:</td>
              <td>
                <input class="form-control" type="text" name="txtInflacionMensual"  placeholder="Ingresar datos" value="<?php echo set_value('txtInflacionMensual', @$resultado['txtInflacionMensual']);?>">
              </td>
              <td>Inflación Anual:</td>
              <td>
                <input class="form-control" type="text" name="txtInflacionAnualizada"  placeholder="Ingresar datos" value="<?php echo set_value('txtInflacionAnualizada', @$resultado['txtInflacionAnualizada']);?>">
              </td>
            </tr>
            <tr>
              <td>Salario Básico:</td>
              <td>
                <input class="form-control" type="text" name="txtValorSalarioMinimoMensual"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorSalarioMinimoMensual', @$resultado['txtValorSalarioMinimoMensual']);?>">
              </td>
              <td>Número de Días Laborables:</td>
              <td>
                <input class="form-control" type="text" name="txtNumTDiasLaborados"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTDiasLaborados', @$resultado['txtNumTDiasLaborados']);?>">
              </td>
            </tr>
            <tr>
              <td>Ingresar el valor cuota mínima para apertura de cuenta:</td>
              <td>
                <input class="form-control" type="text" name="txtValMinAperturaCuenta"  placeholder="Ingresar datos" value="<?php echo set_value('txtValMinAperturaCuenta', @$resultado['txtValMinAperturaCuenta']);?>">
              </td>
              <td>TEA Máxima por el BCE:</td>
              <td>
                <input class="form-control" type="text" name="txtTEAMaximaBCE"  placeholder="Ingresar datos" value="<?php echo set_value('txtTEAMaximaBCE', @$resultado['txtTEAMaximaBCE']);?>">
              </td>
            </tr>
            <tr>
              <td>TEA Máxima por el Cooperativa:</td>
              <td>
                <input class="form-control" type="text" name="txtTEAMaximaCooperativa"  placeholder="Ingresar datos" value="<?php echo set_value('txtTEAMaximaCooperativa', @$resultado['txtTEAMaximaCooperativa']);?>">
              </td>
              <td>Dias de descanso forzoso:</td>
              <td>
                <input class="form-control" type="text" name="txtNumTDiasDescansoForzoso"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTDiasDescansoForzoso', @$resultado['txtNumTDiasDescansoForzoso']);?>">
              </td>
            </tr>
            <tr>
              <td>Número de baterías sanitarias establecidas por normativa:</td>
              <td>
                <input class="form-control" type="text" name="txtNumTBateriasSanitariasPorNormativa"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTBateriasSanitariasPorNormativa', @$resultado['txtNumTBateriasSanitariasPorNormativa']);?>">
              </td>
              <td>Número de empleados que cubre el número de baterías:</td>
              <td>
                <input class="form-control" type="text" name="txtNumEmpleadosQueCubreLasBaterias"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumEmpleadosQueCubreLasBaterias', @$resultado['txtNumEmpleadosQueCubreLasBaterias']);?>">
              </td>
            </tr>
            <tr>
              <td>Cantidad de días de descanso forzoso laborados por los empleados:</td>
              <td>
                <input class="form-control" type="text" name="txtNumTDiasDescansoForzosoLaborados"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTDiasDescansoForzosoLaborados', @$resultado['txtNumTDiasDescansoForzosoLaborados']);?>">
              </td>
              <td>Total de horas trabajadas en el año:</td>
              <td>
                <input class="form-control" type="text" name="txtNumTHorasTrabajadas"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTHorasTrabajadas',@$resultado['txtNumTHorasTrabajadas']);?>">
              </td>
            </tr>
            <tr>
              <td>Promedio de cuentas por cobrar:</td>
              <td>
                <input class="form-control" type="text" name="txtPromedioCuentasPorCobrar"  placeholder="Ingresar datos" value="<?php echo set_value('txtPromedioCuentasPorCobrar', @$resultado['txtPromedioCuentasPorCobrar']);?>">
              </td>
              <td>Número de proveedores  que trabajan con la organización:</td>
              <td>
                <input class="form-control" type="text" name="txtNumTProveedoresTrabajanOrganizacion"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTProveedoresTrabajanOrganizacion', @$resultado['txtNumTProveedoresTrabajanOrganizacion']);?>">
              </td>
            </tr>
            <tr>
              <td>Número de empleados nuevos generados para socios:</td>
              <td>
                <input class="form-control" type="text" name="txtNumTEmpleadosGeneradosParaSocios"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadosGeneradosParaSocios', @$resultado['txtNumTEmpleadosGeneradosParaSocios']);?>">
              </td>
              <td>Número de políticas de contratación de personal :</td>
              <td>
                <input class="form-control" type="text" name="txtNumTPoliticasDeCotratacionDePersonal"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTPoliticasDeCotratacionDePersonal', @$resultado['txtNumTPoliticasDeCotratacionDePersonal']);?>">
              </td>
            </tr>
            <tr>
              <td>Número de contrataciones en función de la CV:</td>
              <td>
                <input class="form-control" type="text" name="txtNumTContratosEnFuncionDeCV"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTContratosEnFuncionDeCV', @$resultado['txtNumTContratosEnFuncionDeCV'] );?>">
              </td>
              <td>Número de socios que están dentro del programa seguros exequia:</td>
              <td>
                <input class="form-control" type="text" name="txtNumtSociosEnProgramaDeSeguroExequial"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumtSociosEnProgramaDeSeguroExequial', @$resultado['txtNumtSociosEnProgramaDeSeguroExequial']);?>">
              </td>
            </tr>
            <tr>
              <td>Número de empleados y socios que aportan al fondo de cesantía:</td>
              <td>
                <input class="form-control" type="text" name="txtNumTSociosAportanAlFondoDeCesantia"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTSociosAportanAlFondoDeCesantia', @$resultado['txtNumTSociosAportanAlFondoDeCesantia']);?>">
              </td>
              <td>Número de empleados y socios que aportan al fondo mortuorio:</td>
              <td>
                <input class="form-control" type="text" name="txtNumTSociosAportanAlFondoMortuorio"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTSociosAportanAlFondoMortuorio', @$resultado['txtNumTSociosAportanAlFondoMortuorio']);?>">
              </td>
            </tr>
            <tr>
              <td>Número de empleados y socios que aportan al fondo de empleados o cooperativos:</td>
              <td>
                <input class="form-control" type="text" name="txtNumTSociosAportanAlFondoDeEmpleadosOCooperativa"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTSociosAportanAlFondoDeEmpleadosOCooperativa',@$resultado['txtNumTSociosAportanAlFondoDeEmpleadosOCooperativa']);?>">
              </td>
              <td>Número de empleados o socios que aportan al fondo de accidentes o calamidades:</td>
              <td>
                <input class="form-control" type="text" name="txtNumTSociosAportanAlFondoDeAccidenteOCalamidades"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTSociosAportanAlFondoDeAccidenteOCalamidades', @$resultado['txtNumTSociosAportanAlFondoDeAccidenteOCalamidades']);?>">
              </td>
            </tr>
            <tr>
              <td>Número de practicantes establecidos mediante política:</td>
              <td>
                <input class="form-control" type="text" name="txtNumTPracticantesRequeridos"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTPracticantesRequeridos', @$resultado['txtNumTPracticantesRequeridos']);?>">
              </td>
              <td>Número total de representantes empadronados:</td>
              <td>
                <input class="form-control" type="text" name="txtNumTRepresentantesEmpadronados"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTRepresentantesEmpadronados', @$resultado['txtNumTRepresentantesEmpadronados']);?>">
              </td>
            </tr>
            <tr>
              <td>Energía renovable utilizada (kwh):</td>
              <td>
                <input class="form-control" type="text" name="txtCantTKwhEnergiaUtilizadaRenovable"  placeholder="Ingresar datos" value="<?php echo set_value('txtCantTKwhEnergiaUtilizadaRenovable', @$resultado['txtCantTKwhEnergiaUtilizadaRenovable']);?>">
              </td>
              <td>Energia renovable y no renovable (kwh):</td>
              <td>
                <input class="form-control" type="text" name="txtCantTKwhEnergiaRenovableNoRenovable"  placeholder="Ingresar datos" value="<?php echo set_value('txtCantTKwhEnergiaRenovableNoRenovable', @$resultado['txtCantTKwhEnergiaRenovableNoRenovable']);?>">
              </td>
            </tr>
            <tr>
              <td>Cantidad de agua reutilizada o reciclada (m3):</td>
              <td>
                <input class="form-control" type="text" name="txtCantTm3Reutilizada"  placeholder="Ingresar datos" value="<?php echo set_value('txtCantTm3Reutilizada', @$resultado['txtCantTm3Reutilizada']);?>">
              </td>
              <td>Sumatoria de accidentes últimos 5 años:</td>
              <td>
                <input class="form-control" type="text" name="txtNumTAccidentes5Anios"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTAccidentes5Anios', @$resultado['txtNumTAccidentes5Anios']);?>">
              </td>
            </tr>
            <tr>
              <td>Periodo:</td>
              <td>
                    <div class='input-group date' id='divPeriodoA'>
                      <input type='text' id="txtPeriodo" name="txtPeriodo" class="form-control" value="<?php echo set_value('txtPeriodo', @$resultado['txtPeriodo']);?>" readonly/>
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>
              </td>
              <td></td>
              <td>
              </td>
            </tr>

            <tr>
              <td colspan="2">
                <input type="submit" name="submit" class="botones" value="Guardar">
              </td>

              <td colspan="2">
                <input type="button" onclick="regresar()" name="" class="botones" value="Regresar">
              </td>
            </tr>

          </tbody>
          </table>
        </form>
      </div>
    </div>

<!-- SECCION B -->
  <div id="menu2" class="tab-pane fade">
    <div class="table-responsive content-2">
    <form action="<?php echo base_url()?>datosAnuales/guardarDGASB" id="TABLABOTON2" method="POST">
       <table class="table table-striped table-bordered table-hover table-condensed">
          <tbody>
            <input type="hidden" name="accion" value="<?php echo $accion; ?>">
            <input type="hidden" name="id" value="<?php echo @$datoDGASB[0]->IdDGASB; ?>">
            <tr>
              <td style="width: 200px">Número de socios que sumados represente el 50% o más del total de depósitos:</td>
              <td>
                <input class="form-control" type="text" name="txtNumTSocios50PorcientoOMasTotalDeDepositos"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTSocios50PorcientoOMasTotalDeDepositos', @$resultado['txtNumTSocios50PorcientoOMasTotalDeDepositos']);?>">
              </td>
              <td style="width: 200px">Número de Sugerencias constructivas:</td>
              <td>
                <input class="form-control" type="text" name="txtNumTSugerenciasConstructivas"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTSugerenciasConstructivas', @$resultado['txtNumTSugerenciasConstructivas']);?>">
              </td>
            </tr>
            <tr>
              <td>Total sugerencias revisadas en el buzón de sugerencias:</td>
              <td>
                <input class="form-control" type="text" name="txtNumTSugerenciasRevisadas"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTSugerenciasRevisadas', @$resultado['txtNumTSugerenciasRevisadas']);?>">
              </td>
              <td>Cantidad de productos y servicios entregados a tiempo a los clientes:</td>
              <td>
                <input class="form-control" type="text" name="txtNumTProductosServiciosEntregadosATiempoAClientes"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTProductosServiciosEntregadosATiempoAClientes', @$resultado['txtNumTProductosServiciosEntregadosATiempoAClientes']);?>">
              </td>
            </tr>
            <tr>
              <td>Número de eventos que mantiene con otras COAC:</td>
              <td>
                <input class="form-control" type="text" name="txtNumTEventosMantieneConOtrasCOAC"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEventosMantieneConOtrasCOAC', @$resultado['txtNumTEventosMantieneConOtrasCOAC']);?>">
              </td>
              <td>Número de beneficios dirigidos a socios en el ámbito distintos a servicios financieros:</td>
              <td>
                <input class="form-control" type="text" name="txtNumTBeneficiosNoFinancierosASocios"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTBeneficiosNoFinancierosASocios', @$resultado['txtNumTBeneficiosNoFinancierosASocios']);?>">
              </td>
            </tr>
            <tr>
              <td>Número socios participantes en elecciones:</td>
              <td>
                <input class="form-control" type="text" name="txtNumTSociosParticipanEnElecciones"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTSociosParticipanEnElecciones', @$resultado['txtNumTSociosParticipanEnElecciones']);?>">
              </td>
              <td>Empleados que gozaron  de las vacaciones:</td>
              <td>
                <input class="form-control" type="text" name="txtNumTEmpeladosQueGozaronVacaciones"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpeladosQueGozaronVacaciones', @$resultado['txtNumTEmpeladosQueGozaronVacaciones']);?>">
              </td>
            </tr>
            <tr>
              <td>Número de empleados a los que se entrego equipos de protección:</td>
              <td>
                <input class="form-control" type="text" name="txtNumTEmpleadosRecibenEquipoDeProteccion"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadosRecibenEquipoDeProteccion', @$resultado['txtNumTEmpleadosRecibenEquipoDeProteccion']);?>">
              </td>
              <td>Número de empleados que utilizan los equipos de protección:</td>
              <td>
                <input class="form-control" type="text" name="txtNumTEmpleadosQueUsanEquiposDeProteccion"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadosQueUsanEquiposDeProteccion', @$resultado['txtNumTEmpleadosQueUsanEquiposDeProteccion']);?>">
              </td>
            </tr>
            <tr>
              <td>Empleados que deberían utilizar los  equipos de protección:</td>
              <td>
                <input class="form-control" type="text" name="txtNumTEmpleadosQueDebemUsarEquiposDeProteccion"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadosQueDebemUsarEquiposDeProteccion', @$resultado['txtNumTEmpleadosQueDebemUsarEquiposDeProteccion']);?>">
              </td>
              <td>Número de evaluaciones efectuadas utilización de equipos de protección:</td>
              <td>
                <input class="form-control" type="text" name="txtNumTEvaluacionesAUtilizacionDeEquiDeProteccionEjecutadas"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEvaluacionesAUtilizacionDeEquiDeProteccionEjecutadas', @$resultado['txtNumTEvaluacionesAUtilizacionDeEquiDeProteccionEjecutadas']);?>">
              </td>
            </tr>
            <tr>
              <td>Evaluaciones programadas en la utilización de equipos de protección:</td>
              <td>
                <input class="form-control" type="text" name="txtNumTEvaluacionesAUtilizacionDeEquiDeProteccionProgramadas"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEvaluacionesAUtilizacionDeEquiDeProteccionProgramadas', @$resultado['txtNumTEvaluacionesAUtilizacionDeEquiDeProteccionProgramadas']);?>">
              </td>
              <td>Cantidad de mantenimientos realizados a la infraestructura:</td>
              <td>
                <input class="form-control" type="text" name="txtNumTMantenimientosAInfraestructuraEjecutados"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTMantenimientosAInfraestructuraEjecutados', @$resultado['txtNumTMantenimientosAInfraestructuraEjecutados']);?>">
              </td>
            </tr>
            <tr>
              <td>Número de Mantenimientos de Infraestructura requeridos :</td>
              <td>
                <input class="form-control" type="text" name="txtNumTMantenimientosAInfraestructuraRequeridos"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTMantenimientosAInfraestructuraRequeridos', @$resultado['txtNumTMantenimientosAInfraestructuraRequeridos']);?>">
              </td>
              <td>Número de oficinas en comunidades que no existe otras instituciones de servicio financiero:</td>
              <td>
                <input class="form-control" type="text" name="txtNumTPuntosEnComunidadesSinOtrasInstitucionesFinancieras"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTPuntosEnComunidadesSinOtrasInstitucionesFinancieras', @$resultado['txtNumTPuntosEnComunidadesSinOtrasInstitucionesFinancieras']);?>">
              </td>
            </tr>
            <tr>
              <td>Total puntos de atención:</td>
              <td>
                <input class="form-control" type="text" name="txtNumTPuntosDeAtencion"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTPuntosDeAtencion', @$resultado['txtNumTPuntosDeAtencion']);?>">
              </td>
              <td>Puntos de atención que brinda acceso a personas con discapacidad:</td>
              <td>
                <input class="form-control" type="text" name="txtNumTOficinasConAccesoADiscapacitados"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTOficinasConAccesoADiscapacitados', @$resultado['txtNumTOficinasConAccesoADiscapacitados']);?>">
              </td>
            </tr>
            <tr>
              <td>Número de participaciones en la posición de políticas públicas y actividades de lobbying:</td>
              <td>
                <input class="form-control" type="text" name="txtNumTParticipacionesLobbying"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTParticipacionesLobbying', @$resultado['txtNumTParticipacionesLobbying']);?>">
              </td>
              <td>Asuntos acordados no respetados por los directivos:</td>
              <td>
                <input class="form-control" type="text" name="txtNumTAsuntosAcordadosNoRespetadosPorDirectivos"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTAsuntosAcordadosNoRespetadosPorDirectivos', @$resultado['txtNumTAsuntosAcordadosNoRespetadosPorDirectivos']);?>">
              </td>
            </tr>
            <tr>                    
              <td>Total de asuntos acordados en los convenios sindicales:</td>
              <td>
                <input class="form-control" type="text" name="txtNumTAsuntosAcordadosEnConveniosSindicales"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTAsuntosAcordadosEnConveniosSindicales', @$resultado['txtNumTAsuntosAcordadosEnConveniosSindicales']);?>">
              </td>
              <td>Asuntos acordados con los directivos no respetados por los trabajadores:</td>
              <td>
                <input class="form-control" type="text" name="txtNumTAsuntosAcordadosNoRespetadosPorEmpleados"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTAsuntosAcordadosNoRespetadosPorEmpleados', @$resultado['txtNumTAsuntosAcordadosNoRespetadosPorEmpleados']);?>">
              </td>
            </tr>
            <tr>                    
              <td>Número de créditos vigentes otorgados a mujeres:</td>
              <td>
                <input class="form-control" type="text" name="txtNumTCreditosVigentesAMujeres"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTCreditosVigentesAMujeres', @$resultado['txtNumTCreditosVigentesAMujeres']);?>">
              </td>
              <td>Total cartera de crédito mujeres:</td>
              <td>
                <input class="form-control" type="text" name="txtValorTCarteraCreditoMujeres"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTCarteraCreditoMujeres', @$resultado['txtValorTCarteraCreditoMujeres']);?>">
              </td>
            </tr>
            <tr>                    
              <td>Número de operaciones de créditos con montos <=al 30% del PIB per cápita:</td>
              <td>
                <input class="form-control" type="text" name="txtNumTOperacionesDeCreditosConMontoMenorA30PorcientoPIB"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTOperacionesDeCreditosConMontoMenorA30PorcientoPIB', @$resultado['txtNumTOperacionesDeCreditosConMontoMenorA30PorcientoPIB']);?>">
              </td>
              <td>Número Total de operaciones de crédito vigentes:</td>
              <td>
                <input class="form-control" type="text" name="txtNumTOperacionesDeCreditoVigentes"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTOperacionesDeCreditoVigentes', @$resultado['txtNumTOperacionesDeCreditoVigentes']);?>">
              </td>
            </tr>
            <tr>                    
              <td>Número de operaciones de créditos  con cuotas vigentes <= 1% del PIB Per capita:</td>
              <td>
                <input class="form-control" type="text" name="txtNumTOperacionesCreditoConCuotasVigentesMenosA1PorcientoPIB"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTOperacionesCreditoConCuotasVigentesMenosA1PorcientoPIB', @$resultado['txtNumTOperacionesCreditoConCuotasVigentesMenosA1PorcientoPIB']);?>">
              </td>
              <td>Número de pedidos entregados a tiempo:</td>
              <td>
                <input class="form-control" type="text" name="txtNumTPedidosEntregadosATiempo"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTPedidosEntregadosATiempo', @$resultado['txtNumTPedidosEntregadosATiempo']);?>">
              </td>
            </tr> 
            <tr>                    
              <td>Total pedidos entregados:</td>
              <td>
                <input class="form-control" type="text" name="txtNumTPedidosEntregados"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTPedidosEntregados', @$resultado['txtNumTPedidosEntregados']);?>">
              </td>
              <td>Número de productos y servicios que se adquiere en el ámbito local:</td>
              <td>
                <input class="form-control" type="text" name="txtNumTProductosYServiciosAdquiereLocalmente"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTProductosYServiciosAdquiereLocalmente', @$resultado['txtNumTProductosYServiciosAdquiereLocalmente']);?>">
              </td>
            </tr>
            <tr>                    
              <td>Total productos y servicios:</td>
              <td>
                <input class="form-control" type="text" name="txtNumTProductosYServicios"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTProductosYServicios', @$resultado['txtNumTProductosYServicios']);?>">
              </td>
              <td>Número de Certificaciones requeridas en el POA:</td>
              <td>
                <input class="form-control" type="text" name="txtNumTCertificacionesRequeridasEnElPOA"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTCertificacionesRequeridasEnElPOA', @$resultado['txtNumTCertificacionesRequeridasEnElPOA']);?>">
              </td>
            </tr>
            <tr>
              <td>Periodo:</td>
              <td>
                     <div class='input-group date' id='divPeriodoB'>
                      <input type='text' id="txtPeriodo" name="txtPeriodo" class="form-control" value="<?php echo set_value('txtPeriodo', @$resultado['txtPeriodo']);?>" readonly/>
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>
              </td>
              <td></td>
              <td>
                
              </td>
            </tr>

            <tr>
              <td colspan="2">
                <input type="submit" name="submit" class="botones" value="Guardar">
              </td>

              <td colspan="2">
                <input type="button" onclick="regresar()" name="" class="botones" value="Regresar">
              </td>
            </tr>

          </tbody>
        </table>
    </form>
    </div>
  </div>

<!-- SECCION C -->
  <div id="menu3" class="tab-pane fade">
    <div class="table-responsive content-3">
    <form action="<?php echo base_url()?>datosAnuales/guardarDGASC" id="TABLABOTON3" method="POST">
        <table class="table table-striped table-bordered table-hover table-condensed">
          <tbody>
            <input type="hidden" name="accion" value="<?php echo $accion; ?>">
            <input type="hidden" name="id" value="<?php echo @$datoDGASC[0]->IdDGASC; ?>">
            <tr>
              <td style="width: 200px">Número de Demandas administrativas atendidas</td>
              <td>
                <input class="form-control" type="text" name="txtNumTDemandasAdministrativasAtendidas"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTDemandasAdministrativasAtendidas', @$resultado['txtNumTDemandasAdministrativasAtendidas']);?>">
              </td>
              <td style="width: 200px">Total de demandas Administrativas</td>
              <td>
                <input class="form-control" type="text" name="txtNumTDemandasAdministrativas"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTDemandasAdministrativas', @$resultado['txtNumTDemandasAdministrativas']);?>">
              </td>
            </tr>
            <tr>
              <td>Total de productos y servicios entregados a los clientes</td>
              <td>
                <input class="form-control" type="text" name="txtNumTProductosServiciosEntregadosAClientes"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTProductosServiciosEntregadosAClientes', @$resultado['txtNumTProductosServiciosEntregadosAClientes']);?>">
              </td>
              <td>Número de denuncias por aspectos poco éticos resueltas</td>
              <td>
                <input class="form-control" type="text" name="txtNumTDenunciasAspectosNoEticosResueltos"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTDenunciasAspectosNoEticosResueltos', @$resultado['txtNumTDenunciasAspectosNoEticosResueltos']);?>">
              </td>
            </tr>
            <tr>
              <td>Total de denuncias por aspectos no éticos</td>
              <td>
                <input class="form-control" type="text" name="txtNumTDenunciasAspectosNoEticos"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTDenunciasAspectosNoEticos', @$resultado['txtNumTDenunciasAspectosNoEticos']);?>">
              </td>
              <td>Total casos de discriminación</td>
              <td>
                <input class="form-control" type="text" name="txtNumTCasosDiscriminacion"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTCasosDiscriminacion', @$resultado['txtNumTCasosDiscriminacion']);?>">
              </td>
            </tr>
            <tr>
              <td>Número de casos de discriminación ocurridos durante el perido resueltos </td>
              <td>
                <input class="form-control" type="text" name="txtNumTCasosDiscriminacionResueltos"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTCasosDiscriminacionResueltos', @$resultado['txtNumTCasosDiscriminacionResueltos']);?>">
              </td>
              <td>Número de procesos con riesgo de efectos de corrupción analizados</td>
              <td>
                <input class="form-control" type="text" name="txtNumTProcesosConRiesgosDeCorrupcionAnalizados"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTProcesosConRiesgosDeCorrupcionAnalizados', @$resultado['txtNumTProcesosConRiesgosDeCorrupcionAnalizados']);?>">
              </td>
            </tr>
            <tr>
              <td>Total de procesos con riesgo de corrupción identificados</td>
              <td>
                <input class="form-control" type="text" name="txtNumTProcesosConRiesgosDeCorrupcionIdentificados"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTProcesosConRiesgosDeCorrupcionIdentificados', @$resultado['txtNumTProcesosConRiesgosDeCorrupcionIdentificados']);?>">
              </td>
              <td>Número de medidas tomadas en respuesta de corrupción</td>
              <td>
                <input class="form-control" type="text" name="txtNumTMedidasAnteIncidentesDeCorrupcion"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTMedidasAnteIncidentesDeCorrupcion', @$resultado['txtNumTMedidasAnteIncidentesDeCorrupcion']);?>">
              </td>
            </tr>
            <tr>
              <td>Número total de incidentes de corrupción ocurridos</td>
              <td>
                <input class="form-control" type="text" name="txtNumTIncidentesDeCorrupcionOcurridos"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTIncidentesDeCorrupcionOcurridos', @$resultado['txtNumTIncidentesDeCorrupcionOcurridos']);?>">
              </td>
              <td>Dias destinados a la educación familiar en el año</td>
              <td>
                <input class="form-control" type="text" name="txtNumTDiasDestinadosAEducacionFamiliar"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTDiasDestinadosAEducacionFamiliar', @$resultado['txtNumTDiasDestinadosAEducacionFamiliar']);?>">
              </td>
            </tr>
            <tr>
              <td>Número de transacciones realizadas en el periodo</td>
              <td>
                <input class="form-control" type="text" name="txtNumTTransacciones"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTTransacciones', @$datoDGASC[0]->NumTTransacciones);?>">
              </td>
              <td>Número de programas o iniciativas de reciclaje </td>
              <td>
                <input class="form-control" type="text" name="txtNumTProgramasDeReciclaje"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTProgramasDeReciclaje', @$resultado['txtNumTProgramasDeReciclaje']);?>">
              </td>
            </tr>
            <tr>
              <td>Total de comprobantes Emitidos</td>
              <td>
                <input class="form-control" type="text" name="txtNumTComprobantesEmitidos"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTComprobantesEmitidos', @$resultado['txtNumTComprobantesEmitidos']);?>">
              </td>
              <td>Comprobantes electronicos</td>
              <td>
                <input class="form-control" type="text" name="txtNumTComprobantesElectronicosEmitidos"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTComprobantesElectronicosEmitidos', @$resultado['txtNumTComprobantesElectronicosEmitidos']);?>">
              </td>
            </tr>
            <tr>
              <td>Número de baterias sanitarias por departamento</td>
              <td>
                <input class="form-control" type="text" name="txtNumTBateriasSanitarias"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTBateriasSanitarias', @$resultado['txtNumTBateriasSanitarias']);?>">
              </td>
              <td>Número de beneficios sociales adicionales que reciben los colaboradores con otro tipo de contrato o relación laboral</td>
              <td>
                <input class="form-control" type="text" name="txtNumTBeneficiosAdicionalesAEmpleadosConContratoNoIndefinido"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTBeneficiosAdicionalesAEmpleadosConContratoNoIndefinido', @$resultado['txtNumTBeneficiosAdicionalesAEmpleadosConContratoNoIndefinido']);?>">
              </td>
            </tr>
            <tr>
              <td>Número de beneficios sociales adicionales que reciben colaboradores con contrato indefinido</td>
              <td>
                <input class="form-control" type="text" name="txtNumTBeneficiosAdicionalesAEmpleadosConContratoIndefinido"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTBeneficiosAdicionalesAEmpleadosConContratoIndefinido', @$resultado['txtNumTBeneficiosAdicionalesAEmpleadosConContratoIndefinido']);?>">
              </td>
              <td>Trabajadores laboran más de un año</td>
              <td>
                <input class="form-control" type="text" name="txtNumTEmpleadosLaboranMasDeAnio"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadosLaboranMasDeAnio', @$resultado['txtNumTEmpleadosLaboranMasDeAnio']);?>">
              </td>
            </tr>
            <tr>
              <td>Número de Mujeres embarazadas</td>
              <td>
                <input class="form-control" type="text" name="txtNumTEmpleadasEmbarazadas"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadasEmbarazadas', @$resultado['txtNumTEmpleadasEmbarazadas']);?>">
              </td>
              <td>Hombres con permiso de paternidad </td>
              <td>
                <input class="form-control" type="text" name="txtNumTEmpleadosConPermisoPaternidad"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadosConPermisoPaternidad', @$resultado['txtNumTEmpleadosConPermisoPaternidad']);?>">
              </td>
            </tr>
            <tr>
              <td>Mujeres reincorporadas después permiso maternidad</td>
              <td>
                <input class="form-control" type="text" name="txtNumTEmpleadasReincorporadasPorMaternidad"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadasReincorporadasPorMaternidad', @$resultado['txtNumTEmpleadasReincorporadasPorMaternidad']);?>">
              </td>
              <td>Mujeres con permiso de maternidad</td>
              <td>
                <input class="form-control" type="text" name="txtNumTEmpleadasConPermisoMaternidad"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadasConPermisoMaternidad', @$resultado['txtNumTEmpleadasConPermisoMaternidad']);?>">
              </td>
            </tr>
            <tr>
              <td>Hombres reincorporados después permiso paternidad</td>
              <td>
                <input class="form-control" type="text" name="txtNumTEmpleadosReincorporadosPorPaternidad"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadosReincorporadosPorPaternidad', @$resultado['txtNumTEmpleadosReincorporadosPorPaternidad']);?>">
              </td>
              <td>Empleados reincorporados por un tiempo mayor al establecido  en caso de permiso de partenidad</td>
              <td>
                <input class="form-control" type="text" name="txtNumTEmpleadosReincorporadosFueraDeTiempoEstablecido"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadosReincorporadosFueraDeTiempoEstablecido', @$resultado['txtNumTEmpleadosReincorporadosFueraDeTiempoEstablecido']);?>">
              </td>
            </tr>
            <tr>
              <td>Total de empleados reincorporados en el tiempo establecido en caso de permiso de paternidad</td>
              <td>
                <input class="form-control" type="text" name="txtNumTEmpleadosReincorporadosATiempoEstablecido"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadosReincorporadosATiempoEstablecido', @$resultado['txtNumTEmpleadosReincorporadosATiempoEstablecido']);?>">
              </td>

              <td>Empleadas reincorporados por un tiempo mayor al establecido  en caso de permiso de maternidad</td>
              <td>
                <input class="form-control" type="text" name="txtNumTEmpleadasReincorporadasFueraDeTiempoEstablecido"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadasReincorporadasFueraDeTiempoEstablecido', @$resultado['txtNumTEmpleadasReincorporadasFueraDeTiempoEstablecido']);?>">
              </td>
            </tr>
            <tr>
              <td>Total de empleadas reincorporados en el tiempo establecido en caso de permiso de maternidad</td>
              <td>
                <input class="form-control" type="text" name="txtNumTEmpleadasReincorporadasATiempoEstablecido"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadasReincorporadasATiempoEstablecido', @$resultado['txtNumTEmpleadasReincorporadasATiempoEstablecido']);?>">
              </td>
              <td>Número de trabajadores a jornada completa de trabajo</td>
              <td>
                <input class="form-control" type="text" name="txtNumTEmpleadosAJornadaCompleta"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadosAJornadaCompleta', @$resultado['txtNumTEmpleadosAJornadaCompleta']);?>">
              </td>
            </tr>
            <tr>
              <td>Número Trabajadores con jornada parcial de trabajo</td>
              <td>
                <input class="form-control" type="text" name="txtNumTEmpleadosAJornadaParcial"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadosAJornadaParcial', @$resultado['txtNumTEmpleadosAJornadaParcial']);?>">
              </td>
              <td>Cantidad de horas suplementarias trabajadas</td>
              <td>
                <input class="form-control" type="text" name="txtNumTHorasSuplementariasTrabajadas"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTHorasSuplementariasTrabajadas', @$resultado['txtNumTHorasSuplementariasTrabajadas']);?>">
              </td>
            </tr>
            <tr>           
              <td>Cantidad de horas extras trabajadas</td>
              <td>
                <input class="form-control" type="text" name="txtNumTHorasExtrasTrabajadas"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTHorasExtrasTrabajadas', @$resultado['txtNumTHorasExtrasTrabajadas']);?>">
              </td>
              <td>Cantidad de productos defectuosos rechazados</td>
              <td>
                <input class="form-control" type="text" name="txtNumTProductosDefectuososRechazados"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTProductosDefectuososRechazados', @$resultado['txtNumTProductosDefectuososRechazados']);?>">
              </td>              
            </tr>
            <tr>              
              <td>Total productos recibidos</td>
              <td>
                <input class="form-control" type="text" name="txtNumTProductosRecibidos"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTProductosRecibidos', @$resultado['txtNumTProductosRecibidos']);?>">
              </td>
              <td>Número de sanciones monetarias </td>
              <td>
                <input class="form-control" type="text" name="txtNumTSancionesMonetarias"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTSancionesMonetarias', @$resultado['txtNumTSancionesMonetarias']);?>">
              </td>
            </tr>
            <tr>              
              <td>Número de horas de trabajo al día según lo establece el Código de Trabajo</td>
              <td>
                <input class="form-control" type="text" name="txtNumTHorasLaboradasPorDiaEmpleados"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTHorasLaboradasPorDiaEmpleados', @$resultado['txtNumTHorasLaboradasPorDiaEmpleados']);?>">
              </td>
              <td>Número de sesiones establecidas por la ley</td>
              <td>
                <input class="form-control" type="text" name="txtNumTSesionesDeConsejosEstablecidasPorLey"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTSesionesDeConsejosEstablecidasPorLey', @$resultado['txtNumTSesionesDeConsejosEstablecidasPorLey']);?>">
              </td>
            </tr>
            <tr>
              <td>Periodo:</td>
              <td>
                    <div class='input-group date' id='divPeriodoC'>
                      <input type='text' id="txtPeriodo" name="txtPeriodo" class="form-control" value="<?php echo set_value('txtPeriodo', @$resultado['txtPeriodo']);?>" readonly/>
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>
              </td>
              <td></td>
              <td>
                
              </td>
            </tr>

            <tr>
              <td colspan="2">
                <input type="submit" name="submit" class="botones" value="Guardar">
              </td>

              <td colspan="2">
                <input type="button" onclick="regresar()" name="" class="botones" value="Regresar">
              </td>
            </tr>

          </tbody>
        </table>
    </form>
    </div>
  </div>

<!-- SECCION D -->
  <div id="menu4" class="tab-pane fade">
    <div class="table-responsive content-4">
    <form action="<?php echo base_url()?>datosAnuales/guardarDGASD" id="TABLABOTON4" method="POST">
        <table class="table table-striped table-bordered table-hover table-condensed">
          <tbody>
            <input type="hidden" name="accion" value="<?php echo $accion; ?>">
            <input type="hidden" name="id" value="<?php echo @$datoDGASD[0]->IdDGASD; ?>">
            <tr>
              <td style="width: 200px">Saldo 10 mayores depositantes</td>
              <td>
                <input class="form-control" type="text" name="txtSaldoT10MayoresDepositantes"  placeholder="Ingresar datos" value="<?php echo set_value('txtSaldoT10MayoresDepositantes', @$resultado['txtSaldoT10MayoresDepositantes']);?>">
              </td>
              <td style="width: 200px">Valor Depósitos a la vista</td>
              <td>
                <input class="form-control" type="text" name="txtValorTDepositoALaVista"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTDepositoALaVista', @$resultado['ValorTDepositoALaVista']);?>">
              </td>
            </tr>
            <tr>
              <td>Valor depósitos a plazo</td>
              <td>
                <input class="form-control" type="text" name="txtValorTDepositoAplazo"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTDepositoAplazo', @$resultado['ValorTDepositoAplazo']);?>">
              </td>
              <td>Monto invertido en  infraestructura</td>
              <td>
                <input class="form-control" type="text" name="txtMontoTInvertidoEnInfraestructura"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTInvertidoEnInfraestructura', @$resultado['txtMontoTInvertidoEnInfraestructura']);?>">
              </td>
            </tr>
            <tr>
              <td>Ingresos operacionales </td>
              <td>
                <input class="form-control" type="text" name="txtValorTIngresosOperacionales"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTIngresosOperacionales', @$resultado['ValorTIngresosOperacionales']);?>">
              </td>
              <td>Total ingresos</td>
              <td>
                <input class="form-control" type="text" name="txtValorTIngresos"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTIngresos', @$resultado['ValorTIngresos']);?>">
              </td>
            </tr>
            <tr>
              <td>Ingresos por venta de activos fijos</td>
              <td>
                <input class="form-control" type="text" name="txtValorTIngresosPorVentaDeActivosFijos"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTIngresosPorVentaDeActivosFijos', @$resultado['ValorTIngresosPorVentaDeActivosFijos']);?>">
              </td>
              <td>Total Ventas en el periodo</td>
              <td>
                <input class="form-control" type="text" name="txtValorTVentas"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTVentas', @$resultado['txtValorTVentas']);?>">
              </td>
            </tr>
            <tr>
              <td>Total ingresos por intereses</td>
              <td>
                <input class="form-control" type="text" name="txtValorTIngresosPorIntereses"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTIngresosPorIntereses', @$resultado['ValorTIngresosPorIntereses']);?>">
              </td>
              <td>Ventas a crédito</td>
              <td>
                <input class="form-control" type="text" name="txtVentasACreditos"  placeholder="Ingresar datos" value="<?php echo set_value('txtVentasACreditos', @$resultado['txtVentasACreditos']);?>">
              </td>
            </tr>
            <tr>
              <td>Ventas a contado</td>
              <td>
                <input class="form-control" type="text" name="txtValorTVentasAContado"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTVentasAContado', @$resultado['txtValorTVentasAContado']);?>">
              </td>
              <td>Margen Financiero</td>
              <td>
                <input class="form-control" type="text" name="txtValorTMargenFinanciero"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTMargenFinanciero', @$resultado['txtValorTMargenFinanciero']);?>">
              </td>
            </tr>
            <tr>
              <td>Gastos Operacionales</td>
              <td>
                <input class="form-control" type="text" name="txtValorTGastosOperacionales"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTGastosOperacionales', @$resultado['ValorTGastosOperacionales']);?>">
              </td>
              <td>Total gastos no operacionales del periodo</td>
              <td>
                <input class="form-control" type="text" name="txtValorTGastosNoOperacionales"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTGastosNoOperacionales', @$resultado['txtValorTGastosNoOperacionales']);?>">
              </td>
            </tr>
            <tr>
              <td>Gastos sueldos y salarios</td>
              <td>
                <input class="form-control" type="text" name="txtValorTSueldosYSalarios"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTSueldosYSalarios', @$resultado['ValorTSueldosYSalarios']);?>">
              </td>
              <td>Monto de créditos de consumo socios</td>
              <td>
                <input class="form-control" type="text" name="txtMontoTCreditoConsumoSocios"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTCreditoConsumoSocios', @$resultado['MontoTCreditoConsumoSocios']);?>">
              </td>
            </tr>
            <tr>
              <td>Monto total de créditos otorgados </td>
              <td>
                <input class="form-control" type="text" name="txtMontoTCreditos"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTCreditos', @$resultado['txtMontoTCreditos']);?>">
              </td>
              <td>Monto de créditos de vivienda socios </td>
              <td>
                <input class="form-control" type="text" name="txtMontoTCreditoViviendaSocios"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTCreditoViviendaSocios', @$resultado['MontoCreditosViviendaSocios']);?>">
              </td>
            </tr>
            <tr>
              <td>Monto de microcréditos socios</td>
              <td>
                <input class="form-control" type="text" name="txtMontoTCreditoMicrocreditoSocios"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTCreditoMicrocreditoSocios', @$resultado['MontoTCreditoMicrocreditoSocios']);?>">
              </td>
              <td>Monto de créditos comercial socios</td>
              <td>
                <input class="form-control" type="text" name="txtMontoTCreditoComercialSocios"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTCreditoComercialSocios', @$resultado['MontoTCreditoComercialSocios']);?>">
              </td>
            </tr>
            <tr>
              <td>Monto de créditos inmobiliario  socios</td>
              <td>
                <input class="form-control" type="text" name="txtMontoTCreditoInmobiliarioSocios"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTCreditoInmobiliarioSocios', @$resultado['txtMontoTCreditoInmobiliarioSocios']);?>">
              </td>
              <td>Valor de Cartera de crédito</td>
              <td>
                <input class="form-control" type="text" name="txtValorTCarteraCredito"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTCarteraCredito', @$resultado['ValorTCarteraCredito']);?>">
              </td>
            </tr>
            <tr>
              <td>Saldo de cartera de credito para necesidades sociales</td>
              <td>
                <input class="form-control" type="text" name="txtSaldoTCarteraCreditoParaNecesidadSocial"  placeholder="Ingresar datos" value="<?php echo set_value('txtSaldoTCarteraCreditoParaNecesidadSocial', @$resultado['txtSaldoTCarteraCreditoParaNecesidadSocial']);?>">
              </td>
              <td>Saldo de cartera de credito para necesidades productivas</td>
              <td>
                <input class="form-control" type="text" name="txtSaldoTCarteraCreditoParaNecesidadProductiva"  placeholder="Ingresar datos" value="<?php echo set_value('txtSaldoTCarteraCreditoParaNecesidadProductiva', @$resultado['txtSaldoTCarteraCreditoParaNecesidadProductiva']);?>">
              </td>
            </tr>
            <tr>
              <td>Cartera vencida</td>
              <td>
                <input class="form-control" type="text" name="txtValorTCarteraVencida"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTCarteraVencida', @$resultado['ValorTCarteraVencida']);?>">
              </td>
              <td>Endeudamiento externo (Obligaciones con Instituciones Financieras sector público, privado o del exterior)</td>
              <td>
                <input class="form-control" type="text" name="txtValorTEndeudamientoExterno"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTEndeudamientoExterno', @$resultado['txtValorTEndeudamientoExterno']);?>">
              </td>
            </tr>
            <tr>
              <td>Monto de las compras a contado</td>
              <td>
                <input class="form-control" type="text" name="txtMontoTComprasAContado"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTComprasAContado', @$resultado['txtMontoTComprasAContado']);?>">
              </td>
              <td>Monto de las compras a crédito</td>
              <td>
                <input class="form-control" type="text" name="txtMontoTComprasACredito"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTComprasACredito', @$resultado['txtMontoTComprasACredito']);?>">
              </td>
            </tr>
            <tr>
              <td>Monto de compras a proveedores locales</td>
              <td>
                <input class="form-control" type="text" name="txtMontoTComprasAProveedoresLocales"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTComprasAProveedoresLocales', @$resultado['txtMontoTComprasAProveedoresLocales']);?>">
              </td>
              <td>Monto de compras a proveedores internacionales </td>
              <td>
                <input class="form-control" type="text" name="txtMontoTComprasAProveedoresInternacionales"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTComprasAProveedoresInternacionales', @$resultado['txtMontoTComprasAProveedoresInternacionales']);?>">
              </td>
            </tr>
            <tr>
              <td>Compras a asociaciones</td>
              <td>
                <input class="form-control" type="text" name="txtMontoTComprasAAsociaciones"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTComprasAAsociaciones', @$resultado['txtMontoTComprasAAsociaciones']);?>">
              </td>
              <td>Presupuesto para adquisiciones de operac. significativas proveedores locales</td>
              <td>
                <input class="form-control" type="text" name="txtPresupuestoAdquisicionesDestinadasAProveedoresLocales"  placeholder="Ingresar datos" value="<?php echo set_value('txtPresupuestoAdquisicionesDestinadasAProveedoresLocales', @$resultado['txtPresupuestoAdquisicionesDestinadasAProveedoresLocales']);?>">
              </td>
            </tr>
            <tr>
              <td>Total presupuesto para adquisiciones</td>
              <td>
                <input class="form-control" type="text" name="txtValorTPresupuestoAdquisicion"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPresupuestoAdquisicion', @$resultado['txtValorTPresupuestoAdquisicion']);?>">
              </td>
              <td>Valor por sanciones impuestos por los organismos de control</td>
              <td>
                <input class="form-control" type="text" name="txtValorTSancionesPorOrganismosDeControl"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTSancionesPorOrganismosDeControl', @$resultado['ValorTSancionesPorOrganismosDeControl']);?>">
              </td>
            </tr>
            <tr>
              <td>Valor por IVA Pagado en el periodo </td>
              <td>
                <input class="form-control" type="text" name="txtValorTPagadoPorIVA"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPagadoPorIVA', @$resultado['ValorTPagadoPorIVA']);?>">
              </td>
              <td>Total contribuciones al Estado</td>
              <td>
                <input class="form-control" type="text" name="txtValorTContribucionesAlEstado"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTContribucionesAlEstado', @$resultado['ValorTContribucionesAlEstado']);?>">
              </td>
            </tr>
            <tr>
              <td>Valor pagado por retenciones en el periodo</td>
              <td>
                <input class="form-control" type="text" name="txtValorTPagadoPorRetenciones"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPagadoPorRetenciones', @$resultado['ValorTPagadoPorRetenciones']);?>">
              </td>
              <td>Valor pagado del Impuesto a la Renta en el periodo</td>
              <td>
                <input class="form-control" type="text" name="txtValorTPagadoPorImpuestoALaRenta"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPagadoPorImpuestoALaRenta', @$resultado['ValorTPagadoPorImpuestoALaRenta']);?>">
              </td>
            </tr>
            <tr>
              <td>Valor de subvenciones gubernamentales</td>
              <td>
                <input class="form-control" type="text" name="txtValorTSubvencionesGubernamentales"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTSubvencionesGubernamentales', @$resultado['ValorTSubvencionesGubernamentales']);?>">
              </td>
              <td>Valor Total de Captación procedente de COAC</td>
              <td>
                <input class="form-control" type="text" name="txtValorTCaptacionProcedenteCOAC"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTCaptacionProcedenteCOAC', @$resultado['txtValorTCaptacionProcedenteCOAC']);?>">
              </td>
            </tr>
            <tr>
              <td>Valor Total de Captaciones</td>
              <td>
                <input class="form-control" type="text" name="txtValorTCaptaciones"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTCaptaciones', @$resultado['txtValorTCaptaciones']);?>">
              </td>
              <td>Periodo:</td>
              <td>
                    <div class='input-group date' id='divPeriodoD'>
                      <input type='text' id="txtPeriodo" name="txtPeriodo" class="form-control" value="<?php echo set_value('txtPeriodo', @$resultado['txtPeriodo']);?>" readonly/>
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>
              </td>
            </tr>

            <tr>
              <td colspan="2">
                <input type="submit" name="submit" class="botones" value="Guardar">
              </td>

              <td colspan="2">
                <input type="button" onclick="regresar()" name="" class="botones" value="Regresar">
              </td>
            </tr>

          </tbody>
        </table>
    </form>
    </div>
    </div>

<!-- SECCION E -->
  <div id="menu5" class="tab-pane fade">
    <div class="table-responsive content-5">
    <form action="<?php echo base_url()?>datosAnuales/guardarDGASE" id="TABLABOTON5" method="POST">
        <table class="table table-striped table-bordered table-hover table-condensed">
          <tbody>
            <input type="hidden" name="accion" value="<?php echo $accion; ?>">
            <input type="hidden" name="id" value="<?php echo @$datoDGASE[0]->IdDGASE; ?>">
            <tr>
              <td style="width: 200px">Monto gastado en informar sobre Asambleas:</td>
              <td>
                <input class="form-control" type="text" name="txtMontoTGastoEnInformarSobreAsambleas"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTGastoEnInformarSobreAsambleas', @$resultado['txtMontoTGastoEnInformarSobreAsambleas']);?>">
              </td>
              <td style="width: 200px">Gasto total de la organización :</td>
              <td>
                <input class="form-control" type="text" name="txtGastoTotalDeOrganizacion"  placeholder="Ingresar datos" value="<?php echo set_value('txtGastoTotalDeOrganizacion', @$resultado['GastoTotalDeOrganizacion']);?>">
              </td>
            </tr>
            <tr>
              <td>Monto gastado en informar sobre Consejo de Administración:</td>
              <td>
                <input class="form-control" type="text" name="txtMontoTGastoEnInformarSobreConsejoAdministracion"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTGastoEnInformarSobreConsejoAdministracion', @$resultado['txtMontoTGastoEnInformarSobreConsejoAdministracion']);?>">
              </td>
              <td>Monto gastado en transmisión de otra información:</td>
              <td>
                <input class="form-control" type="text" name="txtMontoTGastoEnInformarSobreOtraInformacion"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTGastoEnInformarSobreOtraInformacion', @$resultado['txtMontoTGastoEnInformarSobreOtraInformacion']);?>">
              </td>
            </tr>
            <tr>
              <td>Total Activos del periodo:</td>
              <td>
                <input class="form-control" type="text" name="txtValorTActivos"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTActivos', @$resultado['ValorTActivos']);?>">
              </td>
              <td>Costo de comprobantes de venta y retención antes de facturación electrónica:</td>
              <td>
                <input class="form-control" type="text" name="txtCostoComprobanteVentaRetencionAntesFacturacionElectronica"  placeholder="Ingresar datos" value="<?php echo set_value('txtCostoComprobanteVentaRetencionAntesFacturacionElectronica', @$resultado['txtCostoComprobanteVentaRetencionAntesFacturacionElectronica']);?>">
              </td>
            </tr>
            <tr>
              <td>Costo de adquisición de facturación electrónica despues de facturación electrónica:</td>
              <td>
                <input class="form-control" type="text" name="txtCostoComprobanteVentaRetencionDespuesFacturaElectronica"  placeholder="Ingresar datos" value="<?php echo set_value('txtCostoComprobanteVentaRetencionDespuesFacturaElectronica', @$resultado['txtCostoComprobanteVentaRetencionDespuesFacturaElectronica']);?>">
              </td>
              <td>Valor del combustible utilizado en el trasporte de productos y servicios:</td>
              <td>
                <input class="form-control" type="text" name="txtGastoTGasolinaEnEnvioProductosServicios"  placeholder="Ingresar datos" value="<?php echo set_value('txtGastoTGasolinaEnEnvioProductosServicios', @$resultado['txtGastoTGasolinaEnEnvioProductosServicios']);?>">
              </td>
            </tr>
            <tr>
              <td>Gasto de multas por normas ambientales:</td>
              <td>
                <input class="form-control" type="text" name="txtGastoTMultasNormasAmbientales"  placeholder="Ingresar datos" value="<?php echo set_value('txtGastoTMultasNormasAmbientales', @$resultado['GastoTMultasNormasAmbientales']);?>">
              </td>
              <td>Gasto en equipamiento año actual :</td>
              <td>
                <input class="form-control" type="text" name="txtGastoTEquipamiento"  placeholder="Ingresar datos" value="<?php echo set_value('txtGastoTEquipamiento', @$resultado['txtGastoTEquipamiento']);?>">
              </td>
            </tr>
            <tr>
              <td>Gastos asignados a la eliminación residuos año actual:</td>
              <td>
                <input class="form-control" type="text" name="txtGastoTAsignadoAEliminarResiduo"  placeholder="Ingresar datos" value="<?php echo set_value('txtGastoTAsignadoAEliminarResiduo', @$resultado['txtGastoTAsignadoAEliminarResiduo']);?>">
              </td>
              <td>Gasto de limpieza año actual:</td>
              <td>
                <input class="form-control" type="text" name="txtGastoTLimpieza"  placeholder="Ingresar datos" value="<?php echo set_value('txtGastoTLimpieza', @$resultado['txtGastoTLimpieza']);?>">
              </td>
            </tr>
            <tr>
              <td>Valor aportación del trabajador:</td>
              <td>
                <input class="form-control" type="text" name="txtValorTAportacionEmpleados"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTAportacionEmpleados', @$resultado['txtValorTAportacionEmpleados']);?>">
              </td>
              <td>Valor de aportación del patrono:</td>
              <td>
                <input class="form-control" type="text" name="txtValorTAportacionPatrono"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTAportacionPatrono', @$resultado['txtValorTAportacionPatrono']);?>">
              </td>
            </tr>
            <tr>
              <td>Valor total de aportaciones en el periodo:</td>
              <td>
                <input class="form-control" type="text" name="txtValorTAportaciones"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTAportaciones', @$resultado['ValorTAportaciones']);?>">
              </td>
              <td>Aportes a empleados a jornada completa:</td>
              <td>
                <input class="form-control" type="text" name="txtValorTAportesAEmpleadosAJornadaCompleta"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTAportesAEmpleadosAJornadaCompleta', @$resultado['txtValorTAportesAEmpleadosAJornadaCompleta']);?>">
              </td>
            </tr>
            <tr>
              <td>Valor pagado a los empleados menores de un año por vacaciones no tomadas :</td>
              <td>
                <input class="form-control" type="text" name="txtValorTPagadoAEmpleadosPorVacacionesNoTomadasEnMenosDeAnio"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPagadoAEmpleadosPorVacacionesNoTomadasEnMenosDeAnio', @$resultado['txtValorTPagadoAEmpleadosPorVacacionesNoTomadasEnMenosDeAnio']);?>">
              </td>
              <td>Valor por vacaciones a los empleados:</td>
              <td>
                <input class="form-control" type="text" name="txtValorTPagadoPorVacaciones"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPagadoPorVacaciones', @$resultado['txtValorTPagadoPorVacaciones']);?>">
              </td>
            </tr>
            <tr>
              <td>Valor pagado del Décimo Tercero:</td>
              <td>
                <input class="form-control" type="text" name="txtValorTPagadoDecimoTercero"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPagadoDecimoTercero', @$resultado['txtValorTPagadoDecimoTercero']);?>">
              </td>
              <td>Total provisionado en el periodo :</td>
              <td>
                <input class="form-control" type="text" name="txtValorTProvisionAnio"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTProvisionAnio', @$resultado['txtValorTProvisionAnio']);?>">
              </td>
            </tr>
            <tr>
              <td>Valor por pagar provisión del Décimo Tercero en el periodo :</td>
              <td>
                <input class="form-control" type="text" name="txtValorTPorPagarProvisionDecimoTercero"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPorPagarProvisionDecimoTercero', @$resultado['txtValorTPorPagarProvisionDecimoTercero']);?>">
              </td>
              <td>Valor pagado del Décimo Cuarto en el periodo:</td>
              <td>
                <input class="form-control" type="text" name="txtValorTPagadoDecimoCuarto"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPagadoDecimoCuarto', @$resultado['txtValorTPagadoDecimoCuarto']);?>">
              </td>
            </tr>
            <tr>
              <td>Valor del fondo de reserva pagado mensualmente:</td>
              <td>
                <input class="form-control" type="text" name="txtValorTFondoReservaPagadoMensual"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTFondoReservaPagadoMensual', @$resultado['txtValorTFondoReservaPagadoMensual']);?>">
              </td>
              <td>Total fondo de reserva:</td>
              <td>
                <input class="form-control" type="text" name="txtValorTFondoReserva"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTFondoReserva', @$resultado['ValorTFondoReserva']);?>">
              </td>
            </tr>
            <tr>
              <td>Valor pasivos en el periodo:</td>
              <td>
                <input class="form-control" type="text" name="txtValorTPasivos"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPasivos', @$resultado['ValorTPasivos']);?>">
              </td>
              <td>Valor del patrimonio en el periodo actual:</td>
              <td>
                <input class="form-control" type="text" name="txtValorTPatrimonio"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPatrimonio', @$resultado['ValorTPatrimonio']);?>">
              </td>
            </tr>
            <tr>
              <td>capital social aportado en el periodo:</td>
              <td>
                <input class="form-control" type="text" name="txtValorTCapitalSocial"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTCapitalSocial', @$resultado['txtValorTCapitalSocial']);?>">
              </td>
              <td>Patrimonio técnico constituido:</td>
              <td>
                <input class="form-control" type="text" name="txtValorTPatrimonioTecnicoConstituido"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPatrimonioTecnicoConstituido', @$resultado['txtValorTPatrimonioTecnicoConstituido']);?>">
              </td>
            </tr>
            <tr>              
              <td>Patrimonio técnico requerido:</td>
              <td>
                <input class="form-control" type="text" name="txtValorTPatrimonioTecnicoRequerido"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPatrimonioTecnicoRequerido', @$resultado['txtValorTPatrimonioTecnicoRequerido']);?>">
              </td>
              <td>Utilidad del Ejercicio del periodo :</td>
              <td>
                <input class="form-control" type="text" name="txtUtilidadTEjercicio"  placeholder="Ingresar datos" value="<?php echo set_value('txtUtilidadTEjercicio', @$resultado['UtilidadTEjercicio']);?>">
              </td>
            </tr>
            <tr>              
              <td>Valor de reserva legal periodo actual:</td>
              <td>
                <input class="form-control" type="text" name="txtValorTReservaLegal"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTReservaLegal', @$resultado['ValorTReservaLegal']);?>">
              </td>
              <td>Total reservas:</td>
              <td>
                <input class="form-control" type="text" name="txtValorTReserva"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTReserva', @$resultado['ValorTReserva']);?>">
              </td>
            </tr>
            <tr>              
              <td>Activo corriente:</td>
              <td>
                <input class="form-control" type="text" name="txtValorTActivosCorriente"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTActivosCorriente', @$resultado['ValorTActivosCorriente']);?>">
              </td>
              <td>Pasivo corriente:</td>
              <td>
                <input class="form-control" type="text" name="txtValorTPasivosCorriente"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPasivosCorriente', @$resultado['txtValorTPasivosCorriente']);?>">
              </td>
            </tr>
            <tr>              
              <td>Valor atribuido al estado por organismos de control sobre sanciones y multas en el periodo:</td>
              <td>
                <input class="form-control" type="text" name="txtValorTAtribuidoAlEstadoPorOrganismosDeControl"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTAtribuidoAlEstadoPorOrganismosDeControl', @$resultado['txtValorTAtribuidoAlEstadoPorOrganismosDeControl']);?>">
              </td>
              <td>Periodo:</td>
              <td>
                    <div class='input-group date' id='divPeriodoE'>
                      <input type='text' id="txtPeriodo" name="txtPeriodo" class="form-control" value="<?php echo set_value('txtPeriodo', @$resultado['txtPeriodo']);?>" readonly/>
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>
              </td>
            </tr>

            <tr>
              <td colspan="2">
                <input type="submit" name="submit" class="botones" value="Guardar">
              </td>

              <td colspan="2">
                <input type="button" onclick="regresar()" name="" class="botones" value="Regresar">
              </td>
            </tr>

          </tbody>
        </table>
    </form>
    </div>
  </div>

<!-- SECCION F -->
  <div id="menu6" class="tab-pane fade">
    <div class="table-responsive content-6">
    <form action="<?php echo base_url()?>datosAnuales/guardarDGASF" id="TABLABOTON6" method="POST">
        <table class="table table-striped table-bordered table-hover table-condensed">
          <tbody>
            <input type="hidden" name="accion" value="<?php echo $accion; ?>">
            <input type="hidden" name="id" value="<?php echo @$datoDGASF[0]->IdDGASF; ?>">
            <tr>
              <td style="width: 200px">Valor de créditos otorgados a socios con depósitos inferiores al 20%</td>
              <td>
                <input class="form-control" type="text" name="txtValorCreditoASociosConDepositoMenorA20Porciento"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorCreditoASociosConDepositoMenorA20Porciento', @$resultado['txtValorCreditoASociosConDepositoMenorA20Porciento']);?>">
              </td>
              <td style="width: 200px">Valor de créditos otorgados a socios con aportes inferiores a la media</td>
              <td>
                <input class="form-control" type="text" name="txtValorCreditoASociosConAporteMenorALaMedia"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorCreditoASociosConAporteMenorALaMedia', @$resultado['txtValorCreditoASociosConAporteMenorALaMedia']);?>">
              </td>
            </tr>
            <tr>
              <td>Valor de créditos a socios que poseen el mínimo de capital exigido</td>
              <td>
                <input class="form-control" type="text" name="txtValorCreditoASociosConMinCapitalExigido"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorCreditoASociosConMinCapitalExigido', @$resultado['txtValorCreditoASociosConMinCapitalExigido']);?>">
              </td>
              <td>Monto promedio de créditos de consumo concedidos por primera vez periodo actual</td>
              <td>
                <input class="form-control" type="text" name="txtMontoPromedioCreditoConsumoConcedidoPrimeraVez"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoPromedioCreditoConsumoConcedidoPrimeraVez', @$resultado['txtMontoPromedioCreditoConsumoConcedidoPrimeraVez']);?>">
              </td>
            </tr>
            <tr>
              <td>Monto promedio de créditos de vivienda a socios nuevos concedido por primera vez en el periodo</td>
              <td>
                <input class="form-control" type="text" name="txtMontoPromedioCreditoViviendaConcedidoPrimeraVez"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoPromedioCreditoViviendaConcedidoPrimeraVez', @$resultado['txtMontoPromedioCreditoViviendaConcedidoPrimeraVez']);?>">
              </td>
              <td>Monto promedio de microcréditos a socios nuevos cencedidos por primera vez en el periodo</td>
              <td>
                <input class="form-control" type="text" name="txtMontoPromedioMicrocreditoASociosNuevosPrimeraVez"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoPromedioMicrocreditoASociosNuevosPrimeraVez', @$resultado['txtMontoPromedioMicrocreditoASociosNuevosPrimeraVez']);?>">
              </td>
            </tr>
            <tr>
              <td>Monto promedio de créditos de comercio a socios nuevos concedidos por primera vez en el periodo</td>
              <td>
                <input class="form-control" type="text" name="txtMontoPromedioCreditoComercioASociosNuevosPrimeraVez"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoPromedioCreditoComercioASociosNuevosPrimeraVez', @$resultado['txtMontoPromedioCreditoComercioASociosNuevosPrimeraVez']);?>">
              </td>
              <td>Monto promedio de créditos vinculadosen el periodo</td>
              <td>
                <input class="form-control" type="text" name="txtMontoPromedioCreditosVinculados"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoPromedioCreditosVinculados', @$resultado['txtMontoPromedioCreditosVinculados']);?>">
              </td>
            </tr>
            <tr>
              <td>Monto de certificados de aportación poseídos por el socio mayoritario</td>
              <td>
                <input class="form-control" type="text" name="txtMontoCertificadosAportacionPoseidosPorSocioMayoritario"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoCertificadosAportacionPoseidosPorSocioMayoritario', @$resultado['txtMontoCertificadosAportacionPoseidosPorSocioMayoritario']);?>">
              </td>
              <td>Monto de certificados de aportación poseídos por el socio minoristas</td>
              <td>
                <input class="form-control" type="text" name="txtMontoCertificadosAportacionPoseidosPorSocioMinorista"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoCertificadosAportacionPoseidosPorSocioMinorista', @$resultado['txtMontoCertificadosAportacionPoseidosPorSocioMinorista']);?>">
              </td>
            </tr>
            <tr>
              <td>Tasa media de interés sobre los certificados de aportación</td>
              <td>
                <input class="form-control" type="text" name="txtTasaMediaInteresSobreCertificadosDeAportacion"  placeholder="Ingresar datos" value="<?php echo set_value('txtTasaMediaInteresSobreCertificadosDeAportacion', @$resultado['txtTasaMediaInteresSobreCertificadosDeAportacion']);?>">
              </td>
              <td>Valor agregado cooperativo distribuido a trabajadores</td>
              <td>
                <input class="form-control" type="text" name="txtValorAgregadoCooperativoDistribuidoATrabajadores"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorAgregadoCooperativoDistribuidoATrabajadores', @$resultado['txtValorAgregadoCooperativoDistribuidoATrabajadores']);?>">
              </td>
            </tr>
            <tr>
              <td>Prestaciones personales</td>
              <td>
                <input class="form-control" type="text" name="txtValorPrestacionesPersonales"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorPrestacionesPersonales', @$resultado['txtValorPrestacionesPersonales']);?>">
              </td>
              <td>Prestaciones colectivas</td>
              <td>
                <input class="form-control" type="text" name="txtValorPrestacionesColectivas"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorPrestacionesColectivas', @$resultado['txtValorPrestacionesColectivas']);?>">
              </td>
            </tr>
            <tr>
              <td>Gasto de formación para trabajadores</td>
              <td>
                <input class="form-control" type="text" name="txtGastoEnFormacionATrabajadores"  placeholder="Ingresar datos" value="<?php echo set_value('txtGastoEnFormacionATrabajadores', @$resultado['txtGastoEnFormacionATrabajadores']);?>">
              </td>
              <td>Valor por becas, ayudas, servicios</td>
              <td>
                <input class="form-control" type="text" name="txtValorBecasAyudasServicios"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorBecasAyudasServicios', @$resultado['txtValorBecasAyudasServicios']);?>">
              </td>
            </tr>
            <tr>
              <td>Impuesto y tasa varias</td>
              <td>
                <input class="form-control" type="text" name="txtValorImpuestoYTasaVarias"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorImpuestoYTasaVarias', @$resultado['txtValorImpuestoYTasaVarias']);?>">
              </td>
              <td>Donación del fondo de Educación a la comunidad</td>
              <td>
                <input class="form-control" type="text" name="txtValorDonacionFondoEducacion"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorDonacionFondoEducacion', @$resultado['txtValorDonacionFondoEducacion']);?>">
              </td>
            </tr>
            <tr>
              <td>Fondo de Solidaridad</td>
              <td>
                <input class="form-control" type="text" name="txtValorFondoDeSolidaridad"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorFondoDeSolidaridad', @$resultado['txtValorFondoDeSolidaridad']);?>">
              </td>
              <td>Donativos a la comunidad</td>
              <td>
                <input class="form-control" type="text" name="txtValorDonativosAComunidad"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorDonativosAComunidad', @$resultado['txtValorDonativosAComunidad']);?>">
              </td>
            </tr>
            <tr>
              <td>Excedente Bruto</td>
              <td>
                <input class="form-control" type="text" name="txtValorExcedenteBruto"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorExcedenteBruto', @$resultado['txtValorExcedenteBruto']);?>">
              </td>
              <td>Impuestos sobre excedentes</td>
              <td>
                <input class="form-control" type="text" name="txtValorImpuestosSobreExcedentes"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorImpuestosSobreExcedentes', @$resultado['txtValorImpuestosSobreExcedentes']);?>">
              </td>
            </tr>
            <tr>
              <td>Dotación del fondo de Educación a los Socios</td>
              <td>
                <input class="form-control" type="text" name="txtValorDotacionDeFondoEducacion"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorDotacionDeFondoEducacion', @$resultado['txtValorDotacionDeFondoEducacion']);?>">
              </td>
              <td>Fondo de Reserva Irrepartibles</td>
              <td>
                <input class="form-control" type="text" name="txtValorFondoDeReservaIrrepartibles"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorFondoDeReservaIrrepartibles', @$resultado['txtValorFondoDeReservaIrrepartibles']);?>">
              </td>
            </tr>
            <tr>
              <td>Fondo de Reserva Repartibles</td>
              <td>
                <input class="form-control" type="text" name="txtValorFondoDeReservaRepartibles"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorFondoDeReservaRepartibles', @$resultado['txtValorFondoDeReservaRepartibles']);?>">
              </td>
              <td>Precio pagado a los asociados por compra de materias</td>
              <td>
                <input class="form-control" type="text" name="txtPrecioPagadoAAsociadosPorCompraDeMaterial"  placeholder="Ingresar datos" value="<?php echo set_value('txtPrecioPagadoAAsociadosPorCompraDeMaterial', @$resultado['txtPrecioPagadoAAsociadosPorCompraDeMaterial']);?>">
              </td>
            </tr>
            <tr>
              <td>Descuento realizado a socios en ventas a productores</td>
              <td>
                <input class="form-control" type="text" name="txtDescuentoRealizadoASociosEnVentasAProductores"  placeholder="Ingresar datos" value="<?php echo set_value('txtDescuentoRealizadoASociosEnVentasAProductores', @$resultado['txtDescuentoRealizadoASociosEnVentasAProductores']);?>">
              </td>
              <td>Gastos por servicos voluntarios gratuitos a socios</td>
              <td>
                <input class="form-control" type="text" name="txtGastosPorServiciosVoluntariosGratuitosASocios"  placeholder="Ingresar datos" value="<?php echo set_value('txtGastosPorServiciosVoluntariosGratuitosASocios', @$resultado['txtGastosPorServiciosVoluntariosGratuitosASocios']);?>">
              </td>
            </tr>
            <tr>
              <td>Dotación Fondo de Reservas  Irrepartibles</td>
              <td>
                <input class="form-control" type="text" name="txtValorDotacionFondoDeReservaIrrepartibles"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorDotacionFondoDeReservaIrrepartibles', @$resultado['txtValorDotacionFondoDeReservaIrrepartibles']);?>">
              </td>
              <td>Otras Reservas</td>
              <td>
                <input class="form-control" type="text" name="txtValorOtrasReservas"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorOtrasReservas', @$resultado['txtValorOtrasReservas']);?>">
              </td>
            </tr>
            <tr>
              <td>Total depósitos realizados</td>
              <td>
                <input class="form-control" type="text" name="txtSaldoTDepositos"  placeholder="Ingresar datos" value="<?php echo set_value('txtSaldoTDepositos', @$resultado['txtSaldoTDepositos']);?>">
              </td>
              <td>Total comprobantes físicos emitidos</td>
              <td>
                <input class="form-control" type="text" name="txtNumTComprobantesFisicosEmitidos"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTComprobantesFisicosEmitidos', @$resultado['txtNumTComprobantesFisicosEmitidos']);?>">
              </td>
            </tr>
            <tr>
              <td>Gasto total multas </td>
              <td>
                <input class="form-control" type="text" name="txtGastoTMultas"  placeholder="Ingresar datos" value="<?php echo set_value('txtGastoTMultas', @$resultado['txtGastoTMultas']);?>">
              </td>
              <td>Valor Beneficios de ley</td>
              <td>
                <input class="form-control" type="text" name="txtValorTBeneficiosDeLey"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTBeneficiosDeLey', @$resultado['ValorTBeneficiosDeLey']);?>">
              </td>
            </tr>
            <tr>
              <td>Número de limpiezas realizadas por día</td>
              <td>
                <input class="form-control" type="text" name="txtNumTLimpiezasPorDia"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTLimpiezasPorDia', @$resultado['txtNumTLimpiezasPorDia']);?>">
              </td>
              <td>Número de limpiezas programadas por día</td>
              <td>
                <input class="form-control" type="text" name="txtNumTLimpiezasProgramadasPorDia"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTLimpiezasProgramadasPorDia', @$resultado['txtNumTLimpiezasProgramadasPorDia']);?>">
              </td>
            </tr>
            <tr>
              <td>Empleados que no gozaron de las vacaciones</td>
              <td>
                <input class="form-control" type="text" name="txtNumTEmpeladosQueNoGozaronVacaciones"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpeladosQueNoGozaronVacaciones', @$resultado['txtNumTEmpeladosQueNoGozaronVacaciones']);?>">
              </td>
              <td>Provisión Décimo Cuarto</td>
              <td>
                <input class="form-control" type="text" name="txtValorTPorPagarProvisionDecimoCuarto"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPorPagarProvisionDecimoCuarto', @$resultado['txtValorTPorPagarProvisionDecimoCuarto']);?>">
              </td>
            </tr>
            <tr>
              <td>Numero de accidentes </td>
              <td>
                <input class="form-control" type="text" name="txtNumTAccidentes5Anios"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTAccidentes5Anios', @$resultado['txtNumTAccidentes5Anios']);?>">
              </td>
              <td>Empleados evaluados en el desempeño profesional </td>
              <td>
                <input class="form-control" type="text" name="txtNumTEmpleadosEvaluadosDesempenioProfesional"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadosEvaluadosDesempenioProfesional', @$resultado['txtNumTEmpleadosEvaluadosDesempenioProfesional']);?>">
              </td>
            </tr>
            <tr>
              <td>Valor aportación capital social </td>
              <td>
                <input class="form-control" type="text" name="txtValorTAportacionesCapitalSocial"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTAportacionesCapitalSocial', @$datoDGASF[0]->ValorTAportacionesCapitalSocial);?>">
              </td>
              <td>Tasa pasiva captacion del público </td>
              <td>
                <input class="form-control" type="text" name="txtTasaPasivaCaptacionDelPublicoPonderada"  placeholder="Ingresar datos" value="<?php echo set_value('txtTasaPasivaCaptacionDelPublicoPonderada', @$resultado['txtTasaPasivaCaptacionDelPublicoPonderada']);?>">
              </td>
            </tr>
            <tr>
              <td>Monto total compras </td>
              <td>
                <input class="form-control" type="text" name="txtMontoTCompras"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTCompras', @$resultado['txtMontoTCompras']);?>">
              </td>
              <td>Valro agregado cooperativo distribuido a la comunidad</td>
              <td>
                <input class="form-control" type="text" name="txtValorAgregadoCooperativoDistribuidoAComunidad"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorAgregadoCooperativoDistribuidoAComunidad', @$resultado['txtValorAgregadoCooperativoDistribuidoAComunidad']);?>">
              </td>
            </tr>
            <tr>
              <td>Valor agregado cooperativo distribuido a socios </td>
              <td>
                <input class="form-control" type="text" name="txtValorAgregadoCooperativoDistribuidoASocios"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorAgregadoCooperativoDistribuidoASocios', @$resultado['txtValorAgregadoCooperativoDistribuidoASocios']);?>">
              </td>
              <td>Valor agregado cooperativo incorporado a Patrimonio común</td>
              <td>
                <input class="form-control" type="text" name="txtValorAgregadoCooperativoIncorporadoAPatrimonioComun"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorAgregadoCooperativoIncorporadoAPatrimonioComun', @$resultado['txtValorAgregadoCooperativoIncorporadoAPatrimonioComun']);?>">
              </td>
            </tr>
            <tr>
              <td>Compras a entidades reconocidas como de comercio justo </td>
              <td>
                <input class="form-control" type="text" name="txtValorComprasRealizadasAEntidadesReconocidasComoDeComercioJusto"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorComprasRealizadasAEntidadesReconocidasComoDeComercioJusto', @$resultado['txtValorComprasRealizadasAEntidadesReconocidasComoDeComercioJusto']);?>">
              </td>
              <td>Ventas a entidades reconocidas como de comercio justo</td>
              <td>
                <input class="form-control" type="text" name="txtValorVentasRealizadasAEntidadesReconocidasComoComercioJusto"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorVentasRealizadasAEntidadesReconocidasComoComercioJusto', @$resultado['txtValorVentasRealizadasAEntidadesReconocidasComoComercioJusto']);?>">
              </td>
            </tr>
            <tr>
              <td>Valor depósitos procedentes de entidades como de comercio justo </td>
              <td>
                <input class="form-control" type="text" name="txtValorDepositosProcedenteDeEntidadesReconocidasComoComercioJusto"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorDepositosProcedenteDeEntidadesReconocidasComoComercioJusto', @$resultado['txtValorDepositosProcedenteDeEntidadesReconocidasComoComercioJusto']);?>">
              </td>
              <td>Valor créditos otorgados a entidades reconocidas como comercio justo</td>
              <td>
                <input class="form-control" type="text" name="txtValorCreditosOtorgadosAEntidadesReconocidasComoComercioJusto"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorCreditosOtorgadosAEntidadesReconocidasComoComercioJusto', @$resultado['txtValorCreditosOtorgadosAEntidadesReconocidasComoComercioJusto']);?>">
              </td>
            </tr>
            <tr>
              <td>Valor aportes (capital social) ingresados en el año </td>
              <td>
                <input class="form-control" type="text" name="txtValorTAportesIngresados"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTAportesIngresados', @$resultado['txtValorTAportesIngresados']);?>">
              </td>
              <td>Periodo:</td>
              <td>
                    <div class='input-group date' id='divPeriodoF'>
                      <input type='text' id="txtPeriodo" name="txtPeriodo" class="form-control" value="<?php echo set_value('txtPeriodo', @$resultado['txtPeriodo']);?>" readonly/>
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>
              </td>
            </tr>

            <tr>
              <td colspan="2">
                <input type="submit" name="submit" class="botones" value="Guardar">
              </td>

              <td colspan="2">
                <input type="button" onclick="regresar()" name="" class="botones" value="Regresar">
              </td>
            </tr>

          </tbody>
        </table>
    </form>
    </div>
  </div>

</div>

<script src="<?php echo base_url()?>js/calendario/bootstrap-datepicker.js"></script>

<!-- FORMATO PARA EL INPUT PERIODO -->
<script type="text/javascript">
    $('#divPeriodoA').datepicker({
        format: "yyyy",
        viewMode: "years", 
        minViewMode: "years"
    });

    $('#divPeriodoB').datepicker({
        format: "yyyy",
        viewMode: "years", 
        minViewMode: "years"
    });

    $('#divPeriodoC').datepicker({
        format: "yyyy",
        viewMode: "years", 
        minViewMode: "years"
    });

    $('#divPeriodoD').datepicker({
        format: "yyyy",
        viewMode: "years", 
        minViewMode: "years"
    });

    $('#divPeriodoE').datepicker({
        format: "yyyy",
        viewMode: "years", 
        minViewMode: "years"
    });

    $('#divPeriodoF').datepicker({
        format: "yyyy",
        viewMode: "years", 
        minViewMode: "years"
    });
</script>

<!-- CAMBIAR EL TITULO AL TAN CORRESPONDIENTE -->
<script type="text/javascript" src="<?php echo base_url()?>js/ToggleableTabs/tabs.js"></script>