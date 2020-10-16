<script type="text/javascript">
	function regresar(IdPerfil){
		if(IdPerfil){
			window.location="<?php echo base_url()?>permisos/verPermisosPerfil/"+ IdPerfil;
		}else{			
			window.location="<?php echo base_url()?>permisos/permisosPerfiles";			
		}
	}
	
	function limpiar() {
		var t = document.getElementById("form1").getElementsByTagName("input");
	//var t = document.getElementById("TAB").getElementsByTagName("input");
	for (var i=0; i<t.length; i++) {
		if (t[i].type == "text") {		
			t[i].value = "";
		}
	}
window.location="<?php echo base_url()?>permisos/nuevoPermisoPerfil";
}
</script>
<?php 
$permiso = array('1' => "0", '2' => "1");
	?>
	<h3 class="page-header" align="center"><span class="glyphicon glyphicon-th-list"></span> <?php echo $titulo; ?></h3>
	<div id="TAB">
		<div class="error"> 
			<center>
				<?php echo validation_errors(); ?>
			</center>
		</div>	
		
		<form action="<?php echo base_url()?>permisos/guardarPermisoPerfil" id="form1" method="POST">
			<table width="100%" cellspacing=8px" id="Tabla1">

				<tbody>
					<input type="hidden" name="accion" value="<?php echo $accion; ?>">
					<input type="hidden" name="id" value="<?php echo @$permisoPerfil[0]->IdPermisoRol; ?>">
					<input type="hidden" name="IdPerfil" value="<?php echo @$IdPerfil; ?>">
					
					<tr>
						<th class="izquierda">Perfil:</th>
						<td>
							<select class="form-control" name="selectPerfil" id="empleado" type="hidden" >
								<?php 
								foreach ($perfiles as $items) {
									if ($items->IdPerfil == @$permisoPerfil[0]->IdPerfil) { ?>
									<option selected="selected" value="<?php echo $items->IdPerfil; ?>"><?php echo $items->Nombre;?></option>
									<?php }else{ ?>
									<option value="<?php echo $items->IdPerfil; ?>"><?php echo $items->Nombre;?></option>
									<?php }
								} ?>
							</select>
						</td>
					</tr>
					<tr>
						<th class="izquierda">Tabla:</th>
						<td>
							<select class="form-control" name="selectTabla" id="empleado" type="hidden" >
								<?php 
								foreach ($tablas as $items) {
									if ($items->IdTabla == @$permisoPerfil[0]->IdTabla) { ?>
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
									if ($key == @$permisoPerfil[0]->Ver) { ?>
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
									if ($key == @$permisoPerfil[0]->Agregar) { ?>
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
									if ($key == @$permisoPerfil[0]->Actualizar) { ?>
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
									if ($key == @$permisoPerfil[0]->Eliminar) { ?>
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
					<td><input type="button" onclick="regresar(<?php echo @$IdPerfil; ?>)" name="" class="botones" value="Regresar"></td>
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