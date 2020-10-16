<?php 
/**
* 
*/
class ValoresEmpresa_Modelo extends CI_Model{
	
	function __construct(){
		# code...
	}
	public function insertValoresEmpresa($arrayValoresEmpresa){
		//Especificar los campos de cada dato del array
		$valoresEmpresa = array('ValorValoresEmpresa' => $arrayValoresEmpresa['ValorValoresEmpresa'],
					   			'DescripcionValoresEmpresa' => $arrayValoresEmpresa['DescripcionValoresEmpresa'],
					   			'IdEmpresa' => $arrayValoresEmpresa['IdEmpresa']
					   			);
		$this->db->trans_start();
		$insert = $this->db->insert('ValoresEmpresa',$valoresEmpresa);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}
	}
	public function getListValoresEmpresa($IdEmpresa){
		$this->db->order_by("IdValoresEmpresa", "DESC");
		$this->db->where('IdEmpresa',$IdEmpresa);
		$resultado = $this->db->get('ValoresEmpresa');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getValoresEmpresa($IdValoresEmpresa, $IdEmpresa){
		$this->db->where('IdValoresEmpresa', $IdValoresEmpresa)->where('IdEmpresa',$IdEmpresa);
		$resultado = $this->db->get('ValoresEmpresa');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updateValoresEmpresa($IdValoresEmpresa, $arrayValoresEmpresa, $IdEmpresa){
		//Especificar los campos de cada dato del array
		$valoresEmpresa = array('ValorValoresEmpresa' => $arrayValoresEmpresa['ValorValoresEmpresa'],
					   			'DescripcionValoresEmpresa' => $arrayValoresEmpresa['DescripcionValoresEmpresa'],
					   			'IdEmpresa' => $arrayValoresEmpresa['IdEmpresa']
					   			);
		$this->db->trans_start();
		$this->db->where('IdValoresEmpresa', $IdValoresEmpresa)->where('IdEmpresa', $IdEmpresa);
		$update = $this->db->update('ValoresEmpresa',$valoresEmpresa);
		$this->db->trans_complete();		
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function deleteValoresEmpresa($IdValoresEmpresa, $IdEmpresa){
		$this->db->where('IdValoresEmpresa', $IdValoresEmpresa)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('ValoresEmpresa');
	}




}



 ?>