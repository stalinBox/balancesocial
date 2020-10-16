<?php  
/**
* 
*/
class PrincipiosEmpresa_Modelo extends CI_Model{
	
	function __construct(){
		# code...
	}

	public function insertPrincipiosEmpresa($arrayPrincipiosEmpresa){
		//Especificar los campos de cada dato del array
		$principiosEmpresa = array('PrincipioPrincipiosEmpresa' => $arrayPrincipiosEmpresa['PrincipioPrincipiosEmpresa'],
					   			   'DescripcionPrincipiosEmpresa' => $arrayPrincipiosEmpresa['DescripcionPrincipiosEmpresa'],
					   			   'IdEmpresa' => $arrayPrincipiosEmpresa['IdEmpresa']
					   			   );
		$this->db->trans_start();
		$insert = $this->db->insert('PrincipiosEmpresa',$principiosEmpresa);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}
	}
	public function getListPrincipiosEmpresa($IdEmpresa){
		$this->db->where('IdEmpresa',$IdEmpresa);
		$resultado = $this->db->get('PrincipiosEmpresa');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getPrincipiosEmpresa($IdPrincipiosEmpresa){
		$this->db->where('IdPrincipiosEmpresa', $IdPrincipiosEmpresa);
		$resultado = $this->db->get('PrincipiosEmpresa');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updatePrincipiosEmpresa($IdPrincipiosEmpresa, $arrayPrincipiosEmpresa, $IdEmpresa){
		//Especificar los campos de cada dato del array
		$principiosEmpresa = array('PrincipioPrincipiosEmpresa' => $arrayPrincipiosEmpresa['PrincipioPrincipiosEmpresa'],
					   			   'DescripcionPrincipiosEmpresa' => $arrayPrincipiosEmpresa['DescripcionPrincipiosEmpresa'],
					   			   'IdEmpresa' => $arrayPrincipiosEmpresa['IdEmpresa']
					   			   );
		$this->db->trans_start();
		$this->db->where('IdPrincipiosEmpresa', $IdPrincipiosEmpresa)->where('IdEmpresa', $IdEmpresa);
		$update = $this->db->update('PrincipiosEmpresa',$principiosEmpresa);
		$this->db->trans_complete();		
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function deletePrincipiosEmpresa($IdPrincipiosEmpresa, $IdEmpresa){
		$query = "DELETE FROM PrincipiosEmpresa WHERE IdPrincipiosEmpresa = ".$IdPrincipiosEmpresa." AND IdEmpresa = ".$IdEmpresa;
		return $this->db->query($query);
	}
}
 ?>