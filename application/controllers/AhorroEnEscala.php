<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class ahorroEnEscala extends CI_Controller{
	
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
			                     $inicioURL."planificacionRSE/actosContractuales" => "Público Externo",
			                     $inicioURL."Proveedor" => "Proveedores",
			                     $inicioURL."ahorroEnEscala" => "Economías de Escala"
			                    );
			$this->load->model('AhorroEnEscala_Modelo');
			$dato['ahorroEnEscala'] = $this->AhorroEnEscala_Modelo->getListAhorroEnEscala($IdEmpresaSesion);
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "ahorroEnEscala/ahorroEnEscala_view";
			$this->load->view('plantilla', $dato);
		}else{
			redirect('inicio');
		}
	}
	*/
	public function ahorrosEnEscala(){				 
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/actosContractuales" => "Público Externo",
			                     $inicioURL."Proveedor" => "Proveedores",
			                     $inicioURL."ahorroEnEscala/ahorrosEnEscala" => "Economías de Escala"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('AhorroEnEscala_Modelo');
				$dato['ahorroEnEscala'] = $this->AhorroEnEscala_Modelo->getListAhorroEnEscala($IdEmpresaSesion);
				$dato["admin"] = 1;
				$dato["contenedor"] = "ahorroEnEscala/ahorroEnEscala_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "ahorrosEnEscala", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('AhorroEnEscala_Modelo');
						$dato['ahorroEnEscala'] = $this->AhorroEnEscala_Modelo->getListAhorroEnEscala($IdEmpresaSesion);
						$dato["contenedor"] = "ahorroEnEscala/ahorroEnEscala_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "ahorroEnEscala/ahorroEnEscala_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "ahorroEnEscala/ahorroEnEscala_view";
					$this->load->view('plantilla', $dato);
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function editarAhorroEnEscala($IdAhorro){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('AhorroEnEscala_Modelo');
				$dato['ahorroEnEscala'] = $this->AhorroEnEscala_Modelo->getAhorroEnEscala($IdAhorro, $IdEmpresaSesion);			
				$dato["titulo"] = "Editar Ahorro en Escala";   
				$dato["accion"] = "Editar";
				$dato["contenedor"] = "ahorroEnEscala/ahorroEnEscala_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "ahorrosEnEscala", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('AhorroEnEscala_Modelo');
						$dato['ahorroEnEscala'] = $this->AhorroEnEscala_Modelo->getAhorroEnEscala($IdAhorro, $IdEmpresaSesion);			
						$dato["titulo"] = "Editar Ahorro en Escala";   
						$dato["accion"] = "Editar";
						$dato["contenedor"] = "ahorroEnEscala/ahorroEnEscala_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->ahorrosEnEscala();
					}
				}else{
					$this->ahorrosEnEscala();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function nuevoAhorroEnEscala(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('AhorroEnEscala_Modelo');
				$dato['acuerdosEmpresa'] = $this->AhorroEnEscala_Modelo->getListAhorroEnEscala($IdEmpresaSesion);			
				$dato["titulo"] = "Nuevo Ahorro en Escala";
				$dato["accion"] = "Nuevo";
				$dato["contenedor"] = "ahorroEnEscala/ahorroEnEscala_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "ahorrosEnEscala", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('AhorroEnEscala_Modelo');
						$dato['acuerdosEmpresa'] = $this->AhorroEnEscala_Modelo->getListAhorroEnEscala($IdEmpresaSesion);			
						$dato["titulo"] = "Nuevo Ahorro en Escala";
						$dato["accion"] = "Nuevo";
						$dato["contenedor"] = "ahorroEnEscala/ahorroEnEscala_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->ahorrosEnEscala();
					}
				}else{
					$this->ahorrosEnEscala();
				}
 			}
			
		}else{
			redirect('inicio');
		}
	}
	public function guardarAhorroEnEscala(){		
		$this->form_validation->set_rules('txtIniciativa','Iniciativa','trim|required');
		$this->form_validation->set_rules('txtIndividual','Individual','trim|required');
		$this->form_validation->set_rules('txtColectivo','Colectivo','trim|required');
		$this->form_validation->set_rules('txtDiferencia','Diferencia','trim|required');
		//$this->form_validation->set_rules('txtPorcentajeAhorro','Porcentaje de Ahorro','trim|required');
		$this->form_validation->set_rules('txtFechaMes','Fecha del Mes','trim|required');
		$this->form_validation->set_rules('txtPeriodo','Periodo','trim|required|integer');
		$accion = $_POST['accion'];
		$id = $_POST['id'];
		if($this->form_validation->run() == false){
			if ($accion == "Editar") {
				$this->editarAhorroEnEscala($id);				
			}else{
				$this->nuevoAhorroEnEscala();
			}
		}else{
			//1-(ValorTAdquisicionesDeFormaColectiva / ValorTAdquisicionesDeFormaNoColectiva) * 100
			$tiempo = time();
			$txtIniciativa = $_POST["txtIniciativa"];
			$txtIndividual = $_POST["txtIndividual"];
			$txtColectivo = $_POST["txtColectivo"];
			$txtDiferencia = $_POST["txtDiferencia"];
			$txtPorcentajeAhorro = $_POST["txtPorcentajeAhorro"];
			$ahorro = (1 - ($txtColectivo / $txtIndividual))* 100;
			$txtFechaMes = $_POST["txtFechaMes"];
			$txtPeriodo = $_POST["txtPeriodo"];
			$txtFechaSistema = date("Y-m-d H:i:s", $tiempo);
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$this->load->model('AhorroEnEscala_Modelo');
				if ($_POST["accion"] == "Editar") {
					$updateAhorroEnEscala = array(
						'Iniciativa' => $txtIniciativa,
						'Individual' => $txtIndividual,
						'Colectivo' => $txtColectivo,
						'Diferencia' => $txtDiferencia,
						'PorcentajeAhorro' => $ahorro,
						'FechaMes' => $txtFechaMes,
						'Periodo' => $txtPeriodo,
						'FechaSistema' => $txtFechaSistema,
						'IdEmpresa' => $IdEmpresaSesion
						);

					if ($this->AhorroEnEscala_Modelo->updateAhorroEnEscala($id, $updateAhorroEnEscala, $IdEmpresaSesion)) {
						$mensaje = "Los datos han sido actualizados con éxito";
						$this->session->set_flashdata("mensaje", $mensaje);
						$this->editarAhorroEnEscala($id);
					}else{
						$mensaje = "Los datos no se han actualizado con éxito";
						$this->session->set_flashdata("mensaje", $mensaje);
						$this->editarAhorroEnEscala($id);
					}						
				}else{ 
					$insertAhorroEnEscala = array(
						'Iniciativa' => $txtIniciativa,
						'Individual' => $txtIndividual,
						'Colectivo' => $txtColectivo,
						'Diferencia' => $txtDiferencia,
						'PorcentajeAhorro' => $ahorro,
						'FechaMes' => $txtFechaMes,
						'Periodo' => $txtPeriodo,
						'FechaSistema' => $txtFechaSistema,
						'IdEmpresa' => $IdEmpresaSesion
						);					
					if ($this->AhorroEnEscala_Modelo->insertAhorroEnEscala($insertAhorroEnEscala)) {
						$mensaje = "El Ahorro en escala ha sido registrada éxito";
						$this->session->set_flashdata("mensaje", $mensaje);
						$this->ahorrosEnEscala();
					}else{
						$mensaje = "El Ahorro en escala no se ha sido registrada éxito";
						$this->session->set_flashdata("mensaje", $mensaje);
						$this->nuevoAhorroEnEscala();
					}
					
				}
		}	
	}
	public function eliminarAhorroEnEscala(){
		$this->load->model('AhorroEnEscala_Modelo');
		$id = $_POST['IdAhorr'];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->AhorroEnEscala_Modelo->deleteAhorroEnEscala($id, $IdEmpresaSesion); 
	}

}

 ?>