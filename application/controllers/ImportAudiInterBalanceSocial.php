<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//Controlador 
class importAudiInterBalanceSocial extends CI_Controller {

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
			                     $inicioURL."importAudiInterBalanceSocial" => "Importancia de la Auditoría Interna Sobre el Balance"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "importAudiInterBalanceSocial/modulosImportAudiInterBalanceSocial";
			$this->load->view("plantilla", $dato);
		}else{
			redirect('inicio');
		}		
	}	
	public function importAudiInterSobreBalanceSocial(){
		if($this->session->userdata("IdEmpresaSesion")){
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/implicacionEconomica" => "Implicación Económica",
			                     $inicioURL."importAudiInterBalanceSocial" => "Importancia de la Auditoría Interna Sobre el Balance",
			                     $inicioURL."importAudiInterBalanceSocial/importAudiInterSobreBalanceSocial" => "Importancia"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$this->load->model('ImportAudiInterBalanceSocial_Modelo');
			$dato['importAudiInterSobreBalanceSocial'] = $this->ImportAudiInterBalanceSocial_Modelo->getListIAISBS();					
			$dato["contenedor"] = "importAudiInterBalanceSocial/importAudiInterBalanceSocial_view";
			$this->load->view('plantilla', $dato);
		}else{
			redirect('inicio');
		}
	}
	public function editarIAISBS($IdIAISBS){
		if($this->session->userdata("IdEmpresaSesion")){
			$this->load->model('ImportAudiInterBalanceSocial_Modelo');
			$dato['importAudiInterSobreBalanceSocial'] = $this->ImportAudiInterBalanceSocial_Modelo->getIAISBS($IdIAISBS);    
			$dato["titulo"] = "Editar Importancia de Auditoría";
			$dato["accion"] = "Editar";	
			$dato["contenedor"] = "importAudiInterBalanceSocial/importAudiInterBalanceSocial_new_edit";
			$this->load->view('plantilla', $dato);			
		}else{
			redirect('inicio');
		}
	}
	public function guardarIAISBS(){
		$this->form_validation->set_rules('txtNombreImportancia','Importancia','trim|required');
		$accion = $_POST['accion'];
		$id = $_POST['id'];		
		if ($this->form_validation->run() == false) {
			if ($accion == "Editar") {
				$this->editarIAISBS($id);				
			}
		}else{
			$this->load->model('ImportAudiInterBalanceSocial_Modelo');
			$tiempo = time();
			$txtNombreImportancia = $_POST["txtNombreImportancia"];
			if ($_POST["accion"] == "Editar"){
				$updateIAISBS = array(					
					'NombreImportancia' => $txtNombreImportancia
					);
				if($this->ImportAudiInterBalanceSocial_Modelo->updateIAISBS($id, $updateIAISBS)){
					$mensaje = "La Importancia se actualizó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarIAISBS($id);			
				}else{
					$mensaje = "La Importancia no se ha actualizado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarIAISBS($id);			
				}
			}
		}
	}
	public function iaisbsCalif(){
		if($this->session->userdata("IdEmpresaSesion")){	
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/implicacionEconomica" => "Implicación Económica",
			                     $inicioURL."importAudiInterBalanceSocial" => "Importancia de la Auditoría Interna Sobre el Balance",
			                     $inicioURL."importAudiInterBalanceSocial/iaisbsCalif" => "Calificación"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$this->load->model('ImportAudiInterBalanceSocial_Modelo');
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$dato['iaisbsCalif'] = $this->ImportAudiInterBalanceSocial_Modelo->getListIAISBSCalif($IdEmpresaSesion);
				$dato["admin"] = 1;
				$dato["contenedor"] = "importAudiInterBalanceSocial/iaisbsCalif_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "iaisbsCalif", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$dato['iaisbsCalif'] = $this->ImportAudiInterBalanceSocial_Modelo->getListIAISBSCalif($IdEmpresaSesion);
						$dato["contenedor"] = "importAudiInterBalanceSocial/iaisbsCalif_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "importAudiInterBalanceSocial/iaisbsCalif_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "importAudiInterBalanceSocial/iaisbsCalif_view";
					$this->load->view('plantilla', $dato);
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function nuevoIAISBSCalif(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('ImportAudiInterBalanceSocial_Modelo');
				$dato['importAudiInterSobreBalanceSocial'] = $this->ImportAudiInterBalanceSocial_Modelo->getListIAISBS();	
				$dato["titulo"] = "Selección Importancia de Auditoría Interna Sobre el Balance Social";
				$dato["accion"] = "Nuevo";
				$dato["contenedor"] = "importAudiInterBalanceSocial/iaisbsCalif_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "iaisbsCalif", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('ImportAudiInterBalanceSocial_Modelo');
						$dato['importAudiInterSobreBalanceSocial'] = $this->ImportAudiInterBalanceSocial_Modelo->getListIAISBS();	
						$dato["titulo"] = "Selección Importancia de Auditoría Interna Sobre el Balance Social";
						$dato["accion"] = "Nuevo";
						$dato["contenedor"] = "importAudiInterBalanceSocial/iaisbsCalif_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->iaisbsCalif();
					}
				}else{
					$this->iaisbsCalif();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function editarIAISBSCalif($IdIAISBSCalif){
		if($this->session->userdata("IdEmpresaSesion")){	
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('ImportAudiInterBalanceSocial_Modelo');					
				$dato['iaisbsCalif'] = $this->ImportAudiInterBalanceSocial_Modelo->getIAISBSCalif($IdIAISBSCalif, $IdEmpresaSesion);
				$dato['importAudiInterSobreBalanceSocial'] = $this->ImportAudiInterBalanceSocial_Modelo->getListIAISBS();
				$dato["titulo"] = "Editar Importancia de Auditoría Interna Sobre el Balance Social";   
				$dato["accion"] = "Editar";	
				$dato["contenedor"] = "importAudiInterBalanceSocial/iaisbsCalif_new_edit";
				$this->load->view('plantilla', $dato);	
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "iaisbsCalif", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('ImportAudiInterBalanceSocial_Modelo');					
						$dato['iaisbsCalif'] = $this->ImportAudiInterBalanceSocial_Modelo->getIAISBSCalif($IdIAISBSCalif, $IdEmpresaSesion);
						$dato['importAudiInterSobreBalanceSocial'] = $this->ImportAudiInterBalanceSocial_Modelo->getListIAISBS();
						$dato["titulo"] = "Editar Importancia de Auditoría Interna Sobre el Balance Social";   
						$dato["accion"] = "Editar";	
						$dato["contenedor"] = "importAudiInterBalanceSocial/iaisbsCalif_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->iaisbsCalif();
					}
				}else{
					$this->iaisbsCalif();
				}
 			}					
		}else{
			redirect('inicio');
		}
	}
	public function guardarIAISBSCalif(){
		$this->form_validation->set_rules('txtFechaMes','Fecha','trim|required');
		$accion = $_POST['accion'];
		$id = $_POST['id'];		
		if ($this->form_validation->run() == false) {
			if ($accion == "Editar") {
				$this->editarIAISBSCalif($id);	
			}else{
				$this->nuevoIAISBSCalif();
			}
		}else{
			$this->load->model('ImportAudiInterBalanceSocial_Modelo');
			$tiempo = time();
			$selectCalificacion = $_POST["selectCalificacion"];
			$txtFechaMes = $_POST["txtFechaMes"];	
			$txtFechaSistema = date("Y-m-d H:i:s", $tiempo);		
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$textoCalificacion = $this->ImportAudiInterBalanceSocial_Modelo->getIAISBS($selectCalificacion);
			foreach ($textoCalificacion as $key) {
				$observacion = $key->NombreImportancia;
				$calificacion = $key->Valor;
			}
			if ($_POST["accion"] == "Editar"){
				$updateIAISBSCalif = array(					
					'IdImportancia' => $selectCalificacion,
					'Pregunta' => $observacion,
					'Calificacion' => $calificacion,					
					'FechaMes' => $txtFechaMes,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->ImportAudiInterBalanceSocial_Modelo->updateIAISBSCalif($id, $updateIAISBSCalif, $IdEmpresaSesion)){
					$mensaje = "La Importancia se actualizó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarIAISBSCalif($id);			
				}else{
					$mensaje = "La Importancia no se ha actualizado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarIAISBSCalif($id);			
				}
			}else{
				$insertIAISBSCalif = array(
					'IdImportancia' => $selectCalificacion,
					'Pregunta' => $observacion,
					'Calificacion' => $calificacion,					
					'FechaMes' => $txtFechaMes,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->ImportAudiInterBalanceSocial_Modelo->insertIAISBSCalif($insertIAISBSCalif)){
					$mensaje = "La Importancia se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoIAISBSCalif();				
				}else{
					$mensaje = "La Importancia no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoIAISBSCalif();				
				}
			}
		}
	}
	public function eliminarIAISBSCalif(){
		$this->load->model('ImportAudiInterBalanceSocial_Modelo'); 		          	
		$IAISBSCalif 		= json_decode($this->input->post('MiIAISBSCalif'));
		$id = $_POST['IdIAISBSCal'];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->ImportAudiInterBalanceSocial_Modelo->deleteIAISBSCalif($id, $IdEmpresaSesion); 
	}

	
}

?>