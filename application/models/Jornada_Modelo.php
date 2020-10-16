<?php 
/**
* 
*/
class Jornada_Modelo extends CI_Model{
	
	function __construct(){
		# code...
	}

	public function insertJornada($arrayJornada){
		//Especificar los campos de cada dato del array
		$jornada = array('JornadasTipo' => $arrayJornada['JornadasTipo'],
						 'JornadasCantidadHoras' => $arrayJornada['JornadasCantidadHoras'],
						 'JornadasDescripcion' => $arrayJornada['DescripcionJornada']
						 );
		$this->db->trans_start();
		$insert = $this->db->insert('Jornada',$jornada);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}		
	}
	public function getListJornada(){
		$resultado = $this->db->get('Jornada');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getJornada($idJornada){
		$this->where('idJornadas', $idJornada);
		$resultado = $this->db->get('Jornada');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updateJornada($idJornada, $arrayJornada){
		//Especificar los campos de cada dato del array
		$jornada = array('JornadasTipo' => $arrayJornada['JornadasTipo'],
						 'JornadasCantidadHoras' => $arrayJornada['JornadasCantidadHoras'],
						 'JornadasDescripcion' => $arrayJornada['DescripcionJornada']
						 );
		$this->db->trans_start();
		$this->db->where('idJornadas', $idJornada);
		$update = $this->db->update('Jornadas',$jornada);
		$this->db->trans_complete();		
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function deleteJornada($idJornada){
		$this->db->where('idJornadas', $idJornada);
		return $this->db->delete('Jornada');
	}



}


 ?>