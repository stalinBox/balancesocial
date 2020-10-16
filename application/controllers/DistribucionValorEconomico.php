<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class distribucionValorEconomico extends CI_Controller{

	function __construct(){
		parent::__construct();			
	}
	/*
	function index(){				 
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/implicacionEconomica" => "Implicación Económica",
			                     $inicioURL."distribucionValorEconomico" => "Distribución del Valor Económico"			                     
			                    );
			$this->load->model('DistribucionValorEconomico_Modelo');
			$dato['distribucionValorEconomico'] = $this->DistribucionValorEconomico_Modelo->getListDistribucionValorEconomico($IdEmpresaSesion);
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "distribucionValorEconomico/distribucionValorEconomico_view";
			$this->load->view('plantilla', $dato);
		}else{
			redirect('inicio');
		}
	}*/
	public function distribucionesValorEconomico(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/implicacionEconomica" => "Implicación Económica",
			                     $inicioURL."distribucionValorEconomico/distribucionesValorEconomico" => "Distribución del Valor Económico"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('DistribucionValorEconomico_Modelo');
				$dato['distribucionValorEconomico'] = $this->DistribucionValorEconomico_Modelo->getListDistribucionValorEconomico($IdEmpresaSesion);
				$dato["admin"] = 1;
				$dato["contenedor"] = "distribucionValorEconomico/distribucionValorEconomico_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "distribucionesValorEconomico", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('DistribucionValorEconomico_Modelo');
						$dato['distribucionValorEconomico'] = $this->DistribucionValorEconomico_Modelo->getListDistribucionValorEconomico($IdEmpresaSesion);
						$dato["contenedor"] = "distribucionValorEconomico/distribucionValorEconomico_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "distribucionValorEconomico/distribucionValorEconomico_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "distribucionValorEconomico/distribucionValorEconomico_view";
					$this->load->view('plantilla', $dato);
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function editarDistribucionesValorEconomico($IdDVE){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('DistribucionValorEconomico_Modelo');
				$dato['distribucionValorEconomico'] = $this->DistribucionValorEconomico_Modelo->getDistribucionValorEconomico($IdDVE, $IdEmpresaSesion);
				$dato["titulo"] = "Editar Distribución de Valor Económico";   
				$dato["accion"] = "Editar";
				$dato["contenedor"] = "distribucionValorEconomico/distribucionValorEconomico_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "distribucionesValorEconomico", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('DistribucionValorEconomico_Modelo');
						$dato['distribucionValorEconomico'] = $this->DistribucionValorEconomico_Modelo->getDistribucionValorEconomico($IdDVE, $IdEmpresaSesion);
						$dato["titulo"] = "Editar Distribución de Valor Económico";   
						$dato["accion"] = "Editar";
						$dato["contenedor"] = "distribucionValorEconomico/distribucionValorEconomico_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->distribucionesValorEconomico();
					}
				}else{
					$this->distribucionesValorEconomico();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function nuevoDistribucionesValorEconomico(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");

		$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$dato["titulo"] = "Nueva Distribución de Valor Económico";
				$dato["accion"] = "Nuevo";
				$dato["contenedor"] = "distribucionValorEconomico/distribucionValorEconomico_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "distribucionesValorEconomico", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$dato["titulo"] = "Nueva Distribución de Valor Económico";
						$dato["accion"] = "Nuevo";
						$dato["contenedor"] = "distribucionValorEconomico/distribucionValorEconomico_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->distribucionesValorEconomico();
					}
				}else{
					$this->distribucionesValorEconomico();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function guardarDistribucionesValorEconomico(){
		$this->form_validation->set_rules('txtSubTipo','Organización','trim|required'); 		
		$this->form_validation->set_rules('txtNombreCuenta','Nombre del Acuerdo','trim|required'); 		
		$this->form_validation->set_rules('txtSaldo','Fecha de Planificación','trim|required'); 		
		$this->form_validation->set_rules('txtFechaMes','Costo planificado','trim|required'); 		
		$this->form_validation->set_rules('txtPeriodo','Periodo','trim|required|integer'); 		
		$accion = $_POST['accion'];
		$id = $_POST['id']; 
		if ($this->form_validation->run() == false) {
			if ($accion == "Nuevo") {
				$this->nuevoDistribucionesValorEconomico();		
			}else{
				$this->editarDistribucionesValorEconomico($id);					
			}
		}else{
			$this->load->model('DistribucionValorEconomico_Modelo');
			$tiempo = time();
				$selectTipoDistribucion = $_POST["selectTipoDistribucion"];
				$txtSubTipo = $_POST["txtSubTipo"];				
				$txtNombreCuenta = $_POST["txtNombreCuenta"];
				$txtSaldo = $_POST["txtSaldo"];
				$txtFechaMes = $_POST["txtFechaMes"];
				$txtPeriodo = $_POST["txtPeriodo"];
				$txtFechaSistema = date("Y-m-d H:i:s", $tiempo);				
				$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($accion == "Editar"){
				$updateDVE = array(
					'TipoDistribucion' => $selectTipoDistribucion,
					'SubTipoDistribucion' => $txtSubTipo,
					'NombreSubCuenta' => $txtNombreCuenta,
					'Saldo' => $txtSaldo,
					'FechaMes' => $txtFechaMes,
					'Periodo' => $txtPeriodo,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->DistribucionValorEconomico_Modelo->updateDistribucionValorEconomico($id, $updateDVE, $IdEmpresaSesion)){
					$mensaje = "La Distribución se actualizó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarDistribucionesValorEconomico($id);				
				}else{
					$mensaje = "La Distribución no se ha actualizado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarDistribucionesValorEconomico($id);				
				}
			}else{
				$insertDVE = array(
					'TipoDistribucion' => $selectTipoDistribucion,
					'SubTipoDistribucion' => $txtSubTipo,
					'NombreSubCuenta' => $txtNombreCuenta,
					'Saldo' => $txtSaldo,
					'FechaMes' => $txtFechaMes,
					'Periodo' => $txtPeriodo,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->DistribucionValorEconomico_Modelo->insertDistribucionValorEconomico($insertDVE)){
					$mensaje = "La Distribución se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoDistribucionesValorEconomico();				
				}else{
					$mensaje = "La Distribución no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoDistribucionesValorEconomico();				
				}
			}
		}
	}
	public function eliminarDistribucionValorEconomico(){
		$this->load->model('DistribucionValorEconomico_Modelo'); 		          	
		$id = $_POST['IdDV'];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		 $this->DistribucionValorEconomico_Modelo->deleteDistribucionValorEconomico($id, $IdEmpresaSesion); 
	}
	
}

?>