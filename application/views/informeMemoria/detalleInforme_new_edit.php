<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datetimepicker.min.css" >
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datepicker.css" > 

<script type="text/javascript">
	function regresar(){
		window.location="<?php echo base_url()?>informeMemoria/detallesDeInforme";
	}
</script>
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
		<form action="<?php echo base_url()?>informeMemoria/guardarDetalleinformeMemoria" id="form1" method="POST">
			<table width="100%" cellspacing=8px" id="Tabla1">
				<tbody>
					<input type="hidden" name="accion" value="<?php echo @$accion; ?>">
					<input type="hidden" name="id" value="<?php echo @$detalleInforme[0]->IdDetallesInforme; ?>">
					<tr>
						<th class="izquierda">Número de Declaraciones Emitidas: </th>
						<td><input class="form-control" type="text" name="txtNumDeclaracionesEmitidas" placeholder="Ingresar datos" value="<?php echo set_value('txtNumDeclaracionesEmitidas', @$detalleInforme[0]->NumDeclaracionesEmitidas); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">Nombre de la Persona que Emite el Informe: </th>
						<td><input class="form-control" type="text" name="txtIdentificacionDeQuienEmite" placeholder="Ingresar datos" value="<?php echo set_value('txtIdentificacionDeQuienEmite', @$detalleInforme[0]->IdentificacionDeQuienEmite); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">Cargo de la Persona que Emite el Informe: </th>
						<td><input class="form-control" type="text" name="txtCargoDeQuienEmite" placeholder="Ingresar datos" value="<?php echo set_value('txtCargoDeQuienEmite', @$detalleInforme[0]->CargoDeQuienEmite); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">Fecha de Emisión del Informe: </th>
						<td>
					<div class='input-group date' id='divMiCalendario'>
                      <input type='text' id="txtFechaEmisionInforme" name="txtFechaEmisionInforme" class="form-control" value="<?php echo set_value('txtFechaEmisionInforme', @$detalleInforme[0]->FechaEmisionInforme); ?>" readonly/>
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>

                </td>
					</tr>
					<tr>
						<th class="izquierda">Periodo: </th>
						<td>
					<div class='input-group date' id='divPeriodo'>
                      <input type='text' id="txtPeriodo" name="txtPeriodo" class="form-control" value="<?php echo set_value('txtPeriodo', @$detalleInforme[0]->Periodo); ?>" readonly/>
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