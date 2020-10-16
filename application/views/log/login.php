    <div id="TAB">
    <div class="error"> 
    <center>
      <?php echo validation_errors(); ?>
    </center>
    </div>
      <form action="<?php echo base_url()?>login/validarUsuario" id="form1" method="POST">
      <table width="100%" border="2" cellspacing=8px" id="Tabla1">
      <tbody>
      <tr>
        <th class="izquierda">Usuario: </th>
        <td><input class="formulario1" type="text" name="correo"  placeholder="Ingresar Usuario" value="<?php echo set_value('correo'); ?>" ></td>
      </tr>
      <tr>
        <th class="izquierda">Contraseña: </th>
        <td>
        <input class="formulario1" type="text" name="contrasenia"  placeholder="Ingresar Contraseña">
        </td>
      </tr>
      <tr>
        <th class="izquierda">Tipo de Sesión</th>
        <td>
          <select name="selectSesion">
            <option value="1">Administrador</option>
            <option value="2">Usuario</option>
          </select>
        </td>
      </tr>
      <?php 


       ?>
<!--
      <tr>
      <th class="izquierda">Empresa:</th>
        <td>
          <select name="empresas" id="empresas" type="hidden" >
            <?php 
              foreach ($empresas as $items) {?>
              <option value="<?php echo $items->IdEmpresa; ?>"><?php echo $items->NombreEmpresa;?></option>      
              <?php }?>
          </select>
        </td>
      </tr>
-->
      <tr>
        <td colspan="2">
          <input type="submit" name="submit" class="botones" value="INGRESAR">
        </td>
      </tr>     
      </tbody>
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


<!--
<form name="form1" method="post" action="">
<select name="productos" size="1" onChange='ChangeUrlTipo(this.form)'>
<option selected>Escoga una opción</option>
<option value=1>Producto 1</option>
<option value=2>Producto 2</option>
<option value=3>Producto 3</option>
</select>
</form>


<script type="text/javascript">
  function ChangeUrlTipo(formulaire){
    destino = 'http://www.google.cl'
    if (formulaire.productos.selectedIndex != 0){
      location.href = destino + '?productos='+formulaire.productos.options[formulaire.productos.selectedIndex].value;}
    }

</script>
-->


<script type="text/javascript">
window.onload = function () {
                /* Variables globales (por estar declaradas sin var) */
                //casillaDatos = document.getElementById('datos'); //Nodo donde vamos a mostrar los datos                
                casillaDatos = document.getElementById('Tabla1');                
               
                var elementosDelForm = document.getElementsByTagName('input'); //Elementos input
                var elementosSelect = document.getElementsByTagName('select');
                //var t = document.getElementById("TAB").getElementsByTagName("input");
                
                for(var i=0; i<elementosDelForm.length;i++) {
                  if (elementosDelForm[i].type == 'radio') {
                      elementosDelForm[i].addEventListener("click", actualizarDatos);
                  }else{
                    elementosDelForm[i].addEventListener("change", actualizarDatos);
                  }
                }
                for (var i=0; i<elementosSelect.length;i++) {
                  elementosSelect[i].addEventListener("change", actualizarDatos);
                }
}
 
function actualizarDatos() {
    var filaAgregada = false;
 
var elementoCiudad = document.getElementById('ciudad');
    var sw = false;
/*
  if (elementoCiudad.options[elementoCiudad.selectedIndex].text == 'Administrador') {
  var table = document.getElementById("Tabla1");
  {
  var row = table.insertRow(3);
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  //cell1.innerHTML = elementoCiudad.options[elementoCiudad.selectedIndex].text;
  cell1.innerHTML = '<tr><th class="izquierda">Empresa:</th>';
  cell2.innerHTML = '<td><select name="empresas" id="empresas" type="hidden" ><?php foreach ($empresas as $items) {?><option value="<?php echo $items->IdEmpresa; ?>"><?php echo $items->NombreEmpresa;?></option><?php }?></select></td></tr>';
  sw = true;
  }
  }else{
    if (!sw) {
               var table = document.getElementById("Tabla1");
               var rowCount = table.rows.length;
               //for(var i=0; i<rowCount; i++) {
                    //var row = table.rows[rowCount-2];
                         table.deleteRow(rowCount-2);
                         rowCount--;
                         i--;
               //}
    }
    sw = false;
  }
*/
if (elementoCiudad.options[elementoCiudad.selectedIndex].text == 'Administrador') {
    if (!filaAgregada) {
      //agregar fila y poner a true
        var table = document.getElementById("Tabla1");
  {
  var row = table.insertRow(3);
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  var cell3 = row.insertCell(2);
  //cell1.innerHTML = elementoCiudad.options[elementoCiudad.selectedIndex].text;
  //cell1.innerHTML = '<tr><th class="izquierda">Empresa:</th>';
  cell1.innerHTML = filaAgregada;
  cell2.innerHTML = '<td><select name="empresas" id="empresas" type="hidden" ><?php foreach ($empresas as $items) {?><option value="<?php echo $items->IdEmpresa; ?>"><?php echo $items->NombreEmpresa;?></option><?php }?></select></td></tr>';
  filaAgregada = true;
  cell3.innerHTML = filaAgregada;
  }
    }
}else{
  if (filaAgregada) {
    //eliminar fila y hacer false
    var table = document.getElementById("Tabla1");
               var rowCount = table.rows.length;
                         table.deleteRow(rowCount-2);
      filaAgregada = false;
  }

}

  /*
casillaDatos.innerHTML=
'<option value=1>Producto 1</option>'+
'<tr><th>Prueba</th><td><select><option value="1">uno</option><option value="2">dos</option></select></td></tr>'+
'<p>Nombre: '    +document.getElementById('nombre').value+'</p>'+
'<p>Apellidos: ' + (document.getElementById('apellidos').value||' --- ')+'</p>'+
'<p>Ciudad: '    + (elementoCiudad.options[elementoCiudad.selectedIndex].text||' --- ')+'</p>';
*/
}
</script>


<h3>Ejemplos JavaScript</h3>
    <div class="estiloForm">
    <form name ="formularioContacto" method="get" action="#">
        <label>Nombre</label><input id="nombre" name="nombre" type="text"/><br/>
        <label>Apellidos</label><input id="apellidos" name="apellidos" type="text"/><br/>
        
        <label>Ciudad</label>
        <select id="ciudad" name="ciudad">
            <option value="">Elija opción</option>
            <option value="Mexico">México D.F. (MX)</option>
            <option value="Madrid">Madrid (ES)</option>
            <option value="Santiago">Santiago (CL)</option>
            <option value="Administrador">Administrador</option>
        </select><br/>


    </div>
    <div style="float:left;">    
    <div id="datos" style="float:left;"><h4> Datos introducidos: </h4></div>
    </form>
    </div>