<?php if ( ! defined('BASEPATH')) exit('Acceso Prohibido');
/**
* 
*/
class acuerdo extends CI_Controller{
	function __construct(){
		parent::__construct();
	}

	//PARA MIGRAR
	public function filtroAnioAcuerdos(){
		$this->load->model('Acuerdo_Modelo');
	  	$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");

      	$fetch_data = $this->Acuerdo_Modelo->getListAcuerdoAnio($IdEmpresaSesion);
      	$data = array();  
           foreach($fetch_data->result() as $row){  
                $sub_array = array();  
                $sub_array[] = $row->IdAcuerdos;
                $sub_array[] = '<td>'.$row->NombreAcuerdo.'<td>';
                $sub_array[] = '<td>'.$row->OrganizacionConvenio.'<td>';
                $sub_array[] = '<td>'.$row->Estado.'<td>';
                $sub_array[] = '<td>'.$row->Periodo.'<td>';
                $data[] = $sub_array;  
        }
        $output = array(
            "data"=>$data  
        );
           echo json_encode($output);
	}

	public function filtroAnioGuardarAcuerdos(){
		$this->form_validation->set_rules('txtPeriodo','Se requiere el periodo','trim|required');
		if($this->session->userdata("IdEmpresaSesion")){
			$this->load->model('Acuerdo_Modelo');
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$year = $_POST['anioMigrar'];
			$listaAcuerdos = $_POST['id'];
			$result = $this->Acuerdo_Modelo->insertAcuerdoSelectedMigrar($IdEmpresaSesion, $year, $listaAcuerdos); 
			
			if($result){
				echo "Success: ";
			}else{
				echo "Error";
			}
		}else{
			$mensaje = "La empresa no ha sido seleccionada";
			$this->session->set_flashdata('mensaje',$mensaje);
		}
	}
	// FIN PARA MIGRAR

