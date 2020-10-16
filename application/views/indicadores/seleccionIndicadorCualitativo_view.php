  <script src="<?php echo base_url()?>js/jquery.min.js"></script>
  <link rel="stylesheet"  href="<?php echo base_url() ?>css/bootstrap.min.css">
  <script src="<?php echo base_url()?>js/jquery-1.11.3.min.js"></script>
  <script src="<?php echo base_url()?>js/bootstrap.min.js"></script>
  <link href="<?php echo base_url()?>css/dataTables.bootstrap.min.css" rel="stylesheet"/>

<script type="text/javascript">
	function regresarIndicadorEmpresa(){
		window.location="<?php echo base_url()?>indicadorEmpresa/indicadoresCualitativosEmpresa"
	}
	function regresarIndicador(){
		window.location="<?php echo base_url()?>indicadorEmpresa/indicadoresCualitativosModulos";
	}
	function denegado() {
		alert("No cuenta con el permiso");
	}
</script>
<?php 
/*
echo "Agregar Indcadores Cualitativos ";
echo @$permisos[0]->Ver;
echo @$permisos[0]->Agregar;
echo @$permisos[0]->Actualizar;
echo @$permisos[0]->Eliminar;
*/
?>
	<div id="MANIPULACIONDATOS">
		<div id="menumanipulaciondatos">
			<ul class="manipdatos">
				<li>
				<?php if (@$permisos[0]->Agregar == 1 OR @$admin == 1){ ?>
					<a href="javascript:document.forms[0].submit()" title="Agregar"><img src="<?php echo base_url()?>imagenes/evaluaciones.png" width="20" height="20" alt=""/></a>
				<?php }else{ ?>
					<a href="#" onclick="denegado();"><img src="<?php echo base_url()?>imagenes/evaluaciones.png" width="20" height="20" alt=""/></a>
					<?php } ?>
					
				</li>
			</ul>
			<!--
			<ul class="manipdatos2">
				<li> 
					<a href="#" title="EDITAR"><img src="<?php echo base_url()?>imagenes/EDITAR.png" width="20" height="20" alt=""/></a>
				</li>
			</ul>
			<ul class="manipdatos">
				<li> 
					<a href="#" title="ELIMINAR"><img src="<?php echo base_url()?>imagenes/BORRAR-MENU.png" width="20" height="20" alt=""/></a>
				</li>
			</ul> -->
			<ul class="manipdatos2">
				<li> 
					<a href="#"
					<?php 
					if ($rutaRegreso) { ?>
					onclick="regresarIndicadorEmpresa()"
					<?php }else{ ?>
					onclick="regresarIndicador()"
					<?php }	?>
					title="Atras" ><img src="<?php echo base_url()?>imagenes/ATRAS.png" width="20" height="20" alt=""/></a>
				</li>
			</ul>
		</div>


	<div id="contenedor" style="margin:15px auto">
		<!-- 			<form action="<?php echo base_url()?>indicadorEmpresa/guardarIndicadoresCualitativosSeleccionados" id="form1" method="POST">
		<input type="hidden" name="rutaRegreso" value="<?php echo $rutaRegreso;?>"> -->
		<table id="tablaPaginada" class="table table-bordered table-striped table-hover">
					<thead>
						<tr class="horizontalazul">
							<th scope="col" class="clmn4" style="display:none">Seleccionado</th>						
							<th scope="col" class="clmn4">Sub-Dimensión</th>						
							<th scope="col" class="clmn7">Selección</th>
						</tr>
					</thead>  	
					<tfoot class="manip">
						<tr class="pietablamanipulacion">
							<td>DATOS</td>
							<td>PAG</td>
						</tr>
					</tfoot>  	
					<tbody>
						<?php 
					if ($rutaRegreso) { //si  voy a agregar, sólo muestro los restantes
						//$indicadores = $addIndicadoresCualitativosEmpresa;
						$indicadores = $indicadorCualitativoSubDimension;
						$filaAlterada = 0;
						if (!empty($indicadores)) {
							foreach ($indicadores as $key):								
							$filaAlterada++;
							if ($filaAlterada%2 == 0) { ?>
							<tr class="horizontalcuerpo">
								<th scope="col" class="clmn4" style="display:none"><?php echo $key->Seleccionado ?></th>
								<th scope="col" class="clmn4"><?php echo $key->SubDimension ?></th>
								<th scope="col" class="clmn7">
									<input type="checkbox" name="checkPermisoPerfil[]" value="<?php echo $key->SubDimension; ?>" <?php if ($key->Seleccionado==1) {
										echo 'checked';
									} ?> >
								</th>
							</tr>
							<?php
						}else{ ?>
						<tr class="horizontalcuerpo2">
							<th scope="col" class="clmn1" style="display:none"><?php echo $key->Seleccionado ?></th>
							<th scope="col" class="clmn1"><?php echo $key->SubDimension ?></th>
							<th class="clmn7">
								<input type="checkbox" name="checkPermisoPerfil[]" value="<?php echo $key->SubDimension; ?>" <?php if ($key->Seleccionado==1) {
										echo 'checked';
									} ?> >
							</th>
						</tr>
						<?php
					}
					?>
				<?php endforeach;
			}
					}else{ //si sólo quiero ver muestro todo
						$indicadores = $indicadorCualitativoSubDimension;
						$filaAlterada = 0;
						if (!empty($indicadores)) {
							foreach ($indicadores as $key): 								
							$filaAlterada++;
							if ($filaAlterada%2 == 0) { ?>
							<tr class="horizontalcuerpo">
								<th scope="col" class="clmn1" style="display:none"><?php echo $key->Seleccionado?></th>
								<th scope="col" class="clmn1"><?php echo $key->SubDimension?></th>
								<th scope="col" class="clmn7">
									<input type="checkbox" name="checkPermisoPerfil[]" value="<?php echo $key->SubDimension; ?>" <?php if ($key->Seleccionado==1) {
										echo 'checked';
									} ?> >
								</th>
							</tr>
							<?php
						}else{ ?>
						<tr class="horizontalcuerpo2">
							<th scope="col" class="clmn1" style="display:none"><?php echo $key->Seleccionado ?></th>		
							<th scope="col" class="clmn1"><?php echo $key->SubDimension ?></th>		
							<th scope="col" class="clmn7">
									<input type="checkbox" name="checkPermisoPerfil[]" value="<?php echo $key->SubDimension; ?>" <?php if ($key->Seleccionado==1) {
										echo 'checked';
									} ?> >
								</th>
						</tr>
						<?php
					}
					?>
				<?php endforeach;
			}
		}

		?>
	</tbody>
