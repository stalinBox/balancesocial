<script src="<?php echo base_url()?>js/jquery.min.js"></script>
<link rel="stylesheet"  href="<?php echo base_url() ?>css/bootstrap.min.css">
<script src="<?php echo base_url()?>js/jquery-1.11.3.min.js"></script>
<script src="<?php echo base_url()?>js/bootstrap.min.js"></script>
<link href="<?php echo base_url()?>css/dataTables.bootstrap.min.css" rel="stylesheet"/>

<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datetimepicker.min.css" >
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datepicker.css" > 

<script src="<?php echo base_url()?>js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url()?>js/table/table.js"></script>

<script src="<?php echo base_url()?>js/calendario/moment.min.js"></script>
<script src="<?php echo base_url()?>js/calendario/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo base_url()?>js/calendario/bootstrap-datetimepicker.es.js"></script>
<script src="<?php echo base_url()?>js/calendario/bootstrap-datepicker.js"></script>

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
	function generarDatos(){
		anio = document.getElementById('txtAnio').value;
		window.location="<?php echo base_url()?>balanceSocial/ejecutarGenerarDatosTotales/"+anio+"";
	}	
	function generarInsertarNumeradorDenominador(){
		anio = document.getElementById('txtAnio').value;
		window.location="<?php echo base_url()?>balanceSocial/ejecutarInsertarNumeradorDenominador/"+anio+"";
	}	
	function generarCalificarIndicador(){
		anio = document.getElementById('txtAnio').value;
		window.location="<?php echo base_url()?>balanceSocial/ejeutarCalificarIndicador/"+anio+"";
	}
	function generarActualizarResultadoyCalificarIndicador($Id){
		anio = document.getElementById('txtAnio').value;
		window.location="<?php echo base_url()?>balanceSocial/ejeutarCalificarIndicador/"+anio+"";
	}
	function regresar(){
		window.location="<?php echo base_url()?>balanceSocial";
	}
	function denegado() {
		alert("No cuenta con el permiso");
	}
</script>
<?php 
/*
echo "Permisos Balance Social ";
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
					<a href="#" <?php if (@$permisos[0]->Agregar == 1 OR @$admin == 1) { echo 'onclick="generarDatos()"';}else{echo 'onclick="denegado()"';} ?> title="Generar Datos"><img src="<?php echo base_url()?>imagenes/generar-datos.png" width="20" height="20" alt=""/></a>
				</li>
			</ul>
			<ul class="manipdatos2">
				<li> 
					<a href="#" <?php if (@$permisos[0]->Actualizar == 1 OR @$admin == 1) { echo 'onclick="generarInsertarNumeradorDenominador()"';}else{echo 'onclick="denegado()"';} ?> title="Generar Resultado"><img src="<?php echo base_url()?>imagenes/calcular-datos.png" width="20" height="20" alt=""/></a>
				</li>
			</ul>
			<ul class="manipdatos">
				<li> 
					<a href="#" <?php if (@$permisos[0]->Actualizar == 1 OR @$admin == 1) { echo 'onclick="generarCalificarIndicador()"';}else{echo 'onclick="denegado()"';} ?> title="Calificar Indicadores"><img src="<?php echo base_url()?>imagenes/enviar-datos.png"> </a>
				</li>
			</ul>
			<ul class="manipdatos2">
				<li> 
					<a href="#" onclick="regresar()" title="Atras" ><img src="<?php echo base_url()?>imagenes/ATRAS.png" width="20" height="20" alt=""/></a>
				</li>
			</ul>
		</div>


	<div id="contenedor" style="margin:15px auto">
		<!-- <form action="<?php echo base_url()?>balanceSocial/" id="form1" method="POST">	 -->
			<table id="tablaPaginada" class="table table-bordered table-striped table-hover">	
			<tbody>
				<tr>
					<th class="izquierda">Ingrese año de cálculo: </th>
					<td>
					<div class='input-group date' id='divPeriodo'>
                      <input type='text' id="txtAnio" name="txtAnio" class="form-control" value="<?php echo set_value('txtAnio', $anio); ?>" readonly/>
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>
                	</td>
				</tr>
			</tbody>
		</table>	
				<table id="tablaPaginada" class="table table-bordered table-striped table-hover">
					<thead>
						<tr class="horizontalazul">
							<th scope="col" class="clmn1">Código</th>
							<th scope="col" class="clmn1">Periodo</th>
							<th scope="col" class="clmn1">Fecha</th>
							<th scope="col" class="clmn7" style="display:none">Recalcular</th>
							<th scope="col" class="clmn7">Descartar</th>
						</tr>
					</thead>  	
					<tbody>
						<?php 
						if (!empty($datosTotales)) {
							foreach ($datosTotales as $key): 
								$id   = base64_encode($key->IdDatosTotales);
							?>
							<tr class="horizontalcuerpo">
								<th scope="col" class="clmn1"><?php echo $key->IdDatosTotales ?></th>
								<th scope="col" class="clmn1"><?php echo $key->Periodo ?></th>
								<th scope="col" class="clmn1"><?php echo $key->FechaSistema ?></th>	
								<th scope="col" class="clmn9" style="display:none">
									<ul class="edittablamd">
										<li> 
											<a href="<?php echo base_url();?>balanceSocial/recalcularDatosTotales/<?php echo $key->IdDatosTotales;?>"><img src="<?php echo base_url();?>imagenes/ACTUALIZAR.png" width="30" height="28" alt=""/></a>
										</li>
									</ul>
								</th>
								<?php if (@$permisos[0]->Eliminar == 1 OR @$admin == 1) { ?>
								<th scope="col" class="clmn10">
									<ul class="borrartablamd">
										<li> 
											<a href="#" onclick="elimiarDatosTotalesGenerados('<?php echo $key->IdDatosTotales; ?>');"><img src="<?php echo base_url();?>imagenes/BORRAR1.png" width="30" height="28" alt=""/></a>
										</li>
									</ul>
								</th>
								<?php
								}
								 ?>								
							</tr>			
						<?php endforeach;
					}
					?>
				</tbody>

			</table>

		<!-- </form>	 -->
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



   <script type="text/javascript">
     $('#divMiCalendario').datetimepicker({
          format: 'YYYY-MM-DD'
      });

     $('#divPeriodo').datepicker({
          	format: "yyyy",
    		viewMode: "years", 
    		minViewMode: "years"
    });
   </script>

<script type="text/javascript">
// LLAMADA A LA FUNCION ELIMINAR Y LA VENTANA MODAL
	function elimiarDatosTotalesGenerados(id){
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
				var IdDatosTot=id;
				$.post('<?php echo base_url(); ?>balanceSocial/elimiarDatosTotalesGenerados',{IdDatosTot: IdDatosTot},function(data) {
				location.reload();
				});
			}
		});
}
</script>

