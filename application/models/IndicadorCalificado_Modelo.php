<?php 
/**
* 
*/
class IndicadorCalificado_Modelo extends CI_Model{
	
	function __construct(){
		# code...
	}

	public function insertIndicadorCalificado($arrayIndicadorCalificado){
		//Especificar los campos de cada dato del array
		$indicadorCalificado = array('ICIndicador' => $arrayIndicadorCalificado['ICIndicador'],
									 'ICNumerador' => $arrayIndicadorCalificado['ICNumerador'],
									 'ICDenominador' => $arrayIndicadorCalificado['ICDenominador'],
									 'ICResultado' => $arrayIndicadorCalificado['ICResultado'],
									 'ICFecha' => $arrayIndicadorCalificado['ICFecha'],
									 'ICCalificacion' => $arrayIndicadorCalificado['ICCalificacion'],
									 'ICComentatio' => $arrayIndicadorCalificado['ICComentatio'],
									 'BalanceSocial_idBalanceSocial' => $arrayIndicadorCalificado['BalanceSocial_idBalanceSocial']
									 );
		$this->db->trans_start();
		$insert = $this->db->insert('IndicadorCalificado',$indicadorCalificado);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}		
	}
	public function getListIndicadorCalificado(){
		$resultado = $this->db->get('IndicadorCalificado');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getIndicadorCalificado($idIndicadorCalificado){
		$this->where('idIndicadorCalificado', $idIndicadorCalificado);
		$resultado = $this->db->get('IndicadorCalificado');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updateIndicadorCalificado($idIndicadorCalificado, $arrayIndicadorCalificado){
		//Especificar los campos de cada dato del array
		$indicadorCalificado = array('ICIndicador' => $arrayIndicadorCalificado['ICIndicador'],
									 'ICNumerador' => $arrayIndicadorCalificado['ICNumerador'],
									 'ICDenominador' => $arrayIndicadorCalificado['ICDenominador'],
									 'ICResultado' => $arrayIndicadorCalificado['ICResultado'],
									 'ICFecha' => $arrayIndicadorCalificado['ICFecha'],
									 'ICCalificacion' => $arrayIndicadorCalificado['ICCalificacion'],
									 'ICComentatio' => $arrayIndicadorCalificado['ICComentatio'],
									 'BalanceSocial_idBalanceSocial' => $arrayIndicadorCalificado['BalanceSocial_idBalanceSocial']
									 );
		$this->db->trans_start();
		$this->db->where('idIndicadorCalificado', $idIndicadorCalificado);
		$update = $this->db->update('IndicadorCalificado',$indicadorCalificado);
		$this->db->trans_complete();		
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function deleteIndicadorCalificado($idIndicadorCalificado){
		$this->db->where('idIndicadorCalificado', $idIndicadorCalificado);
		return $this->db->delete('IndicadorCalificado');
	}

	public function calificateIndicador(){
		//Obtengo la fórmula de cada indicador
		$formula = $this->db->query("SELECT idIndicador, I.idIndicadorCalificado, I.ICResultado, Formula FROM Indicador, IndicadorCalificado I WHERE idIndicador = I.idIndicadorCalificado");
			foreach ($formula->result() as $fila) {
				//echo $fila->idIndicador. "  " .$fila->Formula;
				echo "<br>";
				//Cargo cada fórmula para cada fila en otra consulta para retoranal la calificación
				//$sqlCalificacion = "SELECT CASE ".$fila->Formula." ELSE -1 END AS NotaRespuesta FROM indicadorCalificado2 WHERE ";
				echo "<br>";
				$sqlObtenerCalificacion = "SELECT I.idIndicadorCalificado, idIndicador, I.ICResultado, CASE ".$fila->Formula." ELSE -1 END AS NotaRespuesta FROM Indicador, IndicadorCalificado I WHERE idIndicador = I.idIndicadorCalificado AND I.idIndicadorCalificado = ".$fila->idIndicadorCalificado." LIMIT 1";
				echo $sqlObtenerCalificacion;
				echo "<br>";
				$obtengoCalificacion = $this->db->query($sqlObtenerCalificacion);
				foreach ($obtengoCalificacion->result() as $row) {
					echo "<br>";
					//Actualizo la tabla indicadorCalificado en el campo ICCalificacion
					$sqlUpdate = "UPDATE IndicadorCalificado SET ICCalificacion = ".$row->NotaRespuesta." WHERE idIndicadorCalificado = ".$row->idIndicadorCalificado."";
					echo $sqlUpdate;
					$resultado = $this->db->query($sqlUpdate);

				}
				echo "<br>";
			}

}



 ?>