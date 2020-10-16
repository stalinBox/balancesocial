<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datetimepicker.min.css" >
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datepicker.css" > 

<script type="text/javascript">
	function regresar(){
		window.location="<?php echo base_url()?>empresa/datosSucursalesEmpresa";
	}
	
	function limpiar() {
		var t = document.getElementById("form1").getElementsByTagName("input");
//var t = document.getElementById("TAB").getElementsByTagName("input");
for (var i=0; i<t.length; i++) {
	if (t[i].type == "text") {		
		t[i].value = "";
	}
}
window.location="<?php echo base_url()?>empresa/nuevaSucursalEmpresa";
}
</script>
<?php 
$cumplimiento = array(
	'1' => "SI CUMPLE", 
	'2' => "NO CUMPLE"
	);
$formula = "Si mantiene un porcentaje >=90%<=110% Si cumple, caso contrario No cumple";
$infoPorcentajeParticipacion = "Captaciones del público x Oficina/∑Captaciones de todas las oficinas";
$infoOfiSignificativa = "Si porcentaje de participación >= (100/N° de sucursales) --> incluir número de miembros de consejo de dicha oficina, caso contrario cero (0)";
//"Si porcentaje de participación >= promedio de participación ­--> incluir número de miembros de consejo de dicha oficina, caso contrario  cero (0).";
$infoCumplimiento = "PC = Valor colocado oficina/Valor presupuestado oficina";
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
		<form action="<?php echo base_url()?>empresa/guardarDatosSucursalEmpresa" id="form1" method="POST">
			<table width="100%" cellspacing=8px" id="Tabla1">
				<tbody>
					<input type="hidden" name="accion" value="<?php echo $accion; ?>">
					<input type="hidden" name="id" value="<?php echo @$sucursalDatosEmpresa[0]->IdSucursal; ?>">
					<tr>
						<th class="izquierda">Sucursal:</th>
						<td>
							<select class="form-control" name="selectSucursal" id="empleado" type="hidden" >
								<?php 
								foreach ($sucursales as $items) {
									if ($items->IdSucursal == @$sucursalDatosEmpresa[0]->IdSucursal) { ?>
									<option selected="selected" value="<?php echo $items->IdSucursal; ?>"><?php echo $items->Nombre ?></option>
									<?php }else{ ?>
									<option value="<?php echo $items->IdSucursal; ?>"><?php echo $items->Nombre ?></option>
									<?php }
								} ?>
							</select>
						</td>
					</tr>					
					<tr>
						<th class="izquierda">*	Número de Empleados: </th>
						<td><input class="form-control" type="text" name="txtCantidadEmpleadosSucursal" placeholder="Ingresar datos" value="<?php echo set_value('txtCantidadEmpleadosSucursal', @$sucursalDatosEmpresa[0]->CantidadEmpleadosSucursal); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">*	Captación del Público: </th>
						<td><input class="form-control" type="text" name="txtCaptacionDelPublico" placeholder="Ingresar datos" value="<?php echo set_value('txtCaptacionDelPublico', @$sucursalDatosEmpresa[0]->CaptacionDelPublico); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">*	Porcentaje de Participación: </th>
						<td><input class="form-control" type="text" name="txtPorcentajeParticipacion" placeholder="<?php echo $infoPorcentajeParticipacion; ?>" value="<?php echo set_value('txtPorcentajeParticipacion', @$sucursalDatosEmpresa[0]->PorcentajeParticipacion); ?>" title="<?php echo $infoPorcentajeParticipacion ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">*	Miembros Consejo por oficina: </th>
						<td><input class="form-control" type="text" name="txtTotalMiembrosConsejos" placeholder="Ingresar datos" value="<?php echo set_value('txtTotalMiembrosConsejos', @$sucursalDatosEmpresa[0]->TotalMiembrosConsejos); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">*	Num. Miembros de Consejo Ofic. Signif.: </th>
						<td><input class="form-control" type="text" name="txtTotalVocalesRepresentantes" placeholder="<?php echo $infoOfiSignificativa; ?>" value="<?php echo set_value('txtTotalVocalesRepresentantes', @$sucursalDatosEmpresa[0]->TotalVocalesRepresentantes); ?>" title="<?php echo $infoOfiSignificativa; ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">*	Valor Colocado: </th>
						<td><input class="form-control" type="text" name="txtValorColocado" placeholder="Ingresar datos" value="<?php echo set_value('txtValorColocado', @$sucursalDatosEmpresa[0]->ValorColocado); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">*	Valor Presupuestado: </th>
						<td><input class="form-control" type="text" name="txtValorPresupuestado" placeholder="Ingresar datos" value="<?php echo set_value('txtValorPresupuestado', @$sucursalDatosEmpresa[0]->ValorPresupuestado); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">*	Porcentaje de Cumplimiento: </th>
						<td><input class="form-control" type="text" name="txtPorcentajeCumplimiento" placeholder="<?php echo $infoCumplimiento;?>" value="<?php echo set_value('txtPorcentajeCumplimiento', @$sucursalDatosEmpresa[0]->PorcentajeCumplimiento); ?>" title="<?php echo $infoCumplimiento;?>"></td>
					</tr>					
					<tr>
						<th class="izquierda">Cumple con Presupuesto:</th>
						<td>
							<select class="form-control" name="selectCumplePresupuesto" title="<?php echo $formula; ?>"  >	
								<?php 
								foreach ($cumplimiento as $key) {
									if ($key == @$sucursalDatosEmpresa[0]->CumplePresupuesto) { ?>
									<option selected="selected" > <?php echo $key; ?></option>						
									<?php	}else{ ?>
									<option> <?php echo $key; ?></option>
									<?php 	}
								} ?>
							</select>
						</td>
					</tr>
					<tr>
						<th class="izquierda">*	Fecha: </th>
						<td>
						<div class='input-group date' id='divMiCalendario'>
                      		<input type='text' id="txtFecha" name="txtFecha" class="form-control" value="<?php echo set_value('txtFecha', @$sucursalDatosEmpresa[0]->FechaMes); ?>" readonly/>
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
					<td></td>		
					<td><input type="submit" name="submit" class="botones" value="Guardar"></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>				
					<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
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