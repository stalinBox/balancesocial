<?php 

/**
* 
*/
class Contribucion_Modelo extends CI_Model{
	
	function __construct(){
		# code...
	}

	public function insertContribucion($arrayContribucion){
		//Especificar los campos de cada dato del array
		$contribucion = array( 'ContribucionNombre' => $arrayContribucion['ContribucionNombre'],
							   'ContribucionCosto' => $arrayContribucion['ContribucionCosto'],
							   'ContribucionInstitucion' => $arrayContribucion['ContribucionInstitucion'],
							   'ContribucionObservacion' => $arrayContribucion['ContribucionObservacion'],
							   'Empresa_idEmpresa' => $arrayContribucion['Empresa_idEmpresa']
						);
		$this->db->trans_start();
		$insert = $this->db->insert('Contribuciones',$contribucion);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}
	}
	public function getListContribucion(){
		$resultado = $this->db->get('Contribuciones');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getContribucion($idContribucion){
		$this->where('idContribuciones', $idContribucion);
		$resultado = $this->db->get('Contribuciones');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updateContribucion($idContribucion, $arrayContribucion){
		//Especificar los campos de cada dato del array
		$contribucion = array('ContribucionNombre' => $arrayContribucion['ContribucionNombre'],
							  'ContribucionCosto' => $arrayContribucion['ContribucionCosto'],
							  'ContribucionInstitucion' => $arrayContribucion['ContribucionInstitucion'],
							  'ContribucionObservacion' => $arrayContribucion['ContribucionObservacion'],
							  'Empresa_idEmpresa' => $arrayContribucion['Empresa_idEmpresa']
						);
		$this->db->trans_start();
		$this->db->where('idContribuciones', $idContribucion);
		$update = $this->db->update('Contribuciones',$contribucion);
		$this->db->trans_complete();		
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function deleteContribucion($idContribucion){
		$this->db->where('idContribuciones', $idContribucion);
		return $this->db->delete('Contribuciones');
	}

}




 ?>