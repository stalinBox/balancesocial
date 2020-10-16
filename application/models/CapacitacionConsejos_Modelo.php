<?php 
/**
* 
*/
class CapacitacionConsejos_Modelo extends CI_Model{
	
	function __construct(){
		
	}

	public function insertCapacitacionConsejos($arrayCapacitacionConsejos){
		/*
		$CapacitacionConsejos = array('IdConsejo' => $arrayCapacitacionConsejos['IdConsejo'],
						 'NombreCapacitacion' => $arrayCapacitacionConsejos['NombreCapacitacion'],
						 'FechaPlanificada' => $arrayCapacitacionConsejos['FechaPlanificada'],
						 'TipoCapacitacion' => $arrayCapacitacionConsejos['TipoCapacitacion'],
						 'Presupuesto' => $arrayCapacitacionConsejos['Presupuesto'],
						 'HorasPlanificadas' => $arrayCapacitacionConsejos['HorasPlanificadas'],	 
						 'ParticipantesEsperadosPOA' => $arrayCapacitacionConsejos['ParticipantesEsperadosPOA'],			 
						 'EstadoCapacitacion' => $arrayCapacitacionConsejos['EstadoCapacitacion'],	 
						 'IdProveedor' => $arrayCapacitacionConsejos['IdProveedor'],			 
						 'FechaEjecucion' => $arrayCapacitacionConsejos['FechaEjecucion'],			 
						 'ParticipantesCapacitados' => $arrayCapacitacionConsejos['ParticipantesCapacitados'],			 
						 'HorasEjecutadas' => $arrayCapacitacionConsejos['HorasEjecutadas'],		 
						 'Costo' => $arrayCapacitacionConsejos['Costo'],			 
						 'EmpleadoResponsable' => $arrayCapacitacionConsejos['EmpleadoResponsable'], 
						 'IdEmpresa' => $arrayCapacitacionConsejos['IdEmpresa']			 
						 );
		*/
		$this->db->trans_start();
		$insert = $this->db->insert('CapacitacionConsejos',$arrayCapacitacionConsejos);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}
	}

	public function getListCapacitacionConsejos($IdEmpresa){
		$resultado = $this->db->where('IdEmpresa',$IdEmpresa)->get('CapacitacionConsejos');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}

	public function getCapacitacionConsejos($IdCapacitacionCons, $IdEmpresa){
		$this->db->where('IdCapacitacionCons', $IdCapacitacionCons)->where('IdEmpresa',$IdEmpresa);
		$resultado = $this->db->get('CapacitacionConsejos');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}

	public function updateCapacitacionConsejos($IdCapacitacionCons, $arrayCapacitacionConsejos){
		/*
		$CapacitacionConsejos = array('IdConsejo' => $arrayCapacitacionConsejos['IdConsejo'],
						 'NombreCapacitacion' => $arrayCapacitacionConsejos['NombreCapacitacion'],
						 'FechaPlanificada' => $arrayCapacitacionConsejos['FechaPlanificada'],
						 'TipoCapacitacion' => $arrayCapacitacionConsejos['TipoCapacitacion'],
						 'Presupuesto' => $arrayCapacitacionConsejos['Presupuesto'],
						 'HorasPlanificadas' => $arrayCapacitacionConsejos['HorasPlanificadas'],
						 'ParticipantesEsperadosPOA' => $arrayCapacitacionConsejos['ParticipantesEsperadosPOA'],			 
						 'EstadoCapacitacion' => $arrayCapacitacionConsejos['EstadoCapacitacion'],
						 'IdProveedor' => $arrayCapacitacionConsejos['IdProveedor'],			 
						 'FechaEjecucion' => $arrayCapacitacionConsejos['FechaEjecucion'],			 
						 'ParticipantesCapacitados' => $arrayCapacitacionConsejos['ParticipantesCapacitados'],			 
						 'HorasEjecutadas' => $arrayCapacitacionConsejos['HorasEjecutadas'],		 
						 'Costo' => $arrayCapacitacionConsejos['Costo'],			 
						 'EmpleadoResponsable' => $arrayCapacitacionConsejos['EmpleadoResponsable'],
						 'IdEmpresa' => $arrayCapacitacionConsejos['IdEmpresa']					 
						 );
		*/
		$this->db->trans_start();
		$this->db->where('IdCapacitacionCons', $IdCapacitacionCons);
		$update = $this->db->update('CapacitacionConsejos', $arrayCapacitacionConsejos);
		$this->db->trans_complete();
		if($update)
			return true;
		else
			return false;
	}

	public function deleteCapacitacionConsejos($IdCapacitacionCons, $IdEmpresa){
		$this->db->where('IdCapacitacionCons', $IdCapacitacionCons)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('CapacitacionConsejos');
	}

	public function deleteConsejos($IdCapacitacionCons, $IdEmpresa){
		$this->db->where('IdConsejos', $IdCapacitacionCons)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('consejos');
	}
}

?>