<?php 

/**
* 
*/
class DesarrolloProfesional_Modelo extends CI_Model{
	
	function __construct(){
		# code...
	}

	public function insertDesarrolloProfesional($arrayDesarrolloProfesional){
		$desarrollo = array('NombreDesarrolloProfesional' => $arrayDesarrolloProfesional['NombreDesarrolloProfesional'],
						'Descripcion' => $arrayDesarrolloProfesional['Descripcion'],
						'IdEmpresa' => $arrayDesarrolloProfesional['IdEmpresa']
						);
		$this->db->trans_start();
		$insert = $this->db->insert('DesasrrolloProfesional', $desarrollo);
		$this->db->trans_complete();
		if($insert){
			return true;
		}else{
			return false;
		}		
	}
	public function getListDesarrolloProfesional($IdEmpresa){
		$resultado = $this->db->where('IdEmpresa',$IdEmpresa)->get('DesasrrolloProfesional');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getDesarrolloProfesional($IdDesarrolloProfesional, $IdEmpresa){
		$this->db->where('IdDesarrolloProfesional', $IdDesarrolloProfesional)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('DesasrrolloProfesional');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;		
	}
	public function updateDesarrolloProfesional($IdDesarrolloProfesional, $arrayDesarrolloProfesional, $IdEmpresa){
		$desarrollo = array('NombreDesarrolloProfesional' => $arrayDesarrolloProfesional['NombreDesarrolloProfesional'],
						'Descripcion' => $arrayDesarrolloProfesional['Descripcion'],
						'IdEmpresa' => $arrayDesarrolloProfesional['IdEmpresa']
						);
		$this->db->trans_start();
		$this->db->where('IdDesarrolloProfesional', $IdDesarrolloProfesional)->where('IdEmpresa', $IdEmpresa);
		$update = $this->db->update('DesasrrolloProfesional', $desarrollo);
		$this->db->trans_complete();
		if($update){
			return true;
		}else{
			return false;
		}

	}
	public function deleteDesarrolloProfesional($IdDesarrolloProfesional, $IdEmpresa){
		$this->db->where('IdDesarrolloProfesional', $IdDesarrolloProfesional)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('DesasrrolloProfesional');
	}
	/**
	 * Desarrollo profesional y empleado
	 */
	public function insertDesarrolloProfesionalEmpleado($arrayDesarrolloProfesionalEmpleado){
		$desarrolloEmpleado = array('CiEmpleado' => $arrayDesarrolloProfesionalEmpleado['CiEmpleado'],
						'DesarrolloProfesional' => $arrayDesarrolloProfesionalEmpleado['DesarrolloProfesional'],
						'HorasMes' => $arrayDesarrolloProfesionalEmpleado['HorasMes'],
						'FechaPertenece' => $arrayDesarrolloProfesionalEmpleado['FechaPertenece'],
						'Descripcion' => $arrayDesarrolloProfesionalEmpleado['Descripcion'],
						'FechaSistema' => $arrayDesarrolloProfesionalEmpleado['FechaSistema'],
						'IdEmpresa' => $arrayDesarrolloProfesionalEmpleado['IdEmpresa']
						);
		$this->db->trans_start();
		$insert = $this->db->insert('Empleado_DesarrolloProfesional', $desarrolloEmpleado);
		$this->db->trans_complete();
		if($insert){
			return true;
		}else{
			return false;
		}		
	}
	public function getListDesarrolloProfesionalEmpleado($IdEmpresa){
		$sql = "SELECT EDP.*, E.NombresEmpleado AS Nombre, E.ApellidoPaternoEmpleado AS ApellidoP, E.ApellidoMaternoEmpleado AS ApellidoM FROM Empleado_DesarrolloProfesional EDP, Empleado E WHERE EDP.CiEmpleado = E.CedulaEmpleado AND EDP.IdEmpresa = ".$IdEmpresa.";";
		//$resultado = $this->db->where('IdEmpresa',$IdEmpresa)->get('Empleado_DesarrolloProfesional');
		$resultado = $this->db->query($sql);
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getDesarrolloProfesionalEmpleado($IdEmpleadoDesarrollo, $IdEmpresa){
		$this->db->where('IdEmpleadoDesarrollo', $IdEmpleadoDesarrollo)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('Empleado_DesarrolloProfesional');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;		
	}
	public function updateDesarrolloProfesionalEmpleado($IdEmpleadoDesarrollo, $arrayDesarrolloProfesionalEmpleado){
		$desarrolloEmpleado = array('CiEmpleado' => $arrayDesarrolloProfesionalEmpleado['CiEmpleado'],
						'DesarrolloProfesional' => $arrayDesarrolloProfesionalEmpleado['DesarrolloProfesional'],
						'HorasMes' => $arrayDesarrolloProfesionalEmpleado['HorasMes'],
						'FechaPertenece' => $arrayDesarrolloProfesionalEmpleado['FechaPertenece'],
						'Descripcion' => $arrayDesarrolloProfesionalEmpleado['Descripcion'],
						'FechaSistema' => $arrayDesarrolloProfesionalEmpleado['FechaSistema'],
						'IdEmpresa' => $arrayDesarrolloProfesionalEmpleado['IdEmpresa']
						);
		$this->db->trans_start();
		$this->db->where('IdEmpleadoDesarrollo', $IdEmpleadoDesarrollo);
		$update = $this->db->update('Empleado_DesarrolloProfesional', $desarrolloEmpleado);
		$this->db->trans_complete();
		if($update){
			return true;
		}else{
			return false;
		}

	}
	public function deleteDesarrolloProfesionalEmpleado($IdEmpleadoDesarrollo, $IdEmpresa){
		$this->db->where('IdEmpleadoDesarrollo', $IdEmpleadoDesarrollo)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('Empleado_DesarrolloProfesional');
	}





}




 ?>