<?php 
/**
* 
*/
class Ingreso_Modelo extends CI_Model{
	
	function __construct(){
		# code...
	}

	public function insertIngreso($arrayIngreso){
		//Especificar los campos de cada dato del array
		$ingreso = array('IngresosVentasPeriodoActual' => $arrayIngreso['IngresosVentasPeriodoActual'],
						 'IngresosVentaActivosFijos' => $arrayIngreso['IngresosVentaActivosFijos'],
						 'IngresosValorActivoFijo' => $arrayIngreso['IngresosValorActivoFijo'],
						 'IngresosTipoActivoFijo' => $arrayIngreso['IngresosTipoActivoFijo'],
						 'IngresosValorInversiones' => $arrayIngreso['IngresosValorInversiones'],
						 'IngresosDepositoAhorros' => $arrayIngreso['IngresosDepositoAhorros'],
						 'IngresosDepositoPlazoFijo' => $arrayIngreso['IngresosDepositoPlazoFijo'],
						 'IngresosCertifAportacion' => $arrayIngreso['IngresosCertifAportacion'],
						 'IngresosRecupracionCartera' => $arrayIngreso['IngresosRecupracionCartera'],
						 'IngresosServiciosCooperativos' => $arrayIngreso['IngresosServiciosCooperativos'],
						 'IngresosGanadosXDPF' => $arrayIngreso['IngresosGanadosXDPF'],
						 'IngresosGanadosXCuentasAhorro' => $arrayIngreso['IngresosGanadosXCuentasAhorro'],
						 'Empresa_idEmpresa' => $arrayIngreso['Empresa_idEmpresa']
						 );
		$this->db->trans_start();
		$insert = $this->db->insert('Ingreso',$ingreso);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}
	}
	public function getListIngreso(){
		$resultado = $this->db->get('Ingreso');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getIngreso($idIngreso){
		$this->where('idIngresos', $idIngreso);
		$resultado = $this->db->get('Ingreso');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updateIngreso($idIngreso, $arrayIngreso){
		//Especificar los campos de cada dato del array
		$ingreso = array('IngresosVentasPeriodoActual' => $arrayIngreso['IngresosVentasPeriodoActual'],
						 'IngresosVentaActivosFijos' => $arrayIngreso['IngresosVentaActivosFijos'],
						 'IngresosValorActivoFijo' => $arrayIngreso['IngresosValorActivoFijo'],
						 'IngresosTipoActivoFijo' => $arrayIngreso['IngresosTipoActivoFijo'],
						 'IngresosValorInversiones' => $arrayIngreso['IngresosValorInversiones'],
						 'IngresosDepositoAhorros' => $arrayIngreso['IngresosDepositoAhorros'],
						 'IngresosDepositoPlazoFijo' => $arrayIngreso['IngresosDepositoPlazoFijo'],
						 'IngresosCertifAportacion' => $arrayIngreso['IngresosCertifAportacion'],
						 'IngresosRecupracionCartera' => $arrayIngreso['IngresosRecupracionCartera'],
						 'IngresosServiciosCooperativos' => $arrayIngreso['IngresosServiciosCooperativos'],
						 'IngresosGanadosXDPF' => $arrayIngreso['IngresosGanadosXDPF'],
						 'IngresosGanadosXCuentasAhorro' => $arrayIngreso['IngresosGanadosXCuentasAhorro'],
						 'Empresa_idEmpresa' => $arrayIngreso['Empresa_idEmpresa']
						 );
		$this->db->trans_start();
		$this->db->where('idIngresos', $idIngreso);
		$update = $this->db->update('Ingreso',$ingreso);
		$this->db->trans_complete();		
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function deleteIngreso($idIngreso){
		$this->db->where('idIngreso', $idIngreso);
		return $this->db->delete('Ingreso');
	}





}


 ?>