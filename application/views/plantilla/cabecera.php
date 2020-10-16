<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema Web RSE</title>
  <link href="<?php echo base_url() ?>css/estilos.css" rel="stylesheet" type="text/css">
  <link rel="shortcut icon" href="<?php echo base_url();?>imagenes/logo_icono.jpg">
  <link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.min.css">
  <script src="<?php echo base_url()?>js/jquery.min.js"></script>
</head>
<script type="text/javascript">
    function verAyuda(){    
    window.open("<?php echo base_url()?>ayuda/verAyuda");    
  }

</script>
<body>
  <?php 
  if($this->session->userdata("usuario")){
    $usuario = $this->session->userdata("usuario");
    $user = "Hola "." &nbsp; ".$usuario;
  }else{
    $user = "Iniciar Sesión";
  }
  ?>
  <div id="Arriba">
    <div id="dentro">
      <main id="Menu1">
<ul class="nav">

<li><a href=""><?php echo $user;?><img src="<?php echo base_url()?>imagenes/usuario.png" width="10" height="11" alt=""/></a>
  <?php 
  if ($this->session->userdata("usuario")) {?>
  <ul id="sub-menu">
    <li><a href="<?php echo base_url();?>login/logout">Salir</a></li>              
  </ul>
  <?php
}else{ ?>
<ul id="sub-menu">
  <li><a href="<?php echo base_url();?>login/logAdmin">Administrador</a></li>
  <li><a href="<?php echo base_url();?>login/logUser">Usuario</a></li>
</ul>
<?php }  ?>      
</li>
</ul>

</main>
</div>
</div><!--final div arriba .nav li -->

<div id="TODO">

  <div id="Header">
    <header id="Cabecera">


 <div id="logoinicio">
   <a title="Inicio" href="<?php echo base_url();?> "> <img src="<?php echo base_url()?>Img/logohome.jpg" width="250" height="63" alt=""/></a>
   </div>
    <div id="Menu">
      <ul class="menudentro">
      <li><a href="" title="POLITICAS"><img src="<?php echo base_url()?>Img/POLITICAS.png" width="30" height="30" alt=""/></a></li>
      <li><a href="#" onclick="verAyuda()" title="AYUDA"><img src="<?php echo base_url()?>Img/AYUDA.png" width="30" height="30" alt=""/></a></li>
      <li><a href="<?php echo base_url() ?>principal" title="HOME"><img src="<?php echo base_url()?>Img/home.png" width="30" height="30" alt=""/></a></li>
      </ul>
    </div>


    </header>
    
  </div><!--final div Header-->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
 <?php 
 if (!empty($ubicacionURL)) {
  $contador = 1;  
    foreach ($ubicacionURL as $key => $value) {
      echo '<li class="breadcrumb-item"> <a href="'.$key.'">'.$value.'</a></li>';
      if ($contador < count($ubicacionURL)) {
      }
      $contador++;
    }
 }
  ?>
  </ol>
</nav>

  <div id="Cuerpo">
   
      <div id="mensaje">
         <center>
        <em><?php messages_flash('success','mensaje','Guardado exitosamente...'); ?></em>
          </center>
      </div>
    
<div id="TAB">