<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Sistema Web RSE</title>
<link href="<?php echo base_url()?>css/estilos.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url()?>css/bootstrap.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
function MM_showHideLayers() { //v9.0
  var i,p,v,obj,args=MM_showHideLayers.arguments;
  for (i=0; i<(args.length-2); i+=3) 
  with (document) if (getElementById && ((obj=getElementById(args[i]))!=null)) { v=args[i+2];
    if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v=='hide')?'hidden':v; }
    obj.visibility=v; }
}
</script>
</head>
<body>
<div id="Arriba">
 <div id="dentro">
  <main id="Menu1">
      <ul class="nav">
          <li>
            <a href="" onClick="MM_showHideLayers('sub-menu','','show');MM_showHideLayers('sub-menu','','hide')">Inicio Sesión <img src="<?php echo base_url() ?>imagenes/usuario.png" alt=""/></a>
            <ul id="sub-menu">
              <li><a href="<?php echo base_url();?>login/logAdmin">Administrador</a></li>
              <li><a href="<?php echo base_url();?>login/logUser">Usuario</a></li>
            </ul>
          </li>
      </ul>
    </main>
 </div>

</div><!--final div arriba .nav li -->
<div id="TODO">
  <div id="Header"> 
  <header id="Cabecera">
    <div id="logoinicio">
      <img src="<?php echo base_url() ?>Img/logohome.jpg" width="250" height="63" alt=""/>
      </div>      
    
     <div id="menubienvenida">
      <div id="mbienvenida2">            
        <ul class="mhome">
              <li><a href="<?php echo base_url()?>" ><br>INICIO</a></li>
            </ul>
          <ul class="mhome">
              <li><a href="<?php echo base_url()?>inicio/sirse" ><br>SI-RSE</a></li>
          </ul>
          <ul class="mhome">
              <li><a href="#" ><br>NOTICIAS</a></li>
          </ul>
          <ul class="mhome">
              <li><a href="#" ><br>CONTACTOS</a></li>
          </ul>                  
       </div>

      </div>
    
    </header>
    
  </div><!--final div Header-->
</div><!--final div TODO-->
 
<div id="anuncios">
  <div id="carousel1" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carousel1" data-slide-to="0" class="active"></li>
      <li data-target="#carousel1" data-slide-to="1"></li>
      <li data-target="#carousel1" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <div class="item active"><img src="<?php echo base_url() ?>Img/anuncios/1.png" alt="First slide image" class="center-block">
 
      </div>
      <div class="item"><img src="<?php echo base_url() ?>Img/anuncios/2.png" alt="Second slide image" class="center-block">
  
      </div>
      <div class="item"><img src="<?php echo base_url() ?>Img/anuncios/3.png" alt="Third slide image" class="center-block">

      </div>
      
    </div>
    <a class="left carousel-control" href="#carousel1" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span><span class="sr-only">Anterior</span></a><a class="right carousel-control" href="#carousel1" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><span class="sr-only">Siguiente</span></a>
    </div>
    
</div>
  
<div id="todo2">
 <div id="todo100">
 
  <section class="infocol">
    <p class="tittulobienvenida">BIENVENIDO AL SISTEMA DE</p>
    <p class="textobienvenida">
      RESPONSABILIDAD SOCIAL EMPRESARIAL
    </p>
  </section>
  <section class="infocol2">
      <img src="<?php echo base_url() ?>Img/Baner1.png" class="img-responsive" alt="Placeholder image">
      </section>
    
<section class="infocol3">
  <p class="titulocol3">
    ÁMBITO
  </p>
  <p class="titul2ocol3">
    SOCIAL  
  </p>
  <p class="textocol3">
  Aspirar a políticas de Recursos Humanos justas. 
  </p>
  
  <div class="menucolumna3">
    <ul class="menucol3">
        <li><a href="">MÁS INFORMACIÓN</a></li>
    </ul>
  </div>
</section>

<div class="infocol4">

  <section class="inf4peq">
    <p class="tuno4">ÁMBITO</p>
    <p class="tdos4">ECONÓMICO</p>
    <p class="texuno4">Llevar a cabo nuestros negocios de una manera ética.</p>
    <div class="menucolumna4">
    <ul class="menucol4">
        <li><a href="">MÁS INFORMACIÓN</a></li>
    </ul>
    </div>
  </section>
  
  <section class="inf4grad">
    <img src="<?php echo base_url() ?>Img/baner-2.png" class="img-responsive" alt="Placeholder image">
    </section>
      
</div>
<div class="infocol5">

  <section class="grand5">
    <img src="<?php echo base_url() ?>Img/baner3.png" class="img-responsive" alt="Placeholder image">
    </section>
    
  <section class="infpeq5">
      <p class="tuno5">ÁMBITO</p>
      <p class="tdos5">MEDIOAMBIENTAL</p>
      <p class="texuno5">Compromiso con la protección del medioambiente.</p>
    <div class="menucolumna5">
        <ul class="menucol5">
          <li><a href="">MÁS INFORMACIÓN</a></li>
        </ul>
      </div>
  </section>
  </div>
 </div>
</div>
  
<div id="Pie">
  <div id="piedentro">
    <section class="Columna" id="Pobje1">
      <p class="titulopie">DIRECCIÓN</p>
      <p>
        Ambato, Los Cahsquis e Isidro Viteri
      </p>
      <p>ATENCIÓN</p>
      <p>
      Lunes a Viernes: 8h00-16h00<br>
    Sábados de 8h00-12h00
      </p>
      </section>
      <section class="Columna" id="Pobje2">
        <p class="titulopie">CONTÁCTENOS</p>
        <p>
        Tfno:(593 3) 84 85 51<br>
        Fax (593 3) 41 65 35<br>
        sistemarseecu@gmail.com<br>
        Ambato-Ecuador
        </p>
      </section>
      
      <section class="Columna" id="Pobje3">
      <p class="titulopie">SERVICIO AL CLIENTE</p>
        <p>
        callcenterrse@hotmail.com<br>
      Tfno: 2 77 00 55<br>
      Extención 085 <br>
      </p>
      </section>
      
      <section class="Columna" id="Pobje4">
        <p class="titulopie">RSE EN REDES SOCIALES </p>
        <p>
         <img src="<?php echo base_url() ?>Img/facebook.png" width="15" height="15" alt=""/>/Sistema R.S.E <br>
         <img src="<?php echo base_url() ?>Img/twitter.png" width="15" height="15" alt=""/>/Sistema R.S.E <br>
         <img src="<?php echo base_url() ?>Img/Instagram.png" width="15" height="15" alt=""/>/Sistema R.S.E <br>
         <img src="<?php echo base_url() ?>Img/linkedin.png" width="15" height="15" alt=""/>/ Sistema R.S.E <br>
         </p>
      </section>
  </div>
  <div id="copyright">
    Copyright © 2017 Sistema Responsabilidad Social Empresarial
  </div>
</div><!--final div pie-->
<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>