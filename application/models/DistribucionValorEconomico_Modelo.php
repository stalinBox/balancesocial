<?php 

/**
* 
*/
class DistribucionValorEconomico_Modelo extends CI_Model{
	
	function __construct(){
		# code...
	}

	public function insertDistribucionValorEconomico($arrayDistribucionValorEconomico){
		$DistribucionValorEconomico = array(
						'TipoDistribucion' => $arrayDistribucionValorEconomico['TipoDistribucion'],
						'SubTipoDistribucion' => $arrayDistribucionValorEconomico['SubTipoDistribucion'],
						'NombreSubCuenta' => $arrayDistribucionValorEconomico['NombreSubCuenta'],
						'Saldo' => $arrayDistribucionValorEconomico['Saldo'],
						'FechaMes' => $arrayDistribucionValorEconomico['FechaMes'],
						'Periodo' => $arrayDistribucionValorEconomico['Periodo'],
						'FechaSistema' => $arrayDistribucionValorEconomico['FechaSistema'],				
						'IdEmpresa' => $arrayDistribucionValorEconomico['IdEmpresa']
						);
		$this->db->trans_start();
		$insert = $this->db->insert('DistribucionValorEconomico', $DistribucionValorEconomico);
		$this->db->trans_complete();
		if($insert){
			return true;
		}else{
			return false;
		}		
	}
	public function getListDistribucionValorEconomico($IdEmpresa){
		$resultado = $this->db->where('IdEmpresa',$IdEmpresa)->get('DistribucionValorEconomico');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getDistribucionValorEconomico($IdDVE, $IdEmpresa){
		$this->db->where('IdDVE', $IdDVE)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('DistribucionValorEconomico');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;		
	}
	public function getDistribucionValorEconomicoGeneradoPeriodo($Periodo, $IdEmpresa){
		$this->db->where('Periodo', $Periodo)->where('IdEmpresa', $IdEmpresa)->where('TipoDistribucion', "Generado");
		$resultado = $this->db->get('DistribucionValorEconomico');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getDistribucionValorEconomicoDistribuidoPeriodo($Periodo, $IdEmpresa){
		$this->db->where('Periodo', $Periodo)->where('IdEmpresa', $IdEmpresa)->where('TipoDistribucion', "Distribuido");
		$resultado = $this->db->get('DistribucionValorEconomico');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function updateDistribucionValorEconomico($IdDVE, $arrayDistribucionValorEconomico, $IdEmpresa){
		$DistribucionValorEconomico = array(
						'TipoDistribucion' => $arrayDistribucionValorEconomico['TipoDistribucion'],
						'SubTipoDistribucion' => $arrayDistribucionValorEconomico['SubTipoDistribucion'],
						'NombreSubCuenta' => $arrayDistribucionValorEconomico['NombreSubCuenta'],
						'Saldo' => $arrayDistribucionValorEconomico['Saldo'],
						'FechaMes' => $arrayDistribucionValorEconomico['FechaMes'],
						'Periodo' => $arrayDistribucionValorEconomico['Periodo'],
						'FechaSistema' => $arrayDistribucionValorEconomico['FechaSistema'],				
						'IdEmpresa' => $arrayDistribucionValorEconomico['IdEmpresa']
						);
		$this->db->trans_start();
		$this->db->where('IdDVE', $IdDVE)->where('IdEmpresa', $IdEmpresa);
		$update = $this->db->update('DistribucionValorEconomico', $DistribucionValorEconomico);
		$this->db->trans_complete();
		if($update){
			return true;
		}else{
			return false;
		}

	}
	public function deleteDistribucionValorEconomico($IdDVE, $IdEmpresa){
		$this->db->where('IdDVE', $IdDVE)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('DistribucionValorEconomico');
	}





}




 ?>