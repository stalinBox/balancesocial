<?php 

/**
* 
*/
class DatosGeneralesAnualSeccC_Modelo extends CI_Model{
	
	function __construct(){
		
	}

	public function insertDatosGeneralesAnualSeccC($arrayDGASC){
		/*
		$insertDGASC = array(
							'NumTDemandasAdministrativasAtendidas' => $arrayDGASC['NumTDemandasAdministrativasAtendidas'],
							'NumTDemandasAdministrativas' => $arrayDGASC['NumTDemandasAdministrativas'],
							'NumTProductosServiciosEntregadosAClientes' => $arrayDGASC['NumTProductosServiciosEntregadosAClientes'],
							'NumTDenunciasAspectosNoEticosResueltos' => $arrayDGASC['NumTDenunciasAspectosNoEticosResueltos'],
							'NumTDenunciasAspectosNoEticos' => $arrayDGASC['NumTDenunciasAspectosNoEticos'],
							'NumTCasosDiscriminacion' => $arrayDGASC['NumTCasosDiscriminacion'],
							'NumTCasosDiscriminacionResueltos' => $arrayDGASC['NumTCasosDiscriminacionResueltos'],
							'NumTProcesosConRiesgosDeCorrupcionAnalizados' => $arrayDGASC['NumTProcesosConRiesgosDeCorrupcionAnalizados'],
							'NumTProcesosConRiesgosDeCorrupcionIdentificados' => $arrayDGASC['NumTProcesosConRiesgosDeCorrupcionIdentificados'],
							'NumTMedidasAnteIncidentesDeCorrupcion' => $arrayDGASC['NumTMedidasAnteIncidentesDeCorrupcion'],
							'NumTIncidentesDeCorrupcionOcurridos' => $arrayDGASC['NumTIncidentesDeCorrupcionOcurridos'],
							'NumTDiasDestinadosAEducacionFamiliar' => $arrayDGASC['NumTDiasDestinadosAEducacionFamiliar'],
							'NumTTransacciones' => $arrayDGASC['NumTTransacciones'],
							'NumTProgramasDeReciclaje' => $arrayDGASC['NumTProgramasDeReciclaje'],
							'NumTComprobantesEmitidos' => $arrayDGASC['NumTComprobantesEmitidos'],
							'NumTComprobantesElectronicosEmitidos' => $arrayDGASC['NumTComprobantesElectronicosEmitidos'],
							'NumTBateriasSanitariasPorDepartamentos' => $arrayDGASC['NumTBateriasSanitariasPorDepartamentos'],
							'NumTBeneficiosAdicionalesAEmpleadosConContratoNoIndefinido' => $arrayDGASC['NumTBeneficiosAdicionalesAEmpleadosConContratoNoIndefinido'],
							'NumTBeneficiosAdicionalesAEmpleadosConContratoIndefinido' => $arrayDGASC['NumTBeneficiosAdicionalesAEmpleadosConContratoIndefinido'],
							'NumTEmpleadosLaboranMasDeAnio' => $arrayDGASC['NumTEmpleadosLaboranMasDeAnio'],
							'NumTEmpleadasEmbarazadas' => $arrayDGASC['NumTEmpleadasEmbarazadas'],
							'NumTEmpleadosConPermisoPaternidad' => $arrayDGASC['NumTEmpleadosConPermisoPaternidad'],
							'NumTEmpleadasReincorporadasPorMaternidad' => $arrayDGASC['NumTEmpleadasReincorporadasPorMaternidad'],
							'NumTEmpleadasConPermisoMaternidad' => $arrayDGASC['NumTEmpleadasConPermisoMaternidad'],
							'NumTEmpleadosReincorporadosPorPaternidad' => $arrayDGASC['NumTEmpleadosReincorporadosPorPaternidad'],
							'NumTEmpleadosReincorporadosFueraDeTiempoEstablecido' => $arrayDGASC['NumTEmpleadosReincorporadosFueraDeTiempoEstablecido'],	
							'NumTEmpleadosReincorporadosATiempoEstablecido' => $arrayDGASC['NumTEmpleadosReincorporadosATiempoEstablecido'],
							'NumTEmpleadasReincorporadasFueraDeTiempoEstablecido' => $arrayDGASC['NumTEmpleadasReincorporadasFueraDeTiempoEstablecido'],
							'NumTEmpleadasReincorporadasATiempoEstablecido' => $arrayDGASC['NumTEmpleadasReincorporadasATiempoEstablecido'],
							'NumTEmpleadosAJornadaCompleta' => $arrayDGASC['NumTEmpleadosAJornadaCompleta'],
							'NumTEmpleadosAJornadaParcial' => $arrayDGASC['NumTEmpleadosAJornadaParcial'],
							'NumTHorasSuplementariasTrabajadas' => $arrayDGASC['NumTHorasSuplementariasTrabajadas'],
							'NumTHorasExtrasTrabajadas' => $arrayDGASC['NumTHorasExtrasTrabajadas'],
							'NumTProductosDefectuososRechazados' => $arrayDGASC['NumTProductosDefectuososRechazados'],
							'NumTProductosRecibidos' => $arrayDGASC['NumTProductosRecibidos'],
							'NumTSancionesMonetarias' => $arrayDGASC['NumTSancionesMonetarias'],
							'NumTHorasLaboradasPorDiaEmpleados' => $arrayDGASC['NumTHorasLaboradasPorDiaEmpleados'],
							'NumTSesionesDeConsejosEstablecidasPorLey' => $arrayDGASC['NumTSesionesDeConsejosEstablecidasPorLey'],
							'FechaSistema' => $arrayDGASC['FechaSistema'],
							'IdEmpresa' => $arrayDGASC['IdEmpresa']
							);
							*/
		$this->db->trans_start();
		$insert = $this->db->insert('DatosGeneralesAnualSeccC', $arrayDGASC);
		$this->db->trans_complete();
		if($insert){
			return true;
		}else{
			return false;
		}		
	}

