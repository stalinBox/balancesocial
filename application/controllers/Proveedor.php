<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class proveedor extends CI_Controller{
	
	function __construct(){
		parent::__construct();			
	}

	public function index(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/publicoExterno" => "Público Externo",
			                     $inicioURL."proveedor" => "Proveedores"
			                    );			
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "proveedores/moduloProveedores";
			$this->load->view('plantilla', $dato);
		}else{
			redirect('inicio');
		}
	}
	
	public function proveedores(){			
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/publicoExterno" => "Público Externo",
			                     $inicioURL."proveedor" => "Proveedores",
			                     $inicioURL."proveedor/proveedores" => "Proveedor"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Proveedor_Modelo');
				$dato['proveedores'] = $this->Proveedor_Modelo->getListProveedor($IdEmpresaSesion);
				$dato["admin"] = 1;
				$dato["contenedor"] = "proveedores/proveedores_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "proveedores", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('Proveedor_Modelo');
						$dato['proveedores'] = $this->Proveedor_Modelo->getListProveedor($IdEmpresaSesion);
						$dato["contenedor"] = "proveedores/proveedores_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "proveedores/proveedores_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "proveedores/proveedores_view";
					$this->load->view('plantilla', $dato);
				}
 			}			
		}else{
			redirect('inicio');
		}
	}

	public function editarProveedor($IdProveedor){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Proveedor_Modelo');					
				$dato['proveedor'] = $this->Proveedor_Modelo->getProveedor($IdProveedor, $IdEmpresaSesion);
				$dato["titulo"] = "Editar Proveedor";   
				$dato["accion"] = "Editar";	
				$dato["contenedor"] = "proveedores/proveedores_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "proveedores", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('Proveedor_Modelo');					
						$dato['proveedor'] = $this->Proveedor_Modelo->getProveedor($IdProveedor, $IdEmpresaSesion);
						$dato["titulo"] = "Editar Proveedor";   
						$dato["accion"] = "Editar";	
						$dato["contenedor"] = "proveedores/proveedores_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->proveedores();
					}
				}else{
					$this->proveedores();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function nuevoProveedor(){		
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Proveedor_Modelo');
				$dato["contenedor"] = "proveedores/proveedores_new_edit";
				$dato['proveedores'] = $this->Proveedor_Modelo->getListProveedor($IdEmpresaSesion);  
				$dato["titulo"] = "Nuevo Proveedor";   
				$dato["accion"] = "Nuevo";   
				$this->load->view("plantilla", $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "proveedores", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('Proveedor_Modelo');
						$dato["contenedor"] = "proveedores/proveedores_new_edit";
						$dato['proveedores'] = $this->Proveedor_Modelo->getListProveedor($IdEmpresaSesion);  
						$dato["titulo"] = "Nuevo Proveedor";   
						$dato["accion"] = "Nuevo";   
						$this->load->view("plantilla", $dato);
					}else{
						$this->proveedores();
					}
				}else{
					$this->proveedores();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function guardarProveedor(){
		//Validar campos	
		$this->form_validation->set_rules('txtRUC','RUC','trim|integer|required');
		$this->form_validation->set_rules('txtNombre','Nombre del Proveedor','trim|required'); 
		$this->form_validation->set_rules('txtDireccion','Dirección','trim|required');
		$accion = $_POST['accion'];
		$id = $_POST['id'];
		if($this->form_validation->run() == false){
			if ($_POST["accion"] == "Editar") {
				$this->editarProveedor($id);				
			}else{
				$this->nuevoProveedor();
			}
		}else{
			$txtRUC = $_POST["txtRUC"];
			$txtNombre = $_POST["txtNombre"];
			$selectProveedor = $_POST["selectProveedor"];				
			$txtDireccion = $_POST["txtDireccion"];
			$selectAlcance = $_POST["selectAlcance"];
			$txtTelefono = $_POST["txtTelefono"];
			$txtNacionalidad = $_POST["txtNacionalidad"];
			$txtTipoEmpresa = $_POST["txtTipoEmpresa"];
			$selectEstado = $_POST["selectEstado"];
			$selectTipoEvaluacion = $_POST["selectTipoEvaluacion"];
			$txtPoliticas = $_POST["txtPoliticas"];
			if(!empty($_FILES['inputFoto']['tmp_name']) && file_exists($_FILES['inputFoto']['tmp_name'])) {				
				$imagen= addslashes(file_get_contents($_FILES['inputFoto']['tmp_name']));
			}else{
				$imagen = "";
			}
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$this->load->model('Proveedor_Modelo');						
			$rucExiste = $this->Proveedor_Modelo->getProveedor($txtRUC, $IdEmpresaSesion);

			if ($rucExiste == true) {
				$mensaje = "RUC ya existe";
				$this->session->set_flashdata('mensaje',$mensaje);	
				$this->nuevoProveedor();
			}else{
				if ($_POST["accion"] == "Editar") {
					$updateProveedor = array(
						'RucProveedor' => $txtRUC,
						'NombreProveedor' => $txtNombre,
						'TipoProveedor' => $selectProveedor,
						'DireccionProveedor' => $txtDireccion,
						'AlcanceProveedor' => $selectAlcance,
						'TelefonoProveedor' => $txtTelefono,
						'NacionalidadProveedor' => $txtNacionalidad,
						'TipoEmpresaProveedor' => $txtTipoEmpresa,
						'EstadoProveedor' => $selectEstado,
						'TipoEvaluacion' => $selectTipoEvaluacion,
						'PoliticasProveedor' => $txtPoliticas,
						'ImagenProveedor' => $imagen,
						'IdEmpresa' => $IdEmpresaSesion
						);

					if ($this->Proveedor_Modelo->updateProveedor($id, $updateProveedor, $IdEmpresaSesion)) {
						$mensaje = "Los datos han sido actualizados con éxito";
						$this->session->set_flashdata("mensaje", $mensaje);
						$this->editarProveedor($id);
					}else{
						$mensaje = "Los datos no se han sido actualizados con éxito";
						$this->session->set_flashdata("mensaje", $mensaje);
						$this->editarProveedor($id);
					}
				}else{ 
					$insertProveedor = array(
						'RucProveedor' => $txtRUC,
						'NombreProveedor' => $txtNombre,
						'TipoProveedor' => $selectProveedor,
						'DireccionProveedor' => $txtDireccion,
						'AlcanceProveedor' => $selectAlcance,
						'TelefonoProveedor' => $txtTelefono,
						'NacionalidadProveedor' => $txtNacionalidad,
						'TipoEmpresaProveedor' => $txtTipoEmpresa,
						'EstadoProveedor' => $selectEstado,
						'TipoEvaluacion' => $selectTipoEvaluacion,
						'PoliticasProveedor' => $txtPoliticas,
						'ImagenProveedor' => $imagen,
						'IdEmpresa' => $IdEmpresaSesion
						);

					if ($IdInsertado = $this->Proveedor_Modelo->insertProveedor($insertProveedor)) {
						$mensaje = "El Proveedor ha sido registrada éxito :$IdInsertado";
						$this->session->set_flashdata("mensaje", $mensaje);
						$this->nuevoProveedor();
					}else{
						$mensaje = "El Proveedor no se ha sido registrada éxito :$IdInsertado";
						$this->session->set_flashdata("mensaje", $mensaje);
						$this->nuevoProveedor();
					}

				}
			}



		}	
	}
	public function eliminarProveedor(){
		$this->load->model('Proveedor_Modelo'); 		          	
		$id = $_POST['IdProv'];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->Proveedor_Modelo->deleteProveedor($id, $IdEmpresaSesion); 
	}
	/**
	 * Proveedor Contrato
	 */
	public function proveedoresContrato(){		
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/publicoExterno" => "Público Externo",
			                     $inicioURL."proveedor" => "Proveedores",
			                     $inicioURL."proveedor/proveedoresContrato" => "Contrato - Proveedor"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Proveedor_Modelo');
				$dato['proveedores'] = $this->Proveedor_Modelo->getListProveedor($IdEmpresaSesion);
				$dato['admin'] = 1;
				$dato['proveedoresContratos'] = $this->Proveedor_Modelo->getListProveedorContrato($IdEmpresaSesion);				
				$dato["contenedor"] = "proveedores/contratoProveedor_view";
				$this->load->view("plantilla", $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "proveedoresContrato", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('Proveedor_Modelo');
						$dato['proveedores'] = $this->Proveedor_Modelo->getListProveedor($IdEmpresaSesion);  
						$dato['proveedoresContratos'] = $this->Proveedor_Modelo->getListProveedorContrato($IdEmpresaSesion);						
						$dato["contenedor"] = "proveedores/contratoProveedor_view";
						$this->load->view("plantilla", $dato);
					}else{
						$dato["contenedor"] = "proveedores/contratoProveedor_view";
						$this->load->view("plantilla", $dato);
					}
				}else{
					$dato["contenedor"] = "proveedores/contratoProveedor_view";
					$this->load->view("plantilla", $dato);
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function nuevoProveedorContrato(){		
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Proveedor_Modelo');
				$dato['proveedores'] = $this->Proveedor_Modelo->getListProveedor($IdEmpresaSesion);  
				$dato['proveedoresContratos'] = $this->Proveedor_Modelo->getListProveedorContrato($IdEmpresaSesion);  
				$dato["contenedor"] = "proveedores/contratoProveedor_new_edit";
				$dato["titulo"] = "Nuevo Contrato con Proveedor";   
				$dato["accion"] = "Nuevo";   
				$this->load->view("plantilla", $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "proveedoresContrato", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('Proveedor_Modelo');
						$dato['proveedores'] = $this->Proveedor_Modelo->getListProveedor($IdEmpresaSesion);  
						$dato['proveedoresContratos'] = $this->Proveedor_Modelo->getListProveedorContrato($IdEmpresaSesion);  
						$dato["contenedor"] = "proveedores/contratoProveedor_new_edit";
						$dato["titulo"] = "Nuevo Contrato con Proveedor";   
						$dato["accion"] = "Nuevo";   
						$this->load->view("plantilla", $dato);
					}else{
						$this->proveedoresContrato();
					}
				}else{
					$this->proveedoresContrato();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function editarProveedorContrato($IdProveedorContrato){		
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Proveedor_Modelo');
				$dato['proveedor'] = $this->Proveedor_Modelo->getProveedorContrato($IdProveedorContrato, $IdEmpresaSesion);  
				$dato['proveedores'] = $this->Proveedor_Modelo->getListProveedor($IdEmpresaSesion);  
				$dato["contenedor"] = "proveedores/contratoProveedor_new_edit";
				$dato["titulo"] = "Editar Proveedor";   
				$dato["accion"] = "Editar";   
				$this->load->view("plantilla", $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "proveedoresContrato", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('Proveedor_Modelo');
						$dato['proveedor'] = $this->Proveedor_Modelo->getProveedorContrato($IdProveedorContrato, $IdEmpresaSesion);  
						$dato['proveedores'] = $this->Proveedor_Modelo->getListProveedor($IdEmpresaSesion);  
						$dato["contenedor"] = "proveedores/contratoProveedor_new_edit";
						$dato["titulo"] = "Editar Proveedor";   
						$dato["accion"] = "Editar";   
						$this->load->view("plantilla", $dato);
					}else{
						$this->proveedoresContrato();
					}
				}else{
					$this->proveedoresContrato();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function guardarProveedorContrato(){
		//Validar campos	
		$this->form_validation->set_rules('txtFechaInicio','Fecha de Inicio','trim|required');
		$this->form_validation->set_rules('txtFechaFin','Fecha Fin','trim|required');
		$this->form_validation->set_rules('txtFechaFin','Fecha Fin','trim|required');
		$this->form_validation->set_rules('txtTipoContrato','Tipo Contrato','trim|required');
		$this->form_validation->set_rules('txtObjetivoContrato','Objetivo de Contrato','trim|required');
		$accion = $_POST['accion'];
		$id = $_POST['id'];
		if($this->form_validation->run() == false){
			if ($accion == "Editar") {
				$this->editarProveedorContrato($id);				
			}else{
				$this->nuevoProveedorContrato();
			}
		}else{
			$this->load->model('Proveedor_Modelo');
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			//$selectContrato = $_POST["selectContrato"];
			$txtTipoContrato = $_POST["txtTipoContrato"];
			$selectProveedor = $_POST["selectProveedor"];
			$proveedor = $this->Proveedor_Modelo->getProveedor($selectProveedor, $IdEmpresaSesion);
			$nombreProveedor = $proveedor[0]->NombreProveedor;
			$txtObjetivoContrato = $_POST["txtObjetivoContrato"];
			$txtFechaInicio = $_POST["txtFechaInicio"];
			$txtFechaFin = $_POST["txtFechaFin"];
			$txtObligaciones = $_POST["txtObligaciones"];
				if ($_POST["accion"] == "Editar") {
					$updateProveedorContrato = array(
						'TipoContrato' => $txtTipoContrato,
						'IdProveedor' => $selectProveedor,
						'NombreProveedor' => $nombreProveedor,
						'ObjetoDeContrato' => $txtObjetivoContrato,
						'FechaInicioContrato' => $txtFechaInicio,
						'FechaFinContrato' => $txtFechaFin,
						'ObligacionDePartes' => $txtObligaciones,
						'IdEmpresa' => $IdEmpresaSesion
						);

					if ($this->Proveedor_Modelo->updateProveedorContrato($id, $updateProveedorContrato, $IdEmpresaSesion)) {
						$mensaje = "Los datos han sido actualizados con éxito";
						$this->session->set_flashdata("mensaje", $mensaje);
						$this->editarProveedorContrato($id);
					}else{
						$mensaje = "Los datos no se han actualizado con éxito";
						$this->session->set_flashdata("mensaje", $mensaje);
						$this->editarProveedorContrato($id);
					}
				}else{ 
					$insertProveedorContrato = array(
						'TipoContrato' => $txtTipoContrato,
						'IdProveedor' => $selectProveedor,
						'NombreProveedor' => $nombreProveedor,
						'ObjetoDeContrato' => $txtObjetivoContrato,
						'FechaInicioContrato' => $txtFechaInicio,
						'FechaFinContrato' => $txtFechaFin,
						'ObligacionDePartes' => $txtObligaciones,
						'IdEmpresa' => $IdEmpresaSesion
						);					
					if ($this->Proveedor_Modelo->insertProveedorContrato($insertProveedorContrato)) {
						$mensaje = "El Proveedor ha sido registrada éxito";
						$this->session->set_flashdata("mensaje", $mensaje);
						$this->nuevoProveedorContrato();
					}else{
						$mensaje = "El Proveedor no se ha sido registrada éxito";
						$this->session->set_flashdata("mensaje", $mensaje);
						$this->nuevoProveedorContrato();
					}
					
				}

		}	
	}
	public function eliminarProveedorContrato(){
		$this->load->model('Proveedor_Modelo'); 		          	
		$id = $_POST['IdCont'];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->Proveedor_Modelo->deleteProveedorContrato($id, $IdEmpresaSesion); 
	}
	/**
	 * Reportes
	 */


}

?>