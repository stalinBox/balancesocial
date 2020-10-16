<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datetimepicker.min.css" >
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datepicker.css" > 

<script type="text/javascript">
	function regresar(){
		window.location="<?php echo base_url()?>consejo/capacitacionConsejos";
	}
	
	function limpiar() {
		var t = document.getElementById("form1").getElementsByTagName("input");
//var t = document.getElementById("TAB").getElementsByTagName("input");
for (var i=0; i<t.length; i++) {
	if (t[i].type == "text") {		
		t[i].value = "";
	}
}
window.location="<?php echo base_url()?>consejo/nuevaCapacitacionConsejos";
}
</script>
<h3 class="page-header" align="center"><span class="glyphicon glyphicon-th-list"></span> <?php echo $titulo; ?></h3>
<?php 
$tipoCapacitacionP = array(
	'0' => "Anticorrupción", 
	'1' => "Educación Financiera", 
	'2' => "Responsabilidad Social", 
	'3' => "Políticas de No Discriminación"			
	);
$estadoP = array(
	'0' => "Ejecutada",
	'1' => "Planificada"
	);
	?>
	<div id="TAB">
		<div class="error"> 
			<center>
				<?php  messages_flash('danger',validation_errors(),'Errores del formulario', true); ?>
			</center>
		</div>
		<div class="container">
	<dl>Los campos con * son obligatorios</dl>
</div>
		<form action="<?php echo base_url()?>consejo/guardarCapacitacionConsejos" id="form1" method="POST">
			<table width="100%" border="0" cellspacing=8px" id="Tabla1">
				<tbody>
					<input type="hidden" name="accion" value="<?php echo $accion; ?>">
					<input type="hidden" name="id" value="<?php echo @$capacitacionConsejo[0]->IdCapacitacionCons; ?>">
					<tr>
						<th class="izquierda">Consejo Capacitado:</th>
						<td>
							<select class="form-control" name="selectConsejos" id="proveedor" type="hidden" >
								<?php foreach ($consejos as $items ) {								
									if ($items->IdConsejos == $index) { ?>
									<option selected="selected" value="<?php echo $items->IdConsejos; ?>"><?php echo $items->NombreConsejos; ?></option>
									<?php	}else{ ?>
									<option value="<?php echo $items->IdConsejos; ?>"><?php echo $items->NombreConsejos; ?></option>
									<?php }
								} ?>
							</select>
						</td>
					</tr>	
					<tr>
						<th class="izquierda">*	Nombre de la Capacitación: </th>
						<td><input class="form-control" type="text" name="txtNombreCapacitacion" placeholder="Ingresar datos" value="<?php echo set_value('txtNombreCapacitacion',@$capacitacionConsejo[0]->NombreCapacitacion); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">*	Fecha Planificada: </th>
						<td>
					<div class='input-group date' id='divMiCalendario'>
                      <input type='text' id="txtFechaPlanificacion" name="txtFechaPlanificacion" class="form-control" value="<?php echo set_value('txtFechaPlanificacion',@$capacitacionConsejo[0]->FechaPlanificada); ?>" />
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
								foreach ($tipoCapacitacionP as $key) { 
									if ($key == @$capacitacionConsejo[0]->TipoCapacitacion) { ?>
									<option selected="selected" > <?php echo $key; ?></option>											
									<?php }else{ ?>
									<option> <?php echo $key; ?></option>
									<?php }
								} ?>
							</select>
						</td>
					</tr>				
					<tr>
						<th class="izquierda">*	Presupuesto: </th>
						<td><input class="form-control" type="text" name="txtPresupuesto" placeholder="Ingresar datos" value="<?php echo set_value('txtPresupuesto',@$capacitacionConsejo[0]->Presupuesto); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">*	Cantidad de horas Planificadas: </th>
						<td><input class="form-control" type="text" name="txtCantHorasPlanificadas" placeholder="Ingresar datos" value="<?php echo set_value('txtCantHorasPlanificadas',@$capacitacionConsejo[0]->HorasPlanificadas); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">*	Número de Participantes esperados según POA: </th>
						<td><input class="form-control" type="text" name="txtNumParticipantesEsperados" placeholder="Ingresar datos" value="<?php echo set_value('txtNumParticipantesEsperados',@$capacitacionConsejo[0]->ParticipantesEsperadosPOA); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">Estado:</th>
						<td>
							<select class="form-control" name="selectEstado">
								<?php 
								foreach ($estadoP as $key) {
									if ($key == @$capacitacionConsejo[0]->EstadoCapacitacion) { ?>
									<option selected="selected" > <?php echo $key; ?></option>											
									<?php	}else{ ?>
									<option> <?php echo $key; ?></option>
									<?php 	}
								} ?>
							</select>
						</td>
					</tr>
					<tr>
						<th class="izquierda">Proveedor:</th>
						<td>
							<select class="form-control" name="selectProveedor" id="proveedor" type="hidden" >
								<?php 
								foreach ($proveedores as $items) {
									if ($items->IdProveedor == @$capacitacionConsejo[0]->IdProveedor) { ?>
									<option selected="selected" value="<?php echo $items->IdProveedor; ?>"><?php echo $items->NombreProveedor;?></option>      
									<?php }else{ ?>
									<option value="<?php echo $items->IdProveedor; ?>"><?php echo $items->NombreProveedor;?></option>      
									<?php }							 	
								} ?>
							</select>
						</td>
					</tr>
					<tr>
						<th class="izquierda">Fecha de Ejecución: </th>
						<td>					
					<div class='input-group date' id='divMiCalendario2'>
                      <input type='text' id="txtFechaEjecucion" name="txtFechaEjecucion" class="form-control" value="<?php echo set_value('txtFechaEjecucion',@$capacitacionConsejo[0]->FechaEjecucion); ?>" />
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>

						</td>
					</tr>
					<tr>
						<th class="izquierda">Número de Participantes Capacitados: </th>
						<td><input class="form-control" type="text" name="txtNumParticipantesCapacitados" placeholder="Ingresar datos" value="<?php echo set_value('txtNumParticipantesCapacitados',@$capacitacionConsejo[0]->ParticipantesCapacitados); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">Cantidad de horas Ejecutadas: </th>
						<td><input class="form-control" type="text" name="txtCantHorasEjecutadas" placeholder="Ingresar datos" value="<?php echo set_value('txtCantHorasEjecutadas',@$capacitacionConsejo[0]->HorasEjecutadas); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">Costo: </th>
						<td><input class="form-control" type="text" name="txtCosto" placeholder="Ingresar datos" value="<?php echo set_value('txtCosto',@$capacitacionConsejo[0]->Costo); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">Empleado Responsable:</th>
						<td>
							<select class="form-control" name="selectEmpleado" id="empleado" type="hidden" >
								<?php
								foreach ($empleado as $items) {
									if ($items->CedulaEmpleado == @$capacitacionConsejo[0]->EmpleadoResponsable) { ?>
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
                      <input type='text' id="txtPeriodo" name="txtPeriodo" class="form-control" value="<?php echo set_value('txtPeriodo',@$capacitacionConsejo[0]->Periodo); ?>" />
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
					<td><input type="submit" name="submit" class="botones" value="Guardar"></td>
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