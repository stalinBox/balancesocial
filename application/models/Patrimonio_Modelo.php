<?php 
/**
* 
*/
class Patrimonio_Modelo extends CI_Model{
	
	function __construct(){
		# code...
	}

	public function insertPatrimonio($arrayPatrimonio){
		//Especificar los campos de cada dato del array
		$patrimonio = array('PatrimonioCapSociActual' => $arrayPatrimonio['PatrimonioCapSociActual'],
					   		'PatrimonioCapSocAnteior' => $arrayPatrimonio['PatrimonioCapSocAnteior'],
					   		'PatrimonioCantSociosMayo' => $arrayPatrimonio['PatrimonioCantSociosMayo'],
					   		'PatrimonioCantSocisMinori' => $arrayPatrimonio['PatrimonioCantSocisMinori'],
					   		'PatrimonioAumentoXSociosNuevos' => $arrayPatrimonio['PatrimonioAumentoXSociosNuevos'],
					   		'PatrimonioTecnicoSustituido' => $arrayPatrimonio['PatrimonioTecnicoSustituido'],
					   		'PatrimonioTecnicoRequerido' => $arrayPatrimonio['PatrimonioTecnicoRequerido'],
					   		'PatrimonioFechaCorte' => $arrayPatrimonio['PatrimonioFechaCorte'],
					   		'PatrimonioCapitalizacionUtilidad' => $arrayPatrimonio['PatrimonioCapitalizacionUtilidad'],
					   		'PatrimonioUtilidadEjercicioAnterior' => $arrayPatrimonio['PatrimonioUtilidadEjercicioAnterior'],
					   		'PatrimonioUtilidadEjercicioActual' => $arrayPatrimonio['PatrimonioUtilidadEjercicioActual'],
					   		'PatrimonioReservaLegalAnterior' => $arrayPatrimonio['PatrimonioReservaLegalAnterior'],
					   		'PatrimonioReservaLegalActual' => $arrayPatrimonio['PatrimonioReservaLegalActual'],
					   		'Empresa_idEmpresa' => $arrayPatrimonio['Empresa_idEmpresa']
					   		);
		$this->db->trans_start();
		$insert = $this->db->insert('Patrimonio',$patrimonio);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}		
	}
	public function getListPatrimonio(){
		$resultado = $this->db->get('Patrimonio');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getPatrimonio($idPatrimonio){
		$this->where('idPatrimonio', $idPatrimonio);
		$resultado = $this->db->get('Patrimonio');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updatePatrimonio($idPatrimonio, $arrayPatrimonio){
		//Especificar los campos de cada dato del array
		$patrimonio = array('PatrimonioCapSociActual' => $arrayPatrimonio['PatrimonioCapSociActual'],
					   		'PatrimonioCapSocAnteior' => $arrayPatrimonio['PatrimonioCapSocAnteior'],
					   		'PatrimonioCantSociosMayo' => $arrayPatrimonio['PatrimonioCantSociosMayo'],
					   		'PatrimonioCantSocisMinori' => $arrayPatrimonio['PatrimonioCantSocisMinori'],
					   		'PatrimonioAumentoXSociosNuevos' => $arrayPatrimonio['PatrimonioAumentoXSociosNuevos'],
					   		'PatrimonioTecnicoSustituido' => $arrayPatrimonio['PatrimonioTecnicoSustituido'],
					   		'PatrimonioTecnicoRequerido' => $arrayPatrimonio['PatrimonioTecnicoRequerido'],
					   		'PatrimonioFechaCorte' => $arrayPatrimonio['PatrimonioFechaCorte'],
					   		'PatrimonioCapitalizacionUtilidad' => $arrayPatrimonio['PatrimonioCapitalizacionUtilidad'],
					   		'PatrimonioUtilidadEjercicioAnterior' => $arrayPatrimonio['PatrimonioUtilidadEjercicioAnterior'],
					   		'PatrimonioUtilidadEjercicioActual' => $arrayPatrimonio['PatrimonioUtilidadEjercicioActual'],
					   		'PatrimonioReservaLegalAnterior' => $arrayPatrimonio['PatrimonioReservaLegalAnterior'],
					   		'PatrimonioReservaLegalActual' => $arrayPatrimonio['PatrimonioReservaLegalActual'],
					   		'Empresa_idEmpresa' => $arrayPatrimonio['Empresa_idEmpresa']
					   		);
		$this->db->trans_start();
		$this->db->where('idPatrimonio', $idPatrimonio);
		$update = $this->db->update('Patrimonio',$patrimonio);
		$this->db->trans_complete();		
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function deletePatrimonio($idPatrimonio){
		$this->db->where('idPatrimonio', $idPatrimonio);
		return $this->db->delete('Patrimonio');
	}



}



 ?>