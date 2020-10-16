<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//Controlador 
class indicadorEmpresa extends CI_Controller {

	function __construct()	{
		parent::__construct();				
	}
	//Función para cargar el inicio
	public function index()	{
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."indicadorEmpresa" => "Análisis de Indicadores"
			                    );						
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "indicadorEmpresa/modulosIndicadoresEmpresa";
			$this->load->view("plantilla", $dato);
		}else{
			redirect('inicio');
		}
	}
	public function indicadoresAdicionModulos()	{
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa" => "Empresa",
			                     $inicioURL."indicadorEmpresa/indicadoresAdicionModulos" => "Indicadores"
			                    );						
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "indicadorEmpresa/modulosIndicadoresAdicionEmpresa";
			$this->load->view("plantilla", $dato);
		}else{
			redirect('inicio');
		}
	}
	/**
	 * Indicadores Cualitativos
	 */
	public function indicadoresCualitativosModulos(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."indicadorEmpresa" => "Análisis de Indicadores",
			                     $inicioURL."indicadorEmpresa/indicadoresCualitativosModulos" => "Indicadores Cualitativos"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "indicadorEmpresa/modulosIndicadoresCualitativos";  
			$this->load->view("plantilla", $dato);
		}else{
			redirect('inicio');
		}
	}
	public function indicadoresCualitativos(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$this->load->model('Indicador_Modelo');
			$dato['indicadoresCuantitativoEmpresa'] = $this->Indicador_Modelo->getListIndicadorCualitativo(); 
			$dato["contenedor"] = "indicadorEmpresa/indicadoresCualitativosEmpresa_view";
			$this->load->view('plantilla', $dato);			
		}else{
			redirect('inicio');
		}
	}
	public function nuevoIndicadorCualitativo(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$dato["contenedor"] = "indicadores/indicadoresCualitativos_new_edit";
			$dato["titulo"] = "Nuevo Indicador Cualitativo";
			$dato["accion"] = "Nuevo";
			$this->load->view('plantilla', $dato);
		}else{
			redirect('inicio');
		}
	}
	public function editarIndicadorCualitativo($IdEditar){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$this->load->model('Indicador_Modelo');
			$dato['indicadorCualitativo'] = $this->Indicador_Modelo->getIndicadorCualitativo($IdEditar); 
			$dato["contenedor"] = "indicadores/indicadoresCualitativos_new_edit";
			$dato["titulo"] = "Editar Indicador Cualitativo";
			$dato["accion"] = "Editar";
			$this->load->view('plantilla', $dato);
		}else{
			redirect('inicio');
		}
	}
	public function guardarIndicadorCualitativo(){
		$this->form_validation->set_rules('txtFase','Fase','trim|required'); 		
		$this->form_validation->set_rules('txtIndicador','Indicador','trim|required');	
		$this->form_validation->set_rules('txtPregunta','Pregunta','trim|required');
		$accion = $_POST['accion'];
		$id = $_POST['id'];			
		if ($this->form_validation->run() == false) {
			if ($accion == "Editar") {
				$this->editarIndicadorCualitativo($id);				
			}else{
				$this->nuevoIndicadorCualitativo();
			}
		}else{
			$this->load->model('Indicador_Modelo');
			$tiempo = time();
			$txtFase = $_POST["txtFase"];
			$txtIndicador = $_POST["txtIndicador"];			
			$txtPregunta = $_POST["txtPregunta"];
			$txtCodigoGRI = $_POST["txtCodigoGRI"];
			$selectDimension = $_POST["selectDimension"];
			$selectSubDimension = $_POST["selectSubDimension"];			
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($_POST["accion"] == "Editar"){
				$updateIndicadorCualitativo = array(					
					'Fase' => $txtFase,
					'IndicadorCualitativo' => $txtIndicador,					
					'Pregunta' => $txtPregunta,
					'CodigoGRI' => $txtCodigoGRI,
					'Dimension' => $selectDimension,
					'SubDimension' => $selectSubDimension
					);
				if($this->Indicador_Modelo->updateIndicadorCualitativo($id, $updateIndicadorCualitativo)){					
					$mensaje = "El indicador ha modificado con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarIndicadorCualitativo($id);				
				}else{
					$mensaje = "El indicador no se ha modificado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarIndicadorCualitativo($id);				
				}
			}else{
				$insertIndicadorCualitativo = array(
					'Fase' => $txtFase,
					'IndicadorCualitativo' => $txtIndicador,					
					'Pregunta' => $txtPregunta,
					'CodigoGRI' => $txtCodigoGRI,
					'Dimension' => $selectDimension,
					'SubDimension' => $selectSubDimension
					);
				if($this->Indicador_Modelo->insertIndicadorCualitativo($insertIndicadorCualitativo)){
					$mensaje = "El indicador se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoIndicadorCualitativo();				
				}else{
					$mensaje = "El indicador no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoIndicadorCualitativo();				
				}
			}
		}
	}
	public function indicadorCualitativoPDF(){
        if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$this->load->model('Indicador_Modelo');
			$dato['indicadoresCualitativos'] = $this->Indicador_Modelo->getListIndicadorCualitativo(); 
			//$dato["contenedor"] = "impresion/imprimirIndicadoresCualitativos";
			$dato["titulo"] = "Imprimir Indicador Cualitativo";
			$dato["accion"] = "Editar";
			$this->load->view('impresion/imprimirIndicadoresCualitativos', $dato);
		}else{
			redirect('inicio');
		}
	}
	/**
	* Indicadores Cuantitativos
	**/	
	public function indicadoresCuantitativosModulos(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."indicadorEmpresa" => "Análisis de Indicadores",
			                     $inicioURL."indicadorEmpresa/indicadoresCuantitativosModulos" => "Análisis de Cuantitativos"
			                    );						
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "indicadorEmpresa/modulosIndicadoresCuantitativos";  
			$this->load->view("plantilla", $dato);
		}else{
			redirect('inicio');
		}
	}
	
	public function indicadoresCuantitativosEmpresa(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa" => "Empresa",
			                     $inicioURL."indicadorEmpresa/indicadoresAdicionModulos" => "Indicadores",
			                     $inicioURL."indicadorEmpresa/indicadoresCuantitativosEmpresa" => "Indicadores Cuantitativos"
			                    );						
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('IndicadoresEmpresa_Modelo');
				$dato['indicadoresCuantitativoEmpresa'] = $this->IndicadoresEmpresa_Modelo->getListIndicadorCuantitativoSeleccionadosEmpresa($IdEmpresaSesion);  
				$dato["admin"] = 1;
				$dato["contenedor"] = "indicadorEmpresa/indicadoresCuantitativosEmpresa_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "indicadoresCuantitativosEmpresa", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('IndicadoresEmpresa_Modelo');
						$dato['indicadoresCuantitativoEmpresa'] = $this->IndicadoresEmpresa_Modelo->getListIndicadorCuantitativoSeleccionadosEmpresa($IdEmpresaSesion);  
						$dato["contenedor"] = "indicadorEmpresa/indicadoresCuantitativosEmpresa_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "indicadorEmpresa/indicadoresCuantitativosEmpresa_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "indicadorEmpresa/indicadoresCuantitativosEmpresa_view";
					$this->load->view('plantilla', $dato);
				}
 			}			
		}else{
			redirect('inicio');
		}
	}

	public function guardarIndicadoresSeleccionados(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$rutaIndicador = $_POST['rutaRegreso'];
			//Obtener los ID de los Indicadores seleccionados
			if (isset($_POST['checkPermisoPerfil'])) {
				$indicadoresSeleccionados = $_POST['checkPermisoPerfil'];
				$this->load->model("IndicadoresEmpresa_Modelo");
				//Enviar la matriz seleccionada al modelo de carga en IndicadoresEmpresa_Modelo						
				$guardarIndicadoresSeleccionados = $this->IndicadoresEmpresa_Modelo->updateIndicadoresSeleccionados($IdEmpresaSesion, $indicadoresSeleccionados);				
				if($guardarIndicadoresSeleccionados){
					$mensaje = "Los Indicadores han sido registrados Correctamente";
					$this->session->set_flashdata('mensaje',$mensaje);
					if ($rutaIndicador) {
						redirect('indicador/selectIndicadorCuantitativo/1');
					}else{
						redirect('indicador/selectIndicadorCuantitativo');
					}					
				}else{
					$mensaje = "Ningún Indicador ha sido registrado";
					$this->session->set_flashdata('mensaje',$mensaje);
					if ($rutaIndicador) {
						redirect('indicador/selectIndicadorCuantitativo/1');
					}else{
						redirect('indicador/selectIndicadorCuantitativo');
					}					
				} 
			}else{
				$mensaje = "Ningún Indicador ha sido seleccionado";
				$this->session->set_flashdata('mensaje',$mensaje);
				if ($rutaIndicador) {
						redirect('indicador/selectIndicadorCuantitativo/1');
					}else{
						redirect('indicador/selectIndicadorCuantitativo');
					}
			}  
		}else{
			redirect('inicio');
		}
	}	
	public function indicadoresCuantitativosEmpresaCalificacion(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."indicadorEmpresa" => "Análisis de Indicadores",
			                     $inicioURL."indicadorEmpresa/indicadoresCuantitativosModulos" => "Análisis de Cuantitativos",
			                     $inicioURL."indicadorEmpresa/indicadoresCuantitativosEmpresaCalificacion" => "Indicadores Cuantitativos Calificados"
			                    );						
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('IndicadoresEmpresa_Modelo');
				$dato['admin'] = 1;
				$dato['indicadorCuantitativoCalificadoEmpresa'] = $this->IndicadoresEmpresa_Modelo->getListIndicadorCuantitativoCalificadoJOIN($IdEmpresaSesion);  
				$dato["contenedor"] = "indicadorEmpresa/indicadoresCuantitativosCalificadoEmpresa_view";
				$this->load->view('plantilla', $dato);				
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				//Permisos de Edición, agregar comentarios
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "indicadoresCuantitativosEmpresaCalificacion", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('IndicadoresEmpresa_Modelo');
						$dato['indicadorCuantitativoCalificadoEmpresa'] = $this->IndicadoresEmpresa_Modelo->getListIndicadorCuantitativoCalificadoJOIN($IdEmpresaSesion);  
						$dato["contenedor"] = "indicadorEmpresa/indicadoresCuantitativosCalificadoEmpresa_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "indicadorEmpresa/indicadoresCuantitativosCalificadoEmpresa_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "indicadorEmpresa/indicadoresCuantitativosCalificadoEmpresa_view";
					$this->load->view('plantilla', $dato);
				}
 			}
		}else{
			redirect('inicio');
		}
	}
	
	public function nuevoIndicadorCuantitativo(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$dato["contenedor"] = "indicadores/indicadoresCuantitativos_new_edit";
			$dato["titulo"] = "Nuevo Indicador Cualitativo";
			$dato["accion"] = "Nuevo";
			$this->load->view('plantilla', $dato);
		}else{
			redirect('inicio');
		}
	}
	public function editarIndicadorCuantitativo($IdEditarCuantitativo){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('IndicadoresEmpresa_Modelo');
				$dato['indicadorCualitativoEmpresa'] = $this->IndicadoresEmpresa_Modelo->getIndicadorCuantitativoEmpresa($IdEditarCuantitativo); 			
				$dato["contenedor"] = "indicadores/indicadoresCuantitativosEmpresa_new_edit";
				$dato["titulo"] = "Editar Indicador Cuantitativo";
				$dato["accion"] = "Editar";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "indicadoresCuantitativosEmpresa", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('IndicadoresEmpresa_Modelo');
						$dato['indicadorCualitativoEmpresa'] = $this->IndicadoresEmpresa_Modelo->getIndicadorCuantitativoEmpresa($IdEditarCuantitativo); 			
						$dato["contenedor"] = "indicadores/indicadoresCuantitativosEmpresa_new_edit";
						$dato["titulo"] = "Editar Indicador Cuantitativo";
						$dato["accion"] = "Editar";
						$this->load->view('plantilla', $dato);
					}else{
						$this->indicadoresCuantitativosEmpresa();
					}
				}else{
					$this->indicadoresCuantitativosEmpresa();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function guardarIndicadorCuantitativo(){
		$this->form_validation->set_rules('txtNombre','Nombre','trim|required'); 		
		$this->form_validation->set_rules('txtCriterioIndicador','Criterio','trim|required'); 		
		$this->form_validation->set_rules('txtResultado','Resultado','trim|required'); 		
		$this->form_validation->set_rules('txtDimension','Dimensión','trim|required'); 		
		$this->form_validation->set_rules('txtSubDimension','Sub-Dimensión','trim|required'); 		
		$this->form_validation->set_rules('txtPrincipiosSEPS','Principios SEPS','trim|required');
		$this->form_validation->set_rules('txtPrincipiosPactoMundial','Principios Pacto Mundial','trim|required'); 		
		$this->form_validation->set_rules('txtGrupoInteres','Grupo de Interes','trim|required'); 		
		$this->form_validation->set_rules('txtHerramienta','Herramienta','trim|required'); 		
		$this->form_validation->set_rules('txtCodigosGRI','Codigos GRI','trim|required'); 		
		$this->form_validation->set_rules('txtCodigosISO2600','Codigos ISO2600','trim|required'); 		
		$this->form_validation->set_rules('txtArea','Área','trim|required');
		$this->form_validation->set_rules('txtModulo','Módulo','trim|required'); 		
		$this->form_validation->set_rules('txtSubModulo','Sub-Módulo','trim|required'); 		
		$this->form_validation->set_rules('txtTabla','Tabla','trim|required'); 		
		$this->form_validation->set_rules('txtFormulaResultado','Formula de Resultado','trim|required');
		$this->form_validation->set_rules('txtMeta','Meta','trim|required'); 		
		$this->form_validation->set_rules('txtDesde0','Desde0','trim|required');
		$this->form_validation->set_rules('txtHasta0','Hasta0','trim|required'); 		
		$this->form_validation->set_rules('txtDesc0','Desc0','trim|required'); 		
		$this->form_validation->set_rules('txtNota0','Nota0','trim|required'); 		
		$this->form_validation->set_rules('txtDesde1','Desde1','trim|required'); 		
		$this->form_validation->set_rules('txtHasta1','Hasta1','trim|required'); 		
		$this->form_validation->set_rules('txtDesc1','Desc1','trim|required');
		$this->form_validation->set_rules('txtNota1','Nota1','trim|required'); 		
		$this->form_validation->set_rules('txtDesde2','Desde2','trim|required'); 		
		$this->form_validation->set_rules('txtHasta2','Hasta2','trim|required'); 		
		$this->form_validation->set_rules('txtDesc2','Desc2','trim|required'); 		
		$this->form_validation->set_rules('txtNota2','Nota2','trim|required'); 		
		$this->form_validation->set_rules('txtDesde3','Desde3','trim|required');
		$this->form_validation->set_rules('txtHasta3','Hasta3','trim|required'); 		
		$this->form_validation->set_rules('txtDesc3','Desc3','trim|required'); 		
		$this->form_validation->set_rules('txtNota3','Nota3','trim|required'); 		
		$this->form_validation->set_rules('txtDesde4','Desde4','trim|required'); 		
		$this->form_validation->set_rules('txtHasta4','Hasta4','trim|required'); 		
		$this->form_validation->set_rules('txtDesc4','Desc4','trim|required');
		$this->form_validation->set_rules('txtNota4','Nota4','trim|required'); 		
		$this->form_validation->set_rules('txtDesde5','Desde5','trim|required'); 		
		$this->form_validation->set_rules('txtHasta5','Hasta5','trim|required'); 		
		$this->form_validation->set_rules('txtDesc5','Desc5','trim|required'); 		
		$this->form_validation->set_rules('txtNota5','Nota5','trim|required'); 		
		$this->form_validation->set_rules('txtFormulaCalificacion','Formula de Calificación','trim|required'); 		

		$accion = $_POST['accion'];
		$id = $_POST['id'];			
		if ($this->form_validation->run() == false) {
			if ($accion == "Editar") {
				$this->editarIndicadorCuantitativo($id);				
			}else{
				$this->nuevoIndicadorCuantitativo();
			}
		}else{
			$this->load->model('IndicadoresEmpresa_Modelo');
			$tiempo = time();
			$txtIdIndicador = $_POST["txtIdIndicador"];
			$txtNombre = $_POST["txtNombre"];
			$txtCriterioIndicador = $_POST["txtCriterioIndicador"];
			$txtResultado = $_POST["txtResultado"];
			$txtDimension = $_POST["txtDimension"];
			$txtSubDimension = $_POST["txtSubDimension"];
			$txtPrincipiosSEPS = $_POST["txtPrincipiosSEPS"];
			$txtPrincipiosPactoMundial = $_POST["txtPrincipiosPactoMundial"];
			$txtGrupoInteres = $_POST["txtGrupoInteres"];
			$txtHerramienta = $_POST["txtHerramienta"];
			$txtCodigosGRI = $_POST["txtCodigosGRI"];
			$txtCodigosISO2600 = $_POST["txtCodigosISO2600"];
			$txtArea = $_POST["txtArea"];
			$txtModulo = $_POST["txtModulo"];
			$txtSubModulo = $_POST["txtSubModulo"];
			$txtTabla = $_POST["txtTabla"];
			$txtFormulaResultado = $_POST["txtFormulaResultado"];
			$txtMeta = $_POST["txtMeta"];
			$txtDesde0 = $_POST["txtDesde0"];
			$txtHasta0 = $_POST["txtHasta0"];
			$txtDesc0 = $_POST["txtDesc0"];
			$txtNota0 = $_POST["txtNota0"];
			$txtDesde1 = $_POST["txtDesde1"];
			$txtHasta1 = $_POST["txtHasta1"];
			$txtDesc1 = $_POST["txtDesc1"];
			$txtNota1 = $_POST["txtNota1"];
			$txtDesde2 = $_POST["txtDesde2"];
			$txtHasta2 = $_POST["txtHasta2"];
			$txtDesc2 = $_POST["txtDesc2"];
			$txtNota2 = $_POST["txtNota2"];
			$txtDesde3 = $_POST["txtDesde3"];
			$txtHasta3 = $_POST["txtHasta3"];
			$txtDesc3 = $_POST["txtDesc3"];
			$txtNota3 = $_POST["txtNota3"];
			$txtDesde4 = $_POST["txtDesde4"];
			$txtHasta4 = $_POST["txtHasta4"];
			$txtDesc4 = $_POST["txtDesc4"];
			$txtNota4 = $_POST["txtNota4"];
			$txtDesde5 = $_POST["txtDesde5"];
			$txtHasta5 = $_POST["txtHasta5"];
			$txtDesc5 = $_POST["txtDesc5"];
			$txtNota5 = $_POST["txtNota5"];
			$txtFormulaCalificacion = $_POST["txtFormulaCalificacion"];
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($_POST["accion"] == "Editar"){
				$updateIndicadorCuantitativo = array(					
					'IdIndicador' => $txtIdIndicador,
					'Nombre' => $txtNombre,
					'CriterioIndicador' => $txtCriterioIndicador,
					'Resultado' => $txtResultado,
					'Dimension' => $txtDimension,
					'SubDimension' => $txtSubDimension,
					'PrincipiosSEPS' => $txtPrincipiosSEPS,
					'PrincipiosPactoMundial' => $txtPrincipiosPactoMundial,
					'GrupoInteres' => $txtGrupoInteres,
					'Herramienta' => $txtHerramienta,
					'CodigosGRI' => $txtCodigosGRI,
					'CodigosISO2600' => $txtCodigosISO2600,
					'Area' => $txtArea,
					'Modulo' => $txtModulo,
					'SubModulo' => $txtSubModulo,
					'Tabla' => $txtTabla,
					'FormulaResultado' => $txtFormulaResultado,
					'Meta' => $txtMeta,
					'Desde0' => $txtDesde0,
					'Hasta0' => $txtHasta0,
					'Desc0' => $txtDesc0,
					'Nota0' => $txtNota0,
					'Desde1' => $txtDesde1,
					'Hasta1' => $txtHasta1,
					'Desc1' => $txtDesc1,
					'Nota1' => $txtNota1,
					'Desde2' => $txtDesde2,
					'Hasta2' => $txtHasta2,
					'Desc2' => $txtDesc2,
					'Nota2' => $txtNota2,
					'Desde3' => $txtDesde3,
					'Hasta3' => $txtHasta3,
					'Desc3' => $txtDesc3,
					'Nota3' => $txtNota3,
					'Desde4' => $txtDesde4,
					'Hasta4' => $txtHasta4,
					'Desc4' => $txtDesc4,
					'Nota4' => $txtNota4,
					'Desde5' => $txtDesde5,
					'Hasta5' => $txtHasta5,
					'Desc5' => $txtDesc5,
					'Nota5' => $txtNota5,
					'FormulaCalificacion' => $txtFormulaCalificacion,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->IndicadoresEmpresa_Modelo->updateIndicadorCuantitativoEmpresa($id, $updateIndicadorCuantitativo)){					
					$mensaje = "El Indicador de la Empresa ha modificado con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarIndicadorCuantitativo($id);				
				}else{
					$mensaje = "El Indicador de la Empresa no se ha modificado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarIndicadorCuantitativo($id);				
				}
			}else{
				$insertIndicadorCuantitativo = array(
					'IdIndicador' => $txtIdIndicador,
					'Nombre' => $txtNombre,
					'CriterioIndicador' => $txtCriterioIndicador,
					'Resultado' => $txtResultado,
					'Dimension' => $txtDimension,
					'SubDimension' => $txtSubDimension,
					'PrincipiosSEPS' => $txtPrincipiosSEPS,
					'PrincipiosPactoMundial' => $txtPrincipiosPactoMundial,
					'GrupoInteres' => $txtGrupoInteres,
					'Herramienta' => $txtHerramienta,
					'CodigosGRI' => $txtCodigosGRI,
					'CodigosISO2600' => $txtCodigosISO2600,
					'Area' => $txtArea,
					'Modulo' => $txtModulo,
					'SubModulo' => $txtSubModulo,
					'Tabla' => $txtTabla,
					'FormulaResultado' => $txtFormulaResultado,
					'Meta' => $txtMeta,
					'Desde0' => $txtDesde0,
					'Hasta0' => $txtHasta0,
					'Desc0' => $txtDesc0,
					'Nota0' => $txtNota0,
					'Desde1' => $txtDesde1,
					'Hasta1' => $txtHasta1,
					'Desc1' => $txtDesc1,
					'Nota1' => $txtNota1,
					'Desde2' => $txtDesde2,
					'Hasta2' => $txtHasta2,
					'Desc2' => $txtDesc2,
					'Nota2' => $txtNota2,
					'Desde3' => $txtDesde3,
					'Hasta3' => $txtHasta3,
					'Desc3' => $txtDesc3,
					'Nota3' => $txtNota3,
					'Desde4' => $txtDesde4,
					'Hasta4' => $txtHasta4,
					'Desc4' => $txtDesc4,
					'Nota4' => $txtNota4,
					'Desde5' => $txtDesde5,
					'Hasta5' => $txtHasta5,
					'Desc5' => $txtDesc5,
					'Nota5' => $txtNota5,
					'FormulaCalificacion' => $txtFormulaCalificacion,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->IndicadoresEmpresa_Modelo->insertIndicadorCuantitativoEmpresa($insertIndicadorCuantitativo)){
					$mensaje = "El Indicador de la Empresa se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoIndicadorCuantitativo();				
				}else{
					$mensaje = "El Indicador de la Empresa no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoIndicadorCuantitativo();				
				}
			}
		}
	}
	public function eliminarIndicadorCuantitativo(){
		$this->load->model('IndicadoresEmpresa_Modelo'); 		          	
		$id = $_POST["idIndCuant"];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->IndicadoresEmpresa_Modelo->deleteIndicadorCuantitativoEmpresa($id, $IdEmpresaSesion); 
	}
	/**
	 * Indicadores Cuantitativos Calificados
	 */
	public function editarIndicadorCuantitativoCalificado($IdCuantitativo){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('IndicadoresEmpresa_Modelo');
				$dato['indicadorCuantitativoCalifiacadoEmpresa'] = $this->IndicadoresEmpresa_Modelo->getIndicadorCuantitativoCalificadoEmpresa($IdCuantitativo, $IdEmpresaSesion);
				$dato["contenedor"] = "indicadorEmpresa/indicadorCuantitativoCalificadoEmpresa_new_edit";
				$dato["titulo"] = "Editar Indicador Cuantitativo Calificado";
				$dato["accion"] = "Editar";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "indicadoresCuantitativosEmpresaCalificacion", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('IndicadoresEmpresa_Modelo');
						$dato['indicadorCuantitativoCalifiacadoEmpresa'] = $this->IndicadoresEmpresa_Modelo->getIndicadorCuantitativoCalificadoEmpresa($IdCuantitativo, $IdEmpresaSesion);
						$dato["contenedor"] = "indicadorEmpresa/indicadorCuantitativoCalificadoEmpresa_new_edit";
						$dato["titulo"] = "Editar Indicador Cuantitativo Calificado";
						$dato["accion"] = "Editar";
						$this->load->view('plantilla', $dato);
					}else{
						$this->indicadoresCuantitativosEmpresaCalificacion();
					}
				}else{
					$this->indicadoresCuantitativosEmpresaCalificacion();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function guardarIndicadorCuantitativoCalificado(){
		$accion = $_POST['accion'];
		$id = $_POST['id'];			
		
		$this->load->model('IndicadoresEmpresa_Modelo');
		$tiempo = time();
		$txtIdIndicador = $_POST["txtIdIndicador"];
		$txtICComentario = $_POST["txtICComentario"];			
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
		
		if($this->IndicadoresEmpresa_Modelo->updateIndicadorCuantitativoCalificadoEmpresa($id, $txtIdIndicador, $txtICComentario, $IdEmpresaSesion)){
			$mensaje = "El Indicador de la Empresa ha modificado con éxito";
			$this->session->set_flashdata('mensaje',$mensaje);
			$this->editarIndicadorCuantitativoCalificado($id);				
		}else{
			$mensaje = "El Indicador de la Empresa no se ha modificado, verfique los datos ingresados";
			$this->session->set_flashdata('mensaje',$mensaje);
			$this->editarIndicadorCuantitativoCalificado($id);				
		}		
	}
	//Para Imprimir 
	public function impIndicadorCuantitativoResultado(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$anio = 2017;
			$this->load->model('IndicadoresEmpresa_Modelo');
			$dato['indicadoresCuantitativoCalifiacadoEmpresa'] = $this->IndicadoresEmpresa_Modelo->getListIndicadorCuantitativoCalificadoAnio($anio, $IdEmpresaSesion);
			//$dato["contenedor"] = "indicadorEmpresa/imprimirIndCuantitativosCalificados";
			$this->load->view('indicadorEmpresa/imprimirIndCuantitativosCalificados', $dato);
		}else{
			redirect('inicio');
		}
	}
	//* *//
	public function indicadorCuantitativoResultadoPDF(){
		if($this->session->userdata("IdEmpresaSesion")){

/*
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$anio = 2017;
			$this->load->model('IndicadoresEmpresa_Modelo');
			$dato['indicadoresCuantitativoCalifiacadoEmpresa'] = $this->IndicadoresEmpresa_Modelo->getListIndicadorCuantitativoCalificadoAnio($anio, $IdEmpresaSesion);
			//$dato["contenedor"] = "indicadorEmpresa/imprimirIndCuantitativosCalificados";
$this->load->view('impresion/indicadoresCuantitativosCalificadosEmpresaPDF', $dato);

*/


$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
$this->load->model('BalanceSocial_Modelo');
$this->load->model('ImagenInstitucional_Modelo');
$this->load->model('Empresa_Modelo');
$tiempo = time();
$fechaSistema = date("Y-m-d H:i:s", $tiempo);
$dato['fechaSistema'] = $fechaSistema;
$IdDatosTotales = 541;
$periodo = 2017;
$dato['periodo'] = $periodo;
$dato['imagenesInstitucionales'] = $this->ImagenInstitucional_Modelo->getListImagenInstitucinalPeriodo($periodo, $IdEmpresaSesion);
$dato['indicadoresCuantitativoCalifiacadoEmpresa'] = $this->BalanceSocial_Modelo->getListIndicadorCuantitativoCalificadoAnio($IdDatosTotales, $IdEmpresaSesion);
$dato['nombreEmpresa'] = $this->Empresa_Modelo->getNameEmpresa($IdEmpresaSesion);
//print_r($dato['indicadoresCuantitativoCalifiacadoEmpresa']);
//$this->load->view('balanceSocial/informeIndicadoresCuantitativosCalificados', $dato);
$this->load->view('impresion/indicadoresCuantitativosCalificadosEmpresaPDF', $dato);

		}else{
			redirect('inicio');
		}
	}

	/**
	 * Indicadores Cualitativos
	 */
	public function indicadoresCualitativosEmpresa(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa" => "Empresa",
			                     $inicioURL."indicadorEmpresa/indicadoresAdicionModulos" => "Indicadores",
			                     $inicioURL."indicadorEmpresa/indicadoresCualitativosEmpresa" => "Indicadores Cualitativos"
			                    );						
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('IndicadorCualitativo_Modelo');
				$dato['indicadoresCualiatativosEmpresa'] = $this->IndicadorCualitativo_Modelo->getListIndicadorCualitativoMatriz(); 				
				$dato["admin"] = 1;
				$dato["contenedor"] = "indicadorEmpresa/indicadoresCualitativosEmpresa_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "indicadoresCualitativosEmpresa", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('IndicadorCualitativo_Modelo');
						$dato['indicadoresCualiatativosEmpresa'] = $this->IndicadorCualitativo_Modelo->getListIndicadorCualitativoMatriz();  
						$dato["contenedor"] = "indicadorEmpresa/indicadoresCualitativosEmpresa_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "indicadorEmpresa/indicadoresCualitativosEmpresa_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "indicadorEmpresa/indicadoresCualitativosEmpresa_view";
					$this->load->view('plantilla', $dato);
				}
 			}			
		}else{
			redirect('inicio');
		}
	}

	public function guardarIndicadoresCualitativosSeleccionados(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$rutaIndicador = $_POST['rutaRegreso'];
			//$anio = $_POST['txtAnio'];
			/*if (!empty($anio)) { */
				//Obtener los ID de los Indicadores seleccionados
				
				if (isset($_POST['checkPermisoPerfil'])) {

					$indicadoresCualitativosSeleccionados = $_POST['checkPermisoPerfil'];
					
					$this->load->model("IndicadoresEmpresa_Modelo");
					//Enviar la matriz seleccionada al modelo de carga en IndicadoresEmpresa_Modelo		
					$guardarIndicadoresCualitativosSeleccionados = $this->IndicadoresEmpresa_Modelo->insertIndicadoresCualitativosSeleccionados($IdEmpresaSesion, $indicadoresCualitativosSeleccionados);

					if($guardarIndicadoresCualitativosSeleccionados){					
						$mensaje = "Los Indicadores por Sub-Dimensión han sido registrados Correctamente";
						$this->session->set_flashdata('mensaje',$mensaje);
						if ($rutaIndicador) {
							redirect('indicador/selectIndicadorCualitativoDimension/1');
						}else{
							redirect('indicador/selectIndicadorCualitativoDimension');
						}					
					}else{
						$mensaje = "Ningún Indicador ha sido registrado";
						$this->session->set_flashdata('mensaje',$mensaje);
						if ($rutaIndicador) {
							redirect('indicador/selectIndicadorCualitativoDimension/1');
						}else{
							redirect('indicador/selectIndicadorCualitativoDimension');
						}
					} 
				}else{
					$mensaje = "Ninguna Sub-Dimensión de Indicadores ha sido seleccionado";					
					$this->db->query("DELETE FROM IndicadorCualitativoEmpresa");
					$this->session->set_flashdata('mensaje',$mensaje);
					if ($rutaIndicador) {
							redirect('indicador/selectIndicadorCualitativoDimension/1');
						}else{
							redirect('indicador/selectIndicadorCualitativoDimension');
						}
				} 
				
			/*}else{
				$mensaje = "Para la Selección de Sub-Dimensión, ingrese un año válido";
				$this->session->set_flashdata('mensaje',$mensaje);
				if ($rutaIndicador) {
					redirect('indicador/selectIndicadorCualitativoDimension/1');
				}else{
					redirect('indicador/selectIndicadorCualitativoDimension');
				}				
			} */
			
		}else{
			redirect('inicio');
		}
	}
	public function peticionAnioIndCualitativo(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$dato["contenedor"] = "indicadorEmpresa/obtenerAnioIndCualitativos";
			$this->load->view('plantilla', $dato);
		}else{
			redirect('inicio');
		}
	}
	public function indicadoresCualitativosEmpresaCalificacion($anio=''){
		if($this->session->userdata("IdEmpresaSesion")){
			if (is_numeric($anio)) {
				if (strlen($anio) == 4 && ($anio > 2014)) {
					$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
					$consultaSiExistePeriodo = "SELECT IdICEmpresa FROM IndicadorCualitativoCalificado WHERE Periodo = ".$anio." AND IdEmpresa = ".$IdEmpresaSesion." LIMIT 1";
					$existePeriodo = $this->db->query($consultaSiExistePeriodo);
					if ($existePeriodo->num_rows() > 0) {
						//echo "Si existe";
					}else{
						//echo "No existe";
						$this->load->model('IndicadoresEmpresa_Modelo');
						$this->IndicadoresEmpresa_Modelo->insertIndicadoresCualitativosCalificados($IdEmpresaSesion, $anio);					
					}
					$inicioURL =  base_url();
					$relativeURL = array($inicioURL."principal" => "Módulos",
					                     $inicioURL."indicadorEmpresa" => "Análisis de Indicadores",
					                     $inicioURL."indicadorEmpresa/indicadoresCualitativosModulos" => "Análisis de Cualitativos",
					                     $inicioURL."indicadorEmpresa/indicadoresCualitativosEmpresaCalificacion" => "Indicadores Cualitativos"
					                    );						
					$dato["ubicacionURL"] = $relativeURL;
					/*
					$this->IndicadoresEmpresa_Modelo->insertIndicadoresCualitativosCalificados($IdEmpresaSesion, $anio);
*/
					$this->load->model('IndicadoresEmpresa_Modelo');
					$dato['indicadorCualitativoCalificadoEmpresa'] = $this->IndicadoresEmpresa_Modelo->getListIndicadorCualitativoEmpresaCalificado($IdEmpresaSesion, $anio);  
					$dato["anio"] = $anio;
					$dato["contenedor"] = "indicadorEmpresa/indicadoresCualitativosEmpresaCalificacion_view";		
					$this->load->view('plantilla', $dato);
				}else{
					$mensaje = "Ingrese un Año válido";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->indicadoresCualitativosModulos();
				}
			}else{
				$mensaje = "Ingrese un Año válido";
				$this->session->set_flashdata('mensaje',$mensaje);
				$this->indicadoresCualitativosModulos();
			} 
			/*

			*/
		}else{
			redirect('inicio');
		}
	}
	public function guardarIndicadoresCualitativosCalificado(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			//print_r($idIndicadoresCualitativosEmpresa);
			$anio = $_POST['txtAnio'];			
			$indicadoresCualitativosSeleccionados = null;
			//Obtener los ID de los Indicadores seleccionados
			if (isset($_POST['checkRespuesta'])) {
				$indicadoresCualitativosSeleccionados = $_POST['checkRespuesta'];

				//Obtener los Indicadores Cualitativos de la Empresa
			//$sqlIdIndicadoresCualitativosEmpresa = "SELECT IdIndicadorCualitativo FROM IndicadorCualitativoEmpresa WHERE  IdEmpresa = ".$IdEmpresaSesion." ORDER BY IdIndicadorCualitativo ASC";


			$this->load->model('IndicadoresEmpresa_Modelo');
			$this->IndicadoresEmpresa_Modelo->recalcularIndicadorCualitativoCalificadoEmpresa($indicadoresCualitativosSeleccionados, $anio, $IdEmpresaSesion);


			//$idIndicadoresCualitativosEmpresa  = $this->db->query($sqlIdIndicadoresCualitativosEmpresa);

			//echo $idIndicadoresCualitativosEmpresa->num_rows();
			//echo "<br>";
			/*foreach ($idIndicadoresCualitativosEmpresa->result() as $key) {
				//echo $key->IdIndicadorCualitativo;
			}	*/		
/*
				foreach ($indicadoresCualitativosSeleccionados as $key => $value) {
					echo $value;
					$insertCalificacionCualitativo = "UPDATE IndicadorCualitativoCalificado SET Calificacion = (SELECT Respuesta FROM IndicadorCualitativo WHERE IdIndicadorCualitativo = ".$value.") WHERE IdIndicadorCualitativo = ".$value." AND IdEmpresa = ".$IdEmpresaSesion.";";
					echo $insertCalificacionCualitativo;
					$this->db->query($insertCalificacionCualitativo);
				}*/
				
				
				//print_r($indicadoresCualitativosSeleccionados);
				$mensaje = "Indicadores del periodo ".$anio." Calificados con éxito";
				$this->session->set_flashdata('mensaje',$mensaje);
				$this->indicadoresCualitativosEmpresaCalificacion($anio);
			}else{
				$this->load->model('IndicadoresEmpresa_Modelo');
				$this->IndicadoresEmpresa_Modelo->recalcularIndicadorCualitativoCalificadoEmpresa($indicadoresCualitativosSeleccionados, $anio, $IdEmpresaSesion);

				$mensaje = "Ningún Indicador del periodo ".$anio." Calificado";
				$this->session->set_flashdata('mensaje',$mensaje);
				$this->indicadoresCualitativosEmpresaCalificacion($anio);
			}
		}else{
			redirect('inicio');
		}
	}		

	public function editarIndicadorCualitativoCalificado($IdCualitativoCalificado, $anio){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$this->load->model('IndicadoresEmpresa_Modelo');
			$dato['indicadorCualitativoCalifiacadoEmpresa'] = $this->IndicadoresEmpresa_Modelo->getIndicadorCualitativoEmpresaCalificado($IdCualitativoCalificado, $IdEmpresaSesion, $anio);
			$dato["contenedor"] = "indicadorEmpresa/indicadorCualitativoCalificadoEmpresa_new_edit";
			$dato["anio"] = $anio;
			$dato["titulo"] = "Editar Indicador Cualitativo Calificado";
			$dato["accion"] = "Editar";		
			$this->load->view('plantilla', $dato);			
		}else{
			redirect('inicio');
		}
	}
	public function guardarIndicadorCualitativoCalificado($anio){
		$accion = $_POST['accion'];
		$id = $_POST['id'];
		
		$this->load->model('IndicadoresEmpresa_Modelo');		
		$txtIdIndicador = $_POST["txtIdIndicadorCualitativo"];
		$txtICComentario = $_POST["txtICComentario"];			
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
		
		if($this->IndicadoresEmpresa_Modelo->updateIndicadorCualitativoCalificadoEmpresa($id, $txtIdIndicador, $txtICComentario, $IdEmpresaSesion)){
			$mensaje = "El Indicador de la Empresa se ha modificado con éxito";
			$this->session->set_flashdata('mensaje',$mensaje);
			$this->editarIndicadorCualitativoCalificado($id, $anio);				
		}else{
			$mensaje = "El Indicador de la Empresa no se ha modificado, verfique los datos ingresados";
			$this->session->set_flashdata('mensaje',$mensaje);
			$this->editarIndicadorCualitativoCalificado($id, $anio);				
		}		
	}
	public function indiadoresCualitativosEmpresaListaPeriodos(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."indicadorEmpresa" => "Análisis de Indicadores",
			                     $inicioURL."indicadorEmpresa/indicadoresCualitativosModulos" => "Indicadores Cualitativos",
			                     $inicioURL."indicadorEmpresa/indiadoresCualitativosEmpresaListaPeriodos" => "Análisis"
			                    );						
			$dato["ubicacionURL"] = $relativeURL;
