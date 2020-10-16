<?php 
/**
* 
*/
class IndicadorCualitativo_Modelo extends CI_Model{
	
	function __construct(){
		# code...
	}

	public function insertIndicador($arrayIndicador){
		//Especificar los campos de cada dato del array
		$indicador = array('IndicadorNombre' => $arrayIndicador['IndicadorNombre'],
						   'IndicadorRolResponsable' => $arrayIndicador['IndicadorRolResponsable'],
						   'IndicadorFecuenciaCalculo' => $arrayIndicador['IndicadorFecuenciaCalculo'],
						   'IndicadorDescripcion' => $arrayIndicador['IndicadorDescripcion'],
						   'AreaIndicador_idAreaIndicaor' => $arrayIndicador['AreaIndicador_idAreaIndicaor']
							);
		$this->db->trans_start();
		$insert = $this->db->insert('Indicador',$indicador);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}		
	}
	public function getListIndicador(){
		$seleccionados = $this->db->get('IndicadoresEmpresa');
//$nombres = array('Frank', 'Todd', 'James');
//$this->db->where_not_in('username', $nombres);
		$sqlSelect = $this->db->select("* ,".$IdEmpresa." AS IdEmpresa");
		$resultado = $this->db->where_in('IdIndicador', $arrayIndicadoresSeleccionados)->get('Indicador');
		$this->db->where_not_in('IdIndicador', $seleccionados);
		$resultado = $this->db->get('Indicador');

		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getListIndicadorMatriz(){
		$resultado = $this->db->get('Indicador');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getListIndicadorMatrizPorSector(){
		$this->db->select(" COUNT(*) AS Filas, Sector");
		$this->db->group_by('Sector');
		$this->db->order_by('Sector');
		$resultado = $this->db->get('Indicador');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getIndicadoresPorSector($sector){
		$this->db->where("Sector", $sector);
		$resultado = $this->db->get('Indicador');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getListIndicadorCuantitativoEmpresa($IdEmpresa){
		$sqlIndicadoresNoSeleccionados = "SELECT * FROM Indicador WHERE IdIndicador NOT IN (SELECT IdIndicador FROM IndicadoresEmpresa WHERE IdEmpresa = ".$IdEmpresa.")";
		$resultado = $this->db->query($sqlIndicadoresNoSeleccionados);
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}

	public function getIndicador($idIndicador){
		$this->db->where('IdIndicador', $idIndicador);
		$resultado = $this->db->get('Indicador');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updateIndicador($idIndicador, $arrayIndicador){
		//Especificar los campos de cada dato del array
		$indicador = array('IndicadorNombre' => $arrayIndicador['IndicadorNombre'],
						   'IndicadorRolResponsable' => $arrayIndicador['IndicadorRolResponsable'],
						   'IndicadorFecuenciaCalculo' => $arrayIndicador['IndicadorFecuenciaCalculo'],
						   'IndicadorDescripcion' => $arrayIndicador['IndicadorDescripcion'],
						   'AreaIndicador_idAreaIndicaor' => $arrayIndicador['AreaIndicador_idAreaIndicaor']
							);
		$this->db->trans_start();
		$this->db->where('idIndicador', $idIndicador);
		$update = $this->db->update('Indicador',$indicador);
		$this->db->trans_complete();		
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function deleteIndicador($idIndicador){
		$this->db->where('idIndicador', $idIndicador);
		return $this->db->delete('Indicador');
	}


	/**
	 * Indicador Cualitativo 
	 */
	public function insertIndicadorCualitativo($arrayIndicadorCualitativo){
		//Especificar los campos de cada dato del array
		$Cualitativo = array('Fase' => $arrayIndicadorCualitativo['Fase'],
						   'IndicadorCualitativo' => $arrayIndicadorCualitativo['IndicadorCualitativo'],
						   'Pregunta' => $arrayIndicadorCualitativo['Pregunta'],
						   'CodigoGRI' => $arrayIndicadorCualitativo['CodigoGRI'],
						   'Dimension' => $arrayIndicadorCualitativo['Dimension'],
						   'SubDimension' => $arrayIndicadorCualitativo['SubDimension']
							);
		$this->db->trans_start();
		$insert = $this->db->insert('IndicadorCualitativo',$Cualitativo);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}		
	}
	public function getListIndicadorCualitativoMatriz(){
		$resultado = $this->db->get('IndicadoresCualitativosSistema');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getListIndicadorCualitativo(){
		$resultado = $this->db->get('IndicadoresCualitativosSistema');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}

	public function getListIndicadorCualitativoSubDimension(){
		$sqlIndicadoresNoSeleccionados = "SELECT SubDimension FROM IndicadorCualitativo GROUP BY SubDimension ORDER BY SubDimension";
		$resultado = $this->db->query($sqlIndicadoresNoSeleccionados);
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getListIndicadorCualitativoEmpresaSubDimension($IdEmpresa){
		$sqlIndicadoresNoSeleccionados = "SELECT SubDimension FROM IndicadorCualitativoEmpresa WHERE IdEmpresa =".$IdEmpresa." GROUP BY SubDimension ORDER BY SubDimension ";
		$resultado = $this->db->query($sqlIndicadoresNoSeleccionados);
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getIndicadorCualitativo($IdIndicadorCualitativo){
		$this->db->where('IdIndicadorCualitativo', $IdIndicadorCualitativo);
		$resultado = $this->db->get('IndicadorCualitativo');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}	
	public function updateIndicadorCualitativo($IdIndicadorCualitativo, $arrayIndicadorCualitativo){
		//Especificar los campos de cada dato del array
		$Cualitativo = array('Fase' => $arrayIndicadorCualitativo['Fase'],
						   'IndicadorCualitativo' => $arrayIndicadorCualitativo['IndicadorCualitativo'],
						   'Pregunta' => $arrayIndicadorCualitativo['Pregunta'],
						   'CodigoGRI' => $arrayIndicadorCualitativo['CodigoGRI'],
						   'Dimension' => $arrayIndicadorCualitativo['Dimension'],
						   'SubDimension' => $arrayIndicadorCualitativo['SubDimension']
							);
		$this->db->trans_start();
		$this->db->where('IdIndicadorCualitativo', $IdIndicadorCualitativo);
		$update = $this->db->update('IndicadorCualitativo',$Cualitativo);
		$this->db->trans_complete();		
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function deleteIndicadorCualitativo($IdIndicadorCualitativo){
		$this->db->where('IdIndicadorCualitativo', $IdIndicadorCualitativo);
		return $this->db->delete('IndicadorCualitativo');
	}

	/**
	* Indicadores Cualitativo Empresa
	**/
	public function getListIndicadorCualitativoEmpresaMaestro($IdEmpresa){
		$resultado = $this->db->where('IdEmpresa', $IdEmpresa)->get('CualitativoCalificadoMaestro');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getListIndicadorCualitativoEmpresa($IdEmpresa){
		$resultado = $this->db->where('IdEmpresa', $IdEmpresa)->get('IndicadoresCualitativosEmpresa');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getListIndicadorCualitativoEmpresaPeriodo($IdEmpresa, $Periodo){
		$resultado = $this->db->where('IdEmpresa', $IdEmpresa)->where('Periodo', $Periodo)->get('IndicadoresCualitativosEmpresa');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getIndicadorCualitativoCalificadoEmpresa($IdCualitativosCalificados, $IdCualitativoMaestro){
		$this->db->where('IdCualitativosCalificados', $IdCualitativosCalificados)->where('IdCualitativoMaestro', $IdCualitativoMaestro);;
		$resultado = $this->db->get('IndicadoresCualitativosCalificados');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}	
	public function getListIndicadorCualitativoACalificar($IdCualitativoMaestro){
		$resultado = $this->db->where('IdCualitativoMaestro', $IdCualitativoMaestro)->get('IndicadoresCualitativosCalificados');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function updatejustificacionIndicadorCualitativoCalificado($IdCualitativosCalificados, $IdCualitativoMaestro, $justificacion){
		$this->db->trans_start();
		$sqlUpdate = "UPDATE IndicadoresCualitativosCalificados SET Justificacion = '".$justificacion."' WHERE IdCualitativosCalificados = '".$IdCualitativosCalificados."' AND IdCualitativoMaestro = '".$IdCualitativoMaestro."';";		
		$update = $this->db->query($sqlUpdate);
		$this->db->trans_complete();		
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function insertPeriodoCalificacionIndicadorCualitativoMaestro($arrayIndicadorCualitativo){
		$this->db->trans_start();
		$insert = $this->db->insert('CualitativoCalificadoMaestro',$arrayIndicadorCualitativo);
		$id = $this->db->insert_id();
		$this->db->trans_complete();		
		if($insert != 0){
			return $id;
		}else{
			return false;
		}		
	}
	public function insertPeriodoCalificacionIndicadorCualitativoDetalle($IdCualitativoMaestro, $Periodo){
		$this->db->trans_start();
		$sqlSelect = $this->db->select("* ,".$IdCualitativoMaestro." AS IdCualitativoMaestro, ".$Periodo." AS Periodo");
		$resultado = $this->db->get('IndicadoresCualitativosSistema');
		foreach ($resultado->result() as $key) {
			$insertDetalle = array(
									'Dimension' => $key->Dimension,
									'PrincipioSEPS' => $key->PrincipioSEPS,
									'SubDimension' => $key->SubDimension,
									'CodigosGRI' => $key->CodigosGRI,
									'Fase' => $key->Fase,
									'Estandar' => $key->Estandar,
									'Concepto' => $key->Concepto,
									'Respuesta' => "",
									'Justificacion' => "",
									'IdCualitativoMaestro' => $key->IdCualitativoMaestro									
									);						
			$insert = $this->db->insert('IndicadoresCualitativosCalificados',$insertDetalle);
		}

		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}
		
	}
	public function deleteCalificacionIndicadoresCualitativos($IdCualitativocalificado, $IdEmpresa){
		$this->db->where('IdCualitativocalificado', $IdCualitativocalificado)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('CualitativoCalificadoMaestro');
	}


}



 ?>