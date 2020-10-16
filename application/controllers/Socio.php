<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//Controlador 
class socio extends CI_Controller {

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
			                     $inicioURL."planificacionRSE/publicoExterno" => "Público Externo",
			                     $inicioURL."socio" => "Socios"			                     
			                    );
			$this->load->model('Socio_Modelo');
			$dato['socios'] = $this->Socio_Modelo->getListSocio($IdEmpresaSesion);
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "socios/socios_view";
			$this->load->view('plantilla', $dato);
		}else{
			redirect('inicio');
		}		
	}
	*/
	public function socios(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",			                     
			                     $inicioURL."planificacionRSE/publicoExterno" => "Público Externo",
			                     $inicioURL."socio/socios" => "Socios"			                     
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Socio_Modelo');
				$dato['socios'] = $this->Socio_Modelo->getListSocio($IdEmpresaSesion);
				$dato["admin"] = 1;
				$dato["contenedor"] = "socios/socios_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "socios", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('Socio_Modelo');
						$dato['socios'] = $this->Socio_Modelo->getListSocio($IdEmpresaSesion);
						$dato["contenedor"] = "socios/socios_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "socios/socios_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "socios/socios_view";
					$this->load->view('plantilla', $dato);
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function nuevoSocio(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Socio_Modelo');
				$dato['socios'] = $this->Socio_Modelo->getListSocio($IdEmpresaSesion);   
				$dato["titulo"] = "Nuevo Registro de Socios";
				$dato["accion"] = "Nuevo";
				$dato["contenedor"] = "socios/socios_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "socios", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('Socio_Modelo');
						$dato['socios'] = $this->Socio_Modelo->getListSocio($IdEmpresaSesion);   
						$dato["titulo"] = "Nuevo Registro de Socios";
						$dato["accion"] = "Nuevo";
						$dato["contenedor"] = "socios/socios_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->socios();
					}
				}else{
					$this->socios();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function editarSocio($IdSocio){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Socio_Modelo');					
				$dato['socio'] = $this->Socio_Modelo->getSocio($IdSocio, $IdEmpresaSesion);    
				$dato["titulo"] = "Editar Registro de Socios";
				$dato["accion"] = "Editar";	
				$dato["contenedor"] = "socios/socios_new_edit";
				$this->load->view('plantilla', $dato);	
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "socios", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('Socio_Modelo');					
						$dato['socio'] = $this->Socio_Modelo->getSocio($IdSocio, $IdEmpresaSesion);    
						$dato["titulo"] = "Editar Registro de Socios";
						$dato["accion"] = "Editar";	
						$dato["contenedor"] = "socios/socios_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->socios();
					}
				}else{
					$this->socios();
				}
 			}					
		}else{
			redirect('inicio');
		}
	}
	public function guardarSocio(){
		$this->form_validation->set_rules('txtNumSociosIncorporados','Número de Socios Incorporados','trim|integer|required');			
		$this->form_validation->set_rules('txtNumSociosRetirados','Número de Socios Retirados','trim|integer|required');			
		$this->form_validation->set_rules('txtNumSociosActivos','Número de Socios Activos','trim|integer|required');			
		$this->form_validation->set_rules('txtNumSociosMujeresActivas','Número de Socios Mujeres Activas','trim|integer|required');			
		$this->form_validation->set_rules('txtNumSociosConCuentasDeAhorro','Número Socios con Cuenta de Ahorro','trim|integer|required');			
		$this->form_validation->set_rules('txtNumPersonasNaturalesIncorporadas','Número de Personas Naturales Incorporadas','trim|integer|required');			
		$this->form_validation->set_rules('txtNumPersonasJuridicasIncorporadas','Número de Personas Jurídicas Incorporadas','trim|integer|required');			
		$this->form_validation->set_rules('txtNumSociosConCuentaAhorroMenorA18Anios','Número de Socios con Cuenta de Ahorro Menores de Edad','trim|integer|required');	
		$this->form_validation->set_rules('txtCantSociosConCertAportacion','Número de Socios con Certificado de Aportación','trim|integer|required');			
		$this->form_validation->set_rules('txtCantSociosSinCertAportacion','Número de Socios sin Certificado de Aportación','trim|integer|required');			
		$this->form_validation->set_rules('txtValorTCertificadoAportacion','Valor Total de Certificados de Aportación','trim|required');			
		$this->form_validation->set_rules('txtValorCertificadoAportacionDevueltos','Valor Total de Certificados de Aportación Devueltos','trim|required');			
		$this->form_validation->set_rules('txtNumSociosHombresConCertAportacion','Número de Socios Hombres con Certificados de Aportación','trim|integer|required');	
		$this->form_validation->set_rules('txtNumSociosMujeresConCertAportacion','Número de Socios Mujeres con Certificado de Aportación','trim|integer|required');	
		$this->form_validation->set_rules('txtMesPertenece','Fecha de Mes','trim|required');
		$this->form_validation->set_rules('txtNumTClientesNuevosPerido','Número de Clientes en el presente periodo','trim|required');
		$this->form_validation->set_rules('txtNumTClientesRetirados','Número de Clientes retirados en el presente periodo','trim|required');
		$accion = $_POST['accion'];
		$id = $_POST['id'];	
		if ($this->form_validation->run() == false) {
			if ($accion == "Editar") {
				$this->editarSocio($id);				
			}else{
				$this->nuevoSocio();
			}
		}else{
			$this->load->model('Socio_Modelo');
			$tiempo = time();
			//PENDIENTE: Recibir y obtener el IdAcuerdo para la actualización
			$txtNumSociosIncorporados = $_POST["txtNumSociosIncorporados"];
			$txtNumSociosRetirados = $_POST["txtNumSociosRetirados"];			
			$txtNumSociosActivos = $_POST["txtNumSociosActivos"];
			$txtNumSociosMujeresActivas = $_POST["txtNumSociosMujeresActivas"];
			$txtNumSociosConCuentasDeAhorro = $_POST["txtNumSociosConCuentasDeAhorro"];
			$txtNumPersonasNaturalesIncorporadas = $_POST["txtNumPersonasNaturalesIncorporadas"];
			$txtNumPersonasJuridicasIncorporadas = $_POST["txtNumPersonasJuridicasIncorporadas"];
			$txtNumSociosConCuentaAhorroMenorA18Anios = $_POST["txtNumSociosConCuentaAhorroMenorA18Anios"];
			$txtCantSociosConCertAportacion = $_POST["txtCantSociosConCertAportacion"];
			$txtCantSociosSinCertAportacion = $_POST["txtCantSociosSinCertAportacion"];
			$txtValorTCertificadoAportacion = $_POST["txtValorTCertificadoAportacion"];			
			$txtValorCertificadoAportacionDevueltos = $_POST["txtValorCertificadoAportacionDevueltos"];
			$txtNumSociosHombresConCertAportacion = $_POST["txtNumSociosHombresConCertAportacion"];
			$txtNumSociosMujeresConCertAportacion = $_POST["txtNumSociosMujeresConCertAportacion"];
			$txtNumTClientesNuevosPerido = $_POST["txtNumTClientesNuevosPerido"];
			$txtNumTClientesRetirados = $_POST["txtNumTClientesRetirados"];
			$txtMesPertenece = $_POST["txtMesPertenece"];				
			$txtFechaSistema = date("Y-m-d H:m:s", $tiempo);			
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($_POST["accion"] == "Editar"){
				$updateSocio = array(					
					'NumSociosIncorporados' => $txtNumSociosIncorporados,
					'NumSociosRetirados' => $txtNumSociosRetirados,					
					'NumSociosActivos' => $txtNumSociosActivos,
					'NumSociosMujeresActivas' => $txtNumSociosMujeresActivas,
					'NumSociosConCuentasDeAhorro' => $txtNumSociosConCuentasDeAhorro,
					'NumPersonasNaturalesIncorporadas' => $txtNumPersonasNaturalesIncorporadas,
					'NumPersonasJuridicasIncorporadas' => $txtNumPersonasJuridicasIncorporadas,
					'NumSociosConCuentaAhorroMenorA18Anios' => $txtNumSociosConCuentaAhorroMenorA18Anios,
					'CantSociosConCertAportacion' => $txtCantSociosConCertAportacion,
					'CantSociosSinCertAportacion' => $txtCantSociosSinCertAportacion,
					'ValorTCertificadoAportacion' => $txtValorTCertificadoAportacion,					
					'ValorCertificadoAportacionDevueltos' => $txtValorCertificadoAportacionDevueltos,
					'NumSociosHombresConCertAportacion' => $txtNumSociosHombresConCertAportacion,
					'NumSociosMujeresConCertAportacion' => $txtNumSociosMujeresConCertAportacion,
					'NumTClientesNuevosPeriodo' => $txtNumTClientesNuevosPerido,
					'NumTClientesRetiradosPeriodo' => $txtNumTClientesRetirados,
					'MesPertenece' => $txtMesPertenece,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);				
				if($this->Socio_Modelo->updateSocio($id, $updateSocio, $IdEmpresaSesion)){
					$mensaje = "El Registo de Socios se actualizó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarSocio($id);				
				}else{
					$mensaje = "El Registo de Socios no se ha actualizado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarSocio($id);				
				}
			}else{
				$insertSocio = array(
					'NumSociosIncorporados' => $txtNumSociosIncorporados,
					'NumSociosRetirados' => $txtNumSociosRetirados,					
					'NumSociosActivos' => $txtNumSociosActivos,
					'NumSociosMujeresActivas' => $txtNumSociosMujeresActivas,
					'NumSociosConCuentasDeAhorro' => $txtNumSociosConCuentasDeAhorro,
					'NumPersonasNaturalesIncorporadas' => $txtNumPersonasNaturalesIncorporadas,
					'NumPersonasJuridicasIncorporadas' => $txtNumPersonasJuridicasIncorporadas,
					'NumSociosConCuentaAhorroMenorA18Anios' => $txtNumSociosConCuentaAhorroMenorA18Anios,
					'CantSociosConCertAportacion' => $txtCantSociosConCertAportacion,
					'CantSociosSinCertAportacion' => $txtCantSociosSinCertAportacion,
					'ValorTCertificadoAportacion' => $txtValorTCertificadoAportacion,					
					'ValorCertificadoAportacionDevueltos' => $txtValorCertificadoAportacionDevueltos,
					'NumSociosHombresConCertAportacion' => $txtNumSociosHombresConCertAportacion,
					'NumSociosMujeresConCertAportacion' => $txtNumSociosMujeresConCertAportacion,
					'NumTClientesNuevosPeriodo' => $txtNumTClientesNuevosPerido,
					'NumTClientesRetiradosPeriodo' => $txtNumTClientesRetirados,
					'MesPertenece' => $txtMesPertenece,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->Socio_Modelo->insertSocio($insertSocio)){
					$mensaje = "El Registo de Socios se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoSocio();				
				}else{
					$mensaje = "El Registo de Socios no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoSocio();				
				}
			}
		}
	}
	public function eliminarSocio(){
		$this->load->model('Socio_Modelo'); 		          	
		$id = $_POST['idSocio'];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$result =  $this->Socio_Modelo->deleteSocio($id, $IdEmpresaSesion); 
		if($result){
        	echo "Success";
    	} else{
        	echo "Error";
    	}
	}
	/**
	 * Capacitación a Socio
	 */
	public function capacitacionSocios(){			
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/capacitaciones" => "Capacitaciones",
			                     $inicioURL."socio/capacitacionSocios" => "Capacitación a Socios"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Socio_Modelo');
				$dato['admin'] = 1;
				$dato['capacitacionSocios'] = $this->Socio_Modelo->getListCapacitacionSocio($IdEmpresaSesion);
				$dato["contenedor"] = "socios/capacitacionSocios_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "capacitacionSocios", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('Socio_Modelo');
						$dato['capacitacionSocios'] = $this->Socio_Modelo->getListCapacitacionSocio($IdEmpresaSesion);
						$dato["contenedor"] = "socios/capacitacionSocios_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "socios/capacitacionSocios_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "socios/capacitacionSocios_view";
					$this->load->view('plantilla', $dato);
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function nuevaCapacitacionSocio(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Proveedor_Modelo');
				$this->load->model('Empleado_Modelo');
				$dato['proveedores'] = $this->Proveedor_Modelo->getListProveedor($IdEmpresaSesion); 
				$dato['empleados'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion); 
				  
				$dato["titulo"] = "Nueva Capacitación a Socios";
				$dato["accion"] = "Nuevo";
				$dato["contenedor"] = "socios/capacitacionSocios_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "capacitacionSocios", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('Proveedor_Modelo');
						$this->load->model('Empleado_Modelo');
						$dato['proveedores'] = $this->Proveedor_Modelo->getListProveedor($IdEmpresaSesion); 
						$dato['empleados'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion);   
						$dato["titulo"] = "Nueva Capacitación a Socios";
						$dato["accion"] = "Nuevo";
						$dato["contenedor"] = "socios/capacitacionSocios_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->capacitacionSocios();
					}
				}else{
					$this->capacitacionSocios();
				}
 			}			
		}else{
			redirect('inicio');
		}	
	}

	public function editarCapacitacionSocio($IdCapacitacionSocio){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Socio_Modelo');
				$this->load->model('Proveedor_Modelo');
				$this->load->model('Empleado_Modelo');
				$dato['capacitacionSocio'] = $this->Socio_Modelo->getCapacitacionSocio($IdCapacitacionSocio, $IdEmpresaSesion);    
				$dato['proveedores'] = $this->Proveedor_Modelo->getListProveedor($IdEmpresaSesion); 
				$dato['empleados'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion);   
				$dato["titulo"] = "Editar Capacitación a Socios";
				$dato["accion"] = "Editar";	
				$dato["contenedor"] = "socios/capacitacionSocios_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "capacitacionSocios", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('Socio_Modelo');
						$this->load->model('Proveedor_Modelo');
						$this->load->model('Empleado_Modelo');
						$dato['capacitacionSocio'] = $this->Socio_Modelo->getCapacitacionSocio($IdCapacitacionSocio, $IdEmpresaSesion);    
						$dato['proveedores'] = $this->Proveedor_Modelo->getListProveedor($IdEmpresaSesion); 
						$dato['empleados'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion);   
						$dato["titulo"] = "Editar Capacitación a Socios";
						$dato["accion"] = "Editar";	
						$dato["contenedor"] = "socios/capacitacionSocios_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->capacitacionSocios();
					}
				}else{
					$this->capacitacionSocios();
				}
 			}				
		}else{
			redirect('inicio');
		}
	}
	public function guardarCapacitacionSocio(){
		$this->form_validation->set_rules('txtNombreCapacitacion','Nombre de la Capacitación','trim|required'); 		
		$this->form_validation->set_rules('txtFechaPlanificacion','Fecha de Planificación','trim|required');		
		$this->form_validation->set_rules('txtPresupuesto','Presupuesto','trim|required'); 		
		$this->form_validation->set_rules('txtCantHorasPlanificadas','Cantidad de horas Planificada','trim|integer|required'); 		
		$this->form_validation->set_rules('txtNumParticipantesEsperados','Número de Participantes esperados','trim|integer|required');
		$this->form_validation->set_rules('txtPeriodo','Periodo','trim|integer|required');
		$accion = $_POST['accion'];
		$id = $_POST['id'];	
		if ($this->form_validation->run() == false) {
			if ($accion == "Editar") {
				$this->editarCapacitacionSocio($id);				
			}else{
				$this->nuevaCapacitacionSocio();
			}
		}else{
			$this->load->model('Socio_Modelo');
			$tiempo = time();
			$txtNombreCapacitacion = $_POST["txtNombreCapacitacion"];
			$txtFechaPlanificacion = $_POST["txtFechaPlanificacion"];
			$selectTipoCapacitacion = $_POST["selectTipoCapacitacion"];
			$txtPresupuesto = $_POST["txtPresupuesto"];
			$txtCantHorasPlanificadas = $_POST["txtCantHorasPlanificadas"];
			$txtNumParticipantesEsperados = $_POST["txtNumParticipantesEsperados"];
			$selectEstado = $_POST["selectEstado"];
			$selectProveedor = $_POST["selectProveedor"];
			$txtFechaEjecucion = $_POST["txtFechaEjecucion"];
			$txtNumParticipantesCapacitados = $_POST["txtNumParticipantesCapacitados"];
			$txtCantHorasEjecutadas = $_POST["txtCantHorasEjecutadas"];
			$txtCosto = $_POST["txtCosto"];
			$selectEmpleado = $_POST["selectEmpleado"];
			$txtPeriodo = $_POST["txtPeriodo"];
			$txtFechaSistema = date('Y-m-d H:i:s');
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($_POST["accion"] == "Editar"){
				$updateCapacitacionSocio = array(					
					'NombreCapacitacionSocios' => $txtNombreCapacitacion,
					'FechaPlanificacion' => $txtFechaPlanificacion,
					'TipoCapacitacionSocios' => $selectTipoCapacitacion,
					'CostoPresupuestado' => $txtPresupuesto,
					'HorasPlanificadas' => $txtCantHorasPlanificadas,
					'ParticipantesEsperado' => $txtNumParticipantesEsperados,
					'IdProveedor' => $selectProveedor,
					'EstadoCapacitacion' => $selectEstado,
					'FechaEjecucion' => $txtFechaEjecucion,
					'NumeroAsistentes' => $txtNumParticipantesCapacitados,
					'HorasEjecutadas' => $txtCantHorasEjecutadas,					
					'CostoCapacitacion' => $txtCosto,
					'CiResponsable' => $selectEmpleado,
					'Periodo' => $txtPeriodo,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->Socio_Modelo->updateCapacitacionSocio($id, $updateCapacitacionSocio, $IdEmpresaSesion)){
					$mensaje = "La Capacitación se actualizó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarCapacitacionSocio($id);				
				}else{
					$mensaje = "La Capacitación no se ha actualizado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarCapacitacionSocio($id);				
				}				
			}else{
				$insertCapacitacionSocio = array(
					'NombreCapacitacionSocios' => $txtNombreCapacitacion,
					'FechaPlanificacion' => $txtFechaPlanificacion,					
					'TipoCapacitacionSocios' => $selectTipoCapacitacion,
					'CostoPresupuestado' => $txtPresupuesto,
					'HorasPlanificadas' => $txtCantHorasPlanificadas,
					'ParticipantesEsperado' => $txtNumParticipantesEsperados,
					'IdProveedor' => $selectProveedor,
					'EstadoCapacitacion' => $selectEstado,
					'FechaEjecucion' => $txtFechaEjecucion,
					'NumeroAsistentes' => $txtNumParticipantesCapacitados,
					'HorasEjecutadas' => $txtCantHorasEjecutadas,					
					'CostoCapacitacion' => $txtCosto,
					'CiResponsable' => $selectEmpleado,
					'Periodo' => $txtPeriodo,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->Socio_Modelo->insertCapacitacionSocio($insertCapacitacionSocio)){
					$mensaje = "La Capacitación se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->capacitacionSocios();				
				}else{
					$mensaje = "La Capacitación no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevaCapacitacionSocio();				
				}
			}
		}
	}
	public function eliminarCapacitacionSocio(){
		$this->load->model('Socio_Modelo');
		$id  = $_POST['IdCapSo'];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->Socio_Modelo->deleteCapacitacionSocio($id, $IdEmpresaSesion); 
	}

	
}

?>