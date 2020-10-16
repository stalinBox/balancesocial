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
	function nuevo(){
		window.location="<?php echo base_url()?>indicador/nuevoIndicadorCualitativo"
	}
	function regresar(){
		window.location="<?php echo base_url()?>indicadorEmpresa/indicadoresCualitativosModulos";
	}
</script>

<div id="MANIPULACIONDATOS">
	<div id="menumanipulaciondatos">
		<ul class="manipdatos">
			<li> 
				<a href="#" title="Agregar"><img src="<?php echo base_url()?>imagenes/NUEVO.png" width="20" height="20" alt=""/></a>
			</li>
		</ul>
		<!--
		<ul class="manipdatos2">
			<li> 
				<a href="#" onclick="ocultarColumna(6,true)" title="Editar"><img src="<?php echo base_url()?>imagenes/EDITAR.png" width="20" height="20" alt=""/></a>
			</li>
		</ul>
		<ul class="manipdatos">
			<li> 
				<a href="#" onclick="ocultarColumna(7,true)" title="Descartar"><img src="<?php echo base_url()?>imagenes/BORRAR-MENU.png" width="20" height="20" alt=""/></a>
			</li>
		</ul> -->
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
					<th scope="col" class="clmn1" style="display:none">IdCualitativosSistema</th>
					<th scope="col" class="clmn1">Dimensión</th>
					<th scope="col" class="clmn1">Principio SEPS</th>
					<th scope="col" class="clmn1">SubDimensión</th>
					<th scope="col" class="clmn1">Códigos GRI</th>
					<th scope="col" class="clmn1">Fase</th>
					<th scope="col" class="clmn1">Estandar</th>
					<th scope="col" class="clmn1">Concepto</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				if (!empty($indicadoresCualitativos)) {
					foreach ($indicadoresCualitativos as $key):
						$id   = base64_encode($key->IdCualitativosSistema);
					?>
					<tr class="horizontalcuerpo">
						<th scope="col" class="clmn1" style="display:none"><?php echo $key->IdCualitativosSistema ?></th>
						<th scope="col" class="clmn1"><?php echo $key->Dimension ?></th>
						<th scope="col" class="clmn1"><?php echo $key->PrincipioSEPS ?></th>
						<th scope="col" class="clmn1"><?php echo $key->SubDimension ?></th>
						<th scope="col" class="clmn1"><?php echo $key->CodigosGRI ?></th>
						<th scope="col" class="clmn1"><?php echo $key->Fase ?></th>
						<th scope="col" class="clmn1"><?php echo $key->Estandar ?></th>
						<th scope="col" class="clmn1"><?php echo $key->Concepto ?></th>
					</tr>
				<?php endforeach;
			} ?>
		</tbody>
	</table>
  </div>
</div>

<script src="<?php echo base_url()?>js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url()?>js/dataTables.checkboxes.min.js"></script>
<script src="<?php echo base_url()?>js/table/table.js"></script>
<script type="text/javascript">
// LLAMADA A LA FUNCION ELIMINAR Y LA VENTANA MODAL
	function eliminarLogro(id, nombre){
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
				var idLogroEmpresa=id;
				$.post('<?php echo base_url(); ?>empresa/eliminarLogro',{idLogroEmpresa: idLogroEmpresa},function(data) {
				location.reload();
				});
			}
		});
}
</script>


