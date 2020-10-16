<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//Controlador 
class practicante extends CI_Controller {

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
			                     $inicioURL."planificacionRSE/publicoInterno" => "Público Interno",
			                     $inicioURL."practicante" => "Practicante"
			                    );
			$this->load->model('Practicante_Modelo');
			$dato['practicantes'] = $this->Practicante_Modelo->getListPracticante($IdEmpresaSesion);
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "practicantes/practicantes_view";
			$this->load->view('plantilla', $dato);
		}else{
			redirect('inicio');
		}
	}
	*/
	public function practicantes(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/publicoInterno" => "Público Interno",
			                     $inicioURL."practicante/practicantes" => "Practicantes"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Practicante_Modelo');
				$dato['admin'] = 1;
				$dato['practicantes'] = $this->Practicante_Modelo->getListPracticante($IdEmpresaSesion);
				$dato["contenedor"] = "practicantes/practicantes_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "practicantes", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('Practicante_Modelo');
						$dato['practicantes'] = $this->Practicante_Modelo->getListPracticante($IdEmpresaSesion);
						$dato["contenedor"] = "practicantes/practicantes_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "practicantes/practicantes_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "practicantes/practicantes_view";
					$this->load->view('plantilla', $dato);
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function nuevoPracticante(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$dato["contenedor"] = "practicantes/practicantes_new_edit";
				$dato["titulo"] = "Nuevo Practicante";
				$dato["accion"] = "Nuevo";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "practicantes", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$dato["contenedor"] = "practicantes/practicantes_new_edit";
						$dato["titulo"] = "Nuevo Practicante";
						$dato["accion"] = "Nuevo";
						$this->load->view('plantilla', $dato);
					}else{
						$this->practicantes();
					}
				}else{
					$this->practicantes();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function editarPracticante($CIPracticante){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Practicante_Modelo');
				$dato['practicante'] = $this->Practicante_Modelo->getPracticante($CIPracticante, $IdEmpresaSesion);
				$dato["titulo"] = "Editar Practicante";   
				$dato["accion"] = "Editar";	
				$dato["contenedor"] = "practicantes/practicantes_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "practicantes", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('Practicante_Modelo');
						$dato['practicante'] = $this->Practicante_Modelo->getPracticante($CIPracticante, $IdEmpresaSesion);
						$dato["titulo"] = "Editar Practicante";   
						$dato["accion"] = "Editar";	
						$dato["contenedor"] = "practicantes/practicantes_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->practicantes();
					}
				}else{
					$this->practicantes();
				}
 			}						
		}else{
			redirect('inicio');
		}
	}
	public function guardarPracticante(){
		//Validar campos	
		$this->form_validation->set_rules('txtCedula','Cédula','trim|required'); 
		$this->form_validation->set_rules('txtNombres','Nombres','trim|required');
		$this->form_validation->set_rules('txtApellidos','Apellidos','trim|required');
		$this->form_validation->set_rules('txtInstProcedente','Institución Procedente','trim|required');
		$this->form_validation->set_rules('txtCantHorasDia','Cantidad Horas por Día','trim|integer|required');
		$this->form_validation->set_rules('txtFechaInicio','Fecha de Inicio','trim|required');
		$this->form_validation->set_rules('txtFechaFin','Fecha Fin','trim|required');
		$accion = $_POST['accion'];
		$id = $_POST['id'];	
		if($this->form_validation->run() == false){
			if ($accion == "Editar") {
				$this->editarPracticante($id);				
			}else{
				$this->nuevoPracticante();
			}
		}else{
			$this->load->model('Practicante_Modelo');						
			$txtCedula = $_POST["txtCedula"];
			$txtNombres = $_POST["txtNombres"];
			$txtApellidos = $_POST["txtApellidos"];				
			$txtInstProcedente = $_POST["txtInstProcedente"];
			$selectConvenio = $_POST["selectConvenio"];
			$txtCantHorasDia = $_POST["txtCantHorasDia"];
			$txtFechaInicio = $_POST["txtFechaInicio"];
			$txtFechaFin = $_POST["txtFechaFin"];
			$selectContratado = $_POST["selectContratado"];
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($accion == "Editar") {
				$updatePracticante = array(
					'CedulaPracticante' => $txtCedula,
					'NombresPracticante' => $txtNombres,
					'ApellidosPracticante' => $txtApellidos,
					'InstitucionProcedente' => $txtInstProcedente,
					'TipoConvenio' => $selectConvenio,
					'CantidadHorasPorDia' => $txtCantHorasDia,
					'FInicioPracticas' => $txtFechaInicio,
					'FFinPracticas' => $txtFechaFin,
					'ContratadoDespuesDePracticas' => $selectContratado,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->Practicante_Modelo->updatePracticante($id, $updatePracticante, $IdEmpresaSesion)){
					$mensaje = "Los datos han sido actualizados con éxito";
					$this->session->set_flashdata("mensaje", $mensaje);
					$this->editarPracticante($id);
				}else{
					$mensaje = "El practicante no se ha actualizado, verfique los datos ingresados";
					$this->session->set_flashdata("mensaje", $mensaje);
					$this->editarPracticante($id);
				}
			}else{
				$existeCedula = $this->Practicante_Modelo->getPracticante($txtCedula, $IdEmpresaSesion);
				if ($existeCedula == true) {
					$mensaje = "Cédula ya existe";
					$this->session->set_flashdata('mensaje',$mensaje);	
					$this->nuevoPracticante();
				}else{
					$insertPracticante = array(
						'CedulaPracticante' => $txtCedula,
						'NombresPracticante' => $txtNombres,
						'ApellidosPracticante' => $txtApellidos,
						'InstitucionProcedente' => $txtInstProcedente,
						'TipoConvenio' => $selectConvenio,
						'CantidadHorasPorDia' => $txtCantHorasDia,
						'FInicioPracticas' => $txtFechaInicio,
						'FFinPracticas' => $txtFechaFin,
						'ContratadoDespuesDePracticas' => $selectContratado,
						'IdEmpresa' => $IdEmpresaSesion
						);
					if($this->Practicante_Modelo->insertPracticante($insertPracticante)){
							//Variable temporal para mostrar al usuarios de éxito en el update
						$mensaje = "El practicante ha sido registrado con éxito";
						$this->session->set_flashdata("mensaje", $mensaje);
						$this->nuevoPracticante();
					}else{
						$mensaje = "El practicante no se ha registrado, verfique los datos ingresados";
						$this->session->set_flashdata('mensaje',$mensaje);
						$this->nuevoPracticante();	
					}					
				}
			}
		}
	}
	public function eliminarPracticante(){
		$this->load->model('Practicante_Modelo'); 		          	
		$Practicante 		= json_decode($this->input->post('MiPracticante'));
		$id = $_POST["CedulaPrac"];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->Practicante_Modelo->deletePracticante($id, $IdEmpresaSesion); 
	}

}

?>