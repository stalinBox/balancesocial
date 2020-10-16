<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.min.css">
<script type="text/javascript">
	function regresar(){
		window.location="<?php echo base_url()?>empresa/servicios";
	}
	
	function limpiar() {
		var t = document.getElementById("form1").getElementsByTagName("input");
//var t = document.getElementById("TAB").getElementsByTagName("input");
for (var i=0; i<t.length; i++) {
	if (t[i].type == "text") {		
		t[i].value = "";
	}
}
window.location="<?php echo base_url()?>empresa/nuevoServicio"
}
</script>
<h3 class="page-header" align="center"><span class="glyphicon glyphicon-th-list"></span> <?php echo $titulo; ?></h3>

<div id="TAB">
	<div class="error"> 
		<center>
			<?php echo validation_errors(); ?>
		</center>
	</div>
	<form action="<?php echo base_url()?>empresa/guardarServicio" id="form1" method="POST">
		<table width="100%" cellspacing=8px" id="Tabla1">
			<tbody>		  
				<input type="hidden" name="accion" value="<?php echo $accion; ?>">
				<input type="hidden" name="id" value="<?php echo @$servicioEmpresa[0]->IdServicios; ?>">
				<tr>
					<th class="izquierda">Servicio de la Empresa: </th>
					<td>
						<input class="form-control" type="text" name="txtServicio"  placeholder="Ingresar datos" value="<?php echo set_value('txtServicio',@$servicioEmpresa[0]->NombreServicios); ?>">
					</td>
				</tr>
				<tr>
					<th class="izquierda">Descripción del Servicio: </th>
					<td><input class="form-control" type="text" name="txtDescripcion"  placeholder="Ingresar datos" value="<?php echo set_value('txtDescripcion',@$servicioEmpresa[0]->DescripcionServicios); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">Observación: </th>
					<td><input class="form-control" type="text" name="txtObservacion"  placeholder="Ingresar datos" value="<?php echo set_value('txtObservacion',@$servicioEmpresa[0]->ObservacionServicios); ?>"></td>
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
				<td></td><td></td>
				<td></td>
				<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
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