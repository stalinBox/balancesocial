<script type="text/javascript">
	function regresar(){
		window.location="<?php echo base_url()?>desarrolloProfesional/desarrolloEmpleado";
	}

	function limpiar() {
		var t = document.getElementById("form1").getElementsByTagName("input");
//var t = document.getElementById("TAB").getElementsByTagName("input");
for (var i=0; i<t.length; i++) {
	if (t[i].type == "text") {    
		t[i].value = "";
	}
}
window.location="<?php echo base_url()?>desarrolloProfesional/nuevoDesarrolloprofesional";
}
</script>
<h3 class="page-header" align="center"><span class="glyphicon glyphicon-th-list"></span> <?php echo $titulo; ?></h3>
<div id="TAB">
	<div class="error"> 
		<center>
			<?php messages_flash('danger',validation_errors(),'Errores del formulario', true); ?>
		</center>
	</div>
	<form action="<?php echo base_url()?>desarrolloProfesional/guardarDesarrolloprofesional" id="form1" method="POST">
		<table width="100%" border="2" cellspacing=8px" id="Tabla1">
			<tbody>
				<input type="hidden" name="accion" value="<?php echo $accion; ?>">
				<input type="hidden" name="id" value="<?php echo @$desarrolloProfesional[0]->IdDesarrolloProfesional; ?>">	
				<tr>
					<th class="izquierda">Nombre del Desarrollo Profesional: </th>
					<td><input class="formulario1" type="text" name="txtNombreDesarrolloProfesional" placeholder="Ingresar datos" value="<?php echo set_value('txtNombreDesarrolloProfesional', @$desarrolloProfesional[0]->NombreDesarrolloProfesional); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">Descripción: </th>
					<td><input class="formulario1" type="text" name="txtDescripcion" placeholder="Ingresar datos" value="<?php echo set_value('txtDescripcion', @$desarrolloProfesional[0]->Descripcion); ?>"></td>
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

