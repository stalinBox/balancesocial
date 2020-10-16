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
	function nuevo(idPerfil){
		window.location="<?php echo base_url()?>permisos/nuevoPermisoPerfil/"+idPerfil;
	}
	function regresar(){
		window.location="<?php echo base_url()?>permisos/permisosPerfiles";
	}
	function denegado() {
		alert("No cuenta con el permiso");
	}
</script>
<?php 
/*
echo "Permisos Perfil sobre Objetos";
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
				<a href="#" <?php if (@$permisos[0]->Agregar == 1 OR @$admin == 1) { echo 'onclick="nuevo('.$IdPerfil.')"';}else{echo 'onclick="denegado()"';}  ?> title="Agregar"><img src="<?php echo base_url()?>imagenes/NUEVO.png" width="20" height="20" alt=""/></a>
			</li>
		</ul>
		<ul class="manipdatos2">
			<li> 
				<a href="#" <?php if (@$permisos[0]->Actualizar == 1 OR @$admin == 1) { echo 'onclick="ocultarColumna(6,true)"';}else{echo 'onclick="denegado()"';}  ?> title="Editar"><img src="<?php echo base_url()?>imagenes/EDITAR.png" width="20" height="20" alt=""/></a>
			</li>
		</ul>
		<ul class="manipdatos">
			<li> 
				<a href="#" <?php if (@$permisos[0]->Eliminar == 1 OR @$admin == 1) { echo 'onclick="ocultarColumna(7,true)"';}else{echo 'onclick="denegado()"';}  ?> title="Descartar"><img src="<?php echo base_url()?>imagenes/BORRAR-MENU.png" width="20" height="20" alt=""/></a>
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
					<th scope="col" class="clmn1">Perfil</th>
					<th scope="col" class="clmn1">Tabla</th>
					<th scope="col" class="clmn1">Ver</th>
					<th scope="col" class="clmn1">Agergar</th>
					<th scope="col" class="clmn1">Actualizar</th>
					<th scope="col" class="clmn1">Eliminar</th>
					<th scope="col" class="clmn9" style="display:none">Editar</th>
					<th scope="col" class="clmn10" style="display:none">Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				if (!empty($permisosPerfil)) {
					foreach ($permisosPerfil as $key):
						$id   = base64_encode($key->IdPermisoRol);
					?>
					<tr class="horizontalcuerpo">
						<th scope="col" class="clmn1"><?php echo $key->Perfil ?></th>
						<th scope="col" class="clmn1"><?php echo $key->Tabla ?></th>
						<th scope="col" class="clmn1"><?php echo $key->Ver ?></th>
						<th scope="col" class="clmn1"><?php echo $key->Agregar ?></th>
						<th scope="col" class="clmn1"><?php echo $key->Actualizar ?></th>
						<th scope="col" class="clmn1"><?php echo $key->Eliminar ?></th>
						<th scope="col" class="clmn9" style="display:none">
							<ul class="edittablamd">
								<li> 
									<a href="<?php echo base_url();?>permisos/editarPermisoPerfil/<?php echo $IdPerfil; ?>/<?php echo $key->IdPermisoRol;?>"><img src="<?php echo base_url();?>imagenes/ACTUALIZAR.png" width="30" height="28" alt=""/></a>
								</li>
							</ul>
						</th>
						<th scope="col" class="clmn10" style="display:none">
							<ul class="borrartablamd">
								<li> 
									<a href="#" onclick="eliminarPermisoPerfil('<?php echo $id; ?>','<?php echo $key->Tabla ?>');"><img src="<?php echo base_url();?>imagenes/BORRAR1.png" width="30" height="28" alt=""/></a>
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
		window.location.href = "";
    } else{
    } 
  }  
</script>
