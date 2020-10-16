<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/jquery-1.12.4.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/jquery.dataTables.min.js"></script>
<!--
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/jquery.dataTables.min.css">
-->
<script type="text/javascript">
	function mostrar(id) {
		obj = document.getElementById(id);
		obj.style.visibility = (obj.style.visibility == 'hidden') ? 'visible' : 'hidden';
	}
	function ocultarColumna(num,ver) {
		dis= ver ? '' : 'none';
		columna = document.getElementById('tablaPaginada').getElementsByTagName('tr');
		for(i = 0; i < columna.length; i++)
			columna[i].getElementsByTagName('th')[num].style.display=dis;
	}
	function nuevo(IdUsuarioEmpresa){
		window.location="<?php echo base_url()?>permisos/nuevoPermisoEspecialUsuario/"+IdUsuarioEmpresa;
	}
	function regresar(){
		window.location="<?php echo base_url()?>permisos/permisosEspecialesAUsuario";
	}
	function denegado() {
		alert("No cuenta con el permiso");
	}
</script>
<div id="MANIPULACIONDATOS">
<?php 
/*
echo "Permisos Especiales de Usuario sobre Tablas";
echo @$permisos[0]->Ver;
echo @$permisos[0]->Agregar;
echo @$permisos[0]->Actualizar;
echo @$permisos[0]->Eliminar;
echo "<br>";
//echo "el IdUsuarioEmpresa ".@$IdUsuarioEmpresa;
*/
 ?>
	<div id="menumanipulaciondatos">
		<ul class="manipdatos">
			<li> 
				<a href="#" <?php if (@$permisos[0]->Agregar == 1 OR @$admin == 1) { echo 'onclick="nuevo('.$IdUsuarioEmpresa.')"';}else{echo 'onclick="denegado()"';}  ?> title="Agregar"><img src="<?php echo base_url()?>imagenes/NUEVO.png" width="20" height="20" alt=""/></a>
			</li>
		</ul>
		<ul class="manipdatos2">
			<li> 
				<a href="#" <?php if (@$permisos[0]->Actualizar == 1 OR @$admin == 1) { echo 'onclick="ocultarColumna(8,true)"';}else{echo 'onclick="denegado()"';}  ?> title="EDITAR"><img src="<?php echo base_url()?>imagenes/EDITAR.png" width="20" height="20" alt=""/></a>
			</li>
		</ul>
		<ul class="manipdatos">
			<li> 
				<a href="#" <?php if (@$permisos[0]->Eliminar == 1 OR @$admin == 1) { echo 'onclick="ocultarColumna(9,true)"';}else{echo 'onclick="denegado()"';}  ?> title="ELIMINAR"><img src="<?php echo base_url()?>imagenes/BORRAR-MENU.png" width="20" height="20" alt=""/></a>
			</li>
		</ul>
		<ul class="manipdatos2">
			<li> 
				<a href="#" onclick="regresar()" title="Atras" ><img src="<?php echo base_url()?>imagenes/ATRAS.png" width="20" height="20" alt=""/></a>
			</li>
		</ul>
	</div>

	<div id="tablamanipulaciondatos">
		<table id="tablaPaginada" border="0" cellspacing="1px" class="tablamandatos">        	
			<thead>
				<tr class="horizontalazul">
					<th scope="col" class="clmn1">Nombres</th>
					<th scope="col" class="clmn2">Apellidos</th>
					<th scope="col" class="clmn7">Perfil</th>					
					<th scope="col" class="clmn7">Tabla</th>					
					<th scope="col" class="clmn7">Ver</th>					
					<th scope="col" class="clmn7">Agregar</th>					
					<th scope="col" class="clmn7">Actualizar</th>					
					<th scope="col" class="clmn7">Eliminar</th>					
					<th scope="col" class="clmn9" style="display:none">Editar</th>
					<th scope="col" class="clmn10" style="display:none">Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				if (!empty($usuarioEmpresa)) {
					foreach ($usuarioEmpresa as $key) {
						$id   = base64_encode($key->IdPEU); ?>
						<tr class="horizontalcuerpo">
							<th scope="col" class="clmn1"><?php echo $key->NombreUsuario; ?></th>   
							<th scope="col" class="clmn2"><?php echo $key->ApellidosUsuario; ?></th>
							<th scope="col" class="clmn7"><?php echo $key->Perfil; ?></th>
							<th scope="col" class="clmn7"><?php echo $key->Tabla; ?></th>
							<th scope="col" class="clmn7"><?php echo $key->Ver; ?></th>
							<th scope="col" class="clmn7"><?php echo $key->Agregar; ?></th>
							<th scope="col" class="clmn7"><?php echo $key->Actualizar; ?></th>
							<th scope="col" class="clmn7"><?php echo $key->Eliminar; ?></th>
							<th scope="col" class="clmn9" style="display:none">
								<ul class="edittablamd">
									<li> 
										<a href="<?php echo base_url();?>permisos/editarPermisoEspecialUsuario/<?php echo $key->IdPEU;?>/<?php echo $IdUsuarioEmpresa ?>"><img src="<?php echo base_url();?>imagenes/ACTUALIZAR.png" width="30" height="28" alt=""/></a>
									</li>
								</ul>
							</th>                
							<th class="clmn10" style="display:none">                
								<ul class="borrartablamd">
									<li> 
										<a href="#" onclick="eliminarPermisoEspecialsuario('<?php echo $id; ?>','<?php echo $key->NombreUsuario ?>');"><img src="<?php echo base_url();?>imagenes/BORRAR1.png" width="30" height="28" alt=""/></a>
									</li>
								</ul>
							</th>
						</tr>
						<?php
					}
				}
				?>
			</table>

		</div>

	</div>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#tablaPaginada').DataTable( {
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
		function eliminarPermisoEspecialsuario(id, nombre){
			confirmar=confirm("Eliminar Permiso Especial del Usuario: " + nombre + " Recuerda Una vez Eliminado No podras Recuperarlo"); 
			if (confirmar){
				var PermisoEspecialUsuario 		 = new Object();
				PermisoEspecialUsuario.Id      	 = id;
				PermisoEspecialUsuario.Nombre      = nombre;
				var DatosJson = JSON.stringify(PermisoEspecialUsuario);
				$.post(baseurl + 'permisos/eliminarPermisoEspecialsuario',{ 
					MiPermisoEspecialUsuario: DatosJson
				},
				function(data, textStatus) {
			//
			$("#mensaje").html(data.error_msg);
		}, 
		"json"		
		);
				window.location.href = "";
			} else{
			} 
		}  
	</script>