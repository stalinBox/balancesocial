<?php 
/**
* 
*/
class ServiciosEmpresa_Modelo extends CI_Model{
	
	function __construct(){
		# code...
	}

	public function insertServiciosEmpresa($arrayServiciosEmpresa){
		//Especificar los campos de cada dato del array
		$serviciosEmpresa = array('NombreServicios' => $arrayServiciosEmpresa['NombreServicios'],
					   			  'DescripcionServicios' => $arrayServiciosEmpresa['DescripcionServicios'],
					   			  'ObservacionServicios' => $arrayServiciosEmpresa['ObservacionServicios'],
					   			  'IdEmpresa' => $arrayServiciosEmpresa['IdEmpresa']
					   			  );
		$this->db->trans_start();
		$insert = $this->db->insert('ServiciosEmpresa',$serviciosEmpresa);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}
	}
	public function getListServiciosEmpresa($IdEmpresa){
		$this->db->where('IdEmpresa',$IdEmpresa);
		$resultado = $this->db->get('ServiciosEmpresa');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getListServiciosEmpresaSeis($IdEmpresa){
		$this->db->where('IdEmpresa',$IdEmpresa);
		$this->db->limit(4);
		$resultado = $this->db->get('ServiciosEmpresa');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getServiciosEmpresa($IdServicios, $IdEmpresa){
		$this->db->where('IdServicios', $IdServicios)->where('IdEmpresa',$IdEmpresa);
		$resultado = $this->db->get('ServiciosEmpresa');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updateServiciosEmpresa($IdServicios, $arrayServiciosEmpresa, $IdEmpresa){
		//Especificar los campos de cada dato del array
		$serviciosEmpresa = array('NombreServicios' => $arrayServiciosEmpresa['NombreServicios'],
					   			  'DescripcionServicios' => $arrayServiciosEmpresa['DescripcionServicios'],
					   			  'ObservacionServicios' => $arrayServiciosEmpresa['ObservacionServicios'],
					   			  'IdEmpresa' => $arrayServiciosEmpresa['IdEmpresa']
					   			  );
		$this->db->trans_start();
		$this->db->where('IdServicios', $IdServicios)->where('IdEmpresa', $IdEmpresa);
		$update = $this->db->update('ServiciosEmpresa',$serviciosEmpresa);
		$this->db->trans_complete();		
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function deleteServiciosEmpresa($IdServicios, $IdEmpresa){
		$this->db->where('IdServicios', $IdServicios)->where('IdEmpresa',$IdEmpresa);
		return $this->db->delete('ServiciosEmpresa');


	}

}



 ?>