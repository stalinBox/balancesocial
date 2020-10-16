<?php  
/**
* 
*/
class AccidenteEmpleado_Modelo extends CI_Model{
	
	function __construct(){
		
	}

	public function insertAccidenteEmpleado($arrayAccidente){
		/*$Accidente = array('CIEmpleadoAccidente' => $arrayAccidente['CIEmpleadoAccidente'],
						 'TipoIncapacidadAccidente' => $arrayAccidente['TipoIncapacidadAccidente'],
						 'FechaAccidente' => $arrayAccidente['FechaAccidente'],
						 'NumDiasPerdidos' => $arrayAccidente['NumDiasPerdidos'],
						 'Indemnizado' => $arrayAccidente['Indemnizado'],
						 'Fallecimiento' => $arrayAccidente['Fallecimiento'],			 
						 'IdEmpresa' => $arrayAccidente['IdEmpresa']			 
						 );
		*/
		$this->db->trans_start();
		$insert = $this->db->insert('Accidentes',$arrayAccidente);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}
	}

	public function getListAccidenteEmpleado($IdEmpresa){
		$sql = "SELECT A.*, E.NombresEmpleado, E.ApellidoPaternoEmpleado, E.ApellidoMaternoEmpleado FROM Accidentes A, Empleado E WHERE A.CIEmpleadoAccidente = E.CedulaEmpleado AND E.IdEmpresa = ".$IdEmpresa."";
		//$this->db->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->query($sql);
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}

	public function getAccidenteEmpleado($IdAccidente, $IdEmpresa){
		$this->db->where('IdAccidente', $IdAccidente)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('Accidentes');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}

	public function updateAccidenteEmpleado($IdAccidente, $arrayAccidente, $IdEmpresa){
		/*
		$Accidente = array('CIEmpleadoAccidente' => $arrayAccidente['CIEmpleadoAccidente'],
						 'TipoIncapacidadAccidente' => $arrayAccidente['TipoIncapacidadAccidente'],
						 'FechaAccidente' => $arrayAccidente['FechaAccidente'],
						 'NumDiasPerdidos' => $arrayAccidente['NumDiasPerdidos'],
						 'Indemnizado' => $arrayAccidente['Indemnizado'],
						 'Fallecimiento' => $arrayAccidente['Fallecimiento'],				 
						 'IdEmpresa' => $arrayAccidente['IdEmpresa']					 
						 );
		*/
		$this->db->trans_start();
		$this->db->where('IdAccidente', $IdAccidente)->where('IdEmpresa', $IdEmpresa);
		$update = $this->db->update('Accidentes', $arrayAccidente);
		$this->db->trans_complete();
		if($update)
			return true;
		else
			return false;
	}

	public function deleteAccidenteEmpleado($IdAccidente, $IdEmpresa){
		$this->db->where('IdAccidente', $IdAccidente)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('Accidentes');
	}



}

?>