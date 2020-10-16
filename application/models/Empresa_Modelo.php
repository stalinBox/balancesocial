<?php 

/**
* 
*/
class Empresa_Modelo extends CI_Model{
	
	function __construct(){
		# code...
	}

	public function insertEmpresa($arrayEmpresa){
		//Especificar los campos de cada dato del array
		/*$empresa = array('NombreEmpresa' => $arrayEmpresa['NombreEmpresa'],
						 'RucEmpresa' => $arrayEmpresa['RucEmpresa'],
						 'ContraseniaEmpresa' => $arrayEmpresa['ContraseniaEmpresa'],
						 'CapitalEmpresa' => $arrayEmpresa['CapitalEmpresa'],
						 'FechaRegistroEmpresa' => $arrayEmpresa['FechaRegistroEmpresa'],
						 'CantidadFundadoresEmpresa' => $arrayEmpresa['CantidadFundadoresEmpresa'],
						 'DireccionEmpresa' => $arrayEmpresa['DireccionEmpresa'],
						 'PaginaWeb' => $arrayEmpresa['PaginaWeb'],
						 'TelefonoEmpresa' => $arrayEmpresa['TelefonoEmpresa'],
						 'HistoriaEmpresa' => $arrayEmpresa['HistoriaEmpresa'],
						 'MisionEmpresa' => $arrayEmpresa['MisionEmpresa'],
						 'VisionEmpresa' => $arrayEmpresa['VisionEmpresa'],
						 'token' => $arrayEmpresa['token']
						);*/
		$this->db->trans_start();
		$insert = $this->db->insert('Empresa',$arrayEmpresa);
		$IdInsert = $this->db->insert_id(); 
		$this->db->trans_complete();		
		if($insert){
			return $IdInsert;
		}else{
			return false;
		}		
	}
	public function getListEmpresa(){
		$resultado = $this->db->get('empresa');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getEmpresa($IdEmpresa){
		$query = $this->db->where('IdEmpresa',$IdEmpresa)->get('empresa');
		if($query->num_rows() > 0 ){
			return $query->result();
		}else{
			return false;
		}
	}
	public function getNameEmpresa($IdEmpresa){
		$this->db->select('NombreEmpresa');
		$query = $this->db->where('IdEmpresa',$IdEmpresa)->get('empresa');
		if($query->num_rows() > 0 ){
			return $query->result();
		}else{
			return false;
		}
	}
	public function getEmpresaLog($RucEmpresa, $ContraseniaEmpresa){
		$query = $this->db->where('RucEmpresa',$RucEmpresa)->where('ContraseniaEmpresa', $ContraseniaEmpresa)->get('empresa');
		if($query->num_rows() > 0 ){
			return $query->row();
		}else{
			return false;
		}
	}
	public function updateEmpresa($arrayEmpresa, $IdEmpresa){
		//Especificar los campos de cada dato del array
		$empresa = array('NombreEmpresa' => $arrayEmpresa['NombreEmpresa'],
						 'RucEmpresa' => $arrayEmpresa['RucEmpresa'],
						 'CapitalEmpresa' => $arrayEmpresa['CapitalEmpresa'],
						 'FechaRegistroEmpresa' => $arrayEmpresa['FechaRegistroEmpresa'],
						 'CantidadFundadoresEmpresa' => $arrayEmpresa['CantidadFundadoresEmpresa'],
						 'DireccionEmpresa' => $arrayEmpresa['DireccionEmpresa'],
						 'PaginaWeb' => $arrayEmpresa['PaginaWeb'],
						 'TelefonoEmpresa' => $arrayEmpresa['TelefonoEmpresa'],
						 'HistoriaEmpresa' => $arrayEmpresa['HistoriaEmpresa'],
						 'MisionEmpresa' => $arrayEmpresa['MisionEmpresa'],
						 'VisionEmpresa' => $arrayEmpresa['VisionEmpresa']
						);
		$this->db->trans_start();
		$this->db->where('IdEmpresa', $IdEmpresa);
		$update = $this->db->update('empresa',$empresa);
		$this->db->trans_complete();		
		if($update){
			return true;
		}else{
			return false;
		}
	}
	
	public function deleteEmpresa($idEmpresa){
		$this->db->where('idEmpresa', $idEmpresa);
		return $this->db->delete('empresa');
	}

	/**
	 * Consultas para reportes
	 */
	public function getListReporteTabla($nombreTabla, $IdEmpresa){
		$this->db->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get($nombreTabla);
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getListReporteTablaConsulta($select, $nombreTabla, $IdEmpresa){
		$this->db->select($select);
		$this->db->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get($nombreTabla);
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}

}


 ?>