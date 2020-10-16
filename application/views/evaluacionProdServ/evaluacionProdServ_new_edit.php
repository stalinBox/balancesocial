<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datetimepicker.min.css" >

<script type="text/javascript">
	function regresar(){
		window.location="<?php echo base_url()?>evaluacionProdServ/evaluaciones";
	}

	function limpiar() {
		var t = document.getElementById("form1").getElementsByTagName("input");
//var t = document.getElementById("TAB").getElementsByTagName("input");
for (var i=0; i<t.length; i++) {
	if (t[i].type == "text") {    
		t[i].value = "";
	}
}
window.location="<?php echo base_url()?>evaluacionProdServ/nuevaEvaluacionProdServ";
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
	<form action="<?php echo base_url()?>evaluacionProdServ/guardarEvaluacionProdServ" id="form1" method="POST">
		<table width="100%" border="0" cellspacing=8px" id="Tabla1">
			<tbody>
				<input type="hidden" name="accion" value="<?php echo $accion; ?>">
				<input type="hidden" name="id" value="<?php echo @$evaluacion[0]->IdEPS; ?>">
				<tr>
					<th class="izquierda">*	Número de Evaluaciones Programadas: </th>
					<td><input class="form-control" type="text" name="txtNumEvaluacionProgramadas" placeholder="Ingresar datos" value="<?php echo set_value('txtNumEvaluacionProgramadas', @$evaluacion[0]->NumEvaProdServProgramado); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">*	Frecuencia de Evaluación: </th>
					<td><input class="form-control" type="text" name="txtFrecuenciaEvaluacion" placeholder="Ingresar datos" value="<?php echo set_value('txtFrecuenciaEvaluacion', @$evaluacion[0]->FrecuenciaEvaluacion); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">Empleado Responsable:</th>
					<td>
						<select class="form-control" name="selectEmpleado" id="empleado" type="hidden" >
							<?php 
							foreach ($empleados as $items) {
								if ($items->CedulaEmpleado == @$evaluacion[0]->CiResponsable) { ?>
								<option selected="selected" value="<?php echo $items->CedulaEmpleado; ?>"><?php echo $items->ApellidoPaternoEmpleado." ".$items->ApellidoMaternoEmpleado. " ".$items->NombresEmpleado;?></option>
								<?php }else{ ?>
								<option value="<?php echo $items->CedulaEmpleado; ?>"><?php echo $items->ApellidoPaternoEmpleado." ".$items->ApellidoMaternoEmpleado. " ".$items->NombresEmpleado;?></option>
								<?php }
							} ?>
						</select>
					</td>
				</tr>
				<tr>
					<th class="izquierda">*	Objetivo: </th>
					<td><input class="form-control" type="text" name="txtObjetivo" placeholder="Ingresar datos" value="<?php echo set_value('txtObjetivo', @$evaluacion[0]->Objetivo); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">*	Número de Evaluaciones Efectuadas: </th>
					<td><input class="form-control" type="text" name="txtNumEvaluacionEfectuadas" placeholder="Ingresar datos" value="<?php echo set_value('txtNumEvaluacionEfectuadas', @$evaluacion[0]->NumEvaProdSerEfectuados); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">*	Número de Productos: </th>
					<td><input class="form-control" type="text" name="txtNumDeProductos" placeholder="Ingresar datos" value="<?php echo set_value('txtNumDeProductos', @$evaluacion[0]->NumProductos); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">*	Número de Servicios: </th>
					<td><input class="form-control" type="text" name="txtNumDeServicios" placeholder="Ingresar datos" value="<?php echo set_value('txtNumDeServicios', @$evaluacion[0]->NumServicios); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">*	Número de Productos Reclamados por Afectación de la Salud: </th>
					<td><input class="form-control" type="text" name="txtNumProdReclaAfectaSalud" placeholder="Ingresar datos" value="<?php echo set_value('txtNumProdReclaAfectaSalud', @$evaluacion[0]->NumProductosReclamadosAfectaSalud); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">*	Número de Servicios Reclamados: </th>
					<td><input class="form-control" type="text" name="txtNumServiciosReclamados" placeholder="Ingresar datos" value="<?php echo set_value('txtNumServiciosReclamados', @$evaluacion[0]->NumServiciosReclamados); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">*	Número de Productos Etiquetados: </th>
					<td><input class="form-control" type="text" name="txtNumProdEtiquetados" placeholder="Ingresar datos" value="<?php echo set_value('txtNumProdEtiquetados', @$evaluacion[0]->NumProductosEtiquetados); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">*	Número de Productos Retirados: </th>
					<td><input class="form-control" type="text" name="txtNumProdRetirados" placeholder="Ingresar datos" value="<?php echo set_value('txtNumProdRetirados', @$evaluacion[0]->NumProductosRetirados); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">*	Número de Productos con Normas de Etiquetado: </th>
					<td><input class="form-control" type="text" name="txtNumProdConNormasEtiquetado" placeholder="Ingresar datos" value="<?php echo set_value('txtNumProdConNormasEtiquetado', @$evaluacion[0]->NumProdConNormasEtiquetado); ?>"></td>
				</tr>			
				<tr>
					<th class="izquierda">*	Fecha de Mes: </th>
					<td>
				<div class='input-group date' id='divMiCalendario'>
                      <input type='text' id="txtFechaMes" name="txtFechaMes" class="form-control" value="<?php echo set_value('txtFechaMes', @$evaluacion[0]->FechaMes); ?>"/>
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
   </script>