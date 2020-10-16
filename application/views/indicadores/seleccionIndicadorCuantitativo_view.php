  <script src="<?php echo base_url()?>js/jquery.min.js"></script>
  <link rel="stylesheet"  href="<?php echo base_url() ?>css/bootstrap.min.css">
  <script src="<?php echo base_url()?>js/jquery-1.11.3.min.js"></script>
  <script src="<?php echo base_url()?>js/bootstrap.min.js"></script>
  <link href="<?php echo base_url()?>css/dataTables.bootstrap.min.css" rel="stylesheet"/>

<script type="text/javascript">
	function regresarIndicadorEmpresa(){
		window.location="<?php echo base_url()?>indicadorEmpresa/indicadoresCuantitativosEmpresa"
	}
	function regresarIndicador(){
		window.location="<?php echo base_url()?>indicadorEmpresa/indicadoresCuantitativosModulos";
	}
</script>
<?php 
/*
echo "Agregar Indicadores Cuantitativos ";
echo @$permisos[0]->Ver;
echo @$permisos[0]->Agregar;
echo @$permisos[0]->Actualizar;
echo @$permisos[0]->Eliminar;
*/
?>
<h1>HOLA MUNDO</h1>
	<div id="MANIPULACIONDATOS">
		<div id="menumanipulaciondatos">
			<ul class="manipdatos">
				<li> 
					<a <?php if ($rutaRegreso) { ?>
					href="javascript:document.forms[0].submit()" 
					<?php }else {?>
					href="#"
					<?php } ?>
					title="Agregar"><img src="<?php echo base_url()?>imagenes/evaluaciones.png" width="20" height="20" alt=""/></a>
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

