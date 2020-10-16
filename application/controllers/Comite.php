<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//Controlador 
class comite extends CI_Controller {

	function __construct()	{
		parent::__construct();				
	}

	//PARA MIGRAR
	public function filtroAnioComite(){
		$this->load->model('Comite_Modelo');
	  	$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
      	$fetch_data = $this->Comite_Modelo->getListComitesAnio($IdEmpresaSesion);
      	$data = array();  
           foreach($fetch_data->result() as $row){  
                $sub_array = array();  
                $sub_array[] = $row->IdComite;
                $sub_array[] = '<td >'.$row->NombreComite.'<td>';
                $sub_array[] = '<td >'.$row->TipoComite.'<td>';
                $sub_array[] = '<td >'.$row->FuncionComite.'<td>';
                $sub_array[] = '<td >'.$row->Periodo.'<td>';
                $data[] = $sub_array;  
        }
        $output = array(
            "data"=>$data  
        );
           echo json_encode($output);
	}

	public function filtroAnioGuardarComite(){
		$this->form_validation->set_rules('txtPeriodo','Se requiere el periodo','trim|required');
		if($this->session->userdata("IdEmpresaSesion")){
			$this->load->model('Comite_Modelo');
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$year = $_POST['anioMigrar'];
			$listaAcuerdos = $_POST['id'];
			$result = $this->Comite_Modelo->insertComitesSelectedMigrar($IdEmpresaSesion, $year, $listaAcuerdos); 
			
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

	public function comites(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$inicioURL =  base_url();
			$relativeURL = array($inicioURL."principal" => "Módulos",
			                     $inicioURL."planificacionRSE" => "Planificación RSE",
			                     $inicioURL."planificacionRSE/gobierno" => "Gobierno",
			                     $inicioURL."comite/comites" => "Comité"
			                    );
			$dato["ubicacionURL"] = $relativeURL;
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Comite_Modelo');
				$dato['admin'] = 1;
				$dato['comites'] = $this->Comite_Modelo->getListComite($IdEmpresaSesion);
				$dato["contenedor"] = "comites/comites_view";
				$dato['anios'] = $this->Comite_Modelo->getListAniosComites($IdEmpresaSesion);
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "comites", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Ver == 1) {
						$this->load->model('Comite_Modelo');
						$dato['comites'] = $this->Comite_Modelo->getListComite($IdEmpresaSesion);
						$dato["contenedor"] = "comites/comites_view";
						$this->load->view('plantilla', $dato);
					}else{
						$dato["contenedor"] = "comites/comites_view";
						$this->load->view('plantilla', $dato);
					}
				}else{
					$dato["contenedor"] = "comites/comites_view";
					$this->load->view('plantilla', $dato);
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function nuevoComite(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Comite_Modelo');
				$dato['comites'] = $this->Comite_Modelo->getListComite($IdEmpresaSesion);  
				$dato["titulo"] = "Nuevo Comité";
				$dato["accion"] = "Nuevo";
				$dato["contenedor"] = "comites/comites_new_edit";
				$this->load->view('plantilla', $dato);
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "comites", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Agregar == 1) {
						$this->load->model('Comite_Modelo');
						$dato['comites'] = $this->Comite_Modelo->getListComite($IdEmpresaSesion);  
						$dato["titulo"] = "Nuevo Comité";
						$dato["accion"] = "Nuevo";
						$dato["contenedor"] = "comites/comites_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->comites();
					}
				}else{
					$this->comites();
				}
 			}			
		}else{
			redirect('inicio');
		}
	}
	public function editarComite($IdComite){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$tipoUsuario = $this->session->userdata("tipoUsuario");
 			if ($tipoUsuario == "Admin") {
 				$this->load->model('Comite_Modelo');
				$dato['comite'] = $this->Comite_Modelo->getComite($IdComite, $IdEmpresaSesion);
				$dato["titulo"] = "Editar Comité";   
				$dato["accion"] = "Editar";	
				$dato["contenedor"] = "comites/comites_new_edit";
				$this->load->view('plantilla', $dato);	
 			}else{
 				$perfilSesion = $this->session->userdata("perfilSesion");
 				$idUsuarioSesion = $this->session->userdata("idUsuarioSesion");
				$this->load->model('Permiso_Modelo');
				$dato["permisos"] = $this->Permiso_Modelo->getPermisoRol($idUsuarioSesion, $perfilSesion, "comites", $IdEmpresaSesion);
				if (!empty($dato["permisos"])){
					if ($dato["permisos"][0]->Actualizar == 1) {
						$this->load->model('Comite_Modelo');
						$dato['comite'] = $this->Comite_Modelo->getComite($IdComite, $IdEmpresaSesion);
						$dato["titulo"] = "Editar Comité";   
						$dato["accion"] = "Editar";	
						$dato["contenedor"] = "comites/comites_new_edit";
						$this->load->view('plantilla', $dato);
					}else{
						$this->comites();
					}
				}else{
					$this->comites();
				}
 			}					
		}else{
			redirect('inicio');
		}
	}
	public function guardarComite(){
		$this->form_validation->set_rules('txtNombreComite','Nombre del Comité','trim|required'); 		
		$this->form_validation->set_rules('txtNumIntegrantesComite','Número de Integrantes','trim|integer|required');	
		$this->form_validation->set_rules('txtFuncionesComite','Funciones del Comité','trim|required'); 
		$this->form_validation->set_rules('txtPeriodo','Periodo','trim|required|integer'); 
		$accion = $_POST['accion'];
		$id = $_POST['id'];		
		if ($this->form_validation->run() == false) {
			if ($accion == "Editar") {
				$this->editarComite($id);				
			}else{
				$this->nuevoComite();
			}
		}else{
			$this->load->model('Comite_Modelo');
			//PENDIENTE: Recibir y obtener el IdAcuerdo para la actualización
			$tiempo = time();
			$txtNombreComite = $_POST["txtNombreComite"];
			$selectTipoComite = $_POST["selectTipoComite"];			
			$txtNumIntegrantesComite = $_POST["txtNumIntegrantesComite"];
			$txtFuncionesComite = $_POST["txtFuncionesComite"];
			$txtPeriodo = $_POST["txtPeriodo"];
			if(!empty($_FILES['inputImagen']['tmp_name']) && file_exists($_FILES['inputImagen']['tmp_name'])) {
				$imagen= addslashes(file_get_contents($_FILES['inputImagen']['tmp_name']));
			}else{
				$imagen = "";
			}
			$txtFechaSistema = date("Y-m-d H:i:s", $tiempo);
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			if ($_POST["accion"] == "Editar"){
				$updateComite = array(
					'NombreComite' => $txtNombreComite,
					'TipoComite' => $selectTipoComite,
					'IntegrantesComite' => $txtNumIntegrantesComite,
					'FuncionComite' => $txtFuncionesComite,
					'ImganenComite' => $imagen,
					'Periodo' => $txtPeriodo,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->Comite_Modelo->updateComite($id, $updateComite, $IdEmpresaSesion)){
					$mensaje = "El Comité se actualizó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarComite($id);
				}else{
					$mensaje = "El Comité no se ha actualizado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->editarComite($id);
				}
			}else{
				$insertComite = array(
					'NombreComite' => $txtNombreComite,
					'TipoComite' => $selectTipoComite,					
					'IntegrantesComite' => $txtNumIntegrantesComite,
					'FuncionComite' => $txtFuncionesComite,
					'ImganenComite' => $imagen,
					'Periodo' => $txtPeriodo,
					'FechaSistema' => $txtFechaSistema,
					'IdEmpresa' => $IdEmpresaSesion
					);
				if($this->Comite_Modelo->insertComite($insertComite)){
					$mensaje = "El Comité se insertó con éxito";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->comites();				
				}else{
					$mensaje = "El Comité no se ha registrado, verfique los datos ingresados";
					$this->session->set_flashdata('mensaje',$mensaje);
					$this->nuevoComite();				
				}
			}
		}
	}
	public function eliminarComite(){
		$this->load->model('Comite_Modelo'); 		          	
		$id = $_POST["IdCom"];
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");	
		$this->Comite_Modelo->deleteComite($id, $IdEmpresaSesion); 
	}

	
}

?>