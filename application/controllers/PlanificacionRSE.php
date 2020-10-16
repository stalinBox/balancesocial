<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//Controlador 
class planificacionRSE extends CI_Controller {

	function __construct()	{
		parent::__construct();				
	}
	public function index()	{
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE"			                     
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "planificacionRSE/modulosPlanificacionRSE";
			$this->load->view("plantilla", $dato);
		}else{
			redirect('inicio');
		}		
	}
	public function publicoExterno(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",			                     
			                     $inicioURL."planificacionRSE/publicoExterno" => "Público Externo"			                     
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "planificacionRSE/modulosPublicoExterno";
			$this->load->view("plantilla", $dato);
		}else{
			redirect("inicio");
		}	
	}
	public function evaluaciones(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",			                     
			                     $inicioURL."planificacionRSE/evaluaciones" => "Evaluaciones"			                     
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "planificacionRSE/modulosEvaluaciones";
			$this->load->view("plantilla", $dato);
		}else{
			redirect("inicio");
		}	
	}
	public function capacitaciones(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/capacitaciones" => "Capacitaciones"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "planificacionRSE/modulosCapacitaciones";
			$this->load->view("plantilla", $dato);
		}else{
			redirect("inicio");
		}	
	}	
	public function actosContractuales(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/actosContractuales" => "Actos Contractuales"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "planificacionRSE/modulosActosContractuales";
			$this->load->view("plantilla", $dato);
		}else{
			redirect("inicio");
		}	
	}
	public function implicacionEconomica(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/implicacionEconomica" => "Implicación Económica"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "planificacionRSE/modulosImplicacionEconomica";
			$this->load->view("plantilla", $dato);
		}else{
			redirect("inicio");
		}	
	}
	public function publicoInterno(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/publicoInterno" => "Público Interno"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "planificacionRSE/modulosPublicoInterno";
			$this->load->view("plantilla", $dato);
		}else{
			redirect("inicio");
		}	
	}
	public function gobierno(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/gobierno" => "Gobierno"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "planificacionRSE/modulosGobierno";
			$this->load->view("plantilla", $dato);
		}else{
			redirect("inicio");
		}	
	}
	/**
	 * Reportes Planificación RSE
	 */
	public function reportesPlanifRSEPublicoExterno(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/publicoExterno" => "Público Externo",
			                     $inicioURL."planificacionRSE/reportesPlanifRSEPublicoExterno" => "Reportes"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "planificacionRSE/reportesModuloPublicoExterno_view";
			$this->load->view("plantilla", $dato);

		}else{
			redirect('inicio');
		}	
	}
	public function reporteSubModuloPublicoExternoPDF($nombreTabla){
        if($this->session->userdata("IdEmpresaSesion")){
        	$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
        	$usuario = $this->session->userdata("usuario");
    		$this->load->model("Empresa_Modelo");
			$empresa = $this->Empresa_Modelo->getEmpresa($IdEmpresaSesion);
			if ($nombreTabla == "Socios2") {
				$nombreTabla = "DatosTotales";
    			$select = 'NumTSociosActivos, NumTSociosActivosMujeres, (NumTSociosActivos- NumTSociosActivosMujeres) AS SociosHombre, NumTPersonasJuridicasIncorporadas, ValorTPorCertificadosDeAportacion, Periodo, FechaSistema ';
				$reporteTabla = $this->Empresa_Modelo->getListReporteTablaConsulta($select, $nombreTabla, $IdEmpresaSesion);	
				$nombreTabla = "Socios2";
    		}else{ 
    			$reporteTabla = $this->Empresa_Modelo->getListReporteTabla($nombreTabla, $IdEmpresaSesion);    			
    		}	
			$dato['imgIcono'] = "imagenes/logo_icono.jpg";
			$dato['empresa'] = $empresa;
			$dato['usuario'] = $usuario;


			if (!(empty($reporteTabla))) {
				switch ($nombreTabla) {
					case 'Socios':
						$dato['socios'] = $reporteTabla;
						$dato['nombreTabla'] = "Socios";
						$this->load->view('planificacionRSE/rpSociosPDF', $dato);
						break;
					case 'FormasDeAtencion':
						$dato['formasDeAtencion'] = $reporteTabla;
						$dato['nombreTabla'] = "Formas de Atención";
						$this->load->view('planificacionRSE/rpFormasDeAtencionPDF', $dato);
						break;
					case 'Proveedor':
						$dato['proveedores'] = $reporteTabla;
						$dato['nombreTabla'] = "Proveedores";
						$this->load->view('planificacionRSE/rpProveedorPDF', $dato);
						break;
					case 'AhorroEnEscala':
						$dato['ahorroEnEscala'] = $reporteTabla;
						$dato['nombreTabla'] = "Ahorro en Escala";
						$this->load->view('planificacionRSE/rpAhorroEnEscalaPDF', $dato);
						break;
					case 'ProveedorContrato':
						$dato['contratosProveedores'] = $reporteTabla;
						$dato['nombreTabla'] = "Contrato de Proveedores";
						$this->load->view('planificacionRSE/rpContratoProveedorPDF', $dato);
						break;
					case 'Socios2':
						$dato['socios'] = $reporteTabla;
						$dato['nombreTabla'] = "Accesibilidad Asociativa y Cooperativa";
						$this->load->view('planificacionRSE/rpAccecibilidadAsociativaPDF', $dato);
						break;
					default:
						echo "No existen registros";
						break;
				}
			}else{
				$mensaje = "No existen Registros";
				$this->session->set_flashdata("mensaje", $mensaje);
				$this->reportesPlanifRSEPublicoExterno();
			}
			
		}else{
			redirect('inicio');
		}
	}
	public function reportesPlanifRSEEvaluaciones(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/evaluaciones" => "Evaluaciones",
			                     $inicioURL."planificacionRSE/reportesPlanifRSEEvaluaciones" => "Reportes"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "planificacionRSE/reportesModuloEvaluaciones_view";
			$this->load->view("plantilla", $dato);

		}else{
			redirect('inicio');
		}	
	}
	public function reporteSubModuloEvaluacionesPDF($nombreTabla){
        if($this->session->userdata("IdEmpresaSesion")){
        	$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
        	$usuario = $this->session->userdata("usuario");
    		$this->load->model("Empresa_Modelo");
			$empresa = $this->Empresa_Modelo->getEmpresa($IdEmpresaSesion);
			if ($nombreTabla == "Reclamos") {
    			$select = '*, (SELECT CONCAT(NombresEmpleado," ", ApellidoPaternoEmpleado," ", ApellidoMaternoEmpleado) FROM Empleado WHERE Empleado.CedulaEmpleado = ResponsableDeReclamos) AS NombreResponsable ';
				$reporteTabla = $this->Empresa_Modelo->getListReporteTablaConsulta($select, $nombreTabla, $IdEmpresaSesion);	
    		}else{    			
				if ($nombreTabla == "EvaluacionProductoServicio") {
    				$select = '*, (SELECT CONCAT(NombresEmpleado," ", ApellidoPaternoEmpleado," ", ApellidoMaternoEmpleado) FROM Empleado WHERE Empleado.CedulaEmpleado = CiResponsable) AS NombreResponsable ';
				$reporteTabla = $this->Empresa_Modelo->getListReporteTablaConsulta($select, $nombreTabla, $IdEmpresaSesion);
    			}else{
    				if ($nombreTabla == "Accidentes") {
    				$select = '*, (SELECT CONCAT(NombresEmpleado," ", ApellidoPaternoEmpleado," ", ApellidoMaternoEmpleado) FROM Empleado WHERE Empleado.CedulaEmpleado = CIEmpleadoAccidente) AS NombreAccidentado ';
    				$reporteTabla = $this->Empresa_Modelo->getListReporteTablaConsulta($select, $nombreTabla, $IdEmpresaSesion);
    				}else{
						$reporteTabla = $this->Empresa_Modelo->getListReporteTabla($nombreTabla, $IdEmpresaSesion);	
					}
				}
			}
			$dato['imgIcono'] = "imagenes/logo_icono.jpg";
			$dato['empresa'] = $empresa;
			$dato['usuario'] = $usuario;
			//print_r($reporteTabla);

			if (!(empty($reporteTabla))) {
				switch ($nombreTabla) {
					case 'Reclamos':
						$dato['reclamos'] = $reporteTabla;
						$dato['nombreTabla'] = "Reclamos";
						$this->load->view('planificacionRSE/rpReclamosPDF', $dato);
						break;
					case 'EvaluacionProductoServicio':
						$dato['evaluacionProductosServicios'] = $reporteTabla;
						$dato['nombreTabla'] = "Evaluación de Productos y Servicios";
						$this->load->view('planificacionRSE/rpEvaluacionProductoServicioPDF', $dato);
						break;
					case 'SatisfaccionCliente':
						$dato['satisfaccionClientes'] = $reporteTabla;
						$dato['nombreTabla'] = "Satisfacción de Clientes";
						$this->load->view('planificacionRSE/rpSatisfaccionClientePDF', $dato);
						break;
					case 'Sanciones':
						$dato['sanciones'] = $reporteTabla;
						$dato['nombreTabla'] = "Sanciones";
						$this->load->view('planificacionRSE/rpSancionesPDF', $dato);
						break;
					case 'Accidentes':
						$dato['accidentes'] = $reporteTabla;
						$dato['nombreTabla'] = "Accidentes";
						$this->load->view('planificacionRSE/rpAccidentesPDF', $dato);
						break;
					default:
						echo "No existen registros";
						break;
				}
			}else{
				$mensaje = "No existen Registros";
				$this->session->set_flashdata("mensaje", $mensaje);
				$this->reportesPlanifRSEEvaluaciones();
			}
			
		}else{
			redirect('inicio');
		}
	}
	public function reportesPlanifRSECapacitaciones(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/capacitaciones" => "Capacitaciones",
			                     $inicioURL."planificacionRSE/reportesPlanifRSECapacitaciones" => "Reportes"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "planificacionRSE/reportesModuloCapacitaciones_view";
			$this->load->view("plantilla", $dato);

		}else{
			redirect('inicio');
		}	
	}
	public function reporteSubModuloCapacitacionesPDF($nombreTabla){
        if($this->session->userdata("IdEmpresaSesion")){
        	$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
        	$usuario = $this->session->userdata("usuario");
    		$this->load->model("Empresa_Modelo");
			$empresa = $this->Empresa_Modelo->getEmpresa($IdEmpresaSesion);
			if ($nombreTabla == "Comunicacion") {
    			$select = '*, (SELECT NombreProveedor FROM Proveedor WHERE IdProveedor = Comunicacion.RucProveedor) AS Proveedor ';
				$reporteTabla = $this->Empresa_Modelo->getListReporteTablaConsulta($select, $nombreTabla, $IdEmpresaSesion);	
    		}else{    			
				if ($nombreTabla == "CapacitacionSocios") {
    				$select = '*, (SELECT CONCAT(NombresEmpleado," ", ApellidoPaternoEmpleado," ", ApellidoMaternoEmpleado) FROM Empleado WHERE Empleado.CedulaEmpleado = CIResponsable) AS NombreResponsable ';
				$reporteTabla = $this->Empresa_Modelo->getListReporteTablaConsulta($select, $nombreTabla, $IdEmpresaSesion);
    			}else{
    				if ($nombreTabla == "CapacitacionEmpleados") {
    				$select = '*, (SELECT CONCAT(NombresEmpleado," ", ApellidoPaternoEmpleado," ", ApellidoMaternoEmpleado) FROM Empleado WHERE Empleado.CedulaEmpleado = EmpleadoResponsable) AS NombreResponsable ';
    				$reporteTabla = $this->Empresa_Modelo->getListReporteTablaConsulta($select, $nombreTabla, $IdEmpresaSesion);
    				}else{
    					if ($nombreTabla == "CapacitacionConsejos") {
    					$select = '*, (SELECT NombreConsejos FROM Consejos WHERE IdConsejos = IdConsejo) AS Consejo, (SELECT CONCAT(NombresEmpleado," ", ApellidoPaternoEmpleado," ", ApellidoMaternoEmpleado) FROM Empleado WHERE Empleado.CedulaEmpleado = EmpleadoResponsable) AS NombreResponsable ';
    					$reporteTabla = $this->Empresa_Modelo->getListReporteTablaConsulta($select, $nombreTabla, $IdEmpresaSesion);
	    				}else{
	    					if ($nombreTabla == "CapacitacionResumen") {
	    						$nombreTabla = "CapacitacionEmpleados";
	    						//$select = 'SUM(ParticipantesCapacitados) AS Capacitados, SUM(HorasEjecutadas) AS Horas, SUM(Costo) AS MontoInvertido, COUNT(DISTINCT TipoCapacitacion) AS TiposCapacitacion ';
	    						$sql = "SELECT SUM(ParticipantesCapacitados) AS Capacitados, SUM(HorasEjecutadas) AS Horas, SUM(Costo) AS MontoInvertido, COUNT(DISTINCT TipoCapacitacion) AS TiposCapacitacion, Periodo FROM CapacitacionEmpleados WHERE IdEmpresa = ".$IdEmpresaSesion." GROUP BY Periodo ORDER BY Periodo;";
    							//$reporteTabla = $this->Empresa_Modelo->getListReporteTablaConsulta($select, $nombreTabla, $IdEmpresaSesion);
    							$reporteTabla = $this->db->query($sql)->result();
	    						$nombreTabla = "CapacitacionResumen";
	    					}else{
								$reporteTabla = $this->Empresa_Modelo->getListReporteTabla($nombreTabla, $IdEmpresaSesion);							
							}
    					}
					}
				}
			}
			//# de empleados Capacitados
			//#de horas de capacitación
			//monto invertido
			//# de tipos de capacitación
			$dato['imgIcono'] = "imagenes/logo_icono.jpg";
			$dato['empresa'] = $empresa;
			$dato['usuario'] = $usuario;
			//print_r($reporteTabla);

			if (!(empty($reporteTabla))) {
				switch ($nombreTabla) {
					case 'Comunicacion':
						$dato['comunicacion'] = $reporteTabla;
						$dato['nombreTabla'] = "Comunicación";
						$this->load->view('planificacionRSE/rpComunicacionPDF', $dato);
						break;
					case 'CapacitacionSocios':
						$dato['capacitacionesSocios'] = $reporteTabla;
						$dato['nombreTabla'] = "Capacitación a Socios";
						$this->load->view('planificacionRSE/rpCapacitacionSociosPDF', $dato);
						break;
					case 'CapacitacionEmpleados':
						$dato['capacitacionesEmpleados'] = $reporteTabla;
						$dato['nombreTabla'] = "Capacitación a Empleados";
						$this->load->view('planificacionRSE/rpCapacitacionEmpleadosPDF', $dato);
						break;
					case 'CapacitacionConsejos':
						$dato['capacitacionesConsejos'] = $reporteTabla;
						$dato['nombreTabla'] = "Capacitación a Consejos";
						$this->load->view('planificacionRSE/rpCapacitacionConsejosPDF', $dato);
						break;
					case 'CapacitacionResumen':
						$dato['capacitacionResumen'] = $reporteTabla;
						$dato['nombreTabla'] = "Resumen de Capacitaciones de todos los periodos";
						$this->load->view('planificacionRSE/rpResumenCapacitacionesPDF', $dato);
						break;
					default:
						echo "No existen registros";
						break;
				}
			}else{
				$mensaje = "No existen Registros";
				$this->session->set_flashdata("mensaje", $mensaje);
				$this->reportesPlanifRSECapacitaciones();
			}
			
		}else{
			redirect('inicio');
		}
	}
	public function reportesPlanifRSEActosContractuales(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/actosContractuales" => "Actos Contractuales",
			                     $inicioURL."planificacionRSE/reportesPlanifRSEActosContractuales" => "Reportes"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "planificacionRSE/reportesModuloActosContractuales_view";
			$this->load->view("plantilla", $dato);
		}else{
			redirect('inicio');
		}	
	}
	public function reporteSubModuloActosContractualesPDF($nombreTabla){
        if($this->session->userdata("IdEmpresaSesion")){
        	$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
        	$usuario = $this->session->userdata("usuario");
    		$this->load->model("Empresa_Modelo");
			$empresa = $this->Empresa_Modelo->getEmpresa($IdEmpresaSesion);
			
			if ($nombreTabla == "Acuerdos") {
    			$select = '*, (SELECT CONCAT(NombresEmpleado," ", ApellidoPaternoEmpleado," ", ApellidoMaternoEmpleado) FROM Empleado WHERE Empleado.CedulaEmpleado = CIResponsable) AS NombreResponsable ';
				$reporteTabla = $this->Empresa_Modelo->getListReporteTablaConsulta($select, $nombreTabla, $IdEmpresaSesion);
    		}else{
				$reporteTabla = $this->Empresa_Modelo->getListReporteTabla($nombreTabla, $IdEmpresaSesion);
			}
			$dato['imgIcono'] = "imagenes/logo_icono.jpg";
			$dato['empresa'] = $empresa;
			$dato['usuario'] = $usuario;
			//print_r($reporteTabla);

			if (!(empty($reporteTabla))) {
				switch ($nombreTabla) {
					case 'Acuerdos':
						$dato['acuerdos'] = $reporteTabla;
						$dato['nombreTabla'] = "Acuerdos";
						$this->load->view('planificacionRSE/rpAcuerdosPDF', $dato);
						break;
					case 'Donaciones':
						$dato['donaciones'] = $reporteTabla;
						$dato['nombreTabla'] = "Donaciones";
						$this->load->view('planificacionRSE/rpDonacionesPDF', $dato);
						break;
					case 'Certificaciones':
						$dato['certificaciones'] = $reporteTabla;
						$dato['nombreTabla'] = "Certificaciones";
						$this->load->view('planificacionRSE/rpCertificacionesPDF', $dato);
						break;
					default:
						$mensaje = "No existen Datos";
						break;
				}
			}else{
				$mensaje = "No existen Registros";
				$this->session->set_flashdata("mensaje", $mensaje);
				$this->reportesPlanifRSEActosContractuales();
			}
			
		}else{
			redirect('inicio');
		}
	}
	public function reportesPlanifRSEImplicacionEconomica(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/implicacionEconomica" => "Implicación Económica",
			                     $inicioURL."planificacionRSE/reportesPlanifRSEImplicacionEconomica" => "Reportes"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "planificacionRSE/reportesModuloImplicacionEconomica_view";
			$this->load->view("plantilla", $dato);
		}else{
			redirect('inicio');
		}	
	}
	public function reporteSubModuloImplicacionEconomicaPDF($nombreTabla){
        if($this->session->userdata("IdEmpresaSesion")){
        	$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
        	$usuario = $this->session->userdata("usuario");
    		$this->load->model("Empresa_Modelo");
			$empresa = $this->Empresa_Modelo->getEmpresa($IdEmpresaSesion);
			if ($nombreTabla == "Acuerdos") {
    			$select = '*, (SELECT CONCAT(NombresEmpleado," ", ApellidoPaternoEmpleado," ", ApellidoMaternoEmpleado) FROM Empleado WHERE Empleado.CedulaEmpleado = CIResponsable) AS NombreResponsable ';
				$reporteTabla = $this->Empresa_Modelo->getListReporteTablaConsulta($select, $nombreTabla, $IdEmpresaSesion);
    		}else{
    			if ($nombreTabla == "ConcentracionAporteSocial") {
    				$nombreTabla = "DatosTotales";
    				$select = "ValorTCapitalSocial, ValorTAportesIngresados, UtilidadTEjercicio, ValorTPorCertificadosDeAportacion, ValorTCertificadoAportacionDevueltos, MontoCertificadosAportacionPoseidosPorSocioMayoritario, MontoCertificadosAportacionPoseidosPorSocioMinorista, TasaMediaInteresSobreCertificadosDeAportacion, Periodo, FechaSistema ";
					$reporteTabla = $this->Empresa_Modelo->getListReporteTablaConsulta($select, $nombreTabla, $IdEmpresaSesion);
    			}else{
					$reporteTabla = $this->Empresa_Modelo->getListReporteTabla($nombreTabla, $IdEmpresaSesion);
				}
			}
			$dato['imgIcono'] = "imagenes/logo_icono.jpg";
			$dato['empresa'] = $empresa;
			$dato['usuario'] = $usuario;
			//print_r($reporteTabla);

			if (!(empty($reporteTabla))) {
				switch ($nombreTabla) {
					case 'GastosMesEmpresa':
						$dato['gastosMensualesEmpresa'] = $reporteTabla;
						$dato['nombreTabla'] = "Gastos Mensuales de la Empresa";
						$this->load->view('planificacionRSE/rpGastosMesEmpresaPDF', $dato);
						break;
					case 'PoliticasAprobacionCreditoCalif':
						$dato['politicasdeAprobacionCredito'] = $reporteTabla;
						$dato['nombreTabla'] = "Calificación de las Políticas de Aprobación de Crédito";
						$this->load->view('planificacionRSE/rpPoliticasAprobacionCreditoCalifPDF', $dato);
						break;
					case 'DistribucionValorEconomico':
						$dato['distribucionvalorEconomico'] = $reporteTabla;
						$dato['nombreTabla'] = "Distribución del Valor Económico";
						$this->load->view('planificacionRSE/rpDistribucionValorEconomicoPDF', $dato);
						break;
					case 'SegmentosDeCredito':
						$dato['segmentosDeCredito'] = $reporteTabla;
						$dato['nombreTabla'] = "Segmentos de Crédito";
						$this->load->view('planificacionRSE/rpSegmentosDeCreditoPDF', $dato);
						break;
					case 'PromedioSegmentosCreditos':
						$dato['promedioSegmentosCreditos'] = $reporteTabla;
						$dato['nombreTabla'] = "Promedio Segmentos de Crédito";
						$this->load->view('planificacionRSE/rpPromedioSegmentosCreditosPDF', $dato);
						break;
					case 'ImportanciaAuditoriaInternaSobreBalanceSocialCalif':
						$dato['importanciaAuditoriaInternaSobreBalanceSocialCalif'] = $reporteTabla;
						$dato['nombreTabla'] = "Importancia de la Auditoría Interna Sobre el Balance Social";
						$this->load->view('planificacionRSE/rpImportanciaAuditoriaInternaSobreBalanceSocialCalifPDF', $dato);
						break;
					case 'DatosTotales':
						$dato['concentracionAporteSocial'] = $reporteTabla;
						$dato['nombreTabla'] = "Concentración de Aportes Sociales";
						$this->load->view('planificacionRSE/rpConcentracionAporteSocialPDF', $dato);
						break;
					default:
						$mensaje = "No existen Datos";
						break;
				}
			}else{
				$mensaje = "No existen Registros";
				$this->session->set_flashdata("mensaje", $mensaje);
				$this->reportesPlanifRSEImplicacionEconomica();
			}
			
		}else{
			redirect('inicio');
		}
	}
	public function reportesPlanifRSEPublicoInterno(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/publicoInterno" => "Público Interno",
			                     $inicioURL."planificacionRSE/reportesPlanifRSEPublicoInterno" => "Reportes"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "planificacionRSE/reportesModuloPublicoInterno_view";
			$this->load->view("plantilla", $dato);
		}else{
			redirect('inicio');
		}	
	}
	public function reporteSubModuloPublicoInternoPDF($nombreTabla){
        if($this->session->userdata("IdEmpresaSesion")){
        	$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
        	$usuario = $this->session->userdata("usuario");
    		$this->load->model("Empresa_Modelo");
			$empresa = $this->Empresa_Modelo->getEmpresa($IdEmpresaSesion);
			if ($nombreTabla == "SaludLaboralEmpleado") {
    			$select = '*, (SELECT CONCAT(NombresEmpleado," ", ApellidoPaternoEmpleado," ", ApellidoMaternoEmpleado) FROM Empleado WHERE Empleado.CedulaEmpleado = CiResponsable) AS NombreResponsable ';
				$reporteTabla = $this->Empresa_Modelo->getListReporteTablaConsulta($select, $nombreTabla, $IdEmpresaSesion);
    		}else{
    			if ($nombreTabla == "SeguroLaboral") {
    				$select = '*, (SELECT NombreProveedor FROM Proveedor WHERE IdProveedor = ProveedorSeguroL) AS Proveedor ';
    				$reporteTabla = $this->Empresa_Modelo->getListReporteTablaConsulta($select, $nombreTabla, $IdEmpresaSesion);
    			}else{
    				if ($nombreTabla == "Empleado_DesarrolloProfesional") {
    					$select = '*, (SELECT CONCAT(NombresEmpleado," ", ApellidoPaternoEmpleado," ", ApellidoMaternoEmpleado) FROM Empleado WHERE Empleado.CedulaEmpleado = CiEmpleado) AS Empleado ';
						$reporteTabla = $this->Empresa_Modelo->getListReporteTablaConsulta($select, $nombreTabla, $IdEmpresaSesion);
    				}else{
    					if ($nombreTabla == "ProgramasConcientizacion") {
    						$select = '*, (SELECT CONCAT(NombresEmpleado," ", ApellidoPaternoEmpleado," ", ApellidoMaternoEmpleado) FROM Empleado WHERE Empleado.CedulaEmpleado = ResponsablePrograma) AS Responsable ';
							$reporteTabla = $this->Empresa_Modelo->getListReporteTablaConsulta($select, $nombreTabla, $IdEmpresaSesion);
    					}else{
							$reporteTabla = $this->Empresa_Modelo->getListReporteTabla($nombreTabla, $IdEmpresaSesion);
						}
					}
				}
			}
			$dato['imgIcono'] = "imagenes/logo_icono.jpg";
			$dato['empresa'] = $empresa;
			$dato['usuario'] = $usuario;
			//print_r($reporteTabla);

			if (!(empty($reporteTabla))) {
				switch ($nombreTabla) {
					case 'SaludLaboralEmpleado':
						$dato['saludLaboralEmpleado'] = $reporteTabla;
						$dato['nombreTabla'] = "Salud Laboral del Empleado";
						$this->load->view('planificacionRSE/rpSaludLaboralEmpleadoPDF', $dato);
						break;
					case 'SeguroLaboral':
						$dato['seguroLaboral'] = $reporteTabla;
						$dato['nombreTabla'] = "Seguro Laboral";
						$this->load->view('planificacionRSE/rpSeguroLaboralPDF', $dato);
						break;
					case 'Empleado_DesarrolloProfesional':
						$dato['empleado_DesarrolloProfesional'] = $reporteTabla;
						$dato['nombreTabla'] = "Desarrollo Profesional del Empleado";
						$this->load->view('planificacionRSE/rpEmpleado_DesarrolloProfesionalPDF', $dato);
						break;
					case 'ProgramasConcientizacion':
						$dato['programasConcientizacion'] = $reporteTabla;
						$dato['nombreTabla'] = "Programas de ProgramaConcientización";
						$this->load->view('planificacionRSE/rpProgramasConcientizacionPDF', $dato);
						break;
					case 'BeneficioLaboralEmpleado':
						$dato['beneficioLaboralEmpleado'] = $reporteTabla;
						$dato['nombreTabla'] = "Beneficio Laboral del Empleado";
						$this->load->view('planificacionRSE/rpBeneficioLaboralEmpleadoPDF', $dato);
						break;
					case 'Practicantes':
						$dato['practicantes'] = $reporteTabla;
						$dato['nombreTabla'] = "Practicantes";
						$this->load->view('planificacionRSE/rpPracticantesPDF', $dato);
						break;
					default:
						$mensaje = "No existen Datos";
						break;
				}
			}else{
				$mensaje = "No existen Registros";
				$this->session->set_flashdata("mensaje", $mensaje);
				$this->reportesPlanifRSEImplicacionEconomica();
			}
			
		}else{
			redirect('inicio');
		}
	}
	public function reportesPlanifRSEGobierno(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/gobierno" => "Gobierno",
			                     $inicioURL."planificacionRSE/reportesPlanifRSEGobierno" => "Reportes"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "planificacionRSE/reportesModuloGobierno_view";
			$this->load->view("plantilla", $dato);
		}else{
			redirect('inicio');
		}	
	}
	public function reporteSubModuloGobiernoPDF($nombreTabla){
        if($this->session->userdata("IdEmpresaSesion")){
        	$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
        	$usuario = $this->session->userdata("usuario");
    		$this->load->model("Empresa_Modelo");
			$empresa = $this->Empresa_Modelo->getEmpresa($IdEmpresaSesion);
			if ($nombreTabla == "SesionesConsejos") {
    			$select = '*, (SELECT NombreConsejos FROM Consejos WHERE IdConsejos = SesionesConsejos.IdConsejo) AS Consejo ';
				$reporteTabla = $this->Empresa_Modelo->getListReporteTablaConsulta($select, $nombreTabla, $IdEmpresaSesion);
    		}else{
    			if ($nombreTabla == "SucursalEmpresaDatos") {
    				$select = '*, (SELECT Nombre FROM SucursalEmpresa WHERE IdSucursal = SucursalEmpresaDatos.IdSucursal) AS Sucursal ';
    				$reporteTabla = $this->Empresa_Modelo->getListReporteTablaConsulta($select, $nombreTabla, $IdEmpresaSesion);
    			}else{
					$reporteTabla = $this->Empresa_Modelo->getListReporteTabla($nombreTabla, $IdEmpresaSesion);
					}
				}
			$dato['imgIcono'] = "imagenes/logo_icono.jpg";
			$dato['empresa'] = $empresa;
			$dato['usuario'] = $usuario;
			//print_r($reporteTabla);

			if (!(empty($reporteTabla))) {
				switch ($nombreTabla) {
					case 'Comites':
						$dato['comites'] = $reporteTabla;
						$dato['nombreTabla'] = "Comités";
						$this->load->view('planificacionRSE/rpComitesPDF', $dato);
						break;
					case 'Consejos':
						$dato['consejos'] = $reporteTabla;
						$dato['nombreTabla'] = "Consejos";
						$this->load->view('planificacionRSE/rpConsejosPDF', $dato);
						break;
					case 'SesionesConsejos':
						$dato['sesionesConsejos'] = $reporteTabla;
						$dato['nombreTabla'] = "Sesiones del Consejo";
						$this->load->view('planificacionRSE/rpSesionesConsejosPDF', $dato);
						break;
					case 'Representantes':
						$dato['representantes'] = $reporteTabla;
						$dato['nombreTabla'] = "Representantes";
						$this->load->view('planificacionRSE/rpRepresentantesPDF', $dato);
						break;
					case 'SesionesAsambleaGeneral':
						$dato['sesionesAsambleaGeneral'] = $reporteTabla;
						$dato['nombreTabla'] = "Sesiones de la Asamblea General";
						$this->load->view('planificacionRSE/rpSesionesAsambleaGeneralPDF', $dato);
						break;
					case 'SucursalEmpresa':
						$dato['sucursalEmpresa'] = $reporteTabla;
						$dato['nombreTabla'] = "Sucursales";
						$this->load->view('planificacionRSE/rpSucursalEmpresaPDF', $dato);
						break;
					case 'SucursalEmpresaDatos':
						$dato['sucursalEmpresaDatos'] = $reporteTabla;
						$dato['nombreTabla'] = "Cumplimiento de Presupuesto de Sucursales";
						$this->load->view('planificacionRSE/rpSucursalEmpresaDatosPDF', $dato);
						break;
					case 'Sindicatos':
						$dato['sindicatos'] = $reporteTabla;
						$dato['nombreTabla'] = "Sindicatos";
						$this->load->view('planificacionRSE/rpSindicatosPDF', $dato);
						break;
					default:
						$mensaje = "No existen Datos";
						break;
				}
			}else{
				$mensaje = "No existen Registros";
				$this->session->set_flashdata("mensaje", $mensaje);
				$this->reportesPlanifRSEImplicacionEconomica();
			}
			
		}else{
			redirect('inicio');
		}
	}

}

?>
