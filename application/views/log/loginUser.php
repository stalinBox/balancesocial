<?php $tipoUser = "User" ?>
<div id="TODO">
  <div class="error"> 
    <center>
      <?php echo validation_errors(); ?>
    </center>
  </div>
  <div id="Cuerpo">
  <div id="TAB">
<form action="<?php echo base_url()?>login/validarUsuario" id="form1" method="POST">
    <table width="100%" border="0" cellspacing="10px" class="iniciodesesion">
    <input type="hidden" name="tipoUser" value="<?php echo $tipoUser; ?>">
     <thead class="isheader">
      <tr class="iscabecera">
        <th>BIENVENIDO</th>
      </tr>
    </thead> 
    <tbody class="iscuerpo">
      <tr class="isingresod">
        <td class="iscuerpoinput">
          <input class="isescribir" type="text" name="correo"  placeholder="correo electrónico" value="<?php echo set_value('correo'); ?>" autofocus>
        </td>
      </tr>
      <tr class="isingresod">
        <td class="iscuerpoinput">
          <input class="isescribir" type="password" name="contrasenia"  placeholder="contraseña">
        </td>
      </tr>
      <tr class="isingresod">
        <td class="iscuerpoinput">
          <select class="isseleccionar" name="selectIdEmpresa">
            <?php 
              foreach ($empresas as $items) {?>
              <option value="<?php echo $items->IdEmpresa; ?>"><?php echo $items->NombreEmpresa;?></option>      
              <?php }?>
          </select>
        </td>
      </tr>
      <tr class="isingresod">
        <td class="iscuerpoinput">

         <ul class="ingsist">
          <li>
            <input type="submit" name="submit" class="isboton" value="INGRESAR">
          </li>
        </ul>

      </td>
    </tr>
    <tr class="isingresod" >
            <td class="iscuerpoinput" style="text-align: left">
             <a href="<?php echo base_url();?>recovery?tipoUser=User" style='align:right'><spam >¿Olvidó su contraseña?</spam></a>
            </td>
        </tr>
  </tbody>
</table>
</form>