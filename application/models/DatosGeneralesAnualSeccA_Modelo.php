<?php 

/**
* 
*/
class DatosGeneralesAnualSeccA_Modelo extends CI_Model{
	
	function __construct(){
		
	}
	public function insertDatosGeneralesAnualSeccA($arrayDGASA){
		/*
		$insertDGASA = array('PorcentajeEmpleadosDiscapacitadosPorLey' => $arrayDGASA['PorcentajeEmpleadosDiscapacitadosPorLey'],
						'PIBPercapita' => $arrayDGASA['PIBPercapita'],
						'InflacionMensual' => $arrayDGASA['InflacionMensual'],
						'InflacionAnualizada' => $arrayDGASA['InflacionAnualizada'],
						'ValorSalarioMinimoMensual' => $arrayDGASA['ValorSalarioMinimoMensual'],
						'NumTDiasLaborados' => $arrayDGASA['NumTDiasLaborados'],
						'ValorCuotaIngreso' => $arrayDGASA['ValorCuotaIngreso'],
						'TEAMaximaBCE' => $arrayDGASA['TEAMaximaBCE'],
						'TEAMaximaCooperativa' => $arrayDGASA['TEAMaximaCooperativa'],
						'NumTDiasDescansoForzoso' => $arrayDGASA['NumTDiasDescansoForzoso'],
						'NumTBateriasSanitariasPorNormativa' => $arrayDGASA['NumTBateriasSanitariasPorNormativa'],
						'NumEmpleadosQueCubreLasBaterias' => $arrayDGASA['NumEmpleadosQueCubreLasBaterias'],
						'NumTDiasDescansoForzosoLaborados' => $arrayDGASA['NumTDiasDescansoForzosoLaborados'],
						'NumTHorasTrabajadas' => $arrayDGASA['NumTHorasTrabajadas'],
						'PromedioCuentasPorCobrar' => $arrayDGASA['PromedioCuentasPorCobrar'],
						'NumTProveedoresTrabajanOrganizacion' => $arrayDGASA['NumTProveedoresTrabajanOrganizacion'],
						'NumTEmpleadosGeneradosParaSocios' => $arrayDGASA['NumTEmpleadosGeneradosParaSocios'],
						'NumTPoliticasDeCotratacionDePersonal' => $arrayDGASA['NumTPoliticasDeCotratacionDePersonal'],
						'NumTContratosEnFuncionDeCV' => $arrayDGASA['NumTContratosEnFuncionDeCV'],
						'NumtSociosEnProgramaDeSeguroExequial' => $arrayDGASA['NumtSociosEnProgramaDeSeguroExequial'],
						'NumTSociosAportanAlFondoDeCesantia' => $arrayDGASA['NumTSociosAportanAlFondoDeCesantia'],
						'NumTSociosAportanAlFondoMortuorio' => $arrayDGASA['NumTSociosAportanAlFondoMortuorio'],
						'NumTSociosAportanAlFondoDeEmpleadosOCooperativa' => $arrayDGASA['NumTSociosAportanAlFondoDeEmpleadosOCooperativa'],
						'NumTSociosAportanAlFondoDeAccidenteOCalamidades' => $arrayDGASA['NumTSociosAportanAlFondoDeAccidenteOCalamidades'],
						'NumTPracticantesRequeridos' => $arrayDGASA['NumTPracticantesRequeridos'],
						'NumTRepresentantesEmpadronados' => $arrayDGASA['NumTRepresentantesEmpadronados'],
						'CantTKwhEnergiaUtilizadaRenovable' => $arrayDGASA['CantTKwhEnergiaUtilizadaRenovable'],
						'CantTKwhEnergiaRenovableNoRenovable' => $arrayDGASA['CantTKwhEnergiaRenovableNoRenovable'],
						'CantTm3Reutilizada' => $arrayDGASA['CantTm3Reutilizada'],
						'NumTAccidentes5Anios' => $arrayDGASA['NumTAccidentes5Anios'],
						'FechaSistema' => $arrayDGASA['FechaSistema'],
						'IdEmpresa' => $arrayDGASA['IdEmpresa']
						);
		*/
		$this->db->trans_start();
		$insert = $this->db->insert('DatosGeneralesAnualSeccA', $arrayDGASA);
		$this->db->trans_complete();
		if($insert){
			return true;
		}else{
			return false;
		}		
	}
		public function getListDatosGeneralesAnualSeccA($IdEmpresa){
		$this->db->order_by("IdDGASA", "DESC");
		$resultado = $this->db->where('IdEmpresa',$IdEmpresa)->get('DatosGeneralesAnualSeccA');		
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getDatosGeneralesAnualSeccA($IdDGASA, $IdEmpresa){
		$this->db->where('IdDGASA', $IdDGASA)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('DatosGeneralesAnualSeccA');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;		
	}
	public function updateDatosGeneralesAnualSeccA($IdDGASA, $arrayDGASA, $IdEmpresa){
		/*
		$updateDGASA = array('PorcentajeEmpleadosDiscapacitadosPorLey' => $arrayDGASA['PorcentajeEmpleadosDiscapacitadosPorLey'],
						'PIBPercapita' => $arrayDGASA['PIBPercapita'],
						'InflacionMensual' => $arrayDGASA['InflacionMensual'],
						'InflacionAnualizada' => $arrayDGASA['InflacionAnualizada'],
						'ValorSalarioMinimoMensual' => $arrayDGASA['ValorSalarioMinimoMensual'],
						'NumTDiasLaborados' => $arrayDGASA['NumTDiasLaborados'],
						'ValorCuotaIngreso' => $arrayDGASA['ValorCuotaIngreso'],
						'TEAMaximaBCE' => $arrayDGASA['TEAMaximaBCE'],
						'TEAMaximaCooperativa' => $arrayDGASA['TEAMaximaCooperativa'],
						'NumTDiasDescansoForzoso' => $arrayDGASA['NumTDiasDescansoForzoso'],
						'NumTBateriasSanitariasPorNormativa' => $arrayDGASA['NumTBateriasSanitariasPorNormativa'],
						'NumEmpleadosQueCubreLasBaterias' => $arrayDGASA['NumEmpleadosQueCubreLasBaterias'],
						'NumTDiasDescansoForzosoLaborados' => $arrayDGASA['NumTDiasDescansoForzosoLaborados'],
						'NumTHorasTrabajadas' => $arrayDGASA['NumTHorasTrabajadas'],
						'PromedioCuentasPorCobrar' => $arrayDGASA['PromedioCuentasPorCobrar'],
						'NumTProveedoresTrabajanOrganizacion' => $arrayDGASA['NumTProveedoresTrabajanOrganizacion'],
						'NumTEmpleadosGeneradosParaSocios' => $arrayDGASA['NumTEmpleadosGeneradosParaSocios'],
						'NumTPoliticasDeCotratacionDePersonal' => $arrayDGASA['NumTPoliticasDeCotratacionDePersonal'],
						'NumTContratosEnFuncionDeCV' => $arrayDGASA['NumTContratosEnFuncionDeCV'],
						'NumtSociosEnProgramaDeSeguroExequial' => $arrayDGASA['NumtSociosEnProgramaDeSeguroExequial'],
						'NumTSociosAportanAlFondoDeCesantia' => $arrayDGASA['NumTSociosAportanAlFondoDeCesantia'],
						'NumTSociosAportanAlFondoMortuorio' => $arrayDGASA['NumTSociosAportanAlFondoMortuorio'],
						'NumTSociosAportanAlFondoDeEmpleadosOCooperativa' => $arrayDGASA['NumTSociosAportanAlFondoDeEmpleadosOCooperativa'],
						'NumTSociosAportanAlFondoDeAccidenteOCalamidades' => $arrayDGASA['NumTSociosAportanAlFondoDeAccidenteOCalamidades'],
						'NumTPracticantesRequeridos' => $arrayDGASA['NumTPracticantesRequeridos'],
						'NumTRepresentantesEmpadronados' => $arrayDGASA['NumTRepresentantesEmpadronados'],
						'CantTKwhEnergiaUtilizadaRenovable' => $arrayDGASA['CantTKwhEnergiaUtilizadaRenovable'],
						'CantTKwhEnergiaRenovableNoRenovable' => $arrayDGASA['CantTKwhEnergiaRenovableNoRenovable'],
						'CantTm3Reutilizada' => $arrayDGASA['CantTm3Reutilizada'],
						'NumTAccidentes5Anios' => $arrayDGASA['NumTAccidentes5Anios'],
						'FechaSistema' => $arrayDGASA['FechaSistema'],
						'IdEmpresa' => $arrayDGASA['IdEmpresa']
						);
		*/
		$this->db->trans_start();
		$this->db->where('IdDGASA', $IdDGASA)->where('IdEmpresa', $IdEmpresa);
		$update = $this->db->update('DatosGeneralesAnualSeccA', $arrayDGASA);
		$this->db->trans_complete();
		if($update){
			return true;
		}else{
			return false;
		}

	}
	public function deleteDatosGeneralesAnualSeccA($IdDGASA, $IdEmpresa){
		$this->db->where('IdDGASA', $IdDGASA)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('DatosGeneralesAnualSeccA');
	}

}




 ?>