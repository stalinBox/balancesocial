<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datetimepicker.min.css" >
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datepicker.css" > 

<script type="text/javascript">
  function regresar(){
    window.location="<?php echo base_url()?>segmentoCredito/segmentosCreditos";
  }

  function limpiar() {
    var t = document.getElementById("form1").getElementsByTagName("input");
//var t = document.getElementById("TAB").getElementsByTagName("input");
for (var i=0; i<t.length; i++) {
  if (t[i].type == "text") {    
    t[i].value = "";
  }
}
window.location="<?php echo base_url()?>segmentoCredito/nuevoSegmentoCredito";
}
</script>
<?php 
$cumplimiento = array(
  '1' => "SI CUMPLE",
  '2' => "NO CUMPLE"
  );
$descripcionEjecucion = "El porcentaje de ejecución es igual a la razón entre el monto concedido por cada segmento de crédito y la sumatoria total de los montos concedidos por cada segmento de crédito a nivel consolidado.";
$descripcionCumplimiento = "Si el porcentaje de ejecución es >= al establecido por el POA --> Si cumple, caso contrario No cumple";
  ?>
  <h3 class="page-header" align="center"><span class="glyphicon glyphicon-th-list"></span> <?php echo $titulo; ?></h3>

  <div id="TAB">
    <div class="error"> 
      <center>
        <?php messages_flash('danger',validation_errors(),'Errores del formulario', true); ?>
      </center>
    </div>
    <form action="<?php echo base_url()?>segmentoCredito/guardarSegmentoCredito" id="form1" method="POST">
      <table width="100%" cellspacing=8px" id="Tabla1">
        <tbody>
          <input type="hidden" name="accion" value="<?php echo $accion; ?>">
          <input type="hidden" name="id" value="<?php echo @$segmentoCredito[0]->IdSegmentosCredito; ?>">
          <tr>
            <th class="izquierda">Segmento: </th>
            <td>
              <input class="form-control" type="text" name="txtNombreSegmento"  placeholder="Ingresar datos" value="<?php echo set_value('txtNombreSegmento', @$segmentoCredito[0]->NombreSegmento); ?>">
            </td>
          </tr>
          <tr>
            <th class="izquierda">Monto Concedido: </th>
            <td>
              <input class="form-control" type="text" name="txtMontoConcedido"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoConcedido', @$segmentoCredito[0]->MontoConcedido); ?>">
            </td>
          </tr>
          <tr>
            <th class="izquierda">Ejecución (%): </th>
            <td>
              <input class="form-control" type="text" name="txtEjecucion"  placeholder="Ingresar datos" value="<?php echo set_value('txtEjecucion', @$segmentoCredito[0]->Ejecucion); ?>" title="<?php echo $descripcionEjecucion;?>">
            </td>
          </tr>
          <tr>
            <th class="izquierda">Establecido por POA (%): </th>
            <td>
              <input class="form-control" type="text" name="txtEstablecidoPOA"  placeholder="Ingresar datos" value="<?php echo set_value('txtEstablecidoPOA', @$segmentoCredito[0]->EstablecidoPorPOA); ?>">
            </td>
          </tr>
          <tr>
            <th class="izquierda">Cumplimiento:</th>
            <td>
              <select class="form-control" name="selectCumplimiento" title="<?php echo $descripcionCumplimiento;?>">
                <?php 
                foreach ($cumplimiento as $key) {
                  if ($key == @$segmentoCredito[0]->Cumplimiento) { ?>
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
                      <input type='text' id="txtFechaMes" name="txtFechaMes" class="form-control" value="<?php echo set_value('txtFechaMes', @$segmentoCredito[0]->FechaMes); ?>" />
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

     $('#divPeriodo').datepicker({
            format: "yyyy",
        viewMode: "years", 
        minViewMode: "years"
    });
   </script>