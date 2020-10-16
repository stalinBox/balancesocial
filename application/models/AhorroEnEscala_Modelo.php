<?php 
/**
* 
*/
class AhorroEnEscala_Modelo extends CI_Model{
	
	function __construct(){
		# code...
	}

	public function insertAhorroEnEscala($arrayAhorroEnEscala){		
		/*
		$AhorroEnEscala = array(
						 	   'Iniciativa' => $arrayAhorroEnEscala['Iniciativa'],
						 	   'Individual' => $arrayAhorroEnEscala['Individual'],
						 	   'Colectivo' => $arrayAhorroEnEscala['Colectivo'],
						 	   'Diferencia' => $arrayAhorroEnEscala['Diferencia'],
						 	   'PorcentajeAhorro' => $arrayAhorroEnEscala['PorcentajeAhorro'],
						 	   'FechaMes' => $arrayAhorroEnEscala['FechaMes'],
						 	   'FechaSistema' => $arrayAhorroEnEscala['FechaSistema'],
						 	   'IdEmpresa' => $arrayAhorroEnEscala['IdEmpresa']
						 	   );
		*/
		$this->db->trans_start();
		$insert = $this->db->insert('AhorroEnEscala',$arrayAhorroEnEscala);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}

	}
	public function getListAhorroEnEscala($IdEmpresa){
		$this->db->order_by("FechaMes DESC");
		$resultado = $this->db->where('IdEmpresa', $IdEmpresa)->get('AhorroEnEscala');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getAhorroEnEscala($IdAhorro, $IdEmpresa){
		$this->db->where('IdAhorro', $IdAhorro)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('AhorroEnEscala');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updateAhorroEnEscala($IdAhorro, $arrayAhorroEnEscala, $IdEmpresa){		
		/*
		$AhorroEnEscala = array(
							   'Iniciativa' => $arrayAhorroEnEscala['Iniciativa'],
						 	   'Individual' => $arrayAhorroEnEscala['Individual'],
						 	   'Colectivo' => $arrayAhorroEnEscala['Colectivo'],
						 	   'Diferencia' => $arrayAhorroEnEscala['Diferencia'],
						 	   'PorcentajeAhorro' => $arrayAhorroEnEscala['PorcentajeAhorro'],
						 	   'FechaMes' => $arrayAhorroEnEscala['FechaMes'],
						 	   'FechaSistema' => $arrayAhorroEnEscala['FechaSistema'],
						 	   'IdEmpresa' => $arrayAhorroEnEscala['IdEmpresa']
						 	   );
		*/
		$this->db->trans_start();
		$this->db->where('IdAhorro', $IdAhorro)->where('IdEmpresa', $IdEmpresa);
		$update = $this->db->update('AhorroEnEscala', $arrayAhorroEnEscala);
		$this->db->trans_complete();
		if($update)
			return true;
		else
			return false;
	}
	public function deleteAhorroEnEscala($IdAhorro, $IdEmpresa){
		$this->db->where('IdAhorro', $IdAhorro)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('AhorroEnEscala');
	}

}



 ?>