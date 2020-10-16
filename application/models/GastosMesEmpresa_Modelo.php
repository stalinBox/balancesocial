<?php 
/**
* 
*/
class GastosMesEmpresa_Modelo extends CI_Model{
	
	function __construct(){
		# code...
	}

	public function insertGastosMesEmpresa($arrayGastosMesEmpresa){
		//Especificar los campos de cada dato del array
		$gastosMesEmpresa = array('TipoGasto' => $arrayGastosMesEmpresa['TipoGasto'],
								  'ProveedorGastosMes' => $arrayGastosMesEmpresa['ProveedorGastosMes'],
								  'MesGastosMes' => $arrayGastosMesEmpresa['MesGastosMes'],
								  'FachaGastosMes' => $arrayGastosMesEmpresa['FachaGastosMes'],
								  'UnidadMedidaGastosMes' => $arrayGastosMesEmpresa['UnidadMedidaGastosMes'],
								  'CantidadGastosMes' => $arrayGastosMesEmpresa['CantidadGastosMes'],
								  'CostoGastosMes' => $arrayGastosMesEmpresa['CostoGastosMes'],
								  'Observacion' => $arrayGastosMesEmpresa['Observacion'],
								  'FechaSistema' => $arrayGastosMesEmpresa['FechaSistema'],
								  'IdEmpresa' => $arrayGastosMesEmpresa['IdEmpresa']
								  );
		$this->db->trans_start();
		$insert = $this->db->insert('GastosMesEmpresa',$gastosMesEmpresa);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}
	}
	public function getListGastosMesEmpresa($IdEmpresa){
		$resultado = $this->db->where('IdEmpresa',$IdEmpresa)->get('GastosMesEmpresa');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getGastoMesEmpresa($IdGastosMesEmpresa, $IdEmpresa){
		$this->db->where('IdGastosMesEmpresa', $IdGastosMesEmpresa)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('GastosMesEmpresa');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updateGastosMesEmpresa($IdGastosMesEmpresa, $arrayGastosMesEmpresa, $IdEmpresa){
		//Especificar los campos de cada dato del array
		$gastosMesEmpresa = array('TipoGasto' => $arrayGastosMesEmpresa['TipoGasto'],
								  'ProveedorGastosMes' => $arrayGastosMesEmpresa['ProveedorGastosMes'],
								  'MesGastosMes' => $arrayGastosMesEmpresa['MesGastosMes'],
								  'FachaGastosMes' => $arrayGastosMesEmpresa['FachaGastosMes'],
								  'UnidadMedidaGastosMes' => $arrayGastosMesEmpresa['UnidadMedidaGastosMes'],
								  'CantidadGastosMes' => $arrayGastosMesEmpresa['CantidadGastosMes'],
								  'CostoGastosMes' => $arrayGastosMesEmpresa['CostoGastosMes'],
								  'Observacion' => $arrayGastosMesEmpresa['Observacion'],
								  'FechaSistema' => $arrayGastosMesEmpresa['FechaSistema'],
								  'IdEmpresa' => $arrayGastosMesEmpresa['IdEmpresa']
								  );
		$this->db->trans_start();
		$this->db->where('IdGastosMesEmpresa', $IdGastosMesEmpresa);
		$update = $this->db->update('GastosMesEmpresa',$gastosMesEmpresa);
		$this->db->trans_complete();		
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function deleteGastosMesEmpresa($IdGastosMesEmpresa, $IdEmpresa){
		$this->db->where('IdGastosMesEmpresa', $IdGastosMesEmpresa)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('GastosMesEmpresa');
	}




}


 ?>