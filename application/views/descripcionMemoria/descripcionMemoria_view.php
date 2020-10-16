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

		<table id="tablaPaginada" class="table table-bordered table-striped table-hover text-centered table-sm" style="width:100%">
			<thead>
				<tr class="fila1">
					<td class="columna1">Año de Memoria</td>
					<td class="columna1">Año Última Memoria</td>
					<td class="columna1">Círculo de Presentación</td>					
					<td class="columna7">Editar</td>
					<td class="columna7">Eliminar</td>
				</tr><!--final class fila1-->
			</thead>
			<tbody>
				<?php
				if (!empty($descripcionesMemorias)) {
					foreach ($descripcionesMemorias as $key):
				$id   = base64_encode($key->IdDescripcionMemoria);
					?>
					<tr class="filagris">
						<td class="columna1"><p><?php echo $key->Anio ?></p></td>
						<td class="columna1"><p><?php echo $key->FechaUltimaMemoria ?></p></td>
						<td class="columna1"><p><?php echo $key->CicloPresentacion ?></p></td>
						<td class="columna6">
							<a href="<?php echo base_url();?>descripcionMemoria/editarDescripcionMemoria/<?php echo $key->IdDescripcionMemoria;?>">
								<button type="button" title="Editar">
									<img src="<?php echo base_url();?>imagenes/update.jpg">
								</button>
							</a>
						</td>
						<td class="columna7">
							<a>
								<button onclick="eliminarDescripcionMemoria('<?php echo $id; ?>','<?php echo $key->Anio ?>');" type="button" title="Eliminar" class="editar">
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
function eliminarDescripcionMemoria(id, nombre){
    confirmar=confirm("Eliminar Descripción: " + nombre + " Recuerda Una vez Eliminado No podras Recuperarlo"); 
    if (confirmar){
    	var DescripcionMemoria 		 = new Object();
		DescripcionMemoria.Id      	 = id;
		DescripcionMemoria.Nombre      = nombre;
		var DatosJson = JSON.stringify(DescripcionMemoria);
		$.post(baseurl + 'descripcionMemoria/eliminarDescripcionMemoria',{ 
			MiDescripcionMemoria: DatosJson
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