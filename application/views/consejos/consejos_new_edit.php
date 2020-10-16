<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datetimepicker.min.css" >
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datepicker.css" > 

<script type="text/javascript">
	function regresar(){
		window.location="<?php echo base_url()?>consejo/consejos";
	}

	function limpiar() {
		var t = document.getElementById("form1").getElementsByTagName("input");
for (var i=0; i<t.length; i++) {
	if (t[i].type == "text") {    
		t[i].value = "";
	}
}
window.location="<?php echo base_url()?>consejo/nuevoConsejo";
}
</script>
<?php 
$tipoConsejo = array(
	'1' => "Consejo de Vigilancia",
	'2' => "Consejo de Administración"
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
		<form action="<?php echo base_url()?>consejo/guardarConsejo" id="form1" method="POST" enctype="multipart/form-data">
			<table width="100%" cellspacing=8px" id="Tabla1">
				<tbody>
					<input type="hidden" name="accion" value="<?php echo $accion; ?>">
					<input type="hidden" name="id" value="<?php echo @$consejo[0]->IdConsejos; ?>">
					<tr>
						<th class="izquierda">*	Nombre del Consejo: </th>
						<td><input class="form-control" type="text" name="txtNombreConsejo" placeholder="Ingresar datos" value="<?php echo set_value('txtNombreConsejo', @$consejo[0]->NombreConsejos); ?>"></td>
					</tr>				
					<tr>
						<th class="izquierda">Tipo de Consejo:</th>
						<td>
							<select class="form-control" name="selectTipoConsejo">
								<?php 
								foreach ($tipoConsejo as $key) {
									if ($key == @$consejo[0]->TipoConsejos) { ?>
									<option selected="selected" > <?php echo $key; ?></option>											
									<?php	}else{ ?>
									<option> <?php echo $key; ?></option>
									<?php 	}
								} ?>
							</select>
						</td>
					</tr>				
					<tr>
						<th class="izquierda">*	Número Total de Integrates: </th>
						<td><input class="form-control" type="text" name="txtNumIntegrantesConsejo" placeholder="Ingresar datos" value="<?php echo set_value('txtNumIntegrantesConsejo', @$consejo[0]->IntegrantesConsejos); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">*	Número Total de Hombres: </th>
						<td><input class="form-control" type="text" name="txtNumIntegrantesHombres" placeholder="Ingresar datos" value="<?php echo set_value('txtNumIntegrantesHombres', @$consejo[0]->NumeroHombres); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">*	Número Total de Mujeres: </th>
						<td><input class="form-control" type="text" name="txtNumIntegrantesMujeres" placeholder="Ingresar datos" value="<?php echo set_value('txtNumIntegrantesMujeres', @$consejo[0]->NumeroMujeres); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">*	Funciones del Consejo: </th>
						<td><input class="form-control" type="text" name="txtFuncionesConsejo" placeholder="Ingresar datos" value="<?php echo set_value('txtFuncionesConsejo', @$consejo[0]->FuncionConsejos); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">Fotografía</th>
						<td>
							<img src="data:image/jpg;base64, <?php echo base64_encode(@$consejo[0]->ImganenConsejos) ?>" width="100" height="100" >
						</td>
					</tr>
					<tr>
						<th class="izquierda">Selccionar Imagen: </th>
						<td>
							<input type="file" name="inputFoto">
						</td>
					</tr>
					<tr>
						<th class="izquierda">*	Periodo: </th>
						<td>
					<div class='input-group date' id='divPeriodo'>
                      <input type='text' id="txtPeriodo" name="txtPeriodo" class="form-control" value="<?php echo set_value('txtPeriodo', @$consejo[0]->Periodo); ?>" readonly/>
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