<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datetimepicker.min.css" >
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datepicker.css" > 

<script type="text/javascript">
  function regresar(){
    window.location="<?php echo base_url()?>sesionConsejo/sesionesConsejo";
  }

  function limpiar() {
    var t = document.getElementById("form1").getElementsByTagName("input");
//var t = document.getElementById("TAB").getElementsByTagName("input");
for (var i=0; i<t.length; i++) {
  if (t[i].type == "text") {    
    t[i].value = "";
  }
}
window.location="<?php echo base_url()?>sesionConsejo/nuevoSesionConsejo";
}
</script>
<?php 
$tipoSesion = array(
  '1' => "Consejo de Administración",
  '2' => "Consejo de Vigilancia",
  '3' => "Sindicatos con Directivos",
  '4' => "Otros",
  );
$estado = array('1' => "Planificada", '2' => "Ejecutada");
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

  <form action="<?php echo base_url()?>sesionConsejo/guardarSesionConsejo" id="form1" method="POST">
    <table width="100%" cellspacing=8px" id="Tabla1">
      <tbody>
        <input type="hidden" name="accion" value="<?php echo $accion; ?>">
        <input type="hidden" name="id" value="<?php echo @$sesionConsejo[0]->IdReuniones; ?>">
        <tr>
          <th class="izquierda">Consejo:</th>
          <td>
            <select class="form-control" name="selectConsejo" id="proveedor" type="hidden" >
              <?php foreach ($consejos as $items ) {                
                if ($items->IdConsejos == @$sesionConsejo[0]->IdConsejo) { ?>
                <option selected="selected" value="<?php echo $items->IdConsejos; ?>"><?php echo $items->NombreConsejos; ?></option>
                <?php }else{ ?>
                <option value="<?php echo $items->IdConsejos; ?>"><?php echo $items->NombreConsejos; ?></option>
                <?php }
              } ?>
            </select>
          </td>
        </tr>
        <tr>
          <th class="izquierda">* Nombre de la Reuinión: </th>
          <td>
            <input class="form-control" type="text" name="txtNombreReunion"  placeholder="Ingresar datos" value="<?php echo set_value('txtNombreReunion', @$sesionConsejo[0]->NombreReunion); ?>">
          </td>
        </tr>
        <tr>
          <th class="izquierda">Tipo de Sesión:</th>
          <td>
            <select class="form-control" name="selectTipoSesion">
              <?php 
              foreach ($tipoSesion as $key) {
                if ($key == @$sesionConsejo[0]->TipoSesion) { ?>
                <option selected="selected" > <?php echo $key; ?></option>                      
                <?php  }else{ ?>
                <option> <?php echo $key; ?></option>
                <?php  }
              } ?>
            </select>
          </td>
        </tr>
        <tr>
          <th class="izquierda">* Fecha Planificada: </th>
          <td>
            <div class='input-group date' id='divMiCalendario'>
                <input type='text' id="txtFechaPlanificada" name="txtFechaPlanificada" class="form-control" value="<?php echo set_value('txtFechaPlanificada', @$sesionConsejo[0]->FechaPlanificacion); ?>" readonly/>
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      </span>
            </div>
          </td>
        </tr>
        <tr>
          <th class="izquierda">* Número de Representantes Esperados: </th>
          <td>
            <input class="form-control" type="text" name="txtReprsentantesEsperados"  placeholder="Ingresar datos" value="<?php echo set_value('txtReprsentantesEsperados', @$sesionConsejo[0]->RepresentantesPlanificados); ?>">
          </td>
        </tr>
        <tr>
          <th class="izquierda">Estado:</th>
          <td>
            <select class="form-control" name="selectEstado">
              <?php 
              foreach ($estado as $key) {
                if ($key == @$sesionConsejo[0]->EstadoReunion) { ?>
                <option selected="selected" > <?php echo $key; ?></option>                      
                <?php }else{ ?>
                <option> <?php echo $key; ?></option>
                <?php }
                
              } ?>             
            </select>
          </td>
        </tr>
        <tr>
          <th class="izquierda">Fecha de Realización: </th>
          <td>
          <div class='input-group date' id='divMiCalendario2'>
                      <input type='text' id="txtFechaRealizacion" name="txtFechaRealizacion" class="form-control" value="<?php echo set_value('txtFechaRealizacion', @$sesionConsejo[0]->FechaEjecucion); ?>" />
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      </span>
          </div>
          </td>
        </tr>
        <tr>
          <th class="izquierda">Asistentes: </th>
          <td>
            <input class="form-control" type="text" name="txtAsistentes"  placeholder="Ingresar datos" value="<?php echo set_value('txtAsistentes', @$sesionConsejo[0]->RepresentantesPresentes); ?>">
          </td>
        </tr>
        <tr>
          <th class="izquierda">Observaciones: </th>
          <td>
            <input class="form-control" type="text" name="txtObservacion"  placeholder="Ingresar datos" value="<?php echo set_value('txtObservacion', @$sesionConsejo[0]->Observaciones); ?>">
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
     $('#divMiCalendario').datetimepicker({
          format: 'YYYY-MM-DD'
      });

     $('#divMiCalendario2').datetimepicker({
          format: 'YYYY-MM-DD'
      });


     $('#divPeriodo').datepicker({
            format: "yyyy",
        viewMode: "years", 
        minViewMode: "years"
    });
   </script>