<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/jquery-1.12.4.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/jquery.dataTables.min.css">

<script>
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
</script>


<table id="tablaPaginada" cellspacing="0" class="display" width="70%">
	<thead>
		<tr>
			<th>Id</th>
			<th>Fase</th>
			<th>IndicadorCualitativo</th>
			<th>Pregunta</th>
			<th>CodigoGRI</th>
			<th>Dimension</th>
			<th>SubDimension</th>
			<th>Opción</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($indicadorCualitativo as $key): ?>
			<tr>
				<td><?php echo $key->IdIndicadorCualitativo ?></td>
				<td><?php echo $key->Fase ?></td>
				<td><?php echo $key->IndicadorCualitativo ?></td>
				<td><?php echo $key->Pregunta ?></td>
				<td><?php echo $key->CodigoGRI ?></td>
				<td><?php echo $key->Dimension ?></td>
				<td><?php echo $key->SubDimension ?></td>
				<td>
				 <a href="<?php echo base_url();?>principal/inicio/<?php echo $key->IdIndicadorCualitativo;?>">
                    <button type="button" title="Editar">
                    <img src="<?php echo base_url();?>imagenes/update.jpg">
                    </button>
                 </a>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>