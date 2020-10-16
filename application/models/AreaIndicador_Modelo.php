<?php 
/**
* 
*/
class AreaIndicador_Modelo extends CI_Model{
	
	function __construct(){
		# code...
	}

	public function insertAreaIndicador($arrayAreaIndicador){
		//Especificar los campos de cada dato del array
		$areaIndicador = array('AreaIndicadorNombre' => $arrayAreaIndicador['AreaIndicadorNombre'],
						 	   'AreaIndicadorDescripcion' => $arrayAreaIndicador['AreaIndicadorDescripcion']
						 	   );
		$this->db->trans_start();
		$insert = $this->db->insert('AreaIndicador',$areaIndicador);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}

	}
	public function getListAreaIndicador(){
		$resultado = $this->db->get('AreaIndicador');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getAreaIndicador($idAreaIndicador){
		$this->db->where('idAreaIndicador', $idAreaIndicador);
		$resultado = $this->db->get('AreaIndicador');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updateAreaIndicador($idAreaIndicador, $arrayAreaIndicador){
		//Especificar los campos de cada dato del array
		$areaIndicador = array('AreaIndicadorNombre' => $arrayAreaIndicador['AreaIndicadorNombre'],
						 	   'AreaIndicadorDescripcion' => $arrayAreaIndicador['AreaIndicadorDescripcion']
						 	   );
		$this->db->trans_start();
		$this->db->where('idAreaIndicador', $idAreaIndicador);
		$update = $this->db->update('AreaIndicador', $areaIndicador);
		$this->db->trans_complete();
		if($update)
			return true;
		else
			return false;
	}
	public function deleteAreaIndicador($idAreaIndicador){
		$this->db->where('idAreaIndicador', $idAreaIndicador);
		return $this->db->delete('AreaIndicador');
	}

}



 ?>