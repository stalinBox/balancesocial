<?php  
/**
* 
*/
class BeneficioLaboralEmpleado_Modelo extends CI_Model{
	
	function __construct()
	{
		# code...
	}

	public function insertBeneficioLaboralEmpleado($arrayBeneficioLaboralEmpleado){
		/*
		$BeneficioLaboralEmpleado = array(
						'TipoBeneficioLaboral' => $arrayBeneficioLaboralEmpleado['TipoBeneficioLaboral'],
						 'NumEmpleadosConServicio' => $arrayBeneficioLaboralEmpleado['NumEmpleadosConServicio'],
						 'CostoTotalQueCubreEmpresa' => $arrayBeneficioLaboralEmpleado['CostoTotalQueCubreEmpresa'],
						 'NumDiasOtorgadoElBeneficio' => $arrayBeneficioLaboralEmpleado['NumDiasOtorgadoElBeneficio'],
						 'FechaSistema' => $arrayBeneficioLaboralEmpleado['FechaSistema'],
						 'FechaMes' => $arrayBeneficioLaboralEmpleado['FechaMes'],
						 'Observacion' => $arrayBeneficioLaboralEmpleado['Observacion'],
						 'IdEmpresa' => $arrayBeneficioLaboralEmpleado['IdEmpresa']							 
						 );
		*/
		$this->db->trans_start();
		$insert = $this->db->insert('BeneficioLaboralEmpleado',$arrayBeneficioLaboralEmpleado);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}
	}
	public function getListBeneficioLaboralEmpleado($IdEmpresa){
		$resultado = $this->db->where('IdEmpresa',$IdEmpresa)->get('BeneficioLaboralEmpleado');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}	

	public function getBeneficioLaboralEmpleado($IdBeneficio, $IdEmpresa){
		$this->db->where('IdBeneficio', $IdBeneficio)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('BeneficioLaboralEmpleado');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}

	public function updateBeneficioLaboralEmpleado($IdBeneficio, $arrayBeneficioLaboralEmpleado, $IdEmpresa){
		/*
		$BeneficioLaboralEmpleado = array(
						 'TipoBeneficioLaboral' => $arrayBeneficioLaboralEmpleado['TipoBeneficioLaboral'],
						 'NumEmpleadosConServicio' => $arrayBeneficioLaboralEmpleado['NumEmpleadosConServicio'],
						 'CostoTotalQueCubreEmpresa' => $arrayBeneficioLaboralEmpleado['CostoTotalQueCubreEmpresa'],
						 'NumDiasOtorgadoElBeneficio' => $arrayBeneficioLaboralEmpleado['NumDiasOtorgadoElBeneficio'],
						 'FechaSistema' => $arrayBeneficioLaboralEmpleado['FechaSistema'],
						 'FechaMes' => $arrayBeneficioLaboralEmpleado['FechaMes'],
						 'Observacion' => $arrayBeneficioLaboralEmpleado['Observacion'],
						 'IdEmpresa' => $arrayBeneficioLaboralEmpleado['IdEmpresa']
						 );
		*/
		$this->db->trans_start();
		$this->db->where('IdBeneficio', $IdBeneficio)->where('IdEmpresa', $IdEmpresa);
		$update = $this->db->update('BeneficioLaboralEmpleado', $arrayBeneficioLaboralEmpleado);
		$this->db->trans_complete();
		if($update)
			return true;
		else
			return false;
	}

	public function deleteBeneficioLaboralEmpleado($IdBeneficio, $IdEmpresa){
		$this->db->where('IdBeneficio', $IdBeneficio)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('BeneficioLaboralEmpleado');
	}



}

?>