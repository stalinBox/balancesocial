<link href="<?php echo base_url()?>css/estilospdf.css" rel="stylesheet" type="text/css">
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/jquery-1.12.4.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/jquery.dataTables.min.css">

<div id="contenedorpdf">
	<div id="tablapdf">
		<div id="Opciones">
			<input id="Imprimir" type="submit" name="submit" class="editar" value="Imprimir">
			<input id="Descargar" type="submit" name="submit" class="editar" value="Atras">
		</div>
		
		<table id="tablaPaginada" border="0" cellspacing="5px" width="100%">
			<thead>
				<tr class="fila1">
					<td class="columna1">Nombre</td>
					<td class="columna1">Observación</td>
					<td class="columna7">Editar</td>
					<td class="columna7">Eliminar</td>
				</tr><!--final class fila1-->
			</thead>
			<tbody>
				<?php
				if (!empty($perfiles)) {
					foreach ($perfiles as $key): 
						$id   = base64_encode($key->IdPerfil);
					?>
					<tr class="filagris">
						<td class="columna1"><p><?php echo $key->Nombre ?></p></td>
						<td class="columna1"><p><?php echo $key->Observacion ?></p></td>
						<td class="columna7">
							<a href="<?php echo base_url();?>perfilUsuario/editarPerfil/<?php echo $key->IdPerfil;?>">
								<button type="button" title="Editar">
									<img src="<?php echo base_url();?>imagenes/update.jpg">
								</button>
							</a>
						</td>
						<td class="columna7">
							<a>
								<button onclick="eliminarPerfil('<?php echo $id; ?>','<?php echo $key->Nombre; ?>');" type="button" title="Eliminar" class="editar">
									<img src="<?php echo base_url();?>imagenes/eliminar-base.png">
								</button>
							</a>
						</td>
					</tr><!--final class filagris-->
				<?php endforeach;
			}
			?>
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