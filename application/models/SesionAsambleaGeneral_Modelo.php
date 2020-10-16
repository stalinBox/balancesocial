<?php 
/**
* 
*/
class SesionAsambleaGeneral_Modelo extends CI_Model{
	
	function __construct(){
		# code...
	}

	public function insertAsambleaGeneral($arrayAsambleaGeneral){
		$sql = "INSERT INTO SesionesAsambleaGeneral(IdSAG, NombreReunion, TipoReunion, FechaPlanificacion, RepresentantesPlanificados, EstadoReunion, FechaEjecucion, RepresentantesPresentes, Foto, Observaciones, Periodo, FechaSistema, IdEmpresa) 
		VALUES (null,'".$arrayAsambleaGeneral['NombreReunion']."', '".$arrayAsambleaGeneral['TipoReunion']."', '".$arrayAsambleaGeneral['FechaPlanificacion']."', '".$arrayAsambleaGeneral['RepresentantesPlanificados']."', '".$arrayAsambleaGeneral['EstadoReunion']."', '".$arrayAsambleaGeneral['FechaEjecucion']."', '".$arrayAsambleaGeneral['RepresentantesPresentes']."', '".$arrayAsambleaGeneral['Foto']."', '".$arrayAsambleaGeneral['Observaciones']."', '".$arrayAsambleaGeneral['Periodo']."', '".$arrayAsambleaGeneral['FechaSistema']."', '".$arrayAsambleaGeneral['IdEmpresa']."');";
		$this->db->trans_start();
		$insert = $this->db->query($sql);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}
	}

	public function getListAsambleaGeneral($IdEmpresa){
		$resultado = $this->db->where('IdEmpresa',$IdEmpresa)->get('SesionesAsambleaGeneral');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}	

	public function getAsambleaGeneral($IdSAG, $IdEmpresa){
		$this->db->where('IdSAG', $IdSAG)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('SesionesAsambleaGeneral');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function getAsambleaGeneralPeriodo($Periodo, $IdEmpresa){
		$this->db->order_by('FechaEjecucion DESC');
		$this->db->limit(1);
		$this->db->where('Periodo', $Periodo)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('SesionesAsambleaGeneral');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}

	public function updateAsambleaGeneral($IdSAG, $arrayAsambleaGeneral, $IdEmpresa){
		if ($arrayAsambleaGeneral['Foto'] == "") {
			$sql ="UPDATE SesionesAsambleaGeneral SET
			NombreReunion = '".$arrayAsambleaGeneral['NombreReunion']."',
			TipoReunion = '".$arrayAsambleaGeneral['TipoReunion']."',
			FechaPlanificacion = '".$arrayAsambleaGeneral['FechaPlanificacion']."',
			RepresentantesPlanificados = '".$arrayAsambleaGeneral['RepresentantesPlanificados']."',
			EstadoReunion = '".$arrayAsambleaGeneral['EstadoReunion']."',
			FechaEjecucion = '".$arrayAsambleaGeneral['FechaEjecucion']."',
			RepresentantesPresentes = '".$arrayAsambleaGeneral['RepresentantesPresentes']."',			
			Observaciones = '".$arrayAsambleaGeneral['Observaciones']."',
			Periodo = '".$arrayAsambleaGeneral['Periodo']."',
			FechaSistema = '".$arrayAsambleaGeneral['FechaSistema']."' WHERE IdSAG = '".$IdSAG."' AND IdEmpresa = '".$IdEmpresa."';";
		}else{
			$sql ="UPDATE SesionesAsambleaGeneral SET
			NombreReunion = '".$arrayAsambleaGeneral['NombreReunion']."',
			TipoReunion = '".$arrayAsambleaGeneral['TipoReunion']."',
			FechaPlanificacion = '".$arrayAsambleaGeneral['FechaPlanificacion']."',
			RepresentantesPlanificados = '".$arrayAsambleaGeneral['RepresentantesPlanificados']."',
			EstadoReunion = '".$arrayAsambleaGeneral['EstadoReunion']."',
			FechaEjecucion = '".$arrayAsambleaGeneral['FechaEjecucion']."',
			RepresentantesPresentes = '".$arrayAsambleaGeneral['RepresentantesPresentes']."',			
			Foto = '".$arrayAsambleaGeneral['Foto']."',
			Observaciones = '".$arrayAsambleaGeneral['Observaciones']."',
			Periodo = '".$arrayAsambleaGeneral['Periodo']."',
			FechaSistema = '".$arrayAsambleaGeneral['FechaSistema']."' WHERE IdSAG = '".$IdSAG."' AND IdEmpresa = '".$IdEmpresa."';";
		}
		$this->db->trans_start();
		$update = $this->db->query($sql);
		$this->db->trans_complete();
		if($update)
			return true;
		else
			return false;
	}

	public function deleteAsambleaGeneral($IdSAG, $IdEmpresa){
		$this->db->where('IdSAG', $IdSAG)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('SesionesAsambleaGeneral');
	}



}

?>