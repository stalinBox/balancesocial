<script type="text/javascript">
	function regresar(){
		window.location="<?php echo base_url()?>formasAtencionCliente/formasAtencionCliente";
	}

	function limpiar() {
		var t = document.getElementById("form1").getElementsByTagName("input");
//var t = document.getElementById("TAB").getElementsByTagName("input");
for (var i=0; i<t.length; i++) {
	if (t[i].type == "text") {    
		t[i].value = "";
	}
}
window.location="<?php echo base_url()?>formasAtencionCliente/nuevaFormasAtencionCliente";
}
</script>
<?php
$ubicacion = array(
	'1' => "Rural",
	'2' => "Urbana",
	'3' => "Otros"	
	);
?>

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
	<form action="<?php echo base_url()?>formasAtencionCliente/guardarFormasAtencionCliente" id="form1" method="POST">
		<table width="100%" cellspacing=8px" id="Tabla1">
			<tbody>
				<input type="hidden" name="accion" value="<?php echo $accion; ?>">
				<input type="hidden" name="id" value="<?php echo @$formaAtencionCliente[0]->IdFormaAtencion; ?>">
				<tr>
					<th class="izquierda">*	Forma de Atención al Cliente: </th>
					<td><input class="form-control" type="text" name="txtFormaAtencion" placeholder="Ingresar datos" value="<?php echo set_value('txtFormaAtencio', @$formaAtencionCliente[0]->NombreFormaAtencion); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">Ubicación:</th>
					<td>
						<select class="form-control" name="selectUbicacion">
							<?php 
							foreach ($ubicacion as $key) {
								if ($key == @$formaAtencionCliente[0]->Ubicacion) { ?>
								<option selected="selected" > <?php echo $key; ?></option>											
								<?php	}else{ ?>
								<option> <?php echo $key; ?></option>
								<?php 	}
							} ?>
						</select>
					</td>
				</tr>
				<tr>
					<th class="izquierda">Descripción: </th>
					<td><input class="form-control" type="text" name="txtDescripcion" placeholder="Ingresar datos" value="<?php echo set_value('txtDescripcion', @$formaAtencionCliente[0]->DescripcionFormaAtencion); ?>"></td>
				</tr>
			</tbody>
		</table>
		<table>
			<tr>
				<br>
			</tr>
			<tr>
				<td><input type="submit" name="submit" class="botones" value="Guardar"></td>
				<td></td>
				<td></td>   
				<td></td>   
				<td><input type="button" onclick="regresar()" name="" class="botones" value="Regresar"></td>
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

