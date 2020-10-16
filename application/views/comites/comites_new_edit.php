<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datetimepicker.min.css" >
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datepicker.css" > 

<script type="text/javascript">
	function regresar(){
		window.location="<?php echo base_url()?>comite/comites";
	}

	function limpiar() {
		var t = document.getElementById("form1").getElementsByTagName("input");
//var t = document.getElementById("TAB").getElementsByTagName("input");
for (var i=0; i<t.length; i++) {
	if (t[i].type == "text") {    
		t[i].value = "";
	}
}
window.location="<?php echo base_url()?>comite/nuevoComite";
}
</script>
<?php 
$tipoComite = array(
	'1' => "Comité de Responsabilidad Social",
	'2' => "Comité de Ética",
	'3' => "Comité de Cumplimiento",
	'4' => "Comité de Riesgo",
	'5' => "Comité de Crédito",
	'6' => "Comité de Salud"
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
		<form action="<?php echo base_url()?>comite/guardarComite" id="form1" method="POST" enctype="multipart/form-data">
			<table width="100%" cellspacing=8px" id="Tabla1">
				<tbody>
					<input type="hidden" name="accion" value="<?php echo $accion; ?>">
					<input type="hidden" name="id" value="<?php echo @$comite[0]->IdComite; ?>">
					<tr>
						<th class="izquierda">*	Nombre del Comité: </th>
						<td><input class="form-control" type="text" name="txtNombreComite" placeholder="Ingresar datos" value="<?php echo set_value('txtNombreComite', @$comite[0]->NombreComite); ?>"></td>
					</tr>				
					<tr>
						<th class="izquierda">Tipo de Comité:</th>
						<td>
							<select class="form-control" name="selectTipoComite">
								<?php 
								foreach ($tipoComite as $key) {
									if ($key == @$comite[0]->TipoComite) { ?>
									<option selected="selected" > <?php echo $key; ?></option>											
									<?php	}else{ ?>
									<option> <?php echo $key; ?></option>
									<?php 	}
								} ?>							
							</select>
						</td>
					</tr>
					<tr>
						<th class="izquierda">*	Número de Integrates: </th>
						<td><input class="form-control" type="text" name="txtNumIntegrantesComite" placeholder="Ingresar datos" value="<?php echo set_value('txtNumIntegrantesComite', @$comite[0]->IntegrantesComite); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">*	Funciones del Comité: </th>
						<td><input class="form-control" type="text" name="txtFuncionesComite" placeholder="Ingresar datos" value="<?php echo set_value('txtFuncionesComite', @$comite[0]->FuncionComite); ?>"></td>
					</tr>
					<tr>
					<th class="izquierda">Imagen</th>
					<td>
						<img src="data:image/jpg;base64, <?php echo base64_encode(@$comite[0]->ImganenComite) ?>" width="100" height="100" >
					</td>
				</tr>
				<tr>
					<th class="izquierda">Seleccionar Imagen: </th>
					<td>
						<input type="file" name="inputImagen">
					</td>
				</tr>
				<tr>
					<th class="izquierda">*	Periodo: </th>
					<td>
					<div class='input-group date' id='divPeriodo'>
                      <input type='text' id="txtPeriodo" name="txtPeriodo" class="form-control" value="<?php echo set_value('txtPeriodo', @$comite[0]->Periodo); ?>" readonly/>
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