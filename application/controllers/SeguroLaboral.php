<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//Controlador 
class seguroLaboral extends CI_Controller {

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
			                     $inicioURL."planificacionRSE/publicoInterno" => "Público Interno",
			                     $inicioURL."seguroLaboral" => "Seguro Laboral"
			                    );
			$this->load->model('SeguroLaboral_Modelo');
			$dato['segurosLaboral'] = $this->SeguroLaboral_Modelo->getListSeguroLaboral($IdEmpresaSesion);
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "seguroLaboral/seguroLaboral_view";
			$this->load->view('plantilla', $dato);
		}else{
			redirect('inicio');
		}		
	}
	*/
	/**
	 * Seguro Laboral de la Empresa
	 */
	public function segurosLaboral(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/publicoInterno" => "Público Interno",
			                     $inicioURL."seguroLaboral/segurosLaboral" => "Seguro Laboral"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('SeguroLaboral_Modelo');
				$dato['admin'] = 1;
				$dato['segurosLaboral'] = $this->SeguroLaboral_Modelo->getListSeguroLaboral($IdEmpresaSesion);
				$dato["contenedor"] = "seguroLaboral/seguroLaboral_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "segurosLaboral", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('SeguroLaboral_Modelo');
						$dato['segurosLaboral'] = $this->SeguroLaboral_Modelo->getListSeguroLaboral($IdEmpresaSesion);
						$dato["contenedor"] = "seguroLaboral/seguroLaboral_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "seguroLaboral/seguroLaboral_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "seguroLaboral/seguroLaboral_view";
					$this->load->view('plantilla', $dato);
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function nuevoSeguroLaboral(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Proveedor_Modelo');
				$dato['proveedores'] = $this->Proveedor_Modelo->getListProveedor($IdEmpresaSesion);
				$dato["titulo"] = "Nuevo Seguro Laboral";
				$dato["accion"] = "Nuevo";
				$dato["contenedor"] = "seguroLaboral/seguroLaboral_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "segurosLaboral", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('Proveedor_Modelo');
						$dato['proveedores'] = $this->Proveedor_Modelo->getListProveedor($IdEmpresaSesion);
						$dato["titulo"] = "Nuevo Seguro Laboral";
						$dato["accion"] = "Nuevo";
						$dato["contenedor"] = "seguroLaboral/seguroLaboral_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->segurosLaboral();
					}
				}else{
					$this->segurosLaboral();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function editarSeguroLaboral($IdSeguroLaboral){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('SeguroLaboral_Modelo');
				$this->load->model('Proveedor_Modelo');			
				$dato['seguroLaboral'] = $this->SeguroLaboral_Modelo->getSeguroLaboral($IdSeguroLaboral, $IdEmpresaSesion);  
				$dato['proveedores'] = $this->Proveedor_Modelo->getListProveedor($IdEmpresaSesion); 
				$dato["titulo"] = "Editar Seguro Laboral";
				$dato["accion"] = "Editar";	
				$dato["contenedor"] = "seguroLaboral/seguroLaboral_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "segurosLaboral", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('SeguroLaboral_Modelo');
						$this->load->model('Proveedor_Modelo');			
						$dato['seguroLaboral'] = $this->SeguroLaboral_Modelo->getSeguroLaboral($IdSeguroLaboral, $IdEmpresaSesion);  
						$dato['proveedores'] = $this->Proveedor_Modelo->getListProveedor($IdEmpresaSesion); 
						$dato["titulo"] = "Editar Seguro Laboral";
						$dato["accion"] = "Editar";	
						$dato["contenedor"] = "seguroLaboral/seguroLaboral_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->segurosLaboral();
					}
				}else{
					$this->segurosLaboral();
				}
 			}				
		}else{
			redirect('inicio');
		}
	}
	public function guardarSeguroLaboral(){
		$this->form_validation->set_rules('txtMontoCubre','Monto que Cubre','trim|required');
		$this->form_validation->set_rules('txtFechaAdquisicion','Fecha de Adquisición','trim|required');
		$this->form_validation->set_rules('txtVigencia','Vigencia en años','trim|integer|required');
		$accion = $_POST['accion'];
		$id = $_POST['id'];			
		if ($this->form_validation->run() == false) {
			if ($accion == "Editar") {
				$this->editarSeguroLaboral($id);
			}else{
				$this->nuevoSeguroLaboral();
			}
		}else{
			$this->load->model('SeguroLaboral_Modelo');
			$tiempo = time();
			$selectProveedor = $_POST["selectProveedor"];
			$selectTipoSeguro = $_POST["selectTipoSeguro"];
			$txtMontoCubre = $_POST["txtMontoCubre"];
			$txtFechaAdquisicion = $_POST["txtFechaAdquisicion"];
			$txtVigencia = $_POST["txtVigencia"];
			$txtFechaCaducaSeguroL = date('Y-m-d', strtotime($txtFechaAdquisicion.' +'.$txtVigencia.' year')) ;
			$selectSiniestroOcurrido = $_POST["selectSiniestroOcurrido"];
			$txtValorSiniestro = $_POST["txtValorSiniestro"];
			$txtObservacion = $_POST["txtObservacion"];	
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($_POST["accion"] == "Editar"){
				$updateSeguroLaboral = array(					
					'ProveedorSeguroL' => $selectProveedor,
					'TipoSeguroL' => $selectTipoSeguro,					
					'MontoCubreSeguroL' => $txtMontoCubre,
					'FechaAdquiereSeguroL' => $txtFechaAdquisicion,
					'VigenciaAniosSeguroL' => $txtVigencia,
					'FechaCaducaSeguroL' => $txtFechaCaducaSeguroL,
					'SiniestroOcurrido' => $selectSiniestroOcurrido,
					'ValorRealSiniestro' => $txtValorSiniestro,
					'Observacion' => $txtObservacion,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->SeguroLaboral_Modelo->updateSeguroLaboral($id, $updateSeguroLaboral, $IdEmpresaSesion)){
					$mensaje = "El Seguro Laboral se actualizó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarSeguroLaboral($id);				
				}else{
					$mensaje = "El Seguro Laboral no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarSeguroLaboral($id);				
				}
			}else{
				$insertSeguroLaboral = array(
					'ProveedorSeguroL' => $selectProveedor,
					'TipoSeguroL' => $selectTipoSeguro,					
					'MontoCubreSeguroL' => $txtMontoCubre,
					'FechaAdquiereSeguroL' => $txtFechaAdquisicion,
					'VigenciaAniosSeguroL' => $txtVigencia,
					'FechaCaducaSeguroL' => $txtFechaCaducaSeguroL,
					'SiniestroOcurrido' => $selectSiniestroOcurrido,
					'ValorRealSiniestro' => $txtValorSiniestro,
					'Observacion' => $txtObservacion,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->SeguroLaboral_Modelo->insertSeguroLaboral($insertSeguroLaboral)){
					$mensaje = "El Seguro Laboral se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoSeguroLaboral();				
				}else{
					$mensaje = "El Seguro Laboral no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoSeguroLaboral();				
				}
			}
		}
	}
	public function eliminarSeguroLaboral(){
		$this->load->model('SeguroLaboral_Modelo');		          	
		$id = $_POST["IdSeguroLab"];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->SeguroLaboral_Modelo->deleteSeguroLaboral($id, $IdEmpresaSesion); 
	}

	
}

?>