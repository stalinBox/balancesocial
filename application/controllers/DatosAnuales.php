<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 

*/
class  datosAnuales extends CI_Controller{
	
	function __construct(){
		parent:: __construct();
		$this->load->helper('form');
	}

	public function index($value='')	{
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa" => "Empresa",
			                     $inicioURL."datosAnuales" => "Datos Anuales"
			                    );
 			$dato["ubicacionURL"] = $relativeURL;
 			$dato["seleccionado"] = $value;
			$dato["contenedor"] = "datosAnuales/modulosDatosAnuales";
			$this->load->view("plantilla", $dato);
		}else{
			redirect('inicio');
		}		
	}

	public function reemplazar($value=''){
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

			// CLASS LOAD FILE
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
				 	if ($value['E']) {
				 		$resultado[$value['E']] = $value['C'];
				 	}
				 }
				 
				 $inicioURL =  base_url();
				 $relativeURL = array($inicioURL."principal" => "Módulos",
				                     $inicioURL."empresa" => "Empresa",
				                     $inicioURL."datosAnuales" => "Datos Anuales",
				                     $inicioURL."datosAnuales/nuevoDGA" => "Nuevo Registro de Dato Anual"
				                    );
				$dato["ubicacionURL"] = $relativeURL;

				$dato["titulo"] = "Datos Anuales Sección A";
				$dato["admin"] = 1;
				$dato["accion"] = "Nuevo";
				$dato["seleccionado"] = $value;
				$dato["idBaseData"] = "";
				$dato["contenedor"] = "datosAnuales/datosAnuales_new_edit2";
				$dato["resultado"] = $resultado;
				$this->load->view('plantilla', $dato);
			}else{
					$this->nuevoDGA();
				}

		}elseif($accion=="Nuevo"){
			$this->nuevoDGA();
		}
	}

	public function nuevoDGA($value=''){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa" => "Empresa",
			                     $inicioURL."datosAnuales" => "Datos Anuales",
			                     $inicioURL."datosAnuales/nuevoDGA" => "Nuevo Registro de Dato Anual"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");

 			if ($tipoUsuario == "Admin") {
 				$dato["titulo"] = "Datos Anuales Sección A";
 				$dato["admin"] = 1;
				$dato["accion"] = "Nuevo";
				$dato["idBaseData"] = "";
				$dato["seleccionado"] = $value;
				$dato["contenedor"] = "datosAnuales/datosAnuales_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisosSeccionA"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "seccionA", $IdEmpresaSesion);
				$dato["permisosSeccionB"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "seccionB", $IdEmpresaSesion);
				$dato["permisosSeccionC"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "seccionC", $IdEmpresaSesion);
				$dato["permisosSeccionD"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "seccionD", $IdEmpresaSesion);
				$dato["permisosSeccionE"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "seccionE", $IdEmpresaSesion);
				$dato["permisosSeccionF"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "seccionF", $IdEmpresaSesion);
				$dato["accion"] = "Nuevo";
				$dato["idBaseData"] = "";
				$dato["seleccionado"] = $value;
				$dato["contenedor"] = "datosAnuales/datosAnuales_new";
				$this->load->view('plantilla', $dato);
 			}
		}else{
			redirect('inicio');
		}
	}
	public function editarDGA($value=''){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa" => "Empresa",
			                     $inicioURL."datosAnuales" => "Datos Anuales",
			                     $inicioURL."datosAnuales/editarDGA" => "Editar Registro"
			                    );
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('DatosGeneralesAnualSeccA_Modelo');
				$this->load->model('DatosGeneralesAnualSeccB_Modelo');
				$this->load->model('DatosGeneralesAnualSeccC_Modelo');
				$this->load->model('DatosGeneralesAnualSeccD_Modelo');
				$this->load->model('DatosGeneralesAnualSeccE_Modelo');
				$this->load->model('DatosGeneralesAnualSeccF_Modelo');
				$dato["seccionA"] = $this->DatosGeneralesAnualSeccA_Modelo->getListDatosGeneralesAnualSeccA($IdEmpresaSesion);
				$dato["seccionB"] = $this->DatosGeneralesAnualSeccB_Modelo->getListDatosGeneralesAnualSeccB($IdEmpresaSesion);
				$dato["seccionC"] = $this->DatosGeneralesAnualSeccC_Modelo->getListDatosGeneralesAnualSeccC($IdEmpresaSesion);
				$dato["seccionD"] = $this->DatosGeneralesAnualSeccD_Modelo->getListDatosGeneralesAnualSeccD($IdEmpresaSesion);
				$dato["seccionE"] = $this->DatosGeneralesAnualSeccE_Modelo->getListDatosGeneralesAnualSeccE($IdEmpresaSesion);
				$dato["seccionF"] = $this->DatosGeneralesAnualSeccF_Modelo->getListDatosGeneralesAnualSeccF($IdEmpresaSesion);
	 			$dato["admin"] = 1;
	 			$dato["seleccionado"] = $value;
	 			$dato["ubicacionURL"] = $relativeURL;
				$dato["contenedor"] = "datosAnuales/datosAnuales_view";
				$this->load->view("plantilla", $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisosSeccionA"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "seccionA", $IdEmpresaSesion);
				$dato["permisosSeccionB"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "seccionB", $IdEmpresaSesion);
				$dato["permisosSeccionC"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "seccionC", $IdEmpresaSesion);
				$dato["permisosSeccionD"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "seccionD", $IdEmpresaSesion);
				$dato["permisosSeccionE"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "seccionE", $IdEmpresaSesion);
				$dato["permisosSeccionF"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "seccionF", $IdEmpresaSesion);				
				if (!empty($dato["permisosSeccionA"]) OR !empty($dato["permisosSeccionB"]) OR !empty($dato["permisosSeccionC"]) OR !empty($dato["permisosSeccionD"]) OR !empty($dato["permisosSeccionE"]) OR !empty($dato["permisosSeccionF"])){
					 if ($dato["permisosSeccionA"][0]->Ver == 1 OR $dato["permisosSeccionA"][0]->Actualizar == 1) {
						$this->load->model('DatosGeneralesAnualSeccA_Modelo');
						$dato["seccionA"] = $this->DatosGeneralesAnualSeccA_Modelo->getListDatosGeneralesAnualSeccA($IdEmpresaSesion);						
					}
					if ($dato["permisosSeccionB"][0]->Ver == 1 OR $dato["permisosSeccionB"][0]->Actualizar == 1) {
						$this->load->model('DatosGeneralesAnualSeccB_Modelo');
						$dato["seccionB"] = $this->DatosGeneralesAnualSeccB_Modelo->getListDatosGeneralesAnualSeccB($IdEmpresaSesion);
					}
					if ($dato["permisosSeccionC"][0]->Ver == 1 OR $dato["permisosSeccionC"][0]->Actualizar == 1) {
						$this->load->model('DatosGeneralesAnualSeccC_Modelo');
						$dato["seccionC"] = $this->DatosGeneralesAnualSeccC_Modelo->getListDatosGeneralesAnualSeccC($IdEmpresaSesion);
					}
					if ($dato["permisosSeccionD"][0]->Ver == 1 OR $dato["permisosSeccionD"][0]->Actualizar == 1) {
						$this->load->model('DatosGeneralesAnualSeccD_Modelo');
						$dato["seccionD"] = $this->DatosGeneralesAnualSeccD_Modelo->getListDatosGeneralesAnualSeccD($IdEmpresaSesion);
					}
					if ($dato["permisosSeccionE"][0]->Ver == 1 OR $dato["permisosSeccionE"][0]->Actualizar == 1) {
						$this->load->model('DatosGeneralesAnualSeccE_Modelo');
						$dato["seccionE"] = $this->DatosGeneralesAnualSeccE_Modelo->getListDatosGeneralesAnualSeccE($IdEmpresaSesion);
					}
					if ($dato["permisosSeccionF"][0]->Ver == 1 OR $dato["permisosSeccionF"][0]->Actualizar == 1) {
						$this->load->model('DatosGeneralesAnualSeccF_Modelo');
						$dato["seccionF"] = $this->DatosGeneralesAnualSeccF_Modelo->getListDatosGeneralesAnualSeccF($IdEmpresaSesion);
					}

					$dato["seleccionado"] = $value;
		 			$dato["ubicacionURL"] = $relativeURL;
					$dato["contenedor"] = "datosAnuales/datosAnuales_view";
					$this->load->view("plantilla", $dato);
					
				}else{
					$dato["seleccionado"] = $value;
		 			$dato["ubicacionURL"] = $relativeURL;
					$dato["contenedor"] = "datosAnuales/datosAnuales_view";
					$this->load->view("plantilla", $dato);
				}
 			}			
		}else{
			redirect('inicio');
		}		
	}

	public function editarDGASA($IdDGASA, $idMenu){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa" => "Empresa",
			                     $inicioURL."datosAnuales" => "Datos Anuales",
			                     $inicioURL."datosAnuales/editarDGA" => "Editar Registro"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
			$idUsuario = $this->session->userdata("idUsuarioSesion");

 		 	if ($tipoUsuario == "Admin") { 
 				$this->load->model('DatosGeneralesAnualSeccA_Modelo');			
				$dato['datoDGASA'] = $this->DatosGeneralesAnualSeccA_Modelo->getDatosGeneralesAnualSeccA($IdDGASA, $IdEmpresaSesion);
				$dato["admin"] = 1;
				$dato["seleccionado"] = 1;
				$dato["titulo"] = "Editar Sección A";   
				$dato["accion"] = "Editar";	
				$dato["idBaseData"] = $idMenu;
				$dato["contenedor"] = "datosAnuales/datosAnuales_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion"); 				
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");

				$this->load->model('Permiso_Modelo');

				// INICIO FRAGMENTO PARA BLOQUEAR LOS COMPONENTES ***
				$SQLdata = $this->Permiso_Modelo->getComponents($idUsuario,$IdEmpresaSesion);
				$componentBlock = array();

				foreach($SQLdata->result() as $row) {
					if($row->Habilitar == 1){
				 		$componentBlock[$row->IdComp] = 'disabled';
			 		}else {
			 			$componentBlock[$row->IdComp] = '';
			 		}
			 	}
			 	$dato['componentBlock'] = $componentBlock;

				// INICIO FRAGMENTO PARA BLOQUEAR LOS COMPONENTES ***

				$dato["permisosSeccionA"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "seccionA", $IdEmpresaSesion);
				$dato["permisosSeccionB"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "seccionB", $IdEmpresaSesion);
				$dato["permisosSeccionC"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "seccionC", $IdEmpresaSesion);
				$dato["permisosSeccionD"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "seccionD", $IdEmpresaSesion);
				$dato["permisosSeccionE"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "seccionE", $IdEmpresaSesion);
				$dato["permisosSeccionF"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "seccionF", $IdEmpresaSesion);


				if (!empty($dato["permisosSeccionA"])){
					if ($dato["permisosSeccionA"][0]->Actualizar == 1 OR $dato["permisosSeccionA"][0]->Ver == 1) {
						$this->load->model('DatosGeneralesAnualSeccA_Modelo');			
						$dato['datoDGASA'] = $this->DatosGeneralesAnualSeccA_Modelo->getDatosGeneralesAnualSeccA($IdDGASA, $IdEmpresaSesion);
						$dato["seleccionado"] = 1;
						$dato["titulo"] = "Editar Sección A";   
						$dato["accion"] = "Editar";	
						$dato["contenedor"] = "datosAnuales/datosAnuales_edit";
						$this->load->view('plantilla', $dato);
					}else{
				echo '<script type="text/javascript">  alert("No cuenta con el permiso"); </script>';
						$this->editarDGA();
					}
				}else{
					$this->editarDGA();
				}
 			}
		}else{
			redirect('inicio');
		}
	}
	public function guardarDGASA(){
		/*$this->form_validation->set_rules('txtPorcentajeDiscapacidad','Porcentaje de Discapacidad','trim|numeric|required');
		$this->form_validation->set_rules('txtPIBPercapita','PIB Percapita  ','trim|numeric|required');	
		$this->form_validation->set_rules('txtInflacionMensual','Inflación Mensual','trim|numeric|required');	
		$this->form_validation->set_rules('txtInflacionAnualizada','Inflación Anual','trim|numeric|required');	
		$this->form_validation->set_rules('txtValorSalarioMinimoMensual','Salario Básico','trim|numeric|required');	
		$this->form_validation->set_rules('txtNumTDiasLaborados','DIAS LABORABLES ','trim|numeric|required');	
		$this->form_validation->set_rules('txtValMinAperturaCuenta','Ingresar el valor cuota mínima para apertura de cuenta ','trim|numeric|required');
		$this->form_validation->set_rules('txtTEAMaximaBCE','TEA máxima por el BCE ','trim|numeric|required');	
		$this->form_validation->set_rules('txtTEAMaximaCooperativa','TEA máxima por el Cooperativa','trim|numeric|required');
		$this->form_validation->set_rules('txtNumTDiasDescansoForzoso','Dias de descanso forzoso','trim|numeric|required');	
		$this->form_validation->set_rules('txtNumTBateriasSanitariasPorNormativa','Número de baterias sanitarias establecidas por normativa','trim|numeric|required');	
		$this->form_validation->set_rules('txtNumEmpleadosQueCubreLasBaterias','Número de empleados que cubre el número de baterias','trim|numeric|required');	
		$this->form_validation->set_rules('txtNumTDiasDescansoForzosoLaborados','Cantidad de días de descanso forzoso laborados por los empleados','trim|numeric|required');	
		$this->form_validation->set_rules('txtNumTHorasTrabajadas','Total de horas trabajadas en el año','trim|numeric|required');	
		$this->form_validation->set_rules('txtPromedioCuentasPorCobrar','Promedio de cuentas por cobrar','trim|numeric|required');	
		$this->form_validation->set_rules('txtNumTProveedoresTrabajanOrganizacion','Número de proveedores  que trabajan con la organización','trim|numeric|required');	
		$this->form_validation->set_rules('txtNumTEmpleadosGeneradosParaSocios','Número de empleados nuevos generados para socios','trim|numeric|required');	
		$this->form_validation->set_rules('txtNumTPoliticasDeCotratacionDePersonal','Número de políticas de contratación de personal ','trim|numeric|required');	
		$this->form_validation->set_rules('txtNumTContratosEnFuncionDeCV','Número de contrataciones en función de la CV','trim|numeric|required');	
		$this->form_validation->set_rules('txtNumtSociosEnProgramaDeSeguroExequial','Número de socios que estan dentro del programa seguros exequia','trim|numeric|required');	
		$this->form_validation->set_rules('txtNumTSociosAportanAlFondoDeCesantia','Número de empleados y socios que aportan al fondo de cesantía','trim|numeric|required');	
		$this->form_validation->set_rules('txtNumTSociosAportanAlFondoMortuorio','Número de empleados y socios que aportan al fondo mortuorio','trim|numeric|required');	
		$this->form_validation->set_rules('txtNumTSociosAportanAlFondoDeEmpleadosOCooperativa','Número de empleados y socios que aportan al fonto de empleados o cooperativos','trim|numeric|required');	
		$this->form_validation->set_rules('txtNumTSociosAportanAlFondoDeAccidenteOCalamidades','Número de empleados o socios que aportan al fondo de accidentes o calamidades','trim|numeric|required');	
		$this->form_validation->set_rules('txtNumTPracticantesRequeridos','Número de practicantes establecidos mediante política','trim|numeric|required');	
		$this->form_validation->set_rules('txtNumTRepresentantesEmpadronados','Número total de representantes empadronados','trim|numeric|required');	
		$this->form_validation->set_rules('txtCantTKwhEnergiaUtilizadaRenovable','Energía renovable utilizada (kwh) ','trim|numeric|required');	
		$this->form_validation->set_rules('txtCantTKwhEnergiaRenovableNoRenovable','Energia renovable y no renovable (kwh)','trim|numeric|required');	
		$this->form_validation->set_rules('txtCantTm3Reutilizada','Cantidad de agua reutilizada o reciclada (m3)','trim|numeric|required');	
		$this->form_validation->set_rules('txtNumTAccidentes5Anios','Sumatoria de accidentes últimos 5 años','trim|numeric|required');	*/
		$this->form_validation->set_rules('txtPeriodo','Periodo de la sección A','trim|integer|required');	
				
		if ($this->form_validation->run() == false) {
			if ($_POST["accion"] == "Editar"){
				$this->editarDGASA($_POST["id"],"menu1");
			}else{
				$this->nuevoDGA(1);				
			}
		}else{
			$this->load->model('DatosGeneralesAnualSeccA_Modelo');
			$id = $_POST['id'];
			$tiempo = time();
			$txtPorcentajeDiscapacidad = $_POST["txtPorcentajeDiscapacidad"];
			$txtPIBPercapita = $_POST["txtPIBPercapita"];
			$txtInflacionMensual = $_POST["txtInflacionMensual"];
			$txtInflacionAnualizada = $_POST["txtInflacionAnualizada"];
			$txtValorSalarioMinimoMensual = $_POST["txtValorSalarioMinimoMensual"];
			$txtNumTDiasLaborados = $_POST["txtNumTDiasLaborados"];
			$txtValMinAperturaCuenta = $_POST["txtValMinAperturaCuenta"];
			$txtTEAMaximaBCE = $_POST["txtTEAMaximaBCE"];
			$txtTEAMaximaCooperativa = $_POST["txtTEAMaximaCooperativa"];
			$txtNumTDiasDescansoForzoso = $_POST["txtNumTDiasDescansoForzoso"];
			$txtNumTBateriasSanitariasPorNormativa = $_POST["txtNumTBateriasSanitariasPorNormativa"];
			$txtNumEmpleadosQueCubreLasBaterias = $_POST["txtNumEmpleadosQueCubreLasBaterias"];
			$txtNumTDiasDescansoForzosoLaborados = $_POST["txtNumTDiasDescansoForzosoLaborados"];
			$txtNumTHorasTrabajadas = $_POST["txtNumTHorasTrabajadas"];
			$txtPromedioCuentasPorCobrar = $_POST["txtPromedioCuentasPorCobrar"];
			$txtNumTProveedoresTrabajanOrganizacion = $_POST["txtNumTProveedoresTrabajanOrganizacion"];
			$txtNumTEmpleadosGeneradosParaSocios = $_POST["txtNumTEmpleadosGeneradosParaSocios"];
			$txtNumTPoliticasDeCotratacionDePersonal = $_POST["txtNumTPoliticasDeCotratacionDePersonal"];
			$txtNumTContratosEnFuncionDeCV = $_POST["txtNumTContratosEnFuncionDeCV"];
			$txtNumtSociosEnProgramaDeSeguroExequial = $_POST["txtNumtSociosEnProgramaDeSeguroExequial"];
			$txtNumTSociosAportanAlFondoDeCesantia = $_POST["txtNumTSociosAportanAlFondoDeCesantia"];
			$txtNumTSociosAportanAlFondoMortuorio = $_POST["txtNumTSociosAportanAlFondoMortuorio"];
			$txtNumTSociosAportanAlFondoDeEmpleadosOCooperativa = $_POST["txtNumTSociosAportanAlFondoDeEmpleadosOCooperativa"];
			$txtNumTSociosAportanAlFondoDeAccidenteOCalamidades = $_POST["txtNumTSociosAportanAlFondoDeAccidenteOCalamidades"];
			$txtNumTPracticantesRequeridos = $_POST["txtNumTPracticantesRequeridos"];
			$txtNumTRepresentantesEmpadronados = $_POST["txtNumTRepresentantesEmpadronados"];
			$txtCantTKwhEnergiaUtilizadaRenovable = $_POST["txtCantTKwhEnergiaUtilizadaRenovable"];
			$txtCantTKwhEnergiaRenovableNoRenovable = $_POST["txtCantTKwhEnergiaRenovableNoRenovable"];
			$txtCantTm3Reutilizada = $_POST["txtCantTm3Reutilizada"];
			$txtNumTAccidentes5Anios = $_POST["txtNumTAccidentes5Anios"];	
			$txtPeriodo = $_POST["txtPeriodo"];	
			$txtFechaSistema = date("Y-m-d H:i:s", $tiempo);		
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($_POST["accion"] == "Editar"){
				$updateDGASA = array(					
					'PorcentajeEmpleadosDiscapacitadosPorLey' => $txtPorcentajeDiscapacidad,
					'PIBPercapita' => $txtPIBPercapita,
					'InflacionMensual' => $txtInflacionMensual,
					'InflacionAnualizada' => $txtInflacionAnualizada,
					'ValorSalarioMinimoMensual' => $txtValorSalarioMinimoMensual,
					'NumTDiasLaborados' => $txtNumTDiasLaborados,
					'ValorCuotaIngreso' => $txtValMinAperturaCuenta,
					'TEAMaximaBCE' => $txtTEAMaximaBCE,
					'TEAMaximaCooperativa' => $txtTEAMaximaCooperativa,
					'NumTDiasDescansoForzoso' => $txtNumTDiasDescansoForzoso,
					'NumTBateriasSanitariasPorNormativa' => $txtNumTBateriasSanitariasPorNormativa,
					'NumEmpleadosQueCubreLasBaterias' => $txtNumEmpleadosQueCubreLasBaterias,
					'NumTDiasDescansoForzosoLaborados' => $txtNumTDiasDescansoForzosoLaborados,
					'NumTHorasTrabajadas' => $txtNumTHorasTrabajadas,
					'PromedioCuentasPorCobrar' => $txtPromedioCuentasPorCobrar,
					'NumTProveedoresTrabajanOrganizacion' => $txtNumTProveedoresTrabajanOrganizacion,
					'NumTEmpleadosGeneradosParaSocios' => $txtNumTEmpleadosGeneradosParaSocios,
					'NumTPoliticasDeCotratacionDePersonal' => $txtNumTPoliticasDeCotratacionDePersonal,
					'NumTContratosEnFuncionDeCV' => $txtNumTContratosEnFuncionDeCV,
					'NumtSociosEnProgramaDeSeguroExequial' => $txtNumtSociosEnProgramaDeSeguroExequial,
					'NumTSociosAportanAlFondoDeCesantia' => $txtNumTSociosAportanAlFondoDeCesantia,
					'NumTSociosAportanAlFondoMortuorio' => $txtNumTSociosAportanAlFondoMortuorio,
					'NumTSociosAportanAlFondoDeEmpleadosOCooperativa' => $txtNumTSociosAportanAlFondoDeEmpleadosOCooperativa,
					'NumTSociosAportanAlFondoDeAccidenteOCalamidades' => $txtNumTSociosAportanAlFondoDeAccidenteOCalamidades,
					'NumTPracticantesRequeridos' => $txtNumTPracticantesRequeridos,
					'NumTRepresentantesEmpadronados' => $txtNumTRepresentantesEmpadronados,
					'CantTKwhEnergiaUtilizadaRenovable' => $txtCantTKwhEnergiaUtilizadaRenovable,
					'CantTKwhEnergiaRenovableNoRenovable' => $txtCantTKwhEnergiaRenovableNoRenovable,
					'CantTm3Reutilizada' => $txtCantTm3Reutilizada,
					'NumTAccidentes5Anios' => $txtNumTAccidentes5Anios,
					'Periodo' => $txtPeriodo,					
					'FechaSistema' => $txtFechaSistema,					
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->DatosGeneralesAnualSeccA_Modelo->updateDatosGeneralesAnualSeccA($id, $updateDGASA, $IdEmpresaSesion)){
					$mensaje = "El Registro fue modificado con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarDGASA($id,"menu1");				
				}else{
					$mensaje = "El Registro no fue modificado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarDGASA($id,"menu1");				
				}
			}else{
				$insertDGASA = array(
					'PorcentajeEmpleadosDiscapacitadosPorLey' => $txtPorcentajeDiscapacidad,
					'PIBPercapita' => $txtPIBPercapita,
					'InflacionMensual' => $txtInflacionMensual,
					'InflacionAnualizada' => $txtInflacionAnualizada,
					'ValorSalarioMinimoMensual' => $txtValorSalarioMinimoMensual,
					'NumTDiasLaborados' => $txtNumTDiasLaborados,
					'ValorCuotaIngreso' => $txtValMinAperturaCuenta,
					'TEAMaximaBCE' => $txtTEAMaximaBCE,
					'TEAMaximaCooperativa' => $txtTEAMaximaCooperativa,
					'NumTDiasDescansoForzoso' => $txtNumTDiasDescansoForzoso,
					'NumTBateriasSanitariasPorNormativa' => $txtNumTBateriasSanitariasPorNormativa,
					'NumEmpleadosQueCubreLasBaterias' => $txtNumEmpleadosQueCubreLasBaterias,
					'NumTDiasDescansoForzosoLaborados' => $txtNumTDiasDescansoForzosoLaborados,
					'NumTHorasTrabajadas' => $txtNumTHorasTrabajadas,
					'PromedioCuentasPorCobrar' => $txtPromedioCuentasPorCobrar,
					'NumTProveedoresTrabajanOrganizacion' => $txtNumTProveedoresTrabajanOrganizacion,
					'NumTEmpleadosGeneradosParaSocios' => $txtNumTEmpleadosGeneradosParaSocios,
					'NumTPoliticasDeCotratacionDePersonal' => $txtNumTPoliticasDeCotratacionDePersonal,
					'NumTContratosEnFuncionDeCV' => $txtNumTContratosEnFuncionDeCV,
					'NumtSociosEnProgramaDeSeguroExequial' => $txtNumtSociosEnProgramaDeSeguroExequial,
					'NumTSociosAportanAlFondoDeCesantia' => $txtNumTSociosAportanAlFondoDeCesantia,
					'NumTSociosAportanAlFondoMortuorio' => $txtNumTSociosAportanAlFondoMortuorio,
					'NumTSociosAportanAlFondoDeEmpleadosOCooperativa' => $txtNumTSociosAportanAlFondoDeEmpleadosOCooperativa,
					'NumTSociosAportanAlFondoDeAccidenteOCalamidades' => $txtNumTSociosAportanAlFondoDeAccidenteOCalamidades,
					'NumTPracticantesRequeridos' => $txtNumTPracticantesRequeridos,
					'NumTRepresentantesEmpadronados' => $txtNumTRepresentantesEmpadronados,
					'CantTKwhEnergiaUtilizadaRenovable' => $txtCantTKwhEnergiaUtilizadaRenovable,
					'CantTKwhEnergiaRenovableNoRenovable' => $txtCantTKwhEnergiaRenovableNoRenovable,
					'CantTm3Reutilizada' => $txtCantTm3Reutilizada,
					'NumTAccidentes5Anios' => $txtNumTAccidentes5Anios,
					'Periodo' => $txtPeriodo,					
					'FechaSistema' => $txtFechaSistema,					
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->DatosGeneralesAnualSeccA_Modelo->insertDatosGeneralesAnualSeccA($insertDGASA)){
					$mensaje = "Datos de la sección A guardados con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarDGA(1);
					//$this->editarDGA();
				}else{
					$mensaje = "El Registro no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoDGA(1);				
				}
			}
		}
	}
	public function eliminarDGASA(){
		$this->load->model('DatosGeneralesAnualSeccA_Modelo'); 		          	
		$id = $_POST["idA"];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->DatosGeneralesAnualSeccA_Modelo->deleteDatosGeneralesAnualSeccA($id, $IdEmpresaSesion); 
	}

	public function editarDGASB($IdDGASB, $idMenu){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa" => "Empresa",
			                     $inicioURL."datosAnuales" => "Datos Anuales",
			                     $inicioURL."datosAnuales/editarDGA" => "Editar Registro"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('DatosGeneralesAnualSeccB_Modelo');
				$dato['datoDGASB'] = $this->DatosGeneralesAnualSeccB_Modelo->getDatosGeneralesAnualSeccB($IdDGASB, $IdEmpresaSesion);
				$dato["admin"] = 1;
				$dato["seleccionado"] = 2;
				$dato["titulo"] = "Editar Sección B";
				$dato["accion"] = "Editar";	
				$dato["idBaseData"] = $idMenu;
				$dato["contenedor"] = "datosAnuales/datosAnuales_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisosSeccionA"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "seccionA", $IdEmpresaSesion);
				$dato["permisosSeccionB"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "seccionB", $IdEmpresaSesion);
				$dato["permisosSeccionC"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "seccionC", $IdEmpresaSesion);
				$dato["permisosSeccionD"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "seccionD", $IdEmpresaSesion);
				$dato["permisosSeccionE"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "seccionE", $IdEmpresaSesion);
				$dato["permisosSeccionF"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "seccionF", $IdEmpresaSesion);
				if (!empty($dato["permisosSeccionB"])){
					if ($dato["permisosSeccionB"][0]->Actualizar == 1 OR $dato["permisosSeccionB"][0]->Ver == 1) {
						$this->load->model('DatosGeneralesAnualSeccB_Modelo');
						$dato['datoDGASB'] = $this->DatosGeneralesAnualSeccB_Modelo->getDatosGeneralesAnualSeccB($IdDGASB, $IdEmpresaSesion);
						$dato["seleccionado"] = 2;
						$dato["titulo"] = "Editar Sección B";
						$dato["accion"] = "Editar";	
						$dato["contenedor"] = "datosAnuales/datosAnuales_edit";
						$this->load->view('plantilla', $dato);
					}else{
						echo '<script type="text/javascript">  alert("No cuenta con el permiso"); </script>';
						$this->editarDGA();
					}
				}else{
					$this->editarDGA();
				}
 			}					
		}else{
			redirect('inicio');
		}
	}
	public function guardarDGASB(){
		/*$this->form_validation->set_rules('txtNumTSocios50PorcientoOMasTotalDeDepositos','Número de socios que sumados represente el 50% o más del total de depósitos','trim|required|numeric');
		$this->form_validation->set_rules('txtNumTSugerenciasConstructivas','Sugerencias constructivas','trim|required|numeric');
		$this->form_validation->set_rules('txtNumTSugerenciasRevisadas','Total sugerencias revisadas en el buzón de sugerencias','trim|required|numeric');
		$this->form_validation->set_rules('txtNumTProductosServiciosEntregadosATiempoAClientes','Cantidad de productos y servicios entregados a tiempo a los clientes','trim|required|numeric');
		$this->form_validation->set_rules('txtNumTEventosMantieneConOtrasCOAC','Número de eventos que mantiene con otras COAC','trim|required|numeric');
		$this->form_validation->set_rules('txtNumTBeneficiosNoFinancierosASocios','Número de beneficios dirigidos a socios en el ámbito distintos a servicios financieros','trim|required|numeric');
		$this->form_validation->set_rules('txtNumTSociosParticipanEnElecciones','Número socios participantes en elecciones','trim|required|numeric');
		$this->form_validation->set_rules('txtNumTEmpeladosQueGozaronVacaciones','Empleados que gozaron  de las vacaciones','trim|required|numeric');
		$this->form_validation->set_rules('txtNumTEmpleadosRecibenEquipoDeProteccion','Número de empleados a los que se entrego equipos de protección','trim|required|numeric');
		$this->form_validation->set_rules('txtNumTEmpleadosQueUsanEquiposDeProteccion','Número de empleados que utiliza los equipos de protección','trim|required|numeric');
		$this->form_validation->set_rules('txtNumTEmpleadosQueDebemUsarEquiposDeProteccion','Empleados que debería utilizar los  equipos de protección','trim|required|numeric');
		$this->form_validation->set_rules('txtNumTEvaluacionesAUtilizacionDeEquiDeProteccionEjecutadas','Número de evaluaciones efectuadas utilización de equipos de protección','trim|required|numeric');
		$this->form_validation->set_rules('txtNumTEvaluacionesAUtilizacionDeEquiDeProteccionProgramadas','Evaluaciones programadas utilización de equipos de protección','trim|required|numeric');
		$this->form_validation->set_rules('txtNumTMantenimientosAInfraestructuraEjecutados','Cantidad de mantenimientos realizados a la infraestructura','trim|required|numeric');
		$this->form_validation->set_rules('txtNumTMantenimientosAInfraestructuraRequeridos','Mantenimientos requeridos ','trim|required|numeric');
		$this->form_validation->set_rules('txtNumTPuntosEnComunidadesSinOtrasInstitucionesFinancieras','Número de oficinas en comunidades que no existe otras instituciones de servicio financiero','trim|required|numeric');
		$this->form_validation->set_rules('txtNumTPuntosDeAtencion','Total puntos de atención','trim|required|numeric');
		$this->form_validation->set_rules('txtNumTOficinasConAccesoADiscapacitados','Puntos de atención que brinda acceso a personas con discapacidad','trim|required|numeric');
		//$this->form_validation->set_rules('txtNumTPuntosDeAccesoADiscapacitados','Total puntos de acceso ','trim|required|numeric');
		$this->form_validation->set_rules('txtNumTParticipacionesLobbying','Número de participaciones en la posición de políticas públicas y actividades de lobbying','trim|required|numeric');
		$this->form_validation->set_rules('txtNumTAsuntosAcordadosNoRespetadosPorDirectivos','Asuntos acordados no respetados por los directivos','trim|required|numeric');
		$this->form_validation->set_rules('txtNumTAsuntosAcordadosEnConveniosSindicales','Total de asuntos acordados en los convenios sindicales','trim|required|numeric');
		$this->form_validation->set_rules('txtNumTAsuntosAcordadosNoRespetadosPorEmpleados','Asuntos acordados con los directivos no respetados por los trabajadores','trim|required|numeric');
		$this->form_validation->set_rules('txtNumTCreditosVigentesAMujeres','Número de créditos vigentes otorgados a mujeres','trim|required|numeric');
		$this->form_validation->set_rules('txtValorTCarteraCreditoMujeres','Total cartera de crédito mujeres','trim|required|numeric');
		$this->form_validation->set_rules('txtNumTOperacionesDeCreditosConMontoMenorA30PorcientoPIB','Número de operaciones de créditos con montos <=al 30% del PIB per cápita','trim|required|numeric');
		$this->form_validation->set_rules('txtNumTOperacionesDeCreditoVigentes','Número Total de operaciones de crédito vigentes','trim|required|numeric');
		$this->form_validation->set_rules('txtNumTOperacionesCreditoConCuotasVigentesMenosA1PorcientoPIB','Número de operaciones de créditos  con cuotas vigentes <= 1% del PIB Per capita','trim|required|numeric');
		$this->form_validation->set_rules('txtNumTPedidosEntregadosATiempo','Número de pedidos entregados a tiempo','trim|required|numeric');
		$this->form_validation->set_rules('txtNumTPedidosEntregados','Total pedidos entregados','trim|required|numeric');
		$this->form_validation->set_rules('txtNumTProductosYServiciosAdquiereLocalmente','Número de productos y servicios que se adquiere en el ámbito local','trim|required|numeric');
		$this->form_validation->set_rules('txtNumTProductosYServicios','Total productos y servicios','trim|required|numeric');
		$this->form_validation->set_rules('txtNumTCertificacionesRequeridasEnElPOA','Número de Certificaciones requeridas en el POA','trim|required|numeric');*/
		$this->form_validation->set_rules('txtPeriodo','Periodo de la sección B','trim|required|integer');
		if ($this->form_validation->run() == false) {
			if ($_POST["accion"] == "Editar"){
				$this->editarDGASB($_POST["id"],"menu2");
			}else{				
				$this->nuevoDGA(2);
			}
		}else{
			$this->load->model('DatosGeneralesAnualSeccB_Modelo');
			$id = $_POST['id'];
			$tiempo = time();
			$txtNumTSocios50PorcientoOMasTotalDeDepositos = $_POST["txtNumTSocios50PorcientoOMasTotalDeDepositos"];
			$txtNumTSugerenciasConstructivas = $_POST["txtNumTSugerenciasConstructivas"];
			$txtNumTSugerenciasRevisadas = $_POST["txtNumTSugerenciasRevisadas"];
			$txtNumTProductosServiciosEntregadosATiempoAClientes = $_POST["txtNumTProductosServiciosEntregadosATiempoAClientes"];
			$txtNumTEventosMantieneConOtrasCOAC = $_POST["txtNumTEventosMantieneConOtrasCOAC"];
			$txtNumTBeneficiosNoFinancierosASocios = $_POST["txtNumTBeneficiosNoFinancierosASocios"];
			$txtNumTSociosParticipanEnElecciones = $_POST["txtNumTSociosParticipanEnElecciones"];
			$txtNumTEmpeladosQueGozaronVacaciones = $_POST["txtNumTEmpeladosQueGozaronVacaciones"];
			$txtNumTEmpleadosRecibenEquipoDeProteccion = $_POST["txtNumTEmpleadosRecibenEquipoDeProteccion"];
			$txtNumTEmpleadosQueUsanEquiposDeProteccion = $_POST["txtNumTEmpleadosQueUsanEquiposDeProteccion"];
			$txtNumTEmpleadosQueDebemUsarEquiposDeProteccion = $_POST["txtNumTEmpleadosQueDebemUsarEquiposDeProteccion"];
			$txtNumTEvaluacionesAUtilizacionDeEquiDeProteccionEjecutadas = $_POST["txtNumTEvaluacionesAUtilizacionDeEquiDeProteccionEjecutadas"];
			$txtNumTEvaluacionesAUtilizacionDeEquiDeProteccionProgramadas = $_POST["txtNumTEvaluacionesAUtilizacionDeEquiDeProteccionProgramadas"];
			$txtNumTMantenimientosAInfraestructuraEjecutados = $_POST["txtNumTMantenimientosAInfraestructuraEjecutados"];
			$txtNumTMantenimientosAInfraestructuraRequeridos = $_POST["txtNumTMantenimientosAInfraestructuraRequeridos"];
			$txtNumTPuntosEnComunidadesSinOtrasInstitucionesFinancieras = $_POST["txtNumTPuntosEnComunidadesSinOtrasInstitucionesFinancieras"];
			$txtNumTPuntosDeAtencion = $_POST["txtNumTPuntosDeAtencion"];
			$txtNumTOficinasConAccesoADiscapacitados = $_POST["txtNumTOficinasConAccesoADiscapacitados"];
			//$txtNumTPuntosDeAccesoADiscapacitados = $_POST["txtNumTPuntosDeAccesoADiscapacitados"];
			$txtNumTParticipacionesLobbying = $_POST["txtNumTParticipacionesLobbying"];
			$txtNumTAsuntosAcordadosNoRespetadosPorDirectivos = $_POST["txtNumTAsuntosAcordadosNoRespetadosPorDirectivos"];
			$txtNumTAsuntosAcordadosEnConveniosSindicales = $_POST["txtNumTAsuntosAcordadosEnConveniosSindicales"];
			$txtNumTAsuntosAcordadosNoRespetadosPorEmpleados = $_POST["txtNumTAsuntosAcordadosNoRespetadosPorEmpleados"];
			$txtNumTCreditosVigentesAMujeres = $_POST["txtNumTCreditosVigentesAMujeres"];
			$txtValorTCarteraCreditoMujeres = $_POST["txtValorTCarteraCreditoMujeres"];
			$txtNumTOperacionesDeCreditosConMontoMenorA30PorcientoPIB = $_POST["txtNumTOperacionesDeCreditosConMontoMenorA30PorcientoPIB"];
			$txtNumTOperacionesDeCreditoVigentes = $_POST["txtNumTOperacionesDeCreditoVigentes"];
			$txtNumTOperacionesCreditoConCuotasVigentesMenosA1PorcientoPIB = $_POST["txtNumTOperacionesCreditoConCuotasVigentesMenosA1PorcientoPIB"];
			$txtNumTPedidosEntregadosATiempo = $_POST["txtNumTPedidosEntregadosATiempo"];
			$txtNumTPedidosEntregados = $_POST["txtNumTPedidosEntregados"];
			$txtNumTProductosYServiciosAdquiereLocalmente = $_POST["txtNumTProductosYServiciosAdquiereLocalmente"];
			$txtNumTProductosYServicios = $_POST["txtNumTProductosYServicios"];
			$txtNumTCertificacionesRequeridasEnElPOA = $_POST["txtNumTCertificacionesRequeridasEnElPOA"];
			$txtPeriodo = $_POST["txtPeriodo"];
			$txtFechaSistema = date("Y-m-d H:i:s", $tiempo);		
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");

			if ($_POST["accion"] == "Editar"){				
				$updateDGASB = array(					
					'NumTSocios50PorcientoOMasTotalDeDepositos' => $txtNumTSocios50PorcientoOMasTotalDeDepositos,
					'NumTSugerenciasConstructivas' => $txtNumTSugerenciasConstructivas,
					'NumTSugerenciasRevisadas' => $txtNumTSugerenciasRevisadas,
					'NumTProductosServiciosEntregadosATiempoAClientes' => $txtNumTProductosServiciosEntregadosATiempoAClientes,
					'NumTEventosMantieneConOtrasCOAC' => $txtNumTEventosMantieneConOtrasCOAC,
					'NumTBeneficiosNoFinancierosASocios' => $txtNumTBeneficiosNoFinancierosASocios,
					'NumTSociosParticipanEnElecciones' => $txtNumTSociosParticipanEnElecciones,
					'NumTEmpeladosQueGozaronVacaciones' => $txtNumTEmpeladosQueGozaronVacaciones,
					'NumTEmpleadosRecibenEquipoDeProteccion' => $txtNumTEmpleadosRecibenEquipoDeProteccion,
					'NumTEmpleadosQueUsanEquiposDeProteccion' => $txtNumTEmpleadosQueUsanEquiposDeProteccion,
					'NumTEmpleadosQueDebemUsarEquiposDeProteccion' => $txtNumTEmpleadosQueDebemUsarEquiposDeProteccion,
					'NumTEvaluacionesAUtilizacionDeEquiDeProteccionEjecutadas' => $txtNumTEvaluacionesAUtilizacionDeEquiDeProteccionEjecutadas,
					'NumTEvaluacionesAUtilizacionDeEquiDeProteccionProgramadas' => $txtNumTEvaluacionesAUtilizacionDeEquiDeProteccionProgramadas,
					'NumTMantenimientosAInfraestructuraEjecutados' => $txtNumTMantenimientosAInfraestructuraEjecutados,
					'NumTMantenimientosAInfraestructuraRequeridos' => $txtNumTMantenimientosAInfraestructuraRequeridos,
					'NumTPuntosEnComunidadesSinOtrasInstitucionesFinancieras' => $txtNumTPuntosEnComunidadesSinOtrasInstitucionesFinancieras,
					'NumTPuntosDeAtencion' => $txtNumTPuntosDeAtencion,
					'NumTPuntosDeAtencionConAccesoADiscapacitados' => $txtNumTOficinasConAccesoADiscapacitados,
					//'NumTPuntosDeAccesoADiscapacitados' => $txtNumTPuntosDeAccesoADiscapacitados,
					'NumTParticipacionesLobbying' => $txtNumTParticipacionesLobbying,
					'NumTAsuntosAcordadosNoRespetadosPorDirectivos' => $txtNumTAsuntosAcordadosNoRespetadosPorDirectivos,
					'NumTAsuntosAcordadosEnConveniosSindicales' => $txtNumTAsuntosAcordadosEnConveniosSindicales,
					'NumTAsuntosAcordadosNoRespetadosPorEmpleados' => $txtNumTAsuntosAcordadosNoRespetadosPorEmpleados,
					'NumTCreditosVigentesAMujeres' => $txtNumTCreditosVigentesAMujeres,
					'ValorTCarteraCreditoMujeres' => $txtValorTCarteraCreditoMujeres,
					'NumTOperacionesDeCreditosConMontoMenorA30PorcientoPIB' => $txtNumTOperacionesDeCreditosConMontoMenorA30PorcientoPIB,
					'NumTOperacionesDeCreditoVigentes' => $txtNumTOperacionesDeCreditoVigentes,
					'NumTOperacionesCreditoConCuotasVigentesMenosA1PorcientoPIB' => $txtNumTOperacionesCreditoConCuotasVigentesMenosA1PorcientoPIB,
					'NumTPedidosEntregadosATiempo' => $txtNumTPedidosEntregadosATiempo,
					'NumTPedidosEntregados' => $txtNumTPedidosEntregados,
					'NumTProductosYServiciosAdquiereLocalmente' => $txtNumTProductosYServiciosAdquiereLocalmente,
					'NumTProductosYServicios' => $txtNumTProductosYServicios,
					'NumTCertificacionesRequeridasEnElPOA' => $txtNumTCertificacionesRequeridasEnElPOA,
					'Periodo' => $txtPeriodo,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->DatosGeneralesAnualSeccB_Modelo->updateDatosGeneralesAnualSeccB($id, $updateDGASB, $IdEmpresaSesion)){
					$mensaje = "El Registro fue modificado con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarDGASB($id,"menu2");				
				}else{
					$mensaje = "El Registro no fue modificado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarDGASB($id,"menu2");				
				}
			}else{
				$insertDGASB = array(
					'NumTSocios50PorcientoOMasTotalDeDepositos' => $txtNumTSocios50PorcientoOMasTotalDeDepositos,
					'NumTSugerenciasConstructivas' => $txtNumTSugerenciasConstructivas,
					'NumTSugerenciasRevisadas' => $txtNumTSugerenciasRevisadas,
					'NumTProductosServiciosEntregadosATiempoAClientes' => $txtNumTProductosServiciosEntregadosATiempoAClientes,
					'NumTEventosMantieneConOtrasCOAC' => $txtNumTEventosMantieneConOtrasCOAC,
					'NumTBeneficiosNoFinancierosASocios' => $txtNumTBeneficiosNoFinancierosASocios,
					'NumTSociosParticipanEnElecciones' => $txtNumTSociosParticipanEnElecciones,
					'NumTEmpeladosQueGozaronVacaciones' => $txtNumTEmpeladosQueGozaronVacaciones,
					'NumTEmpleadosRecibenEquipoDeProteccion' => $txtNumTEmpleadosRecibenEquipoDeProteccion,
					'NumTEmpleadosQueUsanEquiposDeProteccion' => $txtNumTEmpleadosQueUsanEquiposDeProteccion,
					'NumTEmpleadosQueDebemUsarEquiposDeProteccion' => $txtNumTEmpleadosQueDebemUsarEquiposDeProteccion,
					'NumTEvaluacionesAUtilizacionDeEquiDeProteccionEjecutadas' => $txtNumTEvaluacionesAUtilizacionDeEquiDeProteccionEjecutadas,
					'NumTEvaluacionesAUtilizacionDeEquiDeProteccionProgramadas' => $txtNumTEvaluacionesAUtilizacionDeEquiDeProteccionProgramadas,
					'NumTMantenimientosAInfraestructuraEjecutados' => $txtNumTMantenimientosAInfraestructuraEjecutados,
					'NumTMantenimientosAInfraestructuraRequeridos' => $txtNumTMantenimientosAInfraestructuraRequeridos,
					'NumTPuntosEnComunidadesSinOtrasInstitucionesFinancieras' => $txtNumTPuntosEnComunidadesSinOtrasInstitucionesFinancieras,
					'NumTPuntosDeAtencion' => $txtNumTPuntosDeAtencion,
					'NumTPuntosDeAtencionConAccesoADiscapacitados' => $txtNumTOficinasConAccesoADiscapacitados,
					//'NumTPuntosDeAccesoADiscapacitados' => $txtNumTPuntosDeAccesoADiscapacitados,
					'NumTParticipacionesLobbying' => $txtNumTParticipacionesLobbying,
					'NumTAsuntosAcordadosNoRespetadosPorDirectivos' => $txtNumTAsuntosAcordadosNoRespetadosPorDirectivos,
					'NumTAsuntosAcordadosEnConveniosSindicales' => $txtNumTAsuntosAcordadosEnConveniosSindicales,
					'NumTAsuntosAcordadosNoRespetadosPorEmpleados' => $txtNumTAsuntosAcordadosNoRespetadosPorEmpleados,
					'NumTCreditosVigentesAMujeres' => $txtNumTCreditosVigentesAMujeres,
					'ValorTCarteraCreditoMujeres' => $txtValorTCarteraCreditoMujeres,
					'NumTOperacionesDeCreditosConMontoMenorA30PorcientoPIB' => $txtNumTOperacionesDeCreditosConMontoMenorA30PorcientoPIB,
					'NumTOperacionesDeCreditoVigentes' => $txtNumTOperacionesDeCreditoVigentes,
					'NumTOperacionesCreditoConCuotasVigentesMenosA1PorcientoPIB' => $txtNumTOperacionesCreditoConCuotasVigentesMenosA1PorcientoPIB,
					'NumTPedidosEntregadosATiempo' => $txtNumTPedidosEntregadosATiempo,
					'NumTPedidosEntregados' => $txtNumTPedidosEntregados,
					'NumTProductosYServiciosAdquiereLocalmente' => $txtNumTProductosYServiciosAdquiereLocalmente,
					'NumTProductosYServicios' => $txtNumTProductosYServicios,
					'NumTCertificacionesRequeridasEnElPOA' => $txtNumTCertificacionesRequeridasEnElPOA,
					'Periodo' => $txtPeriodo,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->DatosGeneralesAnualSeccB_Modelo->insertDatosGeneralesAnualSeccB($insertDGASB)){
					$mensaje = "Datos de la sección B guardados con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarDGA(2);				
				}else{
					$mensaje = "El Registro no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoDGA(2);				
				}
			}
		}
	}
	public function eliminarDGASB(){
		$this->load->model('DatosGeneralesAnualSeccB_Modelo'); 		          	
		$id = $_POST["idB"];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->DatosGeneralesAnualSeccB_Modelo->deleteDatosGeneralesAnualSeccB($id, $IdEmpresaSesion); 
	}

	public function editarDGASC($IdDGASC, $idMenu){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa" => "Empresa",
			                     $inicioURL."datosAnuales" => "Datos Anuales",
			                     $inicioURL."datosAnuales/editarDGA" => "Editar Registro"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('DatosGeneralesAnualSeccC_Modelo');
				$dato['datoDGASC'] = $this->DatosGeneralesAnualSeccC_Modelo->getDatosGeneralesAnualSeccC($IdDGASC, $IdEmpresaSesion);
				$dato["admin"] = 1;
				$dato["seleccionado"] = 3;
				$dato["titulo"] = "Editar Sección C";   
				$dato["accion"] = "Editar";	
				$dato["idBaseData"] = $idMenu;
				$dato["contenedor"] = "datosAnuales/datosAnuales_new_edit";
				$this->load->view('plantilla', $dato);	
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisosSeccionA"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "seccionA", $IdEmpresaSesion);
				$dato["permisosSeccionB"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "seccionB", $IdEmpresaSesion);
				$dato["permisosSeccionC"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "seccionC", $IdEmpresaSesion);
				$dato["permisosSeccionD"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "seccionD", $IdEmpresaSesion);
				$dato["permisosSeccionE"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "seccionE", $IdEmpresaSesion);
				$dato["permisosSeccionF"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "seccionF", $IdEmpresaSesion);
				if (!empty($dato["permisosSeccionC"])){
					if ($dato["permisosSeccionC"][0]->Actualizar == 1 OR $dato["permisosSeccionC"][0]->Ver == 1) {
						$this->load->model('DatosGeneralesAnualSeccC_Modelo');
						$dato['datoDGASC'] = $this->DatosGeneralesAnualSeccC_Modelo->getDatosGeneralesAnualSeccC($IdDGASC, $IdEmpresaSesion);
						$dato["seleccionado"] = 3;
						$dato["titulo"] = "Editar Sección C";   
						$dato["accion"] = "Editar";	
						$dato["contenedor"] = "datosAnuales/datosAnuales_edit";
						$this->load->view('plantilla', $dato);
					}else{
						echo '<script type="text/javascript">  alert("No cuenta con el permiso"); </script>';
						$this->editarDGA();
					}
				}else{
					$this->editarDGA();
				}
 			}					
		}else{
			redirect('inicio');
		}
	}
	public function guardarDGASC(){
		/*$this->form_validation->set_rules('txtNumTDemandasAdministrativasAtendidas','Número Demandas administrativas atendidas','trim|required|numeric');	
		$this->form_validation->set_rules('txtNumTDemandasAdministrativas','Total demandas Administrativas','trim|required|numeric');	
		$this->form_validation->set_rules('txtNumTProductosServiciosEntregadosAClientes','Total productos y servicios entregados a los clientes','trim|required|numeric');	
		$this->form_validation->set_rules('txtNumTDenunciasAspectosNoEticosResueltos','Número de denuncias por aspectos poco éticos resueltas','trim|required|numeric');	
		$this->form_validation->set_rules('txtNumTDenunciasAspectosNoEticos','Total denuncias por aspectos no éticos','trim|required|numeric');	
		$this->form_validation->set_rules('txtNumTCasosDiscriminacion','Número de casos de discriminación ocurridos durante el perido resueltos','trim|required|numeric');	
		$this->form_validation->set_rules('txtNumTCasosDiscriminacionResueltos','Total casos de discriminación ','trim|required|numeric');	
		$this->form_validation->set_rules('txtNumTProcesosConRiesgosDeCorrupcionAnalizados','Número de procesos con riesgo de efectos de corrupción analizados','trim|required|numeric');	
		$this->form_validation->set_rules('txtNumTProcesosConRiesgosDeCorrupcionIdentificados','Total procesos con riesgo de corrupción identificados','trim|required|numeric');	
		$this->form_validation->set_rules('txtNumTMedidasAnteIncidentesDeCorrupcion','Número de medidas tomadas en respuesta de corrupción','trim|required|numeric');	
		$this->form_validation->set_rules('txtNumTIncidentesDeCorrupcionOcurridos','Número total de incidentes de corrupción ocurridos','trim|required|numeric');	
		$this->form_validation->set_rules('txtNumTDiasDestinadosAEducacionFamiliar','Dias destinadas a la educación familiar en el año','trim|required|numeric');	
		$this->form_validation->set_rules('txtNumTTransacciones','Número de transacciones realizadas en el periodo','trim|required|numeric');	
		$this->form_validation->set_rules('txtNumTProgramasDeReciclaje','Número de programas o iniciativas de reciclaje ','trim|required|numeric');	
		$this->form_validation->set_rules('txtNumTComprobantesEmitidos','Total de comprobantes Emitidos','trim|required|numeric');	
		$this->form_validation->set_rules('txtNumTComprobantesElectronicosEmitidos','Comprobantes electronicos','trim|required|numeric');	
		$this->form_validation->set_rules('txtNumTBateriasSanitarias','Número de baterias sanitarias que mantiene la organización','trim|required|numeric');	
		$this->form_validation->set_rules('txtNumTBeneficiosAdicionalesAEmpleadosConContratoNoIndefinido','Número de beneficios sociales adicionales que reciben los colaboradores con otro tipo de contrato o relación laboral','trim|required|numeric');
		$this->form_validation->set_rules('txtNumTBeneficiosAdicionalesAEmpleadosConContratoIndefinido','Número de beneficios sociales adicionales que reciben colaboradores con contrato indefinido','trim|required|numeric');	
		$this->form_validation->set_rules('txtNumTEmpleadosLaboranMasDeAnio','Trabajadores laboran más de un año','trim|required|numeric');	
		$this->form_validation->set_rules('txtNumTEmpleadasEmbarazadas','Mujeres embarazadas','trim|required|numeric');	
		$this->form_validation->set_rules('txtNumTEmpleadosConPermisoPaternidad','Hombres con permiso de paternidad ','trim|required|numeric');
		$this->form_validation->set_rules('txtNumTEmpleadosConPermisoPaternidad','Total hombres que debían reincorporarse tras el permiso','trim|required|numeric');
		$this->form_validation->set_rules('txtNumTEmpleadasReincorporadasPorMaternidad','Mujeres reincorporadas después permiso maternidad','trim|required|numeric');	
		$this->form_validation->set_rules('txtNumTEmpleadasConPermisoMaternidad','Total mujeres que debían reincorporarse con permiso','trim|required|numeric');
		$this->form_validation->set_rules('txtNumTEmpleadosReincorporadosPorPaternidad','Hombres reincorporados después permiso paternidad','trim|required|numeric');
		$this->form_validation->set_rules('txtNumTEmpleadosReincorporadosFueraDeTiempoEstablecido','Empleados reincorporados por un tiempo mayor al establecido  en caso de permiso de partenidad','trim|required|numeric');
		$this->form_validation->set_rules('txtNumTEmpleadosReincorporadosATiempoEstablecido','Total de empleados reincorporados en el tiempo establecido en caso de permiso de paternidad','trim|required|numeric');
		$this->form_validation->set_rules('txtNumTEmpleadasReincorporadasFueraDeTiempoEstablecido','Empleadas reincorporados por un tiempo mayor al establecido  en caso de permiso de maternidad','trim|required|numeric');
		$this->form_validation->set_rules('txtNumTEmpleadasReincorporadasATiempoEstablecido','Total de empleadas reincorporados en el tiempo establecido en caso de permiso de maternidad','trim|required|numeric');
		$this->form_validation->set_rules('txtNumTEmpleadosAJornadaCompleta','Número de trabajadores a jornada completa de trabajo','trim|required|numeric');	
		$this->form_validation->set_rules('txtNumTEmpleadosAJornadaParcial','Número Trabajadores con jornada parcial de trabajo','trim|required|numeric');
		$this->form_validation->set_rules('txtNumTHorasSuplementariasTrabajadas','Cantidad de horas suplementarias trabajadas','trim|required|numeric');	
		$this->form_validation->set_rules('txtNumTHorasExtrasTrabajadas','Cantidad de horas extras trabajadas','trim|required|numeric');	
		$this->form_validation->set_rules('txtNumTProductosDefectuososRechazados','Cantidad de productos defectuosos rechazados','trim|required|numeric');	
		$this->form_validation->set_rules('txtNumTProductosRecibidos','Total productos recibidos','trim|required|numeric');	
		$this->form_validation->set_rules('txtNumTSancionesMonetarias','Número de sanciones monetarias ','trim|required|numeric');	
		$this->form_validation->set_rules('txtNumTHorasLaboradasPorDiaEmpleados','Número de horas de trabajo al día según lo establece el Código de Trabajo','trim|required|numeric');
		$this->form_validation->set_rules('txtNumTSesionesDeConsejosEstablecidasPorLey','Número de sesiones establecidas por la ley','trim|required|numeric');*/
		$this->form_validation->set_rules('txtPeriodo','Periodo de la sección C','trim|required|integer');
		if ($this->form_validation->run() == false) {
			if ($_POST["accion"] == "Editar"){
				$this->editarDGASC($_POST["id"],"menu3");
			}else{
				$this->nuevoDGA(3);
			}
		}else{
			$this->load->model('DatosGeneralesAnualSeccC_Modelo');
			$id = $_POST["id"];		
			$tiempo = time();
			$txtNumTDemandasAdministrativasAtendidas = $_POST["txtNumTDemandasAdministrativasAtendidas"];	
			$txtNumTDemandasAdministrativas = $_POST["txtNumTDemandasAdministrativas"];	
			$txtNumTProductosServiciosEntregadosAClientes = $_POST["txtNumTProductosServiciosEntregadosAClientes"];
			$txtNumTDenunciasAspectosNoEticosResueltos = $_POST["txtNumTDenunciasAspectosNoEticosResueltos"];	
			$txtNumTDenunciasAspectosNoEticos = $_POST["txtNumTDenunciasAspectosNoEticos"];	
			$txtNumTCasosDiscriminacion = $_POST["txtNumTCasosDiscriminacion"];	
			$txtNumTCasosDiscriminacionResueltos = $_POST["txtNumTCasosDiscriminacionResueltos"];	
			$txtNumTProcesosConRiesgosDeCorrupcionAnalizados = $_POST["txtNumTProcesosConRiesgosDeCorrupcionAnalizados"];
			$txtNumTProcesosConRiesgosDeCorrupcionIdentificados = $_POST["txtNumTProcesosConRiesgosDeCorrupcionIdentificados"];	
			$txtNumTMedidasAnteIncidentesDeCorrupcion = $_POST["txtNumTMedidasAnteIncidentesDeCorrupcion"];	
			$txtNumTIncidentesDeCorrupcionOcurridos = $_POST["txtNumTIncidentesDeCorrupcionOcurridos"];	
			$txtNumTDiasDestinadosAEducacionFamiliar = $_POST["txtNumTDiasDestinadosAEducacionFamiliar"];
			$txtNumTTransacciones = $_POST["txtNumTTransacciones"];	
			$txtNumTProgramasDeReciclaje = $_POST["txtNumTProgramasDeReciclaje"];	
			$txtNumTComprobantesEmitidos = $_POST["txtNumTComprobantesEmitidos"];	
			$txtNumTComprobantesElectronicosEmitidos = $_POST["txtNumTComprobantesElectronicosEmitidos"];	
			$txtNumTBateriasSanitarias = $_POST["txtNumTBateriasSanitarias"];	
			$txtNumTBeneficiosAdicionalesAEmpleadosConContratoNoIndefinido = $_POST["txtNumTBeneficiosAdicionalesAEmpleadosConContratoNoIndefinido"];
			$txtNumTBeneficiosAdicionalesAEmpleadosConContratoIndefinido = $_POST["txtNumTBeneficiosAdicionalesAEmpleadosConContratoIndefinido"];	
			$txtNumTEmpleadosLaboranMasDeAnio = $_POST["txtNumTEmpleadosLaboranMasDeAnio"];	
			$txtNumTEmpleadasEmbarazadas = $_POST["txtNumTEmpleadasEmbarazadas"];
			$txtNumTEmpleadosConPermisoPaternidad = $_POST["txtNumTEmpleadosConPermisoPaternidad"];	
			$txtNumTEmpleadasReincorporadasPorMaternidad = $_POST["txtNumTEmpleadasReincorporadasPorMaternidad"];
			$txtNumTEmpleadasConPermisoMaternidad = $_POST["txtNumTEmpleadasConPermisoMaternidad"];
			$txtNumTEmpleadosReincorporadosPorPaternidad = $_POST["txtNumTEmpleadosReincorporadosPorPaternidad"];
			$txtNumTEmpleadosReincorporadosFueraDeTiempoEstablecido = $_POST["txtNumTEmpleadosReincorporadosFueraDeTiempoEstablecido"];	
			$txtNumTEmpleadosReincorporadosATiempoEstablecido = $_POST["txtNumTEmpleadosReincorporadosATiempoEstablecido"];	
			$txtNumTEmpleadasReincorporadasFueraDeTiempoEstablecido = $_POST["txtNumTEmpleadasReincorporadasFueraDeTiempoEstablecido"];	
			$txtNumTEmpleadasReincorporadasATiempoEstablecido = $_POST["txtNumTEmpleadasReincorporadasATiempoEstablecido"];
			$txtNumTEmpleadosAJornadaCompleta = $_POST["txtNumTEmpleadosAJornadaCompleta"];	
			$txtNumTEmpleadosAJornadaParcial = $_POST["txtNumTEmpleadosAJornadaParcial"];
			$txtNumTHorasSuplementariasTrabajadas = $_POST["txtNumTHorasSuplementariasTrabajadas"];	
			$txtNumTHorasExtrasTrabajadas = $_POST["txtNumTHorasExtrasTrabajadas"];	
			$txtNumTProductosDefectuososRechazados = $_POST["txtNumTProductosDefectuososRechazados"];	
			$txtNumTProductosRecibidos = $_POST["txtNumTProductosRecibidos"];	
			$txtNumTSancionesMonetarias = $_POST["txtNumTSancionesMonetarias"];	
			$txtNumTHorasLaboradasPorDiaEmpleados = $_POST["txtNumTHorasLaboradasPorDiaEmpleados"];
			$txtNumTSesionesDeConsejosEstablecidasPorLey = $_POST["txtNumTSesionesDeConsejosEstablecidasPorLey"];
			$txtPeriodo = $_POST["txtPeriodo"];
			$txtFechaSistema = date("Y-m-d H:i:s", $tiempo);		
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($_POST["accion"] == "Editar"){
				$updateDGASC = array(					
					'NumTDemandasAdministrativasAtendidas' => $txtNumTDemandasAdministrativasAtendidas,
					'NumTDemandasAdministrativas' => $txtNumTDemandasAdministrativas,
					'NumTProductosServiciosEntregadosAClientes' => $txtNumTProductosServiciosEntregadosAClientes,
					'NumTDenunciasAspectosNoEticosResueltos' => $txtNumTDenunciasAspectosNoEticosResueltos,
					'NumTDenunciasAspectosNoEticos' => $txtNumTDenunciasAspectosNoEticos,
					'NumTCasosDiscriminacion' => $txtNumTCasosDiscriminacion,
					'NumTCasosDiscriminacionResueltos' => $txtNumTCasosDiscriminacionResueltos,
					'NumTProcesosConRiesgosDeCorrupcionAnalizados' => $txtNumTProcesosConRiesgosDeCorrupcionAnalizados,
					'NumTProcesosConRiesgosDeCorrupcionIdentificados' => $txtNumTProcesosConRiesgosDeCorrupcionIdentificados,
					'NumTMedidasAnteIncidentesDeCorrupcion' => $txtNumTMedidasAnteIncidentesDeCorrupcion,
					'NumTIncidentesDeCorrupcionOcurridos' => $txtNumTIncidentesDeCorrupcionOcurridos,
					'NumTDiasDestinadosAEducacionFamiliar' => $txtNumTDiasDestinadosAEducacionFamiliar,
					'NumTTransacciones' => $txtNumTTransacciones,
					'NumTProgramasDeReciclaje' => $txtNumTProgramasDeReciclaje,
					'NumTComprobantesEmitidos' => $txtNumTComprobantesEmitidos,
					'NumTComprobantesElectronicosEmitidos' => $txtNumTComprobantesElectronicosEmitidos,
					'NumTBateriasSanitariasPorDepartamentos' => $txtNumTBateriasSanitarias,
					'NumTBeneficiosAdicionalesAEmpleadosConContratoNoIndefinido' => $txtNumTBeneficiosAdicionalesAEmpleadosConContratoNoIndefinido,
					'NumTBeneficiosAdicionalesAEmpleadosConContratoIndefinido' => $txtNumTBeneficiosAdicionalesAEmpleadosConContratoIndefinido,
					'NumTEmpleadosLaboranMasDeAnio' => $txtNumTEmpleadosLaboranMasDeAnio,
					'NumTEmpleadasEmbarazadas' => $txtNumTEmpleadasEmbarazadas,
					'NumTEmpleadosConPermisoPaternidad' => $txtNumTEmpleadosConPermisoPaternidad,
					'NumTEmpleadasReincorporadasPorMaternidad' => $txtNumTEmpleadasReincorporadasPorMaternidad,
					'NumTEmpleadasConPermisoMaternidad' => $txtNumTEmpleadasConPermisoMaternidad,
					'NumTEmpleadosReincorporadosPorPaternidad' => $txtNumTEmpleadosReincorporadosPorPaternidad,
					'NumTEmpleadosReincorporadosFueraDeTiempoEstablecido' => $txtNumTEmpleadosReincorporadosFueraDeTiempoEstablecido,
					'NumTEmpleadosReincorporadosATiempoEstablecido' => $txtNumTEmpleadosReincorporadosATiempoEstablecido,
					'NumTEmpleadasReincorporadasFueraDeTiempoEstablecido' => $txtNumTEmpleadasReincorporadasFueraDeTiempoEstablecido,
					'NumTEmpleadasReincorporadasATiempoEstablecido' => $txtNumTEmpleadasReincorporadasATiempoEstablecido,
					'NumTEmpleadosAJornadaCompleta' => $txtNumTEmpleadosAJornadaCompleta,
					'NumTEmpleadosAJornadaParcial' => $txtNumTEmpleadosAJornadaParcial,
					'NumTHorasSuplementariasTrabajadas' => $txtNumTHorasSuplementariasTrabajadas,
					'NumTHorasExtrasTrabajadas' => $txtNumTHorasExtrasTrabajadas,
					'NumTProductosDefectuososRechazados' => $txtNumTProductosDefectuososRechazados,
					'NumTProductosRecibidos' => $txtNumTProductosRecibidos,
					'NumTSancionesMonetarias' => $txtNumTSancionesMonetarias,
					'NumTHorasLaboradasPorDiaEmpleados' => $txtNumTHorasLaboradasPorDiaEmpleados,
					'NumTSesionesDeConsejosEstablecidasPorLey' => $txtNumTSesionesDeConsejosEstablecidasPorLey,
					'Periodo' => $txtPeriodo,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);				
				if($this->DatosGeneralesAnualSeccC_Modelo->updateDatosGeneralesAnualSeccC($id, $updateDGASC, $IdEmpresaSesion)){
					$mensaje = "El Registro fue modificado con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarDGASC($id,"menu3");				
				}else{
					$mensaje = "El Registro no fue modificado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarDGASC($id,"menu3");
				}
			}else{
				$insertDGASC = array(
					'NumTDemandasAdministrativasAtendidas' => $txtNumTDemandasAdministrativasAtendidas,
					'NumTDemandasAdministrativas' => $txtNumTDemandasAdministrativas,
					'NumTProductosServiciosEntregadosAClientes' => $txtNumTProductosServiciosEntregadosAClientes,
					'NumTDenunciasAspectosNoEticosResueltos' => $txtNumTDenunciasAspectosNoEticosResueltos,
					'NumTDenunciasAspectosNoEticos' => $txtNumTDenunciasAspectosNoEticos,
					'NumTCasosDiscriminacion' => $txtNumTCasosDiscriminacion,
					'NumTCasosDiscriminacionResueltos' => $txtNumTCasosDiscriminacionResueltos,
					'NumTProcesosConRiesgosDeCorrupcionAnalizados' => $txtNumTProcesosConRiesgosDeCorrupcionAnalizados,
					'NumTProcesosConRiesgosDeCorrupcionIdentificados' => $txtNumTProcesosConRiesgosDeCorrupcionIdentificados,
					'NumTMedidasAnteIncidentesDeCorrupcion' => $txtNumTMedidasAnteIncidentesDeCorrupcion,
					'NumTIncidentesDeCorrupcionOcurridos' => $txtNumTIncidentesDeCorrupcionOcurridos,
					'NumTDiasDestinadosAEducacionFamiliar' => $txtNumTDiasDestinadosAEducacionFamiliar,
					'NumTTransacciones' => $txtNumTTransacciones,
					'NumTProgramasDeReciclaje' => $txtNumTProgramasDeReciclaje,
					'NumTComprobantesEmitidos' => $txtNumTComprobantesEmitidos,
					'NumTComprobantesElectronicosEmitidos' => $txtNumTComprobantesElectronicosEmitidos,
					'NumTBateriasSanitariasPorDepartamentos' => $txtNumTBateriasSanitarias,
					'NumTBeneficiosAdicionalesAEmpleadosConContratoNoIndefinido' => $txtNumTBeneficiosAdicionalesAEmpleadosConContratoNoIndefinido,
					'NumTBeneficiosAdicionalesAEmpleadosConContratoIndefinido' => $txtNumTBeneficiosAdicionalesAEmpleadosConContratoIndefinido,
					'NumTEmpleadosLaboranMasDeAnio' => $txtNumTEmpleadosLaboranMasDeAnio,
					'NumTEmpleadasEmbarazadas' => $txtNumTEmpleadasEmbarazadas,
					'NumTEmpleadosConPermisoPaternidad' => $txtNumTEmpleadosConPermisoPaternidad,
					'NumTEmpleadasReincorporadasPorMaternidad' => $txtNumTEmpleadasReincorporadasPorMaternidad,
					'NumTEmpleadasConPermisoMaternidad' => $txtNumTEmpleadasConPermisoMaternidad,
					'NumTEmpleadosReincorporadosPorPaternidad' => $txtNumTEmpleadosReincorporadosPorPaternidad,
					'NumTEmpleadosReincorporadosFueraDeTiempoEstablecido' => $txtNumTEmpleadosReincorporadosFueraDeTiempoEstablecido,
					'NumTEmpleadosReincorporadosATiempoEstablecido' => $txtNumTEmpleadosReincorporadosATiempoEstablecido,
					'NumTEmpleadasReincorporadasFueraDeTiempoEstablecido' => $txtNumTEmpleadasReincorporadasFueraDeTiempoEstablecido,
					'NumTEmpleadasReincorporadasATiempoEstablecido' => $txtNumTEmpleadasReincorporadasATiempoEstablecido,
					'NumTEmpleadosAJornadaCompleta' => $txtNumTEmpleadosAJornadaCompleta,
					'NumTEmpleadosAJornadaParcial' => $txtNumTEmpleadosAJornadaParcial,
					'NumTHorasSuplementariasTrabajadas' => $txtNumTHorasSuplementariasTrabajadas,
					'NumTHorasExtrasTrabajadas' => $txtNumTHorasExtrasTrabajadas,
					'NumTProductosDefectuososRechazados' => $txtNumTProductosDefectuososRechazados,
					'NumTProductosRecibidos' => $txtNumTProductosRecibidos,
					'NumTSancionesMonetarias' => $txtNumTSancionesMonetarias,
					'NumTHorasLaboradasPorDiaEmpleados' => $txtNumTHorasLaboradasPorDiaEmpleados,
					'NumTSesionesDeConsejosEstablecidasPorLey' => $txtNumTSesionesDeConsejosEstablecidasPorLey,
					'Periodo' => $txtPeriodo,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);				
				if($this->DatosGeneralesAnualSeccC_Modelo->insertDatosGeneralesAnualSeccC($insertDGASC)){
					$mensaje = "Datos de la sección C guardados con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarDGA(3);				
				}else{
					$mensaje = "El Registro no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoDGA(3);				
				}
				
			}
		}
	}
	public function eliminarDGASC(){
		$this->load->model('DatosGeneralesAnualSeccC_Modelo'); 		          	
		$id = $_POST["idC"];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->DatosGeneralesAnualSeccC_Modelo->deleteDatosGeneralesAnualSeccC($id, $IdEmpresaSesion); 
	}

	public function editarDGASD($IdDGASD, $idMenu){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa" => "Empresa",
			                     $inicioURL."datosAnuales" => "Datos Anuales",
			                     $inicioURL."datosAnuales/editarDGA" => "Editar Registro"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('DatosGeneralesAnualSeccD_Modelo');
				$dato['datoDGASD'] = $this->DatosGeneralesAnualSeccD_Modelo->getDatosGeneralesAnualSeccD($IdDGASD, $IdEmpresaSesion);
				$dato["admin"] = 1;
				$dato["seleccionado"] = 4;
				$dato["titulo"] = "Editar Sección D";   
				$dato["accion"] = "Editar";	
				$dato["idBaseData"] = $idMenu;
				$dato["contenedor"] = "datosAnuales/datosAnuales_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisosSeccionA"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "seccionA", $IdEmpresaSesion);
				$dato["permisosSeccionB"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "seccionB", $IdEmpresaSesion);
				$dato["permisosSeccionC"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "seccionC", $IdEmpresaSesion);
				$dato["permisosSeccionD"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "seccionD", $IdEmpresaSesion);
				$dato["permisosSeccionE"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "seccionE", $IdEmpresaSesion);
				$dato["permisosSeccionF"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "seccionF", $IdEmpresaSesion);
				if (!empty($dato["permisosSeccionD"])){
					if ($dato["permisosSeccionD"][0]->Actualizar == 1 OR $dato["permisosSeccionD"][0]->Ver == 1) {
						$this->load->model('DatosGeneralesAnualSeccD_Modelo');
						$dato['datoDGASD'] = $this->DatosGeneralesAnualSeccD_Modelo->getDatosGeneralesAnualSeccD($IdDGASD, $IdEmpresaSesion);
						$dato["seleccionado"] = 4;
						$dato["titulo"] = "Editar Sección D";   
						$dato["accion"] = "Editar";	
						$dato["contenedor"] = "datosAnuales/datosAnuales_edit";
						$this->load->view('plantilla', $dato);
					}else{
						echo '<script type="text/javascript">  alert("No cuenta con el permiso"); </script>';
						$this->editarDGA();
					}
				}else{
					$this->editarDGA();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function guardarDGASD(){
		// $this->form_validation->set_rules('txtSaldoT10MayoresDepositantes','Saldo 10 mayores depositantes','trim|required|numeric');	
		// $this->form_validation->set_rules('txtValorTDepositoALaVista','Valor Depósitos a la vista','trim|required|numeric');	
		// $this->form_validation->set_rules('txtValorTDepositoAplazo','Valor depósitos a plazo','trim|required|numeric');	
		// $this->form_validation->set_rules('txtMontoTInvertidoEnInfraestructura','Monto invertido en  infraestructura','trim|required|numeric');	
		// $this->form_validation->set_rules('txtValorTIngresosOperacionales','Ingresos operacionales ','trim|required|numeric');
		// $this->form_validation->set_rules('txtValorTIngresos','Total ingresos','trim|required|numeric');	
		// $this->form_validation->set_rules('txtValorTIngresosPorVentaDeActivosFijos','Ingresos por venta de activos fijos','trim|required|numeric');	
		// $this->form_validation->set_rules('txtValorTVentas','Total Ventas en el periodo','trim|required|numeric');
		// $this->form_validation->set_rules('txtValorTIngresosPorIntereses','Total ingresos por intereses','trim|required|numeric');	
		// $this->form_validation->set_rules('txtVentasACreditos','Ventas a crédito','trim|required|numeric');
		// $this->form_validation->set_rules('txtValorTVentasAContado','Ventas a contado','trim|required|numeric');
		// $this->form_validation->set_rules('txtValorTMargenFinanciero','Margen Financiero','trim|required|numeric');	
		// $this->form_validation->set_rules('txtValorTGastosOperacionales','Gastos Operacionales','trim|required|numeric');	
		// $this->form_validation->set_rules('txtValorTGastosNoOperacionales','Total gastos no operacionales del periodo','trim|required|numeric');	
		// $this->form_validation->set_rules('txtValorTSueldosYSalarios','Gastos sueldos y salarios','trim|required|numeric');
		// $this->form_validation->set_rules('txtMontoTCreditoConsumoSocios','Monto de créditos de consumo socios','trim|required|numeric');	
		// $this->form_validation->set_rules('txtMontoTCreditos','Monto total de créditos otorgados ','trim|required|numeric');	
		// $this->form_validation->set_rules('txtMontoTCreditoViviendaSocios','Monto de créditos de vivienda socios ','trim|required|numeric');	
		// $this->form_validation->set_rules('txtMontoTCreditoMicrocreditoSocios','Monto de microcréditos socios','trim|required|numeric');	
		// $this->form_validation->set_rules('txtMontoTCreditoComercialSocios','Monto de créditos comercial socios','trim|required|numeric');
		// $this->form_validation->set_rules('txtMontoTCreditoInmobiliarioSocios','Monto de créditos inmobiliario  socios','trim|required|numeric');	
		// $this->form_validation->set_rules('txtValorTCarteraCredito','Valor de Cartera de crédito','trim|required|numeric');	
		// $this->form_validation->set_rules('txtSaldoTCarteraCreditoParaNecesidadSocial','Saldo de cartera de crédito para necesidades sociales','trim|required|numeric');	
		// $this->form_validation->set_rules('txtSaldoTCarteraCreditoParaNecesidadProductiva','Saldo de cartera de crédito para necesidades productivas','trim|required|numeric');	
		// $this->form_validation->set_rules('txtValorTCarteraVencida','Cartera vencida','trim|required|numeric');
		// $this->form_validation->set_rules('txtValorTEndeudamientoExterno','Endeudamiento externo (Obligaciones con Instituciones Financieras sector público, privado o del exterior)','trim|required|numeric');	
		// $this->form_validation->set_rules('txtMontoTComprasAContado','Monto de las compras a contado','trim|required|numeric');	
		// //$this->form_validation->set_rules('txtNumTComprasEfectuadas','Total compras efectuadas','trim|required|numeric');
		// $this->form_validation->set_rules('txtMontoTComprasACredito','Monto de las compras a crédito','trim|required|numeric');	
		// $this->form_validation->set_rules('txtMontoTComprasAProveedoresLocales','Monto de compras a proveedores locales','trim|required|numeric');
		// $this->form_validation->set_rules('txtMontoTComprasAProveedoresInternacionales','Monto de compras a proveedores internacionales ','trim|required|numeric');	
		// $this->form_validation->set_rules('txtMontoTComprasAAsociaciones','Compras a asociaciones','trim|required|numeric');	
		// $this->form_validation->set_rules('txtPresupuestoAdquisicionesDestinadasAProveedoresLocales','Presupuesto para adquisiciones de operac. significativas proveedores locales','trim|required|numeric');	
		// $this->form_validation->set_rules('txtValorTPresupuestoAdquisicion','Total presupuesto para adquisiciones','trim|required|numeric');	
		// $this->form_validation->set_rules('txtValorTSancionesPorOrganismosDeControl','Valor por sanciones impuestos por los organismos de control','trim|required|numeric');
		// $this->form_validation->set_rules('txtValorTPagadoPorIVA','Valor por IVA Pagado en el periodo ','trim|required|numeric');	
		// $this->form_validation->set_rules('txtValorTContribucionesAlEstado','Total contribuciones al Estado','trim|required|numeric');	
		// $this->form_validation->set_rules('txtValorTPagadoPorRetenciones','Valor pagado por retenciones en el periodo','trim|required|numeric');	
		// $this->form_validation->set_rules('txtValorTPagadoPorImpuestoALaRenta','Valor pagado del Impuesto a la Renta en el periodo','trim|required|numeric');	
		// $this->form_validation->set_rules('txtValorTSubvencionesGubernamentales','Valor de subvenciones gubernamentales','trim|required|numeric');
		// $this->form_validation->set_rules('txtValorTCaptacionProcedenteCOAC','Valor Total Captaciones','trim|required|numeric');
		// $this->form_validation->set_rules('txtValorTCaptaciones','Valor Total Captaciones','trim|required|numeric');
		$this->form_validation->set_rules('txtPeriodo','Periodo de la sección D','trim|required|integer');
		if ($this->form_validation->run() == false) {
			if ($_POST["accion"] == "Editar"){
				$this->editarDGASD($_POST["id"],"menu4");
			}else{
				$this->nuevoDGA(4);				
			}
		}else{
			$this->load->model('DatosGeneralesAnualSeccD_Modelo');
			$id = $_POST["id"];	
			$tiempo = time();
			$txtSaldoT10MayoresDepositantes = $_POST["txtSaldoT10MayoresDepositantes"];
			$txtValorTDepositoALaVista = $_POST["txtValorTDepositoALaVista"];
			$txtValorTDepositoAplazo = $_POST["txtValorTDepositoAplazo"];
			$txtMontoTInvertidoEnInfraestructura = $_POST["txtMontoTInvertidoEnInfraestructura"];
			$txtValorTIngresosOperacionales = $_POST["txtValorTIngresosOperacionales"];
			$txtValorTIngresos = $_POST["txtValorTIngresos"];
			$txtValorTIngresosPorVentaDeActivosFijos = $_POST["txtValorTIngresosPorVentaDeActivosFijos"];
			$txtValorTVentas = $_POST["txtValorTVentas"];
			$txtValorTIngresosPorIntereses = $_POST["txtValorTIngresosPorIntereses"];
			$txtVentasACreditos = $_POST["txtVentasACreditos"];
			$txtValorTVentasAContado = $_POST["txtValorTVentasAContado"];
			$txtValorTMargenFinanciero = $_POST["txtValorTMargenFinanciero"];
			$txtValorTGastosOperacionales = $_POST["txtValorTGastosOperacionales"];
			$txtValorTGastosNoOperacionales = $_POST["txtValorTGastosNoOperacionales"];
			$txtValorTSueldosYSalarios = $_POST["txtValorTSueldosYSalarios"];
			$txtMontoTCreditoConsumoSocios = $_POST["txtMontoTCreditoConsumoSocios"];
			$txtMontoTCreditos = $_POST["txtMontoTCreditos"];
			$txtMontoTCreditoViviendaSocios = $_POST["txtMontoTCreditoViviendaSocios"];
			$txtMontoTCreditoMicrocreditoSocios = $_POST["txtMontoTCreditoMicrocreditoSocios"];
			$txtMontoTCreditoComercialSocios = $_POST["txtMontoTCreditoComercialSocios"];
			$txtMontoTCreditoInmobiliarioSocios = $_POST["txtMontoTCreditoInmobiliarioSocios"];
			$txtValorTCarteraCredito = $_POST["txtValorTCarteraCredito"];
			$txtSaldoTCarteraCreditoParaNecesidadSocial = $_POST["txtSaldoTCarteraCreditoParaNecesidadSocial"];
			$txtSaldoTCarteraCreditoParaNecesidadProductiva = $_POST["txtSaldoTCarteraCreditoParaNecesidadProductiva"];
			$txtValorTCarteraVencida = $_POST["txtValorTCarteraVencida"];
			$txtValorTEndeudamientoExterno = $_POST["txtValorTEndeudamientoExterno"];
			$txtMontoTComprasAContado = $_POST["txtMontoTComprasAContado"];
			//$txtNumTComprasEfectuadas = $_POST["txtNumTComprasEfectuadas"];
			$txtMontoTComprasACredito = $_POST["txtMontoTComprasACredito"];
			$txtMontoTComprasAProveedoresLocales = $_POST["txtMontoTComprasAProveedoresLocales"];
			$txtMontoTComprasAProveedoresInternacionales = $_POST["txtMontoTComprasAProveedoresInternacionales"];
			$txtMontoTComprasAAsociaciones = $_POST["txtMontoTComprasAAsociaciones"];
			$txtPresupuestoAdquisicionesDestinadasAProveedoresLocales = $_POST["txtPresupuestoAdquisicionesDestinadasAProveedoresLocales"];
			$txtValorTPresupuestoAdquisicion = $_POST["txtValorTPresupuestoAdquisicion"];
			$txtValorTSancionesPorOrganismosDeControl = $_POST["txtValorTSancionesPorOrganismosDeControl"];
			$txtValorTPagadoPorIVA = $_POST["txtValorTPagadoPorIVA"];
			$txtValorTContribucionesAlEstado = $_POST["txtValorTContribucionesAlEstado"];
			$txtValorTPagadoPorRetenciones = $_POST["txtValorTPagadoPorRetenciones"];
			$txtValorTPagadoPorImpuestoALaRenta = $_POST["txtValorTPagadoPorImpuestoALaRenta"];
			$txtValorTSubvencionesGubernamentales = $_POST["txtValorTSubvencionesGubernamentales"];
			$txtValorTCaptacionProcedenteCOAC = $_POST["txtValorTCaptacionProcedenteCOAC"];
			$txtValorTCaptaciones = $_POST["txtValorTCaptaciones"];
			$txtPeriodo = $_POST["txtPeriodo"];
			$txtFechaSistema = date("Y-m-d H:i:s", $tiempo);		
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($_POST["accion"] == "Editar"){
				$updateDGASD = array(					
					'SaldoT10MayoresDepositantes' => $txtSaldoT10MayoresDepositantes,
					'ValorTDepositoALaVista' => $txtValorTDepositoALaVista,
					'ValorTDepositoAplazo' => $txtValorTDepositoAplazo,
					'MontoTInvertidoEnInfraestructura' => $txtMontoTInvertidoEnInfraestructura,
					'ValorTIngresosOperacionales' => $txtValorTIngresosOperacionales,
					'ValorTIngresos' => $txtValorTIngresos,
					'ValorTIngresosPorVentaDeActivosFijos' => $txtValorTIngresosPorVentaDeActivosFijos,
					'ValorTVentas' => $txtValorTVentas,
					'ValorTIngresosPorIntereses' => $txtValorTIngresosPorIntereses,
					'VentasACreditos' => $txtVentasACreditos,
					'ValorTVentasAContado' => $txtValorTVentasAContado,
					'ValorTMargenFinanciero' => $txtValorTMargenFinanciero,
					'ValorTGastosOperacionales' => $txtValorTGastosOperacionales,
					'ValorTGastosNoOperacionales' => $txtValorTGastosNoOperacionales,
					'ValorTSueldosYSalarios' => $txtValorTSueldosYSalarios,
					'MontoTCreditoConsumoSocios' => $txtMontoTCreditoConsumoSocios,
					'MontoTCreditos' => $txtMontoTCreditos,
					'MontoTCreditoViviendaSocios' => $txtMontoTCreditoViviendaSocios,
					'MontoTCreditoMicrocreditoSocios' => $txtMontoTCreditoMicrocreditoSocios,
					'MontoTCreditoComercialSocios' => $txtMontoTCreditoComercialSocios,
					'MontoTCreditoInmobiliarioSocios' => $txtMontoTCreditoInmobiliarioSocios,
					'ValorTCarteraCredito' => $txtValorTCarteraCredito,
					'SaldoTCarteraCreditoParaNecesidadSocial' => $txtSaldoTCarteraCreditoParaNecesidadSocial,
					'SaldoTCarteraCreditoParaNecesidadProductiva' => $txtSaldoTCarteraCreditoParaNecesidadProductiva,
					'ValorTCarteraVencida' => $txtValorTCarteraVencida,
					'ValorTEndeudamientoExterno' => $txtValorTEndeudamientoExterno,
					'MontoTComprasAContado' => $txtMontoTComprasAContado,
					//'NumTComprasEfectuadas' => $txtNumTComprasEfectuadas,
					'MontoTComprasACredito' => $txtMontoTComprasACredito,
					'MontoTComprasAProveedoresLocales' => $txtMontoTComprasAProveedoresLocales,
					'MontoTComprasAProveedoresInternacionales' => $txtMontoTComprasAProveedoresInternacionales,
					'MontoTComprasAAsociaciones' => $txtMontoTComprasAAsociaciones,
					'PresupuestoAdquisicionesDestinadasAProveedoresLocales' => $txtPresupuestoAdquisicionesDestinadasAProveedoresLocales,
					'ValorTPresupuestoAdquisicion' => $txtValorTPresupuestoAdquisicion,
					'ValorTSancionesPorOrganismosDeControl' => $txtValorTSancionesPorOrganismosDeControl,
					'ValorTPagadoPorIVA' => $txtValorTPagadoPorIVA,
					'ValorTContribucionesAlEstado' => $txtValorTContribucionesAlEstado,
					'ValorTPagadoPorRetenciones' => $txtValorTPagadoPorRetenciones,
					'ValorTPagadoPorImpuestoALaRenta' => $txtValorTPagadoPorImpuestoALaRenta,
					'ValorTSubvencionesGubernamentales' => $txtValorTSubvencionesGubernamentales,		
					'ValorTCaptacionProcedenteCOAC' => $txtValorTCaptacionProcedenteCOAC,		
					'ValorTCaptaciones' => $txtValorTCaptaciones,		
					'Periodo' => $txtPeriodo,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->DatosGeneralesAnualSeccD_Modelo->updateDatosGeneralesAnualSeccD($id, $updateDGASD, $IdEmpresaSesion)){
					$mensaje = "El Registro fue modificado con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarDGASD($id,"menu4");				
				}else{
					$mensaje = "El Registro no fue modificado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarDGASD($id,"menu4");				
				}
			}else{
				$insertDGASD = array(
					'SaldoT10MayoresDepositantes' => $txtSaldoT10MayoresDepositantes,
					'ValorTDepositoALaVista' => $txtValorTDepositoALaVista,
					'ValorTDepositoAplazo' => $txtValorTDepositoAplazo,
					'MontoTInvertidoEnInfraestructura' => $txtMontoTInvertidoEnInfraestructura,
					'ValorTIngresosOperacionales' => $txtValorTIngresosOperacionales,
					'ValorTIngresos' => $txtValorTIngresos,
					'ValorTIngresosPorVentaDeActivosFijos' => $txtValorTIngresosPorVentaDeActivosFijos,
					'ValorTVentas' => $txtValorTVentas,
					'ValorTIngresosPorIntereses' => $txtValorTIngresosPorIntereses,
					'VentasACreditos' => $txtVentasACreditos,
					'ValorTVentasAContado' => $txtValorTVentasAContado,
					'ValorTMargenFinanciero' => $txtValorTMargenFinanciero,
					'ValorTGastosOperacionales' => $txtValorTGastosOperacionales,
					'ValorTGastosNoOperacionales' => $txtValorTGastosNoOperacionales,
					'ValorTSueldosYSalarios' => $txtValorTSueldosYSalarios,
					'MontoTCreditoConsumoSocios' => $txtMontoTCreditoConsumoSocios,
					'MontoTCreditos' => $txtMontoTCreditos,
					'MontoTCreditoViviendaSocios' => $txtMontoTCreditoViviendaSocios,
					'MontoTCreditoMicrocreditoSocios' => $txtMontoTCreditoMicrocreditoSocios,
					'MontoTCreditoComercialSocios' => $txtMontoTCreditoComercialSocios,
					'MontoTCreditoInmobiliarioSocios' => $txtMontoTCreditoInmobiliarioSocios,
					'ValorTCarteraCredito' => $txtValorTCarteraCredito,
					'SaldoTCarteraCreditoParaNecesidadSocial' => $txtSaldoTCarteraCreditoParaNecesidadSocial,
					'SaldoTCarteraCreditoParaNecesidadProductiva' => $txtSaldoTCarteraCreditoParaNecesidadProductiva,
					'ValorTCarteraVencida' => $txtValorTCarteraVencida,
					'ValorTEndeudamientoExterno' => $txtValorTEndeudamientoExterno,
					'MontoTComprasAContado' => $txtMontoTComprasAContado,
					//'NumTComprasEfectuadas' => $txtNumTComprasEfectuadas,
					'MontoTComprasACredito' => $txtMontoTComprasACredito,
					'MontoTComprasAProveedoresLocales' => $txtMontoTComprasAProveedoresLocales,
					'MontoTComprasAProveedoresInternacionales' => $txtMontoTComprasAProveedoresInternacionales,
					'MontoTComprasAAsociaciones' => $txtMontoTComprasAAsociaciones,
					'PresupuestoAdquisicionesDestinadasAProveedoresLocales' => $txtPresupuestoAdquisicionesDestinadasAProveedoresLocales,
					'ValorTPresupuestoAdquisicion' => $txtValorTPresupuestoAdquisicion,
					'ValorTSancionesPorOrganismosDeControl' => $txtValorTSancionesPorOrganismosDeControl,
					'ValorTPagadoPorIVA' => $txtValorTPagadoPorIVA,
					'ValorTContribucionesAlEstado' => $txtValorTContribucionesAlEstado,
					'ValorTPagadoPorRetenciones' => $txtValorTPagadoPorRetenciones,
					'ValorTPagadoPorImpuestoALaRenta' => $txtValorTPagadoPorImpuestoALaRenta,
					'ValorTSubvencionesGubernamentales' => $txtValorTSubvencionesGubernamentales,
					'ValorTCaptacionProcedenteCOAC' => $txtValorTCaptacionProcedenteCOAC,
					'ValorTCaptaciones' => $txtValorTCaptaciones,
					'Periodo' => $txtPeriodo,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->DatosGeneralesAnualSeccD_Modelo->insertDatosGeneralesAnualSeccD($insertDGASD)){
					$mensaje = "Datos de la sección D guardados con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarDGA(4);				
				}else{
					$mensaje = "El Registro no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoDGA(4);				
				}
				
			}
		}
	}
	public function eliminarDGASD(){
		$this->load->model('DatosGeneralesAnualSeccD_Modelo'); 		          	
		$id = $_POST["idD"];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->DatosGeneralesAnualSeccD_Modelo->deleteDatosGeneralesAnualSeccD($id, $IdEmpresaSesion); 
	}

	public function editarDGASE($IdDGASE, $idMenu){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa" => "Empresa",
			                     $inicioURL."datosAnuales" => "Datos Anuales",
			                     $inicioURL."datosAnuales/editarDGA" => "Editar Registro"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$this->load->model('DatosGeneralesAnualSeccE_Modelo');$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$dato['datoDGASE'] = $this->DatosGeneralesAnualSeccE_Modelo->getDatosGeneralesAnualSeccE($IdDGASE, $IdEmpresaSesion);
				$dato["admin"] = 1;
				$dato["seleccionado"] = 5;
				$dato["titulo"] = "Editar Sección E";   
				$dato["accion"] = "Editar";	
				$dato["idBaseData"] = $idMenu;
				$dato["contenedor"] = "datosAnuales/datosAnuales_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisosSeccionA"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "seccionA", $IdEmpresaSesion);
				$dato["permisosSeccionB"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "seccionB", $IdEmpresaSesion);
				$dato["permisosSeccionC"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "seccionC", $IdEmpresaSesion);
				$dato["permisosSeccionD"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "seccionD", $IdEmpresaSesion);
				$dato["permisosSeccionE"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "seccionE", $IdEmpresaSesion);
				$dato["permisosSeccionF"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "seccionF", $IdEmpresaSesion);
				if (!empty($dato["permisosSeccionE"])){
					if ($dato["permisosSeccionE"][0]->Actualizar == 1 OR $dato["permisosSeccionE"][0]->Ver == 1) {
						$dato['datoDGASE'] = $this->DatosGeneralesAnualSeccE_Modelo->getDatosGeneralesAnualSeccE($IdDGASE, $IdEmpresaSesion);
						$dato["seleccionado"] = 5;
						$dato["titulo"] = "Editar Sección E";   
						$dato["accion"] = "Editar";	
						$dato["contenedor"] = "datosAnuales/datosAnuales_edit";
						$this->load->view('plantilla', $dato);
					}else{
						echo '<script type="text/javascript">  alert("No cuenta con el permiso"); </script>';
						$this->editarDGA();
					}
				}else{
					$this->editarDGA();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function guardarDGASE(){
		$this->form_validation->set_rules('txtPeriodo','Periodo de la sección E','trim|required|integer');
		if ($this->form_validation->run() == false) {
			if ($_POST["accion"] == "Editar"){
				$this->editarDGASE($_POST["id"],"menu5");
			}else{
				$this->nuevoDGA(5);				
			}
		}else{
			$this->load->model('DatosGeneralesAnualSeccE_Modelo');
			$id = $_POST["id"];
			$tiempo = time();
			$txtMontoTGastoEnInformarSobreAsambleas = $_POST["txtMontoTGastoEnInformarSobreAsambleas"];
			$txtGastoTotalDeOrganizacion = $_POST["txtGastoTotalDeOrganizacion"];
			$txtMontoTGastoEnInformarSobreConsejoAdministracion = $_POST["txtMontoTGastoEnInformarSobreConsejoAdministracion"];
			$txtMontoTGastoEnInformarSobreOtraInformacion = $_POST["txtMontoTGastoEnInformarSobreOtraInformacion"];
			$txtValorTActivos = $_POST["txtValorTActivos"];
			$txtCostoComprobanteVentaRetencionAntesFacturacionElectronica = $_POST["txtCostoComprobanteVentaRetencionAntesFacturacionElectronica"];
			$txtCostoComprobanteVentaRetencionDespuesFacturaElectronica = $_POST["txtCostoComprobanteVentaRetencionDespuesFacturaElectronica"];
			$txtGastoTGasolinaEnEnvioProductosServicios = $_POST["txtGastoTGasolinaEnEnvioProductosServicios"];
			$txtGastoTMultasNormasAmbientales = $_POST["txtGastoTMultasNormasAmbientales"];
			$txtGastoTEquipamiento = $_POST["txtGastoTEquipamiento"];
			$txtGastoTAsignadoAEliminarResiduo = $_POST["txtGastoTAsignadoAEliminarResiduo"];
			$txtGastoTLimpieza = $_POST["txtGastoTLimpieza"];
			$txtValorTAportacionEmpleados = $_POST["txtValorTAportacionEmpleados"];
			$txtValorTAportacionPatrono = $_POST["txtValorTAportacionPatrono"];
			$txtValorTAportaciones = $_POST["txtValorTAportaciones"];
			$txtValorTAportesAEmpleadosAJornadaCompleta = $_POST["txtValorTAportesAEmpleadosAJornadaCompleta"];
			$txtValorTPagadoAEmpleadosPorVacacionesNoTomadasEnMenosDeAnio = $_POST["txtValorTPagadoAEmpleadosPorVacacionesNoTomadasEnMenosDeAnio"];
			$txtValorTPagadoPorVacaciones = $_POST["txtValorTPagadoPorVacaciones"];
			$txtValorTPagadoDecimoTercero = $_POST["txtValorTPagadoDecimoTercero"];
			$txtValorTProvisionAnio = $_POST["txtValorTProvisionAnio"];
			$txtValorTPorPagarProvisionDecimoTercero = $_POST["txtValorTPorPagarProvisionDecimoTercero"];
			$txtValorTPagadoDecimoCuarto = $_POST["txtValorTPagadoDecimoCuarto"];
			$txtValorTFondoReservaPagadoMensual = $_POST["txtValorTFondoReservaPagadoMensual"];
			$txtValorTFondoReserva = $_POST["txtValorTFondoReserva"];
			$txtValorTPasivos = $_POST["txtValorTPasivos"];
			$txtValorTPatrimonio = $_POST["txtValorTPatrimonio"];
			//$txtValorTCapitalSocialAnioAterior = $_POST["txtValorTCapitalSocialAnioAterior"];
			$txtValorTCapitalSocial = $_POST["txtValorTCapitalSocial"];
			$txtValorTPatrimonioTecnicoConstituido = $_POST["txtValorTPatrimonioTecnicoConstituido"];
			$txtValorTPatrimonioTecnicoRequerido = $_POST["txtValorTPatrimonioTecnicoRequerido"];
			$txtUtilidadTEjercicio = $_POST["txtUtilidadTEjercicio"];
			$txtValorTReservaLegal = $_POST["txtValorTReservaLegal"];
			$txtValorTReserva = $_POST["txtValorTReserva"];
			$txtValorTActivosCorriente = $_POST["txtValorTActivosCorriente"];
			$txtValorTPasivosCorriente = $_POST["txtValorTPasivosCorriente"];
			$txtValorTAtribuidoAlEstadoPorOrganismosDeControl = $_POST["txtValorTAtribuidoAlEstadoPorOrganismosDeControl"];
			$txtPeriodo = $_POST["txtPeriodo"];
			$txtFechaSistema = date("Y-m-d H:i:s", $tiempo);		
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($_POST["accion"] == "Editar"){
				$updateDGASE = array(					
					'MontoTGastoEnInformarSobreAsambleas' => $txtMontoTGastoEnInformarSobreAsambleas,
					'GastoTotalDeOrganizacion' => $txtGastoTotalDeOrganizacion,
					'MontoTGastoEnInformarSobreConsejoAdministracion' => $txtMontoTGastoEnInformarSobreConsejoAdministracion,
					'MontoTGastoEnInformarSobreOtraInformacion' => $txtMontoTGastoEnInformarSobreOtraInformacion,
					'ValorTActivos' => $txtValorTActivos,
					'CostoComprobanteVentaRetencionAntesFacturacionElectronica' => $txtCostoComprobanteVentaRetencionAntesFacturacionElectronica,
					'CostoComprobanteVentaRetencionDespuesFacturaElectronica' => $txtCostoComprobanteVentaRetencionDespuesFacturaElectronica,
					'GastoTGasolinaEnEnvioProductosServicios' => $txtGastoTGasolinaEnEnvioProductosServicios,
					'GastoTMultasNormasAmbientales' => $txtGastoTMultasNormasAmbientales,
					'GastoTEquipamiento' => $txtGastoTEquipamiento,
					'GastoTAsignadoAEliminarResiduo' => $txtGastoTAsignadoAEliminarResiduo,
					'GastoTLimpieza' => $txtGastoTLimpieza,
					'ValorTAportacionEmpleados' => $txtValorTAportacionEmpleados,
					'ValorTAportacionPatrono' => $txtValorTAportacionPatrono,
					'ValorTAportaciones' => $txtValorTAportaciones,
					'ValorTAportesAEmpleadosAJornadaCompleta' => $txtValorTAportesAEmpleadosAJornadaCompleta,
					'ValorTPagadoAEmpleadosPorVacacionesNoTomadasEnMenosDeAnio' => $txtValorTPagadoAEmpleadosPorVacacionesNoTomadasEnMenosDeAnio,
					'ValorTPagadoPorVacaciones' => $txtValorTPagadoPorVacaciones,
					'ValorTPagadoDecimoTercero' => $txtValorTPagadoDecimoTercero,
					'ValorTProvisionAnio' => $txtValorTProvisionAnio,
					'ValorTPorPagarProvisionDecimoTercero' => $txtValorTPorPagarProvisionDecimoTercero,
					'ValorTPagadoDecimoCuarto' => $txtValorTPagadoDecimoCuarto,
					'ValorTFondoReservaPagadoMensual' => $txtValorTFondoReservaPagadoMensual,
					'ValorTFondoReserva' => $txtValorTFondoReserva,
					'ValorTPasivos' => $txtValorTPasivos,
					'ValorTPatrimonio' => $txtValorTPatrimonio,
					//'ValorTCapitalSocialAnioAterior' => $txtValorTCapitalSocialAnioAterior,
					'ValorTCapitalSocial' => $txtValorTCapitalSocial,
					'ValorTPatrimonioTecnicoConstituido' => $txtValorTPatrimonioTecnicoConstituido,
					'ValorTPatrimonioTecnicoRequerido' => $txtValorTPatrimonioTecnicoRequerido,
					'UtilidadTEjercicio' => $txtUtilidadTEjercicio,
					'ValorTReservaLegal' => $txtValorTReservaLegal,
					'ValorTReserva' => $txtValorTReserva,
					'ValorTActivosCorriente' => $txtValorTActivosCorriente,
					'ValorTPasivosCorriente' => $txtValorTPasivosCorriente,
					'ValorTAtribuidoAlEstadoPorOrganismosDeControl' => $txtValorTAtribuidoAlEstadoPorOrganismosDeControl,
					'Periodo' => $txtPeriodo,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->DatosGeneralesAnualSeccE_Modelo->updateDatosGeneralesAnualSeccE($id, $updateDGASE, $IdEmpresaSesion)){
					$mensaje = "El Registro fue modificado con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarDGASE($id,"menu5");
				}else{
					$mensaje = "El Registro no fue modificado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarDGASE($id,"menu5");				
				}
			}else{
				$insertDGASE = array(
					'MontoTGastoEnInformarSobreAsambleas' => $txtMontoTGastoEnInformarSobreAsambleas,
					'GastoTotalDeOrganizacion' => $txtGastoTotalDeOrganizacion,
					'MontoTGastoEnInformarSobreConsejoAdministracion' => $txtMontoTGastoEnInformarSobreConsejoAdministracion,					
					'MontoTGastoEnInformarSobreOtraInformacion' => $txtMontoTGastoEnInformarSobreOtraInformacion,
					'ValorTActivos' => $txtValorTActivos,
					'CostoComprobanteVentaRetencionAntesFacturacionElectronica' => $txtCostoComprobanteVentaRetencionAntesFacturacionElectronica,
					'CostoComprobanteVentaRetencionDespuesFacturaElectronica' => $txtCostoComprobanteVentaRetencionDespuesFacturaElectronica,
					'GastoTGasolinaEnEnvioProductosServicios' => $txtGastoTGasolinaEnEnvioProductosServicios,
					'GastoTMultasNormasAmbientales' => $txtGastoTMultasNormasAmbientales,
					'GastoTEquipamiento' => $txtGastoTEquipamiento,
					'GastoTAsignadoAEliminarResiduo' => $txtGastoTAsignadoAEliminarResiduo,
					'GastoTLimpieza' => $txtGastoTLimpieza,
					'ValorTAportacionEmpleados' => $txtValorTAportacionEmpleados,
					'ValorTAportacionPatrono' => $txtValorTAportacionPatrono,
					'ValorTAportaciones' => $txtValorTAportaciones,
					'ValorTAportesAEmpleadosAJornadaCompleta' => $txtValorTAportesAEmpleadosAJornadaCompleta,
					'ValorTPagadoAEmpleadosPorVacacionesNoTomadasEnMenosDeAnio' => $txtValorTPagadoAEmpleadosPorVacacionesNoTomadasEnMenosDeAnio,
					'ValorTPagadoPorVacaciones' => $txtValorTPagadoPorVacaciones,
					'ValorTPagadoDecimoTercero' => $txtValorTPagadoDecimoTercero,
					'ValorTProvisionAnio' => $txtValorTProvisionAnio,
					'ValorTPorPagarProvisionDecimoTercero' => $txtValorTPorPagarProvisionDecimoTercero,
					'ValorTPagadoDecimoCuarto' => $txtValorTPagadoDecimoCuarto,
					'ValorTFondoReservaPagadoMensual' => $txtValorTFondoReservaPagadoMensual,
					'ValorTFondoReserva' => $txtValorTFondoReserva,
					'ValorTPasivos' => $txtValorTPasivos,
					'ValorTPatrimonio' => $txtValorTPatrimonio,
					//'ValorTCapitalSocialAnioAterior' => $txtValorTCapitalSocialAnioAterior,
					'ValorTCapitalSocial' => $txtValorTCapitalSocial,
					'ValorTPatrimonioTecnicoConstituido' => $txtValorTPatrimonioTecnicoConstituido,
					'ValorTPatrimonioTecnicoRequerido' => $txtValorTPatrimonioTecnicoRequerido,
					'UtilidadTEjercicio' => $txtUtilidadTEjercicio,
					'ValorTReservaLegal' => $txtValorTReservaLegal,
					'ValorTReserva' => $txtValorTReserva,
					'ValorTActivosCorriente' => $txtValorTActivosCorriente,
					'ValorTPasivosCorriente' => $txtValorTPasivosCorriente,
					'ValorTAtribuidoAlEstadoPorOrganismosDeControl' => $txtValorTAtribuidoAlEstadoPorOrganismosDeControl,
					'Periodo' => $txtPeriodo,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->DatosGeneralesAnualSeccE_Modelo->insertDatosGeneralesAnualSeccE($insertDGASE)){
					$mensaje = "Datos de la sección E guardados con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarDGA(5);				
				}else{
					$mensaje = "El Registro no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoDGA(5);				
				}
			}
		}
	}
	public function eliminarDGASE(){
		$this->load->model('DatosGeneralesAnualSeccE_Modelo'); 		          	
		$id = $_POST["idE"];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->DatosGeneralesAnualSeccE_Modelo->deleteDatosGeneralesAnualSeccE($id, $IdEmpresaSesion); 
	}

	public function editarDGASF($IdDGASF, $idMenu){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa" => "Empresa",
			                     $inicioURL."datosAnuales" => "Datos Anuales",
			                     $inicioURL."datosAnuales/editarDGA" => "Editar Registro"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('DatosGeneralesAnualSeccF_Modelo');
				$dato['datoDGASF'] = $this->DatosGeneralesAnualSeccF_Modelo->getDatosGeneralesAnualSeccF($IdDGASF, $IdEmpresaSesion);
				$dato["admin"] = 1;
				$dato["seleccionado"] = 6;
				$dato["titulo"] = "Editar Sección F";   
				$dato["accion"] = "Editar";	
				$dato["idBaseData"] = $idMenu;
				$dato["contenedor"] = "datosAnuales/datosAnuales_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisosSeccionA"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "seccionA", $IdEmpresaSesion);
				$dato["permisosSeccionB"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "seccionB", $IdEmpresaSesion);
				$dato["permisosSeccionC"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "seccionC", $IdEmpresaSesion);
				$dato["permisosSeccionD"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "seccionD", $IdEmpresaSesion);
				$dato["permisosSeccionE"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "seccionE", $IdEmpresaSesion);
				$dato["permisosSeccionF"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "seccionF", $IdEmpresaSesion);
				if (!empty($dato["permisosSeccionF"])){
					if ($dato["permisosSeccionF"][0]->Actualizar == 1 OR $dato["permisosSeccionF"][0]->Ver == 1) {
						$this->load->model('DatosGeneralesAnualSeccF_Modelo');
						$dato['datoDGASF'] = $this->DatosGeneralesAnualSeccF_Modelo->getDatosGeneralesAnualSeccF($IdDGASF, $IdEmpresaSesion);
						$dato["seleccionado"] = 6;
						$dato["titulo"] = "Editar Sección F";   
						$dato["accion"] = "Editar";	
						$dato["contenedor"] = "datosAnuales/datosAnuales_edit";
						$this->load->view('plantilla', $dato);
					}else{
						echo '<script type="text/javascript">  alert("No cuenta con el permiso"); </script>';
						$this->editarDGA();
					}
				}else{
					$this->editarDGA();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function guardarDGASF(){
		// $this->form_validation->set_rules('txtValorCreditoASociosConDepositoMenorA20Porciento','Valor de créditos otorgados a socios con depósitos inferiores al 20%','trim|required|numeric');
		// $this->form_validation->set_rules('txtValorCreditoASociosConAporteMenorALaMedia','Valor de créditos otorgados a socios con aportes inferiores a la media','trim|required|numeric');
		// $this->form_validation->set_rules('txtValorCreditoASociosConMinCapitalExigido','Valor de créditos a socios que poseen el mínimo de capital exigido','trim|required|numeric');
		// $this->form_validation->set_rules('txtMontoPromedioCreditoConsumoConcedidoPrimeraVez','Monto promedio de créditos de consumo concedidos por primera vez periodo actual','trim|required|numeric');
		// $this->form_validation->set_rules('txtMontoPromedioCreditoViviendaConcedidoPrimeraVez','Monto promedio de créditos de vivienda a socios nuevos concedido por primera vez en el periodo','trim|required|numeric');
		// $this->form_validation->set_rules('txtMontoPromedioMicrocreditoASociosNuevosPrimeraVez','Monto promedio de microcréditos a socios nuevos cencedidos por primera vez en el periodo','trim|required|numeric');
		// $this->form_validation->set_rules('txtMontoPromedioCreditoComercioASociosNuevosPrimeraVez','Monto promedio de créditos de comercio a socios nuevos concedidos por primera vez en el periodo','trim|required|numeric');
		// $this->form_validation->set_rules('txtMontoPromedioCreditosVinculados','Monto promedio de créditos vinculadosen el periodo','trim|required|numeric');
		// $this->form_validation->set_rules('txtMontoCertificadosAportacionPoseidosPorSocioMayoritario','Monto de certificados de aportación poseídos por el socio mayoritario','trim|required|numeric');
		// $this->form_validation->set_rules('txtMontoCertificadosAportacionPoseidosPorSocioMinorista','Monto de certificados de aportación poseídos por el socio minoristas','trim|required|numeric');
		// $this->form_validation->set_rules('txtTasaMediaInteresSobreCertificadosDeAportacion','Tasa media de interés sobre los certificados de aportación','trim|required|numeric');
		// $this->form_validation->set_rules('txtValorAgregadoCooperativoDistribuidoATrabajadores','Valor agregado cooperativo distribuido a trabajadores','trim|required|numeric');
		// $this->form_validation->set_rules('txtValorPrestacionesPersonales','Prestaciones personales','trim|required|numeric');
		// $this->form_validation->set_rules('txtValorPrestacionesColectivas','Prestaciones colectivas','trim|required|numeric');
		// $this->form_validation->set_rules('txtGastoEnFormacionATrabajadores','Gasto de formación para trabajadores','trim|required|numeric');
		// $this->form_validation->set_rules('txtValorBecasAyudasServicios','Valor por becas, ayudas, servicios','trim|required|numeric');
		// $this->form_validation->set_rules('txtValorImpuestoYTasaVarias','Impuesto y tasa varias','trim|required|numeric');
		// $this->form_validation->set_rules('txtValorDonacionFondoEducacion','Dotación Fondo Educación','trim|required|numeric');
		// $this->form_validation->set_rules('txtValorFondoDeSolidaridad','Fondo de Solidariadad','trim|required|numeric');
		// $this->form_validation->set_rules('txtValorDonativosAComunidad','Donativos a la comunidad','trim|required|numeric');
		// $this->form_validation->set_rules('txtValorExcedenteBruto','Excedente Bruto','trim|required|numeric');
		// $this->form_validation->set_rules('txtValorImpuestosSobreExcedentes','Impuestos sobre excedentes','trim|required|numeric');
		// $this->form_validation->set_rules('txtValorDotacionDeFondoEducacion','Dotación del fondo de educación','trim|required|numeric');
		// $this->form_validation->set_rules('txtValorFondoDeReservaIrrepartibles','Fondo de Reserva Irrepartibles','trim|required|numeric');
		// $this->form_validation->set_rules('txtValorFondoDeReservaRepartibles','Fondo de Reserva Repartibles','trim|required|numeric');
		// $this->form_validation->set_rules('txtPrecioPagadoAAsociadosPorCompraDeMaterial','Precio pagado a los asociados por compra de materias','trim|required|numeric');
		// $this->form_validation->set_rules('txtDescuentoRealizadoASociosEnVentasAProductores','Descuento realizado a socios en ventas a productores','trim|required|numeric');
		// $this->form_validation->set_rules('txtGastosPorServiciosVoluntariosGratuitosASocios','Gastos por servicos voluntarios gratuitos a socios','trim|required|numeric');
		// $this->form_validation->set_rules('txtValorDotacionFondoDeReservaIrrepartibles','Dotación Fondo de Reservas  Irrepartibles','trim|required|numeric');
		// $this->form_validation->set_rules('txtValorOtrasReservas','Otras Reservas','trim|required|numeric');
		// $this->form_validation->set_rules('txtSaldoTDepositos','Total depósitos realizados','trim|required|numeric');
		// $this->form_validation->set_rules('txtNumTComprobantesFisicosEmitidos','Total comprobantes físicos emitidos','trim|required|numeric');
		// $this->form_validation->set_rules('txtGastoTMultas','Gasto total multas ','trim|required|numeric');
		// $this->form_validation->set_rules('txtValorTBeneficiosDeLey','Valor Beneficios de ley','trim|required|numeric');
		// $this->form_validation->set_rules('txtNumTLimpiezasPorDia','Número de limpiezas realizadas por día','trim|required|numeric');
		// $this->form_validation->set_rules('txtNumTLimpiezasProgramadasPorDia','Número de limpiezas programadas por día','trim|required|numeric');
		// $this->form_validation->set_rules('txtNumTEmpeladosQueNoGozaronVacaciones','Empleados que no gozaron de las vacaciones','trim|required|numeric');
		// $this->form_validation->set_rules('txtValorTPorPagarProvisionDecimoCuarto','Décimo Cuarto','trim|required|numeric');
		// $this->form_validation->set_rules('txtNumTAccidentes5Anios','Numero de accidentes ','trim|required|numeric');
		// $this->form_validation->set_rules('txtNumTEmpleadosEvaluadosDesempenioProfesional','Empleados evaluados en el desempeño profesional ','trim|required|numeric');
		// $this->form_validation->set_rules('txtValorTAportacionesCapitalSocial','Valor aportación capital social ','trim|required|numeric');
		// $this->form_validation->set_rules('txtTasaPasivaCaptacionDelPublicoPonderada','Tasa pasiva captacion del público ','trim|required|numeric');
		// $this->form_validation->set_rules('txtMontoTCompras','Monto total compras ','trim|required|numeric');
		// $this->form_validation->set_rules('txtValorAgregadoCooperativoDistribuidoAComunidad','Valro agregado cooperativo distribuido a la comunidad','trim|required|numeric');
		// $this->form_validation->set_rules('txtValorAgregadoCooperativoDistribuidoASocios','Valor agregado cooperativo distribuido a socios ','trim|required|numeric');
		// $this->form_validation->set_rules('txtValorAgregadoCooperativoIncorporadoAPatrimonioComun','Valor agregado cooperativo incorporado a Patrimonio común','trim|required|numeric');
		// $this->form_validation->set_rules('txtValorComprasRealizadasAEntidadesReconocidasComoDeComercioJusto','Compras a entidades reconocidas como de comercio justo ','trim|required|numeric');
		// $this->form_validation->set_rules('txtValorVentasRealizadasAEntidadesReconocidasComoComercioJusto','Ventas a entidades reconocidas como de comercio justo','trim|required|numeric');
		// $this->form_validation->set_rules('txtValorDepositosProcedenteDeEntidadesReconocidasComoComercioJusto','Valor depósitos procedentes de entidades como de comercio justo ','trim|required|numeric');
		// $this->form_validation->set_rules('txtValorCreditosOtorgadosAEntidadesReconocidasComoComercioJusto','Valor créditos otorgados a entidades reconocidas como comercio justo','trim|required|numeric');
		// $this->form_validation->set_rules('txtValorTAportesIngresados','Valor aportes (capital social) ingresados en el año ','trim|required|numeric');	
		$this->form_validation->set_rules('txtPeriodo','Periodo de la sección F','trim|required|integer');	
		if ($this->form_validation->run() == false) {
			if ($_POST["accion"] == "Editar"){
				$this->editarDGASF($_POST["id"],"menu6");
			}else{
				$this->nuevoDGA(6);				
			}
		}else{
			$this->load->model('DatosGeneralesAnualSeccF_Modelo');
			$id = $_POST["id"];
			$tiempo = time();
			$txtValorCreditoASociosConDepositoMenorA20Porciento = $_POST["txtValorCreditoASociosConDepositoMenorA20Porciento"];
			$txtValorCreditoASociosConAporteMenorALaMedia = $_POST["txtValorCreditoASociosConAporteMenorALaMedia"];
			$txtValorCreditoASociosConMinCapitalExigido = $_POST["txtValorCreditoASociosConMinCapitalExigido"];
			$txtMontoPromedioCreditoConsumoConcedidoPrimeraVez = $_POST["txtMontoPromedioCreditoConsumoConcedidoPrimeraVez"];
			$txtMontoPromedioCreditoViviendaConcedidoPrimeraVez = $_POST["txtMontoPromedioCreditoViviendaConcedidoPrimeraVez"];
			$txtMontoPromedioMicrocreditoASociosNuevosPrimeraVez = $_POST["txtMontoPromedioMicrocreditoASociosNuevosPrimeraVez"];
			$txtMontoPromedioCreditoComercioASociosNuevosPrimeraVez = $_POST["txtMontoPromedioCreditoComercioASociosNuevosPrimeraVez"];
			$txtMontoPromedioCreditosVinculados = $_POST["txtMontoPromedioCreditosVinculados"];
			$txtMontoCertificadosAportacionPoseidosPorSocioMayoritario = $_POST["txtMontoCertificadosAportacionPoseidosPorSocioMayoritario"];
			$txtMontoCertificadosAportacionPoseidosPorSocioMinorista = $_POST["txtMontoCertificadosAportacionPoseidosPorSocioMinorista"];
			$txtTasaMediaInteresSobreCertificadosDeAportacion = $_POST["txtTasaMediaInteresSobreCertificadosDeAportacion"];
			$txtValorAgregadoCooperativoDistribuidoATrabajadores = $_POST["txtValorAgregadoCooperativoDistribuidoATrabajadores"];
			$txtValorPrestacionesPersonales = $_POST["txtValorPrestacionesPersonales"];
			$txtValorPrestacionesColectivas = $_POST["txtValorPrestacionesColectivas"];
			$txtGastoEnFormacionATrabajadores = $_POST["txtGastoEnFormacionATrabajadores"];
			$txtValorBecasAyudasServicios = $_POST["txtValorBecasAyudasServicios"];
			$txtValorImpuestoYTasaVarias = $_POST["txtValorImpuestoYTasaVarias"];
			$txtValorDonacionFondoEducacion = $_POST["txtValorDonacionFondoEducacion"];
			$txtValorFondoDeSolidaridad = $_POST["txtValorFondoDeSolidaridad"];
			$txtValorDonativosAComunidad = $_POST["txtValorDonativosAComunidad"];
			$txtValorExcedenteBruto = $_POST["txtValorExcedenteBruto"];
			$txtValorImpuestosSobreExcedentes = $_POST["txtValorImpuestosSobreExcedentes"];
			$txtValorDotacionDeFondoEducacion = $_POST["txtValorDotacionDeFondoEducacion"];
			$txtValorFondoDeReservaIrrepartibles = $_POST["txtValorFondoDeReservaIrrepartibles"];
			$txtValorFondoDeReservaRepartibles = $_POST["txtValorFondoDeReservaRepartibles"];
			$txtPrecioPagadoAAsociadosPorCompraDeMaterial = $_POST["txtPrecioPagadoAAsociadosPorCompraDeMaterial"];
			$txtDescuentoRealizadoASociosEnVentasAProductores = $_POST["txtDescuentoRealizadoASociosEnVentasAProductores"];
			$txtGastosPorServiciosVoluntariosGratuitosASocios = $_POST["txtGastosPorServiciosVoluntariosGratuitosASocios"];
			$txtValorDotacionFondoDeReservaIrrepartibles = $_POST["txtValorDotacionFondoDeReservaIrrepartibles"];
			$txtValorOtrasReservas = $_POST["txtValorOtrasReservas"];
			$txtSaldoTDepositos = $_POST["txtSaldoTDepositos"];
			$txtNumTComprobantesFisicosEmitidos = $_POST["txtNumTComprobantesFisicosEmitidos"];
			$txtGastoTMultas = $_POST["txtGastoTMultas"];
			$txtValorTBeneficiosDeLey = $_POST["txtValorTBeneficiosDeLey"];
			$txtNumTLimpiezasPorDia = $_POST["txtNumTLimpiezasPorDia"];
			$txtNumTLimpiezasProgramadasPorDia = $_POST["txtNumTLimpiezasProgramadasPorDia"];
			$txtNumTEmpeladosQueNoGozaronVacaciones = $_POST["txtNumTEmpeladosQueNoGozaronVacaciones"];
			$txtValorTPorPagarProvisionDecimoCuarto = $_POST["txtValorTPorPagarProvisionDecimoCuarto"];
			$txtNumTAccidentes5Anios = $_POST["txtNumTAccidentes5Anios"];
			$txtNumTEmpleadosEvaluadosDesempenioProfesional = $_POST["txtNumTEmpleadosEvaluadosDesempenioProfesional"];
			$txtValorTAportacionesCapitalSocial = $_POST["txtValorTAportacionesCapitalSocial"];
			$txtTasaPasivaCaptacionDelPublicoPonderada = $_POST["txtTasaPasivaCaptacionDelPublicoPonderada"];
			$txtMontoTCompras = $_POST["txtMontoTCompras"];
			$txtValorAgregadoCooperativoDistribuidoAComunidad = $_POST["txtValorAgregadoCooperativoDistribuidoAComunidad"];
			$txtValorAgregadoCooperativoDistribuidoASocios = $_POST["txtValorAgregadoCooperativoDistribuidoASocios"];
			$txtValorAgregadoCooperativoIncorporadoAPatrimonioComun = $_POST["txtValorAgregadoCooperativoIncorporadoAPatrimonioComun"];
			$txtValorComprasRealizadasAEntidadesReconocidasComoDeComercioJusto = $_POST["txtValorComprasRealizadasAEntidadesReconocidasComoDeComercioJusto"];
			$txtValorVentasRealizadasAEntidadesReconocidasComoComercioJusto = $_POST["txtValorVentasRealizadasAEntidadesReconocidasComoComercioJusto"];
			$txtValorDepositosProcedenteDeEntidadesReconocidasComoComercioJusto = $_POST["txtValorDepositosProcedenteDeEntidadesReconocidasComoComercioJusto"];
			$txtValorCreditosOtorgadosAEntidadesReconocidasComoComercioJusto = $_POST["txtValorCreditosOtorgadosAEntidadesReconocidasComoComercioJusto"];
			$txtValorTAportesIngresados = $_POST["txtValorTAportesIngresados"];
			$txtPeriodo = $_POST["txtPeriodo"];
			$txtFechaSistema = date("Y-m-d H:i:s", $tiempo);		
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($_POST["accion"] == "Editar"){
				$updateDGASF = array(					
					'ValorCreditoASociosConDepositoMenorA20Porciento' => $txtValorCreditoASociosConDepositoMenorA20Porciento,
					'ValorCreditoASociosConAporteMenorALaMedia' => $txtValorCreditoASociosConAporteMenorALaMedia,
					'ValorCreditoASociosConMinCapitalExigido' => $txtValorCreditoASociosConMinCapitalExigido,
					'MontoPromedioCreditoConsumoConcedidoPrimeraVez' => $txtMontoPromedioCreditoConsumoConcedidoPrimeraVez,
					'MontoPromedioCreditoViviendaConcedidoPrimeraVez' => $txtMontoPromedioCreditoViviendaConcedidoPrimeraVez,
					'MontoPromedioMicrocreditoASociosNuevosPrimeraVez' => $txtMontoPromedioMicrocreditoASociosNuevosPrimeraVez,
					'MontoPromedioCreditoComercioASociosNuevosPrimeraVez' => $txtMontoPromedioCreditoComercioASociosNuevosPrimeraVez,
					'MontoPromedioCreditosVinculados' => $txtMontoPromedioCreditosVinculados,
					'MontoCertificadosAportacionPoseidosPorSocioMayoritario' => $txtMontoCertificadosAportacionPoseidosPorSocioMayoritario,
					'MontoCertificadosAportacionPoseidosPorSocioMinorista' => $txtMontoCertificadosAportacionPoseidosPorSocioMinorista,
					'TasaMediaInteresSobreCertificadosDeAportacion' => $txtTasaMediaInteresSobreCertificadosDeAportacion,
					'ValorAgregadoCooperativoDistribuidoATrabajadores' => $txtValorAgregadoCooperativoDistribuidoATrabajadores,
					'ValorPrestacionesPersonales' => $txtValorPrestacionesPersonales,
					'ValorPrestacionesColectivas' => $txtValorPrestacionesColectivas,
					'GastoEnFormacionATrabajadores' => $txtGastoEnFormacionATrabajadores,
					'ValorBecasAyudasServicios' => $txtValorBecasAyudasServicios,
					'ValorImpuestoYTasaVarias' => $txtValorImpuestoYTasaVarias,
					'ValorDonacionFondoEducacion' => $txtValorDonacionFondoEducacion,
					'ValorFondoDeSolidaridad' => $txtValorFondoDeSolidaridad,
					'ValorDonativosAComunidad' => $txtValorDonativosAComunidad,
					'ValorExcedenteBruto' => $txtValorExcedenteBruto,
					'ValorImpuestosSobreExcedentes' => $txtValorImpuestosSobreExcedentes,
					'ValorDotacionDeFondoEducacion' => $txtValorDotacionDeFondoEducacion,
					'ValorFondoDeReservaIrrepartibles' => $txtValorFondoDeReservaIrrepartibles,
					'ValorFondoDeReservaRepartibles' => $txtValorFondoDeReservaRepartibles,
					'PrecioPagadoAAsociadosPorCompraDeMaterial' => $txtPrecioPagadoAAsociadosPorCompraDeMaterial,
					'DescuentoRealizadoASociosEnVentasAProductores' => $txtDescuentoRealizadoASociosEnVentasAProductores,
					'GastosPorServiciosVoluntariosGratuitosASocios' => $txtGastosPorServiciosVoluntariosGratuitosASocios,
					'ValorDotacionFondoDeReservaIrrepartibles' => $txtValorDotacionFondoDeReservaIrrepartibles,
					'ValorOtrasReservas' => $txtValorOtrasReservas,
					'SaldoTDepositos' => $txtSaldoTDepositos,
					'NumTComprobantesFisicosEmitidos' => $txtNumTComprobantesFisicosEmitidos,
					'GastoTMultas' => $txtGastoTMultas,
					'ValorTBeneficiosDeLey' => $txtValorTBeneficiosDeLey,
					'NumTLimpiezasPorDia' => $txtNumTLimpiezasPorDia,
					'NumTLimpiezasProgramadasPorDia' => $txtNumTLimpiezasProgramadasPorDia,
					'NumTEmpeladosQueNoGozaronVacaciones' => $txtNumTEmpeladosQueNoGozaronVacaciones,
					'ValorTPorPagarProvisionDecimoCuarto' => $txtValorTPorPagarProvisionDecimoCuarto,
					'NumTAccidentes5Anios' => $txtNumTAccidentes5Anios,
					'NumTEmpleadosEvaluadosDesempenioProfesional' => $txtNumTEmpleadosEvaluadosDesempenioProfesional,
					'ValorTAportacionesCapitalSocial' => $txtValorTAportacionesCapitalSocial,
					'TasaPasivaCaptacionDelPublicoPonderada' => $txtTasaPasivaCaptacionDelPublicoPonderada,
					'MontoTCompras' => $txtMontoTCompras,
					'ValorAgregadoCooperativoDistribuidoAComunidad' => $txtValorAgregadoCooperativoDistribuidoAComunidad,
					'ValorAgregadoCooperativoDistribuidoASocios' => $txtValorAgregadoCooperativoDistribuidoASocios,
					'ValorAgregadoCooperativoIncorporadoAPatrimonioComun' => $txtValorAgregadoCooperativoIncorporadoAPatrimonioComun,
					'ValorComprasRealizadasAEntidadesReconocidasComoDeComercioJusto' => $txtValorComprasRealizadasAEntidadesReconocidasComoDeComercioJusto,
					'ValorVentasRealizadasAEntidadesReconocidasComoComercioJusto' => $txtValorVentasRealizadasAEntidadesReconocidasComoComercioJusto,
					'ValorDepositosProcedenteDeEntidadesReconocidasComoComercioJusto' => $txtValorDepositosProcedenteDeEntidadesReconocidasComoComercioJusto,
					'ValorCreditosOtorgadosAEntidadesReconocidasComoComercioJusto' => $txtValorCreditosOtorgadosAEntidadesReconocidasComoComercioJusto,
					'ValorTAportesIngresados' => $txtValorTAportesIngresados,
					'Periodo' => $txtPeriodo,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->DatosGeneralesAnualSeccF_Modelo->updateDatosGeneralesAnualSeccF($id, $updateDGASF, $IdEmpresaSesion)){
					$mensaje = "El Registro fue modificado con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarDGASF($id,"menu6");				
				}else{
					$mensaje = "El Registro no fue modificado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarDGASF($id,"menu6");				
				}
			}else{
				$insertDGASF = array(
					'ValorCreditoASociosConDepositoMenorA20Porciento' => $txtValorCreditoASociosConDepositoMenorA20Porciento,
					'ValorCreditoASociosConAporteMenorALaMedia' => $txtValorCreditoASociosConAporteMenorALaMedia,
					'ValorCreditoASociosConMinCapitalExigido' => $txtValorCreditoASociosConMinCapitalExigido,
					'MontoPromedioCreditoConsumoConcedidoPrimeraVez' => $txtMontoPromedioCreditoConsumoConcedidoPrimeraVez,
					'MontoPromedioCreditoViviendaConcedidoPrimeraVez' => $txtMontoPromedioCreditoViviendaConcedidoPrimeraVez,
					'MontoPromedioMicrocreditoASociosNuevosPrimeraVez' => $txtMontoPromedioMicrocreditoASociosNuevosPrimeraVez,
					'MontoPromedioCreditoComercioASociosNuevosPrimeraVez' => $txtMontoPromedioCreditoComercioASociosNuevosPrimeraVez,
					'MontoPromedioCreditosVinculados' => $txtMontoPromedioCreditosVinculados,
					'MontoCertificadosAportacionPoseidosPorSocioMayoritario' => $txtMontoCertificadosAportacionPoseidosPorSocioMayoritario,
					'MontoCertificadosAportacionPoseidosPorSocioMinorista' => $txtMontoCertificadosAportacionPoseidosPorSocioMinorista,
					'TasaMediaInteresSobreCertificadosDeAportacion' => $txtTasaMediaInteresSobreCertificadosDeAportacion,
					'ValorAgregadoCooperativoDistribuidoATrabajadores' => $txtValorAgregadoCooperativoDistribuidoATrabajadores,
					'ValorPrestacionesPersonales' => $txtValorPrestacionesPersonales,
					'ValorPrestacionesColectivas' => $txtValorPrestacionesColectivas,
					'GastoEnFormacionATrabajadores' => $txtGastoEnFormacionATrabajadores,
					'ValorBecasAyudasServicios' => $txtValorBecasAyudasServicios,
					'ValorImpuestoYTasaVarias' => $txtValorImpuestoYTasaVarias,
					'ValorDonacionFondoEducacion' => $txtValorDonacionFondoEducacion,
					'ValorFondoDeSolidaridad' => $txtValorFondoDeSolidaridad,
					'ValorDonativosAComunidad' => $txtValorDonativosAComunidad,
					'ValorExcedenteBruto' => $txtValorExcedenteBruto,
					'ValorImpuestosSobreExcedentes' => $txtValorImpuestosSobreExcedentes,
					'ValorDotacionDeFondoEducacion' => $txtValorDotacionDeFondoEducacion,
					'ValorFondoDeReservaIrrepartibles' => $txtValorFondoDeReservaIrrepartibles,
					'ValorFondoDeReservaRepartibles' => $txtValorFondoDeReservaRepartibles,
					'PrecioPagadoAAsociadosPorCompraDeMaterial' => $txtPrecioPagadoAAsociadosPorCompraDeMaterial,
					'DescuentoRealizadoASociosEnVentasAProductores' => $txtDescuentoRealizadoASociosEnVentasAProductores,
					'GastosPorServiciosVoluntariosGratuitosASocios' => $txtGastosPorServiciosVoluntariosGratuitosASocios,
					'ValorDotacionFondoDeReservaIrrepartibles' => $txtValorDotacionFondoDeReservaIrrepartibles,
					'ValorOtrasReservas' => $txtValorOtrasReservas,
					'SaldoTDepositos' => $txtSaldoTDepositos,
					'NumTComprobantesFisicosEmitidos' => $txtNumTComprobantesFisicosEmitidos,
					'GastoTMultas' => $txtGastoTMultas,
					'ValorTBeneficiosDeLey' => $txtValorTBeneficiosDeLey,
					'NumTLimpiezasPorDia' => $txtNumTLimpiezasPorDia,
					'NumTLimpiezasProgramadasPorDia' => $txtNumTLimpiezasProgramadasPorDia,
					'NumTEmpeladosQueNoGozaronVacaciones' => $txtNumTEmpeladosQueNoGozaronVacaciones,
					'ValorTPorPagarProvisionDecimoCuarto' => $txtValorTPorPagarProvisionDecimoCuarto,
					'NumTAccidentes5Anios' => $txtNumTAccidentes5Anios,
					'NumTEmpleadosEvaluadosDesempenioProfesional' => $txtNumTEmpleadosEvaluadosDesempenioProfesional,
					'ValorTAportacionesCapitalSocial' => $txtValorTAportacionesCapitalSocial,
					'TasaPasivaCaptacionDelPublicoPonderada' => $txtTasaPasivaCaptacionDelPublicoPonderada,
					'MontoTCompras' => $txtMontoTCompras,
					'ValorAgregadoCooperativoDistribuidoAComunidad' => $txtValorAgregadoCooperativoDistribuidoAComunidad,
					'ValorAgregadoCooperativoDistribuidoASocios' => $txtValorAgregadoCooperativoDistribuidoASocios,
					'ValorAgregadoCooperativoIncorporadoAPatrimonioComun' => $txtValorAgregadoCooperativoIncorporadoAPatrimonioComun,
					'ValorComprasRealizadasAEntidadesReconocidasComoDeComercioJusto' => $txtValorComprasRealizadasAEntidadesReconocidasComoDeComercioJusto,
					'ValorVentasRealizadasAEntidadesReconocidasComoComercioJusto' => $txtValorVentasRealizadasAEntidadesReconocidasComoComercioJusto,
					'ValorDepositosProcedenteDeEntidadesReconocidasComoComercioJusto' => $txtValorDepositosProcedenteDeEntidadesReconocidasComoComercioJusto,
					'ValorCreditosOtorgadosAEntidadesReconocidasComoComercioJusto' => $txtValorCreditosOtorgadosAEntidadesReconocidasComoComercioJusto,
					'ValorTAportesIngresados' => $txtValorTAportesIngresados,
					'Periodo' => $txtPeriodo,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->DatosGeneralesAnualSeccF_Modelo->insertDatosGeneralesAnualSeccF($insertDGASF)){
					$mensaje = "Datos de la sección F guardados con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarDGA(6);				
				}else{
					$mensaje = "El Registro no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoDGA(6);				
				}
			}
		}
	}
	public function eliminarDGASF(){
		$this->load->model('DatosGeneralesAnualSeccF_Modelo'); 		          	
		$id = $_POST["idF"];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->DatosGeneralesAnualSeccF_Modelo->deleteDatosGeneralesAnualSeccF($id, $IdEmpresaSesion); 
	}
}



?>