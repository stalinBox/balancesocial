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
					<td class="columna1">N. Horas</td>					
					<td class="columna1">Fecha Inicial</td>					
					<td class="columna1">Fecha Final</td>					
					<td class="columna1">Costo a Empresa</td>					
					<td class="columna1">Costo A Empleado</td>					
					<td class="columna1">Estado</td>					
					<td class="columna1">Beneficiarios</td>					
					<td class="columna7">Editar</td>
					<td class="columna7">Eliminar</td>
				</tr><!--final class fila1-->
			</thead>
			<tbody>
				<?php
				if (!empty($saludLaboral)) {
					foreach ($saludLaboral as $key):
				$id   = base64_encode($key->IdSaludLaboral);
					?>
					<tr class="filagris">
						<td class="columna1"><p><?php echo $key->NombreSaludL ?></p></td>
						<td class="columna1"><p><?php echo $key->CantHorasDestinadas ?></p></td>
						<td class="columna1"><p><?php echo $key->FechaInicioSaludL ?></p></td>
						<td class="columna1"><p><?php echo $key->FechaFinSaludL ?></p></td>
						<td class="columna1"><p><?php echo $key->CostoEmpresaSaludL ?></p></td>
						<td class="columna1"><p><?php echo $key->CostoEmpleadosSaludL ?></p></td>
						<td class="columna1"><p><?php echo $key->EstadoSaludL ?></p></td>
						<td class="columna1"><p><?php echo $key->CantBeneficiadosSaludL ?></p></td>
						<td class="columna6">
							<a href="<?php echo base_url();?>saludLaboral/editarSaludLaboral/<?php echo $key->IdSaludLaboral;?>">
								<button type="button" title="Editar">
									<img src="<?php echo base_url();?>imagenes/update.jpg">
								</button>
							</a>
						</td>
						<td class="columna7">
							<a>
								<button onclick="eliminarSaludLaboral('<?php echo $id; ?>','<?php echo $key->NombreSaludL ?>');" type="button" title="Eliminar" class="editar">
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
function eliminarSaludLaboral(id, nombre){
    confirmar=confirm("Eliminar Programa: " + nombre + " Recuerda Una vez Eliminado No podras Recuperarlo"); 
    if (confirmar){
    	var SaludLaboral 		 = new Object();
		SaludLaboral.Id      	 = id;
		SaludLaboral.Nombre      = nombre;
		var DatosJson = JSON.stringify(SaludLaboral);
		$.post(baseurl + 'saludLaboral/eliminarSaludLaboral',{ 
			MiSaludLaboral: DatosJson
		},
		function(data, textStatus) {
			$("#mensaje").html(data.error_msg);
		}, 
		"json"		
		);
		window.location.href = "saludLaborales";
    } else{
    } 
  }  
</script>