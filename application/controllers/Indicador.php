<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//Controlador 
class indicador extends CI_Controller {

	function __construct()	{
		parent::__construct();	
		$this->load->helper('form');
		$this->load->model('Indicador_Modelo');		
		$this->load->model('IndicadoresEmpresa_Modelo');	
	}

	//Función para cargar el inicio
	public function index()	{
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$dato["contenedor"] = "indicadores/modulosIndicadores";  
			$this->load->view("plantilla", $dato);
		}else{
			redirect('inicio');
		}		
	}	

	public function index2()	{
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$this->load->model('Indicador_Modelo');
			$dato["contenedor"] = "indicadores/indicadores_view";
			$dato['indicadorCualitativo'] = $this->Indicador_Modelo->getListIndicadorCualitativo();  
			$dato["titulo"] = "Titulo de algo"; 
			$dato["accion"] = "Ver";   
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
			$dato["contenedor"] = "indicadores/modulosIndicadoresCualitativos";  
			$this->load->view("plantilla", $dato);
		}else{
			redirect('inicio');
		}
	}

	public function indicadoresCualitativos(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();							
			$relativeURL = array($inicioURL."principal" => "Módulos",
		                     $inicioURL."indicadorEmpresa" => "Análisis de Indicadores",
		                     $inicioURL."indicadorEmpresa/indicadoresCualitativosModulos" => "Indicadores Cualitativos",
		                     $inicioURL."Indicador/indicadoresCualitativos" => "Matriz de Indicadores Cualitativos"
		                    );
			$dato["ubicacionURL"] = $relativeURL;
			$this->load->model('IndicadorCualitativo_Modelo');
			$dato['indicadoresCualitativos'] = $this->IndicadorCualitativo_Modelo->getListIndicadorCualitativoMatriz();
			$dato["contenedor"] = "indicadores/indicadoresCualitativos_view";
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
			$this->load->view('impresion/imprimirIndicadoresCualitativos', $dato);
		}else{
			redirect('inicio');
		}
	}

	public function indicadoresCuantitativosModulos(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$dato["contenedor"] = "indicadores/modulosIndicadoresCuantitativos";  
			$this->load->view("plantilla", $dato);
		}else{
			redirect('inicio');
		}
	}

	/**
	* Indicadores Cunatitativos
	**/
	public function selectIndicadorCuantitativo($value=''){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();				
			if (empty($value)) {
				$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."indicadorEmpresa" => "Análisis de Indicadores",
			                     $inicioURL."indicadorEmpresa/indicadoresCuantitativosModulos" => "Análisis de Cuantitativos",
			                     $inicioURL."Indicador/selectIndicadorCuantitativo" => "Matriz de Indicadores"
			                    );	
			}else{
				$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."indicadorEmpresa" => "Empresa",
			                     $inicioURL."indicadorEmpresa/indicadoresCuantitativosEmpresa" => "Indicadores",
			                     $inicioURL."indicadorEmpresa/indicadoresCuantitativosEmpresa" => "Indicadores Cuantitativos",
			                     $inicioURL."indicador/selectIndicadorCuantitativo/1" => "Agregar Indicadores"
			                    );
			}
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model("Indicador_Modelo");
				$dato['addIndicadoresEmpresa'] = $this->Indicador_Modelo->getListIndicadorCuantitativoEmpresa($IdEmpresaSesion);
				$dato['indicadorMatriz'] = $this->Indicador_Modelo->getListIndicadorMatriz();
				$dato["rutaRegreso"] = $value;
				$dato["contenedor"] = "indicadores/seleccionIndicadorCuantitativo_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "indicadoresCuantitativosEmpresa", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model("Indicador_Modelo");
						$dato['addIndicadoresEmpresa'] = $this->Indicador_Modelo->getListIndicadorCuantitativoEmpresa($IdEmpresaSesion);
						$dato['indicadorMatriz'] = $this->Indicador_Modelo->getListIndicadorMatriz();
						$dato["rutaRegreso"] = $value;
						$dato["contenedor"] = "indicadores/seleccionIndicadorCuantitativo_view";
						$this->load->view('plantilla', $dato);
					}else{
						$this->load->model("Indicador_Modelo");
						$dato['indicadorMatriz'] = $this->Indicador_Modelo->getListIndicadorMatriz();
						$dato["rutaRegreso"] = $value;
						$dato["contenedor"] = "indicadores/seleccionIndicadorCuantitativo_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$this->load->model("Indicador_Modelo");
					$dato['indicadorMatriz'] = $this->Indicador_Modelo->getListIndicadorMatriz();
					$dato["rutaRegreso"] = $value;
					$dato["contenedor"] = "indicadores/seleccionIndicadorCuantitativo_view";
					$this->load->view('plantilla', $dato);
				}
 			}					
		}else{
			redirect('inicio');
		}
	}
	public function indicadoresCuantitativos(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$this->load->model('IndicadoresEmpresa_Modelo');
			$dato['indicadoresCuantitativos'] = $this->IndicadoresEmpresa_Modelo->getListIndicadorCuantitativoEmpresa($IdEmpresaSesion); 
			$dato["contenedor"] = "indicadores/indicadoresCuantitativos_view";
			$dato["titulo"] = "Nuevo Indicador Cuantitativo";
			$dato["accion"] = "Nuevo";
			$this->load->view('plantilla', $dato);
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

	public function editarIndicadorCuantitativo($IdEditar){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$this->load->model('Indicador_Modelo');
			$dato['indicadorCuantitativo'] = $this->Indicador_Modelo->getIndicadorCuantitativo($IdEditar); 
			$dato["contenedor"] = "indicadores/indicadoresCuantitativos_new_edit";
			$dato["titulo"] = "Detalles Indicador Cuantitativo";
			$dato["accion"] = "Editar";
			$this->load->view('plantilla', $dato);
		}else{
			redirect('inicio');
		}
	}

	public function guardarIndicadoresSeleccionadosPorFiltro(){
		if($this->session->userdata("IdEmpresaSesion")){			
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$anio = $_POST['txtAnio'];
			if (empty($anio)) {
				$mensaje = "Para la Guardar debe ingrese un periodo válido";
				$this->session->set_flashdata('mensaje',$mensaje);
				$this->selectIndicadoresFiltroAnio();
			}else{
				$seleccionado = $_POST['selectIndicadorFiltro'];
				if ($seleccionado != -1) {
					$this->load->model('IndicadoresEmpresa_Modelo');
					if ($this->IndicadoresEmpresa_Modelo->insertIndicadoresSeleccionadoPorFiltro($IdEmpresaSesion, $anio, $seleccionado)) {
						$mensaje = "Indicadores guardados para el Periodo ".$anio;
						$this->session->set_flashdata('mensaje',$mensaje);
						$this->selectIndicadoresFiltroAnio();
					}else{
						$mensaje = "No se han guardado Indicadores";
						$this->session->set_flashdata('mensaje',$mensaje);
						$this->selectIndicadoresFiltroAnio();
					}	
				}else{
					$mensaje = "El Sector no ha sido Seleccionado";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->selectIndicadoresFiltroAnio();
				}		
				
			}
		}else{
			redirect('inicio');
		}
	}

	/* AQUIIIII */
	public function filtroAnioGuardarIndicadores(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$year = $_POST['yy'];
			$myid = $_POST['id'];
			$result = $this->IndicadoresEmpresa_Modelo->insertIndicadoresSeleccionadoPorFiltro2($IdEmpresaSesion, $year, $myid); 
				if($result){
					echo "Success: ";
				}else{
					echo "Error";
				}
		}else{
				$mensaje = "El Sector no ha sido Seleccionado";
				$this->session->set_flashdata('mensaje',$mensaje);
		}
	}

	//HECHO POR MI
	public function filtroAnio2(){
	  $yy1 = $_POST['yy'];
      $fetch_data = $this->Indicador_Modelo->getIndicadoresPorSector3($yy1);
      $data = array();  
           foreach($fetch_data->result() as $row){  
                $sub_array = array();  
                $sub_array[] = $row->IdIndicador;
                $sub_array[] = '<td>'.$row->IdIndicador.'</td>';  
                $sub_array[] = '<td>'.$row->Nombre.'</td>';  
                $sub_array[] = '<td>'.$row->Sector.'</td>';  
                $sub_array[] = '<td>'.$row->Resultado.'<td>';
                $sub_array[] = '<td>'.$row->Dimension.'<td>';
                $sub_array[] = '<td>'.$row->SubDimension.'<td>';
                $sub_array[] = '<td>'.$row->Area.'<td>';
                $sub_array[] = '<td>'.$row->principiosACI.'<td>';
                $sub_array[] = '<td>'.$row->dimensionesACI.'<td>';
                $sub_array[] = '<td>'.$row->FormulaResultado.'<td>';
                $data[] = $sub_array;  
           }  
           $output = array(
                "data"=>$data  
           );  
           echo json_encode($output);
	}
	// FIN 
	
	public function selectIndicadoresFiltroAnio(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
				$inicioURL."empresa" => "Empresa",
				$inicioURL."indicadorEmpresa/indicadoresAdicionModulos" => "Indicadores",
				$inicioURL."indicador/selectIndicadoresFiltroAnio" => "Seleccionar Indicadores Cuantitativos"
				);						
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
			
			if ($tipoUsuario == "Admin") {
				$dato["admin"] = 1;
				$this->load->model("Indicador_Modelo");
				$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
				$dato["contenedor"] = "indicadores/selectIndicadoresFiltroAnio";
				$dato['indicadores'] = $this->Indicador_Modelo->getListIndicadorMatrizPorSector();
				$dato['indicadorByDim'] = $this->Indicador_Modelo->getListIndicadorMatrizPorDimension();
				$dato['indicadorBySubDim'] = $this->Indicador_Modelo->getListIndicadorMatrizPorSubDimension();
				//$dato['indicadorCuantitativoEmpresa'] = $this->Indicador_Modelo->getIndicadoresPorSector3(date("Y"));
				$this->load->view('plantilla', $dato);
			}else{
				$perfilSesion = $this->session->userdata("perfilSesion");
				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "selectIndicadoresFiltroAnio", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model("Indicador_Modelo");
						$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
						$dato["contenedor"] = "indicadores/selectIndicadoresFiltroAnio";
						$dato['indicadores'] = $this->Indicador_Modelo->getListIndicadorMatrizPorSector();
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "indicadores/selectIndicadoresFiltroAnio";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "indicadores/selectIndicadoresFiltroAnio";
					$this->load->view('plantilla', $dato);
				}
			}			
		}else{
			redirect('inicio');
		}
	}

	public function mostrarIndicadoresFiltro(){
		if($this->session->userdata("IdEmpresaSesion")){

			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$sector = $_GET['q'];
			$anio = $_GET['q2'];
			$this->load->model("Indicador_Modelo");
			$dato["contenedor"] = "indicadores/selectIndicadoresFiltroAnio";
			$dato['indicadorCuantitativoEmpresa'] = $this->Indicador_Modelo->getIndicadoresPorSector($sector);	
			//$this->load->view('indicadores/indicadoresFiltro_view2', $dato);
			$this->load->view('plantilla', $dato);
		}else{
			redirect('inicio');
		}
	}

	public function mostrarIndicadoresFiltroDimension(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$dimension = $_GET['q'];
			$this->load->model("Indicador_Modelo");

			//$sql = "SELECT * FROM Indicador WHERE Herramienta = '".$q."'";
			//$dato['indicadorCuantitativoEmpresa'] = $this->db->query($sql)->result();	
			$dato['indicadorCuantitativoEmpresa'] = $this->Indicador_Modelo->getIndicadoresPorDimension($dimension);	
		//$dato["contenedor"] = "indicadores/indicadoresFiltro_view";
		//$this->load->view('plantilla', $dato);
			$this->load->view('indicadores/indicadoresFiltro_view2', $dato);
		}else{
			redirect('inicio');
		}
	}

		public function mostrarIndicadoresFiltroSubDimension(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$subdimension = $_GET['q'];
			$this->load->model("Indicador_Modelo");

			//$sql = "SELECT * FROM Indicador WHERE Herramienta = '".$q."'";
			//$dato['indicadorCuantitativoEmpresa'] = $this->db->query($sql)->result();	
			$dato['indicadorCuantitativoEmpresa'] = $this->Indicador_Modelo->getIndicadoresPorSubDimension($subdimension);	
		//$dato["contenedor"] = "indicadores/indicadoresFiltro_view";
		//$this->load->view('plantilla', $dato);
			$this->load->view('indicadores/indicadoresFiltro_view2', $dato);
		}else{
			redirect('inicio');
		}
	}








	/**
	* Indicadores Cualitativos
	**/
	public function selectIndicadorCualitativoDimension($value=''){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();				
			if (empty($value)) {
				$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."indicadorEmpresa" => "Análisis de Indicadores",
			                     $inicioURL."indicadorEmpresa/indicadoresCualitativosModulos" => "Indicadores Cualitativos",
			                     $inicioURL."Indicador/selectIndicadorCualitativoDimension" => "Selección de Indicadores Cualitativos"
			                    );	
			}else{
				$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa" => "Empresa",
			                     $inicioURL."indicadorEmpresa/indicadoresAdicionModulos" => "Indicadores",
			                     $inicioURL."indicadorEmpresa/indicadoresCualitativosEmpresa" => "Indicadores Cualitativos",
			                     $inicioURL."indicador/selectIndicadorCualitativoDimension/1" => "Agregar Sub-Dimensión"
			                    );
			}
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model("Indicador_Modelo");
				$dato['addIndicadoresCualitativosEmpresa'] = $this->Indicador_Modelo->getListIndicadorCualitativoEmpresaSubDimension($IdEmpresaSesion);
				$dato['indicadorCualitativoSubDimension'] = $this->Indicador_Modelo->getListIndicadorCualitativoEmpresaSeleccYNoSelecc($IdEmpresaSesion);
				$dato["admin"] = 1;
				$dato["rutaRegreso"] = $value;
				$dato["contenedor"] = "indicadores/seleccionIndicadorCualitativo_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "indicadoresCualitativosEmpresa", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
					$this->load->model("Indicador_Modelo");
					$dato['addIndicadoresCualitativosEmpresa'] = $this->Indicador_Modelo->getListIndicadorCualitativoEmpresaSubDimension($IdEmpresaSesion);
					$dato['indicadorCualitativoSubDimension'] = $this->Indicador_Modelo->getListIndicadorCualitativoEmpresaSeleccYNoSelecc($IdEmpresaSesion);
					$dato["rutaRegreso"] = $value;
					$dato["contenedor"] = "indicadores/seleccionIndicadorCualitativo_view";
					$this->load->view('plantilla', $dato);
					}else{
						$this->load->model("Indicador_Modelo");
						$dato['indicadorCualitativoSubDimension'] = $this->Indicador_Modelo->getListIndicadorCualitativoEmpresaSeleccYNoSelecc($IdEmpresaSesion);
						$dato["rutaRegreso"] = $value;
						$dato["contenedor"] = "indicadores/seleccionIndicadorCualitativo_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$this->load->model("Indicador_Modelo");
					$dato['indicadorCualitativoSubDimension'] = $this->Indicador_Modelo->getListIndicadorCualitativoEmpresaSeleccYNoSelecc($IdEmpresaSesion);
					$dato["rutaRegreso"] = $value;
					$dato["contenedor"] = "indicadores/seleccionIndicadorCualitativo_view";
					$this->load->view('plantilla', $dato);
				}
 			}						
		}else{
			redirect('inicio');
		}
	}
}

?>
