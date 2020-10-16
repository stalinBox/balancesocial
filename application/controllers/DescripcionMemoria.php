<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//Controlador 
class descripcionMemoria extends CI_Controller {

	function __construct()	{
		parent::__construct();				
	}
	//Función para cargar el inicio
	public function index()	{
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$this->load->model('DescripcionMemoria_Modelo');
			$dato["contenedor"] = "descripcionMemoria/descripcionMemoria_view";
			$dato['descripcionesMemorias'] = $this->DescripcionMemoria_Modelo->getListDescripcionMemoria($IdEmpresaSesion);			
			$this->load->view("plantilla", $dato);
		}else{
			redirect('inicio');
		}		
	}
	public function descripciones(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");			
			$this->load->model('DescripcionMemoria_Modelo');
			$dato['descripcionesMemorias'] = $this->DescripcionMemoria_Modelo->getListDescripcionMemoria($IdEmpresaSesion);
			$dato["contenedor"] = "descripcionMemoria/descripcionMemoria_view";
			$this->load->view('plantilla', $dato);
		}else{
			redirect('inicio');
		}
	}
	public function nuevaDescripcionMemoria(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");			
			$this->load->model('DescripcionMemoria_Modelo'); 
			$dato["titulo"] = "Nuev Descripción de Memoria";
			$dato["accion"] = "Nuevo";
			$dato["contenedor"] = "descripcionMemoria/descripcionMemoria_new_edit";
			$this->load->view('plantilla', $dato);
		}else{
			redirect('inicio');
		}
	}
	public function editarDescripcionMemoria($IdDescripcion){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");							
			$this->load->model('DescripcionMemoria_Modelo');					
			$dato['descripcionMemoria'] = $this->DescripcionMemoria_Modelo->getDescripcionMemoria($IdDescripcion, $IdEmpresaSesion);    
			$dato["titulo"] = "Editar Descripción de Memoria";   
			$dato["accion"] = "Editar";	
			$dato["contenedor"] = "descripcionMemoria/descripcionMemoria_new_edit";
			$this->load->view('plantilla', $dato);			
		}else{
			redirect('inicio');
		}
	}
	public function guardarDescripcionMemoria(){
		$this->form_validation->set_rules('txtAnio','Año','trim|required|integer'); 		
		$this->form_validation->set_rules('txtFechaUltimaMemoria','Fecha','trim|required|integer');	
		$this->form_validation->set_rules('txtCicloPresentacion','Fecha','trim|required');
		$accion = $_POST['accion'];
		$id = $_POST['id'];			
		if ($this->form_validation->run() == false) {
			if ($accion == "Editar") {
				$this->editarDescripcionMemoria($id);
			}else{
				$this->nuevaDescripcionMemoria();
			}
		}else{
			$this->load->model('DescripcionMemoria_Modelo');
			//PENDIENTE: Recibir y obtener el IdAcuerdo para la actualización
			$tiempo = time();
			$txtAnio = $_POST["txtAnio"];
			$txtFechaUltimaMemoria = $_POST["txtFechaUltimaMemoria"];			
			$txtCicloPresentacion = $_POST["txtCicloPresentacion"];
			$txtFechaSistema = date("Y-m-d", $tiempo);			
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($_POST["accion"] == "Editar"){
				$updateDescripcionMemoria = array(					
					'Anio' => $txtAnio,
					'FechaUltimaMemoria' => $txtFechaUltimaMemoria,					
					'CicloPresentacion' => $txtCicloPresentacion,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->DescripcionMemoria_Modelo->updateDescripcionMemoria($id, $updateDescripcionMemoria, $IdEmpresaSesion)){
					$mensaje = "La Descripción de la Memoria se actualizó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarDescripcionMemoria($id);
				}else{
					$mensaje = "La Descripción de la Memoria no se ha actualizado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarDescripcionMemoria($id);
				}
			}else{
				$insertDescripcionMemoria = array(
					'Anio' => $txtAnio,
					'FechaUltimaMemoria' => $txtFechaUltimaMemoria,					
					'CicloPresentacion' => $txtCicloPresentacion,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->DescripcionMemoria_Modelo->insertDescripcionMemoria($insertDescripcionMemoria)){
					$mensaje = "La Descripción de la Memoria se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevaDescripcionMemoria();				
				}else{
					$mensaje = "La Descripción de la Memoria no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevaDescripcionMemoria();				
				}
			}			
		}
	}
	public function eliminarDescripcionMemoria(){
		$this->load->model('DescripcionMemoria_Modelo'); 		          	
		$DescripcionMemoria 		= json_decode($this->input->post('MiDescripcionMemoria'));
		$id          = base64_decode($DescripcionMemoria->Id);
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->DescripcionMemoria_Modelo->deleteDescripcionMemoria($id, $IdEmpresaSesion); 
	}

	
}

?>