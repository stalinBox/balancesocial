<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//Controlador 
class informeMemoria extends CI_Controller {

	function __construct()	{
		parent::__construct();				
	}
	//Función para cargar el inicio
	public function index()	{
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa" => "Empresa",
			                     $inicioURL."informeMemoria" => "Descripción del Informe"
			                    );						
			$dato["ubicacionURL"] = $relativeURL;
			$dato["contenedor"] = "informeMemoria/modulosInformeMemoria";
			$this->load->view("plantilla", $dato);
		}else{
			redirect('inicio');
		}		
	}

//PARA MIGRAR
	// MODULO OBJETIVO MEMORIA
		public function filtroAnioObjInf(){
		$this->load->model('InformeMemoria_Modelo');
	  	$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
      	$fetch_data = $this->InformeMemoria_Modelo->getListObjInfAnio($IdEmpresaSesion);
      	$data = array();  
           foreach($fetch_data->result() as $row){  
                $sub_array = array();  
                $sub_array[] = $row->IdObjetivosInforme;
                $sub_array[] = '<td >'.$row->Objetivo.'<td>';
                $sub_array[] = '<td >'.$row->Tipo.'<td>';
                $sub_array[] = '<td >'.$row->DescripcionCumplimiento.'<td>';
                $sub_array[] = '<td >'.$row->Periodo.'<td>';
                $data[] = $sub_array;  
        }
        $output = array(
            "data"=>$data  
        );
           echo json_encode($output);
	}

	public function filtroAnioGuardarObjInf(){
		$this->form_validation->set_rules('txtPeriodo','Se requiere el periodo','trim|required');
		if($this->session->userdata("IdEmpresaSesion")){
			$this->load->model('InformeMemoria_Modelo');
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$year = $_POST['anioMigrar'];
			$listaAcuerdos = $_POST['id'];
			$result = $this->InformeMemoria_Modelo->insertObjInfSelectedMigrar($IdEmpresaSesion, $year, $listaAcuerdos); 
			
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
	// MODULO LOGROSFRACASOS
public function filtroAnioLogrosFracasos(){
		$this->load->model('InformeMemoria_Modelo');
	  	$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
      	$fetch_data = $this->InformeMemoria_Modelo->getListLogroFracasoAnio($IdEmpresaSesion);
      	$data = array();  
           foreach($fetch_data->result() as $row){  
                $sub_array = array();  
                $sub_array[] = $row->IdLogroFracasoInforme;
                $sub_array[] = '<td >'.$row->LogroFracaso.'<td>';
                $sub_array[] = '<td >'.$row->Descripcion.'<td>';
                $sub_array[] = '<td >'.$row->Periodo.'<td>';
                $data[] = $sub_array;  
        }
        $output = array(
            "data"=>$data  
        );
           echo json_encode($output);
	}

	public function filtroAnioGuardarLogrosFracasos(){
		$this->form_validation->set_rules('txtPeriodo','Se requiere el periodo','trim|required');
		if($this->session->userdata("IdEmpresaSesion")){
			$this->load->model('InformeMemoria_Modelo');
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$year = $_POST['anioMigrar'];
			$listaAcuerdos = $_POST['id'];
			$result = $this->InformeMemoria_Modelo->insertLogroFracasoSelectedMigrar($IdEmpresaSesion, $year, $listaAcuerdos); 
			
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

	// MODULO MEMORIA
	public function filtroAnioMemoria(){
		$this->load->model('InformeMemoria_Modelo');
	  	$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
      	$fetch_data = $this->InformeMemoria_Modelo->getListMemoriaAnio($IdEmpresaSesion);
      	$data = array();  
           foreach($fetch_data->result() as $row){  
                $sub_array = array();  
                $sub_array[] = $row->IdDPDescInforme;
                $sub_array[] = '<td >'.$row->Declaracion.'<td>';
                $sub_array[] = '<td >'.$row->Periodo.'<td>';
                $data[] = $sub_array;  
        }
        $output = array(
            "data"=>$data  
        );
           echo json_encode($output);
	}

	public function filtroAnioGuardarMemoria(){
		$this->form_validation->set_rules('txtPeriodo','Se requiere el periodo','trim|required');
		if($this->session->userdata("IdEmpresaSesion")){
			$this->load->model('InformeMemoria_Modelo');
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$year = $_POST['anioMigrar'];
			$listaAcuerdos = $_POST['id'];
			$result = $this->InformeMemoria_Modelo->insertMemoriaSelectedMigrar($IdEmpresaSesion, $year, $listaAcuerdos); 
			
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

//MODULO DETALLE INFORME
		public function filtroAnioDetaInforme(){
		$this->load->model('InformeMemoria_Modelo');
	  	$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
      	$fetch_data = $this->InformeMemoria_Modelo->getListDetaInformeAnio($IdEmpresaSesion);
      	$data = array();  
           foreach($fetch_data->result() as $row){  
                $sub_array = array();  
                $sub_array[] = $row->IdDetallesInforme;
                $sub_array[] = '<td >'.$row->IdentificacionDeQuienEmite.'<td>';
                $sub_array[] = '<td >'.$row->CargoDeQuienEmite.'<td>';
                $sub_array[] = '<td >'.$row->NumDeclaracionesEmitidas.'<td>';
                $sub_array[] = '<td >'.$row->Periodo.'<td>';
                $data[] = $sub_array;  
        }
        $output = array(
            "data"=>$data  
        );
           echo json_encode($output);
	}

	public function filtroAnioGuardarDetaInforme(){
		$this->form_validation->set_rules('txtPeriodo','Se requiere el periodo','trim|required');
		if($this->session->userdata("IdEmpresaSesion")){
			$this->load->model('InformeMemoria_Modelo');
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$year = $_POST['anioMigrar'];
			$listaAcuerdos = $_POST['id'];
			$result = $this->InformeMemoria_Modelo->insertDetaInformeSelectedMigrar($IdEmpresaSesion, $year, $listaAcuerdos); 
			
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

	/**
	 * Declaración del Presidente del Informe de la Memoria
	 */
	public function declaracionPresidente(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa" => "Empresa",
			                     $inicioURL."informeMemoria" => "Descripción del Informe",
			                     $inicioURL."informeMemoria/declaracionPresidente" => "Declaración del Presidente"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('InformeMemoria_Modelo');
				$dato['declaracionesPresidenteInforme'] = $this->InformeMemoria_Modelo->getListDeclaracionPresidenteMemoria($IdEmpresaSesion);
				$dato["admin"] = 1;
				$dato["contenedor"] = "informeMemoria/declaracionPresidente_view";
				$dato['anios'] = $this->InformeMemoria_Modelo->getListAniosMemoria($IdEmpresaSesion); 
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "declaracionPresidente", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('InformeMemoria_Modelo');
						$dato['declaracionesPresidenteInforme'] = $this->InformeMemoria_Modelo->getListDeclaracionPresidenteMemoria($IdEmpresaSesion);
						$dato["contenedor"] = "informeMemoria/declaracionPresidente_view";
						$dato['anios'] = $this->InformeMemoria_Modelo->getListAniosMemoria($IdEmpresaSesion); 
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "informeMemoria/declaracionPresidente_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "informeMemoria/declaracionPresidente_view";
					$this->load->view('plantilla', $dato);
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function nuevaDeclaracionPresidente(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('InformeMemoria_Modelo'); 
				$dato["titulo"] = "Nueva Declaración del Presidente";
				$dato["accion"] = "Nuevo";
				$dato["contenedor"] = "informeMemoria/declaracionPresidente_new_edit";
				$dato["imagenes"] = $this->db->query("SELECT * FROM DeclaracionPresidenteDecripcionInforme WHERE IdDPDescInforme = 15;")->result();
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "declaracionPresidente", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('InformeMemoria_Modelo'); 
						$dato["titulo"] = "Nueva Declaración del Presidente";
						$dato["accion"] = "Nuevo";
						$dato["contenedor"] = "informeMemoria/declaracionPresidente_new_edit";
						$dato["imagenes"] = $this->db->query("SELECT * FROM DeclaracionPresidenteDecripcionInforme WHERE IdDPDescInforme = 15;")->result();
						$this->load->view('plantilla', $dato);
					}else{
						$this->declaracionPresidente();
					}
				}else{
					$this->declaracionPresidente();
				}
 			}
			
		}else{
			redirect('inicio');
		}
	}
	public function editarDeclaracionPresidente($IdDeclaracion){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('InformeMemoria_Modelo');					
				$dato['declaracionesPresedente'] = $this->InformeMemoria_Modelo->getDeclaracionPresidenteMemoria($IdDeclaracion, $IdEmpresaSesion);    
				$dato["titulo"] = "Editar Declaración del Presidente";
				$dato["accion"] = "Editar";	
				$dato["contenedor"] = "informeMemoria/declaracionPresidente_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "declaracionPresidente", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('InformeMemoria_Modelo');					
						$dato['declaracionesPresedente'] = $this->InformeMemoria_Modelo->getDeclaracionPresidenteMemoria($IdDeclaracion, $IdEmpresaSesion);    
						$dato["titulo"] = "Editar Declaración del Presidente";
						$dato["accion"] = "Editar";	
						$dato["contenedor"] = "informeMemoria/declaracionPresidente_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->declaracionPresidente();
					}
				}else{
					$this->declaracionPresidente();
				}
 			}					
		}else{
			redirect('inicio');
		}
	}
	public function guardarDeclaracionPresidente(){		
		$this->form_validation->set_rules('txtDeclaracion','Declaración del Presidente','trim|required');
		$this->form_validation->set_rules('txtPeriodo','Periodo','trim|required|integer');		
		$accion = $_POST['accion'];
		$id = $_POST['id'];			
		if ($this->form_validation->run() == false) {
			if ($accion == "Editar") {
				$this->editarDeclaracionPresidente($id);
			}else{
				$this->nuevaDeclaracionPresidente();
			}
		}else{
			$this->load->model('InformeMemoria_Modelo');
			$tiempo = time();
			$txtDeclaracion = $_POST["txtDeclaracion"];
			$txtPeriodo = $_POST["txtPeriodo"];
			if(!empty($_FILES['inputFoto']['tmp_name']) && file_exists($_FILES['inputFoto']['tmp_name'])) {
				$fotoPesidente= addslashes(file_get_contents($_FILES['inputFoto']['tmp_name']));
			}else{
				$fotoPesidente = "";
			}
			$txtFechaSistema = date("Y-m-d H:i:s", $tiempo);			
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($_POST["accion"] == "Editar"){
				$updateDeclaracionPresidenteMemoria = array(
					'Declaracion' => $txtDeclaracion,
					'Periodo' => $txtPeriodo,
					'Foto' => $fotoPesidente,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->InformeMemoria_Modelo->updateDeclaracionPresidenteMemoria($id, $updateDeclaracionPresidenteMemoria, $IdEmpresaSesion)){
					$mensaje = "La Declaración se actualizó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarDeclaracionPresidente($id);
				}else{
					$mensaje = "La Declaración no se ha actualizado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarDeclaracionPresidente($id);
				} 
			}else{
				$insertDeclaracionPresidenteMemoria = array(
					'Declaracion' => $txtDeclaracion,
					'Periodo' => $txtPeriodo,
					'Foto' => $fotoPesidente,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->InformeMemoria_Modelo->insertDeclaracionPresidenteMemoria($insertDeclaracionPresidenteMemoria)){
					$mensaje = "La Declaración se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevaDeclaracionPresidente();				
				}else{
					$mensaje = "La Declaración no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevaDeclaracionPresidente();				
				}				
			}			
		}
	}
	public function eliminarDeclaracionPresidente(){
		$this->load->model('InformeMemoria_Modelo'); 		          	
		$IdDecl = $_POST["idDeclaracion"];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->InformeMemoria_Modelo->deleteDeclaracionPresidenteMemoria($IdDecl, $IdEmpresaSesion); 
	}

	/**
	 * Detalle del Informe de la Memoria DML
	 */
	public function detallesDeInforme(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa" => "Empresa",
			                     $inicioURL."informeMemoria" => "Descripción del Informe",
			                     $inicioURL."informeMemoria/detallesDeInforme" => "Detalles del Informe"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('InformeMemoria_Modelo');
				$dato['detallesDeInforme'] = $this->InformeMemoria_Modelo->getListDetalleInformeMemoria($IdEmpresaSesion);
				$dato["admin"] = 1;
				$dato['anios'] = $this->InformeMemoria_Modelo->getListAniosDetaInforme($IdEmpresaSesion);
				$dato["contenedor"] = "informeMemoria/detallesDeInforme_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "detallesDeInforme", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('InformeMemoria_Modelo');
						$dato['detallesDeInforme'] = $this->InformeMemoria_Modelo->getListDetalleInformeMemoria($IdEmpresaSesion);
						$dato["contenedor"] = "informeMemoria/detallesDeInforme_view";
						$dato['anios'] = $this->Consejo_Modelo->getListAniosDetaInforme($IdEmpresaSesion);
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "informeMemoria/detallesDeInforme_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "informeMemoria/detallesDeInforme_view";
					$this->load->view('plantilla', $dato);
				}
 			}
		}else{
			redirect('inicio');
		}
	}
	public function nuevoDetalleInformeMemoria(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('InformeMemoria_Modelo'); 
				$dato["titulo"] = "Nuevo Detalle de Informe";
				$dato["accion"] = "Nuevo";
				$dato["contenedor"] = "informeMemoria/detalleInforme_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "detallesDeInforme", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('InformeMemoria_Modelo'); 
						$dato["titulo"] = "Nuevo Detalle de Informe";
						$dato["accion"] = "Nuevo";
						$dato["contenedor"] = "informeMemoria/detalleInforme_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->detallesDeInforme();
					}
				}else{
					$this->detallesDeInforme();
				}
 			}
			
		}else{
			redirect('inicio');
		}
	}
	public function editarDetalleInformeMemoria($IdDetalle){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('InformeMemoria_Modelo');					
				$dato['detalleInforme'] = $this->InformeMemoria_Modelo->getDetalleInformeMemoria($IdDetalle, $IdEmpresaSesion);    
				$dato["titulo"] = "Editar Detalle de Informe";
				$dato["accion"] = "Editar";	
				$dato["contenedor"] = "informeMemoria/detalleInforme_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "detallesDeInforme", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('InformeMemoria_Modelo');					
						$dato['detalleInforme'] = $this->InformeMemoria_Modelo->getDetalleInformeMemoria($IdDetalle, $IdEmpresaSesion);    
						$dato["titulo"] = "Editar Detalle de Informe";
						$dato["accion"] = "Editar";	
						$dato["contenedor"] = "informeMemoria/detalleInforme_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->detallesDeInforme();
					}
				}else{
					$this->detallesDeInforme();
				}
 			}					
		}else{
			redirect('inicio');
		}
	}
	public function guardarDetalleInformeMemoria(){
		$this->form_validation->set_rules('txtNumDeclaracionesEmitidas','Número de Declaraciones Emitidas','trim|required|integer');
		$this->form_validation->set_rules('txtIdentificacionDeQuienEmite','Nombre de la Persona que Emite el Informe','trim|required');
		$this->form_validation->set_rules('txtCargoDeQuienEmite','Cargo de la Persona que Emite el Informe','trim|required');
		$this->form_validation->set_rules('txtFechaEmisionInforme','Fecha de Emisión del Informe','trim|required');
		$this->form_validation->set_rules('txtPeriodo','Periodo','trim|required|integer');
		
		$accion = $_POST['accion'];
		$id = $_POST['id'];			
		if ($this->form_validation->run() == false) {
			if ($accion == "Editar") {
				$this->editarDetalleInformeMemoria($id);
			}else{
				$this->nuevoDetalleInformeMemoria();
			}
		}else{
			$this->load->model('InformeMemoria_Modelo');
			$tiempo = time();
			$txtNumDeclaracionesEmitidas = $_POST["txtNumDeclaracionesEmitidas"];
			$txtIdentificacionDeQuienEmite = $_POST["txtIdentificacionDeQuienEmite"];
			$txtCargoDeQuienEmite = $_POST["txtCargoDeQuienEmite"];
			$txtFechaEmisionInforme = $_POST["txtFechaEmisionInforme"];
			$txtPeriodo = $_POST["txtPeriodo"];
			$txtFechaSistema = date("Y-m-d H:i:s", $tiempo);			
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($_POST["accion"] == "Editar"){
				$updateDetalleMemoria = array(					
						'NumDeclaracionesEmitidas' => $txtNumDeclaracionesEmitidas,
						'IdentificacionDeQuienEmite' => $txtIdentificacionDeQuienEmite,
						'CargoDeQuienEmite' => $txtCargoDeQuienEmite,
						'FechaEmisionInforme' => $txtFechaEmisionInforme,
						'Periodo' => $txtPeriodo,
						'FechaSistema' => $txtFechaSistema,
						'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->InformeMemoria_Modelo->updateDetalleInformeMemoria($id, $updateDetalleMemoria, $IdEmpresaSesion)){
					$mensaje = "El Detalle del Informe se actualizó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarDetalleInformeMemoria($id);
				}else{
					$mensaje = "El Detalle del Informe no se ha actualizado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarDetalleInformeMemoria($id);
				}
			}else{
				$insertDetalleMemoria = array(
						'NumDeclaracionesEmitidas' => $txtNumDeclaracionesEmitidas,
						'IdentificacionDeQuienEmite' => $txtIdentificacionDeQuienEmite,
						'CargoDeQuienEmite' => $txtCargoDeQuienEmite,
						'FechaEmisionInforme' => $txtFechaEmisionInforme,
						'Periodo' => $txtPeriodo,
						'FechaSistema' => $txtFechaSistema,
						'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->InformeMemoria_Modelo->insertDetalleInformeMemoria($insertDetalleMemoria)){
					$mensaje = "El Detalle del Informe se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoDetalleInformeMemoria();				
				}else{
					$mensaje = "El Detalle del Informe no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoDetalleInformeMemoria();				
				}
			}			
		}
	}
	public function eliminarDetalleInformeMemoria(){
		$this->load->model('InformeMemoria_Modelo'); 		          	
		
		$idDetaLogro = $_POST["idDetaLogro"];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->InformeMemoria_Modelo->deleteDetalleInformeMemoria($idDetaLogro, $IdEmpresaSesion); 
	}

	/**
	 * Objetivos del Informe de la Memoria DML
	 */
	public function objetivosInforme(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa" => "Empresa",
			                     $inicioURL."informeMemoria" => "Descripción del Informe",
			                     $inicioURL."informeMemoria/objetivosInforme" => "Objetivos del Informe"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('InformeMemoria_Modelo');
				$dato['objetivosInforme'] = $this->InformeMemoria_Modelo->getListObjetivoMemoria($IdEmpresaSesion);
				$dato['admin'] = 1;
				$dato['anios'] = $this->InformeMemoria_Modelo->getListAniosObjInf($IdEmpresaSesion);
				$dato["contenedor"] = "informeMemoria/objetivosInforme_view";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "objetivosInforme", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('InformeMemoria_Modelo');
						$dato['objetivosInforme'] = $this->InformeMemoria_Modelo->getListObjetivoMemoria($IdEmpresaSesion);
						$dato["contenedor"] = "informeMemoria/objetivosInforme_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "informeMemoria/objetivosInforme_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "informeMemoria/objetivosInforme_view";
					$this->load->view('plantilla', $dato);
				}
 			}
			
		}else{
			redirect('inicio');
		}
	}
	public function nuevoObjetivoInformeMemoria(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('InformeMemoria_Modelo'); 
				$dato["titulo"] = "Nuevo Objetivo de Informe";
				$dato["accion"] = "Nuevo";
				$dato["contenedor"] = "informeMemoria/objetivoInforme_new_edit";
				$this->load->view('plantilla', $dato);

 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "objetivosInforme", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('InformeMemoria_Modelo'); 
						$dato["titulo"] = "Nuevo Objetivo de Informe";
						$dato["accion"] = "Nuevo";
						$dato["contenedor"] = "informeMemoria/objetivoInforme_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->objetivosInforme();
					}
				}else{
					$this->objetivosInforme();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function editarObjetivoInformeMemoria($IdObjetivo){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('InformeMemoria_Modelo');					
				$dato['objetivosInforme'] = $this->InformeMemoria_Modelo->getObjetivoMemoria($IdObjetivo, $IdEmpresaSesion);    
				$dato["titulo"] = "Editar Objetivo de Informe";
				$dato["accion"] = "Editar";	
				$dato["contenedor"] = "informeMemoria/objetivoInforme_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "objetivosInforme", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('InformeMemoria_Modelo');					
						$dato['objetivosInforme'] = $this->InformeMemoria_Modelo->getObjetivoMemoria($IdObjetivo, $IdEmpresaSesion);    
						$dato["titulo"] = "Editar Objetivo de Informe";
						$dato["accion"] = "Editar";	
						$dato["contenedor"] = "informeMemoria/objetivoInforme_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->objetivosInforme();
					}
				}else{
					$this->objetivosInforme();
				}
 			}						
		}else{
			redirect('inicio');
		}
	}
	public function guardarObjetivoInformeMemoria(){
		$this->form_validation->set_rules('txtObjetivo','Objetivo de la Organización','trim|required');		
		$this->form_validation->set_rules('txtDescripcionCumplimiento','Cumplimiento','trim|required');
		$this->form_validation->set_rules('txtPeriodo','Periodo','trim|required|integer');
		
		$accion = $_POST['accion'];
		$id = $_POST['id'];			
		if ($this->form_validation->run() == false) {
			if ($accion == "Editar") {
				$this->editarObjetivoInformeMemoria($id);
			}else{
				$this->nuevoObjetivoInformeMemoria();
			}
		}else{
			$this->load->model('InformeMemoria_Modelo');
			$tiempo = time();
			$txtObjetivo = $_POST["txtObjetivo"];
			$selectTipoObjetivo = $_POST["selectTipoObjetivo"];
			$txtDescripcionCumplimiento = $_POST["txtDescripcionCumplimiento"];
			$txtPeriodo = $_POST["txtPeriodo"];
			$txtFechaSistema = date("Y-m-d H:i:s", $tiempo);			
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($_POST["accion"] == "Editar"){
				$updateObjetivoMemoria = array(					
						'Objetivo' => $txtObjetivo,
						'Tipo' => $selectTipoObjetivo,
						'DescripcionCumplimiento' => $txtDescripcionCumplimiento,
						'Periodo' => $txtPeriodo,
						'FechaSistema' => $txtFechaSistema,
						'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->InformeMemoria_Modelo->updateObjetivoMemoria($id, $updateObjetivoMemoria, $IdEmpresaSesion)){
					$mensaje = "El Objetivo del Informe se actualizó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarObjetivoInformeMemoria($id);
				}else{
					$mensaje = "El Objetivo del Informe no se ha actualizado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarObjetivoInformeMemoria($id);
				}
			}else{
				$insertObjetivoMemoria = array(
						'Objetivo' => $txtObjetivo,
						'Tipo' => $selectTipoObjetivo,
						'DescripcionCumplimiento' => $txtDescripcionCumplimiento,
						'Periodo' => $txtPeriodo,
						'FechaSistema' => $txtFechaSistema,
						'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->InformeMemoria_Modelo->insertObjetivoMemoria($insertObjetivoMemoria)){
					$mensaje = "El Objetivo del Informe se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoObjetivoInformeMemoria();				
				}else{
					$mensaje = "El Objetivo del Informe no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoObjetivoInformeMemoria();				
				}
			}			
		}
	}
	public function eliminarObjetivoInforme(){
		$this->load->model('InformeMemoria_Modelo'); 		          	
		
		$IdObjetivoInf = $_POST["idObjetivInf"];		
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->InformeMemoria_Modelo->deleteObjetivoMemoria($IdObjetivoInf, $IdEmpresaSesion); 
	}

	/**
	 * Logros y fracasos del Informe de la Memoria DML
	 */
	public function logrosFracasosInforme(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."empresa" => "Empresa",
			                     $inicioURL."informeMemoria" => "Descripción del Informe",
			                     $inicioURL."informeMemoria/logrosFracasosInforme" => "Logros y Fracasos del Informe"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('InformeMemoria_Modelo');
				$dato['logrosFracasosInforme'] = $this->InformeMemoria_Modelo->getListLogroFracasoMemoria($IdEmpresaSesion);
				$dato['anios'] = $this->InformeMemoria_Modelo->getListAniosLogroFracaso($IdEmpresaSesion); 
				$dato["contenedor"] = "informeMemoria/logrosFracasosInforme_view";
				$dato["admin"] = 1;
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "logrosFracasosInforme", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('InformeMemoria_Modelo');
						$dato['logrosFracasosInforme'] = $this->InformeMemoria_Modelo->getListLogroFracasoMemoria($IdEmpresaSesion);
						$dato['anios'] = $this->InformeMemoria_Modelo->getListAniosLogroFracaso($IdEmpresaSesion); 
						$dato["contenedor"] = "informeMemoria/logrosFracasosInforme_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "informeMemoria/logrosFracasosInforme_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "informeMemoria/logrosFracasosInforme_view";
					$this->load->view('plantilla', $dato);
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function nuevoLogroFracasoInformeMemoria(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('InformeMemoria_Modelo'); 
				$dato["titulo"] = "Nuevo Logro o Fracaso";
				$dato["accion"] = "Nuevo";
				$dato["contenedor"] = "informeMemoria/logroFracasoInforme_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "logrosFracasosInforme", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('InformeMemoria_Modelo'); 
						$dato["titulo"] = "Nuevo Logro o Fracaso";
						$dato["accion"] = "Nuevo";
						$dato["contenedor"] = "informeMemoria/logroFracasoInforme_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->logrosFracasosInforme();
					}
				}else{
					$this->logrosFracasosInforme();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function editarLogroFracasoInformeMemoria($IdLogrofracaso){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('InformeMemoria_Modelo');					
				$dato['logroFracasoInforme'] = $this->InformeMemoria_Modelo->getLogroFracasoMemoria($IdLogrofracaso, $IdEmpresaSesion);    
				$dato["titulo"] = "Editar Logros y Fracasos del Informe";
				$dato["accion"] = "Editar";	
				$dato["contenedor"] = "informeMemoria/logroFracasoInforme_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "logrosFracasosInforme", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('InformeMemoria_Modelo');					
						$dato['logroFracasoInforme'] = $this->InformeMemoria_Modelo->getLogroFracasoMemoria($IdLogrofracaso, $IdEmpresaSesion);    
						$dato["titulo"] = "Editar Objetivo de Informe";
						$dato["accion"] = "Editar";	
						$dato["contenedor"] = "informeMemoria/logroFracasoInforme_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->logrosFracasosInforme();
					}
				}else{
					$this->logrosFracasosInforme();
				}
 			}						
		}else{
			redirect('inicio');
		}
	}
	public function guardarLogroFracasoInformeMemoria(){
		$this->form_validation->set_rules('txtDescripcion','Descripción','trim|required');		
		$this->form_validation->set_rules('txtPeriodo','Periodo','trim|required|integer');		
		$accion = $_POST['accion'];
		$id = $_POST['id'];			
		if ($this->form_validation->run() == false) {
			if ($accion == "Editar") {
				$this->editarLogroFracasoInformeMemoria($id);
			}else{
				$this->nuevoLogroFracasoInformeMemoria();
			}
		}else{
			$this->load->model('InformeMemoria_Modelo');
			$tiempo = time();
			$selectTipo = $_POST["selectTipo"];
			$txtDescripcion = $_POST["txtDescripcion"];
			$txtPeriodo = $_POST["txtPeriodo"];
			$txtFechaSistema = date("Y-m-d H:i:s", $tiempo);
			if(!empty($_FILES['inputFoto']['tmp_name']) && file_exists($_FILES['inputFoto']['tmp_name'])) {				
				$imagen= addslashes(file_get_contents($_FILES['inputFoto']['tmp_name']));
			}else{
				$imagen = "";
			}
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($_POST["accion"] == "Editar"){
				$updateLogroFracasoMemoria = array(						
						'LogroFracaso' => $selectTipo,
						'Descripcion' => $txtDescripcion,
						'Imagen' => $imagen,
						'Periodo' => $txtPeriodo,
						'FechaSistema' => $txtFechaSistema,
						'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->InformeMemoria_Modelo->updateLogroFracasoMemoria($id, $updateLogroFracasoMemoria, $IdEmpresaSesion)){
					$mensaje = "El Logro o Fracaso del Informe se actualizó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarLogroFracasoInformeMemoria($id);
				}else{
					$mensaje = "El Logro o Fracaso del Informe no se ha actualizado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarLogroFracasoInformeMemoria($id);
				}
			}else{
				$insertLogroFracasoMemoria = array(
						'LogroFracaso' => $selectTipo,
						'Descripcion' => $txtDescripcion,
						'Imagen' => $imagen,
						'Periodo' => $txtPeriodo,
						'FechaSistema' => $txtFechaSistema,
						'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->InformeMemoria_Modelo->insertLogroFracasoMemoria($insertLogroFracasoMemoria)){
					$mensaje = "El Logro o Fracaso del Informe se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoLogroFracasoInformeMemoria();				
				}else{
					$mensaje = "El Logro o Fracaso del Informe no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoLogroFracasoInformeMemoria();				
				}
			}			
		}
	}
	public function eliminarLogroFracasoInforme(){
		$this->load->model('InformeMemoria_Modelo'); 		          	
		$idLoFra = $_POST["idLFInforme"];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->InformeMemoria_Modelo->deleteLogroFracasoMemoria($idLoFra, $IdEmpresaSesion); 
	}

}
?>