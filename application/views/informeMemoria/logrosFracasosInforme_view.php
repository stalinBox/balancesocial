  <script src="<?php echo base_url()?>js/jquery.min.js"></script>
  <link rel="stylesheet"  href="<?php echo base_url() ?>css/bootstrap.min.css">
  <script src="<?php echo base_url()?>js/jquery-1.11.3.min.js"></script>
  <script src="<?php echo base_url()?>js/bootstrap.min.js"></script>
  <link href="<?php echo base_url()?>css/dataTables.bootstrap.min.css" rel="stylesheet"/>

<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datetimepicker.min.css" >
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datepicker.css" >

<script src="<?php echo base_url()?>js/calendario/moment.min.js"></script>
<script src="<?php echo base_url()?>js/calendario/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo base_url()?>js/calendario/bootstrap-datetimepicker.es.js"></script>
<script src="<?php echo base_url()?>js/calendario/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/modal/duplicateModal.js"></script>
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
		window.location="<?php echo base_url()?>informeMemoria/nuevoLogroFracasoInformeMemoria"
	}
	function regresar(){
		window.location="<?php echo base_url()?>informeMemoria";
	}
	function denegado() {
		alert("No cuenta con el permiso");
	}
</script>
<?php 
/*
echo "Permisos Logros y Fracasos";
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
					<a href="#" <?php if (@$permisos[0]->Agregar == 1 OR @$admin == 1) { echo 'onclick="nuevo()"';}else{echo 'onclick="denegado()"';} ?> title="Nuevo"><img src="<?php echo base_url()?>imagenes/NUEVO.png" width="20" height="20" alt=""/></a>
				</li>
			</ul>
			<ul class="manipdatos2">
				<li> 
					<a href="#" <?php if (@$permisos[0]->Actualizar == 1 OR @$admin == 1) { echo 'onclick="ocultarColumna(4,true)"';}else{echo 'onclick="denegado()"';} ?> title="Editar"><img src="<?php echo base_url()?>imagenes/EDITAR.png" width="20" height="20" alt=""/></a>
				</li>
			</ul>
			<ul class="manipdatos">
				<li> 
					<a href="#" <?php if (@$permisos[0]->Eliminar == 1 OR @$admin == 1) { echo 'onclick="ocultarColumna(5,true)"';}else{echo 'onclick="denegado()"';} ?> title="Descartar"><img src="<?php echo base_url()?>imagenes/BORRAR-MENU.png" width="20" height="20" alt=""/></a>
				</li>
			</ul>
			<ul class="manipdatos2">
				<li> 
					<a href="#" onclick="regresar()" title="Atras" ><img src="<?php echo base_url()?>imagenes/ATRAS.png" width="20" height="20" alt=""/></a>
				</li>
			</ul>
		<!-- LINK MIGRAR -->
		<ul class="manipdatos">
			<li> 
				<a href="#" <?php if (@$permisos[0]->Eliminar == 1 OR @$admin == 1) { echo 'onclick="duplicate()"';}else{echo 'onclick="denegado()"';} ?>" title="Duplicar Información"><img src="<?php echo base_url()?>imagenes/actos-contractuales.png" width="20" height="20" alt=""/></a>
			</li>
		</ul>
		<!-- FIN LINK MIGRAR -->			
		</div>

</br>
</br>
	<div id="contenedor" style="margin:15px auto">
		<table id="tablaPaginada" class="table table-bordered table-striped table-hover text-centered table-sm" style="width:100%">
				<thead>
					<tr class="horizontalazul">
						<th scope="col" class="clmn1">Logro o Fracaso</th>
						<th scope="col" class="clmn1">Descripción</th>
						<th scope="col" class="clmn1">Periodo</th>
						<th scope="col" class="clmn1">Fecha de Registro</th>
						<th scope="col" class="clmn6" style="display:none">Editar</th>
						<th scope="col" class="clmn7" style="display:none">Eliminar</th>
					</tr>
				</thead>  	
				<tbody>
					<?php 
					if (!empty($logrosFracasosInforme)) {
						foreach ($logrosFracasosInforme as $key): 
							$id   = base64_encode($key->IdLogroFracasoInforme); ?>
						<tr class="horizontalcuerpo">
							<th scope="col" class="clmn1"><?php echo $key->LogroFracaso ?></th>							
							<th scope="col" class="clmn1"><?php echo $key->Descripcion ?></th>
							<th scope="col" class="clmn1"><?php echo $key->Periodo ?></th>
							<th scope="col" class="clmn1"><?php echo $key->FechaSistema ?></th>
				<th scope="col" class="clmn9" style="display:none">
                  <ul class="edittablamd">
                    <li> 
                      <a href="<?php echo base_url();?>informeMemoria/editarLogroFracasoInformeMemoria/<?php echo $key->IdLogroFracasoInforme;?>"><img src="<?php echo base_url();?>imagenes/ACTUALIZAR.png" width="30" height="28" alt=""/></a>
                    </li>
                  </ul>
                </th>
                <th scope="col" class="clmn10" style="display:none">
                  <ul class="borrartablamd">
                    <li> 
                      <a href="#" onclick="eliminarLogroFracasoInforme('<?php echo $key->IdLogroFracasoInforme; ?>','<?php echo $key->LogroFracaso; ?>');"><img src="<?php echo base_url();?>imagenes/BORRAR1.png" width="30" height="28" alt=""/></a>
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

		<!-- VENTANA MODAL ELIMINAR-->
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
		<!-- FIN VENTANA MODAL ELIMINAR -->

		<!-- VENTANA MODAL PARA MIGRAR -->
<div id="modalDuplicate" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
	<input type="hidden" id="baseUrl" value="<?php echo base_url(); ?>">
      <div class="modal-dialog">
        <div class="modal-content">
           	<div class="modal-header">
	           	<div class="input-group col-md-12">
	           		<h3>Seleccione los registros a Migrar</h3>

					 <div class="input-group col-md-12">
					    <span class="input-group-addon">Seleccione el año de los Migrar</span>
						<select id="selectPeriodo" name="selectPeriodo" class="form-control" onchange="FilterByAnios(this.value)">
							<option selected="selected">-- Seleccionar --</option>	
							<?php 
								foreach ($anios as $key) {?>
								<option> <?php echo $key->Periodo; ?></option>									
							<?php } ?>
						</select>
					 </div><br>
					 
					 <div class="input-group col-md-12">
					    <span class="input-group-addon">Año a Replicar la información:</span>
					    <div class='input-group date' id='divPeriodo'>
					    	<input type='text' id="txtPeriodo" name="txtPeriodo" class="form-control" value="<?php echo set_value('txtPeriodo'); ?>" readonly/>
					        <span class="input-group-addon">
					        	<span class="glyphicon glyphicon-calendar"></span>
					        </span>
					   	</div>
					</div><br>
           		</div>
           	</div>

           	<div class="modal-body">
		        <table id="mytableModal" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
					<thead >
					    <tr>    
					        <th class="th-sm" id="checkall" ><input type="checkbox" /></th>
							<th class="th-sm">Logro/Fracaso</th>
							<th class="th-sm">Descripción</th>
							<th class="th-sm">Periodo</th>
					    </tr>
					</thead>
					<tbody>
					    <body onload="viewdata('informeMemoria/filtroAnioLogrosFracasos','informeMemoria/filtroAnioGuardarLogrosFracasos')">
					    </body>
					</tbody>
		        </table>
           	</div>

      		<div class="modal-footer">
        		<button type="button" class="btn btn-danger btn-md" id="modal-btn-yes">Migrar</button>
        		<button type="button" class="btn btn-danger btn-md" id="modal-btn-not">No</button>
      		</div>
  		</div>
	</div>
</div>
<!-- FIN VENTANA MODAL MIGRAR-->
<script src="<?php echo base_url()?>js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url()?>js/dataTables.checkboxes.min.js"></script>
<script src="<?php echo base_url()?>js/table/table.js"></script>

<script type="text/javascript">
	// LLAMADA A LA FUNCION ELIMINAR Y LA VENTANA MODAL
	function eliminarLogroFracasoInforme(id, nombre){
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
				var idLFInforme=id;
				$.post('<?php echo base_url(); ?>informeMemoria/eliminarLogroFracasoInforme',{idLFInforme: idLFInforme},function(data) {
				location.reload();
				});
			}
		});
}

</script>