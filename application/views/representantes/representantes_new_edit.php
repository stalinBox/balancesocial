<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datetimepicker.min.css" >
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datepicker.css" > 

<script type="text/javascript">
	function regresar(){
		window.location="<?php echo base_url()?>representante/representantes";
	}

	function limpiar() {
		var t = document.getElementById("form1").getElementsByTagName("input");
//var t = document.getElementById("TAB").getElementsByTagName("input");
for (var i=0; i<t.length; i++) {
	if (t[i].type == "text") {    
		t[i].value = "";
	}
}
window.location="<?php echo base_url()?>representante/nuevoRepresentante";
}
</script>
<?php 
$sexo = array('1' => "M", '2' => "F");
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

	<form action="<?php echo base_url()?>representante/guardarRepresentante" id="form1" method="POST">
		<table width="100%" cellspacing=8px" id="Tabla1">
			<tbody>
				<input type="hidden" name="accion" value="<?php echo $accion; ?>">
				<input type="hidden" name="id" value="<?php echo @$representante[0]->IdRepresentante; ?>">				
				<tr>
					<th class="izquierda">*	Cédula: </th>
					<td><input class="form-control" type="text" name="txtCedula" placeholder="Ingresar datos" value="<?php echo set_value('txtCedula', @$representante[0]->CedulaRepresentante); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">*	Nombres: </th>
					<td>
						<input class="form-control" type="text" name="txtNombres" placeholder="Ingresar datos" value="<?php echo set_value('txtNombres', @$representante[0]->NombresRepresentante); ?>">
					</td>
				</tr>
				<tr>
					<th class="izquierda">*	Apellido Paterno: </th>
					<td><input class="form-control" type="text" name="txtApellidoPaterno" placeholder="Ingresar datos" value="<?php echo set_value('txtApellidoPaterno', @$representante[0]->ApellidoPaternoRepresentante); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">*	Apellido Materno: </th>
					<td><input class="form-control" type="text" name="txtApellidoMaterno" placeholder="Ingresar datos" value="<?php echo set_value('txtApellidoMaterno', @$representante[0]->ApellidoMaternoRepresentante); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">*	Fecha de Nacimiento: </th>
					<td>

					<div class='input-group date' id='divMiCalendario1'>
                      <input type='text' id="txtFechaNacimiento" name="txtFechaNacimiento" class="form-control" value="<?php echo set_value('txtFechaNacimiento', @$representante[0]->FNacimientoRepresentante); ?>" readonly/>
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
								if ($key == @$representante[0]->SexoRepresentante) { ?>
								<option selected="selected" > <?php echo $key; ?></option>
								<?php	}else{ ?>
								<option> <?php echo $key; ?></option>
								<?php 	}
							} ?>
						</select>
					</td>
				</tr>
				<tr>
					<th class="izquierda">*	Etnia: </th>
					<td><input class="form-control" type="text" name="txtEtnia"  placeholder="Ingresar datos" value="<?php echo set_value('txtEtnia', @$representante[0]->EtniaRepresentante); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">Nombre del Organismo:</th>
					<td>
						<select class="form-control" name="selectOrganismo" id="organismos" type="hidden" >
							<?php 
							foreach ($organismos as $items) {
								if ($items->IdOrganismo == @$representante[0]->IdOrganismo) { ?>
								<option selected="selected" value="<?php echo $items->IdOrganismo; ?>"><?php echo $items->NombreOrganismo;?></option>
								<?php }else{ ?>
								<option value="<?php echo $items->IdOrganismo; ?>"><?php echo $items->NombreOrganismo;?></option>
								<?php }
							} ?>
						</select>
					</td>
				</tr>
				<tr>
					<th class="izquierda">*	Fecha Inicio del Período: </th>
					<td>
					<div class='input-group date' id='divMiCalendario2'>
                      <input type='text' id="txtFechaInicioPeriodo" name="txtFechaInicioPeriodo" class="form-control" value="<?php echo set_value('txtFechaInicioPeriodo', @$representante[0]->FechaInicioPeriodo); ?>" readonly/>
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>
                </td>
				</tr>
				<tr>
					<th class="izquierda">*	Fecha Fin del Período: </th>
					<td>
					<div class='input-group date' id='divMiCalendario3'>
                      <input type='text' id="txtFechaFinPeriodo" name="txtFechaFinPeriodo" class="form-control" value="<?php echo set_value('txtFechaFinPeriodo', @$representante[0]->FechaFinPeriodo); ?>" readonly/>
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>
                </td>
				</tr>
				<tr>
					<th class="izquierda">Cargo: </th>
					<td><input class="form-control" type="text" name="txtCargo" placeholder="Ingresar datos" value="<?php echo set_value('txtCargo', @$representante[0]->Cargo); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">Funciones: </th>
					<td><input class="form-control" type="text" name="txtFunciones" placeholder="Ingresar datos" value="<?php echo set_value('txtFunciones', @$representante[0]->Funciones); ?>"></td>
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