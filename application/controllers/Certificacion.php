<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//Controlador 
class certificacion extends CI_Controller {

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
			                     $inicioURL."planificacionRSE/actosContractuales" => "Actos Contractuales",
			                     $inicioURL."certificacion" => "Certificaciones"
			                    );
			$this->load->model('Certificaciones_Modelo');
			$dato['certificaciones'] = $this->Certificaciones_Modelo->getListCertificaciones($IdEmpresaSesion);	
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "certificaciones/certificaciones_view";
			$this->load->view('plantilla', $dato);
		}else{
			redirect('inicio');
		}		
	}
	*/
	/**
	 * 
	 */
	public function certificaciones(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/actosContractuales" => "Actos Contractuales",
			                     $inicioURL."certificacion/certificaciones" => "Certificaciones"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Certificaciones_Modelo');
				$dato['admin'] = 1;
				$dato['certificaciones'] = $this->Certificaciones_Modelo->getListCertificaciones($IdEmpresaSesion);	
				$dato["contenedor"] = "certificaciones/certificaciones_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "certificaciones", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('Certificaciones_Modelo');
						$dato['certificaciones'] = $this->Certificaciones_Modelo->getListCertificaciones($IdEmpresaSesion);	
						$dato["contenedor"] = "certificaciones/certificaciones_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "certificaciones/certificaciones_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "certificaciones/certificaciones_view";
					$this->load->view('plantilla', $dato);
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function nuevaCertificacion(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Certificaciones_Modelo');
				$dato['certificaciones'] = $this->Certificaciones_Modelo->getListCertificaciones($IdEmpresaSesion);
				$dato["titulo"] = "Nueva Certificación";
				$dato["accion"] = "Nuevo";
				$dato["contenedor"] = "certificaciones/certificacion_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "certificaciones", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('Certificaciones_Modelo');
						$dato['certificaciones'] = $this->Certificaciones_Modelo->getListCertificaciones($IdEmpresaSesion);
						$dato["titulo"] = "Nueva Certificación";
						$dato["accion"] = "Nuevo";
						$dato["contenedor"] = "certificaciones/certificacion_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->certificaciones();
					}
				}else{
					$this->certificaciones();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function editarCertificacion($IdCertificacion){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Certificaciones_Modelo');
				$dato['certificacion'] = $this->Certificaciones_Modelo->getCertificaciones($IdCertificacion, $IdEmpresaSesion);    
				$dato["titulo"] = "Editar Certificación";   
				$dato["accion"] = "Editar";	
				$dato["contenedor"] = "certificaciones/certificacion_new_edit";
				$this->load->view('plantilla', $dato);	
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "certificaciones", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('Certificaciones_Modelo');
						$dato['certificacion'] = $this->Certificaciones_Modelo->getCertificaciones($IdCertificacion, $IdEmpresaSesion);    
						$dato["titulo"] = "Editar Certificación";   
						$dato["accion"] = "Editar";	
						$dato["contenedor"] = "certificaciones/certificacion_new_edit";
						$this->load->view('plantilla', $dato);	
					}else{
						$this->certificaciones();
					}
				}else{
					$this->certificaciones();
				}
 			}					
		}else{
			redirect('inicio');
		}
	}
	public function guardarCertificacion(){
		$this->form_validation->set_rules('txtNombreCertificacion','Nombre de la Capacitación','trim|required'); 		
		$this->form_validation->set_rules('txtEmisorCertificado','Emisor del Certidicado','trim|required');		
		$this->form_validation->set_rules('txtFechaPlanificacion','Fecha de Planificación','trim|required');
		$this->form_validation->set_rules('txtPeriodo','Periodo','trim|required|integer');
		$accion = $_POST['accion'];
		$id = $_POST['id'];
		if ($this->form_validation->run() == false) {
			if ($accion == "Editar") {
				$this->editarCertificacion($id);				
			}else{
				$this->nuevaCertificacion();
			}
		}else{
			$this->load->model('Certificaciones_Modelo');
			$tiempo = time();
			$txtNombreCertificacion = $_POST["txtNombreCertificacion"];
			$selectTipoCertificado = $_POST["selectTipoCertificado"];
			$txtEmisorCertificado = $_POST["txtEmisorCertificado"];			
			$txtFechaPlanificacion = $_POST["txtFechaPlanificacion"];
			$selectObtenido = $_POST["selectObtenido"];
			$txtCosto = $_POST["txtCosto"];
			$txtFechaObtencion = $_POST["txtFechaObtencion"];	
			$txtObservacion = $_POST["txtObservacion"];
			$txtPeriodo = $_POST["txtPeriodo"];
			$txtFechaSistema = date('Y-m-d H:i:s');
			if(!empty($_FILES['inputFoto']['tmp_name']) && file_exists($_FILES['inputFoto']['tmp_name'])) {
				$imagen= addslashes(file_get_contents($_FILES['inputFoto']['tmp_name']));
			}else{
				$imagen = "";
			}
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($accion == "Editar"){
				$updateCertificacion = array(					
					'NombreCertificacion' => $txtNombreCertificacion,
					'TipoCertificacion' => $selectTipoCertificado,
					'EmisorCertificacion' => $txtEmisorCertificado,					
					'FechaDePlanificacion' => $txtFechaPlanificacion,
					'ObtenidoCertificacion' => $selectObtenido,
					'CostoCertificacion' => $txtCosto,
					'FechaObtencionCertificacion' => $txtFechaObtencion,
					'Imagen' => $imagen,
					'Observacion' => $txtObservacion,
					'Periodo' => $txtPeriodo,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->Certificaciones_Modelo->updateCertificaciones($id, $updateCertificacion, $IdEmpresaSesion)){
					$mensaje = "El Certificado se actualizó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarCertificacion($id);				
				}else{
					$mensaje = "El Certificado no se ha actualizado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarCertificacion($id);				
				}
			}else{
				$insertCertiicacion = array(
					'NombreCertificacion' => $txtNombreCertificacion,
					'TipoCertificacion' => $selectTipoCertificado,
					'EmisorCertificacion' => $txtEmisorCertificado,					
					'FechaDePlanificacion' => $txtFechaPlanificacion,
					'ObtenidoCertificacion' => $selectObtenido,
					'CostoCertificacion' => $txtCosto,
					'FechaObtencionCertificacion' => $txtFechaObtencion,
					'Imagen' => $imagen,
					'Observacion' => $txtObservacion,
					'Periodo' => $txtPeriodo,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->Certificaciones_Modelo->insertCertificaciones($insertCertiicacion)){
					$mensaje = "El Certificado se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->certificaciones();				
				}else{
					$mensaje = "El Certificado no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevaCertificacion();				
				}
			}
		}
	}
	public function eliminarCertificacion(){
		$this->load->model('Certificaciones_Modelo'); 		          	
		$id = $_POST['IdCertifica'];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->Certificaciones_Modelo->deleteCertificaciones($id, $IdEmpresaSesion); 
	}

	
}

?>