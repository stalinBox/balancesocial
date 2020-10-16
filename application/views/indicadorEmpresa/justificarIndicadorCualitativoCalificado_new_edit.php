<script type="text/javascript">
	function regresar(IdCualitativoMaestro){
		window.location="<?php echo base_url()?>indicadorEmpresa/calificarIndicadoresCualitativosDetalle/"+IdCualitativoMaestro+"";
	}

function limpiar() {
		var t = document.getElementById("form1").getElementsByTagName("input");
//var t = document.getElementById("TAB").getElementsByTagName("input");
for (var i=0; i<t.length; i++) {
	if (t[i].type == "text") {    
		t[i].value = "";
	}
}
window.location="<?php echo base_url()?>indicadorEmpresa/nuevoIndicadorCualitativo";
}
</script>

<h3 class="page-header" align="center"><span class="glyphicon glyphicon-th-list"></span> <?php echo $titulo; ?></h3>
<div id="TAB">
	<div class="error"> 
		<center>
			<?php messages_flash('danger',validation_errors(),'Errores del formulario', true); ?>
		</center>
	</div>
	<form action="<?php echo base_url()?>indicadorEmpresa/guardarJustificacionIndicadorCualitativoCalificado" id="form1" method="POST">
		<table width="100%" border="2" cellspacing=8px" id="Tabla1">
			<tbody>
				<input type="hidden" name="accion" value="<?php echo $accion; ?>">
				<input type="hidden" name="idMaestro" value="<?php echo @$IdCualitativoMaestro; ?>">
				<input type="hidden" name="idIndicadorCualitativo" value="<?php echo @$indicadorCualitativoCalifiacadoEmpresa[0]->IdCualitativosCalificados; ?>">

				<tr>
					<th class="izquierda">Código de Indicador: </th>
					<td><input class="formulario1" type="text" name="txtCodigo" placeholder="Ingresar datos" value="<?php echo set_value('txtCodigo',@$indicadorCualitativoCalifiacadoEmpresa[0]->IdCualitativosCalificados); ?>" readonly></td>
				</tr>
				<tr>
					<th class="izquierda">Fase: </th>
					<td><input class="formulario1" type="text" name="txtICCalificacion" placeholder="Ingresar datos" value="<?php echo set_value('txtICCalificacion',@$indicadorCualitativoCalifiacadoEmpresa[0]->Fase); ?>" readonly></td>
				</tr>			
				<tr>
					<th class="izquierda">Estandar: </th>
					<td><input class="formulario1" type="text" name="txtNumero" placeholder="Ingresar datos" value="<?php echo set_value('txtNumero',@$indicadorCualitativoCalifiacadoEmpresa[0]->Estandar); ?>" readonly></td>
				</tr>
				<tr>
					<th class="izquierda">Concepto: </th>
					<td>
						<textarea name="txtFormula" rows="5" cols="42" readonly=""><?php echo @$indicadorCualitativoCalifiacadoEmpresa[0]->Concepto;?> </textarea>
					</td>
				</tr>
				<tr>
					<th class="izquierda">Códigs GRI: </th>
					<td><input class="formulario1" type="text" name="txtICComentario" placeholder="Ingresar datos" value="<?php echo set_value('txtICComentario',@$indicadorCualitativoCalifiacadoEmpresa[0]->CodigosGRI); ?>" readonly></td>
				</tr>
				<tr>
					<th class="izquierda">Dimensión: </th>
					<td><input class="formulario1" type="text" name="txtICDenominador" placeholder="Ingresar datos" value="<?php echo set_value('txtICDenominador',@$indicadorCualitativoCalifiacadoEmpresa[0]->Dimension); ?>" readonly></td>
				</tr>				
				<tr>
					<th class="izquierda">Sub-Dimensión: </th>
					<td><input class="formulario1" type="text" name="txtICResultado" placeholder="Ingresar datos" value="<?php echo set_value('txtICResultado',@$indicadorCualitativoCalifiacadoEmpresa[0]->SubDimension); ?>" readonly></td>
				</tr>
				<tr>
					<th class="izquierda">Justificación: </th>
					<td><input class="formulario1" type="text" name="txtJustificacion" placeholder="Ingresar datos" value="<?php echo set_value('txtJustificacion',@$indicadorCualitativoCalifiacadoEmpresa[0]->Justificacion); ?>"></td>
				</tr>
				

			</tbody>
		</table>
		<table>
			<tr>
				<br>
			</tr>
			<tr>				
				<td><input type="button" onclick="regresar(<?php echo $IdCualitativoMaestro ?>)" name="" class="botones" value="Regresar"></td>
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