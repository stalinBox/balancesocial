<?php 

/**
* 
*/
class Empleado_Modelo extends CI_Model{
	
	function __construct(){
		# code...
	}

	public function insertEmpleado($arrayEmpleado){
		//Especificar los campos de cada dato del array
		$empleado = array('CedulaEmpleado' => $arrayEmpleado['CedulaEmpleado'],
						  'NombresEmpleado' => $arrayEmpleado['NombresEmpleado'],
						  'ApellidoPaternoEmpleado' => $arrayEmpleado['ApellidoPaternoEmpleado'],
						  'ApellidoMaternoEmpleado' => $arrayEmpleado['ApellidoMaternoEmpleado'],
						  'FNacimientoEmpleado' => $arrayEmpleado['FNacimientoEmpleado'],
						  'SexoEmpleado' => $arrayEmpleado['SexoEmpleado'],
						  'EtniaEmpleado' => $arrayEmpleado['EtniaEmpleado'],
						  'Nacionalidad' => $arrayEmpleado['Nacionalidad'],
						  'RegionEmpleado' => $arrayEmpleado['RegionEmpleado'],
						  'FIngresoContratoEmpleado' => $arrayEmpleado['FIngresoContratoEmpleado'],
						  'FSalidaEmpleado' => $arrayEmpleado['FSalidaEmpleado'],
						  'FReincorporacion' => $arrayEmpleado['FReincorporacion'],
						  'FFinReincorporacion' => $arrayEmpleado['FFinReincorporacion'],
						  'SalarioEmpleado' => $arrayEmpleado['SalarioEmpleado'],
						  'TipoContrato' => $arrayEmpleado['TipoContrato'],
						  'CargoEstructural' => $arrayEmpleado['CargoEstructural'],
						  'NumClausulasContrato' => $arrayEmpleado['NumClausulasContrato'],
						  'AfiliadoIESSEmpleado' => $arrayEmpleado['AfiliadoIESSEmpleado'],
						  'DiscapacidadEmpleado' => $arrayEmpleado['DiscapacidadEmpleado'],
						  'TipoDiscapacidadEmpleado' => $arrayEmpleado['TipoDiscapacidadEmpleado'],
						  'PorcentajeDiscapacidadEmpleado' => $arrayEmpleado['PorcentajeDiscapacidadEmpleado'],
						  'CondicionDiscapacidadEmpleado' => $arrayEmpleado['CondicionDiscapacidadEmpleado'],
						  'InstruccionEmpleado' => $arrayEmpleado['InstruccionEmpleado'],
						  'EstadoLaboralEmpleado' => $arrayEmpleado['EstadoLaboralEmpleado'],
						  'RevisorCVEmpleado' => $arrayEmpleado['RevisorCVEmpleado'],
						  'PerteneceSindicato' => $arrayEmpleado['PerteneceSindicato'],
						  'IdEmpresa' => $arrayEmpleado['IdEmpresa']
						  );
		$this->db->trans_start();
		$insert = $this->db->insert('Empleado',$empleado);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}
	}

	public function getListEmpleado($IdEmpresa){
		$this->db->select('*, TIMESTAMPDIFF(YEAR, FNacimientoEmpleado, CURDATE()) AS Edad');
		$resultado = $this->db->where('IdEmpresa',$IdEmpresa)->order_by("ApellidoPaternoEmpleado","ASC")->get('Empleado');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}

	public function getEmpleado($CIEmpleado, $IdEmpresa){
		$resultado = $this->db->where('CedulaEmpleado', $CIEmpleado)->where('IdEmpresa',$IdEmpresa);
		$resultado = $this->db->get('Empleado');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}

	public function updateEmpleado($CIEmpleado, $arrayEmpleado, $IdEmpresa){
		//Especificar los campos de cada dato del array
		$empleado = array('CedulaEmpleado' => $arrayEmpleado['CedulaEmpleado'],
						  'NombresEmpleado' => $arrayEmpleado['NombresEmpleado'],
						  'ApellidoPaternoEmpleado' => $arrayEmpleado['ApellidoPaternoEmpleado'],
						  'ApellidoMaternoEmpleado' => $arrayEmpleado['ApellidoMaternoEmpleado'],
						  'FNacimientoEmpleado' => $arrayEmpleado['FNacimientoEmpleado'],
						  'SexoEmpleado' => $arrayEmpleado['SexoEmpleado'],
						  'EtniaEmpleado' => $arrayEmpleado['EtniaEmpleado'],
						  'Nacionalidad' => $arrayEmpleado['Nacionalidad'],
						  'RegionEmpleado' => $arrayEmpleado['RegionEmpleado'],
						  'FIngresoContratoEmpleado' => $arrayEmpleado['FIngresoContratoEmpleado'],
						  'FSalidaEmpleado' => $arrayEmpleado['FSalidaEmpleado'],
						  'FReincorporacion' => $arrayEmpleado['FReincorporacion'],
						  'FFinReincorporacion' => $arrayEmpleado['FFinReincorporacion'],
						  'SalarioEmpleado' => $arrayEmpleado['SalarioEmpleado'],
						  'TipoContrato' => $arrayEmpleado['TipoContrato'],
						  'CargoEstructural' => $arrayEmpleado['CargoEstructural'],
						  'NumClausulasContrato' => $arrayEmpleado['NumClausulasContrato'],
						  'AfiliadoIESSEmpleado' => $arrayEmpleado['AfiliadoIESSEmpleado'],
						  'DiscapacidadEmpleado' => $arrayEmpleado['DiscapacidadEmpleado'],
						  'TipoDiscapacidadEmpleado' => $arrayEmpleado['TipoDiscapacidadEmpleado'],
						  'PorcentajeDiscapacidadEmpleado' => $arrayEmpleado['PorcentajeDiscapacidadEmpleado'],
						  'CondicionDiscapacidadEmpleado' => $arrayEmpleado['CondicionDiscapacidadEmpleado'],
						  'InstruccionEmpleado' => $arrayEmpleado['InstruccionEmpleado'],
						  'EstadoLaboralEmpleado' => $arrayEmpleado['EstadoLaboralEmpleado'],
						  'RevisorCVEmpleado' => $arrayEmpleado['RevisorCVEmpleado'],
						  'PerteneceSindicato' => $arrayEmpleado['PerteneceSindicato'],
						  'IdEmpresa' => $arrayEmpleado['IdEmpresa']
						  );
		$this->db->trans_start();
		$this->db->where('CedulaEmpleado', $CIEmpleado)->where('IdEmpresa', $IdEmpresa);
		$update = $this->db->update('Empleado',$empleado);
		$this->db->trans_complete();		
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function deleteEmpleado($CIEmpleado, $IdEmpresa){
		$this->db->where('CedulaEmpleado', $CIEmpleado)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('Empleado');
	}


}


 ?>