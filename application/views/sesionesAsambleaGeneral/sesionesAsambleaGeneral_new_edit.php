<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datetimepicker.min.css" >
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datepicker.css" > 

<script type="text/javascript">
  function regresar(){
    window.location="<?php echo base_url()?>organismo/sesionesAsambleaGeneral";
  }

  function limpiar() {
    var t = document.getElementById("form1").getElementsByTagName("input");
//var t = document.getElementById("TAB").getElementsByTagName("input");
for (var i=0; i<t.length; i++) {
  if (t[i].type == "text") {    
    t[i].value = "";
  }
}
window.location="<?php echo base_url()?>organismo";
}
</script>
<?php 
$estado = array('1' => "Planificada", '2' => "Ejecutada");
$tipoSesion = array('1' => "Informativa", '2' => "Extraordinaria", '3' => "Ordinaria");
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
  <form action="<?php echo base_url()?>organismo/guardarSesionAsambleaGeneral" id="form1" method="POST" enctype="multipart/form-data">
    <table width="100%" cellspacing=8px" id="Tabla1">
      <tbody>
        <input type="hidden" name="accion" value="<?php echo $accion; ?>">
        <input type="hidden" name="id" value="<?php echo @$sesionAsambleaGeneral[0]->IdSAG; ?>">

        <tr>
          <th class="izquierda">* Nombre de la Reuinión: </th>
          <td>
            <input class="form-control" type="text" name="txtNombreReunion"  placeholder="Ingresar datos" value="<?php echo set_value('txtNombreReunion', @$sesionAsambleaGeneral[0]->NombreReunion); ?>">
          </td>
        </tr>
        <tr>
          <th class="izquierda">Tipo de Sesión:</th>
          <td>
            <select class="form-control" name="selectTipoReunion">
              <?php 
              foreach ($tipoSesion as $key) {
                if ($key == @$sesionAsambleaGeneral[0]->TipoReunion) { ?>
                <option selected="selected" > <?php echo $key; ?></option>                      
                <?php }else{ ?>
                <option> <?php echo $key; ?></option>
                <?php }
                
              } ?>             
            </select>
          </td>
        </tr>
        <tr>
          <th class="izquierda">* Fecha Planificada: </th>
          <td>

            <div class='input-group date' id='divMiCalendario1'>
                      <input type='text' id="txtFechaPlanificada" name="txtFechaPlanificada" class="form-control" value="<?php echo set_value('txtFechaPlanificada', @$sesionAsambleaGeneral[0]->FechaPlanificacion); ?>" readonly/>
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      </span>
            </div>
          </td>
        </tr>
        <tr>
          <th class="izquierda">* Número de Representantes Esperados: </th>
          <td>
            <input class="form-control" type="text" name="txtReprsentantesEsperados"  placeholder="Ingresar datos" value="<?php echo set_value('txtReprsentantesEsperados', @$sesionAsambleaGeneral[0]->RepresentantesPlanificados); ?>">
          </td>
        </tr>
        <tr>
          <th class="izquierda">Estado:</th>
          <td>
            <select class="form-control" name="selectEstado">
              <?php 
              foreach ($estado as $key) {
                if ($key == @$sesionAsambleaGeneral[0]->EstadoReunion) { ?>
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
                      <input type='text' id="txtFechaRealizacion" name="txtFechaRealizacion" class="form-control" value="<?php echo set_value('txtFechaRealizacion', @$sesionAsambleaGeneral[0]->FechaEjecucion); ?>" readonly/>
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      </span>
            </div>
          </td>
        </tr>
        <tr>
          <th class="izquierda">Asistentes: </th>
          <td>
            <input class="form-control" type="text" name="txtAsistentes"  placeholder="Ingresar datos" value="<?php echo set_value('txtAsistentes', @$sesionAsambleaGeneral[0]->RepresentantesPresentes); ?>">
          </td>
        </tr>
        <tr>
            <th class="izquierda">Fotografía</th>
            <td>
              <img src="data:image/jpg;base64, <?php echo base64_encode(@$sesionAsambleaGeneral[0]->Foto) ?>" width="100" height="100" >
            </td>
          </tr>
        <tr>
            <th class="izquierda">Seleccionar Imagen: </th>
            <td>
              <input type="file" name="inputImagen" >
            </td>
        </tr>
        <tr>
          <th class="izquierda">Observaciones: </th>
          <td>
            <input class="form-control" type="text" name="txtObservacion"  placeholder="Ingresar datos" value="<?php echo set_value('txtObservacion', @$sesionAsambleaGeneral[0]->Observaciones); ?>">
          </td>
        </tr>
        <tr>
          <th class="izquierda">* Periodo: </th>
          <td>
            <div class='input-group date' id='divPeriodo'>
              <input type='text' id="txtPeriodo" name="txtPeriodo" class="form-control" value="<?php echo set_value('txtPeriodo',@$sesionAsambleaGeneral[0]->Periodo); ?>" readonly/>
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
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

     $('#divPeriodo').datepicker({
            format: "yyyy",
        viewMode: "years", 
        minViewMode: "years"
    });
   </script>