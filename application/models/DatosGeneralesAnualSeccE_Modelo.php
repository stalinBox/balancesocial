<?php 
/**
* 
*/
class DatosGeneralesAnualSeccE_Modelo extends CI_Model{
	
	function __construct(){
		
	}
	public function insertDatosGeneralesAnualSeccE($arrayDGASE){
		/*
		$insertDGASE = array(
							'MontoTGastoEnInformarSobreAsambleas' => $arrayDGASE['MontoTGastoEnInformarSobreAsambleas'],
							'GastoTotalDeOrganizacion' => $arrayDGASE['GastoTotalDeOrganizacion'],
							'MontoTGastoEnInformarSobreConsejoAdministracion' => $arrayDGASE['MontoTGastoEnInformarSobreConsejoAdministracion'],
							'MontoTGastoEnInformarSobreOtraInformacion' => $arrayDGASE['MontoTGastoEnInformarSobreOtraInformacion'],
							'ValorTActivos' => $arrayDGASE['ValorTActivos'],
							'CostoComprobanteVentaRetencionAntesFacturacionElectronica' => $arrayDGASE['CostoComprobanteVentaRetencionAntesFacturacionElectronica'],
							'CostoComprobanteVentaRetencionDespuesFacturaElectronica' => $arrayDGASE['CostoComprobanteVentaRetencionDespuesFacturaElectronica'],
							'GastoTGasolinaEnEnvioProductosServicios' => $arrayDGASE['GastoTGasolinaEnEnvioProductosServicios'],
							'GastoTMultasNormasAmbientales' => $arrayDGASE['GastoTMultasNormasAmbientales'],
							'GastoTEquipamiento' => $arrayDGASE['GastoTEquipamiento'],
							'GastoTAsignadoAEliminarResiduo' => $arrayDGASE['GastoTAsignadoAEliminarResiduo'],
							'GastoTLimpieza' => $arrayDGASE['GastoTLimpieza'],
							'ValorTAportacionEmpleados' => $arrayDGASE['ValorTAportacionEmpleados'],
							'ValorTAportacionPatrono' => $arrayDGASE['ValorTAportacionPatrono'],
							'ValorTAportaciones' => $arrayDGASE['ValorTAportaciones'],
							'ValorTAportesAEmpleadosAJornadaCompleta' => $arrayDGASE['ValorTAportesAEmpleadosAJornadaCompleta'],
							'ValorTPagadoAEmpleadosPorVacacionesNoTomadasEnMenosDeAnio' => $arrayDGASE['ValorTPagadoAEmpleadosPorVacacionesNoTomadasEnMenosDeAnio'],
							'ValorTPagadoPorVacaciones' => $arrayDGASE['ValorTPagadoPorVacaciones'],
							'ValorTPagadoDecimoTercero' => $arrayDGASE['ValorTPagadoDecimoTercero'],
							'ValorTProvisionAnio' => $arrayDGASE['ValorTProvisionAnio'],
							'ValorTPorPagarProvisionDecimoTercero' => $arrayDGASE['ValorTPorPagarProvisionDecimoTercero'],
							'ValorTPagadoDecimoCuarto' => $arrayDGASE['ValorTPagadoDecimoCuarto'],
							'ValorTFondoReservaPagadoMensual' => $arrayDGASE['ValorTFondoReservaPagadoMensual'],
							'ValorTFondoReserva' => $arrayDGASE['ValorTFondoReserva'],
							'ValorTPasivos' => $arrayDGASE['ValorTPasivos'],
							'ValorTPatrimonio' => $arrayDGASE['ValorTPatrimonio'],
							'ValorTCapitalSocialAnioAterior' => $arrayDGASE['ValorTCapitalSocialAnioAterior'],
							'ValorTCapitalSocial' => $arrayDGASE['ValorTCapitalSocial'],
							'ValorTPatrimonioTecnicoConstituido' => $arrayDGASE['ValorTPatrimonioTecnicoConstituido'],
							'ValorTPatrimonioTecnicoRequerido' => $arrayDGASE['ValorTPatrimonioTecnicoRequerido'],
							'UtilidadTEjercicio' => $arrayDGASE['UtilidadTEjercicio'],
							'ValorTReservaLegal' => $arrayDGASE['ValorTReservaLegal'],
							'ValorTReserva' => $arrayDGASE['ValorTReserva'],
							'ValorTActivosCorriente' => $arrayDGASE['ValorTActivosCorriente'],
							'ValorTPasivosCorriente' => $arrayDGASE['ValorTPasivosCorriente'],
							'ValorTAtribuidoAlEstadoPorOrganismosDeControl' => $arrayDGASE['ValorTAtribuidoAlEstadoPorOrganismosDeControl'],
							'FechaSistema' => $arrayDGASE['FechaSistema'],
							'IdEmpresa' => $arrayDGASE['IdEmpresa']
							);
							*/
		$this->db->trans_start();
		$insert = $this->db->insert('DatosGeneralesAnualSeccE', $arrayDGASE);
		$this->db->trans_complete();
		if($insert){
			return true;
		}else{
			return false;
		}		
	}
	public function getListDatosGeneralesAnualSeccE($IdEmpresa){
		$this->db->order_by("IdDGASE", "DESC");
		$resultado = $this->db->where('IdEmpresa',$IdEmpresa)->get('DatosGeneralesAnualSeccE');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getDatosGeneralesAnualSeccE($IdDGASE, $IdEmpresa){
		$this->db->where('IdDGASE', $IdDGASE)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('DatosGeneralesAnualSeccE');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;		
	}
	public function updateDatosGeneralesAnualSeccE($IdDGASE, $arrayDGASE, $IdEmpresa){
		/*
		$updateDGASE = array('MontoTGastoEnInformarSobreAsambleas' => $arrayDGASE['MontoTGastoEnInformarSobreAsambleas'],
							'GastoTotalDeOrganizacion' => $arrayDGASE['GastoTotalDeOrganizacion'],
							'MontoTGastoEnInformarSobreConsejoAdministracion' => $arrayDGASE['MontoTGastoEnInformarSobreConsejoAdministracion'],
							'MontoTGastoEnInformarSobreOtraInformacion' => $arrayDGASE['MontoTGastoEnInformarSobreOtraInformacion'],
							'ValorTActivos' => $arrayDGASE['ValorTActivos'],
							'CostoComprobanteVentaRetencionAntesFacturacionElectronica' => $arrayDGASE['CostoComprobanteVentaRetencionAntesFacturacionElectronica'],
							'CostoComprobanteVentaRetencionDespuesFacturaElectronica' => $arrayDGASE['CostoComprobanteVentaRetencionDespuesFacturaElectronica'],
							'GastoTGasolinaEnEnvioProductosServicios' => $arrayDGASE['GastoTGasolinaEnEnvioProductosServicios'],
							'GastoTMultasNormasAmbientales' => $arrayDGASE['GastoTMultasNormasAmbientales'],
							'GastoTEquipamiento' => $arrayDGASE['GastoTEquipamiento'],
							'GastoTAsignadoAEliminarResiduo' => $arrayDGASE['GastoTAsignadoAEliminarResiduo'],
							'GastoTLimpieza' => $arrayDGASE['GastoTLimpieza'],
							'ValorTAportacionEmpleados' => $arrayDGASE['ValorTAportacionEmpleados'],
							'ValorTAportacionPatrono' => $arrayDGASE['ValorTAportacionPatrono'],
							'ValorTAportaciones' => $arrayDGASE['ValorTAportaciones'],
							'ValorTAportesAEmpleadosAJornadaCompleta' => $arrayDGASE['ValorTAportesAEmpleadosAJornadaCompleta'],
							'ValorTPagadoAEmpleadosPorVacacionesNoTomadasEnMenosDeAnio' => $arrayDGASE['ValorTPagadoAEmpleadosPorVacacionesNoTomadasEnMenosDeAnio'],
							'ValorTPagadoPorVacaciones' => $arrayDGASE['ValorTPagadoPorVacaciones'],
							'ValorTPagadoDecimoTercero' => $arrayDGASE['ValorTPagadoDecimoTercero'],
							'ValorTProvisionAnio' => $arrayDGASE['ValorTProvisionAnio'],
							'ValorTPorPagarProvisionDecimoTercero' => $arrayDGASE['ValorTPorPagarProvisionDecimoTercero'],
							'ValorTPagadoDecimoCuarto' => $arrayDGASE['ValorTPagadoDecimoCuarto'],
							'ValorTFondoReservaPagadoMensual' => $arrayDGASE['ValorTFondoReservaPagadoMensual'],
							'ValorTFondoReserva' => $arrayDGASE['ValorTFondoReserva'],
							'ValorTPasivos' => $arrayDGASE['ValorTPasivos'],
							'ValorTPatrimonio' => $arrayDGASE['ValorTPatrimonio'],
							'ValorTCapitalSocialAnioAterior' => $arrayDGASE['ValorTCapitalSocialAnioAterior'],
							'ValorTCapitalSocial' => $arrayDGASE['ValorTCapitalSocial'],
							'ValorTPatrimonioTecnicoConstituido' => $arrayDGASE['ValorTPatrimonioTecnicoConstituido'],
							'ValorTPatrimonioTecnicoRequerido' => $arrayDGASE['ValorTPatrimonioTecnicoRequerido'],
							'UtilidadTEjercicio' => $arrayDGASE['UtilidadTEjercicio'],
							'ValorTReservaLegal' => $arrayDGASE['ValorTReservaLegal'],
							'ValorTReserva' => $arrayDGASE['ValorTReserva'],
							'ValorTActivosCorriente' => $arrayDGASE['ValorTActivosCorriente'],
							'ValorTPasivosCorriente' => $arrayDGASE['ValorTPasivosCorriente'],
							'ValorTAtribuidoAlEstadoPorOrganismosDeControl' => $arrayDGASE['ValorTAtribuidoAlEstadoPorOrganismosDeControl'],
							'FechaSistema' => $arrayDGASE['FechaSistema'],
							'IdEmpresa' => $arrayDGASE['IdEmpresa']
							);
							*/
		$this->db->trans_start();
		$this->db->where('IdDGASE', $IdDGASE)->where("IdEmpresa", $IdEmpresa);
		$update = $this->db->update('DatosGeneralesAnualSeccE', $arrayDGASE);
		$this->db->trans_complete();
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function deleteDatosGeneralesAnualSeccE($IdDGASE, $IdEmpresa){
		$this->db->where('IdDGASE', $IdDGASE)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('DatosGeneralesAnualSeccE');
	}


}




 ?>