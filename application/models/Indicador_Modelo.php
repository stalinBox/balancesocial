<?php 
/**
* 
*/
class Indicador_Modelo extends CI_Model{
	
	function __construct(){
		parent:: __construct();
		$this->load->database();
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
		$this->db->select("COUNT(*) AS Filas, Sector");
		$this->db->group_by('Sector');
		$this->db->order_by('Sector');
		$resultado = $this->db->get('Indicador');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}

	public function getListIndicadorMatrizPorDimension(){
		$this->db->select(" COUNT(*) AS Filas, Dimension");
		$this->db->group_by('Dimension');
		$this->db->order_by('Dimension');
		$resultado = $this->db->get('Indicador');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}

	public function getListIndicadorMatrizPorSubDimension(){
		$this->db->select(" COUNT(*) AS Filas, SubDimension");
		$this->db->group_by('SubDimension');
		$this->db->order_by('SubDimension');
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


	public function getIndicadoresPorSector2($sector,$anio){
		$query = "SELECT * FROM indicador ind WHERE ind.IdIndicador NOT IN ( SELECT indEmp.IdIndicador FROM indicadoresempresa indEmp WHERE indEmp.Periodo <> $anio ) AND ind.Sector=$sector";
		$resultado = $this->db->query($query);
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}

	public function getIndicadoresPorSector3($anio){
		$query = "SELECT * FROM indicador ind WHERE ind.IdIndicador NOT IN ( SELECT indEmp.IdIndicador FROM indicadoresempresa indEmp WHERE indEmp.Periodo = $anio )";
		$resultado = $this->db->query($query);
		if($resultado->num_rows() > 0)
			return $resultado;
		else
			return false;
	}

	public function getIndicadoresPorDimension($dimesion){
		$this->db->where("Dimension", $dimesion);
		$resultado = $this->db->get('Indicador');
		if($resultado->num_rows() > 0){
			return $resultado->result();
		}
		else
			return false;
	}

	public function getIndicadoresPorSubDimension($subdimension){
		$this->db->where("SubDimension", $subdimension);
		$resultado = $this->db->get('Indicador');
		if($resultado->num_rows() > 0){
			return $resultado->result();

		}
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
	 * Indicador cualitativo
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
		$resultado = $this->db->get('IndicadorCualitativo');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getListIndicadorCualitativo(){
		$resultado = $this->db->get('IndicadorCualitativo');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getListIndicadorCualitativoEmpresa($IdEmpresa){
		$sqlIndicadoresNoSeleccionados = "SELECT * FROM Indicador WHERE IdIndicador NOT IN (SELECT IdIndicador FROM IndicadoresEmpresa WHERE IdEmpresa = ".$IdEmpresa.")";
		$resultado = $this->db->query($sqlIndicadoresNoSeleccionados);
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
	* Indicadores Cuantitativos
	**/
	public function getListIndicadorCuantitativo(){
		$resultado = $this->db->get('Indicador');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getIndicadorCuantitativo($IdIndicadorCuantitativo){
		$this->db->where('IdIndicador', $IdIndicadorCuantitativo);
		$resultado = $this->db->get('Indicador');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}	
	public function getListIndicadorCualitativoEmpresaNoSeleccionados($IdEmpresa){
		$sqlIndicadoresCualitativosNoSeleccionados = "SELECT SubDimension FROM IndicadorCualitativo WHERE SubDimension NOT IN (SELECT SubDimension FROM IndicadorCualitativoEmpresa WHERE IdEmpresa = ".$IdEmpresa." GROUP BY SubDimension ORDER BY SubDimension) GROUP BY SubDimension ORDER BY SubDimension;";
		$resultado = $this->db->query($sqlIndicadoresCualitativosNoSeleccionados);
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getListIndicadorCualitativoEmpresaSeleccYNoSelecc($IdEmpresa){
		$sqlIndicadoresCualitativosNoSeleccionados = "SELECT SubDimension, 0 AS Seleccionado FROM IndicadorCualitativo WHERE SubDimension NOT IN (SELECT SubDimension FROM IndicadorCualitativoEmpresa WHERE IdEmpresa = 1 GROUP BY SubDimension ORDER BY SubDimension) GROUP BY SubDimension UNION SELECT SubDimension, 1 AS Seleccionado FROM IndicadorCualitativoEmpresa WHERE IdEmpresa = ".$IdEmpresa." GROUP BY SubDimension ORDER BY Seleccionado ASC;";
		$resultado = $this->db->query($sqlIndicadoresCualitativosNoSeleccionados);
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}

}



 ?>