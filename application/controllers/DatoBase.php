<?php 
/**
* 
*/
class datoBase extends CI_Controller{

	function __construct(){
		parent::__construct();
	}

public function reemplazar($value=''){
	// OBTENER EL NOMBRE DEL ARCHIVO
   	$name = $_FILES['userfile']['name']; 
   	$accion = $_POST['accion'];
   	$idBase = $_POST['idBaseData'];
	
	if($name != ""){
		// CONFIGURACION LOAD FILE
		$config = array(
			'upload_path' => "./uploads/",
			'allowed_types' => "xls|xlsx",
			'overwrite' => TRUE,
			'max_size' => "2048000"
		);
		$this->load->library('upload', $config);
		if($this->upload->do_upload()){
			// Camino a los include
			set_include_path(get_include_path() . PATH_SEPARATOR . './Classes/');
			// PHPExcel
			require_once 'PHPExcel.php';
			// PHPExcel_IOFactory
			include 'PHPExcel/IOFactory.php';
			// Creamos un objeto PHPExcel
			$objPHPExcel = new PHPExcel();
			// Leemos un archivo Excel 2007
			$objReader = PHPExcel_IOFactory::createReader('Excel2007');

			$data = array('upload_data' => $this->upload->data());
			$fullPath=$data["upload_data"]["full_path"];

			$objPHPExcel = $objReader->load($fullPath);
			$objWorksheet = $objPHPExcel->getActiveSheet();

			$resultado=array();

			$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

			 foreach ($sheetData as $key => $value) {
			 	if ($value['A']) {
			 		$resultado[$value['A']] = $value['C'];
			 	}
			 }
			 
			 $inicioURL =  base_url();
			 $relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa" => "Empresa",
			                     $inicioURL."datoBase/datosBase" => "Datos Base"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$dato["admin"] = 1;
			$dato["seleccionado"] = $value;
			$dato["contenedor"] = "datosBase/datosBase_new_edit2";
			$dato["resultado"] = $resultado;
			
			if($accion=="Editar"){
				$dato["titulo"] = "Editar Dato Base";
				$dato["idBaseData"] = $idBase;
				$dato["accion"] = "Editar";
				
			}elseif($accion=="Nuevo") {
				$dato["idBaseData"] = "";
				$dato["titulo"] = "Nuevo Dato Base";
				$dato["accion"] = "Nuevo";
			}

			$this->load->view('plantilla', $dato);
		}else{
			if($accion=="Editar"){
				$this->editarDatoBase($idBase);
			}elseif ($accion=="Nuevo") {
				$this->nuevoDatoBase();
			}
		}

	}elseif($accion=="Editar"){
		$this->editarDatoBase($idBase);
	}elseif ($accion=="Nuevo") {
		$this->nuevoDatoBase();
	}
}


	public function datosBase(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa" => "Empresa",
			                     $inicioURL."datoBase/datosBase" => "Datos Base"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('DatoBase_Modelo');
				$dato['datosBase'] = $this->DatoBase_Modelo->getListDatoBase($IdEmpresaSesion);
				if (empty($dato['datosBase'])){
					$dato["existeRegistro"] = 0;
				}else{
					$dato["existeRegistro"] = count($dato['datosBase']);
				}
				$dato["admin"] = 1;
				$dato["contenedor"] = "datosBase/datosBase_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "datosBase", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('DatoBase_Modelo');
						$dato['datosBase'] = $this->DatoBase_Modelo->getListDatoBase($IdEmpresaSesion);
						$dato["contenedor"] = "datosBase/datosBase_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "datosBase/datosBase_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "datosBase/datosBase_view";
					$this->load->view('plantilla', $dato);
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function editarDatoBase($IdDatoBase){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa" => "Empresa",
			                     $inicioURL."datoBase/datosBase" => "Datos Base"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('DatoBase_Modelo');
				$dato['datoBase'] = $this->DatoBase_Modelo->getDatoBase($IdDatoBase, $IdEmpresaSesion);
				$dato["titulo"] = "Editar Dato Base";   
				$dato["accion"] = "Editar";
				$dato["idBaseData"] = $IdDatoBase;
				$dato["contenedor"] = "datosBase/datosBase_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "datosBase", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('DatoBase_Modelo');
						$dato['datoBase'] = $this->DatoBase_Modelo->getDatoBase($IdDatoBase, $IdEmpresaSesion);
						$dato["titulo"] = "Editar Dato Base";   
						$dato["accion"] = "Editar";
						$dato["idBaseData"] = $IdDatoBase;
						$dato["contenedor"] = "datosBase/datosBase_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->datosBase();
					}
				}else{
					$this->datosBase();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}

