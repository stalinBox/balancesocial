<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datetimepicker.min.css" >
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datepicker.css" > 

<script type="text/javascript">
	function regresar(){
		window.location="<?php echo base_url()?>empresa/sucursales";
	}
	
	function limpiar() {
		var t = document.getElementById("form1").getElementsByTagName("input");
//var t = document.getElementById("TAB").getElementsByTagName("input");
for (var i=0; i<t.length; i++) {
	if (t[i].type == "text") {		
		t[i].value = "";
	}
}
window.location="<?php echo base_url()?>empresa/nuevaSucursalEmpresa";
}
</script>
<?php 
$cumplimiento = array(
	'1' => "SI CUMPLE", 
	'2' => "NO CUMPLE"
	);
?>
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
		<form action="<?php echo base_url()?>empresa/guardarSucursalEmpresa" id="form1" method="POST">
			<table width="100%" cellspacing=8px" id="Tabla1">
				<tbody>
					<input type="hidden" name="accion" value="<?php echo $accion; ?>">
					<input type="hidden" name="id" value="<?php echo @$sucursalEmpresa[0]->IdSucursal; ?>">
					
					<tr>
						<th class="izquierda">*	Nombre: </th>
						<td><input class="form-control" type="text" name="txtNombre" placeholder="Ingresar datos" value="<?php echo set_value('txtNombre', @$sucursalEmpresa[0]->Nombre); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">*	Dirección: </th>
						<td><input class="form-control" type="text" name="txtDireccion" placeholder="Ingresar datos" value="<?php echo set_value('txtDireccion', @$sucursalEmpresa[0]->DireccionSucursal); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">Teléfonos: </th>
						<td><input class="form-control" type="text" name="txtTelefonos" placeholder="Ingresar datos" value="<?php echo set_value('txtTelefonos', @$sucursalEmpresa[0]->Telefonos); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">Celulares: </th>
						<td><input class="form-control" type="text" name="txtCelulares" placeholder="Ingresar datos" value="<?php echo set_value('txtCelulares', @$sucursalEmpresa[0]->Celulares); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">Observaciones: </th>
						<td><input class="form-control" type="text" name="txtObservaciones" placeholder="Ingresar datos" value="<?php echo set_value('txtObservaciones', @$sucursalEmpresa[0]->Observaciones); ?>"></td>
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
					<td></td>		
					<td><input type="submit" name="submit" class="botones" value="Guardar"></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>				
					<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
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