<script type="text/javascript">
	function regresar(){
		window.location="<?php echo base_url()?>importAudiInterBalanceSocial/importAudiInterSobreBalanceSocial";
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
		<form action="<?php echo base_url()?>importAudiInterBalanceSocial/guardarIAISBS" id="form1" method="POST">
			<table width="100%" border="2" cellspacing=8px" id="Tabla1">
				<tbody>
					<input type="hidden" name="accion" value="<?php echo $accion; ?>">
					<input type="hidden" name="id" value="<?php echo @$importAudiInterSobreBalanceSocial[0]->IdImportancia; ?>">
					<tr>
						<th class="izquierda">Nombre: </th>
						<td><input class="formulario1" type="text" name="txtNombreImportancia" placeholder="Ingresar datos" value="<?php echo set_value('txtNombreImportancia', @$importAudiInterSobreBalanceSocial[0]->NombreImportancia); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">Calificación [No modificable]: </th>
						<td><input class="formulario1" type="text" name="txtCalificacion" placeholder="Ingresar datos" value="<?php echo set_value('txtCalificacion', @$importAudiInterSobreBalanceSocial[0]->Valor); ?>" disabled></td>
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
					<td>
					<td></td><td></td>
					<td></td>
					<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
				</tr>
			</table>
		</form>
	</div>

