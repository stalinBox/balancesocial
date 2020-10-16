<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datetimepicker.min.css" >
<script type="text/javascript">
	function regresar(){
		window.location="<?php echo base_url()?>empleado/empleados";
	}
	
	function limpiar() {
		var t = document.getElementById("form1").getElementsByTagName("input");
//var t = document.getElementById("TAB").getElementsByTagName("input");
for (var i=0; i<t.length; i++) {
	if (t[i].type == "text") {		
		t[i].value = "";
	}
}
window.location="<?php echo base_url()?>empleado/nuevoEmpleado";
}
</script>
<?php 
$sexo = array('1' => "M", '2' => "F");
$eCivil = array(
	'1' => "Soltero",
	'2' => "Unión libre",
	'3' => "Casado",
	'4' => "Divorciado",
	'5' => "Viudo"
	);
$region = array(
	'1' => "Costa",
	'2' => "Sierra",
	'3' => "Oriente",
	'4' => "Insular"
	);
$cargo = array(
	'1' => "Operativo",
	'2' => "Directivo",
	'3' => "Gerencial"
	);
$intruccion = array(
	'1' => "Básica",
	'2' => "Bachillerato",
	'3' => "Superior",
	'4' => "Postgrado"
	);
$eLaboral = array(
	'1' => "Activo",
	'2' => "Despedido",
	'3' => "Jubilado",
	'4' => "Contrato Concluido",
	'5' => "Renuncia",
	'6' => "Reincorporado"
	);
$nacionalidad = array('1' => "Nacional", '2' => "Extranjero");
$afiliadoIESS = array('1' => "SI", '2' => "NO");
$discapacitado = array('1' => "NO", '2' => "SI");
$tiposContrato = array('1' => "Tácito ",
					   '2' => "Indefinido ",
					   '3' => "Por temporada ",
					   '4' => "Eventual ",
					   '5' => "Ocasional ",
					   '6' => "Por tarea",
					   '7' => "A prueba",
					   '8' => "A destajo",
					   '9' => "Por obra cierta",
					   '10' => "Ortos"				   
					   );
$tipoDiscapacidad = array('0' => "Ninguna",
						 '1' => "Auditiva",
						 '2' => "Física",
						 '3' => "Intelectual",
						 '4' => "lenguaje",
						 '5' => "Psicologico",
						 '6' => "Visual",
						 '7' => "Otros"
						 );

$condicion = array('1' => "Ninguna",
				 '2' => "Moderada(30%-39%)",
				 '3' => "Grave(40%-74%)",
				 '4' => "Muy Grave (75%-100%)"
				 );
$etnia = array('1' => "Afro Ecuatoriano",
			   '2' => "Blanco",
			   '3' => "Indigena",
			   '4' => "Mestiza",
			   '5' => "Otro"
			   );

