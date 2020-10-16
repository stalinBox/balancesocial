<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datetimepicker.min.css" >
<script type="text/javascript">
	function regresar(){
		window.location="<?php echo base_url()?>empresa";
	}
</script>
<?php 
/*
echo "Permiso Inf de Empresa";
echo @$permisos[0]->Ver;
echo @$permisos[0]->Agregar;
echo @$permisos[0]->Actualizar;
echo @$permisos[0]->Eliminar;
*/
 ?>
<h3 class="page-header" align="center"><span class="glyphicon glyphicon-th-list"></span> <?php echo $titulo; ?></h3>
<div id="TAB">
	<div class="error"> 
		<center>
		<?php 		
			messages_flash('danger',validation_errors(),'Errores del formulario', true);
		?>
		</center>
	</div>
<div class="container">
	<dl>Los campos con * son obligatorios</dl>
</div>
	<form action="<?php echo base_url()?>empresa/guardarEmpresa" id="form1" method="POST">
		<table width="100%" cellspacing=8px" id="Tabla1">
			<tbody>
				<input type="hidden" name="accion" value="<?php echo $accion; ?>">
				<input type="hidden" name="IdEmpresa" value="<?php echo @$empresa[0]->IdEmpresa; ?>">
				<tr>
					<th class="izquierda">*Nombre de la Empresa: </th>
					<td>
						<input class="form-control" type="text" name="txtEmpresa"  placeholder="Ingresar datos" 
						value="<?php echo set_value('txtEmpresa', @$empresa[0]->NombreEmpresa); ?>">
					</td>
				</tr>
				<tr>
					<th class="izquierda">*RUC: </th>
					<td><input class="form-control" type="text" name="txtRUC"  placeholder="Ingresar datos" value="<?php echo set_value('txtRUC', @$empresa[0]->RucEmpresa); ?>"></td>
				</tr>

				<tr>
					<th class="izquierda">*Correo Administrador: </th>
					<td><input class="form-control" type="text" name="txtMailAdmin"  placeholder="Ingresar datos" value="<?php echo set_value('txtMailAdmin', @$empresa[0]->Mail); ?>"></td>
				</tr>

				<tr>
					<th class="izquierda">*Contraseña: </th>
					<td><input class="form-control" type="password" name="txtContrasenia"  placeholder="Ingresar datos" value="<?php echo set_value('txtContrasenia', @$empresa[0]->ContraseniaEmpresa); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">*Confirmar Contraseña: </th>
					<td><input class="form-control" type="password" name="txtContrasenia2"  placeholder="Ingresar datos" value="<?php echo @$empresa[0]->ContraseniaEmpresa; ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">*Capital de la Empresa: </th>
					<td><input class="form-control" type="text" name="txtCapital"  placeholder="Ingresar datos" value="<?php echo set_value('txtCapital', @$empresa[0]->CapitalEmpresa); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">Fecha de Constitución: </th>
					<td>
					<div class='input-group date' id='divMiCalendario'>
                      <input type='text' id="txtFechaConstitucion" name="txtFechaConstitucion" class="form-control" value="<?php echo set_value('txtFechaConstitucion', @$empresa[0]->FechaRegistroEmpresa); ?>" readonly/>
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>
                </td>
				</tr>
				<tr>
					<th class="izquierda">*Fecha de Registro Mercantil: </th>
					<td>
					<div class='input-group date' id='divMiCalendario2'>
                      <input type='text' id="txtFechaRegistro" name="txtFechaRegistro" class="form-control" value="<?php echo set_value('txtFechaRegistro', @$empresa[0]->FechaRegistroEmpresa); ?>" readonly/>
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div></td>
				</tr>
				<tr>
					<th class="izquierda">*Cantidad de Fundadores: </th>
					<td><input class="form-control" type="text" name="txtCantFundadores"  placeholder="Ingresar datos" value="<?php echo set_value('txtCantFundadores', @$empresa[0]->CantidadFundadoresEmpresa); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">*Dirección: </th>
					<td><input class="form-control" type="text" name="txtDireccion"  placeholder="Ingresar datos" value="<?php echo set_value('txtDireccion', @$empresa[0]->DireccionEmpresa); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">Página Web: </th>
					<td><input class="form-control" type="text" name="txtPaginaWeb"  placeholder="Ingresar datos" value="<?php echo set_value('txtPaginaWeb', @$empresa[0]->PaginaWeb); ?>"></td>
				</tr>
				<tr>
					<th class="izquierda">*Teléfono: </th>
					<td><input class="form-control" type="text" name="txtTelefono"  placeholder="Ingresar datos" value="<?php echo set_value('txtTelefono', @$empresa[0]->TelefonoEmpresa); ?>"></td>
				</tr>
				<!--
				<tr>
					<th class="izquierda">Organigrama: [Agregar form de carga de imagen]</th>
					<td><input class="form-control" type="text" name="txtOrganigrama"  placeholder="Ingresar datos" value="<?php echo set_value('txtOrganigrama', @$empresa[0]->TelefonoEmpresa); ?>"></td>
				</tr>
				-->
				<tr>
					<th class="izquierda">Historia:</th>
					<td>
						<textarea name="txtAreaHistoria" rows="10" cols="50"><?php echo set_value('txtAreaHistoria', @$empresa[0]->HistoriaEmpresa);?></textarea>
					</td>
				</tr>  
				<tr>
					<th class="izquierda">Misión:</th>
					<td>
						<textarea name="txtAreaMision" rows="10" cols="50"><?php echo set_value('txtAreaMision', @$empresa[0]->MisionEmpresa);?></textarea>
					</td>
				</tr>  
				<tr>
					<th class="izquierda">Visión:</th>
					<td>
						<textarea name="txtAreaVision" rows="10" cols="50"><?php echo set_value('txtAreaVision', @$empresa[0]->VisionEmpresa);?></textarea>
					</td>
				</tr> 
			</tbody>
		</table>

		<table>
			<tr>
				<br>
			</tr>
			<tr>
				<td>	<?php 
				if($this->session->userdata("IdEmpresaSesion")){
					if (@$permisos[0]->Actualizar == 1 OR @$admin == 1) { 
						echo '<input type="submit" name="submit" class="botones" value="Guardar">';
					}
				}else{
					echo '<input type="submit" name="submit" class="botones" value="Guardar">';
				}				 
				?>
				<td></td>		
				<td></td>
				<td> <input type="button" onclick="regresar()" name="" class="botones" value="Regresar"></td>
				</td>
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

   <script type="text/javascript">
     $('#divMiCalendario').datetimepicker({
          format: 'YYYY-MM-DD'
      });
     $('#divMiCalendario2').datetimepicker({
          format: 'YYYY-MM-DD'
      });
   </script>