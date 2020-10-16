<?php 

/**
* 
*/
class FormasAtencionCliente_Modelo extends CI_Model{
	
	function __construct(){
		# code...
	}

	public function insertFormasAtencionCliente($arrayFormasAtencionCliente){
		$formasDeAtencion = array(
				'NombreFormaAtencion' => $arrayFormasAtencionCliente['NombreFormaAtencion'],
				'Ubicacion' => $arrayFormasAtencionCliente['Ubicacion'],
				'DescripcionFormaAtencion' => $arrayFormasAtencionCliente['DescripcionFormaAtencion'],
				'IdEmpresa' => $arrayFormasAtencionCliente['IdEmpresa']
						);
		$this->db->trans_start();
		$insert = $this->db->insert('FormasDeAtencion', $formasDeAtencion);
		$this->db->trans_complete();
		if($insert){
			return true;
		}else{
			return false;
		}		
	}
	public function getListFormasAtencionCliente($IdEmpresa){
		$resultado = $this->db->where('IdEmpresa',$IdEmpresa)->get('FormasDeAtencion');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getFormasAtencionCliente($IdFormaAtencion, $IdEmpresa){
		$this->db->where('IdFormaAtencion', $IdFormaAtencion)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('FormasDeAtencion');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;		
	}
	public function updateFormasAtencionCliente($IdFormaAtencion, $arrayFormasAtencionCliente){
		$formasDeAtencion = array(
				'NombreFormaAtencion' => $arrayFormasAtencionCliente['NombreFormaAtencion'],
				'Ubicacion' => $arrayFormasAtencionCliente['Ubicacion'],
				'DescripcionFormaAtencion' => $arrayFormasAtencionCliente['DescripcionFormaAtencion'],
				'IdEmpresa' => $arrayFormasAtencionCliente['IdEmpresa']
						);
		$this->db->trans_start();
		$this->db->where('IdFormaAtencion', $IdFormaAtencion);
		$update = $this->db->update('FormasDeAtencion', $formasDeAtencion);
		$this->db->trans_complete();
		if($update){
			return true;
		}else{
			return false;
		}

	}
	public function deleteFormasAtencionCliente($IdFormaAtencion, $IdEmpresa){
		$this->db->where('IdFormaAtencion', $IdFormaAtencion)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('FormasDeAtencion');
	}





}




 ?>