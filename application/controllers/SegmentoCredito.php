<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//Controlador 
class segmentoCredito extends CI_Controller {

	function __construct()	{
		parent::__construct();				
	}
	//Función para cargar el inicio
	public function index()	{
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/implicacionEconomica" => "Implicación Económica",
			                     $inicioURL."segmentoCredito" => "Segmentos de Crédito"			                     
			                    );
			$this->load->model('SegmentosDeCredito_Modelo');
			$dato['segmentoCreditos'] = $this->SegmentosDeCredito_Modelo->getListSegmentosDeCredito($IdEmpresaSesion);
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "segmentoCreditos/modulosSegmentos_view";
			$this->load->view('plantilla', $dato);
		}else{
			redirect('inicio');
		}	
	}
	/**
	 * Segmentos de Crédito
	 */
	public function segmentosCreditos(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/implicacionEconomica" => "Implicación Económica",
			                     $inicioURL."segmentoCredito" => "Segmentos de Crédito",
			                     $inicioURL."segmentoCredito/segmentosCreditos" => "Segmento de Crédito"			                     
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('SegmentosDeCredito_Modelo');
				$dato['segmentoCreditos'] = $this->SegmentosDeCredito_Modelo->getListSegmentosDeCredito($IdEmpresaSesion);
				$dato["admin"] = 1;
				$dato["contenedor"] = "segmentoCreditos/segmentoCreditos_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "segmentosCreditos", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('SegmentosDeCredito_Modelo');
						$dato['segmentoCreditos'] = $this->SegmentosDeCredito_Modelo->getListSegmentosDeCredito($IdEmpresaSesion);
						$dato["contenedor"] = "segmentoCreditos/segmentoCreditos_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "segmentoCreditos/segmentoCreditos_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "segmentoCreditos/segmentoCreditos_view";
					$this->load->view('plantilla', $dato);
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function nuevoSegmentoCredito(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('SegmentosDeCredito_Modelo');
				$dato['segmentoCreditos'] = $this->SegmentosDeCredito_Modelo->getListSegmentosDeCredito($IdEmpresaSesion);  
				$dato["titulo"] = "Nuevo Segmento de Crédito";
				$dato["accion"] = "Nuevo";
				$dato["contenedor"] = "segmentoCreditos/segmentoCreditos_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "segmentosCreditos", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('SegmentosDeCredito_Modelo');
						$dato['segmentoCreditos'] = $this->SegmentosDeCredito_Modelo->getListSegmentosDeCredito($IdEmpresaSesion);  
						$dato["titulo"] = "Nuevo Segmento de Crédito";
						$dato["accion"] = "Nuevo";
						$dato["contenedor"] = "segmentoCreditos/segmentoCreditos_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->segmentosCreditos();
					}
				}else{
					$this->segmentosCreditos();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function editarSegmentoCredito($IdSegmentoCredito){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('SegmentosDeCredito_Modelo');					
				$dato['segmentoCredito'] = $this->SegmentosDeCredito_Modelo->getSegmentosDeCredito($IdSegmentoCredito, $IdEmpresaSesion);    
				$dato["titulo"] = "Editar Segmento de Crédito";
				$dato["accion"] = "Editar";	
				$dato["contenedor"] = "segmentoCreditos/segmentoCreditos_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "segmentosCreditos", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('SegmentosDeCredito_Modelo');					
						$dato['segmentoCredito'] = $this->SegmentosDeCredito_Modelo->getSegmentosDeCredito($IdSegmentoCredito, $IdEmpresaSesion);    
						$dato["titulo"] = "Editar Segmento de Crédito";
						$dato["accion"] = "Editar";	
						$dato["contenedor"] = "segmentoCreditos/segmentoCreditos_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->segmentosCreditos();
					}
				}else{
					$this->segmentosCreditos();
				}
 			}						
		}else{
			redirect('inicio');
		}
	}
	public function guardarSegmentoCredito(){
		$this->form_validation->set_rules('txtNombreSegmento','Segmento','trim|required'); 			
		$this->form_validation->set_rules('txtMontoConcedido','Monto Concedido','trim|required'); 
		$this->form_validation->set_rules('txtEjecucion','Ejecución','trim|required'); 			
		$this->form_validation->set_rules('txtEstablecidoPOA','Establecido por POA','trim|required'); 	
		$this->form_validation->set_rules('txtFechaMes','Fecha del Mes','trim|required'); 
		$accion = $_POST['accion'];
		$id = $_POST['id'];	
		if ($this->form_validation->run() == false) {
			if ($accion == "Editar") {
				$this->editarSegmentoCredito($id);
			}else{
				$this->nuevoSegmentoCredito();
			}
		}else{
			$this->load->model('SegmentosDeCredito_Modelo');
			$tiempo = time();
			$txtNombreSegmento = $_POST["txtNombreSegmento"];
			$txtMontoConcedido = $_POST["txtMontoConcedido"];
			$txtEjecucion = $_POST["txtEjecucion"];
			$txtEstablecidoPOA = $_POST["txtEstablecidoPOA"];
			$selectCumplimiento = $_POST["selectCumplimiento"];	
			$txtFechaMes = $_POST["txtFechaMes"];
			$txtFechaSistema = date('Y-m-d H:i:s',$tiempo);
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($_POST["accion"] == "Editar"){
				$updateSegmentosDeCredito = array(
					'NombreSegmento' => $txtNombreSegmento,
					'MontoConcedido' => $txtMontoConcedido,
					'Ejecucion' => $txtEjecucion,
					'EstablecidoPorPOA' => $txtEstablecidoPOA,
					'Cumplimiento' => $selectCumplimiento,
					'FechaMes' => $txtFechaMes,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->SegmentosDeCredito_Modelo->updateSegmentosDeCredito($id, $updateSegmentosDeCredito, $IdEmpresaSesion)){
					$mensaje = "El Segmento se actualizó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarSegmentoCredito($id);				
				}else{
					$mensaje = "El Segmento no se ha actualizado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarSegmentoCredito($id);				
				}
			}else{
				$insertSegmentosDeCredito = array(
					'NombreSegmento' => $txtNombreSegmento,
					'MontoConcedido' => $txtMontoConcedido,					
					'Ejecucion' => $txtEjecucion,
					'EstablecidoPorPOA' => $txtEstablecidoPOA,
					'Cumplimiento' => $selectCumplimiento,
					'FechaMes' => $txtFechaMes,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->SegmentosDeCredito_Modelo->insertSegmentosDeCredito($insertSegmentosDeCredito)){
					$mensaje = "El Segmento se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoSegmentoCredito();				
				}else{
					$mensaje = "El Segmento no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoSegmentoCredito();				
				}
			}			
		}
	}
	public function eliminarSegmentoCredito(){
		$this->load->model('SegmentosDeCredito_Modelo'); 		          	
		$Segemento 		= json_decode($this->input->post('MiSegemento'));
		$id = $_POST['IdSegmentosCredit'];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->SegmentosDeCredito_Modelo->deleteSegmentosDeCredito($id, $IdEmpresaSesion); 
	}

	
}

?>