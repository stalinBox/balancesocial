<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//Controlador 
class sindicato extends CI_Controller {

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
			                     $inicioURL."planificacionRSE/gobierno" => "Gobierno",			                     
			                     $inicioURL."sindicato" => "Sindicatos"
			                    );
			$this->load->model('Sindicato_Modelo');
			$dato['sindicatos'] = $this->Sindicato_Modelo->getListSindicato($IdEmpresaSesion);
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "sindicatos/sindicatos_view";
			$this->load->view('plantilla', $dato);
		}else{
			redirect('inicio');
		}		
	}
	*/
	/**
	 * Sindicatos de la Empresa
	 */
	public function sindicatos(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/gobierno" => "Gobierno",			                     
			                     $inicioURL."sindicato/sindicatos" => "Sindicatos"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Sindicato_Modelo');
				$dato['admin'] = 1;
				$dato['sindicatos'] = $this->Sindicato_Modelo->getListSindicato($IdEmpresaSesion);
				$dato["contenedor"] = "sindicatos/sindicatos_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "sindicatos", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('Sindicato_Modelo');
						$dato['sindicatos'] = $this->Sindicato_Modelo->getListSindicato($IdEmpresaSesion);
						$dato["contenedor"] = "sindicatos/sindicatos_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "sindicatos/sindicatos_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "sindicatos/sindicatos_view";
					$this->load->view('plantilla', $dato);
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function nuevoSindicato(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Sindicato_Modelo');
				$this->load->model('Consejo_Modelo');
				$dato['sindicatos'] = $this->Sindicato_Modelo->getListSindicato($IdEmpresaSesion);
				$dato['consejos'] = $this->Consejo_Modelo->getListConsejo($IdEmpresaSesion);
				$dato["titulo"] = "Nuevo Sindicato";
				$dato["accion"] = "Nuevo";
				$dato["contenedor"] = "sindicatos/sindicatos_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "sindicatos", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('Sindicato_Modelo');
						$this->load->model('Consejo_Modelo');
						$dato['sindicatos'] = $this->Sindicato_Modelo->getListSindicato($IdEmpresaSesion);
						$dato['consejos'] = $this->Consejo_Modelo->getListConsejo($IdEmpresaSesion);
						$dato["titulo"] = "Nuevo Sindicato";
						$dato["accion"] = "Nuevo";
						$dato["contenedor"] = "sindicatos/sindicatos_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->sindicatos();
					}
				}else{
					$this->sindicatos();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function editarSindicato($IdSindicato){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Sindicato_Modelo');
				$this->load->model('Consejo_Modelo');
				$dato['sindicato'] = $this->Sindicato_Modelo->getSindicato($IdSindicato, $IdEmpresaSesion);
				$dato['consejos'] = $this->Consejo_Modelo->getListConsejo($IdEmpresaSesion);   
				$dato["titulo"] = "Editar Sindicato";
				$dato["accion"] = "Editar";	
				$dato["contenedor"] = "sindicatos/sindicatos_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "sindicatos", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('Sindicato_Modelo');
						$this->load->model('Consejo_Modelo');
						$dato['sindicato'] = $this->Sindicato_Modelo->getSindicato($IdSindicato, $IdEmpresaSesion);
						$dato['consejos'] = $this->Consejo_Modelo->getListConsejo($IdEmpresaSesion);   
						$dato["titulo"] = "Editar Sindicato";
						$dato["accion"] = "Editar";	
						$dato["contenedor"] = "sindicatos/sindicatos_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->sindicatos();
					}
				}else{
					$this->sindicatos();
				}
 			}						
		}else{
			redirect('inicio');
		}
	}
	public function guardarSindicato(){
		$this->form_validation->set_rules('txtNombre','Nombre','trim|required');
		$accion = $_POST['accion'];
		$id = $_POST['id'];	
		if ($this->form_validation->run() == false) {
			if ($accion == "Editar") {
				$this->editarSindicato($id);				
			}else{
				$this->nuevoSindicato();
			}
		}else{
			$this->load->model('Sindicato_Modelo');
			//PENDIENTE: Recibir y obtener el IdAcuerdo para la actualización
			$tiempo = time();
			$txtNombre = $_POST["txtNombre"];
			$txtDescripcion = $_POST["txtDescripcion"];
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($_POST["accion"] == "Editar"){
				$updateSindicato = array(					
					'NombreSindicato' => $txtNombre,
					'DescripcionSindicato' => $txtDescripcion,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->Sindicato_Modelo->updateSindicato($id, $updateSindicato, $IdEmpresaSesion)){
					$mensaje = "El Sindicato se Actualizó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarSindicato($id);				
				}else{
					$mensaje = "El Sindicato no se ha actualizado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarSindicato($id);				
				}
			}else{
				$insertSindicato = array(
					'NombreSindicato' => $txtNombre,
					'DescripcionSindicato' => $txtDescripcion,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->Sindicato_Modelo->insertSindicato($insertSindicato)){
					$mensaje = "El Sindicato se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoSindicato();				
				}else{
					$mensaje = "El Sindicato no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoSindicato();				
				}
			}
		}
	}
	public function eliminarSindicato(){
		$this->load->model('Sindicato_Modelo'); 		          	
		$id = $_POST["IdSind"];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->Sindicato_Modelo->deleteSindicato($id, $IdEmpresaSesion); 
	}

	
}

?>