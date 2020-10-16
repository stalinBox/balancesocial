<?php 
/**
* 
*/
class Componentes_Modelo extends CI_Model{
	
	function __construct(){
		# code...
	}

	public function getOneEditComponente($IdComponente, $IdEmpresa){
		$query = $this->db->where('IdComponents',$IdComponente)->where('IdEmpresa', $IdEmpresa)->get('components');
		if($query->num_rows() > 0 ){
			return $query->result();
		}else{
			return false;
		}
	}

	public function getListComponentes($IdEmpresa){
		$resultado = $this->db->where('IdEmpresa', $IdEmpresa)->get('components');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}	

	public function insertComponente($arrayComponente){
		//Especificar los campos de cada dato del array
		$components = array('NombComp' => $arrayComponente['txtNombreComponente'],
						 'IdComp' => $arrayComponente['txtIdComponente'],
						 'TipoComp' => $arrayComponente['cbxTipComponente'],
						 'DescComp' => $arrayComponente['txtDscComponente'],
						 'IdEmpresa' => $arrayComponente['idEmpresa']
						);
		$this->db->trans_start();
		$insert = $this->db->insert('components',$components);
		$IdInsert = $this->db->insert_id(); 
		$this->db->trans_complete();		
		if($insert){
			return $IdInsert;
		}else{
			return false;
		}		
	}

		public function updateComponente($arrayComponente, $IdComponente){
		//Especificar los campos de cada dato del array
		$components = array('NombComp' => $arrayComponente['txtNombreComponente'],
						 'IdComp' => $arrayComponente['txtIdComponente'],
						 'TipoComp' => $arrayComponente['cbxTipComponente'],
						 'DescComp' => $arrayComponente['txtDscComponente'],
						 'IdEmpresa' => $arrayComponente['idEmpresa']
						);
		$this->db->trans_start();
		$this->db->where('IdComponents', $IdComponente);
		$update = $this->db->update('components',$components);
		$this->db->trans_complete();		
		if($update){
			return true;
		}else{
			return false;
		}
	}


} ?>