<?php 
/**
* 
*/
class SesionConsejo_Modelo extends CI_Model{
	
	function __construct(){
		# code...
	}

	public function insertSesionConsejo($arraySesionConsejo){
		$this->db->trans_start();
		$insert = $this->db->insert('SesionesConsejos',$arraySesionConsejo);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}		
	}
	public function getListSesionConsejo($IdEmpresa){
		$resultado = $this->db->where('IdEmpresa',$IdEmpresa)->get('SesionesConsejos');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getListSesionConsejoPeriodo($Periodo, $IdEmpresa){
		$sql = "SELECT C.NombreConsejos, C.FuncionConsejos, COUNT(SC.IdConsejo) AS Sesiones, C.NumeroHombres, C.NumeroMujeres FROM Consejos C , SesionesConsejos SC WHERE C.IdConsejos = SC.IdConsejo AND SC.EstadoReunion = 'Ejecutada' AND C.IdEmpresa = ".$IdEmpresa." AND YEAR(SC.FechaEjecucion) = ".$Periodo." GROUP BY SC.IdConsejo ORDER BY IdConsejo";
		$resultado = $this->db->query($sql);
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getSesionConsejos($IdReuniones, $IdEmpresa){
		$this->db->where('IdReuniones', $IdReuniones)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('SesionesConsejos');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updateSesionConsejo($IdReuniones, $arraySesionConsejo, $IdEmpresa){
		$this->db->trans_start();
		$this->db->where('IdReuniones', $IdReuniones)->where('IdEmpresa', $IdEmpresa);
		$update = $this->db->update('SesionesConsejos',$arraySesionConsejo);
		$this->db->trans_complete();		
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function deleteSesionConsejo($IdReuniones, $IdEmpresa){
		$this->db->where('IdReuniones', $IdReuniones)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('SesionesConsejos');
	}



}





 ?>