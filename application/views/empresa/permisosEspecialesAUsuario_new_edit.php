<script type="text/javascript">
	function regresar(IdUsuarioEmpresa){
		if(IdUsuarioEmpresa){
			window.location="<?php echo base_url()?>permisos/verPermisosEspecialesAUsuario/"+ IdUsuarioEmpresa;
		}else{			
			window.location="<?php echo base_url()?>permisos/permisosEspecialesAUsuario";			
		}
	}
</script>
<?php 
$permiso = array('1' => "0", '2' => "1");
//echo "desde nuevoPermisoEspecialUsuario el IdUsuarioEmpresa ".@$IdUsuarioEmpresa;
//echo "<br>";
//echo "desde nuevoPermisoEspecialUsuario el IdPermisoEspecial ".@$IdPermisoEspecial;
	?>
	<h3 class="page-header" align="center"><span class="glyphicon glyphicon-th-list"></span> <?php echo $titulo; ?></h3>
	<div id="TAB">
		<div class="error"> 
			<center>
				<?php messages_flash('danger',validation_errors(),'Errores del formulario', true); ?>
			</center>
		</div>		
		<form action="<?php echo base_url()?>permisos/guardarPermisoEspecialUsuario" id="form1" method="POST">
			<table width="100%" cellspacing=8px" id="Tabla1">

				<tbody>
					<input type="hidden" name="accion" value="<?php echo $accion; ?>">
					<input type="hidden" name="id" value="<?php echo @$permisosUsuariosEmpresa[0]->IdPEU; ?>">
					<input type="hidden" name="IdUsuarioEmpresa" value="<?php echo @$IdUsuarioEmpresa; ?>">
					<tr>
						<th class="izquierda">Usuarios:</th>
						<td>
							<select class="form-control" name="selectUsuario" id="usuario" type="hidden" >
							<?php 
							foreach ($usuariosEmpresa as $items) {
								if ($items->IdUsuario == @$permisosUsuariosEmpresa[0]->IdUsuario) { ?>
								<option selected="selected" value="<?php echo $items->IdUsuario; ?>"><?php echo $items->ApellidosUsuario ." ".$items->NombreUsuario;?></option>
								<?php }else{ ?>
								<option value="<?php echo $items->IdUsuario; ?>"><?php echo $items->ApellidosUsuario ." ".$items->NombreUsuario;?></option>
							<?php }
							} ?>
							</select>
						</td>
					</tr>
					<tr>
						<th class="izquierda">Tabla:</th>
						<td>
							<select class="form-control" name="selectTabla" id="tabla" type="hidden" >
								<?php 
								foreach ($tablas as $items) {
									if ($items->IdTabla == @$permisosUsuariosEmpresa[0]->IdTabla) { ?>
									<option selected="selected" value="<?php echo $items->IdTabla; ?>"><?php echo $items->Nombre;?></option>
									<?php }else{ ?>
									<option value="<?php echo $items->IdTabla; ?>"><?php echo $items->Nombre;?></option>
									<?php }
								} ?>
							</select>
						</td>
					</tr>
					<tr>
						<th class="izquierda">Ver:</th>
						<td>
							<select class="form-control" name="selectVer">
								<?php 
								foreach ($permiso as $key) {
									if ($key == @$permisosUsuariosEmpresa[0]->Ver) { ?>
									<option selected="selected" > <?php echo $key; ?></option>											
									<?php	}else{ ?>
									<option> <?php echo $key; ?></option>
									<?php 	}
								} ?>	
							</select>
						</td>
					</tr>	
					<tr>
						<th class="izquierda">Agregar:</th>
						<td>
							<select class="form-control" name="selectAgregar">
								<?php 
								foreach ($permiso as $key) {
									if ($key == @$permisosUsuariosEmpresa[0]->Agregar) { ?>
									<option selected="selected" > <?php echo $key; ?></option>											
									<?php	}else{ ?>
									<option> <?php echo $key; ?></option>
									<?php 	}
								} ?>	
							</select>
						</td>
					</tr>
					<tr>
						<th class="izquierda">Actualizar:</th>
						<td>
							<select class="form-control" name="selectActualizar">
								<?php 
								foreach ($permiso as $key) {
									if ($key == @$permisosUsuariosEmpresa[0]->Actualizar) { ?>
									<option selected="selected" > <?php echo $key; ?></option>											
									<?php	}else{ ?>
									<option> <?php echo $key; ?></option>
									<?php 	}
								} ?>	
							</select>
						</td>
					</tr>
					<tr>
						<th class="izquierda">Eliminar:</th>
						<td>
							<select class="form-control" name="selectEliminar">
								<?php 
								foreach ($permiso as $key) {
									if ($key == @$permisosUsuariosEmpresa[0]->Eliminar) { ?>
									<option selected="selected" > <?php echo $key; ?></option>											
									<?php	}else{ ?>
									<option> <?php echo $key; ?></option>
									<?php 	}
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
					<td><input type="button" onclick="regresar(<?php echo @$IdUsuarioEmpresa; ?>)" name="" class="botones" value="Regresar"></td>
					<td></td>
					<td></td>		
					<td><input type="submit" name="submit" class="botones" value="Guardar"></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td><td></td>
					<td></td>
					<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
				</tr>
			</table>
		</form>
	</div>