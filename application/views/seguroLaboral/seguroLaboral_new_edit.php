<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datetimepicker.min.css" >
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datepicker.css" > 

<script type="text/javascript">
  function regresar(){
    window.location="<?php echo base_url()?>seguroLaboral/segurosLaboral";
  }

  function limpiar() {
    var t = document.getElementById("form1").getElementsByTagName("input");
//var t = document.getElementById("TAB").getElementsByTagName("input");
for (var i=0; i<t.length; i++) {
  if (t[i].type == "text") {    
    t[i].value = "";
  }
}
window.location="<?php echo base_url()?>seguroLaboral/nuevoSeguroLaboral";
}
</script>
<?php 
$tipoSeguro = array(
                  '1' => "Seguro de Vida", 
                  '2' => "Seguro de Salud", 
                  '3' => "Seguro Contra Incendios", 
                  '4' => "Otro"
                  );
$ocurrencia = array(
  '1' => "NO",
  '2' => "SI"
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

  <form action="<?php echo base_url()?>seguroLaboral/guardarSeguroLaboral" id="form1" method="POST" enctype="multipart/form-data">
    <table width="100%" cellspacing=8px" id="Tabla1">
      <tbody>
        <input type="hidden" name="accion" value="<?php echo $accion; ?>">
        <input type="hidden" name="id" value="<?php echo @$seguroLaboral[0]->IdSeguroLaboral; ?>">
        <tr>
          <th class="izquierda">Proveedor:</th>
          <td>
            <select class="form-control" name="selectProveedor" id="proveedor" type="hidden" >
              <?php 
                foreach ($proveedores as $items) {
                  if ($items->IdProveedor == @$seguroLaboral[0]->ProveedorSeguroL) { ?>
                  <option selected="selected" value="<?php echo $items->IdProveedor; ?>"><?php echo $items->NombreProveedor;?></option>      
                  <?php }else{ ?>
                  <option value="<?php echo $items->IdProveedor; ?>"><?php echo $items->NombreProveedor;?></option>      
                  <?php }               
                } ?>
            </select>
          </td>
        </tr>
        <tr>
          <th class="izquierda">Tipo de Seguro:</th>
          <td>
            <select class="form-control" name="selectTipoSeguro">
            <?php 
                foreach ($tipoSeguro as $key) {
                  if ($key == @$seguroLaboral[0]->TipoSeguroL) { ?>
                  <option selected="selected" > <?php echo $key; ?></option>                      
                  <?php }else{ ?>
                  <option> <?php echo $key; ?></option>
                  <?php   }
                } ?>
            </select>
          </td>
        </tr>
        <tr>
          <th class="izquierda">* Monto que Cubre: </th>
          <td>
          <input class="form-control" type="text" name="txtMontoCubre"  placeholder="Ingresar datos" value="<?php echo set_value('txtMontoCubre', @$seguroLaboral[0]->MontoCubreSeguroL); ?>">
          </td>
        </tr>
        <tr>
          <th class="izquierda">* Fecha de Adquisición: </th>
          <td>

          <div class='input-group date' id='divMiCalendario'>
                      <input type='text' id="txtFechaAdquisicion" name="txtFechaAdquisicion" class="form-control" value="<?php echo set_value('txtFechaAdquisicion', @$seguroLaboral[0]->FechaAdquiereSeguroL); ?>" readonly/>
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      </span>
          </div>
          </td>
        </tr>
        <tr>
          <th class="izquierda">* Vigencia en años: </th>
          <td>
          <input class="form-control" type="text" name="txtVigencia"  placeholder="Ingresar datos" value="<?php echo set_value('txtVigencia', @$seguroLaboral[0]->VigenciaAniosSeguroL); ?>">
          </td>
        </tr>
        <tr>
          <th class="izquierda">Siniertro Ocurrido:</th>
          <td>
            <select class="form-control" name="selectSiniestroOcurrido">
             <?php 
                foreach ($ocurrencia as $key) {
                  if ($key == @$seguroLaboral[0]->SiniestroOcurrido) { ?>
                  <option selected="selected" > <?php echo $key; ?></option>                      
                  <?php }else{ ?>
                  <option> <?php echo $key; ?></option>
                  <?php   }
                } ?>
            </select>
          </td>
        </tr>
        <tr>
          <th class="izquierda">Valor Real del Siniestro: </th>
          <td>
          <input class="form-control" type="text" name="txtValorSiniestro"  placeholder="Ingresar datos" value="<?php echo set_value('txtValorSiniestro', @$seguroLaboral[0]->ValorRealSiniestro); ?>">
          </td>
        </tr>
        <tr>
          <th class="izquierda">Observaciones: </th>
          <td>
          <input class="form-control" type="text" name="txtObservacion"  placeholder="Ingresar datos" value="<?php echo set_value('txtObservacion', @$seguroLaboral[0]->Observacion); ?>">
          </td>
        </tr>
        <tr>
            <th class="izquierda">Imagen: </th>
            <td>
              <input type="file" name="inputFoto">
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