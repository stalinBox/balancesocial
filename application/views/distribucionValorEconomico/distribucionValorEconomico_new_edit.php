<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datetimepicker.min.css" >
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datepicker.css" > 

<script type="text/javascript">
	function regresar(){
		window.location="<?php echo base_url()?>distribucionValorEconomico/distribucionesValorEconomico";
	}

	function limpiar() {
		var t = document.getElementById("form1").getElementsByTagName("input");
//var t = document.getElementById("TAB").getElementsByTagName("input");
for (var i=0; i<t.length; i++) {
	if (t[i].type == "text") {    
		t[i].value = "";
	}
}
window.location="<?php echo base_url()?>distribucionValorEconomico/nuevoDistribucionesValorEconomico";
}
</script>
<?php 
$tipo = array(
	'1' => "Distribuido",
	'2' => "Generado"
	);
	?>
	<h3 class="page-header" align="center"><span class="glyphicon glyphicon-th-list"></span> <?php echo $titulo; ?></h3>
	<div id="TAB">
		<div class="error"> 
			<center>
				<?php messages_flash('danger',validation_errors(),'Errores del formulario', true); ?>
			</center>
		</div>
		<form action="<?php echo base_url()?>distribucionValorEconomico/guardarDistribucionesValorEconomico" id="form1" method="POST">
			<table width="100%" cellspacing=8px" id="Tabla1">
				<tbody>
					<input type="hidden" name="accion" value="<?php echo $accion; ?>">
					<input type="hidden" name="id" value="<?php echo @$distribucionValorEconomico[0]->IdDVE; ?>">
					<tr>
						<th class="izquierda">Tipo de Distribución:</th>
						<td>
							<select class="form-control" name="selectTipoDistribucion">
								<?php 
								foreach ($tipo as $key) {
									if ($key == @$distribucionValorEconomico[0]->TipoDistribucion) { ?>
									<option selected="selected" > <?php echo $key; ?></option>											
									<?php	}else{ ?>
									<option> <?php echo $key; ?></option>
									<?php 	}
								} ?>
							</select>
						</td>
					</tr>				
					<tr>
						<th class="izquierda">SubTipo de Distribución: </th>
						<td><input class="form-control" type="text" name="txtSubTipo" placeholder="Ingresar datos" value="<?php echo set_value('txtSubTipo', @$distribucionValorEconomico[0]->SubTipoDistribucion); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">Nombre de la Cuenta: </th>
						<td><input class="form-control" type="text" name="txtNombreCuenta" placeholder="Ingresar datos" value="<?php echo set_value('txtNombreCuenta', @$distribucionValorEconomico[0]->NombreSubCuenta); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">Saldo: </th>
						<td><input class="form-control" type="text" name="txtSaldo" placeholder="Ingresar datos" value="<?php echo set_value('txtSaldo', @$distribucionValorEconomico[0]->Saldo); ?>"></td>
					</tr>
					<tr>
						<th class="izquierda">Fecha: </th>
						<td>
							<div class='input-group date' id='divMiCalendario'>
                      			<input type='text' id="txtFechaMes" name="txtFechaMes" class="form-control" value="<?php echo set_value('txtFechaMes', @$distribucionValorEconomico[0]->FechaMes); ?>" readonly/>
                      			<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      			</span>
                    		</div>
						</td>
					</tr>
					<tr>
						<th class="izquierda">Periodo: </th>
						<td>
						<div class='input-group date' id='divPeriodo'>
                      		<input type='text' id="txtPeriodo" name="txtPeriodo" class="form-control" value="<?php echo set_value('txtPeriodo', @$distribucionValorEconomico[0]->Periodo); ?>" readonly/>
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