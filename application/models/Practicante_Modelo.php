<?php 
/**
* 
*/
class Practicante_Modelo extends CI_Model{
	
	function __construct(){
		# code...
	}

	public function insertPracticante($arrayPracticante){
		//Especificar los campos de cada dato del array
		$practicante = array('CedulaPracticante' => $arrayPracticante['CedulaPracticante'],
					   		 'NombresPracticante' => $arrayPracticante['NombresPracticante'],
					   		 'ApellidosPracticante' => $arrayPracticante['ApellidosPracticante'],
					   		 'InstitucionProcedente' => $arrayPracticante['InstitucionProcedente'],
					   		 'TipoConvenio' => $arrayPracticante['TipoConvenio'],
					   		 'CantidadHorasPorDia' => $arrayPracticante['CantidadHorasPorDia'],
					   		 'FInicioPracticas' => $arrayPracticante['FInicioPracticas'],
					   		 'FFinPracticas' => $arrayPracticante['FFinPracticas'],
					   		 'ContratadoDespuesDePracticas' => $arrayPracticante['ContratadoDespuesDePracticas'],
					   		 'IdEmpresa' => $arrayPracticante['IdEmpresa']
					   		 );
		$this->db->trans_start();
		$insert = $this->db->insert('Practicantes',$practicante);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}
	}
	public function getListPracticante($IdEmpresa){
		$resultado = $this->db->where('IdEmpresa',$IdEmpresa)->get('Practicantes');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getPracticante($CedulaPracticante, $IdEmpresa){
		$this->db->where('CedulaPracticante', $CedulaPracticante)->where('IdEmpresa',$IdEmpresa);
		$resultado = $this->db->get('Practicantes');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updatePracticante($CedulaPracticante, $arrayPracticante, $IdEmpresa){
		$practicante = array('CedulaPracticante' => $arrayPracticante['CedulaPracticante'],
					   		 'NombresPracticante' => $arrayPracticante['NombresPracticante'],
					   		 'ApellidosPracticante' => $arrayPracticante['ApellidosPracticante'],
					   		 'InstitucionProcedente' => $arrayPracticante['InstitucionProcedente'],
					   		 'TipoConvenio' => $arrayPracticante['TipoConvenio'],
					   		 'CantidadHorasPorDia' => $arrayPracticante['CantidadHorasPorDia'],
					   		 'FInicioPracticas' => $arrayPracticante['FInicioPracticas'],
					   		 'FFinPracticas' => $arrayPracticante['FFinPracticas'],
					   		 'ContratadoDespuesDePracticas' => $arrayPracticante['ContratadoDespuesDePracticas'],
					   		 'IdEmpresa' => $arrayPracticante['IdEmpresa']
					   		 );
		$this->db->trans_start();
		$this->db->where('CedulaPracticante', $CedulaPracticante)->where('IdEmpresa', $IdEmpresa);
		$update = $this->db->update('Practicantes',$practicante);
		$this->db->trans_complete();		
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function deletePracticante($CedulaPracticante, $IdEmpresa){
		$this->db->where('CedulaPracticante', $CedulaPracticante)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('Practicantes');
	}



}



 ?>