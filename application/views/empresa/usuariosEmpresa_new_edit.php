<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datetimepicker.min.css" >
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datepicker.css" > 

<script type="text/javascript">
	function regresar(){
		window.location="<?php echo base_url()?>empresa/usuarios";
	}
	
	function limpiar() {
		var t = document.getElementById("form1").getElementsByTagName("input");
//var t = document.getElementById("TAB").getElementsByTagName("input");
for (var i=0; i<t.length; i++) {
	if (t[i].type == "text") {		
		t[i].value = "";
	}
}
window.location="<?php echo base_url()?>empresa/nuevoUsuarioEmpresa"
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
	<form action="<?php echo base_url()?>empresa/guardarUsuarioEmpresa" id="form1" method="POST">
		<table width="100%" cellspacing=8px" id="Tabla1">
			<tbody>		  
				<input type="hidden" name="accion" value="<?php echo $accion; ?>">
				<input type="hidden" name="id" value="<?php echo @$usuarioEmpresa[0]->IdUsuario; ?>">			
				<tr>
					<th class="izquierda">*	Nombre: </th>
					<td><input class="form-control" type="text" name="txtNombre"  placeholder="Ingresar datos" value="<?php echo set_value('txtNombre', @$usuarioEmpresa[0]->NombreUsuario); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">*	Apellido: </th>
					<td><input class="form-control" type="text" name="txtApellidos"  placeholder="Ingresar datos" value="<?php echo set_value('txtApellidos', @$usuarioEmpresa[0]->ApellidosUsuario); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">*	Correo: </th>
					<td><input class="form-control" type="text" name="txtCorreo"  placeholder="Ingresar datos" value="<?php echo set_value('txtCorreo', @$usuarioEmpresa[0]->Mail); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">*	Contraseña: </th>
					<td><input class="form-control" type="text" name="txtContrasenia"  placeholder="Ingresar datos" value="<?php echo set_value('txtContrasenia', @$usuarioEmpresa[0]->ContraseniaUsuario); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">*	Dirección: </th>
					<td><input class="form-control" type="text" name="txtDireccion"  placeholder="Ingresar datos" value="<?php echo set_value('txtDireccion', @$usuarioEmpresa[0]->DireccionUsuario); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">*	Teléfono: </th>
					<td><input class="form-control" type="text" name="txtTelefono"  placeholder="Ingresar datos" value="<?php echo set_value('txtTelefono', @$usuarioEmpresa[0]->TelefonoUsuario); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">*	Celular: </th>
					<td><input class="form-control" type="text" name="txtCelular"  placeholder="Ingresar datos" value="<?php echo set_value('txtCelular', @$usuarioEmpresa[0]->CelularUsuario); ?>"></td>
				</tr>
				<tr>
						<th class="izquierda">Perfil:</th>
						<td>
							<select class="form-control" name="selectPerfil" id="empleado" type="hidden" >
								<?php 
								foreach ($perfiles as $items) {
									if ($items->IdPerfil == @$usuarioEmpresa[0]->PerfilRolUsuario) { ?>
									<option selected="selected" value="<?php echo $items->IdPerfil; ?>"><?php echo $items->Nombre;?></option>
									<?php }else{ ?>
									<option value="<?php echo $items->IdPerfil; ?>"><?php echo $items->Nombre;?></option>
									<?php }
								} ?>
							</select>
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
				<td><input type="submit" name="submit" class="botones" value="Guardar"></td>
				<td></td>
				<td></td>
				<td>
				<td></td><td></td>
				<td></td>
				<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
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
<?php 
			//if ( isset($_POST['form_enviar'])
			//http://www.clubdelphi.com/foros/archive/index.php?t-38288.html
?>
