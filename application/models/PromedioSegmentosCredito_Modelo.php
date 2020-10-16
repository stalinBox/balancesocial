<?php 
/**
* 
*/
class PromedioSegmentosCredito_Modelo extends CI_Model{
	
	function __construct(){
		# code...
	}

	public function insertPromdSegmCredito($arrayPromdSegmCredito){
		/*
		$PromdSegmCredito = array('NombreSegmento' => $arrayPromdSegmCredito['NombreSegmento'],
				 	   			 'TipoSegmentoCredito' => $arrayPromdSegmCredito['TipoSegmentoCredito'],
				 	   			 'MontoColocado' => $arrayPromdSegmCredito['MontoColocado'],
				 	   			 'Operaciones' => $arrayPromdSegmCredito['Operaciones'],
				 	   			 'FechaMes' => $arrayPromdSegmCredito['FechaMes'],
				 	   			 'FechaSistema' => $arrayPromdSegmCredito['FechaSistema'],
				 	   			 'IdEmpresa' => $arrayPromdSegmCredito['IdEmpresa']	 
				 	   			 );
		*/
		$this->db->trans_start();
		$insert = $this->db->insert('PromedioSegmentosCreditos',$arrayPromdSegmCredito);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}
	}

	public function getListPromdSegmCredito($IdEmpresa){
		$resultado = $this->db->where('IdEmpresa',$IdEmpresa)->get('PromedioSegmentosCreditos');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}

	public function getPromdSegmCredito($IdPromedioSegmento, $IdEmpresa){
		$this->db->where('IdPromedioSegmento', $IdPromedioSegmento)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('PromedioSegmentosCreditos');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function updatePromdSegmCredito($IdPromedioSegmento, $arrayPromdSegmCredito){
		/*
		$PromdSegmCredito = array('NombreSegmento' => $arrayPromdSegmCredito['NombreSegmento'],
				 	   			 'TipoSegmentoCredito' => $arrayPromdSegmCredito['TipoSegmentoCredito'],
				 	   			 'MontoColocado' => $arrayPromdSegmCredito['MontoColocado'],
				 	   			 'Operaciones' => $arrayPromdSegmCredito['Operaciones'],
				 	   			 'FechaMes' => $arrayPromdSegmCredito['FechaMes'],
				 	   			 'FechaSistema' => $arrayPromdSegmCredito['FechaSistema'],
				 	   			 'IdEmpresa' => $arrayPromdSegmCredito['IdEmpresa']	
						 	   	 );
		*/
		$this->db->trans_start();
		$this->db->where('IdPromedioSegmento', $IdPromedioSegmento);
		$update = $this->db->update('PromedioSegmentosCreditos',$arrayPromdSegmCredito);
		$this->db->trans_complete();		
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function deletePromdSegmCredito($IdPromedioSegmento, $IdEmpresa){
		$this->db->where('IdPromedioSegmento', $IdPromedioSegmento)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('PromedioSegmentosCreditos');
	}



}


 ?>