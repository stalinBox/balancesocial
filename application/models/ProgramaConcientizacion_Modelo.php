<?php 
/**
* 
*/
class ProgramaConcientizacion_Modelo extends CI_Model{
	
	function __construct(){
		# code...
	}


	// MODELO PARA MIGRAR
	public function getListProgConcientizacionAnio($IdEmpresa){
		$this->db->select('*');
		$this->db->where('IdEmpresa',$IdEmpresa);
		$resultado = $this->db->get('programasconcientizacion');
		if($resultado->num_rows() > 0)
			return $resultado;
		else
			return false;
	}

	public function insertProgConcientizacionSelectedMigrar($IdEmpresa, $periodo, $lista){
		$query = "INSERT INTO `programasconcientizacion`(`NombrePrograma`, `TipoPrograma`, `FechaPlanificacion`, `CostoPlanificado`, `ResponsablePrograma`, `EstadoPrograma`, `ConvenioPrograma`, `FechaInicioPrograma`, `FechaFinPrograma`, `CostoPrograma`, `Observacion`, `Periodo`, `FechaSistema`, `IdEmpresa`) SELECT `NombrePrograma`, `TipoPrograma`, `FechaPlanificacion`, `CostoPlanificado`, `ResponsablePrograma`, `EstadoPrograma`, `ConvenioPrograma`, `FechaInicioPrograma`, `FechaFinPrograma`, `CostoPrograma`, `Observacion`, ".$periodo.", NOW(), ".$IdEmpresa." FROM `programasconcientizacion` WHERE `IdProgramasConcientizacion` IN (". $lista.")";

		$insert = $this->db->query($query); 
		
		if($insert){
			return true;
		}else{
			return false;
		}	
	}

	public function getListAniosProgConcientizacion($IdEmpresa){
		$this->db->distinct('Periodo');
		$this->db->select('Periodo');
		$this->db->where('IdEmpresa',$IdEmpresa);
		$resultado = $this->db->get('programasconcientizacion');

		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	// FIN MODELO PARA MIGRAR

	public function insertConcientizacion($arrayConcientizacion){
		/*
		$Concientizacion = array('NombrePrograma' => $arrayConcientizacion['NombrePrograma'],
				 	   			 'TipoPrograma' => $arrayConcientizacion['TipoPrograma'],
				 	   			 'CostoPlanificado' => $arrayConcientizacion['CostoPlanificado'],
				 	   			 'ResponsablePrograma' => $arrayConcientizacion['ResponsablePrograma'],
				 	   			 'EstadoPrograma' => $arrayConcientizacion['EstadoPrograma'],
				 	   			 'ConvenioPrograma' => $arrayConcientizacion['ConvenioPrograma'],
				 	   			 'FechaInicioPrograma' => $arrayConcientizacion['FechaInicioPrograma'],
				 	   			 'FechaFinPrograma' => $arrayConcientizacion['FechaFinPrograma'],
				 	   			 'CostoPrograma' => $arrayConcientizacion['CostoPrograma'],						 	   			 
				 	   			 'Observacion' => $arrayConcientizacion['Observacion'],						 	   			 
				 	   			 'IdEmpresa' => $arrayConcientizacion['IdEmpresa']				 	   			 
				 	   			 );
		*/
		$this->db->trans_start();
		$insert = $this->db->insert('ProgramasConcientizacion',$arrayConcientizacion);
		$this->db->trans_complete();		if($insert){
			return true;
		}else{
			return false;
		}
	}

	public function getListConcientizacion($IdEmpresa){
		$resultado = $this->db->where('IdEmpresa',$IdEmpresa)->get('ProgramasConcientizacion');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}

	public function getConcientizacion($IdProgramasConcientizacion, $IdEmpresa){
		$this->db->where('IdProgramasConcientizacion', $IdProgramasConcientizacion)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('ProgramasConcientizacion');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function updateConcientizacion($IdProgramasConcientizacion, $arrayConcientizacion, $IdEmpresa){
		/*
		$Concientizacion = array('NombrePrograma' => $arrayConcientizacion['NombrePrograma'],
				 	   			 'TipoPrograma' => $arrayConcientizacion['TipoPrograma'],
				 	   			 'CostoPlanificado' => $arrayConcientizacion['CostoPlanificado'],
				 	   			 'ResponsablePrograma' => $arrayConcientizacion['ResponsablePrograma'],
				 	   			 'EstadoPrograma' => $arrayConcientizacion['EstadoPrograma'],
				 	   			 'ConvenioPrograma' => $arrayConcientizacion['ConvenioPrograma'],
				 	   			 'FechaInicioPrograma' => $arrayConcientizacion['FechaInicioPrograma'],
				 	   			 'FechaFinPrograma' => $arrayConcientizacion['FechaFinPrograma'],
				 	   			 'CostoPrograma' => $arrayConcientizacion['CostoPrograma'],						 	   			 
				 	   			 'Observacion' => $arrayConcientizacion['Observacion'],						 	   			 
				 	   			 'IdEmpresa' => $arrayConcientizacion['IdEmpresa']
						 	   	 );
		*/
		$this->db->trans_start();
		$this->db->where('IdProgramasConcientizacion', $IdProgramasConcientizacion)->where('IdEmpresa', $IdEmpresa);
		$update = $this->db->update('ProgramasConcientizacion',$arrayConcientizacion);
		$this->db->trans_complete();		
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function deleteConcientizacion($IdProgramasConcientizacion, $IdEmpresa){
		$this->db->where('IdProgramasConcientizacion', $IdProgramasConcientizacion)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('ProgramasConcientizacion');
	}



}


 ?>