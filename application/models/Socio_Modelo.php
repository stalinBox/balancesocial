<?php 

/**
* 
*/
class Socio_Modelo extends CI_Model{
	
	function __construct(){
		# code...
	}

	public function insertSocio($arraySocio){
		//Especificar los campos de cada dato del array
		/*
		$socio = array(
			'NumSociosIncorporados' => $arraySocio['NumSociosIncorporados'],
			'NumSociosRetirados' => $arraySocio['NumSociosRetirados'],
			'NumSociosActivos' => $arraySocio['NumSociosActivos'],		  
			'NumSociosMujeresActivas' => $arraySocio['NumSociosMujeresActivas'],
			'NumSociosConCuentasDeAhorro' => $arraySocio['NumSociosConCuentasDeAhorro'],
			'NumPersonasNaturalesIncorporadas' => $arraySocio['NumPersonasNaturalesIncorporadas'],
			'NumPersonasJuridicasIncorporadas' => $arraySocio['NumPersonasJuridicasIncorporadas'],
			'NumSociosConCuentaAhorroMenorA18Anios' => $arraySocio['NumSociosConCuentaAhorroMenorA18Anios'],
			'CantSociosConCertAportacion' => $arraySocio['CantSociosConCertAportacion'],
			'CantSociosSinCertAportacion' => $arraySocio['CantSociosSinCertAportacion'],
			'ValorTCertificadoAportacion' => $arraySocio['ValorTCertificadoAportacion'],
			'ValorCertificadoAportacionDevueltos' => $arraySocio['ValorCertificadoAportacionDevueltos'],
			'NumSociosHombresConCertAportacion' => $arraySocio['NumSociosHombresConCertAportacion'],
			'NumSociosMujeresConCertAportacion' => $arraySocio['NumSociosMujeresConCertAportacion'],
			'MesPertenece' => $arraySocio['MesPertenece'],
			'FechaSistema' => $arraySocio['FechaSistema'],
			'IdEmpresa' => $arraySocio['IdEmpresa']
			); */
		$this->db->trans_start();
		$insert = $this->db->insert('Socios',$arraySocio);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}
	}
	public function getListSocio($IdEmpresa){
		$resultado = $this->db->where('IdEmpresa',$IdEmpresa)->get('Socios');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getSocio($IdSocios, $IdEmpresa){
		$this->db->where('IdSocios', $IdSocios)->where('IdEmpresa',$IdEmpresa);
		$resultado = $this->db->get('Socios');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updateSocio($IdSocios, $arraySocio, $IdEmpresa){
		//Especificar los campos de cada dato del array
		/*
		$socio = array(
			'NumSociosIncorporados' => $arraySocio['NumSociosIncorporados'],
			'NumSociosRetirados' => $arraySocio['NumSociosRetirados'],
			'NumSociosActivos' => $arraySocio['NumSociosActivos'],		  
			'NumSociosMujeresActivas' => $arraySocio['NumSociosMujeresActivas'],
			'NumSociosConCuentasDeAhorro' => $arraySocio['NumSociosConCuentasDeAhorro'],
			'NumPersonasNaturalesIncorporadas' => $arraySocio['NumPersonasNaturalesIncorporadas'],
			'NumPersonasJuridicasIncorporadas' => $arraySocio['NumPersonasJuridicasIncorporadas'],
			'NumSociosConCuentaAhorroMenorA18Anios' => $arraySocio['NumSociosConCuentaAhorroMenorA18Anios'],
			'CantSociosConCertAportacion' => $arraySocio['CantSociosConCertAportacion'],
			'CantSociosSinCertAportacion' => $arraySocio['CantSociosSinCertAportacion'],
			'ValorTCertificadoAportacion' => $arraySocio['ValorTCertificadoAportacion'],
			'ValorCertificadoAportacionDevueltos' => $arraySocio['ValorCertificadoAportacionDevueltos'],
			'NumSociosHombresConCertAportacion' => $arraySocio['NumSociosHombresConCertAportacion'],
			'NumSociosMujeresConCertAportacion' => $arraySocio['NumSociosMujeresConCertAportacion'],
			'MesPertenece' => $arraySocio['MesPertenece'],
			'FechaSistema' => $arraySocio['FechaSistema'],
			'IdEmpresa' => $arraySocio['IdEmpresa']
			); */
		$this->db->trans_start();
		$this->db->where('IdSocios', $IdSocios);
		$update = $this->db->update('Socios',$arraySocio);
		$this->db->trans_complete();		
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function deleteSocio($IdSocios, $IdEmpresa){
		$this->db->where('IdSocios', $IdSocios)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('Socios');
	}

	/**
	 * Capacitación de Socios
	 */
	public function insertCapacitacionSocio($arraySocio){
		/*
		$socioCapacitado = array(
			'NombreCapacitacionSocios' => $arraySocio['NombreCapacitacionSocios'],
			'FechaPlanificacion' => $arraySocio['FechaPlanificacion'],
			'TipoCapacitacionSocios' => $arraySocio['TipoCapacitacionSocios'],		  
			'CostoPresupuestado' => $arraySocio['CostoPresupuestado'],
			'HorasPlanificadas' => $arraySocio['HorasPlanificadas'],
			'ParticipantesEsperado' => $arraySocio['ParticipantesEsperado'],
			'IdProveedor' => $arraySocio['IdProveedor'],
			'EstadoCapacitacion' => $arraySocio['EstadoCapacitacion'],
			'FechaEjecucion' => $arraySocio['FechaEjecucion'],
			'NumeroAsistentes' => $arraySocio['NumeroAsistentes'],
			'HorasEjecutadas' => $arraySocio['HorasEjecutadas'],
			'CostoCapacitacion' => $arraySocio['CostoCapacitacion'],
			'CiResponsable' => $arraySocio['CiResponsable'],
			'IdEmpresa' => $arraySocio['IdEmpresa']
			);
		*/
		$this->db->trans_start();
		$insert = $this->db->insert('CapacitacionSocios',$arraySocio);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}
	}
	public function getListCapacitacionSocio($IdEmpresa){
		$resultado = $this->db->where('IdEmpresa',$IdEmpresa)->get('CapacitacionSocios');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getCapacitacionSocio($IdCapacitacionSocios, $IdEmpresa){
		$resultado = $this->db->where('IdCapacitacionSocios', $IdCapacitacionSocios)->where('IdEmpresa',$IdEmpresa);
		$resultado = $this->db->get('CapacitacionSocios');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updateCapacitacionSocio($IdCapacitacionSocios, $arraySocio, $IdEmpresa){
		/*
		$socioCapacitado = array(
			'NombreCapacitacionSocios' => $arraySocio['NombreCapacitacionSocios'],
			'FechaPlanificacion' => $arraySocio['FechaPlanificacion'],
			'TipoCapacitacionSocios' => $arraySocio['TipoCapacitacionSocios'],		  
			'CostoPresupuestado' => $arraySocio['CostoPresupuestado'],
			'HorasPlanificadas' => $arraySocio['HorasPlanificadas'],
			'ParticipantesEsperado' => $arraySocio['ParticipantesEsperado'],
			'IdProveedor' => $arraySocio['IdProveedor'],
			'EstadoCapacitacion' => $arraySocio['EstadoCapacitacion'],
			'FechaEjecucion' => $arraySocio['FechaEjecucion'],
			'NumeroAsistentes' => $arraySocio['NumeroAsistentes'],
			'HorasEjecutadas' => $arraySocio['HorasEjecutadas'],
			'CostoCapacitacion' => $arraySocio['CostoCapacitacion'],
			'CiResponsable' => $arraySocio['CiResponsable'],
			'IdEmpresa' => $arraySocio['IdEmpresa']
			);
		*/
		$this->db->trans_start();
		$this->db->where('IdCapacitacionSocios', $IdCapacitacionSocios)->where('IdEmpresa', $IdEmpresa);
		$update = $this->db->update('CapacitacionSocios',$arraySocio);
		$this->db->trans_complete();
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function deleteCapacitacionSocio($IdCapacitacionSocios, $IdEmpresa){
		$this->db->where('IdCapacitacionSocios', $IdCapacitacionSocios)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('CapacitacionSocios');
	}


}


?>