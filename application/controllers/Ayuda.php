<?php 
/**
* 
*/
class ayuda extends CI_Controller{

	function __construct(){
		parent::__construct();
	}
	public function verAyuda(){
		if($this->session->userdata("IdEmpresaSesion")){
			redirect('libPDF/examples/ayuda.php');
		}else{
			redirect('inicio');
		}
	}
}
 ?>