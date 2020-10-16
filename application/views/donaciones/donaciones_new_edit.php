<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datetimepicker.min.css" >
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datepicker.css" > 

<script type="text/javascript">
	function regresar(){
		window.location="<?php echo base_url()?>donacion/donaciones";
	}

	function limpiar() {
		var t = document.getElementById("form1").getElementsByTagName("input");
//var t = document.getElementById("TAB").getElementsByTagName("input");
for (var i=0; i<t.length; i++) {
	if (t[i].type == "text") {    
		t[i].value = "";
	}
}
window.location="<?php echo base_url()?>donacion/nuevaDonacion";
}
</script>
<?php 
$tipoDonacion = array(
	'1' => "Otorgada",
	'2' => "Recibida"	
	);
$formaDonacion = array(
	'1' => "Especies",
	'2' => "Dinero en Efectivo",
	'3' => "Otro"
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
		<form action="<?php echo base_url()?>donacion/guardarDonacion" id="form1" method="POST" enctype="multipart/form-data">
			<table width="100%" border="0" cellspacing=8px" id="Tabla1">
				<tbody>
					<input type="hidden" name="accion" value="<?php echo $accion; ?>">
					<input type="hidden" name="id" value="<?php echo @$donacion[0]->IdDonaciones; ?>">
					<tr>
						<th class="izquierda">*	Nombre del Beneficiario: </th>
						<td><input class="form-control" type="text" name="txtNombreBenficiario" placeholder="Ingresar datos" value="<?php echo set_value('txtNombreBenficiario', @$donacion[0]->Beneficiario); ?>"></td>
					</tr>				
					<tr>
						<th class="izquierda">*	Monto: </th>
						<td><input class="form-control" type="text" name="txtMonto" placeholder="Ingresar datos" value="<?php echo set_value('txtMonto', @$donacion[0]->MontoDonacion); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">Tipo de Donación:</th>
						<td>
							<select class="form-control" name="selectTipoDonacion">
								<?php 
								foreach ($tipoDonacion as $key) {
									if ($key == @$donacion[0]->TipoDonacion) { ?>
									<option selected="selected" > <?php echo $key; ?></option>											
									<?php	}else{ ?>
									<option> <?php echo $key; ?></option>
									<?php 	}
								} ?>
							</select>
						</td>
					</tr>
					<tr>
						<th class="izquierda">Forma de Donación:</th>
						<td>
							<select class="form-control" name="selectFormaDonacion">
								<?php 
								foreach ($formaDonacion as $key) {
									if ($key == @$donacion[0]->FormaDonacion) { ?>
									<option selected="selected" > <?php echo $key; ?></option>											
									<?php	}else{ ?>
									<option> <?php echo $key; ?></option>
									<?php 	}
								} ?>
							</select>
						</td>
					</tr>			
					<tr>
						<th class="izquierda">Objetivo de la Donación: </th>
						<td><input class="form-control" type="text" name="txtObjetivoDonacion" placeholder="Ingresar datos" value="<?php echo set_value('txtObjetivoDonacion', @$donacion[0]->ObjetivoDonacion); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">Foto</th>
						<td>
							<img src="data:image/jpg;base64, <?php echo base64_encode(@$donacion[0]->Imagen) ?>" width="100" height="100" >
						</td>
					</tr>
					<tr>
						<th class="izquierda">Seleccionar Imagen: </th>
						<td>
							<input type="file" name="inputFoto">
						</td>
					</tr>
					<tr>
						<th class="izquierda">*	Fecha del Mes: </th>
						<td>
					<div class='input-group date' id='divMiCalendario'>
                      <input type='text' id="txtFechaMes" name="txtFechaMes" class="form-control" value="<?php echo set_value('txtFechaMes', @$donacion[0]->FechaMes); ?>" />
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>

						</td>
					</tr>
					<tr>
						<th class="izquierda">*	Periodo: </th>
						<td>
					<div class='input-group date' id='divPeriodo'>
                      <input type='text' id="txtPeriodo" name="txtPeriodo" class="form-control" value="<?php echo set_value('txtPeriodo', @$donacion[0]->Periodo); ?>" />
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