<script type="text/javascript">
	function regresar(){
		window.location="<?php echo base_url()?>politicasAprobacionCredito/pacCalif";
	}

	function limpiar() {
		var t = document.getElementById("form1").getElementsByTagName("input");
//var t = document.getElementById("TAB").getElementsByTagName("input");
for (var i=0; i<t.length; i++) {
	if (t[i].type == "text") {    
		t[i].value = "";
	}
}
window.location="<?php echo base_url()?>politicasAprobacionCredito/nuevoPACCalif";
}
</script>
	<h3 class="page-header" align="center"><span class="glyphicon glyphicon-th-list"></span> <?php echo $titulo; ?></h3>
	<div id="TAB">
		<div class="error"> 
			<center>
				<?php messages_flash('danger',validation_errors(),'Errores del formulario', true); ?>
			</center>
		</div>
		<form action="<?php echo base_url()?>politicasAprobacionCredito/guardarPACCalif" id="form1" method="POST">
			<table width="100%" border="0" cellspacing=8px" id="Tabla1">
				<tbody>
					<input type="hidden" name="accion" value="<?php echo $accion; ?>">
					<input type="hidden" name="observacion" value="<?php echo @$observacion; ?>">
					<input type="hidden" name="id" value="<?php echo @$pacCalif[0]->IdPACCalif; ?>">				
					<tr>
						<th class="izquierda">Selección:</th>
						<td>
							<select class="form-control" name="selectCalificacion" id="proveedor" type="hidden" >
								<?php 
								foreach ($politicasAprobacionCreditos as $items) {
									if ($items->IdAprobacionCredito == @$pacCalif[0]->IdAprobacionCredito) { ?>
									<option selected="selected" value="<?php echo $items->IdAprobacionCredito; ?>"><?php echo $items->NombreAprobacionCredito;?></option>
									<?php }else{ ?>
									<option value="<?php echo $items->IdAprobacionCredito; ?>"><?php echo $items->NombreAprobacionCredito;?></option>							   
									<?php }							 	
								} ?>
							</select>
						</td>
					</tr>				
					<tr>
						<th class="izquierda">Fecha de Calificación: </th>
						<td>
							<div class='input-group date' id='divMiCalendario'>
                      			<input type='text' id="txtFechaMes" name="txtFechaMes" class="form-control" value="<?php echo set_value('txtFechaMes', @$pacCalif[0]->FechaMes); ?>" />
                      			<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
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