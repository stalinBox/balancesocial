<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//Controlador 
class saludLaboralEmpleado extends CI_Controller {

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
			                     $inicioURL."saludLaboralEmpleado" => "Salud Laboral del Empleado"
			                    );
			$this->load->model('SaludLaboralEmpleado_Modelo');
			$dato['saludLaboralEmpleado'] = $this->SaludLaboralEmpleado_Modelo->getListSaludLaboralEmpleado($IdEmpresaSesion);
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "saludLaboralEmpleado/saludLaboralEmpleado_view";
			$this->load->view('plantilla', $dato);
		}else{
			redirect('inicio');
		}
	}*/
	public function saludLaboralEmpleados(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/publicoInterno" => "Público Interno",
			                     $inicioURL."saludLaboralEmpleado/saludLaboralEmpleados" => "Salud Laboral del Empleado"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('SaludLaboralEmpleado_Modelo');
				$dato['admin'] = 1;
				$dato['saludLaboralEmpleado'] = $this->SaludLaboralEmpleado_Modelo->getListSaludLaboralEmpleado($IdEmpresaSesion);
				$dato["contenedor"] = "saludLaboralEmpleado/saludLaboralEmpleado_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "saludLaboralEmpleados", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('SaludLaboralEmpleado_Modelo');
						$dato['saludLaboralEmpleado'] = $this->SaludLaboralEmpleado_Modelo->getListSaludLaboralEmpleado($IdEmpresaSesion);
						$dato["contenedor"] = "saludLaboralEmpleado/saludLaboralEmpleado_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "saludLaboralEmpleado/saludLaboralEmpleado_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "saludLaboralEmpleado/saludLaboralEmpleado_view";
					$this->load->view('plantilla', $dato);
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function nuevoSaludLaboralEmpleado(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Empleado_Modelo');
			$this->load->model('Proveedor_Modelo');			
				$dato['empleados'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion);  
				$dato['proveedores'] = $this->Proveedor_Modelo->getListProveedor($IdEmpresaSesion);  
				$dato["titulo"] = "Nuevo Programa de Salud Laboral de Empleado";
				$dato["accion"] = "Nuevo";
				$dato["contenedor"] = "saludLaboralEmpleado/saludLaboralEmpleado_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "saludLaboralEmpleados", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('Empleado_Modelo');
						$this->load->model('Proveedor_Modelo');			
						$dato['empleados'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion);  
						$dato['proveedores'] = $this->Proveedor_Modelo->getListProveedor($IdEmpresaSesion);  
						$dato["titulo"] = "Nuevo Programa de Salud Laboral de Empleado";
						$dato["accion"] = "Nuevo";
						$dato["contenedor"] = "saludLaboralEmpleado/saludLaboralEmpleado_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->saludLaboralEmpleados();
					}
				}else{
					$this->saludLaboralEmpleados();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function editarSaludLaboralEmpleado($IdSaludLaboralEmpleado){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('SaludLaboralEmpleado_Modelo');
				$this->load->model('Empleado_Modelo');
				$this->load->model('Proveedor_Modelo');		
				$dato['saludLaboralEmpleado'] = $this->SaludLaboralEmpleado_Modelo->getSaludLaboralEmpleado($IdSaludLaboralEmpleado, $IdEmpresaSesion);  
				$dato['empleados'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion);  
				$dato['proveedores'] = $this->Proveedor_Modelo->getListProveedor($IdEmpresaSesion);  
				$dato["titulo"] = "Editar Programa de Salud Laboral de Empleado";
				$dato["accion"] = "Editar";	
				$dato["contenedor"] = "saludLaboralEmpleado/saludLaboralEmpleado_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "saludLaboralEmpleados", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('SaludLaboralEmpleado_Modelo');
						$this->load->model('Empleado_Modelo');
						$this->load->model('Proveedor_Modelo');		
						$dato['saludLaboralEmpleado'] = $this->SaludLaboralEmpleado_Modelo->getSaludLaboralEmpleado($IdSaludLaboralEmpleado, $IdEmpresaSesion);  
						$dato['empleados'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion);  
						$dato['proveedores'] = $this->Proveedor_Modelo->getListProveedor($IdEmpresaSesion);  
						$dato["titulo"] = "Editar Programa de Salud Laboral de Empleado";
						$dato["accion"] = "Editar";	
						$dato["contenedor"] = "saludLaboralEmpleado/saludLaboralEmpleado_new_edit";
						$this->load->view('plantilla', $dato);	
					}else{
						$this->saludLaboralEmpleados();
					}
				}else{
					$this->saludLaboralEmpleados();
				}
 			}
		}else{
			redirect('inicio');
		}
	}
	public function guardarSaludLaboralEmpleado(){		
		$this->form_validation->set_rules('txtNombre','Nombre','trim|required'); 		
		$this->form_validation->set_rules('txtFechaPlanificacion','Fecha de Planificación','trim|required'); 		
		$this->form_validation->set_rules('txtNumHorasPlanificadas','Horas Planificadas','trim|integer|required'); 		
		$this->form_validation->set_rules('txtNumParticipantesEsperados','Participantes Esperados','trim|integer|required'); 		
		$this->form_validation->set_rules('txtCostoPlanificado','Costo Planificado','trim|required'); 
		$this->form_validation->set_rules('txtPeriodo','Periodo','trim|required|integer'); 
		$accion = $_POST['accion'];
		$id = $_POST['id'];		
		if ($this->form_validation->run() == false) {
			if ($accion == "Editar") {
				$this->editarSaludLaboralEmpleado($id);				
			}else{
				$this->nuevoSaludLaboralEmpleado();
			}
		}else{
			$this->load->model('SaludLaboralEmpleado_Modelo');
			$tiempo = time();
			$txtNombre = $_POST["txtNombre"];
			$selectTipo = $_POST["selectTipo"];			
			$txtFechaPlanificacion = $_POST["txtFechaPlanificacion"];
			$txtNumHorasPlanificadas = $_POST["txtNumHorasPlanificadas"];
			$txtNumParticipantesEsperados = $_POST["txtNumParticipantesEsperados"];	
			$txtCostoPlanificado = $_POST["txtCostoPlanificado"];	
			$selectEmpleado = $_POST["selectEmpleado"];	
			$selectProveedor = $_POST["selectProveedor"];
			$selectEstado = $_POST["selectEstado"];
			$txtCostoAportaEmpresa = $_POST["txtCostoAportaEmpresa"];	
			$txtNumParticipantes = $_POST["txtNumParticipantes"];	
			$txtNumHorasEjecutadas = $_POST["txtNumHorasEjecutadas"];
			$txtFechaInicio = $_POST["txtFechaInicio"];
			$txtFechaFin = $_POST["txtFechaFin"];
			$txtObservaciones = $_POST["txtObservaciones"];
			$txtPeriodo = $_POST["txtPeriodo"];
			$txtFechaSistema = date("Y-m-d H:i:s");
			if(!empty($_FILES['inputFoto']['tmp_name']) && file_exists($_FILES['inputFoto']['tmp_name'])) {				
				$imagen= addslashes(file_get_contents($_FILES['inputFoto']['tmp_name']));
			}else{
				$imagen = "";
			}
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($_POST["accion"] == "Editar"){
				$updateSaludLaboralEmpleado = array(					
					'NombreSaludLaboral' => $txtNombre,
					'TipoSaludLaboral' => $selectTipo,					
					'FechaPlanificacion' => $txtFechaPlanificacion,
					'HorasPlanificadas' => $txtNumHorasPlanificadas,
					'ParticipantesEsperados' => $txtNumParticipantesEsperados,
					'CostoPlanificado' => $txtCostoPlanificado,
					'CiResponsable' => $selectEmpleado,
					'IdProveedor' => $selectProveedor,
					'EstadoSaludLaboral' => $selectEstado,
					'CostoAportaOrganizacion' => $txtCostoAportaEmpresa,
					'Participantes' => $txtNumParticipantes,
					'HorasEjecutadas' => $txtNumHorasEjecutadas,
					'FechaInicioEjecucion' => $txtFechaInicio,
					'FechaFinEjecucion' => $txtFechaFin,
					'Observacion' => $txtObservaciones,
					'Imagen' => $imagen,
					'Periodo' => $txtPeriodo,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->SaludLaboralEmpleado_Modelo->updateSaludLaboralEmpleado($id, $updateSaludLaboralEmpleado, $IdEmpresaSesion)){
					$mensaje = "Programa de Salud Laboral Empleado se actualizó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarSaludLaboralEmpleado($id);				
				}else{
					$mensaje = "Programa de Salud Laboral Empleado no se ha actualizado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarSaludLaboralEmpleado($id);				
				}
			}else{
				$insertSaludLaboralEmpleado = array(
					'NombreSaludLaboral' => $txtNombre,
					'TipoSaludLaboral' => $selectTipo,					
					'FechaPlanificacion' => $txtFechaPlanificacion,
					'HorasPlanificadas' => $txtNumHorasPlanificadas,
					'ParticipantesEsperados' => $txtNumParticipantesEsperados,
					'CostoPlanificado' => $txtCostoPlanificado,
					'CiResponsable' => $selectEmpleado,
					'IdProveedor' => $selectProveedor,
					'EstadoSaludLaboral' => $selectEstado,
					'CostoAportaOrganizacion' => $txtCostoAportaEmpresa,
					'Participantes' => $txtNumParticipantes,
					'HorasEjecutadas' => $txtNumHorasEjecutadas,
					'FechaInicioEjecucion' => $txtFechaInicio,
					'FechaFinEjecucion' => $txtFechaFin,
					'Observacion' => $txtObservaciones,
					'Imagen' => $imagen,
					'Periodo' => $txtPeriodo,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->SaludLaboralEmpleado_Modelo->insertSaludLaboralEmpleado($insertSaludLaboralEmpleado)){
					$mensaje = "Programa de Salud Laboral Empleado se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoSaludLaboralEmpleado();				
				}else{
					$mensaje = "Programa de Salud Laboral Empleado no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoSaludLaboralEmpleado();				
				}
			}
		}
	}
	public function eliminarSaludLaboralEmpleado(){
		$this->load->model('SaludLaboralEmpleado_Modelo'); 		          	
		$id = $_POST["IdSaludLab"];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->SaludLaboralEmpleado_Modelo->deleteSaludLaboralEmpleado($id, $IdEmpresaSesion); 
	}
	
}

?>