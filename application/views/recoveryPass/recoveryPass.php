  <script src="<?php echo base_url()?>js/jquery.min.js"></script>
  <link rel="stylesheet"  href="<?php echo base_url() ?>css/bootstrap.min.css">
  <script src="<?php echo base_url()?>js/jquery-1.11.3.min.js"></script>
  <script src="<?php echo base_url()?>js/bootstrap.min.js"></script>

<div id="TODO">
  <div class="error"> 
    <center>
      <?php 		
		messages_flash('danger',validation_errors(),'Errores del formulario', true);
	
		//si hay error enviando el email
		messages_flash('danger','not_email_send','Error enviando el email');

		//si se ha enviando el email correctamente
		messages_flash('success','mail_send','Email enviado correctamente');

		//si hay error enviando el email
		messages_flash('danger','expired_request','Error recuperación password');

		//si hay error modificando el password lo mostramos
		messages_flash('danger','error_password_changed','Error modificando el password');
			
		//si se ha modificado el password correctamente
		messages_flash('success','password_changed','Password modificado correctamente');
	?>
    </center>
  </div>
  
  <div id="Cuerpo">
  <br>

<div id="TAB">
<form action="<?php echo base_url()?>recovery/request_password" id="form1" method="POST" enctype="multipart/form-data"> 
    <table width="100%" border="0" cellspacing="10px" class="iniciodesesion">
		
			<thead class="isheader">
        		<tr class="iscabecera">
          			<th>Recuperar Contraseña</th>
        		</tr>        
			</thead>
       
       <tbody class="iscuerpo">
        <input type="hidden" name="tipoUser" value="<?php echo $tipoUser?>">

        <tr class="isingresod">
          <td class="iscuerpoinput">
             <input type="text" name="email" class="isescribir" placeholder="Email" value="<?php echo set_value('email')?>">
          </td>
        </tr>

        <tr class="isingresod">
            <td class="iscuerpoinput">
            <input type="submit" name="submit" class="isboton" value="RECUPERAR">
        <br />
        <br />
        </td>
        </tr>

      </tbody>
    </table>

</form>
</div><!--final del TAB -->
</div><!--final div cuerpo-->
</div><!--final div TODO-->