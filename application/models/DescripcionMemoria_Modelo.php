<?php  
/**
* 
*/
class DescripcionMemoria_Modelo extends CI_Model{
	
	function __construct(){
		
	}

	public function insertDescripcionMemoria($arrayDescripcionMemoria){
		$descripcion = array(
							'Anio' => $arrayDescripcionMemoria['Anio'],		 
							'FechaUltimaMemoria' => $arrayDescripcionMemoria['FechaUltimaMemoria'],		 
							'CicloPresentacion' => $arrayDescripcionMemoria['CicloPresentacion'],
							'FechaSistema' => $arrayDescripcionMemoria['FechaSistema'],
							'IdEmpresa' => $arrayDescripcionMemoria['IdEmpresa']
						 );
		$this->db->trans_start();
		$insert = $this->db->insert('DescripcionMemoria',$descripcion);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}
	}

	public function getListDescripcionMemoria($IdEmpresa){
		$this->db->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('DescripcionMemoria');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}

	public function getDescripcionMemoria($IdDescripcionMemoria, $IdEmpresa){
		$this->db->where('IdDescripcionMemoria', $IdDescripcionMemoria)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('DescripcionMemoria');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}

	public function updateDescripcionMemoria($IdDescripcionMemoria, $arrayDescripcionMemoria, $IdEmpresa){
		$descripcion = array(
							'Anio' => $arrayDescripcionMemoria['Anio'],		 
							'FechaUltimaMemoria' => $arrayDescripcionMemoria['FechaUltimaMemoria'],		 
							'CicloPresentacion' => $arrayDescripcionMemoria['CicloPresentacion'],
							'FechaSistema' => $arrayDescripcionMemoria['FechaSistema'],
							'IdEmpresa' => $arrayDescripcionMemoria['IdEmpresa']				 
						 );
		$this->db->trans_start();
		$this->db->where('IdDescripcionMemoria', $IdDescripcionMemoria)->where('IdEmpresa', $IdEmpresa);
		$update = $this->db->update('DescripcionMemoria', $descripcion);
		$this->db->trans_complete();
		if($update)
			return true;
		else
			return false;
	}

	public function deleteDescripcionMemoria($IdDescripcionMemoria, $IdEmpresa){
		$this->db->where('IdDescripcionMemoria', $IdDescripcionMemoria)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('DescripcionMemoria');
	}



}

?>