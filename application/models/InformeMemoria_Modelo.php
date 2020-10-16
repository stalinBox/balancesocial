<?php  
/**
* 
*/
class InformeMemoria_Modelo extends CI_Model{
	
	function __construct(){
		
	}
/**
 * DML Declaración del Presidente
 */

		// MODELO PARA MIGRAR

		// PARA OBJETIVO INFORME
	public function getListObjInfAnio($IdEmpresa){
		$this->db->select('*');
		$this->db->where('IdEmpresa',$IdEmpresa);
		$resultado = $this->db->get('objetivosinforme');
		if($resultado->num_rows() > 0)
			return $resultado;
		else
			return false;
	}

	public function insertObjInfSelectedMigrar($IdEmpresa, $periodo, $lista){
		$query = "INSERT INTO `objetivosinforme`(`Objetivo`, `Tipo`, `DescripcionCumplimiento`, `Periodo`, `FechaSistema`, `IdEmpresa`) SELECT `Objetivo`, `Tipo`, `DescripcionCumplimiento`, ".$periodo.", NOW(), ".$IdEmpresa." FROM `objetivosinforme` WHERE `IdObjetivosInforme` IN (".$lista.")";

		$insert = $this->db->query($query); 
		
		if($insert){
			return true;
		}else{
			return false;
		}	
	}

	public function getListAniosObjInf($IdEmpresa){
		$this->db->distinct('Periodo');
		$this->db->select('Periodo');
		$this->db->where('IdEmpresa',$IdEmpresa);
		$resultado = $this->db->get('objetivosinforme');

		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}

	// PARA LOGRO FRACASO
	public function getListLogroFracasoAnio($IdEmpresa){
		$this->db->select('*');
		$this->db->where('IdEmpresa',$IdEmpresa);
		$resultado = $this->db->get('logrofracasoinforme');
		if($resultado->num_rows() > 0)
			return $resultado;
		else
			return false;
	}

	public function insertLogroFracasoSelectedMigrar($IdEmpresa, $periodo, $lista){
		$query = "INSERT INTO `logrofracasoinforme`(`LogroFracaso`, `Descripcion`, `Imagen`, `Periodo`, `FechaSistema`, `IdEmpresa`) SELECT `LogroFracaso`, `Descripcion`, `Imagen`, ".$periodo.", NOW(), ".$IdEmpresa." FROM `logrofracasoinforme` WHERE `IdLogroFracasoInforme` IN (".$lista.")";
		$insert = $this->db->query($query); 
		if($insert){
			return true;
		}else{
			return false;
		}	
	}

	public function getListAniosLogroFracaso($IdEmpresa){
		$this->db->distinct('Periodo');
		$this->db->select('Periodo');
		$this->db->where('IdEmpresa',$IdEmpresa);
		$resultado = $this->db->get('logrofracasoinforme');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}

	public function getListMemoriaAnio($IdEmpresa){
		$this->db->select('*');
		$this->db->where('IdEmpresa',$IdEmpresa);
		$resultado = $this->db->get('declaracionpresidentedecripcioninforme');
		if($resultado->num_rows() > 0)
			return $resultado;
		else
			return false;
	}

	public function insertMemoriaSelectedMigrar($IdEmpresa, $periodo, $lista){
		$query = "INSERT INTO `declaracionpresidentedecripcioninforme`(`Declaracion`, `Periodo`, `Foto`, `FechaSistema`, `IdEmpresa`) SELECT `Declaracion`, ".$periodo.", `Foto`, NOW(), ".$IdEmpresa." FROM `declaracionpresidentedecripcioninforme` WHERE `IdDPDescInforme` IN (".$lista.")";
		$insert = $this->db->query($query); 
		
		if($insert){
			return true;
		}else{
			return false;
		}	
	}

	public function getListAniosMemoria($IdEmpresa){
		$this->db->distinct('Periodo');
		$this->db->select('Periodo');
		$this->db->where('IdEmpresa',$IdEmpresa);
		$resultado = $this->db->get('declaracionpresidentedecripcioninforme');

		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}

