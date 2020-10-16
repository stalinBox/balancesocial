<link href="<?php echo base_url()?>css/estilospdf.css" rel="stylesheet" type="text/css">
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/jquery-1.12.4.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/jquery.dataTables.min.js"></script>
<!--
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/jquery.dataTables.min.css">
-->
<h3 class="page-header" align="center"><span class="glyphicon glyphicon-th-list"></span><?php echo "Perfil ".$nombrePerfilSeleccionado; ?></h3>

<div id="TAB">
	<div id="MANIPULACIONDATOS">

	 <div id="menumanipulaciondatos">
	 	<ul class="manipdatos">
	 		<li> 
	 			<a href="javascript:document.forms[0].submit()" title="Agregar"><img src="<?php echo base_url()?>imagenes/evaluaciones.png" width="20" height="20" alt=""/></a>
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
					<a href="" title="Atras" ><img src="<?php echo base_url()?>imagenes/ATRAS.png" width="20" height="20" alt=""/></a>
				</li>
			</ul>
	 </div> <!--Fin menumanipulaciondatos -->
	
	<div id="tablamanipulaciondatos">

		<form action="<?php echo base_url()?>permisos/guardarPermisosPerfilIndicador" id="form1" method="POST">
			<input type="hidden" name="idPerfil" value="<?php echo $idPerfilSeleccionado; ?>">			
			<input type="hidden" name="nombrePerfilSeleccionado" value="<?php echo $nombrePerfilSeleccionado; ?>">			
			<table id="tablaPaginada" border="0" cellspacing="1px" class="tablamandatos">
				<thead>
					<tr class="horizontalazul">
						<th scope="col" class="clmn1">Nombre</th>					
						<th scope="col" class="clmn1">Resultado</th>
						<th scope="col" class="clmn1">Dimensión</th>
						<th scope="col" class="clmn1">Sub-Dimensión</th>
						<th scope="col" class="clmn1">Área</th>
						<th scope="col" class="clmn1">Fórmula</th>
						<th scope="col" class="clmn7">Seleccionar</th>
					</tr><!--final class horizontalazul-->
				</thead>
				<tbody>
					<?php 
					if (!empty($indicadoresEmpresa)) {
						foreach ($indicadoresEmpresa as $key): 
							$id   = base64_encode($key->IdIndicador);
						?>
						<tr class="horizontalcuerpo">
							<th scope="col" class="clmn1"><p><?php echo $key->Nombre ?></p></th>						
							<th scope="col" class="clmn1"><p><?php echo $key->Resultado ?></p></th>
							<th scope="col" class="clmn1"><p><?php echo $key->Dimension ?></p></th>						
							<th scope="col" class="clmn1"><p><?php echo $key->SubDimension ?></p></th>
							<th scope="col" class="clmn1"><p><?php echo $key->Area ?></p></th>
							<th scope="col" class="clmn1"><p><?php echo $key->FormulaResultado ?></p></th>
							<th scope="col" class="clmn7">
								<input type="checkbox" name="checkPermisoPerfil[]" value="<?php echo $key->IdIndicador; ?>">
								
							</th>
						</tr><!--final class horizontalcuerpo-->
					<?php endforeach;
				}
				?>
			</tbody>
		</table>		
	</form>

	</div>
		
	</div><!--Fin MANIPULACIONDATOS -->

</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#tablaPaginada').DataTable( {    	
			"aLengthMenu": [[-1], ["All"]],
			"language": {
				"lengthMenu": "Mostrar _MENU_ registros por página",                    
				"zeroRecords": "No Encontrado - lo siento",
				"info": "Mostrando la página _PAGE_ de _PAGES_",
				"infoEmpty": "No hay registros disponibles",
				"loadingRecords": "Cargando...",
				"processing":     "Procesando...",
				"search": "Buscar",
				"infoFiltered": "(filtered from _MAX_ total registros)",
				"paginate": {
					"next": "Siguiente",
					"previous": "Anterior"
				},
			}
		} );
	} );

	var baseurl = "<?php echo base_url(); ?>";
	var currentLocation = window.location;
	function eliminarPermisoPerfil(id, nombre){
		confirmar=confirm("Eliminar Permiso de Tabla: " + nombre + " Recuerda Una vez Eliminado No podras Recuperarlo"); 
		if (confirmar){
			var PermisoPerfil 		 = new Object();
			PermisoPerfil.Id      	 = id;
			PermisoPerfil.Nombre      = nombre;
			var DatosJson = JSON.stringify(PermisoPerfil);
			$.post(baseurl + 'permisos/eliminarPermisoPerfil',{ 
				MiPermisoPerfil: DatosJson
			},
			function(data, textStatus) {
			//
			$("#mensaje").html(data.error_msg);
		}, 
		"json"		
		);
			window.location.href = "perfiles";
		} else{
		} 
	}  
</script>