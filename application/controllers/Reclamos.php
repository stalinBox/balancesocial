<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//Controlador 
class reclamos extends CI_Controller {

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
			                     $inicioURL."reclamos" => "Reclamos"
			                    );
			$this->load->model('Reclamo_Modelo');
			$dato['reclamos'] = $this->Reclamo_Modelo->getListReclamo($IdEmpresaSesion);
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "reclamos/reclamos_view";
			$this->load->view('plantilla', $dato);
		}else{
			redirect('inicio');
		}		
	}
	*/
	/**
	 * Reclamos
	 */
	public function reclamos(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",			                     
			                     $inicioURL."planificacionRSE/evaluaciones" => "Evaluaciones",
			                     $inicioURL."reclamos/reclamos" => "Reclamos"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Reclamo_Modelo');
				$dato['admin'] = 1;
				$dato['reclamos'] = $this->Reclamo_Modelo->getListReclamo($IdEmpresaSesion);
				$dato["contenedor"] = "reclamos/reclamos_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "reclamos", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('Reclamo_Modelo');
						$dato['reclamos'] = $this->Reclamo_Modelo->getListReclamo($IdEmpresaSesion);
						$dato["contenedor"] = "reclamos/reclamos_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "reclamos/reclamos_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "reclamos/reclamos_view";
					$this->load->view('plantilla', $dato);
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function nuevoReclamo(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Reclamo_Modelo');
				$this->load->model('Empleado_Modelo');
				$dato['reclamos'] = $this->Reclamo_Modelo->getListReclamo($IdEmpresaSesion);  
				$dato['empleados'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion);
				$dato["titulo"] = "Nuevo Reclamo";
				$dato["accion"] = "Nuevo";
				$dato["contenedor"] = "reclamos/reclamos_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "reclamos", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('Reclamo_Modelo');
						$this->load->model('Empleado_Modelo');
						$dato['reclamos'] = $this->Reclamo_Modelo->getListReclamo($IdEmpresaSesion);  
						$dato['empleados'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion);  
						$dato["titulo"] = "Nuevo Reclamo";
						$dato["accion"] = "Nuevo";
						$dato["contenedor"] = "reclamos/reclamos_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->reclamos();
					}
				}else{
					$this->reclamos();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function editarReclamo($IdReclamo){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Reclamo_Modelo');				
				$dato['reclamo'] = $this->Reclamo_Modelo->getReclamo($IdReclamo, $IdEmpresaSesion);
				$this->load->model('Empleado_Modelo');
				$dato['empleados'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion);    
				$dato["titulo"] = "Editar Reclamo";   
				$dato["accion"] = "Editar";	
				$dato["contenedor"] = "reclamos/reclamos_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "reclamos", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('Reclamo_Modelo');				
						$dato['reclamo'] = $this->Reclamo_Modelo->getReclamo($IdReclamo, $IdEmpresaSesion);
						$this->load->model('Empleado_Modelo');
						$dato['empleados'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion);    
						$dato["titulo"] = "Editar Reclamo";   
						$dato["accion"] = "Editar";	
						$dato["contenedor"] = "reclamos/reclamos_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->reclamos();
					}
				}else{
					$this->reclamos();
				}
 			}						
		}else{
			redirect('inicio');
		}
	}
	public function guardarReclamo(){
		$this->form_validation->set_rules('txtNumReclamoNoAtendidos','Número de Reclamos no Atendidos','trim|integer|required'); 		
		$this->form_validation->set_rules('txtNumReclamoResueltos','Número de Reclamos Resueltoss','trim|integer|required');	
		$this->form_validation->set_rules('txtCostoReclamos','Costo de los Reclamos','trim|required'); 		
		$this->form_validation->set_rules('txtFechaMes','Fecha del Mes que pertenece el registro','trim|required'); 
		$accion = $_POST['accion'];
		$id = $_POST['id'];	
		if ($this->form_validation->run() == false) {
			if ($accion == "Editar") {
				$this->editarReclamo($id);				
			}else{
				$this->nuevoReclamo();
			}
		}else{
			$this->load->model('Reclamo_Modelo');
			$tiempo = time();
			$selectEmpleado = $_POST["selectEmpleado"];
			$selectTipoReclamo = $_POST["selectTipoReclamo"];			
			$selectTipoDenunciante = $_POST["selectTipoDenunciante"];
			$txtNumReclamoNoAtendidos = $_POST["txtNumReclamoNoAtendidos"];
			$txtNumReclamoResueltos = $_POST["txtNumReclamoResueltos"];	
			$txtCostoReclamos = $_POST["txtCostoReclamos"];	
			$txtobservaciones = $_POST["txtobservaciones"];	
			$txtFechaMes = $_POST["txtFechaMes"];	
			$txtFechaSistema = date("Y-m-d H:i:s", $tiempo);		
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($_POST["accion"] == "Editar"){
				$updateReclamo = array(					
					'ResponsableDeReclamos' => $selectEmpleado,
					'TipoReclamos' => $selectTipoReclamo,					
					'DenuncianteReclamos' => $selectTipoDenunciante,
					'NoAtendidosReclamos' => $txtNumReclamoNoAtendidos,
					'ResueltosReclamos' => $txtNumReclamoResueltos,
					'CostoReclamos' => $txtCostoReclamos,
					'ObservacionReclamos' => $txtobservaciones,
					'FechaMes' => $txtFechaMes,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->Reclamo_Modelo->updateReclamo($id, $updateReclamo, $IdEmpresaSesion)){
					$mensaje = "El Reclamo se actualizó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarReclamo($id);				
				}else{
					$mensaje = "El Reclamo no se ha actualizado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarReclamo($id);				
				}
			}else{
				$insertReclamo = array(
					'ResponsableDeReclamos' => $selectEmpleado,
					'TipoReclamos' => $selectTipoReclamo,					
					'DenuncianteReclamos' => $selectTipoDenunciante,
					'NoAtendidosReclamos' => $txtNumReclamoNoAtendidos,
					'ResueltosReclamos' => $txtNumReclamoResueltos,
					'CostoReclamos' => $txtCostoReclamos,
					'ObservacionReclamos' => $txtobservaciones,
					'FechaMes' => $txtFechaMes,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->Reclamo_Modelo->insertReclamo($insertReclamo)){
					$mensaje = "El Reclamo se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoReclamo();				
				}else{
					$mensaje = "El Reclamo no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoReclamo();				
				}
			}
		}
	}
	public function eliminarReclamo(){
		$this->load->model('Reclamo_Modelo'); 		          	
		$id = $_POST['IdRecl'];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->Reclamo_Modelo->deleteReclamo($id, $IdEmpresaSesion); 
	}
	
}

?>