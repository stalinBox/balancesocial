<?php 

/**
* 
*/
class Certificaciones_Modelo extends CI_Model{
	
	function __construct(){
		# code...
	}

	public function insertCertificaciones($arrayCertificaciones){
		$sql = "INSERT INTO Certificaciones(IdCertificacion, NombreCertificacion, TipoCertificacion, EmisorCertificacion, FechaDePlanificacion, ObtenidoCertificacion, CostoCertificacion, FechaObtencionCertificacion, Imagen, Observacion, Periodo, FechaSistema, IdEmpresa) VALUES (null, '".$arrayCertificaciones['NombreCertificacion']."', '".$arrayCertificaciones['TipoCertificacion']."', '".$arrayCertificaciones['EmisorCertificacion']."', '".$arrayCertificaciones['FechaDePlanificacion']."', '".$arrayCertificaciones['ObtenidoCertificacion']."', '".$arrayCertificaciones['CostoCertificacion']."', '".$arrayCertificaciones['FechaObtencionCertificacion']."', '".$arrayCertificaciones['Imagen']."', '".$arrayCertificaciones['Observacion']."', '".$arrayCertificaciones['Periodo']."', '".$arrayCertificaciones['FechaSistema']."', '".$arrayCertificaciones['IdEmpresa']."');";
		
		$this->db->trans_start();
		//$insert = $this->db->insert('Certificaciones', $certificacion);
		$insert = $this->db->query($sql);
		$this->db->trans_complete();
		if($insert){
			return true;
		}else{
			return false;
		}
	}

	public function getListCertificaciones($IdEmpresa){
		$resultado = $this->db->where('IdEmpresa',$IdEmpresa)->get('Certificaciones');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}

	public function getCertificaciones($IdCertificacion, $IdEmpresa){
		$this->db->where('IdCertificacion', $IdCertificacion)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('Certificaciones');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;

	}
	public function getCertificacionesPeriodo($Periodo, $IdEmpresa){
		$this->db->where('Periodo', $Periodo)->where('IdEmpresa', $IdEmpresa)->where('ObtenidoCertificacion', "SI");
		$resultado = $this->db->limit(3);
		$resultado = $this->db->get('Certificaciones');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;

	}
	public function updateCertificaciones($IdCertificacion ,$arrayCertificaciones, $IdEmpresa){
		if ($arrayCertificaciones['Imagen'] == "") {
			$sql = "UPDATE Certificaciones SET NombreCertificacion = '".$arrayCertificaciones['NombreCertificacion']."' ,TipoCertificacion = '".$arrayCertificaciones['TipoCertificacion']."', EmisorCertificacion = '".$arrayCertificaciones['EmisorCertificacion']."', FechaDePlanificacion = '".$arrayCertificaciones['FechaDePlanificacion']."', ObtenidoCertificacion = '".$arrayCertificaciones['ObtenidoCertificacion']."', CostoCertificacion = '".$arrayCertificaciones['CostoCertificacion']."', FechaObtencionCertificacion = '".$arrayCertificaciones['FechaObtencionCertificacion']."', Observacion = '".$arrayCertificaciones['Observacion']."',	Periodo = '".$arrayCertificaciones['Periodo']."', FechaSistema = '".$arrayCertificaciones['FechaSistema']."' WHERE IdCertificacion = '".$IdCertificacion."' AND IdEmpresa = '".$IdEmpresa."';";
		}else{
			$sql = "UPDATE Certificaciones SET NombreCertificacion = '".$arrayCertificaciones['NombreCertificacion']."', TipoCertificacion = '".$arrayCertificaciones['TipoCertificacion']."', EmisorCertificacion = '".$arrayCertificaciones['EmisorCertificacion']."', FechaDePlanificacion = '".$arrayCertificaciones['FechaDePlanificacion']."', ObtenidoCertificacion = '".$arrayCertificaciones['ObtenidoCertificacion']."', CostoCertificacion = '".$arrayCertificaciones['CostoCertificacion']."', FechaObtencionCertificacion = '".$arrayCertificaciones['FechaObtencionCertificacion']."', Imagen = '".$arrayCertificaciones['Imagen']."', Observacion = '".$arrayCertificaciones['Observacion']."', Periodo = '".$arrayCertificaciones['Periodo']."',	FechaSistema = '".$arrayCertificaciones['FechaSistema']."' WHERE IdCertificacion = '".$IdCertificacion."' AND IdEmpresa = '".$IdEmpresa."';";
		}
		$this->db->trans_start();
		//$this->db->where('IdCertificacion', $IdCertificacion)->where('IdEmpresa', $IdEmpresa);
		//$update = $this->db->update('Certificaciones', $certificacion);
		$update = $this->db->query($sql);
		$this->db->trans_complete();
		if($update){
			return true;
		}else{
			return false;
		}
		
	}
	public function deleteCertificaciones($IdCertificacion, $IdEmpresa){
		$this->db->where('IdCertificacion', $IdCertificacion)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('Certificaciones');
	}



}





 ?>