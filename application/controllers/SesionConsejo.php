<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//Controlador 
class sesionConsejo extends CI_Controller {

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
			                     $inicioURL."sesionConsejo" => "Sesiones de Consejo"
			                    );
			$this->load->model('SesionConsejo_Modelo');
			$dato['sesionesConsejos'] = $this->SesionConsejo_Modelo->getListSesionConsejo($IdEmpresaSesion);
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "sesionesConsejos/sesionesConsejos_view";
			$this->load->view('plantilla', $dato);
		}else{
			redirect('inicio');
		}	
	}
	*/
	/**
	 * Sesión de Consejos
	 */
	public function sesionesConsejo(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/gobierno" => "Gobierno",
			                     $inicioURL."sesionConsejo/sesionesConsejo" => "Sesiones de Consejo"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('SesionConsejo_Modelo');
				$dato['admin'] = 1;
				$dato['sesionesConsejos'] = $this->SesionConsejo_Modelo->getListSesionConsejo($IdEmpresaSesion);
				$dato["contenedor"] = "sesionesConsejos/sesionesConsejos_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "sesionesConsejo", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('SesionConsejo_Modelo');
						$dato['sesionesConsejos'] = $this->SesionConsejo_Modelo->getListSesionConsejo($IdEmpresaSesion);
						$dato["contenedor"] = "sesionesConsejos/sesionesConsejos_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "sesionesConsejos/sesionesConsejos_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "sesionesConsejos/sesionesConsejos_view";
					$this->load->view('plantilla', $dato);
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function nuevoSesionConsejo(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('SesionConsejo_Modelo');
				$this->load->model('Consejo_Modelo');
				$dato['sesionesConsejos'] = $this->SesionConsejo_Modelo->getListSesionConsejo($IdEmpresaSesion);
				$dato['consejos'] = $this->Consejo_Modelo->getListConsejo($IdEmpresaSesion);
				$dato["titulo"] = "Nueva Sesión de Consejo";
				$dato["accion"] = "Nuevo";
				$dato["contenedor"] = "sesionesConsejos/sesionesConsejos_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "sesionesConsejo", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('SesionConsejo_Modelo');
						$this->load->model('Consejo_Modelo');
						$dato['sesionesConsejos'] = $this->SesionConsejo_Modelo->getListSesionConsejo($IdEmpresaSesion);
						$dato['consejos'] = $this->Consejo_Modelo->getListConsejo($IdEmpresaSesion);
						$dato["titulo"] = "Nueva Sesión de Consejo";
						$dato["accion"] = "Nuevo";
						$dato["contenedor"] = "sesionesConsejos/sesionesConsejos_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->sesionesConsejo();
					}
				}else{
					$this->sesionesConsejo();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function editarSesionConsejo($IdSesionConsejo){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('SesionConsejo_Modelo');
				$this->load->model('Consejo_Modelo');
				$dato['sesionConsejo'] = $this->SesionConsejo_Modelo->getSesionConsejos($IdSesionConsejo, $IdEmpresaSesion);
				$dato['consejos'] = $this->Consejo_Modelo->getListConsejo($IdEmpresaSesion);   
				$dato["titulo"] = "Editar Sesión de Consejo";
				$dato["accion"] = "Editar";	
				$dato["contenedor"] = "sesionesConsejos/sesionesConsejos_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "sesionesConsejo", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('SesionConsejo_Modelo');
						$this->load->model('Consejo_Modelo');
						$dato['sesionConsejo'] = $this->SesionConsejo_Modelo->getSesionConsejos($IdSesionConsejo, $IdEmpresaSesion);
						$dato['consejos'] = $this->Consejo_Modelo->getListConsejo($IdEmpresaSesion);   
						$dato["titulo"] = "Editar Sesión de Consejo";
						$dato["accion"] = "Editar";	
						$dato["contenedor"] = "sesionesConsejos/sesionesConsejos_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->sesionesConsejo();
					}
				}else{
					$this->sesionesConsejo();
				}
 			}					
		}else{
			redirect('inicio');
		}
	}
	public function guardarSesionConsejo(){
		$this->form_validation->set_rules('txtNombreReunion','Nombre','trim|required');
		$this->form_validation->set_rules('txtFechaPlanificada','Fecha Planificada','trim|required');
		$this->form_validation->set_rules('txtReprsentantesEsperados','Representantes Esperados','trim|integer|required');
		$accion = $_POST['accion'];
		$id = $_POST['id'];		
		if ($this->form_validation->run() == false) {
			if ($accion == "Editar") {
				$this->editarSesionConsejo($id);
			}else{
				$this->nuevoSesionConsejo();
			}
		}else{
			$this->load->model('SesionConsejo_Modelo');
			$tiempo = time();
			$selectConsejo = $_POST["selectConsejo"];
			$txtNombreReunion = $_POST["txtNombreReunion"];			
			$selectTipoSesion = $_POST["selectTipoSesion"];
			$txtFechaPlanificada = $_POST["txtFechaPlanificada"];
			$txtReprsentantesEsperados = $_POST["txtReprsentantesEsperados"];	
			$selectEstado = $_POST["selectEstado"];	
			$txtFechaRealizacion = $_POST["txtFechaRealizacion"];	
			$txtAsistentes = $_POST["txtAsistentes"];	
			$txtObservacion = $_POST["txtObservacion"];	
			$txtFechaSistema = date("Y-m-d H:i:s");
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($_POST["accion"] == "Editar"){
				$updateSesionConsejo = array(
					'IdConsejo' => $selectConsejo,
					'NombreReunion' => $txtNombreReunion,
					'TipoSesion' => $selectTipoSesion,
					'FechaPlanificacion' => $txtFechaPlanificada,
					'RepresentantesPlanificados' => $txtReprsentantesEsperados,
					'EstadoReunion' => $selectEstado,
					'FechaEjecucion' => $txtFechaRealizacion,
					'RepresentantesPresentes' => $txtAsistentes,
					'Observaciones' => $txtObservacion,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->SesionConsejo_Modelo->updateSesionConsejo($id, $updateSesionConsejo, $IdEmpresaSesion)){
					$mensaje = "La Sesión se actualizó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarSesionConsejo($id);
				}else{
					$mensaje = "La Sesión no se ha actualizado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarSesionConsejo($id);
				}
			}else{
				$insertSesionConsejo = array(
					'IdConsejo' => $selectConsejo,
					'NombreReunion' => $txtNombreReunion,
					'TipoSesion' => $selectTipoSesion,
					'FechaPlanificacion' => $txtFechaPlanificada,
					'RepresentantesPlanificados' => $txtReprsentantesEsperados,
					'EstadoReunion' => $selectEstado,
					'FechaEjecucion' => $txtFechaRealizacion,
					'RepresentantesPresentes' => $txtAsistentes,
					'Observaciones' => $txtObservacion,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->SesionConsejo_Modelo->insertSesionConsejo($insertSesionConsejo)){
					$mensaje = "La Sesión se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoSesionConsejo();
				}else{
					$mensaje = "La Sesión no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoSesionConsejo();
				}
			}
		}
	}
	public function eliminarSesionConsejo(){
		$this->load->model('SesionConsejo_Modelo');
		$SesionConsejo 		= json_decode($this->input->post('MiSesionConsejo'));
		$id = $_POST["IdReun"];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->SesionConsejo_Modelo->deleteSesionConsejo($id, $IdEmpresaSesion); 
	}

	
}

?>