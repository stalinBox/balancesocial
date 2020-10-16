<!DOCTYPE html>
<html>
<head>
	<title> Principal </title>
</head>
<body>
<center><h1>Este es la págia principal</h1></center>
<?php 
	if($this->session->userdata("usuario_valido")){
		echo "Sesión iniciada por ";
		//Obtengo un array de sesión del Controlador directos del Modelo
		$sesionUsuarioBDD = $this->session->userdata("usuario");
		echo $sesionUsuarioBDD->UsuarioNombre. " ". $sesionUsuarioBDD->UsuarioApellido;
		/*		
		 //print_r($sesionUsuario);
		echo " ";
		//Obtengo los datos de del Controlador asignados en el Controlador
		echo $datosUsuario['UsuarioNombre']. " ". $datosUsuario['UsuarioApellido'];
		*/
		//print_r($listaUser);
	}else
	{
		echo "destruido";
	}
 ?>
 <a href="<?php base_url() ?>cerrarSesion">Cerrar sesión</a> 



 </body>
</html>