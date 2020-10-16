<?php  
/**
* 
*/
class Memoria_Modelo extends CI_Model{
	
	function __construct(){
		
	}
/**
 * DML Detalles de la Memoria
 */

		// MODELO PARA MIGRAR
	// POLITICAS PRACTICAS
	public function getListPoliticasPracticasAnio($IdEmpresa){
		$this->db->select('*');
		$this->db->where('IdEmpresa',$IdEmpresa);
		$resultado = $this->db->get('memoriapoliticapractica');
		if($resultado->num_rows() > 0)
			return $resultado;
		else
			return false;
	}

	public function insertPoliticasPracticasSelectedMigrar($IdEmpresa, $periodo, $lista){
		$query = "INSERT INTO `memoriapoliticapractica`(`PoliticaPractica`, `Periodo`, `FechaSistema`, `IdEmpresa`) SELECT `PoliticaPractica`, ".$periodo.", NOW(), ".$IdEmpresa." FROM `memoriapoliticapractica` WHERE `IdPoliticaPractica` IN (".$lista.")";
		$insert = $this->db->query($query); 
		if($insert){
			return true;
		}else{
			return false;
		}	
	}

	public function getListAniosPoliticasPracticas($IdEmpresa){
		$this->db->distinct('Periodo');
		$this->db->select('Periodo');
		$this->db->where('IdEmpresa',$IdEmpresa);
		$resultado = $this->db->get('memoriapoliticapractica');

		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}

	// DETALLE MEMORIA
	public function getListDetalleMemoriaAnio($IdEmpresa){
		$this->db->select('*');
		$this->db->where('IdEmpresa',$IdEmpresa);
		$resultado = $this->db->get('memoriadetalle');
		if($resultado->num_rows() > 0)
			return $resultado;
		else
			return false;
	}

	public function insertDetalleMemoriaSelectedMigrar($IdEmpresa, $periodo, $lista){
		$query = "INSERT INTO `memoriadetalle`(`PeriodoObjeto`, `FechaUltimaMemoria`, `CicloPresentacion`, `FechaSistema`, `IdEmpresa`) SELECT ".$periodo.", `FechaUltimaMemoria`, `CicloPresentacion`, NOW(), ".$IdEmpresa." FROM `memoriadetalle` WHERE `IdDetalleMemoria` IN (".$lista.")";
		$insert = $this->db->query($query); 
		
		if($insert){
			return true;
		}else{
			return false;
		}	
	}

