<?php 
/**
* 
*/
class DatoBase_Modelo extends CI_Model{
	
	function __construct()
	{
		# code...
	}
	public function insertDatoBase($arrayDatoBase){
		$this->db->trans_start();
		$insert = $this->db->insert('DatosBase',$arrayDatoBase);		
		$this->db->trans_complete();
		if($insert){
			return true;
		}else{
			return false;
		}
	}
	public function getListDatoBase($IdEmpresa){
		$resultado = $this->db->where('IdEmpresa',$IdEmpresa)->get('DatosBase');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getDatoBase($IdDatosBase, $IdEmpresa){
		$this->db->where('IdDatosBase', $IdDatosBase)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('DatosBase');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updateDatoBase($IdDatosBase, $arrayDatoBase, $IdEmpresa){
		$this->db->trans_start();
		$this->db->where('IdDatosBase', $IdDatosBase)->where('IdEmpresa', $IdEmpresa);
		$update = $this->db->update('DatosBase', $arrayDatoBase);		
		$this->db->trans_complete();
		if($update)
			return true;
		else
			return false;
	}
	public function deleteDatoBase($IdDatosBase, $IdEmpresa){
		$this->db->where('IdDatosBase', $IdDatosBase)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('DatosBase');
	}



}

?>