<?php 

/**
* 
*/
class Representante_Modelo extends CI_Model{
	
	function __construct(){
		# code...
	}
	public function insertRepresentante($arrayRepresentante){
		//Especificar los campos de cada dato del array
		$Representante = array('CedulaRepresentante' => $arrayRepresentante['CedulaRepresentante'],
							  'NombresRepresentante' => $arrayRepresentante['NombresRepresentante'],
							  'ApellidoPaternoRepresentante' => $arrayRepresentante['ApellidoPaternoRepresentante'],
							  'ApellidoMaternoRepresentante' => $arrayRepresentante['ApellidoMaternoRepresentante'],
							  'FNacimientoRepresentante' => $arrayRepresentante['FNacimientoRepresentante'],
							  'SexoRepresentante' => $arrayRepresentante['SexoRepresentante'],
							  'EtniaRepresentante' => $arrayRepresentante['EtniaRepresentante'],
							  'IdOrganismo' => $arrayRepresentante['IdOrganismo'],
							  'Organismo' => $arrayRepresentante['Organismo'],
							  'FechaInicioPeriodo' => $arrayRepresentante['FechaInicioPeriodo'],
							  'FechaFinPeriodo' => $arrayRepresentante['FechaFinPeriodo'],
							  'Cargo' => $arrayRepresentante['Cargo'],
							  'Funciones' => $arrayRepresentante['Funciones'],
							  'IdEmpresa' => $arrayRepresentante['IdEmpresa']
							  );
		$this->db->trans_start();
		$insert = $this->db->insert('Representantes',$Representante);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}
	}
	public function getListRepresentante($IdEmpresa){
		$resultado = $this->db->where('IdEmpresa',$IdEmpresa)->order_by("ApellidoPaternoRepresentante","ASC")->get('Representantes');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getRepresentante($IdRepresentante, $IdEmpresa){
		$resultado = $this->db->where('IdRepresentante', $IdRepresentante)->where('IdEmpresa',$IdEmpresa);
		$resultado = $this->db->get('Representantes');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updateRepresentante($IdRepresentante, $arrayRepresentante, $IdEmpresa){
		//Especificar los campos de cada dato del array
		$Representante = array('CedulaRepresentante' => $arrayRepresentante['CedulaRepresentante'],
							  'NombresRepresentante' => $arrayRepresentante['NombresRepresentante'],
							  'ApellidoPaternoRepresentante' => $arrayRepresentante['ApellidoPaternoRepresentante'],
							  'ApellidoMaternoRepresentante' => $arrayRepresentante['ApellidoMaternoRepresentante'],
							  'FNacimientoRepresentante' => $arrayRepresentante['FNacimientoRepresentante'],
							  'SexoRepresentante' => $arrayRepresentante['SexoRepresentante'],
							  'EtniaRepresentante' => $arrayRepresentante['EtniaRepresentante'],
							  'IdOrganismo' => $arrayRepresentante['IdOrganismo'],
							  'Organismo' => $arrayRepresentante['Organismo'],
							  'FechaInicioPeriodo' => $arrayRepresentante['FechaInicioPeriodo'],
							  'FechaFinPeriodo' => $arrayRepresentante['FechaFinPeriodo'],
							  'Cargo' => $arrayRepresentante['Cargo'],
							  'Funciones' => $arrayRepresentante['Funciones'],
							  'IdEmpresa' => $arrayRepresentante['IdEmpresa']
							  );
		$this->db->trans_start();
		$this->db->where('IdRepresentante', $IdRepresentante)->where('IdEmpresa', $IdEmpresa);
		$update = $this->db->update('Representantes',$Representante);
		$this->db->trans_complete();
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function deleteRepresentante($IdRepresentante, $IdEmpresa){
		$this->db->where('IdRepresentante', $IdRepresentante)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('Representantes');
	}
	/**
	 * [insertRepresentante description]
	 * @param  [type] $arrayRepresentante [description]
	 * @return [type]                    [description]
	 */
	public function insertRepresentanteOrganismo($arrayRepresentanteOrganismo){
		//Especificar los campos de cada dato del array
		$Representante_Organismo = array(
						  'IdRepresentante' => $arrayRepresentanteOrganismo['IdRepresentante'],
						  'IdOrganismo' => $arrayRepresentanteOrganismo['IdOrganismo'],
						  'FechaPeriodoInicio' => $arrayRepresentanteOrganismo['FechaPeriodoInicio'],
						  'FechaPeriodoFinaliza' => $arrayRepresentanteOrganismo['FechaPeriodoFinaliza'],
						  'IdEmpresa' => $arrayRepresentanteOrganismo['IdEmpresa']
						  );
		$this->db->trans_start();
		$insert = $this->db->insert('Representante_Organismo',$Representante_Organismo);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}
	}
	public function getListRepresentanteOrganismo($IdEmpresa){
		$resultado = $this->db->where('IdEmpresa',$IdEmpresa)->get('Representante_Organismo');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getListRepresentanteOrganismoPeriodo($Periodo, $IdEmpresa){
		$sql = "SELECT R.NombresRepresentante, R.ApellidoPaternoRepresentante, R.ApellidoMaternoRepresentante, R.Funciones, O.NombreOrganismo FROM Representantes R, Organismos O WHERE R.IdOrganismo = O.IdOrganismo AND O.NombreOrganismo IN('Nivel Ejecutivo', 'Nivel Operativo', 'Nivel Gerencial') AND YEAR(R.FechaInicioPeriodo) <= ".$Periodo." AND YEAR(R.FechaFinPeriodo) >= ".$Periodo." AND R.IdEmpresa = ".$IdEmpresa." ORDER BY O.NombreOrganismo DESC LIMIT 6;";
		$resultado = $this->db->query($sql);
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getRepresentanteOrganismo($IdRepOrg, $IdEmpresa){
		$resultado = $this->db->where('IdRepOrg', $IdRepOrg)->where('IdEmpresa',$IdEmpresa);
		$resultado = $this->db->get('Representante_Organismo');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updateRepresentanteOrganismo($IdRepOrg, $arrayRepresentanteOrganismo){
		//Especificar los campos de cada dato del array
		$Representante_Organismo = array(
					'IdRepresentante' => $arrayRepresentanteOrganismo['IdRepresentante'],
				  	'IdOrganismo' => $arrayRepresentanteOrganismo['IdOrganismo'],
				  	'FechaPeriodoInicio' => $arrayRepresentanteOrganismo['FechaPeriodoInicio'],
					'FechaPeriodoFinaliza' => $arrayRepresentanteOrganismo['FechaPeriodoFinaliza'],
					'IdEmpresa' => $arrayRepresentanteOrganismo['IdEmpresa']
						  );
		$this->db->trans_start();
		$this->db->where('IdRepOrg', $IdRepOrg);
		$update = $this->db->update('Representante_Organismo',$Representante_Organismo);
		$this->db->trans_complete();		
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function deleteRepresentanteOrganismo($IdRepOrg, $IdEmpresa){
		$this->db->where('IdRepOrg', $IdRepOrg)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('Representante_Organismo');
	}

}


 ?>