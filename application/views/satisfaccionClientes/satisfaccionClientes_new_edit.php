<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datetimepicker.min.css" >

<script type="text/javascript">
  function regresar(){
    window.location="<?php echo base_url()?>satisfaccionCliente/satisfaccionClientes";
  }

  function limpiar() {
    var t = document.getElementById("form1").getElementsByTagName("input");
//var t = document.getElementById("TAB").getElementsByTagName("input");
for (var i=0; i<t.length; i++) {
  if (t[i].type == "text") {    
    t[i].value = "";
  }
}
window.location="<?php echo base_url()?>satisfaccionCliente/nuevoSatisfaccionCliente";
}
</script>
<?php 
$tipoSancion = array('1' => "Clientes", '2' => "Servicios Financieros");
$frecuencia = array(
  '1' => "Mensual", 
  '2' => "Trimestral",
  '3' => "Semestral",
  '4' => "Anual"
  );
  ?>
  <h3 class="page-header" align="center"><span class="glyphicon glyphicon-th-list"></span> <?php echo $titulo; ?></h3>

  <div id="TAB">
    <div class="error"> 
      <center>
        <?php messages_flash('danger',validation_errors(),'Errores del formulario', true); ?>
      </center>
    </div>
    <form action="<?php echo base_url()?>satisfaccionCliente/guardarSatisfaccionCliente" id="form1" method="POST">
      <table width="100%" border="0" cellspacing=8px" id="Tabla1">
        <tbody>
          <input type="hidden" name="accion" value="<?php echo $accion; ?>">
          <input type="hidden" name="id" value="<?php echo @$satisfaccionCliente[0]->IdSatisfaccionCliente; ?>">
          <tr>
            <th class="izquierda">Tipo de Satisfacción:</th>
            <td>
              <select class="form-control" name="selectTipoSatisfaccion">
                <?php 
                foreach ($tipoSancion as $key) {
                  if ($key == @$satisfaccionCliente[0]->TipoSatisfaccion) { ?>
                  <option selected="selected" > <?php echo $key; ?></option>                      
                  <?php  }else{ ?>
                  <option> <?php echo $key; ?></option>
                  <?php  }
                } ?>
              </select>
            </td>
          </tr>
          <tr>
            <th class="izquierda">Método Utilizado: </th>
            <td>
              <input class="form-control" type="text" name="txtMetodoUtilizado"  placeholder="Ingresar datos" value="<?php echo set_value('txtMetodoUtilizado', @$satisfaccionCliente[0]->Metodo); ?>">
            </td>
          </tr>
          <tr>
            <th class="izquierda">Porcentaje de Satisfacción: </th>
            <td>
              <input class="form-control" type="text" name="txtPorcentajeSatisfaccion"  placeholder="Ingresar datos" value="<?php echo set_value('txtPorcentajeSatisfaccion', @$satisfaccionCliente[0]->ResultadoSatisfaccion); ?>">
            </td>
          </tr>
          <tr>
            <th class="izquierda">Observaciones: </th>
            <td>
              <input class="form-control" type="text" name="txtObservaciones"  placeholder="Ingresar datos" value="<?php echo set_value('txtObservaciones', @$satisfaccionCliente[0]->ObservacionSatisfaccion); ?>">
            </td>
          </tr>
          <tr>
            <th class="izquierda">Frecuencia:</th>
            <td>
              <select class="form-control" name="selectFrecuencia">
                <?php 
                foreach ($frecuencia as $key) {
                  if ($key == @$satisfaccionCliente[0]->Frecuencia) { ?>
                  <option selected="selected" > <?php echo $key; ?></option>                      
                  <?php  }else{ ?>
                  <option> <?php echo $key; ?></option>
                  <?php  }
                } ?>
              </select>
            </td>
          </tr>
          <tr>
            <th class="izquierda">Fecha del Mes: </th>
            <td>
                  <div class='input-group date' id='divMiCalendario'>
                      <input type='text' id="txtFechaMes" name="txtFechaMes" class="form-control" value="<?php echo set_value('txtFechaMes', @$satisfaccionCliente[0]->FechaMes); ?>" />
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
     $('#divMiCalendario').datetimepicker({
          format: 'YYYY-MM-DD'
      });
   </script>