<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datetimepicker.min.css" >

<script type="text/javascript">
	function regresar(){
		window.location="<?php echo base_url()?>empleado/hijos";
	}
	
	function limpiar() {
		var t = document.getElementById("form1").getElementsByTagName("input");
for (var i=0; i<t.length; i++) {
	if (t[i].type == "text") {		
		t[i].value = "";
	}
}
window.location="<?php echo base_url()?>empleado/nuevoHijoEmpleado";
}
</script>
<?php 
$dicapacitado = array('1' => "NO", '2' => "SI");
$educacion = array(
	'1' => "Sin Educación", 
	'2' => "Estudios Suspendidos", 
	'3' => "Educación Inicial", 
	'4' => "Educación General Básica", 
	'5' => "Centro Educativo de Bachillerato Unificado"
	
	);
	?>
	<h3 class="page-header" align="center"><span class="glyphicon glyphicon-th-list"></span> <?php echo $titulo; ?></h3>
	<div id="TAB">
		<div class="error"> 
			<center>
				<?php messages_flash('danger',validation_errors(),'Errores del formulario', true); ?>
			</center>
		</div>
		<form action="<?php echo base_url()?>empleado/guardarHijoEmpleado" id="form1" method="POST">
			<table width="100%" cellspacing=8px" id="Tabla1">
				<tbody>
					<input type="hidden" name="accion" value="<?php echo $accion; ?>">
					<input type="hidden" name="id" value="<?php echo @$hijoEmpleado[0]->IdHijoEmpleado; ?>">
					<tr>
						<th class="izquierda">Nombre del Empleado:</th>
						<td>
							<select class="form-control" name="selectEmpleado" id="empleado" type="hidden" >
								<?php 
								foreach ($empleados as $items) {
									if ($items->CedulaEmpleado == @$hijoEmpleado[0]->CedulaEmpleado) { ?>
									<option selected="selected" value="<?php echo $items->CedulaEmpleado; ?>"><?php echo $items->ApellidoPaternoEmpleado." ".$items->ApellidoMaternoEmpleado. " ".$items->NombresEmpleado;?></option>
									<?php }else{ ?>
									<option value="<?php echo $items->CedulaEmpleado; ?>"><?php echo $items->ApellidoPaternoEmpleado." ".$items->ApellidoMaternoEmpleado. " ".$items->NombresEmpleado;?></option>
									<?php }
								} ?>
							</select>
						</td>
					</tr>
					<tr>
						<th class="izquierda">Cedula de Hijo: </th>
						<td>
							<input class="form-control" type="text" name="txtCedula" placeholder="Ingresar datos" value="<?php echo set_value('txtCedula', @$hijoEmpleado[0]->CedulaHijoEmpleado); ?>">
						</td>
					</tr>
					<tr>
						<th class="izquierda">Nombres: </th>
						<td><input class="form-control" type="text" name="txtNombres" placeholder="Ingresar datos" value="<?php echo set_value('txtNombres', @$hijoEmpleado[0]->NombresHijoEmpleado); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">Apellidos: </th>
						<td><input class="form-control" type="text" name="txtApellidos" placeholder="Ingresar datos" value="<?php echo set_value('txtApellidos', @$hijoEmpleado[0]->ApellidosHijoEmpleado); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">Fecha de Nacimiento: </th>
						<td>
							<div class='input-group date' id='divMiCalendario'>
                      			<input type='text' id="txtFechaNacimiento" name="txtFechaNacimiento" class="form-control" value="<?php echo set_value('txtFechaNacimiento', @$hijoEmpleado[0]->FechaNacimientoHijoEmpleado); ?>" readonly/>
                      			<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      			</span>
                    		</div>
						</td>
					</tr>
					<tr>
						<th class="izquierda">Discapacidad:</th>
						<td>
							<select class="form-control" name="selectDiscapacidad">
								<?php 
								foreach ($dicapacitado as $key) {
									if ($key == @$hijoEmpleado[0]->DiscapacidadHijoEmpleado) { ?>
									<option selected="selected" > <?php echo $key; ?></option>											
									<?php	}else{ ?>
									<option> <?php echo $key; ?></option>
									<?php 	}
								} ?>	
							</select>
						</td>
					</tr>			
					<tr>
						<th class="izquierda">Centro Educativo:</th>
						<td>
							<select class="form-control" name="selectTipoEduacion">
								<?php 
								foreach ($educacion as $key) {
									if ($key == @$hijoEmpleado[0]->CentroEducacionHijoEmpleado) { ?>
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
					<td><input type="submit" name="submit" class="botones" value="Guardar"></td>
					<td></td>
					<td></td>		
					<td><input type="button" onclick="regresar()" name="" class="botones" value="Regresar"></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td><td></td>
					<td></td>
					<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
				</tr>
			</table>
		</form>
	</div>

   <script src="<?php echo base_url()?>js/jquery.min.js"></script>
   <script src="<?php echo base_url()?>js/calendario/moment.min.js"></script>
   <script src="<?php echo base_url()?>js/calendario/bootstrap-datetimepicker.min.js"></script>
   <script src="<?php echo base_url()?>js/calendario/bootstrap-datetimepicker.es.js"></script>

	<script type="text/javascript">
     $('#divMiCalendario').datetimepicker({
          format: 'YYYY-MM-DD',
          startDate: '1960-01-01'
      });
   </script>