</table>
<!-- </form>	
</div> -->
</div>

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" id="modalDelete">
      <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3>¿Estás seguro que eliminar este registro?</h3>
           </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-md" id="modal-btn-si">Si</button>
        <button type="button" class="btn btn-danger btn-md" id="modal-btn-no">No</button>
      </div>
    </div>
  </div>
</div>

<script src="<?php echo base_url()?>js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url()?>js/dataTables.checkboxes.min.js"></script>
<script src="<?php echo base_url()?>js/table/table.js"></script>

<script type="text/javascript">
// LLAMADA A LA FUNCION ELIMINAR Y LA VENTANA MODAL
	function eliminarLogro(id, nombre){
		var modalConfirm = function(callback){
        	$("#modalDelete").modal('show');
    		$("#modal-btn-si").on("click", function(){
        		callback(true);
        	$("#modalDelete").modal('hide');
   	 	});
    		$("#modal-btn-no").on("click", function(){
        		callback(false);
    			$("#modalDelete").modal('hide');
    		});
		};

		modalConfirm(function(confirm){
			if (confirm==true){
				var idLogroEmpresa=id;
				$.post('<?php echo base_url(); ?>empresa/eliminarLogro',{idLogroEmpresa: idLogroEmpresa},function(data) {
				location.reload();
				});
			}
		});
}
</script>