<?php  
/**
* 
*/
class ImportAudiInterBalanceSocial_Modelo extends CI_Model{
	
	function __construct()
	{
		# code...
	}
	public function getListIAISBS(){
		$resultado = $this->db->get('ImportanciaAuditoriaInternaSobreBalanceSocial');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}	

	public function getIAISBS($IdImportancia){
		$this->db->where('IdImportancia', $IdImportancia);
		$resultado = $this->db->get('ImportanciaAuditoriaInternaSobreBalanceSocial');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}

	public function updateIAISBS($IdImportancia, $arrayIAISBS){
		$IAISBS = array('NombreImportancia' => $arrayIAISBS['NombreImportancia']			 
						 );	
		$this->db->trans_start();
		$this->db->where('IdImportancia', $IdImportancia);
		$update = $this->db->update('ImportanciaAuditoriaInternaSobreBalanceSocial', $IAISBS);
		$this->db->trans_complete();
		if($update)
			return true;
		else
			return false;
	}
	/**
	* Calificación Importancia de Auditoría Interna Sobre el Balance Social
	**/
	public function insertIAISBSCalif($arrayIAISBSCalif){
		$IAISBSCalif = array('IdImportancia' => $arrayIAISBSCalif['IdImportancia'],
						  'Pregunta' => $arrayIAISBSCalif['Pregunta'],
						 'Calificacion' => $arrayIAISBSCalif['Calificacion'],
						 'FechaMes' => $arrayIAISBSCalif['FechaMes'],
						 'FechaSistema' => $arrayIAISBSCalif['FechaSistema'],			 
						 'IdEmpresa' => $arrayIAISBSCalif['IdEmpresa']			 
						 );
		$this->db->trans_start();
		$insert = $this->db->insert('ImportanciaAuditoriaInternaSobreBalanceSocialCalif',$IAISBSCalif);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}
	}
	public function getListIAISBSCalif($IdEmpresa){
		$resultado = $this->db->where('IdEmpresa',$IdEmpresa)->get('ImportanciaAuditoriaInternaSobreBalanceSocialCalif');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getIAISBSCalif($IdIAISBSCalif, $IdEmpresa){
		$this->db->where('IdIAISBSCalif', $IdIAISBSCalif)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('ImportanciaAuditoriaInternaSobreBalanceSocialCalif');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updateIAISBSCalif($IdIAISBSCalif, $arrayIAISBSCalif, $IdEmpresa){
		$IAISBSCalif = array('IdImportancia' => $arrayIAISBSCalif['IdImportancia'],
						  'Pregunta' => $arrayIAISBSCalif['Pregunta'],
						 'Calificacion' => $arrayIAISBSCalif['Calificacion'],
						 'FechaMes' => $arrayIAISBSCalif['FechaMes'],
						 'FechaSistema' => $arrayIAISBSCalif['FechaSistema'],			 
						 'IdEmpresa' => $arrayIAISBSCalif['IdEmpresa']				 
						 );	
		$this->db->trans_start();
		$this->db->where('IdIAISBSCalif', $IdIAISBSCalif)->where('IdEmpresa', $IdEmpresa);
		$update = $this->db->update('ImportanciaAuditoriaInternaSobreBalanceSocialCalif', $IAISBSCalif);
		$this->db->trans_complete();
		if($update)
			return true;
		else
			return false;
	}

	public function deleteIAISBSCalif($IdIAISBSCalif, $IdEmpresa){
		$this->db->where('IdIAISBSCalif', $IdIAISBSCalif)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('ImportanciaAuditoriaInternaSobreBalanceSocialCalif');
	}
}

?>