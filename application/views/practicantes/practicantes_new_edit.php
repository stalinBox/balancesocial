<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datetimepicker.min.css" >
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datepicker.css" > 

<script type="text/javascript">
	function regresar(){
		window.location="<?php echo base_url()?>practicante/practicantes";
	}

	function limpiar() {
		var t = document.getElementById("form1").getElementsByTagName("input");
//var t = document.getElementById("TAB").getElementsByTagName("input");
for (var i=0; i<t.length; i++) {
	if (t[i].type == "text") {    
		t[i].value = "";
	}
}
window.location="<?php echo base_url()?>practicante/nuevoPracticante";
}
</script>
<?php 
$convenio = array('1' => "NO", '2' => "SI");
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
	<form action="<?php echo base_url()?>practicante/guardarPracticante" id="form1" method="POST">
		<table width="100%" cellspacing=8px" id="Tabla1">
			<tbody>
				<input type="hidden" name="accion" value="<?php echo $accion; ?>">
				<input type="hidden" name="id" value="<?php echo @$practicante[0]->CedulaPracticante; ?>">
				<tr>
					<th class="izquierda">*	Cédula: </th>
					<td><input class="form-control" type="text" name="txtCedula" placeholder="Ingresar datos" value="<?php echo set_value('txtCedula', @$practicante[0]->CedulaPracticante); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">*	Nombres: </th>
					<td>
						<input class="form-control" type="text" name="txtNombres" placeholder="Ingresar datos" value="<?php echo set_value('txtNombres', @$practicante[0]->NombresPracticante); ?>">
					</td>
				</tr>
				<tr>
					<th class="izquierda">*	Apellidos: </th>
					<td><input class="form-control" type="text" name="txtApellidos" placeholder="Ingresar datos" value="<?php echo set_value('txtApellidos', @$practicante[0]->ApellidosPracticante); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">*	Institución Procedente: </th>
					<td><input class="form-control" type="text" name="txtInstProcedente" placeholder="Ingresar datos" value="<?php echo set_value('txtInstProcedente', @$practicante[0]->InstitucionProcedente); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">Practicante con Convenio:</th>
					<td>
						<select class="form-control" name="selectConvenio">
							<?php 
							foreach ($convenio as $key) {
								if ($key == @$practicante[0]->TipoConvenio) { ?>
								<option selected="selected" > <?php echo $key; ?></option>											
								<?php	}else{ ?>
								<option> <?php echo $key; ?></option>
								<?php 	}
							} ?>
						</select>
					</td>
				</tr>
				<tr>
					<th class="izquierda">*	Cantidad de Horas por día: </th>
					<td>
						<input class="form-control" type="text" name="txtCantHorasDia" placeholder="Ingresar datos" value="<?php echo set_value('txtCantHorasDia', @$practicante[0]->CantidadHorasPorDia); ?>">
					</td>
				</tr>
				<tr>
					<th class="izquierda">*	Fecha de Inicio de Prácticas: </th>
					<td>
						<div class='input-group date' id='divMiCalendario1'>
                      <input type='text' id="txtFechaInicio" name="txtFechaInicio" class="form-control" value="<?php echo set_value('txtFechaInicio', @$practicante[0]->FInicioPracticas); ?>" readonly/>
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>
					</td>
				</tr>
				<tr>
					<th class="izquierda">*	Fecha Fin de Prácticas: </th>
					<td>
						<div class='input-group date' id='divMiCalendario2'>
                      <input type='text' id="txtFechaFin" name="txtFechaFin" class="form-control" value="<?php echo set_value('txtFechaFin', @$practicante[0]->FFinPracticas); ?>" readonly/>
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>
					</td>
				</tr>
				<tr>
					<th class="izquierda">Contratado después de las Prácticas:</th>
					<td>
						<select class="form-control" name="selectContratado">
							<?php 
							foreach ($convenio as $key) {
								if ($key == @$practicante[0]->ContratadoDespuesDePracticas) { ?>
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

   <script src="<?php echo base_url()?>js/jquery.min.js"></script>
   <script src="<?php echo base_url()?>js/calendario/moment.min.js"></script>
   <script src="<?php echo base_url()?>js/calendario/bootstrap-datetimepicker.min.js"></script>
   <script src="<?php echo base_url()?>js/calendario/bootstrap-datetimepicker.es.js"></script>
   <script src="<?php echo base_url()?>js/calendario/bootstrap-datepicker.js"></script>

   <script type="text/javascript">
     $('#divMiCalendario1').datetimepicker({
          format: 'YYYY-MM-DD'
      });
     $('#divMiCalendario2').datetimepicker({
          format: 'YYYY-MM-DD'
      });
     $('#divPeriodo').datepicker({
          	format: "yyyy",
    		viewMode: "years", 
    		minViewMode: "years"
    });
   </script>