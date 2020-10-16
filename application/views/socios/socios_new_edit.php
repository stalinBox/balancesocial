<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.min.css">
<script type="text/javascript">
	function regresar(){
		window.location="<?php echo base_url()?>socio/socios";
	}

	function limpiar() {
		var t = document.getElementById("form1").getElementsByTagName("input");
//var t = document.getElementById("TAB").getElementsByTagName("input");
for (var i=0; i<t.length; i++) {
	if (t[i].type == "text") {    
		t[i].value = "";
	}
}
window.location="<?php echo base_url()?>socio/nuevoSocio";
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
	<form action="<?php echo base_url()?>socio/guardarSocio" id="form1" method="POST">
		<table width="100%" cellspacing=8px" id="Tabla1">
			<tbody>
				<input type="hidden" name="accion" value="<?php echo $accion; ?>">
				<input type="hidden" name="id" value="<?php echo @$socio[0]->IdSocios; ?>">
				<tr>
					<th class="izquierda">* Número de Socios Incorporados: </th>
					<td><input class="form-control" type="text" name="txtNumSociosIncorporados" placeholder="Ingresar datos" value="<?php echo set_value('txtNumSociosIncorporados', @$socio[0]->NumSociosIncorporados); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">* Número de Socios Retirados: </th>
					<td><input class="form-control" type="text" name="txtNumSociosRetirados" placeholder="Ingresar datos" value="<?php echo set_value('txtNumSociosRetirados', @$socio[0]->NumSociosRetirados); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">* Número de Socios Activos: </th>
					<td><input class="form-control" type="text" name="txtNumSociosActivos" placeholder="Ingresar datos" value="<?php echo set_value('txtNumSociosActivos', @$socio[0]->NumSociosActivos); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">* Número de Socios Mujeres Activas: </th>
					<td><input class="form-control" type="text" name="txtNumSociosMujeresActivas" placeholder="Ingresar datos" value="<?php echo set_value('txtNumSociosMujeresActivas', @$socio[0]->NumSociosMujeresActivas); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">* Número Socios Activos con Cuenta de Ahorro:</th>
					<td><input class="form-control" type="text" name="txtNumSociosConCuentasDeAhorro" placeholder="Ingresar datos" value="<?php echo set_value('txtNumSociosConCuentasDeAhorro', @$socio[0]->NumSociosConCuentasDeAhorro); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">* Número de Personas Naturales Incorporadas: </th>
					<td><input class="form-control" type="text" name="txtNumPersonasNaturalesIncorporadas" placeholder="Ingresar datos" value="<?php echo set_value('txtNumPersonasNaturalesIncorporadas', @$socio[0]->NumPersonasNaturalesIncorporadas); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">* Número de Personas Jurídicas Incorporadas: </th>
					<td><input class="form-control" type="text" name="txtNumPersonasJuridicasIncorporadas" placeholder="Ingresar datos" value="<?php echo set_value('txtNumPersonasJuridicasIncorporadas', @$socio[0]->NumPersonasJuridicasIncorporadas); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">* Número de Socios con Cuenta de Ahorro Menores de Edad: </th>
					<td><input class="form-control" type="text" name="txtNumSociosConCuentaAhorroMenorA18Anios" placeholder="Ingresar datos" value="<?php echo set_value('txtNumSociosConCuentaAhorroMenorA18Anios', @$socio[0]->NumSociosConCuentaAhorroMenorA18Anios); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">* Número de Socios con Certificado de Aportación: </th>
					<td><input class="form-control" type="text" name="txtCantSociosConCertAportacion" placeholder="Ingresar datos" value="<?php echo set_value('txtCantSociosConCertAportacion', @$socio[0]->CantSociosConCertAportacion); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">* Número de Socios sin Certificado de Aportación: </th>
					<td><input class="form-control" type="text" name="txtCantSociosSinCertAportacion" placeholder="Ingresar datos" value="<?php echo set_value('txtCantSociosSinCertAportacion', @$socio[0]->CantSociosSinCertAportacion); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">* Valor Total de Certificados de Aportación: </th>
					<td><input class="form-control" type="text" name="txtValorTCertificadoAportacion" placeholder="Ingresar datos" value="<?php echo set_value('txtValorTCertificadoAportacion', @$socio[0]->ValorTCertificadoAportacion); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">* Valor Total de Certificados de Aportación Devueltos: </th>
					<td><input class="form-control" type="text" name="txtValorCertificadoAportacionDevueltos" placeholder="Ingresar datos" value="<?php echo set_value('txtValorCertificadoAportacionDevueltos', @$socio[0]->ValorCertificadoAportacionDevueltos); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">* Número de Socios Hombres con Certificados de Aportación: </th>
					<td><input class="form-control" type="text" name="txtNumSociosHombresConCertAportacion" placeholder="Ingresar datos" value="<?php echo set_value('txtNumSociosHombresConCertAportacion', @$socio[0]->NumSociosHombresConCertAportacion); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">* Número de Socios Mujeres con Certificado de Aportación: </th>
					<td><input class="form-control" type="text" name="txtNumSociosMujeresConCertAportacion" placeholder="Ingresar datos" value="<?php echo set_value('txtNumSociosMujeresConCertAportacion', @$socio[0]->NumSociosMujeresConCertAportacion); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">* Número de Clientes en el presente periodo: </th>
					<td><input class="form-control" type="text" name="txtNumTClientesNuevosPerido" placeholder="Ingresar datos" value="<?php echo set_value('txtNumTClientesNuevosPerido', @$socio[0]->NumTClientesNuevosPeriodo); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">* Número de Clientes retirados en el presente periodo: </th>
					<td><input class="form-control" type="text" name="txtNumTClientesRetirados" placeholder="Ingresar datos" value="<?php echo set_value('txtNumTClientesRetirados', @$socio[0]->NumTClientesRetiradosPeriodo); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">* Fecha de Mes: </th>

					<td>

					<div class='input-group date' id='divMiCalendario'>
                      <input type='text' id="txtFecha" name="txtMesPertenece" class="form-control" value="<?php echo set_value('txtMesPertenece', @$socio[0]->MesPertenece); ?>" />
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
				<td><input type="submit" name="submit" class="botones" value="Guardar">	</td>
				<td></td>
				<td></td>   
				<td></td>   
				<td><input type="button" onclick="regresar()" name="" class="botones" value="Regresar"></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td><td></td>
				<td></td>
				<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
			</tr>
		</table>
	</div>

<script src="<?php echo base_url()?>js/jquery.min.js"></script>
   <script src="<?php echo base_url()?>js/calendario/moment.min.js"></script>
   <script src="<?php echo base_url()?>js/calendario/bootstrap-datetimepicker.min.js"></script>
   <script src="<?php echo base_url()?>js/calendario/bootstrap-datetimepicker.es.js"></script>

<script type="text/javascript">
     $('#divMiCalendario').datetimepicker({
          format: 'YYYY-MM-DD'
      });
   </script>