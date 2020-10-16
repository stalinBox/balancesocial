<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class login extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('Usuario_Modelo');
	}

	public function index(){
		$dato["contenedor"] = "log/loginUser";
		$this->load->model("Empresa_Modelo");
		$dato["empresas"] = $this->Empresa_Modelo->getListEmpresa();
		$this->load->view("plantilla", $dato);	
	}
	public function logAdmin(){
		$dato["contenedor"] = "log/loginAdmin";
		$this->load->model("Empresa_Modelo");
		$dato["empresas"] = $this->Empresa_Modelo->getListEmpresa();
		$this->load->view("plantilla", $dato);	
	}
	public function logUser(){
		$dato["contenedor"] = "log/loginUser";
		$this->load->model("Empresa_Modelo");
		$dato["empresas"] = $this->Empresa_Modelo->getListEmpresa();
		$this->load->view("plantilla", $dato);	
	}

	public function validarUsuario(){
	$tipoUser = $_POST["tipoUser"];
		if ($tipoUser == "Admin") {
			//Validar campos
			$this->form_validation->set_rules('ruc','RUC','trim|integer|required'); 
			$this->form_validation->set_rules('contrasenia','Contraseña','trim|required');
				if($this->form_validation->run() == false){	//Volver a index de login
					$this->logAdmin();			
				}else{	//Comprobar los datos obtenidos del modelo y la función validar_usuario
					$ruc = $_POST["ruc"];
					$contrasenia = $_POST["contrasenia"];
					$this->load->model('Empresa_Modelo');
					$empresa = $this->Empresa_Modelo->getEmpresaLog($ruc, $contrasenia);			
					if($empresa != FALSE ){
						//Crear variable de session usuario_valido				
						$this->session->set_userdata("usuario", $empresa->NombreEmpresa);				
						$this->session->set_userdata("IdEmpresaSesion", $empresa->IdEmpresa);			
						$this->session->set_userdata("tipoUsuario", "Admin");
						redirect("principal");
						}else{
							$this->logAdmin();
						}
					}			
		}else{
			//Validar campos
			$this->form_validation->set_rules('correo','Correo','trim|valid_email|required'); 
			$this->form_validation->set_rules('contrasenia','Contraseña','trim|required');
				if($this->form_validation->run() == false){	//Volver a index de login
					$this->logUser();			
				}else{	//Comprobar los datos obtenidos del modelo y la función validar_usuario

					$correo = $_POST["correo"];
					$contrasenia = $_POST["contrasenia"];
					$IdEmpresaSesion = $_POST["selectIdEmpresa"];
					$this->load->model('UsuarioEmpresa_Modelo');
					$usuario = $this->UsuarioEmpresa_Modelo->getUsuario($correo, $contrasenia, $IdEmpresaSesion);			
					//echo $usuario;					
					if($usuario != FALSE ){
						//Crear variable de session usuario_valido				
						$this->session->set_userdata("usuario", $usuario->Mail);	
						$this->session->set_userdata("IdEmpresaSesion", $usuario->IdEmpresa);			
						$this->session->set_userdata("perfilSesion", $usuario->PerfilRolUsuario);
						$this->session->set_userdata("idUsuarioSesion", $usuario->IdUsuario);
						$this->session->set_userdata("tipoUsuario", "usuarioEmpresa");
						redirect("principal");
						}else{
							$this->logUser();
						}
					}
		}
			
	}
	//Cerrar sesión
	public function logout(){
		//Vaciar variables 
		$this->session->unset_userdata('usuario');
		$this->session->unset_userdata('IdEmpresaSesion');
		$this->session->unset_userdata('perfilSesion');
		$this->session->unset_userdata('idUsuarioSesion');
		$this->session->unset_userdata('tipoUsuario');
		session_destroy();
		redirect("principal");
	}
}


