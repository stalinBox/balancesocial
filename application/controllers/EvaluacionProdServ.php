<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//Controlador 
class evaluacionProdServ extends CI_Controller {

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
			                     $inicioURL."evaluacionProdServ" => "Evaluación de Productos y Servicios"
			                    );
			$this->load->model('EvaluacionProdServ_Modelo');			
			$dato['evaluacionProdServ'] = $this->EvaluacionProdServ_Modelo->getListEvaluacionProdServ($IdEmpresaSesion);  			
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "evaluacionProdServ/evaluacionProdServ_view";
			$this->load->view("plantilla", $dato);
		}else{
			redirect('inicio');
		}		
	}
	*/
	/**
	 * 
	 */
	public function evaluaciones(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",			                     
			                     $inicioURL."planificacionRSE/evaluaciones" => "Evaluaciones",
			                     $inicioURL."evaluacionProdServ/evaluaciones" => "Evaluación de Productos y Servicios"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('EvaluacionProdServ_Modelo');
				$dato['admin'] = 1;
				$dato['evaluacionProdServ'] = $this->EvaluacionProdServ_Modelo->getListEvaluacionProdServ($IdEmpresaSesion);
				$dato["contenedor"] = "evaluacionProdServ/evaluacionProdServ_view";
				$this->load->view("plantilla", $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "evaluaciones", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('EvaluacionProdServ_Modelo');
						$dato['evaluacionProdServ'] = $this->EvaluacionProdServ_Modelo->getListEvaluacionProdServ($IdEmpresaSesion);
						$dato["contenedor"] = "evaluacionProdServ/evaluacionProdServ_view";
						$this->load->view("plantilla", $dato);
					}else{
						$dato["contenedor"] = "evaluacionProdServ/evaluacionProdServ_view";
						$this->load->view("plantilla", $dato);
					}
				}else{
					$dato["contenedor"] = "evaluacionProdServ/evaluacionProdServ_view";
					$this->load->view("plantilla", $dato);
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function nuevaEvaluacionProdServ(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('EvaluacionProdServ_Modelo');
				$this->load->model('Empleado_Modelo');
				$dato['evaluacionProdServ'] = $this->EvaluacionProdServ_Modelo->getListEvaluacionProdServ($IdEmpresaSesion);  
				$dato['empleados'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion);  
				$dato["contenedor"] = "evaluacionProdServ/evaluacionProdServ_new_edit";
				$dato["titulo"] = "Nueva Evaluación de Productos"; 
				$dato["accion"] = "Nuevo";   
				$this->load->view("plantilla", $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "evaluaciones", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('EvaluacionProdServ_Modelo');
						$this->load->model('Empleado_Modelo');
						$dato['evaluacionProdServ'] = $this->EvaluacionProdServ_Modelo->getListEvaluacionProdServ($IdEmpresaSesion);  
						$dato['empleados'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion);  
						$dato["contenedor"] = "evaluacionProdServ/evaluacionProdServ_new_edit";
						$dato["titulo"] = "Nueva Evaluación de Productos"; 
						$dato["accion"] = "Nuevo";   
						$this->load->view("plantilla", $dato);
					}else{
						$this->evaluaciones();
					}
				}else{
					$this->evaluaciones();
				}
 			}			
		}else{
			redirect('inicio');
		}		
	}
	public function editarEvaluacionProdServ($IdEvaluacionProdServ){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('EvaluacionProdServ_Modelo');	
				$this->load->model('Empleado_Modelo');
				$dato['evaluacion'] = $this->EvaluacionProdServ_Modelo->getEvaluacionProdServ($IdEvaluacionProdServ, $IdEmpresaSesion);   
				$dato['empleados'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion);  
				$dato["titulo"] = "Editar Evaluación de Productos";
				$dato["accion"] = "Editar";	
				$dato["contenedor"] = "evaluacionProdServ/evaluacionProdServ_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "evaluaciones", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('EvaluacionProdServ_Modelo');	
						$this->load->model('Empleado_Modelo');
						$dato['evaluacion'] = $this->EvaluacionProdServ_Modelo->getEvaluacionProdServ($IdEvaluacionProdServ, $IdEmpresaSesion);   
						$dato['empleados'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion);  
						$dato["titulo"] = "Editar Evaluación de Productos";
						$dato["accion"] = "Editar";	
						$dato["contenedor"] = "evaluacionProdServ/evaluacionProdServ_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->evaluaciones();
					}
				}else{
					$this->evaluaciones();
				}
 			}					
		}else{
			redirect('inicio');
		}
	}
	public function guardarEvaluacionProdServ(){
		$this->form_validation->set_rules('txtNumEvaluacionProgramadas','Número de Evaluaciones Programadas','trim|integer|required'); 		
		$this->form_validation->set_rules('txtFrecuenciaEvaluacion','Frecuencia de Evaluación','trim|required');		
		$this->form_validation->set_rules('txtObjetivo','Objetivo','trim|required');		
		$this->form_validation->set_rules('txtNumEvaluacionEfectuadas','Número de Evaluaciones Efectuadas','trim|integer|required');		
		$this->form_validation->set_rules('txtNumDeProductos','Número de Productos','trim|integer|required');		
		$this->form_validation->set_rules('txtNumDeServicios','Número de Servicios','trim|integer|required');		
		$this->form_validation->set_rules('txtNumProdReclaAfectaSalud','Número de Productos Reclamados por Afectación de la Salud','trim|integer|required');		
		$this->form_validation->set_rules('txtNumServiciosReclamados','Número de Servicios Reclamados','trim|integer|required');		
		$this->form_validation->set_rules('txtNumProdEtiquetados','Número de Productos Etiquetados','trim|integer|required');		
		$this->form_validation->set_rules('txtNumProdRetirados','Número de Productos Retirados','trim|integer|required');		
		$this->form_validation->set_rules('txtNumProdConNormasEtiquetado','Número de Productos con Normas de Etiquetado','trim|integer|required');			
		$this->form_validation->set_rules('txtFechaMes','Fecha de Mes','trim|required');
		$accion = $_POST['accion'];
		$id = $_POST['id'];		
		if ($this->form_validation->run() == false) {
			if ($accion == "Editar") {
				$this->editarEvaluacionProdServ($id);				
			}else{
				$this->nuevaEvaluacionProdServ();
			}
		}else{
			$this->load->model('EvaluacionProdServ_Modelo');
			$tiempo = time();
			$txtNumEvaluacionProgramadas = $_POST["txtNumEvaluacionProgramadas"];	
			$txtFrecuenciaEvaluacion = $_POST["txtFrecuenciaEvaluacion"];	
			$selectEmpleado = $_POST["selectEmpleado"];
			$txtObjetivo = $_POST["txtObjetivo"];	
			$txtNumEvaluacionEfectuadas = $_POST["txtNumEvaluacionEfectuadas"];	
			$txtNumDeProductos = $_POST["txtNumDeProductos"];	
			$txtNumDeServicios = $_POST["txtNumDeServicios"];	
			$txtNumProdReclaAfectaSalud = $_POST["txtNumProdReclaAfectaSalud"];	
			$txtNumServiciosReclamados = $_POST["txtNumServiciosReclamados"];	
			$txtNumProdEtiquetados = $_POST["txtNumProdEtiquetados"];	
			$txtNumProdRetirados = $_POST["txtNumProdRetirados"];	
			$txtNumProdConNormasEtiquetado = $_POST["txtNumProdConNormasEtiquetado"];	
			$txtFechaMes = $_POST["txtFechaMes"];	
			$txtFechaSistema = date("Y-m-d H:i:s", $tiempo);	
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($accion == "Editar"){
				$updateEvaluacionProdServ = array(					
					'NumEvaProdServProgramado' => $txtNumEvaluacionProgramadas,
					'FrecuenciaEvaluacion' => $txtFrecuenciaEvaluacion,
					'CiResponsable' => $selectEmpleado,
					'Objetivo' => $txtObjetivo,
					'NumEvaProdSerEfectuados' => $txtNumEvaluacionEfectuadas,
					'NumProductos' => $txtNumDeProductos,
					'NumServicios' => $txtNumDeServicios,
					'NumProductosReclamadosAfectaSalud' => $txtNumProdReclaAfectaSalud,
					'NumServiciosReclamados' => $txtNumServiciosReclamados,
					'NumProductosEtiquetados' => $txtNumProdEtiquetados,
					'NumProductosRetirados' => $txtNumProdRetirados,
					'NumProdConNormasEtiquetado' => $txtNumProdConNormasEtiquetado,
					'FechaMes' => $txtFechaMes,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->EvaluacionProdServ_Modelo->updateEvaluacionProdServ($id, $updateEvaluacionProdServ, $IdEmpresaSesion)){
					$mensaje = "La Evaluación de Productos se actualizó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarEvaluacionProdServ($id);
				}else{
					$mensaje = "La Evaluación de Productos no se ha actualizado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarEvaluacionProdServ($id);
				}
			}else{
				$insertEvaluacionProdServ = array(
					'NumEvaProdServProgramado' => $txtNumEvaluacionProgramadas,
					'FrecuenciaEvaluacion' => $txtFrecuenciaEvaluacion,
					'CiResponsable' => $selectEmpleado,
					'Objetivo' => $txtObjetivo,
					'NumEvaProdSerEfectuados' => $txtNumEvaluacionEfectuadas,
					'NumProductos' => $txtNumDeProductos,
					'NumServicios' => $txtNumDeServicios,
					'NumProductosReclamadosAfectaSalud' => $txtNumProdReclaAfectaSalud,
					'NumServiciosReclamados' => $txtNumServiciosReclamados,
					'NumProductosEtiquetados' => $txtNumProdEtiquetados,
					'NumProductosRetirados' => $txtNumProdRetirados,
					'NumProdConNormasEtiquetado' => $txtNumProdConNormasEtiquetado,
					'FechaMes' => $txtFechaMes,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->EvaluacionProdServ_Modelo->insertEvaluacionProdServ($insertEvaluacionProdServ)){
					$mensaje = "La Evaluación de Productos se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevaEvaluacionProdServ();				
				}else{
					$mensaje = "La Evaluación de Productos no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevaEvaluacionProdServ();				
				}
			}
		}
	}
	public function eliminarEvaluacionProdServ(){
		$this->load->model('EvaluacionProdServ_Modelo'); 		          	
		$id = $_POST['IdEP'];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->EvaluacionProdServ_Modelo->deleteEvaluacionProdServ($id, $IdEmpresaSesion); 
	}

}

?>