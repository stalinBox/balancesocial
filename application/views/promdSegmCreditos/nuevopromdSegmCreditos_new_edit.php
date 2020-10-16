<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datetimepicker.min.css" >
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datepicker.css" > 

<script type="text/javascript">
	function regresar(){
		window.location="<?php echo base_url()?>promdSegmCredito/promdSegmCreditos";
	}

	function limpiar() {
		var t = document.getElementById("form1").getElementsByTagName("input");
//var t = document.getElementById("TAB").getElementsByTagName("input");
for (var i=0; i<t.length; i++) {
	if (t[i].type == "text") {    
		t[i].value = "";
	}
}
window.location="<?php echo base_url()?>promdSegmCredito/nuevoPromdSegmCredito";
}
</script>
<?php 
$tipoSegmento = array(
	'1' => "Concedidos a Nivel Consolidado",
	'2' => "Concedidos por Primera Vez",
	'3' => "Concedidos a Mujeres"
	);

	?>
	<h3 class="page-header" align="center"><span class="glyphicon glyphicon-th-list"></span> <?php echo $titulo; ?></h3>
	<div id="TAB">
		<div class="error"> 
			<center>
				<?php messages_flash('danger',validation_errors(),'Errores del formulario', true); ?>
			</center>
		</div>
		<form action="<?php echo base_url()?>promdSegmCredito/guardarPromdSegmCredito" id="form1" method="POST">
			<table width="100%" cellspacing=8px" id="Tabla1">
				<tbody>
					<input type="hidden" name="accion" value="<?php echo $accion; ?>">
					<input type="hidden" name="id" value="<?php echo @$promedioSegmentoCredito[0]->IdPromedioSegmento; ?>">
					<tr>
						<th class="izquierda">Nombre del Segmento: </th>
						<td><input class="form-control" type="text" name="txtNombreSegemento" placeholder="Ingresar datos" value="<?php echo set_value('txtNombreSegemento', @$promedioSegmentoCredito[0]->NombreSegmento); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">Tipo de Segmento:</th>
						<td>
							<select class="form-control" name="selectTipoSegmento">
								<?php 
								foreach ($tipoSegmento as $key) {
									if ($key == @$promedioSegmentoCredito[0]->TipoSegmentoCredito) { ?>
									<option selected="selected" > <?php echo $key; ?></option>											
									<?php	}else{ ?>
									<option> <?php echo $key; ?></option>
									<?php 	}
								} ?>							
							</select>
						</td>
					</tr>			
					<tr>
						<th class="izquierda">Monto: </th>
						<td><input class="form-control" type="text" name="txtMonto" placeholder="Ingresar datos" value="<?php echo set_value('txtMonto', @$promedioSegmentoCredito[0]->MontoColocado); ?>"></td>
					</tr>
					
					<tr>
						<th class="izquierda">Número de Operaciones: </th>
						<td><input class="form-control" type="text" name="txtOperaciones" placeholder="Ingresar datos" value="<?php echo set_value('txtOperaciones', @$promedioSegmentoCredito[0]->Operaciones); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">Fecha del Mes: </th>
						<td>
							<div class='input-group date' id='divMiCalendario'>
                      			<input type='text' id="txtFechaMes" name="txtFechaMes" class="form-control" value="<?php echo set_value('txtFechaMes', @$promedioSegmentoCredito[0]->FechaMes); ?>" readonly/>
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