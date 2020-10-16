        <?php //echo validation_errors(); ?>
<!--       <div class="row">
          <div class="col-lg-6">
            <div class="well bs-component">
              <form class="form-horizontal" method="post" action="Login/validarUsuario">
                <fieldset>
                  <legend>Inicio de Sesión</legend>
                  <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">Correo:</label>
                    <div class="col-lg-10">
                      <input type="text" name="correo" class="form-control" id="inputEmail" placeholder="Email" value="<?php set_value('correo') ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword" class="col-lg-2 control-label">Contraseña:</label>
                    <div class="col-lg-10">
                      <input type="password" name="contrasenia" class="form-control" id="inputPassword" placeholder="Password">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                      <button type="submit" class="btn btn-primary">Enviar</button>
                      <button class="btn btn-default">Cancelar</button>
                    </div>
                  </div>
                </fieldset>
              </form>
            </div>
          </div>
-->

<div id="content">
	<div id="login">
		<h3>Inicie sesión para continuar</h3>
		<?php echo validation_errors();  ?>
		<?php echo form_open("login/validarUsuario"); ?>
			<div class="row">
				<div class="col-lg-5">		
					<div class="form-group">
			            <label for="inputEmail" class="col-lg-2 control-label">Correo:</label>
			             	<div class="col-lg-10">
			                      <input type="text" name="correo" class="form-control" id="inputEmail" placeholder="Email" value="<?php echo set_value('correo') ?>">
			                </div>
			         </div>

			      	 <div class="form-group">
			            <label for="inputPassword" class="col-lg-2 control-label">Contraseña:</label>
			                <div class="col-lg-10">
			                      <input type="password" name="contrasenia" class="form-control" id="inputPassword" placeholder="Password">
			                </div>
			        </div>
			        <div class="form-group">
			            <div class="col-lg-10 col-lg-offset-2">
			                <button type="submit" class="btn btn-primary">Enviar</button>
			                <button class="btn btn-default">Cancelar</button>
			            </div>
			        </div>
				</div>
			</div>

	<?php echo form_close(); ?> 
	<p>Si no tiene una cuenta haga click  
		<?php echo anchor("login/crear_cuenta","aqui"); ?>
	</p>
	</div>
</div>
