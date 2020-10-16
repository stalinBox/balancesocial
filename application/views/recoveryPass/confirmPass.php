  <script src="<?php echo base_url()?>js/jquery.min.js"></script>
  <link rel="stylesheet"  href="<?php echo base_url() ?>css/bootstrap.min.css">
  <script src="<?php echo base_url()?>js/jquery-1.11.3.min.js"></script>
  <script src="<?php echo base_url()?>js/bootstrap.min.js"></script>

<div id="TODO">
  <div class="error"> 
    <center>
		<?php 
			messages_flash('danger',validation_errors(),'Errores del formulario', true);
			//si el email no se ha podido enviar
			messages_flash('danger','not_mail_send','Error enviando el email');
			//si el email ha sido enviado correctamente se lo notificamos
			messages_flash('success','mail_send','Email enviado correctamente');
		?>
    </center>
  </div>
  <div id="Cuerpo">
  <br>
	
  <div id="TAB">
    <?php echo form_open(base_url("recovery/update_password")) ?>
      <table width="100%" border="0" cellspacing="10px" class="iniciodesesion">
      		<input type="hidden" name="tipoUser" value="<?php echo $tipoUser?>">

      <thead class="isheader">
        <tr class="iscabecera">
          <th>Ingrese la nueva contraseña</th>
        </tr>        
      </thead>
       
       <tbody class="iscuerpo">

        <tr class="isingresod">
          <td class="iscuerpoinput">
             <input type="password" name="password" class="isescribir" placeholder="Nueva Contraseña">
          </td>
        </tr>

        <tr class="isingresod">
          <td class="iscuerpoinput">
            <input type="password" name="conf_password" class="isescribir" placeholder="Confirmar Contraseña">
          </td>
        </tr>

        <tr class="isingresod">
            <td class="iscuerpoinput">
            <input type="submit" name="submit" class="isboton" value="ACTUALIZAR">
        <br />
        </td>
        </tr>

      </tbody>
    </table>


    <?php echo form_close() ?>

  </div><!--final del TAB -->
    
</div><!--final div cuerpo-->
</div><!--final div TODO-->
