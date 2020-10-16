<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//Controlador 
class donacion extends CI_Controller {

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
			                     $inicioURL."planificacionRSE/actosContractuales" => "Actos Contractuales",
			                     $inicioURL."donacion" => "Donaciones"
			                    );
			$this->load->model('Donacion_Modelo');
			$dato['donaciones'] = $this->Donacion_Modelo->getListDonacion($IdEmpresaSesion);
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "donaciones/donaciones_view";
			$this->load->view("plantilla", $dato);
		}else{
			redirect('inicio');
		}		
	}
	*/
	/**
	 * 
	 */
	public function donaciones(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/actosContractuales" => "Actos Contractuales",
			                     $inicioURL."donacion/donaciones" => "Donaciones"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Donacion_Modelo');
				$dato['admin'] = 1;
				$dato['donaciones'] = $this->Donacion_Modelo->getListDonacion($IdEmpresaSesion);
				$dato["contenedor"] = "donaciones/donaciones_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "donaciones", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('Donacion_Modelo');
						$dato['donaciones'] = $this->Donacion_Modelo->getListDonacion($IdEmpresaSesion);
						$dato["contenedor"] = "donaciones/donaciones_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "donaciones/donaciones_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "donaciones/donaciones_view";
					$this->load->view('plantilla', $dato);
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function nuevaDonacion(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Donacion_Modelo');
				$dato['donaciones'] = $this->Donacion_Modelo->getListDonacion($IdEmpresaSesion);  
				$dato["titulo"] = "Nueva Donación";
				$dato["accion"] = "Nuevo";
				$dato["contenedor"] = "donaciones/donaciones_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "donaciones", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('Donacion_Modelo');
						$dato['donaciones'] = $this->Donacion_Modelo->getListDonacion($IdEmpresaSesion);  
						$dato["titulo"] = "Nuev Donación";
						$dato["accion"] = "Nuevo";
						$dato["contenedor"] = "donaciones/donaciones_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->donaciones();
					}
				}else{
					$this->donaciones();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function editarDonacion($IdDonacion){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
			 if ($tipoUsuario == "Admin") {
 				$this->load->model('Donacion_Modelo');
				$dato['donacion'] = $this->Donacion_Modelo->getDonacion($IdDonacion, $IdEmpresaSesion);
				$dato["titulo"] = "Editar Donación";   
				$dato["accion"] = "Editar";	
				$dato["contenedor"] = "donaciones/donaciones_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "donaciones", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('Donacion_Modelo');
						$dato['donacion'] = $this->Donacion_Modelo->getDonacion($IdDonacion, $IdEmpresaSesion);    
						$dato["titulo"] = "Editar Donación";   
						$dato["accion"] = "Editar";	
						$dato["contenedor"] = "donaciones/donaciones_new_edit";
						$this->load->view('plantilla', $dato);	
					}else{
						$this->donaciones();
					}
				}else{
					$this->donaciones();
				}
 			}					
		}else{
			redirect('inicio');
		}
	}
	public function guardarDonacion(){
		$this->form_validation->set_rules('txtNombreBenficiario','Nombre del Beneficiario','trim|required'); 		
		$this->form_validation->set_rules('txtMonto','Monto','trim|required');	
		$this->form_validation->set_rules('txtFechaMes','Fecha del Mes','trim|required');
		$this->form_validation->set_rules('txtPeriodo','Periodo','trim|required|integer');
		$accion = $_POST['accion'];
		$id = $_POST['id'];		
		if ($this->form_validation->run() == false) {
			if ($accion == "Editar") {
				$this->editarDonacion($id);
			}else{
				$this->nuevaDonacion();
			}
		}else{
			$this->load->model('Donacion_Modelo');			
			$tiempo = time();
			$txtNombreBenficiario = $_POST["txtNombreBenficiario"];
			$txtMonto = $_POST["txtMonto"];			
			$selectTipoDonacion = $_POST["selectTipoDonacion"];
			$selectFormaDonacion = $_POST["selectFormaDonacion"];
			$txtObjetivoDonacion = $_POST["txtObjetivoDonacion"];
			$txtFechaMes = $_POST["txtFechaMes"];
			$txtPeriodo = $_POST["txtPeriodo"];
			$txtFechaSistema = date("Y-m-d H:i:s", $tiempo);
			if(!empty($_FILES['inputFoto']['tmp_name']) && file_exists($_FILES['inputFoto']['tmp_name'])) {				
				$imagen= addslashes(file_get_contents($_FILES['inputFoto']['tmp_name']));
			}else{
				$imagen = "";
			}		
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($_POST["accion"] == "Editar"){
				$updateDonacion = array(					
					'Beneficiario' => $txtNombreBenficiario,
					'MontoDonacion' => $txtMonto,					
					'TipoDonacion' => $selectTipoDonacion,
					'FormaDonacion' => $selectFormaDonacion,
					'ObjetivoDonacion' => $txtObjetivoDonacion,
					'Imagen' => $imagen,
					'FechaMes' => $txtFechaMes,
					'Periodo' => $txtPeriodo,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->Donacion_Modelo->updateDonacion($id, $updateDonacion, $IdEmpresaSesion)){
					$mensaje = "La Donación se actualizó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarDonacion($id);
				}else{
					$mensaje = "La Donación no se ha actualizado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarDonacion($id);
				}
			}else{
				$insertDonacion = array(
					'Beneficiario' => $txtNombreBenficiario,
					'MontoDonacion' => $txtMonto,					
					'TipoDonacion' => $selectTipoDonacion,
					'FormaDonacion' => $selectFormaDonacion,
					'ObjetivoDonacion' => $txtObjetivoDonacion,
					'Imagen' => $imagen,
					'FechaMes' => $txtFechaMes,
					'Periodo' => $txtPeriodo,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->Donacion_Modelo->insertDonacion($insertDonacion)){
					$mensaje = "La Donación se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevaDonacion();				
				}else{
					$mensaje = "La Donación no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevaDonacion();				
				}
			}
		}
	}
	public function eliminarDonacion(){
		$this->load->model('Donacion_Modelo'); 		          	
		$id  = $_POST['IdDonacion'];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->Donacion_Modelo->deleteDonacion($id, $IdEmpresaSesion); 
	}

	
}

?>