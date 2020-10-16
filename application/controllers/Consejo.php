<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//Controlador 
class consejo extends CI_Controller {

	function __construct()	{
		parent::__construct();				
	}

	//PARA MIGRAR
	public function filtroAnioConsejo(){
		$this->load->model('Consejo_Modelo');
	  	$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
      	$fetch_data = $this->Consejo_Modelo->getListConsejoAnio($IdEmpresaSesion);
      	$data = array();  
           foreach($fetch_data->result() as $row){  
                $sub_array = array();  
                $sub_array[] = $row->IdConsejos;
                $sub_array[] = '<td >'.$row->NombreConsejos.'<td>';
                $sub_array[] = '<td >'.$row->TipoConsejos.'<td>';
                $sub_array[] = '<td >'.$row->FuncionConsejos.'<td>';
                $sub_array[] = '<td >'.$row->Periodo.'<td>';
                $data[] = $sub_array;  
        }
        $output = array(
            "data"=>$data  
        );
           echo json_encode($output);
	}

	public function filtroAnioGuardarConsejo(){
		$this->form_validation->set_rules('txtPeriodo','Se requiere el periodo','trim|required');
		if($this->session->userdata("IdEmpresaSesion")){
			$this->load->model('Consejo_Modelo');
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$year = $_POST['anioMigrar'];
			$listaAcuerdos = $_POST['id'];
			$result = $this->Consejo_Modelo->insertConsejoSelectedMigrar($IdEmpresaSesion, $year, $listaAcuerdos); 
			
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
	public function consejos(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/gobierno" => "Gobierno",
			                     $inicioURL."consejo/consejos" => "Consejo"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Consejo_Modelo');
				$dato['admin'] = 1;
				$dato['consejos'] = $this->Consejo_Modelo->getListConsejo($IdEmpresaSesion);
				$dato['anios'] = $this->Consejo_Modelo->getListAniosConsejo($IdEmpresaSesion); 
				$dato["contenedor"] = "consejos/consejos_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "consejos", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('Consejo_Modelo');
						$dato['consejos'] = $this->Consejo_Modelo->getListConsejo($IdEmpresaSesion); 
						$dato["contenedor"] = "consejos/consejos_view";
						$dato['anios'] = $this->Consejo_Modelo->getListAniosConsejo($IdEmpresaSesion); 
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "consejos/consejos_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "consejos/consejos_view";
					$this->load->view('plantilla', $dato);
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function nuevoConsejo(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Consejo_Modelo');
				$dato['consejos'] = $this->Consejo_Modelo->getListConsejo($IdEmpresaSesion);  
				$dato["titulo"] = "Nuevo Consejo";
				$dato["accion"] = "Nuevo";
				$dato["contenedor"] = "consejos/consejos_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "consejos", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('Consejo_Modelo');
						$dato['consejos'] = $this->Consejo_Modelo->getListConsejo($IdEmpresaSesion);  
						$dato["titulo"] = "Nuevo Consejo";
						$dato["accion"] = "Nuevo";
						$dato["contenedor"] = "consejos/consejos_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->consejos();
					}
				}else{
					$this->consejos();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function editarConsejo($IdConsejo){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Consejo_Modelo');
				$dato['consejo'] = $this->Consejo_Modelo->getConsejo($IdConsejo, $IdEmpresaSesion);    
				$dato["titulo"] = "Editar Consejo";   
				$dato["accion"] = "Editar";	
				$dato["contenedor"] = "consejos/consejos_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "consejos", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('Consejo_Modelo');
						$dato['consejo'] = $this->Consejo_Modelo->getConsejo($IdConsejo, $IdEmpresaSesion);    
						$dato["titulo"] = "Editar Consejo";   
						$dato["accion"] = "Editar";	
						$dato["contenedor"] = "consejos/consejos_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->consejos();
					}
				}else{
					$this->consejos();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function guardarConsejo(){
		$this->form_validation->set_rules('txtNombreConsejo','Nombre del Consejo','trim|required'); 		
		$this->form_validation->set_rules('txtNumIntegrantesConsejo','Número de Integrantes','trim|integer|required');	
		$this->form_validation->set_rules('txtNumIntegrantesHombres','Número de Integrantes Hombres','trim|integer|required');
		$this->form_validation->set_rules('txtNumIntegrantesMujeres','Número de Integrantes Mujeres','trim|integer|required');	
		$this->form_validation->set_rules('txtFuncionesConsejo','Funciones del Consejo','trim|required');
		$this->form_validation->set_rules('txtPeriodo','Periodo','trim|required|integer');
		$accion = $_POST['accion'];
		$id = $_POST['id'];	
		if ($this->form_validation->run() == false) {
			if ($accion == "Editar") {
				$this->editarConsejo($id);				
			}else{
				$this->nuevoConsejo();
			}
		}else{	        
	        if(!empty($_FILES['inputFoto']['tmp_name']) && file_exists($_FILES['inputFoto']['tmp_name'])) {				
				$imagen= addslashes(file_get_contents($_FILES['inputFoto']['tmp_name']));
			}else{
				$imagen = "";
			}

			$this->load->model('Consejo_Modelo');
			$tiempo = time();
			$txtNombreConsejo = $_POST["txtNombreConsejo"];
			$selectTipoConsejo = $_POST["selectTipoConsejo"];			
			$txtNumIntegrantesConsejo = $_POST["txtNumIntegrantesConsejo"];
			$txtNumIntegrantesHombres = $_POST["txtNumIntegrantesHombres"];
			$txtNumIntegrantesMujeres = $_POST["txtNumIntegrantesMujeres"];
			$txtFuncionesConsejo = $_POST["txtFuncionesConsejo"];			
			$txtPeriodo = $_POST["txtPeriodo"];
			$txtFechaSistema = date("Y-m-d", $tiempo);		
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($_POST["accion"] == "Editar"){
				$updateConsejo = array(					
					'NombreConsejos' => $txtNombreConsejo,
					'TipoConsejos' => $selectTipoConsejo,					
					'IntegrantesConsejos' => $txtNumIntegrantesConsejo,
					'NumeroHombres' => $txtNumIntegrantesHombres,
					'NumeroMujeres' => $txtNumIntegrantesMujeres,
					'FuncionConsejos' => $txtFuncionesConsejo,
					'ImagenConsejos' => $imagen,
					'Periodo' => $txtPeriodo,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->Consejo_Modelo->updateConsejo($id, $updateConsejo, $IdEmpresaSesion)){
					$mensaje = "El Consejo se actualizó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarConsejo($id);			
				}else{
					$mensaje = "El Consejo no se ha actualizado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarConsejo($id);	
				}
			}else{
				$insertConsejo = array(
					'NombreConsejos' => $txtNombreConsejo,
					'TipoConsejos' => $selectTipoConsejo,					
					'IntegrantesConsejos' => $txtNumIntegrantesConsejo,
					'NumeroHombres' => $txtNumIntegrantesHombres,
					'NumeroMujeres' => $txtNumIntegrantesMujeres,
					'FuncionConsejos' => $txtFuncionesConsejo,
					'ImagenConsejos' => $imagen,
					'Periodo' => $txtPeriodo,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->Consejo_Modelo->insertConsejo($insertConsejo)){
					$mensaje = "El Consejo se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->consejos();				
				}else{
					$mensaje = "El Consejo no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoConsejo();				
				}
			} 
		}
	}
	public function eliminarConsejo(){
		$this->load->model('CapacitacionConsejos_Modelo'); 		          	
		$id  = $_POST['IdCapacitacionCon'];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
		$this->CapacitacionConsejos_Modelo->deleteCapacitacionConsejos($id, $IdEmpresaSesion); 
	}

	/**
	 * Capacitación a Consejos de la Empresa
	 */
	public function capacitacionConsejos(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/capacitaciones" => "Capacitaciones",
			                     $inicioURL."consejo/capacitacionConsejos" => "Capacitación a Consejos"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('CapacitacionConsejos_Modelo');
				$dato['admin'] = 1;
				$dato['capacitacionConsejosEmpresa'] = $this->CapacitacionConsejos_Modelo->getListCapacitacionConsejos($IdEmpresaSesion);
				$dato["contenedor"] = "consejos/capacitacionConsejosEmpresa_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "capacitacionConsejos", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('CapacitacionConsejos_Modelo');
						$dato['capacitacionConsejosEmpresa'] = $this->CapacitacionConsejos_Modelo->getListCapacitacionConsejos($IdEmpresaSesion);
						$dato["contenedor"] = "consejos/capacitacionConsejosEmpresa_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "consejos/capacitacionConsejosEmpresa_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "consejos/capacitacionConsejosEmpresa_view";
					$this->load->view('plantilla', $dato);
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function editarCapacitacionConsejos($IdCapacitacionConsejos){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('CapacitacionConsejos_Modelo');
				$this->load->model('Consejo_Modelo');
				$this->load->model('Proveedor_Modelo');
				$this->load->model('Empleado_Modelo');
				$dato['empleado'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion);  
				$dato['capacitacionConsejoEmpresa'] = $this->CapacitacionConsejos_Modelo->getListCapacitacionConsejos($IdEmpresaSesion); 
				$dato['proveedores'] = $this->Proveedor_Modelo->getListProveedor($IdEmpresaSesion);
				$dato['capacitacionConsejo'] = $this->CapacitacionConsejos_Modelo->getCapacitacionConsejos($IdCapacitacionConsejos, $IdEmpresaSesion);
				$dato['consejos'] = $this->Consejo_Modelo->getListConsejo($IdEmpresaSesion);  
				$dato["titulo"] = "Editar Capacitación de Consejos";   
				$dato["accion"] = "Editar";
				$dato["contenedor"] = "consejos/capacitacionConsejosEmpresa_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "capacitacionConsejos", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('CapacitacionConsejos_Modelo');
						$this->load->model('Consejo_Modelo');
						$this->load->model('Proveedor_Modelo');
						$this->load->model('Empleado_Modelo');
						$dato['empleado'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion);  
						$dato['capacitacionConsejoEmpresa'] = $this->CapacitacionConsejos_Modelo->getListCapacitacionConsejos($IdEmpresaSesion); 
						$dato['proveedores'] = $this->Proveedor_Modelo->getListProveedor($IdEmpresaSesion);
						$dato['capacitacionConsejo'] = $this->CapacitacionConsejos_Modelo->getCapacitacionConsejos($IdCapacitacionConsejos, $IdEmpresaSesion);
						$dato['consejos'] = $this->Consejo_Modelo->getListConsejo($IdEmpresaSesion);  
						$dato["titulo"] = "Editar Capacitación de Consejos";   
						$dato["accion"] = "Editar";
						$dato["contenedor"] = "consejos/capacitacionConsejosEmpresa_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->capacitacionConsejos();
					}
				}else{
					$this->capacitacionConsejos();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function nuevaCapacitacionConsejos(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('CapacitacionConsejos_Modelo');
				$this->load->model('Consejo_Modelo');
				$this->load->model('Proveedor_Modelo');
				$this->load->model('Empleado_Modelo');
				$dato['capacitacionConsejoEmpresa'] = $this->CapacitacionConsejos_Modelo->getListCapacitacionConsejos($IdEmpresaSesion);
				$dato['empleado'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion);  
				$dato['consejos'] = $this->Consejo_Modelo->getListConsejo($IdEmpresaSesion);  
				$dato['proveedores'] = $this->Proveedor_Modelo->getListProveedor($IdEmpresaSesion);  
				$dato["titulo"] = "Nueva Capacitación  a Consejos";
				$dato["accion"] = "Nuevo";
				$dato["contenedor"] = "consejos/capacitacionConsejosEmpresa_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "capacitacionConsejos", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('CapacitacionConsejos_Modelo');
						$this->load->model('Consejo_Modelo');
						$this->load->model('Proveedor_Modelo');
						$this->load->model('Empleado_Modelo');
						$dato['capacitacionConsejoEmpresa'] = $this->CapacitacionConsejos_Modelo->getListCapacitacionConsejos($IdEmpresaSesion);
						$dato['empleado'] = $this->Empleado_Modelo->getListEmpleado($IdEmpresaSesion);  
						$dato['consejos'] = $this->Consejo_Modelo->getListConsejo($IdEmpresaSesion);  
						$dato['proveedores'] = $this->Proveedor_Modelo->getListProveedor($IdEmpresaSesion);  
						$dato["titulo"] = "Nueva Capacitación  a Consejos";
						$dato["accion"] = "Nuevo";
						$dato["contenedor"] = "consejos/capacitacionConsejosEmpresa_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->capacitacionConsejos();
					}
				}else{
					$this->capacitacionConsejos();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function guardarCapacitacionConsejos(){
		$this->form_validation->set_rules('txtNombreCapacitacion','Nombre de la Capacitación','trim|required');	
		$this->form_validation->set_rules('txtFechaPlanificacion','Fecha de Planificación','trim|required'); 		
		$this->form_validation->set_rules('txtPresupuesto','Presupuesto','trim|required'); 		
		$this->form_validation->set_rules('txtCantHorasPlanificadas','Cantidad de horas Planificada','trim|integer|required'); 		
		$this->form_validation->set_rules('txtNumParticipantesEsperados','Número de Participantes esperados','trim|integer|required'); 	
		$this->form_validation->set_rules('txtPeriodo','Periodo','trim|integer|required'); 	
		$accion = $_POST['accion'];
		$id = $_POST['id']; 
		if ($this->form_validation->run() == false) {
			if ($accion == "Nuevo") {
				$this->nuevaCapacitacionConsejos();		
			}else{
				$this->editarCapacitacionConsejos($id);					
			}
		}else{
			$this->load->model('CapacitacionConsejos_Modelo');
			$tiempo = time();
			$selectConsejos = $_POST["selectConsejos"];
			$txtNombreCapacitacion = $_POST["txtNombreCapacitacion"];
			$txtFechaPlanificacion = $_POST["txtFechaPlanificacion"];
			$selectTipoCapacitacion = $_POST["selectTipoCapacitacion"];
			$txtPresupuesto = $_POST["txtPresupuesto"];
			$txtCantHorasPlanificadas = $_POST["txtCantHorasPlanificadas"];
			$txtNumParticipantesEsperados = $_POST["txtNumParticipantesEsperados"];
			$selectEstado = $_POST["selectEstado"];
			$selectProveedor = $_POST["selectProveedor"];
			$txtFechaEjecucion = $_POST["txtFechaEjecucion"];
			$txtNumParticipantesCapacitados = $_POST["txtNumParticipantesCapacitados"];
			$txtCantHorasEjecutadas = $_POST["txtCantHorasEjecutadas"];				
			$txtCosto = $_POST["txtCosto"];				
			$selectEmpleado = $_POST["selectEmpleado"];				
			$txtPeriodo = $_POST["txtPeriodo"];				
			$txtFechaSistema = date('Y-m-d H:i:s');
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($accion == "Editar"){
				$updateCapacitacionConsejos = array(
					'IdConsejo' => $selectConsejos,
					'NombreCapacitacion' => $txtNombreCapacitacion,
					'FechaPlanificada' => $txtFechaPlanificacion,
					'TipoCapacitacion' => $selectTipoCapacitacion,
					'Presupuesto' => $txtPresupuesto,
					'HorasPlanificadas' => $txtCantHorasPlanificadas,
					'ParticipantesEsperadosPOA' => $txtNumParticipantesEsperados,
					'EstadoCapacitacion' => $selectEstado,
					'IdProveedor' => $selectProveedor,
					'FechaEjecucion' => $txtFechaEjecucion,
					'ParticipantesCapacitados' => $txtNumParticipantesCapacitados,
					'HorasEjecutadas' => $txtCantHorasEjecutadas,
					'Costo' => $txtCosto,
					'EmpleadoResponsable' => $selectEmpleado,
					'Periodo' => $txtPeriodo,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->CapacitacionConsejos_Modelo->updateCapacitacionConsejos($id, $updateCapacitacionConsejos, $IdEmpresaSesion)){
					$mensaje = "La Capacitación fue actualizada con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarCapacitacionConsejos($id);				
				}else{
					$mensaje = "La Capacitación no se ha actualizado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarCapacitacionConsejos($id);				
				}
			}else{
				$insertCapacitacionConsejos = array(
					'IdConsejo' => $selectConsejos,
					'NombreCapacitacion' => $txtNombreCapacitacion,
					'FechaPlanificada' => $txtFechaPlanificacion,
					'TipoCapacitacion' => $selectTipoCapacitacion,
					'Presupuesto' => $txtPresupuesto,
					'HorasPlanificadas' => $txtCantHorasPlanificadas,
					'ParticipantesEsperadosPOA' => $txtNumParticipantesEsperados,
					'EstadoCapacitacion' => $selectEstado,
					'IdProveedor' => $selectProveedor,
					'FechaEjecucion' => $txtFechaEjecucion,
					'ParticipantesCapacitados' => $txtNumParticipantesCapacitados,
					'HorasEjecutadas' => $txtCantHorasEjecutadas,
					'Costo' => $txtCosto,
					'EmpleadoResponsable' => $selectEmpleado,
					'Periodo' => $txtPeriodo,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->CapacitacionConsejos_Modelo->insertCapacitacionConsejos($insertCapacitacionConsejos)){
					$mensaje = "La Capacitación se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->capacitacionConsejos();				
				}else{
					$mensaje = "La Capacitación no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevaCapacitacionConsejos();				
				}
			}
		}
	}
	public function eliminarCapacitacionConsejos(){
		$this->load->model('CapacitacionConsejos_Modelo'); 		          	
		$CapacitacionConsejos 		= json_decode($this->input->post('MiCapacitacionConsejos'));
		$id          = base64_decode($CapacitacionConsejos->Id);
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->CapacitacionConsejos_Modelo->deleteCapacitacionConsejos($id, $IdEmpresaSesion); 
	}
	
		public function eliminarConsejos(){
		$this->load->model('CapacitacionConsejos_Modelo');
		$id  = $_POST["IdConsejo"];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->CapacitacionConsejos_Modelo->deleteConsejos($id, $IdEmpresaSesion); 
	}
}

?>