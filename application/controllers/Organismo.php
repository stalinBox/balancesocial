<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//Controlador 
class organismo extends CI_Controller {

	function __construct()	{
		parent::__construct();				
	}
	//Función para cargar el inicio
	public function index()	{
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/gobierno" => "Gobierno",
			                     $inicioURL."organismo" => "Organo Institucional"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "organismos/modulosOrganismos";
			$this->load->view('plantilla', $dato);
		}else{
			redirect('inicio');
		}		
	}
	public function organismos()	{
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/gobierno" => "Gobierno",
			                     $inicioURL."organismo" => "Organo Institucional",
			                     $inicioURL."organismo/organismos" => "Organismos"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$this->load->model('Organismo_Modelo');
			$dato["organismos"] = $this->Organismo_Modelo->getListOrganismo();
			$dato["contenedor"] = "organismos/organismos_view";
			$this->load->view('plantilla', $dato);
		}else{
			redirect('inicio');
		}		
	}
	public function editarOrganismo($IdOrganismo){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$this->load->model('Organismo_Modelo');
			$dato["organismo"] = $this->Organismo_Modelo->getOrganismo($IdOrganismo);
			$dato["titulo"] = "Editar Organismo";
			$dato["accion"] = "Editar";
			$dato["contenedor"] = "organismos/organismos_new_edit";
			$this->load->view('plantilla', $dato);
		}else{
			redirect('inicio');
		}
	}
	public function nuevoOrganismo(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$dato["titulo"] = "Nuevo Organismo";
			$dato["accion"] = "Nuevo";
			$dato["contenedor"] = "organismos/organismos_new_edit";
			$this->load->view('plantilla', $dato);
		}else{
			redirect('inicio');
		}
	}
	public function guardarOrganismo(){
		$accion = $_POST['accion'];
		$id = $_POST['id'];
			$this->load->model('Organismo_Modelo');			
			$txtOrganismo = $_POST["txtOrganismo"];
			$txtDescripcion = $_POST["txtDescripcion"];
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($_POST["accion"] == "Editar"){
				$updateOrganismo = array(					
					'NombreOrganismo' => $txtOrganismo,
					'DescripcionOrganismo' => $txtDescripcion
					);
				if($this->Organismo_Modelo->updateOrganismo($id, $updateOrganismo, $IdEmpresaSesion)){
					$mensaje = "El Organismo se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarOrganismo($id);				
				}else{
					$mensaje = "El Organismo no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarOrganismo($id);				
				}
			}else{
				$insertOrganismo = array(
					'NombreOrganismo' => $txtOrganismo,
					'DescripcionOrganismo' => $txtDescripcion
					);
				if($this->Organismo_Modelo->insertOrganismo($insertOrganismo)){
					$mensaje = "El Organismo se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoOrganismo();				
				}else{
					$mensaje = "El Organismo no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoOrganismo();				
				}
			}
		
	}
	/**
	 * Sesión de Asamblea General
	 */
	public function sesionesAsambleaGeneral(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/gobierno" => "Gobierno",
			                     $inicioURL."organismo" => "Organo Institucional",
			                     $inicioURL."organismo/sesionesAsambleaGeneral" => "Sesiones de Asamblea General"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('SesionAsambleaGeneral_Modelo');
				$dato['admin'] = 1;
				$dato['sesionesAsambleaGeneral'] = $this->SesionAsambleaGeneral_Modelo->getListAsambleaGeneral($IdEmpresaSesion);
				$dato["contenedor"] = "sesionesAsambleaGeneral/sesionesAsambleaGeneral_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "sesionesAsambleaGeneral", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('SesionAsambleaGeneral_Modelo');
						$dato['sesionesAsambleaGeneral'] = $this->SesionAsambleaGeneral_Modelo->getListAsambleaGeneral($IdEmpresaSesion);
						$dato["contenedor"] = "sesionesAsambleaGeneral/sesionesAsambleaGeneral_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "sesionesAsambleaGeneral/sesionesAsambleaGeneral_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "sesionesAsambleaGeneral/sesionesAsambleaGeneral_view";
					$this->load->view('plantilla', $dato);
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function nuevaSesionAsambleaGeneral(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
				$dato["titulo"] = "Nueva Sesión de Asamblea General";
				$dato["accion"] = "Nuevo";
				$dato["contenedor"] = "sesionesAsambleaGeneral/sesionesAsambleaGeneral_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "sesionesAsambleaGeneral", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$dato["titulo"] = "Nueva Sesión de Asamblea General";
						$dato["accion"] = "Nuevo";
						$dato["contenedor"] = "sesionesAsambleaGeneral/sesionesAsambleaGeneral_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->sesionesAsambleaGeneral();
					}
				}else{
					$this->sesionesAsambleaGeneral();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function editarSesionAsambleaGeneral($IdSesionAsambleaGeneral){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('SesionAsambleaGeneral_Modelo');
				$dato['sesionAsambleaGeneral'] = $this->SesionAsambleaGeneral_Modelo->getAsambleaGeneral($IdSesionAsambleaGeneral, $IdEmpresaSesion);
				$dato["titulo"] = "Editar Sesión de Asamblea General";
				$dato["accion"] = "Editar";	
				$dato["contenedor"] = "sesionesAsambleaGeneral/sesionesAsambleaGeneral_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "sesionesAsambleaGeneral", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('SesionAsambleaGeneral_Modelo');
						$dato['sesionAsambleaGeneral'] = $this->SesionAsambleaGeneral_Modelo->getAsambleaGeneral($IdSesionAsambleaGeneral, $IdEmpresaSesion);	
						$dato["titulo"] = "Editar Sesión de Asamblea General";
						$dato["accion"] = "Editar";	
						$dato["contenedor"] = "sesionesAsambleaGeneral/sesionesAsambleaGeneral_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->sesionesAsambleaGeneral();
					}
				}else{
					$this->sesionesAsambleaGeneral();
				}
 			}					
		}else{
			redirect('inicio');
		}
	}
	public function guardarSesionAsambleaGeneral(){
		$this->form_validation->set_rules('txtNombreReunion','Nombre','trim|required');
		$this->form_validation->set_rules('txtFechaPlanificada','Fecha Planificada','trim|required');
		$this->form_validation->set_rules('txtReprsentantesEsperados','Representantes Esperados','trim|integer|required');
		$this->form_validation->set_rules('txtPeriodo','Periodo','trim|integer|required');
		$accion = $_POST['accion'];
		$id = $_POST['id'];		
		if ($this->form_validation->run() == false) {
			if ($accion == "Editar") {
				$this->editarSesionAsambleaGeneral($id);
			}else{
				$this->nuevaSesionAsambleaGeneral();
			}
		}else{
			$this->load->model('SesionAsambleaGeneral_Modelo');
			$tiempo = time();
			$txtNombreReunion = $_POST["txtNombreReunion"];
			$selectTipoReunion = $_POST["selectTipoReunion"];
			$txtFechaPlanificada = $_POST["txtFechaPlanificada"];
			$txtReprsentantesEsperados = $_POST["txtReprsentantesEsperados"];	
			$txtPeriodo = $_POST["txtPeriodo"];	
			$selectEstado = $_POST["selectEstado"];	
			$txtFechaRealizacion = $_POST["txtFechaRealizacion"];	
			$txtAsistentes = $_POST["txtAsistentes"];
			if(!empty($_FILES['inputImagen']['tmp_name']) && file_exists($_FILES['inputImagen']['tmp_name'])) {
				$imagen= addslashes(file_get_contents($_FILES['inputImagen']['tmp_name']));
			}else{
				$imagen = "";
			}
			$txtObservacion = $_POST["txtObservacion"];	
			$txtFechaSistema = date("Y-m-d H:i:s");
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($_POST["accion"] == "Editar"){
				$updateSesionAsamnleaGeneral = array(
					'NombreReunion' => $txtNombreReunion,
					'TipoReunion' => $selectTipoReunion,
					'FechaPlanificacion' => $txtFechaPlanificada,
					'RepresentantesPlanificados' => $txtReprsentantesEsperados,
					'EstadoReunion' => $selectEstado,
					'FechaEjecucion' => $txtFechaRealizacion,
					'RepresentantesPresentes' => $txtAsistentes,
					'Foto' => $imagen,
					'Observaciones' => $txtObservacion,
					'Periodo' => $txtPeriodo,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->SesionAsambleaGeneral_Modelo->updateAsambleaGeneral($id, $updateSesionAsamnleaGeneral, $IdEmpresaSesion)){
					$mensaje = "La Sesión de la Asamblea se actualizó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarSesionAsambleaGeneral($id);
				}else{
					$mensaje = "La Sesión de la Asamblea no se ha actualizado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarSesionAsambleaGeneral($id);
				}
			}else{
				$insertSesionAsambleaGeneral = array(
					'NombreReunion' => $txtNombreReunion,
					'TipoReunion' => $selectTipoReunion,
					'FechaPlanificacion' => $txtFechaPlanificada,
					'RepresentantesPlanificados' => $txtReprsentantesEsperados,
					'EstadoReunion' => $selectEstado,
					'FechaEjecucion' => $txtFechaRealizacion,
					'RepresentantesPresentes' => $txtAsistentes,
					'Foto' => $imagen,
					'Observaciones' => $txtObservacion,
					'Periodo' => $txtPeriodo,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->SesionAsambleaGeneral_Modelo->insertAsambleaGeneral($insertSesionAsambleaGeneral)){
					$mensaje = "La Sesión de la Asamblea se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevaSesionAsambleaGeneral();
				}else{
					$mensaje = "La Sesión de la Asamblea no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevaSesionAsambleaGeneral();
				}
			}
		}
	}
	public function eliminarAsambleaGeneral(){
		$this->load->model('SesionAsambleaGeneral_Modelo'); 		          	
		$SesionConsejo 		= json_decode($this->input->post('MiSesionAsamblea'));
		$id = $_POST["IdSA"];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->SesionAsambleaGeneral_Modelo->deleteAsambleaGeneral($id, $IdEmpresaSesion); 
	}

	
}

?>