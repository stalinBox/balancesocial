<script type="text/javascript">
	function regresar(){
		window.location="<?php echo base_url()?>descripcionInformeAnual/descripciones";
	}

	function limpiar() {
		var t = document.getElementById("form1").getElementsByTagName("input");
//var t = document.getElementById("TAB").getElementsByTagName("input");
for (var i=0; i<t.length; i++) {
	if (t[i].type == "text") {    
		t[i].value = "";
	}
}
window.location="<?php echo base_url()?>descripcionInformeAnual/nuevaDescripcion";
}
</script>
<?php 
$tipoConsejo = array(
	'1' => "Consejo de Vigilancia",
	'2' => "Consejo de Administración"
	);
	?>
	<h3 class="page-header" align="center"><span class="glyphicon glyphicon-th-list"></span> <?php echo $titulo; ?></h3>
	<div id="TAB">
		<div class="error"> 
			<center>
				<?php messages_flash('danger',validation_errors(),'Errores del formulario', true); ?>
			</center>
		</div>
		<form action="<?php echo base_url()?>descripcionInformeAnual/guardarDescripcion" id="form1" method="POST">
			<table width="100%" border="2" cellspacing=8px" id="Tabla1">
				<tbody>
					<input type="hidden" name="accion" value="<?php echo $accion; ?>">
					<input type="hidden" name="id" value="<?php echo @$descripcion[0]->IdDescripcionInforme; ?>">
					<tr>
						<th class="izquierda">Responsable : </th>
						<td><input class="formulario1" type="text" name="txtResposnsable" placeholder="Ingresar datos" value="<?php echo set_value('txtResposnsable', @$descripcion[0]->Resposnsable); ?>"></td>
					</tr>				
					<tr>
						<th class="izquierda">Cargo : </th>
						<td><input class="formulario1" type="text" name="txtCargo" placeholder="Ingresar datos" value="<?php echo set_value('txtCargo', @$descripcion[0]->Cargo); ?>"></td>
					</tr>			
					<tr>
						<th class="izquierda">Fecha del Mes: </th>
						<td><input class="formulario1" type="text" name="txtFecha" placeholder="yyyy-mm-dd" value="<?php echo set_value('txtFecha', @$descripcion[0]->Fecha); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">Descripción : </th>
						<td><input class="formulario1" type="text" name="txtDescripcion" placeholder="Ingresar datos" value="<?php echo set_value('txtDescripcion', @$descripcion[0]->Descripcion); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">Foto : </th>
						<td><input class="formulario1" type="text" name="txtFoto" placeholder="Ingresar datos" value="<?php echo set_value('txtFoto', @$descripcion[0]->Foto); ?>"></td>
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
					<td><input type="button" onclick="limpiar()" class="botones" value="Nuevo"></td>
					<td></td><td></td>
					<td></td>
					<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
				</tr>
			</table>
		</form>
	</div>

