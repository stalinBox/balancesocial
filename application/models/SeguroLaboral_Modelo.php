<?php 
/**
* 
*/
class SeguroLaboral_Modelo extends CI_Model{
	
	function __construct(){
		# code...
	}

	public function insertSeguroLaboral($arraySeguroLaboral){
		/*
		$seguroLaboral = array('ProveedorSeguroL' => $arraySeguroLaboral['ProveedorSeguroL'],
					   		   'TipoSeguroL' => $arraySeguroLaboral['TipoSeguroL'],
					   		   'MontoCubreSeguroL' => $arraySeguroLaboral['MontoCubreSeguroL'],
					   		   'FechaAdquiereSeguroL' => $arraySeguroLaboral['FechaAdquiereSeguroL'],
					   	   	   'VigenciaAniosSeguroL' => $arraySeguroLaboral['VigenciaAniosSeguroL'],
					   		   'ValorRealSiniestro' => $arraySeguroLaboral['ValorRealSiniestro'],
					   		   'SiniestroOcurrido' => $arraySeguroLaboral['SiniestroOcurrido'],
					   		   'Observacion' => $arraySeguroLaboral['Observacion'],
					   		   'IdEmpresa' => $arraySeguroLaboral['IdEmpresa']
					   		   );
		*/
		$this->db->trans_start();
		$insert = $this->db->insert('SeguroLaboral',$arraySeguroLaboral);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}		
	}
	public function getListSeguroLaboral($IdEmpresa){
		$resultado = $this->db->where('IdEmpresa',$IdEmpresa)->get('SeguroLaboral');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getSeguroLaboral($IdSeguroLaboral, $IdEmpresa){
		$this->db->where('IdSeguroLaboral', $IdSeguroLaboral)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('SeguroLaboral');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updateSeguroLaboral($IdSeguroLaboral, $arraySeguroLaboral, $IdEmpresa){
		/*
		$seguroLaboral = array('ProveedorSeguroL' => $arraySeguroLaboral['ProveedorSeguroL'],
					   		   'TipoSeguroL' => $arraySeguroLaboral['TipoSeguroL'],
					   		   'MontoCubreSeguroL' => $arraySeguroLaboral['MontoCubreSeguroL'],
					   		   'FechaAdquiereSeguroL' => $arraySeguroLaboral['FechaAdquiereSeguroL'],
					   	   	   'VigenciaAniosSeguroL' => $arraySeguroLaboral['VigenciaAniosSeguroL'],
					   		   'ValorRealSiniestro' => $arraySeguroLaboral['ValorRealSiniestro'],
					   		   'SiniestroOcurrido' => $arraySeguroLaboral['SiniestroOcurrido'],
					   		   'Observacion' => $arraySeguroLaboral['Observacion'],
					   		   'IdEmpresa' => $arraySeguroLaboral['IdEmpresa']
					   		   );
		*/
		$this->db->trans_start();
		$this->db->where('IdSeguroLaboral', $IdSeguroLaboral)->where('IdEmpresa', $IdEmpresa);
		$update = $this->db->update('SeguroLaboral',$arraySeguroLaboral);
		$this->db->trans_complete();		
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function deleteSeguroLaboral($IdSeguroLaboral, $IdEmpresa){
		$this->db->where('IdSeguroLaboral', $IdSeguroLaboral)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('SeguroLaboral');
	}



}





 ?>