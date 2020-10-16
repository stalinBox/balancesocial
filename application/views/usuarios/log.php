   <h4><center> Ingrese su Usuario, Contraseña y seleccione su Empresa para continuar</center></h4>
     
      <form name="log" action="Login_Controlador/validarUsuario" method="POST">         
            <center>                
            <label>Usuario</label><br />
            <input type="text" name="txtUsername" id="username" maxlength="15" /><br/>
            <label>Contraseña</label><br />
            <input type="password" name="txtPasswd" id="passwd" maxlength="10" /><br/>
            <input type="submit" name="enter" value="Ingresar" />   <br>            
            <label>Empresa</label>
            <?php echo @$Empresas[0]->idEmpresa; ?>
            <br>
            <?php // print_r($Empresas) ?>
            <h4>Seleccione su empresa</h4>
            <select name="isEmpresa">
            <?php 
              foreach ($Empresas as $item){
                echo '<option valueS="'.$item->idEmpresa.'">'.$item->NombreEmpresa.'</option>';
              }
             ?>
              
            </select>
            </center>
        </form>
  <div style="font-size: 16px; color: #cc0000;"> 
        <?php 
        echo isset($error) ? utf8_decode($error) : '';
        ?>
            
  </div>