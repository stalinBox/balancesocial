<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class balanceSocial extends CI_Controller{

	function __construct(){
		parent::__construct();
	}

	function index(){				 
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
				$inicioURL."balanceSocial" => "Balance Social"
				);			
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "balanceSocial/modulosBalanceSocial";
			$this->load->view('plantilla', $dato);
		}else{
			redirect('inicio');
		}
	}
	
	public function generarDatosCalificacion($anio=''){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
				$inicioURL."balanceSocial" => "Balance Social",
				$inicioURL."balanceSocial/generarDatosCalificacion" => "Generar Datos y Calificación"
				);			
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$dato["anio"] = $anio;
 				$dato["admin"] = 1;
				$this->load->model('BalanceSocial_Modelo');
				$dato["datosTotales"] = $this->BalanceSocial_Modelo->getListBalanceSocial($IdEmpresaSesion);
				$dato["contenedor"] = "balanceSocial/generarDatosCalificacion_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "generarDatosCalificacion", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$dato["anio"] = $anio;
						$this->load->model('BalanceSocial_Modelo');
						$dato["datosTotales"] = $this->BalanceSocial_Modelo->getListBalanceSocial($IdEmpresaSesion);
						$dato["contenedor"] = "balanceSocial/generarDatosCalificacion_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["anio"] = $anio;
						$dato["contenedor"] = "balanceSocial/generarDatosCalificacion_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["anio"] = $anio;
					$dato["contenedor"] = "balanceSocial/generarDatosCalificacion_view";
					$this->load->view('plantilla', $dato);
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	/**
	 * * Se genera la carga de datos en la Tabla DatosTotales, la consulta va dirigida a el año de la fecha del sistema 
	 * @param  string $anio [Año para la creación del Registro de la Tabla DatosTotales]
	 * @return [type]       [description]
	 */
	public function ejecutarGenerarDatosTotales($anio=''){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");				
			if (empty($anio)) {
				$mensaje = "Para la Generación de Datos, ingrese un periodo válido";
				$this->session->set_flashdata('mensaje',$mensaje);
				$this->generarDatosCalificacion();
			}else{
				$obtenerPeriodoDatosBase = $this->db->query("SELECT Periodo FROM DatosBase WHERE IdEmpresa = ".$IdEmpresaSesion.";")->result();

				//if (!empty($obtenerPeriodoDatosBase) && ($obtenerPeriodoDatosBase[0]->Periodo==$anio )) {
				if (!empty($obtenerPeriodoDatosBase)) {

					if($obtenerPeriodoDatosBase[0]->Periodo  == ($anio - 1)){
						//Consultar si ya existe un registro en DatosTotales y obtener el Periodo en el caso de que exista
						//$queryExisteRegistroEnDatosTotales = $this->db->query("SELECT Periodo FROM DatosTotales WHERE IdEmpresa = ".$IdEmpresaSesion." ORDER BY Periodo ASC LIMIT 1");




						//if ($queryExisteRegistroEnDatosTotales->num_rows() > 0){
							//$periodo = $queryExisteRegistroEnDatosTotales->result();
							//SEGUNDA VUELTA
						//	$this->db->query('CALL 	SP_GENERAR_DATOS_II_VEZ('.$anio.', '.$IdEmpresaSesion.')');
						//	$mensaje = "La Generación de Datos del año ".$anio." fue ejecutada con éxito";
						//	$this->session->set_flashdata('mensaje',$mensaje);
						//	$this->generarDatosCalificacion($anio);				
						//}else{
							//PRIMERA VUELTA
							$this->db->query('CALL 	SP_GENERAR_DATOS_I_VEZ('.$anio.', '.$IdEmpresaSesion.')');
							$mensaje = "La Generación de Datos del año ".$anio." fue ejecutada con éxito";
							$this->session->set_flashdata('mensaje',$mensaje);
							$this->generarDatosCalificacion($anio);

						//}
					
					}elseif($obtenerPeriodoDatosBase[0]->Periodo < $anio){
						$this->db->query('CALL 	SP_GENERAR_DATOS_II_VEZ('.$anio.', '.$IdEmpresaSesion.')');
						$mensaje = "La Generación de Datos del año ".$anio." fue ejecutada con éxito";
						$this->session->set_flashdata('mensaje',$mensaje);
						$this->generarDatosCalificacion($anio);
					}else{
						//SALIDA DE LAS CONDICIONES	
						$mensaje2 = "El año debe ser igual al modulo de datos base ALGO PASA ???";
						$this->session->set_flashdata('mensaje',$mensaje2);
						$this->generarDatosCalificacion();
					}
				}else{
					$mensaje = "Debe existir un Periodo inicial en el modulo datos base";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->generarDatosCalificacion();
				}
			}
		}else{
			redirect('inicio');
		}
	}
	/**
	 * Ejecuta la insersión de los Numeradores y Denominadores consultando antes los Indicadores de la Empresa a ser calificados
	 * @param  string $anio [Ingresa el año en el cual se está trabajando]
	 * @return [type]       [description]
	 */
	public function ejecutarInsertarNumeradorDenominador($anio=''){
		if($this->session->userdata("IdEmpresaSesion")){
			if (empty($anio)) {
				$mensaje = "Para la Generación de Resultados, ingrese un periodo válido";
				$this->session->set_flashdata('mensaje',$mensaje);					
				$this->generarDatosCalificacion();
			}else{

				try {
					$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
					$tiempo = time();
					$fechaSistema = date("Y-m-d H:m:s", $tiempo);
					$mensaje = "";

					//Obtener el campo Numerador y Denominador
					$obtenerNumeradorDenominador = // $this->db->query("SELECT IdIndicadorEmpresa, IdIndicador, Resultado, FormulaResultado, FormulaCalificacion, Numerador, Denominador, UnidadMedida FROM IndicadoresEmpresa WHERE IdEmpresa = ".$IdEmpresaSesion." AND Periodo = ".$anio.";");

					$obtenerNumeradorDenominador = $this->db->query("SELECT * FROM IndicadoresEmpresa WHERE IdEmpresa = ".$IdEmpresaSesion." AND Periodo = ".$anio.";");

					$this->load->model('BalanceSocial_Modelo');		

					if($obtenerNumeradorDenominador->num_rows() == 0){
						$mensaje = "Verifique que haya seleccionado Indicadores a trabajar en el Periodo";
						$this->session->set_flashdata('mensaje',$mensaje);						
					}

					//Pregunto si existe un registro en DatosTotales con ese periodo
					$existeDatosTotalesPeriodo = $this->db->query("SELECT IdDatosTotales, Periodo, FechaSistema FROM DatosTotales WHERE Periodo = ".$anio." AND IdEmpresa = ".$IdEmpresaSesion." ORDER BY FechaSistema DESC LIMIT 1;");

					$obtenerPeriodoDatosBase = $this->db->query("SELECT Periodo FROM DatosBase WHERE IdEmpresa = ".$IdEmpresaSesion.";")->result();
					
					if ($existeDatosTotalesPeriodo->num_rows() > 0) {
					//Puede generar Resultados					
						$IdDT = $existeDatosTotalesPeriodo->result();
					//echo $IdDT[0]->IdDatosTotales;

						//Preguntar si existe un registro en IndicadorCalificado con el IdDatosTotales
						$existeIndicadorYaCalificadoConDatoTotal = $this->db->query("SELECT IdDatosTotales FROM IndicadorCalificado WHERE IdDatosTotales = ".$IdDT[0]->IdDatosTotales." AND IdEmpresa = ".$IdEmpresaSesion." LIMIT 1;");

						//1.- Actualizo la Tabla DatosTotales
						if ($existeIndicadorYaCalificadoConDatoTotal->num_rows() > 0) {
							if ($obtenerPeriodoDatosBase[0]->Periodo == $anio) {
								//echo "SP_GENERAR_DATOS_UPDATE_I_VEZ ejecutado";
								$this->db->query('CALL SP_GENERAR_DATOS_UPDATE_I_VEZ('.$anio.', '.$IdEmpresaSesion.', '.$IdDT[0]->IdDatosTotales.')');
							}else{
								//echo "SP_GENERAR_DATOS_UPDATE_II_VEZ ejecutado";
								$this->db->query('CALL SP_GENERAR_DATOS_UPDATE_II_VEZ('.$anio.', '.$IdEmpresaSesion.', '.$IdDT[0]->IdDatosTotales.')');
							}
						}
						
						foreach ($obtenerNumeradorDenominador->result() as $fila) {
							//Obtengo los valores del Numerador y el Denominador
							$sqlObtenerValorNumeradorDenominador = ("SELECT IdDatosTotales, ".$fila->Numerador." AS Numerador, ".$fila->Denominador." AS Denominador FROM DatosTotales WHERE Periodo = ".$anio." AND IdDatosTotales = ".$IdDT[0]->IdDatosTotales." AND IdEmpresa = ".$IdEmpresaSesion." ORDER BY FechaSistema DESC LIMIT 1;");

							$valorNumeradorDenominador = $this->db->query($sqlObtenerValorNumeradorDenominador)->row_array();

							$sqlObtenerResultado = "SELECT ".$fila->FormulaResultado." AS ValorResultado FROM DatosTotales WHERE Periodo = ".$anio." AND IdEmpresa = ".$IdEmpresaSesion." ORDER BY FechaSistema DESC LIMIT 1;";
							//echo "</br>".$sqlObtenerResultado;
							//Obtengo el Resultado del Indicador
							$obtengoResultado = $this->db->query($sqlObtenerResultado)->row_array();

							$numerador = $valorNumeradorDenominador["Numerador"];
							if ($numerador == NULL) {
								$numerador = 0;
							}
							$denominador = $valorNumeradorDenominador["Denominador"];
							if ($denominador == NULL) {
								$denominador = 0;
							}
							$valorResultado = $obtengoResultado['ValorResultado'];
							if ($valorResultado == NULL) {
								$valorResultado = 0;
							}
							//Insertar o actualizar la tabla IndicadorCalificado
							if ($existeIndicadorYaCalificadoConDatoTotal->num_rows() > 0) {
								//2.- Actualiza Resultado
								$sqlUpdateIndicadorCalificador = "UPDATE IndicadorCalificado SET ICNumerador = ".$numerador.", ICDenominador = ".$denominador.", ICResultado = ".$valorResultado.", ICCalificacion = 0 WHERE ICIndicador = ".$fila->IdIndicador." AND IdEmpresa =  ".$IdEmpresaSesion." AND IdDatosTotales = ".$valorNumeradorDenominador["IdDatosTotales"].";";
								//echo $sqlUpdateIndicadorCalificador."<br>";
								$Actualizado = $this->db->query($sqlUpdateIndicadorCalificador);	
								$mensaje = "La Actualización de Resultados del año ".$anio." fue ejecutada con éxito";
							}else{
								//Insertar
								$sqlInsertarIndicadorCalificador = "INSERT INTO IndicadorCalificado (IdIndicadorCalificado, ICIndicador, ICTextoResultado, ICFormula, ICNumerador, ICDenominador, ICResultado, ICFecha, ICCalificacion, ICComentario, UnidadMedida, IdDatosTotales, IdEmpresa, Nombre, PrincipiosACI, DimensionesACI)
								VALUES (NULL, ".$fila->IdIndicador.", '".$fila->Resultado."','".$fila->FormulaResultado."',".$numerador.", ".$denominador.", ".$valorResultado.", '".$fechaSistema."', 0, '','".$fila->UnidadMedida."',".$valorNumeradorDenominador["IdDatosTotales"].", ".$IdEmpresaSesion.",'".$fila->Nombre."','".$fila->PrincipiosACI."','".$fila->DimensionesACI."');";
								//echo $sqlInsertarIndicadorCalificador."<br>";
								$Insertado = $this->db->query($sqlInsertarIndicadorCalificador);
								$mensaje = "La Generación de Resultados del año ".$anio." fue ejecutada con éxito";
							}
						}
						
						$this->session->set_flashdata('mensaje',$mensaje);
						$this->generarDatosCalificacion($anio);
					}else{
						$mensaje = "El Periodo ".$anio." no existe";
						$this->session->set_flashdata('mensaje',$mensaje);
						$this->generarDatosCalificacion($anio);
					}
					
				}catch (Exception $e) {
					echo 'Excepción capturada: ',  $e->getMessage(), "\n";
				}			
			}

		}else{
			redirect('inicio');
		}
	}

	public function ejeutarCalificarIndicador($anio=''){
		if($this->session->userdata("IdEmpresaSesion")){
			if (empty($anio)) {
				$mensaje = "Para la Calificación de los Indicadores, ingrese un periodo válido";
				$this->session->set_flashdata('mensaje',$mensaje);					
				$this->generarDatosCalificacion();
			}else{
				$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
				$existeDatosTotalesPeriodo = $this->db->query("SELECT DISTINCT IdDatosTotales FROM IndicadorCalificado WHERE IdDatosTotales = (SELECT IdDatosTotales FROM DatosTotales WHERE Periodo = ".$anio." AND IdEmpresa = ".$IdEmpresaSesion." ORDER BY IdDatosTotales DESC LIMIT 1);");
				try {
					if ($existeDatosTotalesPeriodo->num_rows() > 0) {

						$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
						$tiempo = time();
						$fechaSistema = date("Y-m-d H:i:s", $tiempo);

						//Obtener fórmula de calificación
						$formulaCalificacion = $this->db->query("SELECT IdIndicador, FormulaCalificacion FROM IndicadoresEmpresa WHERE IdEmpresa = ".$IdEmpresaSesion." AND Periodo = ".$anio.";");
						
						foreach ($formulaCalificacion->result() as $fila){

							$sqlCalificacion = ("SELECT I.ICResultado, CASE ".$fila->FormulaCalificacion." ELSE -1 END AS NotaRespuesta FROM IndicadoresEmpresa, IndicadorCalificado I WHERE IndicadoresEmpresa.IdIndicador = I.ICIndicador AND I.ICIndicador = ".$fila->IdIndicador."  AND I.IdDatostotales = (SELECT IdDatosTotales FROM DatosTotales WHERE Periodo = ".$anio." AND IdEmpresa = ".$IdEmpresaSesion." LIMIT 1) LIMIT 1;");
							
							//echo $sqlCalificacion."</br></br>";
							$obtengoCalificacion = $this->db->query($sqlCalificacion);
							$resultado = $obtengoCalificacion->row_array();
							
						//Actualizo la tabla indicadorCalificado en el campo ICCalificacion
							$sqlUpdateCalificacion = "UPDATE IndicadorCalificado SET ICCalificacion = ".$resultado['NotaRespuesta']." WHERE ICIndicador = ".$fila->IdIndicador." AND IdEmpresa = ".$IdEmpresaSesion." AND IdDatosTotales = (SELECT IdDatosTotales FROM DatosTotales WHERE Periodo = ".$anio." ORDER BY IdDatosTotales DESC LIMIT 1);";
							
							$actualizado = $this->db->query($sqlUpdateCalificacion);
						}
						$mensaje = "La Calificación de los Indicadores del año ".$anio." fue ejeutada con éxito";
						$this->session->set_flashdata('mensaje',$mensaje);					
						$this->generarDatosCalificacion($anio);			


					}else{						
						$mensaje = "Los Resultados no han sido Generados o el Periodo no Existe";
						$this->session->set_flashdata('mensaje',$mensaje);					
						$this->generarDatosCalificacion($anio);	
					}

				} catch (Exception $e) {
					echo 'Excepción capturada: ',  $e->getMessage(), "\n";
				}
			}			
		}else{
			redirect('inicio');
		}
	}
	public function elimiarDatosTotalesGenerados(){
		$this->load->model('BalanceSocial_Modelo'); 		          	
		$id =  $_POST['IdDatosTot']; 
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->BalanceSocial_Modelo->deleteBalanceSocial($id, $IdEmpresaSesion); 
	}

	/**
	 * Reportes Informes Balance Social
	 */
	public function listaInformesBalanceSocialPeriodo(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
								$inicioURL."balanceSocial" => "Balance Social",
								$inicioURL."balanceSocial/listaInformesBalanceSocialPeriodo" => "Informe de Balance Social"
								);
			$dato["ubicacionURL"] = $relativeURL;

			$this->load->model('IndicadoresEmpresa_Modelo');
			$dato["registrosDatosTotales"] = $this->IndicadoresEmpresa_Modelo->getListDatosTotales($IdEmpresaSesion);
			$dato["contenedor"] = "balanceSocial/listaInformesBalanceSocialPeriodo_view";
			$this->load->view('plantilla', $dato);
		}else{
			redirect('inicio');
		}
	}

	public function informeIndicadoresCuantitativosCalificados($IdDatosTotales, $periodo){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");			
			$this->load->model('BalanceSocial_Modelo');
			$this->load->model('ImagenInstitucional_Modelo');
			$this->load->model('Empresa_Modelo');
			$tiempo = time();
			$fechaSistema = date("Y-m-d H:i:s", $tiempo);
			$dato['fechaSistema'] = $fechaSistema;
			$dato['periodo'] = $periodo;
			$dato['imagenesInstitucionales'] = $this->ImagenInstitucional_Modelo->getListImagenInstitucinalPeriodo($periodo, $IdEmpresaSesion);
			$dato['indicadoresCuantitativoCalifiacadoEmpresa'] = $this->BalanceSocial_Modelo->getListIndicadorCuantitativoCalificadoAnio($IdDatosTotales, $IdEmpresaSesion);
			$dato['nombreEmpresa'] = $this->Empresa_Modelo->getNameEmpresa($IdEmpresaSesion);
			$this->load->view('balanceSocial/informeIndicadoresCuantitativosCalificados', $dato);
		}else{
			redirect('inicio');
		}
	}


	public function indicadorCuantitativoResultadoPDF($IdDatosTotales, $periodo){
		if($this->session->userdata("IdEmpresaSesion")){
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
		$this->load->model('BalanceSocial_Modelo');
		$this->load->model('ImagenInstitucional_Modelo');
		$this->load->model('Empresa_Modelo');
		$tiempo = time();
		$fechaSistema = date("Y-m-d H:i:s", $tiempo);
		$dato['fechaSistema'] = $fechaSistema;
		$dato['periodo'] = $periodo;
		$dato['imagenesInstitucionales'] = $this->ImagenInstitucional_Modelo->getListImagenInstitucinalPeriodo($periodo, $IdEmpresaSesion);
		$dato['indicadoresCuantitativoCalifiacadoEmpresa'] = $this->BalanceSocial_Modelo->getListIndicadorCuantitativoCalificadoAnio($IdDatosTotales, $IdEmpresaSesion);
		$dato['nombreEmpresa'] = $this->Empresa_Modelo->getNameEmpresa($IdEmpresaSesion);
		$this->load->view('impresion/indicadoresCuantitativosCalificadosEmpresaPDF', $dato);

			}else{
				redirect('inicio');
			}
	}



	/**
	 * Subir Balance General en formato CSV
	 */
	public function balancesGenerales(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
								$inicioURL."balanceSocial" => "Balance Social",
								$inicioURL."balanceSocial/subirBalance" => "Importar Balance General"
								);
			$dato["ubicacionURL"] = $relativeURL;

			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$dato["admin"] = 1;
				$this->load->model('BalanceSocial_Modelo');
				$dato["balancesGenerales"] = $this->BalanceSocial_Modelo->getListBalanceGeneral($IdEmpresaSesion);
				$dato["contenedor"] = "balanceSocial/balancesGenerales_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "balancesGenerales", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$dato["anio"] = $anio;
						$this->load->model('BalanceSocial_Modelo');
						$dato["balancesGenerales"] = $this->BalanceSocial_Modelo->getListBalanceGeneral($IdEmpresaSesion);
						$dato["contenedor"] = "balanceSocial/balancesGenerales_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "balanceSocial/balancesGenerales_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["anio"] = $anio;
					$dato["contenedor"] = "balanceSocial/balancesGenerales_view";
					$this->load->view('plantilla', $dato);
				}
 			}			
		}else{
			redirect('inicio');
		}
	}

	public function subirBalance(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$dato["admin"] = 1;			
				$dato["titulo"] = "Nuevo Balance General";
				$dato["accion"] = "Nuevo";
				$dato["contenedor"] = "balanceSocial/balanceGeneral_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "balancesGenerales", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {						
						$dato["titulo"] = "Nuevo Balance General";
						$dato["accion"] = "Nuevo";
						$dato["contenedor"] = "balanceSocial/balanceGeneral_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->balancesGenerales();
					}
				}else{
					$this->balancesGenerales();
				}
 			}
			
		}else{
			redirect('inicio');
		}
	}

	public function guardarBalanceGeneral(){
		$this->form_validation->set_rules('txtNombre','Nombre','trim|required');		
		$this->form_validation->set_rules('txtFechaRegistro','Fecha de Registro','trim|required');
		$this->form_validation->set_rules('txtPeriodo','Periodo','trim|required|integer');
		$accion = $_POST['accion'];
		$id = $_POST['id'];
		if ($this->form_validation->run() == false) {
			if ($accion == "Editar") {
				$this->editarCertificacion($id);				
			}else{
				$this->subirBalance();
			}
		}else{
			$this->load->model('BalanceSocial_Modelo');
			$tiempo = time();
			$txtNombre = $_POST["txtNombre"];			
			$txtFechaRegistro = $_POST["txtFechaRegistro"];
			$txtPeriodo = $_POST["txtPeriodo"];
			$txtFechaSistema = date('Y-m-d H:i:s');
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");

			$nombreFichero =  $_FILES["archivo"]["name"];
			//obtengo la dirección temporal
			$fichero_tmp = $_FILES["archivo"]["tmp_name"];
			$tipo = $_FILES["archivo"]["type"];

			if(!empty($_FILES['archivo']['tmp_name']) && file_exists($_FILES['archivo']['tmp_name'])) {
				$tipo = $_FILES["archivo"]["type"];
				if ($tipo == "text/csv") {

					$insertMaestroArray = array(					
						'Nombre' => $txtNombre,
						'Archivo' => $nombreFichero,
						'FechaRegistro' => $txtFechaRegistro,
						'Periodo' => $txtPeriodo,
						'FechaSistema' => $txtFechaSistema,
						'IdEmpresa' => $IdEmpresaSesion
						);

					$insertMaestro = $this->BalanceSocial_Modelo->insertBalanceGeneralMaestro($insertMaestroArray);
					
 					if ($insertMaestro != NULL OR $insertMaestro != 0) {
						$registros = 0;
						$handle = fopen($fichero_tmp, "r");  
						while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
							$registros++; 
							$num = count($data);  
							$cadena = "INSERT INTO BalanceDetalle VALUES(null, '".$insertMaestro."', ";  
							for ($c=0; $c < $num; $c++) {  
								 if ($c ==($num-1)) 
						              $cadena = $cadena."'".$data[$c] . "'"; 
						        else 
						              $cadena = $cadena."'".$data[$c] . "',"; 
							}

							$cadena = $cadena.");";
							$this->db->query($cadena);
						} 
						fclose($handle);

						$mensaje = $registros." Registros insertados con éxito";
						$this->session->set_flashdata('mensaje',$mensaje);
						redirect('balanceSocial/balancesGenerales');
						//$this->balancesGenerales();
					}else{						
						$mensaje = "El archivo no se ha podido cargar, verifique el tipo de archivo";
						$this->session->set_flashdata('mensaje',$mensaje);
						$this->subirBalance();
					}
				}else{					
					$mensaje = "El archivo debe ser de tipo .CSV";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->subirBalance();
				}
			}else{
				$mensaje = "Archivo no seleccionado";
				$this->session->set_flashdata('mensaje',$mensaje);
				$this->subirBalance();
			}

		
		}
	}

	public function eliminarBalanceGeneral(){
		$this->load->model('BalanceSocial_Modelo'); 		          	
		$BalanceGeneral 		= json_decode($this->input->post('MiBalanceGeneral'));
		$id          = base64_decode($BalanceGeneral->Id);
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->BalanceSocial_Modelo->deleteBalanceGeneral($id, $IdEmpresaSesion); 
	}
}

?>