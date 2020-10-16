<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class permisosComponentes extends CI_Controller {
	
	function __construct(){
		parent::__construct();
	}


	public function index(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa/administrador" => "Administrador",
			                     $inicioURL."permisos" => "Permisos",
			                     $inicioURL."permisosComponentes" => "Permisos Componentes"
			                    );
 			$dato["ubicacionURL"] = $relativeURL;
 			$dato["contenedor"] = "permisoComponentes/moduloComponentes";
			$this->load->view("plantilla", $dato);			
		}else{
			redirect('inicio');
		}
	}

	public function guardarComponente(){
		//Validar campos	
		$this->form_validation->set_rules('txtNombreComponente','txtNombreComponente','trim|required'); 
		$this->form_validation->set_rules('txtIdComponente','txtIdComponente','trim|required');
		$this->form_validation->set_rules('cbxTipComponente','cbxTipComponente','trim');
		$this->form_validation->set_rules('txtDscComponente','txtDscComponente','trim');

		//Mensajes de validacion
		$this->form_validation->set_message('required', 'Campo %s es obligatorio');
		$this->form_validation->set_message('required', 'Campo %s es obligatorio');

		$accion = $_POST['accion'];
		$id = $_POST['id'];

		if($this->form_validation->run() == false){
			if ($accion == "Nuevo") {
				$this->nuevoComponente();				
			}else{
				$this->editarComponente($id);					
			}
		}else{
			$this->load->model('Componentes_Modelo');
			$txtNombreComponente = $_POST["txtNombreComponente"];
			$txtIdComponente = $_POST["txtIdComponente"];
			$cbxTipComponente = $_POST["cbxTipComponente"];
			$txtDscComponente = $_POST["txtDscComponente"];
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			
			if ($accion=="Nuevo") {
					$registroComponente = array(
						'txtNombreComponente' => $txtNombreComponente,
						'txtIdComponente' => $txtIdComponente,
						'cbxTipComponente' => $cbxTipComponente,
						'txtDscComponente' => $txtDscComponente,
						'idEmpresa' => $IdEmpresaSesion
						);
					$IdInsertado = $this->Componentes_Modelo->insertComponente($registroComponente);
						//Variable temporal para mostrar al usuarios de éxito en el update
					$mensaje = "El componente has sido insertado con éxito :$IdInsertado";
					$this->session->set_flashdata("mensaje", $mensaje);
					$this->nuevoComponente();
				}else{ 
					$id = $_POST['id'];
					$updateEmpresa = array(
						'txtNombreComponente' => $txtNombreComponente,
						'txtIdComponente' => $txtIdComponente,
						'cbxTipComponente' => $cbxTipComponente,
						'txtDscComponente' => $txtDscComponente,
						'idEmpresa' => $IdEmpresaSesion
						);
					if($this->Componentes_Modelo->updateComponente($updateEmpresa, $IdEmpresa)){
						$mensaje = "Los datos han sido actualizados con éxito";
						$this->session->set_flashdata("mensaje", $mensaje);
						$this->editarComponente($id);
					}else{
						$mensaje = "El Componente no se ha modificado, verfique los datos ingresados";
						$this->session->set_flashdata('mensaje',$mensaje);				
						$this->editarComponente($id);
					}
			}
		}
	}


	public function editarComponente($IdEditar){

		if($this->session->userdata("IdEmpresaSesion")){
					$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
					$tipoUsuario = $this->session->userdata("tipoUsuario");
					if ($tipoUsuario == "Admin") {
						$this->load->model('Componentes_Modelo');
						$dato['usuarioEmpresa'] = $this->Componentes_Modelo->getOneEditComponente($IdEditar, $IdEmpresaSesion);					
						$dato["titulo"] = "Editar Componente";
						$dato["accion"] = "Editar";
						$dato["contenedor"] = "permisoComponentes/moduloComponentes";
						$this->load->view('plantilla', $dato);
					}else{

						// Añadir codigo faltante
					}
				}else{
					redirect('inicio');
				}

	}


	public function nuevoComponente(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
			if ($tipoUsuario == "Admin") {
				$this->load->model('Componentes_Modelo');
				$dato["titulo"] = "Ingresar Componentes";
				$dato["accion"] = "Nuevo";
				$componentes = array("input","button","div","file","ComboBox","form");	
				$dato["componentes"]= $componentes;
				$dato["contenedor"] = "permisoComponentes/componentes_new_edit";
				$this->load->view('plantilla', $dato);
			}else{
				$perfilSesion = $this->session->userdata("perfilSesion");
				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
			}
			
		}else{
			redirect('inicio');
		}
	}

	public function listarComponentes(){

		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa/administrador" => "Administrador",
			                     $inicioURL."permisos" => "Permisos",
			                     $inicioURL."permisosComponentes" => "Permisos Componentes",
			                     $inicioURL."permisosComponentes/listarComponentes" => "Añadir Componentes",
			                    );
 			$dato["ubicacionURL"] = $relativeURL;

 			//Obtengo el tipo de usuario y pregunto
 			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Componentes_Modelo');
				$dato["listaComponentes"] = $this->Componentes_Modelo->getListComponentes($IdEmpresaSesion);
	 			$dato['admin'] = 1;
 			}else{
 				//Obtengo el Id del Perfil
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");

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
 			$dato["contenedor"] = "permisoComponentes/componentes_view";
			$this->load->view("plantilla", $dato);			
		}else{
			redirect('inicio');
		}

	}

	public function listarPermisosComp(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa/administrador" => "Administrador",
			                     $inicioURL."permisos" => "Permisos",
			                     $inicioURL."permisosComponentes" => "Permisos Componentes",
			                     $inicioURL."permisosComponentes/listarPermisosComp" => "Configurar Acceso",
			                    );
 			$dato["ubicacionURL"] = $relativeURL;

 			//Obtengo el tipo de usuario y pregunto
 			$resultado = array();
 			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('PermisoComp_Modelo');
				 $resultado = $this->PermisoComp_Modelo->getListPermisoComponentes($IdEmpresaSesion);
				 $dato["listaPermisoComponentes"] = $resultado;
	 			$dato['admin'] = 1;
 			}else{
 			}
 			$dato["contenedor"] = "permisoComponentes/permisoComponentes_view";
			$this->load->view("plantilla", $dato);
		}else{
			redirect('inicio');
		}
	}

	public function editarPermisoComp($IdEditar){
		if($this->session->userdata("IdEmpresaSesion")){
					$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
					$tipoUsuario = $this->session->userdata("tipoUsuario");
					if ($tipoUsuario == "Admin") {
						$this->load->model('Componentes_Modelo');
						$dato['usuarioEmpresa'] = $this->Componentes_Modelo->getOneEditComponente($IdEditar, $IdEmpresaSesion);					
						$dato["titulo"] = "Editar Permisos del Componente";
						$dato["accion"] = "Editar";
						$dato["contenedor"] = "permisoComponentes/permisoComponentes_view";
						$this->load->view('plantilla', $dato);
					}else{

						// Añadir codigo faltante
					}
				}else{
					redirect('inicio');
				}
	}


	public function nuevoPermisoComp(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");

			$this->load->model('Permiso_Modelo');
			$this->load->model('Componentes_Modelo');

			if ($tipoUsuario == "Admin") {
				$dato["titulo"] = "Agregar Nuevo Acceso a Componentes";
				$dato["accion"] = "Nuevo";

				$dato['permisoRol'] = $this->Permiso_Modelo->getlistPermisoRol($IdEmpresaSesion);
				$dato['componentes'] = $this->Componentes_Modelo->getListComponentes($IdEmpresaSesion);

				$habilitar = array("No","Si");
				$dato['habilitar'] = $habilitar;
				$dato["contenedor"] = "permisoComponentes/permisoComponentes_new_edit";
				$this->load->view('plantilla', $dato);
			}else{
				$perfilSesion = $this->session->userdata("perfilSesion");
				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");

				//ANADIR CODIGO FALTANTE
			}
			
		}else{
			redirect('inicio');
		}
	}

	public function guardarPermisoComponente(){
		//Validar campos	
		$this->form_validation->set_rules('selectPerfil','selectPerfil','trim|required'); 
		$this->form_validation->set_rules('selectIdComponent','selectIdComponent','trim|required');
		$this->form_validation->set_rules('selectHabilitar','selectHabilitar','trim');

		//Mensajes de validacion
		$this->form_validation->set_message('required', 'Campo %s es obligatorio');
		$this->form_validation->set_message('required', 'Campo %s es obligatorio');

		$accion = $_POST['accion'];
		$id = $_POST['id'];

		if($this->form_validation->run() == false){
			if ($accion == "Nuevo") {
				$this->nuevoPermisoComp();				
			}else{
				$this->editarPermisoComp($id);					
			}
		}else{
			$this->load->model('PermisoComp_Modelo');
			$selectPerfil = $_POST["selectPerfil"];
			$selectIdComponent = $_POST["selectIdComponent"];
			$selectHabilitar = $_POST["selectHabilitar"];
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			
			if ($accion=="Nuevo") {
					$registroPermisoComponente = array(
						'selectPerfil' => $selectPerfil,
						'selectIdComponent' => $selectIdComponent,
						'selectHabilitar' => $selectHabilitar,
						'idEmpresa' => $IdEmpresaSesion
						);
					$IdInsertado = $this->PermisoComp_Modelo->insertPermisoComponente($registroPermisoComponente);
						//Variable temporal para mostrar al usuarios de éxito en el update
					$mensaje = "El componente has sido insertado con éxito :$IdInsertado";
					$this->session->set_flashdata("mensaje", $mensaje);
					$this->nuevoPermisoComp();
				}else{ 
					$id = $_POST['id'];
					$UpdatePermisoComponente = array(
						'selectPerfil' => $selectPerfil,
						'selectIdComponent' => $selectIdComponent,
						'selectHabilitar' => $selectHabilitar,
						'idEmpresa' => $IdEmpresaSesion
						);
					if($this->PermisoComp_Modelo->updatePermisoComponente($UpdatePermisoComponente, $IdEmpresa)){
						$mensaje = "Los datos han sido actualizados con éxito";
						$this->session->set_flashdata("mensaje", $mensaje);
						$this->editarPermisoComp($id);
					}else{
						$mensaje = "El Componente no se ha modificado, verfique los datos ingresados";
						$this->session->set_flashdata('mensaje',$mensaje);				
						$this->editarPermisoComp($id);
					}
			}
		}
	}

}

?>