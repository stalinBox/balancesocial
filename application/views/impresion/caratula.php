<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Sistema Web RSE</title>
<link rel="shortcut icon" href="imagenes/logo_icono.jpg">
<link href="css/estilospdf.css" rel="stylesheet" type="text/css">  
  <link rel="shortcut icon" href="<?php echo base_url();?>/imagenes/logo_icono.jpg">  
</head>
	<body>
<style type="text/css">
@page {  }
table { border-collapse:collapse; border-spacing:0; empty-cells:show }
td, th { vertical-align:top; font-size:12pt;}
h1, h2, h3, h4, h5, h6 { clear:both }
ol, ul { margin:0; padding:0;}
li { list-style: none; margin:0; padding:0;}
li span. { clear: both; line-height:0; width:0; height:0; margin:0; padding:0; }
span.footnodeNumber { padding-right:1em; }
span.annotation_style_by_filter { font-size:95%; font-family:Arial; background-color:#fff000;  margin:0; border:0; padding:0;  }
* { margin:0;}
.fr1 { font-size:12pt; font-family:Liberation Serif; text-align:center; vertical-align:top; writing-mode:lr-tb; }

.P1 { font-size:36pt; font-family:Liberation Serif; writing-mode:page; text-align:center ! important; font-style:italic; font-weight:bold; }
.P13 { font-size:20pt; line-height:120%; margin-bottom:0cm; margin-top:0cm; font-family:Liberation Serif; writing-mode:page; text-align:justify ! important; font-style:italic; font-weight:normal; }
.P9 { font-size:20pt; font-family:Liberation Serif; writing-mode:page; text-align:justify ! important; font-style:italic; font-weight:normal; }
.Standard { font-size:12pt; font-family:Liberation Serif; writing-mode:page; }
.Bullet_20_Symbols { font-family:OpenSymbol; }
 </style>

<style type="text/css">
.infobox {
  border: 1px solid #888;
  -webkit-box-shadow: 10px 10px 5px #888;
     -moz-box-shadow: 10px 10px 5px #888;
          box-shadow: 10px 10px 5px #888;
  padding: 5px 5px 5px 15px;
  width: 90%;
}
  * { margin:0;}
  
  .titulo { font-size:12pt; font-family:Liberation Serif; writing-mode:page; text-align:center ! important; } 
  .Subtitulo { font-size:28pt; font-family:Liberation Serif; writing-mode:page; text-align:justify ! important; color:#669900; font-style:italic; font-weight:bold; } 
  .colorTituloInterno { color:#006699; font-size:36pt; font-style:italic; font-weight:bold; }
  .colorTitulo { color:#006699; font-size:36pt; font-style:italic; font-weight:bold; }

</style>

	</head>


<!--
	<p class="P3">Misión
	</p>
	<p class="P8">
		<span class="T1">			
			<?php echo @$empresa[0]->MisionEmpresa; ?>
		</span>
	</p>
	<p class="P6"> 
	</p>
	<p class="P3">Visión
	</p>
	<div class="P8"><p> 
	</p>
	<span class="T1">			
		<?php echo @$empresa[0]->VisionEmpresa; ?>
	</span>
</div>
<div class="P7"><p> 
</p>
</div>
<p class="P3">Historia
</p>
<p class="P9">
	<?php echo @$empresa[0]->HistoriaEmpresa; ?>
</p>
<div class="P7">

	<p class="P10" style="margin-left:0.748cm;">
	<span class="Bullet_20_Symbols" style="display:block;float:left;min-width:0.499cm">
	</span>

	<span class="odfLiEnd"/> 
</p> 
</div>
<p class="P5">
	<span class="T2">Principios
	</span>
</p>

<ul>
<?php 
	foreach ($principios as $key) { ?>
	<li>
		<p class="P13" style="margin-left:0.748cm;">
			<span class="Bullet_20_Symbols" style="display:block;float:left;min-width:0.499cm;">•
			</span>
	<?php 	echo $key->PrincipioPrincipiosEmpresa; ?>
			<span class="odfLiEnd"/> 
		</p>
	</li>	
	<?php }
 ?>

 <p class="P10" style="margin-left:0.748cm;">
	<span class="Bullet_20_Symbols" style="display:block;float:left;min-width:0.499cm">
	</span>

	<span class="odfLiEnd"/> 
</p>
</ul>
<p class="P5">
	<span class="T2">Valores
	</span>
</p>
<ul>
<?php 
	foreach ($valores as $key) { ?>
	<li>
		<p class="P13" style="margin-left:0.748cm;">
			<span class="Bullet_20_Symbols" style="display:block;float:left;min-width:0.499cm;">•
			</span>
	<?php 	echo $key->ValorValoresEmpresa; ?>
			<span class="odfLiEnd"/> 
		</p>
	</li>	
	<?php }
 ?>
</ul>
-->


	<body dir="ltr" style="max-width:21.001cm;margin-top:2cm; margin-bottom:2cm; margin-left:2cm; margin-right:2cm; ">
	<div class="Standard">
		<div style="height:2.533cm;width:7.867cm; padding:0;  float:left; position:relative; left:0cm; " class="fr1" id="Imagen1">
		<img style="height:2.533cm;width:7.867cm;" src="<?php echo base_url(); ?>imagenes/SI-RSE.png" width="320" height="120" alt=""/>
	</div>
	</div>
	<div style="clear:both; line-height:0; width:0; height:0; margin:0; padding:0;"> 
	</div>
	<p class="titulo"><span class="colorTitulo"><?php echo @$empresa[0]->NombreEmpresa; ?></span></p>
	<p class="P1"> 
	</p>


<div class="infobox">
  <h1><p class="Subtitulo">Misión</p>
  </h1>
<p class="P9">
  	<?php echo @$empresa[0]->MisionEmpresa; ?>
  </p>
</div>
<br>
	<div class="infobox">
  <h1><p class="Subtitulo">Visión</p></h1>
<p class="P9">
  	<?php echo @$empresa[0]->VisionEmpresa; ?>
  </p>
</div>
<br>
<div class="infobox">
  <h1><p class="Subtitulo">Historia</p></h1>
<p class="P9">
	<?php echo @$empresa[0]->HistoriaEmpresa; ?>
</p>
</div>
<br>

<div class="infobox">
  <h1><p class="Subtitulo">Principios</p></h1>
  <p>
  	<ul>
<?php 
	foreach ($principios as $key) { ?>
	<li>
		<p class="P13" style="margin-left:0.748cm;">
			<span class="Bullet_20_Symbols" style="display:block;float:left;min-width:0.499cm;">•
			</span>
	<?php 	echo $key->PrincipioPrincipiosEmpresa; ?>
			<span class="odfLiEnd"/> 
		</p>
	</li>	
	<?php }
 ?>
</ul>
  </p>
</div>
<br>

<div class="infobox">
  <h1><p class="Subtitulo">Valores</p></h1>
  <p>
  	<ul>
<?php 
	foreach ($valores as $key) { ?>
	<li>
		<p class="P13" style="margin-left:0.748cm;">
			<span class="Bullet_20_Symbols" style="display:block;float:left;min-width:0.499cm;">•
			</span>
	<?php 	echo $key->ValorValoresEmpresa; ?>
			<span class="odfLiEnd"/> 
		</p>
	</li>	
	<?php }
 ?>
</ul>
  </p>
</div>





			</body>
		</html>
