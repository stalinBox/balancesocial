  <script src="<?php echo base_url()?>js/jquery.min.js"></script>
  <link rel="stylesheet"  href="<?php echo base_url() ?>css/bootstrap.min.css">
  <script src="<?php echo base_url()?>js/jquery-1.11.3.min.js"></script>
  <script src="<?php echo base_url()?>js/bootstrap.min.js"></script>
  <link href="<?php echo base_url()?>css/dataTables.bootstrap.min.css" rel="stylesheet"/>

<script src="<?php echo base_url()?>js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url()?>js/dataTables.checkboxes.min.js"></script>
<script src="<?php echo base_url()?>js/table/table.js"></script>

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
		window.location="<?php echo base_url()?>empleado/nuevoEmpleado"
	}
	function regresar(){
		window.location="<?php echo base_url()?>empleado";
	}
	function denegado() {
		alert("No cuenta con el permiso");
	}
</script>
<style type="text/css">
  div.dataTables_wrapper {
        width: 800px;
        margin: 0 auto;
    }
</style>

<div id="MANIPULACIONDATOS">
<div id="menumanipulaciondatos">
  		<ul class="manipdatos">
	<li> 
		<a href="#" <?php if (@$permisos[0]->Agregar == 1 OR @$admin == 1) { echo 'onclick="nuevo()"';}else{echo 'onclick="denegado()"';} ?> title="Agregar"><img src="<?php echo base_url()?>imagenes/NUEVO.png" width="20" height="20" alt=""/></a>
	</li>
</ul>
<ul class="manipdatos2">
	<li> 
		<a href="#" <?php if (@$permisos[0]->Actualizar == 1 OR @$admin == 1) { echo 'onclick="ocultarColumna(14,true)"';}else{echo 'onclick="denegado()"';} ?> title="Editar"><img src="<?php echo base_url()?>imagenes/EDITAR.png" width="20" height="20" alt=""/></a>
	</li>
</ul>
<ul class="manipdatos">
	<li> 
		<a href="#" <?php if (@$permisos[0]->Eliminar == 1 OR @$admin == 1) { echo 'onclick="ocultarColumna(15,true)"';}else{echo 'onclick="denegado()"';} ?> title="Descartar"><img src="<?php echo base_url()?>imagenes/BORRAR-MENU.png" width="20" height="20" alt=""/></a>
	</li>
</ul>
<ul class="manipdatos">
  <li>
    <a href="#" <?php if (@$permisos[0]->Eliminar == 1 OR @$admin == 1) { echo 'onclick="duplicarEmpleado()"';}else{echo 'onclick="denegado()"';} ?> title="Dupllicar"><img src="<?php echo base_url()?>imagenes/generar-datos.png" width="20" height="20" alt=""/></a>
  </li>
</ul>
<ul class="manipdatos2">
	<li> 
		<a href="#" onclick="regresar()" title="Atras" ><img src="<?php echo base_url()?>imagenes/ATRAS.png" width="20" height="20" alt=""/></a>
	</li>
</ul>
</div>
</br>
<div id="contenedor" class="contenedor">
    <table id="tablaPaginada" border="1" class="table table-bordered table-striped table-hover text-centered table-sm" style="width:100%" >

    <thead>
      <tr class="horizontalazul">
        <th >Empleado</th>       
        <th >Estado Laboral</th>
        <th >Discapacidad</th>
        <th >Instrucción</th>
        <th >Cargo Estructural</th>
        <th >Edad</th>
        <th >Salario</th>
        <th >Etnia</th>
        <th >F. Ingreso</th>
        <th >F. Salida</th>
        <th >Pertenece a Sindicato</th>
        <th >Afiliado al IESS</th>
        <th >Cláusulas</th>
        <th >Región</th>
        <th scope="col" class="clmn9" style="display:none">Editar</th>
        <th scope="col" class="clmn10" style="display:none">Eliminar</th>
      </tr>
    </thead>
    <tbody>
     <?php 
      if (!empty($empleados)) {
        foreach ($empleados as $key):
          $id   = base64_encode($key->CedulaEmpleado);
        ?>
      <tr class="horizontalcuerpo">
        <!-- <th scope="col" class="clmn1"><?php echo $key->CedulaEmpleado ?></th> -->
        <th ><?php echo $key->ApellidoPaternoEmpleado." ".$key->ApellidoMaternoEmpleado. " ".$key->NombresEmpleado ?></th>    
        <th ><?php echo $key->EstadoLaboralEmpleado ?></th>
        <th ><?php echo $key->DiscapacidadEmpleado ?></th>
        <th ><?php echo $key->InstruccionEmpleado ?></th>
        <th ><?php echo $key->CargoEstructural ?></th>
        <th ><?php echo $key->Edad ?></th>
        <!-- <th scope="col" class="clmn3"><?php echo $key->FIngresoContratoEmpleado ?></th> -->
        <!-- <th scope="col" class="clmn3"><?php echo $key->PerteneceSindicato ?></th> -->
        <th ><?php echo $key->SalarioEmpleado ?></th>
        <th ><?php echo $key->EtniaEmpleado ?></th>
        <th ><?php echo $key->FIngresoContratoEmpleado ?></th>
        <th ><?php echo $key->FSalidaEmpleado ?></th>
        <th ><?php if ($key->PerteneceSindicato > 0) { echo "SI";}else{ echo "NO";} ?></th>
        <th ><?php echo $key->AfiliadoIESSEmpleado ?></th>
        <th ><?php echo $key->NumClausulasContrato ?></th>
        <th ><?php echo $key->RegionEmpleado ?></th>
        <th scope="col" class="clmn9" style="display:none">
          <ul class="edittablamd">
            <li> 
              <a href="<?php echo base_url();?>empleado/editarEmpleado/<?php echo $key->CedulaEmpleado;?>"><img src="<?php echo base_url();?>imagenes/ACTUALIZAR.png" width="30" height="28" alt=""/></a>
            </li>
          </ul>
        </th>
        <th scope="col" class="clmn10" style="display:none">
          <ul class="borrartablamd">
            <li> 
              <a href="#" onclick="eliminarEmpleado('<?php echo $key->CedulaEmpleado ?>','<?php echo $key->CedulaEmpleado ?>');"><img src="<?php echo base_url();?>imagenes/BORRAR1.png" width="30" height="28" alt=""/></a>
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

<!-- VENTANA MODAL ELIMINAR -->
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
// LLAMADA A LA FUNCION ELIMINAR Y LA VENTANA MODAL
	function eliminarEmpleado(id, nombre){
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
				var idEmpleado=id;
				$.post('<?php echo base_url(); ?>empleado/eliminarEmpleado',{idEmpleado: idEmpleado},function(data) {
				location.reload();
				});
			}
		});
}
</script>