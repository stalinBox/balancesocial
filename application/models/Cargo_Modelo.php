<?php 
/**
* 
*/
class Cargo_Modelo extends CI_Model{
	
	function __construct(){
		
	}


	public function insertCargo($arrayCargo){
		//Especificar los campos de cada dato del array
		$cargo = array('NombreCargo' => $arrayCargo['NombreCargo'],
					   'TipoCargo' => $arrayCargo['TipoCargo'],
					   'DescripcionCargo' => $arrayCargo['DescripcionCargo'],
					   'SalarioCargo' => $arrayCargo['SalarioCargo'],
					   'Jornadas_idJornadas' => $arrayCargo['Jornadas_idJornadas'],
					   'Empresa_idEmpresa' => $arrayCargo['Empresa_idEmpresa']
					   );
		$this->db->trans_start();
		$insert = $this->db->insert('Cargo',$cargo);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}
	}
	public function getListCargo(){
		$resultado = $this->db->get('Cargo');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getCargo($idCargo){
		$this->where('idCargo', $idCargo);
		$resultado = $this->db->get('Cargo');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updateCargo($idCargo, $arrayCargo){
		//Especificar los campos de cada dato del array
		$cargo = array('NombreCargo' => $arrayCargo['NombreCargo'],
					   'TipoCargo' => $arrayCargo['TipoCargo'],
					   'DescripcionCargo' => $arrayCargo['DescripcionCargo'],
					   'SalarioCargo' => $arrayCargo['SalarioCargo'],
					   'Jornadas_idJornadas' => $arrayCargo['Jornadas_idJornadas'],
					   'Empresa_idEmpresa' => $arrayCargo['Empresa_idEmpresa']
					   );
		$this->db->trans_start();
		$this->db->where('idCargo', $idCargo);
		$update = $this->db->update('Cargo',$cargo);
		$this->db->trans_complete();		
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function deleteCargo($idCargo){
		$this->db->where('idCargo', $idCargo);
		return $this->db->delete('Cargo');
	}

}





 ?>