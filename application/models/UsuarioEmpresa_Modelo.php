<?php

/**
* 
*/
class UsuarioEmpresa_Modelo extends CI_Model{
	
	
	/**
	 * [login description]
	 * @param  [type] $userName [description]
	 * @param  [type] $Password [description]
	 * @return [type]           [description]
	 */
	public function login($userName, $password){
		$this->db->where('NombreUsuario', $userName);
		$this->db->where('ContraseniaUsuario', $password);
		$datos = $this->db->get('Usuario');
		if($datos->num_rows()>0){
			return true;
		} else{
			return false;
		}
	}
	/**
	 * [getListUsuario description]
	 * @return [type] [description]
	 */
	public function getListUsuario($IdEmpresa){
		$this->db->select(" *,(SELECT Nombre FROM Perfil WHERE IdPerfil = PerfilRolUsuario) AS Perfil");
		$this->db->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('UsuarioEmpresa');
		if($resultado->num_rows() > 0){
			return $resultado->result();
		}else{
			return false;
		}
	}
	public function existsMail($email){
		$this->db->where("Mail",$email);
        $check_exists = $this->db->get("UsuarioEmpresa");
        if($check_exists->num_rows() == 0){
            return false;
        }else{
            return true;
        }
	}
	/**
	 * [getUsuario description]
	 * @param  [type] $nameUsuario   [description]
	 * @param  [type] $passwdUsuario [description]
	 * @return [type]                [description]
	 */
	public function getUsuario($correoUsuario, $passwdUsuario, $IdEmpresa){
		$query = $this->db->where('Mail',$correoUsuario)->where('ContraseniaUsuario', $passwdUsuario)->where('IdEmpresa',$IdEmpresa)->get('UsuarioEmpresa');
		if($query->num_rows() > 0 ){
			return $query->row();
		}else{
			return false;
		}
	}
	public function getOneEditUsuario($IdUsuario, $IdEmpresa){
		$query = $this->db->where('IdUsuario',$IdUsuario)->where('IdEmpresa', $IdEmpresa)->get('UsuarioEmpresa');
		if($query->num_rows() > 0 ){
			return $query->result();
		}else{
			return false;
		}
	}
	/**
	 * [insertUsuaruio description]
	 * @param  [type] $arrayUsuario [description]
	 * @return [type]               [description]
	 */
	public function insertUsuario($arrayUsuario){
		$this->db->trans_start();
		$insert = $this->db->insert('UsuarioEmpresa',$arrayUsuario);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}
	}
	/**
	 * [updateUsuario description]
	 * @param  [type] $idUsuario    [description]
	 * @param  [type] $arrayUsuario [description]
	 * @return [type]               [description]
	 */
	public function updateUsuario($IdUsuario, $arrayUsuario, $IdEmpresa){
		$this->db->trans_start();
		$this->db->where('IdUsuario', $IdUsuario)->where('IdEmpresa',$IdEmpresa);
		$update =  $this->db->update('UsuarioEmpresa', $arrayUsuario);
		$this->db->trans_complete();
		if($update){
			return true;
		}
		else{
			return false;		
		}
	}
	/**
	 * [deleteUsuario description]
	 * @param  [type] $IdUsuario [description]
	 * @return [type]            [description]
	 */
	public function deleteUsuario($IdUsuario, $IdEmpresa){
		$this->db->where('IdUsuario', $IdUsuario)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('UsuarioEmpresa');
	}
	/**
	 * [validar_usuario description]
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	public function validateUsuario($data){
		$correo = strip_tags($data['correo']);
		$password = strip_tags($data['contrasenia']);

		$query = $this->db->where('Mail',$correo)->where('ContraseniaUsuario',$password)->get('UsuarioEmpresa');
		if($query->num_rows() ==1)
			//Devolver todo el registro
			return $query->row();
		return false;
	}
}

?>