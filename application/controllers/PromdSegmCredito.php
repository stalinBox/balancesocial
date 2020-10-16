<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//Controlador 
class promdSegmCredito extends CI_Controller {

	function __construct()	{
		parent::__construct();				
	}
	//Función para cargar el inicio
	public function index()	{
		if($this->session->userdata("IdEmpresaSesion")){

		}else{
			redirect('inicio');
		}		
	}
	/**
	 * 
	 */
	public function promdSegmCreditos(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/implicacionEconomica" => "Implicación Económica",
			                     $inicioURL."segmentoCredito" => "Segmentos de Crédito",
			                     $inicioURL."promdSegmCredito/promdSegmCreditos" => "Promedio Segmento de Crédito"			                     
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('PromedioSegmentosCredito_Modelo');
				$dato['promedioSegmentoCreditos'] = $this->PromedioSegmentosCredito_Modelo->getListPromdSegmCredito($IdEmpresaSesion);
				$dato["admin"] = 1;
				$dato["contenedor"] = "promdSegmCreditos/nuevopromdSegmCreditos_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "promdSegmCreditos", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('PromedioSegmentosCredito_Modelo');
						$dato['promedioSegmentoCreditos'] = $this->PromedioSegmentosCredito_Modelo->getListPromdSegmCredito($IdEmpresaSesion);
						$dato["contenedor"] = "promdSegmCreditos/nuevopromdSegmCreditos_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "promdSegmCreditos/nuevopromdSegmCreditos_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "promdSegmCreditos/nuevopromdSegmCreditos_view";
					$this->load->view('plantilla', $dato);
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function nuevoPromdSegmCredito(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('PromedioSegmentosCredito_Modelo');
				$dato['promedioSegmentoCreditos'] = $this->PromedioSegmentosCredito_Modelo->getListPromdSegmCredito($IdEmpresaSesion); 
				$dato["titulo"] = "Nuevo Segmento de Crédito";
				$dato["accion"] = "Nuevo";
				$dato["contenedor"] = "promdSegmCreditos/nuevopromdSegmCreditos_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "promdSegmCreditos", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('PromedioSegmentosCredito_Modelo');
						$dato['promedioSegmentoCreditos'] = $this->PromedioSegmentosCredito_Modelo->getListPromdSegmCredito($IdEmpresaSesion); 
						$dato["titulo"] = "Nuevo Segmento de Crédito";
						$dato["accion"] = "Nuevo";
						$dato["contenedor"] = "promdSegmCreditos/nuevopromdSegmCreditos_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->promdSegmCreditos();
					}
				}else{
					$this->promdSegmCreditos();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function editarPromdSegmCredito($IdPromdSegmCredito){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('PromedioSegmentosCredito_Modelo');
				$dato['promedioSegmentoCredito'] = $this->PromedioSegmentosCredito_Modelo->getPromdSegmCredito($IdPromdSegmCredito, $IdEmpresaSesion);    
				$dato["titulo"] = "Editar Promedio Segmento de Crédito";   
				$dato["accion"] = "Editar";	
				$dato["contenedor"] = "promdSegmCreditos/nuevopromdSegmCreditos_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "promdSegmCreditos", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('PromedioSegmentosCredito_Modelo');
						$dato['promedioSegmentoCredito'] = $this->PromedioSegmentosCredito_Modelo->getPromdSegmCredito($IdPromdSegmCredito, $IdEmpresaSesion);    
						$dato["titulo"] = "Editar Promedio Segmento de Crédito";   
						$dato["accion"] = "Editar";	
						$dato["contenedor"] = "promdSegmCreditos/nuevopromdSegmCreditos_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->promdSegmCreditos();
					}
				}else{
					$this->promdSegmCreditos();
				}
 			}						
		}else{
			redirect('inicio');
		}
	}
	public function guardarPromdSegmCredito(){
		$this->form_validation->set_rules('txtNombreSegemento','Nombre del Segmento','trim|required');
		$this->form_validation->set_rules('txtMonto','Monto','trim|required');	
		$this->form_validation->set_rules('txtOperaciones','Número de Operaciones','trim|required');
		$this->form_validation->set_rules('txtFechaMes','Fecha del Mes','trim|required');
		$accion = $_POST['accion'];
		$id = $_POST['id'];	
		if ($this->form_validation->run() == false) {
			if ($accion == "Editar") {
				$this->editarPromdSegmCredito($id);				
			}else{
				$this->nuevoPromdSegmCredito();
			}
		}else{
			$this->load->model('PromedioSegmentosCredito_Modelo');
			$tiempo = time();
			$txtNombreSegemento = $_POST["txtNombreSegemento"];
			$selectTipoSegmento = $_POST["selectTipoSegmento"];			
			$txtMonto = $_POST["txtMonto"];
			$txtOperaciones = $_POST["txtOperaciones"];
			$txtFechaMes = $_POST["txtFechaMes"];
			$txtFechaSistema = date("Y-m-d H:i:s", $tiempo);
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($_POST["accion"] == "Editar"){
				$updatePromdSegmCredito = array(					
					'NombreSegmento' => $txtNombreSegemento,
					'TipoSegmentoCredito' => $selectTipoSegmento,					
					'MontoColocado' => $txtMonto,
					'Operaciones' => $txtOperaciones,
					'FechaMes' => $txtFechaMes,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->PromedioSegmentosCredito_Modelo->updatePromdSegmCredito($id, $updatePromdSegmCredito, $IdEmpresaSesion)){
					$mensaje = "El Segmento se ha actualizado con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarPromdSegmCredito($id);				
				}else{
					$mensaje = "El Segmento no se ha actualizado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarPromdSegmCredito($id);				
				}
			}else{
				$insertPromdSegmCredito = array(
					'NombreSegmento' => $txtNombreSegemento,
					'TipoSegmentoCredito' => $selectTipoSegmento,					
					'MontoColocado' => $txtMonto,
					'Operaciones' => $txtOperaciones,
					'FechaMes' => $txtFechaMes,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->PromedioSegmentosCredito_Modelo->insertPromdSegmCredito($insertPromdSegmCredito)){
					$mensaje = "El Segmento se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoPromdSegmCredito();				
				}else{
					$mensaje = "El Segmento no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoPromdSegmCredito();				
				}
			}
		}
	}
	public function eliminarPromdSegmCredito(){
		$this->load->model('PromedioSegmentosCredito_Modelo'); 		          	
		$id = $_POST['IdPromedioSegment'];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->PromedioSegmentosCredito_Modelo->deletePromdSegmCredito($id, $IdEmpresaSesion); 
	}

	
}

?>