<?php 

/**
* 
*/
class TablasFunciones_Modelo extends CI_Model{
	
	function __construct(){
		# code...
	}

	public function insertTablasFunciones($arrayTablasFunciones){
		$TablasFunciones = array(
								'Nombre' => $arrayTablasFunciones['Nombre'],
								'ObjetoControlador' => $arrayTablasFunciones['ObjetoControlador'],
								'URL' => $arrayTablasFunciones['URL'],
								'Observacion' => $arrayTablasFunciones['Observacion'],
								'IdEmpresa' => $arrayTablasFunciones['IdEmpresa']
								);
		$this->db->trans_start();
		$insert = $this->db->insert('TablasFunciones', $TablasFunciones);
		$this->db->trans_complete();
		if($insert){
			return true;
		}else{
			return false;
		}		
	}
	public function getListTablasFunciones(){
		$resultado = $this->db->get('TablasFunciones');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getTablaFuncion($IdTabla){
		$this->db->where('IdTabla', $IdTabla);
		$resultado = $this->db->get('TablasFunciones');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;		
	}
	public function updateTablasFunciones($IdTabla, $arrayTablasFunciones){
		$TablasFunciones = array(
								'Nombre' => $arrayTablasFunciones['Nombre'],
								'ObjetoControlador' => $arrayTablasFunciones['ObjetoControlador'],
								'URL' => $arrayTablasFunciones['URL'],
								'Observacion' => $arrayTablasFunciones['Observacion'],
								'IdEmpresa' => $arrayTablasFunciones['IdEmpresa']
								);
		$this->db->trans_start();
		$this->db->where('IdTabla', $IdTabla);
		$update = $this->db->update('TablasFunciones', $TablasFunciones);
		$this->db->trans_complete();
		if($update){
			return true;
		}else{
			return false;
		}

	}
	public function deleteTablasFunciones($IdTabla){
		$this->db->where('IdTabla', $IdTabla);
		$delete = $this->db->delete('TablasFunciones');
		if ($delete) {
			return true;
		}else{
			return false;
		}
	}



}


 ?>