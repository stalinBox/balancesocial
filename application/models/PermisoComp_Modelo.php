<?php 
/**
* 
*/
class PermisoComp_Modelo extends CI_Model{
	
	function __construct(){
		# code...
	}


	//CAMBIAR POR LA DE ARRIBA PARA QUE MUESTRE EL NOMBRE Y NO LOS CODIGOS
	public function getListPermisoComponentes($IdEmpresa){
		$resultado = $this->db->select('*, pf.Nombre as nomPerfil')
		->from('permiso_components as pc')
		->join('components as c','pc.IdComponents = c.IdComponents','inner')
		->join('permiso_rol as pr','pc.IdPermisoRol = pr.IdPermisoRol','inner')
		->join('perfil as pf','pr.IdPerfil = pf.IdPerfil','inner')
		->join('tablasfunciones as tf','pr.IdTabla = tf.IdTabla','inner')
		->where('c.IdEmpresa',$IdEmpresa)
		->where('pc.IdEmpresa',$IdEmpresa)
		->get();

		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}	

	public function getOneEditPermisoComponente($IdPermisoComp, $IdEmpresa){
		$query = $this->db->where('IdPermisoComp',$IdPermisoComp)->where('IdEmpresa', $IdEmpresa)->get('permiso_components');
		if($query->num_rows() > 0 ){
			return $query->result();
		}else{
			return false;
		}
	}

	public function insertPermisoComponente($arrayComponente){
		$permisocomponents = array('IdPermisoRol' => $arrayComponente['selectPerfil'],
						 'IdComponents' => $arrayComponente['selectIdComponent'],
						 'Habilitar' => $arrayComponente['selectHabilitar'],
						 'IdEmpresa' => $arrayComponente['idEmpresa'] );
		$this->db->trans_start();
		$insert = $this->db->insert('permiso_components',$permisocomponents);
		$IdInsert = $this->db->insert_id(); 
		$this->db->trans_complete();		
		if($insert){
			return $IdInsert;
		}else{
			return false;
		}		
	}

	public function updatePermisoComponente($arrayComponente, $IdPermisoComp){
		//Especificar los campos de cada dato del array
		$permisocomponents = array('IdPermisoRol' => $arrayComponente['selectPerfil'],
						 'IdComponents' => $arrayComponente['selectIdComponent'],
						 'Habilitar' => $arrayComponente['selectHabilitar'],
						 'IdEmpresa' => $arrayComponente['idEmpresa'] );
		$this->db->trans_start();
		$this->db->where('IdPermisoComp', $IdPermisoComp);
		$update = $this->db->update('permiso_components',$permisocomponents);
		$this->db->trans_complete();		
		if($update){
			return true;
		}else{
			return false;
		}
	}
} ?>