<script type="text/javascript">
	function regresar(){
		window.location="<?php echo base_url()?>tablaFuncion/tablasFunciones";
	}
	function limpiar() {
		var t = document.getElementById("form1").getElementsByTagName("input");
	//var t = document.getElementById("TAB").getElementsByTagName("input");
	for (var i=0; i<t.length; i++) {
		if (t[i].type == "text") {		
			t[i].value = "";
		}
	}
	window.location="<?php echo base_url()?>tablaFuncion/nuevaTablaFuncion";
	}
</script>



<h3 class="page-header" align="center"><span class="glyphicon glyphicon-th-list"></span> <?php echo $titulo; ?></h3>

<div id="TAB">
	<div class="error"> 
		<center>
			<?php messages_flash('danger',validation_errors(),'Errores del formulario', true); ?>
		</center>
	</div>
	<form action="<?php echo base_url()?>tablaFuncion/guardarTablaFuncion" id="form1" method="POST">
		<table width="100%" cellspacing=8px" id="Tabla1">
			<tbody>
				<input type="hidden" name="accion" value="<?php echo $accion; ?>">
				<input type="hidden" name="id" value="<?php echo @$tablaFuncion[0]->IdTabla; ?>">
				<tr>
					<th class="izquierda">Nombre de la Tabla: </th>
					<td>
						<input class="form-control" type="text" name="txtTabla"  placeholder="Ingresar datos" value="<?php echo set_value('txtTabla',@$tablaFuncion[0]->Nombre); ?>" readonly>
					</td>
				</tr>
				<tr>
					<th class="izquierda">Función: </th>
					<td><input class="form-control" type="text" name="txtObjetoControlador"  placeholder="Ingresar datos" value="<?php echo set_value('txtObjetoControlador',@$tablaFuncion[0]->ObjetoControlador);?>" readonly></td>
				</tr>
				<tr>
					<th class="izquierda">Dirección del Sistema: </th>
					<td><input class="form-control" type="text" name="txtURL"  placeholder="Ingresar datos" value="<?php echo set_value('txtURL',@$tablaFuncion[0]->URL); ?>" readonly></td>
				</tr>
				<tr>
					<th class="izquierda">Observación: </th>
					<td><input class="form-control" type="text" name="txtObservacion"  placeholder="Ingresar datos" value="<?php echo set_value('txtObservacion',@$tablaFuncion[0]->Observacion); ?>"></td>
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