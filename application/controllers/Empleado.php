<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class empleado extends CI_Controller{
	
	function __construct(){
		parent::__construct();			
	}

	public function index(){
		if($this->session->userdata("IdEmpresaSesion")){
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa" => "Empresa",
			                     $inicioURL."empleado" => "Empleados"
			                    );
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$this->load->model('Empleado_Modelo');
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "empleados/modulosEmpleados";
			$this->load->view("plantilla", $dato);
		}else{
			redirect('inicio');
		}	
	}	

	public function empleados(){			
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa" => "Empresa",
			                     $inicioURL."empleado" => "Empleados",
			                     $inicioURL."empleado/empleados" => "Información de Empleados"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Empleado_Modelo');
				$dato['admin'] = 1;
				$dato['empleados'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion);
				$dato["contenedor"] = "empleados/empleados_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "empleados", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('Empleado_Modelo');
						$dato['empleados'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion);
						$dato["contenedor"] = "empleados/empleados_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "empleados/empleados_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "empleados/empleados_view";
					$this->load->view('plantilla', $dato);
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function nuevoEmpleado(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Empleado_Modelo');
				$this->load->model('Sindicato_Modelo');								
				$dato['empleados'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion);
				$dato['sindicatos'] = $this->Sindicato_Modelo->getListSindicato($IdEmpresaSesion);
				$dato["contenedor"] = "empleados/empleado_new_edit";			
				$dato["titulo"] = "Nuevo Empleado"; 
				$dato["accion"] = "Nuevo";   
				$this->load->view("plantilla", $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "empleados", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('Empleado_Modelo');
						$this->load->model('Sindicato_Modelo');								
						$dato['empleados'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion);
						$dato['sindicatos'] = $this->Sindicato_Modelo->getListSindicato($IdEmpresaSesion);
						$dato["contenedor"] = "empleados/empleado_new_edit";			
						$dato["titulo"] = "Nuevo Empleado"; 
						$dato["accion"] = "Nuevo";   
						$this->load->view("plantilla", $dato);
					}else{
						$this->empleados();
					}
				}else{
					$this->empleados();
				}
 			}
			
		}else{
			redirect('inicio');
		}	
	}
	public function editarEmpleado($CIEmpleado){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Empleado_Modelo');
				$this->load->model('Sindicato_Modelo');					
				$dato['empleado'] = $this->Empleado_Modelo->getEmpleado($CIEmpleado, $IdEmpresaSesion);    
				$dato['empleados'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion);
				$dato['sindicatos'] = $this->Sindicato_Modelo->getListSindicato($IdEmpresaSesion);
				$dato["titulo"] = "Editar Empleado";   
				$dato["accion"] = "Editar";	
				$dato["contenedor"] = "empleados/empleado_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "empleados", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('Empleado_Modelo');
						$this->load->model('Sindicato_Modelo');					
						$dato['empleado'] = $this->Empleado_Modelo->getEmpleado($CIEmpleado, $IdEmpresaSesion);    
						$dato['empleados'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion);
						$dato['sindicatos'] = $this->Sindicato_Modelo->getListSindicato($IdEmpresaSesion);
						$dato["titulo"] = "Editar Empleado";   
						$dato["accion"] = "Editar";	
						$dato["contenedor"] = "empleados/empleado_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->empleados();
					}
				}else{
					$this->empleados();
				}
 			}

					
		}else{
			redirect('inicio');
		}
	}
	public function guardarEmpleado(){
		//Validar campos	
		$this->form_validation->set_rules('txtCedula','Cédula','trim|required'); 
		$this->form_validation->set_rules('txtNombres','Nombres','trim|required');
		$this->form_validation->set_rules('txtApellidoPaterno','Apellido Paterno','trim|required');
		//$this->form_validation->set_rules('txtApellidoMaterno','Apellido Materno','trim|required');
		$this->form_validation->set_rules('txtFechaNacimiento','Fecha de Nacimiento','trim|required');
		//$this->form_validation->set_rules('txtEtnia','Etnia','trim|required');
		$this->form_validation->set_rules('txtFechaIngreso','Fecha e Ingreso','trim|required');
		//$this->form_validation->set_rules('txtFechaSalida','Fecha de Salida','trim|integer|required');
		//$this->form_validation->set_rules('txtFechaReincorporacion','Fecha de Reincorporacion','trim|required');
		//$this->form_validation->set_rules('txtFechaSalidaReincorporacion','Misión','trim|required');
		$this->form_validation->set_rules('txtSalario','Salario','trim|required');
		//$this->form_validation->set_rules('txtTipoContrato','Tipo de Contrato','trim|required');
		//$this->form_validation->set_rules('txtTipoDiscapacidad','Tipo de Discapacidad','trim|required');
		//$this->form_validation->set_rules('txtPorentajeDiscapacidad','Porcentaje de Discapacidad','trim|required');
		//$this->form_validation->set_rules('txtCondicionDIscapacidad','Condición de Discapacidad','trim|required');	
		$accion = $_POST['accion'];
		$id = $_POST['id'];
		if($this->form_validation->run() == false){	//Volver a index de login
			if ($_POST["accion"] == "Editar") {
				$this->editarEmpleado($id);				
			}else{
				$this->nuevoEmpleado();
			}
		}else{
				$this->load->model('Empleado_Modelo');						
				$txtCedula = $_POST["txtCedula"];
				$txtNombres = $_POST["txtNombres"];
				$txtApellidoPaterno = $_POST["txtApellidoPaterno"];				
				$txtApellidoMaterno = $_POST["txtApellidoMaterno"];
				$txtFechaNacimiento = $_POST["txtFechaNacimiento"];
				$selectSexo = $_POST["selectSexo"];
				//$txtEtnia = $_POST["txtEtnia"];
				$selectEtnia = $_POST["selectEtnia"];
				$selectNacionalidad = $_POST["selectNacionalidad"];
				$selectRegion = $_POST["selectRegion"];
				$txtFechaIngreso = $_POST["txtFechaIngreso"];
				$txtFechaSalida = $_POST["txtFechaSalida"];
				$txtFechaInicioReincorporacion = $_POST["txtFechaReincorporacion"];
				$txtFechaSalidaReincorporacion = $_POST["txtFechaSalidaReincorporacion"];
				$txtSalario = $_POST["txtSalario"];
				$selectTipoContrato = $_POST["selectTipoContrato"];
				$selectCargoEstructural = $_POST["selectCargoEstructural"];
				$txtNumClausulasContrato = $_POST["txtNumClausulasContrato"];
				$selectAfiliadoIESS = $_POST["selectAfiliadoIESS"];
				$selectDiscapacidad = $_POST["selectDiscapacidad"];
				$selectTipoDiscapacidad = $_POST["selectTipoDiscapacidad"];
				$txtPorentajeDiscapacidad = $_POST["txtPorentajeDiscapacidad"];
				$selectCondicionDiscapacidad = $_POST["selectCondicionDiscapacidad"];
				$selectIntruccion = $_POST["selectIntruccion"];
				$selectEstadoLaboral = $_POST["selectEstadoLaboral"];
				//$selectRevisorCurriculum = $_POST["selectRevisorCurriculum"];
				$txtRevisorCVEmpleado = $_POST["txtRevisorCVEmpleado"];
				$selectPerteneceSindicato = $_POST["selectPerteneceSindicato"];		
				$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
				if ($accion == "Nuevo") {
					$existeCedula = $this->Empleado_Modelo->getEmpleado($txtCedula, $IdEmpresaSesion);
					if ($existeCedula) {
						$mensaje = "Cédula ya existe";
						$this->session->set_flashdata('mensaje',$mensaje);	
						$this->nuevoEmpleado();
					}else{
						$registroEmpleado = array(
						'CedulaEmpleado' => $txtCedula,
						'NombresEmpleado' => $txtNombres,
						'ApellidoPaternoEmpleado' => $txtApellidoPaterno,
						'ApellidoMaternoEmpleado' => $txtApellidoMaterno,
						'FNacimientoEmpleado' => $txtFechaNacimiento,
						'SexoEmpleado' => $selectSexo,
						'EtniaEmpleado' => $selectEtnia,
						'Nacionalidad' => $selectNacionalidad,
						'RegionEmpleado' => $selectRegion,
						'FIngresoContratoEmpleado' => $txtFechaIngreso,
						'FSalidaEmpleado' => $txtFechaSalida,
						'FReincorporacion' => $txtFechaInicioReincorporacion,
						'FFinReincorporacion' => $txtFechaSalidaReincorporacion,
						'SalarioEmpleado' => $txtSalario,
						'TipoContrato' => $selectTipoContrato,
						'CargoEstructural' => $selectCargoEstructural,
						'NumClausulasContrato' => $txtNumClausulasContrato,
						'AfiliadoIESSEmpleado' => $selectAfiliadoIESS,
						'DiscapacidadEmpleado' => $selectDiscapacidad,
						'TipoDiscapacidadEmpleado' => $selectTipoDiscapacidad,
						'PorcentajeDiscapacidadEmpleado' => $txtPorentajeDiscapacidad,
						'CondicionDiscapacidadEmpleado' => $selectCondicionDiscapacidad,
						'InstruccionEmpleado' => $selectIntruccion,
						'EstadoLaboralEmpleado' => $selectEstadoLaboral,
						'RevisorCVEmpleado' => $txtRevisorCVEmpleado,
						'PerteneceSindicato' => $selectPerteneceSindicato,
						'IdEmpresa' => $IdEmpresaSesion
						);
						if($this->Empleado_Modelo->insertEmpleado($registroEmpleado)){
						//Variable temporal para mostrar al usuarios de éxito en el update
							$mensaje = "El Empleado ha sido registrado con éxito";
							$this->session->set_flashdata("mensaje", $mensaje);
							$this->empleados();
						}else{
							$mensaje = "El Empleado no se ha registrado, verfique los datos ingresados";
							$this->session->set_flashdata('mensaje',$mensaje);
							$this->nuevoEmpleado();	
						}

					}
				}else{
						$updateEmpleado = array(
						'CedulaEmpleado' => $txtCedula,
						'NombresEmpleado' => $txtNombres,
						'ApellidoPaternoEmpleado' => $txtApellidoPaterno,
						'ApellidoMaternoEmpleado' => $txtApellidoMaterno,
						'FNacimientoEmpleado' => $txtFechaNacimiento,
						'SexoEmpleado' => $selectSexo,
						'EtniaEmpleado' => $selectEtnia,
						'Nacionalidad' => $selectNacionalidad,
						'RegionEmpleado' => $selectRegion,
						'FIngresoContratoEmpleado' => $txtFechaIngreso,
						'FSalidaEmpleado' => $txtFechaSalida,
						'FReincorporacion' => $txtFechaInicioReincorporacion,
						'FFinReincorporacion' => $txtFechaSalidaReincorporacion,
						'SalarioEmpleado' => $txtSalario,
						'TipoContrato' => $selectTipoContrato,
						'CargoEstructural' => $selectCargoEstructural,
						'NumClausulasContrato' => $txtNumClausulasContrato,
						'AfiliadoIESSEmpleado' => $selectAfiliadoIESS,
						'DiscapacidadEmpleado' => $selectDiscapacidad,
						'TipoDiscapacidadEmpleado' => $selectTipoDiscapacidad,
						'PorcentajeDiscapacidadEmpleado' => $txtPorentajeDiscapacidad,
						'CondicionDiscapacidadEmpleado' => $selectCondicionDiscapacidad,
						'InstruccionEmpleado' => $selectIntruccion,
						'EstadoLaboralEmpleado' => $selectEstadoLaboral,
						'RevisorCVEmpleado' => $txtRevisorCVEmpleado,
						'PerteneceSindicato' => $selectPerteneceSindicato,
						'IdEmpresa' => $IdEmpresaSesion
						);
					$this->Empleado_Modelo->updateEmpleado($id, $updateEmpleado, $IdEmpresaSesion);
					//Variable temporal para mostrar al usuarios de éxito en el update
					$mensaje = "Los datos han sido actualizados con éxito";
					$this->session->set_flashdata("mensaje", $mensaje);
					$this->editarEmpleado($id);
				}
			}

		}
	public function eliminarEmpleado(){
		$this->load->model('Empleado_Modelo'); 		          	
		$idEmple = $_POST["idEmpleado"];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->Empleado_Modelo->deleteEmpleado($idEmple, $IdEmpresaSesion); 
	}
	
	/**
	 * Accidentes de los Empleados
	 */
	public function accidentes(){			
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/evaluaciones" => "Evaluaciones",
			                     $inicioURL."empleado/accidentes" => "Accidentes"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('AccidenteEmpleado_Modelo');
				$dato['admin'] = 1;
				$dato['accidentes'] = $this->AccidenteEmpleado_Modelo->getListAccidenteEmpleado($IdEmpresaSesion);
				$dato["contenedor"] = "empleados/accidentesEmpleados_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "accidentes", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('AccidenteEmpleado_Modelo');
						$dato['accidentes'] = $this->AccidenteEmpleado_Modelo->getListAccidenteEmpleado($IdEmpresaSesion);
						$dato["contenedor"] = "empleados/accidentesEmpleados_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "empleados/accidentesEmpleados_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "empleados/accidentesEmpleados_view";
					$this->load->view('plantilla', $dato);
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function nuevoAccidente(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Empleado_Modelo');		
				$dato["contenedor"] = "empleados/accidenteEmpleado_new_edit";
				$dato['empleados'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion);  
				$dato["titulo"] = "Nuevo Accidente de Empleado"; 
				$dato["accion"] = "Nuevo";   
				$this->load->view("plantilla", $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "accidentes", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('Empleado_Modelo');		
						$dato["contenedor"] = "empleados/accidenteEmpleado_new_edit";
						$dato['empleados'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion);  
						$dato["titulo"] = "Nuevo Accidente de Empleado"; 
						$dato["accion"] = "Nuevo";   
						$this->load->view("plantilla", $dato);
					}else{
						$this->accidentes();
					}
				}else{
					$this->accidentes();
				}
 			}			
		}else{
			redirect('inicio');
		}	
	}
	public function editarAccidente($CIEmpleado){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('AccidenteEmpleado_Modelo');
				$this->load->model('Empleado_Modelo');
				$dato['accidente'] = $this->AccidenteEmpleado_Modelo->getAccidenteEmpleado($CIEmpleado, $IdEmpresaSesion);   
				$dato['empleados'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion);  
				$dato["titulo"] = "Editar Accidente";   
				$dato["accion"] = "Editar";	
				$dato["contenedor"] = "empleados/accidenteEmpleado_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "accidentes", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('AccidenteEmpleado_Modelo');
						$this->load->model('Empleado_Modelo');
						$dato['accidente'] = $this->AccidenteEmpleado_Modelo->getAccidenteEmpleado($CIEmpleado, $IdEmpresaSesion);   
						$dato['empleados'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion);  
						$dato["titulo"] = "Editar Accidente";   
						$dato["accion"] = "Editar";	
						$dato["contenedor"] = "empleados/accidenteEmpleado_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->accidentes();
					}
				}else{
					$this->accidentes();
				}
 			}					
		}else{
			redirect('inicio');
		}
	}
	public function guardarAccidente(){	
	$this->form_validation->set_rules('txtFechaAccidente','Fecha de Accidente','trim|required');
	$this->form_validation->set_rules('txtNumDiasPerdidos','Número de Días ','trim|integer|required');	
	$this->form_validation->set_rules('txtPeriodo','Periodo','trim|integer|required');	
	$accion = $_POST['accion'];
	$id = $_POST['id'];
	if($this->form_validation->run() == false){	//Volver a index de login
		if ($accion == "Nuevo") {
				$this->nuevoAccidente();		
			}else{
				$this->editarAccidente($id);					
			}
	}else{		
			$this->load->model('AccidenteEmpleado_Modelo');
			$tiempo = time();
			$selectEmpleado = $_POST["selectEmpleado"];
			$selectTipoIncapacidad = $_POST["selectTipoIncapacidad"];
			$txtFechaAccidente = $_POST["txtFechaAccidente"];
			$txtNumDiasPerdidos = $_POST["txtNumDiasPerdidos"];
			$selectIndemizado = $_POST["selectIndemizado"];				
			$selectFallecimiento = $_POST["selectFallecimiento"];
			$txtPeriodo = $_POST["txtPeriodo"];
			$txtFechaSistema = date('Y-m-d H:i:s', $tiempo);
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
				if ($_POST["accion"] == "Editar"){
					$updateEmpleado = array(
					'CIEmpleadoAccidente' => $selectEmpleado,
					'TipoIncapacidadAccidente' => $selectTipoIncapacidad,
					'FechaAccidente' => $txtFechaAccidente,
					'NumDiasPerdidos' => $txtNumDiasPerdidos,
					'Indemnizado' => $selectIndemizado,
					'Fallecimiento' => $selectFallecimiento,
					'Periodo' => $txtPeriodo,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				$this->AccidenteEmpleado_Modelo->updateAccidenteEmpleado($id, $updateEmpleado, $IdEmpresaSesion);
				//Variable temporal para mostrar al usuarios de éxito en el update
				$mensaje = "Los datos han sido actualizados con éxito";
				$this->session->set_flashdata("mensaje", $mensaje);
				$this->editarAccidente($id);
				}else{
					$accidenteEmpleado = array(
					'CIEmpleadoAccidente' => $selectEmpleado,
					'TipoIncapacidadAccidente' => $selectTipoIncapacidad,
					'FechaAccidente' => $txtFechaAccidente,
					'NumDiasPerdidos' => $txtNumDiasPerdidos,
					'Indemnizado' => $selectIndemizado,
					'Fallecimiento' => $selectFallecimiento,
					'Periodo' => $txtPeriodo,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
					if($this->AccidenteEmpleado_Modelo->insertAccidenteEmpleado($accidenteEmpleado)){
					//Variable temporal para mostrar al usuarios de éxito en el update
						$mensaje = "El Accidente ha sido registrado con éxito";
						$this->session->set_flashdata("mensaje", $mensaje);
						$this->accidentes();
					}else{
						$mensaje = "El Accidente no se ha registrado, verfique los datos ingresados";
						$this->session->set_flashdata('mensaje',$mensaje);
						$this->nuevoAccidente();	
					}					

				}
		}	
	}
	public function eliminarAccidente(){
		$this->load->model('AccidenteEmpleado_Modelo'); 		          	
		$id = $_POST['IdAccident'];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->AccidenteEmpleado_Modelo->deleteAccidenteEmpleado($id, $IdEmpresaSesion); 
	}
	/**
	 * Beneficio Laboral del Empleado
	 */
	public function beneficiosLaborales(){			
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/publicoInterno" => "Público Interno",
			                     $inicioURL."empleado/beneficiosLaborales" => "Beneficio Laboral de Empleados"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('BeneficioLaboralEmpleado_Modelo');
				$dato['admin'] = 1;
				$dato['beneficiosLaborales'] = $this->BeneficioLaboralEmpleado_Modelo->getListBeneficioLaboralEmpleado($IdEmpresaSesion);
				$dato["contenedor"] = "empleados/beneficioLaboralEmpleado_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "beneficiosLaborales", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('BeneficioLaboralEmpleado_Modelo');
						$dato['beneficiosLaborales'] = $this->BeneficioLaboralEmpleado_Modelo->getListBeneficioLaboralEmpleado($IdEmpresaSesion);
						$dato["contenedor"] = "empleados/beneficioLaboralEmpleado_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "empleados/beneficioLaboralEmpleado_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "empleados/beneficioLaboralEmpleado_view";
					$this->load->view('plantilla', $dato);
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function editarBeneficioLaboral($IdBeneficio){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('BeneficioLaboralEmpleado_Modelo');
				$dato['beneficioLaboral'] = $this->BeneficioLaboralEmpleado_Modelo->getBeneficioLaboralEmpleado($IdBeneficio, $IdEmpresaSesion);
				$dato["titulo"] = "Editar Beneficio Laboral";
				$dato["accion"] = "Editar";	
				$dato["contenedor"] = "empleados/beneficioLaboralEmpleado_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "beneficiosLaborales", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('BeneficioLaboralEmpleado_Modelo');
						$dato['beneficioLaboral'] = $this->BeneficioLaboralEmpleado_Modelo->getBeneficioLaboralEmpleado($IdBeneficio, $IdEmpresaSesion);
						$dato["titulo"] = "Editar Beneficio Laboral";
						$dato["accion"] = "Editar";	
						$dato["contenedor"] = "empleados/beneficioLaboralEmpleado_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->beneficiosLaborales();
					}
				}else{
					$this->beneficiosLaborales();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function nuevoBeneficioLaboral(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('BeneficioLaboralEmpleado_Modelo');
				$dato["beneficioLaboralEmpleado"] = $this->BeneficioLaboralEmpleado_Modelo->getListBeneficioLaboralEmpleado($IdEmpresaSesion);
				$dato["contenedor"] = "empleados/beneficioLaboralEmpleado_new_edit";
				$dato["titulo"] = "Nuevo Beneficio Laboral de Empleados"; 
				$dato["accion"] = "Nuevo";   
				$this->load->view("plantilla", $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "beneficiosLaborales", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('BeneficioLaboralEmpleado_Modelo');
						$dato["beneficioLaboralEmpleado"] = $this->BeneficioLaboralEmpleado_Modelo->getListBeneficioLaboralEmpleado($IdEmpresaSesion);
						$dato["contenedor"] = "empleados/beneficioLaboralEmpleado_new_edit";
						$dato["titulo"] = "Nuevo Beneficio Laboral de Empleados"; 
						$dato["accion"] = "Nuevo";   
						$this->load->view("plantilla", $dato);
					}else{
						$this->beneficiosLaborales();
					}
				}else{
					$this->beneficiosLaborales();
				}
 			}			
		}else{
			redirect('inicio');
		}	
	}
	public function guardarBeneficioLaboral(){	
		$this->form_validation->set_rules('txtNumEmpleadosBeneficio','Número de Empleados con el Beneficio','trim|integer|required');
		$this->form_validation->set_rules('txtCostoCubreEmpresa','Costo que cubre la Empresa','trim|required');	
		$this->form_validation->set_rules('txtNumDiasBeneficio','Número de Días que cubre el Beneficio','trim|integer|integer|required');	
		$this->form_validation->set_rules('txtFechaMesPertenece','Fecha del Mes que pertenece','trim|required');
		$this->form_validation->set_rules('txtPeriodo','Periodo','trim|required|integer');
		$accion = $_POST['accion'];
		$id = $_POST['id'];	
	if($this->form_validation->run() == false){	//Volver a index de login
		if ($accion == "Nuevo") {
			$this->nuevoBeneficioLaboral();		
		}else{
			$this->editarBeneficioLaboral($id);					
		}
	}else{		
		$tiempo = time();
		$this->load->model('BeneficioLaboralEmpleado_Modelo');	
		$selectEstado = $_POST["selectEstado"];
		$txtNumEmpleadosBeneficio = $_POST["txtNumEmpleadosBeneficio"];
		$txtCostoCubreEmpresa = $_POST["txtCostoCubreEmpresa"];
		$txtNumDiasBeneficio = $_POST["txtNumDiasBeneficio"];	
		$txtFechaMesPertenece = $_POST["txtFechaMesPertenece"];
		$txtObservacion = $_POST["txtObservacion"];
		$txtPeriodo = $_POST["txtPeriodo"];
		$txtFechaSistema = date("Y-m-d H:i:s", $tiempo);		
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
		if ($accion == "Editar"){
			$updateEmpleado = array(
				'TipoBeneficioLaboral' => $selectEstado,
				'NumEmpleadosConServicio' => $txtNumEmpleadosBeneficio,
				'CostoTotalQueCubreEmpresa' => $txtCostoCubreEmpresa,
				'NumDiasOtorgadoElBeneficio' => $txtNumDiasBeneficio,
				'FechaMes' => $txtFechaMesPertenece,
				'Observacion' => $txtObservacion,
				'Periodo' => $txtPeriodo,
				'FechaSistema' => $txtFechaSistema,
				'IdEmpresa' => $IdEmpresaSesion
				);
			$this->BeneficioLaboralEmpleado_Modelo->updateBeneficioLaboralEmpleado($id, $updateEmpleado, $IdEmpresaSesion);
				//Variable temporal para mostrar al usuarios de éxito en el update
			$mensaje = "Los datos han sido actualizados con éxito";
			$this->session->set_flashdata("mensaje", $mensaje);
			$this->editarBeneficioLaboral($id);
		}else{
			$beneficioLaboral = array(
				'TipoBeneficioLaboral' => $selectEstado,
				'NumEmpleadosConServicio' => $txtNumEmpleadosBeneficio,
				'CostoTotalQueCubreEmpresa' => $txtCostoCubreEmpresa,
				'NumDiasOtorgadoElBeneficio' => $txtNumDiasBeneficio,
				'FechaMes' => $txtFechaMesPertenece,
				'Observacion' => $txtObservacion,
				'Periodo' => $txtPeriodo,
				'FechaSistema' => $txtFechaSistema,
				'IdEmpresa' => $IdEmpresaSesion
				);
			if($this->BeneficioLaboralEmpleado_Modelo->insertBeneficioLaboralEmpleado($beneficioLaboral)){
					//Variable temporal para mostrar al usuarios de éxito en el update
				$mensaje = "El Beneficio ha sido registrado con éxito";
				$this->session->set_flashdata("mensaje", $mensaje);
				$this->beneficiosLaborales();
			}else{
				$mensaje = "El Beneficio no se ha registrado, verfique los datos ingresados";
				$this->session->set_flashdata('mensaje',$mensaje);
				$this->nuevoBeneficioLaboral();	
			}					

		}
	}	
	}
	public function eliminarBeneficioLaboral(){
		$this->load->model('BeneficioLaboralEmpleado_Modelo'); 		          	
		$id = $_POST["IdBeneficioLab"];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->BeneficioLaboralEmpleado_Modelo->deleteBeneficioLaboralEmpleado($id, $IdEmpresaSesion); 
	}
	/**
	 * Capacitación a Empleados
	 */	
	public function capacitacionesEmpleados(){			
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/capacitaciones" => "Capacitaciones",
			                     $inicioURL."empleado/capacitacionesEmpleados" => "Capacitación a Empleados"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('CapacitacionEmpleado_Modelo');
				$dato['admin'] = 1;
				$dato['capacitacionesEmpleados'] = $this->CapacitacionEmpleado_Modelo->getListCapacitacionEmpleado($IdEmpresaSesion);
				$dato["contenedor"] = "empleados/capacitacionesEmpleado_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "capacitacionesEmpleados", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('CapacitacionEmpleado_Modelo');
						$dato['capacitacionesEmpleados'] = $this->CapacitacionEmpleado_Modelo->getListCapacitacionEmpleado($IdEmpresaSesion);
						$dato["contenedor"] = "empleados/capacitacionesEmpleado_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "empleados/capacitacionesEmpleado_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "empleados/capacitacionesEmpleado_view";
					$this->load->view('plantilla', $dato);
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function nuevaCapacitacionEmpleado(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('CapacitacionEmpleado_Modelo');
				$this->load->model('Proveedor_Modelo');
				$this->load->model('Empleado_Modelo');
				$dato['capacitacionConsejoEmpleado'] = $this->CapacitacionEmpleado_Modelo->getListCapacitacionEmpleado($IdEmpresaSesion);
				$dato['empleados'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion);  
				$dato['proveedores'] = $this->Proveedor_Modelo->getListProveedor($IdEmpresaSesion);  
				$dato["titulo"] = "Nueva Capacitación a Empleados";
				$dato["accion"] = "Nuevo";
				$dato["contenedor"] = "empleados/capacitacionEmpleado_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "capacitacionesEmpleados", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('CapacitacionEmpleado_Modelo');
						$this->load->model('Proveedor_Modelo');
						$this->load->model('Empleado_Modelo');
						$dato['capacitacionConsejoEmpleado'] = $this->CapacitacionEmpleado_Modelo->getListCapacitacionEmpleado($IdEmpresaSesion);
						$dato['empleados'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion);  
						$dato['proveedores'] = $this->Proveedor_Modelo->getListProveedor($IdEmpresaSesion);  
						$dato["titulo"] = "Nueva Capacitación a Empleados";
						$dato["accion"] = "Nuevo";
						$dato["contenedor"] = "empleados/capacitacionEmpleado_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->capacitacionesEmpleados();
					}
				}else{
					$this->capacitacionesEmpleados();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function editarCapacitacionEmpleado($IdCapacitacion){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Proveedor_Modelo');
				$this->load->model('CapacitacionEmpleado_Modelo');
				$this->load->model('Empleado_Modelo');
				$dato['proveedores'] = $this->Proveedor_Modelo->getListProveedor($IdEmpresaSesion); 
				$dato['empleados'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion);  
				$dato['capacitacionEmpleado'] = $this->CapacitacionEmpleado_Modelo->getCapacitacionEmpleado($IdCapacitacion, $IdEmpresaSesion);
				$dato["titulo"] = "Editar Capacitación de Empleados";
				$dato["accion"] = "Editar";	
				$dato["contenedor"] = "empleados/capacitacionEmpleado_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "capacitacionesEmpleados", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('Proveedor_Modelo');
						$this->load->model('CapacitacionEmpleado_Modelo');
						$this->load->model('Empleado_Modelo');
						$dato['proveedores'] = $this->Proveedor_Modelo->getListProveedor($IdEmpresaSesion); 
						$dato['empleados'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion);  
						$dato['capacitacionEmpleado'] = $this->CapacitacionEmpleado_Modelo->getCapacitacionEmpleado($IdCapacitacion, $IdEmpresaSesion);
						$dato["titulo"] = "Editar Capacitación de Empleados";
						$dato["accion"] = "Editar";	
						$dato["contenedor"] = "empleados/capacitacionEmpleado_new_edit";
						$this->load->view('plantilla', $dato);	
					}else{
						$this->capacitacionesEmpleados();
					}
				}else{
					$this->capacitacionesEmpleados();
				}
 			}					
		}else{
			redirect('inicio');
		}
	}
	public function guardarCapacitacionEmpleado(){
		$this->form_validation->set_rules('txtNombreCapacitacion','Nombre de la Capacitación','trim|required'); 		
		$this->form_validation->set_rules('txtFechaPlanificacion','Fecha de Planificación','trim|required'); 		
		$this->form_validation->set_rules('txtOrdenPedido','Orden de Pedido','trim|required'); 		
		$this->form_validation->set_rules('txtPresupuesto','Presupuesto','trim|required'); 		
		$this->form_validation->set_rules('txtCantHorasPlanificadas','Cantidad de horas Planificada','trim|integer|required'); 		
		$this->form_validation->set_rules('txtNumParticipantesEsperados','Número de Participantes esperados','trim|integer|required'); 	
		$this->form_validation->set_rules('txtPeriodo','Periodo','trim|integer|required'); 	
		$accion = $_POST['accion'];
		$id = $_POST['id'];	
		if ($this->form_validation->run() == false) {
			if ($accion == "Nuevo") {
				$this->nuevaCapacitacionEmpleado();		
			}else{
				$this->editarCapacitacionEmpleado($id);					
			}
		}else{
			$this->load->model('CapacitacionEmpleado_Modelo');
			$tiempo = time();
			$txtNombreCapacitacion = $_POST["txtNombreCapacitacion"];
			$txtFechaPlanificacion = $_POST["txtFechaPlanificacion"];			
			$txtOrdenPedido = $_POST["txtOrdenPedido"];
			$selectTipoCapacitacion = $_POST["selectTipoCapacitacion"];
			$txtPresupuesto = $_POST["txtPresupuesto"];
			$txtCantHorasPlanificadas = $_POST["txtCantHorasPlanificadas"];
			$txtNumParticipantesEsperados = $_POST["txtNumParticipantesEsperados"];
			$selectEstado = $_POST["selectEstado"];
			$selectProveedor = $_POST["selectProveedor"];
			$txtFechaEjecucion = $_POST["txtFechaEjecucion"];
			$txtNumParticipantesCapacitados = $_POST["txtNumParticipantesCapacitados"];
			$txtCantHorasEjecutadas = $_POST["txtCantHorasEjecutadas"];				
			$txtAreaImpartida = $_POST["txtAreaImpartida"];				
			$txtCosto = $_POST["txtCosto"];				
			$selectEmpleado = $_POST["selectEmpleado"];
			if(!empty($_FILES['inputFoto']['tmp_name']) && file_exists($_FILES['inputFoto']['tmp_name'])) {				
				$imagen= addslashes(file_get_contents($_FILES['inputFoto']['tmp_name']));
			}else{
				$imagen = "";
			}
			$txtPeriodo = $_POST["txtPeriodo"];
			$txtFechaSistema = date('Y-m-d H:i:s');
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($_POST["accion"] == "Editar"){
				$updateCapacitacionEmpleado = array(				
					'NombreCapacitacion' => $txtNombreCapacitacion,
					'FechaPlanificada' => $txtFechaPlanificacion,
					'OrdenPedido' => $txtOrdenPedido,
					'TipoCapacitacion' => $selectTipoCapacitacion,
					'Presupuesto' => $txtPresupuesto,
					'HorasPlanificadas' => $txtCantHorasPlanificadas,
					'ParticipantesEsperados' => $txtNumParticipantesEsperados,
					'EstadoCapacitacion' => $selectEstado,
					'IdProveedor' => $selectProveedor,
					'FechaEjecucion' => $txtFechaEjecucion,
					'ParticipantesCapacitados' => $txtNumParticipantesCapacitados,
					'HorasEjecutadas' => $txtCantHorasEjecutadas,
					'AreaImpartida' => $txtAreaImpartida,
					'Costo' => $txtCosto,
					'EmpleadoResponsable' => $selectEmpleado,
					'Imagen' => $imagen,
					'Periodo' => $txtPeriodo,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->CapacitacionEmpleado_Modelo->updateCapacitacionEmpleado($id, $updateCapacitacionEmpleado, $IdEmpresaSesion)){
					$mensaje = "La Capacitación se modificó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarCapacitacionEmpleado($id);				
				}else{
					$mensaje = "La Capacitación no se ha modificado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarCapacitacionEmpleado($id);				
				}
			}else{
				$insertCapacitacionEmpleado = array(
					'NombreCapacitacion' => $txtNombreCapacitacion,
					'FechaPlanificada' => $txtFechaPlanificacion,
					'OrdenPedido' => $txtOrdenPedido,
					'TipoCapacitacion' => $selectTipoCapacitacion,
					'Presupuesto' => $txtPresupuesto,
					'HorasPlanificadas' => $txtCantHorasPlanificadas,
					'ParticipantesEsperados' => $txtNumParticipantesEsperados,
					'EstadoCapacitacion' => $selectEstado,
					'IdProveedor' => $selectProveedor,
					'FechaEjecucion' => $txtFechaEjecucion,
					'ParticipantesCapacitados' => $txtNumParticipantesCapacitados,
					'HorasEjecutadas' => $txtCantHorasEjecutadas,
					'AreaImpartida' => $txtAreaImpartida,
					'Costo' => $txtCosto,
					'EmpleadoResponsable' => $selectEmpleado,
					'Imagen' => $imagen,
					'Periodo' => $txtPeriodo,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->CapacitacionEmpleado_Modelo->insertCapacitacionEmpleado($insertCapacitacionEmpleado)){
					$mensaje = "La Capacitación se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->capacitacionesEmpleados();				
				}else{
					$mensaje = "La Capacitación no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevaCapacitacionEmpleado();				
				}
			}
		}
	}
	public function eliminarCapacitacionEmpleado(){
		$this->load->model('CapacitacionEmpleado_Modelo'); 		          	
		$id  = $_POST['IdCapacitacionEm'];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->CapacitacionEmpleado_Modelo->deleteCapacitacionEmpleado($id, $IdEmpresaSesion); 
	}
	/**
	 * Hijo de Empleado
	 */
	public function hijos(){			
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa" => "Empresa",
			                     $inicioURL."empleado" => "Empleados",
			                     $inicioURL."empleado/hijos" => "Hijos de Empleados"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('HijoEmpleado_Modelo');
				$dato['hijosEmpleados'] = $this->HijoEmpleado_Modelo->getListHijoEmpleado($IdEmpresaSesion);
				$dato["admin"] = 1;
				$dato["contenedor"] = "empleados/hijoEmpleado_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "hijosEmpleados", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('HijoEmpleado_Modelo');
						$dato['hijosEmpleados'] = $this->HijoEmpleado_Modelo->getListHijoEmpleado($IdEmpresaSesion);
						$dato["contenedor"] = "empleados/hijoEmpleado_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "empleados/hijoEmpleado_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "empleados/hijoEmpleado_view";
					$this->load->view('plantilla', $dato);
				}
 			}
			
		}else{
			redirect('inicio');
		}
	}
	public function nuevoHijoEmpleado(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Empleado_Modelo');
				$this->load->model('HijoEmpleado_Modelo');
				$dato['empleados'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion);    
				$dato['hijoEmpleados'] = $this->HijoEmpleado_Modelo->getListHijoEmpleado($IdEmpresaSesion);    
				$dato["titulo"] = "Nuevo Hijo de un Empleado";
				$dato["accion"] = "Nuevo";
				$dato["contenedor"] = "empleados/hijoEmpleado_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "hijosEmpleados", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('Empleado_Modelo');
						$this->load->model('HijoEmpleado_Modelo');
						$dato['empleados'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion);    
						$dato['hijoEmpleados'] = $this->HijoEmpleado_Modelo->getListHijoEmpleado($IdEmpresaSesion);    
						$dato["titulo"] = "Nuevo Hijo de un Empleado";
						$dato["accion"] = "Nuevo";
						$dato["contenedor"] = "empleados/hijoEmpleado_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->hijos();
					}
				}else{
					$this->hijos();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function editarHijoEmpleado($IdHijoEmpleado){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('HijoEmpleado_Modelo');	
				$this->load->model('Empleado_Modelo');		
				$dato['hijoEmpleado'] = $this->HijoEmpleado_Modelo->getHijoEmpleado($IdHijoEmpleado, $IdEmpresaSesion);
				$dato['empleados'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion);    
				$dato["titulo"] = "Editar Hijo del Empleado";   
				$dato["accion"] = "Editar";	
				$dato["contenedor"] = "empleados/hijoEmpleado_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "hijosEmpleados", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('HijoEmpleado_Modelo');	
						$this->load->model('Empleado_Modelo');		
						$dato['hijoEmpleado'] = $this->HijoEmpleado_Modelo->getHijoEmpleado($IdHijoEmpleado, $IdEmpresaSesion);
						$dato['empleados'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion);    
						$dato["titulo"] = "Editar Hijo del Empleado";   
						$dato["accion"] = "Editar";	
						$dato["contenedor"] = "empleados/hijoEmpleado_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->hijos();
					}
				}else{
					$this->hijos();
				}
 			}
						
		}else{
			redirect('inicio');
		}
	}
	public function guardarHijoEmpleado(){
		$this->form_validation->set_rules('txtCedula','Cedula de Hijo','trim|integer|required'); 		
		$this->form_validation->set_rules('txtNombres','Nombres','trim|required'); 		
		$this->form_validation->set_rules('txtApellidos','Apellidos','trim|required'); 		
		$this->form_validation->set_rules('txtFechaNacimiento','Fecha de Nacimiento','trim|required'); 
		$accion = $_POST['accion'];
		$id = $_POST['id']; 
		if ($this->form_validation->run() == false) {
			if ($accion == "Nuevo") {
				$this->nuevoHijoEmpleado();		
			}else{
				$this->editarHijoEmpleado($id);					
			}
		}else{
			$this->load->model('HijoEmpleado_Modelo');
			$tiempo = time();  
			$selectEmpleado = $_POST["selectEmpleado"];
			$txtCedula = $_POST["txtCedula"];			
			$txtNombres = $_POST["txtNombres"];
			$txtApellidos = $_POST["txtApellidos"];
			$txtFechaNacimiento = $_POST["txtFechaNacimiento"];
			$selectDiscapacidad = $_POST["selectDiscapacidad"];
			$selectTipoEduacion = $_POST["selectTipoEduacion"];						
			$txtFechaSistema = date("Y-m-d H:i:s", $tiempo);					
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$existeCedula = $this->HijoEmpleado_Modelo->getHijoEmpleado($txtCedula, $IdEmpresaSesion);
				if ($existeCedula == true) {
					$mensaje = "Hijo ya está registrado";
					$this->session->set_flashdata('mensaje',$mensaje);	
					$this->nuevoHijoEmpleado();
				}else{
				if ($accion == "Editar"){
				$updateHijoEmpleado = array(					
					'CedulaEmpleado' => $selectEmpleado,
					'CedulaHijoEmpleado' => $txtCedula,
					'NombresHijoEmpleado' => $txtNombres,
					'ApellidosHijoEmpleado' => $txtApellidos,
					'FechaNacimientoHijoEmpleado' => $txtFechaNacimiento,
					'DiscapacidadHijoEmpleado' => $selectDiscapacidad,
					'CentroEducacionHijoEmpleado' => $selectTipoEduacion,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->HijoEmpleado_Modelo->updateHijoEmpleado($id, $updateHijoEmpleado, $IdEmpresaSesion)){
					$mensaje = "El Hijo del Empleado se ha actualizado con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarHijoEmpleado($id);				
				}else{
					$mensaje = "El Hijo del Empleado no se ha actualizado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarHijoEmpleado($id);				
				}
			}else{
				$insertHijoEmpleado = array(
					'CedulaEmpleado' => $selectEmpleado,
					'CedulaHijoEmpleado' => $txtCedula,
					'NombresHijoEmpleado' => $txtNombres,
					'ApellidosHijoEmpleado' => $txtApellidos,
					'FechaNacimientoHijoEmpleado' => $txtFechaNacimiento,
					'DiscapacidadHijoEmpleado' => $selectDiscapacidad,
					'CentroEducacionHijoEmpleado' => $selectTipoEduacion,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->HijoEmpleado_Modelo->insertHijoEmpleado($insertHijoEmpleado)){
					$mensaje = "El Hijo del Empleado se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoHijoEmpleado();				
				}else{
					$mensaje = "El Hijo del Empleado no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoHijoEmpleado();				
				}
			}


				}
		}
	}
	public function eliminarHijoEmpleado(){
		$this->load->model('HijoEmpleado_Modelo'); 		          	
		
		$IdHijoEmp = $_POST["IdHijoEmpleado"];

		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->HijoEmpleado_Modelo->deleteHijoEmpleado($IdHijoEmp, $IdEmpresaSesion); 
	}

/**
 * Funciones extras
 */
function edad($fecha){
	$date = $fecha;
    $fecha = str_replace("/","-",$fecha);
    $fecha = date('Y/m/d',strtotime($fecha));
    $hoy = date('Y/m/d');
    echo $hoy;
    echo "<br>";
    echo $fecha;
    echo "<br>";
    $edad = $hoy - $fecha;
    echo $edad;
    echo "<br>";
    echo "<br>";
    $date = '1986-05-02';
    list($Y,$m,$d) = explode("-",$date);
    echo  (date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y);
    //return $edad;
}



}

?>