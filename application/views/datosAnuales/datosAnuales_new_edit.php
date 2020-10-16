<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/jquery.js"></script>
<script src="<?php echo base_url(); ?>js/bootstrap.min.js" ></script> 
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.min.css"> 
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datepicker.css" >
<script type="text/javascript" src="<?php echo base_url()?>js/loadFiles/loadFiles.js"></script>

<script type="text/javascript">
  $(document).ready(function(e) { 
    var accion = $("#idFrmFile #idAccion").val()
    console.log("PRIMERO ESTO PARA LUEGO LO DEMAS: "+accion)
    if (accion == "Editar") {
        $("#idFrmFile").hide();
        $("#idSeparador").hide();
    }
  });

  function denegado() {
    alert("No cuenta con el permiso");
  }

  function regresar(){
    window.location="<?php echo base_url()?>datosAnuales/editarDGA";
  }
</script>

<h3 id="idTitulo" class="page-header" align="center"><span class="glyphicon glyphicon-th-list"></span> <?php echo $titulo?> </h3>

<div class="error">
  <center>
    <?php messages_flash('danger',validation_errors(),'Errores del formulario', true);?>
  </center>
</div>

<!-- FORMULARIO PARA LA SUBIDA DE ARCHIVOS-->
  <form action="<?php echo base_url()?>datosAnuales/reemplazar" id="idFrmFile" name="idFrmFile" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
    <input type="hidden" id="idAccion" name="accion" value="<?php echo $accion; ?>">
    <input type="hidden" id="idBaseData" name="idBaseData" value="<?php echo $idBaseData; ?>">

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

  <div id="idSeparador" class="page-header"></div>

<!-- CABECERA DE LOS TABS -->
<ul class="nav nav-tabs">
  <li id="t1" class="active"><a data-toggle="tab" href="#menu1">Sección A</a></li>
  <li id="t2"><a data-toggle="tab" href="#menu2">Sección B</a></li>
  <li id="t3"><a data-toggle="tab" href="#menu3">Sección C</a></li>
  <li id="t4"><a data-toggle="tab" href="#menu4">Sección D</a></li>
  <li id="t5"><a data-toggle="tab" href="#menu5">Sección E</a></li>
  <li id="t6"><a data-toggle="tab" href="#menu6">Sección F</a></li>
</ul>

<div class="tab-content">

