<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class imagenInstitucional extends CI_Controller {
	
	function __construct(){
		parent::__construct();			
	}

	public function imagenesInstitucionales(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa" => "Empresa",
			                     $inicioURL."imagenInstitucional/imagenesInstitucionales" => "Imágenes Institucionales"
			                    );
 			$dato["ubicacionURL"] = $relativeURL;
 			$tipoUsuario = $this->session->userdata("tipoUsuario");

 			if ($tipoUsuario == "Admin") {
 				$this->load->model('ImagenInstitucional_Modelo');
				$dato["imagenesInstitucionales"] = $this->ImagenInstitucional_Modelo->getListImagenInstitucinal($IdEmpresaSesion);
	 			$dato['admin'] = 1;
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "imagenesInstitucionales", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('ImagenInstitucional_Modelo');
						$dato["imagenesInstitucionales"] = $this->ImagenInstitucional_Modelo->getListImagenInstitucinal($IdEmpresaSesion);
					}
				}
 			}
 			$dato["contenedor"] = "imagenInstitucional/ImagenInstitucional_view";
			$this->load->view("plantilla", $dato);

		}else{
			redirect('inicio');
		}	
	}

	public function nuevaImagenInstitucional(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
			//Preguntar que tipo de Usuario es
			if ($tipoUsuario == "Admin") {
				$dato["titulo"] = "Nueva Imagen Institucional";
				$dato["accion"] = "Nuevo";
				$dato["contenedor"] = "imagenInstitucional/ImagenInstitucional_new_edit";
				$this->load->view('plantilla', $dato);
			}else{
				$perfilSesion = $this->session->userdata("perfilSesion");
				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "imagenesInstitucionales", $IdEmpresaSesion);
				if (empty($dato["permisos"])) {
					$this->imagenesInstitucionales();
				}else{
					if ($dato["permisos"][0]->Agregar == 1) {
						$dato["titulo"] = "Nueva Imagen Institucional";
						$dato["accion"] = "Nuevo";
						$dato["contenedor"] = "imagenInstitucional/ImagenInstitucional_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->imagenesInstitucionales();
					}
				}
			}
			
		}else{
			redirect('inicio');
		}
	}
	public function editarImagenInstitucional($IdImgInstucional){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
			//Pregunto que tipo de usuario es
			if ($tipoUsuario == "Admin") {
				//Si es Administrador, no hay restricciones
				$this->load->model('ImagenInstitucional_Modelo');
				$dato['imagenInstitucional'] = $this->ImagenInstitucional_Modelo->getImagenInstitucinal($IdImgInstucional, $IdEmpresaSesion);			
				$dato["titulo"] = "Editar Imagen Institucional";   
				$dato["accion"] = "Editar";
				$dato["contenedor"] = "imagenInstitucional/ImagenInstitucional_new_edit";
				$this->load->view('plantilla', $dato);
			}else{
				//Si es Usuario de Empresa, entonces pregunto el IdImgInstucional
				$perfilSesion = $this->session->userdata("perfilSesion");
				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				//Obtengo los permisos enviando el IdImgInstucional, nombreTabla, IdEmpresa
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "imagenesInstitucionales", $IdEmpresaSesion);
				//Verifico si existe algun registro
				if (empty($dato["permisos"])) {
					//Si registros es 0 entonces regresa a perfiles
					$this->imagenesInstitucionales();
				}else{
					//Pregunto si tiene permiso de Actualización
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('ImagenInstitucional_Modelo');
						$dato['imagenInstitucional'] = $this->ImagenInstitucional_Modelo->getImagenInstitucinal($IdImgInstucional, $IdEmpresaSesion);			
						$dato["titulo"] = "Editar Imagen Institucional";   
						$dato["accion"] = "Editar";
						$dato["contenedor"] = "imagenInstitucional/ImagenInstitucional_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->imagenesInstitucionales();
					}
				}
			}

		}else{
			redirect('inicio');
		}
	}
	public function guardarImagenInstitucional(){
		$this->form_validation->set_rules('txtFechaRegistro','Fecha de Registro','trim|required');
		$this->form_validation->set_rules('txtPeriodo','Periodo','trim|required|integer');
		$this->form_validation->set_rules('txtEslogan','Eslogan','trim|required');

		$accion = $_POST['accion'];
		$id = $_POST['id'];		
		if ($this->form_validation->run() == false) {
			if ($accion == "Editar") {
				$this->editarImagenInstitucional($id);				
			}else{
				$this->nuevaImagenInstitucional();
			}
		}else{
			$this->load->model('ImagenInstitucional_Modelo');
			$txtFechaRegistro = $_POST["txtFechaRegistro"];
			$txtEslogan = $_POST["txtEslogan"];
			$txtPeriodo = $_POST["txtPeriodo"];
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$txtFechaSistema = date('Y-m-d H:i:s');

			if(!empty($_FILES['inputFotoIcono']['tmp_name']) && file_exists($_FILES['inputFotoIcono']['tmp_name'])) {
				$imagenInputFotoIcono = addslashes(file_get_contents($_FILES['inputFotoIcono']['tmp_name']));
			}else{
				$imagenInputFotoIcono = "";
			}
			if(!empty($_FILES['inputFotoLogotipo']['tmp_name']) && file_exists($_FILES['inputFotoLogotipo']['tmp_name'])) {
				$imagenInputFotoLogotipo = addslashes(file_get_contents($_FILES['inputFotoLogotipo']['tmp_name']));
			}else{
				$imagenInputFotoLogotipo = "";
			}
			if(!empty($_FILES['inputFotoImgPrincipalMemoria']['tmp_name']) && file_exists($_FILES['inputFotoImgPrincipalMemoria']['tmp_name'])) {
				$imagenInputFotoImgPrincipalMemoria = addslashes(file_get_contents($_FILES['inputFotoImgPrincipalMemoria']['tmp_name']));
			}else{
				$imagenInputFotoImgPrincipalMemoria = "";
			}
			if(!empty($_FILES['inputFotoImgIntroduccionMemoria']['tmp_name']) && file_exists($_FILES['inputFotoImgIntroduccionMemoria']['tmp_name'])) {
				$imagenInputFotoImgIntroduccionMemoria = addslashes(file_get_contents($_FILES['inputFotoImgIntroduccionMemoria']['tmp_name']));
			}else{
				$imagenInputFotoImgIntroduccionMemoria = "";
			}
			if(!empty($_FILES['inputFotoFotoPresidente']['tmp_name']) && file_exists($_FILES['inputFotoFotoPresidente']['tmp_name'])) {
				$imagenInputFotoFotoPresidente = addslashes(file_get_contents($_FILES['inputFotoFotoPresidente']['tmp_name']));
			}else{
				$imagenInputFotoFotoPresidente = "";
			}
			if(!empty($_FILES['inputFotoFotoGerencia']['tmp_name']) && file_exists($_FILES['inputFotoFotoGerencia']['tmp_name'])) {
				$imagenInputFotoFotoGerencia = addslashes(file_get_contents($_FILES['inputFotoFotoGerencia']['tmp_name']));
			}else{
				$imagenInputFotoFotoGerencia = "";
			}
			if(!empty($_FILES['inputFotoFotoEjecutivos']['tmp_name']) && file_exists($_FILES['inputFotoFotoEjecutivos']['tmp_name'])) {
				$imagenInputFotoFotoEjecutivos = addslashes(file_get_contents($_FILES['inputFotoFotoEjecutivos']['tmp_name']));
			}else{
				$imagenInputFotoFotoEjecutivos = "";
			}
			if(!empty($_FILES['inputFotoFotoRepresentantes']['tmp_name']) && file_exists($_FILES['inputFotoFotoRepresentantes']['tmp_name'])) {
				$imagenInputFotoFotoRepresentantes = addslashes(file_get_contents($_FILES['inputFotoFotoRepresentantes']['tmp_name']));
			}else{
				$imagenInputFotoFotoRepresentantes = "";
			}
			if(!empty($_FILES['inputFotoProductosServicios']['tmp_name']) && file_exists($_FILES['inputFotoProductosServicios']['tmp_name'])) {
				$imagenInputFotoProductosServicios = addslashes(file_get_contents($_FILES['inputFotoProductosServicios']['tmp_name']));
			}else{
				$imagenInputFotoProductosServicios = "";
			}
			if(!empty($_FILES['inputFotoFotosAporteComunidad']['tmp_name']) && file_exists($_FILES['inputFotoFotosAporteComunidad']['tmp_name'])) {
				$imagenInputFotoFotosAporteComunidad = addslashes(file_get_contents($_FILES['inputFotoFotosAporteComunidad']['tmp_name']));
			}else{
				$imagenInputFotoFotosAporteComunidad = "";
			}


			if ($_POST["accion"] == "Editar"){
				$updateImagenInstitucional = array(
					'Icono' => $imagenInputFotoIcono,
					'Logotipo' => $imagenInputFotoLogotipo,
					'Eslogan' => $txtEslogan,
					'ImgPrincipalMemoria' => $imagenInputFotoImgPrincipalMemoria,
					'ImgIntroduccionMemoria' => $imagenInputFotoImgIntroduccionMemoria,
					'FotoPresidente' => $imagenInputFotoFotoPresidente,
					'FotoGerencia' => $imagenInputFotoFotoGerencia,
					'FotoEjecutivos' => $imagenInputFotoFotoEjecutivos,
					'FotoRepresentantes' => $imagenInputFotoFotoRepresentantes,
					'FotoProductosServicios' => $imagenInputFotoProductosServicios,
					'FotosAporteComunidad' => $imagenInputFotoFotosAporteComunidad,
					'Periodo' => $txtPeriodo,
					'FechaRegistro' => $txtFechaRegistro,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->ImagenInstitucional_Modelo->updateimagenInstitucinal($id, $updateImagenInstitucional, $IdEmpresaSesion)){
					$mensaje = "Las Imágenes Institucionales se actualizaron con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarImagenInstitucional($id);			
				}else{
					$mensaje = "Las Imágenes Institucionales no se han actualizado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarImagenInstitucional($id);			
				}
			}else{
				$insertImagenInstitucional = array(
					'Icono' => $imagenInputFotoIcono,
					'Logotipo' => $imagenInputFotoLogotipo,
					'Eslogan' => $txtEslogan,
					'ImgPrincipalMemoria' => $imagenInputFotoImgPrincipalMemoria,
					'ImgIntroduccionMemoria' => $imagenInputFotoImgIntroduccionMemoria,
					'FotoPresidente' => $imagenInputFotoFotoPresidente,
					'FotoGerencia' => $imagenInputFotoFotoGerencia,
					'FotoEjecutivos' => $imagenInputFotoFotoEjecutivos,
					'FotoRepresentantes' => $imagenInputFotoFotoRepresentantes,
					'FotoProductosServicios' => $imagenInputFotoProductosServicios,
					'FotosAporteComunidad' => $imagenInputFotoFotosAporteComunidad,
					'Periodo' => $txtPeriodo,
					'FechaRegistro' => $txtFechaRegistro,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->ImagenInstitucional_Modelo->insertImagenInstitucional($insertImagenInstitucional)){
					$mensaje = "Las Imágenes Institucionales se insertaron con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevaImagenInstitucional();				
				}else{
					$mensaje = "Las Imágenes Institucionales no se han registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevaImagenInstitucional();				
				}
			}
		}
	}
	public function eliminarImagenInstitucional(){
		$this->load->model('ImagenInstitucional_Modelo'); 		          	
		$IdImgIns = $_POST["idImg"];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->ImagenInstitucional_Modelo->deleteImagenInstitucinal($IdImgIns, $IdEmpresaSesion); 
	}


}
 ?>