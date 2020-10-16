<?php 
/**
* 
*/
class SaludLaboral_Modelo extends CI_Model{
	
	function __construct(){
		
	}

	public function insertSaludLaboral($arraySaludLaboral){
		//Especificar los campos de cada dato del array
		$saludLaboral = array('NombreSaludL' => $arraySaludLaboral['NombreSaludL'],
					   		   'CantHorasDestinadas' => $arraySaludLaboral['CantHorasDestinadas'],
					   		   'FechaInicioSaludL' => $arraySaludLaboral['FechaInicioSaludL'],
					   		   'FechaFinSaludL' => $arraySaludLaboral['FechaFinSaludL'],
					   	   	   'CostoEmpresaSaludL' => $arraySaludLaboral['CostoEmpresaSaludL'],
					   		   'CostoEmpleadosSaludL' => $arraySaludLaboral['CostoEmpleadosSaludL'],
					   		   'EstadoSaludL' => $arraySaludLaboral['EstadoSaludL'],
					   		   'CantBeneficiadosSaludL' => $arraySaludLaboral['CantBeneficiadosSaludL'],
					   		   'ImagenSaludL' => $arraySaludLaboral['ImagenSaludL'],
					   		   'ResponsableSaludL' => $arraySaludLaboral['ResponsableSaludL'],
					   		   'DescripcionSaludL' => $arraySaludLaboral['DescripcionSaludL'],
					   		   'IdEmpresa' => $arraySaludLaboral['IdEmpresa']
					   		  );
		$this->db->trans_start();
		$insert = $this->db->insert('SaludLaboral',$saludLaboral);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}		
	}
	public function getListSaludLaboral($IdEmpresa){
		$resultado = $this->db->where('IdEmpresa',$IdEmpresa)->get('SaludLaboral');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getSaludLaboral($IdSaludLaboral, $IdEmpresa){
		$this->db->where('IdSaludLaboral', $IdSaludLaboral)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('SaludLaboral');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updateSaludLaboral($IdSaludLaboral, $arraySaludLaboral){
		//Especificar los campos de cada dato del array
		$saludLaboral = array('NombreSaludL' => $arraySaludLaboral['NombreSaludL'],
					   		   'CantHorasDestinadas' => $arraySaludLaboral['CantHorasDestinadas'],
					   		   'FechaInicioSaludL' => $arraySaludLaboral['FechaInicioSaludL'],
					   		   'FechaFinSaludL' => $arraySaludLaboral['FechaFinSaludL'],
					   	   	   'CostoEmpresaSaludL' => $arraySaludLaboral['CostoEmpresaSaludL'],
					   		   'CostoEmpleadosSaludL' => $arraySaludLaboral['CostoEmpleadosSaludL'],
					   		   'EstadoSaludL' => $arraySaludLaboral['EstadoSaludL'],
					   		   'CantBeneficiadosSaludL' => $arraySaludLaboral['CantBeneficiadosSaludL'],
					   		   'ImagenSaludL' => $arraySaludLaboral['ImagenSaludL'],
					   		   'ResponsableSaludL' => $arraySaludLaboral['ResponsableSaludL'],
					   		   'DescripcionSaludL' => $arraySaludLaboral['DescripcionSaludL'],
					   		   'IdEmpresa' => $arraySaludLaboral['IdEmpresa']
					   		  );
		$this->db->trans_start();
		$this->db->where('IdSaludLaboral', $IdSaludLaboral);
		$update = $this->db->update('SaludLaboral',$saludLaboral);
		$this->db->trans_complete();		
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function deleteSaludLaboral($IdSaludLaboral, $IdEmpresa){
		$this->db->where('IdSaludLaboral', $IdSaludLaboral)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('SaludLaboral');
	}




}




 ?>