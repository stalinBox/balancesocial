<?php  
/**
* 
*/
class Estrategias_Modelo extends CI_Model{
	
	function __construct(){
		
	}
/**
 * DML Efectos
 */

		// MODELO PARA MIGRAR
	
		// EFECTO
public function getListEstrategiaEfectoAnio($IdEmpresa){
		$this->db->select('*');
		$this->db->where('IdEmpresa',$IdEmpresa);
		$resultado = $this->db->get('estrategiasefectos');
		if($resultado->num_rows() > 0)
			return $resultado;
		else
			return false;
	}

	public function insertEstrategiaEfectoSelectedMigrar($IdEmpresa, $periodo, $lista){
		$query = "INSERT INTO `estrategiasefectos`(`Efecto`, `Periodo`, `FechaSistema`, `IdEmpresa`) SELECT `Efecto`, ".$periodo.", NOW(), ".$IdEmpresa." FROM `estrategiasefectos` WHERE `IdEfecto` IN (".$lista.") ";
		$insert = $this->db->query($query); 
		
		if($insert){
			return true;
		}else{
			return false;
		}	
	}

	public function getListAniosEstrategiasEfecto($IdEmpresa){
		$this->db->distinct('Periodo');
		$this->db->select('Periodo');
		$this->db->where('IdEmpresa',$IdEmpresa);
		$resultado = $this->db->get('estrategiasefectos');

		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	// FIN EFECTO

	// OPORTUNIDAD
	public function getListEstrategiaOportunidadAnio($IdEmpresa){
		$this->db->select('*');
		$this->db->where('IdEmpresa',$IdEmpresa);
		$resultado = $this->db->get('estrategiasoportunidades');
		if($resultado->num_rows() > 0)
			return $resultado;
		else
			return false;
	}

	public function insertEstrategiaOportunidadSelectedMigrar($IdEmpresa, $periodo, $lista){
		$query = "INSERT INTO `estrategiasoportunidades`(`Oportunidad`, `Periodo`, `FechaSistema`, `IdEmpresa`) SELECT `Oportunidad`, ".$periodo.", NOW(), ".$IdEmpresa." FROM `estrategiasoportunidades` WHERE `IdOportunidad` IN(".$lista.")";

		$insert = $this->db->query($query); 
		
		if($insert){
			return true;
		}else{
			return false;
		}	
	}

	public function getListAniosEstrategiasOportunidad($IdEmpresa){
		$this->db->distinct('Periodo');
		$this->db->select('Periodo');
		$this->db->where('IdEmpresa',$IdEmpresa);
		$resultado = $this->db->get('estrategiasoportunidades');

		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	// FIN OPORTUNIDAD

		// POLITICA
	public function getListEstrategiaPoliticaAnio($IdEmpresa){
		$this->db->select('*');
		$this->db->where('IdEmpresa',$IdEmpresa);
		$resultado = $this->db->get('estrategiaspoliticas');
		if($resultado->num_rows() > 0)
			return $resultado;
		else
			return false;
	}

	public function insertEstrategiaPoliticaSelectedMigrar($IdEmpresa, $periodo, $lista){
		$query = "INSERT INTO `estrategiaspoliticas`(`Politica`, `Periodo`, `FechaSistema`, `IdEmpresa`) SELECT `Politica`, ".$periodo.", NOW(), ".$IdEmpresa." FROM `estrategiaspoliticas` WHERE `IdPolitica` IN (".$lista.")";

		$insert = $this->db->query($query); 
		
		if($insert){
			return true;
		}else{
			return false;
		}	
	}

	public function getListAniosEstrategiasPolitica($IdEmpresa){
		$this->db->distinct('Periodo');
		$this->db->select('Periodo');
		$this->db->where('IdEmpresa',$IdEmpresa);
		$resultado = $this->db->get('estrategiaspoliticas');

		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	// FIN POLITICA

		// RIESGO
	public function getListEstrategiaRiesgoAnio($IdEmpresa){
		$this->db->select('*');
		$this->db->where('IdEmpresa',$IdEmpresa);
		$resultado = $this->db->get('estrategiasriesgos');
		if($resultado->num_rows() > 0)
			return $resultado;
		else
			return false;
	}

	public function insertEstrategiaRiesgoSelectedMigrar($IdEmpresa, $periodo, $lista){
		$query = "INSERT INTO `estrategiasriesgos`(`Riesgo`, `Periodo`, `FechaSistema`, `IdEmpresa`) SELECT `Riesgo`, ".$periodo.", NOW(), ".$IdEmpresa." FROM `estrategiasriesgos` WHERE `IdRiesgo` IN (".$lista.")";

		$insert = $this->db->query($query); 
		
		if($insert){
			return true;
		}else{
			return false;
		}	
	}

	public function getListAniosEstrategiasRiesgo($IdEmpresa){
		$this->db->distinct('Periodo');
		$this->db->select('Periodo');
		$this->db->where('IdEmpresa',$IdEmpresa);
		$resultado = $this->db->get('estrategiasriesgos');

		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	// FIN RIESGO
	// FIN MODELO PARA MIGRAR

	public function insertEfectoMemoria($arrayEfectoMemoria){
		$descripcion = array(							
							'Efecto' => $arrayEfectoMemoria['Efecto'],
							'Periodo' => $arrayEfectoMemoria['Periodo'],
							'FechaSistema' => $arrayEfectoMemoria['FechaSistema'],
							'IdEmpresa' => $arrayEfectoMemoria['IdEmpresa']
						 );
		$this->db->trans_start();
		$insert = $this->db->insert('EstrategiasEfectos',$descripcion);
		$this->db->trans_complete();
		if($insert){
			return true;
		}else{
			return false;
		}
	}
	public function getListEfectoMemoria($IdEmpresa){
		$this->db->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('EstrategiasEfectos');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getEfectoMemoria($IdEstrategiasEfectos, $IdEmpresa){
		$this->db->where('IdEfecto', $IdEstrategiasEfectos)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('EstrategiasEfectos');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updateEfectoMemoria($IdEstrategiasEfectos, $arrayEfectoMemoria, $IdEmpresa){
		$descripcion = array(
							'Efecto' => $arrayEfectoMemoria['Efecto'],
							'Periodo' => $arrayEfectoMemoria['Periodo'],
							'FechaSistema' => $arrayEfectoMemoria['FechaSistema'],
							'IdEmpresa' => $arrayEfectoMemoria['IdEmpresa']			 
						 );
		$this->db->trans_start();
		$this->db->where('IdEfecto', $IdEstrategiasEfectos)->where('IdEmpresa', $IdEmpresa);
		$update = $this->db->update('EstrategiasEfectos', $descripcion);
		$this->db->trans_complete();
		if($update)
			return true;
		else
			return false;
	}
	public function deleteEfectoMemoria($IdEstrategiasEfectos, $IdEmpresa){
		$this->db->where('IdEfecto', $IdEstrategiasEfectos)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('EstrategiasEfectos');
	}
/**
 * DML Riesgos
 */
	public function insertRiesgoMemoria($arrayRiesgoMemoria){
		$descripcion = array(							
							'Riesgo' => $arrayRiesgoMemoria['Riesgo'],
							'Periodo' => $arrayRiesgoMemoria['Periodo'],
							'FechaSistema' => $arrayRiesgoMemoria['FechaSistema'],
							'IdEmpresa' => $arrayRiesgoMemoria['IdEmpresa']
						 );
		$this->db->trans_start();
		$insert = $this->db->insert('EstrategiasRiesgos',$descripcion);
		$this->db->trans_complete();
		if($insert){
			return true;
		}else{
			return false;
		}
	}
	public function getListRiesgoMemoria($IdEmpresa){
		$this->db->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('EstrategiasRiesgos');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getRiesgoMemoria($IdEstrategiasRiesgos, $IdEmpresa){
		$this->db->where('IdRiesgo', $IdEstrategiasRiesgos)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('EstrategiasRiesgos');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updateRiesgoMemoria($IdEstrategiasRiesgos, $arrayRiesgoMemoria, $IdEmpresa){
		$descripcion = array(
							'Riesgo' => $arrayRiesgoMemoria['Riesgo'],
							'Periodo' => $arrayRiesgoMemoria['Periodo'],
							'FechaSistema' => $arrayRiesgoMemoria['FechaSistema'],
							'IdEmpresa' => $arrayRiesgoMemoria['IdEmpresa']			 
						 );
		$this->db->trans_start();
		$this->db->where('IdRiesgo', $IdEstrategiasRiesgos)->where('IdEmpresa', $IdEmpresa);
		$update = $this->db->update('EstrategiasRiesgos', $descripcion);
		$this->db->trans_complete();
		if($update)
			return true;
		else
			return false;
	}
	public function deleteRiesgoMemoria($IdEstrategiasRiesgos, $IdEmpresa){
		$this->db->where('IdRiesgo', $IdEstrategiasRiesgos)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('EstrategiasRiesgos');
	}
/**
 * DML Riesgos
 */
	public function insertPoliticaMemoria($arrayPoliticaMemoria){
		$descripcion = array(							
							'Politica' => $arrayPoliticaMemoria['Politica'],
							'Periodo' => $arrayPoliticaMemoria['Periodo'],
							'FechaSistema' => $arrayPoliticaMemoria['FechaSistema'],
							'IdEmpresa' => $arrayPoliticaMemoria['IdEmpresa']
						 );
		$this->db->trans_start();
		$insert = $this->db->insert('EstrategiasPoliticas',$descripcion);
		$this->db->trans_complete();
		if($insert){
			return true;
		}else{
			return false;
		}
	}
	public function getListPoliticaMemoria($IdEmpresa){
		$this->db->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('EstrategiasPoliticas');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getPoliticaMemoria($IdEstrategiasPoliticas, $IdEmpresa){
		$this->db->where('IdPolitica', $IdEstrategiasPoliticas)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('EstrategiasPoliticas');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updatePoliticaMemoria($IdEstrategiasPoliticas, $arrayPoliticaMemoria, $IdEmpresa){
		$descripcion = array(
							'Politica' => $arrayPoliticaMemoria['Politica'],
							'Periodo' => $arrayPoliticaMemoria['Periodo'],
							'FechaSistema' => $arrayPoliticaMemoria['FechaSistema'],
							'IdEmpresa' => $arrayPoliticaMemoria['IdEmpresa']			 
						 );
		$this->db->trans_start();
		$this->db->where('IdPolitica', $IdEstrategiasPoliticas)->where('IdEmpresa', $IdEmpresa);
		$update = $this->db->update('EstrategiasPoliticas', $descripcion);
		$this->db->trans_complete();
		if($update)
			return true;
		else
			return false;
	}
	public function deletePoliticaMemoria($IdEstrategiasPoliticas, $IdEmpresa){
		$this->db->where('IdPolitica', $IdEstrategiasPoliticas)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('EstrategiasPoliticas');
	}
/**
 * DML Riesgos
 */
	public function insertOportunidadMemoria($arrayOportunidadMemoria){
		$descripcion = array(							
							'Oportunidad' => $arrayOportunidadMemoria['Oportunidad'],
							'Periodo' => $arrayOportunidadMemoria['Periodo'],
							'FechaSistema' => $arrayOportunidadMemoria['FechaSistema'],
							'IdEmpresa' => $arrayOportunidadMemoria['IdEmpresa']
						 );
		$this->db->trans_start();
		$insert = $this->db->insert('EstrategiasOportunidades',$descripcion);
		$this->db->trans_complete();
		if($insert){
			return true;
		}else{
			return false;
		}
	}
	public function getListOportunidadMemoria($IdEmpresa){
		$this->db->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('EstrategiasOportunidades');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getOportunidadMemoria($IdEstrategiasOportunidades, $IdEmpresa){
		$this->db->where('IdOportunidad', $IdEstrategiasOportunidades)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('EstrategiasOportunidades');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updateOportunidadMemoria($IdEstrategiasOportunidades, $arrayOportunidadMemoria, $IdEmpresa){
		$descripcion = array(
							'Oportunidad' => $arrayOportunidadMemoria['Oportunidad'],
							'Periodo' => $arrayOportunidadMemoria['Periodo'],
							'FechaSistema' => $arrayOportunidadMemoria['FechaSistema'],
							'IdEmpresa' => $arrayOportunidadMemoria['IdEmpresa']			 
						 );
		$this->db->trans_start();
		$this->db->where('IdOportunidad', $IdEstrategiasOportunidades)->where('IdEmpresa', $IdEmpresa);
		$update = $this->db->update('EstrategiasOportunidades', $descripcion);
		$this->db->trans_complete();
		if($update)
			return true;
		else
			return false;
	}
	public function deleteOportunidadMemoria($IdEstrategiasOportunidades, $IdEmpresa){
		$this->db->where('IdOportunidad', $IdEstrategiasOportunidades)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('EstrategiasOportunidades');
	}

}

?>