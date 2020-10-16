<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class permisos extends CI_Controller {
	
	function __construct(){
		parent::__construct();
	}

	public function index(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa/administrador" => "Administrador",
			                     $inicioURL."permisos" => "Permisos"
			                    );
 			$dato["ubicacionURL"] = $relativeURL;
 			$dato["contenedor"] = "empresa/modulosPermisos_view";
			$this->load->view("plantilla", $dato);			
		}else{
			redirect('inicio');
		}
	}

	public function permisosPerfiles(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa/administrador" => "Administrador",
			                     $inicioURL."permisos" => "Permisos",
			                     $inicioURL."permisos/permisosPerfiles" => "Perfil-Objeto"
			                    );
 			$dato["ubicacionURL"] = $relativeURL;

 			//Obtengo el tipo de usuario y pregunto
 			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Perfil_Modelo');
				$dato["perfiles"] = $this->Perfil_Modelo->getListPerfil($IdEmpresaSesion); 
				$dato["permisosPerfil"] = $this->Perfil_Modelo->getListPerfil($IdEmpresaSesion);
	 			$dato['admin'] = 1;
 			}else{
 				//Obtengo el Id del Perfil
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
 				echo "El id del User ".$idUsuarioSesion;
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "permisos", $IdEmpresaSesion);
				print_r($dato["permisos"]);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('Perfil_Modelo');
						$dato["perfiles"] = $this->Perfil_Modelo->getListPerfil($IdEmpresaSesion);
						$dato["permisosPerfil"] = $this->Perfil_Modelo->getListPerfil($IdEmpresaSesion);
					}
				}
 			}
 			$dato["contenedor"] = "empresa/permisosPerfiles_view";
			$this->load->view("plantilla", $dato);			
		}else{
			redirect('inicio');
		}
	}


	public function nuevoPermisoPerfil($IdNombrePerfil=''){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");

			if ($tipoUsuario == "Admin") {
				$this->load->model('Perfil_Modelo');
				$this->load->model('TablasFunciones_Modelo');
				$dato['tablas'] = $this->TablasFunciones_Modelo->getListTablasFunciones($IdEmpresaSesion);	
				$dato["titulo"] = "Nuevo Permiso de Perfil sobre Tabla";
				$dato["accion"] = "Nuevo";
				if ($IdNombrePerfil == null) {
					$dato['perfiles'] = $this->Perfil_Modelo->getListPerfil($IdEmpresaSesion);
				}else{
					$dato['perfiles'] = $this->Perfil_Modelo->getPerfil($IdNombrePerfil, $IdEmpresaSesion);
					$dato["IdPerfil"] = $IdNombrePerfil;
				}
				$dato["contenedor"] = "empresa/permisosPerfil_new_edit";
				$this->load->view('plantilla', $dato);
			}else{
				$perfilSesion = $this->session->userdata("perfilSesion");
				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "permisos", $IdEmpresaSesion);
				if (empty($dato["permisos"])) {
					$this->permisosPerfiles();
				}else{
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('TablasFunciones_Modelo');
						$this->load->model('Perfil_Modelo');
						$dato['tablas'] = $this->TablasFunciones_Modelo->getListTablasFunciones($IdEmpresaSesion);	
						$dato["titulo"] = "Nuevo Permiso de Perfil sobre Tabla";
						$dato["accion"] = "Nuevo";
						if ($IdNombrePerfil == null) {
							$dato['perfiles'] = $this->Perfil_Modelo->getListPerfil($IdEmpresaSesion);
						}else{
							$dato['perfiles'] = $this->Perfil_Modelo->getPerfil($IdNombrePerfil, $IdEmpresaSesion);
							$dato["IdPerfil"] = $IdNombrePerfil;
						}
						$dato["contenedor"] = "empresa/permisosPerfil_new_edit";
						$this->load->view('plantilla', $dato);					
					}else{
						$this->permisosPerfiles();
					}
				}
			}
			
		}else{
			redirect('inicio');
		}
	}

	public function editarPermisoPerfil($IdPerfil, $IdPermiso){
	if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
			if ($tipoUsuario == "Admin") {
				$this->load->model('Permiso_Modelo');
				$this->load->model('Perfil_Modelo');
				$this->load->model('TablasFunciones_Modelo');
				$dato['permisoPerfil'] = $this->Permiso_Modelo->getPermisoRolAccion($IdPerfil, $IdPermiso, $IdEmpresaSesion);
				//$dato['perfiles'] = $this->Perfil_Modelo->getListPerfil($IdEmpresaSesion);
				$dato['perfiles'] = $this->Perfil_Modelo->getPerfil($IdPerfil, $IdEmpresaSesion);
				//$dato['tablas'] = $this->TablasFunciones_Modelo->getListTablasFunciones($IdEmpresaSesion);
				$dato['tablas'] = $this->TablasFunciones_Modelo->getTablaFuncion($dato['permisoPerfil'][0]->IdTabla ,$IdEmpresaSesion);
				$dato['IdPerfil'] = $IdPerfil;
				$dato["titulo"] = "Editar Permiso del Perfil sobre Objetos";   
				$dato["accion"] = "Editar";
				$dato["contenedor"] = "empresa/permisosPerfil_new_edit";
				$this->load->view('plantilla', $dato);
			}else{
				$perfilSesion = $this->session->userdata("perfilSesion");
				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');				
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "permisos", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('Permiso_Modelo');
						$this->load->model('Perfil_Modelo');
						$this->load->model('TablasFunciones_Modelo');
						$dato['permisoPerfil'] = $this->Permiso_Modelo->getPermisoRolAccion($IdPerfil, $IdPermiso, $IdEmpresaSesion);
						//$dato['perfiles'] = $this->Perfil_Modelo->getListPerfil($IdEmpresaSesion);
						$dato['perfiles'] = $this->Perfil_Modelo->getPerfil($IdPerfil, $IdEmpresaSesion);
						//$dato['tablas'] = $this->TablasFunciones_Modelo->getListTablasFunciones($IdEmpresaSesion);
						$dato['tablas'] = $this->TablasFunciones_Modelo->getTablaFuncion($dato['permisoPerfil'][0]->IdTabla ,$IdEmpresaSesion);
						$dato['IdPerfil'] = $IdPerfil;
						$dato["titulo"] = "Editar Permiso del Perfil sobre Objetos";   
						$dato["accion"] = "Editar";
						$dato["contenedor"] = "empresa/permisosPerfil_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->permisosPerfiles();
					}
				}
			}
		}else{
			redirect('inicio');
		}
	}
	
	public function verPermisosPerfil($IdPerfil){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa/administrador" => "Administrador",
			                     $inicioURL."permisos" => "Permisos",
			                     $inicioURL."permisos/permisosPerfiles" => "Perfil-Objeto",
			                     $inicioURL."permisos/verPermisosPerfil/".$IdPerfil."" => "Permisos de Perfil sobre Objetos"
			                    );
 			$dato["ubicacionURL"] = $relativeURL;

 			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Permiso_Modelo');
				$dato["permisosPerfil"] = $this->Permiso_Modelo->getPermisosRol($IdPerfil, $IdEmpresaSesion);
				$dato['IdPerfil'] = $IdPerfil;
				$dato['admin'] = 1;
	 			$dato["contenedor"] = "empresa/permisosPerfil_view";
				$this->load->view("plantilla", $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');				
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "permisos", $IdEmpresaSesion);
				if (empty($dato["permisos"])) {
					$dato["contenedor"] = "empresa/permisosPerfil_view";
					$this->load->view("plantilla", $dato);
				}else{
					//Pregunto si tiene permiso de Actualización
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('Permiso_Modelo');
						$dato["permisosPerfil"] = $this->Permiso_Modelo->getPermisosRol($IdPerfil, $IdEmpresaSesion);
						$dato['IdPerfil'] = $IdPerfil;
			 			$dato["contenedor"] = "empresa/permisosPerfil_view";
						$this->load->view("plantilla", $dato);
					}else{
						$this->permisosPerfiles();
					}
				}
 			}


			
		}else{
			redirect('inicio');
		}	
	}


	public function guardarPermisoPerfil(){
		$accion = $_POST['accion'];
		$id = $_POST['id'];
		$IdPerfil = $_POST['IdPerfil'];
			$this->load->model('Permiso_Modelo');
			$selectTabla = $_POST["selectTabla"];
			$selectPerfil = $_POST["selectPerfil"];
			$selectVer = $_POST["selectVer"];
			$selectAgregar = $_POST["selectAgregar"];
			$selectActualizar = $_POST["selectActualizar"];
			$selectEliminar = $_POST["selectEliminar"];
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($_POST["accion"] == "Editar"){
				$updatePermiso = array(
							'IdTabla' => $selectTabla,
							'IdPerfil' => $selectPerfil,
							'Ver' => $selectVer,
							'Agregar' => $selectAgregar,
							'Actualizar' => $selectActualizar,
							'Eliminar' => $selectEliminar
					);
				if($this->Permiso_Modelo->updatePermiso($id, $updatePermiso, $IdEmpresaSesion)){
					$mensaje = "El Permiso se actualizó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarPermisoPerfil($IdPerfil, $id);			
				}else{
					$mensaje = "El Permiso no se ha actualizado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarPermisoPerfil($IdPerfil, $id);			
				}
			}else{
				$insertPermiso	 = array(
							'IdTabla' => $selectTabla,
							'IdPerfil' => $selectPerfil,
							'Ver' => $selectVer,
							'Agregar' => $selectAgregar,
							'Actualizar' => $selectActualizar,
							'Eliminar' => $selectEliminar
					);				
				if($this->Permiso_Modelo->insertPermiso	($insertPermiso	)){
					$mensaje = "El Permiso se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoPermisoPerfil($IdPerfil);				
				}else{
					$mensaje = "El Permiso no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoPermisoPerfil($IdPerfil);				
				}
			}		
	}
	public function eliminarPermisoPerfil(){
		$this->load->model('Permiso_Modelo');
		$PermisoPerfil 		= json_decode($this->input->post('MiPermisoPerfil'));
		$id          = base64_decode($PermisoPerfil->Id);
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->Permiso_Modelo->deletePermiso($id); 
	}
	/*Permisos Perfil-Indicador*/
	//Seleccionar el Perfil y enviar a permisosIndicadoresPerfil()
	public function seleccionarPerfil(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa/administrador" => "Administrador",
			                     $inicioURL."permisos" => "Permisos",
			                     $inicioURL."permisos/seleccionarPerfil" => "Perfil-Indicador"
			                    );
 			$dato["ubicacionURL"] = $relativeURL;


			$this->load->model('Perfil_Modelo');
			$dato["perfiles"] = $this->Perfil_Modelo->getListPerfil($IdEmpresaSesion);
 			$dato["contenedor"] = "empresa/permisosSelectPerfil_Indicador_view";
			$this->load->view("plantilla", $dato);			
		}else{
			redirect('inicio');
		}
	}
	public function permisosIndicadoresPerfil($idPerfilSeleccionado='', $nombrePerfilSeleccionado=''){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$this->load->model("Perfil_Modelo");
			$this->load->model("Permiso_Modelo");
			//Consultar de IndicadorEmpresa
			//$dato['indicadoresEmpresa'] = $this->IndicadoresEmpresa_Modelo->getListIndicadorCuantitativoSeleccionadosEmpresa($IdEmpresaSesion);
			$dato['indicadoresEmpresa'] = $this->Perfil_Modelo->getListPerfilIndicador($IdEmpresaSesion);
			$dato['idPerfilSeleccionado']= $idPerfilSeleccionado;
			$dato['nombrePerfilSeleccionado']= $nombrePerfilSeleccionado;
			$dato["contenedor"] = "empresa/permisosPerfil_Indicador_view";
			$this->load->view('plantilla', $dato);
		}else{
			redirect('inicio');
		}
	}
	public function nuevoIndicadorPerfil(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$this->load->model("Indicador_Modelo");
			$dato['indicadores'] = $this->Indicador_Modelo->getListIndicador();
			$dato["contenedor"] = "empresa/permisosPerfil_Indicador_view";
			$this->load->view('plantilla', $dato);
		}else{
			redirect('inicio');
		}
	}
	public function guardarPermisosPerfilIndicador(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$idPerfil = $_POST['idPerfil'];
			$nombrePerfil = $_POST['nombrePerfilSeleccionado'];
			//Obtener los ID de los Indicadores seleccionados
			if (isset($_POST['checkPermisoPerfil'])) {
				$indicadoresSeleccionados = $_POST['checkPermisoPerfil'];
				$this->load->model("Permiso_Modelo");
				//Enviar la matriz seleccionada al modelo de carga en Permiso_Modelo						
				$guardarIndicadoresSeleccionados = $this->Permiso_Modelo->insertIndcadorPorPerfil($idPerfil, $indicadoresSeleccionados);				
				if($guardarIndicadoresSeleccionados){					
					$mensaje = "Los Indicadores han sido registrados Correctamente";
					$this->session->set_flashdata('mensaje',$mensaje);
					//redirect('indicador/selectIndicadorCuantitativo');
					$this->permisosIndicadoresPerfil($idPerfil, $nombrePerfil);
				}else{
					$mensaje = "Ningún Indicador ha sido registrado";
					$this->session->set_flashdata('mensaje',$mensaje);
					//redirect('indicador/selectIndicadorCuantitativo');					
					$this->permisosIndicadoresPerfil($idPerfil, $nombrePerfil);
				} 
			}else{
				$mensaje = "Ningún Indicador ha sido seleccionado";
			    $this->session->set_flashdata('mensaje',$mensaje);
				//redirect('indicador/selectIndicadorCuantitativo');
				$this->permisosIndicadoresPerfil($idPerfil, $nombrePerfil);
			}
		}else{
			redirect('inicio');
		}			
	}
	public function indicadoresEmpresa(){
		# code...
	}

	/**
	 *Permisos Especiales Usuario-Tabla
	 */
	public function permisosEspecialesAUsuario(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa/administrador" => "Administrador",			                     
			                     $inicioURL."permisos/permisosEspecialesAUsuario" => "Permisos Especiales"
			                    );
 			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") { 				
				$dato['admin'] = 1;
				$this->load->model('Permiso_Modelo');
				$dato['usuariosEmpresa'] = $this->Permiso_Modelo->getListPermisoEspecialAUsuario($IdEmpresaSesion);
				$dato["contenedor"] = "empresa/permisosEspecialesAUsuario_view";
				$this->load->view("plantilla", $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "permisosEspecialesAUsuario", $IdEmpresaSesion);				
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('Permiso_Modelo');
						$dato['usuariosEmpresa'] = $this->Permiso_Modelo->getListPermisoEspecialAUsuario($IdEmpresaSesion);
						$dato["contenedor"] = "empresa/permisosEspecialesAUsuario_view";
						$this->load->view("plantilla", $dato);
					}else{
						$dato["contenedor"] = "empresa/permisosEspecialesAUsuario_view";
						$this->load->view("plantilla", $dato);
					}
				}else{
					$dato["contenedor"] = "empresa/permisosEspecialesAUsuario_view";
					$this->load->view("plantilla", $dato);
				}
 			}						
		}else{
			redirect('inicio');
		}
	}
	public function verPermisosEspecialesAUsuario($IdUsuarioEmpresa){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa/administrador" => "Administrador",			                     
			                     $inicioURL."permisos/permisosEspecialesAUsuario" => "Permisos Especiales",
			                     $inicioURL."permisos/verPermisosEspecialesAUsuario/".$IdUsuarioEmpresa."" => "Permisos Especiales por Usuario"
			                    );
 			$dato["ubicacionURL"] = $relativeURL;

 			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Permiso_Modelo');
				$dato['admin'] = 1;
				$dato["usuarioEmpresa"] = $this->Permiso_Modelo->getPermisoEspecialAUsuario($IdUsuarioEmpresa, $IdEmpresaSesion);
				$dato['IdUsuarioEmpresa'] = $IdUsuarioEmpresa;
	 			$dato["contenedor"] = "empresa/verPermisosEspecialesUsuario_view";
				$this->load->view("plantilla", $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');				
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "permisosEspecialesAUsuario", $IdEmpresaSesion);
				if (empty($dato["permisos"])) {
					$dato["contenedor"] = "empresa/verPermisosEspecialesUsuario_view";
					$this->load->view("plantilla", $dato);
				}else{
					//Pregunto si tiene permiso de Actualización
					if ($dato["permisos"][0]->Ver == 1) {
						$dato["usuarioEmpresa"] = $this->Permiso_Modelo->getPermisoEspecialAUsuario($IdUsuarioEmpresa, $IdEmpresaSesion);
						$dato['IdUsuarioEmpresa'] = $IdUsuarioEmpresa;
			 			$dato["contenedor"] = "empresa/verPermisosEspecialesUsuario_view";
						$this->load->view("plantilla", $dato);
					}else{
						$this->permisosEspecialesAUsuario();
					}
				}
 			}			
		}else{
			redirect('inicio');
		}	
	}
	public function nuevoPermisoEspecialUsuario($IdUsuarioEmpresa=''){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
			if ($tipoUsuario == "Admin") {
				$this->load->model('UsuarioEmpresa_Modelo');
				$this->load->model('TablasFunciones_Modelo');
				$this->load->model('Permiso_Modelo');
				$dato["admin"] = 1;
				$dato['tablas'] = $this->TablasFunciones_Modelo->getListTablasFunciones($IdEmpresaSesion);	
				$dato["titulo"] = "Nuevo Permiso Especial para el Usuarios";
				$dato["accion"] = "Nuevo";
				if ($IdUsuarioEmpresa == null) {
					$dato['usuariosEmpresa'] = $this->UsuarioEmpresa_Modelo->getListUsuario($IdEmpresaSesion);
					$dato['permisosusuariosEmpresa'] = $this->Permiso_Modelo->getListPermisoEspecialAUsuario($IdEmpresaSesion);
				}else{
					$dato['usuariosEmpresa'] = $this->UsuarioEmpresa_Modelo->getOneEditUsuario($IdUsuarioEmpresa ,$IdEmpresaSesion);
					$dato['permisosusuariosEmpresa'] = $this->Permiso_Modelo->getListPermisoEspecialAUsuario($IdEmpresaSesion);
					$dato["IdUsuarioEmpresa"] = $IdUsuarioEmpresa;
					//print_r($dato['usuariosEmpresa']);
				}
				$dato["contenedor"] = "empresa/permisosEspecialesAUsuario_new_edit";
				$this->load->view('plantilla', $dato);
			}else{
				$perfilSesion = $this->session->userdata("perfilSesion");
				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "permisosEspecialesAUsuario", $IdEmpresaSesion);
				if (empty($dato["permisos"])) {
					$this->permisosEspecialesAUsuario();
				}else{
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('UsuarioEmpresa_Modelo');
						$this->load->model('TablasFunciones_Modelo');
						$this->load->model('Permiso_Modelo');
						$dato['tablas'] = $this->TablasFunciones_Modelo->getListTablasFunciones($IdEmpresaSesion);	
						$dato["titulo"] = "Nuevo Permiso Especial para el Usuarios";
						$dato["accion"] = "Nuevo";
						if ($IdUsuarioEmpresa == null) {
							$dato['usuariosEmpresa'] = $this->UsuarioEmpresa_Modelo->getListUsuario($IdEmpresaSesion);
							$dato['permisosusuariosEmpresa'] = $this->Permiso_Modelo->getListPermisoEspecialAUsuario($IdEmpresaSesion);
						}else{
							$dato['usuariosEmpresa'] = $this->UsuarioEmpresa_Modelo->getOneEditUsuario($IdUsuarioEmpresa ,$IdEmpresaSesion);
							$dato['permisosusuariosEmpresa'] = $this->Permiso_Modelo->getListPermisoEspecialAUsuario($IdEmpresaSesion);
							$dato["IdUsuarioEmpresa"] = $IdUsuarioEmpresa;
							//print_r($dato['usuariosEmpresa']);
						}
						$dato["contenedor"] = "empresa/permisosEspecialesAUsuario_new_edit";
						$this->load->view('plantilla', $dato);					
					}else{
						$this->permisosEspecialesAUsuario();
					}
				}
			}
			
		}else{
			redirect('inicio');
		}
	}
	public function editarPermisoEspecialUsuario($IdPermisoEspecial, $IdUsuarioEmpresa){
	if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
			if ($tipoUsuario == "Admin") {
				$dato["admin"] = 1;
				$this->load->model('Permiso_Modelo');
				$this->load->model('UsuarioEmpresa_Modelo');
				$this->load->model('TablasFunciones_Modelo');
				$dato['permisosUsuariosEmpresa'] = $this->Permiso_Modelo->getPermisoEspecialAUsuarioEdit($IdPermisoEspecial, $IdUsuarioEmpresa, $IdEmpresaSesion);
				//print_r($dato['permisosUsuariosEmpresa']);
				$dato['usuariosEmpresa'] = $this->UsuarioEmpresa_Modelo->getOneEditUsuario($dato['permisosUsuariosEmpresa'][0]->IdUsuario ,$IdEmpresaSesion);	
				$dato['tablas'] = $this->TablasFunciones_Modelo->getTablaFuncion($dato['permisosUsuariosEmpresa'][0]->IdTabla ,$IdEmpresaSesion);
				$dato['IdUsuarioEmpresa'] = $IdUsuarioEmpresa;
				$dato['IdPermisoEspecial'] = $IdPermisoEspecial;
				$dato["titulo"] = "Editar Permiso de Usuario sobre Tabla";   
				$dato["accion"] = "Editar";
				$dato["contenedor"] = "empresa/permisosEspecialesAUsuario_new_edit";
				$this->load->view('plantilla', $dato);
			}else{
				$perfilSesion = $this->session->userdata("perfilSesion");
				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');				
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "permisosEspecialesAUsuario", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('Permiso_Modelo');
						$this->load->model('UsuarioEmpresa_Modelo');
						$this->load->model('TablasFunciones_Modelo');
						$dato['permisosUsuariosEmpresa'] = $this->Permiso_Modelo->getPermisoEspecialAUsuarioEdit($IdPermisoEspecial, $IdUsuarioEmpresa, $IdEmpresaSesion);
						//print_r($dato['permisosUsuariosEmpresa']);
						$dato['usuariosEmpresa'] = $this->UsuarioEmpresa_Modelo->getOneEditUsuario($dato['permisosUsuariosEmpresa'][0]->IdUsuario ,$IdEmpresaSesion);	
						$dato['tablas'] = $this->TablasFunciones_Modelo->getTablaFuncion($dato['permisosUsuariosEmpresa'][0]->IdTabla ,$IdEmpresaSesion);
						$dato['IdUsuarioEmpresa'] = $IdUsuarioEmpresa;
						$dato['IdPermisoEspecial'] = $IdPermisoEspecial;
						$dato["titulo"] = "Editar Permiso de Usuario sobre Tabla";   
						$dato["accion"] = "Editar";
						$dato["contenedor"] = "empresa/permisosEspecialesAUsuario_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->permisosEspecialesAUsuario();
					}
				}
			}
		}else{
			redirect('inicio');
		}
	}
	public function guardarPermisoEspecialUsuario(){
		$accion = $_POST['accion'];
		$id = $_POST['id'];
		$IdUsuarioEmpresa = $_POST['IdUsuarioEmpresa'];	
			$this->load->model('Permiso_Modelo');
			$selectTabla = $_POST["selectTabla"];
			$selectUsuario = $_POST["selectUsuario"];
			$selectVer = $_POST["selectVer"];
			$selectAgregar = $_POST["selectAgregar"];
			$selectActualizar = $_POST["selectActualizar"];
			$selectEliminar = $_POST["selectEliminar"];
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($_POST["accion"] == "Editar"){
				$updatePermisoEspecialUser = array(
							'IdTabla' => $selectTabla,
							'IdUsuario' => $selectUsuario,
							'Ver' => $selectVer,
							'Agregar' => $selectAgregar,
							'Actualizar' => $selectActualizar,
							'Eliminar' => $selectEliminar
							);
				//echo "guardarPermisoEspecialUsuario a  permisosEspecialesAUsuario(".$IdUsuarioEmpresa.")"."<br>";
				//print_r($updatePermisoEspecialUser);				
				if($this->Permiso_Modelo->updatePermisoEspecialUsuario($id, $updatePermisoEspecialUser, $IdEmpresaSesion)){
					$mensaje = "El Permiso Especial del Usuario se actualizó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					if (empty($IdUsuarioEmpresa)) {
						$this->permisosEspecialesAUsuario();
					}else{
						$this->verPermisosEspecialesAUsuario($IdUsuarioEmpresa);
					}
				}else{
					$mensaje = "El Permiso Especial del Usuario no se ha actualizado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					if (empty($IdUsuarioEmpresa)) {
						$this->permisosEspecialesAUsuario();
					}else{
						$this->verPermisosEspecialesAUsuario($IdUsuarioEmpresa);
					}
				}				
			}else{
				$insertPermisoEspecialUser	 = array(
							'IdTabla' => $selectTabla,
							'IdUsuario' => $selectUsuario,
							'Ver' => $selectVer,
							'Agregar' => $selectAgregar,
							'Actualizar' => $selectActualizar,
							'Eliminar' => $selectEliminar
							);
				//echo "guardarPermisoEspecialUsuario a  permisosEspecialesAUsuario(".$IdUsuarioEmpresa.")"."<br>";
				//print_r($insertPermisoEspecialUser);
				if($this->Permiso_Modelo->insertPermisoEspecialUsario($insertPermisoEspecialUser)){
					$mensaje = "El Permiso Especial del Usuario se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					if (empty($IdUsuarioEmpresa)) {
						$this->permisosEspecialesAUsuario();
					}else{
						$this->verPermisosEspecialesAUsuario($IdUsuarioEmpresa);
					}
				}else{
					$mensaje = "El Permiso Especial del Usuario no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoPermisoEspecialUsuario($IdUsuarioEmpresa);
				}
			}
	}
	public function eliminarPermisoEspecialsuario(){
		$this->load->model('Permiso_Modelo');
		$MiPermisoEspecialUsuario 		= json_decode($this->input->post('MiPermisoEspecialUsuario'));
		$id          = base64_decode($MiPermisoEspecialUsuario->Id);		
		$this->Permiso_Modelo->deletePermisoEspecialUsuario($id); 
	}


}
 ?>