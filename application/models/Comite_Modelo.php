<?php 

/**
* 
*/
class Comite_Modelo extends CI_Model{
	
	function __construct(){
		# code...
	}

	// MODELO PARA MIGRAR
	public function getListComitesAnio($IdEmpresa){
		$this->db->select('*');
		$this->db->where('IdEmpresa',$IdEmpresa);
		$resultado = $this->db->get('Comites');
		if($resultado->num_rows() > 0)
			return $resultado;
		else
			return false;
	}

	public function insertComitesSelectedMigrar($IdEmpresa, $periodo, $lista){
		$query = "INSERT INTO `comites`(`NombreComite`, `TipoComite`, `IntegrantesComite`, `FuncionComite`, `ImganenComite`, `Periodo`, `FechaSistema`, `IdEmpresa`) 
				SELECT `NombreComite`, `TipoComite`, `IntegrantesComite`, `FuncionComite`, `ImganenComite`, ".$periodo.", `FechaSistema`, ".$IdEmpresa." FROM `comites` WHERE `IdComite` IN(".$lista.")";

		$insert = $this->db->query($query); 
		
		if($insert){
			return true;
		}else{
			return false;
		}	
	}

	public function getListAniosComites($IdEmpresa){
		$this->db->distinct('Periodo');
		$this->db->select('Periodo');
		$this->db->where('IdEmpresa',$IdEmpresa);
		$resultado = $this->db->get('Comites');

		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	// FIN MODELO PARA MIGRAR

	public function insertComite($arrayComite){
		$sql = "INSERT INTO Comites(IdComite, NombreComite, TipoComite, IntegrantesComite, FuncionComite, ImganenComite, Periodo, FechaSistema, IdEmpresa) VALUES (null, '".$arrayComite['NombreComite']."' ,'".$arrayComite['TipoComite']."' ,'".$arrayComite['IntegrantesComite']."' ,'".$arrayComite['FuncionComite']."' ,'".$arrayComite['ImganenComite']."' ,'".$arrayComite['Periodo']."' ,'".$arrayComite['FechaSistema']."' ,'".$arrayComite['IdEmpresa']."');";
		$this->db->trans_start();
		//$insert = $this->db->insert('Comites', $comite);
		$insert = $this->db->query($sql);
		$this->db->trans_complete();
		if($insert){
			return true;
		}else{
			return false;
		}		
	}
	public function getListComite($IdEmpresa){
		$resultado = $this->db->where('IdEmpresa',$IdEmpresa)->get('Comites');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getListComitePeriodo($Periodo, $IdEmpresa){
		$resultado = $this->db->where('IdEmpresa',$IdEmpresa)->where('Periodo', $Periodo)->get('Comites');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getComite($IdComite, $IdEmpresa){
		$this->db->where('IdComite', $IdComite)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('Comites');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;		
	}
	public function updateComite($IdComite, $arrayComite, $IdEmpresa){
		if ($arrayComite['ImganenComite'] == "") {
			$sql = "UPDATE Comites SET NombreComite = '".$arrayComite['NombreComite']."', TipoComite = '".$arrayComite['TipoComite']."', IntegrantesComite = '".$arrayComite['IntegrantesComite']."', FuncionComite = '".$arrayComite['FuncionComite']."', Periodo = '".$arrayComite['Periodo']."', FechaSistema = '".$arrayComite['FechaSistema']."'  WHERE  IdComite = '".$IdComite."' AND IdEmpresa = '".$IdEmpresa."';";
		}else{
			$sql = "UPDATE Comites SET NombreComite = '".$arrayComite['NombreComite']."', TipoComite = '".$arrayComite['TipoComite']."', IntegrantesComite = '".$arrayComite['IntegrantesComite']."', FuncionComite = '".$arrayComite['FuncionComite']."', ImganenComite = '".$arrayComite['ImganenComite']."', Periodo = '".$arrayComite['Periodo']."', FechaSistema = '".$arrayComite['FechaSistema']."'  WHERE  IdComite = '".$IdComite."' AND IdEmpresa = '".$IdEmpresa."';";
		}
		$this->db->trans_start();
		//$this->db->where('IdComite', $IdComite)->where('IdEmpresa', $IdEmpresa);
		//$update = $this->db->update('Comites', $comite);
		$update = $this->db->query($sql);
		$this->db->trans_complete();
		if($update){
			return true;
		}else{
			return false;
		}

	}
	public function deleteComite($IdComite, $IdEmpresa){
		$this->db->where('IdComite', $IdComite)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('Comites');
	}





}




 ?>