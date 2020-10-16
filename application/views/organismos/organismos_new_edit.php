<script type="text/javascript">
	function regresar(){
		window.location="<?php echo base_url()?>organismo/organismos";
	}
</script>


<h3 class="page-header" align="center"><span class="glyphicon glyphicon-th-list"></span> <?php echo $titulo; ?></h3>
<div id="TAB">
	<div class="error"> 
		<center>
			<?php messages_flash('danger',validation_errors(),'Errores del formulario', true); ?>
		</center>
	</div>
	<form action="<?php echo base_url()?>organismo/guardarOrganismo" id="form1" method="POST">
		<table width="100%" border="2" cellspacing=8px" id="Tabla1">
			<tbody>		  
				<input type="hidden" name="accion" value="<?php echo $accion; ?>">
				<input type="hidden" name="id" value="<?php echo @$organismo[0]->IdOrganismo; ?>">
				<tr>
					<th class="izquierda">Nombre del Organismo: </th>
					<td>
						<input class="formulario1" type="text" name="txtOrganismo"  placeholder="Ingresar datos" value="<?php echo set_value('txtOrganismo', @$organismo[0]->NombreOrganismo); ?>" readonly>
					</td>
				</tr>
				<tr>
					<th class="izquierda">Descripción del Organismo: </th>
					<td><input class="formulario1" type="text" name="txtDescripcion"  placeholder="Ingresar datos" value="<?php echo set_value('txtDescripcion', @$organismo[0]->DescripcionOrganismo); ?>"></td>
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
				<td></td>   
				<td><input type="submit" name="submit" class="botones" value="Guardar"></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td><td></td>
				<td></td>
				<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
			</tr>
		</table>

	</form>

</div>