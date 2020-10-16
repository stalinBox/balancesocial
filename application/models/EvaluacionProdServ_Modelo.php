<?php  
/**
* 
*/
class EvaluacionProdServ_Modelo extends CI_Model{
	
	function __construct()	{
		parent::__construct();				
	}

	public function insertEvaluacionProdServ($arrayEvaluacionProdServ){
		$EvaluacionProdServ = array(
			 'NumEvaProdServProgramado' => $arrayEvaluacionProdServ['NumEvaProdServProgramado'],
			 'FrecuenciaEvaluacion' => $arrayEvaluacionProdServ['FrecuenciaEvaluacion'],
			 'CiResponsable' => $arrayEvaluacionProdServ['CiResponsable'],
			 'Objetivo' => $arrayEvaluacionProdServ['Objetivo'],
			 'NumEvaProdSerEfectuados' => $arrayEvaluacionProdServ['NumEvaProdSerEfectuados'],
			 'NumProductos' => $arrayEvaluacionProdServ['NumProductos'],
			 'NumServicios' => $arrayEvaluacionProdServ['NumServicios'],
			 'NumProductosReclamadosAfectaSalud' => $arrayEvaluacionProdServ['NumProductosReclamadosAfectaSalud'],
			 'NumServiciosReclamados' => $arrayEvaluacionProdServ['NumServiciosReclamados'],
			 'NumProductosEtiquetados' => $arrayEvaluacionProdServ['NumProductosEtiquetados'],
			 'NumProductosRetirados' => $arrayEvaluacionProdServ['NumProductosRetirados'],
			 'NumProdConNormasEtiquetado' => $arrayEvaluacionProdServ['NumProdConNormasEtiquetado'],
			 'FechaMes' => $arrayEvaluacionProdServ['FechaMes'],					 
			 'FechaSistema' => $arrayEvaluacionProdServ['FechaSistema'],
			 'IdEmpresa' => $arrayEvaluacionProdServ['IdEmpresa']							 
			 );
		$this->db->trans_start();
		$insert = $this->db->insert('EvaluacionProductoServicio',$EvaluacionProdServ);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}
	}

	public function getListEvaluacionProdServ($IdEmpresa){
		$resultado = $this->db->where('IdEmpresa',$IdEmpresa)->get('EvaluacionProductoServicio');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}	

	public function getEvaluacionProdServ($IdEPS, $IdEmpresa){
		$this->db->where('IdEPS', $IdEPS)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('EvaluacionProductoServicio');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}

	public function updateEvaluacionProdServ($IdEPS, $arrayEvaluacionProdServ, $IdEmpresa){
		$EvaluacionProdServ = array(
			 'NumEvaProdServProgramado' => $arrayEvaluacionProdServ['NumEvaProdServProgramado'],
			 'FrecuenciaEvaluacion' => $arrayEvaluacionProdServ['FrecuenciaEvaluacion'],
			 'CiResponsable' => $arrayEvaluacionProdServ['CiResponsable'],
			 'Objetivo' => $arrayEvaluacionProdServ['Objetivo'],
			 'NumEvaProdSerEfectuados' => $arrayEvaluacionProdServ['NumEvaProdSerEfectuados'],
			 'NumProductos' => $arrayEvaluacionProdServ['NumProductos'],
			 'NumServicios' => $arrayEvaluacionProdServ['NumServicios'],
			 'NumProductosReclamadosAfectaSalud' => $arrayEvaluacionProdServ['NumProductosReclamadosAfectaSalud'],
			 'NumServiciosReclamados' => $arrayEvaluacionProdServ['NumServiciosReclamados'],
			 'NumProductosEtiquetados' => $arrayEvaluacionProdServ['NumProductosEtiquetados'],
			 'NumProductosRetirados' => $arrayEvaluacionProdServ['NumProductosRetirados'],
			 'NumProdConNormasEtiquetado' => $arrayEvaluacionProdServ['NumProdConNormasEtiquetado'],
			 'FechaMes' => $arrayEvaluacionProdServ['FechaMes'],					 
			 'FechaSistema' => $arrayEvaluacionProdServ['FechaSistema'],
			 'IdEmpresa' => $arrayEvaluacionProdServ['IdEmpresa']						 
						 );		
		$this->db->trans_start();
		$this->db->where('IdEPS', $IdEPS)->where('IdEmpresa', $IdEmpresa);
		$update = $this->db->update('EvaluacionProductoServicio', $EvaluacionProdServ);
		$this->db->trans_complete();
		if($update)
			return true;
		else
			return false;
	}

	public function deleteEvaluacionProdServ($IdEPS, $IdEmpresa){
		$this->db->where('IdEPS', $IdEPS)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('EvaluacionProductoServicio');
	}



}

?>