<?php 
/**
* 
*/
class HijoEmpleado_Modelo extends CI_Model{
	
	function __construct(){
		# code...
	}

	public function insertHijoEmpleado($arrayHijoEmpleado){
		//Especificar los campos de cada dato del array
		$hijoEmpleado = array('CedulaEmpleado' => $arrayHijoEmpleado['CedulaEmpleado'],
							  'CedulaHijoEmpleado' => $arrayHijoEmpleado['CedulaHijoEmpleado'],
							  'NombresHijoEmpleado' => $arrayHijoEmpleado['NombresHijoEmpleado'],
							  'ApellidosHijoEmpleado' => $arrayHijoEmpleado['ApellidosHijoEmpleado'],
							  'FechaNacimientoHijoEmpleado' => $arrayHijoEmpleado['FechaNacimientoHijoEmpleado'],
							  'DiscapacidadHijoEmpleado' => $arrayHijoEmpleado['DiscapacidadHijoEmpleado'],
							  'CentroEducacionHijoEmpleado' => $arrayHijoEmpleado['CentroEducacionHijoEmpleado'],
							  'FechaSistema' => $arrayHijoEmpleado['FechaSistema'],
							  'IdEmpresa' => $arrayHijoEmpleado['IdEmpresa']
							  );
		$this->db->trans_start();
		$insert = $this->db->insert('HijoEmpleado',$hijoEmpleado);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}		
	}
	public function getListHijoEmpleado($IdEmpresa){
		$this->db->select('*, TIMESTAMPDIFF(YEAR, FechaNacimientoHijoEmpleado, CURDATE()) AS Edad');
		$resultado = $this->db->where('IdEmpresa',$IdEmpresa)->get('HijoEmpleado');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getHijoEmpleado($IdHijoEmpleado, $IdEmpresa){
		$this->db->where('IdHijoEmpleado', $IdHijoEmpleado)->where('IdEmpresa',$IdEmpresa);
		$resultado = $this->db->get('HijoEmpleado');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updateHijoEmpleado($IdHijoEmpleado, $arrayHijoEmpleado, $IdEmpresa){
		//Especificar los campos de cada dato del array
		$hijoEmpleado = array('CedulaEmpleado' => $arrayHijoEmpleado['CedulaEmpleado'],
							  'CedulaHijoEmpleado' => $arrayHijoEmpleado['CedulaHijoEmpleado'],
							  'NombresHijoEmpleado' => $arrayHijoEmpleado['NombresHijoEmpleado'],
							  'ApellidosHijoEmpleado' => $arrayHijoEmpleado['ApellidosHijoEmpleado'],
							  'FechaNacimientoHijoEmpleado' => $arrayHijoEmpleado['FechaNacimientoHijoEmpleado'],
							  'DiscapacidadHijoEmpleado' => $arrayHijoEmpleado['DiscapacidadHijoEmpleado'],
							  'CentroEducacionHijoEmpleado' => $arrayHijoEmpleado['CentroEducacionHijoEmpleado'],
							  'FechaSistema' => $arrayHijoEmpleado['FechaSistema'],
							  'IdEmpresa' => $arrayHijoEmpleado['IdEmpresa']
							  );
		$this->db->trans_start();
		$this->db->where('IdHijoEmpleado', $IdHijoEmpleado)->where('IdEmpresa', $IdEmpresa);
		$update = $this->db->update('HijoEmpleado',$hijoEmpleado);
		$this->db->trans_complete();		
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function deleteHijoEmpleado($IdHijoEmpleado, $IdEmpresa){
		$this->db->where('IdHijoEmpleado', $IdHijoEmpleado)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('HijoEmpleado');
	}




}





 ?>
