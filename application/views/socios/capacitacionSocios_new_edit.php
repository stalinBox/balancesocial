<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datetimepicker.min.css" >
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datepicker.css" > 
<script type="text/javascript">
	function regresar(){
		window.location="<?php echo base_url()?>socio/capacitacionSocios";
	}

	function limpiar() {
		var t = document.getElementById("form1").getElementsByTagName("input");
//var t = document.getElementById("TAB").getElementsByTagName("input");
for (var i=0; i<t.length; i++) {
	if (t[i].type == "text") {    
		t[i].value = "";
	}
}
window.location="<?php echo base_url()?>socio/nuevaCapacitacionSocio";
}
</script>

<?php 
$tipoCapacitacionSocio = array(
	'1' => "Anticorrupción", 
	'2' => "Educación Financiera", 
	'3' => "Responsabilidad Social", 
	'4' => "Realizada por COAC", 
	'5' => "Formación Cooperativa",
	'6' => "Otro"
	);
$estado = array('1' => "Planificada", '2' => "Ejecutada");
?>
<h3 class="page-header" align="center"><span class="glyphicon glyphicon-th-list"></span> <?php echo $titulo; ?></h3>
<div id="TAB">
	<div class="error"> 
		<center>
			<?php messages_flash('danger',validation_errors(),'Errores del formulario', true); ?>
		</center>
	</div>
	<form action="<?php echo base_url()?>socio/guardarCapacitacionSocio" id="form1" method="POST">
		<table width="100%" border="0" cellspacing=8px" id="Tabla1">
			<tbody>
				<input type="hidden" name="accion" value="<?php echo $accion; ?>">	
				<input type="hidden" name="id" value="<?php echo @$capacitacionSocio[0]->IdCapacitacionSocios; ?>">
				<tr>
					<th class="izquierda">*	Nombre de la Capacitación: </th>
					<td><input class="form-control" type="text" name="txtNombreCapacitacion" placeholder="Ingresar datos" value="<?php echo set_value('txtNombreCapacitacion', @$capacitacionSocio[0]->NombreCapacitacionSocios); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">*	Fecha Planificada: </th>
					<td>
					<div class='input-group date' id='divMiCalendario'>
                      <input type='text' id="txtFechaPlanificacion" name="txtFechaPlanificacion" class="form-control" value="<?php echo set_value('txtFechaPlanificacion', @$capacitacionSocio[0]->FechaPlanificacion); ?>" />
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>

					</td>
				</tr>
				<tr>
					<th class="izquierda">Tipo de Capacitación:</th>
					<td>
						<select class="form-control" name="selectTipoCapacitacion">
							<?php 
							foreach ($tipoCapacitacionSocio as $key) {
								if ($key == @$capacitacionSocio[0]->TipoCapacitacionSocios) { ?>
								<option selected="selected" > <?php echo $key; ?></option>											
								<?php	}else{ ?>
								<option> <?php echo $key; ?></option>
								<?php 	}
							} ?>
						</select>
					</td>
				</tr>				
				<tr>
					<th class="izquierda">*	Presupuesto: </th>
					<td><input class="form-control" type="text" name="txtPresupuesto" placeholder="Ingresar datos" value="<?php echo set_value('txtPresupuesto', @$capacitacionSocio[0]->CostoPresupuestado); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">*	Cantidad de horas Planificada: </th>
					<td><input class="form-control" type="text" name="txtCantHorasPlanificadas" placeholder="Ingresar datos" value="<?php echo set_value('txtCantHorasPlanificadas', @$capacitacionSocio[0]->HorasPlanificadas); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">*	Número de Participantes esperados: </th>
					<td><input class="form-control" type="text" name="txtNumParticipantesEsperados" placeholder="Ingresar datos" value="<?php echo set_value('txtNumParticipantesEsperados', @$capacitacionSocio[0]->ParticipantesEsperado); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">Proveedor:</th>
					<td>
						<select class="form-control" name="selectProveedor" id="proveedor" type="hidden" >
							<?php 
							foreach ($proveedores as $items) {
								if ($items->IdProveedor == @$capacitacionSocio[0]->Proveedor) { ?>
								<option selected="selected" value="<?php echo $items->IdProveedor; ?>"><?php echo $items->NombreProveedor;?></option>      
								<?php }else{ ?>
								<option value="<?php echo $items->IdProveedor; ?>"><?php echo $items->NombreProveedor;?></option>      
								<?php }							 	
							} ?>
						</select>
					</td>
				</tr>
				<tr>
					<th class="izquierda">Estado:</th>
					<td>
						<select class="form-control" name="selectEstado">
							<?php 
							foreach ($estado as $key) {
								if ($key == @$capacitacionSocio[0]->EstadoCapacitacion) { ?>
								<option selected="selected" > <?php echo $key; ?></option>											
								<?php	}else{ ?>
								<option> <?php echo $key; ?></option>
								<?php 	}
							} ?>
						</select>
					</td>
				</tr>
				<tr>
					<th class="izquierda">Fecha de Ejecución: </th>
					<td>
					<div class='input-group date' id='divMiCalendario2'>
                      <input type='text' id="txtFechaEjecucion" name="txtFechaEjecucion" class="form-control" value="<?php echo set_value('txtFechaEjecucion', @$capacitacionSocio[0]->FechaEjecucion); ?>" />
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>

					</td>
				</tr>
				<tr>
					<th class="izquierda">Número de Participantes Capacitados: </th>
					<td><input class="form-control" type="text" name="txtNumParticipantesCapacitados" placeholder="Ingresar datos" value="<?php echo set_value('txtNumParticipantesCapacitados', @$capacitacionSocio[0]->NumeroAsistentes); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">Cantidad de horas Ejecutadas: </th>
					<td><input class="form-control" type="text" name="txtCantHorasEjecutadas" placeholder="Ingresar datos" value="<?php echo set_value('txtCantHorasEjecutadas', @$capacitacionSocio[0]->HorasEjecutadas); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">Costo: </th>
					<td><input class="form-control" type="text" name="txtCosto" placeholder="Ingresar datos" value="<?php echo set_value('txtCosto', @$capacitacionSocio[0]->CostoCapacitacion); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">Empleado Responsable:</th>
					<td>
						<select name="selectEmpleado" id="empleado" type="hidden" >
							<?php 
							foreach ($empleados as $items) {
								if ($items->CedulaEmpleado == @$capacitacionSocio[0]->CiResponsable) { ?>
								<option selected="selected" value="<?php echo $items->CedulaEmpleado; ?>"><?php echo $items->ApellidoPaternoEmpleado." ".$items->ApellidoMaternoEmpleado. " ".$items->NombresEmpleado;?></option>
								<?php }else{ ?>
								<option value="<?php echo $items->CedulaEmpleado; ?>"><?php echo $items->ApellidoPaternoEmpleado." ".$items->ApellidoMaternoEmpleado. " ".$items->NombresEmpleado;?></option>
								<?php }
							} ?>
						</select>
					</td>
				</tr>
				<tr>
					<th class="izquierda">*	Periodo: </th>
					<td>
					<div class='input-group date' id='divPeriodo'>
                      <input type='text' id="txtPeriodo" name="txtPeriodo" class="form-control" value="<?php echo set_value('txtPeriodo', @$capacitacionSocio[0]->Periodo); ?>" />
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

          $('#divMiCalendario2').datetimepicker({
          format: 'YYYY-MM-DD'
      });

     $('#divPeriodo').datepicker({
          	format: "yyyy",
    		viewMode: "years", 
    		minViewMode: "years"
    });
   </script>