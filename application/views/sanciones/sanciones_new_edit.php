<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datetimepicker.min.css" >

<script type="text/javascript">
  function regresar(){
    window.location="<?php echo base_url()?>sancion/sanciones";
  }

  function limpiar() {
    var t = document.getElementById("form1").getElementsByTagName("input");
for (var i=0; i<t.length; i++) {
  if (t[i].type == "text") {    
    t[i].value = "";
  }
}
window.location="<?php echo base_url()?>sancion/nuevaSancion";
}
</script>
<?php 
$tipoSancion = array(
  '1' => "Afectación al medio Ambiente",
  '2' => "Organismos de Control",
  '3' => "Legales",
  '4' => "SEPS",
  '5' => "Otros"
  );
$tipoMulta = array('1' => "No Monetaria", '2' => "Monetaria");
$denuncinte = array(
  '1' => "Clientes", 
  '2' => "Comunidad", 
  '3' => "Organismos de Control", 
  '4' => "Socios"
  );
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
    <form action="<?php echo base_url()?>sancion/guardarSancion" id="form1" method="POST">
      <table width="100%" border="0" cellspacing=8px" id="Tabla1">
        <tbody>
          <input type="hidden" name="accion" value="<?php echo $accion; ?>">
          <input type="hidden" name="id" value="<?php echo @$sancion[0]->IdSanciones; ?>">
          <tr>
            <th class="izquierda">Sanción por:</th>
            <td>
              <select class="form-control" name="selectTipoSancion">
                <?php 
                foreach ($tipoSancion as $key) {
                  if ($key == @$sancion[0]->TipoSancion) { ?>
                  <option selected="selected" > <?php echo $key; ?></option>                      
                  <?php  }else{ ?>
                  <option> <?php echo $key; ?></option>
                  <?php  }
                } ?>
              </select>
            </td>
          </tr>
          <tr>
            <th class="izquierda">Tipo de Multa:</th>
            <td>
              <select class="form-control" name="selectTipoMulta">
                <?php 
                foreach ($tipoMulta as $key) {
                  if ($key == @$sancion[0]->TipoMulta) { ?>
                  <option selected="selected" > <?php echo $key; ?></option>                      
                  <?php  }else{ ?>
                  <option> <?php echo $key; ?></option>
                  <?php  }
                } ?>
              </select>
            </td>
          </tr>
          <tr>
            <th class="izquierda">Parte Denunciante:</th>
            <td>
              <select class="form-control" name="selectDenunciante">
                <?php 
                foreach ($denuncinte as $key) {
                  if ($key == @$sancion[0]->ParteDenunciante) { ?>
                  <option selected="selected" > <?php echo $key; ?></option>                      
                  <?php  }else{ ?>
                  <option> <?php echo $key; ?></option>
                  <?php  }
                } ?>
              </select>
            </td>
          </tr>
          <tr>
            <th class="izquierda">* Costo de Sanción: </th>
            <td>
              <input class="form-control" type="text" name="txtCostoSancion"  placeholder="Ingresar datos" value="<?php echo set_value('txtCostoSancion', @$sancion[0]->CostoSancion); ?>">
            </td>
          </tr>
          <tr>
            <th class="izquierda">* Fecha del Mes: </th>
            <td>
              <div class='input-group date' id='divMiCalendario'>
                      <input type='text' id="txtFechaMes" name="txtFechaMes" class="form-control" value="<?php echo set_value('txtFechaMes', @$sancion[0]->FechaMes); ?>"/>
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