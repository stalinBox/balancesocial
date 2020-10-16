<?php 
/**
* 
*/
class DatosGeneralesAnualSeccF_Modelo extends CI_Model{
	
	function __construct(){
		
	}
	public function insertDatosGeneralesAnualSeccF($arrayDGASF){
		/*
		$insertDGASE = array('ValorCreditoASociosConDepositoMenorA20Porciento' => $arrayDGASF['ValorCreditoASociosConDepositoMenorA20Porciento'],
							'ValorCreditoASociosConAporteMenorALaMedia' => $arrayDGASF['ValorCreditoASociosConAporteMenorALaMedia'],
							'ValorCreditoASociosConMinCapitalExigido' => $arrayDGASF['ValorCreditoASociosConMinCapitalExigido'],
							'MontoPromedioCreditoConsumoConcedidoPrimeraVez' => $arrayDGASF['MontoPromedioCreditoConsumoConcedidoPrimeraVez'],
							'MontoPromedioCreditoViviendaConcedidoPrimeraVez' => $arrayDGASF['MontoPromedioCreditoViviendaConcedidoPrimeraVez'],
							'MontoPromedioMicrocreditoASociosNuevosPrimeraVez' => $arrayDGASF['MontoPromedioMicrocreditoASociosNuevosPrimeraVez'],
							'MontoPromedioCreditoComercioASociosNuevosPrimeraVez' => $arrayDGASF['MontoPromedioCreditoComercioASociosNuevosPrimeraVez'],
							'MontoPromedioCreditosVinculados' => $arrayDGASF['MontoPromedioCreditosVinculados'],
							'MontoCertificadosAportacionPoseidosPorSocioMayoritario' => $arrayDGASF['MontoCertificadosAportacionPoseidosPorSocioMayoritario'],
							'MontoCertificadosAportacionPoseidosPorSocioMinorista' => $arrayDGASF['MontoCertificadosAportacionPoseidosPorSocioMinorista'],
							'TasaMediaInteresSobreCertificadosDeAportacion' => $arrayDGASF['TasaMediaInteresSobreCertificadosDeAportacion'],
							'ValorAgregadoCooperativoDistribuidoATrabajadores' => $arrayDGASF['ValorAgregadoCooperativoDistribuidoATrabajadores'],
							'ValorPrestacionesPersonales' => $arrayDGASF['ValorPrestacionesPersonales'],
							'ValorPrestacionesColectivas' => $arrayDGASF['ValorPrestacionesColectivas'],
							'GastoEnFormacionATrabajadores' => $arrayDGASF['GastoEnFormacionATrabajadores'],
							'ValorBecasAyudasServicios' => $arrayDGASF['ValorBecasAyudasServicios'],
							'ValorImpuestoYTasaVarias' => $arrayDGASF['ValorImpuestoYTasaVarias'],
							'ValorDonacionFondoEducacion' => $arrayDGASF['ValorDonacionFondoEducacion'],
							'ValorFondoDeSolidaridad' => $arrayDGASF['ValorFondoDeSolidaridad'],
							'ValorDonativosAComunidad' => $arrayDGASF['ValorDonativosAComunidad'],
							'ValorExcedenteBruto' => $arrayDGASF['ValorExcedenteBruto'],
							'ValorImpuestosSobreExcedentes' => $arrayDGASF['ValorImpuestosSobreExcedentes'],
							'ValorDotacionDeFondoEducacion' => $arrayDGASF['ValorDotacionDeFondoEducacion'],
							'ValorFondoDeReservaIrrepartibles' => $arrayDGASF['ValorFondoDeReservaIrrepartibles'],
							'ValorFondoDeReservaRepartibles' => $arrayDGASF['ValorFondoDeReservaRepartibles'],
							'PrecioPagadoAAsociadosPorCompraDeMaterial' => $arrayDGASF['PrecioPagadoAAsociadosPorCompraDeMaterial'],
							'DescuentoRealizadoASociosEnVentasAProductores' => $arrayDGASF['DescuentoRealizadoASociosEnVentasAProductores'],
							'GastosPorServiciosVoluntariosGratuitosASocios' => $arrayDGASF['GastosPorServiciosVoluntariosGratuitosASocios'],
							'ValorDotacionFondoDeReservaIrrepartibles' => $arrayDGASF['ValorDotacionFondoDeReservaIrrepartibles'],
							'ValorOtrasReservas' => $arrayDGASF['ValorOtrasReservas'],
							'SaldoTDepositos' => $arrayDGASF['SaldoTDepositos'],
							'NumTComprobantesFisicosEmitidos' => $arrayDGASF['NumTComprobantesFisicosEmitidos'],
							'GastoTMultas' => $arrayDGASF['GastoTMultas'],
							'ValorTBeneficiosDeLey' => $arrayDGASF['ValorTBeneficiosDeLey'],
							'NumTLimpiezasPorDia' => $arrayDGASF['NumTLimpiezasPorDia'],
							'NumTLimpiezasProgramadasPorDia' => $arrayDGASF['NumTLimpiezasProgramadasPorDia'],
							'NumTEmpeladosQueNoGozaronVacaciones' => $arrayDGASF['NumTEmpeladosQueNoGozaronVacaciones'],
							'ValorTPorPagarProvisionDecimoCuarto' => $arrayDGASF['ValorTPorPagarProvisionDecimoCuarto'],
							'NumTAccidentes5Anios' => $arrayDGASF['NumTAccidentes5Anios'],
							'NumTEmpleadosEvaluadosDesempenioProfesional' => $arrayDGASF['NumTEmpleadosEvaluadosDesempenioProfesional'],
							'ValorTAportacionesCapitalSocial' => $arrayDGASF['ValorTAportacionesCapitalSocial'],
							'TasaPasivaCaptacionDelPublicoPonderada' => $arrayDGASF['TasaPasivaCaptacionDelPublicoPonderada'],
							'MontoTCompras' => $arrayDGASF['MontoTCompras'],
							'ValorAgregadoCooperativoDistribuidoAComunidad' => $arrayDGASF['ValorAgregadoCooperativoDistribuidoAComunidad'],
							'ValorAgregadoCooperativoDistribuidoASocios' => $arrayDGASF['ValorAgregadoCooperativoDistribuidoASocios'],
							'ValorAgregadoCooperativoIncorporadoAPatrimonioComun' => $arrayDGASF['ValorAgregadoCooperativoIncorporadoAPatrimonioComun'],
							'ValorComprasRealizadasAEntidadesReconocidasComoDeComercioJusto' => $arrayDGASF['ValorComprasRealizadasAEntidadesReconocidasComoDeComercioJusto'],
							'ValorVentasRealizadasAEntidadesReconocidasComoComercioJusto' => $arrayDGASF['ValorVentasRealizadasAEntidadesReconocidasComoComercioJusto'],
							'ValorDepositosProcedenteDeEntidadesReconocidasComoComercioJusto' => $arrayDGASF['ValorDepositosProcedenteDeEntidadesReconocidasComoComercioJusto'],
							'ValorCreditosOtorgadosAEntidadesReconocidasComoComercioJusto' => $arrayDGASF['ValorCreditosOtorgadosAEntidadesReconocidasComoComercioJusto'],
							'ValorTAportesIngresados' => $arrayDGASF['ValorTAportesIngresados'],
							'FechaSistema' => $arrayDGASF['FechaSistema'],
							'IdEmpresa' => $arrayDGASF['IdEmpresa']
							);
*/
		$this->db->trans_start();
		$insert = $this->db->insert('DatosGeneralesAnualSeccF', $arrayDGASF);
		$this->db->trans_complete();
		if($insert){
			return true;
		}else{
			return false;
		}		
	}
	public function getListDatosGeneralesAnualSeccF($IdEmpresa){
		$this->db->order_by("IdDGASF", "DESC");
		$resultado = $this->db->where('IdEmpresa',$IdEmpresa)->get('DatosGeneralesAnualSeccF');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getDatosGeneralesAnualSeccF($IdDGASF, $IdEmpresa){
		$this->db->where('IdDGASF', $IdDGASF)->where("IdEmpresa", $IdEmpresa);
		$resultado = $this->db->get('DatosGeneralesAnualSeccF');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;		
	}
	public function updateDatosGeneralesAnualSeccF($IdDGASF, $arrayDGASF, $IdEmpresa){
		/*
		$updateDGASE = array('ValorCreditoASociosConDepositoMenorA20Porciento' => $arrayDGASF['ValorCreditoASociosConDepositoMenorA20Porciento'],
							'ValorCreditoASociosConAporteMenorALaMedia' => $arrayDGASF['ValorCreditoASociosConAporteMenorALaMedia'],
							'ValorCreditoASociosConMinCapitalExigido' => $arrayDGASF['ValorCreditoASociosConMinCapitalExigido'],
							'MontoPromedioCreditoConsumoConcedidoPrimeraVez' => $arrayDGASF['MontoPromedioCreditoConsumoConcedidoPrimeraVez'],
							'MontoPromedioCreditoViviendaConcedidoPrimeraVez' => $arrayDGASF['MontoPromedioCreditoViviendaConcedidoPrimeraVez'],
							'MontoPromedioMicrocreditoASociosNuevosPrimeraVez' => $arrayDGASF['MontoPromedioMicrocreditoASociosNuevosPrimeraVez'],
							'MontoPromedioCreditoComercioASociosNuevosPrimeraVez' => $arrayDGASF['MontoPromedioCreditoComercioASociosNuevosPrimeraVez'],
							'MontoPromedioCreditosVinculados' => $arrayDGASF['MontoPromedioCreditosVinculados'],
							'MontoCertificadosAportacionPoseidosPorSocioMayoritario' => $arrayDGASF['MontoCertificadosAportacionPoseidosPorSocioMayoritario'],
							'MontoCertificadosAportacionPoseidosPorSocioMinorista' => $arrayDGASF['MontoCertificadosAportacionPoseidosPorSocioMinorista'],
							'TasaMediaInteresSobreCertificadosDeAportacion' => $arrayDGASF['TasaMediaInteresSobreCertificadosDeAportacion'],
							'ValorAgregadoCooperativoDistribuidoATrabajadores' => $arrayDGASF['ValorAgregadoCooperativoDistribuidoATrabajadores'],
							'ValorPrestacionesPersonales' => $arrayDGASF['ValorPrestacionesPersonales'],
							'ValorPrestacionesColectivas' => $arrayDGASF['ValorPrestacionesColectivas'],
							'GastoEnFormacionATrabajadores' => $arrayDGASF['GastoEnFormacionATrabajadores'],
							'ValorBecasAyudasServicios' => $arrayDGASF['ValorBecasAyudasServicios'],
							'ValorImpuestoYTasaVarias' => $arrayDGASF['ValorImpuestoYTasaVarias'],
							'ValorDonacionFondoEducacion' => $arrayDGASF['ValorDonacionFondoEducacion'],
							'ValorFondoDeSolidaridad' => $arrayDGASF['ValorFondoDeSolidaridad'],
							'ValorDonativosAComunidad' => $arrayDGASF['ValorDonativosAComunidad'],
							'ValorExcedenteBruto' => $arrayDGASF['ValorExcedenteBruto'],
							'ValorImpuestosSobreExcedentes' => $arrayDGASF['ValorImpuestosSobreExcedentes'],
							'ValorDotacionDeFondoEducacion' => $arrayDGASF['ValorDotacionDeFondoEducacion'],
							'ValorFondoDeReservaIrrepartibles' => $arrayDGASF['ValorFondoDeReservaIrrepartibles'],
							'ValorFondoDeReservaRepartibles' => $arrayDGASF['ValorFondoDeReservaRepartibles'],
							'PrecioPagadoAAsociadosPorCompraDeMaterial' => $arrayDGASF['PrecioPagadoAAsociadosPorCompraDeMaterial'],
							'DescuentoRealizadoASociosEnVentasAProductores' => $arrayDGASF['DescuentoRealizadoASociosEnVentasAProductores'],
							'GastosPorServiciosVoluntariosGratuitosASocios' => $arrayDGASF['GastosPorServiciosVoluntariosGratuitosASocios'],
							'ValorDotacionFondoDeReservaIrrepartibles' => $arrayDGASF['ValorDotacionFondoDeReservaIrrepartibles'],
							'ValorOtrasReservas' => $arrayDGASF['ValorOtrasReservas'],
							'SaldoTDepositos' => $arrayDGASF['SaldoTDepositos'],
							'NumTComprobantesFisicosEmitidos' => $arrayDGASF['NumTComprobantesFisicosEmitidos'],
							'GastoTMultas' => $arrayDGASF['GastoTMultas'],
							'ValorTBeneficiosDeLey' => $arrayDGASF['ValorTBeneficiosDeLey'],
							'NumTLimpiezasPorDia' => $arrayDGASF['NumTLimpiezasPorDia'],
							'NumTLimpiezasProgramadasPorDia' => $arrayDGASF['NumTLimpiezasProgramadasPorDia'],
							'NumTEmpeladosQueNoGozaronVacaciones' => $arrayDGASF['NumTEmpeladosQueNoGozaronVacaciones'],
							'ValorTPorPagarProvisionDecimoCuarto' => $arrayDGASF['ValorTPorPagarProvisionDecimoCuarto'],
							'NumTAccidentes5Anios' => $arrayDGASF['NumTAccidentes5Anios'],
							'NumTEmpleadosEvaluadosDesempenioProfesional' => $arrayDGASF['NumTEmpleadosEvaluadosDesempenioProfesional'],
							'ValorTAportacionesCapitalSocial' => $arrayDGASF['ValorTAportacionesCapitalSocial'],
							'TasaPasivaCaptacionDelPublicoPonderada' => $arrayDGASF['TasaPasivaCaptacionDelPublicoPonderada'],
							'MontoTCompras' => $arrayDGASF['MontoTCompras'],
							'ValorAgregadoCooperativoDistribuidoAComunidad' => $arrayDGASF['ValorAgregadoCooperativoDistribuidoAComunidad'],
							'ValorAgregadoCooperativoDistribuidoASocios' => $arrayDGASF['ValorAgregadoCooperativoDistribuidoASocios'],
							'ValorAgregadoCooperativoIncorporadoAPatrimonioComun' => $arrayDGASF['ValorAgregadoCooperativoIncorporadoAPatrimonioComun'],
							'ValorComprasRealizadasAEntidadesReconocidasComoDeComercioJusto' => $arrayDGASF['ValorComprasRealizadasAEntidadesReconocidasComoDeComercioJusto'],
							'ValorVentasRealizadasAEntidadesReconocidasComoComercioJusto' => $arrayDGASF['ValorVentasRealizadasAEntidadesReconocidasComoComercioJusto'],
							'ValorDepositosProcedenteDeEntidadesReconocidasComoComercioJusto' => $arrayDGASF['ValorDepositosProcedenteDeEntidadesReconocidasComoComercioJusto'],
							'ValorCreditosOtorgadosAEntidadesReconocidasComoComercioJusto' => $arrayDGASF['ValorCreditosOtorgadosAEntidadesReconocidasComoComercioJusto'],
							'ValorTAportesIngresados' => $arrayDGASF['ValorTAportesIngresados'],
							'FechaSistema' => $arrayDGASF['FechaSistema'],
							'IdEmpresa' => $arrayDGASF['IdEmpresa']
							);
*/
		$this->db->trans_start();
		$this->db->where('IdDGASF', $IdDGASF)->where("IdEmpresa", $IdEmpresa);
		$update = $this->db->update('DatosGeneralesAnualSeccF', $arrayDGASF);
		$this->db->trans_complete();
		if($update){
			return true;
		}else{
			return false;
		}

	}
	public function deleteDatosGeneralesAnualSeccF($IdDGASF, $IdEmpresa){
		$this->db->where('IdDGASF', $IdDGASF)->where("IdEmpresa", $IdEmpresa);
		return $this->db->delete('DatosGeneralesAnualSeccF');
	}


}


 ?>