<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.min.css">
<script type="text/javascript">
	function regresar(){
		window.location="<?php echo base_url()?>empresa/objetivos";
	}
	
	function limpiar() {
		var t = document.getElementById("form1").getElementsByTagName("input");
//var t = document.getElementById("TAB").getElementsByTagName("input");
for (var i=0; i<t.length; i++) {
	if (t[i].type == "text") {		
		t[i].value = "";
	}
}
window.location="<?php echo base_url()?>empresa/nuevoObjetivo";
}
</script>

<h3 class="page-header" align="center"><span class="glyphicon glyphicon-th-list"></span> <?php echo $titulo; ?></h3>
<div id="TAB">
	<div class="error"> 
		<center>
			<?php messages_flash('danger',validation_errors(),'Errores del formulario', true); ?>
		</center>
	</div>
	<form action="<?php echo base_url()?>empresa/guardarObjetivo" id="form1" method="POST">
		<table width="100%" cellspacing=8px" id="Tabla1">
			<tbody>		  
				<input type="hidden" name="accion" value="<?php echo $accion; ?>">
				<input type="hidden" name="id" id="id" value="<?php echo @$objetivoEmpresa[0]->IdObjetivosEmpresa; ?>">	
				<tr>
					<th class="izquierda">Objetivo de la Empresa: </th>
					<td>
						<input class="form-control" type="text" name="txtObjetivo"  placeholder="Ingresar datos" value="<?php echo set_value('txtObjetivo',@$objetivoEmpresa[0]->ObjetivoObjetivosEmpresa); ?>">
					</td>
				</tr>
				<tr>
					<th class="izquierda">Descripción del Objetivo: </th>
					<td><input class="form-control" type="text" name="txtDescripcion"  placeholder="Ingresar datos" value="<?php echo set_value('txtDescripcion',@$objetivoEmpresa[0]->DescripcionObjetivosEmpresa); ?>">
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
				<td><input type="submit" name="submit" class="botones" value="Guardar"></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
			</tr>
		</table>

	</form>
	<center>
		<div style="font-size: 16px; color: #FE2E2E;"> 
			<?php 
			echo isset($error) ? utf8_decode($error) : '';
			?>            
		</div>
	</center>
</div>