?>
<h3 class="page-header" align="center"><span class="glyphicon glyphicon-th-list"></span> <?php echo $titulo; ?></h3>
<div id="TAB">
	<div class="error"> 
		<center>
			<?php messages_flash('danger',validation_errors(),'Errores del formulario', true);?>
		</center>
	</div>
	<form action="<?php echo base_url()?>empleado/guardarEmpleado" id="form1" method="POST">
		<table width="100%" cellspacing=8px" id="Tabla1">
			<tbody>
				<input type="hidden" name="accion" value="<?php echo $accion; ?>">
				<input type="hidden" name="id" value="<?php echo @$empleado[0]->CedulaEmpleado; ?>">
				<tr>
					<th class="izquierda">*	Cédula: </th>
					<td><input class="form-control" type="text" name="txtCedula" placeholder="Ingresar datos" value="<?php echo set_value('txtCedula', @$empleado[0]->CedulaEmpleado); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">*	Nombres: </th>
					<td>
						<input class="form-control" type="text" name="txtNombres" placeholder="Ingresar datos" value="<?php echo set_value('txtNombres', @$empleado[0]->NombresEmpleado); ?>">
					</td>
				</tr>
				<tr>
					<th class="izquierda">*	Apellido Paterno: </th>
					<td><input class="form-control" type="text" name="txtApellidoPaterno" placeholder="Ingresar datos" value="<?php echo set_value('txtApellidoPaterno', @$empleado[0]->ApellidoPaternoEmpleado); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">Apellido Materno: </th>
					<td><input class="form-control" type="text" name="txtApellidoMaterno" placeholder="Ingresar datos" value="<?php echo set_value('txtApellidoMaterno', @$empleado[0]->ApellidoMaternoEmpleado); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">*	Fecha de Nacimiento: </th>
					<td>
					<div class='input-group date' id='divMiCalendario'>
                      <input type='text' id="txtFechaNacimiento" name="txtFechaNacimiento" class="form-control" value="<?php echo set_value('txtFechaNacimiento', @$empleado[0]->FNacimientoEmpleado); ?>" readonly/>
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>
					</td>
				</tr>
				<tr>
					<th class="izquierda">Sexo:</th>
					<td>
						<select class="form-control" name="selectSexo">
							<?php 
							foreach ($sexo as $key) {
								if ($key == @$empleado[0]->SexoEmpleado) { ?>
								<option selected="selected" > <?php echo $key; ?></option>											
								<?php	}else{ ?>
								<option> <?php echo $key; ?></option>
								<?php 	}
							} ?>
						</select>
					</td>
				</tr>
				<tr>
					<th class="izquierda">Etnia: </th>
					<td>
					<!-- <input class="form-control" type="text" name="txtEtnia"  placeholder="Ingresar datos" value="<?php echo set_value('txtEtnia', @$empleado[0]->EtniaEmpleado); ?>"> -->
					<select class="form-control" name="selectEtnia">
							<?php 
							foreach ($etnia as $key) {
								if ($key == @$empleado[0]->EtniaEmpleado) { ?>
								<option selected="selected" > <?php echo $key; ?></option>											
								<?php	}else{ ?>
								<option> <?php echo $key; ?></option>
								<?php 	}
							} ?>
						</select>
					</td>
				</tr>
				<tr>
					<th class="izquierda">Estado Civil:</th>
					<td>
						<select class="form-control" name="selectEstadoCivil">
							<?php 
							foreach ($eCivil as $key) {
								if ($key == @$empleado[0]->EstadoCivil) { ?>
								<option selected="selected" > <?php echo $key; ?></option>											
								<?php	}else{ ?>
								<option> <?php echo $key; ?></option>
								<?php 	}
							} ?>
						</select>
					</td>
				</tr>
				<tr>
					<th class="izquierda">Nacionalidad:</th>
					<td>
						<select class="form-control" name="selectNacionalidad">
							<?php 
							foreach ($nacionalidad as $key) {
								if ($key == @$empleado[0]->Nacionalidad) { ?>
								<option selected="selected" > <?php echo $key; ?></option>											
								<?php	}else{ ?>
								<option> <?php echo $key; ?></option>
								<?php 	}
							} ?>
						</select>
					</td>
				</tr>
				<tr>
					<th class="izquierda">Región:</th>
					<td>
						<select class="form-control" name="selectRegion">
							<?php 
							foreach ($region as $key) {
								if ($key == @$empleado[0]->RegionEmpleado) { ?>
								<option selected="selected" > <?php echo $key; ?></option>											
								<?php	}else{ ?>
								<option> <?php echo $key; ?></option>
								<?php 	}
							} ?>
						</select>
					</td>
				</tr>				
				<tr>
					<th class="izquierda">*	Fecha de Ingreso: </th>
					<td>
					<div class='input-group date' id='divMiCalendario1'>
                      <input type='text' id="txtFechaIngreso" name="txtFechaIngreso" class="form-control" value="<?php echo set_value('txtFechaIngreso', @$empleado[0]->FIngresoContratoEmpleado); ?>" readonly/>
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>

					</td>
				</tr>
				<tr>
					<th class="izquierda">Fecha de Salida: </th>
					<td>
						<div class='input-group date' id='divMiCalendario2'>
                      	<input type='text' id="txtFechaSalida" name="txtFechaSalida" class="form-control" value="<?php echo set_value('txtFechaSalida', @$empleado[0]->FSalidaEmpleado); ?>" />
                      	<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      	</span>
                    	</div>

					</td>
				</tr>
				<tr>
					<th class="izquierda">Fecha Reincorporación: </th>
					<td>
						<div class='input-group date' id='divMiCalendario3'>
                      		<input type='text' id="txtFechaReincorporacion" name="txtFechaReincorporacion" class="form-control" value="<?php echo set_value('txtFechaReincorporacion', @$empleado[0]->FReincorporacion); ?>" readonly/>
                      		<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      		</span>
                    	</div>
					</td>
				</tr>
				<tr>
					<th class="izquierda">Fecha salida de Reincorporación: </th>
					<td>
						<div class='input-group date' id='divMiCalendario4'>
                      		<input type='text' id="txtFechaSalidaReincorporacion" name="txtFechaSalidaReincorporacion" class="form-control" value="<?php echo set_value('txtFechaSalidaReincorporacion', @$empleado[0]->FFinReincorporacion); ?>" readonly/>
                      		<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      		</span>
                    	</div>
					</td>
				</tr>
				<tr>
					<th class="izquierda">*	Salario:</th>
					<td><input class="form-control" type="text" name="txtSalario" placeholder="Ingresar datos" value="<?php echo set_value('txtSalario', @$empleado[0]->SalarioEmpleado); ?>"></td>
				</tr>
				
				<tr>
					<th class="izquierda">Tipo de Contrato:</th>
					<td>
						<select class="form-control" name="selectTipoContrato">
							<?php 
							foreach ($tiposContrato as $key) {
								if ($key == @$empleado[0]->TipoContrato) { ?>
								<option selected="selected" > <?php echo $key; ?></option>											
								<?php	}else{ ?>
								<option> <?php echo $key; ?></option>
								<?php 	}
							} ?>							
						</select>
					</td>
				</tr>



				<tr>
					<th class="izquierda">Cargo Estructural:</th>
					<td>
						<select class="form-control" name="selectCargoEstructural">
							<?php 
							foreach ($cargo as $key) {
								if ($key == @$empleado[0]->CargoEstructural) { ?>
								<option selected="selected" > <?php echo $key; ?></option>											
								<?php	}else{ ?>
								<option> <?php echo $key; ?></option>
								<?php 	}
							} ?>
						</select>
					</td>
				</tr>
				<tr>
					<th class="izquierda">Número de Cláusulas del Contrato:</th>
					<td><input class="form-control" type="text" name="txtNumClausulasContrato"  placeholder="Ingresar datos" value="<?php echo set_value('txtNumClausulasContrato', @$empleado[0]->NumClausulasContrato); ?>"></td>
				</tr>						
				<tr>
					<th class="izquierda">Afiliado al IESS:</th>
					<td>
						<select class="form-control" name="selectAfiliadoIESS">
							<?php 
							foreach ($afiliadoIESS as $key) {
								if ($key == @$empleado[0]->AfiliadoIESSEmpleado) { ?>
								<option selected="selected" > <?php echo $key; ?></option>											
								<?php	}else{ ?>
								<option> <?php echo $key; ?></option>
								<?php 	}
							} ?>
						</select>
					</td>
				</tr>
				<tr>
					<th class="izquierda">Discapacidad:</th>
					<td>
						<select class="form-control" name="selectDiscapacidad">
							<?php 
							foreach ($discapacitado as $key) {
								if ($key == @$empleado[0]->DiscapacidadEmpleado) { ?>
								<option selected="selected" > <?php echo $key; ?></option>											
								<?php	}else{ ?>
								<option> <?php echo $key; ?></option>
								<?php 	}
							} ?>	
						</select>
					</td>
				</tr>
				<tr>
					<th class="izquierda">Tipo de Discapacidad:</th>
					<td>
						<select class="form-control" name="selectTipoDiscapacidad">
							<?php 
							foreach ($tipoDiscapacidad as $key) {
								if ($key == @$empleado[0]->TipoDiscapacidadEmpleado) { ?>
								<option selected="selected" > <?php echo $key; ?></option>											
								<?php	}else{ ?>
								<option> <?php echo $key; ?></option>
								<?php 	}
							} ?>							
						</select>
					</td>
				</tr>
				
				<tr>
					<th class="izquierda">Porcentaje de Discapacidad:</th>
					<td><input class="form-control" type="text" name="txtPorentajeDiscapacidad"  placeholder="Ingresar datos" value="<?php echo set_value('txtPorentajeDiscapacidad', @$empleado[0]->PorcentajeDiscapacidadEmpleado); ?>"></td>
				</tr>			
				<tr>
					<th class="izquierda">Condición de Discapacidad:</th>
					<td>
						<select class="form-control" name="selectCondicionDiscapacidad">
							<?php 
							foreach ($condicion as $key) {
								if ($key == @$empleado[0]->CondicionDiscapacidadEmpleado) { ?>
								<option selected="selected" > <?php echo $key; ?></option>											
								<?php	}else{ ?>
								<option> <?php echo $key; ?></option>
								<?php 	}
							} ?>							
						</select>
					</td>
				</tr>

				<tr>
					<th class="izquierda">Instrucción:</th>
					<td>
						<select class="form-control" name="selectIntruccion">
							<?php 
							foreach ($intruccion as $key) {
								if ($key == @$empleado[0]->InstruccionEmpleado) { ?>
								<option selected="selected" > <?php echo $key; ?></option>											
								<?php	}else{ ?>
								<option> <?php echo $key; ?></option>
								<?php 	}
							} ?>							
						</select>
					</td>
				</tr>
				<tr>
					<th class="izquierda">Estado Laboral:</th>
					<td>
						<select class="form-control" name="selectEstadoLaboral">
							<?php 
							foreach ($eLaboral as $key) {
								if ($key == @$empleado[0]->EstadoLaboralEmpleado) { ?>
								<option selected="selected" > <?php echo $key; ?></option>											
								<?php	}else{ ?>
								<option> <?php echo $key; ?></option>
								<?php 	}
							} ?>
						</select>
					</td>
				</tr>
				<tr>
					<th class="izquierda">Revisor de Currículum:</th>
					<td>
					<input class="form-control" type="text" name="txtRevisorCVEmpleado"  placeholder="Ingresar datos" value="<?php echo set_value('txtRevisorCVEmpleado', @$empleado[0]->RevisorCVEmpleado); ?>">
					<!--	<select class="form-control" name="selectRevisorCurriculum">
							<?php 
							foreach ($empleados as $items) {
								if ($items->CedulaEmpleado == @$empleado[0]->RevisorCVEmpleado) { ?>
								<option selected="selected" value="<?php echo $items->CedulaEmpleado; ?>"><?php echo $items->ApellidoPaternoEmpleado." ".$items->ApellidoMaternoEmpleado. " ".$items->NombresEmpleado;?></option>
								<?php }else{ ?>
								<option value="<?php echo $items->CedulaEmpleado; ?>"><?php echo $items->ApellidoPaternoEmpleado." ".$items->ApellidoMaternoEmpleado. " ".$items->NombresEmpleado;?></option>
								<?php }
							} ?>
						</select> -->
					</td>
				</tr>
				<tr>
					<th class="izquierda">Pertenece a un Sindicato:</th>
					<td>
						<select class="form-control" name="selectPerteneceSindicato">
								<option value="0">Ninguno</option>
							<?php foreach ($sindicatos as $items ) {
								if ($items->IdSindicato == @$empleado[0]->PerteneceSindicato) { ?>
								<option selected="selected" value="<?php echo $items->IdSindicato; ?>"><?php echo $items->NombreSindicato; ?></option>
								<?php	}else{ ?>
								<option value="<?php echo $items->IdSindicato; ?>"><?php echo $items->NombreSindicato; ?></option>
								<?php }
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
				<td></td>		
				<td><input type="button" onclick="regresar()" name="" class="botones" value="Regresar"></td>
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

   <script type="text/javascript">
     $('#divMiCalendario').datetimepicker({
          format: 'YYYY-MM-DD',
          startDate: '1950-01-01'
      });

     $('#divMiCalendario1').datetimepicker({
          format: 'YYYY-MM-DD'
      });
     $('#divMiCalendario2').datetimepicker({
          format: 'YYYY-MM-DD'
      });
     $('#divMiCalendario3').datetimepicker({
          format: 'YYYY-MM-DD'
      });
     $('#divMiCalendario4').datetimepicker({
          format: 'YYYY-MM-DD'
      });
   </script>