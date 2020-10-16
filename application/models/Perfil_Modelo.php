<?php 
/**
* 
*/
class Perfil_Modelo extends CI_Model{
	
	function __construct(){
		# code...
	}

	public function insertPerfil($arrayPerfil){
		//Especificar los campos de cada dato del array
		$Perfil = array('Nombre' => $arrayPerfil['Nombre'],
					 	'Observacion' => $arrayPerfil['Observacion'],
					 	'IdEmpresa' => $arrayPerfil['IdEmpresa']
					 );
		$this->db->trans_start();
		$insert = $this->db->insert('Perfil',$Perfil);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}
	}
	public function getListPerfil($IdEmpresa){
		$resultado = $this->db->where('IdEmpresa', $IdEmpresa)->get('Perfil');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}	
	
	public function getPerfil($IdPerfil, $IdEmpresa){
		$this->db->where('IdPerfil', $IdPerfil)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('Perfil');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	
	public function updatePerfil($IdPerfil, $arrayPerfil, $IdEmpresa){
		//Especificar los campos de cada dato del array
		$Perfil = array('Nombre' => $arrayPerfil['Nombre'],
					 	'Observacion' => $arrayPerfil['Observacion'],
					 	'IdEmpresa' => $arrayPerfil['IdEmpresa']
					 );
		$this->db->trans_start();
		$this->db->where('IdPerfil', $IdPerfil)->where('IdEmpresa', $IdEmpresa);
		$update = $this->db->update('Perfil',$Perfil);
		$this->db->trans_complete();		
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function deletePerfil($id, $IdEmpresa){
		$this->db->where('IdPerfil', $id)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('Perfil');
	}
	/**
	Funciones para el control de Indicadores anidados al Perfil
	*/
	public function getListPerfilIndicador($IdEmpresa){		
		$sqlPerfilIndicadores = "SELECT * FROM IndicadoresEmpresa WHERE IdEmpresa = ".$IdEmpresa." AND IdIndicador NOT IN(SELECT IdIndicador FROM Perfil_Indicador)	";
		$resultado = $this->db->query($sqlPerfilIndicadores);
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}	


}

 ?>