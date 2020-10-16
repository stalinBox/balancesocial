<script type="text/javascript">
	function regresar(){
		window.location="<?php echo base_url()?>descripcionMemoria/descripciones";
	}

	function limpiar() {
		var t = document.getElementById("form1").getElementsByTagName("input");
//var t = document.getElementById("TAB").getElementsByTagName("input");
for (var i=0; i<t.length; i++) {
	if (t[i].type == "text") {    
		t[i].value = "";
	}
}
window.location="<?php echo base_url()?>descripcionMemoria/nuevaDescripcionMemoria";
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
		<form action="<?php echo base_url()?>descripcionMemoria/guardarDescripcionMemoria" id="form1" method="POST">
			<table width="100%" border="2" cellspacing=8px" id="Tabla1">
				<tbody>
					<input type="hidden" name="accion" value="<?php echo $accion; ?>">
					<input type="hidden" name="id" value="<?php echo @$descripcionMemoria[0]->IdDescripcionMemoria; ?>">
					<tr>
						<th class="izquierda">Año : </th>
						<td><input class="formulario1" type="text" name="txtAnio" placeholder="yyyy" value="<?php echo set_value('txtAnio', @$descripcionMemoria[0]->Anio); ?>"></td>
					</tr>			
					<tr>
						<th class="izquierda">Fecha de Última Memoria: </th>
						<td><input class="formulario1" type="text" name="txtFechaUltimaMemoria" placeholder="yyyy" value="<?php echo set_value('txtFechaUltimaMemoria', @$descripcionMemoria[0]->FechaUltimaMemoria); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">Ciclo de Presentación : </th>
						<td><input class="formulario1" type="text" name="txtCicloPresentacion" placeholder="Ingresar datos" value="<?php echo set_value('txtCicloPresentacion', @$descripcionMemoria[0]->CicloPresentacion); ?>"></td>
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