	//OTRO
		public function getListDetaInformeAnio($IdEmpresa){
		$this->db->select('*');
		$this->db->where('IdEmpresa',$IdEmpresa);
		$resultado = $this->db->get('detallesinforme');
		if($resultado->num_rows() > 0)
			return $resultado;
		else
			return false;
	}

	public function insertDetaInformeSelectedMigrar($IdEmpresa, $periodo, $lista){
		$query = "INSERT INTO `detallesinforme`(`NumDeclaracionesEmitidas`, `IdentificacionDeQuienEmite`, `CargoDeQuienEmite`, `FechaEmisionInforme`, `Periodo`, `FechaSistema`, `IdEmpresa`) SELECT `NumDeclaracionesEmitidas`, `IdentificacionDeQuienEmite`, `CargoDeQuienEmite`, `FechaEmisionInforme`, ".$periodo.", NOW(), ".$IdEmpresa." FROM `detallesinforme` WHERE `IdDetallesInforme` IN (".$lista.")";



		$insert = $this->db->query($query); 
		
		if($insert){
			return true;
		}else{
			return false;
		}	
	}

	public function getListAniosDetaInforme($IdEmpresa){
		$this->db->distinct('Periodo');
		$this->db->select('Periodo');
		$this->db->where('IdEmpresa',$IdEmpresa);
		$resultado = $this->db->get('detallesinforme');

		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	// FIN MODELO PARA MIGRAR

	public function insertDeclaracionPresidenteMemoria($arrayDeclaracionPresidenteMemoria){
		$query = ("INSERT INTO DeclaracionPresidenteDecripcionInforme(IdDPDescInforme, Declaracion, Periodo, Foto, FechaSistema, IdEmpresa) VALUES (NULL, '".$arrayDeclaracionPresidenteMemoria['Declaracion']."', '".$arrayDeclaracionPresidenteMemoria['Periodo']."', '".$arrayDeclaracionPresidenteMemoria['Foto']."','".$arrayDeclaracionPresidenteMemoria['FechaSistema']."', '".$arrayDeclaracionPresidenteMemoria['IdEmpresa']."'); ");
		$this->db->trans_start();		
		$insert = $this->db->query($query);		
		$this->db->trans_complete();
		if($insert){
			return true;
		}else{
			return false;
		}
	}
	public function getListDeclaracionPresidenteMemoria($IdEmpresa){
		$this->db->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('DeclaracionPresidenteDecripcionInforme');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getDeclaracionPresidenteMemoria($IdDPDescInforme, $IdEmpresa){
		$this->db->where('IdDPDescInforme', $IdDPDescInforme)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('DeclaracionPresidenteDecripcionInforme');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function getDeclaracionPresidenteMemoriaPeriodo($Periodo, $IdEmpresa){
		$this->db->limit(1);
		$this->db->order_by('FechaSistema desc');
		$this->db->where('Periodo', $Periodo)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('DeclaracionPresidenteDecripcionInforme');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updateDeclaracionPresidenteMemoria($IdDPDescInforme, $arrayDeclaracionPresidenteMemoria, $IdEmpresa){
/*		$updateDeclaracionPresidente = array(
							'Declaracion' => $arrayDeclaracionPresidenteMemoria['Declaracion'],
							'Periodo' => $arrayDeclaracionPresidenteMemoria['Periodo'],
							'Foto' => $arrayDeclaracionPresidenteMemoria['Foto'],
							'FechaSistema' => $arrayDeclaracionPresidenteMemoria['FechaSistema'],
							'IdEmpresa' => $arrayDeclaracionPresidenteMemoria['IdEmpresa']
						 );
*/
		if ($arrayDeclaracionPresidenteMemoria['Foto'] == "") {
			$sqlUpdate = "UPDATE DeclaracionPresidenteDecripcionInforme SET 
			Declaracion	= '".$arrayDeclaracionPresidenteMemoria['Declaracion']."',
			Periodo = '".$arrayDeclaracionPresidenteMemoria['Periodo']."',			
			FechaSistema = '".$arrayDeclaracionPresidenteMemoria['FechaSistema']."'
			WHERE IdDPDescInforme = '".$IdDPDescInforme."' AND  IdEmpresa = '".$IdEmpresa."';";
		}else{
			$sqlUpdate = "UPDATE DeclaracionPresidenteDecripcionInforme SET 
			Declaracion	= '".$arrayDeclaracionPresidenteMemoria['Declaracion']."',
			Periodo = '".$arrayDeclaracionPresidenteMemoria['Periodo']."',
			Foto = '".$arrayDeclaracionPresidenteMemoria['Foto']."',
			FechaSistema = '".$arrayDeclaracionPresidenteMemoria['FechaSistema']."'
			WHERE IdDPDescInforme = '".$IdDPDescInforme."' AND  IdEmpresa = '".$IdEmpresa."';";
		}
		$this->db->trans_start();
		//$this->db->where('IdDPDescInforme', $IdDPDescInforme)->where('IdEmpresa', $IdEmpresa);
		//$update = $this->db->update('DeclaracionPresidenteDecripcionInforme', $updateDeclaracionPresidente);
		$update = $this->db->query($sqlUpdate);
		$this->db->trans_complete();
		if($update)
			return true;
		else
			return false;
	}
	public function deleteDeclaracionPresidenteMemoria($IdDPDescInforme, $IdEmpresa){
		$this->db->where('IdDPDescInforme', $IdDPDescInforme)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('DeclaracionPresidenteDecripcionInforme');
	}
/**
 * DML Detalle del Informe de la Memoria
 */
	public function insertDetalleInformeMemoria($arrayDetalleInformeMemoria){
		$insertDetalleInforme = array(							
							'NumDeclaracionesEmitidas' => $arrayDetalleInformeMemoria['NumDeclaracionesEmitidas'],
							'IdentificacionDeQuienEmite' => $arrayDetalleInformeMemoria['IdentificacionDeQuienEmite'],
							'CargoDeQuienEmite' => $arrayDetalleInformeMemoria['CargoDeQuienEmite'],
							'FechaEmisionInforme' => $arrayDetalleInformeMemoria['FechaEmisionInforme'],
							'Periodo' => $arrayDetalleInformeMemoria['Periodo'],
							'FechaSistema' => $arrayDetalleInformeMemoria['FechaSistema'],
							'IdEmpresa' => $arrayDetalleInformeMemoria['IdEmpresa']
						 );
		$this->db->trans_start();
		$insert = $this->db->insert('DetallesInforme',$insertDetalleInforme);
		$this->db->trans_complete();
		if($insert){
			return true;
		}else{
			return false;
		}
	}
	public function getListDetalleInformeMemoria($IdEmpresa){
		$this->db->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('DetallesInforme');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getDetalleInformeMemoria($IdDetallesInforme, $IdEmpresa){
		$this->db->where('IdDetallesInforme', $IdDetallesInforme)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('DetallesInforme');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updateDetalleInformeMemoria($IdDetallesInforme, $arrayDetalleInformeMemoria, $IdEmpresa){
		$updateDetalleInforme = array(
							'NumDeclaracionesEmitidas' => $arrayDetalleInformeMemoria['NumDeclaracionesEmitidas'],
							'IdentificacionDeQuienEmite' => $arrayDetalleInformeMemoria['IdentificacionDeQuienEmite'],
							'CargoDeQuienEmite' => $arrayDetalleInformeMemoria['CargoDeQuienEmite'],
							'FechaEmisionInforme' => $arrayDetalleInformeMemoria['FechaEmisionInforme'],
							'Periodo' => $arrayDetalleInformeMemoria['Periodo'],
							'FechaSistema' => $arrayDetalleInformeMemoria['FechaSistema'],
							'IdEmpresa' => $arrayDetalleInformeMemoria['IdEmpresa']		 
						 );
		$this->db->trans_start();
		$this->db->where('IdDetallesInforme', $IdDetallesInforme)->where('IdEmpresa', $IdEmpresa);
		$update = $this->db->update('DetallesInforme', $updateDetalleInforme);
		$this->db->trans_complete();
		if($update)
			return true;
		else
			return false;
	}
	public function deleteDetalleInformeMemoria($IdDetallesInforme, $IdEmpresa){
		$this->db->where('IdDetallesInforme', $IdDetallesInforme)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('DetallesInforme');
	}

/**
 * DML Objetivos del Informe de la Memoria
 */
	public function insertObjetivoMemoria($arrayObjetivoMemoria){
		$insertObjetivo = array(							
							'Objetivo' => $arrayObjetivoMemoria['Objetivo'],
							'Tipo' => $arrayObjetivoMemoria['Tipo'],
							'DescripcionCumplimiento' => $arrayObjetivoMemoria['DescripcionCumplimiento'],							
							'Periodo' => $arrayObjetivoMemoria['Periodo'],
							'FechaSistema' => $arrayObjetivoMemoria['FechaSistema'],
							'IdEmpresa' => $arrayObjetivoMemoria['IdEmpresa']
						 );
		$this->db->trans_start();
		$insert = $this->db->insert('ObjetivosInforme',$insertObjetivo);
		$this->db->trans_complete();
		if($insert){
			return true;
		}else{
			return false;
		}
	}
	public function getListObjetivoMemoria($IdEmpresa){
		$this->db->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('ObjetivosInforme');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getObjetivoMemoria($IdObjetivosInforme, $IdEmpresa){
		$this->db->where('IdObjetivosInforme', $IdObjetivosInforme)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('ObjetivosInforme');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updateObjetivoMemoria($IdObjetivosInforme, $arrayObjetivoMemoria, $IdEmpresa){
		$updateObjetivo = array(
							'Objetivo' => $arrayObjetivoMemoria['Objetivo'],
							'Tipo' => $arrayObjetivoMemoria['Tipo'],
							'DescripcionCumplimiento' => $arrayObjetivoMemoria['DescripcionCumplimiento'],							
							'Periodo' => $arrayObjetivoMemoria['Periodo'],
							'FechaSistema' => $arrayObjetivoMemoria['FechaSistema'],
							'IdEmpresa' => $arrayObjetivoMemoria['IdEmpresa']
						 );
		$this->db->trans_start();
		$this->db->where('IdObjetivosInforme', $IdObjetivosInforme)->where('IdEmpresa', $IdEmpresa);
		$update = $this->db->update('ObjetivosInforme', $updateObjetivo);
		$this->db->trans_complete();
		if($update)
			return true;
		else
			return false;
	}
	public function deleteObjetivoMemoria($IdObjetivosInforme, $IdEmpresa){
		$this->db->where('IdObjetivosInforme', $IdObjetivosInforme)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('ObjetivosInforme');
	}
/**
 * DML Logros y Fracasos del Informe de la Memoria
 */
	public function insertLogroFracasoMemoria($arrayLogroFracasoMemoria){
		$sql = "INSERT INTO LogroFracasoInforme(IdLogroFracasoInforme, LogroFracaso, Descripcion, Imagen, Periodo, FechaSistema, IdEmpresa) VALUES (null, '".$arrayLogroFracasoMemoria['LogroFracaso']."', '".$arrayLogroFracasoMemoria['Descripcion']."', '".$arrayLogroFracasoMemoria['Imagen']."', '".$arrayLogroFracasoMemoria['Periodo']."', '".$arrayLogroFracasoMemoria['FechaSistema']."', '".$arrayLogroFracasoMemoria['IdEmpresa']."');";
		$this->db->trans_start();
		//$insert = $this->db->insert('LogroFracasoInforme',$insertObjetivo);
		$insert = $this->db->query($sql);
		$this->db->trans_complete();
		if($insert){
			return true;
		}else{
			return false;
		}
	}
	public function getListLogroFracasoMemoria($IdEmpresa){
		$this->db->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('LogroFracasoInforme');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getLogroFracasoMemoria($IdLogroFracasoInforme, $IdEmpresa){
		$this->db->where('IdLogroFracasoInforme', $IdLogroFracasoInforme)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('LogroFracasoInforme');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updateLogroFracasoMemoria($IdLogroFracasoInforme, $arrayLogroFracasoMemoria, $IdEmpresa){
		/*
		$updateObjetivo = array(
								'LogroFracaso' => $arrayLogroFracasoMemoria['LogroFracaso'],							
								'Descripcion' => $arrayLogroFracasoMemoria['Descripcion'],
								'Imagen' => $arrayLogroFracasoMemoria['Imagen'],
								'Periodo' => $arrayLogroFracasoMemoria['Periodo'],
								'FechaSistema' => $arrayLogroFracasoMemoria['FechaSistema'],
								'IdEmpresa' => $arrayLogroFracasoMemoria['IdEmpresa']
						 );
		*/
		if ($arrayLogroFracasoMemoria['Imagen'] == "") {
			$sql = "UPDATE LogroFracasoInforme SET LogroFracaso = '".$arrayLogroFracasoMemoria['LogroFracaso']."', Descripcion = '".$arrayLogroFracasoMemoria['Descripcion']."', Periodo = '".$arrayLogroFracasoMemoria['Periodo']."', FechaSistema = '".$arrayLogroFracasoMemoria['FechaSistema']."' WHERE IdLogroFracasoInforme = '".$IdLogroFracasoInforme."' AND IdEmpresa = '".$IdEmpresa."';";
		}else{
			$sql = "UPDATE LogroFracasoInforme SET LogroFracaso = '".$arrayLogroFracasoMemoria['LogroFracaso']."', Descripcion = '".$arrayLogroFracasoMemoria['Descripcion']."', Imagen = '".$arrayLogroFracasoMemoria['Imagen']."', Periodo = '".$arrayLogroFracasoMemoria['Periodo']."', FechaSistema = '".$arrayLogroFracasoMemoria['FechaSistema']."' WHERE IdLogroFracasoInforme = '".$IdLogroFracasoInforme."' AND IdEmpresa = '".$IdEmpresa."';";
		}
		//echo $sql;
		$this->db->trans_start();
		//$this->db->where('IdLogroFracasoInforme', $IdLogroFracasoInforme)->where('IdEmpresa', $IdEmpresa);
		//$update = $this->db->update('LogroFracasoInforme', $updateObjetivo);
		$update = $this->db->query($sql);
		$this->db->trans_complete();
		if($update)
			return true;
		else
			return false;
	}
	public function deleteLogroFracasoMemoria($IdLogroFracasoInforme, $IdEmpresa){
		$this->db->where('IdLogroFracasoInforme', $IdLogroFracasoInforme)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('LogroFracasoInforme');
	}
	/**
	 * Funciones de Consulta a DatosTotales
	 */
	public function getSatisfaccionClienteServiciosPeriodo($Periodo, $IdEmpresa){
		$this->db->select('ValorTPorcentajeSatisfaccionCliente, ValorTPorcentajeSatisfaccionServicioFinancieros');
		$this->db->where('Periodo', $Periodo)->where('IdEmpresa', $IdEmpresa);		
		$this->db->order_by('FechaSistema desc');
		$this->db->limit(1);
		$resultado = $this->db->get('DatosTotales');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function getDatosTotalesPeriodo($Periodo, $IdEmpresa){		
		$this->db->where('Periodo', $Periodo)->where('IdEmpresa', $IdEmpresa);		
		$this->db->order_by('FechaSistema desc');
		$this->db->limit(1);
		$resultado = $this->db->get('DatosTotales');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function getEdadPromedioEmpleados($IdEmpresa){		
		$sql = "SELECT AVG(TIMESTAMPDIFF(YEAR, FNacimientoEmpleado, CURDATE())) AS EdadPromedio FROM `Empleado` WHERE EstadoLaboralEmpleado IN('Activo', 'Reincorporado') AND IdEmpresa = ".$IdEmpresa.";";				
		$resultado = $this->db->query($sql);
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}


}
?>