<?php  
/**
* 
*/
class PoliticasAprobacionCredito_Modelo extends CI_Model{
	
	function __construct()
	{
		# code...
	}
	public function getListPAC(){
		$resultado = $this->db->get('PoliticasAprobacionCredito');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}	

	public function getPAC($IdAprobacionCredito){
		$this->db->where('IdAprobacionCredito', $IdAprobacionCredito);
		$resultado = $this->db->get('PoliticasAprobacionCredito');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}

	public function updatePAC($IdAprobacionCredito, $arrayPAC){
		$pac = array('NombreAprobacionCredito' => $arrayPAC['NombreAprobacionCredito']			 
						 );	
		$this->db->trans_start();
		$this->db->where('IdAprobacionCredito', $IdAprobacionCredito);
		$update = $this->db->update('PoliticasAprobacionCredito', $pac);
		$this->db->trans_complete();
		if($update)
			return true;
		else
			return false;
	}
	/**
	* Calificación PoliticasAprobacionCredito
	**/
	public function insertPACCalif($arrayPACCalif){
		$pacCalif = array('IdAprobacionCredito' => $arrayPACCalif['IdAprobacionCredito'],
						  'Pregunta' => $arrayPACCalif['Pregunta'],
						 'Calificacion' => $arrayPACCalif['Calificacion'],
						 'FechaMes' => $arrayPACCalif['FechaMes'],
						 'FechaSistema' => $arrayPACCalif['FechaSistema'],			 
						 'IdEmpresa' => $arrayPACCalif['IdEmpresa']			 
						 );
		$this->db->trans_start();
		$insert = $this->db->insert('PoliticasAprobacionCreditoCalif',$pacCalif);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}
	}
	public function getListPACCalif($IdEmpresa){
		$resultado = $this->db->where('IdEmpresa',$IdEmpresa)->get('PoliticasAprobacionCreditoCalif');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getPACCalif($IdPACCalif, $IdEmpresa){
		$this->db->where('IdPACCalif', $IdPACCalif)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('PoliticasAprobacionCreditoCalif');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updatePACCalif($IdPACCalif, $arrayPACCalif, $IdEmpresa){
		$pacCalif = array('IdAprobacionCredito' => $arrayPACCalif['IdAprobacionCredito'],
						  'Pregunta' => $arrayPACCalif['Pregunta'],
						 'Calificacion' => $arrayPACCalif['Calificacion'],
						 'FechaMes' => $arrayPACCalif['FechaMes'],
						 'FechaSistema' => $arrayPACCalif['FechaSistema'],			 
						 'IdEmpresa' => $arrayPACCalif['IdEmpresa']				 
						 );	
		$this->db->trans_start();
		$this->db->where('IdPACCalif', $IdPACCalif)->where('IdEmpresa', $IdEmpresa);
		$update = $this->db->update('PoliticasAprobacionCreditoCalif', $pacCalif);
		$this->db->trans_complete();
		if($update)
			return true;
		else
			return false;
	}

	public function deletePACCalif($IdPACCalif, $IdEmpresa){
		$this->db->where('IdPACCalif', $IdPACCalif)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('PoliticasAprobacionCreditoCalif');
	}
}

?>