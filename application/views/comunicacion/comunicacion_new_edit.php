<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datetimepicker.min.css" >
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datepicker.css" >

<script type="text/javascript">
	function regresar(){
		window.location="<?php echo base_url()?>comunicacion/comunicaciones";
	}

	function limpiar() {
		var t = document.getElementById("form1").getElementsByTagName("input");
//var t = document.getElementById("TAB").getElementsByTagName("input");
for (var i=0; i<t.length; i++) {
	if (t[i].type == "text") {    
		t[i].value = "";
	}
}
window.location="<?php echo base_url()?>comunicacion/nuevaComunicacion";
}
</script>
<?php 
$tipoMecanismo = array(
	'1' => "Afiches",
	'2' => "Folletos",
	'3' => "Página Web",
	'4' => "Pizarras Informativas",
	'5' => "Otros"
	);
$estado = array(
	'1' => "Planificada",
	'2' => "Ejecutada"
	);
$dirigido = array(
	'1' => "Productos",
	'2' => "Servicios",
	'3' => "Servicios a la Comunidad",
	'4' => "Otros"
	);
$ejecutada = array(
	'1' => "Ejecutada con Éxito",
	'2' => "Vetada",
	'3' => "Denunciada"				
	);
	?>
	<h3 class="page-header" align="center"><span class="glyphicon glyphicon-th-list"></span> <?php echo $titulo; ?></h3>
	<div id="TAB">
		<div class="error"> 
			<center>
				<?php  messages_flash('danger',validation_errors(),'Errores del formulario', true); ?>
			</center>
		</div>
		<div class="container">
	<dl>Los campos con * son obligatorios</dl>
</div>
		<form action="<?php echo base_url()?>comunicacion/guardarComunicacion" id="form1" method="POST">
			<table width="100%" border="0" cellspacing=8px" id="Tabla1">
				<tbody>
					<input type="hidden" name="accion" value="<?php echo $accion; ?>">
					<input type="hidden" name="id" value="<?php echo @$comunicacion[0]->IdComunicacion; ?>">	
					<tr>
						<th class="izquierda">Proveedor:</th>
						<td>
							<select class="form-control" name="selectProveedor" id="proveedor" type="hidden" >
								<?php 
								foreach ($proveedores as $items) {
									if ($items->IdProveedor == @$comunicacion[0]->RucProveedor) { ?>
									<option selected="selected" value="<?php echo $items->IdProveedor; ?>"><?php echo $items->NombreProveedor;?></option>      
									<?php }else{ ?>
									<option value="<?php echo $items->IdProveedor; ?>"><?php echo $items->NombreProveedor;?></option>      
									<?php }							 	
								} ?>
							</select>
						</td>
					</tr>
					<tr>
						<th class="izquierda">*	Nombre de la Comunicación: </th>
						<td><input class="form-control" type="text" name="txtNombreComunicacion" placeholder="Ingresar datos" value="<?php echo set_value('txtNombreComunicacion', @$comunicacion[0]->NombreComunicacion); ?>"></td>
					</tr>		
					<tr>
						<th class="izquierda">*	Medios de Información: </th>
						<td><input class="form-control" type="text" name="txtMediosInformacion" placeholder="Ingresar datos" value="<?php echo set_value('txtMediosInformacion', @$comunicacion[0]->MediosDeInformacion); ?>"></td>
					</tr>	
					<tr>
						<th class="izquierda">Tipo de Mecanismos:</th>
						<td>
							<select class="form-control" name="selectTipoMecanismo">
								<?php 
								foreach ($tipoMecanismo as $key) {
									if ($key == @$comunicacion[0]->TipoMecanismos) { ?>
									<option selected="selected" > <?php echo $key; ?></option>											
									<?php	}else{ ?>
									<option> <?php echo $key; ?></option>
									<?php 	}
								} ?>
							</select>
						</td>
					</tr>
					<tr>
						<th class="izquierda">*	Descripción de los Mecanismos: </th>
						<td><input class="form-control" type="text" name="txtDescripcionMecanismos" placeholder="Ingresar datos" value="<?php echo set_value('txtDescripcionMecanismos', @$comunicacion[0]->DescripcionMecanismosDeComunicacion); ?>"></td>
					</tr>	
					<tr>
						<th class="izquierda">Estado:</th>
						<td>
							<select class="form-control" name="selectEstado">
								<?php 
								foreach ($estado as $key) {
									if ($key == @$comunicacion[0]->EstadoComunicacion) { ?>
									<option selected="selected" > <?php echo $key; ?></option>											
									<?php	}else{ ?>
									<option> <?php echo $key; ?></option>
									<?php 	}
								} ?>
							</select>
						</td>
					</tr>
					<tr>
						<th class="izquierda">Costo: </th>
						<td><input class="form-control" type="text" name="txtCosto" placeholder="Ingresar datos" value="<?php echo set_value('txtCosto', @$comunicacion[0]->CostoComunicacion); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">Fecha: </th>
						<td>
					<div class='input-group date' id='divMiCalendario'>
                      <input type='text' id="txtFecha" name="txtFecha" class="form-control" value="<?php echo set_value('txtFecha', @$comunicacion[0]->Fecha); ?>" />
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>


						</td>
					</tr>			
					<tr>
						<th class="izquierda">Dirigia a:</th>
						<td>
							<select class="form-control" name="selectDirigido">
								<?php 
								foreach ($dirigido as $key) {
									if ($key == @$comunicacion[0]->Dirigido) { ?>
									<option selected="selected" > <?php echo $key; ?></option>											
									<?php	}else{ ?>
									<option> <?php echo $key; ?></option>
									<?php 	}
								} ?>
							</select>
						</td>
					</tr>				
					<tr>
						<th class="izquierda">Resultado de la Comunicación a:</th>
						<td>
							<select class="form-control" name="selectResultadoComunicacion">
								<?php 
								foreach ($ejecutada as $key) {
									if ($key == @$comunicacion[0]->ResultadoDeComunicacion) { ?>
									<option selected="selected" > <?php echo $key; ?></option>											
									<?php	}else{ ?>
									<option> <?php echo $key; ?></option>
									<?php 	}
								} ?>							
							</select>
						</td>
					</tr>	
					<tr>
						<th class="izquierda">Observaciones: </th>
						<td><input class="form-control" type="text" name="txtObservaciones" placeholder="Ingresar datos" value="<?php echo set_value('txtObservaciones', @$comunicacion[0]->Observaciones); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">*	Periodo: </th>
						<td>
					<div class='input-group date' id='divPeriodo'>
                      <input type='text' id="txtPeriodo" name="txtPeriodo" class="form-control" value="<?php echo set_value('txtPeriodo', @$comunicacion[0]->Periodo); ?>" />
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

     $('#divPeriodo').datepicker({
          	format: "yyyy",
    		viewMode: "years", 
    		minViewMode: "years"
    });
   </script>