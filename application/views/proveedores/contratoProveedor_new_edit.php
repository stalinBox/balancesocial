<script type="text/javascript">
  function regresar(){
    window.location="<?php echo base_url()?>proveedor/proveedoresContrato";
  }

  function limpiar() {
    var t = document.getElementById("form1").getElementsByTagName("input");
    for (var i=0; i<t.length; i++) {
      if (t[i].type == "text") {    
        t[i].value = "";
      }
    }
    window.location="<?php echo base_url()?>proveedor/nuevoProveedorContrato";
  }
</script>
<?php 
$tipoContrato = array(
                    '1' => "Contrato Táctico", 
                    '2' => "Contrato a Plazo Fijo", 
                    '3' => "Contrato Indefinido", 
                    '4' => "Contrato de Prueba", 
                    '5' => "Contrato por Obra Cierta", 
                    '6' => "COntrato por Tarea", 
                    '7' => "Contrato por Destajo", 
                    '8' => "Contrato Eventual",
                    '9' => "Otro"
                    );
  ?>
  <h3 class="page-header" align="center"><span class="glyphicon glyphicon-th-list"></span> <?php echo $titulo; ?></h3>

  <div id="TAB">
    <div class="error"> 
      <center>
        <?php messages_flash('danger',validation_errors(),'Errores del formulario', true); ?>
      </center>
    </div>
    <form action="<?php echo base_url()?>proveedor/guardarProveedorContrato" id="form1" method="POST">
      <table width="100%" cellspacing=8px" id="Tabla1">
        <tbody>
          <input type="hidden" name="accion" value="<?php echo $accion; ?>">
          <input type="hidden" name="id" value="<?php echo @$proveedor[0]->IdContrato; ?>">
          <tr>
            <th class="izquierda">*Tipo de Contrato:</th>
            <td>
            <input class="form-control" type="text" name="txtTipoContrato"  placeholder="Ingresar datos" value="<?php echo set_value('txtTipoContrato', @$proveedor[0]->TipoContrato); ?>">
            <!--
              <select class="form-control" name="selectContrato">
                <?php 
                foreach ($tipoContrato as $key) {
                  if ($key == @$proveedor[0]->TipoContrato) { ?>
                  <option selected="selected" > <?php echo $key; ?></option>                      
                  <?php  }else{ ?>
                  <option> <?php echo $key; ?></option>
                  <?php  }
                } ?>
              </select> -->
            </td>
          </tr>
          <tr>
           <th class="izquierda">Proveedor:</th>
           <td>
            <select class="form-control" name="selectProveedor" id="proveedor" type="hidden" >
              <?php 
              foreach ($proveedores as $items) {
                if ($items->IdProveedor == @$proveedor[0]->IdProveedor) { ?>
                <option selected="selected" value="<?php echo $items->IdProveedor; ?>"><?php echo $items->NombreProveedor;?></option>      
                <?php }else{ ?>
                <option value="<?php echo $items->IdProveedor; ?>"><?php echo $items->NombreProveedor;?></option>      
                <?php }               
              } ?>
            </select>
          </td>
        </tr>
        <tr>
          <th class="izquierda">*Objeto de Contratación: </th>
          <td>
            <input class="form-control" type="text" name="txtObjetivoContrato"  placeholder="Ingresar datos" value="<?php echo set_value('txtObjetivoContrato', @$proveedor[0]->ObjetoDeContrato); ?>">
          </td>
        </tr>          
        <tr>
          <th class="izquierda">*Fecha inicio: </th>
          <td>
            <div class='input-group date' id='divMiCalendario'>
                 <input type='text' id="txtFechaInicio" name="txtFechaInicio" class="form-control" value="<?php echo set_value('txtFechaInicio', @$proveedor[0]->FechaInicioContrato); ?>" readonly/>
                 <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      </span>
            </div>

          </td>
        </tr>
        <tr>
          <th class="izquierda">*Fecha Fin: </th>
          <td>
            <div class='input-group date' id='divMiCalendario2'>
                 <input type='text' id="txtFechaFin" name="txtFechaFin" class="form-control" value="<?php echo set_value('txtFechaFin', @$proveedor[0]->FechaFinContrato); ?>" readonly/>
                 <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      </span>
            </div>
          </td>
        </tr>
        <tr>
          <th class="izquierda">Obligaciones: </th>
          <td>
            <input class="form-control" type="text" name="txtObligaciones"  placeholder="Ingresar datos" value="<?php echo set_value('txtObligaciones', @$proveedor[0]->ObligacionDePartes); ?>">
          </td>
        </tr>
      </tbody>
    </table>
    <table>
      <tr>
        <br>
      </tr>
      <tr>
        <td><input type="submit" name="submit" class="botones" value="Guardar"></td>
        <td></td>
        <td></td>   
        <td></td>   
        <td><input type="button" onclick="regresar()" name="" class="botones" value="Regresar"></td>
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

   <script type="text/javascript">
     $('#divMiCalendario').datetimepicker({
          format: 'YYYY-MM-DD'
      });
     $('#divMiCalendario2').datetimepicker({
          format: 'YYYY-MM-DD'
      });
   </script>