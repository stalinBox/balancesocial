<?php 

/**
* 
*/
class DatosGeneralesAnualSeccB_Modelo extends CI_Model{
	
	function __construct(){
		
	}
	public function insertDatosGeneralesAnualSeccB($arrayDGASB){
		/*
		$insertDGASB = array(
						'NumTSocios50PorcientoOMasTotalDeDepositos' => $arrayDGASB['NumTSocios50PorcientoOMasTotalDeDepositos'],
						'NumTSugerenciasConstructivas' => $arrayDGASB['NumTSugerenciasConstructivas'],
						'NumTSugerenciasRevisadas' => $arrayDGASB['NumTSugerenciasRevisadas'],
						'NumTProductosServiciosEntregadosATiempoAClientes' => $arrayDGASB['NumTProductosServiciosEntregadosATiempoAClientes'],
						'NumTEventosMantieneConOtrasCOAC' => $arrayDGASB['NumTEventosMantieneConOtrasCOAC'],
						'NumTBeneficiosNoFinancierosASocios' => $arrayDGASB['NumTBeneficiosNoFinancierosASocios'],
						'NumTSociosParticipanEnElecciones' => $arrayDGASB['NumTSociosParticipanEnElecciones'],
						'NumTEmpeladosQueGozaronVacaciones' => $arrayDGASB['NumTEmpeladosQueGozaronVacaciones'],
						'NumTEmpleadosRecibenEquipoDeProteccion' => $arrayDGASB['NumTEmpleadosRecibenEquipoDeProteccion'],
						'NumTEmpleadosQueUsanEquiposDeProteccion' => $arrayDGASB['NumTEmpleadosQueUsanEquiposDeProteccion'],
						'NumTEmpleadosQueDebemUsarEquiposDeProteccion' => $arrayDGASB['NumTEmpleadosQueDebemUsarEquiposDeProteccion'],
						'NumTEvaluacionesAUtilizacionDeEquiDeProteccionEjecutadas' => $arrayDGASB['NumTEvaluacionesAUtilizacionDeEquiDeProteccionEjecutadas'],
						'NumTEvaluacionesAUtilizacionDeEquiDeProteccionProgramadas' => $arrayDGASB['NumTEvaluacionesAUtilizacionDeEquiDeProteccionProgramadas'],
						'NumTMantenimientosAInfraestructuraEjecutados' => $arrayDGASB['NumTMantenimientosAInfraestructuraEjecutados'],
						'NumTMantenimientosAInfraestructuraRequeridos' => $arrayDGASB['NumTMantenimientosAInfraestructuraRequeridos'],
						'NumTPuntosEnComunidadesSinOtrasInstitucionesFinancieras' => $arrayDGASB['NumTPuntosEnComunidadesSinOtrasInstitucionesFinancieras'],
						'NumTPuntosDeAtencion' => $arrayDGASB['NumTPuntosDeAtencion'],
						'NumTPuntosDeAtencionConAccesoADiscapacitados' => $arrayDGASB['NumTPuntosDeAtencionConAccesoADiscapacitados'],
						//'NumTPuntosDeAccesoADiscapacitados' => $arrayDGASB['NumTPuntosDeAccesoADiscapacitados'],
						'NumTParticipacionesLobbying' => $arrayDGASB['NumTParticipacionesLobbying'],
						'NumTAsuntosAcordadosNoRespetadosPorDirectivos' => $arrayDGASB['NumTAsuntosAcordadosNoRespetadosPorDirectivos'],
						'NumTAsuntosAcordadosEnConveniosSindicales' => $arrayDGASB['NumTAsuntosAcordadosEnConveniosSindicales'],
						'NumTAsuntosAcordadosNoRespetadosPorEmpleados' => $arrayDGASB['NumTAsuntosAcordadosNoRespetadosPorEmpleados'],
						'NumTCreditosVigentesAMujeres' => $arrayDGASB['NumTCreditosVigentesAMujeres'],
						'ValorTCarteraCreditoMujeres' => $arrayDGASB['ValorTCarteraCreditoMujeres'],
						'NumTOperacionesDeCreditosConMontoMenorA30PorcientoPIB' => $arrayDGASB['NumTOperacionesDeCreditosConMontoMenorA30PorcientoPIB'],
						'NumTOperacionesDeCreditoVigentes' => $arrayDGASB['NumTOperacionesDeCreditoVigentes'],
						'NumTOperacionesCreditoConCuotasVigentesMenosA1PorcientoPIB' => $arrayDGASB['NumTOperacionesCreditoConCuotasVigentesMenosA1PorcientoPIB'],
						'NumTPedidosEntregadosATiempo' => $arrayDGASB['NumTPedidosEntregadosATiempo'],
						'NumTPedidosEntregados' => $arrayDGASB['NumTPedidosEntregados'],
						'NumTProductosYServiciosAdquiereLocalmente' => $arrayDGASB['NumTProductosYServiciosAdquiereLocalmente'],
						'NumTProductosYServicios' => $arrayDGASB['NumTProductosYServicios'],
						'NumTCertificacionesRequeridasEnElPOA' => $arrayDGASB['NumTCertificacionesRequeridasEnElPOA'],
						'FechaSistema' => $arrayDGASB['FechaSistema'],
						'IdEmpresa' => $arrayDGASB['IdEmpresa']
						);
						*/
		$this->db->trans_start();
		$insert = $this->db->insert('DatosGeneralesAnualSeccB', $arrayDGASB);
		$this->db->trans_complete();
		if($insert){
			return true;
		}else{
			return false;
		}		
	}
	public function getListDatosGeneralesAnualSeccB($IdEmpresa){
		$this->db->order_by("IdDGASB", "DESC");
		$resultado = $this->db->where('IdEmpresa',$IdEmpresa)->get('DatosGeneralesAnualSeccB');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getDatosGeneralesAnualSeccB($IdDGASB, $IdEmpresa){
		$this->db->where('IdDGASB', $IdDGASB)->where("IdEmpresa", $IdEmpresa);
		$resultado = $this->db->get('DatosGeneralesAnualSeccB');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;		
	}
	public function updateDatosGeneralesAnualSeccB($IdDGASB, $arrayDGASB, $IdEmpresa){
		/*
		$updateDGASB = array('NumTSocios50PorcientoOMasTotalDeDepositos' => $arrayDGASB['NumTSocios50PorcientoOMasTotalDeDepositos'],
							'NumTSugerenciasConstructivas' => $arrayDGASB['NumTSugerenciasConstructivas'],
							'NumTSugerenciasRevisadas' => $arrayDGASB['NumTSugerenciasRevisadas'],
							'NumTProductosServiciosEntregadosATiempoAClientes' => $arrayDGASB['NumTProductosServiciosEntregadosATiempoAClientes'],
							'NumTEventosMantieneConOtrasCOAC' => $arrayDGASB['NumTEventosMantieneConOtrasCOAC'],
							'NumTBeneficiosNoFinancierosASocios' => $arrayDGASB['NumTBeneficiosNoFinancierosASocios'],
							'NumTSociosParticipanEnElecciones' => $arrayDGASB['NumTSociosParticipanEnElecciones'],
							'NumTEmpeladosQueGozaronVacaciones' => $arrayDGASB['NumTEmpeladosQueGozaronVacaciones'],
							'NumTEmpleadosRecibenEquipoDeProteccion' => $arrayDGASB['NumTEmpleadosRecibenEquipoDeProteccion'],
							'NumTEmpleadosQueUsanEquiposDeProteccion' => $arrayDGASB['NumTEmpleadosQueUsanEquiposDeProteccion'],
							'NumTEmpleadosQueDebemUsarEquiposDeProteccion' => $arrayDGASB['NumTEmpleadosQueDebemUsarEquiposDeProteccion'],
							'NumTEvaluacionesAUtilizacionDeEquiDeProteccionEjecutadas' => $arrayDGASB['NumTEvaluacionesAUtilizacionDeEquiDeProteccionEjecutadas'],
							'NumTEvaluacionesAUtilizacionDeEquiDeProteccionProgramadas' => $arrayDGASB['NumTEvaluacionesAUtilizacionDeEquiDeProteccionProgramadas'],
							'NumTMantenimientosAInfraestructuraEjecutados' => $arrayDGASB['NumTMantenimientosAInfraestructuraEjecutados'],
							'NumTMantenimientosAInfraestructuraRequeridos' => $arrayDGASB['NumTMantenimientosAInfraestructuraRequeridos'],
							'NumTPuntosEnComunidadesSinOtrasInstitucionesFinancieras' => $arrayDGASB['NumTPuntosEnComunidadesSinOtrasInstitucionesFinancieras'],
							'NumTPuntosDeAtencion' => $arrayDGASB['NumTPuntosDeAtencion'],
							'NumTPuntosDeAtencionConAccesoADiscapacitados' => $arrayDGASB['NumTPuntosDeAtencionConAccesoADiscapacitados'],
							//'NumTPuntosDeAccesoADiscapacitados' => $arrayDGASB['NumTPuntosDeAccesoADiscapacitados'],
							'NumTParticipacionesLobbying' => $arrayDGASB['NumTParticipacionesLobbying'],
							'NumTAsuntosAcordadosNoRespetadosPorDirectivos' => $arrayDGASB['NumTAsuntosAcordadosNoRespetadosPorDirectivos'],
							'NumTAsuntosAcordadosEnConveniosSindicales' => $arrayDGASB['NumTAsuntosAcordadosEnConveniosSindicales'],
							'NumTAsuntosAcordadosNoRespetadosPorEmpleados' => $arrayDGASB['NumTAsuntosAcordadosNoRespetadosPorEmpleados'],
							'NumTCreditosVigentesAMujeres' => $arrayDGASB['NumTCreditosVigentesAMujeres'],
							'ValorTCarteraCreditoMujeres' => $arrayDGASB['ValorTCarteraCreditoMujeres'],
							'NumTOperacionesDeCreditosConMontoMenorA30PorcientoPIB' => $arrayDGASB['NumTOperacionesDeCreditosConMontoMenorA30PorcientoPIB'],
							'NumTOperacionesDeCreditoVigentes' => $arrayDGASB['NumTOperacionesDeCreditoVigentes'],
							'NumTOperacionesCreditoConCuotasVigentesMenosA1PorcientoPIB' => $arrayDGASB['NumTOperacionesCreditoConCuotasVigentesMenosA1PorcientoPIB'],
							'NumTPedidosEntregadosATiempo' => $arrayDGASB['NumTPedidosEntregadosATiempo'],
							'NumTPedidosEntregados' => $arrayDGASB['NumTPedidosEntregados'],
							'NumTProductosYServiciosAdquiereLocalmente' => $arrayDGASB['NumTProductosYServiciosAdquiereLocalmente'],
							'NumTProductosYServicios' => $arrayDGASB['NumTProductosYServicios'],
							'NumTCertificacionesRequeridasEnElPOA' => $arrayDGASB['NumTCertificacionesRequeridasEnElPOA'],
							'FechaSistema' => $arrayDGASB['FechaSistema'],
							'IdEmpresa' => $arrayDGASB['IdEmpresa']
						);
						*/
		$this->db->trans_start();
		$this->db->where('IdDGASB', $IdDGASB)->where('IdEmpresa', $IdEmpresa);
		$update = $this->db->update('DatosGeneralesAnualSeccB', $arrayDGASB);
		$this->db->trans_complete();
		if($update){
			return true;
		}else{
			return false;
		}

	}
	public function deleteDatosGeneralesAnualSeccB($IdDGASB, $IdEmpresa){
		$this->db->where('IdDGASB', $IdDGASB)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('DatosGeneralesAnualSeccB');
	}


}




 ?>