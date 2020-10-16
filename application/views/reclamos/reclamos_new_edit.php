<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datetimepicker.min.css" >

<script type="text/javascript">
	function regresar(){
		window.location="<?php echo base_url()?>reclamos/reclamos";
	}

	function limpiar() {
		var t = document.getElementById("form1").getElementsByTagName("input");
//var t = document.getElementById("TAB").getElementsByTagName("input");
for (var i=0; i<t.length; i++) {
		if (t[i].type == "text") {    
			t[i].value = "";
		}
	}
  window.location="<?php echo base_url()?>reclamos/nuevoReclamo";
}
</script>
<?php
$tipoReclamo = array(
	'1' => "Producto", 
	'2' => "Servicio", 
	'3' => "Atención al Cliente", 
	'4' => "Aspectos Laborales", 
	'5' => "Violación de Información", 
	'6' => "Afectación al medio Ambiente", 
	'7'=> "Prácticas Laborales", 
	'8'=> "Otros"
	);
$denunciante = array(
	'1' => "Otros",
	'2' => "Clientes",
	'3' => "Comunidad",
	'4' => "Proveedores",
	'5' => "Empleados",
	'6' => "Socios"
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
	<form action="<?php echo base_url()?>reclamos/guardarReclamo" id="form1" method="POST">
		<table width="100%" border="0" cellspacing=8px" id="Tabla1">
			<tbody>
				<input type="hidden" name="accion" value="<?php echo $accion; ?>">
				<input type="hidden" name="id" value="<?php echo @$reclamo[0]->IdReclamos; ?>">
				<tr>
					<th class="izquierda">Empleado Responsable:</th>
					<td>
						<select name="selectEmpleado" id="empleado" type="hidden" class="form-control" >
							<?php 
							foreach ($empleados as $items) {
								if ($items->CedulaEmpleado == @$reclamo[0]->ResponsableDeReclamos) { ?>
								<option selected="selected" value="<?php echo $items->CedulaEmpleado; ?>"><?php echo $items->ApellidoPaternoEmpleado." ".$items->ApellidoMaternoEmpleado. " ".$items->NombresEmpleado;?></option>
								<?php }else{ ?>
								<option value="<?php echo $items->CedulaEmpleado; ?>"><?php echo $items->ApellidoPaternoEmpleado." ".$items->ApellidoMaternoEmpleado. " ".$items->NombresEmpleado;?></option>
								<?php }
							} ?>
						</select>
					</td>
				</tr>
				<tr>
					<th class="izquierda">Tipo de Reclamo:</th>
					<td>
						<select class="form-control" name="selectTipoReclamo">
							<?php 
							foreach ($tipoReclamo as $key) {
								if ($key == @$reclamo[0]->TipoReclamos) { ?>
								<option selected="selected" > <?php echo $key; ?></option>											
								<?php	}else{ ?>
								<option> <?php echo $key; ?></option>
								<?php 	}
							} ?>
						</select>
					</td>
				</tr>
				<tr>
					<th class="izquierda">Parte Denunciante:</th>
					<td>
						<select class="form-control" name="selectTipoDenunciante">
							<?php 
							foreach ($denunciante as $key) {
								if ($key == @$reclamo[0]->DenuncianteReclamos) { ?>
								<option selected="selected" > <?php echo $key; ?></option>											
								<?php	}else{ ?>
								<option> <?php echo $key; ?></option>
								<?php 	}
							} ?>
						</select>
					</td>
				</tr>
				<tr>
					<th class="izquierda">*	Número de Reclamos no Atendidos: </th>
					<td><input class="form-control" type="text" name="txtNumReclamoNoAtendidos" placeholder="Ingresar datos" value="<?php echo set_value('txtNumReclamoNoAtendidos', @$reclamo[0]->NoAtendidosReclamos); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">*	Número de Reclamos Resueltos: </th>
					<td><input class="form-control" type="text" name="txtNumReclamoResueltos" placeholder="Ingresar datos" value="<?php echo set_value('txtNumReclamoResueltos', @$reclamo[0]->ResueltosReclamos); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">*	Costo de los Reclamos: </th>
					<td><input class="form-control" type="text" name="txtCostoReclamos" placeholder="Ingresar datos" value="<?php echo set_value('txtCostoReclamos', @$reclamo[0]->CostoReclamos); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">Observaciones: </th>
					<td><input class="form-control" type="text" name="txtobservaciones" placeholder="Ingresar datos" value="<?php echo set_value('txtobservaciones', @$reclamo[0]->ObservacionReclamos); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">*	Fecha del Mes que pertenece el registro: </th>
					<td>
					<div class='input-group date' id='divMiCalendario'>
                      <input type='text' id="txtFechaMes" name="txtFechaMes" class="form-control" value="<?php echo set_value('txtFechaMes', @$reclamo[0]->FechaMes); ?>" />
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
   </script>