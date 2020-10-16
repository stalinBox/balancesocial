<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datetimepicker.min.css" >
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datepicker.css" > 

<script type="text/javascript">
	function regresar(){
		window.location="<?php echo base_url()?>empleado/capacitacionesEmpleados";
	}
	
	function limpiar() {
		var t = document.getElementById("form1").getElementsByTagName("input");
//var t = document.getElementById("TAB").getElementsByTagName("input");
for (var i=0; i<t.length; i++) {
	if (t[i].type == "text") {		
		t[i].value = "";
	}
}
window.location="<?php echo base_url()?>empleado/nuevaCapacitacionEmpleado";
}
</script>
<?php 
$tipoCapacitacionEmp = array(
	'1' => "Anticorrupción" , 
	'2' => "Atención al Cliente" , 
	'3' => "Derechos Humanos" , 
	'4' => "Educación Financiera" , 
	'5' => "Formación Cooperativa" , 
	'6' => "Políticas de No Discriminación" , 
	'7' => "Realizada por COAC" , 
	'8' => "Responsabilidad Social" , 
	'9' => "Valores, Principio y Normas de Conducta" , 
	'10' => "Otros" 
	);
$estadoP = array(
	'0' => "Planificada",
	'1' => "Ejecutada"
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
		<form action="<?php echo base_url()?>empleado/guardarCapacitacionEmpleado" id="form1" method="POST" enctype="multipart/form-data">
			<table width="100%" border="0" cellspacing=8px" id="Tabla1">
				<tbody>
					<input type="hidden" name="accion" value="<?php echo $accion; ?>">
					<input type="hidden" name="id" value="<?php echo @$capacitacionEmpleado[0]->IdCapacitacionEmp; ?>">
					<tr>
						<th class="izquierda">*	Nombre de la Capacitación: </th>
						<td><input class="form-control" type="text" name="txtNombreCapacitacion" placeholder="Ingresar datos" value="<?php echo set_value('txtNombreCapacitacion', @$capacitacionEmpleado[0]->NombreCapacitacion); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">*	Fecha Planificada: </th>
						<td>
					<div class='input-group date' id='divMiCalendario'>
                      <input type='text' id="txtFechaPlanificacion" name="txtFechaPlanificacion" class="form-control" value="<?php echo set_value('txtFechaPlanificacion', @$capacitacionEmpleado[0]->FechaPlanificada); ?>" />
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>
						</td>
					</tr>
					<tr>
						<th class="izquierda">*	Orden de Pedido: </th>
						<td><input class="form-control" type="text" name="txtOrdenPedido" placeholder="Ingresar datos" value="<?php echo set_value('txtOrdenPedido', @$capacitacionEmpleado[0]->OrdenPedido); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">Tipo de Capacitación:</th>
						<td>
							<select class="form-control" name="selectTipoCapacitacion">
								<?php 
								foreach ($tipoCapacitacionEmp as $key) {
									if ($key == @$capacitacionEmpleado[0]->TipoCapacitacion) { ?>
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
						<td><input class="form-control" type="text" name="txtPresupuesto" placeholder="Ingresar datos" value="<?php echo set_value('txtPresupuesto', @$capacitacionEmpleado[0]->Presupuesto); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">*	Cantidad de horas Planificada: </th>
						<td><input class="form-control" type="text" name="txtCantHorasPlanificadas" placeholder="Ingresar datos" value="<?php echo set_value('txtCantHorasPlanificadas', @$capacitacionEmpleado[0]->HorasPlanificadas); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">*	Número de Participantes esperados: </th>
						<td><input class="form-control" type="text" name="txtNumParticipantesEsperados" placeholder="Ingresar datos" value="<?php echo set_value('txtNumParticipantesEsperados', @$capacitacionEmpleado[0]->ParticipantesEsperados); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">Proveedor:</th>
						<td>						
							<select class="form-control" name="selectProveedor" id="proveedor" type="hidden" >
								<?php 
								foreach ($proveedores as $items) {
									if ($items->IdProveedor == @$capacitacionEmpleado[0]->IdProveedor) { ?>
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
								foreach ($estadoP as $key) {
									if ($key == @$capacitacionEmpleado[0]->EstadoCapacitacion) { ?>
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
                      <input type='text' id="txtFechaEjecucion" name="txtFechaEjecucion" class="form-control" value="<?php echo set_value('txtFechaEjecucion', @$capacitacionEmpleado[0]->FechaEjecucion); ?>" readonly/>
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>
						</td>
					</tr>
					<tr>
						<th class="izquierda">Número de Participantes Capacitados: </th>
						<td><input class="form-control" type="text" name="txtNumParticipantesCapacitados" placeholder="Ingresar datos" value="<?php echo set_value('txtNumParticipantesCapacitados', @$capacitacionEmpleado[0]->ParticipantesCapacitados); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">Cantidad de horas Ejecutadas: </th>
						<td><input class="form-control" type="text" name="txtCantHorasEjecutadas" placeholder="Ingresar datos" value="<?php echo set_value('txtCantHorasEjecutadas', @$capacitacionEmpleado[0]->HorasEjecutadas); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">Área Impartida: </th>
						<td><input class="form-control" type="text" name="txtAreaImpartida" placeholder="Ingresar datos" value="<?php echo set_value('txtAreaImpartida', @$capacitacionEmpleado[0]->AreaImpartida); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">Costo: </th>
						<td><input class="form-control" type="text" name="txtCosto" placeholder="Ingresar datos" value="<?php echo set_value('txtCosto', @$capacitacionEmpleado[0]->Costo); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">Empleado Responsable:</th>
						<td>						
							<select class="form-control" name="selectEmpleado" id="empleado" type="hidden" >
								<?php 
								foreach ($empleados as $items) {
									if ($items->CedulaEmpleado == @$capacitacionEmpleado[0]->EmpleadoResponsable) { ?>
									<option selected="selected" value="<?php echo $items->CedulaEmpleado; ?>"><?php echo $items->ApellidoPaternoEmpleado." ".$items->ApellidoMaternoEmpleado. " ".$items->NombresEmpleado;?></option>
									<?php }else{ ?>
									<option value="<?php echo $items->CedulaEmpleado; ?>"><?php echo $items->ApellidoPaternoEmpleado." ".$items->ApellidoMaternoEmpleado. " ".$items->NombresEmpleado;?></option>
									<?php }
								} ?>
							</select>
						</td>
					</tr>
					<tr>
					<th class="izquierda">Imagen</th>
					<td>
						<img src="data:image/jpg;base64, <?php echo base64_encode(@$capacitacionEmpleado[0]->Imagen) ?>" width="100" height="100" >
					</td>
				</tr>
				<tr>
					<th class="izquierda">Seleccionar Imagen: </th>
					<td>
						<input type="file" name="inputFoto">
					</td>
				</tr>
					<tr>
						<th class="izquierda">*	Periodo: </th>
						<td>					
					<div class='input-group date' id='divPeriodo'>
                      <input type='text' id="txtPeriodo" name="txtPeriodo" class="form-control" value="<?php echo set_value('txtPeriodo', @$capacitacionEmpleado[0]->Periodo); ?>" readonly/>
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