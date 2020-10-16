<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datetimepicker.min.css" >
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datepicker.css" > 

<script type="text/javascript">
	function regresar(){
		window.location="<?php echo base_url()?>imagenInstitucional/imagenesInstitucionales";
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

	<form action="<?php echo base_url()?>imagenInstitucional/guardarImagenInstitucional" id="form1" method="POST" enctype="multipart/form-data">
		<table width="100%" cellspacing=8px" id="Tabla1">
			<tbody>
				<input type="hidden" name="accion" value="<?php echo $accion; ?>">
				<input type="hidden" name="id" value="<?php echo @$imagenInstitucional[0]->IdImgInstucional; ?>">

				<tr>
					<th class="izquierda">Ícono</th>
					<td>
						<img src="data:image/jpg;base64, <?php echo base64_encode(@$imagenInstitucional[0]->Icono) ?>" width="100" height="100" >
					</td>
				</tr>
				<tr>
					<th class="izquierda">Seleccionar Imagen: </th>
					<td>
						<input type="file" name="inputFotoIcono">
					</td>
				</tr>
				<tr>
					<th class="izquierda">*	Logo</th>
					<td>
						<img src="data:image/jpg;base64, <?php echo base64_encode(@$imagenInstitucional[0]->Logotipo) ?>" width="100" height="100" >
					</td>
				</tr>
				<tr>
					<th class="izquierda">Seleccionar Imagen: </th>
					<td>
						<input type="file" name="inputFotoLogotipo">
					</td>
				</tr>
				<tr>
					<th class="izquierda">*	Eslogan de la Empresa:</th>
					<td>
						<textarea name="txtEslogan" rows="3" cols="50"><?php echo set_value('txtEslogan', @$imagenInstitucional[0]->Eslogan);?></textarea>
					</td>
				</tr>  
				<tr>
					<th class="izquierda">Imagen Principal de la Memoria</th>
					<td>
						<img src="data:image/jpg;base64, <?php echo base64_encode(@$imagenInstitucional[0]->ImgPrincipalMemoria) ?>" width="100" height="100" >
					</td>
				</tr>
				<tr>
					<th class="izquierda">Seleccionar Imagen: </th>
					<td>
						<input type="file" name="inputFotoImgPrincipalMemoria">
					</td>
				</tr>
				<tr>
					<th class="izquierda">Imagen de la Introducción de la Memoria</th>
					<td>
						<img src="data:image/jpg;base64, <?php echo base64_encode(@$imagenInstitucional[0]->ImgIntroduccionMemoria) ?>" width="100" height="100" >
					</td>
				</tr>
				<tr>
					<th class="izquierda">Seleccionar Imagen: </th>
					<td>
						<input type="file" name="inputFotoImgIntroduccionMemoria">
					</td>
				</tr>
				<tr>
					<th class="izquierda">Foto del Mensaje del Presidente</th>
					<td>
						<img src="data:image/jpg;base64, <?php echo base64_encode(@$imagenInstitucional[0]->FotoPresidente) ?>" width="100" height="100" >
					</td>
				</tr>
				<tr>
					<th class="izquierda">Seleccionar Imagen: </th>
					<td>
						<input type="file" name="inputFotoFotoPresidente">
					</td>
				</tr>
				<tr>
					<th class="izquierda">Foto del Mensaje de la Gerencia</th>
					<td>
						<img src="data:image/jpg;base64, <?php echo base64_encode(@$imagenInstitucional[0]->FotoGerencia) ?>" width="100" height="100" >
					</td>
				</tr>
				<tr>
					<th class="izquierda">Seleccionar Imagen: </th>
					<td>
						<input type="file" name="inputFotoFotoGerencia">
					</td>
				</tr>
				<tr>
					<th class="izquierda">Foto de los Ejecutivos</th>
					<td>
						<img src="data:image/jpg;base64, <?php echo base64_encode(@$imagenInstitucional[0]->FotoEjecutivos) ?>" width="100" height="100" >
					</td>
				</tr>
				<tr>
					<th class="izquierda">Seleccionar Imagen: </th>
					<td>
						<input type="file" name="inputFotoFotoEjecutivos">
					</td>
				</tr>
				<tr>
					<th class="izquierda">Foto de los Representantes</th>
					<td>
						<img src="data:image/jpg;base64, <?php echo base64_encode(@$imagenInstitucional[0]->FotoRepresentantes) ?>" width="100" height="100" >
					</td>
				</tr>
				<tr>
					<th class="izquierda">Seleccionar Imagen: </th>
					<td>
						<input type="file" name="inputFotoFotoRepresentantes">
					</td>
				</tr>
				<tr>
					<th class="izquierda">Foto sobre los Productos y Servicios</th>
					<td>
						<img src="data:image/jpg;base64, <?php echo base64_encode(@$imagenInstitucional[0]->FotoProductosServicios) ?>" width="100" height="100" >
					</td>
				</tr>
				<tr>
					<th class="izquierda">Seleccionar Imagen: </th>
					<td>
						<input type="file" name="inputFotoProductosServicios">
					</td>
				</tr>
				<tr>
					<th class="izquierda">Foto sobre el aporte a la Comunidad</th>
					<td>
						<img src="data:image/jpg;base64, <?php echo base64_encode(@$imagenInstitucional[0]->FotosAporteComunidad) ?>" width="100" height="100" >
					</td>
				</tr>
				<tr>
					<th class="izquierda">Seleccionar Imagen: </th>
					<td>
						<input type="file" name="inputFotoFotosAporteComunidad">
					</td>
				</tr>

				<tr>
					<th class="izquierda">Periodo: </th>
					<td>
					<div class='input-group date' id='divPeriodo'>
                      <input type='text' id="txtPeriodo" name="txtPeriodo" class="form-control" value="<?php echo set_value('txtPeriodo', @$imagenInstitucional[0]->Periodo); ?>" readonly/>
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>

					</td>
				</tr>



				<tr>
					<th class="izquierda">Fecha de Registro: </th>
					<td>
						
						<div class='input-group date' id='divMiCalendario'>
                      <input type='text' id="txtFechaRegistro" name="txtFechaRegistro" class="form-control" value="<?php echo set_value('txtFechaRegistro', @$imagenInstitucional[0]->FechaRegistro); ?>" readonly/>
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