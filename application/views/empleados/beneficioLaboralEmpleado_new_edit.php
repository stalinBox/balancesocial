<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datetimepicker.min.css" >
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datepicker.css" > 

<script type="text/javascript">
	function regresar(){
		window.location="<?php echo base_url()?>empleado/beneficiosLaborales";
	}
	
	function limpiar() {
		var t = document.getElementById("form1").getElementsByTagName("input");
//var t = document.getElementById("TAB").getElementsByTagName("input");
for (var i=0; i<t.length; i++) {
	if (t[i].type == "text") {		
		t[i].value = "";
	}
}
window.location="<?php echo base_url()?>empleado/nuevoBeneficioLaboral";
}
</script>
<?php 
$beneficio = array(
	'1' => "Nutrición", 
	'2' =>  "Servicio de Transporte", 
	'3' => "Otros"
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
		<form action="<?php echo base_url()?>empleado/guardarBeneficioLaboral" id="form1" method="POST">
			<table width="100%" cellspacing=8px" id="Tabla1">
				<tbody>		  
					<input type="hidden" name="accion" value="<?php echo $accion; ?>">
					<input type="hidden" name="id" value="<?php echo @$beneficioLaboral[0]->IdBeneficio; ?>">
					<tr>
						<th class="izquierda">Tipo de Beneficio Laboral:</th>
						<td>
							<select class="form-control" name="selectEstado">
								<?php 
								foreach ($beneficio as $key) {
									if ($key == @$beneficioLaboral[0]->TipoBeneficioLaboral) { ?>
									<option selected="selected" > <?php echo $key; ?></option>											
									<?php	}else{ ?>
									<option> <?php echo $key; ?></option>
									<?php 	}
								} ?>
							</select>
						</td>
					</tr>
					<tr>
						<th class="izquierda">*	Número de Empleados con el Beneficio: </th>
						<td>
							<input class="form-control" type="text" name="txtNumEmpleadosBeneficio"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumEmpleadosBeneficio', @$beneficioLaboral[0]->NumEmpleadosConServicio); ?>">
						</td>
					</tr>
					<tr>
						<th class="izquierda">*	Costo que cubre la Empresa: </th>
						<td>
							<input class="form-control" type="text" name="txtCostoCubreEmpresa"  placeholder="Ingresar datos" value="<?php echo set_value('txtCostoCubreEmpresa', @$beneficioLaboral[0]->CostoTotalQueCubreEmpresa); ?>">
						</td>
					</tr>
					<tr>
						<th class="izquierda">*	Número de Días que cubre el Beneficio: </th>
						<td><input class="form-control" type="text" name="txtNumDiasBeneficio"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumDiasBeneficio', @$beneficioLaboral[0]->NumDiasOtorgadoElBeneficio); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">Observaciones: </th>
						<td><input class="form-control" type="text" name="txtObservacion"  placeholder="Ingresar datos" value="<?php echo set_value('txtObservacion', @$beneficioLaboral[0]->Observacion) ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">*	Fecha del Mes que pertenece: </th>
						<td>
							<div class='input-group date' id='divMiCalendario'>
                      			<input type='text' id="txtFechaMesPertenece" name="txtFechaMesPertenece" class="form-control" value="<?php echo set_value('txtFechaMesPertenece', @$beneficioLaboral[0]->FechaMes) ?>" readonly/>
                      			<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      			</span>
                    		</div>
					</tr>
					<tr>
						<th class="izquierda">*	Periodo: </th>
						<td>
					<div class='input-group date' id='divPeriodo'>
                      <input type='text' id="txtPeriodo" name="txtPeriodo" class="form-control" value="<?php echo set_value('txtPeriodo', @$beneficioLaboral[0]->Periodo) ?>" readonly/>
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
		<center>
			<div style="font-size: 16px; color: #FE2E2E;"> 
				<?php 
				echo isset($error) ? utf8_decode($error) : '';
				?>            
			</div>
		</center>
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