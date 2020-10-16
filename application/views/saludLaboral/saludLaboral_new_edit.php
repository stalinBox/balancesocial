<script type="text/javascript">
  function regresar(){
    window.location="<?php echo base_url()?>saludLaboral/saludLaborales";
  }

  function limpiar() {
    var t = document.getElementById("form1").getElementsByTagName("input");
//var t = document.getElementById("TAB").getElementsByTagName("input");
for (var i=0; i<t.length; i++) {
  if (t[i].type == "text") {    
    t[i].value = "";
  }
}
window.location="<?php echo base_url()?>saludLaboral/nuevoSaludLaboral";
}
</script>
<?php 
$estado = array(
  '0' => "Ejecutada",
  '1' => "Planificada"
  );
  ?>
  <h3 class="page-header" align="center"><span class="glyphicon glyphicon-th-list"></span> <?php echo $titulo; ?></h3>

  <div id="TAB">
    <div class="error"> 
      <center>
        <?php messages_flash('danger',validation_errors(),'Errores del formulario', true); ?>
      </center>
    </div>
    <form action="<?php echo base_url()?>saludLaboral/guardarSaludLaboral" id="form1" method="POST">
      <table width="100%" border="2" cellspacing=8px" id="Tabla1">
        <tbody>
          <input type="hidden" name="accion" value="<?php echo $accion; ?>">
          <input type="hidden" name="id" value="<?php echo @$saludLaboral[0]->IdSaludLaboral; ?>">
          <tr>
            <th class="izquierda">Nombre: </th>
            <td><input class="formulario1" type="text" name="txtNombre"  placeholder="Ingresar datos" value="<?php echo set_value('txtNombre', @$saludLaboral[0]->NombreSaludL); ?>"></td>
          </tr>
          <tr>
            <th class="izquierda">Cantidad de Horas destinadas: </th>
            <td>
              <input class="formulario1" type="text" name="txtCantHorasDestinadas"  placeholder="Ingresar datos" value="<?php echo set_value('txtCantHorasDestinadas', @$saludLaboral[0]->CantHorasDestinadas); ?>">
            </td>
          </tr>
          <tr>
            <th class="izquierda">Fecha de Inicio: </th>
            <td><input class="formulario1" type="text" name="txtFechaInicio"  placeholder="Ingresar datos" value="<?php echo set_value('txtFechaInicio', @$saludLaboral[0]->FechaInicioSaludL); ?>"></td>
          </tr>
          <tr>
            <th class="izquierda">Fecha Fin: </th>
            <td><input class="formulario1" type="text" name="txtFechaFin"  placeholder="Ingresar datos" value="<?php echo set_value('txtFechaFin', @$saludLaboral[0]->FechaFinSaludL); ?>"></td>
          </tr>
          <tr>
            <th class="izquierda">Costo que cubre la Empresa: </th>
            <td><input class="formulario1" type="text" name="txtCostoCubreEmpresa"  placeholder="Ingresar datos" value="<?php echo set_value('txtCostoCubreEmpresa', @$saludLaboral[0]->CostoEmpresaSaludL); ?>"></td>
          </tr>
          <tr>
            <th class="izquierda">Costo que aporta el Empleado: </th>
            <td><input class="formulario1" type="text" name="txtCostoCubreEmpleado"  placeholder="Ingresar datos" value="<?php echo set_value('txtCostoCubreEmpleado', @$saludLaboral[0]->CostoEmpleadosSaludL); ?>"></td>
          </tr>
          <tr>
            <th class="izquierda">Estado:</th>
            <td>
              <select class="formulario1" name="selectEstado">
                <?php 
                foreach ($estado as $key) {
                  if ($key == @$saludLaboral[0]->EstadoSaludL) { ?>
                  <option selected="selected" > <?php echo $key; ?></option>                      
                  <?php  }else{ ?>
                  <option> <?php echo $key; ?></option>
                  <?php  }
                } ?>
              </select>
            </td>
          </tr>
          <tr>
            <th class="izquierda">Número de Beneficiarios: </th>
            <td><input class="formulario1" type="text" name="txtNumBeneficiarios"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumBeneficiarios', @$saludLaboral[0]->CantBeneficiadosSaludL); ?>"></td>
          </tr>
          <tr>
            <th class="izquierda">Imagen: </th>
            <td><input class="formulario1" type="text" name="txtImagen"  placeholder="Ingresar datos" value="<?php echo set_value('txtImagen', @$saludLaboral[0]->ImagenSaludL); ?>"></td>
          </tr>
          <tr>
           <th class="izquierda">Empleado Responsable:</th>
           <td>
            <select class="formulario1" name="selectEmpleado" id="empleado" type="hidden" >
              <?php 
              foreach ($empleados as $items) {
                if ($items->CedulaEmpleado == @$saludLaboral[0]->ResponsableSaludL) { ?>
                <option selected="selected" value="<?php echo $items->CedulaEmpleado; ?>"><?php echo $items->ApellidoPaternoEmpleado." ".$items->ApellidoMaternoEmpleado. " ".$items->NombresEmpleado;?></option>
                <?php }else{ ?>
                <option value="<?php echo $items->CedulaEmpleado; ?>"><?php echo $items->ApellidoPaternoEmpleado." ".$items->ApellidoMaternoEmpleado. " ".$items->NombresEmpleado;?></option>
                <?php }
              } ?>
            </select>
          </td>
        </tr>

        <tr>
          <th class="izquierda">Descripción: </th>
          <td><input class="formulario1" type="text" name="txtDescripcion"  placeholder="Ingresar datos" value="<?php echo set_value('txtDescripcion', @$saludLaboral[0]->DescripcionSaludL); ?>"></td>
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
        <td><input type="button" onclick="limpiar()" class="botones" value="Nuevo"></td>
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