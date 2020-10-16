<?php  
/**
* 
*/
class Acuerdo_Modelo extends CI_Model{
	
	function __construct()
	{
		# code...
	}

	public function insertAcuerdo($arrayAcuerdo, $IdEmpresa){
		$sql = "INSERT INTO Acuerdos(IdAcuerdos, OrganizacionConvenio, TipoOrganizacion, NombreAcuerdo, FechaPlanificacion, CostoPlanificado, Estado, FechaEjecucion, FechaFinalizacion, CostoEjecutado, Beneficiarios, Fotografia, CIResponsable, Periodo, FechaSistema, IdEmpresa) VALUES (null,'".$arrayAcuerdo['OrganizacionConvenio']."','".$arrayAcuerdo['TipoOrganizacion']."','".$arrayAcuerdo['NombreAcuerdo']."','".$arrayAcuerdo['FechaPlanificacion']."','".$arrayAcuerdo['CostoPlanificado']."','".$arrayAcuerdo['Estado']."','".$arrayAcuerdo['FechaEjecucion']."','".$arrayAcuerdo['FechaFinalizacion']."','".$arrayAcuerdo['CostoEjecutado']."','".$arrayAcuerdo['Beneficiarios']."', '".$arrayAcuerdo['Fotografia']."', '".$arrayAcuerdo['CIResponsable']."',	'".$arrayAcuerdo['Periodo']."', '".$arrayAcuerdo['FechaSistema']."', '".$arrayAcuerdo['IdEmpresa']."');";
		$this->db->trans_start();
		$insert = $this->db->query($sql);
		//$insert = $this->db->insert('Acuerdos',$acuerdo);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}
	}


// MY CODE

	public function insertAcuerdoSelectedMigrar($IdEmpresa, $periodo, $lista){
		$query = "INSERT INTO `acuerdos`(
				    `OrganizacionConvenio`,
				    `TipoOrganizacion`,
				    `NombreAcuerdo`,
				    `FechaPlanificacion`,
				    `CostoPlanificado`,
				    `Estado`,
				    `FechaEjecucion`,
				    `FechaFinalizacion`,
				    `CostoEjecutado`,
				    `Beneficiarios`,
				    `Fotografia`,
				    `CIResponsable`,
				    `Periodo`,
				    `FechaSistema`,
				    `IdEmpresa`
				)
				SELECT
				    `OrganizacionConvenio`,
				    `TipoOrganizacion`,
				    `NombreAcuerdo`,
				    `FechaPlanificacion`,
				    `CostoPlanificado`,
				    `Estado`,
				    `FechaEjecucion`,
				    `FechaFinalizacion`,
				    `CostoEjecutado`,
				    `Beneficiarios`,
				    `Fotografia`,
				    `CIResponsable`,
				    ".$periodo.",
				    `FechaSistema`,
				    ".$IdEmpresa."
				FROM
				    `acuerdos`
				WHERE
				    `IdAcuerdos` IN(".$lista.")";

		$insert = $this->db->query($query); 
		
		if($insert){
			return true;
		}else{
			return false;
		}	
	}

	public function getListAcuerdo($IdEmpresa){
		$resultado = $this->db->where('IdEmpresa',$IdEmpresa)->get('Acuerdos');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}

	public function getListAniosAcuerdo($IdEmpresa){
		$this->db->distinct('Periodo');
		$this->db->select('Periodo');
		$this->db->where('IdEmpresa',$IdEmpresa);
		$resultado = $this->db->get('Acuerdos');

		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}

	public function getListAcuerdoAnio($IdEmpresa){
		$this->db->select('*');
		$this->db->where('IdEmpresa',$IdEmpresa);
		$resultado = $this->db->get('Acuerdos');
		if($resultado->num_rows() > 0)
			return $resultado;
		else
			return false;
	}
