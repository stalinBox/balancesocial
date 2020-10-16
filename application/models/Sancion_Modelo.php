<?php 
/**
* 
*/
class Sancion_Modelo extends CI_Model{
	
	function __construct(){
		# code...
	}

	public function insertSancion($arraySancion){
		//Especificar los campos de cada dato del array
		$sancion = array('TipoSancion' => $arraySancion['TipoSancion'],
					   	 'TipoMulta' => $arraySancion['TipoMulta'],
					   	 'ParteDenunciante' => $arraySancion['ParteDenunciante'],
					   	 'CostoSancion' => $arraySancion['CostoSancion'],
					   	 'FechaMes' => $arraySancion['FechaMes'],
					   	 'FechaSistema' => $arraySancion['FechaSistema'],
					   	 'IdEmpresa' => $arraySancion['IdEmpresa']
					   	 );
		$this->db->trans_start();
		$insert = $this->db->insert('Sanciones',$sancion);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}
	}
	public function getListSancion($IdEmpresa){
		$resultado = $this->db->where('IdEmpresa',$IdEmpresa)->get('Sanciones');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getSancion($IdSanciones, $IdEmpresa){
		$this->db->where('IdSanciones', $IdSanciones)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('Sanciones');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updateSancion($IdSanciones, $arraySancion, $IdEmpresa){
		//Especificar los campos de cada dato del array
		$sancion = array('TipoSancion' => $arraySancion['TipoSancion'],
					   	 'TipoMulta' => $arraySancion['TipoMulta'],
					   	 'ParteDenunciante' => $arraySancion['ParteDenunciante'],
					   	 'CostoSancion' => $arraySancion['CostoSancion'],
					   	 'FechaMes' => $arraySancion['FechaMes'],
					   	 'FechaSistema' => $arraySancion['FechaSistema'],
					   	 'IdEmpresa' => $arraySancion['IdEmpresa']
					   	 );
		$this->db->trans_start();
		$this->db->where('IdSanciones', $IdSanciones)->where('IdEmpresa', $IdEmpresa);
		$update = $this->db->update('Sanciones',$sancion);
		$this->db->trans_complete();		
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function deleteSancion($IdSanciones, $IdEmpresa){
		$this->db->where('IdSanciones', $IdSanciones)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('Sanciones');
	}




}



 ?>