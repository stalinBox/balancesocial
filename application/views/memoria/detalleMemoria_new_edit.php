<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datetimepicker.min.css" >
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datepicker.css" > 

<script type="text/javascript">
	function regresar(){
		window.location="<?php echo base_url()?>memoria/detallesMemoria";
	}
</script>

	<h3 class="page-header" align="center"><span class="glyphicon glyphicon-th-list"></span> <?php echo $titulo; ?></h3>
	<div id="TAB">
		<div class="error"> 
			<center>
				<?php messages_flash('danger',validation_errors(),'Errores del formulario', true); ?>
			</center>
		</div>
		<form action="<?php echo base_url()?>memoria/guardarDetalleMemoria" id="form1" method="POST">
			<table width="100%" cellspacing=8px" id="Tabla1">
				<tbody>
					<input type="hidden" name="accion" value="<?php echo $accion; ?>">
					<input type="hidden" name="id" value="<?php echo @$detalleMemoria[0]->IdDetalleMemoria; ?>">
					<tr>
						<th class="izquierda">Periodo Objeto de la Memoria : </th>
						<td>

						<div class='input-group date' id='divPeriodo'>
                      <input type='text' id="txtPeriodoObjeto" name="txtPeriodoObjeto" class="form-control" value="<?php echo set_value('txtPeriodoObjeto', @$detalleMemoria[0]->PeriodoObjeto); ?>" readonly/>
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>

						</td>
					</tr>
					<tr>
						<th class="izquierda">Fecha de Última Memoria: </th>
						<td>
							<div class='input-group date' id='divMiCalendario'>
                      			<input type='text' id="txtFechaUltimaMemoria" name="txtFechaUltimaMemoria" class="form-control" value="<?php echo set_value('txtFechaUltimaMemoria', @$detalleMemoria[0]->FechaUltimaMemoria); ?>" readonly/>
                      			<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      			</span>
                    		</div>

						</td>
					</tr>
					<tr>
						<th class="izquierda">Ciclo de Presentación de Memorias: </th>
						<td><input class="form-control" type="text" name="txtCicloPresentacion" placeholder="Ingresar datos" value="<?php echo set_value('txtCicloPresentacion', @$detalleMemoria[0]->CicloPresentacion); ?>"></td>
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