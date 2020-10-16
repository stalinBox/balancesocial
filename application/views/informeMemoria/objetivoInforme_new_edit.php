<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datepicker.css" >
<script type="text/javascript">
	function regresar(){
		window.location="<?php echo base_url()?>informeMemoria/objetivosInforme";
	}
</script>
<?php
$tipoObjetivo = array(
	'1' => "Corto Plazo",
	'2' => "Mediano Plazo",
	'3' => "Largo Plazo"	
	);
?>
	<h3 class="page-header" align="center"><span class="glyphicon glyphicon-th-list"></span> <?php echo $titulo; ?></h3>
	<div id="TAB">
		<div class="error"> 
			<center>
				<?php messages_flash('danger',validation_errors(),'Errores del formulario', true); ?>
			</center>
		</div>
		<form action="<?php echo base_url()?>informeMemoria/guardarObjetivoInformeMemoria" id="form1" method="POST">
			<table width="100%" cellspacing=8px" id="Tabla1">
				<tbody>
					<input type="hidden" name="accion" value="<?php echo @$accion; ?>">
					<input type="hidden" name="id" value="<?php echo @$objetivosInforme[0]->IdObjetivosInforme; ?>">
					<tr>
						<th class="izquierda">Objetivo de la Organización: </th>
						<td><input class="form-control" type="text" name="txtObjetivo" placeholder="Ingresar datos" value="<?php echo set_value('txtObjetivo', @$objetivosInforme[0]->Objetivo); ?>"></td>
					</tr>
					<tr>
					<th class="izquierda">Tipo de Objetivo:</th>
					<td>
						<select class="form-control" name="selectTipoObjetivo">
							<?php 
							foreach ($tipoObjetivo as $key) {
								if ($key == @$objetivosInforme[0]->Tipo) { ?>
								<option selected="selected" > <?php echo $key; ?></option>											
								<?php	}else{ ?>
								<option> <?php echo $key; ?></option>
								<?php 	}
							} ?>
						</select>
					</td>
				</tr>
					<tr>
						<th class="izquierda">Cumplimiento: </th>
						<td><input class="form-control" type="text" name="txtDescripcionCumplimiento" placeholder="Ingresar datos" value="<?php echo set_value('txtDescripcionCumplimiento', @$objetivosInforme[0]->DescripcionCumplimiento); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">Periodo: </th>
						<td>

						<div class='input-group date' id='divMiCalendario'>
                      <input type='text' id="txtPeriodo" name="txtPeriodo" class="form-control" value="<?php echo set_value('txtPeriodo', @$objetivosInforme[0]->Periodo); ?>" readonly/>
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
   <script src="<?php echo base_url()?>js/calendario/bootstrap-datepicker.js"></script>
      <script type="text/javascript">
     $('#divMiCalendario').datepicker({
          	format: "yyyy",
    		viewMode: "years", 
    		minViewMode: "years"
    });

   </script>