	public function nuevoDatoBase(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa" => "Empresa",
			                     $inicioURL."datoBase/datosBase" => "Datos Base"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('DatoBase_Modelo');
				$dato['DatoBasesEmpresa'] = $this->DatoBase_Modelo->getListDatoBase($IdEmpresaSesion);
				$dato["titulo"] = "Nuevo Dato Base";
				$dato["accion"] = "Nuevo";
				$dato["idBaseData"] = "";
				$dato["contenedor"] = "datosBase/datosBase_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "datosBase", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('DatoBase_Modelo');
						$dato['DatoBasesEmpresa'] = $this->DatoBase_Modelo->getListDatoBase($IdEmpresaSesion);		
						$dato["titulo"] = "Nuevo Dato Base";
						$dato["accion"] = "Nuevo";
						$dato["idBaseData"] = "";
						$dato["contenedor"] = "datosBase/datosBase_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->datosBase();
					}
				}else{
					$this->datosBase();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function guardarDatoBase(){
		$this->form_validation->set_rules('txtNumTClientesAnioAnterior','Total clientes año anterior','trim|required|integer');
		
		$this->form_validation->set_rules('txtValorTPorCertificadosDeAportacionAnioAnterior','Valor Total por Certificados de aportación del año anterior','trim|required');
		$this->form_validation->set_rules('txtValorTCertificadoAportacionDevueltosAnioAnterior','Valor Total por Certificados de aportación devueltos del año anterior','trim|required');
		$this->form_validation->set_rules('txtGastoTServiciosBasicosAnioAnterior','Gasto Total en Servicios Básicos del año anterior','trim|required');
		$this->form_validation->set_rules('txtGastoTElectricidadAnioAnterior','Gasto Total en gasto de energía eléctrica del año anterior','trim|required');
		$this->form_validation->set_rules('txtCantTKwhElectricidadAnioAnterior','Cantidad de kw de energía eléctrica del año anterior','trim|required');
		$this->form_validation->set_rules('txtCantTGalonesGasolinaAnioAnterior','Cantidad de Galones de combustible del año anterior','trim|required');
		$this->form_validation->set_rules('txtGastoTGasolinaAnioAnterior','Gasto Total en gasto de combustible del año anterior','trim|required');
		$this->form_validation->set_rules('txtGastoTConsumoAguaAnioAnterior','Gasto Total en consumo de agua del año anterior','trim|required');
		$this->form_validation->set_rules('txtCantTm3AguaConsumidaAnioAnterior','Cantidad de m³ consumidos en el año anterior','trim|required');
		$this->form_validation->set_rules('txtGastoTTelefonoAnioAnterior','Gasto Total en Consumo telefónico del año anterior','trim|required');
		$this->form_validation->set_rules('txtCantTMinutosTelefonoAnioAnterior','Cantidad de minutos telefónicos del año anterior','trim|required');
		$this->form_validation->set_rules('txtGastoTPapelAnioAnterior','Gasto Total en resmas de papel del año anterior','trim|required');
		$this->form_validation->set_rules('txtCantTResmasPapelAnioAnterior','Cantidad de resmas de papel consumidas el año anterior','trim|required');
		$this->form_validation->set_rules('txtCantTKwhEnergiaRenovable','Cantidad de kw de energía renovable del año anterior','trim|required');
		$this->form_validation->set_rules('txtGastoTEquipamientoAnioAnterior','Gasto de  equipo de mantenimientp del año anterior','trim|required');
		$this->form_validation->set_rules('txtGastoTAsignadoAEliminarResiduoAnioAnterior','Gasto Total en eliminación de residuos del año anterior','trim|required');
		$this->form_validation->set_rules('txtGastoTLimpiezaAnioAnterior','Gasto Total en limpieza año anterior','trim|required');
		$this->form_validation->set_rules('txtNumTEmpleadosContratadosAnioAnterior','Número Total de empleados del período anterior','trim|required|integer');
		$this->form_validation->set_rules('txtNumTEmpleadosPeriodoAnioAnterior','Número Total de empleados en el periodo anterior','trim|required|integer');
		$this->form_validation->set_rules('txtNumTEmpleadosHAnioAnterior','Número Total de empleados Hombres en el periodo anterior','trim|required|integer');
		$this->form_validation->set_rules('txtNumTEmpleadosMAnioAnterior','Número Total de empleados Mujeres en el periodo anterior','trim|required|integer');
		$this->form_validation->set_rules('txtValorTActivosAnioAnterior','Valor del activo del periodo anterior','trim|required');
		$this->form_validation->set_rules('txtValorTPasivosAnioAnterior','Valor del pasivo en el periodo anterior','trim|required');
		$this->form_validation->set_rules('txtValorTPatrimonioAnioAnterior','Valor del patrimonio en el periodo anterior','trim|required');
		$this->form_validation->set_rules('txtUtilidadTEjercicioAnioAnterior','Utilidad del ejercicio periodo anterior','trim|required');
		$this->form_validation->set_rules('txtValorTReservaLegalAnioAnterior','Reserva legal periodo anterior','trim|required');
		$this->form_validation->set_rules('txtValorTVentasAnioAnterior','Total Ventas Anteriores','trim|required');
		$this->form_validation->set_rules('txtValorTGastosOperacionalesAnioAnterior','Total gastos operacionales  periodo anterior','trim|required');
		$this->form_validation->set_rules('txtValorTGastosNoOperacionalesAnioAnterior','Total gastos no operacionales periodo anterior','trim|required');
		$this->form_validation->set_rules('txtValorTCarteraCreditoAnioAnterior','Valor cartera de crédito año anterior','trim|required');
		$this->form_validation->set_rules('txtMontoPromedioCreditoANivelConsolidadoAnioAnterior','Monto promedio de créditos  a nivel consolidado año anterior','trim|required');
		$this->form_validation->set_rules('txtMontoPromedioCreditoConcedidoPrimeraVezAnioANterior','Monto promedio de créditos  a concedidos por primera vez año anterior','trim|required');
		$this->form_validation->set_rules('txtMontoPromedioCreditoConcedidoAMujeresAnioAnterior','Monto promedio de créditos  a concedidos a mujeres año anterior','trim|required');
		$this->form_validation->set_rules('txtMontoPromedioCreditoConsumoConcedidoPrimeraVezAnioAnterior','Monto promedio de créditos  de consumo concedidos por primera vez año anterior','trim|required');
		$this->form_validation->set_rules('txtMontoPromedioCreditoViviendaConcedidoPrimeraVezAnioAnterior','Monto promedio de créditos de  vivienda concedidos por primera vez en el año anterior','trim|required');
		$this->form_validation->set_rules('txtMontoPromedioMicrocreditoASociosNuevosPrimeraVezAnioAnterior','Monto promedio de microcréditos a socios nuevos concedidos por primera vez en el año anterior','trim|required');
		$this->form_validation->set_rules('txtMontoPromedioCreditoComercioASociosNuevosPrimeraVezAnioAnterior','Monto promedio de créditos de comercio a socios nuevos concedidos por primera vez en el año anterior','trim|required');
		$this->form_validation->set_rules('txtMontoPromedioCreditosVinculadosAnioAnterior','Monto promedio de créditos vinculados periodo anterior','trim|required');
		$this->form_validation->set_rules('txtValorTCapitalSocialAnioAterior','Capital social del periodo anterior','trim|required');
		$this->form_validation->set_rules('txtPeriodo','Periodo','trim|required|integer');

		$accion = $_POST['accion'];		
		$id = $_POST['id']; 
		if ($this->form_validation->run() == false) {
			if ($accion == "Nuevo") {
				$this->nuevoDatoBase();		
			}else{
				$this->editarDatoBase($id);
			}
		}else{
			$this->load->model('DatoBase_Modelo');
			$tiempo = time();
			$txtNumTClientesAnioAnterior = $_POST["txtNumTClientesAnioAnterior"];
			//$txtNumTClientesNuevosPerido = $_POST["txtNumTClientesNuevosPerido"];
			//$txtNumTClientesRetirados = $_POST["txtNumTClientesRetirados"];
			$txtValorTPorCertificadosDeAportacionAnioAnterior = $_POST["txtValorTPorCertificadosDeAportacionAnioAnterior"];
			$txtValorTCertificadoAportacionDevueltosAnioAnterior = $_POST["txtValorTCertificadoAportacionDevueltosAnioAnterior"];
			$txtGastoTServiciosBasicosAnioAnterior = $_POST["txtGastoTServiciosBasicosAnioAnterior"];
			$txtGastoTElectricidadAnioAnterior = $_POST["txtGastoTElectricidadAnioAnterior"];
			$txtCantTKwhElectricidadAnioAnterior = $_POST["txtCantTKwhElectricidadAnioAnterior"];
			$txtCantTGalonesGasolinaAnioAnterior = $_POST["txtCantTGalonesGasolinaAnioAnterior"];
			$txtGastoTGasolinaAnioAnterior = $_POST["txtGastoTGasolinaAnioAnterior"];
			$txtGastoTConsumoAguaAnioAnterior = $_POST["txtGastoTConsumoAguaAnioAnterior"];
			$txtCantTm3AguaConsumidaAnioAnterior = $_POST["txtCantTm3AguaConsumidaAnioAnterior"];
			$txtGastoTTelefonoAnioAnterior = $_POST["txtGastoTTelefonoAnioAnterior"];
			$txtCantTMinutosTelefonoAnioAnterior = $_POST["txtCantTMinutosTelefonoAnioAnterior"];
			$txtGastoTPapelAnioAnterior = $_POST["txtGastoTPapelAnioAnterior"];
			$txtCantTResmasPapelAnioAnterior = $_POST["txtCantTResmasPapelAnioAnterior"];
			$txtCantTKwhEnergiaRenovable = $_POST["txtCantTKwhEnergiaRenovable"];
			$txtGastoTEquipamientoAnioAnterior = $_POST["txtGastoTEquipamientoAnioAnterior"];
			$txtGastoTAsignadoAEliminarResiduoAnioAnterior = $_POST["txtGastoTAsignadoAEliminarResiduoAnioAnterior"];
			$txtGastoTLimpiezaAnioAnterior = $_POST["txtGastoTLimpiezaAnioAnterior"];
			$txtNumTEmpleadosContratadosAnioAnterior = $_POST["txtNumTEmpleadosContratadosAnioAnterior"];
			$txtNumTEmpleadosPeriodoAnioAnterior = $_POST["txtNumTEmpleadosPeriodoAnioAnterior"];
			$txtNumTEmpleadosHAnioAnterior = $_POST["txtNumTEmpleadosHAnioAnterior"];
			$txtNumTEmpleadosMAnioAnterior = $_POST["txtNumTEmpleadosMAnioAnterior"];
			$txtValorTActivosAnioAnterior = $_POST["txtValorTActivosAnioAnterior"];
			$txtValorTPasivosAnioAnterior = $_POST["txtValorTPasivosAnioAnterior"];
			$txtValorTPatrimonioAnioAnterior = $_POST["txtValorTPatrimonioAnioAnterior"];
			$txtUtilidadTEjercicioAnioAnterior = $_POST["txtUtilidadTEjercicioAnioAnterior"];
			$txtValorTReservaLegalAnioAnterior = $_POST["txtValorTReservaLegalAnioAnterior"];
			$txtValorTVentasAnioAnterior = $_POST["txtValorTVentasAnioAnterior"];
			$txtValorTGastosOperacionalesAnioAnterior = $_POST["txtValorTGastosOperacionalesAnioAnterior"];
			$txtValorTGastosNoOperacionalesAnioAnterior = $_POST["txtValorTGastosNoOperacionalesAnioAnterior"];
			$txtValorTCarteraCreditoAnioAnterior = $_POST["txtValorTCarteraCreditoAnioAnterior"];
			$txtMontoPromedioCreditoANivelConsolidadoAnioAnterior = $_POST["txtMontoPromedioCreditoANivelConsolidadoAnioAnterior"];
			$txtMontoPromedioCreditoConcedidoPrimeraVezAnioANterior = $_POST["txtMontoPromedioCreditoConcedidoPrimeraVezAnioANterior"];
			$txtMontoPromedioCreditoConcedidoAMujeresAnioAnterior = $_POST["txtMontoPromedioCreditoConcedidoAMujeresAnioAnterior"];
			$txtMontoPromedioCreditoConsumoConcedidoPrimeraVezAnioAnterior = $_POST["txtMontoPromedioCreditoConsumoConcedidoPrimeraVezAnioAnterior"];
			$txtMontoPromedioCreditoViviendaConcedidoPrimeraVezAnioAnterior = $_POST["txtMontoPromedioCreditoViviendaConcedidoPrimeraVezAnioAnterior"];
			$txtMontoPromedioMicrocreditoASociosNuevosPrimeraVezAnioAnterior = $_POST["txtMontoPromedioMicrocreditoASociosNuevosPrimeraVezAnioAnterior"];
			$txtMontoPromedioCreditoComercioASociosNuevosPrimeraVezAnioAnterior = $_POST["txtMontoPromedioCreditoComercioASociosNuevosPrimeraVezAnioAnterior"];
			$txtMontoPromedioCreditosVinculadosAnioAnterior = $_POST["txtMontoPromedioCreditosVinculadosAnioAnterior"];
			$txtValorTCapitalSocialAnioAterior = $_POST["txtValorTCapitalSocialAnioAterior"];
			$txtPeriodo = $_POST["txtPeriodo"];
			$txtFechaSistema = date("Y-m-d H:i:s", $tiempo);
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($accion == "Editar"){				
				$updateDatoBase = array(
					'NumTClientesAnioAnterior' => $txtNumTClientesAnioAnterior,
					//'NumTClientesNuevosPerido' => $txtNumTClientesNuevosPerido,
					//'NumTClientesRetirados' => $txtNumTClientesRetirados,
					'ValorTPorCertificadosDeAportacionAnioAnterior' => $txtValorTPorCertificadosDeAportacionAnioAnterior,
					'ValorTCertificadoAportacionDevueltosAnioAnterior' => $txtValorTCertificadoAportacionDevueltosAnioAnterior,
					'GastoTServiciosBasicosAnioAnterior' => $txtGastoTServiciosBasicosAnioAnterior,
					'GastoTElectricidadAnioAnterior' => $txtGastoTElectricidadAnioAnterior,
					'CantTKwhElectricidadAnioAnterior' => $txtCantTKwhElectricidadAnioAnterior,
					'CantTGalonesGasolinaAnioAnterior' => $txtCantTGalonesGasolinaAnioAnterior,
					'GastoTGasolinaAnioAnterior' => $txtGastoTGasolinaAnioAnterior,
					'GastoTConsumoAguaAnioAnterior' => $txtGastoTConsumoAguaAnioAnterior,
					'CantTm3AguaConsumidaAnioAnterior' => $txtCantTm3AguaConsumidaAnioAnterior,
					'GastoTTelefonoAnioAnterior' => $txtGastoTTelefonoAnioAnterior,
					'CantTMinutosTelefonoAnioAnterior' => $txtCantTMinutosTelefonoAnioAnterior,
					'GastoTPapelAnioAnterior' => $txtGastoTPapelAnioAnterior,
					'CantTResmasPapelAnioAnterior' => $txtCantTResmasPapelAnioAnterior,
					'CantTKwhEnergiaRenovable' => $txtCantTKwhEnergiaRenovable,
					'GastoTEquipamientoAnioAnterior' => $txtGastoTEquipamientoAnioAnterior,
					'GastoTAsignadoAEliminarResiduoAnioAnterior' => $txtGastoTAsignadoAEliminarResiduoAnioAnterior,
					'GastoTLimpiezaAnioAnterior' => $txtGastoTLimpiezaAnioAnterior,
					'NumTEmpleadosContratadosAnioAnterior' => $txtNumTEmpleadosContratadosAnioAnterior,
					'NumTEmpleadosPeriodoAnioAnterior' => $txtNumTEmpleadosPeriodoAnioAnterior,
					'NumTEmpleadosHAnioAnterior' => $txtNumTEmpleadosHAnioAnterior,
					'NumTEmpleadosMAnioAnterior' => $txtNumTEmpleadosMAnioAnterior,
					'ValorTActivosAnioAnterior' => $txtValorTActivosAnioAnterior,
					'ValorTPasivosAnioAnterior' => $txtValorTPasivosAnioAnterior,
					'ValorTPatrimonioAnioAnterior' => $txtValorTPatrimonioAnioAnterior,
					'UtilidadTEjercicioAnioAnterior' => $txtUtilidadTEjercicioAnioAnterior,
					'ValorTReservaLegalAnioAnterior' => $txtValorTReservaLegalAnioAnterior,
					'ValorTVentasAnioAnterior' => $txtValorTVentasAnioAnterior,
					'ValorTGastosOperacionalesAnioAnterior' => $txtValorTGastosOperacionalesAnioAnterior,
					'ValorTGastosNoOperacionalesAnioAnterior' => $txtValorTGastosNoOperacionalesAnioAnterior,
					'ValorTCarteraCreditoAnioAnterior' => $txtValorTCarteraCreditoAnioAnterior,
					'MontoPromedioCreditoANivelConsolidadoAnioAnterior' => $txtMontoPromedioCreditoANivelConsolidadoAnioAnterior,
					'MontoPromedioCreditoConcedidoPrimeraVezAnioANterior' => $txtMontoPromedioCreditoConcedidoPrimeraVezAnioANterior,
					'MontoPromedioCreditoConcedidoAMujeresAnioAnterior' => $txtMontoPromedioCreditoConcedidoAMujeresAnioAnterior,
					'MontoPromedioCreditoConsumoConcedidoPrimeraVezAnioAnterior' => $txtMontoPromedioCreditoConsumoConcedidoPrimeraVezAnioAnterior,
					'MontoPromedioCreditoViviendaConcedidoPrimeraVezAnioAnterior' => $txtMontoPromedioCreditoViviendaConcedidoPrimeraVezAnioAnterior,
					'MontoPromedioMicrocreditoASociosNuevosPrimeraVezAnioAnterior' => $txtMontoPromedioMicrocreditoASociosNuevosPrimeraVezAnioAnterior,
					'MontoPromedioCreditoComercioASociosNuevosPrimeraVezAnioAnterior' => $txtMontoPromedioCreditoComercioASociosNuevosPrimeraVezAnioAnterior,
					'MontoPromedioCreditosVinculadosAnioAnterior' => $txtMontoPromedioCreditosVinculadosAnioAnterior,
					'ValorTCapitalSocialAnioAterior' => $txtValorTCapitalSocialAnioAterior,
					'Periodo' => $txtPeriodo,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->DatoBase_Modelo->updateDatoBase($id, $updateDatoBase, $IdEmpresaSesion)){
					$mensaje = "El registro Dato Base se actualizó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarDatoBase($id);				
				}else{
					$mensaje = "El registro Dato Base no se ha aztualizado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarDatoBase($id);				
				}
			}else{
				$insertDatoBase = array(
					'NumTClientesAnioAnterior' => $txtNumTClientesAnioAnterior,
					//'NumTClientesNuevosPerido' => $txtNumTClientesNuevosPerido,
					//'NumTClientesRetirados' => $txtNumTClientesRetirados,
					'ValorTPorCertificadosDeAportacionAnioAnterior' => $txtValorTPorCertificadosDeAportacionAnioAnterior,
					'ValorTCertificadoAportacionDevueltosAnioAnterior' => $txtValorTCertificadoAportacionDevueltosAnioAnterior,
					'GastoTServiciosBasicosAnioAnterior' => $txtGastoTServiciosBasicosAnioAnterior,
					'GastoTElectricidadAnioAnterior' => $txtGastoTElectricidadAnioAnterior,
					'CantTKwhElectricidadAnioAnterior' => $txtCantTKwhElectricidadAnioAnterior,
					'CantTGalonesGasolinaAnioAnterior' => $txtCantTGalonesGasolinaAnioAnterior,
					'GastoTGasolinaAnioAnterior' => $txtGastoTGasolinaAnioAnterior,
					'GastoTConsumoAguaAnioAnterior' => $txtGastoTConsumoAguaAnioAnterior,
					'CantTm3AguaConsumidaAnioAnterior' => $txtCantTm3AguaConsumidaAnioAnterior,
					'GastoTTelefonoAnioAnterior' => $txtGastoTTelefonoAnioAnterior,
					'CantTMinutosTelefonoAnioAnterior' => $txtCantTMinutosTelefonoAnioAnterior,
					'GastoTPapelAnioAnterior' => $txtGastoTPapelAnioAnterior,
					'CantTResmasPapelAnioAnterior' => $txtCantTResmasPapelAnioAnterior,
					'CantTKwhEnergiaRenovable' => $txtCantTKwhEnergiaRenovable,
					'GastoTEquipamientoAnioAnterior' => $txtGastoTEquipamientoAnioAnterior,
					'GastoTAsignadoAEliminarResiduoAnioAnterior' => $txtGastoTAsignadoAEliminarResiduoAnioAnterior,
					'GastoTLimpiezaAnioAnterior' => $txtGastoTLimpiezaAnioAnterior,
					'NumTEmpleadosContratadosAnioAnterior' => $txtNumTEmpleadosContratadosAnioAnterior,
					'NumTEmpleadosPeriodoAnioAnterior' => $txtNumTEmpleadosPeriodoAnioAnterior,
					'NumTEmpleadosHAnioAnterior' => $txtNumTEmpleadosHAnioAnterior,
					'NumTEmpleadosMAnioAnterior' => $txtNumTEmpleadosMAnioAnterior,
					'ValorTActivosAnioAnterior' => $txtValorTActivosAnioAnterior,
					'ValorTPasivosAnioAnterior' => $txtValorTPasivosAnioAnterior,
					'ValorTPatrimonioAnioAnterior' => $txtValorTPatrimonioAnioAnterior,
					'UtilidadTEjercicioAnioAnterior' => $txtUtilidadTEjercicioAnioAnterior,
					'ValorTReservaLegalAnioAnterior' => $txtValorTReservaLegalAnioAnterior,
					'ValorTVentasAnioAnterior' => $txtValorTVentasAnioAnterior,
					'ValorTGastosOperacionalesAnioAnterior' => $txtValorTGastosOperacionalesAnioAnterior,
					'ValorTGastosNoOperacionalesAnioAnterior' => $txtValorTGastosNoOperacionalesAnioAnterior,
					'ValorTCarteraCreditoAnioAnterior' => $txtValorTCarteraCreditoAnioAnterior,
					'MontoPromedioCreditoANivelConsolidadoAnioAnterior' => $txtMontoPromedioCreditoANivelConsolidadoAnioAnterior,
					'MontoPromedioCreditoConcedidoPrimeraVezAnioANterior' => $txtMontoPromedioCreditoConcedidoPrimeraVezAnioANterior,
					'MontoPromedioCreditoConcedidoAMujeresAnioAnterior' => $txtMontoPromedioCreditoConcedidoAMujeresAnioAnterior,
					'MontoPromedioCreditoConsumoConcedidoPrimeraVezAnioAnterior' => $txtMontoPromedioCreditoConsumoConcedidoPrimeraVezAnioAnterior,
					'MontoPromedioCreditoViviendaConcedidoPrimeraVezAnioAnterior' => $txtMontoPromedioCreditoViviendaConcedidoPrimeraVezAnioAnterior,
					'MontoPromedioMicrocreditoASociosNuevosPrimeraVezAnioAnterior' => $txtMontoPromedioMicrocreditoASociosNuevosPrimeraVezAnioAnterior,
					'MontoPromedioCreditoComercioASociosNuevosPrimeraVezAnioAnterior' => $txtMontoPromedioCreditoComercioASociosNuevosPrimeraVezAnioAnterior,
					'MontoPromedioCreditosVinculadosAnioAnterior' => $txtMontoPromedioCreditosVinculadosAnioAnterior,
					'ValorTCapitalSocialAnioAterior' => $txtValorTCapitalSocialAnioAterior,
					'Periodo' => $txtPeriodo,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->DatoBase_Modelo->insertDatoBase($insertDatoBase)){
					$mensaje = "El registro Dato Base se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->datosBase();				
				}else{
					$mensaje = "El registro Dato Base no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoDatoBase();				
				}
			}
		}
	}
	public function eliminarDatoBase(){
		$this->load->model('DatoBase_Modelo'); 		          	
		$id = $_POST["idDatoBase"];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		 $this->DatoBase_Modelo->deleteDatoBase($id, $IdEmpresaSesion); 
	}
	
}

?>