<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//Controlador 
class desarrolloProfesional extends CI_Controller {

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
			                     $inicioURL."desarrolloProfesional" => "Desarrollo Profesional"			                     
			                    );
			$this->load->model('DesarrolloProfesional_Modelo');						
			$dato['desarrolloProfesionalEmpleado'] = $this->DesarrolloProfesional_Modelo->getListDesarrolloProfesionalEmpleado($IdEmpresaSesion);			
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "desarrolloProfesional/desarrolloProfesionalEmpleado_view";
			$this->load->view('plantilla', $dato);
		}else{
			redirect('inicio');
		}		
	}
	*/
	/**
	 * Programas de Desarrollo Profesional
	 */
	public function desarrollo(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/publicoInterno" => "Público Interno",
			                     $inicioURL."desarrolloProfesional" => "Desarrollo Profesional",
			                     $inicioURL."desarrolloProfesional/desarrollo" => "Programas de Desarrollo "
			                    );
			$this->load->model('DesarrolloProfesional_Modelo');
			$dato['desarrolloProfesional'] = $this->DesarrolloProfesional_Modelo->getListDesarrolloProfesional($IdEmpresaSesion);
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "desarrolloProfesional/desarrolloProfesional_view";
			$this->load->view('plantilla', $dato);
		}else{
			redirect('inicio');
		}		
	}
	public function nuevoDesarrolloProfesional(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$dato["contenedor"] = "desarrolloProfesional/desarrolloProfesional_new_edit";
			$dato["titulo"] = "Nuevo Desarrollo Profesional";
			$dato["accion"] = "Nuevo";			
			$this->load->view('plantilla', $dato);
		}else{
			redirect('inicio');
		}
	}
	public function editarDesarrolloProfesional($IdDesarrolloProfesional){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");							
			$this->load->model('DesarrolloProfesional_Modelo');					
			$dato['desarrolloProfesional'] = $this->DesarrolloProfesional_Modelo->getDesarrolloProfesional($IdDesarrolloProfesional, $IdEmpresaSesion);    
			$dato["titulo"] = "Editar Desarrollo Profesional";   
			$dato["accion"] = "Editar";	
			$dato["contenedor"] = "desarrolloProfesional/desarrolloProfesional_new_edit";
			$this->load->view('plantilla', $dato);			
		}else{
			redirect('inicio');
		}
	}
	public function guardarDesarrolloProfesional(){
		$this->form_validation->set_rules('txtNombreDesarrolloProfesional','Nombre del Desarrollo Profesional','trim|required'); 		
		$this->form_validation->set_rules('txtDescripcion','Descripción','trim|required');
		$accion = $_POST['accion'];
		$id = $_POST['id'];	
		if ($this->form_validation->run() == false) {
			if ($accion == "Editar") {
				$this->editarDesarrolloProfesional($id);			
			}else{
				$this->nuevoDesarrolloProfesional();
			}
		}else{
			$this->load->model('DesarrolloProfesional_Modelo');			
			$tiempo = time();
			$txtNombreDesarrolloProfesional = $_POST["txtNombreDesarrolloProfesional"];
			$txtDescripcion = $_POST["txtDescripcion"];						
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($_POST["accion"] == "Editar"){
				$updateDesarrolloProfesional = array(					
					'NombreDesarrolloProfesional' => $txtNombreDesarrolloProfesional,
					'Descripcion' => $txtDescripcion,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->DesarrolloProfesional_Modelo->updateDesarrolloProfesional($id, $updateDesarrolloProfesional, $IdEmpresaSesion)){
					$mensaje = "El Desarrollo Profesional se actualizó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarDesarrolloProfesional($id);			
				}else{
					$mensaje = "El Desarrollo Profesional no se ha actualizado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarDesarrolloProfesional($id);			
				}
			}else{
				$insertDesarrolloProfesional = array(
					'NombreDesarrolloProfesional' => $txtNombreDesarrolloProfesional,
					'Descripcion' => $txtDescripcion,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->DesarrolloProfesional_Modelo->insertDesarrolloProfesional($insertDesarrolloProfesional)){
					$mensaje = "El Desarrollo Profesional se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoDesarrolloProfesional();				
				}else{
					$mensaje = "El Desarrollo Profesional no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoDesarrolloProfesional();				
				}
			}
		}
	}
	public function eliminarDesarrolloProfesional(){
		$this->load->model('DesarrolloProfesional_Modelo'); 		          	
		$DesarrolloProfesional 		= json_decode($this->input->post('MiDesarrollo'));
		$id          = base64_decode($DesarrolloProfesional->Id);
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->DesarrolloProfesional_Modelo->deleteDesarrolloProfesional($id, $IdEmpresaSesion); 
	}
	/**
	 * Desarrollo Profesional del Empleado
	 */
	public function desarrolloEmpleado(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/publicoInterno" => "Público Interno",
			                     $inicioURL."desarrolloProfesional/desarrolloEmpleado" => "Desarrollo Profesional"			                     
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('DesarrolloProfesional_Modelo');
				$dato['admin'] = 1;
				$dato['desarrolloProfesionalEmpleado'] = $this->DesarrolloProfesional_Modelo->getListDesarrolloProfesionalEmpleado($IdEmpresaSesion);			
				$dato["contenedor"] = "desarrolloProfesional/desarrolloProfesionalEmpleado_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "desarrolloEmpleado", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('DesarrolloProfesional_Modelo');
						$dato['desarrolloProfesionalEmpleado'] = $this->DesarrolloProfesional_Modelo->getListDesarrolloProfesionalEmpleado($IdEmpresaSesion);			
						$dato["contenedor"] = "desarrolloProfesional/desarrolloProfesionalEmpleado_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "desarrolloProfesional/desarrolloProfesionalEmpleado_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "desarrolloProfesional/desarrolloProfesionalEmpleado_view";
					$this->load->view('plantilla', $dato);
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function nuevoDesarrolloProfesionalEmpleado(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Empleado_Modelo');
				$this->load->model('DesarrolloProfesional_Modelo');
				$dato['empleados'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion);			
				$dato["contenedor"] = "desarrolloProfesional/desarrolloProfesionalEmpleado_new_edit";
				$dato["titulo"] = "Nuevo Empleado y Desarrollo Profesional";
				$dato["accion"] = "Nuevo";			
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "desarrolloEmpleado", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('Empleado_Modelo');
						$this->load->model('DesarrolloProfesional_Modelo');
						$dato['empleados'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion);			
						$dato["contenedor"] = "desarrolloProfesional/desarrolloProfesionalEmpleado_new_edit";
						$dato["titulo"] = "Nuevo Empleado y Desarrollo Profesional";
						$dato["accion"] = "Nuevo";
						$this->load->view('plantilla', $dato);
					}else{
						$this->desarrolloEmpleado();
					}
				}else{
					$this->desarrolloEmpleado();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function editarDesarrolloProfesionalEmpleado($IdDesarrolloProfesional){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('DesarrolloProfesional_Modelo');	
				$this->load->model('Empleado_Modelo');
				$dato['empleados'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion);
				$dato['desarrolloProfesionalEmpleado'] = $this->DesarrolloProfesional_Modelo->getDesarrolloProfesionalEmpleado($IdDesarrolloProfesional, $IdEmpresaSesion);
				$dato["titulo"] = "Editar Empleado y Desarrollo Profesional";   
				$dato["accion"] = "Editar";	
				$dato["contenedor"] = "desarrolloProfesional/desarrolloProfesionalEmpleado_new_edit";
				$this->load->view('plantilla', $dato);	
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "desarrolloEmpleado", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('DesarrolloProfesional_Modelo');	
						$this->load->model('Empleado_Modelo');
						$dato['empleados'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion);			
						$dato['desarrolloProfesionalEmpleado'] = $this->DesarrolloProfesional_Modelo->getDesarrolloProfesionalEmpleado($IdDesarrolloProfesional, $IdEmpresaSesion);
						$dato["titulo"] = "Editar Empleado y Desarrollo Profesional";   
						$dato["accion"] = "Editar";	
						$dato["contenedor"] = "desarrolloProfesional/desarrolloProfesionalEmpleado_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->desarrolloEmpleado();
					}
				}else{
					$this->desarrolloEmpleado();
				}
 			}					
		}else{
			redirect('inicio');
		}
	}
	public function guardarDesarrolloProfesionalEmpleado(){
		$this->form_validation->set_rules('txtHoraMes','Horas por Mes','trim|integer|required'); 		
		$this->form_validation->set_rules('txtFechaMes','Fecha del Mes','trim|required');
		$accion = $_POST['accion'];
		$id = $_POST['id'];		
		if ($this->form_validation->run() == false) {
			if ($accion == "Editar") {
				$this->editarDesarrolloProfesionalEmpleado($id);			
			}else{
				$this->nuevoDesarrolloProfesionalEmpleado();
			}
		}else{
			$this->load->model('DesarrolloProfesional_Modelo');
			//PENDIENTE: Recibir y obtener el IdAcuerdo para la actualización
			$tiempo = time();
			$selectEmpleado = $_POST["selectEmpleado"];
			$txtDesarrolloProfesional = $_POST["txtDesarrolloProfesional"];
			$txtHoraMes = $_POST["txtHoraMes"];
			$txtFechaMes = $_POST["txtFechaMes"];
			$txtDescripcion = $_POST["txtDescripcion"];
			$txtFechaMesSistema = date("Y-m-d H:i:s", $tiempo);						
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($_POST["accion"] == "Editar"){
				$updateDesarrolloProfesional = array(					
					'CiEmpleado' => $selectEmpleado,
					'DesarrolloProfesional' => $txtDesarrolloProfesional,
					'HorasMes' => $txtHoraMes,
					'FechaPertenece' => $txtFechaMes,
					'Descripcion' => $txtDescripcion,
					'FechaSistema' => $txtFechaMesSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->DesarrolloProfesional_Modelo->updateDesarrolloProfesionalEmpleado($id, $updateDesarrolloProfesional, $IdEmpresaSesion)){
					$mensaje = "El Empleado y Desarrollo Profesional se actualizó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarDesarrolloProfesionalEmpleado($id);				
				}else{
					$mensaje = "El Empleado y Desarrollo Profesional no se ha actualizado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarDesarrolloProfesionalEmpleado($id);				
				}
			}else{
				$insertDesarrolloProfesionalEmpleado = array(
					'CiEmpleado' => $selectEmpleado,
					'DesarrolloProfesional' => $txtDesarrolloProfesional,
					'HorasMes' => $txtHoraMes,
					'FechaPertenece' => $txtFechaMes,
					'Descripcion' => $txtDescripcion,
					'FechaSistema' => $txtFechaMesSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->DesarrolloProfesional_Modelo->insertDesarrolloProfesionalEmpleado($insertDesarrolloProfesionalEmpleado)){
					$mensaje = "El Empleado y Desarrollo Profesional se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoDesarrolloProfesionalEmpleado();				
				}else{
					$mensaje = "El Empleado y Desarrollo Profesional no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoDesarrolloProfesionalEmpleado();				
				}
			}
		}
	}
	public function eliminarDesarrolloProfesionalEmpleado(){
		$this->load->model('DesarrolloProfesional_Modelo'); 		          	
		$id = $_POST["IdDesarrolloP"];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->DesarrolloProfesional_Modelo->deleteDesarrolloProfesionalEmpleado($id, $IdEmpresaSesion); 
	}
	
}

?>