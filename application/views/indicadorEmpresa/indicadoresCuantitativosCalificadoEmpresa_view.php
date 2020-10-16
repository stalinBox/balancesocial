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
	function agregar(){
		window.location="<?php echo base_url()?>indicador/selectIndicadorCuantitativo/1"
	}
	function regresar(){
		window.location="<?php echo base_url()?>indicadorEmpresa/indicadoresCuantitativosModulos";
	}
	function denegado() {
		alert("No cuenta con el permiso");
	}
</script>
<?php 
/*
echo "Permisos Indicadores Cuantitativos Calificados ";
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
        			<a href="#" title="Agregar"  ><img src="<?php echo base_url()?>imagenes/NUEVO.png" width="20" height="20" alt=""/></a>
        		</li>
        	</ul>
        	<ul class="manipdatos2">
        		<li> 
        			<a href="#" <?php if (@$permisos[0]->Actualizar == 1 OR @$admin == 1) { echo 'onclick="ocultarColumna(8,true)"';}else{echo 'onclick="denegado()"';} ?> title="Editar"><img src="<?php echo base_url()?>imagenes/EDITAR.png" width="20" height="20" alt=""/></a>
        		</li>
        	</ul>
        	<ul class="manipdatos">
        		<li> 
        			<a href="#" onclick="ocultarColumna(9,true)" title="Descartar"><img src="<?php echo base_url()?>imagenes/BORRAR-MENU.png" width="20" height="20" alt=""/></a>
        		</li>
        	</ul>
        	<ul class="manipdatos2">
        		<li> 
        			<a href="#" onclick="regresar()" title="Atras" ><img src="<?php echo base_url()?>imagenes/ATRAS.png" width="20" height="20" alt=""/></a>
        		</li>
        	</ul>
		</div>


	<div id="contenedor" style="margin:15px auto">
		<!-- <form action="<?php echo base_url()?>indicadorEmpresa/guardarIndicadoresSeleccionados" id="form1" method="POST"> -->
		<table id="tablaPaginada" class="table table-bordered table-striped table-hover">
				<thead>
					<tr class="horizontalazul">
					<th scope="col" class="clmn1">Id</th>
					<th scope="col" class="clmn1">Indicador</th>
					<th scope="col" class="clmn1">Numerador</th>
					<th scope="col" class="clmn1">Denominador</th>					
					<th scope="col" class="clmn1">Resultado</th>
					<th scope="col" class="clmn1">Periodo</th>
					<th scope="col" class="clmn1">Calificación</th>
					<th scope="col" class="clmn1">Observación</th>
					<th scope="col" class="clmn7" style="display:none">Editar</th>					
					</tr>
				</thead>  	
				<tbody>
		<?php    //number_format($numero, 2, ",", ".");
		$filaAlterada = 0;
		if (!empty($indicadorCuantitativoCalificadoEmpresa)) {
			foreach ($indicadorCuantitativoCalificadoEmpresa as $key): 
				$id   = base64_encode($key->IdIndicadorCalificado);			
			?>
	<tr class="horizontalcuerpo">		
		<th scope="col" class="clmn1"><?php echo $key->ICIndicador ?></th>		
		<th scope="col" class="clmn1"><?php echo $key->ICTextoResultado ?></th>		
		<th scope="col" class="clmn1"><?php echo number_format($key->ICNumerador, 2) ?></th>
		<th scope="col" class="clmn1"><?php echo number_format($key->ICDenominador, 2) ?></th>
		<th scope="col" class="clmn1"><?php echo number_format($key->ICResultado, 2)." ".$key->UnidadMedida ?></th>
		<!--<th scope="col" class="clmn1"><?php echo date("Y", strtotime($key->ICFecha)) ?></th> -->
		<th scope="col" class="clmn1"><?php echo $key->Periodo ?></th>
		<th scope="col" class="clmn1"><?php echo $key->ICCalificacion ?></th>
		<th scope="col" class="clmn1"><?php echo $key->ICComentario ?></th>
		<th scope="col" class="clmn9" style="display:none">
          <ul class="edittablamd">
            <li> 
              <a href="<?php echo base_url();?>indicadorEmpresa/editarIndicadorCuantitativoCalificado/<?php echo $key->IdIndicadorCalificado;?>"><img src="<?php echo base_url();?>imagenes/ACTUALIZAR.png" width="30" height="28" alt=""/></a>
            </li>
          </ul>
        </th>			
	</tr>
<?php endforeach;
}
?>
	</tbody>

		</table>

	<!-- </form>	 -->
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