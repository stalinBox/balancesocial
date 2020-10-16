<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//Controlador 
class formasAtencionCliente extends CI_Controller {

	function __construct()	{
		parent::__construct();				
	}
	//Función para cargar el inicio
	/*
	public function index()	{
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/publicoExterno" => "Público Externo",
			                     $inicioURL."formasAtencionCliente" => "Formas de Atención al Cliente"
			                    );
			$this->load->model('FormasAtencionCliente_Modelo');
			$dato['formasAtencionCliente'] = $this->FormasAtencionCliente_Modelo->getListFormasAtencionCliente($IdEmpresaSesion);
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "formasAtencionCliente/formasAtencionCliente_view";
			$this->load->view('plantilla', $dato);
		}else{
			redirect('inicio');
		}		
	}
	*/
	/**
	 *
	 */
	public function formasAtencionCliente(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/publicoExterno" => "Público Externo",
			                     $inicioURL."formasAtencionCliente/formasAtencionCliente" => "Formas de Atención al Cliente"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('FormasAtencionCliente_Modelo');
				$dato['admin'] = 1;
				$dato['formasAtencionCliente'] = $this->FormasAtencionCliente_Modelo->getListFormasAtencionCliente($IdEmpresaSesion);
				$dato["contenedor"] = "formasAtencionCliente/formasAtencionCliente_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "formasAtencionCliente", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('FormasAtencionCliente_Modelo');
						$dato['formasAtencionCliente'] = $this->FormasAtencionCliente_Modelo->getListFormasAtencionCliente($IdEmpresaSesion);
						$dato["contenedor"] = "formasAtencionCliente/formasAtencionCliente_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "formasAtencionCliente/formasAtencionCliente_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "formasAtencionCliente/formasAtencionCliente_view";
					$this->load->view('plantilla', $dato);
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function nuevaFormasAtencionCliente(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('FormasAtencionCliente_Modelo');
				$dato['formasAtencionCliente'] = $this->FormasAtencionCliente_Modelo->getListFormasAtencionCliente($IdEmpresaSesion);
				$dato["contenedor"] = "formasAtencionCliente/formasAtencionCliente_new_edit";
				$dato["titulo"] = "Nueva Forma de Atención al Cliente";
				$dato["accion"] = "Nuevo";			
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "formasAtencionCliente", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('FormasAtencionCliente_Modelo');
						$dato['formasAtencionCliente'] = $this->FormasAtencionCliente_Modelo->getListFormasAtencionCliente($IdEmpresaSesion);
						$dato["contenedor"] = "formasAtencionCliente/formasAtencionCliente_new_edit";
						$dato["titulo"] = "Nueva Forma de Atención al Cliente";
						$dato["accion"] = "Nuevo";			
						$this->load->view('plantilla', $dato);
					}else{
						$this->formasAtencionCliente();
					}
				}else{
					$this->formasAtencionCliente();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function editarFormasAtencionCliente($IdFormasAtencionCliente){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('FormasAtencionCliente_Modelo');
				$dato['formaAtencionCliente'] = $this->FormasAtencionCliente_Modelo->getFormasAtencionCliente($IdFormasAtencionCliente, $IdEmpresaSesion);    
				$dato["titulo"] = "Editar Forma de Atención al Cliente";   
				$dato["accion"] = "Editar";	
				$dato["contenedor"] = "formasAtencionCliente/formasAtencionCliente_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "formasAtencionCliente", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('FormasAtencionCliente_Modelo');
						$dato['formaAtencionCliente'] = $this->FormasAtencionCliente_Modelo->getFormasAtencionCliente($IdFormasAtencionCliente, $IdEmpresaSesion);    
						$dato["titulo"] = "Editar Forma de Atención al Cliente";   
						$dato["accion"] = "Editar";	
						$dato["contenedor"] = "formasAtencionCliente/formasAtencionCliente_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->formasAtencionCliente();
					}
				}else{
					$this->formasAtencionCliente();
				}
 			}					
		}else{
			redirect('inicio');
		}
	}
	public function guardarFormasAtencionCliente(){
		$this->form_validation->set_rules('txtFormaAtencion','Forma de Atención al Cliente','trim|required'); 
		$accion = $_POST['accion'];
		$id = $_POST['id'];			
		if ($this->form_validation->run() == false) {
			if ($accion == "Editar") {
				$this->editarFormasAtencionCliente($id);				
			}else{
				$this->nuevaFormasAtencionCliente();
			}
		}else{
			$this->load->model('FormasAtencionCliente_Modelo');			
			$tiempo = time();
			$txtFormaAtencion = $_POST["txtFormaAtencion"];
			$selectUbicacion = $_POST["selectUbicacion"];						
			$txtDescripcion = $_POST["txtDescripcion"];						
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($_POST["accion"] == "Editar"){
				$updateFormasAtencionCliente = array(					
					'NombreFormaAtencion' => $txtFormaAtencion,
					'Ubicacion' => $selectUbicacion,
					'DescripcionFormaAtencion' => $txtDescripcion,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->FormasAtencionCliente_Modelo->updateFormasAtencionCliente($id, $updateFormasAtencionCliente, $IdEmpresaSesion)){
					$mensaje = "La Forma de Atención se actualizó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarFormasAtencionCliente($id);				
				}else{
					$mensaje = "La Forma de Atención no se ha actualizado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarFormasAtencionCliente($id);				
				}
			}else{
				$insertFormasAtencionCliente = array(
					'NombreFormaAtencion' => $txtFormaAtencion,
					'Ubicacion' => $selectUbicacion,
					'DescripcionFormaAtencion' => $txtDescripcion,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->FormasAtencionCliente_Modelo->insertFormasAtencionCliente($insertFormasAtencionCliente)){
					$mensaje = "La Forma de Atención se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevaFormasAtencionCliente();				
				}else{
					$mensaje = "La Forma de Atención no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevaFormasAtencionCliente();				
				}
			}
		}
	}
	public function eliminarFormasAtencionCliente(){
		$this->load->model('FormasAtencionCliente_Modelo'); 		          	
		$id = $_POST['IdFormaAten'];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
		echo "id: ".$id." IdEmpresa: ".$IdEmpresaSesion;	
		$result = $this->FormasAtencionCliente_Modelo->deleteFormasAtencionCliente($id, $IdEmpresaSesion);
		if($result){
        	echo "Success";
    	} else{
        	echo "Error";
    	}
	}
}

?>