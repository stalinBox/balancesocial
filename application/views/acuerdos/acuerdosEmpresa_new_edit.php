<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datetimepicker.min.css" >
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datepicker.css" > 

  <script src="<?php echo base_url()?>js/jquery.min.js"></script>
  <script src="<?php echo base_url()?>js/jquery-1.11.3.min.js"></script>
  <script src="<?php echo base_url()?>js/bootstrap.min.js"></script>


<script type="text/javascript">
	function regresar(){
		window.location="<?php echo base_url()?>acuerdo/acuerdos";
	}
	
	function limpiar() {
		var t = document.getElementById("form1").getElementsByTagName("input");
//var t = document.getElementById("TAB").getElementsByTagName("input");
for (var i=0; i<t.length; i++) {
	if (t[i].type == "text") {		
		t[i].value = "";
	}
}
window.location="<?php echo base_url()?>acuerdo/nuevoAcuerdo";
}
</script>
<?php 
$obtencion = array('1' => "NO", '2' => "SI");
$tipoOrganizacion = array(
						'1' => "Otros",
						'2' => "COAC",
						'3' => "Sociedad Civil",
						'4' => "Organizaciones Gubernamentales",
						'5' => "Organismos de Integración Sectorial"
						);
$estado = array(
	'0' => "Ejecutada",
	'1' => "Planificada"
	);
 ?>

<h3 class="page-header" align="center"><span class="glyphicon glyphicon-th-list"></span> <?php echo $titulo; ?></h3>
<div id="TAB">
	<div class="error"> 
		<center>
			<?php 
				messages_flash('danger',validation_errors(),'Errores del formulario', true);
			?>
		</center>
	</div>

	<div class="container">
	<dl>Los campos con * son obligatorios</dl>
</div>
	<form action="<?php echo base_url()?>acuerdo/guardarAcuerdo" id="form1" method="POST" enctype="multipart/form-data">
		<table width="100%" border="0" cellspacing=8px" id="Tabla1">
			<tbody>		  
				<input type="hidden" name="accion" value="<?php echo $accion; ?>">
				<input type="hidden" name="id" value="<?php echo @$acuerdoEmpresa[0]->IdAcuerdos; ?>">
				<tr>
					<th class="izquierda">*	Organización: </th>
					<td>
						<input class="form-control" type="text" name="txtOrganizacion"  placeholder="Ingresar datos" value="<?php echo set_value('txtOrganizacion',@$acuerdoEmpresa[0]->OrganizacionConvenio); ?>">
					</td>
				</tr>
				<tr>
					<th class="izquierda">Tipo de Organización:</th>
					<td>
						<select class="form-control" name="selectTipoOrganizacion">						
						<?php 
							foreach ($tipoOrganizacion as $key) {
							 	if ($key == @$acuerdoEmpresa[0]->TipoOrganizacion) { ?>
							 		<option selected="selected" > <?php echo $key; ?></option>											
							 <?php	}else{ ?>
									<option> <?php echo $key; ?></option>
							 <?php 	}
							 } ?>						
						</select>
					</td>
				</tr>
				<tr>
					<th class="izquierda">*	Nombre del Acuerdo: </th>
					<td><input class="form-control" type="text" name="txtNombre"  placeholder="Ingresar datos" value="<?php echo set_value('txtNombre',@$acuerdoEmpresa[0]->NombreAcuerdo); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">*	Fecha de Planificación: </th>
					<td>
					<div class='input-group date' id='divMiCalendario'>
                      <input type='text' id="txtFechaPlanificada" name="txtFechaPlanificada" class="form-control" value="<?php echo set_value('txtFechaPlanificada',@$acuerdoEmpresa[0]->FechaPlanificacion) ?>" />
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>

					</td>
				</tr>
				<tr>
					<th class="izquierda">*	Costo Planificado: </th>
					<td><input class="form-control" type="text" name="txtCostoPlanificado"  placeholder="Ingresar datos" value="<?php echo set_value('txtCostoPlanificado',@$acuerdoEmpresa[0]->CostoPlanificado); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">Estado:</th>
					<td>
						<select class="form-control" name="selectEstado">
							<?php 
								foreach ($estado as $key) {
									if ($key == @$acuerdoEmpresa[0]->Estado) { ?>
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
                      <input type='text' id="txtFechaEjecucion" name="txtFechaEjecucion" class="form-control" value="<?php echo set_value('txtFechaEjecucion',@$acuerdoEmpresa[0]->FechaEjecucion) ?>" />
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>

					</td>
				</tr>
				<tr>
					<th class="izquierda">Fecha de Finalización: </th>
					<td>
					<div class='input-group date' id='divMiCalendario3'>
                      <input type='text' id="txtFechaFinalizacion" name="txtFechaFinalizacion" class="form-control" value="<?php echo set_value('txtFechaFinalizacion',@$acuerdoEmpresa[0]->FechaFinalizacion) ?>" />
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>
					</td>
				</tr>
				<tr>
					<th class="izquierda">Costo de Ejecución: </th>
					<td><input class="form-control" type="text" name="txtCostoEjecucion"  placeholder="Ingresar datos" value="<?php echo set_value('txtCostoEjecucion',@$acuerdoEmpresa[0]->CostoEjecutado); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">Beneficiarios: </th>
					<td><input class="form-control" type="text" name="txtBeneficiarios"  placeholder="Ingresar datos" value="<?php echo set_value('txtBeneficiarios',@$acuerdoEmpresa[0]->Beneficiarios); ?>"></td>
				</tr>
				<tr>
			        <th class="izquierda">Fotografía</th>
			        <td>
			          <img src="data:image/jpg;base64, <?php echo base64_encode(@$acuerdoEmpresa[0]->Fotografia) ?>" width="100" height="100" >
			        </td>
			      </tr>
			    <tr>
			        <th class="izquierda">Seleccionar Imagen: </th>
			        <td>
			          <input type="file" name="inputImagen" >
			        </td>
			    </tr>
				<tr>
					<th class="izquierda">Empleado Responsable:</th>
					<td>
						<select class="form-control" name="selectEmpleado" id="empleado" type="hidden" >
							<?php 
							foreach ($empleados as $items) {
								if ($items->CedulaEmpleado == @$acuerdoEmpresa[0]->CIResponsable) { ?>
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
                      <input type='text' id="txtPeriodo" name="txtPeriodo" class="form-control" value="<?php echo set_value('txtPeriodo', @$detalleInforme[0]->Periodo); ?>" readonly/>
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