<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.min.css">
<script type="text/javascript">
	function regresar(){
		window.location="<?php echo base_url()?>empresa/productos";
	}
	
	function limpiar() {
		var t = document.getElementById("form1").getElementsByTagName("input");
//var t = document.getElementById("TAB").getElementsByTagName("input");
for (var i=0; i<t.length; i++) {
	if (t[i].type == "text") {		
		t[i].value = "";
	}
}
window.location="<?php echo base_url()?>empresa/nuevoProducto";
}
</script>
<h3 class="page-header" align="center"><span class="glyphicon glyphicon-th-list"></span> <?php echo $titulo; ?></h3>

<div id="TAB">
    <div class="error"> 
    <center>
      <?php messages_flash('danger',validation_errors(),'Errores del formulario', true); ?>
    </center>
    </div>
	  	<form action="<?php echo base_url()?>empresa/guardarProducto" id="form1" method="POST" enctype="multipart/form-data">
	  	<table width="100%" cellspacing=8px" id="Tabla1">
		  <tbody>		  
		  <input type="hidden" name="accion" value="<?php echo $accion; ?>">
		  <input type="hidden" name="id" value="<?php echo @$productoEmpresa[0]->IdProductosEmpresa; ?>">
			<tr>
			  <th class="izquierda">Producto de la Empresa: </th>
			  <td>
				<input class="form-control" type="text" name="txtProducto"  placeholder="Ingresar datos" value="<?php echo set_value('txtProducto',@$productoEmpresa[0]->NombreProductosEmpresa); ?>">
				</td>
			</tr>
			<tr>
			  <th class="izquierda">Costo: </th>
			  <td><input class="form-control" type="text" name="txtCosto"  placeholder="Ingresar datos" value="<?php echo set_value('txtCosto',@$productoEmpresa[0]->CostoProductoEmpresa); ?>"></td>
			</tr>
			<tr>
			  <th class="izquierda">IVA: </th>
			  <td><input class="form-control" type="text" name="txtIVA"  placeholder="Ingresar datos" value="<?php echo set_value('txtIVA',@$productoEmpresa[0]->IVAProductoEmpresa); ?>"></td>
			</tr>
			<tr>
			  <th class="izquierda">Descripción del Producto: </th>
			  <td><input class="form-control" type="text" name="txtDescripcion"  placeholder="Ingresar datos" value="<?php echo set_value('txtDescripcion',@$productoEmpresa[0]->DescripcionProductosEmpresa); ?>"></td>
			</tr>
			<tr>
			  <th class="izquierda">Observación: </th>
			  <td><input class="form-control" type="text" name="txtObservacion"  placeholder="Ingresar datos" value="<?php echo set_value('txtObservacion',@$productoEmpresa[0]->ObservacionProductosEmpresa); ?>"></td>
			</tr>
			<tr>
				<th class="izquierda">Fotografía</th>
				<td>
					<img src="data:image/jpg;base64, <?php echo base64_encode(@$productoEmpresa[0]->Imagen) ?>" width="100" height="100" >
				</td>
			</tr>
			<tr>
				<th class="izquierda">Selccionar Imagen: </th>
				<td>
					<input type="file" name="inputImagen">
				</td>
			</tr>			
		  </tbody>
		</table>
		<table>
			<tr>
				<br>
			</tr>
			<tr>
				<td><input type="button" onclick="regresar()" name="" class="botones" value="Regresar"></td>
				<td></td>
				<td></td>		
				<td><input type="submit" name="submit" class="botones" value="Guardar"></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td><td></td>
				<td></td>
				<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
			</tr>
		</table>
	  	</form>
	  	<center>
        <div style="font-size: 16px; color: #FE2E2E;"> 
        <?php 
        echo isset($error) ? utf8_decode($error) : '';
        ?>            
       </div>
       </center>












	  </div>