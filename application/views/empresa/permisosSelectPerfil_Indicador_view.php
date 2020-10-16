<link href="<?php echo base_url()?>css/estilospdf.css" rel="stylesheet" type="text/css">
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
	function nuevo(){
		window.location="<?php echo base_url()?>permisos/"
	}
	function regresar(){
		window.location="<?php echo base_url()?>permisos";
	}
</script>

<div id="MANIPULACIONDATOS">
	<div id="menumanipulaciondatos">
		<ul class="manipdatos">
			<li> 
				<a href="#" onclick="nuevo()" title="Agregar"><img src="<?php echo base_url()?>imagenes/NUEVO.png" width="20" height="20" alt=""/></a>
			</li>
		</ul>
		<ul class="manipdatos2">
			<li> 
				<a href="#" onclick="ocultarColumna(2,true)" title="Editar"><img src="<?php echo base_url()?>imagenes/EDITAR.png" width="20" height="20" alt=""/></a>
			</li>
		</ul>
		<ul class="manipdatos">
			<li> 
				<a href="#" onclick="ocultarColumna(3,true)" title="Descartar"><img src="<?php echo base_url()?>imagenes/BORRAR-MENU.png" width="20" height="20" alt=""/></a>
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
					<th scope="col" class="clmn1">Nombre</th>
					<th scope="col" class="clmn1">Observación</th>
					<th scope="col" class="clmn1">Seleccinar</th>
					<th scope="col" class="clmn9" style="display:none">Editar</th>
					<th scope="col" class="clmn10" style="display:none">Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				if (!empty($perfiles)) {
					foreach ($perfiles as $key):
						$id   = base64_encode($key->IdPerfil);
					?>
					<tr class="horizontalcuerpo">
						<th scope="col" class="clmn1"><?php echo $key->Nombre ?></th>
						<th scope="col" class="clmn1"><?php echo $key->Observacion ?></th>
						<th scope="col" class="clmn9" style="display:none">
							<ul class="edittablamd">
								<li> 
									<a href="<?php echo base_url();?>permisos/permisosIndicadoresPerfil/<?php echo $key->IdPerfil;?>"><img src="<?php echo base_url();?>imagenes/ACTUALIZAR.png" width="30" height="28" alt=""/></a>
								</li>
							</ul>
						</th>
						<th scope="col" class="clmn10" style="display:none">
							<ul class="borrartablamd">
								<li> 
									<a href="#" onclick="eliminarPerfil('<?php echo $id; ?>','<?php echo $key->Nombre ?>');"><img src="<?php echo base_url();?>imagenes/BORRAR1.png" width="30" height="28" alt=""/></a>
								</li>
							</ul>
						</th>
					</tr>
				<?php endforeach;
			} ?>
		</tbody>
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
function eliminarPerfil(id, nombre){
    confirmar=confirm("Eliminar Perfil: " + nombre + " Recuerda Una vez Eliminado No podras Recuperarlo"); 
    if (confirmar){
    	var Perfil 		 = new Object();
		Perfil.Id      	 = id;
		Perfil.Nombre      = nombre;
		var DatosJson = JSON.stringify(Perfil);
		$.post(baseurl + 'perfilUsuario/eliminarPerfil',{ 
			MiPerfil: DatosJson
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