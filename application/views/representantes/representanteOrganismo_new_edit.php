<script type="text/javascript">
	function regresar(){
		window.location="<?php echo base_url()?>representante/representantesOrganismos";
	}

	function limpiar() {
		var t = document.getElementById("form1").getElementsByTagName("input");
//var t = document.getElementById("TAB").getElementsByTagName("input");
for (var i=0; i<t.length; i++) {
	if (t[i].type == "text") {    
		t[i].value = "";
	}
}
window.location="<?php echo base_url()?>representante/nuevoRepOrganismo";
}
</script>
<h3 class="page-header" align="center"><span class="glyphicon glyphicon-th-list"></span> <?php echo $titulo; ?></h3>
<div id="TAB">
	<div class="error"> 
		<center>
			<?php messages_flash('danger',validation_errors(),'Errores del formulario', true); ?>
		</center>
	</div>
	<form action="<?php echo base_url()?>representante/guardarRepOrganismo" id="form1" method="POST">
		<table width="100%" border="2" cellspacing=8px" id="Tabla1">
			<tbody>
				<input type="hidden" name="accion" value="<?php echo $accion; ?>">
				<input type="hidden" name="id" value="<?php echo @$representante[0]->IdRepOrg; ?>">
				<tr>
					<th class="izquierda">Nombre del Representante:</th>
					<td>
						<select class="formulario1" name="selectRepresentante" id="representante" type="hidden" >
							<?php 
							foreach ($representantes as $items) {
								if ($items->CedulaRepresentante == @$representante[0]->IdRepresentante) { ?>
								<option selected="selected" value="<?php echo $items->CedulaRepresentante; ?>"><?php echo $items->ApellidoPaternoRepresentante." ".$items->ApellidoMaternoRepresentante. " ".$items->NombresRepresentante;?></option>
								<?php }else{ ?>
								<option value="<?php echo $items->CedulaRepresentante; ?>"><?php echo $items->ApellidoPaternoRepresentante." ".$items->ApellidoMaternoRepresentante. " ".$items->NombresRepresentante;?></option>
								<?php }
							} ?>
						</select>
					</td>
				</tr>
				<tr>
					<th class="izquierda">Nombre del Organismo:</th>
					<td>
						<select class="formulario1" name="selectOrganismo" id="organismos" type="hidden" >
							<?php 
							foreach ($organismos as $items) {
								if ($items->IdOrganismo == @$representante[0]->IdOrganismo) { ?>
								<option selected="selected" value="<?php echo $items->IdOrganismo; ?>"><?php echo $items->NombreOrganismo;?></option>
								<?php }else{ ?>
								<option value="<?php echo $items->IdOrganismo; ?>"><?php echo $items->NombreOrganismo;?></option>
								<?php }
							} ?>
						</select>
					</td>
				</tr>
				<tr>
					<th class="izquierda">Fecha Inicio del Período: </th>
					<td><input class="formulario1" type="text" name="txtFechaInicioPeriodo" placeholder="yyyy-mm-dd" value="<?php echo set_value('txtFechaInicioPeriodo', @$representante[0]->FechaPeriodoInicio); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">Fecha Fin del Período: </th>
					<td><input class="formulario1" type="text" name="txtFechaFinPeriodo" placeholder="yyyy-mm-dd" value="<?php echo set_value('txtFechaFinPeriodo', @$representante[0]->FechaPeriodoFinaliza); ?>"></td>
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