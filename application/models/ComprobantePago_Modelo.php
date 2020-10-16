<?php 

/**
* 
*/
class ComprobantePago_Modelo extends CI_Model{
	
	function __construct(){
		# code...
	}

	public function insertComprobantePago($arrayComprobantePago){
		//Especificar los campos de cada dato del array
		$comprobantePago = array('CPRucEmpresa' => $arrayComprobantePago['CPRucEmpresa'],
								 'CPFecha' => $arrayComprobantePago['CPFecha'],
								 'CPTipo' => $arrayComprobantePago['CPTipo'],
								 'CPCantidadAdquirida' => $arrayComprobantePago['CPCantidadAdquirida'],
								 'CPCosto' => $arrayComprobantePago['CPCosto'],
								 'CPIVA' => $arrayComprobantePago['CPIVA'],
								 'CPCantidadEmitidaMes' => $arrayComprobantePago['CPCantidadEmitidaMes'],
								 'Empresa_idEmpresa' => $arrayComprobantePago['Empresa_idEmpresa']
								 );
		$this->db->trans_start();
		$insert = $this->db->insert('ComprobantePago', $comprobantePago);;
		$this->db->trans_complete();
		if($insert){
			return true;
		}else{
			return false;
		}

	}
	public function getListComprobantePago(){
		$resultado = $this->db->get('ComprobantePago');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getComprobantePago($idComprobantePago){
		$this->db->where('idComprobantePago', $idComprobantePago);
		$resultado = $this->db->get('ComprobantePago');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function updateComprobantePago($idComprobantePago, $arrayComprobantePago){
		//Especificar los campos de cada dato del array
		$comprobantePago = array('CPRucEmpresa' => $arrayComprobantePago['CPRucEmpresa'],
								'CPFecha' => $arrayComprobantePago['CPFecha'],
								'CPTipo' => $arrayComprobantePago['CPTipo'],
								'CPCantidadAdquirida' => $arrayComprobantePago['CPCantidadAdquirida'],
								'CPCosto' => $arrayComprobantePago['CPCosto'],
								'CPIVA' => $arrayComprobantePago['CPIVA'],
								'CPCantidadEmitidaMes' => $arrayComprobantePago['CPCantidadEmitidaMes'],
								'Empresa_idEmpresa' => $arrayComprobantePago['Empresa_idEmpresa']
								);
		$this->db->trans_start();
		$this->db->where('idComprobantePago', $idComprobantePago);
		$update = $this->db->update('ComprobantePago', $comprobantePago);;
		$this->db->trans_complete();
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function deleteComprobantePago($idComprobantePago){
		$this->db->where('idComprobantePago', $idComprobantePago);
		return $this->db->delete('ComprobantePago');
	}


}




 ?>