	public function acuerdos(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/actosContractuales" => "Actos Contractuales",
			                     $inicioURL."acuerdo/acuerdos" => "Acuerdos"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Acuerdo_Modelo');
				$dato['admin'] = 1;
				$dato['acuerdosEmpresa'] = $this->Acuerdo_Modelo->getListAcuerdo($IdEmpresaSesion);
				$dato["contenedor"] = "acuerdos/acuerdosEmpresa_view";
				$dato['anios'] = $this->Acuerdo_Modelo->getListAniosAcuerdo($IdEmpresaSesion);
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "acuerdos", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('Acuerdo_Modelo');
						$dato['acuerdosEmpresa'] = $this->Acuerdo_Modelo->getListAcuerdo($IdEmpresaSesion);
						$dato["contenedor"] = "acuerdos/acuerdosEmpresa_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "acuerdos/acuerdosEmpresa_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "acuerdos/acuerdosEmpresa_view";
					$this->load->view('plantilla', $dato);
				}
 			}			
		}else{
			redirect('inicio');
		}
	}

	public function editarAcuerdo($IdAcuerdo){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Acuerdo_Modelo');
				$this->load->model('Empleado_Modelo');
				$dato['acuerdoEmpresa'] = $this->Acuerdo_Modelo->getAcuerdo($IdAcuerdo, $IdEmpresaSesion);
				$dato['empleados'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion); 
				$dato["titulo"] = "Editar Acuerdo";   
				$dato["accion"] = "Editar";
				$dato["contenedor"] = "acuerdos/acuerdosEmpresa_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "acuerdos", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('Acuerdo_Modelo');
						$this->load->model('Empleado_Modelo');
						$dato['acuerdoEmpresa'] = $this->Acuerdo_Modelo->getAcuerdo($IdAcuerdo, $IdEmpresaSesion);
						$dato['empleados'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion); 
						$dato["titulo"] = "Editar Acuerdo";   
						$dato["accion"] = "Editar";
						$dato["contenedor"] = "acuerdos/acuerdosEmpresa_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->acuerdos();
					}
				}else{
					$this->acuerdos();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function nuevoAcuerdo(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Acuerdo_Modelo');
				$this->load->model('Empleado_Modelo');
				$dato['acuerdosEmpresa'] = $this->Acuerdo_Modelo->getListAcuerdo($IdEmpresaSesion);
				$dato['empleados'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion);  
				$dato["titulo"] = "Nuevo Acuerdo";
				$dato["accion"] = "Nuevo";
				$dato["contenedor"] = "acuerdos/acuerdosEmpresa_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "acuerdos", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('Acuerdo_Modelo');
						$this->load->model('Empleado_Modelo');
						$dato['acuerdosEmpresa'] = $this->Acuerdo_Modelo->getListAcuerdo($IdEmpresaSesion);
						$dato['empleados'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion);  
						$dato["titulo"] = "Nuevo Acuerdo";
						$dato["accion"] = "Nuevo";
						$dato["contenedor"] = "acuerdos/acuerdosEmpresa_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->acuerdos();
					}
				}else{
					$this->acuerdos();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function guardarAcuerdo(){
		$this->form_validation->set_rules('txtOrganizacion','Organización','trim|required');
		$this->form_validation->set_rules('txtNombre','Nombre del Acuerdo','trim|required'); 		
		$this->form_validation->set_rules('txtFechaPlanificada','Fecha de Planificación','trim|required'); 		
		$this->form_validation->set_rules('txtCostoPlanificado','Costo planificado','trim|required'); 		
		$this->form_validation->set_rules('txtPeriodo','Periodo','trim|required|integer'); 		
		$accion = $_POST['accion'];
		$id = $_POST['id']; 
		if ($this->form_validation->run() == false) {
			if ($accion == "Nuevo") {
				$this->nuevoAcuerdo();		
			}else{
				$this->editarAcuerdo($id);
			}
		}else{
			$this->load->model('Acuerdo_Modelo');
			$tiempo = time();
			$txtOrganizacion = $_POST["txtOrganizacion"];
			$selectTipoOrganizacion = $_POST["selectTipoOrganizacion"];
			$txtNombre = $_POST["txtNombre"];
			$txtFechaPlanificada = $_POST["txtFechaPlanificada"];
			$txtCostoPlanificado = $_POST["txtCostoPlanificado"];
			$selectEstado = $_POST["selectEstado"];
			$txtFechaEjecucion = $_POST["txtFechaEjecucion"];
			$txtFechaFinalizacion = $_POST["txtFechaFinalizacion"];
			$txtCostoEjecucion = $_POST["txtCostoEjecucion"];
			$txtBeneficiarios = $_POST["txtBeneficiarios"];
			$selectEmpleado = $_POST["selectEmpleado"];
			$txtPeriodo = $_POST["txtPeriodo"];
			$txtFechaSistema =date('Y-m-d H:i:s', $tiempo);
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if(!empty($_FILES['inputImagen']['tmp_name']) && file_exists($_FILES['inputImagen']['tmp_name'])) {
				$imagen= addslashes(file_get_contents($_FILES['inputImagen']['tmp_name']));
			}else{
				$imagen = "";
			}
			if ($accion == "Editar"){
				$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
				$updateAcuerdoEmpresa = array(
					'OrganizacionConvenio' => $txtOrganizacion,
					'TipoOrganizacion' => $selectTipoOrganizacion,
					'NombreAcuerdo' => $txtNombre,
					'FechaPlanificacion' => $txtFechaPlanificada,
					'CostoPlanificado' => $txtCostoPlanificado,
					'Estado' => $selectEstado,
					'FechaEjecucion' => $txtFechaEjecucion,
					'FechaFinalizacion' => $txtFechaFinalizacion,
					'CostoEjecutado' => $txtCostoEjecucion,
					'Beneficiarios' => $txtBeneficiarios,
					'Fotografia' => $imagen,
					'CIResponsable' => $selectEmpleado,
					'Periodo' => $txtPeriodo,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->Acuerdo_Modelo->updateAcuerdo($id, $updateAcuerdoEmpresa, $IdEmpresaSesion)){
					$mensaje = "El Acuerdo se actualizó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->acuerdos();				
				}else{
					$mensaje = "El Acuerdo no se ha actualizado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarAcuerdo($id);				
				}
			}else{
				$insertAcuerdoEmpresa = array(
					'OrganizacionConvenio' => $txtOrganizacion,
					'TipoOrganizacion' => $selectTipoOrganizacion,
					'NombreAcuerdo' => $txtNombre,
					'FechaPlanificacion' => $txtFechaPlanificada,
					'CostoPlanificado' => $txtCostoPlanificado,
					'Estado' => $selectEstado,
					'FechaEjecucion' => $txtFechaEjecucion,
					'FechaFinalizacion' => $txtFechaFinalizacion,
					'CostoEjecutado' => $txtCostoEjecucion,
					'Beneficiarios' => $txtBeneficiarios,
					'Fotografia' => $imagen,
					'CIResponsable' => $selectEmpleado,
					'Periodo' => $txtPeriodo,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->Acuerdo_Modelo->insertAcuerdo($insertAcuerdoEmpresa, $IdEmpresaSesion)){
					$mensaje = "El Acuerdo se insertó con éxito";
					$this->session->set_flashdata("mensaje", $mensaje);
					$this->acuerdos();				
				}else{
					$mensaje = "El Acuerdo no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoAcuerdo();				
				}
			}
		}
	}
	public function eliminarAcuerdo(){
		$this->load->model('Acuerdo_Modelo'); 		          	
		$id = $_POST['IdAcuerdo'];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->Acuerdo_Modelo->deleteAcuerdo($id, $IdEmpresaSesion); 
	}
	
}

?>