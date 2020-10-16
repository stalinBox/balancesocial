<?php
/* 
*/
class SegmentosDeCredito_Modelo extends CI_Model{
	
	function __construct(){
		
	}
	public function insertSegmentosDeCredito($arraySegmentosDeCredito){
		//Especificar los campos de cada dato del array
		$sancion = array('NombreSegmento' => $arraySegmentosDeCredito['NombreSegmento'],
					   	 'MontoConcedido' => $arraySegmentosDeCredito['MontoConcedido'],
					   	 'Ejecucion' => $arraySegmentosDeCredito['Ejecucion'],
					   	 'EstablecidoPorPOA' => $arraySegmentosDeCredito['EstablecidoPorPOA'],
					   	 'Cumplimiento' => $arraySegmentosDeCredito['Cumplimiento'],
					   	 'FechaMes' => $arraySegmentosDeCredito['FechaMes'],
					   	 'FechaSistema' => $arraySegmentosDeCredito['FechaSistema'],
					   	 'IdEmpresa' => $arraySegmentosDeCredito['IdEmpresa']
					   	 );
		$this->db->trans_start();
		$insert = $this->db->insert('SegmentosDeCredito',$sancion);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}
	}
	public function getListSegmentosDeCredito($IdEmpresa){
		$resultado = $this->db->where('IdEmpresa',$IdEmpresa)->get('SegmentosDeCredito');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getSegmentosDeCredito($IdSegmentosCredito, $IdEmpresa){
		$this->db->where('IdSegmentosCredito', $IdSegmentosCredito)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('SegmentosDeCredito');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updateSegmentosDeCredito($IdSegmentosCredito, $arraySegmentosDeCredito, $IdEmpresa){
		//Especificar los campos de cada dato del array
		$segmento = array('NombreSegmento' => $arraySegmentosDeCredito['NombreSegmento'],
					   	 'MontoConcedido' => $arraySegmentosDeCredito['MontoConcedido'],
					   	 'Ejecucion' => $arraySegmentosDeCredito['Ejecucion'],
					   	 'EstablecidoPorPOA' => $arraySegmentosDeCredito['EstablecidoPorPOA'],
					   	 'Cumplimiento' => $arraySegmentosDeCredito['Cumplimiento'],
					   	 'FechaMes' => $arraySegmentosDeCredito['FechaMes'],
					   	 'FechaSistema' => $arraySegmentosDeCredito['FechaSistema'],
					   	 'IdEmpresa' => $arraySegmentosDeCredito['IdEmpresa']
					   	 );
		$this->db->trans_start();
		$this->db->where('IdSegmentosCredito', $IdSegmentosCredito)->where('IdEmpresa' ,$IdEmpresa);
		$update = $this->db->update('SegmentosDeCredito',$segmento);
		$this->db->trans_complete();		
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function deleteSegmentosDeCredito($IdSegmentosCredito, $IdEmpresa){
		$this->db->where('IdSegmentosCredito', $IdSegmentosCredito)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('SegmentosDeCredito');
	}

}



 ?>