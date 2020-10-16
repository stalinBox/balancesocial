<?php

/**
* 
*/
class Usuario_Modelo extends CI_Model{
	
	
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
	public function getListUsuario(){
		$resultado = $this->db->get('Usuario');
		//$datos = array('listaUsuarios' => $resultado);
		if($resultado->num_rows() > 0)
			return $resultado->result();
		return false;
	}

	/**
	 * [getUsuario description]
	 * @param  [type] $nameUsuario   [description]
	 * @param  [type] $passwdUsuario [description]
	 * @return [type]                [description]
	 */
	public function getUsuario($correoUsuario, $passwdUsuario){
/*		$resultado = $this->db->query("SELECT idUsuario, UsuarioNombre, UsuarioEmail, UsuarioContrasenia, UsuarioFecha, UsuarioActivo, Empresa_idEmpresa, Rol_idRol
									   FROM Usuario  WHERE UsuarioNombre = '".$nameUsuario."' AND UsuarioContrasenia = '".$passwdUsuario."';");	
		return $resultado->row();
*/
		$query = $this->db->where('MailUsuario',$correoUsuario)->where('ContraseniaUsuario', $passwdUsuario)->get('Usuario');
		if($query->num_rows() > 0 ){
			return $query->row();
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
		//Especificar los campos de cada dato del array
		$usuario = array('UsuarioNombre' => $arrayUsuario['UsuarioNombre'],
						 'UsuarioApellido' => $arrayUsuario['UsuarioApellido'],
						 'UsuarioEmail' => $arrayUsuario['UsuarioEmail'],
						 'UsuarioContrasenia' => $arrayUsuario['UsuarioContrasenia'],
						 'UsuarioDireccion' => $arrayUsuario['UsuarioDireccion'],
						 'UsuarioTelefono' => $arrayUsuario['UsuarioTelefono'],
						 'UsuarioCelular' => $arrayUsuario['UsuarioCelular'],
						 'UsuarioFecha' => $arrayUsuario['UsuarioFecha'],
						 'UsuarioActivo' => $arrayUsuario['UsuarioActivo'],
						 'Empresa_idEmpresa' => $arrayUsuario['Empresa_idEmpresa'],
						 'Rol_idRol' => $arrayUsuario['Rol_idRol']);
		$this->db->trans_start();
		$insert = $this->db->insert('Usuario',$usuario);
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
	public function updateUsuario($idUsuario, $arrayUsuario){

		$usuario = array('UsuarioNombre' => $arrayUsuario['UsuarioNombre'],
						 'UsuarioApellido' => $arrayUsuario['UsuarioApellido'],
						 'UsuarioEmail' => $arrayUsuario['UsuarioEmail'],
						 'UsuarioContrasenia' => $arrayUsuario['UsuarioContrasenia'],
						 'UsuarioDireccion' => $arrayUsuario['UsuarioDireccion'],
						 'UsuarioTelefono' => $arrayUsuario['UsuarioTelefono'],
						 'UsuarioCelular' => $arrayUsuario['UsuarioCelular'],
						 'UsuarioFecha' => $arrayUsuario['UsuarioFecha'],
						 'UsuarioActivo' => $arrayUsuario['UsuarioActivo'],
						 'Empresa_idEmpresa' => $arrayUsuario['Empresa_idEmpresa'],
						 'Rol_idRol' => $arrayUsuario['Rol_idRol']);

		$this->db->trans_start();
		$this->db->where('idUsuario', $idUsuario);
		$update =  $this->db->update('Usuario', $usuario);
		$this->trans_complete();
		if($update){
			return true;
		}
		else{
			return false;		
		}
	}
	/**
	 * [deleteUsuario description]
	 * @param  [type] $idUsuario [description]
	 * @return [type]            [description]
	 */
	public function deleteUsuario($idUsuario){
		$this->db->where('idUsuario', $idUsuario);
		return $this->db->delete('Usuario');
	}
	/**
	 * [validar_usuario description]
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	public function validateUsuario($data){
		$correo = strip_tags($data['correo']);
		$password = strip_tags($data['contrasenia']);

		$query = $this->db->where('MailUsuario',$correo)->where('ContraseniaUsuario',$password)->get('Usuario');
		if($query->num_rows() ==1)
			//Devolver todo el registro
			return $query->row();
		return false;
	}
}

?>