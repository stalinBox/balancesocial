<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class empresa extends CI_Controller{

	function __construct(){
		parent::__construct();		
	}
	function index(){
		if($this->session->userdata("IdEmpresaSesion")){
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa" => "Empresa"
			                    );
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "empresa/modulosEmpresa";
			$this->load->view("plantilla", $dato);

		}else{
			redirect('inicio');
		}		
	}

	/**
	* @desc - genera un token para cada usuario registrado
	* @return token
	*/
	private function token(){
        return sha1(uniqid(rand(),true));
    }

	public function verEmpresa(){
		if($this->session->userdata("IdEmpresaSesion")){
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa" => "Empresa",
			                     $inicioURL."empresa/verEmpresa" => "Información"
			                    );

			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$this->load->model('Empresa_Modelo');
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "empresa/empresa_view";
			$dato['empresa'] = $this->Empresa_Modelo->getEmpresa($IdEmpresaSesion);  
			$this->load->view("plantilla", $dato);
		}else{
			redirect('inicio');
		}
	}
	/*
	Procedimientos de prueba para el ingreso de datos mediante los formularios
	 */
	public function nuevaEmpresa(){		
		$dato["titulo"] = "Nueva Empresa";
		$dato["accion"] = "Nuevo";
		$dato["contenedor"] = "empresa/empresa_new_edit";
		$this->load->view('plantilla', $dato);	
	}
	
	public function editarEmpresa(){		
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa" => "Empresa",
			                     $inicioURL."empresa/verEmpresa" => "Información"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Empresa_Modelo');
				$dato["contenedor"] = "empresa/empresa_new_edit";
				$dato['empresa'] = $this->Empresa_Modelo->getEmpresa($IdEmpresaSesion);  
				$dato["titulo"] = "Editar Empresa";   
				$dato["admin"] = 1;
				$dato["accion"] = "Editar";
				$this->load->view("plantilla", $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "empresa", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1 OR $dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('Empresa_Modelo');
						$dato['empresa'] = $this->Empresa_Modelo->getEmpresa($IdEmpresaSesion);
						$dato["titulo"] = "Editar Empresa";
						$dato["accion"] = "Editar";
						$dato["contenedor"] = "empresa/empresa_new_edit";
						$this->load->view("plantilla", $dato);
					}else{
					$this->index();						
					}
				}else{
					$this->index();
				}

 			}			
		}else{
			redirect('inicio');
		}
	}

	public function guardarEmpresa(){

		//Validar campos	
		$this->form_validation->set_rules('txtEmpresa','Nombre de la Empresa','trim|required'); 
		$this->form_validation->set_rules('txtRUC','RUC','trim|required');
		$this->form_validation->set_rules('txtContrasenia','Contraseña','trim|required');
		$this->form_validation->set_rules('txtContrasenia2','Contraseña','trim|required');
		$this->form_validation->set_rules('txtCapital','Capital','trim|required');
		$this->form_validation->set_rules('txtFechaRegistro','Fecha de Registro','trim|required');
		$this->form_validation->set_rules('txtCantFundadores','Cantidad de Fundadores','trim|integer|required');
		$this->form_validation->set_rules('txtDireccion','Dirección','trim|required');
		$this->form_validation->set_rules('txtTelefono','Teléfono','trim|integer|required');
		$this->form_validation->set_rules('txtMailAdmin', 'Correo Administrador', 'required|trim|min_length[2]|max_length[50]|is_unique[empresa.Mail]|valid_email'
		);

		if($this->form_validation->run() == false){	//Volver a index de login
			if ($_POST["accion"] == "Editar") {
				$this->editarEmpresa();				
			}else{
				$this->nuevaEmpresa();
			}
		}else{
			if ($_POST["accion"] == "Editar") {
				$IdEmpresa = $_POST["IdEmpresa"];			 	
			}else{
				$IdEmpresa = 0;
			}
			$txtEmpresa = $_POST["txtEmpresa"];
			$txtRUC = $_POST["txtRUC"];
			$txtContrasenia = $_POST["txtContrasenia"];
			$txtContrasenia2 = $_POST["txtContrasenia2"];
			$txtMailAdmin = $_POST["txtMailAdmin"];
			$txtCapital = $_POST["txtCapital"];
			$txtFechaRegistro = $_POST["txtFechaRegistro"];
			$txtCantFundadores = $_POST["txtCantFundadores"];
			$txtDireccion = $_POST["txtDireccion"];
			$txtPaginaWeb = $_POST["txtPaginaWeb"];
			$txtTelefono = $_POST["txtTelefono"];
			$txtHistoria = $_POST["txtAreaHistoria"];
			$txtMision = $_POST["txtAreaMision"];
			$txtVision = $_POST["txtAreaVision"];


			if ($txtContrasenia != $txtContrasenia2) {
				$mensaje = "Confirmación de Contraseña es Incorrecta";
				$this->session->set_flashdata("mensaje", $mensaje);
				$this->nuevaEmpresa();
			}else{
				$this->load->model('Empresa_Modelo');						
				if ($IdEmpresa == 0 ) {
					$registroEmpresa = array(
						'NombreEmpresa' => $txtEmpresa,
						'RucEmpresa' => $txtRUC,
						'ContraseniaEmpresa' => $txtContrasenia,
						'Mail' => $txtMailAdmin,
						'CapitalEmpresa' => $txtCapital,
						'FechaRegistroEmpresa' => $txtFechaRegistro,
						'CantidadFundadoresEmpresa' => $txtCantFundadores,
						'DireccionEmpresa' => $txtDireccion,
						'PaginaWeb' => $txtPaginaWeb,
						'TelefonoEmpresa' => $txtTelefono,
						'HistoriaEmpresa' => $txtHistoria,
						'MisionEmpresa' => $txtMision,
						'VisionEmpresa' => $txtVision,
						'token' =>	$this->token(),
						);
					$IdInsertado = $this->Empresa_Modelo->insertEmpresa($registroEmpresa);
					//Variable temporal para mostrar al usuarios de éxito en el update
					$mensaje = "La Empresa has sido registrada éxito :$IdInsertado";
					$this->session->set_flashdata("mensaje", $mensaje);
					$this->editarEmpresa();
				}else{ 
					$updateEmpresa = array(
						'NombreEmpresa' => $txtEmpresa,
						'RucEmpresa' => $txtRUC,
						'Mail' => $txtMailAdmin,
						'CapitalEmpresa' => $txtCapital,
						'FechaRegistroEmpresa' => $txtFechaRegistro,
						'CantidadFundadoresEmpresa' => $txtCantFundadores,
						'DireccionEmpresa' => $txtDireccion,
						'PaginaWeb' => $txtPaginaWeb,
						'TelefonoEmpresa' => $txtTelefono,
						'HistoriaEmpresa' => $txtHistoria,
						'MisionEmpresa' => $txtMision,
						'VisionEmpresa' => $txtVision
						);
					$this->Empresa_Modelo->updateEmpresa($updateEmpresa, $IdEmpresa);
						//Variable temporal para mostrar al usuarios de éxito en el update
					$mensaje = "Los datos han sido actualizados con éxito";
					$this->session->set_flashdata("mensaje", $mensaje);
					$this->editarEmpresa();
				}
			}
		}	
	}
	/**
	 * Funciones de Objetivos de la Empresa
	 */
	public function objetivos(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa" => "Empresa",
			                     $inicioURL."empresa/objetivos" => "Objetivos"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('ObjetivosEmpresa_Modelo');
				$dato['objetivosEmpresa'] = $this->ObjetivosEmpresa_Modelo->getListObjetivosEmpresa($IdEmpresaSesion);
				$dato['admin'] = 1;
				$dato["contenedor"] = "empresa/objetivosEmpresa_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "objetivos", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('ObjetivosEmpresa_Modelo');
						$dato['objetivosEmpresa'] = $this->ObjetivosEmpresa_Modelo->getListObjetivosEmpresa($IdEmpresaSesion);
						$dato["contenedor"] = "empresa/objetivosEmpresa_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "empresa/objetivosEmpresa_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "empresa/objetivosEmpresa_view";
					$this->load->view('plantilla', $dato);
				}
 			}			
			
		}else{
			redirect('inicio');
		}
	}
	/**
	 * [nuevoObjetivo description]
	 * @return [type] [description]
 	*/
	public function nuevoObjetivo(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$dato["titulo"] = "Nuevo Objetivo";
				$dato["accion"] = "Nuevo";
				$dato["contenedor"] = "empresa/objetivosEmpresa_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "objetivos", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$dato["titulo"] = "Nuevo Objetivo";
						$dato["accion"] = "Nuevo";
						$dato["contenedor"] = "empresa/objetivosEmpresa_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->objetivos();
					}
				}else{
					$this->objetivos();
				}
 			}
			
		}else{
			redirect('inicio');
		}
	}
	public function editarObjetivo($IdObjetivo){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('ObjetivosEmpresa_Modelo');
				$dato['objetivoEmpresa'] = $this->ObjetivosEmpresa_Modelo->getObjetivosEmpresa($IdObjetivo);			
				$dato["titulo"] = "Editar Objetivo";   
				$dato["accion"] = "Editar";
				$dato["contenedor"] = "empresa/objetivosEmpresa_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "objetivos", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('ObjetivosEmpresa_Modelo');
						$dato['objetivoEmpresa'] = $this->ObjetivosEmpresa_Modelo->getObjetivosEmpresa($IdObjetivo);			
						$dato["titulo"] = "Editar Objetivo";   
						$dato["accion"] = "Editar";
						$dato["contenedor"] = "empresa/objetivosEmpresa_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->objetivos();
					}
				}else{
					$this->objetivos();
				}
 			}
		}else{
			redirect('inicio');
		}
	}
	public function guardarObjetivo(){
		$this->form_validation->set_rules('txtObjetivo','Objetivo','trim|required'); 
		$accion = $_POST['accion'];
		$id = $_POST['id'];
		if ($this->form_validation->run() == false) {			
			if ($accion == "Nuevo") {
				$this->nuevoObjetivo();			
			}else{
				$this->editarObjetivo($id);					
			}
		}else{
			$this->load->model('ObjetivosEmpresa_Modelo');
			$txtObjetivo = $_POST["txtObjetivo"];			
			$txtDescripcion = $_POST["txtDescripcion"];
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($accion == "Nuevo") {
				$insertObjetivo = array('ObjetivoObjetivosEmpresa' => $txtObjetivo,
					'DescripcionObjetivosEmpresa' => $txtDescripcion, 
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->ObjetivosEmpresa_Modelo->insertObjetivosEmpresa($insertObjetivo)){
					$mensaje = "El Objetivo se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoObjetivo();				
				}else{
					$mensaje = "El Objetivo no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoObjetivo();
				}							
			}else{
				$updateObjetivo = array('ObjetivoObjetivosEmpresa' => $txtObjetivo,
					'DescripcionObjetivosEmpresa' => $txtDescripcion, 
					'IdEmpresa' => $IdEmpresaSesion
					);				
				if($this->ObjetivosEmpresa_Modelo->updateObjetivosEmpresa($id, $updateObjetivo, $IdEmpresaSesion)){
					$mensaje = "El Objetivo ha sido modificado con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarObjetivo($id);				
				}else{
					$mensaje = "El Objetivo no se ha modificado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarObjetivo($id);				
				}

			}

		}
	}
	public function eliminarObjetivo(){
		$this->load->model('ObjetivosEmpresa_Modelo'); 		
		$IdObjEmp = $_POST["idObjetivoEmp"];          	
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$result = $this->ObjetivosEmpresa_Modelo->deleteObjetivosEmpresa($IdObjEmp, $IdEmpresaSesion); 
		if($result){
			echo "Success";
		}else{
			echo "Error";
		}
	}

	/**
	 * Funciones para UsuarioEmpresa
	 */
	public function usuarios(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");			
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa/administrador" => "Administrador",
			                     $inicioURL."empresa/usuarios" => "Usuarios"
			                    );
			if ($tipoUsuario == "Admin") {
				$this->load->model('UsuarioEmpresa_Modelo');
				$dato['usuariosEmpresa'] = $this->UsuarioEmpresa_Modelo->getListUsuario($IdEmpresaSesion);
				$dato['admin'] = 1;

			}else{
				$perfilSesion = $this->session->userdata("perfilSesion");
				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				//$sql = "SELECT * FROM Permiso_Rol WHERE IdPerfil = '".$perfilSesion."' AND IdTabla = (SELECT IdTabla FROM TablasFunciones WHERE ObjetoControlador = 'usuarios' AND IdEmpresa = '".$IdEmpresaSesion."' LIMIT 1);";
				//$dato["permisos"] = $this->db->query($sql)->result();
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "usuarios", $IdEmpresaSesion);
				if (empty($dato["permisos"])) {
					echo ", Ningún permiso encontrado";
				}else{
					$this->load->model('UsuarioEmpresa_Modelo');
					if ($dato['permisos'][0]->Ver == 1) {
						$dato['usuariosEmpresa'] = $this->UsuarioEmpresa_Modelo->getListUsuario($IdEmpresaSesion);	
					}
				}				
			}
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "empresa/usuariosEmpresa_view";
			$this->load->view('plantilla', $dato);
		}else{
			redirect('inicio');
		}
	}
	/**
	 * [nuevoUsuarioEmpresa description]
	 * @return [type] [description]
	 */
	public function nuevoUsuarioEmpresa(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
			$this->load->model('Perfil_Modelo');
			$dato["perfiles"] = $this->Perfil_Modelo->getListPerfil($IdEmpresaSesion);
			if ($tipoUsuario == "Admin") {
				//$this->load->model('UsuarioEmpresa_Modelo');
				//$dato['usuariosEmpresa'] = $this->UsuarioEmpresa_Modelo->getListUsuario($IdEmpresaSesion);
				//Enviar los perfiles que se va a anidar al Usuario de la Empresa				
				if (!empty($dato["perfiles"])) {
					$dato["titulo"] = "Nuevo Usuario";
					$dato["accion"] = "Nuevo";
					$dato["contenedor"] = "empresa/usuariosEmpresa_new_edit";
					$this->load->view('plantilla', $dato);
				}else{
					$mensaje = "Debe existir un Perfil para crear los Usuarios";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->usuarios();
				}
			}else{
				$perfilSesion = $this->session->userdata("perfilSesion");
				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				//$sql = "SELECT * FROM Permiso_Rol WHERE IdPerfil = '".$perfilSesion."' AND IdTabla = (SELECT IdTabla FROM TablasFunciones WHERE ObjetoControlador = 'usuarios' AND IdEmpresa = '".$IdEmpresaSesion."' LIMIT 1);";
				//$dato["permisos"] = $this->db->query($sql)->result();
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "usuarios", $IdEmpresaSesion);
				if (empty($dato["permisos"])) {
					$this->usuarios();
				}else{
					if ($dato["permisos"][0]->Agregar == 1) {
						$dato["titulo"] = "Nuevo Usuario";
						$dato["accion"] = "Nuevo";
						$dato["contenedor"] = "empresa/usuariosEmpresa_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->usuarios();
					}
				}				
			}
			
		}else{
			redirect('inicio');
		}
	}
	public function editarUsuario($IdEditar){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
			$this->load->model('Perfil_Modelo');
			$dato["perfiles"] = $this->Perfil_Modelo->getListPerfil($IdEmpresaSesion);	
			if ($tipoUsuario == "Admin") {
				$this->load->model('UsuarioEmpresa_Modelo');
				$dato['usuarioEmpresa'] = $this->UsuarioEmpresa_Modelo->getOneEditUsuario($IdEditar, $IdEmpresaSesion);					
				$dato["titulo"] = "Editar Usuario";
				$dato["accion"] = "Editar";
				$dato["contenedor"] = "empresa/usuariosEmpresa_new_edit";
				$this->load->view('plantilla', $dato);
			}else{
				$perfilSesion = $this->session->userdata("perfilSesion");
				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				//$sql = "SELECT * FROM Permiso_Rol WHERE IdPerfil = '".$perfilSesion."' AND IdTabla = (SELECT IdTabla FROM TablasFunciones WHERE ObjetoControlador = 'usuarios' AND IdEmpresa = '".$IdEmpresaSesion."' LIMIT 1);";
				//$dato["permisos"] = $this->db->query($sql)->result();
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "usuarios", $IdEmpresaSesion);
				if (empty($dato["permisos"])) {
					$this->usuarios();
				}else{
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('UsuarioEmpresa_Modelo');
						$dato['usuarioEmpresa'] = $this->UsuarioEmpresa_Modelo->getOneEditUsuario($IdEditar, $IdEmpresaSesion);
						$this->load->model('Perfil_Modelo');
						$dato["perfiles"] = $this->Perfil_Modelo->getListPerfil($IdEmpresaSesion);		
						$dato["titulo"] = "Editar Usuario";
						$dato["accion"] = "Editar";
						$dato["contenedor"] = "empresa/usuariosEmpresa_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->usuarios();
					}
				}
				
			}
		}else{
			redirect('inicio');
		}
	}
	public function guardarUsuarioEmpresa(){
		$this->form_validation->set_rules('txtNombre','Nombre','trim|required'); 
		$this->form_validation->set_rules('txtApellidos','Apellidos','trim|required');
		$this->form_validation->set_rules('txtCorreo','Correo','trim|required|valid_email');
		$this->form_validation->set_rules('txtContrasenia','Contraseña','trim|required');
		$this->form_validation->set_rules('txtDireccion','Dirección','trim|required');
		$this->form_validation->set_rules('txtTelefono','Teléfono','trim|integer|required');
		$this->form_validation->set_rules('txtCelular','Celular','trim|required');
		//$this->form_validation->set_rules('txtPerfil','Perfil','trim|integer|required');
		$accion = $_POST['accion'];
		$id = $_POST['id'];
		
		if($this->form_validation->run() == false){
			if ($accion == "Nuevo") {
				$this->nuevoUsuarioEmpresa();				
			}else{
				$this->editarUsuario($id);					
			}
		}else{			
			$this->load->model('UsuarioEmpresa_Modelo');
			$txtNombre = $_POST["txtNombre"];
			$txtApellidos = $_POST["txtApellidos"];
			$txtCorreo = $_POST["txtCorreo"];
			$txtContrasenia = $_POST["txtContrasenia"];
			$txtDireccion = $_POST["txtDireccion"];
			$txtTelefono = $_POST["txtTelefono"];
			$txtCelular = $_POST["txtCelular"];
			$selectPerfil = $_POST["selectPerfil"];
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($accion=="Nuevo") {
				$existeMail = $this->UsuarioEmpresa_Modelo->existsMail($txtCorreo);
				if ($existeMail == true) {
					$mensaje = "Correo ya existe para otro Usuario";
					$this->session->set_flashdata('mensaje',$mensaje);	
					$this->nuevoUsuarioEmpresa();
				}else{
					$insertUsuarioEmpresa = array(
						'NombreUsuario' => $txtNombre,
						'ApellidosUsuario' => $txtApellidos, 
						'Mail' => $txtCorreo, 
						'ContraseniaUsuario' => $txtContrasenia, 
						'DireccionUsuario' => $txtDireccion, 
						'TelefonoUsuario' => $txtTelefono, 
						'CelularUsuario' => $txtCelular, 
						'PerfilRolUsuario' => $selectPerfil, 
						'IdEmpresa' => $IdEmpresaSesion,
						'token'=>$this->token()
						);
					if($this->UsuarioEmpresa_Modelo->insertUsuario($insertUsuarioEmpresa)){
						$mensaje = "El usuario ha sido creado con éxito";
						$this->session->set_flashdata('mensaje',$mensaje);
						$this->nuevoUsuarioEmpresa();				
					}else{
						$mensaje = "El usuario no se ha registrado, verfique los datos ingresados";
						$this->session->set_flashdata('mensaje',$mensaje);				
						$this->nuevoUsuarioEmpresa();
					}
				}
			}else{
				$id = $_POST['id'];
				$updateUsuarioEmpresa = array(
					'NombreUsuario' => $txtNombre,
					'ApellidosUsuario' => $txtApellidos, 
					'Mail' => $txtCorreo, 
					'ContraseniaUsuario' => $txtContrasenia, 
					'DireccionUsuario' => $txtDireccion, 
					'TelefonoUsuario' => $txtTelefono, 
					'CelularUsuario' => $txtCelular, 
					'PerfilRolUsuario' => $selectPerfil, 
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->UsuarioEmpresa_Modelo->updateUsuario($id, $updateUsuarioEmpresa, $IdEmpresaSesion)){
					$mensaje = "El usuario ha sido modificado con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarUsuario($id);				
				}else{
					$mensaje = "El usuario no se ha modificado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);				
					$this->editarUsuario($id);	
				}
			}			

		}
	}
	public function eliminarUsuarioEmpresa(){
		$this->load->model('UsuarioEmpresa_Modelo'); 		          	
		$idUserEm = $_POST['idUserEmp'];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		 $this->UsuarioEmpresa_Modelo->deleteUsuario($idUserEm, $IdEmpresaSesion); 
	}
	/**
	 * Funciones de Logros de la Empresa
	 */
	public function logros(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa" => "Empresa",
			                     $inicioURL."empresa/logros" => "Logros"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('LogrosEmpresa_Modelo');
				$dato['logrosEmpresa'] = $this->LogrosEmpresa_Modelo->getListLogrosEmpresa($IdEmpresaSesion);
				$dato["admin"] = 1;
				$dato["contenedor"] = "empresa/logrosEmpresa_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "logros", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('LogrosEmpresa_Modelo');
						$dato['logrosEmpresa'] = $this->LogrosEmpresa_Modelo->getListLogrosEmpresa($IdEmpresaSesion);
						$dato["contenedor"] = "empresa/logrosEmpresa_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "empresa/logrosEmpresa_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "empresa/logrosEmpresa_view";
					$this->load->view('plantilla', $dato);
				}
 			}
		}else{
			redirect('inicio');
		}
	}
	public function nuevoLogro(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$dato["titulo"] = "Nuevo Logro";
				$dato["accion"] = "Nuevo";
				$dato["contenedor"] = "empresa/logrosEmpresa_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "logros", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$dato["titulo"] = "Nuevo Logro";
						$dato["accion"] = "Nuevo";
						$dato["contenedor"] = "empresa/logrosEmpresa_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->logros();
					}
				}else{
					$this->logros();
				}
 			}
		}else{
			redirect('inicio');
		}
	}
	
	public function editarLogro($IdLogro){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('LogrosEmpresa_Modelo');
				$dato['logroEmpresa'] = $this->LogrosEmpresa_Modelo->getLogrosEmpresa($IdLogro, $IdEmpresaSesion);			
				$dato["titulo"] = "Editar Logro";   
				$dato["accion"] = "Editar";
				$dato["contenedor"] = "empresa/logrosEmpresa_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "logros", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('LogrosEmpresa_Modelo');
						$dato['logroEmpresa'] = $this->LogrosEmpresa_Modelo->getLogrosEmpresa($IdLogro, $IdEmpresaSesion);			
						$dato["titulo"] = "Editar Logro";   
						$dato["accion"] = "Editar";
						$dato["contenedor"] = "empresa/logrosEmpresa_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->logros();
					}
				}else{
					$this->logros();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function guardarLogro(){
		$this->form_validation->set_rules('txtLogro','Logro','trim|required'); 
		$this->form_validation->set_rules('txtFechaLogro','Fecha del Logro Obtenido','trim|required'); 
		$this->form_validation->set_rules('txtDescripcion','Descripción','trim|required');
		$accion = $_POST['accion'];
		$id = $_POST['id']; 
		if ($this->form_validation->run() == false) {			
			if ($accion == "Nuevo") {
				$this->nuevoLogro();		
			}else{
				$this->editarLogro($id);					
			}
		}else{
			$this->load->model('LogrosEmpresa_Modelo');
			$tiempo = time();
			$txtLogro = $_POST["txtLogro"];
			$txtFechaLogro = $_POST["txtFechaLogro"];
			$txtDescripcion = $_POST["txtDescripcion"];
			$txtFechaSistema = date("Y-m-d H:i:s");
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($accion == "Nuevo") {
				$insertLogro = array(
					'LogroLogrosEmpresa' => $txtLogro, 
					'FechaLogrosEmpresa' => $txtFechaLogro, 
					'DetalleLogrosEmpresa' => $txtDescripcion, 
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->LogrosEmpresa_Modelo->insertLogrosEmpresa($insertLogro)){
					$mensaje = "El Logro se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoLogro();				
				}else{
					$mensaje = "El Logro no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoLogro();				
				}
			}else{
				$updateLogro = array(
					'LogroLogrosEmpresa' => $txtLogro, 
					'FechaLogrosEmpresa' => $txtFechaLogro, 
					'DetalleLogrosEmpresa' => $txtDescripcion,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->LogrosEmpresa_Modelo->updateLogrosEmpresa($id, $updateLogro, $IdEmpresaSesion)){
					$mensaje = "El Logro ha sido modificado con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarLogro($id);				
				}else{
					$mensaje = "El Logro no se ha modificado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarLogro($id);				
				}

			}
		}
	}

	// ELIMINAR LOGRO DE LA TABLA LOGROSEMPRESA
	public function eliminarLogro(){
		$this->load->model('LogrosEmpresa_Modelo');	          	
		$idLogroEmp = $_POST['idLogroEmpresa'];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$result = $this->LogrosEmpresa_Modelo->deleteLogrosEmpresa($idLogroEmp, $IdEmpresaSesion); 
		if($result){
        	echo "Success";
    	} else{
        	echo "Error";
    	}
	}

	/**
	 * Funciones de Principios de la Empresa
	 */
	public function principios(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa" => "Empresa",
			                     $inicioURL."empresa/principios" => "Principios"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('PrincipiosEmpresa_Modelo');
				$dato['principiosEmpresa'] = $this->PrincipiosEmpresa_Modelo->getListPrincipiosEmpresa($IdEmpresaSesion);				
				$dato['admin'] = 1;
				$dato["contenedor"] = "empresa/principiosEmpresa_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "principios", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('PrincipiosEmpresa_Modelo');
						$dato['principiosEmpresa'] = $this->PrincipiosEmpresa_Modelo->getListPrincipiosEmpresa($IdEmpresaSesion);				
						$dato["contenedor"] = "empresa/principiosEmpresa_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "empresa/principiosEmpresa_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "empresa/principiosEmpresa_view";
					$this->load->view('plantilla', $dato);
				}
 			}

			
		}else{
			redirect('inicio');
		}
	}	
	public function editarPrincipio($IdPrincipio){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('PrincipiosEmpresa_Modelo');
				$dato['principioEmpresa'] = $this->PrincipiosEmpresa_Modelo->getPrincipiosEmpresa($IdPrincipio);			
				$dato["titulo"] = "Editar Principio";   
				$dato["accion"] = "Editar";
				$dato["contenedor"] = "empresa/principiosEmpresa_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "principios", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('PrincipiosEmpresa_Modelo');
						$dato['principioEmpresa'] = $this->PrincipiosEmpresa_Modelo->getPrincipiosEmpresa($IdPrincipio);			
						$dato["titulo"] = "Editar Principio";   
						$dato["accion"] = "Editar";
						$dato["contenedor"] = "empresa/principiosEmpresa_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->principios();
					}
				}else{
					$this->principios();
				}
 			}
			
		}else{
			redirect('inicio');
		}
	}
	public function nuevoPrincipio(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('PrincipiosEmpresa_Modelo');
				$dato['principiosEmpresa'] = $this->PrincipiosEmpresa_Modelo->getListPrincipiosEmpresa($IdEmpresaSesion);
				$dato["titulo"] = "Nuevo Principio";
				$dato["accion"] = "Nuevo";
				$dato["contenedor"] = "empresa/principiosEmpresa_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "principios", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('PrincipiosEmpresa_Modelo');
						$dato['principiosEmpresa'] = $this->PrincipiosEmpresa_Modelo->getListPrincipiosEmpresa($IdEmpresaSesion);
						$dato["titulo"] = "Nuevo Principio";
						$dato["accion"] = "Nuevo";
						$dato["contenedor"] = "empresa/principiosEmpresa_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->principios();
					}
				}else{
					$this->principios();
				}
 			}

			
		}else{
			redirect('inicio');
		}
	}
	public function guardarPrincipio(){
		$this->form_validation->set_rules('txtPrincipio','Principio','trim|required'); 
		$this->form_validation->set_rules('txtDescripcion','Descripción','trim|required');
		$accion = $_POST['accion'];
		$id = $_POST['id']; 
		if ($this->form_validation->run() == false) {
			if ($accion == "Nuevo") {
				$this->nuevoPrincipio();		
			}else{
				$this->editarPrincipio($id);					
			}
		}else{
			$this->load->model('PrincipiosEmpresa_Modelo');
			$txtPrincipio = $_POST["txtPrincipio"];
			$txtDescripcion = $_POST["txtDescripcion"];
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($_POST["accion"] == "Nuevo") {
				$insertPrincipiosEmpresa = array(
					'PrincipioPrincipiosEmpresa' => $txtPrincipio, 
					'DescripcionPrincipiosEmpresa' => $txtDescripcion,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->PrincipiosEmpresa_Modelo->insertPrincipiosEmpresa($insertPrincipiosEmpresa)){
					$mensaje = "El Principio se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoPrincipio();				
				}else{
					$mensaje = "El Principio no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoPrincipio();				
				}
			}else{
				$updatePrincipiosEmpresa = array(
					'PrincipioPrincipiosEmpresa' => $txtPrincipio, 
					'DescripcionPrincipiosEmpresa' => $txtDescripcion,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->PrincipiosEmpresa_Modelo->updatePrincipiosEmpresa($id, $updatePrincipiosEmpresa, $IdEmpresaSesion)){
					$mensaje = "El Principio ha sido modificado con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarPrincipio($id);				
				}else{
					$mensaje = "El Principio no se ha modificado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarPrincipio($id);				
				}
				
			}
		}
	}
	public function eliminarPrincipio(){
		$this->load->model('PrincipiosEmpresa_Modelo'); 		          	

		$IdPrincipio = $_POST["idPrincipio"];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$result = $this->PrincipiosEmpresa_Modelo->deletePrincipiosEmpresa($IdPrincipio, $IdEmpresaSesion); 
		if($result){
			echo "Success";
		}else{
			echo "Error";
		}
	}
	/**
	 * Funciones para los Productos de la Empresa
	 */
	public function productos(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa" => "Empresa",
			                     $inicioURL."empresa/productos" => "Productos"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('ProductosEmpresa_Modelo');
				$dato['productosEmpresa'] = $this->ProductosEmpresa_Modelo->getListProductosEmpresa($IdEmpresaSesion);				
				$dato["admin"] = 1;
				$dato["contenedor"] = "empresa/productosEmpresa_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "productos", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('ProductosEmpresa_Modelo');
						$dato['productosEmpresa'] = $this->ProductosEmpresa_Modelo->getListProductosEmpresa($IdEmpresaSesion);
						$dato["titulo"] = "Productos";
						$dato["contenedor"] = "empresa/productosEmpresa_view";
					$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "empresa/productosEmpresa_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "empresa/productosEmpresa_view";
					$this->load->view('plantilla', $dato);
				}
 			}			
		}else{
			redirect('inicio');
		}		
	}
	public function editarProducto($IdProducto){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('ProductosEmpresa_Modelo');
				$dato['productoEmpresa'] = $this->ProductosEmpresa_Modelo->getProductosEmpresa($IdProducto);			
				$dato["titulo"] = "Editar Producto";   
				$dato["accion"] = "Editar";
				$dato["contenedor"] = "empresa/productosEmpresa_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "productos", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('ProductosEmpresa_Modelo');
						$dato['productoEmpresa'] = $this->ProductosEmpresa_Modelo->getProductosEmpresa($IdProducto);			
						$dato["titulo"] = "Editar Producto";   
						$dato["accion"] = "Editar";
						$dato["contenedor"] = "empresa/productosEmpresa_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->productos();
					}
				}else{
					$this->productos();
				}
 			} 			
			
		}else{
			redirect('inicio');
		}
	}
	public function nuevoProducto(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('ProductosEmpresa_Modelo');
				$dato['productosEmpresa'] = $this->ProductosEmpresa_Modelo->getListProductosEmpresa($IdEmpresaSesion);
				$dato["titulo"] = "Nuevo Producto";
				$dato["accion"] = "Nuevo";
				$dato["contenedor"] = "empresa/productosEmpresa_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "productos", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('ProductosEmpresa_Modelo');
						$dato['productosEmpresa'] = $this->ProductosEmpresa_Modelo->getListProductosEmpresa($IdEmpresaSesion);
						$dato["titulo"] = "Nuevo Producto";
						$dato["accion"] = "Nuevo";
						$dato["contenedor"] = "empresa/productosEmpresa_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->productos();
					}
				}else{
					$this->productos();
				}
 			}
			
		}else{
			redirect('inicio');
		}
	}
	public function guardarProducto(){
		$this->form_validation->set_rules('txtProducto','Producto','trim|required'); 
		$this->form_validation->set_rules('txtCosto','Costo','trim|required');
		$this->form_validation->set_rules('txtIVA','IVA','trim|required');
		//$this->form_validation->set_rules('txtDescripcion','Descripción','trim|required');
		$accion = $_POST['accion'];
		$id = $_POST['id']; 
		if ($this->form_validation->run() == false) {
			if ($accion == "Nuevo") {
				$this->nuevoProducto();		
			}else{
				$this->editarProducto($id);					
			}
		}else{
			$txtProducto = $_POST["txtProducto"];
			$txtCosto = $_POST["txtCosto"];
			$txtIVA = $_POST["txtIVA"];
			$txtDescripcion = $_POST["txtDescripcion"];
			$txtObservacion = $_POST["txtObservacion"];
			if(!empty($_FILES['inputImagen']['tmp_name']) && file_exists($_FILES['inputImagen']['tmp_name'])) {
				$imagen= addslashes(file_get_contents($_FILES['inputImagen']['tmp_name']));
			}else{
				$imagen = "";
			}
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");				
			$this->load->model('ProductosEmpresa_Modelo');
			if ($accion == "Editar") {
				$updateProductosEmpresa = array(
					'NombreProductosEmpresa' => $txtProducto, 
					'CostoProductoEmpresa' => $txtCosto, 
					'IVAProductoEmpresa' => $txtIVA, 
					'DescripcionProductosEmpresa' => $txtDescripcion, 
					'ObservacionProductosEmpresa' => $txtObservacion,
					'Imagen' => $imagen,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->ProductosEmpresa_Modelo->updateProductosEmpresa($id, $updateProductosEmpresa, $IdEmpresaSesion)){
					$mensaje = "El Producto ha sido modificado con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarProducto($id);				
				}else{
					$mensaje = "El Producto no se ha modificado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarProducto($id);				
				}
			}else{
				$insertProductosEmpresa = array(
					'NombreProductosEmpresa' => $txtProducto, 
					'CostoProductoEmpresa' => $txtCosto, 
					'IVAProductoEmpresa' => $txtIVA, 
					'DescripcionProductosEmpresa' => $txtDescripcion, 
					'ObservacionProductosEmpresa' => $txtObservacion,
					'Imagen' => $imagen,
					'IdEmpresa' => $IdEmpresaSesion
					);
				
				if($this->ProductosEmpresa_Modelo->insertProductosEmpresa($insertProductosEmpresa)){
					$mensaje = "El Producto se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoProducto();				
				}else{
					$mensaje = "El Producto no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoProducto();				
				}
			}
		}
	}
	public function eliminarProducto(){
		
		$this->load->model('ProductosEmpresa_Modelo'); 		          	
		$idProd = $_POST["idProducto"];

		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		 $this->ProductosEmpresa_Modelo->deleteProductosEmpresa($idProd, $IdEmpresaSesion); 
	}
	/**
	 * Funciones de Servicios de la Empresa
	 */
	public function servicios(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa" => "Empresa",
			                     $inicioURL."empresa/servicios" => "Servicios"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('ServiciosEmpresa_Modelo');
				$dato['serviciosEmpresa'] = $this->ServiciosEmpresa_Modelo->getListServiciosEmpresa($IdEmpresaSesion);				
				$dato["admin"] = 1;
				$dato["contenedor"] = "empresa/serviciosEmpresa_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "servicios", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('ServiciosEmpresa_Modelo');
						$dato['serviciosEmpresa'] = $this->ServiciosEmpresa_Modelo->getListServiciosEmpresa($IdEmpresaSesion);						
						$dato["contenedor"] = "empresa/serviciosEmpresa_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "empresa/serviciosEmpresa_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "empresa/serviciosEmpresa_view";
 					$this->load->view('plantilla', $dato);
				}
 			}


			
		}else{
			redirect('inicio');
		}		
	}
	public function editarServicio($IdServicio){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('ServiciosEmpresa_Modelo');
				$dato['servicioEmpresa'] = $this->ServiciosEmpresa_Modelo->getServiciosEmpresa($IdServicio, $IdEmpresaSesion);			
				$dato["titulo"] = "Editar Servicio";   
				$dato["accion"] = "Editar";
				$dato["contenedor"] = "empresa/serviciosEmpresa_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "servicios", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('ServiciosEmpresa_Modelo');
						$dato['servicioEmpresa'] = $this->ServiciosEmpresa_Modelo->getServiciosEmpresa($IdServicio, $IdEmpresaSesion);			
						$dato["titulo"] = "Editar Servicio";   
						$dato["accion"] = "Editar";
						$dato["contenedor"] = "empresa/serviciosEmpresa_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->servicios();
					}
				}else{
					$this->servicios();
				}
 			}
			
		}else{
			redirect('inicio');
		}
	}
	public function nuevoServicio(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('ServiciosEmpresa_Modelo');
				$dato['serviciosEmpresa'] = $this->ServiciosEmpresa_Modelo->getListServiciosEmpresa($IdEmpresaSesion);
				$dato["titulo"] = "Nuevo Servicio";
				$dato["accion"] = "Nuevo";
				$dato["contenedor"] = "empresa/serviciosEmpresa_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "servicios", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('ServiciosEmpresa_Modelo');
						$dato['serviciosEmpresa'] = $this->ServiciosEmpresa_Modelo->getListServiciosEmpresa($IdEmpresaSesion);
						$dato["titulo"] = "Nuevo Servicio";
						$dato["accion"] = "Nuevo";
						$dato["contenedor"] = "empresa/serviciosEmpresa_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->servicios();
					}
				}else{
					$this->servicios();
				}
 			}
			
		}else{
			redirect('inicio');
		}
	}
	public function guardarServicio(){
		$this->form_validation->set_rules('txtServicio','Producto','trim|required'); 
		$this->form_validation->set_rules('txtDescripcion','Descripción','trim|required');
		$accion = $_POST['accion'];
		$id = $_POST['id']; 
		if ($this->form_validation->run() == false) {
			if ($accion == "Nuevo") {
				$this->nuevoServicio();		
			}else{
				$this->editarServicio($id);					
			}
		}else{
			$this->load->model('ServiciosEmpresa_Modelo');
			$txtServicio = $_POST["txtServicio"];
			$txtDescripcion = $_POST["txtDescripcion"];
			$txtObservacion = $_POST["txtObservacion"];
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($accion == "Editar") {
				$updateServiciosEmpresa = array(
					'NombreServicios' => $txtServicio,
					'DescripcionServicios' => $txtDescripcion,
					'ObservacionServicios' => $txtObservacion,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->ServiciosEmpresa_Modelo->updateServiciosEmpresa($id, $updateServiciosEmpresa, $IdEmpresaSesion)){
					$mensaje = "El Servicio se ha sido modificado con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarServicio($id);				
				}else{
					$mensaje = "El Servicio no se ha modificado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarServicio($id);				
				}	
			}else{
				
				$insertServiciosEmpresa = array(
					'NombreServicios' => $txtServicio,
					'DescripcionServicios' => $txtDescripcion, 
					'ObservacionServicios' => $txtObservacion,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->ServiciosEmpresa_Modelo->insertServiciosEmpresa($insertServiciosEmpresa)){
					$mensaje = "El Servicio se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoServicio();				
				}else{
					$mensaje = "El Servicio no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoServicio();				
				}
			}
		}
	}
	public function eliminarServicio(){
		$this->load->model('ServiciosEmpresa_Modelo'); 	
		$IdServ = $_POST["idServicio"];	          	
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$result = $this->ServiciosEmpresa_Modelo->deleteServiciosEmpresa($IdServ, $IdEmpresaSesion); 
		if($result){
			echo "Success";
		}else{
			echo "Error";
		}
	}

	/**
	 *Funciones de Valores de la Empresa
	 */
	public function valores(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa" => "Empresa",
			                     $inicioURL."empresa/valores" => "Valores"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('ValoresEmpresa_Modelo');
				$dato['valoresEmpresa'] = $this->ValoresEmpresa_Modelo->getListValoresEmpresa($IdEmpresaSesion);				
				$dato["admin"] = 1;
				$dato["contenedor"] = "empresa/valoresEmpresa_view";
				$this->load->view('plantilla', $dato);		
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "valores", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('ValoresEmpresa_Modelo');
						$dato['valoresEmpresa'] = $this->ValoresEmpresa_Modelo->getListValoresEmpresa($IdEmpresaSesion);
						$dato["contenedor"] = "empresa/valoresEmpresa_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "empresa/valoresEmpresa_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "empresa/valoresEmpresa_view";
					$this->load->view('plantilla', $dato);
				}
 			}
			
		}else{
			redirect('inicio');
		}
	}
	public function nuevoValores(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('ValoresEmpresa_Modelo');			
				$dato["titulo"] = "Nuevo Valor";
				$dato["accion"] = "Nuevo";
				$dato["contenedor"] = "empresa/valoresEmpresa_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "valores", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('ValoresEmpresa_Modelo');			
						$dato["titulo"] = "Nuevo Valor";
						$dato["accion"] = "Nuevo";
						$dato["contenedor"] = "empresa/valoresEmpresa_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->valores();
					}
				}else{
					$this->valores();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function editarValores($IdValores){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('ValoresEmpresa_Modelo');
				$dato['valorEmpresa'] = $this->ValoresEmpresa_Modelo->getValoresEmpresa($IdValores, $IdEmpresaSesion);			
				$dato["titulo"] = "Editar Valor";   
				$dato["accion"] = "Editar";
				$dato["contenedor"] = "empresa/valoresEmpresa_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "valores", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('ValoresEmpresa_Modelo');
						$dato['valorEmpresa'] = $this->ValoresEmpresa_Modelo->getValoresEmpresa($IdValores, $IdEmpresaSesion);			
						$dato["titulo"] = "Editar Valor";   
						$dato["accion"] = "Editar";
						$dato["contenedor"] = "empresa/valoresEmpresa_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->valores();
					}
				}else{
					$this->valores();
				}
 			}

			
		}else{
			redirect('inicio');
		}
	}
	public function guardarValores(){
		$this->form_validation->set_rules('txtValor','Producto','trim|required'); 
		$accion = $_POST['accion'];
		$id = $_POST['id']; 		
		if ($this->form_validation->run() == false) {
			if ($accion == "Nuevo") {
				$this->nuevoValores();		
			}else{
				$this->editarValores($id);					
			}
		}else{
			$this->load->model('ValoresEmpresa_Modelo');
			$txtValor = $_POST["txtValor"];
			$txtDescripcion = $_POST["txtDescripcion"];
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($accion == "Editar") {
				$updateValoresEmpresa = array(
					'ValorValoresEmpresa' => $txtValor,
					'DescripcionValoresEmpresa' => $txtDescripcion, 
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->ValoresEmpresa_Modelo->updateValoresEmpresa($id, $updateValoresEmpresa, $IdEmpresaSesion)){
					$mensaje = "El Valor ha sido modificado con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarValores($id);				
				}else{
					$mensaje = "El Valor no se ha modificado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarValores($id);				
				}
			}else{				
				$insertValoresEmpresa = array(
					'ValorValoresEmpresa' => $txtValor,
					'DescripcionValoresEmpresa' => $txtDescripcion, 
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->ValoresEmpresa_Modelo->insertValoresEmpresa($insertValoresEmpresa)){
					$mensaje = "El Valor se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->valores();				
				}else{
					$mensaje = "El Valor no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoValores();				
				}
			}
		}
	}
	public function eliminarValor(){
		$this->load->model('ValoresEmpresa_Modelo'); 		          	

		$idValorEmp = $_POST["idValoreEmp"];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$result = $this->ValoresEmpresa_Modelo->deleteValoresEmpresa($idValorEmp, $IdEmpresaSesion); 
		if($result){
			echo "Success";
		}else{
			echo "Error";
		}
	}
	/**
	 * Funciones de Acuerdos 
	 */
	public function acuerdos(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$this->load->model('Acuerdo_Modelo');
			$dato['acuerdosEmpresa'] = $this->Acuerdo_Modelo->getListAcuerdo($IdEmpresaSesion);
			$dato["contenedor"] = "acuerdos/acuerdosEmpresa_view";
			$this->load->view('plantilla', $dato);
		}else{
			redirect('inicio');
		}
	}
	public function editarAcuerdo($IdAcuerdo){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$this->load->model('Acuerdo_Modelo');
			$this->load->model('Empleado_Modelo');
			$dato['acuerdoEmpresa'] = $this->Acuerdo_Modelo->getAcuerdo($IdAcuerdo, $IdEmpresaSesion);
			$dato['empleados'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion); 
			$dato["titulo"] = "Editar Acuerdo";   
			$dato["accion"] = "Editar";
			$dato["contenedor"] = "acuerdos/acuerdosEmpresa_new_edit";
			$this->load->view('plantilla', $dato);
		}else{
			redirect('inicio');
		}
	}
	public function nuevoAcuerdo(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$this->load->model('Acuerdo_Modelo');
			$this->load->model('Empleado_Modelo');
			$dato['acuerdosEmpresa'] = $this->Acuerdo_Modelo->getListAcuerdo($IdEmpresaSesion);
			$dato['empleados'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion);  
			$dato["titulo"] = "Nuevo Acuerdo";
			$dato["accion"] = "Nuevo";
			$dato["contenedor"] = "acuerdos/acuerdosEmpresa_new_edit";
			$this->load->view('plantilla', $dato);
		}else{
			redirect('inicio');
		}
	}
	public function guardarAcuerdo(){
		$this->form_validation->set_rules('txtOrganizacion','Organización','trim|required'); 		
		$this->form_validation->set_rules('txtNombre','Nombre del Acuerdo','trim|required'); 		
		$this->form_validation->set_rules('txtFechaPlanificada','Fecha de Planificación','trim|required'); 		
		$this->form_validation->set_rules('txtCostoPlanificado','Costo planificado','trim|required'); 		
		$accion = $_POST['accion'];
		$id = $_POST['id']; 
		if ($this->form_validation->run() == false) {
			if ($accion == "Nuevo") {
				$this->nuevoAcuerdo();		
			}else{
				$this->editarAcuerdo($id);					
			}
		}else{
			$this->load->model('Acuerdo_Modelo');
			if ($accion == "Editar"){
				$txtOrganizacion = $_POST["txtOrganizacion"];
				$selectTipoOrganizacion = $_POST["selectTipoOrganizacion"];
				$txtNombre = $_POST["txtNombre"];
				$txtFechaPlanificada = $_POST["txtFechaPlanificada"];
				$txtCostoPlanificado = $_POST["txtCostoPlanificado"];
				$selectEstado = $_POST["selectEstado"];
				$txtFechaEjecucion = $_POST["txtFechaEjecucion"];
				$txtFechaFinalizacion = $_POST["txtFechaFinalizacion"];
				$txtCostoEjecucion = $_POST["txtCostoEjecucion"];
				$txtBeneficiarios = $_POST["txtBeneficiarios"];
				$txtFotografia = $_POST["txtFotografia"];
				$selectEmpleado = $_POST["selectEmpleado"];				
				$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");

				$updateAcuerdoEmpresa = array(
					'OrganizacionConvenio' => $txtOrganizacion,
					'TipoOrganizacion' => $selectTipoOrganizacion,
					'NombreAcuerdo' => $txtNombre,
					'FechaPlanificacion' => $txtFechaPlanificada,
					'CostoPlanificado' => $txtCostoPlanificado,
					'Estado' => $selectEstado,
					'FechaEjecucion' => $txtFechaEjecucion,
					'FechaFinalizacion' => $txtFechaFinalizacion,
					'CostoEjecutado' => $txtCostoEjecucion,
					'Beneficiarios' => $txtBeneficiarios,
					'Fotografia' => $txtFotografia,
					'CIResponsable' => $selectEmpleado,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->Acuerdo_Modelo->updateAcuerdo($id, $updateAcuerdoEmpresa, $IdEmpresaSesion)){
					$mensaje = "El Acuerdo se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoAcuerdo();				
				}else{
					$mensaje = "El Acuerdo no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoAcuerdo();				
				}
			}else{
				$txtOrganizacion = $_POST["txtOrganizacion"];
				$selectTipoOrganizacion = $_POST["selectTipoOrganizacion"];
				$txtNombre = $_POST["txtNombre"];
				$txtFechaPlanificada = $_POST["txtFechaPlanificada"];
				$txtCostoPlanificado = $_POST["txtCostoPlanificado"];
				$selectEstado = $_POST["selectEstado"];
				$txtFechaEjecucion = $_POST["txtFechaEjecucion"];
				$txtFechaFinalizacion = $_POST["txtFechaFinalizacion"];
				$txtCostoEjecucion = $_POST["txtCostoEjecucion"];
				$txtBeneficiarios = $_POST["txtBeneficiarios"];
				$txtFotografia = $_POST["txtFotografia"];
				$selectEmpleado = $_POST["selectEmpleado"];				
				$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
				$insertAcuerdoEmpresa = array(
					'OrganizacionConvenio' => $txtOrganizacion,
					'TipoOrganizacion' => $selectTipoOrganizacion,
					'NombreAcuerdo' => $txtNombre,
					'FechaPlanificacion' => $txtFechaPlanificada,
					'CostoPlanificado' => $txtCostoPlanificado,
					'Estado' => $selectEstado,
					'FechaEjecucion' => $txtFechaEjecucion,
					'FechaFinalizacion' => $txtFechaFinalizacion,
					'CostoEjecutado' => $txtCostoEjecucion,
					'Beneficiarios' => $txtBeneficiarios,
					'Fotografia' => $txtFotografia,
					'CIResponsable' => $selectEmpleado,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->Acuerdo_Modelo->insertAcuerdo($insertAcuerdoEmpresa)){
					$mensaje = "El Acuerdo se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoAcuerdo();				
				}else{
					$mensaje = "El Acuerdo no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoAcuerdo();				
				}
			}
		}
	}
	public function eliminarAcuerdo(){
		$this->load->model('Acuerdo_Modelo'); 		          	
		$Acuerdo 		= json_decode($this->input->post('MiAcuerdo'));
		$id          = base64_decode($Acuerdo->Id);
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		 $this->Acuerdo_Modelo->deleteAcuerdo($id, $IdEmpresaSesion); 
	}
	/**
	 * Gastos mensuales de la Empresa
	 */
	public function gastosMensuales(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/implicacionEconomica" => "Implicación Económica",
			                     $inicioURL."empresa/gastosMensuales" => "Gastos de Servicios"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('GastosMesEmpresa_Modelo');
				$dato['admin'] = 1;
				$dato['gastosMensuales'] = $this->GastosMesEmpresa_Modelo->getListGastosMesEmpresa($IdEmpresaSesion);
				$dato["contenedor"] = "empresa/gastoMesEmpresa_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "gastosMensuales", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('GastosMesEmpresa_Modelo');
						$dato['gastosMensuales'] = $this->GastosMesEmpresa_Modelo->getListGastosMesEmpresa($IdEmpresaSesion);
						$dato["contenedor"] = "empresa/gastoMesEmpresa_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "empresa/gastoMesEmpresa_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "empresa/gastoMesEmpresa_view";
					$this->load->view('plantilla', $dato);
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function nuevoGastoMesEmpresa(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Proveedor_Modelo');		  
				$dato['proveedores'] = $this->Proveedor_Modelo->getListProveedor($IdEmpresaSesion);  
				$this->load->model('GastosMesEmpresa_Modelo');		  
				$dato['gastosMensuales'] = $this->GastosMesEmpresa_Modelo->getListGastosMesEmpresa($IdEmpresaSesion);  
				$dato["titulo"] = "Nuevo Gasto Mensual de la Empresa";
				$dato["accion"] = "Nuevo";
				$dato["contenedor"] = "empresa/gastoMesEmpresa_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "gastosMensuales", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('Proveedor_Modelo');		  
						$dato['proveedores'] = $this->Proveedor_Modelo->getListProveedor($IdEmpresaSesion);  
						$this->load->model('GastosMesEmpresa_Modelo');		  
						$dato['gastosMensuales'] = $this->GastosMesEmpresa_Modelo->getListGastosMesEmpresa($IdEmpresaSesion);  
						$dato["titulo"] = "Nuevo Gasto Mensual de la Empresa";
						$dato["accion"] = "Nuevo";
						$dato["contenedor"] = "empresa/gastoMesEmpresa_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->gastosMensuales();
					}
				}else{
					$this->gastosMensuales();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function editarGastoMesEmpresa($IdGastoMesEmpresa){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Proveedor_Modelo');
				$this->load->model('GastosMesEmpresa_Modelo');		  
				$dato['proveedores'] = $this->Proveedor_Modelo->getListProveedor($IdEmpresaSesion);	
				$dato['gastoMensual'] = $this->GastosMesEmpresa_Modelo->getGastoMesEmpresa($IdGastoMesEmpresa, $IdEmpresaSesion);
				$dato["titulo"] = "Editar Gasto de la Empresa";   
				$dato["accion"] = "Editar";	
				$dato["contenedor"] = "empresa/gastoMesEmpresa_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "gastosMensuales", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('Proveedor_Modelo');
						$this->load->model('GastosMesEmpresa_Modelo');		  
						$dato['proveedores'] = $this->Proveedor_Modelo->getListProveedor($IdEmpresaSesion);	
						$dato['gastoMensual'] = $this->GastosMesEmpresa_Modelo->getGastoMesEmpresa($IdGastoMesEmpresa, $IdEmpresaSesion);
						$dato["titulo"] = "Editar Gasto de la Empresa";   
						$dato["accion"] = "Editar";	
						$dato["contenedor"] = "empresa/gastoMesEmpresa_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->gastosMensuales();
					}
				}else{
					$this->gastosMensuales();
				}
 			}						
		}else{
			redirect('inicio');
		}
	}
	public function guardarGastoMesEmpresa(){
		$this->form_validation->set_rules('txtFechaMes','Fecha del Mes','trim|required'); 		
		$this->form_validation->set_rules('txtCantidadConsumo','Cantidad de Consumo','trim|required'); 		
		$this->form_validation->set_rules('txtCosto','Costo','trim|required');	
		$accion = $_POST['accion'];
		$id = $_POST['id']; 
		if ($this->form_validation->run() == false) {
			if ($accion == "Nuevo") {
				$this->nuevoGastoMesEmpresa();		
			}else{
				$this->editarGastoMesEmpresa($id);					
			}
		}else{
			$this->load->model('GastosMesEmpresa_Modelo');
			//PENDIENTE: Recibir y obtener el IdAcuerdo para la actualización
			$tiempo = time();  
			$selectTipoPago = $_POST["selectTipoPago"];
			$selectProveedor = $_POST["selectProveedor"];
			$selectMes = $_POST["selectMes"];
			$txtFechaMes = $_POST["txtFechaMes"];
			$selectTipoUnidadMedida = $_POST["selectTipoUnidadMedida"];
			$txtCantidadConsumo = $_POST["txtCantidadConsumo"];			
			$txtCosto = $_POST["txtCosto"];
			$txtObservacion = $_POST["txtObservacion"];
			$txtFechaSistema = date("Y-m-d H:i:s", $tiempo);			
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($accion == "Editar"){
				$updateGastosMesEmpresa = array(
					'TipoGasto' => $selectTipoPago,
					'ProveedorGastosMes' => $selectProveedor,
					'MesGastosMes' => $selectMes,
					'FachaGastosMes' => $txtFechaMes,
					'UnidadMedidaGastosMes' => $selectTipoUnidadMedida,
					'CantidadGastosMes' => $txtCantidadConsumo,
					'CostoGastosMes' => $txtCosto,
					'Observacion' => $txtObservacion,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->GastosMesEmpresa_Modelo->updateGastosMesEmpresa($id, $updateGastosMesEmpresa, $IdEmpresaSesion)){
					$mensaje = "El Gasto se actualizó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarGastoMesEmpresa($id);				
				}else{
					$mensaje = "El Gasto no se ha actualizado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarGastoMesEmpresa($id);				
				}
			}else{
				$insertGastosMesEmpresa = array(
					'TipoGasto' => $selectTipoPago,
					'ProveedorGastosMes' => $selectProveedor,
					'MesGastosMes' => $selectMes,
					'FachaGastosMes' => $txtFechaMes,
					'UnidadMedidaGastosMes' => $selectTipoUnidadMedida,
					'CantidadGastosMes' => $txtCantidadConsumo,
					'CostoGastosMes' => $txtCosto,
					'Observacion' => $txtObservacion,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->GastosMesEmpresa_Modelo->insertGastosMesEmpresa($insertGastosMesEmpresa)){
					$mensaje = "El Gasto se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoGastoMesEmpresa();				
				}else{
					$mensaje = "El Gasto no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoGastoMesEmpresa();				
				}
			}
		}
	}
	public function eliminarGastoMesEmpresa(){
		$this->load->model('GastosMesEmpresa_Modelo'); 		          	
		$id  = $_POST['IdGastosMesEmp'];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		 $this->GastosMesEmpresa_Modelo->deleteGastosMesEmpresa($id, $IdEmpresaSesion); 
	}
	/**
	 * Sucursal Empresa
	 */
	public function modulosSucursales(){
		if($this->session->userdata("IdEmpresaSesion")){
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/gobierno" => "Gobierno",			                     
			                     $inicioURL."empresa/modulosSucursales" => "Sucursales"
			                    );
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "empresa/modulosSucursales";
			$this->load->view("plantilla", $dato);

		}else{
			redirect('inicio');
		}		
	}
	public function sucursales(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/gobierno" => "Gobierno",
			                     $inicioURL."empresa/modulosSucursales" => "Sucursales",
			                     $inicioURL."empresa/sucursales" => "Datos de Sucursales"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
				$this->load->model('SucursalEmpresa_Modelo');
 				$dato['admin'] = 1;
 				$dato['sucursalesEmpresa'] = $this->SucursalEmpresa_Modelo->getListSucursalEmpresa($IdEmpresaSesion);
				$dato["contenedor"] = "empresa/sucursalesEmpresa_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
						$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "sucursales", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('SucursalEmpresa_Modelo');
		 				$dato['sucursalesEmpresa'] = $this->SucursalEmpresa_Modelo->getListSucursalEmpresa($IdEmpresaSesion);
						$dato["contenedor"] = "empresa/sucursalesEmpresa_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "empresa/sucursalesEmpresa_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "empresa/sucursalesEmpresa_view";
					$this->load->view('plantilla', $dato);
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function nuevaSucursalEmpresa(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('SucursalEmpresa_Modelo');
				$dato["sucursales"] = $this->SucursalEmpresa_Modelo->getListSucursalEmpresa($IdEmpresaSesion);
				$dato["titulo"] = "Nueva Sucursal";
				$dato["accion"] = "Nuevo";
				$dato["contenedor"] = "empresa/sucursalEmpresa_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "sucursales", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('SucursalEmpresa_Modelo');
						$dato["sucursales"] = $this->SucursalEmpresa_Modelo->getListSucursalEmpresa($IdEmpresaSesion);
						$dato["titulo"] = "Nueva Sucursal";
						$dato["accion"] = "Nuevo";
						$dato["contenedor"] = "empresa/sucursalEmpresa_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->sucursales();
					}
				}else{
					$this->sucursales();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function editarSucursalEmpresa($IdGastoMesEmpresa){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('SucursalEmpresa_Modelo');
				$dato['sucursalEmpresa'] = $this->SucursalEmpresa_Modelo->getSucursalEmpresa($IdGastoMesEmpresa, $IdEmpresaSesion);
				$dato["titulo"] = "Editar Sucursal de la Empresa";   
				$dato["accion"] = "Editar";	
				$dato["contenedor"] = "empresa/sucursalEmpresa_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "sucursales", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('SucursalEmpresa_Modelo');
						$dato['sucursalEmpresa'] = $this->SucursalEmpresa_Modelo->getSucursalEmpresa($IdGastoMesEmpresa, $IdEmpresaSesion);
						$dato["titulo"] = "Editar Sucursal de la Empresa";   
						$dato["accion"] = "Editar";	
						$dato["contenedor"] = "empresa/sucursalEmpresa_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->sucursales();
					}
				}else{
					$this->sucursales();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function guardarSucursalEmpresa(){
		$this->form_validation->set_rules('txtNombre','Nombre','trim|required');
		$this->form_validation->set_rules('txtDireccion','Dirección','trim|required');		
		$accion = $_POST['accion'];
		$id = $_POST['id']; 
		if ($this->form_validation->run() == false) {
			if ($accion == "Nuevo") {
				$this->nuevaSucursalEmpresa();		
			}else{
				$this->editarSucursalEmpresa($id);					
			}
		}else{
			$this->load->model('SucursalEmpresa_Modelo');			
			$tiempo = time();
			$txtNombre = $_POST["txtNombre"];
			$txtDireccion = $_POST["txtDireccion"];
			$txtTelefonos = $_POST["txtTelefonos"];
			$txtCelulares = $_POST["txtCelulares"];
			$txtObservaciones = $_POST["txtObservaciones"];		
			$txtFechaSistema = date("Y-m-d H:i:s", $tiempo);	
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($accion == "Editar"){
				$updateSucursalEmpresa = array(					
					'Nombre' => $txtNombre,
					'DireccionSucursal' => $txtDireccion,
					'Telefonos' => $txtTelefonos,
					'Celulares' => $txtCelulares,
					'Observaciones' => $txtObservaciones,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->SucursalEmpresa_Modelo->updateSucursalEmpresa($id, $updateSucursalEmpresa, $IdEmpresaSesion)){
					$mensaje = "La Sucursal se actualizó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarSucursalEmpresa($id);				
				}else{
					$mensaje = "La Sucursal no se ha actualizado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarSucursalEmpresa($id);						
				}
			}else{
				$insertSucursalEmpresa = array(
					'Nombre' => $txtNombre,
					'DireccionSucursal' => $txtDireccion,
					'Telefonos' => $txtTelefonos,
					'Celulares' => $txtCelulares,
					'Observaciones' => $txtObservaciones,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->SucursalEmpresa_Modelo->insertSucursalEmpresa($insertSucursalEmpresa)){
					$mensaje = "La Sucursal se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevaSucursalEmpresa();				
				}else{
					$mensaje = "La Sucursal no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevaSucursalEmpresa();				
				}
			}
		}
	}
	public function eliminarSucursalEmpresa(){
		$this->load->model('SucursalEmpresa_Modelo'); 		          	
		$Sucursal 		= json_decode($this->input->post('MiSucursal'));
		$id = $_POST["IdSucu"];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->SucursalEmpresa_Modelo->deleteSucursalEmpresa($id, $IdEmpresaSesion); 
	}
	
	public function datosSucursalesEmpresa(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/gobierno" => "Gobierno",			                     
			                     $inicioURL."empresa/modulosSucursales" => "Sucursales",
			                     $inicioURL."empresa/datosSucursalesEmpresa" => "Cumplimiento de Presupuesto de Sucursales"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
				$this->load->model('SucursalEmpresa_Modelo');
 				$dato['admin'] = 1;
 				$dato['sucursalesEmpresa'] = $this->SucursalEmpresa_Modelo->getListSucursalDatosEmpresa($IdEmpresaSesion);
				$dato["contenedor"] = "empresa/sucursalEmpresaDatos_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
						$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "datosSucursalesEmpresa", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('SucursalEmpresa_Modelo');		 				
		 				$dato['sucursalesEmpresa'] = $this->SucursalEmpresa_Modelo->getListSucursalDatosEmpresa($IdEmpresaSesion);
						$dato["contenedor"] = "empresa/sucursalEmpresaDatos_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "empresa/sucursalEmpresaDatos_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "empresa/sucursalEmpresaDatos_view";
					$this->load->view('plantilla', $dato);
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function nuevoDatosSucursalEmpresa(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('SucursalEmpresa_Modelo');
				$dato["sucursales"] = $this->SucursalEmpresa_Modelo->getListSucursalEmpresa($IdEmpresaSesion);
				$dato["titulo"] = "Nueva Sucursal";
				$dato["accion"] = "Nuevo";
				$dato["contenedor"] = "empresa/sucursalEmpresaDatos_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "datosSucursalesEmpresa", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('SucursalEmpresa_Modelo');
						$dato["sucursales"] = $this->SucursalEmpresa_Modelo->getListSucursalEmpresa($IdEmpresaSesion);
						$dato["titulo"] = "Nueva Sucursal";
						$dato["accion"] = "Nuevo";
						$dato["contenedor"] = "empresa/sucursalEmpresaDatos_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->sucursales();
					}
				}else{
					$this->sucursales();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function editarDatosSucursalEmpresa($IdDatoSucursalEmpresa){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('SucursalEmpresa_Modelo');
				$dato['sucursalDatosEmpresa'] = $this->SucursalEmpresa_Modelo->getSucursalDatosEmpresa($IdDatoSucursalEmpresa, $IdEmpresaSesion);				
				$dato["sucursales"] = $this->SucursalEmpresa_Modelo->getListSucursalEmpresa($IdEmpresaSesion);
				$dato["titulo"] = "Editar Sucursal de la Empresa";   
				$dato["accion"] = "Editar";	
				$dato["contenedor"] = "empresa/sucursalEmpresaDatos_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "datosSucursalesEmpresa", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('SucursalEmpresa_Modelo');
						$dato['sucursalDatosEmpresa'] = $this->SucursalEmpresa_Modelo->getSucursalDatosEmpresa($IdDatoSucursalEmpresa, $IdEmpresaSesion);
						$dato["sucursales"] = $this->SucursalEmpresa_Modelo->getListSucursalEmpresa($IdEmpresaSesion);
						$dato["titulo"] = "Editar Sucursal de la Empresa";   
						$dato["accion"] = "Editar";	
						$dato["contenedor"] = "empresa/sucursalEmpresaDatos_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->datosSucursalesEmpresa();
					}
				}else{
					$this->datosSucursalesEmpresa();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function guardarDatosSucursalEmpresa(){
		$this->form_validation->set_rules('txtCantidadEmpleadosSucursal','Número de Empleados','trim|required|integer');
		$this->form_validation->set_rules('txtCaptacionDelPublico','Captación del Público','trim|required');
		$this->form_validation->set_rules('txtPorcentajeParticipacion','Porcentaje de Participación','trim|required|numeric');
		$this->form_validation->set_rules('txtTotalMiembrosConsejos','Número de Miembros de Consejo','trim|required|integer');
		$this->form_validation->set_rules('txtTotalVocalesRepresentantes','Número de Vocales Representantes','trim|required|integer');
		$this->form_validation->set_rules('txtValorColocado','Valor Colocado','trim|required');
		$this->form_validation->set_rules('txtValorPresupuestado','Valor Presupuestado','trim|required');
		$this->form_validation->set_rules('txtPorcentajeCumplimiento','Porcentaje de Cumplimiento','trim|required|numeric');
		$this->form_validation->set_rules('txtFecha','Fecha','trim|required');
		$accion = $_POST['accion'];
		$id = $_POST['id']; 
		if ($this->form_validation->run() == false) {
			if ($accion == "Nuevo") {
				$this->nuevoDatosSucursalEmpresa();
			}else{
				$this->editarDatosSucursalEmpresa($id);					
			}
		}else{
			$this->load->model('SucursalEmpresa_Modelo');
			$tiempo = time();
			$txtIdSucursal = $_POST["selectSucursal"];
			$txtCantidadEmpleadosSucursal = $_POST["txtCantidadEmpleadosSucursal"];
			$txtCaptacionDelPublico = $_POST["txtCaptacionDelPublico"];
			$txtPorcentajeParticipacion = $_POST["txtPorcentajeParticipacion"];
			$txtTotalMiembrosConsejos = $_POST["txtTotalMiembrosConsejos"];
			$txtTotalVocalesRepresentantes = $_POST["txtTotalVocalesRepresentantes"];
			$txtValorColocado = $_POST["txtValorColocado"];
			$txtValorPresupuestado = $_POST["txtValorPresupuestado"];
			$txtPorcentajeCumplimiento = $_POST["txtPorcentajeCumplimiento"];
			$selectCumplePresupuesto = $_POST["selectCumplePresupuesto"];
			$txtFecha = $_POST["txtFecha"];
			$txtFechaSistema = date("Y-m-d H:i:s", $tiempo);
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($accion == "Editar"){
				$updateSucursalEmpresa = array(
					'IdSucursal' => $txtIdSucursal,
					'CantidadEmpleadosSucursal' => $txtCantidadEmpleadosSucursal,
					'CaptacionDelPublico' => $txtCaptacionDelPublico,
					'PorcentajeParticipacion' => $txtPorcentajeParticipacion,
					'TotalMiembrosConsejos' => $txtTotalMiembrosConsejos,
					'TotalVocalesRepresentantes' => $txtTotalVocalesRepresentantes,
					'ValorColocado' => $txtValorColocado,
					'ValorPresupuestado' => $txtValorPresupuestado,
					'PorcentajeCumplimiento' => $txtPorcentajeCumplimiento,
					'CumplePresupuesto' => $selectCumplePresupuesto,
					'FechaMes' => $txtFecha,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->SucursalEmpresa_Modelo->updateSucursalDatosEmpresa($id, $updateSucursalEmpresa, $IdEmpresaSesion)){
					$mensaje = "Los Datos de la Sucursal se actualizó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarDatosSucursalEmpresa($id);
				}else{
					$mensaje = "Los Datos de la Sucursal no se ha actualizado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarDatosSucursalEmpresa($id);						
				}
			}else{
				$insertSucursalEmpresa = array(
					'IdSucursal' => $txtIdSucursal,
					'CantidadEmpleadosSucursal' => $txtCantidadEmpleadosSucursal,
					'CaptacionDelPublico' => $txtCaptacionDelPublico,
					'PorcentajeParticipacion' => $txtPorcentajeParticipacion,
					'TotalMiembrosConsejos' => $txtTotalMiembrosConsejos,
					'TotalVocalesRepresentantes' => $txtTotalVocalesRepresentantes,
					'ValorColocado' => $txtValorColocado,
					'ValorPresupuestado' => $txtValorPresupuestado,
					'PorcentajeCumplimiento' => $txtPorcentajeCumplimiento,
					'CumplePresupuesto' => $selectCumplePresupuesto,
					'FechaMes' => $txtFecha,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->SucursalEmpresa_Modelo->insertSucursalDatosEmpresa($insertSucursalEmpresa)){
					$mensaje = "Los Datos de la Sucursal se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->datosSucursalesEmpresa();				
				}else{
					$mensaje = "Los Datos de la Sucursal no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoDatosSucursalEmpresa();				
				}
			}
		}
	}

	public function eliminarDatosSucursalEmpresa(){
		$this->load->model('SucursalEmpresa_Modelo'); 		          	
		$id = $_POST["IdSuc"];
		
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->SucursalEmpresa_Modelo->deleteSucursalDatosEmpresa($id, $IdEmpresaSesion); 
		return $id;
	}

	/**
	*	Administrador
	**/
	public function administrador(){
		//Consultar permisos a la BDD con el nombre del Controlador en relación a la Tabla
		$inicioURL = base_url();
		$relativeURL = array($inicioURL."principal" => "Módulos",
		                     $inicioURL."empresa/administrador" => "Administrador"
		                    );
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "empresa/moduloAdministrarUsuarios";
			$this->load->view('plantilla', $dato);
		}else{
			redirect('inicio');
		}
	}
	/**
	Reportes
	**/
	public function reportes2($value=''){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$dato["contenedor"] = "empresa/modulosReportes";
			$this->load->view("plantilla", $dato);

		}else{
			redirect('inicio');
		}	
	}
	public function reportesEmpresa(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa" => "Empresa",
			                     $inicioURL."empresa/reportesEmpresa" => "Reportes"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "empresa/reportesModuloEmpresa_view";
			$this->load->view("plantilla", $dato);

		}else{
			redirect('inicio');
		}	
	}	
	public function reporteSubModuloEmpresaPDF($nombreTabla){
        if($this->session->userdata("IdEmpresaSesion")){
        	$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
        	$usuario = $this->session->userdata("usuario");
    		$this->load->model("Empresa_Modelo");
			$empresa = $this->Empresa_Modelo->getEmpresa($IdEmpresaSesion);
    		if ($nombreTabla == "IndicadoresEmpresaDetalle") {
    			$nombreTabla = "IndicadoresEmpresa";
				$reporteTabla = $this->Empresa_Modelo->getListReporteTabla($nombreTabla, $IdEmpresaSesion);
    			$nombreTabla = "IndicadoresEmpresaDetalle";
    		}else{
    			if ($nombreTabla == "IndicadoresEmpresaDetalle2") {
    				$nombreTabla = "IndicadoresEmpresa";
					$reporteTabla = $this->Empresa_Modelo->getListReporteTabla($nombreTabla, $IdEmpresaSesion);
    				$nombreTabla = "IndicadoresEmpresaDetalle2";
    			}else{
					$reporteTabla = $this->Empresa_Modelo->getListReporteTabla($nombreTabla, $IdEmpresaSesion);	
				}	
    		}
			$dato['imgIcono'] = "imagenes/logo_icono.jpg";
			$dato['empresa'] = $empresa;
			$dato['usuario'] = $usuario;
			//print_r($reporteTabla);

			if (!(empty($reporteTabla))) {
				switch ($nombreTabla) {
					case 'ValoresEmpresa':
						$dato['valoresEmpresa'] = $reporteTabla;
						$dato['nombreTabla'] = "Valores";
						$this->load->view('empresa/rpValoresPDF', $dato);
						break;
					case 'PrincipiosEmpresa':
						$dato['principiosEmpresa'] = $reporteTabla;
						$dato['nombreTabla'] = "Principios";
						$this->load->view('empresa/rpPrincipiosPDF', $dato);
						break;
					case 'ObjetivosEmpresa':
						$dato['objetivosEmpresa'] = $reporteTabla;
						$dato['nombreTabla'] = "Objetivos";
						$this->load->view('empresa/rpObjetivosPDF', $dato);
						break;
					case 'ProductosEmpresa':
						$dato['productosEmpresa'] = $reporteTabla;
						$dato['nombreTabla'] = "Productos";
						$this->load->view('empresa/rpProductosPDF', $dato);
						break;
					case 'ServiciosEmpresa':
						$dato['serviciosEmpresa'] = $reporteTabla;
						$dato['nombreTabla'] = "Servicios";
						$this->load->view('empresa/rpServiciosPDF', $dato);
						break;
					case 'LogrosEmpresa':
						$dato['logrosEmpresa'] = $reporteTabla;
						$dato['nombreTabla'] = "Logros";
						$this->load->view('empresa/rpLogrosPDF', $dato);
						break;
					case 'Empleado':
						$dato['empleadosEmpresa'] = $reporteTabla;
						$dato['nombreTabla'] = "Empleados";
						$this->load->view('empresa/rpEmpleadosPDF', $dato);
						break;
					case 'HijoEmpleado':
						$dato['hijosEmpleadosEmpresa'] = $reporteTabla;
						$dato['nombreTabla'] = "Hijos de Empleados";
						$this->load->view('empresa/rpHijosEmpleadosPDF', $dato);
						break;
					case 'IndicadoresEmpresa':
						$dato['indicadoresCuantativosEmpresa'] = $reporteTabla;
						$dato['nombreTabla'] = "Indicadores Cuantitativos";
						$this->load->view('empresa/rpIndicadoresCuantitativosPDF', $dato);
						break;
					case 'IndicadorCualitativoEmpresa':
						$dato['IndicadoresCualitativosEmpresa'] = $reporteTabla;
						$dato['nombreTabla'] = "Indicadores Cualitativos";
						$this->load->view('empresa/rpIndicadoresCualitativosPDF', $dato);
						break;
					case 'IndicadoresEmpresaDetalle':
						$dato['indicadoresCuantativosEmpresa'] = $reporteTabla;
						$dato['nombreTabla'] = "Indicadores Cuantitativos";
						$this->load->view('empresa/rpIndicadoresCualitativosDetallePDF', $dato);
						break;
					case 'IndicadoresEmpresaDetalle2':
						$dato['indicadoresCuantativosEmpresa'] = $reporteTabla;
						$dato['nombreTabla'] = "Indicadores Cuantitativos";
						$this->load->view('empresa/rpIndicadoresCualitativosDetalle2PDF', $dato);
						break;
					default:
						echo "No existen registros";
						break;
				}
			}else{
				echo "Vacía";
			}
			
		}else{
			redirect('inicio');
		}
	}
	public function reportesAdmin(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa/administrador" => "Administrador",
			                     $inicioURL."empresa/reportesAdmin" => "Reportes"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "empresa/reportesModuloAdministrador_view";
			$this->load->view("plantilla", $dato);

		}else{
			redirect('inicio');
		}	
	}
	public function reporteSubModuloAdminPDF($nombreTabla){
        if($this->session->userdata("IdEmpresaSesion")){
        	$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
        	$usuario = $this->session->userdata("usuario");
    		$this->load->model("Empresa_Modelo");
			$empresa = $this->Empresa_Modelo->getEmpresa($IdEmpresaSesion);
    		if ($nombreTabla == "UsuarioEmpresa") {
    			$select = "*, (SELECT Nombre FROM Perfil WHERE IdPerfil = UsuarioEmpresa.PerfilRolUsuario) AS Perfil";
				$reporteTabla = $this->Empresa_Modelo->getListReporteTablaConsulta($select, $nombreTabla, $IdEmpresaSesion);	
    		}else{
    			if ($nombreTabla == "TablasFunciones") {
    				$this->load->model("TablasFunciones_Modelo");
					$reporteTabla = $this->TablasFunciones_Modelo->getListTablasFunciones($nombreTabla);
    			}else{
    				if ($nombreTabla == "Permiso_Rol") {
    					$this->load->model("Permiso_Modelo");
						$reporteTabla = $this->Permiso_Modelo->getListPermisoPorPerfil($IdEmpresaSesion);	
    				}else{
    					if ($nombreTabla == "Permiso_Especial_Usuario") {
	    					$this->load->model("Permiso_Modelo");
							$reporteTabla = $this->Permiso_Modelo->getListPermisoEspecialPorUsuario($IdEmpresaSesion);
    					}else{
							$reporteTabla = $this->Empresa_Modelo->getListReporteTabla($nombreTabla, $IdEmpresaSesion);	
						}
					}
				}	
    		}
			$dato['imgIcono'] = "imagenes/logo_icono.jpg";
			$dato['empresa'] = $empresa;
			$dato['usuario'] = $usuario;
			//print_r($reporteTabla);

			if (!(empty($reporteTabla))) {
				switch ($nombreTabla) {
					case 'Perfil':
						$dato['perfiles'] = $reporteTabla;
						$dato['nombreTabla'] = "Perfiles";
						$this->load->view('empresa/rpPerfilesPDF', $dato);
						break;
					case 'UsuarioEmpresa':
						$dato['usuariosEmpresa'] = $reporteTabla;
						$dato['nombreTabla'] = "Usarios";
						$this->load->view('empresa/rpUsuariosPDF', $dato);
						break;
					case 'TablasFunciones':
						$dato['tablasFunciones'] = $reporteTabla;
						$dato['nombreTabla'] = "Tablas / Función";
						$this->load->view('empresa/rpTablasFuncionPDF', $dato);
						break;
					case 'Permiso_Rol':
						$dato['permisosPerfil'] = $reporteTabla;
						$dato['nombreTabla'] = "Permisos por Perfil";
						$this->load->view('empresa/rpPermisoPorPerfilPDF', $dato);
						break;
					case 'Permiso_Especial_Usuario':
						$dato['permisosEspecialPorUsuario'] = $reporteTabla;
						$dato['nombreTabla'] = "Permisos Especiales de Usuarios";
						$this->load->view('empresa/rpPermisoEspecialPorUsuarioPDF', $dato);
						break;
					default:
						echo "No existen registros";
						break;
				}
			}else{
				echo "Vacía";
			}
			
		}else{
			redirect('inicio');
		}
	}

	public function indicadorCuantitativosEmpresaPDF(){
        if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$this->load->model('Empresa_Modelo');
			$this->load->model('IndicadoresEmpresa_Modelo');
			$dato['empresa'] = $this->Empresa_Modelo->getEmpresa($IdEmpresaSesion);
			$dato['indicadoresCuantitativos'] = $this->IndicadoresEmpresa_Modelo->getListIndicadorCuantitativoSeleccionadosEmpresa($IdEmpresaSesion);
			$this->load->view('impresion/imprimirIndicadoresCuantitativosEmpresa', $dato);
		}else{
			redirect('inicio');
		}
	}
	public function empleadosEmpresaPDF(){
        if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$this->load->model('Empresa_Modelo');
			$this->load->model('Empleado_Modelo');
			$dato['empresa'] = $this->Empresa_Modelo->getEmpresa($IdEmpresaSesion);
			$dato['empleadosEmpresa'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion);
			$this->load->view('impresion/imprimirEmpleadosEmpresa', $dato);
		}else{
			redirect('inicio');
		}
	}
	/**
	Información general de la Empresa
	**/
	public function informacionGeneralEmpresa($value=''){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$this->load->model('Empresa_Modelo');
			$this->load->model('ValoresEmpresa_Modelo');
			$this->load->model('PrincipiosEmpresa_Modelo');
			$dato['empresa'] = $this->Empresa_Modelo->getEmpresa($IdEmpresaSesion);
			$dato['valores'] = $this->ValoresEmpresa_Modelo->getListValoresEmpresa($IdEmpresaSesion);
			$dato['principios'] = $this->PrincipiosEmpresa_Modelo->getListPrincipiosEmpresa($IdEmpresaSesion);
			$this->load->view('impresion/empresaPDF', $dato);
		}else{
			redirect('inicio');
		}
	}

}

?>