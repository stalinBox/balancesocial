<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//Controlador 
class satisfaccionCliente extends CI_Controller {

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
			                     $inicioURL."satisfaccionCliente" => "Satisfacción"
			                    );
			$this->load->model('SatisfaccionCliente_Modelo');
			$dato['satisfaccionClientes'] = $this->SatisfaccionCliente_Modelo->getListSatisfaccionCliente($IdEmpresaSesion);
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "satisfaccionClientes/satisfaccionClientes_view";
			$this->load->view('plantilla', $dato);
		}else{
			redirect('inicio');
		}		
	}
	*/
	/**
	 * Satisfacción al Cliente
	 */
	public function satisfaccionClientes(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/evaluaciones" => "Evaluaciones",
			                     $inicioURL."satisfaccionCliente/satisfaccionClientes" => "Satisfacción"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('SatisfaccionCliente_Modelo');
				$dato['admin'] = 1;
				$dato['satisfaccionClientes'] = $this->SatisfaccionCliente_Modelo->getListSatisfaccionCliente($IdEmpresaSesion);
				$dato["contenedor"] = "satisfaccionClientes/satisfaccionClientes_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "satisfaccionClientes", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('SatisfaccionCliente_Modelo');
						$dato['satisfaccionClientes'] = $this->SatisfaccionCliente_Modelo->getListSatisfaccionCliente($IdEmpresaSesion);
						$dato["contenedor"] = "satisfaccionClientes/satisfaccionClientes_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "satisfaccionClientes/satisfaccionClientes_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "satisfaccionClientes/satisfaccionClientes_view";
					$this->load->view('plantilla', $dato);
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function nuevoSatisfaccionCliente(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('SatisfaccionCliente_Modelo');
				$dato['satisfaccionClientes'] = $this->SatisfaccionCliente_Modelo->getListSatisfaccionCliente($IdEmpresaSesion);  
				$dato["titulo"] = "Nueva Satisfacción";
				$dato["accion"] = "Nuevo";
				$dato["contenedor"] = "satisfaccionClientes/satisfaccionClientes_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "satisfaccionClientes", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('SatisfaccionCliente_Modelo');
						$dato['satisfaccionClientes'] = $this->SatisfaccionCliente_Modelo->getListSatisfaccionCliente($IdEmpresaSesion);  
						$dato["titulo"] = "Nueva Satisfacción";
						$dato["accion"] = "Nuevo";
						$dato["contenedor"] = "satisfaccionClientes/satisfaccionClientes_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->satisfaccionClientes();
					}
				}else{
					$this->satisfaccionClientes();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function editarSatisfaccionCliente($IdSatisfaccion){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('SatisfaccionCliente_Modelo');					
				$dato['satisfaccionCliente'] = $this->SatisfaccionCliente_Modelo->getSatisfaccionCliente($IdSatisfaccion, $IdEmpresaSesion);    
				$dato["titulo"] = "Editar Satisfacción";   
				$dato["accion"] = "Editar";	
				$dato["contenedor"] = "satisfaccionClientes/satisfaccionClientes_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "satisfaccionClientes", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('SatisfaccionCliente_Modelo');					
						$dato['satisfaccionCliente'] = $this->SatisfaccionCliente_Modelo->getSatisfaccionCliente($IdSatisfaccion, $IdEmpresaSesion);    
						$dato["titulo"] = "Editar Satisfacción";   
						$dato["accion"] = "Editar";	
						$dato["contenedor"] = "satisfaccionClientes/satisfaccionClientes_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->satisfaccionClientes();
					}
				}else{
					$this->satisfaccionClientes();
				}
 			}						
		}else{
			redirect('inicio');
		}
	}	
	public function guardarSatisfaccionCliente(){
		$this->form_validation->set_rules('txtMetodoUtilizado','Método Utilizado','trim|required'); 		
		$this->form_validation->set_rules('txtPorcentajeSatisfaccion','Porcentaje de Satisfacción','trim|required');	
		$this->form_validation->set_rules('txtFechaMes','Fecha del Mes','trim|required');
		$accion = $_POST['accion'];
		$id = $_POST['id'];	
		if ($this->form_validation->run() == false) {
			if ($accion == "Editar") {
				$this->editarSatisfaccionCliente($id);				
			}else{
				$this->nuevoSatisfaccionCliente();
			}
		}else{
			$this->load->model('SatisfaccionCliente_Modelo');
			$tiempo = time();
			$selectTipoSatisfaccion = $_POST["selectTipoSatisfaccion"];
			$txtMetodoUtilizado = $_POST["txtMetodoUtilizado"];
			$txtPorcentajeSatisfaccion = $_POST["txtPorcentajeSatisfaccion"];
			$txtObservaciones = $_POST["txtObservaciones"];
			$selectFrecuencia = $_POST["selectFrecuencia"];	
			$txtFechaMes = $_POST["txtFechaMes"];
			$txtFechaSistema = date("Y-m-d H:i:s");
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($_POST["accion"] == "Editar"){
				$updateSatisfaccionCliente = array(
					'TipoSatisfaccion' => $selectTipoSatisfaccion,
					'Metodo' => $txtMetodoUtilizado,
					'ResultadoSatisfaccion' => $txtPorcentajeSatisfaccion,
					'ObservacionSatisfaccion' => $txtObservaciones,
					'Frecuencia' => $selectFrecuencia,
					'FechaMes' => $txtFechaMes,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->SatisfaccionCliente_Modelo->updateSatisfaccionCliente($id, $updateSatisfaccionCliente, $IdEmpresaSesion)){
					$mensaje = "La Satisfaccion se actualizó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarSatisfaccionCliente($id);
				}else{
					$mensaje = "La Satisfaccion no se ha actualizado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarSatisfaccionCliente($id);
				}
			}else{
				$insertSatisfaccionCliente = array(
					'TipoSatisfaccion' => $selectTipoSatisfaccion,
					'Metodo' => $txtMetodoUtilizado,
					'ResultadoSatisfaccion' => $txtPorcentajeSatisfaccion,
					'ObservacionSatisfaccion' => $txtObservaciones,
					'Frecuencia' => $selectFrecuencia,
					'FechaMes' => $txtFechaMes,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->SatisfaccionCliente_Modelo->insertSatisfaccionCliente($insertSatisfaccionCliente)){
					$mensaje = "La Satisfaccion se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoSatisfaccionCliente();				
				}else{
					$mensaje = "La Satisfaccion no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoSatisfaccionCliente();				
				}
			}
		}
	}
	public function eliminarSatisfaccionCliente(){
		$this->load->model('SatisfaccionCliente_Modelo'); 		          	
		$id = $_POST['IdSatisfaccionClient'];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->SatisfaccionCliente_Modelo->deleteSatisfaccionCliente($id, $IdEmpresaSesion); 
	}
	
}

?>