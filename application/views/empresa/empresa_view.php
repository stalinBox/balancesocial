<h3 class="page-header" align="center"><span class="glyphicon glyphicon-th-list"></span> <?php echo $empresa[0]->NombreEmpresa; ?></h3>

<div id="TAB">
  <form action="<?php echo base_url()?>empresa/guardarEmpresa" id="form1" method="POST">
    <table width="100%" border="2" cellspacing=8px" id="Tabla1">
      <tbody>
        <input type="hidden" name="IdEmpresa" value="<?php echo @$empresa[0]->IdEmpresa; ?>">
        <tr>
          <th class="izquierda">Nombre de la Empresa: </th>
          <td>
            <input class="formulario1" type="text" name="txtEmpresa"  placeholder="Ingresar datos" value="<?php echo $empresa[0]->NombreEmpresa ?>">
          </td>
        </tr>
        <tr>
          <th class="izquierda">RUC: </th>
          <td><input class="formulario1" type="text" name="txtRUC"  placeholder="Ingresar datos" value="<?php echo  $empresa[0]->RucEmpresa ?>"></td>
        </tr>
        <tr>
          <th class="izquierda">Contraseña: </th>
          <td><input class="formulario1" type="password" name="txtContrasenia"  placeholder="Ingresar datos" value="<?php echo $empresa[0]->ContraseniaEmpresa; ?>"></td>
        </tr>
        <tr>
          <th class="izquierda">Confirmar Contraseña: </th>
          <td><input class="formulario1" type="password" name="txtContrasenia2"  placeholder="Ingresar datos" value="<?php echo $empresa[0]->ContraseniaEmpresa; ?>"></td>
        </tr>
        <tr>
          <th class="izquierda">Capital de la Empresa: </th>
          <td><input class="formulario1" type="text" name="txtCapital"  placeholder="Ingresar datos" value="<?php echo $empresa[0]->CapitalEmpresa?>"></td>
        </tr>
        <tr>
          <th class="izquierda">Fecha de Registro: </th>
          <td><input class="formulario1" type="text" name="txtFechaRegistro"  placeholder="Ingresar datos" value="<?php echo $empresa[0]->FechaRegistroEmpresa ?>"></td>
        </tr>
        <tr>
          <th class="izquierda">Cantidad de Fundadores: </th>
          <td><input class="formulario1" type="text" name="txtCantFundadores"  placeholder="Ingresar datos" value="<?php echo $empresa[0]->CantidadFundadoresEmpresa; ?>"></td>
        </tr>
        <tr>
          <th class="izquierda">Dirección: </th>
          <td><input class="formulario1" type="text" name="txtDireccion"  placeholder="Ingresar datos" value="<?php echo $empresa[0]->DireccionEmpresa; ?>"></td>
        </tr>
        <tr>
          <th class="izquierda">Teléfono: </th>
          <td><input class="formulario1" type="text" name="txtTelefono"  placeholder="Ingresar datos" value="<?php echo $empresa[0]->TelefonoEmpresa; ?>"></td>
        </tr>
        <tr>
          <th class="izquierda">Historia:</th>
          <td>
            <textarea name="txtAreaHistoria" rows="10" cols="50"><?php echo $empresa[0]->HistoriaEmpresa;?></textarea>
          </td>
        </tr>  
        <tr>
          <th class="izquierda">Misión:</th>
          <td>
            <textarea name="txtAreaMision" rows="10" cols="50"><?php echo $empresa[0]->MisionEmpresa;?></textarea>
          </td>
        </tr>  
        <tr>
          <th class="izquierda">Visión:</th>
          <td>
            <textarea name="txtAreaVision" rows="10" cols="50"><?php echo $empresa[0]->VisionEmpresa;?></textarea>
          </td>
        </tr>
      </tbody>
    </table>
  </form>
</div>