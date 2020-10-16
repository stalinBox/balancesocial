<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class perfilUsuario extends CI_Controller {
	
	function __construct(){
		parent::__construct();			
	}

	public function perfiles(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa/administrador" => "Administrador",
			                     $inicioURL."perfilUsuario/perfiles" => "Perfiles"
			                    );
 			$dato["ubicacionURL"] = $relativeURL;
 			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Perfil_Modelo');
				$dato["perfiles"] = $this->Perfil_Modelo->getListPerfil($IdEmpresaSesion);	 			
	 			$dato['admin'] = 1;
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "perfiles", $IdEmpresaSesion);				
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('Perfil_Modelo');
						$dato["perfiles"] = $this->Perfil_Modelo->getListPerfil($IdEmpresaSesion);
					}
				}
 			}
 			$dato["contenedor"] = "empresa/perfilUsuario_view";
			$this->load->view("plantilla", $dato);

		}else{
			redirect('inicio');
		}	
	}


	public function nuevoPerfil(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
			//Preguntar que tipo de Usuario es
			if ($tipoUsuario == "Admin") {						
				$dato["titulo"] = "Nuevo Perfil";
				$dato["accion"] = "Nuevo";
				$dato["contenedor"] = "empresa/perfilUsuario_new_edit";
				$this->load->view('plantilla', $dato);
			}else{
				$perfilSesion = $this->session->userdata("perfilSesion");
				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "perfiles", $IdEmpresaSesion);
				if (empty($dato["permisos"])) {
					$this->perfiles();
				}else{
					if ($dato["permisos"][0]->Agregar == 1) {
						$dato["titulo"] = "Nuevo Perfil";
						$dato["accion"] = "Nuevo";
						$dato["contenedor"] = "empresa/perfilUsuario_new_edit";
						$this->load->view('plantilla', $dato);						
					}else{
						$this->perfiles();
					}
				}
			}
			
		}else{
			redirect('inicio');
		}
	}
	public function editarPerfil($IdPerfil){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
			//Pregunto que tipo de usuario es
			if ($tipoUsuario == "Admin") {
				//Si es Administrador, no hay restricciones
				$this->load->model('Perfil_Modelo');
				$dato['perfil'] = $this->Perfil_Modelo->getPerfil($IdPerfil, $IdEmpresaSesion);			
				$dato["titulo"] = "Editar Perfil";   
				$dato["accion"] = "Editar";
				$dato["contenedor"] = "empresa/perfilUsuario_new_edit";
				$this->load->view('plantilla', $dato);
			}else{
				//Si es Usuario de Empresa, entonces pregunto el IdPerfil
				$perfilSesion = $this->session->userdata("perfilSesion");
				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				//Obtengo los permisos enviando el IdPerfil, nombreTabla, IdEmpresa
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "perfiles", $IdEmpresaSesion);
				//Verifico si existe algun registro
				if (empty($dato["permisos"])) {
					//Si registros es 0 entonces regresa a perfiles
					$this->perfiles();
				}else{
					//Pregunto si tiene permiso de Actualización
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('Perfil_Modelo');
						$dato['perfil'] = $this->Perfil_Modelo->getPerfil($IdPerfil, $IdEmpresaSesion);			
						$dato["titulo"] = "Editar Perfil";   
						$dato["accion"] = "Editar";
						$dato["contenedor"] = "empresa/perfilUsuario_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->perfiles();
					}
				}
			}

		}else{
			redirect('inicio');
		}
	}
	public function guardarPerfil(){
		$this->form_validation->set_rules('txtNombre','Nombre del Perfil','trim|required');		
		$accion = $_POST['accion'];
		$id = $_POST['id'];		
		if ($this->form_validation->run() == false) {
			if ($accion == "Editar") {
				$this->editarPerfil($id);				
			}else{
				$this->nuevoPerfil();
			}
		}else{
			$this->load->model('Perfil_Modelo');
			$txtNombre = $_POST["txtNombre"];
			$txtObservacion = $_POST["txtObservacion"];				
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($_POST["accion"] == "Editar"){
				$updatePerfil = array(					
					'Nombre' => $txtNombre,
					'Observacion' => $txtObservacion,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->Perfil_Modelo->updatePerfil($id, $updatePerfil, $IdEmpresaSesion)){
					$mensaje = "El Perfil se actualizó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarPerfil($id);			
				}else{
					$mensaje = "El Perfil no se ha actualizado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarPerfil($id);			
				}
			}else{
				$insertPerfil	 = array(
					'Nombre' => $txtNombre,
					'Observacion' => $txtObservacion,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->Perfil_Modelo->insertPerfil	($insertPerfil	)){
					$mensaje = "El Perfil se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoPerfil();				
				}else{
					$mensaje = "El Perfil no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoPerfil();				
				}
			}
		}
	}

	public function eliminarPerfil(){
		$this->load->model('Perfil_Modelo'); 		          	
		$idPerf = $_POST["idPer"];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$result = $this->Perfil_Modelo->deletePerfil($idPerf, $IdEmpresaSesion); 
		if($result){
        	echo "Success";
    	} else{
        	echo "Error";
    	}
	}
}
 ?>