<?php 
/**
* 
*/
class EquipoProteccion_Modelo extends CI_Model{
	
	function __construct(){
		# code...
	}


	public function insertEquipoProteccion($arrayEquipoProteccion){
		//Especificar los campos de cada dato del array
		$equipoProteccion = array('EPRucProveedor' => $arrayEquipoProteccion['EPRucProveedor'],
								  'EPFechaAdquiere' => $arrayEquipoProteccion['EPFechaAdquiere'],
								  'EPTipoEquipo' => $arrayEquipoProteccion['EPTipoEquipo'],
								  'EPCosto' => $arrayEquipoProteccion['EPCosto'],
								  'EPFechaEntrega' => $arrayEquipoProteccion['EPFechaEntrega'],
								  'EPResponsableDeEntrega' => $arrayEquipoProteccion['EPResponsableDeEntrega'],
								  'EPCantidadEmpleados' => $arrayEquipoProteccion['EPCantidadEmpleados'],
								  'EPResponsableInspeccion' => $arrayEquipoProteccion['EPResponsableInspeccion'],
								  'EPFechaInspeccionUtilizando' => $arrayEquipoProteccion['EPFechaInspeccionUtilizando'],
								  'Empresa_idEmpresa' => $arrayEquipoProteccion['Empresa_idEmpresa']
								  );
		$this->db->trans_start();
		$insert = $this->db->insert('EquipoProteccion',$equipoProteccion);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}		
	}
	public function getListEquipoProteccion(){
		$resultado = $this->db->get('EquipoProteccion');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getEquipoProteccion($idEquipoProteccion){
		$this->where('idEquipoProteccion', $idEquipoProteccion);
		$resultado = $this->db->get('EquipoProteccion');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updateEquipoProteccion($idEquipoProteccion, $arrayEquipoProteccion){
		//Especificar los campos de cada dato del array
		$equipoProteccion = array('EPRucProveedor' => $arrayEquipoProteccion['EPRucProveedor'],
								  'EPFechaAdquiere' => $arrayEquipoProteccion['EPFechaAdquiere'],
								  'EPTipoEquipo' => $arrayEquipoProteccion['EPTipoEquipo'],
								  'EPCosto' => $arrayEquipoProteccion['EPCosto'],
								  'EPFechaEntrega' => $arrayEquipoProteccion['EPFechaEntrega'],
								  'EPResponsableDeEntrega' => $arrayEquipoProteccion['EPResponsableDeEntrega'],
								  'EPCantidadEmpleados' => $arrayEquipoProteccion['EPCantidadEmpleados'],
								  'EPResponsableInspeccion' => $arrayEquipoProteccion['EPResponsableInspeccion'],
								  'EPFechaInspeccionUtilizando' => $arrayEquipoProteccion['EPFechaInspeccionUtilizando'],
								  'Empresa_idEmpresa' => $arrayEquipoProteccion['Empresa_idEmpresa']
								  );
		$this->db->trans_start();
		$this->db->where('idEquipoProteccion', $idEquipoProteccion);
		$update = $this->db->update('EquipoProteccion',$equipoProteccion);
		$this->db->trans_complete();		
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function deleteEquipoProteccion($idEquipoProteccion){
		$this->db->where('idEquipoProteccion', $idEquipoProteccion);
		return $this->db->delete('EquipoProteccion');
	}






}



 ?>