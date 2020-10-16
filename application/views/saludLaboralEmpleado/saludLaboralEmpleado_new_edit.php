<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datetimepicker.min.css" >
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datepicker.css" > 

<script type="text/javascript">
  function regresar(){
    window.location="<?php echo base_url()?>saludLaboralEmpleado/saludLaboralEmpleados";
  }

  function limpiar() {
    var t = document.getElementById("form1").getElementsByTagName("input");
//var t = document.getElementById("TAB").getElementsByTagName("input");
for (var i=0; i<t.length; i++) {
  if (t[i].type == "text") {    
    t[i].value = "";
  }
}
window.location="<?php echo base_url()?>saludLaboralEmpleado/nuevoSaludLaboralEmpleado";
}
</script>
<?php 
$tipo = array('1' => "Ejercicio Físico", '2' => "Combatir Estrés", '3' => "Otro");
?>
<h3 class="page-header" align="center"><span class="glyphicon glyphicon-th-list"></span> <?php echo $titulo; ?></h3>

<div id="TAB">
  <div class="error"> 
    <center>
      <?php messages_flash('danger',validation_errors(),'Errores del formulario', true); ?>
    </center>
  </div>
  <div class="container">
  <dl>Los campos con * son obligatorios</dl>
</div>
  <form action="<?php echo base_url()?>saludLaboralEmpleado/guardarSaludLaboralEmpleado" id="form1" method="POST" enctype="multipart/form-data">
    <table width="100%" cellspacing=8px" id="Tabla1">
      <tbody>
        <input type="hidden" name="accion" value="<?php echo $accion; ?>">
        <input type="hidden" name="id" value="<?php echo @$saludLaboralEmpleado[0]->IdSaludLaboral; ?>">        
        <tr>
          <th class="izquierda">* Nombre: </th>
          <td><input class="form-control" type="text" name="txtNombre"  placeholder="Ingresar datos" value="<?php echo set_value('txtNombre', @$saludLaboralEmpleado[0]->NombreSaludLaboral); ?>"></td>
        </tr>
        <tr>
          <th class="izquierda">Tipo:</th>
          <td>
            <select class="form-control" name="selectTipo">
              <?php 
              foreach ($tipo as $key) {
                if ($key == @$saludLaboralEmpleado[0]->TipoSaludLaboral) { ?>
                <option selected="selected" > <?php echo $key; ?></option>            
                <?php  }else{ ?>
                <option> <?php echo $key; ?></option>
                <?php  }
              } ?> 
            </select>
          </td>
        </tr>
        <tr>
          <th class="izquierda">* Fecha de Planificación: </th>
          <td>
          <div class='input-group date' id='divMiCalendario1'>
                      <input type='text' id="txtFechaPlanificacion" name="txtFechaPlanificacion" class="form-control" value="<?php echo set_value('txtFechaPlanificacion', @$saludLaboralEmpleado[0]->FechaPlanificacion); ?>" readonly/>
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      </span>
          </div>
          </td>
        </tr>
        <tr>
          <th class="izquierda">* Horas Planificadas: </th>
          <td>
            <input class="form-control" type="text" name="txtNumHorasPlanificadas"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumHorasPlanificadas', @$saludLaboralEmpleado[0]->HorasPlanificadas); ?>">
          </td>
        </tr>
        <tr>
          <th class="izquierda">* Participantes Esperados: </th>
          <td>
            <input class="form-control" type="text" name="txtNumParticipantesEsperados"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumParticipantesEsperados', @$saludLaboralEmpleado[0]->ParticipantesEsperados); ?>">
          </td>
        </tr>
        <tr>
          <th class="izquierda">* Costo Planificado: </th>
          <td>
            <input class="form-control" type="text" name="txtCostoPlanificado"  placeholder="Ingresar datos" value="<?php echo set_value('txtCostoPlanificado', @$saludLaboralEmpleado[0]->CostoPlanificado); ?>">
          </td>
        </tr>
        <tr>
         <th class="izquierda">Empleado Responsable:</th>
         <td>
          <select class="form-control" name="selectEmpleado" id="empleado" type="hidden" >
            <?php 
            foreach ($empleados as $items) {
              if ($items->CedulaEmpleado == @$saludLaboralEmpleado[0]->CiResponsable) { ?>
              <option selected="selected" value="<?php echo $items->CedulaEmpleado; ?>"><?php echo $items->ApellidoPaternoEmpleado." ".$items->ApellidoMaternoEmpleado. " ".$items->NombresEmpleado;?></option>
              <?php }else{ ?>
              <option value="<?php echo $items->CedulaEmpleado; ?>"><?php echo $items->ApellidoPaternoEmpleado." ".$items->ApellidoMaternoEmpleado. " ".$items->NombresEmpleado;?></option>
              <?php }
            } ?>              
          </select>
        </td>
      </tr>
      <tr>
       <th class="izquierda">Proveedor:</th>
       <td>
        <select class="form-control" name="selectProveedor" id="empleado" type="hidden" >
          <?php 
          foreach ($proveedores as $items) {
            if ($items->IdProveedor == @$saludLaboralEmpleado[0]->IdProveedor) { ?>
            <option selected="selected" value="<?php echo $items->IdProveedor; ?>"><?php echo $items->NombreProveedor;?></option>      
            <?php }else{ ?>
            <option value="<?php echo $items->IdProveedor; ?>"><?php echo $items->NombreProveedor;?></option>
            <?php }               
          } ?>
        </select>
      </td>
    </tr>
    <tr>
      <th class="izquierda">Estado:</th>
      <td>
        <select class="form-control" name="selectEstado">
          <option>Palnificada</option>
          <option>Ejecutada</option>
        </select>
      </td>
    </tr>
    <tr>
      <th class="izquierda">Costo Aportado por la Empresa: </th>
      <td>
        <input class="form-control" type="text" name="txtCostoAportaEmpresa"  placeholder="Ingresar datos" value="<?php echo set_value('txtCostoAportaEmpresa', @$saludLaboralEmpleado[0]->CostoAportaOrganizacion); ?>">
      </td>
    </tr>
    <tr>
      <th class="izquierda">Número de Participantes: </th>
      <td>
        <input class="form-control" type="text" name="txtNumParticipantes"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumParticipantes', @$saludLaboralEmpleado[0]->Participantes); ?>">
      </td>
    </tr>
    <tr>
      <th class="izquierda">Número de Horas Ejecutadas: </th>
      <td>
        <input class="form-control" type="text" name="txtNumHorasEjecutadas"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumHorasEjecutadas', @$saludLaboralEmpleado[0]->HorasEjecutadas); ?>">
      </td>
    </tr>

    <tr>
      <th class="izquierda">Fecha de Inicio: </th>
      <td>
          <div class='input-group date' id='divMiCalendario2'>
              <input type='text' id="txtFechaInicio" name="txtFechaInicio" class="form-control" value="<?php echo set_value('txtFechaInicio', @$saludLaboralEmpleado[0]->FechaInicioEjecucion); ?>" readonly/>
              <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
          </span>
         </div>
      </td>
    </tr>
    <tr>
      <th class="izquierda">Fecha Fin: </th>
      <td>
          <div class='input-group date' id='divMiCalendario3'>
            <input type='text' id="txtFechaFin" name="txtFechaFin" class="form-control" value="<?php echo set_value('txtFechaFin', @$saludLaboralEmpleado[0]->FechaFinEjecucion); ?>" readonly/>
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
            </span>
          </div>
    </tr>
    <tr>
      <th class="izquierda">Observaciones: </th>
      <td><input class="form-control" type="text" name="txtObservaciones"  placeholder="Ingresar datos" value="<?php echo set_value('txtObservaciones', @$saludLaboralEmpleado[0]->Observacion); ?>"></td>
    </tr>
    <tr>
        <th class="izquierda">Imagen</th>
        <td>
          <img src="data:image/jpg;base64, <?php echo base64_encode(@$saludLaboralEmpleado[0]->Imagen) ?>" width="100" height="100" >
        </td>
      </tr>
    <tr>
        <th class="izquierda">Seleccionar Imagen: </th>
        <td>
          <input type="file" name="inputFoto" >
        </td>
    </tr>
    <tr>
      <th class="izquierda">* Periodo: </th>
      <td>
          <div class='input-group date' id='divPeriodo'>
            <input type='text' id="txtPeriodo" name="txtPeriodo" class="form-control" value="<?php echo set_value('txtPeriodo', @$saludLaboralEmpleado[0]->Periodo); ?>" readonly/>
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
            </span>
      </div>

      </td>
    </tr>
  </tbody>
