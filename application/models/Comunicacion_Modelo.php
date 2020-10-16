<?php 

/**
* 
*/
class Comunicacion_Modelo extends CI_Model{
	
	function __construct(){
		# code...
	}

	public function insertComunicacion($arrayComunicacion){
		/*
		$comunicacion = array('RucProveedor' => $arrayComunicacion['RucProveedor'],
							  'NombreComunicacion' => $arrayComunicacion['NombreComunicacion'],
							  'EstadoComunicacion' => $arrayComunicacion['EstadoComunicacion'],
							  'MediosDeInformacion' => $arrayComunicacion['MediosDeInformacion'],
							  'TipoMecanismos' => $arrayComunicacion['TipoMecanismos'],
							  'DescripcionMecanismosDeComunicacion' => $arrayComunicacion['DescripcionMecanismosDeComunicacion'],
							  'CostoComunicacion' => $arrayComunicacion['CostoComunicacion'],
							  'Fecha' => $arrayComunicacion['Fecha'],
							  'Dirigido' => $arrayComunicacion['Dirigido'],
							  'ResultadoDeComunicacion' => $arrayComunicacion['ResultadoDeComunicacion'],
							  'Observaciones' => $arrayComunicacion['Observaciones'],
							  'IdEmpresa' => $arrayComunicacion['IdEmpresa']
							  );
		*/
		$this->db->trans_start();
		$insert = $this->db->insert('Comunicacion', $arrayComunicacion);
		$this->db->trans_complete();
		if($insert){
			return true;
		}else{
			return false;
		}

	}
	public function getListComunicacion($IdEmpresa){		
		$resultado = $this->db->where('IdEmpresa',$IdEmpresa)->get('Comunicacion');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getCominicacion($IdComunicacion, $IdEmpresa){
		$this->db->where('IdComunicacion', $IdComunicacion)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('Comunicacion');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function updateComunicacion($IdComunicacion, $arrayComunicacion){
		/*
		$comunicacion = array('RucProveedor' => $arrayComunicacion['RucProveedor'],
							  'NombreComunicacion' => $arrayComunicacion['NombreComunicacion'],
							  'EstadoComunicacion' => $arrayComunicacion['EstadoComunicacion'],
							  'MediosDeInformacion' => $arrayComunicacion['MediosDeInformacion'],
							  'TipoMecanismos' => $arrayComunicacion['TipoMecanismos'],
							  'DescripcionMecanismosDeComunicacion' => $arrayComunicacion['DescripcionMecanismosDeComunicacion'],
							  'CostoComunicacion' => $arrayComunicacion['CostoComunicacion'],
							  'Fecha' => $arrayComunicacion['Fecha'],
							  'Dirigido' => $arrayComunicacion['Dirigido'],
							  'ResultadoDeComunicacion' => $arrayComunicacion['ResultadoDeComunicacion'],
							  'Observaciones' => $arrayComunicacion['Observaciones'],
							  'IdEmpresa' => $arrayComunicacion['IdEmpresa']
							  );
		*/
		$this->db->trans_start();
		$this->db->where('IdComunicacion', $IdComunicacion);
		$update = $this->db->update('Comunicacion', $arrayComunicacion);
		$this->db->trans_complete();
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function deleteComunicacion($IdComunicacion, $IdEmpresa){
		$this->db->where('IdComunicacion', $IdComunicacion)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('Comunicacion');
	}





}


 ?>