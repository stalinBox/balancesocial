<?php 
/**
* 
*/
class IndicadoresEmpresa_Modelo extends CI_Model{
	
	function __construct(){
		parent:: __construct();
		$this->load->database();
	}
	/**
	 * Indicador cualitativos de la empresa
	 */
	public function insertIndicadorCualitativo($arrayIndicadorCualitativo){
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
	public function getListIndicadorCualitativoEmpresa($IdEmpresa, $anio){
		$this->db->order_by("IdIndicadorCualitativo", "ASC");
		$this->db->where('IdEmpresa', $IdEmpresa)->where('Periodo', $anio);
		$resultado = $this->db->get('IndicadorCualitativoEmpresa');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getIndicadorCualitativoEmpresa($IdICEmpresa, $IdEmpresa){
		$this->db->where('IdICEmpresa', $IdICEmpresa)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('IndicadorCualitativoEmpresa');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}		
	public function updateIndicadorCualitativoEmpresa($IdIndicadorCualitativo, $arrayIndicadorCualitativo){
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
	public function deleteIndicadorCualitativoEmpresa($IdIndicadorCualitativo){
		$this->db->where('IdIndicadorCualitativo', $IdIndicadorCualitativo);
		return $this->db->delete('IndicadorCualitativo');
	}
	/**
	* Indicadores Cuantitativos de la Empresa
	**/
	public function getListIndicadorCuantitativoEmpresa($IdEmpresa){
		$sqlIndicadoresNoSeleccionados = "SELECT * FROM Indicador WHERE IdIndicador NOT IN (SELECT IdIndicador FROM IndicadoresEmpresa WHERE IdEmpresa = ".$IdEmpresa.")";
		$resultado = $this->db->query($sqlIndicadoresNoSeleccionados);
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	
	public function getListIndicadorCuantitativoSeleccionadosEmpresa($IdEmpresa){
		$this->db->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('IndicadoresEmpresa');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}	
	public function addIndicadorCuantitativoEmpresa($arrayIndicadoresYaSeleccionados){
		$this->db->where_not_in('IdIndicador', $arrayIndicadoresYaSeleccionados);
		$resultado = $this->db->get('IndicadoresEmpresa');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function updateIndicadorCuantitativoEmpresa($IdIndicadorEmpresa, $arrayIndicadorCuantitativo){
		//Especificar los campos de cada dato del array
		$Cualitativo = array(
							'IdIndicador' => $arrayIndicadorCuantitativo['IdIndicador'],
							'Nombre' => $arrayIndicadorCuantitativo['Nombre'],
							'CriterioIndicador' => $arrayIndicadorCuantitativo['CriterioIndicador'],
							'Resultado' => $arrayIndicadorCuantitativo['Resultado'],
							'Dimension' => $arrayIndicadorCuantitativo['Dimension'],
							'SubDimension' => $arrayIndicadorCuantitativo['SubDimension'],
							'PrincipiosSEPS' => $arrayIndicadorCuantitativo['PrincipiosSEPS'],
							'PrincipiosPactoMundial' => $arrayIndicadorCuantitativo['PrincipiosPactoMundial'],
							'GrupoInteres' => $arrayIndicadorCuantitativo['GrupoInteres'],
							'Herramienta' => $arrayIndicadorCuantitativo['Herramienta'],
							'CodigosGRI' => $arrayIndicadorCuantitativo['CodigosGRI'],
							'CodigosISO2600' => $arrayIndicadorCuantitativo['CodigosISO2600'],
							'Area' => $arrayIndicadorCuantitativo['Area'],
							'Modulo' => $arrayIndicadorCuantitativo['Modulo'],
							'SubModulo' => $arrayIndicadorCuantitativo['SubModulo'],
							'Tabla' => $arrayIndicadorCuantitativo['Tabla'],
							'FormulaResultado' => $arrayIndicadorCuantitativo['FormulaResultado'],
							'Meta' => $arrayIndicadorCuantitativo['Meta'],
							'Desde0' => $arrayIndicadorCuantitativo['Desde0'],
							'Hasta0' => $arrayIndicadorCuantitativo['Hasta0'],
							'Desc0' => $arrayIndicadorCuantitativo['Desc0'],
							'Nota0' => $arrayIndicadorCuantitativo['Nota0'],
							'Desde1' => $arrayIndicadorCuantitativo['Desde1'],
							'Hasta1' => $arrayIndicadorCuantitativo['Hasta1'],
							'Desc1' => $arrayIndicadorCuantitativo['Desc1'],
							'Nota1' => $arrayIndicadorCuantitativo['Nota1'],
							'Desde2' => $arrayIndicadorCuantitativo['Desde2'],
							'Hasta2' => $arrayIndicadorCuantitativo['Hasta2'],
							'Desc2' => $arrayIndicadorCuantitativo['Desc2'],
							'Nota2' => $arrayIndicadorCuantitativo['Nota2'],
							'Desde3' => $arrayIndicadorCuantitativo['Desde3'],
							'Hasta3' => $arrayIndicadorCuantitativo['Hasta3'],
							'Desc3' => $arrayIndicadorCuantitativo['Desc3'],
							'Nota3' => $arrayIndicadorCuantitativo['Nota3'],
							'Desde4' => $arrayIndicadorCuantitativo['Desde4'],
							'Hasta4' => $arrayIndicadorCuantitativo['Hasta4'],
							'Desc4' => $arrayIndicadorCuantitativo['Desc4'],
							'Nota4' => $arrayIndicadorCuantitativo['Nota4'],
							'Desde5' => $arrayIndicadorCuantitativo['Desde5'],
							'Hasta5' => $arrayIndicadorCuantitativo['Hasta5'],
							'Desc5' => $arrayIndicadorCuantitativo['Desc5'],
							'Nota5' => $arrayIndicadorCuantitativo['Nota5'],
							'FormulaCalificacion' => $arrayIndicadorCuantitativo['FormulaCalificacion'],
							'IdEmpresa' => $arrayIndicadorCuantitativo['IdEmpresa']
							);
		$this->db->trans_start();
		$this->db->where('IdIndicadorEmpresa', $IdIndicadorEmpresa);
		$update = $this->db->update('IndicadoresEmpresa',$Cualitativo);
		$this->db->trans_complete();		
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function deleteIndicadorCuantitativoEmpresa($IdIndicadorEmpresa, $IdEmpresa){
		$this->db->where('IdIndicadorEmpresa', $IdIndicadorEmpresa)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('IndicadoresEmpresa');
	}
	/** Indicadores ya seleccionados por la Empresa
	**/
	public function updateIndicadoresSeleccionados($IdEmpresa, $arrayIndicadoresSeleccionados){
		$sqlSelect = $this->db->select("* ,".$IdEmpresa." AS IdEmpresa");
		$resultado = $this->db->where_in('IdIndicador', $arrayIndicadoresSeleccionados)->get('Indicador');
		$resp = false;
		foreach ($resultado->result() as $key) {
			$insertIndicadorEmpresa = array(
								'IdIndicador' => $key->IdIndicador, 
								'Nombre' => $key->Nombre, 
								'CriterioIndicador' => $key->CriterioIndicador, 
								'Resultado' => $key->Resultado, 
								'Dimension' => $key->Dimension, 
								'SubDimension' => $key->SubDimension, 
								'PrincipiosSEPS' => $key->PrincipiosSEPS, 
								'PrincipiosPactoMundial' => $key->PrincipiosPactoMundial, 
								'GrupoInteres' => $key->GrupoInteres, 
								'Herramienta' => $key->Herramienta, 
								'CodigosGRI' => $key->CodigosGRI, 
								'CodigosISO2600' => $key->CodigosISO2600, 
								'Area' => $key->Area, 
								'Modulo' => $key->Modulo, 
								'SubModulo' => $key->SubModulo, 
								'Tabla' => $key->Tabla, 
								'FormulaResultado' => $key->FormulaResultado, 
								'Numerador' => $key->Numerador, 
								'Denominador' => $key->Denominador, 
								'Meta' => $key->Meta, 
								'Desde0' => $key->Desde0, 
								'Hasta0' => $key->Hasta0, 
								'Desc0' => $key->Desc0, 
								'Nota0' => $key->Nota0, 
								'Desde1' => $key->Desde1, 
								'Hasta1' => $key->Hasta1, 
								'Desc1' => $key->Desc1, 
								'Nota1' => $key->Nota1, 
								'Desde2' => $key->Desde2, 
								'Hasta2' => $key->Hasta2, 
								'Desc2' => $key->Desc2, 
								'Nota2' => $key->Nota2, 
								'Desde3' => $key->Desde3, 
								'Hasta3' => $key->Hasta3, 
								'Desc3' => $key->Desc3, 
								'Nota3' => $key->Nota3, 
								'Desde4' => $key->Desde4, 
								'Hasta4' => $key->Hasta4, 
								'Desc4' => $key->Desc4, 
								'Nota4' => $key->Nota4, 
								'Desde5' => $key->Desde5, 
								'Hasta5' => $key->Hasta5, 
								'Desc5' => $key->Desc5, 
								'Nota5' => $key->Nota5, 
								'FormulaCalificacion' => $key->FormulaCalificacion, 
								'UnidadMedida' => $key->UnidadMedida, 
								'IdEmpresa' => $key->IdEmpresa, 
								);		
		$resp = $this->db->insert('IndicadoresEmpresa', $insertIndicadorEmpresa);			
		}
		if ($resp) {
			return true;
		}else{
			return false;
		}

	}

	public function insertIndicadoresSeleccionadoPorFiltro2($IdEmpresa, $periodo, $filtro){
		$query = "INSERT INTO IndicadoresEmpresa(`IdIndicador`, `Nombre`, `CriterioIndicador`, `Resultado`, `Dimension`, `SubDimension`, `PrincipiosSEPS`, `PrincipiosPactoMundial`, `GrupoInteres`, `Herramienta`, `CodigosGRI`, `CodigosISO2600`, `Area`, `Modulo`, `SubModulo`, `Tabla`, `FormulaResultado`, `Numerador`, `Denominador`, `Meta`, `Desde0`, `Hasta0`, `Desc0`, `Nota0`, `Desde1`, `Hasta1`, `Desc1`, `Nota1`, `Desde2`, `Hasta2`, `Desc2`, `Nota2`, `Desde3`, `Hasta3`, `Desc3`, `Nota3`, `Desde4`, `Hasta4`, `Desc4`, `Nota4`, `Desde5`, `Hasta5`, `Desc5`, `Nota5`, `FormulaCalificacion`, `UnidadMedida`, `Periodo`, `Sector`, `IdEmpresa`, `PrincipiosACI`,`DimensionesACI`) SELECT `IdIndicador`, `Nombre`, `CriterioIndicador`, `Resultado`, `Dimension`, `SubDimension`, `PrincipiosSEPS`, `PrincipiosPactoMundial`, `GrupoInteres`, `Herramienta`, `CodigosGRI`, `CodigosISO2600`, `Area`, `Modulo`, `SubModulo`, `Tabla`, `FormulaResultado`, `Numerador`, `Denominador`, `Meta`, `Desde0`, `Hasta0`, `Desc0`, `Nota0`, `Desde1`, `Hasta1`, `Desc1`, `Nota1`, `Desde2`, `Hasta2`, `Desc2`, `Nota2`, `Desde3`, `Hasta3`, `Desc3`, `Nota3`, `Desde4`, `Hasta4`, `Desc4`, `Nota4`, `Desde5`, `Hasta5`, `Desc5`, `Nota5`, `FormulaCalificacion`, `UnidadMedida`,'".$periodo."', `Sector`,'".$IdEmpresa."', `PrincipiosACI`,`DimensionesACI` FROM indicador WHERE indicador.IdIndicador IN (".$filtro.")";
		$insert = $this->db->query($query); 
		if($insert){
			return true;
		}else{
			return false;
		}	
	}

	public function insertIndicadoresSeleccionadoPorFiltro($IdEmpresa, $periodo, $filtro){
		$existePeriodo = $this->db->query("SELECT * FROM IndicadoresEmpresa WHERE Periodo = ".$periodo.";");
		if ($existePeriodo->num_rows() > 0){
			$this->db->where('Periodo', $periodo)->where('IdEmpresa', $IdEmpresa);
			$this->db->delete('IndicadoresEmpresa');
		}
		
		$this->db->select("* ,".$periodo." AS Periodo, ".$IdEmpresa." AS IdEmpresa");
		$resultado = $this->db->where('Sector', $filtro)->get('Indicador');
		$resp = false;
		foreach ($resultado->result() as $key) {
			$insertIndicadorEmpresa = array(
								'IdIndicador' => $key->IdIndicador, 
								'Nombre' => $key->Nombre, 
								'CriterioIndicador' => $key->CriterioIndicador, 
								'Resultado' => $key->Resultado, 
								'Dimension' => $key->Dimension, 
								'SubDimension' => $key->SubDimension, 
								'PrincipiosSEPS' => $key->PrincipiosSEPS, 
								'PrincipiosPactoMundial' => $key->PrincipiosPactoMundial, 
								'GrupoInteres' => $key->GrupoInteres, 
								'Herramienta' => $key->Herramienta, 
								'CodigosGRI' => $key->CodigosGRI, 
								'CodigosISO2600' => $key->CodigosISO2600, 
								'Area' => $key->Area, 
								'Modulo' => $key->Modulo, 
								'SubModulo' => $key->SubModulo, 
								'Tabla' => $key->Tabla, 
								'FormulaResultado' => $key->FormulaResultado, 
								'Numerador' => $key->Numerador, 
								'Denominador' => $key->Denominador, 
								'Meta' => $key->Meta, 
								'Desde0' => $key->Desde0, 
								'Hasta0' => $key->Hasta0, 
								'Desc0' => $key->Desc0, 
								'Nota0' => $key->Nota0, 
								'Desde1' => $key->Desde1, 
								'Hasta1' => $key->Hasta1, 
								'Desc1' => $key->Desc1, 
								'Nota1' => $key->Nota1, 
								'Desde2' => $key->Desde2, 
								'Hasta2' => $key->Hasta2, 
								'Desc2' => $key->Desc2, 
								'Nota2' => $key->Nota2, 
								'Desde3' => $key->Desde3, 
								'Hasta3' => $key->Hasta3, 
								'Desc3' => $key->Desc3, 
								'Nota3' => $key->Nota3, 
								'Desde4' => $key->Desde4, 
								'Hasta4' => $key->Hasta4, 
								'Desc4' => $key->Desc4, 
								'Nota4' => $key->Nota4, 
								'Desde5' => $key->Desde5, 
								'Hasta5' => $key->Hasta5, 
								'Desc5' => $key->Desc5, 
								'Nota5' => $key->Nota5, 
								'FormulaCalificacion' => $key->FormulaCalificacion, 
								'UnidadMedida' => $key->UnidadMedida, 
								'Periodo' => $key->Periodo, 
								'Sector' => $key->Sector, 
								'IdEmpresa' => $key->IdEmpresa, 
								);		
		$resp = $this->db->insert('IndicadoresEmpresa', $insertIndicadorEmpresa);			
		}
		if ($resp) {
			return true;
		}else{
			return false;
		}
	}
	public function getListIndicadoresNoSeleccionadosEmpresa($arrayIndicadoresEmpresa){
//$sql = "SELECT Nombre, 1 AS Seleccion FROM Indicador WHERE IdIndicador IN (".$arrayIndicadoresEmpresa.") UNION SELECT Nombre, 0 AS Seleccion FROM Indicador WHERE IdIndicador NOT IN (".$arrayIndicadoresEmpresa.")";

		$resultado = $this->db->where_in('IdIndicador', $arrayIndicadoresEmpresa)->get('Indicador');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getIndicadorCuantitativoEmpresa($IdIndicadorEmpresa){
		$this->db->where('IdIndicadorEmpresa', $IdIndicadorEmpresa);
		$resultado = $this->db->get('IndicadoresEmpresa');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	/**
	 * Indicadores Cuantitativos Calificados
	 */
	public function getListIndicadorCuantitativoCalificado($IdEmpresa){
		$this->db->order_by("ICFecha", "ASC");
		$this->db->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('IndicadorCalificado');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getListIndicadorCuantitativoCalificadoJOIN($IdEmpresa){
		$this->db->select('*, Periodo');
		$this->db->from('IndicadorCalificado');
		$this->db->join('DatosTotales', 'DatosTotales.IdDatosTotales = IndicadorCalificado.IdDatosTotales');
		$this->db->order_by("ICFecha", "ASC");
		$this->db->where('IndicadorCalificado.IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get();
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getListIndicadorCuantitativoCalificadoAnio($anio, $IdEmpresa){
		$this->db->select('IdIndicadorCalificado, ICIndicador, ICTextoResultado, ICFormula, ICNumerador, ICDenominador, ICResultado, ICFecha, ICCalificacion, ICComentario, UnidadMedida, IdEmpresa');
		$this->db->order_by("ICIndicador", "ASC");
		$this->db->where('YEAR(ICFecha)', $anio)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('IndicadorCalificado');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getIndicadorCuantitativoCalificadoEmpresa($IdIndicadorCalificado, $IdEmpresa){
		$this->db->where('IdIndicadorCalificado', $IdIndicadorCalificado)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('IndicadorCalificado');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updateIndicadorCuantitativoCalificadoEmpresa($IdIndicadorCalificado, $IdIndicador, $ICComentario, $IdEmpresa){		
		$this->db->trans_start();
		$sqlUpdate = "UPDATE IndicadorCalificado SET ICComentario = '".$ICComentario."' WHERE IdIndicadorCalificado = ".$IdIndicadorCalificado." AND ICIndicador =".$IdIndicador." AND IdEmpresa = ".$IdEmpresa."";
		$update = $this->db->query($sqlUpdate);
		$this->db->trans_complete();		
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function getListDatosTotales($IdEmpresa){
		$this->db->select("IdDatosTotales, Periodo, FechaSistema");
		$this->db->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('DatosTotales');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function getListDistinctDatosTotales($IdEmpresa){
		$this->db->distinct();
		$this->db->select("Periodo");
		$this->db->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('DatosTotales');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	/**
	 * Indicadores Culitativos Seleccionados de la Empresa
	 */
	public function getListIndicadorCualitativosSeleccionadosEmpresa($IdEmpresa){
		$this->db->order_by("IdIndicadorCualitativo", "ASC");
		$this->db->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('IndicadorCualitativoEmpresa');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}	
	public function insertIndicadoresCualitativosSeleccionados($IdEmpresa, $arrayIndicadoresSeleccionados){
		$this->db->query("DELETE FROM IndicadorCualitativoEmpresa");
		$sqlSelect = $this->db->select("* ,".$IdEmpresa." AS IdEmpresa");
		$resultado = $this->db->where_in('SubDimension', $arrayIndicadoresSeleccionados)->get('IndicadorCualitativo');
		foreach ($resultado->result() as $key) {
			$indicadorCualitativoEmpresa = array(
								'IdIndicadorCualitativo' => $key->IdIndicadorCualitativo, 
								'Fase' => $key->Fase, 
								'IndicadorCualitativo' => $key->IndicadorCualitativo, 
								'Pregunta' => $key->Pregunta, 
								'CodigoGRI' => $key->CodigoGRI, 
								'Dimension' => $key->Dimension, 
								'SubDimension' => $key->SubDimension, 
								'Puntuacion' => $key->Puntuacion, 
								'Respuesta' => $key->Respuesta,
								'NoRespuesta' => $key->NoRespuesta,
								'IdEmpresa' => $key->IdEmpresa
								);
		$resp = $this->db->insert('IndicadorCualitativoEmpresa', $indicadorCualitativoEmpresa);	
		
		}
		if ($resp) {
			return true;
		}else{
			return false;
		}
	}
	public function insertIndicadoresCualitativosCalificados($IdEmpresa, $anio){
		$tiempo = time();
		$fechaSistema = date("Y-m-d", $tiempo);
		$sqlSelect = $this->db->select("* ,".$IdEmpresa." AS IdEmpresa");
		$resultado = $this->db->get('IndicadorCualitativoEmpresa');
		$resp = false;
		foreach ($resultado->result() as $key) {
			$indicadorCualitativoEmpresa = array(
								'IdIndicadorCualitativo' => $key->IdIndicadorCualitativo, 
								'Fase' => $key->Fase, 
								'IndicadorCualitativo' => $key->IndicadorCualitativo, 
								'Pregunta' => $key->Pregunta, 
								'CodigoGRI' => $key->CodigoGRI, 
								'Dimension' => $key->Dimension, 
								'SubDimension' => $key->SubDimension, 
								'Puntuacion' => $key->Puntuacion, 
								'Respuesta' => $key->Respuesta,
								'Calificacion' => $key->NoRespuesta,
								'Periodo' => $anio,
								'FechaSistema' => $fechaSistema,
								'IdEmpresa' => $key->IdEmpresa
								);
		$resp = $this->db->insert('IndicadorCualitativoCalificado', $indicadorCualitativoEmpresa);	
		
		}
		if ($resp) {
			return true;
		}else{
			return false;
		}
	}
	public function getListIndicadorCualitativoEmpresaCalificado($IdEmpresa, $anio){
		$this->db->order_by("IdIndicadorCualitativo", "ASC");
		$this->db->where('IdEmpresa', $IdEmpresa)->where('Periodo', $anio);
		$resultado = $this->db->get('IndicadorCualitativoCalificado');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getIndicadorCualitativoEmpresaCalificado($IdICEmpresa, $IdEmpresa, $anio){		
		$this->db->where('IdICEmpresa', $IdICEmpresa)->where('IdEmpresa', $IdEmpresa)->where('Periodo', $anio);
		$resultado = $this->db->get('IndicadorCualitativoCalificado');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function updateIndicadorCualitativoCalificadoEmpresa($IdIndicadorCalificado, $IdIndicador, $ICComentario, $IdEmpresa){		
		$this->db->trans_start();
		$sqlUpdate = "UPDATE IndicadorCualitativoCalificado SET Justificacion = '".$ICComentario."' WHERE IdICEmpresa = ".$IdIndicadorCalificado." AND IdIndicadorCualitativo =".$IdIndicador." AND IdEmpresa = ".$IdEmpresa.";";
		$update = $this->db->query($sqlUpdate);
		$this->db->trans_complete();		
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function recalcularIndicadorCualitativoCalificadoEmpresa($arrayIndicadorCalificado, $anio, $IdEmpresa){
		if ($arrayIndicadorCalificado != NULL) {
			$this->db->select("IdICEmpresa, IdIndicadorCualitativo, Fase, IndicadorCualitativo, Puntuacion, Respuesta AS Calificacion, IdEmpresa");
			$recalculaSiCheck = $this->db->where_in('IdIndicadorCualitativo',$arrayIndicadorCalificado)->get('IndicadorCualitativoEmpresa');	
			foreach ($recalculaSiCheck->result() as $key ) {
				//echo $key->IdICEmpresa." ".$key->IdIndicadorCualitativo." ".$key->IndicadorCualitativo." ".$key->Calificacion." ".$anio." ".$IdEmpresa."<br>";

				$sqlUpdateCalificacion = "UPDATE IndicadorCualitativoCalificado SET Calificacion = '".$key->Calificacion."' WHERE IdIndicadorCualitativo = ".$key->IdIndicadorCualitativo." AND Periodo = ".$anio." AND IdEmpresa = ".$IdEmpresa.";";
				$this->db->query($sqlUpdateCalificacion);
			}

			$this->db->select("IdICEmpresa, IdIndicadorCualitativo, Fase, IndicadorCualitativo, Puntuacion, NoRespuesta AS Calificacion, IdEmpresa");
			$recalculaNoCheck = $this->db->where_not_in('IdIndicadorCualitativo',$arrayIndicadorCalificado)->get('IndicadorCualitativoEmpresa');
			foreach ($recalculaNoCheck->result() as $key ) {

				$sqlUpdateCalificacion = "UPDATE IndicadorCualitativoCalificado SET Calificacion = '".$key->Calificacion."' WHERE IdIndicadorCualitativo = ".$key->IdIndicadorCualitativo." AND Periodo = ".$anio." AND IdEmpresa = ".$IdEmpresa.";";
				$this->db->query($sqlUpdateCalificacion);
			}

		}else{
			$this->db->select("IdICEmpresa, IdIndicadorCualitativo, Fase, IndicadorCualitativo, Puntuacion, NoRespuesta AS Calificacion, IdEmpresa");

			$recalculaNoCheck = $this->db->where_not_in('IdIndicadorCualitativo',$arrayIndicadorCalificado)->get('IndicadorCualitativoEmpresa');
			foreach ($recalculaNoCheck->result() as $key ) {
				$sqlUpdateCalificacion = "UPDATE IndicadorCualitativoCalificado SET Calificacion = '".$key->Calificacion."' WHERE IdIndicadorCualitativo = ".$key->IdIndicadorCualitativo." AND Periodo = ".$anio." AND IdEmpresa = ".$IdEmpresa.";";
				$this->db->query($sqlUpdateCalificacion);
			}			
		}

	}
	public function deleteIndicadoresCualitativosEmpresaListaPeriodo($periodo, $IdEmpresa){
		$this->db->where('Periodo', $periodo)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('IndicadorCualitativoCalificado');
	}
	/**
	 * Reportes, Gráficos
	 */
	public function obtenerDatosReportePorSubDimension(){
		
	}

}



 ?>