<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//Controlador 
class memoria extends CI_Controller {

	function __construct()	{
		parent::__construct();				
	}

	//PARA MIGRAR
	// PARA MEMORIA POLITICAS 
	public function filtroAnioPoliticasPracticas(){
		$this->load->model('Memoria_Modelo');
	  	$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
      	$fetch_data = $this->Memoria_Modelo->getListPoliticasPracticasAnio($IdEmpresaSesion);
      	$data = array();  
           foreach($fetch_data->result() as $row){  
                $sub_array = array();  
                $sub_array[] = $row->IdPoliticaPractica;
                $sub_array[] = '<td >'.$row->PoliticaPractica.'<td>';
                $sub_array[] = '<td >'.$row->Periodo.'<td>';
                $data[] = $sub_array;  
        }
        $output = array(
            "data"=>$data  
        );
           echo json_encode($output);
	}

	public function filtroAnioGuardarPoliticasPracticas(){
		$this->form_validation->set_rules('txtPeriodo','Se requiere el periodo','trim|required');
		if($this->session->userdata("IdEmpresaSesion")){
			$this->load->model('Memoria_Modelo');
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$year = $_POST['anioMigrar'];
			$listaAcuerdos = $_POST['id'];
			$result = $this->Memoria_Modelo->insertPoliticasPracticasSelectedMigrar($IdEmpresaSesion, $year, $listaAcuerdos); 
			
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

	//PARA MEMORIA DETALLE
	public function filtroAnioMemoriaDetalle(){
		$this->load->model('Memoria_Modelo');
	  	$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
      	$fetch_data = $this->Memoria_Modelo->getListDetalleMemoriaAnio($IdEmpresaSesion);
      	$data = array();  
           foreach($fetch_data->result() as $row){  
                $sub_array = array();  
                $sub_array[] = $row->IdDetalleMemoria;
                $sub_array[] = '<td >'.$row->CicloPresentacion.'<td>';
                $sub_array[] = '<td >'.$row->PeriodoObjeto.'<td>';
                $data[] = $sub_array;  
        }
        $output = array(
            "data"=>$data  
        );
           echo json_encode($output);
	}

	public function filtroAnioGuardarMemoriaDetalle(){
		$this->form_validation->set_rules('txtPeriodo','Se requiere el periodo','trim|required');
		if($this->session->userdata("IdEmpresaSesion")){
			$this->load->model('Memoria_Modelo');
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$year = $_POST['anioMigrar'];
			$listaAcuerdos = $_POST['id'];
			$result = $this->Memoria_Modelo->insertDetalleMemoriaSelectedMigrar($IdEmpresaSesion, $year, $listaAcuerdos); 
			
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

	//Función para cargar el inicio
	public function index()	{
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa" => "Empresa",
			                     $inicioURL."memoria" => "Descripción de la Memoria"
			                    );						
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "memoria/modulosMemoria";
			$this->load->view("plantilla", $dato);
		}else{
			redirect('inicio');
		}		
	}

	//REPORTES CONTROLADOR
	public function memoriaPlantilla($periodo){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$this->load->model('ImagenInstitucional_Modelo');
			$this->load->model('BalanceSocial_Modelo');
			$this->load->model('Empresa_Modelo');
			$this->load->model('ValoresEmpresa_Modelo');
			$this->load->model('Memoria_Modelo');
			$this->load->model('InformeMemoria_Modelo');
			$this->load->model('SesionAsambleaGeneral_Modelo');
			$this->load->model('Consejo_Modelo');
			$this->load->model('SesionConsejo_Modelo');
			$this->load->model('Comite_Modelo');
			$this->load->model('Representante_Modelo');
			$this->load->model('Certificaciones_Modelo');
			$this->load->model('DistribucionValorEconomico_Modelo');
			$this->load->model('Proveedor_Modelo');
			$this->load->model('ProductosEmpresa_Modelo');
			$this->load->model('ServiciosEmpresa_Modelo');
			$this->load->model('CapacitacionEmpleado_Modelo');
			$this->load->model('Donacion_Modelo');
			$tiempo = time();
			$fechaSistema = date("Y-m-d H:i:s", $tiempo);
			$dato['fechaSistema'] = $fechaSistema;			
			//$dato['indicadoresCuantitativoCalifiacadoEmpresa'] = $this->BalanceSocial_Modelo->getListIndicadorCuantitativoCalificadoAnio($IdDatosTotales, $IdEmpresaSesion);
			//Imégenes institucionales
			$dato['imagenesInstitucionales'] = $this->ImagenInstitucional_Modelo->getListImagenInstitucinalPeriodo($periodo, $IdEmpresaSesion);
			//Datos Generales de la Empresa
			$dato['empresa'] = $this->Empresa_Modelo->getEmpresa($IdEmpresaSesion);
			$dato['valoresEmpresa'] = $this->ValoresEmpresa_Modelo->getListValoresEmpresa($IdEmpresaSesion);
			//Datos del Detalle Estructural de la Empresa
			$dato['detalleEstructuraMemoria'] = $this->Memoria_Modelo->getEstructuraMemoriaPeriodo($periodo, $IdEmpresaSesion);
			//Datos de Declaración del Presidente
			$dato['declaracionPresidenteDecripcionInforme'] = $this->InformeMemoria_Modelo->getDeclaracionPresidenteMemoriaPeriodo($periodo, $IdEmpresaSesion);
			//Datos de Sesiones de Asamblea General
			$dato['sesionAsambleaGeneral'] = $this->SesionAsambleaGeneral_Modelo->getAsambleaGeneralPeriodo($periodo, $IdEmpresaSesion);
			//Datos de Consejos Administración
			$dato['consejoAdministracion'] = $this->Consejo_Modelo->getConsejoAdministracionPeriodo($periodo, $IdEmpresaSesion);
			//Datos de Consejos Vigilancia
			$dato['consejoVIgilancia'] = $this->Consejo_Modelo->getConsejoVigilanciaPeriodo($periodo, $IdEmpresaSesion);
			//Datos de Sesiones de Consejos
			$dato['sesionesConsejos'] = $this->SesionConsejo_Modelo->getListSesionConsejoPeriodo($periodo, $IdEmpresaSesion);
			//Datos de Comités
			$dato['comites'] = $this->Comite_Modelo->getListComitePeriodo($periodo, $IdEmpresaSesion);
			//Datos de Representantes, Ejecutivo, Operativo y Gerencial
			$dato['representantesEjecutivos'] = $this->Representante_Modelo->getListRepresentanteOrganismoPeriodo($periodo, $IdEmpresaSesion);
			//Datos de Certificaciones
			$dato['certificaciones'] = $this->Certificaciones_Modelo->getCertificacionesPeriodo($periodo, $IdEmpresaSesion);
			//Datos de BalanceGeneral
			$dato['balanceGeneral'] = $this->Memoria_Modelo->getBalanceGeneralPeriodo($periodo, $IdEmpresaSesion);
			//Datos de Distibución del Valor Económico
			$dato['distribValorEconomicoGenerado'] = $this->DistribucionValorEconomico_Modelo->getDistribucionValorEconomicoGeneradoPeriodo($periodo, $IdEmpresaSesion);
			$dato['distribValorEconomicoDistribuido'] = $this->DistribucionValorEconomico_Modelo->getDistribucionValorEconomicoDistribuidoPeriodo($periodo, $IdEmpresaSesion);
			//Datos de Contratos Con Proveedores
			$dato['contratosProveedoresLocales'] = $this->Proveedor_Modelo->getNumContratoProveedorLocalPeriodo($periodo, $IdEmpresaSesion);
			$dato['contratosProveedoresNacionales'] = $this->Proveedor_Modelo->getNumContratoProveedorNacionalPeriodo($periodo, $IdEmpresaSesion);
			$dato['contratosProveedores'] = $this->Proveedor_Modelo->getNumContratoProveedorPeriodo($periodo, $IdEmpresaSesion);
			$dato['contratosProveedoresLocalesPA'] = $this->Proveedor_Modelo->getNumContratoProveedorLocalPeriodo(($periodo - 1), $IdEmpresaSesion);
			$dato['contratosProveedoresNacionalesPA'] = $this->Proveedor_Modelo->getNumContratoProveedorNacionalPeriodo(($periodo- 1), $IdEmpresaSesion);
			$dato['contratosProveedoresPA'] = $this->Proveedor_Modelo->getNumContratoProveedorPeriodo(($periodo - 1), $IdEmpresaSesion);
			//Datos de Satisfacción Clientes y Servicios Financieros
			$dato['satisfaccionClienteServiciosPA'] = $this->InformeMemoria_Modelo->getSatisfaccionClienteServiciosPeriodo(($periodo - 1), $IdEmpresaSesion);
			$dato['satisfaccionClienteServicios'] = $this->InformeMemoria_Modelo->getSatisfaccionClienteServiciosPeriodo($periodo, $IdEmpresaSesion);
			//Datos de Reclamos
			$dato['datosTotalesPA'] = $this->InformeMemoria_Modelo->getDatosTotalesPeriodo(($periodo - 1), $IdEmpresaSesion);
			$dato['datosTotales'] = $this->InformeMemoria_Modelo->getDatosTotalesPeriodo($periodo, $IdEmpresaSesion);
			//Datos de Productos
			$dato['productosEmpresa'] = $this->ProductosEmpresa_Modelo->getListProductosEmpresa($IdEmpresaSesion);
			//Datos de Servicios
			$dato['serviciosEmpresa'] = $this->ServiciosEmpresa_Modelo->getListServiciosEmpresaSeis($IdEmpresaSesion);
			//Datos de edad promedio de Empleados
			$dato['edadPromedioEmpleados'] = $this->InformeMemoria_Modelo->getEdadPromedioEmpleados($IdEmpresaSesion);
			//Datos de capacitaciones a empleados
			$dato['capacitacionesEmpleados'] = $this->CapacitacionEmpleado_Modelo->getListCapacitacionEmpleadoPeriodo($periodo, $IdEmpresaSesion);
			//Datos de donaciones
			$dato['donaciones'] = $this->Donacion_Modelo->getListDonacionPeriodo($periodo, $IdEmpresaSesion);
			


			$this->load->view('balanceSocial/memoriaPlantilla', $dato);
		}else{
			redirect('inicio');
		}
	}
	// FIN REPORTES CONTROLADOR

	/**
	 * Políticas y Prácticas de la Memoria DML
	 */
	public function memoriaPoliticasPracticas(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa" => "Empresa",
			                     $inicioURL."memoria" => "Descripción de la Memoria",
			                     $inicioURL."memoria/memoriaPoliticasPracticas" => "Políticas y Prácticas Vigentes"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Memoria_Modelo');
				$dato['memoriaPoliticaPracticas'] = $this->Memoria_Modelo->getListPoliticaPracticaMemoria($IdEmpresaSesion);
				$dato["admin"] = 1;
					$dato['anios'] = $this->Memoria_Modelo->getListAniosPoliticasPracticas($IdEmpresaSesion); 
				$dato["contenedor"] = "memoria/politicasPracticas_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "memoriaPoliticasPracticas", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('Memoria_Modelo');
						$dato['memoriaPoliticaPracticas'] = $this->Memoria_Modelo->getListPoliticaPracticaMemoria($IdEmpresaSesion);
						$dato["contenedor"] = "memoria/politicasPracticas_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "memoria/politicasPracticas_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "memoria/politicasPracticas_view";
					$this->load->view('plantilla', $dato);
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function nuevaPoliticaPractica(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Memoria_Modelo');
				$dato["titulo"] = "Nueva Política o Práctica Vigente";
				$dato["accion"] = "Nuevo";
				$dato["contenedor"] = "memoria/politicaPractica_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "memoriaPoliticasPracticas", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('Memoria_Modelo');
						$dato["titulo"] = "Nueva Política o Práctica Vigente";
						$dato["accion"] = "Nuevo";
						$dato["contenedor"] = "memoria/politicaPractica_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->memoriaPoliticasPracticas();
					}
				}else{
					$this->memoriaPoliticasPracticas();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function editarPoliticaPractica($IdEstrategia){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Memoria_Modelo');
				$dato['politicaPractica'] = $this->Memoria_Modelo->getPoliticaPracticaMemoria($IdEstrategia, $IdEmpresaSesion);
				$dato["titulo"] = "Editar Política o Práctica Vigente";
				$dato["accion"] = "Editar";
				$dato["contenedor"] = "memoria/politicaPractica_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "memoriaPoliticasPracticas", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('Memoria_Modelo');
						$dato['politicaPractica'] = $this->Memoria_Modelo->getPoliticaPracticaMemoria($IdEstrategia, $IdEmpresaSesion);
						$dato["titulo"] = "Editar Política o Práctica Vigente";
						$dato["accion"] = "Editar";
						$dato["contenedor"] = "memoria/politicaPractica_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->memoriaPoliticasPracticas();
					}
				}else{
					$this->memoriaPoliticasPracticas();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function guardarPoliticaPractica(){
		$this->form_validation->set_rules('txtPoliticaPractica','Política o Práctica Vigente','trim|required');
		$this->form_validation->set_rules('txtPeriodo','Periodo','trim|required|integer');
		$accion = $_POST['accion'];
		$id = $_POST['id'];			
		if ($this->form_validation->run() == false) {
			if ($accion == "Editar") {
				$this->editarPoliticaPractica($id);
			}else{
				$this->nuevaPoliticaPractica();
			}
		}else{
			$this->load->model('Memoria_Modelo');
			$tiempo = time();
			$txtPoliticaPractica = $_POST["txtPoliticaPractica"];
			$txtPeriodo = $_POST["txtPeriodo"];
			$txtFechaSistema = date("Y-m-d H:i:s", $tiempo);			
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($_POST["accion"] == "Editar"){
				$updatePoliticaPractica = array(					
						'PoliticaPractica' => $txtPoliticaPractica,
						'Periodo' => $txtPeriodo,
						'FechaSistema' => $txtFechaSistema,
						'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->Memoria_Modelo->updatePoliticaPracticaMemoria($id, $updatePoliticaPractica, $IdEmpresaSesion)){
					$mensaje = "La Política o Práctica Vigente se actualizó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarPoliticaPractica($id);
				}else{
					$mensaje = "La Política o Práctica Vigente no se ha actualizado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarPoliticaPractica($id);
				}
			}else{
				$insertpoliticaPractica = array(
						'PoliticaPractica' => $txtPoliticaPractica,
						'Periodo' => $txtPeriodo,
						'FechaSistema' => $txtFechaSistema,
						'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->Memoria_Modelo->insertPoliticaPracticaMemoria($insertpoliticaPractica)){
					$mensaje = "La Política o Práctica Vigente se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevaPoliticaPractica();				
				}else{
					$mensaje = "La Política o Práctica Vigente no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevaPoliticaPractica();				
				}
			}			
		}
	}
	public function eliminarPoliticaPractica(){
		$this->load->model('Memoria_Modelo'); 		          	
		$idPolPra = $_POST["iddPolPra"];		
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->Memoria_Modelo->deletePoliticaPracticaMemoria($idPolPra, $IdEmpresaSesion); 
	}
	/**
	 * Deatalle la Memoria DML
	 */
	public function detallesMemoria(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa" => "Empresa",
			                     $inicioURL."memoria" => "Descripción de la Memoria",
			                     $inicioURL."memoria/detallesMemoria" => "Detalles de la Memoria"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Memoria_Modelo');
				$dato['detallesMemoria'] = $this->Memoria_Modelo->getListDetalleMemoria($IdEmpresaSesion);
				$dato["admin"] = 1;
				$dato['anios'] = $this->Memoria_Modelo->getListAniosDetalleMemoria($IdEmpresaSesion); 
				$dato["contenedor"] = "memoria/detallesMemoria_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "detallesMemoria", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('Memoria_Modelo');
						$dato['detallesMemoria'] = $this->Memoria_Modelo->getListDetalleMemoria($IdEmpresaSesion);
					}else{
						$dato["contenedor"] = "memoria/detallesMemoria_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "memoria/detallesMemoria_view";
					$this->load->view('plantilla', $dato);
				}
 			}
		
		}else{
			redirect('inicio');
		}
	}
	public function nuevoDetalleMemoria(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Memoria_Modelo'); 
				$dato["titulo"] = "Nuevo Detalle de la Memoria";
				$dato["accion"] = "Nuevo";
				$dato["contenedor"] = "memoria/detalleMemoria_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "detallesMemoria", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('Memoria_Modelo'); 
						$dato["titulo"] = "Nuevo Detalle de la Memoria";
						$dato["accion"] = "Nuevo";
						$dato["contenedor"] = "memoria/detalleMemoria_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->detallesMemoria();
					}
				}else{
					$this->detallesMemoria();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function editarDetalleMemoria($IdEstrategia){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Memoria_Modelo');
				$dato['detalleMemoria'] = $this->Memoria_Modelo->getDetalleMemoria($IdEstrategia, $IdEmpresaSesion);
				$dato["titulo"] = "Editar Detalle de la Memoria";
				$dato["accion"] = "Editar";
				$dato["contenedor"] = "memoria/detalleMemoria_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "detallesMemoria", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('Memoria_Modelo');
						$dato['detalleMemoria'] = $this->Memoria_Modelo->getDetalleMemoria($IdEstrategia, $IdEmpresaSesion);
						$dato["titulo"] = "Editar Detalle de la Memoria";
						$dato["accion"] = "Editar";
						$dato["contenedor"] = "memoria/detalleMemoria_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->detallesMemoria();
					}
				}else{
					$this->detallesMemoria();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function guardarDetalleMemoria(){
		$this->form_validation->set_rules('txtPeriodoObjeto','Periodo Objeto de la Memoria','trim|required|integer');
		$this->form_validation->set_rules('txtFechaUltimaMemoria','Fecha de Última Memoria','trim|required');
		$this->form_validation->set_rules('txtCicloPresentacion','Ciclo de Presentación de Memorias','trim|required');
		$accion = $_POST['accion'];
		$id = $_POST['id'];			
		if ($this->form_validation->run() == false) {
			if ($accion == "Editar") {
				$this->editarDetalleMemoria($id);
			}else{
				$this->nuevoDetalleMemoria();
			}
		}else{
			$this->load->model('Memoria_Modelo');
			$tiempo = time();
			$txtPeriodoObjeto = $_POST["txtPeriodoObjeto"];
			$txtFechaUltimaMemoria = $_POST["txtFechaUltimaMemoria"];
			$txtCicloPresentacion = $_POST["txtCicloPresentacion"];
			$txtFechaSistema = date("Y-m-d H:i:s", $tiempo);			
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($_POST["accion"] == "Editar"){
				$updatePoliticaPractica = array(					
						'PeriodoObjeto' => $txtPeriodoObjeto,
						'FechaUltimaMemoria' => $txtFechaUltimaMemoria,
						'CicloPresentacion' => $txtCicloPresentacion,
						'FechaSistema' => $txtFechaSistema,
						'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->Memoria_Modelo->updateDetalleMemoria($id, $updatePoliticaPractica, $IdEmpresaSesion)){
					$mensaje = "Ele detalle de la Memoria se actualizó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarDetalleMemoria($id);
				}else{
					$mensaje = "Ele detalle de la Memoria no se ha actualizado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarDetalleMemoria($id);
				}
			}else{
				$insertpoliticaPractica = array(
						'PeriodoObjeto' => $txtPeriodoObjeto,
						'FechaUltimaMemoria' => $txtFechaUltimaMemoria,
						'CicloPresentacion' => $txtCicloPresentacion,
						'FechaSistema' => $txtFechaSistema,
						'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->Memoria_Modelo->insertDetalleMemoria($insertpoliticaPractica)){
					$mensaje = "Ele detalle de la Memoria se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoDetalleMemoria();				
				}else{
					$mensaje = "Ele detalle de la Memoria no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoDetalleMemoria();				
				}
			}			
		}
	}
	public function eliminarDetalleMemoria(){
		$this->load->model('Memoria_Modelo');
		$idDetaMemo = $_POST["IdDetalleMem"];		
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->Memoria_Modelo->deleteDetalleMemoria($idDetaMemo, $IdEmpresaSesion); 
	}
	/**
	 * Detalles de la Estructura de la Memoria (introducción de cada Sub-Tema)
	 */	
	public function detallesEstructuraDeMemoria(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
				$inicioURL."empresa" => "Empresa",
				$inicioURL."memoria" => "Descripción de la Memoria",
				$inicioURL."memoria/detallesEstructuraDeMemoria" => "Estructura de la Memoria"
				);
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
			if ($tipoUsuario == "Admin") {
				$this->load->model('Memoria_Modelo');
				$dato['detallesEstructuraDeMemoria'] = $this->Memoria_Modelo->getListEstructuraMemoria($IdEmpresaSesion);
				$dato["admin"] = 1;
				$dato["contenedor"] = "memoria/detalleEstructuraMemoria_view";
				$this->load->view('plantilla', $dato);
			}else{
				$perfilSesion = $this->session->userdata("perfilSesion");
				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "detallesEstructuraDeMemoria", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('Memoria_Modelo');
						$dato['detallesEstructuraDeMemoria'] = $this->Memoria_Modelo->getListEstructuraMemoria($IdEmpresaSesion);
					}else{
						$dato["contenedor"] = "memoria/detalleEstructuraMemoria_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "memoria/detalleEstructuraMemoria_view";
					$this->load->view('plantilla', $dato);
				}
			}

		}else{
			redirect('inicio');
		}
	}
	public function nuevaEstructuraDeMemoria(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Memoria_Modelo'); 
				$dato["titulo"] = "Nuevo Detalle Estructural de la Memoria";
				$dato["accion"] = "Nuevo";
				$dato["contenedor"] = "memoria/detalleEstructuraMemoria_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "detallesEstructuraDeMemoria", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('Memoria_Modelo'); 
						$dato["titulo"] = "Nuevo Detalle Estructural de la Memoria";
						$dato["accion"] = "Nuevo";
						$dato["contenedor"] = "memoria/detalleEstructuraMemoria_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->detallesEstructuraDeMemoria();
					}
				}else{
					$this->detallesEstructuraDeMemoria();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function editarEstructuraMemoria($IdEstructuraMemoria){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Memoria_Modelo');
				$dato['detalleEstructuraDeMemoria'] = $this->Memoria_Modelo->getEstructuraMemoria($IdEstructuraMemoria, $IdEmpresaSesion);
				$dato["titulo"] = "Editar Detalle Estructural de la Memoria";
				$dato["accion"] = "Editar";
				$dato["contenedor"] = "memoria/detalleEstructuraMemoria_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "detallesEstructuraDeMemoria", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('Memoria_Modelo');
						$dato['detalleEstructuraDeMemoria'] = $this->Memoria_Modelo->getEstructuraMemoria($IdEstructuraMemoria, $IdEmpresaSesion);
						$dato["titulo"] = "Editar Detalle Estructural de la Memoria";
						$dato["accion"] = "Editar";
						$dato["contenedor"] = "memoria/detalleEstructuraMemoria_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->detallesEstructuraDeMemoria();
					}
				}else{
					$this->detallesEstructuraDeMemoria();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function guardarEstructuraMemoria(){
		$this->form_validation->set_rules('txtPeriodo','Periodo','trim|required|integer');
		$accion = $_POST['accion'];
		$id = $_POST['id'];			
		if ($this->form_validation->run() == false) {
			if ($accion == "Editar") {
				$this->editarEstructuraMemoria($id);
			}else{
				$this->nuevaEstructuraDeMemoria();
			}
		}else{
			$this->load->model('Memoria_Modelo');
			$tiempo = time();
			$txtIntroduccionMemoria = $_POST["txtIntroduccionMemoria"];
			$txtMensajePresidente = $_POST["txtMensajePresidente"];
			$txtMensajeGerencia = $_POST["txtMensajeGerencia"];
			$txtIntroGobierno = $_POST["txtIntroGobierno"];
			$txtIntroGobiernoRepresentantes = $_POST["txtIntroGobiernoRepresentantes"];
			$txtIntroGobiernoCosejoAdministracion = $_POST["txtIntroGobiernoCosejoAdministracion"];
			$txtIntroGobiernoConsejoVigilancia = $_POST["txtIntroGobiernoConsejoVigilancia"];
			$txtIntroGobiernoConsejos = $_POST["txtIntroGobiernoConsejos"];
			$txtIntroGobiernoComites = $_POST["txtIntroGobiernoComites"];
			$txtIntroGobiernoEjecutivos = $_POST["txtIntroGobiernoEjecutivos"];
			$txtIntroCertificaciones = $_POST["txtIntroCertificaciones"];
			$txtIntroBalanceGeneral = $_POST["txtIntroBalanceGeneral"];
			$txtIntroValorEconomicoGenerado = $_POST["txtIntroValorEconomicoGenerado"];
			$txtIntroValorEconomicoDistribuido = $_POST["txtIntroValorEconomicoDistribuido"];
			$txtIntroCreditosASocios = $_POST["txtIntroCreditosASocios"];
			$txtIntroContratosConProveedores = $_POST["txtIntroContratosConProveedores"];
			$txtIntroSatisfaccionAlCliente = $_POST["txtIntroSatisfaccionAlCliente"];
			$txtIntroQuejasYReclamos = $_POST["txtIntroQuejasYReclamos"];
			$txtIntroCrecimientoSustentableDeSociosEnCooperativa = $_POST["txtIntroCrecimientoSustentableDeSociosEnCooperativa"];
			$txtIntroProductosYSevicios = $_POST["txtIntroProductosYSevicios"];
			$txtIntroProductos = $_POST["txtIntroProductos"];
			$txtIntroSevicios = $_POST["txtIntroSevicios"];
			$txtIntroTalentoHumano = $_POST["txtIntroTalentoHumano"];
			$txtIntroEdadTalentoHumano = $_POST["txtIntroEdadTalentoHumano"];
			$txtIntroContratoTalentoHumano = $_POST["txtIntroContratoTalentoHumano"];
			$txtIntroCapacitaciones = $_POST["txtIntroCapacitaciones"];
			$txtIntroSeguridadOcupacional = $_POST["txtIntroSeguridadOcupacional"];
			$txtIntroProgramasSaludLaboral = $_POST["txtIntroProgramasSaludLaboral"];
			$txtIntroAportesComunidad = $_POST["txtIntroAportesComunidad"];
			$txtIntroManejoRespomsableDeEnergiaElectrica = $_POST["txtIntroManejoRespomsableDeEnergiaElectrica"];
			


			$txtPeriodo = $_POST["txtPeriodo"];
			$txtFechaSistema = date("Y-m-d H:i:s", $tiempo);			
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($_POST["accion"] == "Editar"){
				$updateEstructuraMemoria = array(						
						'IntroduccionMemoria' => $txtIntroduccionMemoria,
						'MensajePresidente' => $txtMensajePresidente,
						'MensajeGerencia' => $txtMensajeGerencia,
						'IntroGobierno' => $txtIntroGobierno,
						'IntroGobiernoRepresentantes' => $txtIntroGobiernoRepresentantes,
						'IntroGobiernoCosejoAdministracion' => $txtIntroGobiernoCosejoAdministracion,
						'IntroGobiernoConsejoVigilancia' => $txtIntroGobiernoConsejoVigilancia,
						'IntroGobiernoConsejos' => $txtIntroGobiernoConsejos,
						'IntroGobiernoComites' => $txtIntroGobiernoComites,
						'IntroGobiernoEjecutivos' => $txtIntroGobiernoEjecutivos,
						'IntroCertificaciones' => $txtIntroCertificaciones,
						'IntroBalanceGeneral' => $txtIntroBalanceGeneral,
						'IntroValorEconomicoGenerado' => $txtIntroValorEconomicoGenerado,
						'IntroValorEconomicoDistribuido' => $txtIntroValorEconomicoDistribuido,
						'IntroCreditosASocios' => $txtIntroCreditosASocios,
						'IntroContratosConProveedores' => $txtIntroContratosConProveedores,
						'IntroSatisfaccionAlCliente' => $txtIntroSatisfaccionAlCliente,
						'IntroQuejasYReclamos' => $txtIntroQuejasYReclamos,
						'IntroCrecimientoSustentableDeSociosEnCooperativa' => $txtIntroCrecimientoSustentableDeSociosEnCooperativa,
						'IntroProductosYSevicios' => $txtIntroProductosYSevicios,
						'IntroProductos' => $txtIntroProductos,
						'IntroSevicios' => $txtIntroSevicios,
						'IntroTalentoHumano' => $txtIntroTalentoHumano,
						'IntroEdadTalentoHumano' => $txtIntroEdadTalentoHumano,
						'IntroContratoTalentoHumano' => $txtIntroContratoTalentoHumano,
						'IntroCapacitaciones' => $txtIntroCapacitaciones,
						'IntroSeguridadOcupacional' => $txtIntroSeguridadOcupacional,
						'IntroProgramasSaludLaboral' => $txtIntroProgramasSaludLaboral,
						'IntroAportesComunidad' => $txtIntroAportesComunidad,
						'IntroManejoRespomsableDeEnergiaElectrica' => $txtIntroManejoRespomsableDeEnergiaElectrica,
						'Periodo' => $txtPeriodo,
						'FechaSistema' => $txtFechaSistema,
						'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->Memoria_Modelo->updateEstructuraMemoria($id, $updateEstructuraMemoria, $IdEmpresaSesion)){
					$mensaje = "El Detalle  Estructural de la Memoria se actualizó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarEstructuraMemoria($id);
				}else{
					$mensaje = "El Detalle  Estructural de la Memoria no se ha actualizado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarEstructuraMemoria($id);
				}
			}else{
				$insertEstructuraMemoria = array(
						'IntroduccionMemoria' => $txtIntroduccionMemoria,
						'MensajePresidente' => $txtMensajePresidente,
						'MensajeGerencia' => $txtMensajeGerencia,
						'IntroGobierno' => $txtIntroGobierno,
						'IntroGobiernoRepresentantes' => $txtIntroGobiernoRepresentantes,
						'IntroGobiernoCosejoAdministracion' => $txtIntroGobiernoCosejoAdministracion,
						'IntroGobiernoConsejoVigilancia' => $txtIntroGobiernoConsejoVigilancia,
						'IntroGobiernoConsejos' => $txtIntroGobiernoConsejos,
						'IntroGobiernoComites' => $txtIntroGobiernoComites,
						'IntroGobiernoEjecutivos' => $txtIntroGobiernoEjecutivos,
						'IntroCertificaciones' => $txtIntroCertificaciones,
						'IntroBalanceGeneral' => $txtIntroBalanceGeneral,
						'IntroValorEconomicoGenerado' => $txtIntroValorEconomicoGenerado,
						'IntroValorEconomicoDistribuido' => $txtIntroValorEconomicoDistribuido,
						'IntroCreditosASocios' => $txtIntroCreditosASocios,
						'IntroContratosConProveedores' => $txtIntroContratosConProveedores,
						'IntroSatisfaccionAlCliente' => $txtIntroSatisfaccionAlCliente,
						'IntroQuejasYReclamos' => $txtIntroQuejasYReclamos,
						'IntroCrecimientoSustentableDeSociosEnCooperativa' => $txtIntroCrecimientoSustentableDeSociosEnCooperativa,
						'IntroProductosYSevicios' => $txtIntroProductosYSevicios,
						'IntroProductos' => $txtIntroProductos,
						'IntroSevicios' => $txtIntroSevicios,
						'IntroTalentoHumano' => $txtIntroTalentoHumano,
						'IntroEdadTalentoHumano' => $txtIntroEdadTalentoHumano,
						'IntroContratoTalentoHumano' => $txtIntroContratoTalentoHumano,
						'IntroCapacitaciones' => $txtIntroCapacitaciones,
						'IntroSeguridadOcupacional' => $txtIntroSeguridadOcupacional,
						'IntroProgramasSaludLaboral' => $txtIntroProgramasSaludLaboral,
						'IntroAportesComunidad' => $txtIntroAportesComunidad,
						'IntroManejoRespomsableDeEnergiaElectrica' => $txtIntroManejoRespomsableDeEnergiaElectrica,
						'Periodo' => $txtPeriodo,
						'FechaSistema' => $txtFechaSistema,
						'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->Memoria_Modelo->insertEstructuraMemoria($insertEstructuraMemoria)){
					$mensaje = "El Detalle  Estructural de la Memoria se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->detallesEstructuraDeMemoria();				
				}else{
					$mensaje = "El Detalle  Estructural de la Memoria no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoDetalleMemoria();				
				}
			}			
		}
	}
	public function eliminarEstructuraMemoria(){
		$this->load->model('Memoria_Modelo'); 		          	
		
		$idDetEstrucMem = $_POST["idDetEstMem"];		
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->Memoria_Modelo->deleteEstructuraMemoria($idDetEstrucMem, $IdEmpresaSesion); 
	}
	/**
	 * Memoria de Sustentabilidad
	 */
	public function listaMemoriaSustentabilidadPeriodo(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
								$inicioURL."memoria/listaMemoriaSustentabilidadPeriodo" => "Memoria de Sustentabilidad"
								);
			$dato["ubicacionURL"] = $relativeURL;

			$this->load->model('IndicadoresEmpresa_Modelo');
			$dato["registrosDatosTotales"] = $this->IndicadoresEmpresa_Modelo->getListDistinctDatosTotales($IdEmpresaSesion);
			$dato["contenedor"] = "memoria/listadoMemoriasSustentabilidadPeriodo_view";
			$this->load->view('plantilla', $dato);
		}else{
			redirect('inicio');
		}
	}
	public function memoriaSustentabilidadReporte($periodo){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$this->load->model('ImagenInstitucional_Modelo');
			$this->load->model('BalanceSocial_Modelo');
			$this->load->model('Empresa_Modelo');
			$this->load->model('ValoresEmpresa_Modelo');
			$this->load->model('Memoria_Modelo');
			$this->load->model('InformeMemoria_Modelo');
			$this->load->model('SesionAsambleaGeneral_Modelo');
			$this->load->model('Consejo_Modelo');
			$this->load->model('SesionConsejo_Modelo');
			$this->load->model('Comite_Modelo');
			$this->load->model('Representante_Modelo');
			$this->load->model('Certificaciones_Modelo');
			$this->load->model('DistribucionValorEconomico_Modelo');
			$this->load->model('Proveedor_Modelo');
			$this->load->model('ProductosEmpresa_Modelo');
			$this->load->model('ServiciosEmpresa_Modelo');
			$this->load->model('CapacitacionEmpleado_Modelo');
			$this->load->model('Donacion_Modelo');
			$tiempo = time();
			$fechaSistema = date("Y-m-d H:i:s", $tiempo);
			$dato['fechaSistema'] = $fechaSistema;			
			//$dato['indicadoresCuantitativoCalifiacadoEmpresa'] = $this->BalanceSocial_Modelo->getListIndicadorCuantitativoCalificadoAnio($IdDatosTotales, $IdEmpresaSesion);
			//Imégenes institucionales
			$dato['imagenesInstitucionales'] = $this->ImagenInstitucional_Modelo->getListImagenInstitucinalPeriodo($periodo, $IdEmpresaSesion);
			//Datos Generales de la Empresa
			$dato['empresa'] = $this->Empresa_Modelo->getEmpresa($IdEmpresaSesion);
			$dato['valoresEmpresa'] = $this->ValoresEmpresa_Modelo->getListValoresEmpresa($IdEmpresaSesion);
			//Datos del Detalle Estructural de la Empresa
			$dato['detalleEstructuraMemoria'] = $this->Memoria_Modelo->getEstructuraMemoriaPeriodo($periodo, $IdEmpresaSesion);
			//Datos de Declaración del Presidente
			$dato['declaracionPresidenteDecripcionInforme'] = $this->InformeMemoria_Modelo->getDeclaracionPresidenteMemoriaPeriodo($periodo, $IdEmpresaSesion);
			//Datos de Sesiones de Asamblea General
			$dato['sesionAsambleaGeneral'] = $this->SesionAsambleaGeneral_Modelo->getAsambleaGeneralPeriodo($periodo, $IdEmpresaSesion);
			//Datos de Consejos Administración
			$dato['consejoAdministracion'] = $this->Consejo_Modelo->getConsejoAdministracionPeriodo($periodo, $IdEmpresaSesion);
			//Datos de Consejos Vigilancia
			$dato['consejoVIgilancia'] = $this->Consejo_Modelo->getConsejoVigilanciaPeriodo($periodo, $IdEmpresaSesion);
			//Datos de Sesiones de Consejos
			$dato['sesionesConsejos'] = $this->SesionConsejo_Modelo->getListSesionConsejoPeriodo($periodo, $IdEmpresaSesion);
			//Datos de Comités
			$dato['comites'] = $this->Comite_Modelo->getListComitePeriodo($periodo, $IdEmpresaSesion);
			//Datos de Representantes, Ejecutivo, Operativo y Gerencial
			$dato['representantesEjecutivos'] = $this->Representante_Modelo->getListRepresentanteOrganismoPeriodo($periodo, $IdEmpresaSesion);
			//Datos de Certificaciones
			$dato['certificaciones'] = $this->Certificaciones_Modelo->getCertificacionesPeriodo($periodo, $IdEmpresaSesion);
			//Datos de BalanceGeneral
			$dato['balanceGeneral'] = $this->Memoria_Modelo->getBalanceGeneralPeriodo($periodo, $IdEmpresaSesion);
			//Datos de Distibución del Valor Económico
			$dato['distribValorEconomicoGenerado'] = $this->DistribucionValorEconomico_Modelo->getDistribucionValorEconomicoGeneradoPeriodo($periodo, $IdEmpresaSesion);
			$dato['distribValorEconomicoDistribuido'] = $this->DistribucionValorEconomico_Modelo->getDistribucionValorEconomicoDistribuidoPeriodo($periodo, $IdEmpresaSesion);
			//Datos de Contratos Con Proveedores
			$dato['contratosProveedoresLocales'] = $this->Proveedor_Modelo->getNumContratoProveedorLocalPeriodo($periodo, $IdEmpresaSesion);
			$dato['contratosProveedoresNacionales'] = $this->Proveedor_Modelo->getNumContratoProveedorNacionalPeriodo($periodo, $IdEmpresaSesion);
			$dato['contratosProveedores'] = $this->Proveedor_Modelo->getNumContratoProveedorPeriodo($periodo, $IdEmpresaSesion);
			$dato['contratosProveedoresLocalesPA'] = $this->Proveedor_Modelo->getNumContratoProveedorLocalPeriodo(($periodo - 1), $IdEmpresaSesion);
			$dato['contratosProveedoresNacionalesPA'] = $this->Proveedor_Modelo->getNumContratoProveedorNacionalPeriodo(($periodo- 1), $IdEmpresaSesion);
			$dato['contratosProveedoresPA'] = $this->Proveedor_Modelo->getNumContratoProveedorPeriodo(($periodo - 1), $IdEmpresaSesion);
			//Datos de Satisfacción Clientes y Servicios Financieros
			$dato['satisfaccionClienteServiciosPA'] = $this->InformeMemoria_Modelo->getSatisfaccionClienteServiciosPeriodo(($periodo - 1), $IdEmpresaSesion);
			$dato['satisfaccionClienteServicios'] = $this->InformeMemoria_Modelo->getSatisfaccionClienteServiciosPeriodo($periodo, $IdEmpresaSesion);
			//Datos de Reclamos
			$dato['datosTotalesPA'] = $this->InformeMemoria_Modelo->getDatosTotalesPeriodo(($periodo - 1), $IdEmpresaSesion);
			$dato['datosTotales'] = $this->InformeMemoria_Modelo->getDatosTotalesPeriodo($periodo, $IdEmpresaSesion);
			//Datos de Productos
			$dato['productosEmpresa'] = $this->ProductosEmpresa_Modelo->getListProductosEmpresa($IdEmpresaSesion);
			//Datos de Servicios
			$dato['serviciosEmpresa'] = $this->ServiciosEmpresa_Modelo->getListServiciosEmpresaSeis($IdEmpresaSesion);
			//Datos de edad promedio de Empleados
			$dato['edadPromedioEmpleados'] = $this->InformeMemoria_Modelo->getEdadPromedioEmpleados($IdEmpresaSesion);
			//Datos de capacitaciones a empleados
			$dato['capacitacionesEmpleados'] = $this->CapacitacionEmpleado_Modelo->getListCapacitacionEmpleadoPeriodo($periodo, $IdEmpresaSesion);
			//Datos de donaciones
			$dato['donaciones'] = $this->Donacion_Modelo->getListDonacionPeriodo($periodo, $IdEmpresaSesion);
			


			$this->load->view('balanceSocial/memoriaSustentabilidadReporte', $dato);
		}else{
			redirect('inicio');
		}
	}




}

?>