<script type="text/javascript">
	// function regresar(IdPerfil){
	// 	if(IdPerfil){
	// 		window.location="<?php echo base_url()?>permisos/verPermisosPerfil/"+ IdPerfil;
	// 	}else{			
	// 		window.location="<?php echo base_url()?>permisos/permisosPerfiles";			
	// 	}
	// }
	function regresar(){
		window.location="<?php echo base_url()?>permisosComponentes/listarPermisosComp";
	}
	
</script>
<?php 
$permiso = array('1' => "0", '2' => "1");
?>
	<h3 class="page-header" align="center"><span class="glyphicon glyphicon-th-list"></span> <?php echo $titulo; ?></h3>
	<div id="TAB">
		<div class="error"> 
			<center>
				<?php messages_flash('danger',validation_errors(),'Errores del formulario', true); ?>
			</center>
		</div>	
		
		<form action="<?php echo base_url()?>permisosComponentes/guardarPermisoComponente" id="form1" method="POST">
			<table width="100%" cellspacing=8px" id="Tabla1">

				<tbody>
					<input type="hidden" name="accion" value="<?php echo $accion; ?>">
					<input type="hidden" name="id" value="<?php echo @$usuarioEmpresa[0]->IdUsuario; ?>">	

					<tr>
						<th class="izquierda">Permiso Rol:</th>
						<td>
							<select class="form-control" name="selectPerfil">
								<option value="">-Seleccione-</option>
								<?php 
								foreach ($permisoRol as $items) { ?>
									<option value="<?php echo $items->IdPermisoRol;?>"><?php echo $items->Nombre .' - '.$items->nomPerfil;?></option>
									<?php
								} ?>
							</select>
						</td>

					<tr>
						<th class="izquierda">ID Componente: </th>
						<td>
							<select class="form-control" name="selectIdComponent" >
								<option value="">-Seleccione-</option>
								<?php 
								foreach ($componentes as $items) {
									if ($items->IdComponents == @$permisoPerfil[0]->IdComponents) { ?>
									<option selected="selected" value="<?php echo $items->IdComponents; ?>"><?php echo $items->NombComp;?></option>
									<?php }else{ ?>
									<option value="<?php echo $items->IdComponents; ?>"><?php echo $items->NombComp;?></option>
									<?php }
								} ?>
							</select>
						</td>
					</tr>

					<tr>
						<th class="izquierda">Deshabilitar:</th>
						<td>
							<select class="form-control" id="selectHabilitar" name="selectHabilitar" >
							<option value="">-Seleccione-</option>
							<?php
									foreach($habilitar as $key => $value):
										echo '<option value="'.$key.'">'.$value.'</option>'; //close your tags!!
									endforeach;
								?> 
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
					<td></td>
					<td></td><td></td>
					<td></td>
					<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
				</tr>
			</table>
		</form>
	</div>