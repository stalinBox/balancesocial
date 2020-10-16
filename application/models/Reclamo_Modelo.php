<?php 
/**
* 
*/
class Reclamo_Modelo extends CI_Model{
	
	function __construct(){
		
	}

	public function insertReclamo($arrayReclamo){
		//Especificar los campos de cada dato del array
		$reclamo = array('ResponsableDeReclamos' => $arrayReclamo['ResponsableDeReclamos'],
					  	 'TipoReclamos' => $arrayReclamo['TipoReclamos'],
					   	 'DenuncianteReclamos' => $arrayReclamo['DenuncianteReclamos'],
					     'NoAtendidosReclamos' => $arrayReclamo['NoAtendidosReclamos'],
					   	 'ResueltosReclamos' => $arrayReclamo['ResueltosReclamos'],
					   	 'CostoReclamos' => $arrayReclamo['CostoReclamos'],
					   	 'ObservacionReclamos' => $arrayReclamo['ObservacionReclamos'],
					   	 'FechaMes' => $arrayReclamo['FechaMes'],
					   	 'FechaSistema' => $arrayReclamo['FechaSistema'],
					   	 'IdEmpresa' => $arrayReclamo['IdEmpresa']
					   	 );
		$this->db->trans_start();
		$insert = $this->db->insert('Reclamos',$reclamo);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}		
	}
	public function getListReclamo($IdEmpresa){
		$resultado = $this->db->where('IdEmpresa',$IdEmpresa)->get('Reclamos');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getReclamo($IdReclamos, $IdEmpresa){
		$this->db->where('IdReclamos', $IdReclamos)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('Reclamos');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updateReclamo($IdReclamos, $arrayReclamo){
		//Especificar los campos de cada dato del array
		$reclamo = array('ResponsableDeReclamos' => $arrayReclamo['ResponsableDeReclamos'],
					  	 'TipoReclamos' => $arrayReclamo['TipoReclamos'],
					   	 'DenuncianteReclamos' => $arrayReclamo['DenuncianteReclamos'],
					     'NoAtendidosReclamos' => $arrayReclamo['NoAtendidosReclamos'],
					   	 'ResueltosReclamos' => $arrayReclamo['ResueltosReclamos'],
					   	 'CostoReclamos' => $arrayReclamo['CostoReclamos'],
					   	 'ObservacionReclamos' => $arrayReclamo['ObservacionReclamos'],
					   	 'FechaMes' => $arrayReclamo['FechaMes'],
					   	 'FechaSistema' => $arrayReclamo['FechaSistema'],
					   	 'IdEmpresa' => $arrayReclamo['IdEmpresa']

					   	 );
		$this->db->trans_start();
		$this->db->where('IdReclamos', $IdReclamos);
		$update = $this->db->update('Reclamos',$reclamo);
		$this->db->trans_complete();		
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function deleteReclamo($IdReclamos, $IdEmpresa){
		$this->db->where('IdReclamos', $IdReclamos)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('Reclamos');
	}



}



 ?>