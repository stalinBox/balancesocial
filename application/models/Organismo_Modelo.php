<?php  
/**
* 
*/
class Organismo_Modelo extends CI_Model{
	
	function __construct(){
		
	}

	public function insertOrganismo($arrayOrganismo){
		$organismo = array('NombreOrganismo' => $arrayOrganismo['NombreOrganismo'],
						 'DescripcionOrganismo' => $arrayOrganismo['DescripcionOrganismo']		 
						 );
		$this->db->trans_start();
		$insert = $this->db->insert('Organismos',$organismo);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}
	}
	public function getListOrganismo(){
		$resultado = $this->db->get('Organismos');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}

	public function getOrganismo($IdOrganismo){
		$this->db->where('IdOrganismo', $IdOrganismo);
		$resultado = $this->db->get('Organismos');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}

	public function updateOrganismo($IdOrganismo, $arrayOrganismo){
		$organismo = array('NombreOrganismo' => $arrayOrganismo['NombreOrganismo'],
						 'DescripcionOrganismo' => $arrayOrganismo['DescripcionOrganismo']			 
						 );
		$this->db->trans_start();
		$this->db->where('IdOrganismo', $IdOrganismo);
		$update = $this->db->update('Organismos', $organismo);
		$this->db->trans_complete();
		if($update)
			return true;
		else
			return false;
	}

	public function deleteOrganismo($IdOrganismo){
		$this->db->where('IdOrganismo', $IdOrganismo);
		return $this->db->delete('Organismos');
	}



}

?>