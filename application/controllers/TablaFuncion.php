<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class tablaFuncion extends CI_Controller {

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
			                     $inicioURL."empresa/administrador" => "Administrador",
			                     $inicioURL."tablaFuncion" => "Tablas / Funciones"
			                    );
 			$dato["ubicacionURL"] = $relativeURL;

			$this->load->model('TablasFunciones_Modelo');
			$dato["tablasFunciones"] = $this->TablasFunciones_Modelo->getListTablasFunciones($IdEmpresaSesion); 			
 			$dato["contenedor"] = "empresa/tablasFunciones_view";
			$this->load->view("plantilla", $dato);			
		}else{
			redirect('inicio');
		}
	}*/
	public function tablasFunciones(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa/administrador" => "Administrador",
			                     $inicioURL."tablaFuncion/tablasFunciones" => "Tablas / Funciones"
			                    );
 			$dato["ubicacionURL"] = $relativeURL;
 			//Obtengo el tipo de usuario
 			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('TablasFunciones_Modelo');
				$dato["tablasFunciones"] = $this->TablasFunciones_Modelo->getListTablasFunciones($IdEmpresaSesion); 			
	 			$dato["contenedor"] = "empresa/tablasFunciones_view";
	 			$dato["admin"] = 1;
				//$this->load->view("plantilla", $dato);
 			}else{
 				//Obtengo el Perfil
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
 				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "tablaFuncion", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {					
					$this->load->model('TablasFunciones_Modelo');
					$dato["tablasFunciones"] = $this->TablasFunciones_Modelo->getListTablasFunciones($IdEmpresaSesion); 			
		 			//$dato["contenedor"] = "empresa/tablasFunciones_view";		 			
					//$this->load->view("plantilla", $dato);
					}
				}
 			}		
 			$dato["contenedor"] = "empresa/tablasFunciones_view";
			$this->load->view("plantilla", $dato);			
		}else{
			redirect('inicio');
		}
	}
	public function nuevaTablaFuncion(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
			if ($tipoUsuario == "Admin") {
				$dato["titulo"] = "Nueva Tabla / Función";
				$dato["accion"] = "Nuevo";
				$dato["contenedor"] = "empresa/tablasFunciones_new_edit";
				$this->load->view('plantilla', $dato);
			}else{
				$perfilSesion = $this->session->userdata("perfilSesion");
				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "tablaFuncion", $IdEmpresaSesion);
				if (!empty($dato["permisos"])) {
					if ($dato["permisos"][0]->Agregar == 1) {
						$dato["titulo"] = "Nueva Tabla/Función";
						$dato["accion"] = "Nuevo";
						$dato["contenedor"] = "empresa/tablasFunciones_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->tablasFunciones();
					}
				}
			}
			
		}else{
			redirect('inicio');
		}
	}
	public function editarTablaFuncion($IdTablaFuncion){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
			if ($tipoUsuario == "Admin") {
				$this->load->model('TablasFunciones_Modelo');
				$dato['tablaFuncion'] = $this->TablasFunciones_Modelo->getTablaFuncion($IdTablaFuncion, $IdEmpresaSesion);    
				$dato["titulo"] = "Editar Tabla / Funcion";   
				$dato["accion"] = "Editar";	
				$dato["contenedor"] = "empresa/tablasFunciones_new_edit";
				$this->load->view('plantilla', $dato);	
			}else{
				$perfilSesion = $this->session->userdata("perfilSesion");
				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');				
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "tablaFuncion", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('TablasFunciones_Modelo');
						$dato['tablaFuncion'] = $this->TablasFunciones_Modelo->getTablaFuncion($IdTablaFuncion, $IdEmpresaSesion);    
						$dato["titulo"] = "Editar Tabla / Funcion";   
						$dato["accion"] = "Editar";	
						$dato["contenedor"] = "empresa/tablasFunciones_new_edit";
						$this->load->view('plantilla', $dato);	
					}else{
						$this->tablasFunciones();
					}
				}else{
					$this->tablasFunciones();
				}
			}
					
		}else{
			redirect('inicio');
		}
	}
	public function guardarTablaFuncion(){
		$this->form_validation->set_rules('txtTabla','Nombre de la Tabla','trim|required'); 		
		$this->form_validation->set_rules('txtObjetoControlador','Función','trim|required');	
		$this->form_validation->set_rules('txtURL','Direción','trim|required');
		$accion = $_POST['accion'];
		$id = $_POST['id'];		
		if ($this->form_validation->run() == false) {
			if ($accion == "Editar") {
				$this->editarTablaFuncion($id);
			}else{
				$this->nuevaTablaFuncion();
			}
		}else{
			$this->load->model('TablasFunciones_Modelo');
			$txtTabla = $_POST["txtTabla"];
			$txtObjetoControlador = $_POST["txtObjetoControlador"];
			$txtURL = $_POST["txtURL"];		
			$txtObservacion= $_POST["txtObservacion"];		
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($_POST["accion"] == "Editar"){
				$updateTablaFuncion = array(					
											'Nombre' => $txtTabla,
											'ObjetoControlador' => $txtObjetoControlador,
											'URL' => $txtURL,
											'Observacion' => $txtObservacion,
											'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->TablasFunciones_Modelo->updateTablasFunciones($id, $updateTablaFuncion, $IdEmpresaSesion)){
					$mensaje = "La Tabla/Función se actualizó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarTablaFuncion($id);
				}else{
					$mensaje = "La Tabla/Función no fue actualizada, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarTablaFuncion($id);
				}
			}else{
				$insertTablaFuncion = array(
											'Nombre' => $txtTabla,
											'ObjetoControlador' => $txtObjetoControlador,
											'URL' => $txtURL,
											'Observacion' => $txtObservacion,
											'IdEmpresa' => $IdEmpresaSesion
					);				
				if($this->TablasFunciones_Modelo->insertTablasFunciones($insertTablaFuncion)){
					$mensaje = "La Tabla/Función fue registrada con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevaTablaFuncion();				
				}else{
					$mensaje = "La Tabla/Función no fue registrada, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevaTablaFuncion();				
				}
			}
		}
	}
	public function eliminarTablaFuncion(){		
		$this->load->model('TablasFunciones_Modelo'); 		          	
		$TablaFuncion 		= json_decode($this->input->post('MiTablaFuncion'));
		$id  		        = base64_decode($TablaFuncion->Id);		
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->TablasFunciones_Modelo->deleteTablasFunciones($id, $IdEmpresaSesion);
	}

	
}

?>