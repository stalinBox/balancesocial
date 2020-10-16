<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//Controlador 
class comunicacion extends CI_Controller {

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
			                     $inicioURL."planificacionRSE/capacitaciones" => "Capacitaciones",
			                     $inicioURL."comunicacion" => "Comunicación"
			                    );
			$this->load->model('Comunicacion_Modelo');			
			$dato['comunicaciones'] = $this->Comunicacion_Modelo->getListComunicacion($IdEmpresaSesion);
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "comunicacion/comunicacion_view";
			$this->load->view('plantilla', $dato);
		}else{
			redirect('inicio');
		}		
	}
	*/
	/**
	 * Capacitación a Socio
	 */
	public function comunicaciones(){
			if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/capacitaciones" => "Capacitaciones",
			                     $inicioURL."comunicacion/comunicaciones" => "Comunicación"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Comunicacion_Modelo');
				$dato['admin'] = 1;
				$dato['comunicaciones'] = $this->Comunicacion_Modelo->getListComunicacion($IdEmpresaSesion);
				$dato["contenedor"] = "comunicacion/comunicacion_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "comunicaciones", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('Comunicacion_Modelo');
						$dato['comunicaciones'] = $this->Comunicacion_Modelo->getListComunicacion($IdEmpresaSesion);
						$dato["contenedor"] = "comunicacion/comunicacion_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "comunicacion/comunicacion_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "comunicacion/comunicacion_view";
					$this->load->view('plantilla', $dato);
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function nuevaComunicacion(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Comunicacion_Modelo');
				$this->load->model('Proveedor_Modelo');
				$dato['comunicaciones'] = $this->Comunicacion_Modelo->getListComunicacion($IdEmpresaSesion);  
				$dato['proveedores'] = $this->Proveedor_Modelo->getListProveedor($IdEmpresaSesion);
				$dato["titulo"] = "Nueva Comunicación";
				$dato["accion"] = "Nuevo";
				$dato["contenedor"] = "comunicacion/comunicacion_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "comunicaciones", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('Comunicacion_Modelo');
						$this->load->model('Proveedor_Modelo');
						$dato['comunicaciones'] = $this->Comunicacion_Modelo->getListComunicacion($IdEmpresaSesion);  
						$dato['proveedores'] = $this->Proveedor_Modelo->getListProveedor($IdEmpresaSesion);
						$dato["titulo"] = "Nueva Comunicación";
						$dato["accion"] = "Nuevo";
						$dato["contenedor"] = "comunicacion/comunicacion_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->comunicaciones();
					}
				}else{
					$this->comunicaciones();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function editarComunicacion($IdComunicacion){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Comunicacion_Modelo');
				$this->load->model('Proveedor_Modelo');
				$dato['comunicacion'] = $this->Comunicacion_Modelo->getCominicacion($IdComunicacion, $IdEmpresaSesion); 
				$dato['proveedores'] = $this->Proveedor_Modelo->getListProveedor($IdEmpresaSesion);   
				$dato["titulo"] = "Editar Comunicación";   
				$dato["accion"] = "Editar";	
				$dato["contenedor"] = "comunicacion/comunicacion_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "comunicaciones", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('Comunicacion_Modelo');
						$this->load->model('Proveedor_Modelo');			
						$dato['comunicacion'] = $this->Comunicacion_Modelo->getCominicacion($IdComunicacion, $IdEmpresaSesion); 
						$dato['proveedores'] = $this->Proveedor_Modelo->getListProveedor($IdEmpresaSesion);   
						$dato["titulo"] = "Editar Comunicación";   
						$dato["accion"] = "Editar";	
						$dato["contenedor"] = "comunicacion/comunicacion_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->comunicaciones();
					}
				}else{
					$this->comunicaciones();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}	
	public function guardarComunicacion(){
		$this->form_validation->set_rules('txtNombreComunicacion','Nombre de la Comunicación','trim|required'); 		
		$this->form_validation->set_rules('txtMediosInformacion','Medio de Información','trim|required');	
		$this->form_validation->set_rules('txtDescripcionMecanismos','Descripción de los Mecanismos','trim|required'); 	
		$this->form_validation->set_rules('txtPeriodo','Periodo','trim|required|integer'); 	
		$accion = $_POST['accion'];
		$id = $_POST['id'];	
		if ($this->form_validation->run() == false) {
			if ($accion == "Editar") {
				$this->editarComunicacion($id);				
			}else{
				$this->nuevaComunicacion();
			}
		}else{
			$this->load->model('Comunicacion_Modelo');
			$tiempo = time();
			$selectProveedor = $_POST["selectProveedor"];			
			$txtNombreComunicacion = $_POST["txtNombreComunicacion"];
			$txtMediosInformacion = $_POST["txtMediosInformacion"];
			$selectTipoMecanismo = $_POST["selectTipoMecanismo"];				
			$txtDescripcionMecanismos = $_POST["txtDescripcionMecanismos"];
			$selectEstado = $_POST["selectEstado"];	
			$txtCosto = $_POST["txtCosto"];	
			$txtFecha = $_POST["txtFecha"];
			$selectDirigido = $_POST["selectDirigido"];
			$selectResultadoComunicacion = $_POST["selectResultadoComunicacion"];
			$txtObservaciones = $_POST["txtObservaciones"];
			$txtPeriodo = $_POST["txtPeriodo"];
			$txtFechaSistema = date('Y-m-d H:i:s');
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($_POST["accion"] == "Editar"){
				$updateComunicacion = array(					
					'RucProveedor' => $selectProveedor,					
					'NombreComunicacion' => $txtNombreComunicacion,
					'MediosDeInformacion' => $txtMediosInformacion,
					'TipoMecanismos' => $selectTipoMecanismo,
					'DescripcionMecanismosDeComunicacion' => $txtDescripcionMecanismos,
					'EstadoComunicacion' => $selectEstado,
					'CostoComunicacion' => $txtCosto,
					'Fecha' => $txtFecha,
					'Dirigido' => $selectDirigido,
					'ResultadoDeComunicacion' => $selectResultadoComunicacion,
					'Observaciones' => $txtObservaciones,
					'Periodo' => $txtPeriodo,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->Comunicacion_Modelo->updateComunicacion($id, $updateComunicacion, $IdEmpresaSesion)){
					$mensaje = "La Comunicación se actualizó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarComunicacion($id);				
				}else{
					$mensaje = "La Comunicación no se ha actualizado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarComunicacion($id);				
				}
			}else{
				$insertComunicacion = array(
					'RucProveedor' => $selectProveedor,					
					'NombreComunicacion' => $txtNombreComunicacion,
					'MediosDeInformacion' => $txtMediosInformacion,
					'TipoMecanismos' => $selectTipoMecanismo,
					'DescripcionMecanismosDeComunicacion' => $txtDescripcionMecanismos,
					'EstadoComunicacion' => $selectEstado,
					'CostoComunicacion' => $txtCosto,
					'Fecha' => $txtFecha,
					'Dirigido' => $selectDirigido,
					'ResultadoDeComunicacion' => $selectResultadoComunicacion,
					'Observaciones' => $txtObservaciones,
					'Periodo' => $txtPeriodo,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->Comunicacion_Modelo->insertComunicacion($insertComunicacion)){
					$mensaje = "La Comunicación se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					echo base_url().'comunicacion/nuevaComunicacion';					
					$this->comunicaciones();				
				}else{
					$mensaje = "La Comunicación no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevaComunicacion();				
				}
			}
		}
	}
	public function eliminarComunicacion(){
		$this->load->model('Comunicacion_Modelo'); 		          	
		$id = $_POST['IdComunicacio'];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->Comunicacion_Modelo->deleteComunicacion($id, $IdEmpresaSesion); 
	}
	
}

?>