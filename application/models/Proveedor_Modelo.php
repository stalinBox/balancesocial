<?php 
/**
* 
*/
class Proveedor_Modelo extends CI_Model{
	
	function __construct(){
		# code...
	}

	public function insertProveedor($arrayProveedor){
		$sql = "INSERT INTO Proveedor(IdProveedor, RucProveedor, NombreProveedor, TipoProveedor, DireccionProveedor, AlcanceProveedor, TelefonoProveedor, NacionalidadProveedor, TipoEmpresaProveedor, EstadoProveedor, TipoEvaluacion, PoliticasProveedor, ImagenProveedor, IdEmpresa) VALUES (null, '".$arrayProveedor['RucProveedor']."', '".$arrayProveedor['NombreProveedor']."', '".$arrayProveedor['TipoProveedor']."', '".$arrayProveedor['DireccionProveedor']."', '".$arrayProveedor['AlcanceProveedor']."', '".$arrayProveedor['TelefonoProveedor']."', '".$arrayProveedor['NacionalidadProveedor']."', '".$arrayProveedor['TipoEmpresaProveedor']."', '".$arrayProveedor['EstadoProveedor']."', '".$arrayProveedor['TipoEvaluacion']."', '".$arrayProveedor['PoliticasProveedor']."', '".$arrayProveedor['ImagenProveedor']."', '".$arrayProveedor['IdEmpresa']."');";

		$this->db->trans_start();
		//$insert = $this->db->insert('Proveedor',$proveedor);
		$insert = $this->db->query($sql);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}		
	}
	public function getListProveedor($IdEmpresa){
		$resultado = $this->db->where('IdEmpresa',$IdEmpresa)->get('Proveedor');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getProveedor($IdProveedor, $IdEmpresa){
		$this->db->where('IdProveedor', $IdProveedor)->where('IdEmpresa',$IdEmpresa);
		$resultado = $this->db->get('Proveedor');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updateProveedor($IdProveedor, $arrayProveedor, $IdEmpresa){
		if ($arrayProveedor['ImagenProveedor'] == "") {
			$sql = "UPDATE  Proveedor  SET  RucProveedor = '".$arrayProveedor['RucProveedor']."', NombreProveedor = '".$arrayProveedor['NombreProveedor']."', TipoProveedor = '".$arrayProveedor['TipoProveedor']."', DireccionProveedor = '".$arrayProveedor['DireccionProveedor']."', AlcanceProveedor = '".$arrayProveedor['AlcanceProveedor']."', TelefonoProveedor = '".$arrayProveedor['TelefonoProveedor']."', NacionalidadProveedor = '".$arrayProveedor['NacionalidadProveedor']."', TipoEmpresaProveedor = '".$arrayProveedor['TipoEmpresaProveedor']."', EstadoProveedor = '".$arrayProveedor['EstadoProveedor']."', TipoEvaluacion = '".$arrayProveedor['TipoEvaluacion']."', PoliticasProveedor = '".$arrayProveedor['PoliticasProveedor']."' WHERE IdProveedor = '".$IdProveedor."' AND IdEmpresa = '".$IdEmpresa."';";
		}else{
			$sql = "UPDATE  Proveedor  SET  RucProveedor = '".$arrayProveedor['RucProveedor']."', NombreProveedor = '".$arrayProveedor['NombreProveedor']."', TipoProveedor = '".$arrayProveedor['TipoProveedor']."', DireccionProveedor = '".$arrayProveedor['DireccionProveedor']."', AlcanceProveedor = '".$arrayProveedor['AlcanceProveedor']."', TelefonoProveedor = '".$arrayProveedor['TelefonoProveedor']."', NacionalidadProveedor = '".$arrayProveedor['NacionalidadProveedor']."', TipoEmpresaProveedor = '".$arrayProveedor['TipoEmpresaProveedor']."', EstadoProveedor = '".$arrayProveedor['EstadoProveedor']."', TipoEvaluacion = '".$arrayProveedor['TipoEvaluacion']."', PoliticasProveedor = '".$arrayProveedor['PoliticasProveedor']."', ImagenProveedor = '".$arrayProveedor['ImagenProveedor']."' WHERE IdProveedor = '".$IdProveedor."' AND IdEmpresa = '".$IdEmpresa."';";
		}		

		$this->db->trans_start();
		//$this->db->where('IdProveedor', $IdProveedor)->where('IdEmpresa', $IdEmpresa);
		//$update = $this->db->update('Proveedor',$proveedor);
		$update = $this->db->query($sql);
		$this->db->trans_complete();		
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function deleteProveedor($IdProveedor, $IdEmpresa){
		$this->db->where('IdProveedor', $IdProveedor)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('Proveedor');
	}

	/**
	 * Proveedor Contrato
	 */	
	public function insertProveedorContrato($arrayProveedorContrato){
		//Especificar los campos de cada dato del array
		/*
		$proveedorContrato = array('TipoContrato' => $arrayProveedorContrato['TipoContrato'],
					   	   'TipoContrato' => $arrayProveedorContrato['TipoContrato'],
					   	   'IdProveedor' => $arrayProveedorContrato['IdProveedor'],
					   	   'ObjetoDeContrato' => $arrayProveedorContrato['ObjetoDeContrato'],
					   	   'FechaInicioContrato' => $arrayProveedorContrato['FechaInicioContrato'],
					   	   'FechaFinContrato' => $arrayProveedorContrato['FechaFinContrato'],
					   	   'ObligacionDePartes' => $arrayProveedorContrato['ObligacionDePartes'],
					   	   'IdEmpresa' => $arrayProveedorContrato['IdEmpresa']
					       );
		*/
		$this->db->trans_start();
		$insert = $this->db->insert('ProveedorContrato',$arrayProveedorContrato);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}		
	}
	public function getListProveedorContrato($IdEmpresa){
		$resultado = $this->db->where('IdEmpresa',$IdEmpresa)->get('ProveedorContrato');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getProveedorContrato($IdContrato, $IdEmpresa){
		$this->db->where('IdContrato', $IdContrato)->where('IdEmpresa',$IdEmpresa);
		$resultado = $this->db->get('ProveedorContrato');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function getNumContratoProveedorLocalPeriodo($Periodo, $IdEmpresa){
		$sql = "SELECT COUNT(PC.IdContrato) AS ContratosLocales FROM Proveedor P, ProveedorContrato PC WHERE P.AlcanceProveedor = 'Local' AND YEAR(PC.FechaInicioContrato) <= ".$Periodo." AND YEAR(PC.FechaFinContrato) >= ".$Periodo." AND P.IdProveedor = PC.IdProveedor AND P.IdEmpresa = ".$IdEmpresa.";";
		$resultado = $this->db->query($sql);
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function getNumContratoProveedorNacionalPeriodo($Periodo, $IdEmpresa){
		$sql = "SELECT COUNT(PC.IdContrato) AS ContratosNacionales FROM Proveedor P, ProveedorContrato PC WHERE P.AlcanceProveedor = 'Nacional' AND YEAR(PC.FechaInicioContrato) <= ".$Periodo." AND YEAR(PC.FechaFinContrato) >= ".$Periodo." AND P.IdProveedor = PC.IdProveedor AND P.IdEmpresa = ".$IdEmpresa.";";
		$resultado = $this->db->query($sql);
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function getNumContratoProveedorPeriodo($Periodo, $IdEmpresa){
		$sql = "SELECT COUNT(IdContrato) AS Contratos FROM ProveedorContrato WHERE YEAR(FechaInicioContrato) <= ".$Periodo." AND YEAR(FechaFinContrato) >= ".$Periodo." AND IdEmpresa = ".$IdEmpresa.";";
		$resultado = $this->db->query($sql);
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updateProveedorContrato($IdContrato, $arrayProveedorContrato, $IdEmpresa){
		$proveedorContrato = array('TipoContrato' => $arrayProveedorContrato['TipoContrato'],
					   	   'TipoContrato' => $arrayProveedorContrato['TipoContrato'],
					   	   'IdProveedor' => $arrayProveedorContrato['IdProveedor'],
					   	   'NombreProveedor' => $arrayProveedorContrato['NombreProveedor'],
					   	   'ObjetoDeContrato' => $arrayProveedorContrato['ObjetoDeContrato'],
					   	   'FechaInicioContrato' => $arrayProveedorContrato['FechaInicioContrato'],
					   	   'FechaFinContrato' => $arrayProveedorContrato['FechaFinContrato'],
					   	   'ObligacionDePartes' => $arrayProveedorContrato['ObligacionDePartes'],
					   	   'IdEmpresa' => $arrayProveedorContrato['IdEmpresa']
					       );
		$this->db->trans_start();
		$this->db->where('IdContrato', $IdContrato)->where('IdEmpresa', $IdEmpresa);
		$update = $this->db->update('ProveedorContrato',$proveedorContrato);
		$this->db->trans_complete();		
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function deleteProveedorContrato($IdContrato, $IdEmpresa){
		$this->db->where('IdContrato', $IdContrato)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('ProveedorContrato');
	}

}



 ?>