<?php 
/**
* 
*/
class BalanceSocial_Modelo extends CI_Model{
	
	function __construct(){
		# code...
	}

	public function getListBalanceSocial($IdEmpresa){
		$this->db->select("IdDatosTotales, Periodo, FechaSistema");
		$this->db->order_by("FechaSistema", "DESC");
		$resultado = $this->db->where('IdEmpresa', $IdEmpresa)->get('DatosTotales');		
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function consultaExiteResultadoGenerado($anio, $IdEmpresa){
		$this->db->trans_start();
		$sql = "SELECT DT.IdDatosTotales, DT.FechaSistema FROM DatosTotales DT, IndicadorCalificado IC WHERE Periodo = ".$anio." AND DT.IdDatosTotales = IC.IdDatosTotales AND IC.IdEmpresa = ".$IdEmpresa." ORDER BY DT.FechaSistema DESC LIMIT 1;";
		$resultado = $this->db->query($sql);
		$this->db->trans_complete();
		if($resultado->num_rows() > 0)
			return true;
		else
			return false;
	}
	public function deleteBalanceSocial($IdDatosTotales, $IdEmpresa){
		$this->db->where('IdDatosTotales', $IdDatosTotales)->where('IdEmpresa', $IdEmpresa);
		$this->db->delete('IndicadorCalificado');	
			
		$this->db->where('IdDatosTotales', $IdDatosTotales)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('DatosTotales');
	}
	public function getListIndicadorCuantitativoCalificadoAnio($IdDatosTotales, $IdEmpresa){
		$this->db->order_by("ICIndicador", "ASC");
		$this->db->where('IdDatosTotales', $IdDatosTotales)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('IndicadorCalificado');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	/**
	 * Balance General
	 */
	public function insertBalanceGeneralMaestro($arrayBalanceMaestro){
		$this->db->trans_start();
		$insert = $this->db->insert('BalanceMaestro',$arrayBalanceMaestro);
		$id = $this->db->insert_id();
		$this->db->trans_complete();
		if($insert != 0){
			return $id;
		}else{
			return false;
		}
	}
	public function getListBalanceGeneral($IdEmpresa){		
		$this->db->order_by("FechaRegistro", "DESC");
		$resultado = $this->db->where('IdEmpresa', $IdEmpresa)->get('BalanceMaestro');		
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function deleteBalanceGeneral($IdBalanceMaestro, $IdEmpresa){
		$this->db->where('IdBalanceMaestro', $IdBalanceMaestro);
		$this->db->delete('BalanceDetalle');		
		$this->db->where('IdBalanceMaestro', $IdBalanceMaestro)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('BalanceMaestro');
	}

}
?>