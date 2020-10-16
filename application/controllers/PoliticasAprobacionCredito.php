<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//Controlador 
class politicasAprobacionCredito extends CI_Controller {

	function __construct()	{
		parent::__construct();				
	}
	//Función para cargar el inicio
	public function index()	{
		if($this->session->userdata("IdEmpresaSesion")){
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/implicacionEconomica" => "Implicación Económica",
			                     $inicioURL."politicasAprobacionCredito" => "Políticas de Aprobación de Crédito"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "politicasAprobacionCredito/modulosPoliticasAprobacionCredito";
			$this->load->view("plantilla", $dato);
		}else{
			redirect('inicio');
		}
	}
	public function politicasAprobacionCreditos(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/implicacionEconomica" => "Implicación Económica",
			                     $inicioURL."politicasAprobacionCredito" => "Políticas de Aprobación de Crédito",
			                     $inicioURL."politicasAprobacionCredito/politicasAprobacionCreditos" => "Políticas"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			/*
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('PoliticasAprobacionCredito_Modelo');
				$dato['politicasAprobacionCreditos'] = $this->PoliticasAprobacionCredito_Modelo->getListPAC();
				$dato["contenedor"] = "politicasAprobacionCredito/politicasAprobacionCredito_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "politicasAprobacionCreditos", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('PoliticasAprobacionCredito_Modelo');
						$dato['politicasAprobacionCreditos'] = $this->PoliticasAprobacionCredito_Modelo->getListPAC();
						$dato["contenedor"] = "politicasAprobacionCredito/politicasAprobacionCredito_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "politicasAprobacionCredito/politicasAprobacionCredito_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "politicasAprobacionCredito/politicasAprobacionCredito_view";
					$this->load->view('plantilla', $dato);
				}
 			}*/
 			$this->load->model('PoliticasAprobacionCredito_Modelo');
			$dato['politicasAprobacionCreditos'] = $this->PoliticasAprobacionCredito_Modelo->getListPAC();
			$dato["contenedor"] = "politicasAprobacionCredito/politicasAprobacionCredito_view";
			$this->load->view('plantilla', $dato);
		}else{
			redirect('inicio');
		}
	}
	/**no implementado en PAC porque es estatico le selección y la calificación**/
	public function nuevoPAC(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$this->load->model('PoliticasAprobacionCredito_Modelo');
			$dato['politicasAprobacionCreditos'] = $this->PoliticasAprobacionCredito_Modelo->getListPAC();
			$dato["titulo"] = "Nueva Política de Aprobación de Crédito";
			$dato["accion"] = "Nuevo";
			$dato["contenedor"] = "politicasAprobacionCredito/pacCalif_new_edit";
			$this->load->view('plantilla', $dato);
		}else{
			redirect('inicio');
		}
	}
	public function editarPAC($IdPAC){
		if($this->session->userdata("IdEmpresaSesion")){							
			$this->load->model('PoliticasAprobacionCredito_Modelo');					
			$dato['politicasAprobacionCredito'] = $this->PoliticasAprobacionCredito_Modelo->getPAC($IdPAC);    
			$dato["titulo"] = "Editar Política de Aprobación de Crédito";   
			$dato["accion"] = "Editar";	
			$dato["contenedor"] = "politicasAprobacionCredito/politicasAprobacionCredito_new_edit";
			$this->load->view('plantilla', $dato);			
		}else{
			redirect('inicio');
		}
	}
	public function guardarPAC(){
		$this->form_validation->set_rules('txtNombrePolitica','Política','trim|required');
		$accion = $_POST['accion'];
		$id = $_POST['id'];		
		if ($this->form_validation->run() == false) {
			if ($accion == "Editar") {
				$this->editarPAC($id);				
			}
		}else{
			$this->load->model('PoliticasAprobacionCredito_Modelo');
			$tiempo = time();
			$txtNombrePolitica = $_POST["txtNombrePolitica"];
			if ($_POST["accion"] == "Editar"){
				$updatePAC = array(					
					'NombreAprobacionCredito' => $txtNombrePolitica
					);
				if($this->PoliticasAprobacionCredito_Modelo->updatePAC($id, $updatePAC)){
					$mensaje = "La Ṕolítica se actualizó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarPAC($id);			
				}else{
					$mensaje = "La Ṕolítica no se ha actualizado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarPAC($id);			
				}
			}
		}
	}
	/**
	Políticas de Aprobación de crédito
	**/
	public function pacCalif(){
		if($this->session->userdata("IdEmpresaSesion")){	
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/implicacionEconomica" => "Implicación Económica",
			                     $inicioURL."politicasAprobacionCredito" => "Políticas de Aprobación de Crédito",
			                     $inicioURL."politicasAprobacionCredito/pacCalif" => "Calificación Anual"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('PoliticasAprobacionCredito_Modelo');
				$dato['admin'] = 1;
				$dato['pacCalif'] = $this->PoliticasAprobacionCredito_Modelo->getListPACCalif($IdEmpresaSesion);
				$dato["contenedor"] = "politicasAprobacionCredito/pacCalif_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "pacCalif", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('PoliticasAprobacionCredito_Modelo');
						$dato['pacCalif'] = $this->PoliticasAprobacionCredito_Modelo->getListPACCalif($IdEmpresaSesion);
						$dato["contenedor"] = "politicasAprobacionCredito/pacCalif_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "politicasAprobacionCredito/pacCalif_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "politicasAprobacionCredito/pacCalif_view";
					$this->load->view('plantilla', $dato);
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function nuevoPACCalif(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('PoliticasAprobacionCredito_Modelo');
				$dato['politicasAprobacionCreditos'] = $this->PoliticasAprobacionCredito_Modelo->getListPAC();
				$dato["titulo"] = "Selección de Calificación de Política de Aprobación de Crédito";
				$dato["accion"] = "Nuevo";
				$dato["contenedor"] = "politicasAprobacionCredito/pacCalif_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "pacCalif", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('PoliticasAprobacionCredito_Modelo');
						$dato['politicasAprobacionCreditos'] = $this->PoliticasAprobacionCredito_Modelo->getListPAC();
						$dato["titulo"] = "Selección de Calificación de Política de Aprobación de Crédito";
						$dato["accion"] = "Nuevo";
						$dato["contenedor"] = "politicasAprobacionCredito/pacCalif_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->pacCalif();
					}
				}else{
					$this->pacCalif();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function editarPACCalif($IdPACCalif){
		if($this->session->userdata("IdEmpresaSesion")){	
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('PoliticasAprobacionCredito_Modelo');
				$dato['pacCalif'] = $this->PoliticasAprobacionCredito_Modelo->getPACCalif($IdPACCalif, $IdEmpresaSesion);
				$dato['politicasAprobacionCreditos'] = $this->PoliticasAprobacionCredito_Modelo->getListPAC();
				$dato["titulo"] = "Editar Calificación Política de Aprobación de Crédito";   
				$dato["accion"] = "Editar";	
				$dato["contenedor"] = "politicasAprobacionCredito/pacCalif_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "pacCalif", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('PoliticasAprobacionCredito_Modelo');
						$dato['pacCalif'] = $this->PoliticasAprobacionCredito_Modelo->getPACCalif($IdPACCalif, $IdEmpresaSesion);
						$dato['politicasAprobacionCreditos'] = $this->PoliticasAprobacionCredito_Modelo->getListPAC();
						$dato["titulo"] = "Editar Calificación Política de Aprobación de Crédito";   
						$dato["accion"] = "Editar";	
						$dato["contenedor"] = "politicasAprobacionCredito/pacCalif_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->pacCalif();
					}
				}else{
					$this->pacCalif();
				}
 			}						
		}else{
			redirect('inicio');
		}
	}
	public function guardarPACCalif(){
		$this->form_validation->set_rules('txtFechaMes','Fecha','trim|required');
		$accion = $_POST['accion'];
		$id = $_POST['id'];		
		if ($this->form_validation->run() == false) {
			if ($accion == "Editar") {
				$this->editarPACCalif($id);	
			}else{
				$this->nuevoPACCalif();
			}
		}else{
			$this->load->model('PoliticasAprobacionCredito_Modelo');
			//PENDIENTE: Recibir y obtener el IdAcuerdo para la actualización
			$tiempo = time();
			$selectCalificacion = $_POST["selectCalificacion"];
			$txtFechaMes = $_POST["txtFechaMes"];	
			$txtFechaSistema = date("Y-m-d H:i:s", $tiempo);		
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$textoCalificacion = $this->PoliticasAprobacionCredito_Modelo->getPAC($selectCalificacion);
			foreach ($textoCalificacion as $key) {
				$pregunta = $key->NombreAprobacionCredito;
				$calificacion = $key->Calificacion;
			}
			if ($_POST["accion"] == "Editar"){
				$updatePACCalif = array(					
					'IdAprobacionCredito' => $selectCalificacion,
					'Pregunta' => $pregunta,
					'Calificacion' => $calificacion,					
					'FechaMes' => $txtFechaMes,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->PoliticasAprobacionCredito_Modelo->updatePACCalif($id, $updatePACCalif, $IdEmpresaSesion)){
					$mensaje = "La Calificación se actualizó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarPACCalif($id);			
				}else{
					$mensaje = "La Calificación no se ha actualizado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarPACCalif($id);			
				}
			}else{
				$insertPACCalif = array(
					'IdAprobacionCredito' => $selectCalificacion,
					'Pregunta' => $pregunta,
					'Calificacion' => $calificacion,					
					'FechaMes' => $txtFechaMes,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->PoliticasAprobacionCredito_Modelo->insertPACCalif($insertPACCalif)){
					$mensaje = "La Calificación se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoPACCalif();				
				}else{
					$mensaje = "La Calificación no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoPACCalif();				
				}
			}
		}
	}
	public function eliminarPACCalif(){
		$this->load->model('PoliticasAprobacionCredito_Modelo'); 		          	
		$PACCalif 		= json_decode($this->input->post('MiPACCalif'));
		$id          = base64_decode($PACCalif->Id);
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->PoliticasAprobacionCredito_Modelo->deletePACCalif($id, $IdEmpresaSesion); 
	}

	
}

?>