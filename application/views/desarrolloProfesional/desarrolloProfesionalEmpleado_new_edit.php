<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datetimepicker.min.css" >
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datepicker.css" >

<script type="text/javascript">
	function regresar(){
		window.location="<?php echo base_url()?>desarrolloProfesional/desarrolloEmpleado";
	}

	function limpiar() {
		var t = document.getElementById("form1").getElementsByTagName("input");
//var t = document.getElementById("TAB").getElementsByTagName("input");
for (var i=0; i<t.length; i++) {
	if (t[i].type == "text") {    
		t[i].value = "";
	}
}
window.location="<?php echo base_url()?>desarrolloProfesional/nuevoDesarrolloProfesionalEmpleado";
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
	<form action="<?php echo base_url()?>desarrolloProfesional/guardarDesarrolloProfesionalEmpleado" id="form1" method="POST">
		<table width="100%" cellspacing=8px" id="Tabla1">
			<tbody>
				<input type="hidden" name="accion" value="<?php echo $accion; ?>">
				<input type="hidden" name="id" value="<?php echo @$desarrolloProfesionalEmpleado[0]->IdEmpleadoDesarrollo; ?>">
				<tr>
					<th class="izquierda">Empleado:</th>
					<td>
						<select class="form-control" name="selectEmpleado" id="empleado" type="hidden" >
							<?php 
							foreach ($empleados as $items) {
								if ($items->CedulaEmpleado == @$desarrolloProfesionalEmpleado[0]->CiEmpleado) { ?>
								<option selected="selected" value="<?php echo $items->CedulaEmpleado; ?>"><?php echo $items->ApellidoPaternoEmpleado." ".$items->ApellidoMaternoEmpleado. " ".$items->NombresEmpleado;?></option>
								<?php }else{ ?>
								<option value="<?php echo $items->CedulaEmpleado; ?>"><?php echo $items->ApellidoPaternoEmpleado." ".$items->ApellidoMaternoEmpleado. " ".$items->NombresEmpleado;?></option>
								<?php }
							} ?>
						</select>
					</td>
				</tr>
				<tr>
					<th class="izquierda">Área de Desarrollo: </th>
					<td><input class="form-control" type="text" name="txtDesarrolloProfesional" placeholder="Ingresar datos" value="<?php echo set_value('txtDesarrolloProfesional', @$desarrolloProfesionalEmpleado[0]->DesarrolloProfesional); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">Descripción: </th>
					<td><input class="form-control" type="text" name="txtDescripcion" placeholder="Ingresar datos" value="<?php echo set_value('txtDescripcion', @$desarrolloProfesionalEmpleado[0]->Descripcion); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">*	Horas por Mes: </th>
					<td><input class="form-control" type="text" name="txtHoraMes" placeholder="Ingresar datos" value="<?php echo set_value('txtHoraMes', @$desarrolloProfesionalEmpleado[0]->HorasMes); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">*	Fecha del Mes: </th>
					<td>
					<div class='input-group date' id='divMiCalendario'>
                      <input type='text' id="txtFechaMes" name="txtFechaMes" class="form-control" value="<?php echo set_value('txtFechaMes', @$desarrolloProfesionalEmpleado[0]->FechaPertenece); ?>" readonly/>
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