	public function getListAniosDetalleMemoria($IdEmpresa){
		$this->db->distinct('PeriodoObjeto');
		$this->db->select('PeriodoObjeto');
		$this->db->where('IdEmpresa',$IdEmpresa);
		$resultado = $this->db->get('memoriadetalle');

		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	// FIN MODELO PARA MIGRAR

	public function insertDetalleMemoria($arrayDetalleMemoria){
		$descripcion = array(							
							'PeriodoObjeto' => $arrayDetalleMemoria['PeriodoObjeto'],
							'FechaUltimaMemoria' => $arrayDetalleMemoria['FechaUltimaMemoria'],
							'CicloPresentacion' => $arrayDetalleMemoria['CicloPresentacion'],
							'FechaSistema' => $arrayDetalleMemoria['FechaSistema'],
							'IdEmpresa' => $arrayDetalleMemoria['IdEmpresa']
						 );
		$this->db->trans_start();
		$insert = $this->db->insert('MemoriaDetalle',$descripcion);
		$this->db->trans_complete();
		if($insert){
			return true;
		}else{
			return false;
		}
	}
	public function getListDetalleMemoria($IdEmpresa){
		$this->db->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('MemoriaDetalle');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getDetalleMemoria($IdMemoriaDetalle, $IdEmpresa){
		$this->db->where('IdDetalleMemoria', $IdMemoriaDetalle)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('MemoriaDetalle');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updateDetalleMemoria($IdMemoriaDetalle, $arrayDetalleMemoria, $IdEmpresa){
		$descripcion = array(
							'PeriodoObjeto' => $arrayDetalleMemoria['PeriodoObjeto'],
							'FechaUltimaMemoria' => $arrayDetalleMemoria['FechaUltimaMemoria'],
							'CicloPresentacion' => $arrayDetalleMemoria['CicloPresentacion'],
							'FechaSistema' => $arrayDetalleMemoria['FechaSistema'],
							'IdEmpresa' => $arrayDetalleMemoria['IdEmpresa']		 
						 );
		$this->db->trans_start();
		$this->db->where('IdDetalleMemoria', $IdMemoriaDetalle)->where('IdEmpresa', $IdEmpresa);
		$update = $this->db->update('MemoriaDetalle', $descripcion);
		$this->db->trans_complete();
		if($update)
			return true;
		else
			return false;
	}
	public function deleteDetalleMemoria($IdMemoriaDetalle, $IdEmpresa){
		$this->db->where('IdDetalleMemoria', $IdMemoriaDetalle)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('MemoriaDetalle');
	}
/**
 * DML Políticas y Prácticas de la Memoria
 */
	public function insertPoliticaPracticaMemoria($arrayPoliticaPracticaMemoria){
		$politicaPractica = array(
							'PoliticaPractica' => $arrayPoliticaPracticaMemoria['PoliticaPractica'],
							'Periodo' => $arrayPoliticaPracticaMemoria['Periodo'],
							'FechaSistema' => $arrayPoliticaPracticaMemoria['FechaSistema'],
							'IdEmpresa' => $arrayPoliticaPracticaMemoria['IdEmpresa']
						 );
		$this->db->trans_start();
		$insert = $this->db->insert('MemoriaPoliticaPractica',$politicaPractica);
		$this->db->trans_complete();
		if($insert){
			return true;
		}else{
			return false;
		}
	}
	public function getListPoliticaPracticaMemoria($IdEmpresa){
		$this->db->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('MemoriaPoliticaPractica');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getPoliticaPracticaMemoria($IdMemoriaPoliticaPractica, $IdEmpresa){
		$this->db->where('IdPoliticaPractica', $IdMemoriaPoliticaPractica)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('MemoriaPoliticaPractica');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updatePoliticaPracticaMemoria($IdMemoriaPoliticaPractica, $arrayPoliticaPracticaMemoria, $IdEmpresa){
		$politicaPractica = array(
							'PoliticaPractica' => $arrayPoliticaPracticaMemoria['PoliticaPractica'],
							'Periodo' => $arrayPoliticaPracticaMemoria['Periodo'],
							'FechaSistema' => $arrayPoliticaPracticaMemoria['FechaSistema'],
							'IdEmpresa' => $arrayPoliticaPracticaMemoria['IdEmpresa']			 
						 );
		$this->db->trans_start();
		$this->db->where('IdPoliticaPractica', $IdMemoriaPoliticaPractica)->where('IdEmpresa', $IdEmpresa);
		$update = $this->db->update('MemoriaPoliticaPractica', $politicaPractica);
		$this->db->trans_complete();
		if($update)
			return true;
		else
			return false;
	}
	public function deletePoliticaPracticaMemoria($IdMemoriaPoliticaPractica, $IdEmpresa){
		$this->db->where('IdPoliticaPractica', $IdMemoriaPoliticaPractica)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('MemoriaPoliticaPractica');
	}

	/**
	 * DetalleEstructuraMemoria
	 */
	public function insertEstructuraMemoria($arrayIdEstructuraMemoria){
		$this->db->trans_start();
		$insert = $this->db->insert('DetalleEstructuraMemoria', $arrayIdEstructuraMemoria);
		$this->db->trans_complete();
		if($insert){
			return true;
		}else{
			return false;
		}
	}
	public function getListEstructuraMemoria($IdEmpresa){
		$this->db->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('DetalleEstructuraMemoria');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getEstructuraMemoria($IdEstructuraMemoria, $IdEmpresa){
		$this->db->where('IdEstructuraMemoria', $IdEstructuraMemoria)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('DetalleEstructuraMemoria');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}	
	public function getEstructuraMemoriaPeriodo($Periodo, $IdEmpresa){
		$this->db->order_by('FechaSistema desc');
		$this->db->limit(1);
		$this->db->where('Periodo', $Periodo)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('DetalleEstructuraMemoria');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updateEstructuraMemoria($IdEstructuraMemoria, $arrayIdEstructuraMemoria, $IdEmpresa){
		$this->db->trans_start();
		$this->db->where('IdEstructuraMemoria', $IdEstructuraMemoria)->where('IdEmpresa', $IdEmpresa);
		$update = $this->db->update('DetalleEstructuraMemoria', $arrayIdEstructuraMemoria);
		$this->db->trans_complete();
		if($update)
			return true;
		else
			return false;
	}
	public function deleteEstructuraMemoria($IdEstructuraMemoria, $IdEmpresa){
		$this->db->where('IdEstructuraMemoria', $IdEstructuraMemoria)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('DetalleEstructuraMemoria');
	}

	public function getBalanceGeneralPeriodo($Periodo, $IdEmpresa){
		$sql = "SELECT ValorTActivos, ValorTPasivos, ValorTActivosAnioAnterior, ValorTPasivosAnioAnterior, ValorTPatrimonio, ValorTPatrimonioAnioAnterior, UtilidadTEjercicio, UtilidadTEjercicioAnioAnterior  FROM DatosTotales WHERE Periodo = ".$Periodo." AND IdEmpresa = ".$IdEmpresa." ORDER BY FechaSistema DESC";
		$resultado = $this->db->query($sql);
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}

}

?>