<?php 
/**
* 
*/
class SucursalEmpresa_Modelo extends CI_Model{
	
	function __construct(){
		# code...
	}

	public function insertSucursalEmpresa($arraySucursalEmpresa){
		/*
		$sucursalEmpresa = array('DireccionSucursal' => $arraySucursalEmpresa['DireccionSucursal'],
					   			 'TelefonoSucursal' => $arraySucursalEmpresa['TelefonoSucursal'],
					   			 'CantidadEmpleadosSucursal' => $arraySucursalEmpresa['CantidadEmpleadosSucursal'],
					   			 'CaptacionDelPublico' => $arraySucursalEmpresa['CaptacionDelPublico'],
					   			 'ProcentajeParticipacion' => $arraySucursalEmpresa['ProcentajeParticipacion'],
					   			 'TotalMiembrosConsejos' => $arraySucursalEmpresa['TotalMiembrosConsejos'],
					   			 'TotalVocalesRepresentantes' => $arraySucursalEmpresa['TotalVocalesRepresentantes'],
					   			 'ValorColocado' => $arraySucursalEmpresa['ValorColocado'],
					   			 'ValorPresupuestado' => $arraySucursalEmpresa['ValorPresupuestado'],
					   			 'PorcentajeCumplimiento' => $arraySucursalEmpresa['PorcentajeCumplimiento'],
					   			 'CumplePresupuesto' => $arraySucursalEmpresa['CumplePresupuesto'],
					   			 'FechaMes' => $arraySucursalEmpresa['FechaMes'],
					   			 'FechaSistema' => $arraySucursalEmpresa['FechaSistema'],
					   			 'IdEmpresa' => $arraySucursalEmpresa['IdEmpresa']
					   			 );
		*/
		$this->db->trans_start();
		$insert = $this->db->insert('SucursalEmpresa',$arraySucursalEmpresa);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}		
	}
	public function getListSucursalEmpresa($IdEmpresa){
		$resultado = $this->db->where('IdEmpresa',$IdEmpresa)->get('SucursalEmpresa');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getSucursalEmpresa($IdSucursal, $IdEmpresa){
		$this->db->where('IdSucursal', $IdSucursal)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('SucursalEmpresa');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updateSucursalEmpresa($IdSucursal, $arraySucursalEmpresa, $IdEmpresa){
		/*
		$sucursalEmpresa = array('DireccionSucursal' => $arraySucursalEmpresa['DireccionSucursal'],
					   			 'TelefonoSucursal' => $arraySucursalEmpresa['TelefonoSucursal'],
					   			 'CantidadEmpleadosSucursal' => $arraySucursalEmpresa['CantidadEmpleadosSucursal'],
					   			 'CaptacionDelPublico' => $arraySucursalEmpresa['CaptacionDelPublico'],
					   			 'ProcentajeParticipacion' => $arraySucursalEmpresa['ProcentajeParticipacion'],
					   			 'TotalMiembrosConsejos' => $arraySucursalEmpresa['TotalMiembrosConsejos'],
					   			 'TotalVocalesRepresentantes' => $arraySucursalEmpresa['TotalVocalesRepresentantes'],
					   			 'ValorColocado' => $arraySucursalEmpresa['ValorColocado'],
					   			 'ValorPresupuestado' => $arraySucursalEmpresa['ValorPresupuestado'],
					   			 'PorcentajeCumplimiento' => $arraySucursalEmpresa['PorcentajeCumplimiento'],
					   			 'CumplePresupuesto' => $arraySucursalEmpresa['CumplePresupuesto'],
					   			 'FechaMes' => $arraySucursalEmpresa['FechaMes'],
					   			 'FechaSistema' => $arraySucursalEmpresa['FechaSistema'],
					   			 'IdEmpresa' => $arraySucursalEmpresa['IdEmpresa']
					   			 );
		*/
		$this->db->trans_start();
		$this->db->where('IdSucursal', $IdSucursal)->where('IdEmpresa', $IdEmpresa);
		$update = $this->db->update('SucursalEmpresa',$arraySucursalEmpresa);
		$this->db->trans_complete();		
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function deleteSucursalEmpresa($IdSucursal, $IdEmpresa){
		$this->db->where('IdSucursal', $IdSucursal)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('SucursalEmpresa');
	}

	
	public function insertSucursalDatosEmpresa($arraySucursalDatosEmpresa){
		$this->db->trans_start();
		$insert = $this->db->insert('SucursalEmpresaDatos',$arraySucursalDatosEmpresa);
		$this->db->trans_complete();
		if($insert){
			return true;
		}else{
			return false;
		}		
	}
	public function getListSucursalDatosEmpresa($IdEmpresa){
		$sqlConsulta = "SELECT SE.Nombre, SED.IdSED, SED.IdSucursal, SED.CantidadEmpleadosSucursal, SED.CaptacionDelPublico, SED.PorcentajeParticipacion, SED.TotalMiembrosConsejos, SED.TotalVocalesRepresentantes, SED.ValorColocado, SED.ValorPresupuestado, SED.PorcentajeCumplimiento, SED.CumplePresupuesto, SED.FechaMes, SED.FechaSistema, SED.IdEmpresa FROM SucursalEmpresa SE, SucursalEmpresaDatos SED WHERE SE.IdSucursal = SED.IdSucursal AND SE.IdEmpresa = ".$IdEmpresa." ";
		$resultado = $this->db->query($sqlConsulta);
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getSucursalDatosEmpresa($IdSED, $IdEmpresa){
		$this->db->where('IdSED', $IdSED)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('SucursalEmpresaDatos');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updateSucursalDatosEmpresa($IdSED, $arraySucursalDatosEmpresa, $IdEmpresa){
		$this->db->trans_start();
		$this->db->where('IdSED', $IdSED)->where('IdEmpresa', $IdEmpresa);
		$update = $this->db->update('SucursalEmpresaDatos',$arraySucursalDatosEmpresa);
		$this->db->trans_complete();		
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function deleteSucursalDatosEmpresa($IdSED, $IdEmpresa){
		$this->db->where('IdSED', $IdSED)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('SucursalEmpresaDatos');
	}



}



 ?>