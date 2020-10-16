   <h4><center> Ingrese Usuario y Contraseña para continuar</center></h4>
     
      <form name="log" action="<?php echo base_url()?>Login_Controlador/validarUsuarioAdmin" method="POST">         
            <center>                
            <label>Usuario</label><br />
            <input type="text" name="txtUsername" id="username" maxlength="15" /><br/>
            <label>Contraseña</label><br />
            <input type="password" name="txtPasswd" id="passwd" maxlength="10" /><br/>
            <input type="submit" name="enter" value="Ingresar" />   <br>            
            <label>Empresa</label>
            <?php echo @$Empresas[0]->idEmpresa; ?>
            <br>            
            </center>
        </form>
  <div style="font-size: 16px; color: #cc0000;"> 
        <?php 
        echo isset($error) ? utf8_decode($error) : '';
        ?>
            
  </div>