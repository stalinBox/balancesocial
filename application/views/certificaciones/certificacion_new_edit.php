<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datetimepicker.min.css" >
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datepicker.css" > 

<script type="text/javascript">
	function regresar(){
		window.location="<?php echo base_url()?>certificacion/certificaciones";
	}

	function limpiar() {
		var t = document.getElementById("form1").getElementsByTagName("input");
//var t = document.getElementById("TAB").getElementsByTagName("input");
for (var i=0; i<t.length; i++) {
	if (t[i].type == "text") {    
		t[i].value = "";
	}
}
window.location="<?php echo base_url()?>certificacion/nuevaCertificacion";
}
</script>
<?php 
$obtencion = array('1' => "NO", '2' => "SI");
$tipoCertificado = array(
						'1' => "Gestión de la Calidad",
						'2' => "Gestión Ambiental",
						'3' => "Gestión de Riesgos y Seguridad",
						'4' => "Gestión de Responsabilidad Social",
						'5' => "Otros"
						);
 ?>
<h3 class="page-header" align="center"><span class="glyphicon glyphicon-th-list"></span> <?php echo $titulo; ?></h3>
<div id="TAB">
	<div class="error"> 
		<center>
			<?php  messages_flash('danger',validation_errors(),'Errores del formulario', true); ?>
		</center>
	</div>
	<form action="<?php echo base_url()?>certificacion/guardarCertificacion" id="form1" method="POST" enctype="multipart/form-data">
		<table width="100%" border="0" cellspacing=8px" id="Tabla1">
			<tbody>
				<input type="hidden" name="accion" value="<?php echo $accion; ?>">
				<input type="hidden" name="id" value="<?php echo @$certificacion[0]->IdCertificacion; ?>">
				<tr>
					<th class="izquierda">*	Nombre de la Certificación: </th>
					<td><input class="form-control" type="text" name="txtNombreCertificacion" placeholder="Ingresar datos" value="<?php echo set_value('txtNombreCertificacion', @$certificacion[0]->NombreCertificacion); ?>"></td>
				</tr>				
				<tr>
					<th class="izquierda">Tipo de Certificación:</th>
					<td>
						<select class="form-control" name="selectTipoCertificado">
						<?php 
							foreach ($tipoCertificado as $key) {
							 	if ($key == @$certificacion[0]->TipoCertificacion) { ?>
							 		<option selected="selected" > <?php echo $key; ?></option>											
							 <?php	}else{ ?>
									<option> <?php echo $key; ?></option>
							 <?php 	}
							 } ?>						
						</select>
					</td>
				</tr>				
				<tr>
					<th class="izquierda">*	Emisor del Certificado: </th>
					<td><input class="form-control" type="text" name="txtEmisorCertificado" placeholder="Ingresar datos" value="<?php echo set_value('txtEmisorCertificado', @$certificacion[0]->EmisorCertificacion); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">*	Fecha de Planificación: </th>
					<td>					
					<div class='input-group date' id='divMiCalendario'>
                      <input type='text' id="txtFechaPlanificacion" name="txtFechaPlanificacion" class="form-control" value="<?php echo set_value('txtFechaPlanificacion', @$certificacion[0]->FechaDePlanificacion); ?>" readonly/>
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>

					</td>
				</tr>
				<tr>
					<th class="izquierda">Obtenido:</th>
					<td>
						<select class="form-control" name="selectObtenido">
						<?php 
							foreach ($obtencion as $key) {
							 	if ($key == @$certificacion[0]->ObtenidoCertificacion) { ?>
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
					<td><input class="form-control" type="text" name="txtCosto" placeholder="Ingresar datos" value="<?php echo set_value('txtCosto', @$certificacion[0]->CostoCertificacion); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">Fecha de Obtención: </th>
					<td><input class="form-control" type="text" name="txtFechaObtencion" placeholder="yyyy-mm-dd" value="<?php echo set_value('txtFechaObtencion', @$certificacion[0]->FechaObtencionCertificacion); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">Imagen</th>
					<td>
						<img src="data:image/jpg;base64, <?php echo base64_encode(@$certificacion[0]->Imagen) ?>" width="100" height="100" >
					</td>
				</tr>
				<tr>
					<th class="izquierda">Seleccionar Imagen: </th>
					<td>
						<input type="file" name="inputFoto">
					</td>
				</tr>
				<tr>
					<th class="izquierda">Observación: </th>
					<td><input class="form-control" type="text" name="txtObservacion" placeholder="Ingresar datos" value="<?php echo set_value('txtObservacion', @$certificacion[0]->Observacion); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">*	Periodo: </th>
					<td>
					<div class='input-group date' id='divPeriodo'>
                      <input type='text' id="txtPeriodo" name="txtPeriodo" class="form-control" value="<?php echo set_value('txtPeriodo', @$certificacion[0]->Periodo); ?>" />
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