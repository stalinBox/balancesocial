<?php 
/**
* 
*/
class HigieneLaboral_Modelo extends CI_Model{
	
	function __construct(){
		# code...
	}

	public function insertHigieneLaboral($arrayHigieneLaboral){
		//Especificar los campos de cada dato del array
		$higieneLaboral = array('HLResponsable' => $arrayHigieneLaboral['HLResponsable'],
								'HLNumLimpiezasAlDiaProgram' => $arrayHigieneLaboral['HLNumLimpiezasAlDiaProgram'],
								'HLNumLimpiezaAlDiaHechas' => $arrayHigieneLaboral['HLNumLimpiezaAlDiaHechas'],
								'HLNumServiciosSanitarios' => $arrayHigieneLaboral['HLNumServiciosSanitarios'],
								'HLNumServiciosXNumEmpleados' => $arrayHigieneLaboral['HLNumServiciosXNumEmpleados'],
								'HLNumEmpleadosXDepartamen' => $arrayHigieneLaboral['HLNumEmpleadosXDepartamen'],
								'SucursalEmpresa_idSucursal' => $arrayHigieneLaboral['SucursalEmpresa_idSucursal']
								);
		$this->db->trans_start();
		$insert = $this->db->insert('HigieneLaboral',$higieneLaboral);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}		
	}
	public function getListHigieneLaboral(){
		$resultado = $this->db->get('HigieneLaboral');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getHigieneLaboral($idHigieneLaboral){
		$this->where('idHigieneLaboral', $idHigieneLaboral);
		$resultado = $this->db->get('HigieneLaboral');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updateHigieneLaboral($idHigieneLaboral, $arrayHigieneLaboral){
		//Especificar los campos de cada dato del array
		$higieneLaboral = array('HLResponsable' => $arrayHigieneLaboral['HLResponsable'],
								'HLNumLimpiezasAlDiaProgram' => $arrayHigieneLaboral['HLNumLimpiezasAlDiaProgram'],
								'HLNumLimpiezaAlDiaHechas' => $arrayHigieneLaboral['HLNumLimpiezaAlDiaHechas'],
								'HLNumServiciosSanitarios' => $arrayHigieneLaboral['HLNumServiciosSanitarios'],
								'HLNumServiciosXNumEmpleados' => $arrayHigieneLaboral['HLNumServiciosXNumEmpleados'],
								'HLNumEmpleadosXDepartamen' => $arrayHigieneLaboral['HLNumEmpleadosXDepartamen'],
								'SucursalEmpresa_idSucursal' => $arrayHigieneLaboral['SucursalEmpresa_idSucursal']
								);
		$this->db->trans_start();
		$this->db->where('idHigieneLaboral', $idHigieneLaboral);
		$update = $this->db->update('HigieneLaboral',$higieneLaboral);
		$this->db->trans_complete();		
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function deleteHigieneLaboral($idHigieneLaboral){
		$this->db->where('idHigieneLaboral', $idHigieneLaboral);
		return $this->db->delete('HigieneLaboral');
	}





}




 ?>