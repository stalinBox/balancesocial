<?php 
defined("BASEPATH") or die("Acceso prohibido");

class Recovery_Modelo extends CI_Model{
	public function __construct(){
		parent::__construct();
	}


	/**
	* @desc - comprueba si existe el email
	* @param - $email string con el email del formulario
	* @return - boolean
	*/
	public function verifica_email($email){
		$query = $this->db->get_where('empresa', array('Mail' => $email));
        if($query->num_rows() === 1){
            return TRUE;
        }
	}

	/**
	* @desc - obtiene los datos de un usuario por su email
	* @param - $email string con el email del formulario
	* @return - mixed
	*/
	public function getUserDataAdmin($email){
		$query = $this->db->get_where('empresa', array('Mail' => $email));
        if($query->num_rows() === 1){
        	//actualizamos el campo request_token del usuario y 
        	//le damos 5 minutos para recuperar el password
        	if($this->startRecoveryPasswordAdmin($query->row()->IdEmpresa))
        	{
        		return $query->row();
        	}
        }
	}

		/**
	* @desc - obtiene los datos de un usuario por su email
	* @param - $email string con el email del formulario
	* @return - mixed
	*/
	public function getUserDataUser($email){
		$query = $this->db->get_where('usuarioempresa', array('Mail' => $email));
        if($query->num_rows() === 1){
        	//actualizamos el campo request_token del usuario y 
        	//le damos 5 minutos para recuperar el password
        	if($this->startRecoveryPasswordUser($query->row()->IdUsuario))
        	{
        		return $query->row();
        	}
        }
	}

	/**
	* @desc - actualiza el campo request_token del usuario para dar 5 minutos
	* @param - $user_id int con el id del usuario
	* @return - bool
	*/
	private function startRecoveryPasswordAdmin($user_id){
		//damos 5 minutos al usuario para recuperar su password
        $expire_stamp = date('Y-m-d H:i:s', strtotime("+5 min"));
		$data = array("request_token" => $expire_stamp);
		$this->db->where("IdEmpresa", $user_id);
		if($this->db->update("empresa", $data)){
			return TRUE;
		}
	}

	/**
	* @desc - actualiza el campo request_token del usuario para dar 5 minutos
	* @param - $user_id int con el id del usuario
	* @return - bool
	*/
	private function startRecoveryPasswordUser($user_id){
		//damos 5 minutos al usuario para recuperar su password
        $expire_stamp = date('Y-m-d H:i:s', strtotime("+5 min"));
		$data = array("request_token" => $expire_stamp);
		$this->db->where("IdUsuario", $user_id);
		if($this->db->update("usuarioempresa", $data)){
			return TRUE;
		}
	}

	/**
	* @desc - comprueba si el campo request_token es menor que la fecha actual
	* @param $token - string unico por usuario
	* @return - bool
	*/
	public function checkIsLiveTokenAdmin($token){
		$current_stamp = date('Y-m-d H:i:s');
		$query = $this->db->select("IdEmpresa")
				 ->from("empresa")
				 ->where("token",$token)
				 ->where("request_token >",$current_stamp)
				 ->get();

		if($query->num_rows() === 1){
			return $query->row();
		}
		else{
			return FALSE;
		}
	}

	/**
	* @desc - comprueba si el campo request_token es menor que la fecha actual
	* @param $token - string unico por usuario
	* @return - bool
	*/
	public function checkIsLiveTokenUser($token){
		$current_stamp = date('Y-m-d H:i:s');
		$query = $this->db->select("IdUsuario")
				 ->from("usuarioempresa")
				 ->where("token",$token)
				 ->where("request_token >",$current_stamp)
				 ->get();

		if($query->num_rows() === 1){
			return $query->row();
		}
		else{
			return FALSE;
		}
	}

	/**
	* @desc - hacemos el update del password del usuario
	* @param $data - array con datos para actualizar
	* @return - bool
	*/
	public function change_passwordAdmin($data = array()){
		$this->db->where("IdEmpresa",$data["user_id"]);
		unset($data['user_id']);//eliminamos la clave user_id del array
		if($this->db->update("empresa", $data))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	/**
	* @desc - hacemos el update del password del usuario
	* @param $data - array con datos para actualizar
	* @return - bool
	*/
	public function change_passwordUser($data = array()){
		$this->db->where("IdUsuario",$data["user_id"]);
		unset($data['user_id']);//eliminamos la clave user_id del array
		if($this->db->update("usuarioempresa", $data))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
}