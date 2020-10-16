<?php 
/**
* 
*/
class Sindicato_Modelo extends CI_Model{
	
	function __construct(){
		# code...
	}

	public function insertSindicato($arraySindicato){
		//Especificar los campos de cada dato del array
		$sesionConsejo = array('NombreSindicato' => $arraySindicato['NombreSindicato'],
					   		   'DescripcionSindicato' => $arraySindicato['DescripcionSindicato'],
					   		   'IdEmpresa' => $arraySindicato['IdEmpresa']
					   		   );
		$this->db->trans_start();
		$insert = $this->db->insert('Sindicatos',$sesionConsejo);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}		
	}
	public function getListSindicato($IdEmpresa){
		$resultado = $this->db->where('IdEmpresa',$IdEmpresa)->get('Sindicatos');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getSindicato($IdSindicato, $IdEmpresa){
		$this->db->where('IdSindicato', $IdSindicato)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('Sindicatos');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updateSindicato($IdSindicato, $arraySindicato, $IdEmpresa){
		//Especificar los campos de cada dato del array
		$sesionConsejo = array('NombreSindicato' => $arraySindicato['NombreSindicato'],
					   		   'DescripcionSindicato' => $arraySindicato['DescripcionSindicato'],
					   		   'IdEmpresa' => $arraySindicato['IdEmpresa']
					   		   );
		$this->db->trans_start();
		$this->db->where('IdSindicato', $IdSindicato)->where('IdEmpresa', $IdEmpresa);
		$update = $this->db->update('Sindicatos',$sesionConsejo);
		$this->db->trans_complete();		
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function deleteSindicato($IdSindicato, $IdEmpresa){
		$this->db->where('IdSindicato', $IdSindicato)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('Sindicatos');
	}



}





 ?>