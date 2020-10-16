<?php
defined("BASEPATH") or die("Acceso prohibido");

class Recovery extends CI_Controller{

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$tipoUser = $_GET["tipoUser"];

		//VERIFICA EL TIPO DE USUARIO ADMIN/USER
		$dato["contenedor"] = "recoveryPass/recoveryPass";
		$dato["tipoUser"] = $tipoUser;
		$this->load->view("plantilla", $dato);	
	}

    /**
    * @desc - genera un token para cada usuario registrado
    * @return token
    */
    private function token()
    {
        return sha1(uniqid(rand(),true));
    }

	/**
	* @desc - posibilita al usuario a solicitar un nuevo password
	*/
	public function request_password(){
		$this->load->model("Recovery_Modelo");
		$tipoUser = $this->input->post("tipoUser");

		$this->form_validation->set_rules(
			'email', 'email', 'required|trim|valid_email|callback_comprobar_email'
		);
        
        $this->form_validation->set_message('required', 'El %s es requerido');
        $this->form_validation->set_message('valid_email', 'El %s no tiene un formato correcto');
        
        if($this->form_validation->run() == FALSE){           
            $this->request_pass($tipoUser);
        }
        else{

			if($tipoUser == "Admin"){
				//obtenemos los datos del usuario porque existe el email
        		$userData = $this->Recovery_Modelo->getUserDataAdmin($this->input->post("email"));
			}else if($tipoUser == "User"){
				//obtenemos los datos del usuario porque existe el email
        		$userData = $this->Recovery_Modelo->getUserDataUser($this->input->post("email"));
			}else{
                $this->request_final();
            }

        	//si se ha actualiado el request_token y todo ha ido bien
        	//enviamos un email al usuario 
        	if($userData){
        		if($this->sendMailRecoveryPass($userData, $tipoUser) === TRUE){
        			$this->session->set_flashdata(
        				"mail_send", "Se ha enviado un email a su correo para recuperar su password, tiene 5 minutos"
        			);
        		}
        		else{
        			$this->session->set_flashdata(
        				"not_email_send", "Ha ocurrido un error enviando el email, pruebe más tarde"
        			);
        		}
        		 $this->request_pass($tipoUser);
        	} 	
        }
	}


	/**
    * @desc - callback para la validación del formulario que valida si existe el email en la base de datos
    */
    public function comprobar_email(){
        $email = $this->input->post('email');
        $this->load->model("Recovery_Modelo");
        $comprobar_email = $this->Recovery_Modelo->verifica_email($email);
        if ($comprobar_email !== TRUE) 
        {
            $this->form_validation->set_message('comprobar_email', 'El email introducido no existe en la base de datos');
            return FALSE;
        } 
        else 
        {
            return TRUE;
        }
    }

   	/**
    * @desc - renderiza la vista recovery_pass
    */
	public function request_pass($tipoUser){
		$dato["contenedor"] = "recoveryPass/recoveryPass";
		$dato["tipoUser"] = $tipoUser;
		$this->load->view("plantilla", $dato);
	}

	/**
	* @desc - configura y envia un email con gmail
	* @param - $userdata array con los datos del usuario para enviar el email
	*/
    private function sendMailRecoveryPass($userdata, $tipoUser){
        //cargamos la libreria email de ci
        $this->load->library("email");
 
        //configuracion para gmail
        $configGmail = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'balancesocialsirse@gmail.com',
            'smtp_pass' => 'balancesocialadmin123',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        );    
 
        //cargamos la configuración para enviar con gmail
        $this->email->initialize($configGmail);
 
        $this->email->from('balancesocialsirse@gmail.com');
        $this->email->to($userdata->Mail);
        $this->email->subject('Recuperación de password en nuestra plataforma');
        
        $html = '<h2>Pulsa el siguiente enlace para recuperar tu password</h2><br/><h3>Administrador. <br/>Sistema de Información de Responsabilidad Social</h3><br/><h6>Correo generado automaticamente, no conteste a esta dirección</h6><hr><br>';

        /** CAMBIAR EL PATH */
        $html .= '<a href="'.base_url().'recovery/recovery_password/'.$userdata->token.'/'.$tipoUser.'">';
        $html .= ''.base_url().'recovery/recovery_password/'.$userdata->token.'/'.$tipoUser.'</a>';
        
        $this->email->message($html);

        if($this->email->send()){
        	return TRUE;
        }
    }

    /**
    * @desc - renderiza la vista recovery_pass
    */
	public function recovery_password($token = "", $tipoUser){

        if($tipoUser == "Admin"){
            //si el password ha caducado
            if($this->checkIsLiveTokenAdmin($token) === FALSE){
                $this->session->set_flashdata(
                    "expired_request", "Si necesita recuperar su password rellene el 
                    formulario con su email y le haremos llegar un correo con instrucciones"
                );

                $dato["contenedor"] = "recoveryPass/recoveryPass";
                $dato["tipoUser"] = $tipoUser;
                $this->load->view("plantilla", $dato);

                //redirect(base_url("recovery/request_password?userType=".$tipoUser),"refresh");
                //$this->request_pass($tipoUser);
            }

        $data = array();
        $data["token"] = $token;
        $data['userdata'] = $this->session->userdata;
        $data["contenedor"] = "recoveryPass/confirmPass";
        $data["tipoUser"] = $tipoUser;
        $this->session->set_userdata("id_user_recovery_pass", $this->checkIsLiveTokenAdmin($token)->IdEmpresa);
        $this->load->view("plantilla",$data);

        }else if ($tipoUser == "User") {
            //si el password ha caducado
            if($this->checkIsLiveTokenUser($token) === FALSE){
                $this->session->set_flashdata(
                    "expired_request", "Si necesita recuperar su password rellene el 
                    formulario con su email y le haremos llegar un correo con instrucciones"
                );

                $dato["contenedor"] = "recoveryPass/recoveryPass";
                $dato["tipoUser"] = $tipoUser;
                $this->load->view("plantilla", $dato);

                //redirect(base_url("recovery/request_password?userType=".$tipoUser),"refresh");
                //$this->request_pass($tipoUser);
            }

        $data = array();
        $data["token"] = $token;
        $data['userdata'] = $this->session->userdata;
        $data["contenedor"] = "recoveryPass/confirmPass";
        $data["tipoUser"] = $tipoUser;
        $this->session->set_userdata("id_user_recovery_pass", $this->checkIsLiveTokenUser($token)->IdUsuario);
        $this->load->view("plantilla",$data);

        }else{
            $this->request_final();
        }
	}

	/**
	* @desc - comprueba si el token ha expirado o no, el usuario tiene 5 minutos de tiempo
	* @param $token - string unico por usuario
	*/
	private function checkIsLiveTokenAdmin($token){
		$this->load->model("Recovery_Modelo");
		return $this->Recovery_Modelo->checkIsLiveTokenAdmin($token);
	}

	/**
	* @desc - comprueba si el token ha expirado o no, el usuario tiene 5 minutos de tiempo
	* @param $token - string unico por usuario
	*/
	private function checkIsLiveTokenUser($token){
		$this->load->model("Recovery_Modelo");
		return $this->Recovery_Modelo->checkIsLiveTokenUser($token);
	}

	/**
	* @desc - procesa el formulario para cambiar el password del usuario
	*/
	public function update_password(){
        $tipoUser = $this->input->post("tipoUser");

		//validamos que los passwords coincidan
		$this->form_validation->set_rules(
        	'password', 'password', 'required|trim|min_length[6]|max_length[50]|matches[conf_password]'
        );

        $this->form_validation->set_rules(
        	'conf_password', 'confirm pass', 'required|trim|min_length[6]|max_length[50]'
        );
        
        $this->form_validation->set_message('required', 'El %s es requerido');
        $this->form_validation->set_message('matches', 'El %s y el %s no coinciden');
        $this->form_validation->set_message('max_length', 'El %s no puede tener más de %s carácteres');
        $this->form_validation->set_message('min_length', 'El %s no puede tener menos de %s carácteres');
        
        //si el formulario no pasa mandamos a recovery_password con el token como parámetro
        if($this->form_validation->run() == FALSE){           
            $this->recovery_password($this->input->post("token"));
        }
        else{


            if($tipoUser=="Admin"){
                $data = array(
                        "ContraseniaEmpresa" => $this->input->post("password"), //sha1($this->input->post("password")),
                        "user_id"       =>  $this->session->userdata("id_user_recovery_pass"),
                        "request_token" =>  date('Y-m-d H:i:s'),
                        "token"         =>  $this->token()//ponemos otro token nuevo
                    );

                $this->load->model("Recovery_Modelo");

                //si el password se ha cambiado correctamente y actualizado los datos
                if($this->Recovery_Modelo->change_passwordAdmin($data) === TRUE){
                    $this->session->set_flashdata(
                        "password_changed", "Su contraseña ha sido modificado correctamente"
                    );
                }
                //en otro caso error
                else{
                    $this->session->set_flashdata(
                        "error_password_changed", "Ha ocurrido un error modificando su contraseña"
                    );
                }
                $dato["contenedor"] = "recoveryPass/passSuccesfull";
                $dato["tipoUser"] = $tipoUser;
                $this->load->view("plantilla", $dato);
                //redirect(base_url("recovery/request_pass"),"refresh");
            }else if ($tipoUser=="User") {
                $data = array(
                        "ContraseniaUsuario" => $this->input->post("password"),
                        "user_id"       =>  $this->session->userdata("id_user_recovery_pass"),
                        "request_token" =>  date('Y-m-d H:i:s'),
                        "token"         =>  $this->token()//ponemos otro token nuevo
                    );

                $this->load->model("Recovery_Modelo");

                //si el password se ha cambiado correctamente y actualizado los datos
                if($this->Recovery_Modelo->change_passwordUser($data) === TRUE){
                    $this->session->set_flashdata(
                        "password_changed", "Su contraseña ha sido modificado correctamente"
                    );
                }
                //en otro caso error
                else{
                    $this->session->set_flashdata(
                        "error_password_changed", "Ha ocurrido un error modificando su contraseña"
                    );
                }
                $dato["contenedor"] = "recoveryPass/passSuccesfull";
                $dato["tipoUser"] = $tipoUser;
                $this->load->view("plantilla", $dato);
                //redirect(base_url("recovery/request_pass"),"refresh");
            }else{
                $this->request_final();
            }
        }
	}

    /**
    * @desc - procesa el formulario para cambiar el password del usuario
    */
    public function request_final (){
        redirect(base_url());
    }
}

?>