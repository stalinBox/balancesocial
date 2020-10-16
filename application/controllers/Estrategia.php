<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//Controlador 
class estrategia extends CI_Controller {

	function __construct()	{
		parent::__construct();				
	}

//PARA MIGRAR

	// ESTRATEGIAS EFECTO
	public function filtroAnioEstrategiaEfecto(){
		$this->load->model('Estrategias_Modelo');
	  	$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
      	$fetch_data = $this->Estrategias_Modelo->getListEstrategiaEfectoAnio($IdEmpresaSesion);
      	$data = array();  
           foreach($fetch_data->result() as $row){  
                $sub_array = array();  
                $sub_array[] = $row->IdEfecto;
                $sub_array[] = '<td >'.$row->Efecto.'<td>';
                $sub_array[] = '<td >'.$row->Periodo.'<td>';
                $data[] = $sub_array;  
        }
        $output = array(
            "data"=>$data  
        );
           echo json_encode($output);
	}

	public function filtroAnioGuardarEstrategiaEfecto(){
		$this->form_validation->set_rules('txtPeriodo','Se requiere el periodo','trim|required');
		if($this->session->userdata("IdEmpresaSesion")){
			$this->load->model('Estrategias_Modelo');
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$year = $_POST['anioMigrar'];
			$listaAcuerdos = $_POST['id'];
			$result = $this->Estrategias_Modelo->insertEstrategiaEfectoSelectedMigrar($IdEmpresaSesion, $year, $listaAcuerdos); 
			
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
	// FIN ESTRATEGIAS EFECTO

	// ESTRATEGIAS OPORTUNIDAD
	public function filtroAnioEstrategiaOportunidad(){
		$this->load->model('Estrategias_Modelo');
	  	$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
      	$fetch_data = $this->Estrategias_Modelo->getListEstrategiaOportunidadAnio($IdEmpresaSesion);
      	$data = array();  
           foreach($fetch_data->result() as $row){  
                $sub_array = array();  
                $sub_array[] = $row->IdOportunidad;
                $sub_array[] = '<td >'.$row->Oportunidad.'<td>';
                $sub_array[] = '<td >'.$row->Periodo.'<td>';
                $data[] = $sub_array;  
        }
        $output = array(
            "data"=>$data  
        );
           echo json_encode($output);
	}

	public function filtroAnioGuardarEstrategiaOportunidad(){
		$this->form_validation->set_rules('txtPeriodo','Se requiere el periodo','trim|required');
		if($this->session->userdata("IdEmpresaSesion")){
			$this->load->model('Estrategias_Modelo');
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$year = $_POST['anioMigrar'];
			$listaAcuerdos = $_POST['id'];
			$result = $this->Estrategias_Modelo->insertEstrategiaOportunidadSelectedMigrar($IdEmpresaSesion, $year, $listaAcuerdos); 
			
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
	// FIN ESTRATEGIAS OPORTUNIDAD

	// ESTRATEGIAS POLITICAS
	public function filtroAnioEstrategiaPolitica(){
		$this->load->model('Estrategias_Modelo');
	  	$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
      	$fetch_data = $this->Estrategias_Modelo->getListEstrategiaPoliticaAnio($IdEmpresaSesion);
      	$data = array();  
           foreach($fetch_data->result() as $row){  
                $sub_array = array();  
                $sub_array[] = $row->IdPolitica;
                $sub_array[] = '<td >'.$row->Politica.'<td>';
                $sub_array[] = '<td >'.$row->Periodo.'<td>';
                $data[] = $sub_array;  
        }
        $output = array(
            "data"=>$data  
        );
           echo json_encode($output);
	}

	public function filtroAnioGuardarEstrategiaPolitica(){
		$this->form_validation->set_rules('txtPeriodo','Se requiere el periodo','trim|required');
		if($this->session->userdata("IdEmpresaSesion")){
			$this->load->model('Estrategias_Modelo');
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$year = $_POST['anioMigrar'];
			$listaAcuerdos = $_POST['id'];
			$result = $this->Estrategias_Modelo->insertEstrategiaPoliticaSelectedMigrar($IdEmpresaSesion, $year, $listaAcuerdos); 
			
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
	// FIN ESTRATEGIAS POLITICAS

	// ESTRATEGIAS RIESGO
	public function filtroAnioEstrategiaRiesgo(){
		$this->load->model('Estrategias_Modelo');
	  	$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
      	$fetch_data = $this->Estrategias_Modelo->getListEstrategiaRiesgoAnio($IdEmpresaSesion);
      	$data = array();  
           foreach($fetch_data->result() as $row){  
                $sub_array = array();  
                $sub_array[] = $row->IdRiesgo;
                $sub_array[] = '<td >'.$row->Riesgo.'<td>';
                $sub_array[] = '<td >'.$row->Periodo.'<td>';
                $data[] = $sub_array;  
        }
        $output = array(
            "data"=>$data  
        );
           echo json_encode($output);
	}

	public function filtroAnioGuardarEstrategiaRiesgo(){
		$this->form_validation->set_rules('txtPeriodo','Se requiere el periodo','trim|required');
		if($this->session->userdata("IdEmpresaSesion")){
			$this->load->model('Estrategias_Modelo');
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$year = $_POST['anioMigrar'];
			$listaAcuerdos = $_POST['id'];
			$result = $this->Estrategias_Modelo->insertEstrategiaRiesgoSelectedMigrar($IdEmpresaSesion, $year, $listaAcuerdos); 
			
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
	// FIN ESTRATEGIAS RIESGO
	// FIN PARA MIGRAR


	//Función para cargar el inicio
	public function index()	{
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa" => "Empresa",
			                     $inicioURL."estrategia" => "Estrategias"
			                    );						
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "estrategiasMemoria/modulosEstrategias";
			$this->load->view("plantilla", $dato);
		}else{
			redirect('inicio');
		}		
	}

	/**
	 * Efectos DML
	 */
	public function estrategiaEfectos(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa" => "Empresa",
			                     $inicioURL."estrategia" => "Estrategias",
			                     $inicioURL."estrategia/estrategiaEfectos" => "Efectos"
			                    );						
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Estrategias_Modelo');
				$dato['estrategiaEfectos'] = $this->Estrategias_Modelo->getListEfectoMemoria($IdEmpresaSesion);
				$dato["admin"] = 1;
				$dato["contenedor"] = "estrategiasMemoria/efecto_view";
				$dato['anios'] = $this->Estrategias_Modelo->getListAniosEstrategiasEfecto($IdEmpresaSesion); 
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "estrategiaEfectos", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('Estrategias_Modelo');
						$dato['estrategiaEfectos'] = $this->Estrategias_Modelo->getListEfectoMemoria($IdEmpresaSesion);
						$dato["contenedor"] = "estrategiasMemoria/efecto_view";
						$dato['anios'] = $this->Estrategias_Modelo->getListAniosEstrategiasEfecto($IdEmpresaSesion); 
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "estrategiasMemoria/efecto_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "estrategiasMemoria/efecto_view";
					$this->load->view('plantilla', $dato);
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function nuevoEstrategiaEfecto(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Estrategias_Modelo'); 
				$dato["titulo"] = "Nuevo Efecto";
				$dato["accion"] = "Nuevo";
				$dato["contenedor"] = "estrategiasMemoria/efecto_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "estrategiaEfectos", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('Estrategias_Modelo'); 
						$dato["titulo"] = "Nuevo Efecto";
						$dato["accion"] = "Nuevo";
						$dato["contenedor"] = "estrategiasMemoria/efecto_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->estrategiaEfectos();
					}
				}else{
					$this->estrategiaEfectos();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function editarEstrategiaEfecto($IdEstrategia){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Estrategias_Modelo');					
				$dato['estrategiaEfecto'] = $this->Estrategias_Modelo->getEfectoMemoria($IdEstrategia, $IdEmpresaSesion);    
				$dato["titulo"] = "Editar Estrategia";   
				$dato["accion"] = "Editar";	
				$dato["contenedor"] = "estrategiasMemoria/efecto_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "estrategiaEfectos", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('Estrategias_Modelo');					
						$dato['estrategiaEfecto'] = $this->Estrategias_Modelo->getEfectoMemoria($IdEstrategia, $IdEmpresaSesion);    
						$dato["titulo"] = "Editar Estrategia";   
						$dato["accion"] = "Editar";	
						$dato["contenedor"] = "estrategiasMemoria/efecto_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->estrategiaEfectos();
					}
				}else{
					$this->estrategiaEfectos();
				}
 			}						
		}else{
			redirect('inicio');
		}
	}
	public function guardarEstrategiaEfecto(){
		$this->form_validation->set_rules('txtEfecto','Efecto','trim|required');
		$this->form_validation->set_rules('txtPeriodo','Periodo','trim|required|integer');
		$accion = $_POST['accion'];
		$id = $_POST['id'];			
		if ($this->form_validation->run() == false) {
			if ($accion == "Editar") {
				$this->editarEstrategiaEfecto($id);
			}else{
				$this->nuevoEstrategiaEfecto();
			}
		}else{
			$this->load->model('Estrategias_Modelo');
			$tiempo = time();
			$txtEfecto = $_POST["txtEfecto"];
			$txtPeriodo = $_POST["txtPeriodo"];
			$txtFechaSistema = date("Y-m-d H:i:s", $tiempo);
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($_POST["accion"] == "Editar"){
				$updateEfecto = array(					
						'Efecto' => $txtEfecto,
						'Periodo' => $txtPeriodo,
						'FechaSistema' => $txtFechaSistema,
						'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->Estrategias_Modelo->updateEfectoMemoria($id, $updateEfecto, $IdEmpresaSesion)){
					$mensaje = "El Efecto se actualizó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarEstrategiaEfecto($id);
				}else{
					$mensaje = "El Efecto no se ha actualizado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarEstrategiaEfecto($id);
				}
			}else{
				$insertEfecto = array(
						'Efecto' => $txtEfecto,
						'Periodo' => $txtPeriodo,
						'FechaSistema' => $txtFechaSistema,
						'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->Estrategias_Modelo->insertEfectoMemoria($insertEfecto)){
					$mensaje = "El Efecto se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoEstrategiaEfecto();				
				}else{
					$mensaje = "El Efecto no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoEstrategiaEfecto();				
				}
			}			
		}
	}
	public function eliminarEstrategiaEfecto(){
		$this->load->model('Estrategias_Modelo'); 		          	
		
		$idEstra = $_POST["idEstrEfe"];	
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->Estrategias_Modelo->deleteEfectoMemoria($idEstra, $IdEmpresaSesion); 
	}
	/**
	 * Riesgos DML
	 */
	public function estrategiaRiesgos(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa" => "Empresa",
			                     $inicioURL."estrategia" => "Estrategias",
			                     $inicioURL."estrategia/estrategiaRiesgos" => "Riesgos"
			                    );						
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Estrategias_Modelo');
				$dato['estrategiaRiesgos'] = $this->Estrategias_Modelo->getListRiesgoMemoria($IdEmpresaSesion);
				$dato["admin"] = 1;
				$dato['anios'] = $this->Estrategias_Modelo->getListAniosEstrategiasRiesgo($IdEmpresaSesion);
				$dato["contenedor"] = "estrategiasMemoria/riesgo_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "estrategiaRiesgos", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('Estrategias_Modelo');
						$dato['estrategiaRiesgos'] = $this->Estrategias_Modelo->getListRiesgoMemoria($IdEmpresaSesion);
						$dato['anios'] = $this->Estrategias_Modelo->getListAniosEstrategiasRiesgo($IdEmpresaSesion);
						$dato["contenedor"] = "estrategiasMemoria/riesgo_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "estrategiasMemoria/riesgo_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "estrategiasMemoria/riesgo_view";
					$this->load->view('plantilla', $dato);
				}
 			}
		}else{
			redirect('inicio');
		}
	}
	public function nuevoEstrategiaRiesgo(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Estrategias_Modelo'); 
				$dato["titulo"] = "Nuevo Riesgo";
				$dato["accion"] = "Nuevo";
				$dato["contenedor"] = "estrategiasMemoria/riesgo_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "estrategiaRiesgos", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('Estrategias_Modelo'); 
						$dato["titulo"] = "Nuevo Riesgo";
						$dato["accion"] = "Nuevo";
						$dato["contenedor"] = "estrategiasMemoria/riesgo_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->estrategiaRiesgos();
					}
				}else{
					$this->estrategiaRiesgos();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function editarEstrategiaRiesgo($IdEstrategia){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Estrategias_Modelo');					
				$dato['estrategiaRiesgo'] = $this->Estrategias_Modelo->getRiesgoMemoria($IdEstrategia, $IdEmpresaSesion);    
				$dato["titulo"] = "Editar Riesgo";   
				$dato["accion"] = "Editar";	
				$dato["contenedor"] = "estrategiasMemoria/riesgo_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "estrategiaRiesgos", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('Estrategias_Modelo');					
						$dato['estrategiaRiesgo'] = $this->Estrategias_Modelo->getRiesgoMemoria($IdEstrategia, $IdEmpresaSesion);    
						$dato["titulo"] = "Editar Riesgo";   
						$dato["accion"] = "Editar";	
						$dato["contenedor"] = "estrategiasMemoria/riesgo_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->estrategiaRiesgos();
					}
				}else{
					$this->estrategiaRiesgos();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function guardarEstrategiaRiesgo(){
		$this->form_validation->set_rules('txtRiesgo','Riesgo','trim|required');
		$this->form_validation->set_rules('txtPeriodo','Periodo','trim|required|integer');
		$accion = $_POST['accion'];
		$id = $_POST['id'];			
		if ($this->form_validation->run() == false) {
			if ($accion == "Editar") {
				$this->editarEstrategiaRiesgo($id);
			}else{
				$this->nuevoEstrategiaRiesgo();
			}
		}else{
			$this->load->model('Estrategias_Modelo');
			$tiempo = time();
			$txtRiesgo = $_POST["txtRiesgo"];
			$txtPeriodo = $_POST["txtPeriodo"];
			$txtFechaSistema = date("Y-m-d H:i:s", $tiempo);
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($_POST["accion"] == "Editar"){
				$updateRiesgo = array(					
						'Riesgo' => $txtRiesgo,
						'Periodo' => $txtPeriodo,
						'FechaSistema' => $txtFechaSistema,
						'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->Estrategias_Modelo->updateRiesgoMemoria($id, $updateRiesgo, $IdEmpresaSesion)){
					$mensaje = "El Riesgo se actualizó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarEstrategiaRiesgo($id);
				}else{
					$mensaje = "El Riesgo no se ha actualizado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarEstrategiaRiesgo($id);
				}
			}else{
				$insertRiesgo = array(
						'Riesgo' => $txtRiesgo,
						'Periodo' => $txtPeriodo,
						'FechaSistema' => $txtFechaSistema,
						'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->Estrategias_Modelo->insertRiesgoMemoria($insertRiesgo)){
					$mensaje = "El Riesgo se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoEstrategiaRiesgo();				
				}else{
					$mensaje = "El Riesgo no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoEstrategiaRiesgo();				
				}
			}			
		}
	}
	public function eliminarEstrategiaRiesgo(){
		$this->load->model('Estrategias_Modelo'); 		          	
		$idRiesg = $_POST["idRie"];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->Estrategias_Modelo->deleteRiesgoMemoria($idRiesg, $IdEmpresaSesion); 
	}
	/**
	 * Política DML
	 */
	public function estrategiaPoliticas(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa" => "Empresa",
			                     $inicioURL."estrategia" => "Estrategias",
			                     $inicioURL."estrategia/estrategiaPoliticas" => "Políticas"
			                    );						
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Estrategias_Modelo');
				$dato['estrategiaPoliticas'] = $this->Estrategias_Modelo->getListPoliticaMemoria($IdEmpresaSesion);
				$dato["admin"] = 1;
				$dato['anios'] = $this->Estrategias_Modelo->getListAniosEstrategiasPolitica($IdEmpresaSesion); 
				$dato["contenedor"] = "estrategiasMemoria/politica_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "estrategiaPoliticas", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('Estrategias_Modelo');
						$dato['estrategiaPoliticas'] = $this->Estrategias_Modelo->getListPoliticaMemoria($IdEmpresaSesion);
						$dato['anios'] = $this->Estrategias_Modelo->getListAniosEstrategiasPolitica($IdEmpresaSesion); 
						$dato["contenedor"] = "estrategiasMemoria/politica_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "estrategiasMemoria/politica_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "estrategiasMemoria/politica_view";
					$this->load->view('plantilla', $dato);
				}
 			}
		}else{
			redirect('inicio');
		}
	}
	public function nuevaEstrategiaPolitica(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Estrategias_Modelo');
				$dato["titulo"] = "Nueva Política";
				$dato["accion"] = "Nuevo";
				$dato["contenedor"] = "estrategiasMemoria/politica_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "estrategiaPoliticas", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('Estrategias_Modelo');
						$dato["titulo"] = "Nueva Política";
						$dato["accion"] = "Nuevo";
						$dato["contenedor"] = "estrategiasMemoria/politica_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->estrategiaPoliticas();
					}
				}else{
					$this->estrategiaPoliticas();
				}
 			}
			
		}else{
			redirect('inicio');
		}
	}
	public function editarEstrategiaPolitica($IdEstrategia){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Estrategias_Modelo');					
				$dato['estrategiaPolitica'] = $this->Estrategias_Modelo->getPoliticaMemoria($IdEstrategia, $IdEmpresaSesion);    
				$dato["titulo"] = "Editar Política";   
				$dato["accion"] = "Editar";	
				$dato["contenedor"] = "estrategiasMemoria/politica_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "estrategiaPoliticas", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('Estrategias_Modelo');					
						$dato['estrategiaPolitica'] = $this->Estrategias_Modelo->getPoliticaMemoria($IdEstrategia, $IdEmpresaSesion);    
						$dato["titulo"] = "Editar Política";   
						$dato["accion"] = "Editar";	
						$dato["contenedor"] = "estrategiasMemoria/politica_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->estrategiaPoliticas();
					}
				}else{
					$this->estrategiaPoliticas();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function guardarEstrategiaPolitica(){
		$this->form_validation->set_rules('txtPolitica','Politica','trim|required');
		$this->form_validation->set_rules('txtPeriodo','Periodo','trim|required|integer');
		$accion = $_POST['accion'];
		$id = $_POST['id'];			
		if ($this->form_validation->run() == false) {
			if ($accion == "Editar") {
				$this->editarEstrategiaPolitica($id);
			}else{
				$this->nuevaEstrategiaPolitica();
			}
		}else{
			$this->load->model('Estrategias_Modelo');
			$tiempo = time();
			$txtPolitica = $_POST["txtPolitica"];
			$txtPeriodo = $_POST["txtPeriodo"];
			$txtFechaSistema = date("Y-m-d H:i:s", $tiempo);
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($_POST["accion"] == "Editar"){
				$updatePolitica = array(					
						'Politica' => $txtPolitica,
						'Periodo' => $txtPeriodo,
						'FechaSistema' => $txtFechaSistema,
						'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->Estrategias_Modelo->updatePoliticaMemoria($id, $updatePolitica, $IdEmpresaSesion)){
					$mensaje = "El Política se actualizó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarEstrategiaPolitica($id);
				}else{
					$mensaje = "El Política no se ha actualizado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarEstrategiaPolitica($id);
				}
			}else{
				$insertPolitica = array(
						'Politica' => $txtPolitica,
						'Periodo' => $txtPeriodo,
						'FechaSistema' => $txtFechaSistema,
						'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->Estrategias_Modelo->insertPoliticaMemoria($insertPolitica)){
					$mensaje = "El Política se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevaEstrategiaPolitica();				
				}else{
					$mensaje = "El Política no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevaEstrategiaPolitica();				
				}
			}			
		}
	}
	public function eliminarEstrategiaPolitica(){
		$this->load->model('Estrategias_Modelo'); 		          	
		$idPolitic = $_POST["idPol"]; 		
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->Estrategias_Modelo->deletePoliticaMemoria($idPolitic, $IdEmpresaSesion); 
	}
	/**
	 * Política DML
	 */
	public function estrategiaOportunidades(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa" => "Empresa",
			                     $inicioURL."estrategia" => "Estrategias",
			                     $inicioURL."estrategia/estrategiaOportunidades" => "Oportunidades"
			                    );						
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Estrategias_Modelo');
				$dato['estrategiaOportunidades'] = $this->Estrategias_Modelo->getListOportunidadMemoria($IdEmpresaSesion);
				$dato["admin"] = 1;
				$dato['anios'] = $this->Estrategias_Modelo->getListAniosEstrategiasOportunidad($IdEmpresaSesion);
				$dato["contenedor"] = "estrategiasMemoria/oportunidad_view";			
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "estrategiaOportunidades", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('Estrategias_Modelo');
						$dato['estrategiaOportunidades'] = $this->Estrategias_Modelo->getListOportunidadMemoria($IdEmpresaSesion);
						$dato['anios'] = $this->Estrategias_Modelo->getListAniosEstrategiasOportunidad($IdEmpresaSesion);
						$dato["contenedor"] = "estrategiasMemoria/oportunidad_view";			
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "estrategiasMemoria/oportunidad_view";			
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "estrategiasMemoria/oportunidad_view";			
					$this->load->view('plantilla', $dato);
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function nuevaEstrategiaOportunidad(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Estrategias_Modelo'); 
				$dato["titulo"] = "Nueva Oportunidad";
				$dato["accion"] = "Nuevo";
				$dato["contenedor"] = "estrategiasMemoria/oportunidad_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "estrategiaOportunidades", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('Estrategias_Modelo'); 
						$dato["titulo"] = "Nueva Oportunidad";
						$dato["accion"] = "Nuevo";
						$dato["contenedor"] = "estrategiasMemoria/oportunidad_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->estrategiaOportunidades();
					}
				}else{
					$this->estrategiaOportunidades();
				}
 			}
		}else{
			redirect('inicio');
		}
	}
	public function editarEstrategiaOportunidad($IdOportunidad){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Estrategias_Modelo');					
				$dato['estrategiaOportunida'] = $this->Estrategias_Modelo->getOportunidadMemoria($IdOportunidad, $IdEmpresaSesion);    
				$dato["titulo"] = "Editar Oportunidad";
				$dato["accion"] = "Editar";
				$dato["contenedor"] = "estrategiasMemoria/oportunidad_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "estrategiaOportunidades", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('Estrategias_Modelo');					
						$dato['estrategiaOportunida'] = $this->Estrategias_Modelo->getOportunidadMemoria($IdOportunidad, $IdEmpresaSesion);    
						$dato["titulo"] = "Editar Oportunidad";
						$dato["accion"] = "Editar";
						$dato["contenedor"] = "estrategiasMemoria/oportunidad_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->estrategiaOportunidades();
					}
				}else{
					$this->estrategiaOportunidades();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function guardarEstrategiaOportunidad(){
		$this->form_validation->set_rules('txtOportunidad','Oportunidad','trim|required');
		$this->form_validation->set_rules('txtPeriodo','Periodo','trim|required|integer');
		$accion = $_POST['accion'];
		$id = $_POST['id'];			
		if ($this->form_validation->run() == false) {
			if ($accion == "Editar") {
				$this->editarEstrategiaOportunidad($id);
			}else{
				$this->nuevaEstrategiaOportunidad();
			}
		}else{
			$this->load->model('Estrategias_Modelo');
			$tiempo = time();
			$txtOportunidad = $_POST["txtOportunidad"];
			$txtPeriodo = $_POST["txtPeriodo"];
			$txtFechaSistema = date("Y-m-d H:i:s", $tiempo);
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($_POST["accion"] == "Editar"){
				$updateOportunidad = array(					
						'Oportunidad' => $txtOportunidad,
						'Periodo' => $txtPeriodo,
						'FechaSistema' => $txtFechaSistema,
						'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->Estrategias_Modelo->updateOportunidadMemoria($id, $updateOportunidad, $IdEmpresaSesion)){
					$mensaje = "El Oportunidad se actualizó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarEstrategiaOportunidad($id);
				}else{
					$mensaje = "El Oportunidad no se ha actualizado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarEstrategiaOportunidad($id);
				}
			}else{
				$insertOportunidad = array(
						'Oportunidad' => $txtOportunidad,
						'Periodo' => $txtPeriodo,
						'FechaSistema' => $txtFechaSistema,
						'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->Estrategias_Modelo->insertOportunidadMemoria($insertOportunidad)){
					$mensaje = "El Oportunidad se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevaEstrategiaOportunidad();				
				}else{
					$mensaje = "El Oportunidad no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevaEstrategiaOportunidad();				
				}
			}			
		}
	}
	public function eliminarEstrategiaOportunidad(){
		$this->load->model('Estrategias_Modelo'); 		          	
		$IdOportu = $_POST["idOpor"];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->Estrategias_Modelo->deleteOportunidadMemoria($IdOportu, $IdEmpresaSesion); 
	}

	
}

?>