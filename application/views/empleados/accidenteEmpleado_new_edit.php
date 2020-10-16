<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datetimepicker.min.css" >
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datepicker.css" > 

<script type="text/javascript">
	function regresar(){
		window.location="<?php echo base_url()?>empleado/accidentes";
	}
	
	function limpiar() {
		var t = document.getElementById("form1").getElementsByTagName("input");
//var t = document.getElementById("TAB").getElementsByTagName("input");
for (var i=0; i<t.length; i++) {
	if (t[i].type == "text") {		
		t[i].value = "";
	}
}
window.location="<?php echo base_url()?>empleado/nuevoAccidente";
}
</script>
<?php 
$tipoIncapacidad = array(
	'1' => "Absoluta", 
	'2' => "Parcial", 
	'3' => "Temporal", 
	'4' => "Total" 
	);
$pregunta = array('1' => "NO", '2' => "SI");
?>
<h3 class="page-header" align="center"><span class="glyphicon glyphicon-th-list"></span> <?php echo $titulo; ?></h3>
<div id="TAB">
	<div class="error"> 
		<center>
			<?php messages_flash('danger',validation_errors(),'Errores del formulario', true); ?>
		</center>
	</div>
	<div class="container">
	<dl>Los campos con * son obligatorios</dl>
</div>
	<form action="<?php echo base_url()?>empleado/guardarAccidente" id="form1" method="POST">
		<table width="100%" border="0" cellspacing=8px" id="Tabla1">
			<tbody>
				<input type="hidden" name="accion" value="<?php echo $accion; ?>">
				<input type="hidden" name="id" value="<?php echo @$accidente[0]->IdAccidente; ?>">
				<tr>
					<th class="izquierda">Empleado:</th>
					<td>
						<select class="form-control" name="selectEmpleado" id="empleado" type="hidden">		          
							<?php 
							foreach ($empleados as $items) {
								if ($items->CedulaEmpleado == @$accidente[0]->CIEmpleadoAccidente) { ?>
								<option selected="selected" value="<?php echo $items->CedulaEmpleado; ?>"><?php echo $items->ApellidoPaternoEmpleado." ".$items->ApellidoMaternoEmpleado. " ".$items->NombresEmpleado;?></option>
								<?php }else{ ?>
								<option value="<?php echo $items->CedulaEmpleado; ?>"><?php echo $items->ApellidoPaternoEmpleado." ".$items->ApellidoMaternoEmpleado. " ".$items->NombresEmpleado;?></option>
								<?php }
							} ?>
						</select>
					</td>
				</tr>
				<tr>
					<th class="izquierda">Tipo de Incapacidad:</th>
					<td>
						<select class="form-control" name="selectTipoIncapacidad">
							<?php 
							foreach ($tipoIncapacidad as $key) {
								if ($key == @$accidente[0]->TipoIncapacidadAccidente) { ?>
								<option selected="selected" > <?php echo $key; ?></option>											
								<?php	}else{ ?>
								<option> <?php echo $key; ?></option>
								<?php 	}
							} ?>	
						</select>
					</td>
				</tr>
				<tr>
					<th class="izquierda">*	Fecha de Accidente: </th>
					<td>
					
					<div class='input-group date' id='divMiCalendario'>
                      <input type='text' id="txtFechaAccidente" name="txtFechaAccidente" class="form-control" value="<?php echo set_value('txtFechaAccidente', @$accidente[0]->FechaAccidente); ?>" />
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>
					</td>
				</tr>
				<tr>
					<th class="izquierda">*	Números de Días Perdidos: </th>
					<td><input class="form-control" type="text" name="txtNumDiasPerdidos" placeholder="Ingresar datos" value="<?php echo set_value('txtNumDiasPerdidos', @$accidente[0]->NumDiasPerdidos); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">Indemizado:</th>
					<td>
						<select class="form-control" name="selectIndemizado">
							<?php 
							foreach ($pregunta as $key) {
								if ($key == @$accidente[0]->Indemnizado) { ?>
								<option selected="selected" > <?php echo $key; ?></option>											
								<?php	}else{ ?>
								<option> <?php echo $key; ?></option>
								<?php 	}
							} ?>
						</select>
					</td>
				</tr>
				<tr>
					<th class="izquierda">Fallecimiento:</th>
					<td>
						<select class="form-control" name="selectFallecimiento">
							<?php 
							foreach ($pregunta as $key) {
								if ($key == @$accidente[0]->Fallecimiento) { ?>
								<option selected="selected" > <?php echo $key; ?></option>											
								<?php	}else{ ?>
								<option> <?php echo $key; ?></option>
								<?php 	}
							} ?>
						</select>
					</td>
				</tr>
				<tr>
					<th class="izquierda">*	Periodo: </th>
					<td>
					<div class='input-group date' id='divPeriodo'>
                      <input type='text' id="txtPeriodo" name="txtPeriodo" class="form-control" value="<?php echo set_value('txtPeriodo', @$accidente[0]->Periodo); ?>" />
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>

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

   <script src="<?php echo base_url()?>js/jquery.min.js"></script>
   <script src="<?php echo base_url()?>js/calendario/moment.min.js"></script>
   <script src="<?php echo base_url()?>js/calendario/bootstrap-datetimepicker.min.js"></script>
   <script src="<?php echo base_url()?>js/calendario/bootstrap-datetimepicker.es.js"></script>
   <script src="<?php echo base_url()?>js/calendario/bootstrap-datepicker.js"></script>

   <script type="text/javascript">
     $('#divMiCalendario').datetimepicker({
          format: 'YYYY-MM-DD'
      });

     $('#divPeriodo').datepicker({
          	format: "yyyy",
    		viewMode: "years", 
    		minViewMode: "years"
    });
   </script>