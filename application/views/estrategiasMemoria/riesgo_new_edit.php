<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datepicker.css" >
<script type="text/javascript">
	function regresar(){
		window.location="<?php echo base_url()?>estrategia/estrategiaRiesgos";
	}
</script>

	<h3 class="page-header" align="center"><span class="glyphicon glyphicon-th-list"></span> <?php echo $titulo; ?></h3>
	<div id="TAB">
		<div class="error"> 
			<center>
				<?php messages_flash('danger',validation_errors(),'Errores del formulario', true); ?>
			</center>
		</div>
		<form action="<?php echo base_url()?>estrategia/guardarEstrategiaRiesgo" id="form1" method="POST">
			<table width="100%" cellspacing=8px" id="Tabla1">
				<tbody>
					<input type="hidden" name="accion" value="<?php echo $accion; ?>">
					<input type="hidden" name="id" value="<?php echo @$estrategiaRiesgo[0]->IdRiesgo; ?>">
					<tr>
						<th class="izquierda">Riesgo : </th>
						<td><input class="form-control" type="text" name="txtRiesgo" placeholder="Ingresar datos" value="<?php echo set_value('txtRiesgo', @$estrategiaRiesgo[0]->Riesgo); ?>"></td>
					</tr>			
					<tr>
						<th class="izquierda">Periodo: </th>
						<td>
					<div class='input-group date' id='divPeriodo'>
                      <input type='text' id="txtPeriodo" name="txtPeriodo" class="form-control" value="<?php echo set_value('txtPeriodo', @$estrategiaRiesgo[0]->Periodo); ?>" readonly/>
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
     $('#divPeriodo').datepicker({
          	format: "yyyy",
    		viewMode: "years", 
    		minViewMode: "years"
    });
   </script>