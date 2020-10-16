<?php 
/**
* 
*/
class LogrosEmpresa_Modelo extends CI_Model{
	
	function __construct(){
		# code...
	}

	public function insertLogrosEmpresa($arrayLogrosEmpresa){
		/*
		$logrosEmpresa = array('LogroLogrosEmpresa' => $arrayLogrosEmpresa['LogroLogrosEmpresa'],
							   'FechaLogrosEmpresa' => $arrayLogrosEmpresa['FechaLogrosEmpresa'],
							   'DetalleLogrosEmpresa' => $arrayLogrosEmpresa['DetalleLogrosEmpresa'],
							   'IdEmpresa' => $arrayLogrosEmpresa['IdEmpresa']
							   );
		*/
		$this->db->trans_start();
		$insert = $this->db->insert('LogrosEmpresa',$arrayLogrosEmpresa);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}	
	}
	public function getListLogrosEmpresa($IdEmpresa){
		$this->db->where('IdEmpresa',$IdEmpresa);
		$resultado = $this->db->get('LogrosEmpresa');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getLogrosEmpresa($IdLogrosEmpresa, $IdEmpresa){
		$this->db->where('IdLogrosEmpresa', $IdLogrosEmpresa)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('LogrosEmpresa');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updateLogrosEmpresa($IdLogrosEmpresa, $arrayLogrosEmpresa, $IdEmpresa){
		/*
		$logrosEmpresa = array('LogroLogrosEmpresa' => $arrayLogrosEmpresa['LogroLogrosEmpresa'],
							   'FechaLogrosEmpresa' => $arrayLogrosEmpresa['FechaLogrosEmpresa'],
							   'DetalleLogrosEmpresa' => $arrayLogrosEmpresa['DetalleLogrosEmpresa'],
							   'IdEmpresa' => $arrayLogrosEmpresa['IdEmpresa']
							   );
		*/
		$this->db->trans_start();
		$this->db->where('IdLogrosEmpresa', $IdLogrosEmpresa)->where('IdEmpresa', $IdEmpresa);
		$update = $this->db->update('LogrosEmpresa',$arrayLogrosEmpresa);
		$this->db->trans_complete();		
		if($update){
			return true;
		}else{
			return false;
		}
	}

	public function deleteLogrosEmpresa($IdLogrosEmpresa, $IdEmpresa){
		$query = "DELETE FROM LogrosEmpresa WHERE IdLogrosEmpresa = ".$IdLogrosEmpresa." AND IdEmpresa = ".$IdEmpresa;
		return $this->db->query($query);
	}
}



 ?>