/*
			$sql = "SELECT  DISTINCT Periodo, FechaSistema FROM IndicadorCualitativoCalificado WHERE IdEmpresa = ".$IdEmpresaSesion."";
			$cualitativosCalificadosPeriodos =  $this->db->query($sql)->result();
			$dato["cualitativosCalificadosPeriodos"] = $cualitativosCalificadosPeriodos;
			*/
			$this->load->model('IndicadorCualitativo_Modelo');
				$dato['cualitativosCalificadosPeriodos'] = $this->IndicadorCualitativo_Modelo->getListIndicadorCualitativoEmpresaMaestro($IdEmpresaSesion);
			$dato["contenedor"] = "indicadorEmpresa/indiadoresCualitativosEmpresaCalificadosListaPeriodos_view";
			
			$this->load->view("plantilla", $dato);				
		}else{
			redirect('inicio');
		}
	}
	public function eliminarIndicadorCualitativoEmpresaListaPeriodo(){
		$this->load->model('IndicadoresEmpresa_Modelo'); 		          	
		$PeriodoCualitativoCalificado 		= json_decode($this->input->post('MiPeriodoCualitativoCalificado'));
		$id          = base64_decode($PeriodoCualitativoCalificado->Id);
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->IndicadoresEmpresa_Modelo->deleteIndicadoresCualitativosEmpresaListaPeriodo($id, $IdEmpresaSesion); 
	}
	public function indiadoresCuantitativosEmpresaListaPeriodos(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."indicadorEmpresa" => "Análisis de Indicadores",
			                     $inicioURL."indicadorEmpresa/indicadoresCuantitativosModulos" => "Análisis de Cuantitativos",
			                     $inicioURL."indicadorEmpresa/indiadoresCuantitativosEmpresaListaPeriodos" => "Análisis"
			                    );						
			$dato["ubicacionURL"] = $relativeURL;
			$this->load->model('IndicadoresEmpresa_Modelo');		
			$dato["registrosDatosTotales"] = $this->IndicadoresEmpresa_Modelo->getListDatosTotales($IdEmpresaSesion);

			$dato["contenedor"] = "indicadorEmpresa/indiadoresCuantitativosEmpresaCalificadosListaPeriodos_view";			
			$this->load->view("plantilla", $dato);		
		}else{
			redirect('inicio');
		}
	}
	/**
	 * Reportes, Gráficas
	 */
	public function verGraficaCualitativosPorDimension($idCualitativosCalificados){
		if($this->session->userdata("IdEmpresaSesion")){
			if ($idCualitativosCalificados != NULL) {
				$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
				//Contar los totales
				$sqlTodosDeEconomico = 'SELECT COUNT(*) AS Filas, Dimension FROM IndicadoresCualitativosCalificados WHERE Dimension = "ECONÓMICO" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY Dimension ORDER BY Dimension ;';
				$sqlTodosDeLegal = 'SELECT COUNT(*) AS Filas, Dimension FROM IndicadoresCualitativosCalificados WHERE Dimension = "LEGAL" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY Dimension ORDER BY Dimension ;';
				$sqlTodosDeSocial = 'SELECT COUNT(*) AS Filas, Dimension FROM IndicadoresCualitativosCalificados WHERE Dimension = "SOCIAL" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY Dimension ORDER BY Dimension ;';
				//Contar los Si
				$sqlTodosDeEconomicoSi = 'SELECT COUNT(*) AS Si, Dimension FROM IndicadoresCualitativosCalificados WHERE Dimension = "ECONÓMICO" AND Respuesta = "Si" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY Dimension ORDER BY Dimension ;';
				$sqlTodosDeLegalSi = 'SELECT COUNT(*) AS Si, Dimension FROM IndicadoresCualitativosCalificados WHERE Dimension = "LEGAL" AND Respuesta = "Si" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY Dimension ORDER BY Dimension;';
				$sqlTodosDeSocialSi = 'SELECT COUNT(*) AS Si, Dimension FROM IndicadoresCualitativosCalificados WHERE Dimension = "SOCIAL" AND Respuesta = "Si" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY Dimension ORDER BY Dimension;';
				//Contar los No
				$sqlTodosDeEconomicoNo = 'SELECT COUNT(*) AS No, Dimension FROM IndicadoresCualitativosCalificados WHERE Dimension = "ECONÓMICO" AND Respuesta = "No" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY Dimension ORDER BY Dimension;';
				$sqlTodosDeLegalNo = 'SELECT COUNT(*) AS No, Dimension FROM IndicadoresCualitativosCalificados WHERE Dimension = "LEGAL" AND Respuesta = "No" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY Dimension ORDER BY Dimension;';
				$sqlTodosDeSocialNo = 'SELECT COUNT(*) AS No, Dimension FROM IndicadoresCualitativosCalificados WHERE Dimension = "SOCIAL" AND Respuesta = "No" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY Dimension ORDER BY Dimension;';
				//Contar los Nunca se ha tratado
				$sqlTodosDeEconomicoNunca = 'SELECT COUNT(*) AS Nunca, Dimension FROM IndicadoresCualitativosCalificados WHERE Dimension = "ECONÓMICO" AND Respuesta = "Nunca se ha tratado" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY Dimension ORDER BY Dimension;';
				$sqlTodosDeLegalNunca = 'SELECT COUNT(*) AS Nunca, Dimension FROM IndicadoresCualitativosCalificados WHERE Dimension = "LEGAL" AND Respuesta = "Nunca se ha tratado" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY Dimension ORDER BY Dimension;';
				$sqlTodosDeSocialNunca = 'SELECT COUNT(*) AS Nunca, Dimension FROM IndicadoresCualitativosCalificados WHERE Dimension = "SOCIAL" AND Respuesta = "Nunca se ha tratado" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY Dimension ORDER BY Dimension;';
				//Contar los No consideramos su aplicaión en la entidad
				$sqlTodosDeEconomicoNoConcidera = 'SELECT COUNT(*) AS NoConcidera, Dimension FROM IndicadoresCualitativosCalificados WHERE Dimension = "ECONÓMICO" AND Respuesta = "No consideramos su aplicaión en la entidad" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY Dimension ORDER BY Dimension;';
				$sqlTodosDeLegalNoConcidera = 'SELECT COUNT(*) AS NoConcidera, Dimension FROM IndicadoresCualitativosCalificados WHERE Dimension = "LEGAL" AND Respuesta = "No consideramos su aplicaión en la entidad" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY Dimension ORDER BY Dimension;';
				$sqlTodosDeSocialNoConcidera = 'SELECT COUNT(*) AS NoConcidera, Dimension FROM IndicadoresCualitativosCalificados WHERE Dimension = "SOCIAL" AND Respuesta = "No consideramos su aplicaión en la entidad" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY Dimension ORDER BY Dimension;';

				//Enviar parametros
				$dato['totalTodosDeEconomico'] = $this->db->query($sqlTodosDeEconomico)->result();
				$dato['totalTodosDeLegal'] = $this->db->query($sqlTodosDeLegal)->result();
				$dato['totalTodosDeSocial'] = $this->db->query($sqlTodosDeSocial)->result();
				$dato['totalTodosDeEconomicoSi'] = $this->db->query($sqlTodosDeEconomicoSi)->result();
				$dato['totalTodosDeLegalSi'] = $this->db->query($sqlTodosDeLegalSi)->result();
				$dato['totalTodosDeSocialSi'] = $this->db->query($sqlTodosDeSocialSi)->result();
				$dato['totalTodosDeEconomicoNo'] = $this->db->query($sqlTodosDeEconomicoNo)->result();
				$dato['totalTodosDeLegalNo'] = $this->db->query($sqlTodosDeLegalNo)->result();
				$dato['totalTodosDeSocialNo'] = $this->db->query($sqlTodosDeSocialNo)->result();
				$dato['totalTodosDeEconomicoNunca'] = $this->db->query($sqlTodosDeEconomicoNunca)->result();
				$dato['totalTodosDeLegalNunca'] = $this->db->query($sqlTodosDeLegalNunca)->result();
				$dato['totalTodosDeSocialNunca'] = $this->db->query($sqlTodosDeSocialNunca)->result();
				$dato['totalTodosDeEconomicoNoConcidera'] = $this->db->query($sqlTodosDeEconomicoNoConcidera)->result();
				$dato['totalTodosDeLegalNoConcidera'] = $this->db->query($sqlTodosDeLegalNoConcidera)->result();
				$dato['totalTodosDeSocialNoConcidera'] = $this->db->query($sqlTodosDeSocialNoConcidera)->result();
				$dato["cualitativosCalificados"] = $this->db->query("SELECT * FROM CualitativoCalificadoMaestro WHERE IdCualitativocalificado = ".$idCualitativosCalificados.";")->result();
/*
				echo $sqlTodosDeEconomico."<br>";
				echo $sqlTodosDeLegal."<br>";
				echo $sqlTodosDeSocial."<br>";
				echo $sqlTodosDeEconomicoSi."<br>";
				echo $sqlTodosDeLegalSi."<br>";
				echo $sqlTodosDeSocialSi."<br>";
				echo $sqlTodosDeEconomicoNo."<br>";
				echo $sqlTodosDeLegalNo."<br>";
				echo $sqlTodosDeSocialNo."<br>";
				echo $sqlTodosDeEconomicoNunca."<br>";
				echo $sqlTodosDeLegalNunca."<br>";
				echo $sqlTodosDeSocialNunca."<br>";
				echo $sqlTodosDeEconomicoNoConcidera."<br>";
				echo $sqlTodosDeLegalNoConcidera."<br>";
				echo $sqlTodosDeSocialNoConcidera."<br>";
				echo "<br>";
				echo "<br>";
				print_r($dato['totalTodosDeEconomico'])."<br>";
				print_r($dato['totalTodosDeLegal'])."<br>";
				print_r($dato['totalTodosDeSocial'])."<br>";
				print_r($dato['totalTodosDeEconomicoSi'])."<br>";
				print_r($dato['totalTodosDeLegalSi'])."<br>";
				print_r($dato['totalTodosDeSocialSi'])."<br>";
				print_r($dato['totalTodosDeEconomicoNo'])."<br>";
				print_r($dato['totalTodosDeLegalNo'])."<br>";
				print_r($dato['totalTodosDeSocialNo'])."<br>";
				print_r($dato['totalTodosDeEconomicoNunca'])."<br>";
				print_r($dato['totalTodosDeLegalNunca'])."<br>";
				print_r($dato['totalTodosDeSocialNunca'])."<br>";
				print_r($dato['totalTodosDeEconomicoNoConcidera'])."<br>";
				print_r($dato['totalTodosDeLegalNoConcidera'])."<br>";
				print_r($dato['totalTodosDeSocialNoConcidera'])."<br>";

*/

				$dato["contenedor"] = "indicadorEmpresa/graficaCualitativosPorDimension_view";
				$this->load->view("plantilla", $dato);
			}
		}else{
			redirect('inicio');
		}
	}
	public function verGraficaCualitativosPorPrincipioSEPS($idCualitativosCalificados){
		if($this->session->userdata("IdEmpresaSesion")){
			if ($idCualitativosCalificados != NULL) {
				$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
				
				$sqlAsociacionVoluntariaSi = 'SELECT COUNT(*) AS Si, PrincipioSEPS FROM IndicadoresCualitativosCalificados WHERE PrincipioSEPS = "ASOCIACIÓN VOLUNTARIA" AND Respuesta = "Si" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY PrincipioSEPS ORDER BY PrincipioSEPS;';
				$sqlAutogestionYAutonomiaSi = 'SELECT COUNT(*) AS Si, PrincipioSEPS FROM IndicadoresCualitativosCalificados WHERE PrincipioSEPS = "AUTOGESTIÓN Y AUTONOMIA" AND Respuesta = "Si" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY PrincipioSEPS ORDER BY PrincipioSEPS;';
				$sqlCompromisoComunitarioSi = 'SELECT COUNT(*) AS Si, PrincipioSEPS FROM IndicadoresCualitativosCalificados WHERE PrincipioSEPS = "COMPROMISO COMUNITARIO" AND Respuesta = "Si" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY PrincipioSEPS ORDER BY PrincipioSEPS;';
				$sqlParticipacionEconomicaSi = 'SELECT COUNT(*) AS Si, PrincipioSEPS FROM IndicadoresCualitativosCalificados WHERE PrincipioSEPS = "PARTICIPACIÓN ECONÓMICA" AND Respuesta = "Si" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY PrincipioSEPS ORDER BY PrincipioSEPS;';
				$sqlTrabajoSobrecapitalSi = 'SELECT COUNT(*) AS Si, PrincipioSEPS FROM IndicadoresCualitativosCalificados WHERE PrincipioSEPS = "TRABAJO SOBRE CAPITAL" AND Respuesta = "Si" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY PrincipioSEPS ORDER BY PrincipioSEPS;';

				$sqlAsociacionVoluntariaNo = 'SELECT COUNT(*) AS No, PrincipioSEPS FROM IndicadoresCualitativosCalificados WHERE PrincipioSEPS = "ASOCIACIÓN VOLUNTARIA" AND Respuesta = "No" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY PrincipioSEPS ORDER BY PrincipioSEPS;';
				$sqlAutogestionYAutonomiaNo = 'SELECT COUNT(*) AS No, PrincipioSEPS FROM IndicadoresCualitativosCalificados WHERE PrincipioSEPS = "AUTOGESTIÓN Y AUTONOMIA" AND Respuesta = "No" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY PrincipioSEPS ORDER BY PrincipioSEPS;';
				$sqlCompromisoComunitarioNo = 'SELECT COUNT(*) AS No, PrincipioSEPS FROM IndicadoresCualitativosCalificados WHERE PrincipioSEPS = "COMPROMISO COMUNITARIO" AND Respuesta = "No" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY PrincipioSEPS ORDER BY PrincipioSEPS;';
				$sqlParticipacionEconomicaNo = 'SELECT COUNT(*) AS No, PrincipioSEPS FROM IndicadoresCualitativosCalificados WHERE PrincipioSEPS = "PARTICIPACIÓN ECONÓMICA" AND Respuesta = "No" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY PrincipioSEPS ORDER BY PrincipioSEPS;';
				$sqlTrabajoSobrecapitalNo = 'SELECT COUNT(*) AS No, PrincipioSEPS FROM IndicadoresCualitativosCalificados WHERE PrincipioSEPS = "TRABAJO SOBRE CAPITAL" AND Respuesta = "No" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY PrincipioSEPS ORDER BY PrincipioSEPS;';

				$sqlAsociacionVoluntariaNunca = 'SELECT COUNT(*) AS Nunca, PrincipioSEPS FROM IndicadoresCualitativosCalificados WHERE PrincipioSEPS = "ASOCIACIÓN VOLUNTARIA" AND Respuesta = "Nunca se ha tratado" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY PrincipioSEPS ORDER BY PrincipioSEPS;';
				$sqlAutogestionYAutonomiaNunca = 'SELECT COUNT(*) AS Nunca, PrincipioSEPS FROM IndicadoresCualitativosCalificados WHERE PrincipioSEPS = "AUTOGESTIÓN Y AUTONOMIA" AND Respuesta = "Nunca se ha tratado" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY PrincipioSEPS ORDER BY PrincipioSEPS;';
				$sqlCompromisoComunitarioNunca = 'SELECT COUNT(*) AS Nunca, PrincipioSEPS FROM IndicadoresCualitativosCalificados WHERE PrincipioSEPS = "COMPROMISO COMUNITARIO" AND Respuesta = "Nunca se ha tratado" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY PrincipioSEPS ORDER BY PrincipioSEPS;';
				$sqlParticipacionEconomicaNunca = 'SELECT COUNT(*) AS Nunca, PrincipioSEPS FROM IndicadoresCualitativosCalificados WHERE PrincipioSEPS = "PARTICIPACIÓN ECONÓMICA" AND Respuesta = "Nunca se ha tratado" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY PrincipioSEPS ORDER BY PrincipioSEPS;';
				$sqlTrabajoSobrecapitalNunca = 'SELECT COUNT(*) AS Nunca, PrincipioSEPS FROM IndicadoresCualitativosCalificados WHERE PrincipioSEPS = "TRABAJO SOBRE CAPITAL" AND Respuesta = "Nunca se ha tratado" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY PrincipioSEPS ORDER BY PrincipioSEPS;';

				$sqlAsociacionVoluntariaNoConcidera = 'SELECT COUNT(*) AS NoConcidera, PrincipioSEPS FROM IndicadoresCualitativosCalificados WHERE PrincipioSEPS = "ASOCIACIÓN VOLUNTARIA" AND Respuesta = "No consideramos su aplicaión en la entidad" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY PrincipioSEPS ORDER BY PrincipioSEPS;';
				$sqlAutogestionYAutonomiaNoConcidera = 'SELECT COUNT(*) AS NoConcidera, PrincipioSEPS FROM IndicadoresCualitativosCalificados WHERE PrincipioSEPS = "AUTOGESTIÓN Y AUTONOMIA" AND Respuesta = "No consideramos su aplicaión en la entidad" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY PrincipioSEPS ORDER BY PrincipioSEPS;';
				$sqlCompromisoComunitarioNoConcidera = 'SELECT COUNT(*) AS NoConcidera, PrincipioSEPS FROM IndicadoresCualitativosCalificados WHERE PrincipioSEPS = "COMPROMISO COMUNITARIO" AND Respuesta = "No consideramos su aplicaión en la entidad" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY PrincipioSEPS ORDER BY PrincipioSEPS;';
				$sqlParticipacionEconomicaNoConcidera = 'SELECT COUNT(*) AS NoConcidera, PrincipioSEPS FROM IndicadoresCualitativosCalificados WHERE PrincipioSEPS = "PARTICIPACIÓN ECONÓMICA" AND Respuesta = "No consideramos su aplicaión en la entidad" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY PrincipioSEPS ORDER BY PrincipioSEPS;';
				$sqlTrabajoSobrecapitalNoConcidera = 'SELECT COUNT(*) AS NoConcidera, PrincipioSEPS FROM IndicadoresCualitativosCalificados WHERE PrincipioSEPS = "TRABAJO SOBRE CAPITAL" AND Respuesta = "No consideramos su aplicaión en la entidad" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY PrincipioSEPS ORDER BY PrincipioSEPS;';

				$dato['totalAsociacionVoluntariaSi'] = $this->db->query($sqlAsociacionVoluntariaSi)->result();
				$dato['totalAutogestionYAutonomiaSi'] = $this->db->query($sqlAutogestionYAutonomiaSi)->result();
				$dato['totalCompromisoComunitarioSi'] = $this->db->query($sqlCompromisoComunitarioSi)->result();
				$dato['totalParticipacionEconomicaSi'] = $this->db->query($sqlParticipacionEconomicaSi)->result();
				$dato['totalTrabajoSobrecapitalSi'] = $this->db->query($sqlTrabajoSobrecapitalSi)->result();

				$dato['totalAsociacionVoluntariaNo'] = $this->db->query($sqlAsociacionVoluntariaNo)->result();
				$dato['totalAutogestionYAutonomiaNo'] = $this->db->query($sqlAutogestionYAutonomiaNo)->result();
				$dato['totalCompromisoComunitarioNo'] = $this->db->query($sqlCompromisoComunitarioNo)->result();
				$dato['totalParticipacionEconomicaNo'] = $this->db->query($sqlParticipacionEconomicaNo)->result();
				$dato['totalTrabajoSobrecapitalNo'] = $this->db->query($sqlTrabajoSobrecapitalNo)->result();

				$dato['totalAsociacionVoluntariaNunca'] = $this->db->query($sqlAsociacionVoluntariaNunca)->result();
				$dato['totalAutogestionYAutonomiaNunca'] = $this->db->query($sqlAutogestionYAutonomiaNunca)->result();
				$dato['totalCompromisoComunitarioNunca'] = $this->db->query($sqlCompromisoComunitarioNunca)->result();
				$dato['totalParticipacionEconomicaNunca'] = $this->db->query($sqlParticipacionEconomicaNunca)->result();
				$dato['totalTrabajoSobrecapitalNunca'] = $this->db->query($sqlTrabajoSobrecapitalNunca)->result();

				$dato['totalAsociacionVoluntariaNoConcidera'] = $this->db->query($sqlAsociacionVoluntariaNoConcidera)->result();
				$dato['totalAutogestionYAutonomiaNoConcidera'] = $this->db->query($sqlAutogestionYAutonomiaNoConcidera)->result();
				$dato['totalCompromisoComunitarioNoConcidera'] = $this->db->query($sqlCompromisoComunitarioNoConcidera)->result();
				$dato['totalParticipacionEconomicaNoConcidera'] = $this->db->query($sqlParticipacionEconomicaNoConcidera)->result();
				$dato['totalTrabajoSobrecapitalNoConcidera'] = $this->db->query($sqlTrabajoSobrecapitalNoConcidera)->result();

				$dato["cualitativosCalificados"] = $this->db->query("SELECT * FROM CualitativoCalificadoMaestro WHERE IdCualitativocalificado = ".$idCualitativosCalificados.";")->result();

				$dato["contenedor"] = "indicadorEmpresa/graficaCualitativosPorPrincipioSEPS_view";
				$this->load->view("plantilla", $dato);
			}
		}else{
			redirect('inicio');
		}
	}
	public function verGraficaCualitativosPorSubDimension($idCualitativosCalificados){
		if($this->session->userdata("IdEmpresaSesion")){
			if ($idCualitativosCalificados != NULL) {
				$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
				

				$sqlAsambleaSi = 'SELECT COUNT(*) AS Si, SubDimension FROM IndicadoresCualitativosCalificados WHERE SubDimension = "Asamblea" AND Respuesta = "Si" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY SubDimension ORDER BY SubDimension;';
				$sqlAsociatividadGruposInteresSi = 'SELECT COUNT(*) AS Si, SubDimension FROM IndicadoresCualitativosCalificados WHERE SubDimension = "Asociatividad grupos de interes" AND Respuesta = "Si" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY SubDimension ORDER BY SubDimension;';
				$sqlAusentismoSi = 'SELECT COUNT(*) AS Si, SubDimension FROM IndicadoresCualitativosCalificados WHERE SubDimension = "Ausentismo" AND Respuesta = "Si" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY SubDimension ORDER BY SubDimension;';
				$sqlComercioJustoSi = 'SELECT COUNT(*) AS Si, SubDimension FROM IndicadoresCualitativosCalificados WHERE SubDimension = "Comercio Justo" AND Respuesta = "Si" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY SubDimension ORDER BY SubDimension;';
				$sqlComunidadSi = 'SELECT COUNT(*) AS Si, SubDimension FROM IndicadoresCualitativosCalificados WHERE SubDimension = "Comunidad" AND Respuesta = "Si" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY SubDimension ORDER BY SubDimension;';
				$sqlContratosTrabajoSi = 'SELECT COUNT(*) AS Si, SubDimension FROM IndicadoresCualitativosCalificados WHERE SubDimension = "Contratos trabajo" AND Respuesta = "Si" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY SubDimension ORDER BY SubDimension;';
				$sqlDespidosRotaciónSi = 'SELECT COUNT(*) AS Si, SubDimension FROM IndicadoresCualitativosCalificados WHERE SubDimension = "Despidos o Rotación" AND Respuesta = "Si" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY SubDimension ORDER BY SubDimension;';
				$sqlDonacionesSi = 'SELECT COUNT(*) AS Si, SubDimension FROM IndicadoresCualitativosCalificados WHERE SubDimension = "Donaciones" AND Respuesta = "Si" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY SubDimension ORDER BY SubDimension;';
				$sqlRemuneracionSi = 'SELECT COUNT(*) AS Si, SubDimension FROM IndicadoresCualitativosCalificados WHERE SubDimension = "Remuneración" AND Respuesta = "Si" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY SubDimension ORDER BY SubDimension;';
				$sqlTransparenciaSi = 'SELECT COUNT(*) AS Si, SubDimension FROM IndicadoresCualitativosCalificados WHERE SubDimension = "Transparencia" AND Respuesta = "Si" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY SubDimension ORDER BY SubDimension;';

				$sqlAsambleaNo = 'SELECT COUNT(*) AS No, SubDimension FROM IndicadoresCualitativosCalificados WHERE SubDimension = "Asamblea" AND Respuesta = "No" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY SubDimension ORDER BY SubDimension;';
				$sqlAsociatividadGruposInteresNo = 'SELECT COUNT(*) AS No, SubDimension FROM IndicadoresCualitativosCalificados WHERE SubDimension = "Asociatividad grupos de interes" AND Respuesta = "No" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY SubDimension ORDER BY SubDimension;';
				$sqlAusentismoNo = 'SELECT COUNT(*) AS No, SubDimension FROM IndicadoresCualitativosCalificados WHERE SubDimension = "Ausentismo" AND Respuesta = "No" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY SubDimension ORDER BY SubDimension;';
				$sqlComercioJustoNo = 'SELECT COUNT(*) AS No, SubDimension FROM IndicadoresCualitativosCalificados WHERE SubDimension = "Comercio Justo" AND Respuesta = "No" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY SubDimension ORDER BY SubDimension;';
				$sqlComunidadNo = 'SELECT COUNT(*) AS No, SubDimension FROM IndicadoresCualitativosCalificados WHERE SubDimension = "Comunidad" AND Respuesta = "No" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY SubDimension ORDER BY SubDimension;';
				$sqlContratosTrabajoNo = 'SELECT COUNT(*) AS No, SubDimension FROM IndicadoresCualitativosCalificados WHERE SubDimension = "Contratos trabajo" AND Respuesta = "No" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY SubDimension ORDER BY SubDimension;';
				$sqlDespidosRotaciónNo = 'SELECT COUNT(*) AS No, SubDimension FROM IndicadoresCualitativosCalificados WHERE SubDimension = "Despidos o Rotación" AND Respuesta = "No" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY SubDimension ORDER BY SubDimension;';
				$sqlDonacionesNo = 'SELECT COUNT(*) AS No, SubDimension FROM IndicadoresCualitativosCalificados WHERE SubDimension = "Donaciones" AND Respuesta = "No" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY SubDimension ORDER BY SubDimension;';
				$sqlRemuneracionNo = 'SELECT COUNT(*) AS No, SubDimension FROM IndicadoresCualitativosCalificados WHERE SubDimension = "Remuneración" AND Respuesta = "No" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY SubDimension ORDER BY SubDimension;';
				$sqlTransparenciaNo = 'SELECT COUNT(*) AS No, SubDimension FROM IndicadoresCualitativosCalificados WHERE SubDimension = "Transparencia" AND Respuesta = "No" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY SubDimension ORDER BY SubDimension;';

				$sqlAsambleaNunca = 'SELECT COUNT(*) AS Nunca, SubDimension FROM IndicadoresCualitativosCalificados WHERE SubDimension = "Asamblea" AND Respuesta = "Nunca se ha tratado" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY SubDimension ORDER BY SubDimension;';
				$sqlAsociatividadGruposInteresNunca = 'SELECT COUNT(*) AS Nunca, SubDimension FROM IndicadoresCualitativosCalificados WHERE SubDimension = "Asociatividad grupos de interes" AND Respuesta = "Nunca se ha tratado" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY SubDimension ORDER BY SubDimension;';
				$sqlAusentismoNunca = 'SELECT COUNT(*) AS Nunca, SubDimension FROM IndicadoresCualitativosCalificados WHERE SubDimension = "Ausentismo" AND Respuesta = "Nunca se ha tratado" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY SubDimension ORDER BY SubDimension;';
				$sqlComercioJustoNunca = 'SELECT COUNT(*) AS Nunca, SubDimension FROM IndicadoresCualitativosCalificados WHERE SubDimension = "Comercio Justo" AND Respuesta = "Nunca se ha tratado" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY SubDimension ORDER BY SubDimension;';
				$sqlComunidadNunca = 'SELECT COUNT(*) AS Nunca, SubDimension FROM IndicadoresCualitativosCalificados WHERE SubDimension = "Comunidad" AND Respuesta = "Nunca se ha tratado" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY SubDimension ORDER BY SubDimension;';
				$sqlContratosTrabajoNunca = 'SELECT COUNT(*) AS Nunca, SubDimension FROM IndicadoresCualitativosCalificados WHERE SubDimension = "Contratos trabajo" AND Respuesta = "Nunca se ha tratado" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY SubDimension ORDER BY SubDimension;';
				$sqlDespidosRotaciónNunca = 'SELECT COUNT(*) AS Nunca, SubDimension FROM IndicadoresCualitativosCalificados WHERE SubDimension = "Despidos o Rotación" AND Respuesta = "Nunca se ha tratado" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY SubDimension ORDER BY SubDimension;';
				$sqlDonacionesNunca = 'SELECT COUNT(*) AS Nunca, SubDimension FROM IndicadoresCualitativosCalificados WHERE SubDimension = "Donaciones" AND Respuesta = "Nunca se ha tratado" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY SubDimension ORDER BY SubDimension;';
				$sqlRemuneracionNunca = 'SELECT COUNT(*) AS Nunca, SubDimension FROM IndicadoresCualitativosCalificados WHERE SubDimension = "Remuneración" AND Respuesta = "Nunca se ha tratado" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY SubDimension ORDER BY SubDimension;';
				$sqlTransparenciaNunca = 'SELECT COUNT(*) AS Nunca, SubDimension FROM IndicadoresCualitativosCalificados WHERE SubDimension = "Transparencia" AND Respuesta = "Nunca se ha tratado" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY SubDimension ORDER BY SubDimension;';

				$sqlAsambleaNoConcidera = 'SELECT COUNT(*) AS NoConcidera, SubDimension FROM IndicadoresCualitativosCalificados WHERE SubDimension = "Asamblea" AND Respuesta = "No consideramos su aplicaión en la entidad" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY SubDimension ORDER BY SubDimension;';
				$sqlAsociatividadGruposInteresNoConcidera = 'SELECT COUNT(*) AS NoConcidera, SubDimension FROM IndicadoresCualitativosCalificados WHERE SubDimension = "Asociatividad grupos de interes" AND Respuesta = "No consideramos su aplicaión en la entidad" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY SubDimension ORDER BY SubDimension;';
				$sqlAusentismoNoConcidera = 'SELECT COUNT(*) AS NoConcidera, SubDimension FROM IndicadoresCualitativosCalificados WHERE SubDimension = "Ausentismo" AND Respuesta = "No consideramos su aplicaión en la entidad" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY SubDimension ORDER BY SubDimension;';
				$sqlComercioJustoNoConcidera = 'SELECT COUNT(*) AS NoConcidera, SubDimension FROM IndicadoresCualitativosCalificados WHERE SubDimension = "Comercio Justo" AND Respuesta = "No consideramos su aplicaión en la entidad" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY SubDimension ORDER BY SubDimension;';
				$sqlComunidadNoConcidera = 'SELECT COUNT(*) AS NoConcidera, SubDimension FROM IndicadoresCualitativosCalificados WHERE SubDimension = "Comunidad" AND Respuesta = "No consideramos su aplicaión en la entidad" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY SubDimension ORDER BY SubDimension;';
				$sqlContratosTrabajoNoConcidera = 'SELECT COUNT(*) AS NoConcidera, SubDimension FROM IndicadoresCualitativosCalificados WHERE SubDimension = "Contratos trabajo" AND Respuesta = "No consideramos su aplicaión en la entidad" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY SubDimension ORDER BY SubDimension;';
				$sqlDespidosRotaciónNoConcidera = 'SELECT COUNT(*) AS NoConcidera, SubDimension FROM IndicadoresCualitativosCalificados WHERE SubDimension = "Despidos o Rotación" AND Respuesta = "No consideramos su aplicaión en la entidad" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY SubDimension ORDER BY SubDimension;';
				$sqlDonacionesNoConcidera = 'SELECT COUNT(*) AS NoConcidera, SubDimension FROM IndicadoresCualitativosCalificados WHERE SubDimension = "Donaciones" AND Respuesta = "No consideramos su aplicaión en la entidad" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY SubDimension ORDER BY SubDimension;';
				$sqlRemuneracionNoConcidera = 'SELECT COUNT(*) AS NoConcidera, SubDimension FROM IndicadoresCualitativosCalificados WHERE SubDimension = "Remuneración" AND Respuesta = "No consideramos su aplicaión en la entidad" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY SubDimension ORDER BY SubDimension;';
				$sqlTransparenciaNoConcidera = 'SELECT COUNT(*) AS NoConcidera, SubDimension FROM IndicadoresCualitativosCalificados WHERE SubDimension = "Transparencia" AND Respuesta = "No consideramos su aplicaión en la entidad" AND IdCualitativoMaestro = '.$idCualitativosCalificados.' GROUP BY SubDimension ORDER BY SubDimension;';

				$dato['totalAsambleaSi'] = $this->db->query($sqlAsambleaSi)->result();
				$dato['totalAsociatividadGruposInteresSi'] = $this->db->query($sqlAsociatividadGruposInteresSi)->result();
				$dato['totalAusentismoSi'] = $this->db->query($sqlAusentismoSi)->result();
				$dato['totalComercioJustoSi'] = $this->db->query($sqlComercioJustoSi)->result();
				$dato['totalComunidadSi'] = $this->db->query($sqlComunidadSi)->result();
				$dato['totalContratosTrabajoSi'] = $this->db->query($sqlContratosTrabajoSi)->result();
				$dato['totalDespidosRotaciónSi'] = $this->db->query($sqlDespidosRotaciónSi)->result();
				$dato['totalDonacionesSi'] = $this->db->query($sqlDonacionesSi)->result();
				$dato['totalRemuneracionSi'] = $this->db->query($sqlRemuneracionSi)->result();
				$dato['totalTransparenciaSi'] = $this->db->query($sqlTransparenciaSi)->result();

				$dato['totalAsambleaNo'] = $this->db->query($sqlAsambleaNo)->result();
				$dato['totalAsociatividadGruposInteresNo'] = $this->db->query($sqlAsociatividadGruposInteresNo)->result();
				$dato['totalAusentismoNo'] = $this->db->query($sqlAusentismoNo)->result();
				$dato['totalComercioJustoNo'] = $this->db->query($sqlComercioJustoNo)->result();
				$dato['totalComunidadNo'] = $this->db->query($sqlComunidadNo)->result();
				$dato['totalContratosTrabajoNo'] = $this->db->query($sqlContratosTrabajoNo)->result();
				$dato['totalDespidosRotaciónNo'] = $this->db->query($sqlDespidosRotaciónNo)->result();
				$dato['totalDonacionesNo'] = $this->db->query($sqlDonacionesNo)->result();
				$dato['totalRemuneracionNo'] = $this->db->query($sqlRemuneracionNo)->result();
				$dato['totalTransparenciaNo'] = $this->db->query($sqlTransparenciaNo)->result();

				$dato['totalAsambleaNunca'] = $this->db->query($sqlAsambleaNunca)->result();
				$dato['totalAsociatividadGruposInteresNunca'] = $this->db->query($sqlAsociatividadGruposInteresNunca)->result();
				$dato['totalAusentismoNunca'] = $this->db->query($sqlAusentismoNunca)->result();
				$dato['totalComercioJustoNunca'] = $this->db->query($sqlComercioJustoNunca)->result();
				$dato['totalComunidadNunca'] = $this->db->query($sqlComunidadNunca)->result();
				$dato['totalContratosTrabajoNunca'] = $this->db->query($sqlContratosTrabajoNunca)->result();
				$dato['totalDespidosRotaciónNunca'] = $this->db->query($sqlDespidosRotaciónNunca)->result();
				$dato['totalDonacionesNunca'] = $this->db->query($sqlDonacionesNunca)->result();
				$dato['totalRemuneracionNunca'] = $this->db->query($sqlRemuneracionNunca)->result();
				$dato['totalTransparenciaNunca'] = $this->db->query($sqlTransparenciaNunca)->result();

				$dato['totalAsambleaNoConcidera'] = $this->db->query($sqlAsambleaNoConcidera)->result();
				$dato['totalAsociatividadGruposInteresNoConcidera'] = $this->db->query($sqlAsociatividadGruposInteresNoConcidera)->result();
				$dato['totalAusentismoNoConcidera'] = $this->db->query($sqlAusentismoNoConcidera)->result();
				$dato['totalComercioJustoNoConcidera'] = $this->db->query($sqlComercioJustoNoConcidera)->result();
				$dato['totalComunidadNoConcidera'] = $this->db->query($sqlComunidadNoConcidera)->result();
				$dato['totalContratosTrabajoNoConcidera'] = $this->db->query($sqlContratosTrabajoNoConcidera)->result();
				$dato['totalDespidosRotaciónNoConcidera'] = $this->db->query($sqlDespidosRotaciónNoConcidera)->result();
				$dato['totalDonacionesNoConcidera'] = $this->db->query($sqlDonacionesNoConcidera)->result();
				$dato['totalRemuneracionNoConcidera'] = $this->db->query($sqlRemuneracionNoConcidera)->result();
				$dato['totalTransparenciaNoConcidera'] = $this->db->query($sqlTransparenciaNoConcidera)->result();


				$dato["cualitativosCalificados"] = $this->db->query("SELECT * FROM CualitativoCalificadoMaestro WHERE IdCualitativocalificado = ".$idCualitativosCalificados.";")->result();
/*
Asamblea
AsociatividadGruposInteres
Ausentismo
ComercioJusto
Comunidad
ContratosTrabajo
DespidosRotación
Donaciones
Remuneracion
Transparencia
*/
/*
Asamblea
Asociatividad grupos de interes
Ausentismo
Comercio Justo
Comunidad
Contratos trabajo
Despidos o Rotación
Donaciones
Remuneración
Transparencia
*/


				$dato["contenedor"] = "indicadorEmpresa/graficaCualitativosPorSubDimension_view";
				$this->load->view("plantilla", $dato);
			}
		}else{
			redirect('inicio');
		}
	}
	public function verGraficaCuantitativosPorPrincipiosSEPS($IdDatosTotales, $periodo){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$sqlObtenerPrincipioSEPSCuantitativosAsoVol = "SELECT COUNT(*) AS Filas, I.PrincipiosSEPS AS PrincipiosSEPS, SUM(IC.ICCalificacion) AS SumCalificacion, (SUM(IC.ICCalificacion) / COUNT(*)) AS Promedio FROM IndicadorCalificado IC INNER JOIN Indicador I ON IC.ICIndicador = I.IdIndicador WHERE IC.IdDatosTotales = ".$IdDatosTotales." AND IC.IdEmpresa = ".$IdEmpresaSesion." AND I.PrincipiosSEPS = 'ASOCIACIÓN VOLUNTARIA' GROUP BY PrincipiosSEPS ORDER BY PrincipiosSEPS LIMIT 1;";
			$sqlObtenerPrincipioSEPSCuantitativosAutAut = "SELECT COUNT(*) AS Filas, I.PrincipiosSEPS AS PrincipiosSEPS, SUM(IC.ICCalificacion) AS SumCalificacion, (SUM(IC.ICCalificacion) / COUNT(*)) AS Promedio FROM IndicadorCalificado IC INNER JOIN Indicador I ON IC.ICIndicador = I.IdIndicador WHERE IC.IdDatosTotales = ".$IdDatosTotales." AND IC.IdEmpresa = ".$IdEmpresaSesion." AND I.PrincipiosSEPS = 'AUTOGESTIÓN Y AUTONOMÍA' GROUP BY PrincipiosSEPS ORDER BY PrincipiosSEPS LIMIT 1;";
			$sqlObtenerPrincipioSEPSCuantitativosCapFor = "SELECT COUNT(*) AS Filas, I.PrincipiosSEPS AS PrincipiosSEPS, SUM(IC.ICCalificacion) AS SumCalificacion, (SUM(IC.ICCalificacion) / COUNT(*)) AS Promedio FROM IndicadorCalificado IC INNER JOIN Indicador I ON IC.ICIndicador = I.IdIndicador WHERE IC.IdDatosTotales = ".$IdDatosTotales." AND IC.IdEmpresa = ".$IdEmpresaSesion." AND I.PrincipiosSEPS = 'CAPACITACIÓN Y FORMACIÓN' GROUP BY PrincipiosSEPS ORDER BY PrincipiosSEPS LIMIT 1;";
			$sqlObtenerPrincipioSEPSCuantitativosComCom = "SELECT COUNT(*) AS Filas, I.PrincipiosSEPS AS PrincipiosSEPS, SUM(IC.ICCalificacion) AS SumCalificacion, (SUM(IC.ICCalificacion) / COUNT(*)) AS Promedio FROM IndicadorCalificado IC INNER JOIN Indicador I ON IC.ICIndicador = I.IdIndicador WHERE IC.IdDatosTotales = ".$IdDatosTotales." AND IC.IdEmpresa = ".$IdEmpresaSesion." AND I.PrincipiosSEPS = 'COMPROMISO COMUNITARIO' GROUP BY PrincipiosSEPS ORDER BY PrincipiosSEPS LIMIT 1;";
			$sqlObtenerPrincipioSEPSCuantitativosIntSep = "SELECT COUNT(*) AS Filas, I.PrincipiosSEPS AS PrincipiosSEPS, SUM(IC.ICCalificacion) AS SumCalificacion, (SUM(IC.ICCalificacion) / COUNT(*)) AS Promedio FROM IndicadorCalificado IC INNER JOIN Indicador I ON IC.ICIndicador = I.IdIndicador WHERE IC.IdDatosTotales = ".$IdDatosTotales." AND IC.IdEmpresa = ".$IdEmpresaSesion." AND I.PrincipiosSEPS = 'INTEGRACIÓN SEPS' GROUP BY PrincipiosSEPS ORDER BY PrincipiosSEPS LIMIT 1;";
			$sqlObtenerPrincipioSEPSCuantitativosParEco = "SELECT COUNT(*) AS Filas, I.PrincipiosSEPS AS PrincipiosSEPS, SUM(IC.ICCalificacion) AS SumCalificacion, (SUM(IC.ICCalificacion) / COUNT(*)) AS Promedio FROM IndicadorCalificado IC INNER JOIN Indicador I ON IC.ICIndicador = I.IdIndicador WHERE IC.IdDatosTotales = ".$IdDatosTotales." AND IC.IdEmpresa = ".$IdEmpresaSesion." AND I.PrincipiosSEPS = 'PARTICIPACIÓN ECONÓMICA' GROUP BY PrincipiosSEPS ORDER BY PrincipiosSEPS LIMIT 1;";
			$sqlObtenerPrincipioSEPSCuantitativosTraCap = "SELECT COUNT(*) AS Filas, I.PrincipiosSEPS AS PrincipiosSEPS, SUM(IC.ICCalificacion) AS SumCalificacion, (SUM(IC.ICCalificacion) / COUNT(*)) AS Promedio FROM IndicadorCalificado IC INNER JOIN Indicador I ON IC.ICIndicador = I.IdIndicador WHERE IC.IdDatosTotales = ".$IdDatosTotales." AND IC.IdEmpresa = ".$IdEmpresaSesion." AND I.PrincipiosSEPS = 'TRABAJO SOBRE CAPITAL' GROUP BY PrincipiosSEPS ORDER BY PrincipiosSEPS LIMIT 1;";

			$dato["principioSEPSCuantitativosAsoVol"] = $this->db->query($sqlObtenerPrincipioSEPSCuantitativosAsoVol);
			$dato["principioSEPSCuantitativosAutAut"] = $this->db->query($sqlObtenerPrincipioSEPSCuantitativosAutAut);
			$dato["principioSEPSCuantitativosCapFor"] = $this->db->query($sqlObtenerPrincipioSEPSCuantitativosCapFor);
			$dato["principioSEPSCuantitativosComCom"] = $this->db->query($sqlObtenerPrincipioSEPSCuantitativosComCom);
			$dato["principioSEPSCuantitativosIntSep"] = $this->db->query($sqlObtenerPrincipioSEPSCuantitativosIntSep);
			$dato["principioSEPSCuantitativosParEco"] = $this->db->query($sqlObtenerPrincipioSEPSCuantitativosParEco);
			$dato["principioSEPSCuantitativosTraCap"] = $this->db->query($sqlObtenerPrincipioSEPSCuantitativosTraCap);

			$dato["periodo"] = $periodo;
			$dato["contenedor"] = "indicadorEmpresa/graficaCuantitativosPorPrincipiosSEPS_view";
			$this->load->view("plantilla", $dato);		
		}else{
			redirect('inicio');
		}
	}
	public function verGraficaCuantitativosPorGrupoInteres($IdDatosTotales, $periodo){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$sqlObtenerGruposInteresCuantitativosClientes = "SELECT COUNT(*) AS Filas, I.GrupoInteres AS GrupoInteres, SUM(IC.ICCalificacion) AS SumCalificacion, (SUM(IC.ICCalificacion) / COUNT(*)) AS Promedio FROM IndicadorCalificado IC INNER JOIN Indicador I ON IC.ICIndicador = I.IdIndicador WHERE IC.IdDatosTotales = ".$IdDatosTotales." AND IC.IdEmpresa = ".$IdEmpresaSesion." AND I.GrupoInteres = 'CLIENTES' GROUP BY GrupoInteres ORDER BY GrupoInteres LIMIT 1;";
			$sqlObtenerGruposInteresCuantitativosComunidad = "SELECT COUNT(*) AS Filas, I.GrupoInteres AS GrupoInteres, SUM(IC.ICCalificacion) AS SumCalificacion, (SUM(IC.ICCalificacion) / COUNT(*)) AS Promedio FROM IndicadorCalificado IC INNER JOIN Indicador I ON IC.ICIndicador = I.IdIndicador WHERE IC.IdDatosTotales = ".$IdDatosTotales." AND IC.IdEmpresa = ".$IdEmpresaSesion." AND I.GrupoInteres = 'COMUNIDAD' GROUP BY GrupoInteres ORDER BY GrupoInteres LIMIT 1;";
			$sqlObtenerGruposInteresCuantitativosEmpleados = "SELECT COUNT(*) AS Filas, I.GrupoInteres AS GrupoInteres, SUM(IC.ICCalificacion) AS SumCalificacion, (SUM(IC.ICCalificacion) / COUNT(*)) AS Promedio FROM IndicadorCalificado IC INNER JOIN Indicador I ON IC.ICIndicador = I.IdIndicador WHERE IC.IdDatosTotales = ".$IdDatosTotales." AND IC.IdEmpresa = ".$IdEmpresaSesion." AND I.GrupoInteres = 'EMPLEADOS' GROUP BY GrupoInteres ORDER BY GrupoInteres LIMIT 1;";
			$sqlObtenerGruposInteresCuantitativosProveedores = "SELECT COUNT(*) AS Filas, I.GrupoInteres AS GrupoInteres, SUM(IC.ICCalificacion) AS SumCalificacion, (SUM(IC.ICCalificacion) / COUNT(*)) AS Promedio FROM IndicadorCalificado IC INNER JOIN Indicador I ON IC.ICIndicador = I.IdIndicador WHERE IC.IdDatosTotales = ".$IdDatosTotales." AND IC.IdEmpresa = ".$IdEmpresaSesion." AND I.GrupoInteres = 'PROVEEDORES' GROUP BY GrupoInteres ORDER BY GrupoInteres LIMIT 1;";
			$sqlObtenerGruposInteresCuantitativosSocAccionistas = "SELECT COUNT(*) AS Filas, I.GrupoInteres AS GrupoInteres, SUM(IC.ICCalificacion) AS SumCalificacion, (SUM(IC.ICCalificacion) / COUNT(*)) AS Promedio FROM IndicadorCalificado IC INNER JOIN Indicador I ON IC.ICIndicador = I.IdIndicador WHERE IC.IdDatosTotales = ".$IdDatosTotales." AND IC.IdEmpresa = ".$IdEmpresaSesion." AND I.GrupoInteres = 'SOCIOS-ACCIONISTAS' GROUP BY GrupoInteres ORDER BY GrupoInteres LIMIT 1;";

			$dato["gruposInteresCuantitativosClientes"] = $this->db->query($sqlObtenerGruposInteresCuantitativosClientes);
			$dato["gruposInteresCuantitativosComunidad"] = $this->db->query($sqlObtenerGruposInteresCuantitativosComunidad);
			$dato["gruposInteresCuantitativosEmpleados"] = $this->db->query($sqlObtenerGruposInteresCuantitativosEmpleados);
			$dato["gruposInteresCuantitativosProveedores"] = $this->db->query($sqlObtenerGruposInteresCuantitativosProveedores);
			$dato["gruposInteresCuantitativosSocAccionista"] = $this->db->query($sqlObtenerGruposInteresCuantitativosSocAccionistas);

			$dato["periodo"] = $periodo;
			$dato["contenedor"] = "indicadorEmpresa/graficaCuantitativosPorGruposInteres_view";
			$this->load->view("plantilla", $dato);		
		}else{
			redirect('inicio');
		}
	}
	public function verGraficaCuantitativosPorDimension($IdDatosTotales, $periodo){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$sqlObtenerDimensionCuantitativosPeriodoEmpresaEco = "SELECT COUNT(*) AS Filas, I.Dimension AS Dimension, SUM(IC.ICCalificacion) AS SumCalificacion, (SUM(IC.ICCalificacion) / COUNT(*)) AS Promedio FROM IndicadorCalificado IC INNER JOIN Indicador I ON IC.ICIndicador = I.IdIndicador WHERE IC.IdDatosTotales = ".$IdDatosTotales." AND IC.IdEmpresa = ".$IdEmpresaSesion." AND I.Dimension = 'ECONÓMICO' GROUP BY Dimension ORDER BY Dimension LIMIT 1;";
			$sqlObtenerDimensionCuantitativosPeriodoEmpresaFil = "SELECT COUNT(*) AS Filas, I.Dimension AS Dimension, SUM(IC.ICCalificacion) AS SumCalificacion, (SUM(IC.ICCalificacion) / COUNT(*)) AS Promedio FROM IndicadorCalificado IC INNER JOIN Indicador I ON IC.ICIndicador = I.IdIndicador WHERE IC.IdDatosTotales = ".$IdDatosTotales." AND IC.IdEmpresa = ".$IdEmpresaSesion." AND I.Dimension = 'FILANTRÓPICO' GROUP BY Dimension ORDER BY Dimension LIMIT 1;";
			$sqlObtenerDimensionCuantitativosPeriodoEmpresaLS = "SELECT COUNT(*) AS Filas, I.Dimension AS Dimension, SUM(IC.ICCalificacion) AS SumCalificacion, (SUM(IC.ICCalificacion) / COUNT(*)) AS Promedio FROM IndicadorCalificado IC INNER JOIN Indicador I ON IC.ICIndicador = I.IdIndicador WHERE IC.IdDatosTotales = ".$IdDatosTotales." AND IC.IdEmpresa = ".$IdEmpresaSesion." AND I.Dimension = 'LEGAL-SOCIAL' GROUP BY Dimension ORDER BY Dimension LIMIT 1;";
			$sqlObtenerDimensionCuantitativosPeriodoEmpresaMA = "SELECT COUNT(*) AS Filas, I.Dimension AS Dimension, SUM(IC.ICCalificacion) AS SumCalificacion, (SUM(IC.ICCalificacion) / COUNT(*)) AS Promedio FROM IndicadorCalificado IC INNER JOIN Indicador I ON IC.ICIndicador = I.IdIndicador WHERE IC.IdDatosTotales = ".$IdDatosTotales." AND IC.IdEmpresa = ".$IdEmpresaSesion." AND I.Dimension = 'MEDIOAMBIENTAL' GROUP BY Dimension ORDER BY Dimension LIMIT 1;";

			$dato["dimensionCuantitativosEconomico"] = $this->db->query($sqlObtenerDimensionCuantitativosPeriodoEmpresaEco);
			$dato["dimensionCuantitativosFilantropico"] = $this->db->query($sqlObtenerDimensionCuantitativosPeriodoEmpresaFil);
			$dato["dimensionCuantitativosLegalSocial"] = $this->db->query($sqlObtenerDimensionCuantitativosPeriodoEmpresaLS);
			$dato["dimensionCuantitativosMediaAmbiental"] = $this->db->query($sqlObtenerDimensionCuantitativosPeriodoEmpresaMA);
			$dato["periodo"] = $periodo;
			$dato["contenedor"] = "indicadorEmpresa/graficaCuantitativosPorDimension_view";
			$this->load->view("plantilla", $dato);		
		}else{
			redirect('inicio');
		}
	}	
	public function verGraficaCuantitativosPorSubDimension($IdDatosTotales, $periodo){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$sqlObtenerSubDimensionCuantitativosPeriodoEmpresa = "SELECT COUNT(*) AS Filas, I.SubDimension AS SubDimension, SUM(IC.ICCalificacion) AS SumCalificacion, (SUM(IC.ICCalificacion) / COUNT(*)) AS Promedio FROM IndicadorCalificado IC INNER JOIN Indicador I ON IC.ICIndicador = I.IdIndicador WHERE IC.IdDatosTotales = ".$IdDatosTotales." AND IC.IdEmpresa = ".$IdEmpresaSesion." GROUP BY SubDimension ORDER BY SubDimension;";

			$dato["subDimensionesCuantitativos"] = $this->db->query($sqlObtenerSubDimensionCuantitativosPeriodoEmpresa);
			$dato["periodo"] = $periodo;
			$dato["contenedor"] = "indicadorEmpresa/graficaCuantitativosPorSubDimension_view";
			$this->load->view("plantilla", $dato);		
		}else{
			redirect('inicio');
		}
	}
	/**
	 * Inicadores Cualitativos Re-Estructurado
	 */
	public function calificacionIndicadoresCualitativosListaPeriodos2(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."indicadorEmpresa" => "Análisis de Indicadores",
			                     $inicioURL."indicadorEmpresa/indicadoresCualitativosModulos" => "Indicadores Cualitativos",
			                     $inicioURL."indicadorEmpresa/calificacionIndicadoresCualitativosListaPeriodos" => "Listado y Creación de Calificación de Indicadores Cualitativos"
			                    );						
			$dato["ubicacionURL"] = $relativeURL;

			$this->load->model('IndicadorCualitativo_Modelo');
			$dato['cualitativosCalificadosMaestro'] = $this->IndicadorCualitativo_Modelo->getListIndicadorCualitativoEmpresaMaestro($IdEmpresaSesion);			
			$dato["contenedor"] = "indicadorEmpresa/listadoCalificacionIndicadoresCualitativosPeriodo_view";
			
			$this->load->view("plantilla", $dato);				
		}else{
			redirect('inicio');
	
		}
	}

	public function calificacionIndicadoresCualitativosListaPeriodos(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."indicadorEmpresa" => "Análisis de Indicadores",
			                     $inicioURL."indicadorEmpresa/indicadoresCualitativosModulos" => "Indicadores Cualitativos",
			                     $inicioURL."indicadorEmpresa/calificacionIndicadoresCualitativosListaPeriodos" => "Listado y Creación de Calificación de Indicadores Cualitativos"
			                    );
			$dato["ubicacionURL"] = $relativeURL;

			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('IndicadorCualitativo_Modelo');
				$dato['cualitativosCalificadosMaestro'] = $this->IndicadorCualitativo_Modelo->getListIndicadorCualitativoEmpresaMaestro($IdEmpresaSesion);
				$dato["admin"] = 1;
				$dato["contenedor"] = "indicadorEmpresa/listadoCalificacionIndicadoresCualitativosPeriodo_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "calificacionIndicadoresCualitativosListaPeriodos", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('IndicadorCualitativo_Modelo');
						$dato['cualitativosCalificadosMaestro'] = $this->IndicadorCualitativo_Modelo->getListIndicadorCualitativoEmpresaMaestro($IdEmpresaSesion);
						$dato["contenedor"] = "indicadorEmpresa/listadoCalificacionIndicadoresCualitativosPeriodo_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "indicadorEmpresa/listadoCalificacionIndicadoresCualitativosPeriodo_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "indicadorEmpresa/listadoCalificacionIndicadoresCualitativosPeriodo_view";
					$this->load->view('plantilla', $dato);
				}
 			}			
		}else{
			redirect('inicio');
		}
	}

	public function calificarIndicadoresCualitativosDetalle($IdCualitativoMaestro){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."indicadorEmpresa" => "Análisis de Indicadores",
			                     $inicioURL."indicadorEmpresa/indicadoresCualitativosModulos" => "Indicadores Cualitativos",
			                     $inicioURL."indicadorEmpresa/calificacionIndicadoresCualitativosListaPeriodos" => "Listado y Creación de Calificación de Indicadores Cualitativos"
			                    );
			$dato["ubicacionURL"] = $relativeURL;

			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('IndicadorCualitativo_Modelo');
				$dato['cualitativos'] = $this->IndicadorCualitativo_Modelo->getListIndicadorCualitativoACalificar($IdCualitativoMaestro);
				$dato["admin"] = 1;
				$dato["IdCualitativoMaestro"] = $IdCualitativoMaestro;
				$dato["contenedor"] = "indicadorEmpresa/calificarIndicadoresCualitativosDetalle_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "calificacionIndicadoresCualitativosListaPeriodos", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('IndicadorCualitativo_Modelo');
						$dato['cualitativos'] = $this->IndicadorCualitativo_Modelo->getListIndicadorCualitativoACalificar($IdCualitativoMaestro);
						$dato["IdCualitativoMaestro"] = $IdCualitativoMaestro;
						$dato["contenedor"] = "indicadorEmpresa/calificarIndicadoresCualitativosDetalle_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "indicadorEmpresa/calificarIndicadoresCualitativosDetalle_new_edit";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "indicadorEmpresa/calificarIndicadoresCualitativosDetalle_new_edit";
					$this->load->view('plantilla', $dato);
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function justificarIndicadorCualitativoCalificado($IdCualitativosCalificados, $IdCualitativoMaestro){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$this->load->model('IndicadorCualitativo_Modelo');
			$dato['indicadorCualitativoCalifiacadoEmpresa'] = $this->IndicadorCualitativo_Modelo->getIndicadorCualitativoCalificadoEmpresa($IdCualitativosCalificados, $IdCualitativoMaestro);
			$dato["IdCualitativoMaestro"] = $IdCualitativoMaestro;
			$dato["contenedor"] = "indicadorEmpresa/justificarIndicadorCualitativoCalificado_new_edit";			
			$dato["titulo"] = "Editar Indicador Cualitativo Calificado";
			$dato["accion"] = "Editar";		
			$this->load->view('plantilla', $dato);			
		}else{
			redirect('inicio');
		}
	}
	public function guardarCalificacionIndicadorCualitativo(){
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
		$IdCualitativoMaestro = $_POST['id'];
		echo $IdCualitativoMaestro."<br>";

		$this->load->model('IndicadorCualitativo_Modelo');
		$cualitativos = $this->IndicadorCualitativo_Modelo->getListIndicadorCualitativoACalificar($IdCualitativoMaestro);
		echo $cualitativos[0]->IdCualitativosCalificados;
		echo "<br>";		
		$respuestas = $_POST["respuesta"];
		
		echo "<br>";
		echo "Número de Registros :".count($respuestas)."<br>";		
		$i = 0;
		foreach ($cualitativos as $key) {
			$ids = $key->IdCualitativosCalificados;			
			$sqlUpdate = "UPDATE IndicadoresCualitativosCalificados SET Respuesta = '".$respuestas[$i]."' WHERE IdCualitativosCalificados = ".$ids.";";
			$this->db->query($sqlUpdate);
			//echo $sqlUpdate."<br>";
			//echo "El i ".$i. " el ids ".$ids." la respuesta ".$respuestas[$i]."<br>"; //$sqlUpdate."<br>";
			$i++;
		}
		if ($i == count($respuestas)) {
			$mensaje = "La Calificación de los Indicadores Cualitativos ha sido registrada con éxito";
			$this->session->set_flashdata('mensaje',$mensaje);
			redirect('indicadorEmpresa/calificacionIndicadoresCualitativosListaPeriodos');
			//$this->calificacionIndicadoresCualitativosListaPeriodos();
		}else{
			$mensaje = "La Calificación de los Indicadores Cualitativos no se ha podido registrar";
			$this->session->set_flashdata('mensaje',$mensaje);
			//redirect('indicadorEmpresa/calificarIndicadoresCualitativosDetalle');
			$this->calificarIndicadoresCualitativosDetalle($IdCualitativoMaestro);
		}		
	}
	public function guardarJustificacionIndicadorCualitativoCalificado(){		
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");

		$idMaestro = $_POST['idMaestro'];
		$idIndicadorCualitativo = $_POST['idIndicadorCualitativo'];
		
		$this->load->model('IndicadorCualitativo_Modelo');
		$txtJustificacion = $_POST["txtJustificacion"];			
		
		if($this->IndicadorCualitativo_Modelo->updatejustificacionIndicadorCualitativoCalificado($idIndicadorCualitativo, $idMaestro, $txtJustificacion)){
			$mensaje = "La Justificación del Indicador se ha modificado con éxito";
			$this->session->set_flashdata('mensaje',$mensaje);
			redirect('indicadorEmpresa/calificarIndicadoresCualitativosDetalle/'.$idMaestro);
		}else{
			$mensaje = "La Justificación del Indicador no se ha modificado, verfique los datos ingresados";
			$this->session->set_flashdata('mensaje',$mensaje);
			$this->justificarIndicadorCualitativoCalificado($idIndicadorCualitativo, $idMaestro);				
		}		
	}

	public function nuevoPeriodoCalificacionIndicadoresCualitativos(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$dato["contenedor"] = "indicadorEmpresa/nuevoPeriodoCalificacionIndicadoresCualitativos_new_edit";
			$dato["titulo"] = "Nuevo Periodo de Calificación de Indicadores Cualitativos";
			$dato["accion"] = "Nuevo";
			$this->load->view('plantilla', $dato);
		}else{
			redirect('inicio');
		}
	}
	public function guardarPeriodoCalificacionIndicadoresCualitativos(){
		$this->form_validation->set_rules('txtPeriodo','Periodo','trim|required|integer'); 		
		$this->form_validation->set_rules('txtFechaRegistro','Fecha de Registro','trim|required');		
		$accion = $_POST['accion'];
		$id = $_POST['id'];			
		if ($this->form_validation->run() == false) {
			if ($accion == "Editar") {
				$this->nuevoPeriodoCalificacionIndicadoresCualitativos();				
			}else{
				$this->nuevoPeriodoCalificacionIndicadoresCualitativos();
			}
		}else{
			$this->load->model('IndicadorCualitativo_Modelo');
			$tiempo = time();		
			$txtPeriodo = $_POST["txtPeriodo"];
			$txtFechaRegistro = $_POST["txtFechaRegistro"];
			$txtObservacion = $_POST["txtObservacion"];		
			$fechaSistema = date("Y-m-d H:i:s", $tiempo);
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($_POST["accion"] == "Nuevo"){
				$insertIndicadorCualitativo = array(
					'Periodo' => $txtPeriodo,
					'FechaRegistro' => $txtFechaRegistro,
					'Observacion' => $txtObservacion,
					'FechaSistema' => $fechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				$IdCualitativoMaestro = $this->IndicadorCualitativo_Modelo->insertPeriodoCalificacionIndicadorCualitativoMaestro($insertIndicadorCualitativo);
				if($IdCualitativoMaestro != NULL OR $IdCualitativoMaestro != 0){
					$this->IndicadorCualitativo_Modelo->insertPeriodoCalificacionIndicadorCualitativoDetalle($IdCualitativoMaestro, $txtPeriodo);
					$mensaje = "La Nueva Calificación en el Periodo se registró con éxito ".$IdCualitativoMaestro;
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->calificacionIndicadoresCualitativosListaPeriodos();
					redirect('indicadorEmpresa/calificacionIndicadoresCualitativosListaPeriodos');
				}else{
					$mensaje = "La Nueva Calificación en el Periodo no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoPeriodoCalificacionIndicadoresCualitativos();				
				}
			}
		}
	}
	public function eliminarCalificacionIndicadoresCualitativos(){
		$this->load->model('IndicadorCualitativo_Modelo'); 		          	
		$PeriodoCualitativoCalificado 		= json_decode($this->input->post('MiPeriodoCualitativoCalificado'));
		$id          = base64_decode($PeriodoCualitativoCalificado->Id);
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->IndicadorCualitativo_Modelo->deleteCalificacionIndicadoresCualitativos($id, $IdEmpresaSesion); 
	}




}

?>
