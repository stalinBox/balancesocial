<script type="text/javascript">
  function regresar(){
    window.location="<?php echo base_url()?>sindicato/sindicatos";
  }

  function limpiar() {
    var t = document.getElementById("form1").getElementsByTagName("input");
//var t = document.getElementById("TAB").getElementsByTagName("input");
for (var i=0; i<t.length; i++) {
  if (t[i].type == "text") {    
    t[i].value = "";
  }
}
window.location="<?php echo base_url()?>sindicato/nuevoSindicato";
}
</script>
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
  <form action="<?php echo base_url()?>sindicato/guardarSindicato" id="form1" method="POST">
    <table width="100%" cellspacing=8px" id="Tabla1">
      <tbody>
        <input type="hidden" name="accion" value="<?php echo $accion; ?>">
        <input type="hidden" name="id" value="<?php echo @$sindicato[0]->IdSindicato; ?>">
        <tr>
          <th class="izquierda">* Nombre: </th>
          <td>
            <input class="form-control" type="text" name="txtNombre"  placeholder="Ingresar datos" value="<?php echo set_value('txtNombre', @$sindicato[0]->NombreSindicato); ?>">
          </td>
        </tr>
        <tr>
          <th class="izquierda">Descripción: </th>
          <td>
            <input class="form-control" type="text" name="txtDescripcion"  placeholder="Ingresar datos" value="<?php echo set_value('txtDescripcion', @$sindicato[0]->DescripcionSindicato); ?>">
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