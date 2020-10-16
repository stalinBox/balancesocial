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
	function agregar(){
		window.location="<?php echo base_url()?>indicador/selectIndicadorCuantitativo/1"
	}
	function regresar(){
		window.location="<?php echo base_url()?>empresa";
	}
</script>
<h1>HOLA</h1>
<div id="TAB">
	<div id="MANIPULACIONDATOS">
		<div id="menumanipulaciondatos">
        	<ul class="manipdatos">
        		<li> 
        			<a href="#" onclick="agregar()" title="Agregar"><img src="<?php echo base_url()?>imagenes/NUEVO.png" width="20" height="20" alt=""/></a>
        		</li>
        	</ul>
        	<ul class="manipdatos2">
        		<li> 
        			<a href="#" onclick="ocultarColumna(6,true)" title="Editar"><img src="<?php echo base_url()?>imagenes/EDITAR.png" width="20" height="20" alt=""/></a>
        		</li>
        	</ul>
        	<ul class="manipdatos">
        		<li> 
        			<a href="#" onclick="ocultarColumna(7,true)" title="Descartar"><img src="<?php echo base_url()?>imagenes/BORRAR-MENU.png" width="20" height="20" alt=""/></a>
        		</li>
        	</ul>
        	<ul class="manipdatos2">
        		<li> 
        			<a href="#" onclick="regresar()" title="Atras" ><img src="<?php echo base_url()?>imagenes/ATRAS.png" width="20" height="20" alt=""/></a>
        		</li>
        	</ul>
		</div>
				<div id="tablamanipulaciondatos">
		<form action="<?php echo base_url()?>indicadorEmpresa/guardarIndicadoresSeleccionados" id="form1" method="POST">		
			<table id="tablaPaginada" border="0" cellspacing="1px" class="tablamandatos">
				<thead>
					<tr class="horizontalazul">
					<th scope="col" class="clmn1">Nombre</th>
					<th scope="col" class="clmn1">Resultado</th>
					<th scope="col" class="clmn1">Dimensión</th>					
					<th scope="col" class="clmn1">Sub-Dimensión</th>
					<th scope="col" class="clmn1">Área</th>
					<th scope="col" class="clmn1">Fórmula</th>
					<th scope="col" class="clmn7" style="display:none">Editar</th>
					<th scope="col" class="clmn7" style="display:none">Descartar</th>
					</tr>
				</thead>  	
				<tbody>
		<?php 
		$filaAlterada = 0;
		if (!empty($indicadorCuantitativoEmpresa)) {
			foreach ($indicadorCuantitativoEmpresa as $key): 
				$id   = base64_encode($key->IdIndicadorEmpresa);
			$filaAlterada++;
			if ($filaAlterada%2 == 0) { ?>
	<tr class="filagris">
		<th scope="col" class="clmn1"><?php echo $key->Nombre ?></th>
		<th scope="col" class="clmn1"><?php echo $key->Resultado ?></th>
		<th scope="col" class="clmn1"><?php echo $key->Dimension ?></th>
		<th scope="col" class="clmn1"><?php echo $key->SubDimension ?></th>
		<th scope="col" class="clmn1"><?php echo $key->Area ?></th>
		<th scope="col" class="clmn1"><?php echo $key->FormulaResultado ?></th>
		<th scope="col" class="clmn7" style="display:none">
			<a href="<?php echo base_url();?>indicadorEmpresa/editarIndicadorCuantitativo/<?php echo $key->IdIndicadorEmpresa;?>">
				<button type="button" title="Editar">
					<img src="<?php echo base_url();?>imagenes/ACTUALIZAR.png">
				</button>
			</a>
		</th>					
		<th scope="col" class="clmn7" style="display:none">
			<a>
				<button onclick="eliminarIndicadorCuantitativo('<?php echo $id; ?>','<?php echo $key->Nombre ?>');" type="button" title="Descartar" class="editar">
					<img src="<?php echo base_url();?>imagenes/BORRAR1.png">
				</button>
			</a>
		</th>
	</tr>
			<?php
		}else{ ?>
	<tr class="filagris">
		<th class="clmn1"><?php echo $key->Nombre ?></th>
		<th class="clmn2"><?php echo $key->Resultado ?></th>
		<th class="clmn3"><?php echo $key->Dimension ?></th>
		<th class="clmn4"><?php echo $key->SubDimension ?></th>
		<th class="clmn5"><?php echo $key->Area ?></th>
		<th class="clmn6"><?php echo $key->FormulaResultado ?></th>
		<th class="clmn7" style="display:none">
			<a href="<?php echo base_url();?>indicadorEmpresa/editarIndicadorCuantitativo/<?php echo $key->IdIndicadorEmpresa;?>">
				<button type="button" title="Editar">
					<img src="<?php echo base_url();?>imagenes/ACTUALIZAR.png">
				</button>
			</a>
		</th>
		<th class="clmn7" style="display:none">
			<a>
				<button onclick="eliminarIndicadorCuantitativo('<?php echo $id; ?>','<?php echo $key->Nombre ?>');" type="button" title="Descartar" class="editar">
					<img src="<?php echo base_url();?>imagenes/BORRAR1.png">
				</button>
			</a>
		</th>
	</tr>
		<?php
	}
	?>
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
	function eliminarIndicadorCuantitativo(id, nombre){
		confirmar=confirm("Eliminar Indicador Cuantitativo: " + nombre + " Recuerda Una vez Eliminado No podras Recuperarlo"); 
		if (confirmar){
			var IndicadorCuantitativo 		 = new Object();
			IndicadorCuantitativo.Id      	 = id;
			IndicadorCuantitativo.Nombre      = nombre;
			var DatosJson = JSON.stringify(IndicadorCuantitativo);
			$.post(baseurl + 'indicadorEmpresa/eliminarIndicadorCuantitativo',{ 
				MiIndicadorCuantitativo: DatosJson
			},
			function(data, textStatus) {
				$("#mensaje").html(data.error_msg);
			}, 
			"json"		
			);
			window.location.href = "indicadorEmpresa";
		} else{
		} 
	}  
</script>