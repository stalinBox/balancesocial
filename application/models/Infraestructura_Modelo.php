<?php 
/**
* 
*/
class Infraestructura_Modelo extends CI_Model{
	
	function __construct(){
		# code...
	}

	public function insertInfraestructura($arrayInfraestructura){
		//Especificar los campos de cada dato del array
		$infraestructura = array('InfraestructuraRuc' => $arrayInfraestructura['InfraestructuraRuc'],
								 'InfraestructuraProveedor' => $arrayInfraestructura['InfraestructuraProveedor'],
								 'InfraestructuraFInicio' => $arrayInfraestructura['InfraestructuraFInicio'],
								 'InfraestructuraFFin' => $arrayInfraestructura['InfraestructuraFFin'],
								 'InfraestructuraCosto' => $arrayInfraestructura['InfraestructuraCosto'],
								 'Empresa_idEmpresa' => $arrayInfraestructura['Empresa_idEmpresa']
								 );
		$this->db->trans_start();
		$insert = $this->db->insert('Infraestructura',$infraestructura);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}		
	}
	public function getListInfraestructura(){
		$resultado = $this->db->get('Infraestructura');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getInfraestructura($idInfraestructura){
		$this->where('idInfraestructura', $idInfraestructura);
		$resultado = $this->db->get('Infraestructura');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updateInfraestructura($idInfraestructura, $arrayInfraestructura){
		//Especificar los campos de cada dato del array
		$infraestructura = array('InfraestructuraRuc' => $arrayInfraestructura['InfraestructuraRuc'],
								 'InfraestructuraProveedor' => $arrayInfraestructura['InfraestructuraProveedor'],
								 'InfraestructuraFInicio' => $arrayInfraestructura['InfraestructuraFInicio'],
								 'InfraestructuraFFin' => $arrayInfraestructura['InfraestructuraFFin'],
								 'InfraestructuraCosto' => $arrayInfraestructura['InfraestructuraCosto'],
								 'Empresa_idEmpresa' => $arrayInfraestructura['Empresa_idEmpresa']
								 );
		$this->db->trans_start();
		$this->db->where('idInfraestructura', $idInfraestructura);
		$update = $this->db->update('Infraestructura',$infraestructura);
		$this->db->trans_complete();		
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function deleteInfraestructura($idInfraestructura){
		$this->db->where('idInfraestructura', $idInfraestructura);
		return $this->db->delete('Infraestructura');
	}



}




 ?>