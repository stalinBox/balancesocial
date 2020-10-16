<?php  
/**
* 
*/
class Consejo_Modelo extends CI_Model{
	
	function __construct()
	{
		# code...
	}

	// MODELO PARA MIGRAR
	public function getListConsejoAnio($IdEmpresa){
		$this->db->select('*');
		$this->db->where('IdEmpresa',$IdEmpresa);
		$resultado = $this->db->get('Consejos');
		if($resultado->num_rows() > 0)
			return $resultado;
		else
			return false;
	}

	public function insertConsejoSelectedMigrar($IdEmpresa, $periodo, $lista){
		$query = "INSERT INTO `consejos`(`NombreConsejos`, `TipoConsejos`, `IntegrantesConsejos`, `NumeroHombres`, `NumeroMujeres`, `FuncionConsejos`, `ImagenConsejos`, `Periodo`, `FechaSistema`, `IdEmpresa`) 
				SELECT `NombreConsejos`, `TipoConsejos`, `IntegrantesConsejos`, `NumeroHombres`, `NumeroMujeres`, `FuncionConsejos`, `ImagenConsejos`, ".$periodo.", `FechaSistema`, ".$IdEmpresa." FROM `consejos` WHERE `IdConsejos` IN (".$lista.")";

		$insert = $this->db->query($query); 
		
		if($insert){
			return true;
		}else{
			return false;
		}	
	}

	public function getListAniosConsejo($IdEmpresa){
		$this->db->distinct('Periodo');
		$this->db->select('Periodo');
		$this->db->where('IdEmpresa',$IdEmpresa);
		$resultado = $this->db->get('Consejos');

		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	// FIN MODELO PARA MIGRAR

	public function insertConsejo($arrayConsejo){
		$sql = "INSERT INTO Consejos(IdConsejos, NombreConsejos, TipoConsejos, IntegrantesConsejos, NumeroHombres, NumeroMujeres, FuncionConsejos, ImagenConsejos, Periodo, FechaSistema, IdEmpresa) VALUES (null, '".$arrayConsejo['NombreConsejos']."','".$arrayConsejo['TipoConsejos']."','".$arrayConsejo['IntegrantesConsejos']."','".$arrayConsejo['NumeroHombres']."','".$arrayConsejo['NumeroMujeres']."','".$arrayConsejo['FuncionConsejos']."','".$arrayConsejo['ImagenConsejos']."','".$arrayConsejo['Periodo']."','".$arrayConsejo['FechaSistema']."','".$arrayConsejo['IdEmpresa']."');";

		$this->db->trans_start();
		//$insert = $this->db->insert('Consejos',$consejo);
		$insert = $this->db->query($sql);
		$this->db->trans_complete();
		if($insert){
			return true;
		}else{
			return false;
		}
	}
	public function getListConsejo($IdEmpresa){
		$resultado = $this->db->where('IdEmpresa',$IdEmpresa)->get('Consejos');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}	

	public function getConsejo($IdConsejos, $IdEmpresa){
		$this->db->where('IdConsejos', $IdConsejos)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('Consejos');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function getConsejoAdministracionPeriodo($Periodo, $IdEmpresa){
		$this->db->order_by('FechaSistema desc');
		$this->db->limit(1);
		$this->db->where('Periodo', $Periodo)->where('IdEmpresa', $IdEmpresa)->where('TipoConsejos',"Consejo de Administración");
		$resultado = $this->db->get('Consejos');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function getConsejoVigilanciaPeriodo($Periodo, $IdEmpresa){
		$this->db->order_by('FechaSistema desc');
		$this->db->limit(1);
		$this->db->where('Periodo', $Periodo)->where('IdEmpresa', $IdEmpresa)->where('TipoConsejos',"Consejo de Vigilancia");
		$resultado = $this->db->get('Consejos');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updateConsejo($IdConsejos, $arrayConsejo, $IdEmpresa){
		/*
		$consejo = array('NombreConsejos' => $arrayConsejo['NombreConsejos'],
						 'TipoConsejos' => $arrayConsejo['TipoConsejos'],
						 'IntegrantesConsejos' => $arrayConsejo['IntegrantesConsejos'],
						 'NumeroHombres' => $arrayConsejo['NumeroHombres'],
						 'NumeroMujeres' => $arrayConsejo['NumeroMujeres'],
						 'FuncionConsejos' => $arrayConsejo['FuncionConsejos'],
						 'ImagenConsejos' => $arrayConsejo['ImagenConsejos'],
						 'Perioo' => $arrayConsejo['Perioo'],			 
						 'FechaSistema' => $arrayConsejo['FechaSistema'],			 
						 'IdEmpresa' => $arrayConsejo['IdEmpresa']				 
						 );	
		*/
		if ($arrayConsejo['ImagenConsejos'] == "") {
			$sql = "UPDATE Consejos SET NombreConsejos = '".$arrayConsejo['NombreConsejos']."',TipoConsejos = '".$arrayConsejo['TipoConsejos']."',IntegrantesConsejos = '".$arrayConsejo['IntegrantesConsejos']."',NumeroHombres = '".$arrayConsejo['NumeroHombres']."',NumeroMujeres = '".$arrayConsejo['NumeroMujeres']."',FuncionConsejos = '".$arrayConsejo['FuncionConsejos']."', Periodo = '".$arrayConsejo['Periodo']."',FechaSistema = '".$arrayConsejo['FechaSistema']."' WHERE IdConsejos = '".$IdConsejos."' AND IdEmpresa = '".$IdEmpresa."';";
		}else{
			$sql = "UPDATE Consejos SET NombreConsejos = '".$arrayConsejo['NombreConsejos']."',TipoConsejos = '".$arrayConsejo['TipoConsejos']."',IntegrantesConsejos = '".$arrayConsejo['IntegrantesConsejos']."',NumeroHombres = '".$arrayConsejo['NumeroHombres']."',NumeroMujeres = '".$arrayConsejo['NumeroMujeres']."',FuncionConsejos = '".$arrayConsejo['FuncionConsejos']."',ImagenConsejos = '".$arrayConsejo['ImagenConsejos']."',Periodo = '".$arrayConsejo['Periodo']."',FechaSistema = '".$arrayConsejo['FechaSistema']."' WHERE IdConsejos = '".$IdConsejos."' AND IdEmpresa = '".$IdEmpresa."';";
		}
		$this->db->trans_start();
		//$this->db->where('IdConsejos', $IdConsejos)->where('IdEmpresa', $IdEmpresa);
		//$update = $this->db->update('Consejos', $consejo);
		$update = $this->db->query($sql);
		$this->db->trans_complete();
		if($update)
			return true;
		else
			return false;
	}

	public function deleteConsejo($IdConsejos, $IdEmpresa){
		$this->db->where('IdConsejos', $IdConsejos)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('Consejos');
	}
}

?>