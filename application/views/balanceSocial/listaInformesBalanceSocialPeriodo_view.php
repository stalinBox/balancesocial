  <script src="<?php echo base_url()?>js/jquery.min.js"></script>
  <link rel="stylesheet"  href="<?php echo base_url() ?>css/bootstrap.min.css">
  <script src="<?php echo base_url()?>js/jquery-1.11.3.min.js"></script>
  <script src="<?php echo base_url()?>js/bootstrap.min.js"></script>
  <link href="<?php echo base_url()?>css/dataTables.bootstrap.min.css" rel="stylesheet"/>

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
	function regresar(){
		window.location="<?php echo base_url()?>balanceSocial";
	}
</script>
	<div id="MANIPULACIONDATOS">
		<div id="menumanipulaciondatos">
			<ul class="manipdatos">
				<li> 
					<a href="#" title="Nuevo"><img src="<?php echo base_url()?>imagenes/NUEVO.png" width="20" height="20" alt=""/></a>
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

	<div id="contenedor" style="margin:15px auto">
		<table id="tablaPaginada" class="table table-bordered table-striped table-hover text-centered table-sm" style="width:100%">
				<thead>
					<tr class="horizontalazul">
						<th scope="col" class="clmn1">Id</th>					
						<th scope="col" class="clmn1">Periodo</th>					
						<th scope="col" class="clmn1">Fecha de Califcación</th>
						<th scope="col" class="clmn6">Balance Social</th>
						<th scope="col" class="clmn6">Descargar PDF</th>
						<th scope="col" class="clmn7" style="display:none">Eliminar</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$filaAlterada = 0;
					if (!empty($registrosDatosTotales)) {
						foreach ($registrosDatosTotales as $key): 
							$id   = base64_encode($key->IdDatosTotales); ?>
						<tr class="horizontalcuerpo">
							<th scope="col" class="clmn1"><?php echo $key->IdDatosTotales ?></th>
							<th scope="col" class="clmn1"><?php echo $key->Periodo ?></th>
							<th scope="col" class="clmn1"><?php echo $key->FechaSistema ?></th>
                <th scope="col" class="clmn9">
                  <ul class="edittablamd">
                    <li> 
                      <a href="<?php echo base_url();?>balanceSocial/informeIndicadoresCuantitativosCalificados/<?php echo $key->IdDatosTotales;?>/<?php echo $key->Periodo?>"><img src="<?php echo base_url();?>imagenes/grafica5.png" width="30" height="28" alt=""/></a>
                    </li>
                  </ul>
                </th>
                <th scope="col" class="clmn9">
                  <ul class="edittablamd">
                    <li> 
                      <a href="<?php echo base_url();?>balanceSocial/indicadorCuantitativoResultadoPDF/<?php echo $key->IdDatosTotales;?>/<?php echo $key->Periodo?>" target="_blank"><img src="<?php echo base_url();?>imagenes/grafica5.png" width="30" height="28" alt=""/></a>
                    </li>
                  </ul>
                </th>
                <th scope="col" class="clmn10" style="display:none">
                  <ul class="borrartablamd">
                    <li> 
                      <a href="#" onclick="eliminarIndicadorCualitativoEmpresaListaPeriodo('<?php echo $key->IdDatosTotales; ?>','<?php echo $key->IdDatosTotales; ?>');"><img src="<?php echo base_url();?>imagenes/BORRAR1.png" width="30" height="28" alt=""/></a>
                    </li>
                  </ul>
                </th>

						</tr>
			<?php endforeach;
			}
			?>
		</tbody>

	</table>

	</div>

	</div>

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" id="modalDelete">
      <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3>¿Estás seguro que eliminar este registro?</h3>
           </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-md" id="modal-btn-si">Si</button>
        <button type="button" class="btn btn-danger btn-md" id="modal-btn-no">No</button>
      </div>
    </div>
  </div>
</div>

<script src="<?php echo base_url()?>js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url()?>js/dataTables.checkboxes.min.js"></script>
<script src="<?php echo base_url()?>js/table/table.js"></script>

<script type="text/javascript">
// LLAMADA A LA FUNCION ELIMINAR Y LA VENTANA MODAL
	function eliminarIndicadorCualitativoEmpresaListaPeriodo(id, nombre){
		var modalConfirm = function(callback){
        	$("#modalDelete").modal('show');
    		$("#modal-btn-si").on("click", function(){
        		callback(true);
        	$("#modalDelete").modal('hide');
   	 	});
    		$("#modal-btn-no").on("click", function(){
        		callback(false);
    			$("#modalDelete").modal('hide');
    		});
		};

		modalConfirm(function(confirm){
			if (confirm==true){
				var idIndCual=id;
				$.post('<?php echo base_url(); ?>indicadorEmpresa/eliminarIndicadorCualitativoEmpresaListaPeriodo',{idIndCual: idIndCual},function(data) {
				location.reload();
				});
			}
		});
}
</script>