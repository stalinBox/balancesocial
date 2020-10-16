<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datetimepicker.min.css" >
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datepicker.css" > 

<script type="text/javascript">
	function regresar(){
		window.location="<?php echo base_url()?>ahorroEnEscala/ahorrosEnEscala";
	}
	
	function limpiar() {
		var t = document.getElementById("form1").getElementsByTagName("input");
//var t = document.getElementById("TAB").getElementsByTagName("input");
for (var i=0; i<t.length; i++) {
	if (t[i].type == "text") {		
		t[i].value = "";
	}
}
window.location="<?php echo base_url()?>ahorroEnEscala/nuevoAhorroEnEscala";
}
</script>
<h3 class="page-header" align="center"><span class="glyphicon glyphicon-th-list"></span> <?php echo $titulo; ?></h3>
<div id="TAB">
	<div class="error"> 
		<center>
			<?php e messages_flash('danger',validation_errors(),'Errores del formulario', true); ?>
		</center>
	</div>
	<form action="<?php echo base_url()?>ahorroEnEscala/guardarahorroEnEscala" id="form1" method="POST">
		<table width="100%" cellspacing=8px" id="Tabla1">
			<tbody>		  
				<input type="hidden" name="accion" value="<?php echo $accion; ?>">
				<input type="hidden" name="id" value="<?php echo @$ahorroEnEscala[0]->IdAhorro; ?>">
				<tr>
					<th class="izquierda">*	Iniciativa: </th>
					<td>
						<input class="form-control" type="text" name="txtIniciativa"  placeholder="Ingresar datos" value="<?php echo set_value('txtIniciativa',@$ahorroEnEscala[0]->Iniciativa); ?>">
					</td>
				</tr>
				<tr>
					<th class="izquierda">*	Valor ($) Individual: </th>
					<td><input class="form-control" type="text" name="txtIndividual"  placeholder="Ingresar datos" value="<?php echo set_value('txtIndividual',@$ahorroEnEscala[0]->Individual); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">*	Valor ($) Colectivo: </th>
					<td><input class="form-control" type="text" name="txtColectivo"  placeholder="Ingresar datos" value="<?php echo set_value('txtColectivo',@$ahorroEnEscala[0]->Colectivo) ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">*	Diferencia: </th>
					<td><input class="form-control" type="text" name="txtDiferencia"  placeholder="Ingresar datos" value="<?php echo set_value('txtDiferencia',@$ahorroEnEscala[0]->Diferencia); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">Procentaje de Ahorro: </th>
					<td><input class="form-control" type="text" name="txtPorcentajeAhorro"  placeholder="Ingresar datos" value="<?php echo set_value('txtPorcentajeAhorro',@$ahorroEnEscala[0]->PorcentajeAhorro) ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">*	Fecha del Mes: </th>
					<td>

					 <div class='input-group date' id='divMiCalendario'>
                      <input type='text' id="txtFechaEmisionInforme" name="txtFechaMes" class="form-control" value="<?php echo set_value('txtFechaMes',@$ahorroEnEscala[0]->FechaMes) ?>" />
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>

					</td>
				</tr>
				<tr>
					<th class="izquierda">*	Periodo: </th>
					<td>
				<div class='input-group date' id='divPeriodo'>
                      <input type='text' id="txtPeriodo" name="txtPeriodo" class="form-control" value="<?php echo set_value('txtPeriodo',@$ahorroEnEscala[0]->Periodo) ?>" />
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
				<td><input type="submit" name="submit" class="botones" value="Guardar"></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td><td></td>
				<td></td>
				<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
			</tr>
		</table>
	</form>
	<center>
		<div style="font-size: 16px; color: #FE2E2E;"> 
			<?php 
			echo isset($error) ? utf8_decode($error) : '';
			?>            
		</div>
	</center>
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