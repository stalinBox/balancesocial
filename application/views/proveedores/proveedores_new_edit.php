<script type="text/javascript">
  function regresar(){
    window.location="<?php echo base_url()?>proveedor/proveedores";
  }
  
  function limpiar() {
    var t = document.getElementById("form1").getElementsByTagName("input");
//var t = document.getElementById("TAB").getElementsByTagName("input");
for (var i=0; i<t.length; i++) {
  if (t[i].type == "text") {    
    t[i].value = "";
  }
}
window.location="<?php echo base_url()?>proveedor/nuevoProveedor";
}
</script>
<?php 
$tipoProv = array(
  '1' => "Instituciones Financieras", 
  '2' => "Instituciones Gubernamentales", 
  '3' => "Asociación", 
  '4' => "PYMES",
  '5' => "Otro"
  );
$alcance = array(
  '1' => "Local",
  '2' => "Nacional", 
  '3' => "Regional", 
  '4' => "Provincial",
  '5' => "Internacional"
  );
$estado = array(
  '1' => "Activo",
  '2' => "Inactivo"
  );
$tipEval = array(
  '1' => "Ambiental",
  '2' => "Repercusión Social", 
  '3' => "Materia de Derechos Humanos", 
  '4' => "Prácticas Laborales",
  '5' => "Otros",
  '6' => "Ninguno"
  );
  ?>
  <h3 class="page-header" align="center"><span class="glyphicon glyphicon-th-list"></span> <?php echo $titulo; ?></h3>

  <div id="TAB">
    <div class="error"> 
      <center>
        <?php messages_flash('danger',validation_errors(),'Errores del formulario', true); ?>
      </center>
    </div>
    <form action="<?php echo base_url()?>proveedor/guardarProveedor" id="form1" method="POST" enctype="multipart/form-data" >
      <table width="100%" cellspacing=8px" id="Tabla1">
        <tbody>
          <input type="hidden" name="accion" value="<?php echo $accion; ?>">
          <input type="hidden" name="id" value="<?php echo @$proveedor[0]->IdProveedor; ?>">
          <tr>
            <th class="izquierda">* RUC: </th>
            <td><input class="form-control" type="text" name="txtRUC"  placeholder="Ingresar datos" value="<?php echo set_value('txtRUC', @$proveedor[0]->RucProveedor); ?>"></td>
          </tr>
          <tr>
            <th class="izquierda">* Nombre: </th>
            <td>
              <input class="form-control" type="text" name="txtNombre"  placeholder="Ingresar datos" value="<?php echo set_value('txtNombre', @$proveedor[0]->NombreProveedor); ?>">
            </td>
          </tr>
          <tr>
            <th class="izquierda">Tipo de Proveedor:</th>
            <td>
              <select class="form-control" name="selectProveedor">
                <?php 
                foreach ($tipoProv as $key) {
                  if ($key == @$proveedor[0]->TipoProveedor) { ?>
                  <option selected="selected" > <?php echo $key; ?></option>                      
                  <?php  }else{ ?>
                  <option> <?php echo $key; ?></option>
                  <?php  }
                } ?>
              </select>
            </td>
          </tr>
          <tr>
            <th class="izquierda">* Dirección: </th>
            <td><input class="form-control" type="text" name="txtDireccion"  placeholder="Ingresar datos" value="<?php echo set_value('txtDireccion', @$proveedor[0]->DireccionProveedor); ?>"></td>
          </tr>
          <tr>
            <th class="izquierda">Alcance:</th>
            <td>
              <select class="form-control" name="selectAlcance">
                <?php 
                foreach ($alcance as $key) {
                  if ($key == @$proveedor[0]->AlcanceProveedor) { ?>
                  <option selected="selected" > <?php echo $key; ?></option>                      
                  <?php  }else{ ?>
                  <option> <?php echo $key; ?></option>
                  <?php  }
                } ?>
              </select>
            </td>
          </tr>
          <tr>
            <th class="izquierda">Teléfono: </th>
            <td><input class="form-control" type="text" name="txtTelefono"  placeholder="Ingresar datos" value="<?php echo set_value('txtTelefono', @$proveedor[0]->TelefonoProveedor); ?>"></td>
          </tr>
          <tr>
            <th class="izquierda">Nacionalidad: </th>
            <td><input class="form-control" type="text" name="txtNacionalidad"  placeholder="Ingresar datos" value="<?php echo set_value('txtNacionalidad', @$proveedor[0]->NacionalidadProveedor); ?>"></td>
          </tr>
          <tr>
            <th class="izquierda">Actividad Empresarial: </th>
            <td><input class="form-control" type="text" name="txtTipoEmpresa"  placeholder="Ingresar datos" value="<?php echo set_value('txtTipoEmpresa', @$proveedor[0]->TipoEmpresaProveedor); ?>"></td>
          </tr>
          <tr>
            <th class="izquierda">Estado de Proveedor:</th>
            <td>
              <select class="form-control" name="selectEstado">
                <?php 
                foreach ($estado as $key) {
                  if ($key == @$proveedor[0]->EstadoProveedor) { ?>
                  <option selected="selected" > <?php echo $key; ?></option>                      
                  <?php  }else{ ?>
                  <option> <?php echo $key; ?></option>
                  <?php  }
                } ?>
              </select>
            </td>
          </tr>
          <tr>
            <th class="izquierda">Tipo de Evaluación:</th>
            <td>
              <select class="form-control" name="selectTipoEvaluacion">
               <?php 
               foreach ($tipEval as $key) {
                if ($key == @$proveedor[0]->TipoEvaluacion) { ?>
                <option selected="selected" > <?php echo $key; ?></option>                      
                <?php  }else{ ?>
                <option> <?php echo $key; ?></option>
                <?php  }
              } ?>
            </select>
          </td>
        </tr>
        <tr>
          <th class="izquierda">Políticas: </th>
          <td><input class="form-control" type="text" name="txtPoliticas"  placeholder="Ingresar datos" value="<?php echo set_value('txtPoliticas', @$proveedor[0]->PoliticasProveedor); ?>"></td>
        </tr>
        <tr>
        <th class="izquierda">Imagen</th>
        <td>
          <img src="data:image/jpg;base64, <?php echo base64_encode(@$proveedor[0]->ImagenProveedor) ?>" width="100" height="100" >
        </td>
      </tr>
    <tr>
        <th class="izquierda">Seleccionar Imagen: </th>
        <td>
          <input type="file" name="inputFoto" >
        </td>
    </tr>
      </tbody>
    </table>
    <table>
      <tr>
        <br>
      </tr>
      <tr>
        <td><input type="submit" name="submit" class="botones" value="Guardar"> </td>
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