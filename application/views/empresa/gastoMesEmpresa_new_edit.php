<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datetimepicker.min.css" >
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datepicker.css" > 

<script type="text/javascript">
	function regresar(){
		window.location="<?php echo base_url()?>empresa/gastosMensuales";
	}
	
	function limpiar() {
		var t = document.getElementById("form1").getElementsByTagName("input");
//var t = document.getElementById("TAB").getElementsByTagName("input");
for (var i=0; i<t.length; i++) {
	if (t[i].type == "text") {		
		t[i].value = "";
	}
}
window.location="<?php echo base_url()?>empresa/nuevoGastoMesEmpresa";
}
</script>
<?php 
$tipoPago = array(
	'0' => "Agua",
	'1' => "Energía Eléctrica",
	'2' => "Teléfono",
	'3' => "Papel",
	'4' => "Combustible"
	);
$meses = array(
	'1' => "Enero" , 
	'2' => "Febrero" , 
	'3' => "Marzo" , 
	'4' => "Abril" , 
	'5' => "Mayo" , 
	'6' => "Junio" , 
	'7' => "Julio" , 
	'8' => "Agosto" , 
	'9' => "Septiembre" , 
	'0' => "Octubre" , 
	'11' => "Noviembre" , 
	'12' => "Diciembre" , 
	);
$uMedida = array(
	'1' => "m3", 
	'2' => "kw", 
	'3' => "Minutos", 
	'4' => "Resmas", 
	'5' => "Galones"				
	);
	?>
	<h3 class="page-header" align="center"><span class="glyphicon glyphicon-th-list"></span> <?php echo @$titulo ?></h3>
	<div id="TAB">
		<div class="error"> 
			<center>
				<?php messages_flash('danger',validation_errors(),'Errores del formulario', true); ?>
			</center>
		</div>
		<form action="<?php echo base_url()?>empresa/guardarGastoMesEmpresa" id="form1" method="POST">
			<table width="100%" border="0" cellspacing=8px" id="Tabla1">
				<tbody>
					<input type="hidden" name="accion" value="<?php echo $accion; ?>">
					<input type="hidden" name="id" value="<?php echo @$gastoMensual[0]->IdGastosMesEmpresa; ?>">
					<tr>
						<th class="izquierda">Pago:</th>
						<td>
							<select class="form-control" name="selectTipoPago">	
								<?php 
								foreach ($tipoPago as $key) {
									if ($key == @$gastoMensual[0]->TipoGasto) { ?>
									<option selected="selected" > <?php echo $key; ?></option>
									<?php	}else{ ?>
									<option> <?php echo $key; ?></option>
									<?php 	}
								} ?>
							</select>
						</td>
					</tr>
					<tr>
						<th class="izquierda">Proveedore:</th>
						<td>
							<select class="form-control" name="selectProveedor" id="empleado" type="hidden" >
								<?php 
								foreach ($proveedores as $items) {
									if ($items->IdProveedor == @$gastoMensual[0]->ProveedorGastosMes) { ?>
									<option selected="selected" value="<?php echo $items->IdProveedor; ?>"><?php echo $items->NombreProveedor;?></option>      
									<?php }else{ ?>
									<option value="<?php echo $items->IdProveedor; ?>"><?php echo $items->NombreProveedor;?></option>      
									<?php }							 	
								} ?>
							</select>
						</td>
					</tr>		
					<tr>
						<th class="izquierda">Mes:</th>
						<td>
							<select class="form-control" name="selectMes">
								<?php 
								foreach ($meses as $key) { 
									if ($key == @$gastoMensual[0]->MesGastosMes) { ?>
									<option selected="selected" > <?php echo $key; ?></option>											
									<?php }else{ ?>
									<option> <?php echo $key; ?></option>
									<?php }
								} ?>						
							</select>
						</td>
					</tr>
					<tr>								
						<tr>
							<th class="izquierda">*	Fecha del Mes: </th>
							<td>
					<div class='input-group date' id='divMiCalendario'>
                      <input type='text' id="txtFechaMes" name="txtFechaMes" class="form-control" value="<?php echo set_value('txtFechaMes', @$gastoMensual[0]->FachaGastosMes); ?>" />
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>

							</td>
						</tr>
						<tr>
							<th class="izquierda">Unidad de Medida:</th>
							<td>
								<select class="form-control" name="selectTipoUnidadMedida">
									<?php 
									foreach ($uMedida as $key) { 
										if ($key == @$gastoMensual[0]->UnidadMedidaGastosMes) { ?>
										<option selected="selected" > <?php echo $key; ?></option>											
										<?php }else{ ?>
										<option> <?php echo $key; ?></option>
										<?php }
									} ?>	
								</select>
							</td>
						</tr>
						<tr>
							<th class="izquierda">*	Cantidad de Consumo: </th>
							<td><input class="form-control" type="text" name="txtCantidadConsumo" placeholder="Ingresar datos" value="<?php echo set_value('txtCantidadConsumo', @$gastoMensual[0]->CantidadGastosMes); ?>"></td>
						</tr>
						<tr>
							<th class="izquierda">*	Costo: </th>
							<td><input class="form-control" type="text" name="txtCosto" placeholder="Ingresar datos" value="<?php echo set_value('txtCosto', @$gastoMensual[0]->CostoGastosMes ); ?>"></td>
						</tr>
						<tr>
							<th class="izquierda">Observación: </th>
							<td><input class="form-control" type="text" name="txtObservacion" placeholder="Ingresar datos" value="<?php echo set_value('txtObservacion', @$gastoMensual[0]->Observacion ); ?>"></td>
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
						<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
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
   </script>