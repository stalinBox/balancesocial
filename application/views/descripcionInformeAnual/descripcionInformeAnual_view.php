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
					<td class="columna1">Resposnsable</td>
					<td class="columna1">Cargo</td>
					<td class="columna1">Fecha</td>					
					<td class="columna1">Descripción</td>					
					<td class="columna1">Foto</td>				
					<td class="columna7">Editar</td>
					<td class="columna7">Eliminar</td>
				</tr><!--final class fila1-->
			</thead>
			<tbody>
				<?php
				if (!empty($descripciones)) {
					foreach ($descripciones as $key):
				$id   = base64_encode($key->IdDescripcionInforme);
					?>
					<tr class="filagris">
						<td class="columna1"><p><?php echo $key->Resposnsable ?></p></td>
						<td class="columna1"><p><?php echo $key->Cargo ?></p></td>
						<td class="columna1"><p><?php echo $key->Fecha ?></p></td>
						<td class="columna1"><p><?php echo $key->Descripcion ?></p></td>
						<td class="columna1"><p><?php echo $key->Foto ?></p></td>
						<td class="columna6">
							<a href="<?php echo base_url();?>descripcionInformeAnual/editarDescripcion/<?php echo $key->IdDescripcionInforme;?>">
								<button type="button" title="Editar">
									<img src="<?php echo base_url();?>imagenes/update.jpg">
								</button>
							</a>
						</td>
						<td class="columna7">
							<a>
								<button onclick="eliminarDescripcion('<?php echo $id; ?>','<?php echo $key->Resposnsable ?>');" type="button" title="Eliminar" class="editar">
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
function eliminarDescripcion(id, nombre){
    confirmar=confirm("Eliminar Descripción: " + nombre + " Recuerda Una vez Eliminado No podras Recuperarlo"); 
    if (confirmar){
    	var Descripcion 		 = new Object();
		Descripcion.Id      	 = id;
		Descripcion.Nombre      = nombre;
		var DatosJson = JSON.stringify(Descripcion);
		$.post(baseurl + 'descripcionInformeAnual/eliminarDescripcion',{ 
			MiDescripcion: DatosJson
		},
		function(data, textStatus) {
			$("#mensaje").html(data.error_msg);
		}, 
		"json"		
		);
		window.location.href = "descripciones";
    } else{
    } 
  }  
</script>