</table>
<table>
  <tr>
    <br>
  </tr>
  <tr>
    <td><input type="button" onclick="regresar()" name="" class="botones" value="Regresar"></td>
    <td></td>
    <td></td>   
    <td></td>   
    <td><input type="submit" name="submit" class="botones" value="Guardar"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td><td></td>
    <td></td>
    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
  </tr>
</table>
</form>
<center>
  <div style="font-size: 16px; color: #FE2E2E;"> 
    <?php 
    echo isset($error) ? utf8_decode($error) : '';
    ?>            
  </div>
</center>
</div>

   <script src="<?php echo base_url()?>js/jquery.min.js"></script>
   <script src="<?php echo base_url()?>js/calendario/moment.min.js"></script>
   <script src="<?php echo base_url()?>js/calendario/bootstrap-datetimepicker.min.js"></script>
   <script src="<?php echo base_url()?>js/calendario/bootstrap-datetimepicker.es.js"></script>
   <script src="<?php echo base_url()?>js/calendario/bootstrap-datepicker.js"></script>

   <script type="text/javascript">
     $('#divMiCalendario1').datetimepicker({
          format: 'YYYY-MM-DD'
      });
     $('#divMiCalendario2').datetimepicker({
          format: 'YYYY-MM-DD'
      });
     $('#divMiCalendario3').datetimepicker({
          format: 'YYYY-MM-DD'
      });

     $('#divPeriodo').datepicker({
        format: "yyyy",
        viewMode: "years", 
        minViewMode: "years"
    });
   </script>