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
		window.location="<?php echo base_url()?>saludLaboralEmpleado/nuevoSaludLaboralEmpleado"
	}
	function regresar(){
		window.location="<?php echo base_url()?>planificacionRSE/publicoInterno";
	}
	function denegado() {
		alert("No cuenta con el permiso");
	}
</script>
<?php 
/*
echo "Permisos Salud Laboral Empleado ";
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
				<a href="#" <?php if (@$permisos[0]->Agregar == 1 OR @$admin == 1) { echo 'onclick="nuevo()"';}else{echo 'onclick="denegado()"';} ?> title="Agregar"><img src="<?php echo base_url()?>imagenes/NUEVO.png" width="20" height="20" alt=""/></a>
			</li>
		</ul>
		<ul class="manipdatos2">
			<li> 
				<a href="#" <?php if (@$permisos[0]->Actualizar == 1 OR @$admin == 1) { echo 'onclick="ocultarColumna(9,true)"';}else{echo 'onclick="denegado()"';} ?> title="Editar"><img src="<?php echo base_url()?>imagenes/EDITAR.png" width="20" height="20" alt=""/></a>
			</li>
		</ul>
		<ul class="manipdatos">
			<li> 
				<a href="#" <?php if (@$permisos[0]->Eliminar == 1 OR @$admin == 1) { echo 'onclick="ocultarColumna(10,true)"';}else{echo 'onclick="denegado()"';} ?> title="Descartar"><img src="<?php echo base_url()?>imagenes/BORRAR-MENU.png" width="20" height="20" alt=""/></a>
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
					<th scope="col" class="clmn1">Nombre</th>
					<th scope="col" class="clmn1">Tipo</th>
					<th scope="col" class="clmn1">Fecha de Planificación</th>
					<th scope="col" class="clmn1">Horas Planificadas</th>
					<th scope="col" class="clmn1">Participantes Esperados</th>
					<th scope="col" class="clmn1">Costo</th>
					<th scope="col" class="clmn1">Estado</th>
					<th scope="col" class="clmn1">Horas Ejecutadas</th>
					<th scope="col" class="clmn1">Participantes</th>
					<th scope="col" class="clmn9" style="display:none">Editar</th>
					<th scope="col" class="clmn10" style="display:none">Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				if (!empty($saludLaboralEmpleado)) {
					foreach ($saludLaboralEmpleado as $key):
						$id   = base64_encode($key->IdSaludLaboral);
					?>
					<tr class="horizontalcuerpo">
						<th scope="col" class="clmn1"><?php echo $key->NombreSaludLaboral ?></th>
						<th scope="col" class="clmn1"><?php echo $key->TipoSaludLaboral ?></th>
						<th scope="col" class="clmn1"><?php echo $key->FechaPlanificacion ?></th>
						<th scope="col" class="clmn1"><?php echo $key->HorasPlanificadas ?></th>
						<th scope="col" class="clmn1"><?php echo $key->ParticipantesEsperados ?></th>
						<th scope="col" class="clmn1"><?php echo $key->CostoPlanificado ?></th>
						<th scope="col" class="clmn1"><?php echo $key->EstadoSaludLaboral ?></th>
						<th scope="col" class="clmn1"><?php echo $key->HorasEjecutadas ?></th>
						<th scope="col" class="clmn1"><?php echo $key->Participantes ?></th>
						<th scope="col" class="clmn9" style="display:none">
							<ul class="edittablamd">
								<li> 
									<a href="<?php echo base_url();?>saludLaboralEmpleado/editarSaludLaboralEmpleado/<?php echo $key->IdSaludLaboral;?>"><img src="<?php echo base_url();?>imagenes/ACTUALIZAR.png" width="30" height="28" alt=""/></a>
								</li>
							</ul>
						</th>
						<th scope="col" class="clmn10" style="display:none">
							<ul class="borrartablamd">
								<li> 
									<a href="#" onclick="eliminarSaludLaboralEmpleado('<?php echo $key->IdSaludLaboral; ?>','<?php echo $key->NombreSaludLaboral ?>');"><img src="<?php echo base_url();?>imagenes/BORRAR1.png" width="30" height="28" alt=""/></a>
								</li>
							</ul>
						</th>
					</tr>
				<?php endforeach;
			} ?>
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
	function eliminarSaludLaboralEmpleado(id, nombre){
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
				var IdSaludLab = id;
				$.post('<?php echo base_url(); ?>saludLaboralEmpleado/eliminarSaludLaboralEmpleado',{IdSaludLab: IdSaludLab},function(data) {
				location.reload();
				});
			}
		});
}
</script>

