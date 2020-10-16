<?php 
/**
* 
*/
class ObjetivosEmpresa_Modelo extends CI_Model{
	
	function __construct(){
		# code...
	}

	public function insertObjetivosEmpresa($arrayObjetivosEmpresa){
		//Especificar los campos de cada dato del array
		$objetivosEmpresa = array('ObjetivoObjetivosEmpresa' => $arrayObjetivosEmpresa['ObjetivoObjetivosEmpresa'],
								  'DescripcionObjetivosEmpresa' => $arrayObjetivosEmpresa['DescripcionObjetivosEmpresa'],
						 		  'IdEmpresa' => $arrayObjetivosEmpresa['IdEmpresa']
								  );
		$this->db->trans_start();
		$insert = $this->db->insert('ObjetivosEmpresa',$objetivosEmpresa);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}		
	}
	public function getListObjetivosEmpresa($IdEmpresa){
		$this->db->where('IdEmpresa',$IdEmpresa);
		$resultado = $this->db->get('ObjetivosEmpresa');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getObjetivosEmpresa($IdObjetivosEmpresa){
		$this->db->where('IdObjetivosEmpresa', $IdObjetivosEmpresa);
		$resultado = $this->db->get('ObjetivosEmpresa');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updateObjetivosEmpresa($IdObjetivosEmpresa, $arrayObjetivosEmpresa, $IdEmpresa){
		//Especificar los campos de cada dato del array
		$objetivosEmpresa = array('ObjetivoObjetivosEmpresa' => $arrayObjetivosEmpresa['ObjetivoObjetivosEmpresa'],
								  'DescripcionObjetivosEmpresa' => $arrayObjetivosEmpresa['DescripcionObjetivosEmpresa'],
						 		  'IdEmpresa' => $arrayObjetivosEmpresa['IdEmpresa']
								  );
		$this->db->trans_start();
		$this->db->where('IdObjetivosEmpresa', $IdObjetivosEmpresa)->where('IdEmpresa', $IdEmpresa);
		$update = $this->db->update('ObjetivosEmpresa',$objetivosEmpresa);
		$this->db->trans_complete();		
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function deleteObjetivosEmpresa($IdObjetivosEmpresa, $IdEmpresa){
		$this->db->where('IdObjetivosEmpresa', $IdObjetivosEmpresa)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('ObjetivosEmpresa');
	}


}



 ?>