<script type="text/javascript">
	function regresar(){
		window.location="<?php echo base_url()?>indicadorEmpresa/indicadoresCuantitativosEmpresaCalificacion";
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
	<form action="<?php echo base_url()?>indicadorEmpresa/guardarIndicadorCuantitativoCalificado" id="form1" method="POST">
		<table width="100%" border="2" cellspacing=8px" id="Tabla1">
			<tbody>
				<input type="hidden" name="accion" value="<?php echo $accion; ?>">
				<input type="hidden" name="id" value="<?php echo @$indicadorCuantitativoCalifiacadoEmpresa[0]->IdIndicadorCalificado; ?>">
				<input type="hidden" name="txtIdIndicador" value="<?php echo @$indicadorCuantitativoCalifiacadoEmpresa[0]->ICIndicador; ?>">

				<tr>
					<th class="izquierda">Código de Indicador: </th>
					<td><input class="formulario1" type="text" name="txtCodigo" placeholder="Ingresar datos" value="<?php echo set_value('txtCodigo',@$indicadorCuantitativoCalifiacadoEmpresa[0]->ICIndicador); ?>" readonly></td>
				</tr>				
				<tr>
					<th class="izquierda">Fórmula: </th>
					<td>
						<textarea name="txtFormula" rows="5" cols="42" readonly=""><?php echo @$indicadorCuantitativoCalifiacadoEmpresa[0]->ICFormula;?> </textarea>
					</td>
				</tr>
				<tr>
					<th class="izquierda">Numerador: </th>
					<td><input class="formulario1" type="text" name="txtNumero" placeholder="Ingresar datos" value="<?php echo set_value('txtNumero',@$indicadorCuantitativoCalifiacadoEmpresa[0]->ICNumerador); ?>" readonly></td>
				</tr>
				<tr>
					<th class="izquierda">Denominador: </th>
					<td><input class="formulario1" type="text" name="txtICDenominador" placeholder="Ingresar datos" value="<?php echo set_value('txtICDenominador',@$indicadorCuantitativoCalifiacadoEmpresa[0]->ICDenominador); ?>" readonly></td>
				</tr>				
				<tr>
					<th class="izquierda">Resultado: </th>
					<td><input class="formulario1" type="text" name="txtICResultado" placeholder="Ingresar datos" value="<?php echo set_value('txtICResultado',@$indicadorCuantitativoCalifiacadoEmpresa[0]->ICResultado); ?>" readonly></td>
				</tr>
				<tr>
					<th class="izquierda">Calificación: </th>
					<td><input class="formulario1" type="text" name="txtICCalificacion" placeholder="Ingresar datos" value="<?php echo set_value('txtICCalificacion',@$indicadorCuantitativoCalifiacadoEmpresa[0]->ICCalificacion); ?>" readonly></td>
				</tr>
				<tr>
					<th class="izquierda">Comentario: </th>
					<td><input class="formulario1" type="text" name="txtICComentario" placeholder="Ingresar datos" value="<?php echo set_value('txtICComentario',@$indicadorCuantitativoCalifiacadoEmpresa[0]->ICComentario); ?>"></td>
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