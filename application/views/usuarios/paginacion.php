<?php
$indicadorCualitativoNum = 234;
//Si hay registros
if ($indicadorCualitativoNum > 0) {
	//Limito la busqueda
	$TAMANO_PAGINA = 10;
        $pagina = false;

	//examino la pagina a mostrar y el inicio del registro a mostrar
        if (isset($_GET["pagina"]))
            $pagina = $_GET["pagina"];
        
	if (!$pagina) {
		$inicio = 0;
		$pagina = 1;
	}
	else {
		$inicio = ($pagina - 1) * $TAMANO_PAGINA;
	}
	//calculo el total de paginas
	$total_paginas = ceil($indicadorCualitativoNum / $TAMANO_PAGINA);

	echo '<p>Esto es un ejemplo de paginacion con PHP recogiendo los datos de los articulos publicados en mi pagina principal.</p>';

	//pongo el n�mero de registros total, el tama�o de p�gina y la p�gina que se muestra
	echo '<h3>Numero de articulos: '.$indicadorCualitativoNum .'</h3>';
	echo '<h3>En cada pagina se muestra '.$TAMANO_PAGINA.' articulos ordenados por fecha de forma descendente.</h3>';
	echo '<h3>Mostrando la pagina '.$pagina.' de ' .$total_paginas.' paginas.</h3>';

	foreach ($indicadorCualitativo as $key):
	echo '<a href="http://www.jose-aguilar.com/noticias.php?ide='.$key->IdIndicadorCualitativo.'">'.$key->Fase.'</a><br>';
	 endforeach;
	echo '<p>';

$url = base_url();

	if ($total_paginas > 1) {
		if ($pagina != 1)
			echo '<a href="'.$url.'?pagina='.($pagina-1).'"><img src="'.$url.'/imagenes/izq.gif" border="0"></a>';
		for ($i=1;$i<=$total_paginas;$i++) {
			if ($pagina == $i)
				//si muestro el �ndice de la p�gina actual, no coloco enlace
				echo $pagina;
			else
				//si el �ndice no corresponde con la p�gina mostrada actualmente,
				//coloco el enlace para ir a esa p�gina
				echo '  <a href="'.$url.'?pagina='.$i.'">'.$i.'</a>  ';
		}
		if ($pagina != $total_paginas)
			echo '<a href="'.$url.'?pagina='.($pagina+1).'"><img src="'.$url.'/imagenes/der.gif" border="0"></a>';
	}
	echo '</p>';

}
?>