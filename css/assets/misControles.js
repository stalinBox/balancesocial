// JavaScript Document me define en xhtml
function nuevoAjax()
{
var xmlhttp=false;
 	try {
 		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
 	} catch (e) {
 		try {
 			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
 		} catch (E) {
 			xmlhttp = false;
 		}
  	}
	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
 		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}

function listaAreasInves()
{

var resultado = document.getElementById('pager-wrapper');

ajax = objetoAjax();
ajax.open("GET","consultar.php=",true);
ajax.onreadystatechange=function()
 {

	if(ajax.readyState==4)
	{
	   if(ajax.readyState==4)
		{
		tabla.innerHTML= ajax.responseText;
		}	
	}
}
ajax.send(null);
}


function verificarcedula(cedula)
{
mensaje=document.getElementById("mensaje");
tabla=document.getElementById("tabla");	
ajax= nuevoAjax();
ajax.open("GET","cargar_cedula.php?cedulas="+cedula,true);
ajax.onreadystatechange=function()
 {

	if(ajax.readyState==1)
	{
	}
	else
	{
	   if(ajax.readyState==4)
		{
			if (ajax.responseText>0)
			{
				alert ("cedula ya existe");
			}
		
		}	
	}
}
ajax.send(null);
}