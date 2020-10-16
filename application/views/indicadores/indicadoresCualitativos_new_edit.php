<script type="text/javascript">
	function regresar(){
		window.location="<?php echo base_url()?>indicador/indicadoresCualitativos";
	}

	function limpiar() {
		var t = document.getElementById("form1").getElementsByTagName("input");
//var t = document.getElementById("TAB").getElementsByTagName("input");
for (var i=0; i<t.length; i++) {
	if (t[i].type == "text") {    
		t[i].value = "";
	}
}
window.location="<?php echo base_url()?>indicador/nuevoIndicadorCualitativo";
}
</script>
<?php 
$dimension = array(
	'1' => "ECONÓMICO", 
	'2' => "FILANTRÓPICO", 
	'3' => "LEGAL-SOCIAL", 
	'4' => "MEDIOAMBIENTAL"
	);
$subDimension = array(
	'1' => "Sindicatos",
	'2' => "Acción social",
	'3' => "Administración",
	'4' => "Asamblea",
	'5' => "Asociatividad grupos de interes",
	'6' => "Atención  grupos de interes",
	'7' => "Ausentismo",
	'8' => "Comercio Justo",
	'9' => "Compromiso Desarrollo infantil",
	'10' => "Compromiso Medioambiente",
	'11' => "Comunicación clientes",
	'12' => "Comunidad",
	'13' => "Conocimiento de daños de productos y servicios",
	'14' => "Contratos trabajo",
	'15' => "Contribución en la generación de la ciudadania",
	'16' => "Desarrollo de proveedores",
	'17' => "Desarrollo profesional",
	'18' => "Despedidos o Rotación",
	'19' => "Dialogo Comuncación con las partes interesadas",
	'20' => "Donaciones",
	'21' => "Educación Mediaombiental",
	'22' => "Equidad de género",
	'23' => "Ética e integriddad",
	'24' => "Forestal",
	'25' => "No Discriminación",
	'26' => "Gestión Participativa"
	);
	?>
	<h3 class="page-header" align="center"><span class="glyphicon glyphicon-th-list"></span> <?php echo $titulo; ?></h3>
	<div id="TAB">
		<div class="error"> 
			<center>
				<?php messages_flash('danger',validation_errors(),'Errores del formulario', true); ?>
			</center>
		</div>
		<form action="<?php echo base_url()?>indicador/guardarIndicadorCualitativo" id="form1" method="POST">
			<table width="100%" border="2" cellspacing=8px" id="Tabla1">
				<tbody>
					<input type="hidden" name="accion" value="<?php echo $accion; ?>">
					<input type="hidden" name="id" value="<?php echo @$indicadorCualitativo[0]->IdIndicadorCualitativo; ?>">			
					<tr>
						<th class="izquierda">Fase: </th>
						<td>
							<input class="formulario1" type="text" name="txtFase" placeholder="Elegir F, número y las Iniciales del Indicador [F1ND]" value="<?php echo set_value('txtFase',@$indicadorCualitativo[0]->Fase); ?>">
						</td>
					</tr>
					<tr>
						<th class="izquierda">Indicador Cualitativo: </th>
						<td><input class="formulario1" type="text" name="txtIndicador" placeholder="Ingresar datos" value="<?php echo set_value('txtIndicador',@$indicadorCualitativo[0]->IndicadorCualitativo); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">Pregunta: </th>
						<td><input class="formulario1" type="text" name="txtPregunta" placeholder="Ingresar datos" value="<?php echo set_value('txtPregunta',@$indicadorCualitativo[0]->Pregunta); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">Código GRI: </th>
						<td><input class="formulario1" type="text" name="txtCodigoGRI" placeholder="Ingresar datos" value="<?php echo set_value('txtCodigoGRI',@$indicadorCualitativo[0]->CodigoGRI); ?>"</td>
					</tr>				
					<tr>
						<th class="izquierda">Dimensión:</th>
						<td>
							<select class="formulario1" name="selectDimension">
								<?php 
								foreach ($dimension as $key) {
									if ($key == @$indicadorCualitativo[0]->Dimension) { ?>
									<option selected="selected" > <?php echo $key; ?></option>											
									<?php	}else{ ?>
									<option> <?php echo $key; ?></option>
									<?php 	}
								} ?>
							</select>
						</td>
					</tr>	
					<tr> 
						<th class="izquierda">Sub - Dimensión:</th>
						<td>
							<select class="formulario1" name="selectSubDimension">
								<?php 
								foreach ($subDimension as $key) {
									if ($key == @$indicadorCualitativo[0]->SubDimension) { ?>
									<option selected="selected" > <?php echo $key; ?></option>											
									<?php	}else{ ?>
									<option> <?php echo $key; ?></option>
									<?php 	}
								} ?>
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