<!-- 		<div id="tablamanipulaciondatos">
			<form action="<?php echo base_url()?>indicadorEmpresa/guardarIndicadoresSeleccionados" id="form1" method="POST">					
				<input type="hidden" name="rutaRegreso" value="<?php echo $rutaRegreso;?>">

				<table id="tablaPaginada" border="0" cellspacing="1px" class="tablamandatos"> -->

	<div id="contenedor" style="margin:15px auto">
					<!-- <form action="<?php echo base_url()?>indicadorEmpresa/guardarIndicadoresSeleccionados" id="form1" method="POST">					
				<input type="hidden" name="rutaRegreso" value="<?php echo $rutaRegreso;?>"> -->
		<table id="tablaPaginada" class="table table-bordered table-striped table-hover">

					<thead>
						<tr class="horizontalazul">
							<th scope="col" class="clmn1">Id</th>
							<th scope="col" class="clmn1">Nombre</th>
							<th scope="col" class="clmn2">Resultado</th>
							<th scope="col" class="clmn3">Dimensión</th>
							<th scope="col" class="clmn4">Sub-Dimensión</th>
							<th scope="col" class="clmn5">Herramienta</th>
							<th scope="col" class="clmn5">Principios ACI</th>
							<th scope="col" class="clmn5">Dimensiones ACI</th>
							<th scope="col" clas0="clmn6">Fórmula</th>
							<th scope="col" clas0="clmn6">Sector</th>
							<?php if ($rutaRegreso) { ?>
							<th scope="col" class="clmn7">Selección</th>
							<?php } else {?>
							<th scope="col" class="clmn7">Detalles</th>						
							<?php } ?>
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
						$indicadores = $addIndicadoresEmpresa;
						$filaAlterada = 0;
						if (!empty($indicadores)) {
							foreach ($indicadores as $key): 
								$id   = base64_encode($key->IdIndicador);
							$filaAlterada++;
							if ($filaAlterada%2 == 0) { ?>
							<tr class="horizontalcuerpo">
								<th scope="col" class="clmn1"><?php echo $key->IdIndicador ?></th>
								<th scope="col" class="clmn1"><?php echo $key->Nombre ?></th>
								<th scope="col" class="clmn2"><?php echo $key->Resultado ?></th>
								<th scope="col" class="clmn3"><?php echo $key->Dimension ?></th>
								<th scope="col" class="clmn4"><?php echo $key->SubDimension ?></th>
								<th scope="col" class="clmn5"><?php echo $key->Herramienta ?></th>
								<th scope="col" class="clmn5"><?php echo $key->PrincipiosACI ?></th>
								<th scope="col" class="clmn5"><?php echo $key->DimensionesACI?></th>
								<th scope="col" class="clmn6"><?php echo $key->FormulaResultado ?></th>
								<th scope="col" class="clmn6"><?php echo $key->Sector ?></th>
								<th scope="col" class="clmn7">
									<input type="checkbox" name="checkPermisoPerfil[]" value="<?php echo $key->IdIndicador; ?>">
								</th>
							</tr>
							<?php
						}else{ ?>
						<tr class="horizontalcuerpo2">
							<th scope="col" class="clmn1"><?php echo $key->IdIndicador ?></th>
							<th scope="col" class="clmn1"><?php echo $key->Nombre ?></th>
							<th scope="col" class="clmn1"><?php echo $key->Resultado ?></th>
							<th scope="col" class="clmn1"><?php echo $key->Dimension ?></th>
							<th scope="col" class="clmn1"><?php echo $key->SubDimension ?></th>
							<th scope="col" class="clmn1"><?php echo $key->Herramienta ?></th>
							<th scope="col" class="clmn1"><?php echo $key->PrincipiosACI ?></th>
							<th scope="col" class="clmn1"><?php echo $key->DimensionesACI ?></th>
							<th scope="col" class="clmn1"><?php echo $key->FormulaResultado ?></th>
							<th scope="col" class="clmn1"><?php echo $key->Sector ?></th>
							<td class="clmn7">
								<input type="checkbox" name="checkPermisoPerfil[]" value="<?php echo $key->IdIndicador; ?>">
							</td>
						</tr>
						<?php
					}
					?>
				<?php endforeach;
			}
					}else{ //si sólo quiero ver muestro todo
						$indicadores = $indicadorMatriz;
						$filaAlterada = 0;
						if (!empty($indicadores)) {
							foreach ($indicadores as $key): 
								$id   = base64_encode($key->IdIndicador);
							$filaAlterada++;
							if ($filaAlterada%2 == 0) { ?>
							<tr class="horizontalcuerpo">
								<th scope="col" class="clmn1"><?php echo $key->IdIndicador ?></th>
								<th scope="col" class="clmn1"><?php echo $key->Nombre ?></th>
								<th scope="col" class="clmn1"><?php echo $key->Resultado ?></th>
								<th scope="col" class="clmn1"><?php echo $key->Dimension ?></th>
								<th scope="col" class="clmn1"><?php echo $key->SubDimension ?></th>
								<th scope="col" class="clmn1"><?php echo $key->Herramienta ?></th>
								<th scope="col" class="clmn1"><?php echo $key->PrincipiosACI ?></th>
								<th scope="col" class="clmn1"><?php echo $key->DimensionesACI ?></th>
								<th scope="col" class="clmn1"><?php echo $key->FormulaResultado ?></th>
								<th scope="col" class="clmn1"><?php echo $key->Sector ?></th>
								<th scope="col" class="clmn9">
									<ul class="edittablamd">
										<li> 
											<a href="<?php echo base_url();?>indicador/editarIndicadorCuantitativo/<?php echo $key->IdIndicador;?>"><img src="<?php echo base_url();?>imagenes/ACTUALIZAR.png" width="30" height="28" alt=""/></a>
										</li>
									</ul>
								</th>
							</tr>
							<?php
						}else{ ?>
						<tr class="horizontalcuerpo2">
							<th scope="col" class="clmn1"><?php echo $key->IdIndicador ?></th>
							<th scope="col" class="clmn1"><?php echo $key->Nombre ?></th>
							<th scope="col" class="clmn1"><?php echo $key->Resultado ?></th>
							<th scope="col" class="clmn1"><?php echo $key->Dimension ?></th>
							<th scope="col" class="clmn1"><?php echo $key->SubDimension ?></th>
							<th scope="col" class="clmn1"><?php echo $key->Herramienta ?></th>
							<th scope="col" class="clmn1"><?php echo $key->PrincipiosACI ?></th>
							<th scope="col" class="clmn1"><?php echo $key->DimensionesACI ?></th>
							<th scope="col" class="clmn1"><?php echo $key->FormulaResultado ?></th>
							<th scope="col" class="clmn1"><?php echo $key->Sector ?></th>
							<th scope="col" class="clmn9">
								<ul class="edittablamd">
									<li> 
										<a href="<?php echo base_url();?>indicador/editarIndicadorCuantitativo/<?php echo $key->IdIndicador;?>"><img src="<?php echo base_url();?>imagenes/ACTUALIZAR.png" width="30" height="28" alt=""/></a>
									</li>
								</ul>
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