<!-- SECCION A -->
  <div id="menu1" class="tab-pane fade in active">
    <div class="table-responsive" name="cont1">
      <form action="<?php echo base_url()?>datosAnuales/guardarDGASA" id="TABLABOTON1" method="POST">        
        <table class="table table-striped table-bordered table-hover">
          <tbody>
            <input type="hidden" name="accion" value="<?php echo $accion; ?>">
            <input type="hidden" name="id" value="<?php echo @$datoDGASA[0]->IdDGASA; ?>">

            <tr>
              <td style="width: 200px">Porcentaje de Discapacidad:</td>
              <td >
                <input class="form-control" type="text" id="txtPorcentajeDiscapacidad" name="txtPorcentajeDiscapacidad"  placeholder="Ingresar datos" value="<?php echo set_value('txtPorcentajeDiscapacidad', @$datoDGASA[0]->PorcentajeEmpleadosDiscapacitadosPorLey);?>" />
              </td>

              <td style="width: 200px">PIB Percapita:</td>
              <td >
                <input class="form-control" type="text" name="txtPIBPercapita"  placeholder="Ingresar datos" value="<?php echo set_value('txtPIBPercapita', @$datoDGASA[0]->PIBPercapita);?>">
              </td>
            </tr>

            <tr>
              <td >Inflación Mensual:</td>
              <td >
                <input class="form-control" type="text" name="txtInflacionMensual"  placeholder="Ingresar datos" value="<?php echo set_value('txtInflacionMensual', @$datoDGASA[0]->InflacionMensual);?>">
              </td>
              <td >Inflación Anual:</td>
              <td >
                <input class="form-control" type="text" name="txtInflacionAnualizada"  placeholder="Ingresar datos" value="<?php echo set_value('txtInflacionAnualizada', @$datoDGASA[0]->InflacionAnualizada);?>">
              </td>
            </tr>
            <tr>
              <td >Salario Básico:</td>
              <td >
                <input class="form-control" type="text" name="txtValorSalarioMinimoMensual"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorSalarioMinimoMensual', @$datoDGASA[0]->ValorSalarioMinimoMensual);?>">
              </td>
              <td >Número de Días Laborables:</td>
              <td >
                <input class="form-control" type="text" name="txtNumTDiasLaborados"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTDiasLaborados', @$datoDGASA[0]->NumTDiasLaborados);?>">
              </td>
            </tr>
            <tr>
              <td >Ingresar el valor cuota mínima para apertura de cuenta:</td>
              <td >
                <input class="form-control" type="text" name="txtValMinAperturaCuenta"  placeholder="Ingresar datos" value="<?php echo set_value('txtValMinAperturaCuenta', @$datoDGASA[0]->ValorCuotaIngreso);?>">
              </td>
              <td >TEA Máxima por el BCE:</td>
              <td >
                <input class="form-control" type="text" name="txtTEAMaximaBCE"  placeholder="Ingresar datos" value="<?php echo set_value('txtTEAMaximaBCE', @$datoDGASA[0]->TEAMaximaBCE);?>">
              </td>
            </tr>
            <tr>
              <td >TEA Máxima por el Cooperativa:</td>
              <td >
                <input class="form-control" type="text" name="txtTEAMaximaCooperativa"  placeholder="Ingresar datos" value="<?php echo set_value('txtTEAMaximaCooperativa', @$datoDGASA[0]->TEAMaximaCooperativa);?>">
              </td>
              <td >Dias de descanso forzoso:</td>
              <td >
                <input class="form-control" type="text" name="txtNumTDiasDescansoForzoso"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTDiasDescansoForzoso', @$datoDGASA[0]->NumTDiasDescansoForzoso);?>">
              </td>
            </tr>
            <tr>
              <td >Número de baterías sanitarias establecidas por normativa:</td>
              <td >
                <input class="form-control" type="text" name="txtNumTBateriasSanitariasPorNormativa"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTBateriasSanitariasPorNormativa', @$datoDGASA[0]->NumTBateriasSanitariasPorNormativa);?>">
              </td>
              <td >Número de empleados que cubre el número de baterías:</td>
              <td >
                <input class="form-control" type="text" name="txtNumEmpleadosQueCubreLasBaterias"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumEmpleadosQueCubreLasBaterias', @$datoDGASA[0]->NumEmpleadosQueCubreLasBaterias);?>">
              </td>
            </tr>
            <tr>
              <td >Cantidad de días de descanso forzoso laborados por los empleados:</td>
              <td >
                <input class="form-control" type="text" name="txtNumTDiasDescansoForzosoLaborados"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTDiasDescansoForzosoLaborados', @$datoDGASA[0]->NumTDiasDescansoForzosoLaborados);?>">
              </td>
              <td >Total de horas trabajadas en el año:</td>
              <td >
                <input class="form-control" type="text" name="txtNumTHorasTrabajadas"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTHorasTrabajadas', @$datoDGASA[0]->NumTHorasTrabajadas);?>">
              </td>
            </tr>
            <tr>
              <td >Promedio de cuentas por cobrar:</td>
              <td >
                <input class="form-control" type="text" name="txtPromedioCuentasPorCobrar"  placeholder="Ingresar datos" value="<?php echo set_value('txtPromedioCuentasPorCobrar', @$datoDGASA[0]->PromedioCuentasPorCobrar);?>">
              </td>
              <td >Número de proveedores  que trabajan con la organización:</td>
              <td >
                <input class="form-control" type="text" name="txtNumTProveedoresTrabajanOrganizacion"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTProveedoresTrabajanOrganizacion', @$datoDGASA[0]->NumTProveedoresTrabajanOrganizacion);?>">
              </td>
            </tr>
            <tr>
              <td >Número de empleados nuevos generados para socios:</td>
              <td >
                <input class="form-control" type="text" name="txtNumTEmpleadosGeneradosParaSocios"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadosGeneradosParaSocios', @$datoDGASA[0]->NumTEmpleadosGeneradosParaSocios);?>">
              </td>
              <td >Número de políticas de contratación de personal :</td>
              <td >
                <input class="form-control" type="text" name="txtNumTPoliticasDeCotratacionDePersonal"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTPoliticasDeCotratacionDePersonal', @$datoDGASA[0]->NumTPoliticasDeCotratacionDePersonal);?>">
              </td>
            </tr>
            <tr>
              <td >Número de contrataciones en función de la CV:</td>
              <td >
                <input class="form-control" type="text" name="txtNumTContratosEnFuncionDeCV"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTContratosEnFuncionDeCV', @$datoDGASA[0]->NumTContratosEnFuncionDeCV);?>">
              </td>
              <td >Número de socios que están dentro del programa seguros exequia:</td>
              <td >
                <input class="form-control" type="text" name="txtNumtSociosEnProgramaDeSeguroExequial"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumtSociosEnProgramaDeSeguroExequial', @$datoDGASA[0]->NumtSociosEnProgramaDeSeguroExequial);?>">
              </td>
            </tr>
            <tr>
              <td >Número de empleados y socios que aportan al fondo de cesantía:</td>
              <td >
                <input class="form-control" type="text" name="txtNumTSociosAportanAlFondoDeCesantia"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTSociosAportanAlFondoDeCesantia', @$datoDGASA[0]->NumTSociosAportanAlFondoDeCesantia);?>">
              </td>
              <td >Número de empleados y socios que aportan al fondo mortuorio:</td>
              <td >
                <input class="form-control" type="text" name="txtNumTSociosAportanAlFondoMortuorio"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTSociosAportanAlFondoMortuorio', @$datoDGASA[0]->NumTSociosAportanAlFondoMortuorio);?>">
              </td>
            </tr>
            <tr>
              <td >Número de empleados y socios que aportan al fondo de empleados o cooperativos:</td>
              <td >
                <input class="form-control" type="text" name="txtNumTSociosAportanAlFondoDeEmpleadosOCooperativa"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTSociosAportanAlFondoDeEmpleadosOCooperativa', @$datoDGASA[0]->NumTSociosAportanAlFondoDeEmpleadosOCooperativa);?>">
              </td>
              <td >Número de empleados o socios que aportan al fondo de accidentes o calamidades:</td>
              <td >
                <input class="form-control" type="text" name="txtNumTSociosAportanAlFondoDeAccidenteOCalamidades"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTSociosAportanAlFondoDeAccidenteOCalamidades', @$datoDGASA[0]->NumTSociosAportanAlFondoDeAccidenteOCalamidades);?>">
              </td>
            </tr>
            <tr>
              <td >Número de practicantes establecidos mediante política:</td>
              <td >
                <input class="form-control" type="text" name="txtNumTPracticantesRequeridos"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTPracticantesRequeridos', @$datoDGASA[0]->NumTPracticantesRequeridos);?>">
              </td>
              <td >Número total de representantes empadronados:</td>
              <td >
                <input class="form-control" type="text" name="txtNumTRepresentantesEmpadronados"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTRepresentantesEmpadronados', @$datoDGASA[0]->NumTRepresentantesEmpadronados);?>">
              </td>
            </tr>
            <tr>
              <td >Energía renovable utilizada (kwh):</td>
              <td >
                <input class="form-control" type="text" name="txtCantTKwhEnergiaUtilizadaRenovable"  placeholder="Ingresar datos" value="<?php echo set_value('txtCantTKwhEnergiaUtilizadaRenovable', @$datoDGASA[0]->CantTKwhEnergiaUtilizadaRenovable);?>">
              </td>
              <td >Energia renovable y no renovable (kwh):</td>
              <td >
                <input class="form-control" type="text" name="txtCantTKwhEnergiaRenovableNoRenovable"  placeholder="Ingresar datos" value="<?php echo set_value('txtCantTKwhEnergiaRenovableNoRenovable', @$datoDGASA[0]->CantTKwhEnergiaRenovableNoRenovable);?>">
              </td>
            </tr>
            <tr>
              <td >Cantidad de agua reutilizada o reciclada (m3):</td>
              <td >
                <input class="form-control" type="text" name="txtCantTm3Reutilizada"  placeholder="Ingresar datos" value="<?php echo set_value('txtCantTm3Reutilizada', @$datoDGASA[0]->CantTm3Reutilizada);?>">
              </td>
              <td >Sumatoria de accidentes últimos 5 años:</td>
              <td >
                <input class="form-control" type="text" name="txtNumTAccidentes5Anios"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTAccidentes5Anios', @$datoDGASA[0]->NumTAccidentes5Anios);?>">
              </td>
            </tr>
            <tr>
              <td >Periodo:</td>
              <td >
                    <div class='input-group date' id='divPeriodoA'>
                      <input type='text' id="txtPeriodo" name="txtPeriodo" class="form-control" value="<?php echo set_value('txtPeriodo', @$datoDGASA[0]->Periodo);?>" readonly/>
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>
              </td>
              <td ></td>
              <td >
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
        <table class="table table-striped table-bordered table-hover">
          <tbody>
            <input type="hidden" name="accion" value="<?php echo $accion; ?>">
            <input type="hidden" name="id" value="<?php echo @$datoDGASB[0]->IdDGASB; ?>">
            <tr>
              <td style="width: 200px" >Número de socios que sumados represente el 50% o más del total de depósitos:</td>
              <td >
                <input class="form-control" type="text" name="txtNumTSocios50PorcientoOMasTotalDeDepositos"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTSocios50PorcientoOMasTotalDeDepositos', @$datoDGASB[0]->NumTSocios50PorcientoOMasTotalDeDepositos);?>">
              </td>
              <td style="width: 200px" >Número de Sugerencias constructivas:</td>
              <td >
                <input class="form-control" type="text" name="txtNumTSugerenciasConstructivas"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTSugerenciasConstructivas', @$datoDGASB[0]->NumTSugerenciasConstructivas);?>">
              </td>
            </tr>
            <tr>
              <td >Total sugerencias revisadas en el buzón de sugerencias:</td>
              <td >
                <input class="form-control" type="text" name="txtNumTSugerenciasRevisadas"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTSugerenciasRevisadas', @$datoDGASB[0]->NumTSugerenciasRevisadas);?>">
              </td>
              <td >Cantidad de productos y servicios entregados a tiempo a los clientes:</td>
              <td >
                <input class="form-control" type="text" name="txtNumTProductosServiciosEntregadosATiempoAClientes"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTProductosServiciosEntregadosATiempoAClientes', @$datoDGASB[0]->NumTProductosServiciosEntregadosATiempoAClientes);?>">
              </td>
            </tr>
            <tr>
              <td >Número de eventos que mantiene con otras COAC:</td>
              <td >
                <input class="form-control" type="text" name="txtNumTEventosMantieneConOtrasCOAC"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEventosMantieneConOtrasCOAC', @$datoDGASB[0]->NumTEventosMantieneConOtrasCOAC);?>">
              </td>
              <td >Número de beneficios dirigidos a socios en el ámbito distintos a servicios financieros:</td>
              <td >
                <input class="form-control" type="text" name="txtNumTBeneficiosNoFinancierosASocios"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTBeneficiosNoFinancierosASocios', @$datoDGASB[0]->NumTBeneficiosNoFinancierosASocios);?>">
              </td>
            </tr>
            <tr>
              <td >Número socios participantes en elecciones:</td>
              <td >
                <input class="form-control" type="text" name="txtNumTSociosParticipanEnElecciones"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTSociosParticipanEnElecciones', @$datoDGASB[0]->NumTSociosParticipanEnElecciones);?>">
              </td>
              <td >Empleados que gozaron  de las vacaciones:</td>
              <td >
                <input class="form-control" type="text" name="txtNumTEmpeladosQueGozaronVacaciones"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpeladosQueGozaronVacaciones', @$datoDGASB[0]->NumTEmpeladosQueGozaronVacaciones);?>">
              </td>
            </tr>
            <tr>
              <td >Número de empleados a los que se entrego equipos de protección:</td>
              <td >
                <input class="form-control" type="text" name="txtNumTEmpleadosRecibenEquipoDeProteccion"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadosRecibenEquipoDeProteccion', @$datoDGASB[0]->NumTEmpleadosRecibenEquipoDeProteccion);?>">
              </td>
              <td >Número de empleados que utilizan los equipos de protección:</td>
              <td >
                <input class="form-control" type="text" name="txtNumTEmpleadosQueUsanEquiposDeProteccion"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadosQueUsanEquiposDeProteccion', @$datoDGASB[0]->NumTEmpleadosQueUsanEquiposDeProteccion);?>">
              </td>
            </tr>
            <tr>
              <td >Empleados que deberían utilizar los  equipos de protección:</td>
              <td >
                <input class="form-control" type="text" name="txtNumTEmpleadosQueDebemUsarEquiposDeProteccion"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadosQueDebemUsarEquiposDeProteccion', @$datoDGASB[0]->NumTEmpleadosQueDebemUsarEquiposDeProteccion);?>">
              </td>
              <td >Número de evaluaciones efectuadas utilización de equipos de protección:</td>
              <td >
                <input class="form-control" type="text" name="txtNumTEvaluacionesAUtilizacionDeEquiDeProteccionEjecutadas"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEvaluacionesAUtilizacionDeEquiDeProteccionEjecutadas', @$datoDGASB[0]->NumTEvaluacionesAUtilizacionDeEquiDeProteccionEjecutadas);?>">
              </td>
            </tr>
            <tr>
              <td >Evaluaciones programadas en la utilización de equipos de protección:</td>
              <td >
                <input class="form-control" type="text" name="txtNumTEvaluacionesAUtilizacionDeEquiDeProteccionProgramadas"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEvaluacionesAUtilizacionDeEquiDeProteccionProgramadas', @$datoDGASB[0]->NumTEvaluacionesAUtilizacionDeEquiDeProteccionProgramadas);?>">
              </td>
              <td >Cantidad de mantenimientos realizados a la infraestructura:</td>
              <td >
                <input class="form-control" type="text" name="txtNumTMantenimientosAInfraestructuraEjecutados"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTMantenimientosAInfraestructuraEjecutados', @$datoDGASB[0]->NumTMantenimientosAInfraestructuraEjecutados);?>">
              </td>
            </tr>
            <tr>
              <td >Número de Mantenimientos de Infraestructura requeridos :</td>
              <td >
                <input class="form-control" type="text" name="txtNumTMantenimientosAInfraestructuraRequeridos"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTMantenimientosAInfraestructuraRequeridos', @$datoDGASB[0]->NumTMantenimientosAInfraestructuraRequeridos);?>">
              </td>
              <td >Número de oficinas en comunidades que no existe otras instituciones de servicio financiero:</td>
              <td >
                <input class="form-control" type="text" name="txtNumTPuntosEnComunidadesSinOtrasInstitucionesFinancieras"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTPuntosEnComunidadesSinOtrasInstitucionesFinancieras', @$datoDGASB[0]->NumTPuntosEnComunidadesSinOtrasInstitucionesFinancieras);?>">
              </td>
            </tr>
            <tr>
              <td >Total puntos de atención:</td>
              <td >
                <input class="form-control" type="text" name="txtNumTPuntosDeAtencion"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTPuntosDeAtencion', @$datoDGASB[0]->NumTPuntosDeAtencion);?>">
              </td>
              <td >Puntos de atención que brinda acceso a personas con discapacidad:</td>
              <td >
                <input class="form-control" type="text" name="txtNumTOficinasConAccesoADiscapacitados"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTOficinasConAccesoADiscapacitados', @$datoDGASB[0]->NumTPuntosDeAtencionConAccesoADiscapacitados);?>">
              </td>
            </tr>
            <tr>
              <td >Número de participaciones en la posición de políticas públicas y actividades de lobbying:</td>
              <td >
                <input class="form-control" type="text" name="txtNumTParticipacionesLobbying"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTParticipacionesLobbying', @$datoDGASB[0]->NumTParticipacionesLobbying);?>">
              </td>
              <td >Asuntos acordados no respetados por los directivos:</td>
              <td >
                <input class="form-control" type="text" name="txtNumTAsuntosAcordadosNoRespetadosPorDirectivos"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTAsuntosAcordadosNoRespetadosPorDirectivos', @$datoDGASB[0]->NumTAsuntosAcordadosNoRespetadosPorDirectivos);?>">
              </td>
            </tr>
            <tr>                    
              <td >Total de asuntos acordados en los convenios sindicales:</td>
              <td >
                <input class="form-control" type="text" name="txtNumTAsuntosAcordadosEnConveniosSindicales"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTAsuntosAcordadosEnConveniosSindicales', @$datoDGASB[0]->NumTAsuntosAcordadosEnConveniosSindicales);?>">
              </td>
              <td >Asuntos acordados con los directivos no respetados por los trabajadores:</td>
              <td >
                <input class="form-control" type="text" name="txtNumTAsuntosAcordadosNoRespetadosPorEmpleados"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTAsuntosAcordadosNoRespetadosPorEmpleados', @$datoDGASB[0]->NumTAsuntosAcordadosNoRespetadosPorEmpleados);?>">
              </td>
            </tr>
            <tr>                    
              <td >Número de créditos vigentes otorgados a mujeres:</td>
              <td >
                <input class="form-control" type="text" name="txtNumTCreditosVigentesAMujeres"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTCreditosVigentesAMujeres', @$datoDGASB[0]->NumTCreditosVigentesAMujeres);?>">
              </td>
              <td >Total cartera de crédito mujeres:</td>
              <td >
                <input class="form-control" type="text" name="txtValorTCarteraCreditoMujeres"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTCarteraCreditoMujeres', @$datoDGASB[0]->ValorTCarteraCreditoMujeres);?>">
              </td>
            </tr>
            <tr>                    
              <td >Número de operaciones de créditos con montos <=al 30% del PIB per cápita:</td>
              <td >
                <input class="form-control" type="text" name="txtNumTOperacionesDeCreditosConMontoMenorA30PorcientoPIB"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTOperacionesDeCreditosConMontoMenorA30PorcientoPIB', @$datoDGASB[0]->NumTOperacionesDeCreditosConMontoMenorA30PorcientoPIB);?>">
              </td>
              <td >Número Total de operaciones de crédito vigentes:</td>
              <td >
                <input class="form-control" type="text" name="txtNumTOperacionesDeCreditoVigentes"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTOperacionesDeCreditoVigentes', @$datoDGASB[0]->NumTOperacionesDeCreditoVigentes);?>">
              </td>
            </tr>
            <tr>                    
              <td >Número de operaciones de créditos  con cuotas vigentes <= 1% del PIB Per capita:</td>
              <td >
                <input class="form-control" type="text" name="txtNumTOperacionesCreditoConCuotasVigentesMenosA1PorcientoPIB"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTOperacionesCreditoConCuotasVigentesMenosA1PorcientoPIB', @$datoDGASB[0]->NumTOperacionesCreditoConCuotasVigentesMenosA1PorcientoPIB);?>">
              </td>
              <td >Número de pedidos entregados a tiempo:</td>
              <td >
                <input class="form-control" type="text" name="txtNumTPedidosEntregadosATiempo"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTPedidosEntregadosATiempo', @$datoDGASB[0]->NumTPedidosEntregadosATiempo);?>">
              </td>
            </tr> 
            <tr>                    
              <td >Total pedidos entregados:</td>
              <td >
                <input class="form-control" type="text" name="txtNumTPedidosEntregados"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTPedidosEntregados', @$datoDGASB[0]->NumTPedidosEntregados);?>">
              </td>
              <td >Número de productos y servicios que se adquiere en el ámbito local:</td>
              <td >
                <input class="form-control" type="text" name="txtNumTProductosYServiciosAdquiereLocalmente"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTProductosYServiciosAdquiereLocalmente', @$datoDGASB[0]->NumTProductosYServiciosAdquiereLocalmente);?>">
              </td>
            </tr>
            <tr>                    
              <td >Total productos y servicios:</td>
              <td >
                <input class="form-control" type="text" name="txtNumTProductosYServicios"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTProductosYServicios', @$datoDGASB[0]->NumTProductosYServicios);?>">
              </td>
              <td >Número de Certificaciones requeridas en el POA:</td>
              <td >
                <input class="form-control" type="text" name="txtNumTCertificacionesRequeridasEnElPOA"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTCertificacionesRequeridasEnElPOA', @$datoDGASB[0]->NumTCertificacionesRequeridasEnElPOA);?>">
              </td>
            </tr>
            <tr>
              <td >Periodo:</td>
              <td >
                    <div class='input-group date' id='divPeriodoB'>
                      <input type='text' id="txtPeriodo" name="txtPeriodo" class="form-control" value="<?php echo set_value('txtPeriodo', @$datoDGASB[0]->Periodo);?>" readonly/>
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>
              </td>
              <td ></td>
              <td >
                
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
        <table class="table table-striped table-bordered table-hover">
          <tbody>
            <input type="hidden" name="accion" value="<?php echo $accion; ?>">
            <input type="hidden" name="id" value="<?php echo @$datoDGASC[0]->IdDGASC; ?>">
            <tr>
              <td style="width: 200px">Número de Demandas administrativas atendidas</td>
              <td >
                <input class="form-control" type="text" name="txtNumTDemandasAdministrativasAtendidas"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTDemandasAdministrativasAtendidas', @$datoDGASC[0]->NumTDemandasAdministrativasAtendidas);?>">
              </td>
              <td style="width: 200px">Total de demandas Administrativas</td>
              <td >
                <input class="form-control" type="text" name="txtNumTDemandasAdministrativas"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTDemandasAdministrativas', @$datoDGASC[0]->NumTDemandasAdministrativas);?>">
              </td>
            </tr>
            <tr>
              <td >Total de productos y servicios entregados a los clientes</td>
              <td >
                <input class="form-control" type="text" name="txtNumTProductosServiciosEntregadosAClientes"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTProductosServiciosEntregadosAClientes', @$datoDGASC[0]->NumTProductosServiciosEntregadosAClientes);?>">
              </td>
              <td >Número de denuncias por aspectos poco éticos resueltas</td>
              <td >
                <input class="form-control" type="text" name="txtNumTDenunciasAspectosNoEticosResueltos"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTDenunciasAspectosNoEticosResueltos', @$datoDGASC[0]->NumTDenunciasAspectosNoEticosResueltos);?>">
              </td>
            </tr>
            <tr>
              <td >Total de denuncias por aspectos no éticos</td>
              <td >
                <input class="form-control" type="text" name="txtNumTDenunciasAspectosNoEticos"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTDenunciasAspectosNoEticos', @$datoDGASC[0]->NumTDenunciasAspectosNoEticos);?>">
              </td>
              <td >Total casos de discriminación</td>
              <td >
                <input class="form-control" type="text" name="txtNumTCasosDiscriminacion"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTCasosDiscriminacion', @$datoDGASC[0]->NumTCasosDiscriminacion);?>">
              </td>
            </tr>
            <tr>
              <td >Número de casos de discriminación ocurridos durante el perido resueltos </td>
              <td >
                <input class="form-control" type="text" name="txtNumTCasosDiscriminacionResueltos"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTCasosDiscriminacionResueltos', @$datoDGASC[0]->NumTCasosDiscriminacionResueltos);?>">
              </td>
              <td >Número de procesos con riesgo de efectos de corrupción analizados</td>
              <td >
                <input class="form-control" type="text" name="txtNumTProcesosConRiesgosDeCorrupcionAnalizados"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTProcesosConRiesgosDeCorrupcionAnalizados', @$datoDGASC[0]->NumTProcesosConRiesgosDeCorrupcionAnalizados);?>">
              </td>
            </tr>
            <tr>
              <td >Total de procesos con riesgo de corrupción identificados</td>
              <td >
                <input class="form-control" type="text" name="txtNumTProcesosConRiesgosDeCorrupcionIdentificados"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTProcesosConRiesgosDeCorrupcionIdentificados', @$datoDGASC[0]->NumTProcesosConRiesgosDeCorrupcionIdentificados);?>">
              </td>
              <td >Número de medidas tomadas en respuesta de corrupción</td>
              <td >
                <input class="form-control" type="text" name="txtNumTMedidasAnteIncidentesDeCorrupcion"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTMedidasAnteIncidentesDeCorrupcion', @$datoDGASC[0]->NumTMedidasAnteIncidentesDeCorrupcion);?>">
              </td>
            </tr>
            <tr>
              <td >Número total de incidentes de corrupción ocurridos</td>
              <td >
                <input class="form-control" type="text" name="txtNumTIncidentesDeCorrupcionOcurridos"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTIncidentesDeCorrupcionOcurridos', @$datoDGASC[0]->NumTIncidentesDeCorrupcionOcurridos);?>">
              </td>
              <td >Dias destinados a la educación familiar en el año</td>
              <td >
                <input class="form-control" type="text" name="txtNumTDiasDestinadosAEducacionFamiliar"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTDiasDestinadosAEducacionFamiliar', @$datoDGASC[0]->NumTDiasDestinadosAEducacionFamiliar);?>">
              </td>
            </tr>
            <tr>
              <td >Número de transacciones realizadas en el periodo</td>
              <td >
                <input class="form-control" type="text" name="txtNumTTransacciones"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTTransacciones', @$datoDGASC[0]->NumTTransacciones);?>">
              </td>
              <td >Número de programas o iniciativas de reciclaje </td>
              <td >
                <input class="form-control" type="text" name="txtNumTProgramasDeReciclaje"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTProgramasDeReciclaje', @$datoDGASC[0]->NumTProgramasDeReciclaje);?>">
              </td>
            </tr>
            <tr>
              <td >Total de comprobantes Emitidos</td>
              <td >
                <input class="form-control" type="text" name="txtNumTComprobantesEmitidos"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTComprobantesEmitidos', @$datoDGASC[0]->NumTComprobantesEmitidos);?>">
              </td>
              <td >Comprobantes electronicos</td>
              <td >
                <input class="form-control" type="text" name="txtNumTComprobantesElectronicosEmitidos"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTComprobantesElectronicosEmitidos', @$datoDGASC[0]->NumTComprobantesElectronicosEmitidos);?>">
              </td>
            </tr>
            <tr>
              <td >Número de baterias sanitarias por departamento</td>
              <td >
                <input class="form-control" type="text" name="txtNumTBateriasSanitarias"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTBateriasSanitarias', @$datoDGASC[0]->NumTBateriasSanitariasPorDepartamentos);?>">
              </td>
              <td >Número de beneficios sociales adicionales que reciben los colaboradores con otro tipo de contrato o relación laboral</td>
              <td >
                <input class="form-control" type="text" name="txtNumTBeneficiosAdicionalesAEmpleadosConContratoNoIndefinido"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTBeneficiosAdicionalesAEmpleadosConContratoNoIndefinido', @$datoDGASC[0]->NumTBeneficiosAdicionalesAEmpleadosConContratoNoIndefinido);?>">
              </td>
            </tr>
            <tr>
              <td >Número de beneficios sociales adicionales que reciben colaboradores con contrato indefinido</td>
              <td >
                <input class="form-control" type="text" name="txtNumTBeneficiosAdicionalesAEmpleadosConContratoIndefinido"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTBeneficiosAdicionalesAEmpleadosConContratoIndefinido', @$datoDGASC[0]->NumTBeneficiosAdicionalesAEmpleadosConContratoIndefinido);?>">
              </td>
              <td >Trabajadores laboran más de un año</td>
              <td >
                <input class="form-control" type="text" name="txtNumTEmpleadosLaboranMasDeAnio"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadosLaboranMasDeAnio', @$datoDGASC[0]->NumTEmpleadosLaboranMasDeAnio);?>">
              </td>
            </tr>
            <tr>
              <td >Número de Mujeres embarazadas</td>
              <td >
                <input class="form-control" type="text" name="txtNumTEmpleadasEmbarazadas"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadasEmbarazadas', @$datoDGASC[0]->NumTEmpleadasEmbarazadas);?>">
              </td>
              <td >Hombres con permiso de paternidad </td>
              <td >
                <input class="form-control" type="text" name="txtNumTEmpleadosConPermisoPaternidad"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadosConPermisoPaternidad', @$datoDGASC[0]->NumTEmpleadosConPermisoPaternidad);?>">
              </td>
            </tr>
            <tr>
              <td >Mujeres reincorporadas después permiso maternidad</td>
              <td >
                <input class="form-control" type="text" name="txtNumTEmpleadasReincorporadasPorMaternidad"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadasReincorporadasPorMaternidad', @$datoDGASC[0]->NumTEmpleadasReincorporadasPorMaternidad);?>">
              </td>
              <td >Mujeres con permiso de maternidad</td>
              <td >
                <input class="form-control" type="text" name="txtNumTEmpleadasConPermisoMaternidad"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadasConPermisoMaternidad', @$datoDGASC[0]->NumTEmpleadasConPermisoMaternidad);?>">
              </td>
            </tr>
            <tr>
              <td >Hombres reincorporados después permiso paternidad</td>
              <td >
                <input class="form-control" type="text" name="txtNumTEmpleadosReincorporadosPorPaternidad"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadosReincorporadosPorPaternidad', @$datoDGASC[0]->NumTEmpleadosReincorporadosPorPaternidad);?>">
              </td>
              <td >Empleados reincorporados por un tiempo mayor al establecido  en caso de permiso de partenidad</td>
              <td >
                <input class="form-control" type="text" name="txtNumTEmpleadosReincorporadosFueraDeTiempoEstablecido"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadosReincorporadosFueraDeTiempoEstablecido', @$datoDGASC[0]->NumTEmpleadosReincorporadosFueraDeTiempoEstablecido);?>">
              </td>
            </tr>
            <tr>
              <td >Total de empleados reincorporados en el tiempo establecido en caso de permiso de paternidad</td>
              <td >
                <input class="form-control" type="text" name="txtNumTEmpleadosReincorporadosATiempoEstablecido"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadosReincorporadosATiempoEstablecido', @$datoDGASC[0]->NumTEmpleadosReincorporadosATiempoEstablecido);?>">
              </td>

              <td >Empleadas reincorporados por un tiempo mayor al establecido  en caso de permiso de maternidad</td>
              <td >
                <input class="form-control" type="text" name="txtNumTEmpleadasReincorporadasFueraDeTiempoEstablecido"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadasReincorporadasFueraDeTiempoEstablecido', @$datoDGASC[0]->NumTEmpleadasReincorporadasFueraDeTiempoEstablecido);?>">
              </td>
            </tr>
            <tr>
              <td >Total de empleadas reincorporados en el tiempo establecido en caso de permiso de maternidad</td>
              <td >
                <input class="form-control" type="text" name="txtNumTEmpleadasReincorporadasATiempoEstablecido"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadasReincorporadasATiempoEstablecido', @$datoDGASC[0]->NumTEmpleadasReincorporadasATiempoEstablecido);?>">
              </td>
              <td >Número de trabajadores a jornada completa de trabajo</td>
              <td >
                <input class="form-control" type="text" name="txtNumTEmpleadosAJornadaCompleta"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadosAJornadaCompleta', @$datoDGASC[0]->NumTEmpleadosAJornadaCompleta);?>">
              </td>
            </tr>
            <tr>
              <td >Número Trabajadores con jornada parcial de trabajo</td>
              <td >
                <input class="form-control" type="text" name="txtNumTEmpleadosAJornadaParcial"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadosAJornadaParcial', @$datoDGASC[0]->NumTEmpleadosAJornadaParcial);?>">
              </td>
              <td >Cantidad de horas suplementarias trabajadas</td>
              <td >
                <input class="form-control" type="text" name="txtNumTHorasSuplementariasTrabajadas"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTHorasSuplementariasTrabajadas', @$datoDGASC[0]->NumTHorasSuplementariasTrabajadas);?>">
              </td>
            </tr>
            <tr>           
              <td >Cantidad de horas extras trabajadas</td>
              <td >
                <input class="form-control" type="text" name="txtNumTHorasExtrasTrabajadas"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTHorasExtrasTrabajadas', @$datoDGASC[0]->NumTHorasExtrasTrabajadas);?>">
              </td>
              <td >Cantidad de productos defectuosos rechazados</td>
              <td >
                <input class="form-control" type="text" name="txtNumTProductosDefectuososRechazados"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTProductosDefectuososRechazados', @$datoDGASC[0]->NumTProductosDefectuososRechazados);?>">
              </td>              
            </tr>
            <tr>              
              <td >Total productos recibidos</td>
              <td >
                <input class="form-control" type="text" name="txtNumTProductosRecibidos"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTProductosRecibidos', @$datoDGASC[0]->NumTProductosRecibidos);?>">
              </td>
              <td >Número de sanciones monetarias </td>
              <td >
                <input class="form-control" type="text" name="txtNumTSancionesMonetarias"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTSancionesMonetarias', @$datoDGASC[0]->NumTSancionesMonetarias);?>">
              </td>
            </tr>
            <tr>              
              <td >Número de horas de trabajo al día según lo establece el Código de Trabajo</td>
              <td >
                <input class="form-control" type="text" name="txtNumTHorasLaboradasPorDiaEmpleados"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTHorasLaboradasPorDiaEmpleados', @$datoDGASC[0]->NumTHorasLaboradasPorDiaEmpleados);?>">
              </td>
              <td >Número de sesiones establecidas por la ley</td>
              <td >
                <input class="form-control" type="text" name="txtNumTSesionesDeConsejosEstablecidasPorLey"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTSesionesDeConsejosEstablecidasPorLey', @$datoDGASC[0]->NumTSesionesDeConsejosEstablecidasPorLey);?>">
              </td>
            </tr>
            <tr>
              <td >Periodo:</td>
              <td >
                  <div class='input-group date' id='divPeriodoC'>
                      <input type='text' id="txtPeriodo" name="txtPeriodo" class="form-control" value="<?php echo set_value('txtPeriodo', @$datoDGASC[0]->Periodo);?>" readonly/>
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      </span>
                  </div>                
              </td>
              <td ></td>
              <td >
                
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
        <table class="table table-striped table-bordered table-hover">
          <tbody>
            <input type="hidden" name="accion" value="<?php echo $accion; ?>">
            <input type="hidden" name="id" value="<?php echo @$datoDGASD[0]->IdDGASD; ?>">
            <tr>
              <td style="width: 200px">Saldo 10 mayores depositantes</td>
              <td >
                <input class="form-control" type="text" name="txtSaldoT10MayoresDepositantes"  placeholder="Ingresar datos" value="<?php echo set_value('txtSaldoT10MayoresDepositantes', @$datoDGASD[0]->SaldoT10MayoresDepositantes);?>">
              </td>
              <td style="width: 200px">Valor Depósitos a la vista</td>
              <td >
                <input class="form-control" type="text" name="txtValorTDepositoALaVista"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTDepositoALaVista', @$datoDGASD[0]->ValorTDepositoALaVista);?>">
              </td>
            </tr>
            <tr>
              <td >Valor depósitos a plazo</td>
              <td >
                <input class="form-control" type="text" name="txtValorTDepositoAplazo"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTDepositoAplazo', @$datoDGASD[0]->ValorTDepositoAplazo);?>">
              </td>
              <td >Monto invertido en  infraestructura</td>
              <td >
                <input class="form-control" type="text" name="txtMontoTInvertidoEnInfraestructura"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTInvertidoEnInfraestructura', @$datoDGASD[0]->MontoTInvertidoEnInfraestructura);?>">
              </td>
            </tr>
            <tr>
              <td >Ingresos operacionales </td>
              <td >
                <input class="form-control" type="text" name="txtValorTIngresosOperacionales"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTIngresosOperacionales', @$datoDGASD[0]->ValorTIngresosOperacionales);?>">
              </td>
              <td >Total ingresos</td>
              <td >
                <input class="form-control" type="text" name="txtValorTIngresos"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTIngresos', @$datoDGASD[0]->ValorTIngresos);?>">
              </td>
            </tr>
            <tr>
              <td >Ingresos por venta de activos fijos</td>
              <td >
                <input class="form-control" type="text" name="txtValorTIngresosPorVentaDeActivosFijos"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTIngresosPorVentaDeActivosFijos', @$datoDGASD[0]->ValorTIngresosPorVentaDeActivosFijos);?>">
              </td>
              <td >Total Ventas en el periodo</td>
              <td >
                <input class="form-control" type="text" name="txtValorTVentas"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTVentas', @$datoDGASD[0]->ValorTVentas);?>">
              </td>
            </tr>
            <tr>
              <td >Total ingresos por intereses</td>
              <td >
                <input class="form-control" type="text" name="txtValorTIngresosPorIntereses"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTIngresosPorIntereses', @$datoDGASD[0]->ValorTIngresosPorIntereses);?>">
              </td>
              <td >Ventas a crédito</td>
              <td >
                <input class="form-control" type="text" name="txtVentasACreditos"  placeholder="Ingresar datos" value="<?php echo set_value('txtVentasACreditos', @$datoDGASD[0]->VentasACreditos);?>">
              </td>
            </tr>
            <tr>
              <td >Ventas a contado</td>
              <td >
                <input class="form-control" type="text" name="txtValorTVentasAContado"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTVentasAContado', @$datoDGASD[0]->ValorTVentasAContado);?>">
              </td>
              <td >Margen Financiero</td>
              <td >
                <input class="form-control" type="text" name="txtValorTMargenFinanciero"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTMargenFinanciero', @$datoDGASD[0]->ValorTMargenFinanciero);?>">
              </td>
            </tr>
            <tr>
              <td >Gastos Operacionales</td>
              <td >
                <input class="form-control" type="text" name="txtValorTGastosOperacionales"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTGastosOperacionales', @$datoDGASD[0]->ValorTGastosOperacionales);?>">
              </td>
              <td >Total gastos no operacionales del periodo</td>
              <td >
                <input class="form-control" type="text" name="txtValorTGastosNoOperacionales"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTGastosNoOperacionales', @$datoDGASD[0]->ValorTGastosNoOperacionales);?>">
              </td>
            </tr>
            <tr>
              <td >Gastos sueldos y salarios</td>
              <td >
                <input class="form-control" type="text" name="txtValorTSueldosYSalarios"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTSueldosYSalarios', @$datoDGASD[0]->ValorTSueldosYSalarios);?>">
              </td>
              <td >Monto de créditos de consumo socios</td>
              <td >
                <input class="form-control" type="text" name="txtMontoTCreditoConsumoSocios"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTCreditoConsumoSocios', @$datoDGASD[0]->MontoTCreditoConsumoSocios);?>">
              </td>
            </tr>
            <tr>
              <td >Monto total de créditos otorgados </td>
              <td >
                <input class="form-control" type="text" name="txtMontoTCreditos"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTCreditos', @$datoDGASD[0]->MontoTCreditos);?>">
              </td>
              <td >Monto de créditos de vivienda socios </td>
              <td >
                <input class="form-control" type="text" name="txtMontoTCreditoViviendaSocios"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTCreditoViviendaSocios', @$datoDGASD[0]->MontoTCreditoViviendaSocios);?>">
              </td>
            </tr>
            <tr>
              <td >Monto de microcréditos socios</td>
              <td >
                <input class="form-control" type="text" name="txtMontoTCreditoMicrocreditoSocios"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTCreditoMicrocreditoSocios', @$datoDGASD[0]->MontoTCreditoMicrocreditoSocios);?>">
              </td>
              <td >Monto de créditos comercial socios</td>
              <td >
                <input class="form-control" type="text" name="txtMontoTCreditoComercialSocios"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTCreditoComercialSocios', @$datoDGASD[0]->MontoTCreditoComercialSocios);?>">
              </td>
            </tr>
            <tr>
              <td >Monto de créditos inmobiliario  socios</td>
              <td >
                <input class="form-control" type="text" name="txtMontoTCreditoInmobiliarioSocios"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTCreditoInmobiliarioSocios', @$datoDGASD[0]->MontoTCreditoInmobiliarioSocios);?>">
              </td>
              <td >Valor de Cartera de crédito</td>
              <td >
                <input class="form-control" type="text" name="txtValorTCarteraCredito"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTCarteraCredito', @$datoDGASD[0]->ValorTCarteraCredito);?>">
              </td>
            </tr>
            <tr>
              <td >Saldo de cartera de credito para necesidades sociales</td>
              <td >
                <input class="form-control" type="text" name="txtSaldoTCarteraCreditoParaNecesidadSocial"  placeholder="Ingresar datos" value="<?php echo set_value('txtSaldoTCarteraCreditoParaNecesidadSocial', @$datoDGASD[0]->SaldoTCarteraCreditoParaNecesidadSocial);?>">
              </td>
              <td >Saldo de cartera de credito para necesidades productivas</td>
              <td >
                <input class="form-control" type="text" name="txtSaldoTCarteraCreditoParaNecesidadProductiva"  placeholder="Ingresar datos" value="<?php echo set_value('txtSaldoTCarteraCreditoParaNecesidadProductiva', @$datoDGASD[0]->SaldoTCarteraCreditoParaNecesidadProductiva);?>">
              </td>
            </tr>
            <tr>
              <td >Cartera vencida</td>
              <td >
                <input class="form-control" type="text" name="txtValorTCarteraVencida"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTCarteraVencida', @$datoDGASD[0]->ValorTCarteraVencida);?>">
              </td>
              <td >Endeudamiento externo (Obligaciones con Instituciones Financieras sector público, privado o del exterior)</td>
              <td >
                <input class="form-control" type="text" name="txtValorTEndeudamientoExterno"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTEndeudamientoExterno', @$datoDGASD[0]->ValorTEndeudamientoExterno);?>">
              </td>
            </tr>
            <tr>
              <td >Monto de las compras a contado</td>
              <td >
                <input class="form-control" type="text" name="txtMontoTComprasAContado"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTComprasAContado', @$datoDGASD[0]->MontoTComprasAContado);?>">
              </td>
              <td >Monto de las compras a crédito</td>
              <td >
                <input class="form-control" type="text" name="txtMontoTComprasACredito"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTComprasACredito', @$datoDGASD[0]->MontoTComprasACredito);?>">
              </td>
            </tr>
            <tr>
              <td >Monto de compras a proveedores locales</td>
              <td >
                <input class="form-control" type="text" name="txtMontoTComprasAProveedoresLocales"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTComprasAProveedoresLocales', @$datoDGASD[0]->MontoTComprasAProveedoresLocales);?>">
              </td>
              <td >Monto de compras a proveedores internacionales </td>
              <td >
                <input class="form-control" type="text" name="txtMontoTComprasAProveedoresInternacionales"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTComprasAProveedoresInternacionales', @$datoDGASD[0]->MontoTComprasAProveedoresInternacionales);?>">
              </td>
            </tr>
            <tr>
              <td >Compras a asociaciones</td>
              <td >
                <input class="form-control" type="text" name="txtMontoTComprasAAsociaciones"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTComprasAAsociaciones', @$datoDGASD[0]->MontoTComprasAAsociaciones);?>">
              </td>
              <td >Presupuesto para adquisiciones de operac. significativas proveedores locales</td>
              <td >
                <input class="form-control" type="text" name="txtPresupuestoAdquisicionesDestinadasAProveedoresLocales"  placeholder="Ingresar datos" value="<?php echo set_value('txtPresupuestoAdquisicionesDestinadasAProveedoresLocales', @$datoDGASD[0]->PresupuestoAdquisicionesDestinadasAProveedoresLocales);?>">
              </td>
            </tr>
            <tr>
              <td >Total presupuesto para adquisiciones</td>
              <td >
                <input class="form-control" type="text" name="txtValorTPresupuestoAdquisicion"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPresupuestoAdquisicion', @$datoDGASD[0]->ValorTPresupuestoAdquisicion);?>">
              </td>
              <td >Valor por sanciones impuestos por los organismos de control</td>
              <td >
                <input class="form-control" type="text" name="txtValorTSancionesPorOrganismosDeControl"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTSancionesPorOrganismosDeControl', @$datoDGASD[0]->ValorTSancionesPorOrganismosDeControl);?>">
              </td>
            </tr>
            <tr>
              <td >Valor por IVA Pagado en el periodo </td>
              <td >
                <input class="form-control" type="text" name="txtValorTPagadoPorIVA"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPagadoPorIVA', @$datoDGASD[0]->ValorTPagadoPorIVA);?>">
              </td>
              <td >Total contribuciones al Estado</td>
              <td >
                <input class="form-control" type="text" name="txtValorTContribucionesAlEstado"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTContribucionesAlEstado', @$datoDGASD[0]->ValorTContribucionesAlEstado);?>">
              </td>
            </tr>
            <tr>
              <td >Valor pagado por retenciones en el periodo</td>
              <td >
                <input class="form-control" type="text" name="txtValorTPagadoPorRetenciones"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPagadoPorRetenciones', @$datoDGASD[0]->ValorTPagadoPorRetenciones);?>">
              </td>
              <td >Valor pagado del Impuesto a la Renta en el periodo</td>
              <td >
                <input class="form-control" type="text" name="txtValorTPagadoPorImpuestoALaRenta"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPagadoPorImpuestoALaRenta', @$datoDGASD[0]->ValorTPagadoPorImpuestoALaRenta);?>">
              </td>
            </tr>
            <tr>
              <td >Valor de subvenciones gubernamentales</td>
              <td >
                <input class="form-control" type="text" name="txtValorTSubvencionesGubernamentales"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTSubvencionesGubernamentales', @$datoDGASD[0]->ValorTSubvencionesGubernamentales);?>">
              </td>
              <td >Valor Total de Captación procedente de COAC</td>
              <td >
                <input class="form-control" type="text" name="txtValorTCaptacionProcedenteCOAC"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTCaptacionProcedenteCOAC', @$datoDGASD[0]->ValorTCaptacionProcedenteCOAC);?>">
              </td>
            </tr>
            <tr>
              <td >Valor Total de Captaciones</td>
              <td >
                <input class="form-control" type="text" name="txtValorTCaptaciones"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTCaptaciones', @$datoDGASD[0]->ValorTCaptaciones);?>">
              </td>
              <td >Periodo:</td>
              <td >
                  <div class='input-group date' id='divPeriodoD'>
                      <input type='text' id="txtPeriodo" name="txtPeriodo" class="form-control" value="<?php echo set_value('txtPeriodo', @$datoDGASD[0]->Periodo);?>" readonly/>
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
        <table class="table table-striped table-bordered table-hover">
          <tbody>
            <input type="hidden" name="accion" value="<?php echo $accion; ?>">
            <input type="hidden" name="id" value="<?php echo @$datoDGASE[0]->IdDGASE; ?>">
            <tr>
              <td style="width: 200px">Monto gastado en informar sobre Asambleas:</td>
              <td >
                <input class="form-control" type="text" name="txtMontoTGastoEnInformarSobreAsambleas"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTGastoEnInformarSobreAsambleas', @$datoDGASE[0]->MontoTGastoEnInformarSobreAsambleas);?>">
              </td>
              <td style="width: 200px">Gasto total de la organización :</td>
              <td >
                <input class="form-control" type="text" name="txtGastoTotalDeOrganizacion"  placeholder="Ingresar datos" value="<?php echo set_value('txtGastoTotalDeOrganizacion', @$datoDGASE[0]->GastoTotalDeOrganizacion);?>">
              </td>
            </tr>
            <tr>
              <td >Monto gastado en informar sobre Consejo de Administración:</td>
              <td >
                <input class="form-control" type="text" name="txtMontoTGastoEnInformarSobreConsejoAdministracion"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTGastoEnInformarSobreConsejoAdministracion', @$datoDGASE[0]->MontoTGastoEnInformarSobreConsejoAdministracion);?>">
              </td>
              <td >Monto gastado en transmisión de otra información:</td>
              <td >
                <input class="form-control" type="text" name="txtMontoTGastoEnInformarSobreOtraInformacion"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTGastoEnInformarSobreOtraInformacion', @$datoDGASE[0]->MontoTGastoEnInformarSobreOtraInformacion);?>">
              </td>
            </tr>
            <tr>
              <td >Total Activos del periodo:</td>
              <td >
                <input class="form-control" type="text" name="txtValorTActivos"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTActivos', @$datoDGASE[0]->ValorTActivos);?>">
              </td>
              <td >Costo de comprobantes de venta y retención antes de facturación electrónica:</td>
              <td >
                <input class="form-control" type="text" name="txtCostoComprobanteVentaRetencionAntesFacturacionElectronica"  placeholder="Ingresar datos" value="<?php echo set_value('txtCostoComprobanteVentaRetencionAntesFacturacionElectronica', @$datoDGASE[0]->CostoComprobanteVentaRetencionAntesFacturacionElectronica);?>">
              </td>
            </tr>
            <tr>
              <td >Costo de adquisición de facturación electrónica despues de facturación electrónica:</td>
              <td >
                <input class="form-control" type="text" name="txtCostoComprobanteVentaRetencionDespuesFacturaElectronica"  placeholder="Ingresar datos" value="<?php echo set_value('txtCostoComprobanteVentaRetencionDespuesFacturaElectronica', @$datoDGASE[0]->CostoComprobanteVentaRetencionDespuesFacturaElectronica);?>">
              </td>
              <td >Valor del combustible utilizado en el trasporte de productos y servicios:</td>
              <td >
                <input class="form-control" type="text" name="txtGastoTGasolinaEnEnvioProductosServicios"  placeholder="Ingresar datos" value="<?php echo set_value('txtGastoTGasolinaEnEnvioProductosServicios', @$datoDGASE[0]->GastoTGasolinaEnEnvioProductosServicios);?>">
              </td>
            </tr>
            <tr>
              <td >Gasto de multas por normas ambientales:</td>
              <td >
                <input class="form-control" type="text" name="txtGastoTMultasNormasAmbientales"  placeholder="Ingresar datos" value="<?php echo set_value('txtGastoTMultasNormasAmbientales', @$datoDGASE[0]->GastoTMultasNormasAmbientales);?>">
              </td>
              <td >Gasto en equipamiento año actual :</td>
              <td >
                <input class="form-control" type="text" name="txtGastoTEquipamiento"  placeholder="Ingresar datos" value="<?php echo set_value('txtGastoTEquipamiento', @$datoDGASE[0]->GastoTEquipamiento);?>">
              </td>
            </tr>
            <tr>
              <td >Gastos asignados a la eliminación residuos año actual:</td>
              <td >
                <input class="form-control" type="text" name="txtGastoTAsignadoAEliminarResiduo"  placeholder="Ingresar datos" value="<?php echo set_value('txtGastoTAsignadoAEliminarResiduo', @$datoDGASE[0]->GastoTAsignadoAEliminarResiduo);?>">
              </td>
              <td >Gasto de limpieza año actual:</td>
              <td >
                <input class="form-control" type="text" name="txtGastoTLimpieza"  placeholder="Ingresar datos" value="<?php echo set_value('txtGastoTLimpieza', @$datoDGASE[0]->GastoTLimpieza);?>">
              </td>
            </tr>
            <tr>
              <td >Valor aportación del trabajador:</td>
              <td >
                <input class="form-control" type="text" name="txtValorTAportacionEmpleados"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTAportacionEmpleados', @$datoDGASE[0]->ValorTAportacionEmpleados);?>">
              </td>
              <td >Valor de aportación del patrono:</td>
              <td >
                <input class="form-control" type="text" name="txtValorTAportacionPatrono"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTAportacionPatrono', @$datoDGASE[0]->ValorTAportacionPatrono);?>">
              </td>
            </tr>
            <tr>
              <td >Valor total de aportaciones en el periodo:</td>
              <td >
                <input class="form-control" type="text" name="txtValorTAportaciones"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTAportaciones', @$datoDGASE[0]->ValorTAportaciones);?>">
              </td>
              <td >Aportes a empleados a jornada completa:</td>
              <td >
                <input class="form-control" type="text" name="txtValorTAportesAEmpleadosAJornadaCompleta"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTAportesAEmpleadosAJornadaCompleta', @$datoDGASE[0]->ValorTAportesAEmpleadosAJornadaCompleta);?>">
              </td>
            </tr>
            <tr>
              <td >Valor pagado a los empleados menores de un año por vacaciones no tomadas :</td>
              <td >
                <input class="form-control" type="text" name="txtValorTPagadoAEmpleadosPorVacacionesNoTomadasEnMenosDeAnio"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPagadoAEmpleadosPorVacacionesNoTomadasEnMenosDeAnio', @$datoDGASE[0]->ValorTPagadoAEmpleadosPorVacacionesNoTomadasEnMenosDeAnio);?>">
              </td>
              <td >Valor por vacaciones a los empleados:</td>
              <td >
                <input class="form-control" type="text" name="txtValorTPagadoPorVacaciones"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPagadoPorVacaciones', @$datoDGASE[0]->ValorTPagadoPorVacaciones);?>">
              </td>
            </tr>
            <tr>
              <td >Valor pagado del Décimo Tercero:</td>
              <td >
                <input class="form-control" type="text" name="txtValorTPagadoDecimoTercero"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPagadoDecimoTercero', @$datoDGASE[0]->ValorTPagadoDecimoTercero);?>">
              </td>
              <td >Total provisionado en el periodo :</td>
              <td >
                <input class="form-control" type="text" name="txtValorTProvisionAnio"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTProvisionAnio', @$datoDGASE[0]->ValorTProvisionAnio);?>">
              </td>
            </tr>
            <tr>
              <td >Valor por pagar provisión del Décimo Tercero en el periodo :</td>
              <td >
                <input class="form-control" type="text" name="txtValorTPorPagarProvisionDecimoTercero"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPorPagarProvisionDecimoTercero', @$datoDGASE[0]->ValorTPorPagarProvisionDecimoTercero);?>">
              </td>
              <td >Valor pagado del Décimo Cuarto en el periodo:</td>
              <td >
                <input class="form-control" type="text" name="txtValorTPagadoDecimoCuarto"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPagadoDecimoCuarto', @$datoDGASE[0]->ValorTPagadoDecimoCuarto);?>">
              </td>
            </tr>
            <tr>
              <td >Valor del fondo de reserva pagado mensualmente:</td>
              <td >
                <input class="form-control" type="text" name="txtValorTFondoReservaPagadoMensual"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTFondoReservaPagadoMensual', @$datoDGASE[0]->ValorTFondoReservaPagadoMensual);?>">
              </td>
              <td >Total fondo de reserva:</td>
              <td >
                <input class="form-control" type="text" name="txtValorTFondoReserva"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTFondoReserva', @$datoDGASE[0]->ValorTFondoReserva);?>">
              </td>
            </tr>
            <tr>
              <td >Valor pasivos en el periodo:</td>
              <td >
                <input class="form-control" type="text" name="txtValorTPasivos"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPasivos', @$datoDGASE[0]->ValorTPasivos);?>">
              </td>
              <td >Valor del patrimonio en el periodo actual:</td>
              <td >
                <input class="form-control" type="text" name="txtValorTPatrimonio"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPatrimonio', @$datoDGASE[0]->ValorTPatrimonio);?>">
              </td>
            </tr>
            <tr>
              <td >capital social aportado en el periodo:</td>
              <td >
                <input class="form-control" type="text" name="txtValorTCapitalSocial"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTCapitalSocial', @$datoDGASE[0]->ValorTCapitalSocial);?>">
              </td>
              <td >Patrimonio técnico constituido:</td>
              <td >
                <input class="form-control" type="text" name="txtValorTPatrimonioTecnicoConstituido"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPatrimonioTecnicoConstituido', @$datoDGASE[0]->ValorTPatrimonioTecnicoConstituido);?>">
              </td>
            </tr>
            <tr>              
              <td >Patrimonio técnico requerido:</td>
              <td >
                <input class="form-control" type="text" name="txtValorTPatrimonioTecnicoRequerido"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPatrimonioTecnicoRequerido', @$datoDGASE[0]->ValorTPatrimonioTecnicoRequerido);?>">
              </td>
              <td >Utilidad del Ejercicio del periodo :</td>
              <td >
                <input class="form-control" type="text" name="txtUtilidadTEjercicio"  placeholder="Ingresar datos" value="<?php echo set_value('txtUtilidadTEjercicio', @$datoDGASE[0]->UtilidadTEjercicio);?>">
              </td>
            </tr>
            <tr>              
              <td >Valor de reserva legal periodo actual:</td>
              <td >
                <input class="form-control" type="text" name="txtValorTReservaLegal"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTReservaLegal', @$datoDGASE[0]->ValorTReservaLegal);?>">
              </td>
              <td >Total reservas:</td>
              <td >
                <input class="form-control" type="text" name="txtValorTReserva"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTReserva', @$datoDGASE[0]->ValorTReserva);?>">
              </td>
            </tr>
            <tr>              
              <td >Activo corriente:</td>
              <td >
                <input class="form-control" type="text" name="txtValorTActivosCorriente"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTActivosCorriente', @$datoDGASE[0]->ValorTActivosCorriente);?>">
              </td>
              <td >Pasivo corriente:</td>
              <td >
                <input class="form-control" type="text" name="txtValorTPasivosCorriente"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPasivosCorriente', @$datoDGASE[0]->ValorTPasivosCorriente);?>">
              </td>
            </tr>
            <tr>              
              <td >Valor atribuido al estado por organismos de control sobre sanciones y multas en el periodo:</td>
              <td >
                <input class="form-control" type="text" name="txtValorTAtribuidoAlEstadoPorOrganismosDeControl"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTAtribuidoAlEstadoPorOrganismosDeControl', @$datoDGASE[0]->ValorTAtribuidoAlEstadoPorOrganismosDeControl);?>">
              </td>
              <td >Periodo:</td>
              <td >
                  <div class='input-group date' id='divPeriodoE'>
                      <input type='text' id="txtPeriodo" name="txtPeriodo" class="form-control" value="<?php echo set_value('txtPeriodo', @$datoDGASE[0]->Periodo);?>" readonly/>
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
        <table class="table table-striped table-bordered table-hover">
          <tbody>
            <input type="hidden" name="accion" value="<?php echo $accion; ?>">
            <input type="hidden" name="id" value="<?php echo @$datoDGASF[0]->IdDGASF; ?>">
            <tr>
              <td style="width: 200px" >Valor de créditos otorgados a socios con depósitos inferiores al 20%</td>
              <td >
                <input class="form-control" type="text" name="txtValorCreditoASociosConDepositoMenorA20Porciento"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorCreditoASociosConDepositoMenorA20Porciento', @$datoDGASF[0]->ValorCreditoASociosConDepositoMenorA20Porciento);?>">
              </td>
              <td style="width: 200px">Valor de créditos otorgados a socios con aportes inferiores a la media</td>
              <td >
                <input class="form-control" type="text" name="txtValorCreditoASociosConAporteMenorALaMedia"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorCreditoASociosConAporteMenorALaMedia', @$datoDGASF[0]->ValorCreditoASociosConAporteMenorALaMedia);?>">
              </td>
            </tr>
            <tr>
              <td >Valor de créditos a socios que poseen el mínimo de capital exigido</td>
              <td >
                <input class="form-control" type="text" name="txtValorCreditoASociosConMinCapitalExigido"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorCreditoASociosConMinCapitalExigido', @$datoDGASF[0]->ValorCreditoASociosConMinCapitalExigido);?>">
              </td>
              <td >Monto promedio de créditos de consumo concedidos por primera vez periodo actual</td>
              <td >
                <input class="form-control" type="text" name="txtMontoPromedioCreditoConsumoConcedidoPrimeraVez"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoPromedioCreditoConsumoConcedidoPrimeraVez', @$datoDGASF[0]->MontoPromedioCreditoConsumoConcedidoPrimeraVez);?>">
              </td>
            </tr>
            <tr>
              <td >Monto promedio de créditos de vivienda a socios nuevos concedido por primera vez en el periodo</td>
              <td >
                <input class="form-control" type="text" name="txtMontoPromedioCreditoViviendaConcedidoPrimeraVez"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoPromedioCreditoViviendaConcedidoPrimeraVez', @$datoDGASF[0]->MontoPromedioCreditoViviendaConcedidoPrimeraVez);?>">
              </td>
              <td >Monto promedio de microcréditos a socios nuevos cencedidos por primera vez en el periodo</td>
              <td >
                <input class="form-control" type="text" name="txtMontoPromedioMicrocreditoASociosNuevosPrimeraVez"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoPromedioMicrocreditoASociosNuevosPrimeraVez', @$datoDGASF[0]->MontoPromedioMicrocreditoASociosNuevosPrimeraVez);?>">
              </td>
            </tr>
            <tr>
              <td >Monto promedio de créditos de comercio a socios nuevos concedidos por primera vez en el periodo</td>
              <td >
                <input class="form-control" type="text" name="txtMontoPromedioCreditoComercioASociosNuevosPrimeraVez"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoPromedioCreditoComercioASociosNuevosPrimeraVez', @$datoDGASF[0]->MontoPromedioCreditoComercioASociosNuevosPrimeraVez);?>">
              </td>
              <td >Monto promedio de créditos vinculadosen el periodo</td>
              <td >
                <input class="form-control" type="text" name="txtMontoPromedioCreditosVinculados"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoPromedioCreditosVinculados', @$datoDGASF[0]->MontoPromedioCreditosVinculados);?>">
              </td>
            </tr>
            <tr>
              <td >Monto de certificados de aportación poseídos por el socio mayoritario</td>
              <td >
                <input class="form-control" type="text" name="txtMontoCertificadosAportacionPoseidosPorSocioMayoritario"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoCertificadosAportacionPoseidosPorSocioMayoritario', @$datoDGASF[0]->MontoCertificadosAportacionPoseidosPorSocioMayoritario);?>">
              </td>
              <td >Monto de certificados de aportación poseídos por el socio minoristas</td>
              <td >
                <input class="form-control" type="text" name="txtMontoCertificadosAportacionPoseidosPorSocioMinorista"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoCertificadosAportacionPoseidosPorSocioMinorista', @$datoDGASF[0]->MontoCertificadosAportacionPoseidosPorSocioMinorista);?>">
              </td>
            </tr>
            <tr>
              <td >Tasa media de interés sobre los certificados de aportación</td>
              <td >
                <input class="form-control" type="text" name="txtTasaMediaInteresSobreCertificadosDeAportacion"  placeholder="Ingresar datos" value="<?php echo set_value('txtTasaMediaInteresSobreCertificadosDeAportacion', @$datoDGASF[0]->TasaMediaInteresSobreCertificadosDeAportacion);?>">
              </td>
              <td >Valor agregado cooperativo distribuido a trabajadores</td>
              <td >
                <input class="form-control" type="text" name="txtValorAgregadoCooperativoDistribuidoATrabajadores"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorAgregadoCooperativoDistribuidoATrabajadores', @$datoDGASF[0]->ValorAgregadoCooperativoDistribuidoATrabajadores);?>">
              </td>
            </tr>
            <tr>
              <td >Prestaciones personales</td>
              <td >
                <input class="form-control" type="text" name="txtValorPrestacionesPersonales"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorPrestacionesPersonales', @$datoDGASF[0]->ValorPrestacionesPersonales);?>">
              </td>
              <td >Prestaciones colectivas</td>
              <td >
                <input class="form-control" type="text" name="txtValorPrestacionesColectivas"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorPrestacionesColectivas', @$datoDGASF[0]->ValorPrestacionesColectivas);?>">
              </td>
            </tr>
            <tr>
              <td >Gasto de formación para trabajadores</td>
              <td >
                <input class="form-control" type="text" name="txtGastoEnFormacionATrabajadores"  placeholder="Ingresar datos" value="<?php echo set_value('txtGastoEnFormacionATrabajadores', @$datoDGASF[0]->GastoEnFormacionATrabajadores);?>">
              </td>
              <td >Valor por becas, ayudas, servicios</td>
              <td >
                <input class="form-control" type="text" name="txtValorBecasAyudasServicios"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorBecasAyudasServicios', @$datoDGASF[0]->ValorBecasAyudasServicios);?>">
              </td>
            </tr>
            <tr>
              <td >Impuesto y tasa varias</td>
              <td >
                <input class="form-control" type="text" name="txtValorImpuestoYTasaVarias"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorImpuestoYTasaVarias', @$datoDGASF[0]->ValorImpuestoYTasaVarias);?>">
              </td>
              <td >Donación del fondo de Educación a la comunidad</td>
              <td >
                <input class="form-control" type="text" name="txtValorDonacionFondoEducacion"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorDonacionFondoEducacion', @$datoDGASF[0]->ValorDonacionFondoEducacion);?>">
              </td>
            </tr>
            <tr>
              <td >Fondo de Solidaridad</td>
              <td >
                <input class="form-control" type="text" name="txtValorFondoDeSolidaridad"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorFondoDeSolidaridad', @$datoDGASF[0]->ValorFondoDeSolidaridad);?>">
              </td>
              <td >Donativos a la comunidad</td>
              <td >
                <input class="form-control" type="text" name="txtValorDonativosAComunidad"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorDonativosAComunidad', @$datoDGASF[0]->ValorDonativosAComunidad);?>">
              </td>
            </tr>
            <tr>
              <td >Excedente Bruto</td>
              <td >
                <input class="form-control" type="text" name="txtValorExcedenteBruto"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorExcedenteBruto', @$datoDGASF[0]->ValorExcedenteBruto);?>">
              </td>
              <td >Impuestos sobre excedentes</td>
              <td >
                <input class="form-control" type="text" name="txtValorImpuestosSobreExcedentes"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorImpuestosSobreExcedentes', @$datoDGASF[0]->ValorImpuestosSobreExcedentes);?>">
              </td>
            </tr>
            <tr>
              <td >Dotación del fondo de Educación a los Socios</td>
              <td >
                <input class="form-control" type="text" name="txtValorDotacionDeFondoEducacion"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorDotacionDeFondoEducacion', @$datoDGASF[0]->ValorDotacionDeFondoEducacion);?>">
              </td>
              <td >Fondo de Reserva Irrepartibles</td>
              <td >
                <input class="form-control" type="text" name="txtValorFondoDeReservaIrrepartibles"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorFondoDeReservaIrrepartibles', @$datoDGASF[0]->ValorFondoDeReservaIrrepartibles);?>">
              </td>
            </tr>
            <tr>
              <td >Fondo de Reserva Repartibles</td>
              <td >
                <input class="form-control" type="text" name="txtValorFondoDeReservaRepartibles"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorFondoDeReservaRepartibles', @$datoDGASF[0]->ValorFondoDeReservaRepartibles);?>">
              </td>
              <td >Precio pagado a los asociados por compra de materias</td>
              <td >
                <input class="form-control" type="text" name="txtPrecioPagadoAAsociadosPorCompraDeMaterial"  placeholder="Ingresar datos" value="<?php echo set_value('txtPrecioPagadoAAsociadosPorCompraDeMaterial', @$datoDGASF[0]->PrecioPagadoAAsociadosPorCompraDeMaterial);?>">
              </td>
            </tr>
            <tr>
              <td >Descuento realizado a socios en ventas a productores</td>
              <td >
                <input class="form-control" type="text" name="txtDescuentoRealizadoASociosEnVentasAProductores"  placeholder="Ingresar datos" value="<?php echo set_value('txtDescuentoRealizadoASociosEnVentasAProductores', @$datoDGASF[0]->DescuentoRealizadoASociosEnVentasAProductores);?>">
              </td>
              <td >Gastos por servicos voluntarios gratuitos a socios</td>
              <td >
                <input class="form-control" type="text" name="txtGastosPorServiciosVoluntariosGratuitosASocios"  placeholder="Ingresar datos" value="<?php echo set_value('txtGastosPorServiciosVoluntariosGratuitosASocios', @$datoDGASF[0]->GastosPorServiciosVoluntariosGratuitosASocios);?>">
              </td>
            </tr>
            <tr>
              <td >Dotación Fondo de Reservas  Irrepartibles</td>
              <td >
                <input class="form-control" type="text" name="txtValorDotacionFondoDeReservaIrrepartibles"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorDotacionFondoDeReservaIrrepartibles', @$datoDGASF[0]->ValorDotacionFondoDeReservaIrrepartibles);?>">
              </td>
              <td >Otras Reservas</td>
              <td >
                <input class="form-control" type="text" name="txtValorOtrasReservas"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorOtrasReservas', @$datoDGASF[0]->ValorOtrasReservas);?>">
              </td>
            </tr>
            <tr>
              <td >Total depósitos realizados</td>
              <td >
                <input class="form-control" type="text" name="txtSaldoTDepositos"  placeholder="Ingresar datos" value="<?php echo set_value('txtSaldoTDepositos', @$datoDGASF[0]->SaldoTDepositos);?>">
              </td>
              <td >Total comprobantes físicos emitidos</td>
              <td >
                <input class="form-control" type="text" name="txtNumTComprobantesFisicosEmitidos"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTComprobantesFisicosEmitidos', @$datoDGASF[0]->NumTComprobantesFisicosEmitidos);?>">
              </td>
            </tr>
            <tr>
              <td >Gasto total multas </td>
              <td >
                <input class="form-control" type="text" name="txtGastoTMultas"  placeholder="Ingresar datos" value="<?php echo set_value('txtGastoTMultas', @$datoDGASF[0]->GastoTMultas);?>">
              </td>
              <td >Valor Beneficios de ley</td>
              <td >
                <input class="form-control" type="text" name="txtValorTBeneficiosDeLey"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTBeneficiosDeLey', @$datoDGASF[0]->ValorTBeneficiosDeLey);?>">
              </td>
            </tr>
            <tr>
              <td >Número de limpiezas realizadas por día</td>
              <td >
                <input class="form-control" type="text" name="txtNumTLimpiezasPorDia"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTLimpiezasPorDia', @$datoDGASF[0]->NumTLimpiezasPorDia);?>">
              </td>
              <td >Número de limpiezas programadas por día</td>
              <td >
                <input class="form-control" type="text" name="txtNumTLimpiezasProgramadasPorDia"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTLimpiezasProgramadasPorDia', @$datoDGASF[0]->NumTLimpiezasProgramadasPorDia);?>">
              </td>
            </tr>
            <tr>
              <td >Empleados que no gozaron de las vacaciones</td>
              <td >
                <input class="form-control" type="text" name="txtNumTEmpeladosQueNoGozaronVacaciones"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpeladosQueNoGozaronVacaciones', @$datoDGASF[0]->NumTEmpeladosQueNoGozaronVacaciones);?>">
              </td>
              <td >Provisión Décimo Cuarto</td>
              <td >
                <input class="form-control" type="text" name="txtValorTPorPagarProvisionDecimoCuarto"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTPorPagarProvisionDecimoCuarto', @$datoDGASF[0]->ValorTPorPagarProvisionDecimoCuarto);?>">
              </td>
            </tr>
            <tr>
              <td >Numero de accidentes </td>
              <td >
                <input class="form-control" type="text" name="txtNumTAccidentes5Anios"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTAccidentes5Anios', @$datoDGASF[0]->NumTAccidentes5Anios);?>">
              </td>
              <td >Empleados evaluados en el desempeño profesional </td>
              <td >
                <input class="form-control" type="text" name="txtNumTEmpleadosEvaluadosDesempenioProfesional"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumTEmpleadosEvaluadosDesempenioProfesional', @$datoDGASF[0]->NumTEmpleadosEvaluadosDesempenioProfesional);?>">
              </td>
            </tr>
            <tr>
              <td >Valor aportación capital social </td>
              <td >
                <input class="form-control" type="text" name="txtValorTAportacionesCapitalSocial"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTAportacionesCapitalSocial', @$datoDGASF[0]->ValorTAportacionesCapitalSocial);?>">
              </td>
              <td >Tasa pasiva captacion del público </td>
              <td >
                <input class="form-control" type="text" name="txtTasaPasivaCaptacionDelPublicoPonderada"  placeholder="Ingresar datos" value="<?php echo set_value('txtTasaPasivaCaptacionDelPublicoPonderada', @$datoDGASF[0]->TasaPasivaCaptacionDelPublicoPonderada);?>">
              </td>
            </tr>
            <tr>
              <td >Monto total compras </td>
              <td >
                <input class="form-control" type="text" name="txtMontoTCompras"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoTCompras', @$datoDGASF[0]->MontoTCompras);?>">
              </td>
              <td >Valro agregado cooperativo distribuido a la comunidad</td>
              <td >
                <input class="form-control" type="text" name="txtValorAgregadoCooperativoDistribuidoAComunidad"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorAgregadoCooperativoDistribuidoAComunidad', @$datoDGASF[0]->ValorAgregadoCooperativoDistribuidoAComunidad);?>">
              </td>
            </tr>
            <tr>
              <td >Valor agregado cooperativo distribuido a socios </td>
              <td >
                <input class="form-control" type="text" name="txtValorAgregadoCooperativoDistribuidoASocios"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorAgregadoCooperativoDistribuidoASocios', @$datoDGASF[0]->ValorAgregadoCooperativoDistribuidoASocios);?>">
              </td>
              <td >Valor agregado cooperativo incorporado a Patrimonio común</td>
              <td >
                <input class="form-control" type="text" name="txtValorAgregadoCooperativoIncorporadoAPatrimonioComun"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorAgregadoCooperativoIncorporadoAPatrimonioComun', @$datoDGASF[0]->ValorAgregadoCooperativoIncorporadoAPatrimonioComun);?>">
              </td>
            </tr>
            <tr>
              <td >Compras a entidades reconocidas como de comercio justo </td>
              <td >
                <input class="form-control" type="text" name="txtValorComprasRealizadasAEntidadesReconocidasComoDeComercioJusto"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorComprasRealizadasAEntidadesReconocidasComoDeComercioJusto', @$datoDGASF[0]->ValorComprasRealizadasAEntidadesReconocidasComoDeComercioJusto);?>">
              </td>
              <td >Ventas a entidades reconocidas como de comercio justo</td>
              <td >
                <input class="form-control" type="text" name="txtValorVentasRealizadasAEntidadesReconocidasComoComercioJusto"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorVentasRealizadasAEntidadesReconocidasComoComercioJusto', @$datoDGASF[0]->ValorVentasRealizadasAEntidadesReconocidasComoComercioJusto);?>">
              </td>
            </tr>
            <tr>
              <td >Valor depósitos procedentes de entidades como de comercio justo </td>
              <td >
                <input class="form-control" type="text" name="txtValorDepositosProcedenteDeEntidadesReconocidasComoComercioJusto"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorDepositosProcedenteDeEntidadesReconocidasComoComercioJusto', @$datoDGASF[0]->ValorDepositosProcedenteDeEntidadesReconocidasComoComercioJusto);?>">
              </td>
              <td >Valor créditos otorgados a entidades reconocidas como comercio justo</td>
              <td >
                <input class="form-control" type="text" name="txtValorCreditosOtorgadosAEntidadesReconocidasComoComercioJusto"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorCreditosOtorgadosAEntidadesReconocidasComoComercioJusto', @$datoDGASF[0]->ValorCreditosOtorgadosAEntidadesReconocidasComoComercioJusto);?>">
              </td>
            </tr>
            <tr>
              <td >Valor aportes (capital social) ingresados en el año </td>
              <td >
                <input class="form-control" type="text" name="txtValorTAportesIngresados"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorTAportesIngresados', @$datoDGASF[0]->ValorTAportesIngresados);?>">
              </td>
              <td >Periodo:</td>
              <td >
                  <div class='input-group date' id='divPeriodoF'>
                      <input type='text' id="txtPeriodo" name="txtPeriodo" class="form-control" value="<?php echo set_value('txtPeriodo', @$datoDGASF[0]->Periodo);?>" readonly/>
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

<!-- SIRVE PARA OCULTAR OTROS TABS QUE NO ESTAN ACTIVOS PARA LA EDICION-->
<script type="text/javascript">
  
</script>

<!-- CAMBIAR EL TITULO AL TAN CORRESPONDIENTE -->
<script type="text/javascript" src="<?php echo base_url()?>js/ToggleableTabs/tabs.js"></script>