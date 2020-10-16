<?php 

/**
* 
*/
class Donacion_Modelo extends CI_Model{
	
	function __construct(){
		# code...
	}

	public function insertDonacion($arrayDonacion){
		//Especificar los campos de cada dato del array
		/*
		$donacion = array('Beneficiario' => $arrayDonacion['Beneficiario'],
						  'MontoDonacion' => $arrayDonacion['MontoDonacion'],
						  'TipoDonacion' => $arrayDonacion['TipoDonacion'],
						  'FormaDonacion' => $arrayDonacion['FormaDonacion'],
						  'ObjetivoDonacion' => $arrayDonacion['ObjetivoDonacion'],
						  'Imagen' => $arrayDonacion['Imagen'],
						  'FechaMes' => $arrayDonacion['FechaMes'],
						  'Fecha' => $arrayDonacion['Fecha'],
						  'IdEmpresa' => $arrayDonacion['IdEmpresa']
						  );
		*/
		$sql = "INSERT INTO Donaciones(IdDonaciones, Beneficiario, MontoDonacion, TipoDonacion, FormaDonacion, ObjetivoDonacion, Imagen, FechaMes, Periodo, FechaSistema, IdEmpresa) VALUES (null, '".$arrayDonacion['Beneficiario']."', '".$arrayDonacion['MontoDonacion']."', '".$arrayDonacion['TipoDonacion']."', '".$arrayDonacion['FormaDonacion']."', '".$arrayDonacion['ObjetivoDonacion']."', '".$arrayDonacion['Imagen']."', '".$arrayDonacion['FechaMes']."', '".$arrayDonacion['Periodo']."', '".$arrayDonacion['FechaSistema']."', '".$arrayDonacion['IdEmpresa']."');";

		$this->db->trans_start();
		//$insert = $this->db->insert('Donaciones',$donacion);
		$insert = $this->db->query($sql);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}
	}
	public function getListDonacion($IdEmpresa){
		$resultado = $this->db->where('IdEmpresa',$IdEmpresa)->get('Donaciones');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getListDonacionPeriodo($Periodo, $IdEmpresa){
		$sql = "SELECT * FROM Donaciones WHERE Periodo = '".$Periodo."' AND TipoDonacion = 'Otorgada' AND IdEmpresa = '".$IdEmpresa."' LIMIT 4;";	
		$resultado = $this->db->query($sql);		
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getDonacion($IdDonaciones, $IdEmpresa){
		$this->db->where('IdDonaciones', $IdDonaciones)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('Donaciones');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updateDonacion($IdDonaciones, $arrayDonacion, $IdEmpresa){
		/*
		$donacion = array('Beneficiario' => $arrayDonacion['Beneficiario'],
						  'MontoDonacion' => $arrayDonacion['MontoDonacion'],
						  'TipoDonacion' => $arrayDonacion['TipoDonacion'],
						  'FormaDonacion' => $arrayDonacion['FormaDonacion'],
						  'ObjetivoDonacion' => $arrayDonacion['ObjetivoDonacion'],
						  'Imagen' => $arrayDonacion['Imagen'],
						  'FechaMes' => $arrayDonacion['FechaMes'],
						  'Fecha' => $arrayDonacion['Fecha'],
						  'IdEmpresa' => $arrayDonacion['IdEmpresa']
						  );
		*/
		if ($arrayDonacion['Imagen'] == "") {
			$sql = "UPDATE Donaciones SET Beneficiario = '".$arrayDonacion['Beneficiario']."', MontoDonacion = '".$arrayDonacion['MontoDonacion']."', TipoDonacion = '".$arrayDonacion['TipoDonacion']."', FormaDonacion = '".$arrayDonacion['FormaDonacion']."', ObjetivoDonacion = '".$arrayDonacion['ObjetivoDonacion']."', FechaMes = '".$arrayDonacion['FechaMes']."', Periodo = '".$arrayDonacion['Periodo']."', FechaSistema = '".$arrayDonacion['FechaSistema']."'  WHERE IdDonaciones = '".$IdDonaciones."' AND IdEmpresa = '".$IdEmpresa."';";
		}else{
			$sql = "UPDATE Donaciones SET Beneficiario = '".$arrayDonacion['Beneficiario']."', MontoDonacion = '".$arrayDonacion['MontoDonacion']."', TipoDonacion = '".$arrayDonacion['TipoDonacion']."', FormaDonacion = '".$arrayDonacion['FormaDonacion']."', ObjetivoDonacion = '".$arrayDonacion['ObjetivoDonacion']."', Imagen = '".$arrayDonacion['Imagen']."', FechaMes = '".$arrayDonacion['FechaMes']."', Periodo = '".$arrayDonacion['Periodo']."', FechaSistema = '".$arrayDonacion['FechaSistema']."'  WHERE IdDonaciones = '".$IdDonaciones."' AND IdEmpresa = '".$IdEmpresa."';";
		}

		$this->db->trans_start();
		//$this->db->where('IdDonaciones', $IdDonaciones);
		//$update = $this->db->update('Donaciones',$donacion);
		$update = $this->db->query($sql);
		$this->db->trans_complete();		
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function deleteDonacion($IdDonaciones, $IdEmpresa){
		$this->db->where('IdDonaciones', $IdDonaciones)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('Donaciones');
	}



}

 ?>