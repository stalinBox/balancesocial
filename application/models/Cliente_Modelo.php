<?php 

/**
* 
*/
class Cliente_Modelo extends CI_MOdel{
	
	function __construct(){
		# code...
	}

	public function insertCliente($arrayCliente){
		//Especificar los campos de cada dato del array
		$cliente = array('ClienteCiRUC' => $arrayCliente['ClienteCiRUC'],
						 'ClienteNombres' => $arrayCliente['ClienteNombres'],
						 'ClienteApellidos' => $arrayCliente['ClienteApellidos'],
						 'ClienteDireccion' => $arrayCliente['ClienteDireccion'],
						 'ClienteTelefono' => $arrayCliente['ClienteTelefono'],
						 'ClienteCelular' => $arrayCliente['ClienteCelular'],
						 'ClienteFNacimiento' => $arrayCliente['ClienteFNacimiento'],
						 'ClienteSexo' => $arrayCliente['ClienteSexo'],
						 'Empresa_idEmpresa' => $arrayCliente['Empresa_idEmpresa']
						 );
		$this->db->trans_start();
		$insert = $this->db->insert('Cliente', $cliente);
		$this->db->trans_complete();
		if($insert){
			return true;
		}else{
			return false;
		}
	
	}

	public function getListCliente(){
		$resultado = $this->db->get('Cliente');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getCliente($ClienteCiRUC){
		$this->db->where('ClienteCiRUC', $ClienteCiRUC);
		$resultado = $this->db->get('Cliente');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function updateCliente($ClienteCiRUC ,$arrayCliente){
		//Especificar los campos de cada dato del array
		$cliente = array('ClienteNombres' => $arrayCliente['ClienteNombres'],
						 'ClienteApellidos' => $arrayCliente['ClienteApellidos'],
						 'ClienteDireccion' => $arrayCliente['ClienteDireccion'],
						 'ClienteTelefono' => $arrayCliente['ClienteTelefono'],
						 'ClienteCelular' => $arrayCliente['ClienteCelular'],
						 'ClienteFNacimiento' => $arrayCliente['ClienteFNacimiento'],
						 'ClienteSexo' => $arrayCliente['ClienteSexo'],
						 'Empresa_idEmpresa' => $arrayCliente['Empresa_idEmpresa']
						 );
		$this->db->trans_start();
		$this->db->where('ClienteCiRUC', $ClienteCiRUC);
		$update = $this->db->update('Cliente', $cliente);
		$this->db->trans_complete();
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function deleteCliente($ClienteCiRUC){
		$this->db->where('ClienteCiRUC', $ClienteCiRUC);
		return $this->db->delete('Cliente');
	}
	


}




 ?>