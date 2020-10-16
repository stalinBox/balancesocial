<?php 
/**
* 
*/
class SaludLaboralEmpleado_Modelo extends CI_Model{
	
	function __construct(){
		# code...
	}

	public function insertSaludLaboralEmpleado($arraySeguroLaboral){
		//Especificar los campos de cada dato del array
		/*
		$seguroLaboral = array('NombreSaludLaboral' => $arraySeguroLaboral['NombreSaludLaboral'],
					   		   'TipoSaludLaboral' => $arraySeguroLaboral['TipoSaludLaboral'],
					   		   'FechaPlanificacion' => $arraySeguroLaboral['FechaPlanificacion'],
					   		   'HorasPlanificadas' => $arraySeguroLaboral['HorasPlanificadas'],
					   	   	   'ParticipantesEsperados' => $arraySeguroLaboral['ParticipantesEsperados'],
					   		   'CostoPlanificado' => $arraySeguroLaboral['CostoPlanificado'],
					   		   'CiResponsable' => $arraySeguroLaboral['CiResponsable'],
					   		   'IdProveedor' => $arraySeguroLaboral['IdProveedor'],
					   		   'EstadoSaludLaboral' => $arraySeguroLaboral['EstadoSaludLaboral'],
					   		   'CostoAportaOrganizacion' => $arraySeguroLaboral['CostoAportaOrganizacion'],
					   		   'Participantes' => $arraySeguroLaboral['Participantes'],
					   		   'HorasEjecutadas' => $arraySeguroLaboral['HorasEjecutadas'],
					   		   'FechaInicioEjecucion' => $arraySeguroLaboral['FechaInicioEjecucion'],
					   		   'FechaFinEjecucion' => $arraySeguroLaboral['FechaFinEjecucion'],
					   		   'Observacion' => $arraySeguroLaboral['Observacion'],
					   		   'Imagen' => $arraySeguroLaboral['Imagen'],
					   		   'IdEmpresa' => $arraySeguroLaboral['IdEmpresa']
					   		   );
		*/
		$sql = "INSERT INTO SaludLaboralEmpleado(IdSaludLaboral, NombreSaludLaboral, TipoSaludLaboral, FechaPlanificacion, HorasPlanificadas, ParticipantesEsperados, CostoPlanificado, CiResponsable, IdProveedor, EstadoSaludLaboral, CostoAportaOrganizacion, Participantes, HorasEjecutadas, FechaInicioEjecucion, FechaFinEjecucion, Observacion, Imagen, Periodo, IdEmpresa) VALUES (null,'". $arraySeguroLaboral['NombreSaludLaboral']."','". $arraySeguroLaboral['TipoSaludLaboral']."','". $arraySeguroLaboral['FechaPlanificacion']."','". $arraySeguroLaboral['HorasPlanificadas']."','". $arraySeguroLaboral['ParticipantesEsperados']."','". $arraySeguroLaboral['CostoPlanificado']."','". $arraySeguroLaboral['CiResponsable']."','". $arraySeguroLaboral['IdProveedor']."','". $arraySeguroLaboral['EstadoSaludLaboral']."','". $arraySeguroLaboral['CostoAportaOrganizacion']."','". $arraySeguroLaboral['Participantes']."','". $arraySeguroLaboral['HorasEjecutadas']."','". $arraySeguroLaboral['FechaInicioEjecucion']."','". $arraySeguroLaboral['FechaFinEjecucion']."','". $arraySeguroLaboral['Observacion']."','". $arraySeguroLaboral['Imagen']."', '". $arraySeguroLaboral['Periodo']."', '". $arraySeguroLaboral['IdEmpresa']."');";

		$this->db->trans_start();
		$insert = $this->db->query($sql);
		//$insert = $this->db->insert('SaludLaboralEmpleado',$seguroLaboral);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}		
	}
	public function getListSaludLaboralEmpleado($IdEmpresa){
		$resultado = $this->db->where('IdEmpresa',$IdEmpresa)->get('SaludLaboralEmpleado');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getSaludLaboralEmpleado($IdSaludLaboral, $IdEmpresa){
		$this->db->where('IdSaludLaboral', $IdSaludLaboral)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('SaludLaboralEmpleado');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updateSaludLaboralEmpleado($IdSaludLaboral, $arraySeguroLaboral, $IdEmpresa){
		//Especificar los campos de cada dato del array
		/*
		$seguroLaboral = array('NombreSaludLaboral' => $arraySeguroLaboral['NombreSaludLaboral'],
					   		   'TipoSaludLaboral' => $arraySeguroLaboral['TipoSaludLaboral'],
					   		   'FechaPlanificacion' => $arraySeguroLaboral['FechaPlanificacion'],
					   		   'HorasPlanificadas' => $arraySeguroLaboral['HorasPlanificadas'],
					   	   	   'ParticipantesEsperados' => $arraySeguroLaboral['ParticipantesEsperados'],
					   		   'CostoPlanificado' => $arraySeguroLaboral['CostoPlanificado'],
					   		   'CiResponsable' => $arraySeguroLaboral['CiResponsable'],
					   		   'IdProveedor' => $arraySeguroLaboral['IdProveedor'],
					   		   'EstadoSaludLaboral' => $arraySeguroLaboral['EstadoSaludLaboral'],
					   		   'CostoAportaOrganizacion' => $arraySeguroLaboral['CostoAportaOrganizacion'],
					   		   'Participantes' => $arraySeguroLaboral['Participantes'],
					   		   'HorasEjecutadas' => $arraySeguroLaboral['HorasEjecutadas'],
					   		   'FechaInicioEjecucion' => $arraySeguroLaboral['FechaInicioEjecucion'],
					   		   'FechaFinEjecucion' => $arraySeguroLaboral['FechaFinEjecucion'],
					   		   'Observacion' => $arraySeguroLaboral['Observacion'],
					   		   'Imagen' => $arraySeguroLaboral['Imagen'],
					   		   'IdEmpresa' => $arraySeguroLaboral['IdEmpresa']
					   		   );
		*/
		if ($arraySeguroLaboral['Imagen'] == "") {
			$sql = "UPDATE SaludLaboralEmpleado SET NombreSaludLaboral = '".$arraySeguroLaboral['NombreSaludLaboral']."',TipoSaludLaboral = '".$arraySeguroLaboral['TipoSaludLaboral']."',FechaPlanificacion = '".$arraySeguroLaboral['FechaPlanificacion']."',HorasPlanificadas = '".$arraySeguroLaboral['HorasPlanificadas']."',ParticipantesEsperados = '".$arraySeguroLaboral['ParticipantesEsperados']."',CostoPlanificado = '".$arraySeguroLaboral['CostoPlanificado']."',CiResponsable = '".$arraySeguroLaboral['CiResponsable']."',IdProveedor = '".$arraySeguroLaboral['IdProveedor']."',EstadoSaludLaboral = '".$arraySeguroLaboral['EstadoSaludLaboral']."',CostoAportaOrganizacion = '".$arraySeguroLaboral['CostoAportaOrganizacion']."',Participantes = '".$arraySeguroLaboral['Participantes']."',HorasEjecutadas = '".$arraySeguroLaboral['HorasEjecutadas']."',FechaInicioEjecucion = '".$arraySeguroLaboral['FechaInicioEjecucion']."',FechaFinEjecucion = '".$arraySeguroLaboral['FechaFinEjecucion']."',Observacion = '".$arraySeguroLaboral['Observacion']."', Periodo = '".$arraySeguroLaboral['Periodo']."' WHERE IdSaludLaboral = '".$IdSaludLaboral."' AND IdEmpresa = '".$IdEmpresa."';";
		}else{
			$sql = "UPDATE SaludLaboralEmpleado SET NombreSaludLaboral = '".$arraySeguroLaboral['NombreSaludLaboral']."',TipoSaludLaboral = '".$arraySeguroLaboral['TipoSaludLaboral']."',FechaPlanificacion = '".$arraySeguroLaboral['FechaPlanificacion']."',HorasPlanificadas = '".$arraySeguroLaboral['HorasPlanificadas']."',ParticipantesEsperados = '".$arraySeguroLaboral['ParticipantesEsperados']."',CostoPlanificado = '".$arraySeguroLaboral['CostoPlanificado']."',CiResponsable = '".$arraySeguroLaboral['CiResponsable']."',IdProveedor = '".$arraySeguroLaboral['IdProveedor']."',EstadoSaludLaboral = '".$arraySeguroLaboral['EstadoSaludLaboral']."',CostoAportaOrganizacion = '".$arraySeguroLaboral['CostoAportaOrganizacion']."',Participantes = '".$arraySeguroLaboral['Participantes']."',HorasEjecutadas = '".$arraySeguroLaboral['HorasEjecutadas']."',FechaInicioEjecucion = '".$arraySeguroLaboral['FechaInicioEjecucion']."',FechaFinEjecucion = '".$arraySeguroLaboral['FechaFinEjecucion']."',Observacion = '".$arraySeguroLaboral['Observacion']."',Imagen = '".$arraySeguroLaboral['Imagen']."', Periodo = '".$arraySeguroLaboral['Periodo']."' WHERE IdSaludLaboral = '".$IdSaludLaboral."' AND IdEmpresa = '".$IdEmpresa."';";
		}
		

		$this->db->trans_start();
		//$this->db->where('IdSaludLaboral', $IdSaludLaboral);
		//$update = $this->db->update('SaludLaboralEmpleado',$seguroLaboral);
		$update = $this->db->query($sql);
		$this->db->trans_complete();		
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function deleteSaludLaboralEmpleado($IdSaludLaboral, $IdEmpresa){
		$this->db->where('IdSaludLaboral', $IdSaludLaboral)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('SaludLaboralEmpleado');
	}



}





 ?>