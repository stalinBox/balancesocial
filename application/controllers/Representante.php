<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//Controlador 
class representante extends CI_Controller {

	function __construct()	{
		parent::__construct();				
	}
	//Función para cargar el inicio
	public function index()	{
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$dato["contenedor"] = "representantes/modulosRepresentanteOrganismo";
			$this->load->view('plantilla', $dato);
			
		}else{
			redirect('inicio');
		}		
	}
	/**
	 * Representantes
	 */		
	public function representantes(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/gobierno" => "Gobierno",
			                     $inicioURL."organismo" => "Organo Institucional",
			                     $inicioURL."representante/representantes" => "Representantes y Organigrama Estructural"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Representante_Modelo');
				$dato['admin'] = 1;
				$dato['representantes'] = $this->Representante_Modelo->getListRepresentante($IdEmpresaSesion);
				$dato["contenedor"] = "representantes/representantes_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "representantes", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('Representante_Modelo');
						$dato['representantes'] = $this->Representante_Modelo->getListRepresentante($IdEmpresaSesion);
						$dato["contenedor"] = "representantes/representantes_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "representantes/representantes_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "representantes/representantes_view";
					$this->load->view('plantilla', $dato);
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function nuevoRepresentante(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Organismo_Modelo');
				$dato["organismos"] = $this->Organismo_Modelo->getListOrganismo($IdEmpresaSesion);
				$dato["contenedor"] = "representantes/representantes_new_edit";
				$dato["titulo"] = "Nuevo Representante";
				$dato["accion"] = "Nuevo";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "representantes", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('Organismo_Modelo');
						$dato["organismos"] = $this->Organismo_Modelo->getListOrganismo($IdEmpresaSesion);
						$dato["contenedor"] = "representantes/representantes_new_edit";
						$dato["titulo"] = "Nuevo Representante";
						$dato["accion"] = "Nuevo";
						$this->load->view('plantilla', $dato);
					}else{
						$this->representantes();
					}
				}else{
					$this->representantes();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function editarRepresentante($IdRepresentante){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Representante_Modelo');
				$this->load->model('Organismo_Modelo');
				$dato["organismos"] = $this->Organismo_Modelo->getListOrganismo($IdEmpresaSesion);
				$dato['representante'] = $this->Representante_Modelo->getRepresentante($IdRepresentante, $IdEmpresaSesion);
				$dato["contenedor"] = "representantes/representantes_new_edit";
				$dato["titulo"] = "Editar Representante";
				$dato["accion"] = "Editar";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "representantes", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('Representante_Modelo');
						$this->load->model('Organismo_Modelo');
						$dato["organismos"] = $this->Organismo_Modelo->getListOrganismo($IdEmpresaSesion);
						$dato['representante'] = $this->Representante_Modelo->getRepresentante($IdRepresentante, $IdEmpresaSesion);
						$dato["contenedor"] = "representantes/representantes_new_edit";
						$dato["titulo"] = "Editar Representante";
						$dato["accion"] = "Editar";
						$this->load->view('plantilla', $dato);
					}else{
						$this->representantes();
					}
				}else{
					$this->representantes();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function guardarRepresentante(){
		$this->form_validation->set_rules('txtCedula','Cédula','trim|required|integer'); 
		$this->form_validation->set_rules('txtNombres','Nombres','trim|required');
		$this->form_validation->set_rules('txtApellidoPaterno','Apellido Paterno','trim|required');
		$this->form_validation->set_rules('txtApellidoMaterno','Apellido Materno','trim|required');
		$this->form_validation->set_rules('txtFechaNacimiento','Fecha de Nacimiento','trim|required');
		$this->form_validation->set_rules('txtEtnia','Etnia','trim|required');
		$this->form_validation->set_rules('txtFechaInicioPeriodo','Fecha Inicio del Periodo','trim|required');
		$this->form_validation->set_rules('txtFechaFinPeriodo','Fecha fin del Periodo','trim|required');
		$accion = $_POST['accion'];
		$id = $_POST['id'];	
		if($this->form_validation->run() == false){
			if ($accion == "Editar") {
				$this->editarRepresentante($id);				
			}else{
				$this->nuevoRepresentante();
			}
		}else{
			$this->load->model('Representante_Modelo');						
			$this->load->model('Organismo_Modelo');						
			$txtCedula = $_POST["txtCedula"];
			$txtNombres = $_POST["txtNombres"];
			$txtApellidoPaterno = $_POST["txtApellidoPaterno"];				
			$txtApellidoMaterno = $_POST["txtApellidoMaterno"];
			$txtFechaNacimiento = $_POST["txtFechaNacimiento"];
			$selectSexo = $_POST["selectSexo"];			
			$txtEtnia = $_POST["txtEtnia"];
			$selectOrganismo = $_POST["selectOrganismo"];			
			$txtFechaFinPeriodo = $_POST["txtFechaFinPeriodo"];
			$txtFechaInicioPeriodo = $_POST["txtFechaInicioPeriodo"];
			$txtCargo = $_POST["txtCargo"];
			$txtFunciones = $_POST["txtFunciones"];
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$getNameOrganismo = $this->Organismo_Modelo->getOrganismo($selectOrganismo, $IdEmpresaSesion);
			$txtOrganismo = $getNameOrganismo[0]->NombreOrganismo;			
			if ($accion == "Editar") {
				$updateRepresentante = array(
					'CedulaRepresentante' => $txtCedula,
					'NombresRepresentante' => $txtNombres,
					'ApellidoPaternoRepresentante' => $txtApellidoPaterno,
					'ApellidoMaternoRepresentante' => $txtApellidoMaterno,
					'FNacimientoRepresentante' => $txtFechaNacimiento,
					'SexoRepresentante' => $selectSexo,
					'EtniaRepresentante' => $txtEtnia,					
					'IdOrganismo' => $selectOrganismo,
					'Organismo' => $txtOrganismo,
					'FechaInicioPeriodo' => $txtFechaInicioPeriodo,
					'FechaFinPeriodo' => $txtFechaFinPeriodo,
					'Cargo' => $txtCargo,
					'Funciones' => $txtFunciones,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->Representante_Modelo->updateRepresentante($id, $updateRepresentante, $IdEmpresaSesion)){
					$mensaje = "Los datos han sido actualizados con éxito";
					$this->session->set_flashdata("mensaje", $mensaje);
					$this->editarRepresentante($id);
				}else{
					$mensaje = "El Representante no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata("mensaje", $mensaje);
					$this->editarRepresentante($id);
				}
			}else{
			/*	$existeCedula = $this->Representante_Modelo->getRepresentante($txtCedula, $IdEmpresaSesion);
				if ($existeCedula == true) {
					$mensaje = "Cédula ya existe";
					$this->session->set_flashdata('mensaje',$mensaje);	
					$this->nuevoRepresentante();
				}else{ */
					$insertRepresentante = array(
						'CedulaRepresentante' => $txtCedula,
						'NombresRepresentante' => $txtNombres,
						'ApellidoPaternoRepresentante' => $txtApellidoPaterno,
						'ApellidoMaternoRepresentante' => $txtApellidoMaterno,
						'FNacimientoRepresentante' => $txtFechaNacimiento,
						'SexoRepresentante' => $selectSexo,
						'EtniaRepresentante' => $txtEtnia,					
						'IdOrganismo' => $selectOrganismo,
						'Organismo' => $txtOrganismo,
						'FechaInicioPeriodo' => $txtFechaInicioPeriodo,
						'FechaFinPeriodo' => $txtFechaFinPeriodo,
						'Cargo' => $txtCargo,
						'Funciones' => $txtFunciones,
						'IdEmpresa' => $IdEmpresaSesion
						);
					if($this->Representante_Modelo->insertRepresentante($insertRepresentante)){
							//Variable temporal para mostrar al usuarios de éxito en el update
						$mensaje = "El Representante ha sido registrado con éxito";
						$this->session->set_flashdata("mensaje", $mensaje);
						$this->nuevoRepresentante();
					}else{
						$mensaje = "El Representante no se ha registrado, verfique los datos ingresados";
						$this->session->set_flashdata('mensaje',$mensaje);
						$this->nuevoRepresentante();	
					}

			/*	} */

			}
		}
	}
	public function eliminarRepresentante(){
		$this->load->model('Representante_Modelo'); 		          	
		$id = $_POST["IdRepresent"];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->Representante_Modelo->deleteRepresentante($id, $IdEmpresaSesion); 
	}	
	/**
	 * Reopresentante y Organismo
	 */
	public function representantesOrganismos(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/gobierno" => "Gobierno",
			                     $inicioURL."organismo" => "Organo Institucional",
			                     $inicioURL."representante/representantesOrganismos" => "Representante - Organismo"
			                    );
			$this->load->model('Organismo_Modelo');
			$this->load->model('Representante_Modelo');
			$dato["organismos"] = $this->Organismo_Modelo->getListOrganismo($IdEmpresaSesion);
			$dato["representante"] = $this->Representante_Modelo->getListRepresentante($IdEmpresaSesion);
			$dato["representanteOrganismos"] = $this->Representante_Modelo->getListRepresentanteOrganismo($IdEmpresaSesion);
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "representantes/representanteOrganismo_view";
			$this->load->view('plantilla', $dato);
		}else{
			redirect('inicio');
		}
	}
	public function nuevoRepOrganismo(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$this->load->model('Organismo_Modelo');
			$this->load->model('Representante_Modelo');
			$dato["organismos"] = $this->Organismo_Modelo->getListOrganismo($IdEmpresaSesion);
			$dato["representantes"] = $this->Representante_Modelo->getListRepresentante($IdEmpresaSesion);
			$dato["representanteOrganismos"] = $this->Representante_Modelo->getListRepresentanteOrganismo($IdEmpresaSesion);
			$dato["contenedor"] = "representantes/representanteOrganismo_new_edit";
			$dato["titulo"] = "Nuevo Representante de Organismo";
			$dato["accion"] = "Nuevo";
			$this->load->view('plantilla', $dato);
		}else{
			redirect('inicio');
		}
	}
	public function editarRepOrganismo($IdRepresOrg){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$this->load->model('Organismo_Modelo');
			$this->load->model('Representante_Modelo');
			$dato["organismos"] = $this->Organismo_Modelo->getListOrganismo($IdEmpresaSesion);
			$dato["representantes"] = $this->Representante_Modelo->getListRepresentante($IdEmpresaSesion);
			$dato['representante'] = $this->Representante_Modelo->getRepresentanteOrganismo($IdRepresOrg, $IdEmpresaSesion);
			$dato["contenedor"] =  "representantes/representanteOrganismo_new_edit";
			$dato["titulo"] = "Editar Representante";
			$dato["accion"] = "Editar";
			$this->load->view('plantilla', $dato);
		}else{
			redirect('inicio');
		}
	}
	public function guardarRepOrganismo(){
			//Validar campos	
		$this->form_validation->set_rules('txtFechaInicioPeriodo','Fecha Inicio del Período','trim|required'); 
		$this->form_validation->set_rules('txtFechaFinPeriodo','Fecha Fin del Período','trim|required');
		$accion = $_POST['accion'];
		$id = $_POST['id'];	
			if($this->form_validation->run() == false){
				if ($accion == "Editar") {
				$this->editarRepOrganismo($id);				
			}else{
				$this->nuevoRepOrganismo();
			}
			}else{
				$this->load->model('Representante_Modelo');						
				$selectRepresentante = $_POST["selectRepresentante"];
				$selectOrganismo = $_POST["selectOrganismo"];
				$txtFechaInicioPeriodo = $_POST["txtFechaInicioPeriodo"];				
				$txtFechaFinPeriodo = $_POST["txtFechaFinPeriodo"];
				$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");				
				if ($_POST["accion"] == "Editar"){
					$updateRepresentanteOrganismo = array(
						'IdRepresentante' => $selectRepresentante,
						'IdOrganismo' => $selectOrganismo,
						'FechaPeriodoInicio' => $txtFechaInicioPeriodo,
						'FechaPeriodoFinaliza' => $txtFechaFinPeriodo,
						'IdEmpresa' => $IdEmpresaSesion
						);
					if($this->Representante_Modelo->updateRepresentanteOrganismo($id, $updateRepresentanteOrganismo)){
						$mensaje = "El Representante ha sido actualizados con éxito";
						$this->session->set_flashdata("mensaje", $mensaje);
						$this->editarRepOrganismo($id);
					}else{
						$mensaje = "El Representante no se ha registrado, verfique los datos ingresados";
						$this->session->set_flashdata("mensaje", $mensaje);
						$this->editarRepOrganismo($id);
					}						
				}else{
					$insertRepresentanteOrganismo = array(
						'IdRepresentante' => $selectRepresentante,
						'IdOrganismo' => $selectOrganismo,
						'FechaPeriodoInicio' => $txtFechaInicioPeriodo,
						'FechaPeriodoFinaliza' => $txtFechaFinPeriodo,
						'IdEmpresa' => $IdEmpresaSesion
						);
					if($this->Representante_Modelo->insertRepresentanteOrganismo($insertRepresentanteOrganismo)){
								//Variable temporal para mostrar al usuarios de éxito en el update
						$mensaje = "El Representante ha sido registrado con éxito";
						$this->session->set_flashdata("mensaje", $mensaje);
						$this->nuevoRepOrganismo();
					}else{
						$mensaje = "El Representante no se ha registrado, verfique los datos ingresados";
						$this->session->set_flashdata('mensaje',$mensaje);
						$this->nuevoRepOrganismo();	
					}
				}

			}
		}

	public function eliminarRepOrganismo(){
		$this->load->model('Representante_Modelo'); 		          	
		$RepOrganismo 		= json_decode($this->input->post('MiRepOrganismo'));
		$id          = base64_decode($RepOrganismo->Id);
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->Representante_Modelo->deleteRepresentanteOrganismo($id, $IdEmpresaSesion); 
	}	
		

	}

	?>