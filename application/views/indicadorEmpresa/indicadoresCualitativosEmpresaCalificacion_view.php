<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/jquery-1.12.4.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/jquery.dataTables.min.js"></script>
<!--
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/jquery.dataTables.min.css">
-->
<script type="text/javascript">
	function regresarIndicadorEmpresa(){
		window.location="<?php echo base_url()?>indicadorEmpresa/indicadoresCuantitativosEmpresa"
	}
	function regresarIndicador(){
		window.location="<?php echo base_url()?>indicadorEmpresa/indicadoresCualitativosModulos";
	}
</script>

<div id="TAB">
	<div id="MANIPULACIONDATOS">   

		<div id="menumanipulaciondatos">
			<ul class="manipdatos">
				<li> 
					<a href="javascript:document.forms[0].submit()" title="Enviar Calificación"><img src="<?php echo base_url()?>imagenes/evaluaciones.png" width="20" height="20" alt=""/></a>
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
					<a href="#"	onclick="regresarIndicador()" title="Atras" ><img src="<?php echo base_url()?>imagenes/ATRAS.png" width="20" height="20" alt=""/></a>
				</li>
			</ul>
		</div>

		<div id="tablamanipulaciondatos">
			<form action="<?php echo base_url()?>indicadorEmpresa/guardarIndicadoresCualitativosCalificado" id="form1" method="POST">					
				<input type="hidden" name="txtAnio" value="<?php echo $anio;?>">

				<table id="tablaPaginada" border="0" cellspacing="1px" class="tablamandatos">
					<thead>
						<tr class="horizontalazul">
							<th scope="col" class="clmn1" style="display:none">Id</th>
							<th scope="col" class="clmn1">Fase</th>
							<th scope="col" class="clmn1">Indicador</th>
							<th scope="col" class="clmn1">Pregunta</th>					
							<th scope="col" class="clmn1">Código-GRI</th>					
							<th scope="col" class="clmn1">Dimensión</th>					
							<th scope="col" class="clmn1">Sub-Dimensión</th>
							<th scope="col" class="clmn1">Periodo</th>
							<!--<th colspan="2" scope="col" class="clmn1">Respuesta</th> -->
							<th scope="col" class="clmn1">Respuesta</th>
							<!-- <th scope="col" class="clmn1">Aplica</th> -->
							<th scope="col" class="clmn1">Comentario</th>
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
						if (!empty($indicadorCualitativoCalificadoEmpresa)) {
							foreach ($indicadorCualitativoCalificadoEmpresa as $key): ?>
							<tr class="horizontalcuerpo">
								<th scope="col" class="clmn1" style="display:none"><?php echo $key->IdIndicadorCualitativo ?></th>
								<th scope="col" class="clmn1"><?php echo $key->Fase ?></th>
								<th scope="col" class="clmn1"><?php echo $key->IndicadorCualitativo ?></th>
								<th scope="col" class="clmn1"><?php echo $key->Pregunta ?></th>
								<th scope="col" class="clmn1"><?php echo $key->CodigoGRI ?></th>
								<th scope="col" class="clmn1"><?php echo $key->Dimension ?></th>
								<th scope="col" class="clmn1"><?php echo $key->SubDimension ?></th>
								<th scope="col" class="clmn1"><?php echo $key->Periodo ?></th>
								<!-- <th scope="col" class="clmn1"><?php echo $key->Respuesta ?></th> -->
								<th scope="col" class="clmn7">
									<input type="checkbox" name="checkRespuesta[]" value="<?php echo $key->IdIndicadorCualitativo; ?>" <?php if ($key->Calificacion == $key->Respuesta){ echo 'checked'; } ?>  >
								</th>
								<!-- <th scope="col" class="clmn7">
									<input type="checkbox" name="checkAplica[]" value="<?php echo $key->IdIndicadorCualitativo; ?>">
								</th> -->

								<th scope="col" class="clmn9">
						          <ul class="edittablamd">
						            <li> 
						              <a href="<?php echo base_url();?>indicadorEmpresa/editarIndicadorCualitativoCalificado/<?php echo $key->IdICEmpresa;?>/<?php echo $anio; ?>"><img src="<?php echo base_url();?>imagenes/ACTUALIZAR.png" width="30" height="28" alt=""/></a>
						            </li>
						          </ul>
						        </th>
							</tr>
				<?php endforeach;
			}

		?>
	</tbody>
</table>
</form>	
</div>
</div>
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

</script>