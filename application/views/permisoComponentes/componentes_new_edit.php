<script type="text/javascript">
	// function regresar(IdPerfil){
	// 	if(IdPerfil){
	// 		window.location="<?php echo base_url()?>permisos/verPermisosPerfil/"+ IdPerfil;
	// 	}else{			
	// 		window.location="<?php echo base_url()?>permisos/permisosPerfiles";			
	// 	}
	// }
	function regresar(){
		window.location="<?php echo base_url()?>permisosComponentes/listarComponentes";
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
		
		<form action="<?php echo base_url()?>permisosComponentes/guardarComponente" id="form1" method="POST">
			<table width="100%" cellspacing=8px" id="Tabla1">

				<tbody>
					<input type="hidden" name="accion" value="<?php echo $accion; ?>">
					<input type="hidden" name="id" value="<?php echo @$usuarioEmpresa[0]->IdUsuario; ?>">	

					<tr>
						<th class="izquierda">Nombre: </th>
						<td>
							<input class="form-control" type="text" name="txtNombreComponente"  placeholder="Ingresar datos" value="<?php echo set_value('txtNombreComponente'); ?>">
						</td>
					</tr>
					<tr>
						<th class="izquierda">ID Componente: </th>
						<td>
							<input class="form-control" type="text" name="txtIdComponente"  placeholder="Ingresar datos" value="<?php echo set_value('txtIdComponente'); ?>">
						</td>
					</tr>

					<tr>
						<th class="izquierda">Tipo:</th>
						<td>
							<select class="form-control" id="cbxTipComponente" name="cbxTipComponente" >
							<option value="">-Seleccione-</option>
							<?php
									foreach($componentes as $value):
										echo '<option value="'.$value.'">'.$value.'</option>'; //close your tags!!
									endforeach;
								?> 
							</select>
						</td>
					</tr>

					<tr>
						<th class="izquierda">Descripción: </th>
						<td>
							<textarea class="form-control" name="txtDscComponente"  placeholder="Ingresar Descripción" value="<?php echo set_value('txtDscComponente'); ?>"> 
							</textarea>
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