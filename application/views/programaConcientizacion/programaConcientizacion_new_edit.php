<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datetimepicker.min.css" >
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datepicker.css" > 

<script type="text/javascript">
	function regresar(){
		window.location="<?php echo base_url()?>programaConcientizacion/progamasConcientizacion";
	}

	function limpiar() {
		var t = document.getElementById("form1").getElementsByTagName("input");
//var t = document.getElementById("TAB").getElementsByTagName("input");
for (var i=0; i<t.length; i++) {
	if (t[i].type == "text") {    
		t[i].value = "";
	}
}
window.location="<?php echo base_url()?>programaConcientizacion/nuevoProgConcien";
}
</script>
<?php 
$estado = array(
	'0' => "Planificada",
	'1' => "Ejecutada"
	);
$arrayTipoPrograma = array(
							'1' => "Concientización de consumo de Agua", 
							'2' => "Concientización de consumo de Papel", 
							'3' => "Concientización de consumo Energético", 
							'4' => "Concientización de consumo de Combustible", 
							'5' => "Concientización de consumo Telefónico", 
							'6' => "Concientización de reducción de Residuos", 
							'7' => "Otro"
							);
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
		<form action="<?php echo base_url()?>programaConcientizacion/guardarProgConcien" id="form1" method="POST">
			<table width="100%" cellspacing=8px" id="Tabla1">
				<tbody>
					<input type="hidden" name="accion" value="<?php echo $accion; ?>">
					<input type="hidden" name="id" value="<?php echo @$programaConcientizacion[0]->IdProgramasConcientizacion; ?>">
					<tr>
						<th class="izquierda">*	Nombre del Programa: </th>
						<td><input class="form-control" type="text" name="txtNombrePrograma" placeholder="Ingresar datos" value="<?php echo set_value('txtNombrePrograma', @$programaConcientizacion[0]->NombrePrograma); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">Tipo de Programa:</th>
						<td>
							<select class="form-control" name="selectTipoEstado"><?php 
								foreach ($arrayTipoPrograma as $key) {
									if ($key == @$programaConcientizacion[0]->TipoPrograma) { ?>
									<option selected="selected" > <?php echo $key; ?></option>											
									<?php	}else{ ?>
									<option> <?php echo $key; ?></option>
									<?php 	}
								} ?>	
							</select>
						</td>
					</tr>
					<tr>
						<th class="izquierda">*	Fecha de planificación: </th>
						<td>
							<div class='input-group date' id='divMiCalendario1'>
 								<input type='text' id="txtFechaPlanificacion" name="txtFechaPlanificacion" class="form-control" value="<?php echo set_value('txtFechaPlanificacion', @$programaConcientizacion[0]->FechaPlanificacion); ?>" readonly/>
                      			<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      			</span>
                    		</div>
						</td>
					</tr>
					<tr>
						<th class="izquierda">*	Costo Planificado: </th>
						<td><input class="form-control" type="text" name="txtCostoPlanificado" placeholder="Ingresar datos" value="<?php echo set_value('txtCostoPlanificado', @$programaConcientizacion[0]->CostoPlanificado); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">Empleado Responsable:</th>
						<td>
							<select class="form-control" name="selectEmpleado" id="empleado" type="hidden" >
								<?php 
								foreach ($empleados as $items) {
									if ($items->CedulaEmpleado == @$programaConcientizacion[0]->ResponsablePrograma) { ?>
									<option selected="selected" value="<?php echo $items->CedulaEmpleado; ?>"><?php echo $items->ApellidoPaternoEmpleado." ".$items->ApellidoMaternoEmpleado. " ".$items->NombresEmpleado;?></option>
									<?php }else{ ?>
									<option value="<?php echo $items->CedulaEmpleado; ?>"><?php echo $items->ApellidoPaternoEmpleado." ".$items->ApellidoMaternoEmpleado. " ".$items->NombresEmpleado;?></option>
									<?php }
								} ?>
							</select>
						</td>
					</tr>
					<tr>
						<th class="izquierda">Estado:</th>
						<td>
							<select class="form-control" name="selectEstado"><?php 
								foreach ($estado as $key) {
									if ($key == @$programaConcientizacion[0]->EstadoPrograma) { ?>
									<option selected="selected" > <?php echo $key; ?></option>											
									<?php	}else{ ?>
									<option> <?php echo $key; ?></option>
									<?php 	}
								} ?>	
							</select>
						</td>
					</tr>					
					<tr>
						<th class="izquierda">Empresa de Convenio: </th>
						<td><input class="form-control" type="text" name="txtEmpresaConvenio" placeholder="Ingresar datos" value="<?php echo set_value('txtEmpresaConvenio', @$programaConcientizacion[0]->ConvenioPrograma); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">Fecha Inicio: </th>
						<td>
							<div class='input-group date' id='divMiCalendario2'>
 								<input type='text' id="txtFechaInicio" name="txtFechaInicio" class="form-control" value="<?php echo set_value('txtFechaInicio', @$programaConcientizacion[0]->FechaInicioPrograma); ?>" />
                      			<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      			</span>
                    		</div>
						</td>
					</tr>	
					<tr>
						<th class="izquierda">Fecha Fin: </th>
						<td>
							<div class='input-group date' id='divMiCalendario3'>
 								<input type='text' id="txtFechaFin" name="txtFechaFin" class="form-control" value="<?php echo set_value('txtFechaFin', @$programaConcientizacion[0]->FechaFinPrograma); ?>" />
                      			<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      			</span>
                    		</div>
					</tr>
					<tr>
						<th class="izquierda">Costo de Ejecución: </th>
						<td><input class="form-control" type="text" name="txtCostoEjecucion" placeholder="Ingresar datos" value="<?php echo set_value('txtCostoEjecucion', @$programaConcientizacion[0]->CostoPrograma); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">Observación: </th>
						<td><input class="form-control" type="text" name="txtObservacion" placeholder="Ingresar datos" value="<?php echo set_value('txtObservacion', @$programaConcientizacion[0]->Observacion); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">*	Periodo: </th>
						<td>
							<div class='input-group date' id='divPeriodo'>
                      		<input type='text' id="txtPeriodo" name="txtPeriodo" class="form-control" value="<?php echo set_value('txtPeriodo', @$programaConcientizacion[0]->Periodo); ?>" readonly/>
                      			<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      			</span>
                    		</div>
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

     $('#divMiCalendario3').datetimepicker({
          format: 'YYYY-MM-DD'
      });     

     $('#divPeriodo').datepicker({
          	format: "yyyy",
    		viewMode: "years", 
    		minViewMode: "years"
    });
   </script>