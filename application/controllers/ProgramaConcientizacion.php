<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//Controlador 
class programaConcientizacion extends CI_Controller {

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
			                     $inicioURL."programaConcientizacion" => "Programas de Concientización"
			                    );
			$this->load->model('ProgramaConcientizacion_Modelo');
			$dato['programasConcientizacion'] = $this->ProgramaConcientizacion_Modelo->getListConcientizacion($IdEmpresaSesion);
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "programaConcientizacion/programaConcientizacion_view";
			$this->load->view('plantilla', $dato);
		}else{
			redirect('inicio');
		}		
	}
	*/
	//PARA MIGRAR
	public function filtroAnioProgConcientizacion(){
		$this->load->model('ProgramaConcientizacion_Modelo');
	  	$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
      	$fetch_data = $this->ProgramaConcientizacion_Modelo->getListProgConcientizacionAnio($IdEmpresaSesion);
      	$data = array();  
           foreach($fetch_data->result() as $row){  
                $sub_array = array();  
                $sub_array[] = $row->IdProgramasConcientizacion;
                $sub_array[] = '<td >'.$row->NombrePrograma.'<td>';
                $sub_array[] = '<td >'.$row->TipoPrograma.'<td>';
                $sub_array[] = '<td >'.$row->CostoPlanificado.'<td>';
                $sub_array[] = '<td >'.$row->Periodo.'<td>';
                $data[] = $sub_array;  
        }
        $output = array(
            "data"=>$data  
        );
           echo json_encode($output);
	}

	public function filtroAnioGuardarProgConcientizacion(){
		$this->form_validation->set_rules('txtPeriodo','Se requiere el periodo','trim|required');
		if($this->session->userdata("IdEmpresaSesion")){
			$this->load->model('ProgramaConcientizacion_Modelo');
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$year = $_POST['anioMigrar'];
			$listaAcuerdos = $_POST['id'];
			$result = $this->ProgramaConcientizacion_Modelo->insertProgConcientizacionSelectedMigrar($IdEmpresaSesion, $year, $listaAcuerdos); 
			
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

	public function progamasConcientizacion(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/publicoInterno" => "Público Interno",
			                     $inicioURL."programaConcientizacion/progamasConcientizacion" => "Programas de Concientización"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('ProgramaConcientizacion_Modelo');
				$dato['admin'] = 1;
				$dato['programasConcientizacion'] = $this->ProgramaConcientizacion_Modelo->getListConcientizacion($IdEmpresaSesion);
				$dato['anios'] = $this->ProgramaConcientizacion_Modelo->getListAniosProgConcientizacion($IdEmpresaSesion); 
				$dato["contenedor"] = "programaConcientizacion/programaConcientizacion_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "progamasConcientizacion", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('ProgramaConcientizacion_Modelo');
						$dato['programasConcientizacion'] = $this->ProgramaConcientizacion_Modelo->getListConcientizacion($IdEmpresaSesion);
						$dato["contenedor"] = "programaConcientizacion/programaConcientizacion_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "programaConcientizacion/programaConcientizacion_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "programaConcientizacion/programaConcientizacion_view";
					$this->load->view('plantilla', $dato);
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function nuevoProgConcien(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Empleado_Modelo');  
				$dato['empleados'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion);  
				$dato["titulo"] = "Nuevo Programa de Concientización";
				$dato["accion"] = "Nuevo";
				$dato["contenedor"] = "programaConcientizacion/programaConcientizacion_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "progamasConcientizacion", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('Empleado_Modelo');  
						$dato['empleados'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion);  
						$dato["titulo"] = "Nuevo Progrema de Concientización";
						$dato["accion"] = "Nuevo";
						$dato["contenedor"] = "programaConcientizacion/programaConcientizacion_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->progamasConcientizacion();
					}
				}else{
					$this->progamasConcientizacion();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function editarProgConcien($IdProgConcien){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('ProgramaConcientizacion_Modelo');
				$this->load->model('Empleado_Modelo');  
				$dato['empleados'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion);
				$dato['programaConcientizacion'] = $this->ProgramaConcientizacion_Modelo->getConcientizacion($IdProgConcien, $IdEmpresaSesion);    
				$dato["titulo"] = "Editar Programa de Concientización";   
				$dato["accion"] = "Editar";	
				$dato["contenedor"] = "programaConcientizacion/programaConcientizacion_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "progamasConcientizacion", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('ProgramaConcientizacion_Modelo');
						$this->load->model('Empleado_Modelo');  
						$dato['empleados'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion);
						$dato['programaConcientizacion'] = $this->ProgramaConcientizacion_Modelo->getConcientizacion($IdProgConcien, $IdEmpresaSesion);    
						$dato["titulo"] = "Editar Programa de Concientización";   
						$dato["accion"] = "Editar";	
						$dato["contenedor"] = "programaConcientizacion/programaConcientizacion_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->progamasConcientizacion();
					}
				}else{
					$this->progamasConcientizacion();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function guardarProgConcien(){
		$this->form_validation->set_rules('txtNombrePrograma','Nombre del Programa','trim|required');
		$this->form_validation->set_rules('txtCostoPlanificado','Costo planificado','trim|required');
		$this->form_validation->set_rules('txtFechaPlanificacion','Fecha de planificación','trim|required');
		$this->form_validation->set_rules('txtPeriodo','Periodo','trim|required|integer');
		$accion = $_POST['accion'];
		$id = $_POST['id'];			
		if ($this->form_validation->run() == false) {
			if ($accion == "Editar") {
				$this->editarProgConcien($id);				
			}else{
				$this->nuevoProgConcien();
			}
		}else{
			$this->load->model('ProgramaConcientizacion_Modelo');
			$tiempo = time();
			$txtNombrePrograma = $_POST["txtNombrePrograma"];
			$selectTipoEstado = $_POST["selectTipoEstado"];			
			$txtFechaPlanificacion = $_POST["txtFechaPlanificacion"];			
			$txtCostoPlanificado = $_POST["txtCostoPlanificado"];
			$selectEmpleado = $_POST["selectEmpleado"];
			$selectEstado = $_POST["selectEstado"];	
			$txtEmpresaConvenio = $_POST["txtEmpresaConvenio"];	
			$txtFechaInicio = $_POST["txtFechaInicio"];	
			$txtFechaFin = $_POST["txtFechaFin"];	
			$txtCostoEjecucion = $_POST["txtCostoEjecucion"];	
			$txtObservacion = $_POST["txtObservacion"];	
			$txtPeriodo = $_POST["txtPeriodo"];	
			$txtFechaSistema = date("Y-m-d H:i:s");
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($accion == "Editar"){
				$updateConcientizacion = array(					
					'NombrePrograma' => $txtNombrePrograma,
					'TipoPrograma' => $selectTipoEstado,
					'FechaPlanificacion' => $txtFechaPlanificacion,
					'CostoPlanificado' => $txtCostoPlanificado,
					'ResponsablePrograma' => $selectEmpleado,
					'EstadoPrograma' => $selectEstado,
					'ConvenioPrograma' => $txtEmpresaConvenio,
					'FechaInicioPrograma' => $txtFechaInicio,
					'FechaFinPrograma' => $txtFechaFin,
					'CostoPrograma' => $txtCostoEjecucion,
					'Observacion' => $txtObservacion,
					'Periodo' => $txtPeriodo,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->ProgramaConcientizacion_Modelo->updateConcientizacion($id, $updateConcientizacion, $IdEmpresaSesion)){
					$mensaje = "El Programa se actualizó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarProgConcien($id);
				}else{
					$mensaje = "El Programa no se ha actualizado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarProgConcien($id);
				}
			}else{
				$insertConcientizacion = array(
					'NombrePrograma' => $txtNombrePrograma,
					'TipoPrograma' => $selectTipoEstado,
					'FechaPlanificacion' => $txtFechaPlanificacion,
					'CostoPlanificado' => $txtCostoPlanificado,
					'ResponsablePrograma' => $selectEmpleado,
					'EstadoPrograma' => $selectEstado,
					'ConvenioPrograma' => $txtEmpresaConvenio,
					'FechaInicioPrograma' => $txtFechaInicio,
					'FechaFinPrograma' => $txtFechaFin,
					'CostoPrograma' => $txtCostoEjecucion,
					'Observacion' => $txtObservacion,
					'Periodo' => $txtPeriodo,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->ProgramaConcientizacion_Modelo->insertConcientizacion($insertConcientizacion)){
					$mensaje = "El Programa se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoProgConcien();				
				}else{
					$mensaje = "El Programa no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoProgConcien();				
				}
			}
		}
	}	
	public function eliminarProgConcien(){
		$this->load->model('ProgramaConcientizacion_Modelo'); 		          	
		$id = $_POST["IdProgramasCon"];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->ProgramaConcientizacion_Modelo->deleteConcientizacion($id, $IdEmpresaSesion); 
	}
	
}

?>