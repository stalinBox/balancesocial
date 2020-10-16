<?php 

/**
* 
*/
class DatosGeneralesAnualSeccD_Modelo extends CI_Model{
	
	function __construct(){
		
	}
	public function insertDatosGeneralesAnualSeccD($arrayDGASD){
		/*
		$insertDGASD = array('SaldoT10MayoresDepositantes' => $arrayDGASD['SaldoT10MayoresDepositantes'],
							'ValorTDepositoALaVista' => $arrayDGASD['ValorTDepositoALaVista'],
							'ValorTDepositoAplazo' => $arrayDGASD['ValorTDepositoAplazo'],
							'MontoTInvertidoEnInfraestructura' => $arrayDGASD['MontoTInvertidoEnInfraestructura'],
							'ValorTIngresosOperacionales' => $arrayDGASD['ValorTIngresosOperacionales'],
							'ValorTIngresos' => $arrayDGASD['ValorTIngresos'],
							'ValorTIngresosPorVentaDeActivosFijos' => $arrayDGASD['ValorTIngresosPorVentaDeActivosFijos'],
							'ValorTVentas' => $arrayDGASD['ValorTVentas'],
							'ValorTIngresosPorIntereses' => $arrayDGASD['ValorTIngresosPorIntereses'],
							'VentasACreditos' => $arrayDGASD['VentasACreditos'],
							'ValorTVentasAContado' => $arrayDGASD['ValorTVentasAContado'],
							'ValorTMargenFinanciero' => $arrayDGASD['ValorTMargenFinanciero'],
							'ValorTGastosOperacionales' => $arrayDGASD['ValorTGastosOperacionales'],
							'ValorTGastosNoOperacionales' => $arrayDGASD['ValorTGastosNoOperacionales'],
							'ValorTSueldosYSalarios' => $arrayDGASD['ValorTSueldosYSalarios'],
							'MontoTCreditoConsumoSocios' => $arrayDGASD['MontoTCreditoConsumoSocios'],
							'MontoTCreditos' => $arrayDGASD['MontoTCreditos'],
							'MontoTCreditoViviendaSocios' => $arrayDGASD['MontoTCreditoViviendaSocios'],
							'MontoTCreditoMicrocreditoSocios' => $arrayDGASD['MontoTCreditoMicrocreditoSocios'],
							'MontoTCreditoComercialSocios' => $arrayDGASD['MontoTCreditoComercialSocios'],
							'MontoTCreditoInmobiliarioSocios' => $arrayDGASD['MontoTCreditoInmobiliarioSocios'],
							'ValorTCarteraCredito' => $arrayDGASD['ValorTCarteraCredito'],
							'SaldoTCarteraCreditoParaNecesidadSocial' => $arrayDGASD['SaldoTCarteraCreditoParaNecesidadSocial'],
							'SaldoTCarteraCreditoParaNecesidadProductiva' => $arrayDGASD['SaldoTCarteraCreditoParaNecesidadProductiva'],
							'ValorTCarteraVencida' => $arrayDGASD['ValorTCarteraVencida'],
							'ValorTEndeudamientoExterno' => $arrayDGASD['ValorTEndeudamientoExterno'],
							'MontoTComprasAContado' => $arrayDGASD['MontoTComprasAContado'],
							'MontoTComprasACredito' => $arrayDGASD['MontoTComprasACredito'],
							'MontoTComprasAProveedoresLocales' => $arrayDGASD['MontoTComprasAProveedoresLocales'],
							'MontoTComprasAProveedoresInternacionales' => $arrayDGASD['MontoTComprasAProveedoresInternacionales'],
							'MontoTComprasAAsociaciones' => $arrayDGASD['MontoTComprasAAsociaciones'],
							'PresupuestoAdquisicionesDestinadasAProveedoresLocales' => $arrayDGASD['PresupuestoAdquisicionesDestinadasAProveedoresLocales'],
							'ValorTPresupuestoAdquisicion' => $arrayDGASD['ValorTPresupuestoAdquisicion'],
							'ValorTSancionesPorOrganismosDeControl' => $arrayDGASD['ValorTSancionesPorOrganismosDeControl'],
							'ValorTPagadoPorIVA' => $arrayDGASD['ValorTPagadoPorIVA'],
							'ValorTContribucionesAlEstado' => $arrayDGASD['ValorTContribucionesAlEstado'],
							'ValorTPagadoPorRetenciones' => $arrayDGASD['ValorTPagadoPorRetenciones'],
							'ValorTPagadoPorImpuestoALaRenta' => $arrayDGASD['ValorTPagadoPorImpuestoALaRenta'],
							'ValorTSubvencionesGubernamentales' => $arrayDGASD['ValorTSubvencionesGubernamentales'],
							'ValorTCaptacionProcedenteCOAC' => $arrayDGASD['ValorTCaptacionProcedenteCOAC'],
							'ValorTCaptaciones' => $arrayDGASD['ValorTCaptaciones'],
							'FechaSistema' => $arrayDGASD['FechaSistema'],
							'IdEmpresa' => $arrayDGASD['IdEmpresa']
							);
							*/
		$this->db->trans_start();
		$insert = $this->db->insert('DatosGeneralesAnualSeccD', $arrayDGASD);
		$this->db->trans_complete();
		if($insert){
			return true;
		}else{
			return false;
		}		
	}
	public function getListDatosGeneralesAnualSeccD($IdEmpresa){
		$this->db->order_by("IdDGASD", "DESC");
		$resultado = $this->db->where('IdEmpresa',$IdEmpresa)->get('DatosGeneralesAnualSeccD');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getDatosGeneralesAnualSeccD($IdDGASD, $IdEmpresa){
		$this->db->where('IdDGASD', $IdDGASD)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('DatosGeneralesAnualSeccD');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;		
	}
	public function updateDatosGeneralesAnualSeccD($IdDGASD, $arrayDGASD, $IdEmpresa){
		/*
		$updateDGASD = array('SaldoT10MayoresDepositantes' => $arrayDGASD['SaldoT10MayoresDepositantes'],
							'ValorTDepositoALaVista' => $arrayDGASD['ValorTDepositoALaVista'],
							'ValorTDepositoAplazo' => $arrayDGASD['ValorTDepositoAplazo'],
							'MontoTInvertidoEnInfraestructura' => $arrayDGASD['MontoTInvertidoEnInfraestructura'],
							'ValorTIngresosOperacionales' => $arrayDGASD['ValorTIngresosOperacionales'],
							'ValorTIngresos' => $arrayDGASD['ValorTIngresos'],
							'ValorTIngresosPorVentaDeActivosFijos' => $arrayDGASD['ValorTIngresosPorVentaDeActivosFijos'],
							'ValorTVentas' => $arrayDGASD['ValorTVentas'],
							'ValorTIngresosPorIntereses' => $arrayDGASD['ValorTIngresosPorIntereses'],
							'VentasACreditos' => $arrayDGASD['VentasACreditos'],
							'ValorTVentasAContado' => $arrayDGASD['ValorTVentasAContado'],
							'ValorTMargenFinanciero' => $arrayDGASD['ValorTMargenFinanciero'],
							'ValorTGastosOperacionales' => $arrayDGASD['ValorTGastosOperacionales'],
							'ValorTGastosNoOperacionales' => $arrayDGASD['ValorTGastosNoOperacionales'],
							'ValorTSueldosYSalarios' => $arrayDGASD['ValorTSueldosYSalarios'],
							'MontoTCreditoConsumoSocios' => $arrayDGASD['MontoTCreditoConsumoSocios'],
							'MontoTCreditos' => $arrayDGASD['MontoTCreditos'],
							'MontoTCreditoViviendaSocios' => $arrayDGASD['MontoTCreditoViviendaSocios'],
							'MontoTCreditoMicrocreditoSocios' => $arrayDGASD['MontoTCreditoMicrocreditoSocios'],
							'MontoTCreditoComercialSocios' => $arrayDGASD['MontoTCreditoComercialSocios'],
							'MontoTCreditoInmobiliarioSocios' => $arrayDGASD['MontoTCreditoInmobiliarioSocios'],
							'ValorTCarteraCredito' => $arrayDGASD['ValorTCarteraCredito'],
							'SaldoTCarteraCreditoParaNecesidadSocial' => $arrayDGASD['SaldoTCarteraCreditoParaNecesidadSocial'],
							'SaldoTCarteraCreditoParaNecesidadProductiva' => $arrayDGASD['SaldoTCarteraCreditoParaNecesidadProductiva'],
							'ValorTCarteraVencida' => $arrayDGASD['ValorTCarteraVencida'],
							'ValorTEndeudamientoExterno' => $arrayDGASD['ValorTEndeudamientoExterno'],
							'MontoTComprasAContado' => $arrayDGASD['MontoTComprasAContado'],
							'MontoTComprasACredito' => $arrayDGASD['MontoTComprasACredito'],
							'MontoTComprasAProveedoresLocales' => $arrayDGASD['MontoTComprasAProveedoresLocales'],
							'MontoTComprasAProveedoresInternacionales' => $arrayDGASD['MontoTComprasAProveedoresInternacionales'],
							'MontoTComprasAAsociaciones' => $arrayDGASD['MontoTComprasAAsociaciones'],
							'PresupuestoAdquisicionesDestinadasAProveedoresLocales' => $arrayDGASD['PresupuestoAdquisicionesDestinadasAProveedoresLocales'],
							'ValorTPresupuestoAdquisicion' => $arrayDGASD['ValorTPresupuestoAdquisicion'],
							'ValorTSancionesPorOrganismosDeControl' => $arrayDGASD['ValorTSancionesPorOrganismosDeControl'],
							'ValorTPagadoPorIVA' => $arrayDGASD['ValorTPagadoPorIVA'],
							'ValorTContribucionesAlEstado' => $arrayDGASD['ValorTContribucionesAlEstado'],
							'ValorTPagadoPorRetenciones' => $arrayDGASD['ValorTPagadoPorRetenciones'],
							'ValorTPagadoPorImpuestoALaRenta' => $arrayDGASD['ValorTPagadoPorImpuestoALaRenta'],
							'ValorTSubvencionesGubernamentales' => $arrayDGASD['ValorTSubvencionesGubernamentales'],
							'ValorTCaptacionProcedenteCOAC' => $arrayDGASD['ValorTCaptacionProcedenteCOAC'],
							'ValorTCaptaciones' => $arrayDGASD['ValorTCaptaciones'],
							'FechaSistema' => $arrayDGASD['FechaSistema'],
							'IdEmpresa' => $arrayDGASD['IdEmpresa']
							);
							*/
		$this->db->trans_start();
		$this->db->where('IdDGASD', $IdDGASD)->where("IdEmpresa", $IdEmpresa);;
		$update = $this->db->update('DatosGeneralesAnualSeccD', $arrayDGASD);
		$this->db->trans_complete();
		if($update){
			return true;
		}else{
			return false;
		}

	}
	public function deleteDatosGeneralesAnualSeccD($IdDGASD, $IdEmpresa){
		$this->db->where('IdDGASD', $IdDGASD)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('DatosGeneralesAnualSeccD');
	}


}




 ?>