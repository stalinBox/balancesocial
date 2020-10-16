<?php 
/**
* 
*/
class SatisfaccionCliente_Modelo extends CI_Model{
	
	function __construct(){
		
	}
	public function insertSatisfaccionCliente($arraySatisfaccionCliente){
		/*
		$sancion = array('TipoSatisfaccion' => $arraySatisfaccionCliente['TipoSatisfaccion'],
					   	 'Metodo' => $arraySatisfaccionCliente['Metodo'],
					   	 'ResultadoSatisfaccion' => $arraySatisfaccionCliente['ResultadoSatisfaccion'],
					   	 'ObservacionSatisfaccion' => $arraySatisfaccionCliente['ObservacionSatisfaccion'],
					   	 'Frecuencia' => $arraySatisfaccionCliente['Frecuencia'],
					   	 'Fecha' => $arraySatisfaccionCliente['Fecha'],
					   	 'IdEmpresa' => $arraySatisfaccionCliente['IdEmpresa']
					   	 );
		*/
		$this->db->trans_start();
		$insert = $this->db->insert('SatisfaccionCliente',$arraySatisfaccionCliente);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}
	}
	public function getListSatisfaccionCliente($IdEmpresa){
		$resultado = $this->db->where('IdEmpresa',$IdEmpresa)->get('SatisfaccionCliente');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getSatisfaccionCliente($IdSatisfaccionCliente, $IdEmpresa){
		$this->db->where('IdSatisfaccionCliente', $IdSatisfaccionCliente)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('SatisfaccionCliente');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updateSatisfaccionCliente($IdSatisfaccionCliente, $arraySatisfaccionCliente, $IdEmpresa){
		/*
		$sancion = array('TipoSatisfaccion' => $arraySatisfaccionCliente['TipoSatisfaccion'],
					   	 'Metodo' => $arraySatisfaccionCliente['Metodo'],
					   	 'ResultadoSatisfaccion' => $arraySatisfaccionCliente['ResultadoSatisfaccion'],
					   	 'ObservacionSatisfaccion' => $arraySatisfaccionCliente['ObservacionSatisfaccion'],
					   	 'Frecuencia' => $arraySatisfaccionCliente['Frecuencia'],
					   	 'Fecha' => $arraySatisfaccionCliente['Fecha'],
					   	 'IdEmpresa' => $arraySatisfaccionCliente['IdEmpresa']
					   	 );
		*/
		$this->db->trans_start();
		$this->db->where('IdSatisfaccionCliente', $IdSatisfaccionCliente)->where('IdEmpresa', $IdEmpresa);
		$update = $this->db->update('SatisfaccionCliente',$arraySatisfaccionCliente);
		$this->db->trans_complete();		
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function deleteSatisfaccionCliente($IdSatisfaccionCliente, $IdEmpresa){
		$this->db->where('IdSatisfaccionCliente', $IdSatisfaccionCliente)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('SatisfaccionCliente');
	}




}



 ?>