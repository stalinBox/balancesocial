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
   	  				<li> 
					<li><a href="<?php echo base_url()?>" ><br>INICIO</a></li>
   	  				</li>
   	  			</ul>
  			  <ul class="mhome">
   	  				<li><a href="<?php echo base_url()?>inicio/sirse" ><br>SI-RSE</a></li>
  			  </ul>
  			  <ul class="mhome">
   	  				<li> 
					<a href="#" ><br>NOTICIAS</a>
   	  				</li>
  			  </ul>
  			  <ul class="mhome">
   	  				<li> 
					<a href="#" ><br>CONTACTOS</a>
   	  				</li>
  			  </ul> 	  			
   	  			   	  			
 	 	   </div>

	  	</div>
	  
  	</header>
  	
  </div><!--final div Header-->
  
</div><!--final div TODO-->


<div id="todosirse">
  <div id="dentroirse">
  	<div id="rse1">
	  <section class="rsecol1">
	  	<p class="rsetit1">APRENDE</p>
	  </section>
	  <section class="rsecol2">
	  	<p class="rsetit2">
	  		A UTILIZAR EL NUEVO SISTEMA DE
	  	</p>
	  </section>
	  <section class="rsecol3">
	  	<p class="rsetit1">R.S.E</p>
	  </section>
    </div>
  </div>
  <div id="dentroirse2">
  	<div id="rse2">
	  <section class="rsecol3">
      <img src="<?php echo base_url() ?>Img/rse1.png" class="img-responsive" alt="Placeholder image">
      </section>
	  	 <section class="rsecol4">
	  	<p class="numerosrse">
	  		1
	  	</p>
	  </section>
    </div>
  </div>
  <div id="dentroirse3">
  	<div id="rse3">
  	  <section class="rsecol5">
	  <img src="<?php echo base_url() ?>Img/rse2.png" class="img-responsive" alt="Placeholder image"> </section>
	  	 <section class="rsecol6">
	  	<p class="numerosrse">
	  		2
	  	</p>
	  </section>
  	</div>
  </div>
  <div id="dentroirse4">
  	<div id="rse4">
  		<section class="rsecol7">
	    <img src="<?php echo base_url() ?>Img/rse3.png" class="img-responsive" alt="Placeholder image">
	    </section>
	  	 <section class="rsecol8">
	  	<p class="numerosrse">
	  		3
	  	</p>
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
   	  	Fax	(593 3) 41 65 35<br>
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
</body>
</html>
