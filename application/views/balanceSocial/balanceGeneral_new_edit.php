<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datetimepicker.min.css" >
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datepicker.css" > 

<script type="text/javascript">
	function regresar(){
		window.location="<?php echo base_url()?>balanceSocial/balancesGenerales";
	}

	var statSend = false;
	function checkSubmit() {
	    if (!statSend) {
	        statSend = true;
	        return true;
	    } else {
	        alert("El Archivo ya se esta enviando...");
	        return false;
	    }
	}
</script>


<h3 class="page-header" align="center"><span class="glyphicon glyphicon-th-list"></span> <?php echo $titulo; ?></h3>
<div id="TAB">
	<div class="error"> 
		<center>
			<?php  messages_flash('danger',validation_errors(),'Errores del formulario', true); ?>
		</center>
	</div>
<div class="container">
	<dl>Los campos con * son obligatorios</dl>
</div>
	<form action="<?php echo base_url()?>balanceSocial/guardarBalanceGeneral" id="form1" method="POST" enctype="multipart/form-data" onsubmit="return checkSubmit();">
		<table width="100%" cellspacing=8px" id="Tabla1">
			<tbody>		  
				<input type="hidden" name="accion" value="<?php echo $accion; ?>">
				<input type="hidden" name="id" value="<?php echo @$acuerdoEmpresa[0]->IdAcuerdos; ?>">
				<tr>
					<th class="izquierda">*	Nombre: </th>
					<td><input class="form-control" type="text" name="txtNombre"  placeholder="Ingresar datos" value="<?php echo set_value('txtNombre',@$acuerdoEmpresa[0]->NombreAcuerdo); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">*	Fecha de Registro: </th>
					<td>
					<div class='input-group date' id='divMiCalendario'>
                      <input type='text' id="txtFechaRegistro" name="txtFechaRegistro" class="form-control" value="<?php echo set_value('txtFechaRegistro',@$acuerdoEmpresa[0]->FechaRegistro) ?>" readonly/>
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>
					</td>
				</tr>
			    <tr>
			        <th class="izquierda">Seleccionar Archivo: </th>
			        <td>
			          <input type="file" id="archivo" name="archivo"/>
			        </td>
			    </tr>

				<tr>
					<th class="izquierda">*	Periodo: </th>
					<td>

					<div class='input-group date' id='divPeriodo'>
                      <input type='text' id="txtPeriodo" name="txtPeriodo" class="form-control" value="<?php echo set_value('txtPeriodo',@$acuerdoEmpresa[0]->Periodo); ?>" readonly/>
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