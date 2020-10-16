<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datepicker.css" > 
<script type="text/javascript">
	function regresar(){
		window.location="<?php echo base_url()?>informeMemoria/logrosFracasosInforme";
	}
</script>
<?php
$tipo = array(
	'1' => "Logro",
	'2' => "Fracaso"	
	);
?>
	<h3 class="page-header" align="center"><span class="glyphicon glyphicon-th-list"></span> <?php echo $titulo; ?></h3>
	<div id="TAB">
		<div class="error"> 
			<center>
				<?php messages_flash('danger',validation_errors(),'Errores del formulario', true); ?>
			</center>
		</div>
		<form action="<?php echo base_url()?>informeMemoria/guardarLogroFracasoInformeMemoria" id="form1" method="POST" enctype="multipart/form-data" >
			<table width="100%" cellspacing=8px" id="Tabla1">
				<tbody>
					<input type="hidden" name="accion" value="<?php echo @$accion; ?>">
					<input type="hidden" name="id" value="<?php echo @$logroFracasoInforme[0]->IdLogroFracasoInforme; ?>">
					<tr>
					<th class="izquierda">Logro o Fracaso:</th>
					<td>
						<select class="form-control" name="selectTipo">
							<?php 
							foreach ($tipo as $key) {
								if ($key == @$logroFracasoInforme[0]->LogroFracaso) { ?>
								<option selected="selected" > <?php echo $key; ?></option>											
								<?php	}else{ ?>
								<option> <?php echo $key; ?></option>
								<?php 	}
							} ?>
						</select>
						</td>
					</tr>
					<tr>
						<th class="izquierda">Descripción: </th>
						<td><input class="form-control" type="text" name="txtDescripcion" placeholder="Ingresar datos" value="<?php echo set_value('txtDescripcion', @$logroFracasoInforme[0]->Descripcion); ?>"></td>
					</tr>
					<tr>
				        <th class="izquierda">Imagen</th>
				        <td>
				          <img src="data:image/jpg;base64, <?php echo base64_encode(@$logroFracasoInforme[0]->Imagen) ?>" width="100" height="100" >
				        </td>
				      </tr>
				    <tr>
				        <th class="izquierda">Seleccionar Imagen: </th>
				        <td>
				          <input type="file" name="inputFoto" >
				        </td>
				    </tr>
					<tr>
						<th class="izquierda">Periodo: </th>
						<td>
							<div class='input-group date' id='divPeriodo'>
                      <input type='text' id="txtPeriodo" name="txtPeriodo" class="form-control" value="<?php echo set_value('txtPeriodo', @$logroFracasoInforme[0]->Periodo); ?>" readonly/>
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>
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
   <script src="<?php echo base_url()?>js/calendario/bootstrap-datepicker.js"></script>
   <script type="text/javascript">
     $('#divPeriodo').datepicker({
          	format: "yyyy",
    		viewMode: "years", 
    		minViewMode: "years"
    });
   </script>