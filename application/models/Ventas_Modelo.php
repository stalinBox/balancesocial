<?php 
/**
* 
*/
class Venta_Modelo extends CI_Model{
	
	function __construct(){
		# code...
	}

	public function insertVenta($arrayVenta){
		//Especificar los campos de cada dato del array
		$venta = array('VentasCliente' => $arrayVenta['VentasCliente'],
					   'VentasCedula' => $arrayVenta['VentasCedula'],
					   'VentasNumFactura' => $arrayVenta['VentasNumFactura'],
					   'VentasFecha' => $arrayVenta['VentasFecha'],
					   'VentasTipoPago' => $arrayVenta['VentasTipoPago'],
					   'VentasPlazoDias' => $arrayVenta['VentasPlazoDias'],
					   'VentasNombProductoVendido' => $arrayVenta['VentasNombProductoVendido'],
					   'VentasIVA' => $arrayVenta['VentasIVA'],					   
					   'Empresa_idEmpresa' => $arrayVenta['Empresa_idEmpresa']
					   );
		$this->db->trans_start();
		$insert = $this->db->insert('Ventas',$venta);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}
	}
	public function getListVenta(){
		$resultado = $this->db->get('Ventas');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getVenta($idVenta){
		$this->where('idVentas', $idVenta);
		$resultado = $this->db->get('Ventas');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updateVenta($idVenta, $arrayVenta){
		//Especificar los campos de cada dato del array
		$venta = array('VentasCliente' => $arrayVenta['VentasCliente'],
					   'VentasCedula' => $arrayVenta['VentasCedula'],
					   'VentasNumFactura' => $arrayVenta['VentasNumFactura'],
					   'VentasFecha' => $arrayVenta['VentasFecha'],
					   'VentasTipoPago' => $arrayVenta['VentasTipoPago'],
					   'VentasPlazoDias' => $arrayVenta['VentasPlazoDias'],
					   'VentasNombProductoVendido' => $arrayVenta['VentasNombProductoVendido'],
					   'VentasIVA' => $arrayVenta['VentasIVA'],					   
					   'Empresa_idEmpresa' => $arrayVenta['Empresa_idEmpresa']
					   );
		$this->db->trans_start();
		$this->db->where('idVentas', $idVenta);
		$update = $this->db->update('Ventas',$venta);
		$this->db->trans_complete();		
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function deleteVenta($idVenta){
		$this->db->where('idVentas', $idVenta);
		return $this->db->delete('Ventas');
	}




}



 ?>