//END
	
	public function getAcuerdo($IdAcuerdos, $IdEmpresa){
		$this->db->where('IdAcuerdos', $IdAcuerdos)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('Acuerdos');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}

	public function updateAcuerdo($IdAcuerdos, $arrayAcuerdo, $IdEmpresa){
		/*
		$acuerdo = array('OrganizacionConvenio' => $arrayAcuerdo['OrganizacionConvenio'],
						 'TipoOrganizacion' => $arrayAcuerdo['TipoOrganizacion'],
						 'NombreAcuerdo' => $arrayAcuerdo['NombreAcuerdo'],
						 'FechaPlanificacion' => $arrayAcuerdo['FechaPlanificacion'],
						 'CostoPlanificado' => $arrayAcuerdo['CostoPlanificado'],
						 'Estado' => $arrayAcuerdo['Estado'],
						 'FechaEjecucion' => $arrayAcuerdo['FechaEjecucion'],
						 'FechaFinalizacion' => $arrayAcuerdo['FechaFinalizacion'],
						 'CostoEjecutado' => $arrayAcuerdo['CostoEjecutado'],
						 'Beneficiarios' => $arrayAcuerdo['Beneficiarios'],
						 'Fotografia' => $arrayAcuerdo['Fotografia'],
						 'CIResponsable' => $arrayAcuerdo['CIResponsable'],
						 'IdEmpresa' => $arrayAcuerdo['IdEmpresa']						 
						 );
		*/
		if ($arrayAcuerdo['Fotografia'] == "") {
			$sql ="UPDATE Acuerdos SET OrganizacionConvenio = '".$arrayAcuerdo['OrganizacionConvenio']."',TipoOrganizacion = '".$arrayAcuerdo['TipoOrganizacion']."',NombreAcuerdo = '".$arrayAcuerdo['NombreAcuerdo']."',FechaPlanificacion = '".$arrayAcuerdo['FechaPlanificacion']."',CostoPlanificado = '".$arrayAcuerdo['CostoPlanificado']."',Estado = '".$arrayAcuerdo['Estado']."',FechaEjecucion = '".$arrayAcuerdo['FechaEjecucion']."',FechaFinalizacion = '".$arrayAcuerdo['FechaFinalizacion']."',CostoEjecutado = '".$arrayAcuerdo['CostoEjecutado']."',Beneficiarios = '".$arrayAcuerdo['Beneficiarios']."', CIResponsable = '".$arrayAcuerdo['CIResponsable']."', Periodo = '".$arrayAcuerdo['Periodo']."', FechaSistema = '".$arrayAcuerdo['FechaSistema']."' WHERE IdAcuerdos = '".$IdAcuerdos."' AND IdEmpresa = '".$IdEmpresa."';";
		}else{
			$sql ="UPDATE Acuerdos SET OrganizacionConvenio = '".$arrayAcuerdo['OrganizacionConvenio']."',TipoOrganizacion = '".$arrayAcuerdo['TipoOrganizacion']."',NombreAcuerdo = '".$arrayAcuerdo['NombreAcuerdo']."',FechaPlanificacion = '".$arrayAcuerdo['FechaPlanificacion']."',CostoPlanificado = '".$arrayAcuerdo['CostoPlanificado']."',Estado = '".$arrayAcuerdo['Estado']."',FechaEjecucion = '".$arrayAcuerdo['FechaEjecucion']."',FechaFinalizacion = '".$arrayAcuerdo['FechaFinalizacion']."'
			,CostoEjecutado = '".$arrayAcuerdo['CostoEjecutado']."',Beneficiarios = '".$arrayAcuerdo['Beneficiarios']."',Fotografia = '".$arrayAcuerdo['Fotografia']."',CIResponsable = '".$arrayAcuerdo['CIResponsable']."', Periodo = '".$arrayAcuerdo['Periodo']."', FechaSistema = '".$arrayAcuerdo['FechaSistema']."' WHERE IdAcuerdos = '".$IdAcuerdos."' AND IdEmpresa = '".$IdEmpresa."';";
		}
		$this->db->trans_start();
		//$this->db->where('IdAcuerdos', $IdAcuerdos)->where('IdEmpresa', $IdEmpresa);
		//$update = $this->db->update('Acuerdos', $acuerdo);
		$update = $this->db->query($sql);
		$this->db->trans_complete();
		if($update)
			return true;
		else
			return false;
	}

	public function deleteAcuerdo($IdAcuerdos, $IdEmpresa){
		$this->db->where('IdAcuerdos', $IdAcuerdos)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('Acuerdos');
	}



}

?>