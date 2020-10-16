<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//Controlador 
class inicio extends CI_Controller {

	function __construct()	{
		parent::__construct();				
	}
	//Función para cargar el inicio
	public function index()	{
		//$dato["contenedor"] = "usuarios/inicio";
		//$this->load->view("plantilla/cabecera");
		//$this->load->view("plantilla/pie");
		//$this->load->view("plantilla", $dato);	
		$this->load->view("usuarios/inicio");	
	}

	public function prueba(){		
		$this->load->view("anonimos/borrar");
	}
	public function sirse()	{	
		$this->load->view("usuarios/sirse");	
	}

	
}

?>
