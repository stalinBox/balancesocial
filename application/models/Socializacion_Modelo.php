<?php 
/**
* 
*/
class Socializacion_Modelo extends CI_Model{
	
	function __construct(){
		# code...
	}

	public function insertSocializacion($arraySocializacion){
		//Especificar los campos de cada dato del array
		$socializacion = array('SocializacionNorma' => $arraySocializacion['SocializacionNorma'],
					   		   'SocializacionResponsable' => $arraySocializacion['SocializacionResponsable'],
					   		   'SocializacionIdioma' => $arraySocializacion['SocializacionIdioma'],
					   		   'SocializacionFecha' => $arraySocializacion['SocializacionFecha'],
					   		   'SocializacionCantHoras' => $arraySocializacion['SocializacionCantHoras'],
					   		   'SocializacionCantParticipantes' => $arraySocializacion['SocializacionCantParticipantes'],
					   		   'SocializacionDenuncia' => $arraySocializacion['SocializacionDenuncia'],
					   		   'SocializacionDetalleDenuncia' => $arraySocializacion['SocializacionDetalleDenuncia'],
					   		   'SocializacionObservaciones' => $arraySocializacion['SocializacionObservaciones'],
					  		   'Empresa_idEmpresa' => $arraySocializacion['Empresa_idEmpresa']
					   		   );
		$this->db->trans_start();
		$insert = $this->db->insert('Socializacion',$socializacion);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}		
	}
	public function getListSocializacion(){
		$resultado = $this->db->get('Socializacion');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getSocializacion($idSocializacion){
		$this->where('idSocializacion', $idSocializacion);
		$resultado = $this->db->get('Socializacion');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updateSocializacion($idSocializacion, $arraySocializacion){
		//Especificar los campos de cada dato del array
		$socializacion = array('SocializacionNorma' => $arraySocializacion['SocializacionNorma'],
					   		   'SocializacionResponsable' => $arraySocializacion['SocializacionResponsable'],
					   		   'SocializacionIdioma' => $arraySocializacion['SocializacionIdioma'],
					   		   'SocializacionFecha' => $arraySocializacion['SocializacionFecha'],
					   		   'SocializacionCantHoras' => $arraySocializacion['SocializacionCantHoras'],
					   		   'SocializacionCantParticipantes' => $arraySocializacion['SocializacionCantParticipantes'],
					   		   'SocializacionDenuncia' => $arraySocializacion['SocializacionDenuncia'],
					   		   'SocializacionDetalleDenuncia' => $arraySocializacion['SocializacionDetalleDenuncia'],
					   		   'SocializacionObservaciones' => $arraySocializacion['SocializacionObservaciones'],
					  		   'Empresa_idEmpresa' => $arraySocializacion['Empresa_idEmpresa']
					   		   );
		$this->db->trans_start();
		$this->db->where('idSocializacion', $idSocializacion);
		$update = $this->db->update('Socializacion',$socializacion);
		$this->db->trans_complete();		
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function deleteSocializacion($idSocializacion){
		$this->db->where('idSocializacion', $idSocializacion);
		return $this->db->delete('Socializacion');
	}





}




 ?>