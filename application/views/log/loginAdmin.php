<?php $tipoUser = "Admin"; ?>
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
            <input class="isescribir" type="text" name="ruc"  placeholder="Ingresar RUC de la Empresa" value="<?php echo set_value('ruc'); ?>" autofocus>
          </td>
        </tr>
        <tr class="isingresod">
          <td class="iscuerpoinput">
            <input class="isescribir" type="password" name="contrasenia"  placeholder="Ingresar Contraseña">
          </td>
        </tr>
        <tr class="isingresod">
            <td class="iscuerpoinput">
            <input type="submit" name="submit" class="isboton" value="INGRESAR">
        </td>
        </tr>
        <tr class="isingresod" >
            <td class="iscuerpoinput" style="text-align: left">
             <a href="<?php echo base_url();?>recovery?tipoUser=Admin" style='align:right'><spam >¿Olvidó su contraseña?</spam></a>
            </td>
        </tr>
      </tbody>
    </table>
  </form>
  </div><!--final del TAB -->
    
</div><!--final div cuerpo-->
</div><!--final div TODO-->
