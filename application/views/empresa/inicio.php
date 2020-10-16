<!DOCTYPE html>
<html lang="es">

	<head>
        <link rel="stylesheet" type="text/css" href="<?php base_url() ?>css/bootstrap-3.3.7-dist">
    	<meta charset="utf-8" />
    	<title>Inicio Sistema Balance Social, como Empresa</title>
    </head>
    <?php $avr = 0; ?>
    <body>
    <h1><center> Sistema Balance Social para la PYME's</center></h1>

    <h2><center> CodeIgniter ejecutandose con éxito</center></h2>
    <?php if ($avr == 0) { ?>
	<a href="<?php base_url() ?>Login_Controlador">Iniciar Sesión</a>
	<?php }else{ ?>
    <a href="<?php base_url() ?>Login_Controlador">Cerrar Sesión</a>
	<?php }  ?>
    </body>
    
</html>