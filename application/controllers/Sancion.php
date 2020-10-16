<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//Controlador 
class sancion extends CI_Controller {

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
			                     $inicioURL."planificacionRSE/evaluaciones" => "Evaluaciones",
			                     $inicioURL."sancion" => "Sanciones"
			                    );	
			$this->load->model('Sancion_Modelo');
			$dato['sanciones'] = $this->Sancion_Modelo->getListSancion($IdEmpresaSesion);
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "sanciones/sanciones_view";
			$this->load->view('plantilla', $dato);
		}else{
			redirect('inicio');
		}		
	}
	*/
	/**
	 * Sanciones
	 */
	public function sanciones(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/evaluaciones" => "Evaluaciones",
			                     $inicioURL."sancion/sanciones" => "Sanciones"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Sancion_Modelo');
				$dato['admin'] = 1;
				$dato['sanciones'] = $this->Sancion_Modelo->getListSancion($IdEmpresaSesion);
				$dato["contenedor"] = "sanciones/sanciones_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "sanciones", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('Sancion_Modelo');
						$dato['sanciones'] = $this->Sancion_Modelo->getListSancion($IdEmpresaSesion);
						$dato["contenedor"] = "sanciones/sanciones_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "sanciones/sanciones_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "sanciones/sanciones_view";
					$this->load->view('plantilla', $dato);
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function nuevaSancion(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Sancion_Modelo');
				$dato['sanciones'] = $this->Sancion_Modelo->getListSancion($IdEmpresaSesion);  
				$dato["titulo"] = "Nueva Sanción";
				$dato["accion"] = "Nuevo";
				$dato["contenedor"] = "sanciones/sanciones_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "sanciones", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('Sancion_Modelo');
						$dato['sanciones'] = $this->Sancion_Modelo->getListSancion($IdEmpresaSesion);  
						$dato["titulo"] = "Nueva Sanción";
						$dato["accion"] = "Nuevo";
						$dato["contenedor"] = "sanciones/sanciones_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->sanciones();
					}
				}else{
					$this->sanciones();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function editarSancion($IdSancion){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Sancion_Modelo');
				$dato['sancion'] = $this->Sancion_Modelo->getSancion($IdSancion, $IdEmpresaSesion);    
				$dato["titulo"] = "Editar Sanción";   
				$dato["accion"] = "Editar";	
				$dato["contenedor"] = "sanciones/sanciones_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "sanciones", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('Sancion_Modelo');
						$dato['sancion'] = $this->Sancion_Modelo->getSancion($IdSancion, $IdEmpresaSesion);    
						$dato["titulo"] = "Editar Sanción";   
						$dato["accion"] = "Editar";	
						$dato["contenedor"] = "sanciones/sanciones_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->sanciones();
					}
				}else{
					$this->sanciones();
				}
 			}					
		}else{
			redirect('inicio');
		}
	}
	public function guardarSancion(){
		$this->form_validation->set_rules('txtCostoSancion','Costo de Sanción','trim|required'); 		
		$this->form_validation->set_rules('txtFechaMes','Fecha de Mes','trim|required');
		$accion = $_POST['accion'];
		$id = $_POST['id'];			
		if ($this->form_validation->run() == false) {
			if ($accion == "Editar") {
				$this->editarSancion($id);				
			}else{
				$this->nuevaSancion();
			}
		}else{
			$this->load->model('Sancion_Modelo');
			$tiempo = time();
			$selectTipoSancion = $_POST["selectTipoSancion"];
			$selectTipoMulta = $_POST["selectTipoMulta"];
			$selectDenunciante = $_POST["selectDenunciante"];
			$txtCostoSancion = $_POST["txtCostoSancion"];
			$txtFechaMes = $_POST["txtFechaMes"];
			$txtFechaSistema = date("Y-m-d H:i:s", $tiempo);
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($_POST["accion"] == "Editar"){
				$updateSancion = array(
					'TipoSancion' => $selectTipoSancion,
					'TipoMulta' => $selectTipoMulta,
					'ParteDenunciante' => $selectDenunciante,
					'CostoSancion' => $txtCostoSancion,
					'FechaMes' => $txtFechaMes,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->Sancion_Modelo->updateSancion($id, $updateSancion, $IdEmpresaSesion)){
					$mensaje = "La Sanción se actualizó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarSancion($id);
				}else{
					$mensaje = "La Sanción no se ha actualizado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarSancion($id);
				}
			}else{
				$insertSancion = array(
					'TipoSancion' => $selectTipoSancion,
					'TipoMulta' => $selectTipoMulta,
					'ParteDenunciante' => $selectDenunciante,
					'CostoSancion' => $txtCostoSancion,
					'FechaMes' => $txtFechaMes,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->Sancion_Modelo->insertSancion($insertSancion)){
					$mensaje = "La Sanción se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevaSancion();
				}else{
					$mensaje = "La Sanción no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevaSancion();
				}
			}
		}
	}
	public function eliminarSancion(){
		$this->load->model('Sancion_Modelo'); 		          	
		$id = $_POST['IdSancion'];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->Sancion_Modelo->deleteSancion($id, $IdEmpresaSesion); 
	}

	
}

?>