	public function getListDatosGeneralesAnualSeccC($IdEmpresa){
		$this->db->order_by("IdDGASC", "DESC");
		$resultado = $this->db->where('IdEmpresa',$IdEmpresa)->get('DatosGeneralesAnualSeccC');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getDatosGeneralesAnualSeccC($IdDGASC, $IdEmpresa){
		$this->db->where('IdDGASC', $IdDGASC)->where("IdEmpresa", $IdEmpresa);;
		$resultado = $this->db->get('DatosGeneralesAnualSeccC');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;		
	}
	public function updateDatosGeneralesAnualSeccC($IdDGASC, $arrayDGASC, $IdEmpresa){
		/*
		$updateDGASC = array('NumTDemandasAdministrativasAtendidas' => $arrayDGASC['NumTDemandasAdministrativasAtendidas'],
							'NumTDemandasAdministrativas' => $arrayDGASC['NumTDemandasAdministrativas'],
							'NumTProductosServiciosEntregadosAClientes' => $arrayDGASC['NumTProductosServiciosEntregadosAClientes'],
							'NumTDenunciasAspectosNoEticosResueltos' => $arrayDGASC['NumTDenunciasAspectosNoEticosResueltos'],
							'NumTDenunciasAspectosNoEticos' => $arrayDGASC['NumTDenunciasAspectosNoEticos'],
							'NumTCasosDiscriminacion' => $arrayDGASC['NumTCasosDiscriminacion'],
							'NumTCasosDiscriminacionResueltos' => $arrayDGASC['NumTCasosDiscriminacionResueltos'],
							'NumTProcesosConRiesgosDeCorrupcionAnalizados' => $arrayDGASC['NumTProcesosConRiesgosDeCorrupcionAnalizados'],
							'NumTProcesosConRiesgosDeCorrupcionIdentificados' => $arrayDGASC['NumTProcesosConRiesgosDeCorrupcionIdentificados'],
							'NumTMedidasAnteIncidentesDeCorrupcion' => $arrayDGASC['NumTMedidasAnteIncidentesDeCorrupcion'],
							'NumTIncidentesDeCorrupcionOcurridos' => $arrayDGASC['NumTIncidentesDeCorrupcionOcurridos'],
							'NumTDiasDestinadosAEducacionFamiliar' => $arrayDGASC['NumTDiasDestinadosAEducacionFamiliar'],
							'NumTTransacciones' => $arrayDGASC['NumTTransacciones'],
							'NumTProgramasDeReciclaje' => $arrayDGASC['NumTProgramasDeReciclaje'],
							'NumTComprobantesEmitidos' => $arrayDGASC['NumTComprobantesEmitidos'],
							'NumTComprobantesElectronicosEmitidos' => $arrayDGASC['NumTComprobantesElectronicosEmitidos'],
							'NumTBateriasSanitariasPorDepartamentos' => $arrayDGASC['NumTBateriasSanitariasPorDepartamentos'],
							'NumTBeneficiosAdicionalesAEmpleadosConContratoNoIndefinido' => $arrayDGASC['NumTBeneficiosAdicionalesAEmpleadosConContratoNoIndefinido'],
							'NumTBeneficiosAdicionalesAEmpleadosConContratoIndefinido' => $arrayDGASC['NumTBeneficiosAdicionalesAEmpleadosConContratoIndefinido'],
							'NumTEmpleadosLaboranMasDeAnio' => $arrayDGASC['NumTEmpleadosLaboranMasDeAnio'],
							'NumTEmpleadasEmbarazadas' => $arrayDGASC['NumTEmpleadasEmbarazadas'],
							'NumTEmpleadosConPermisoPaternidad' => $arrayDGASC['NumTEmpleadosConPermisoPaternidad'],
							'NumTEmpleadasReincorporadasPorMaternidad' => $arrayDGASC['NumTEmpleadasReincorporadasPorMaternidad'],
							'NumTEmpleadasConPermisoMaternidad' => $arrayDGASC['NumTEmpleadasConPermisoMaternidad'],
							'NumTEmpleadosReincorporadosPorPaternidad' => $arrayDGASC['NumTEmpleadosReincorporadosPorPaternidad'],
							'NumTEmpleadosReincorporadosFueraDeTiempoEstablecido' => $arrayDGASC['NumTEmpleadosReincorporadosFueraDeTiempoEstablecido'],
							'NumTEmpleadosReincorporadosATiempoEstablecido' => $arrayDGASC['NumTEmpleadosReincorporadosATiempoEstablecido'],
							'NumTEmpleadasReincorporadasFueraDeTiempoEstablecido' => $arrayDGASC['NumTEmpleadasReincorporadasFueraDeTiempoEstablecido'],
							'NumTEmpleadasReincorporadasATiempoEstablecido' => $arrayDGASC['NumTEmpleadasReincorporadasATiempoEstablecido'],
							'NumTEmpleadosAJornadaCompleta' => $arrayDGASC['NumTEmpleadosAJornadaCompleta'],
							'NumTEmpleadosAJornadaParcial' => $arrayDGASC['NumTEmpleadosAJornadaParcial'],
							'NumTHorasSuplementariasTrabajadas' => $arrayDGASC['NumTHorasSuplementariasTrabajadas'],
							'NumTHorasExtrasTrabajadas' => $arrayDGASC['NumTHorasExtrasTrabajadas'],
							'NumTProductosDefectuososRechazados' => $arrayDGASC['NumTProductosDefectuososRechazados'],
							'NumTProductosRecibidos' => $arrayDGASC['NumTProductosRecibidos'],
							'NumTSancionesMonetarias' => $arrayDGASC['NumTSancionesMonetarias'],
							'NumTHorasLaboradasPorDiaEmpleados' => $arrayDGASC['NumTHorasLaboradasPorDiaEmpleados'],
							'NumTSesionesDeConsejosEstablecidasPorLey' => $arrayDGASC['NumTSesionesDeConsejosEstablecidasPorLey'],
							'FechaSistema' => $arrayDGASC['FechaSistema'],
							'IdEmpresa' => $arrayDGASC['IdEmpresa']
							);
							*/
		$this->db->trans_start();
		$this->db->where('IdDGASC', $IdDGASC)->where("IdEmpresa", $IdEmpresa);
		$update = $this->db->update('DatosGeneralesAnualSeccC', $arrayDGASC);
		$this->db->trans_complete();
		if($update){
			return true;
		}else{
			return false;
		}

	}
	public function deleteDatosGeneralesAnualSeccC($IdDGASC, $IdEmpresa){
		$this->db->where('IdDGASC', $IdDGASC)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('DatosGeneralesAnualSeccC');
	}


}




 ?>