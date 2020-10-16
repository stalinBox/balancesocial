<?php 
/**
* 
*/
class ProductosEmpresa_Modelo extends CI_Model{
	
	function __construct(){
		# code...
	}

	public function insertProductosEmpresa($arrayProductosEmpresa){
		//Especificar los campos de cada dato del array
		/*
		$productosEmpresa = array('NombreProductosEmpresa' => $arrayProductosEmpresa['NombreProductosEmpresa'],
					   			  'CostoProductoEmpresa' => $arrayProductosEmpresa['CostoProductoEmpresa'],
					   			  'IVAProductoEmpresa' => $arrayProductosEmpresa['IVAProductoEmpresa'],
					   			  'DescripcionProductosEmpresa' => $arrayProductosEmpresa['DescripcionProductosEmpresa'],
					   			  'ObservacionProductosEmpresa' => $arrayProductosEmpresa['ObservacionProductosEmpresa'],
					   			  'Imagen' => $arrayProductosEmpresa['Imagen'],
					   			  'IdEmpresa' => $arrayProductosEmpresa['IdEmpresa']
					   			  );
		*/
		$sql = "INSERT INTO ProductosEmpresa(IdProductosEmpresa, NombreProductosEmpresa, CostoProductoEmpresa, IVAProductoEmpresa, DescripcionProductosEmpresa, ObservacionProductosEmpresa, Imagen, IdEmpresa) VALUES (null, '".$arrayProductosEmpresa['NombreProductosEmpresa']."','".$arrayProductosEmpresa['CostoProductoEmpresa']."','".$arrayProductosEmpresa['IVAProductoEmpresa']."','".$arrayProductosEmpresa['DescripcionProductosEmpresa']."','".$arrayProductosEmpresa['ObservacionProductosEmpresa']."','".$arrayProductosEmpresa['Imagen']."','".$arrayProductosEmpresa['IdEmpresa']."');";
		$this->db->trans_start();
		$insert = $this->db->query($sql);
		//$insert = $this->db->insert('ProductosEmpresa',$productosEmpresa);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}
	}
	public function getListProductosEmpresa($IdEmpresa){
		$this->db->where('IdEmpresa',$IdEmpresa);
		$resultado = $this->db->get('ProductosEmpresa');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getProductosEmpresa($IdProductosEmpresa){
		$this->db->where('IdProductosEmpresa', $IdProductosEmpresa);
		$resultado = $this->db->get('ProductosEmpresa');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updateProductosEmpresa($IdProductosEmpresa, $arrayProductosEmpresa, $IdEmpresa){
		//Especificar los campos de cada dato del array
		/*$productosEmpresa = array('NombreProductosEmpresa' => $arrayProductosEmpresa['NombreProductosEmpresa'],
					   			  'CostoProductoEmpresa' => $arrayProductosEmpresa['CostoProductoEmpresa'],
					   			  'IVAProductoEmpresa' => $arrayProductosEmpresa['IVAProductoEmpresa'],
					   			  'DescripcionProductosEmpresa' => $arrayProductosEmpresa['DescripcionProductosEmpresa'],
					   			  'ObservacionProductosEmpresa' => $arrayProductosEmpresa['ObservacionProductosEmpresa'],
					   			  'Imagen' => $arrayProductosEmpresa['Imagen'],
					   			  'IdEmpresa' => $arrayProductosEmpresa['IdEmpresa']
					   			  );
		*/
		
		if ($arrayProductosEmpresa['Imagen'] == "") {
			$sql = "UPDATE ProductosEmpresa SET NombreProductosEmpresa= '".$arrayProductosEmpresa['NombreProductosEmpresa']."',CostoProductoEmpresa= '".$arrayProductosEmpresa['CostoProductoEmpresa']."',IVAProductoEmpresa= '".$arrayProductosEmpresa['IVAProductoEmpresa']."',DescripcionProductosEmpresa= '".$arrayProductosEmpresa['DescripcionProductosEmpresa']."',ObservacionProductosEmpresa= '".$arrayProductosEmpresa['ObservacionProductosEmpresa']."' WHERE  IdEmpresa = '".$IdEmpresa."' AND IdProductosEmpresa = '".$IdProductosEmpresa."';";
		}else{
			$sql = "UPDATE ProductosEmpresa SET NombreProductosEmpresa= '".$arrayProductosEmpresa['NombreProductosEmpresa']."',CostoProductoEmpresa= '".$arrayProductosEmpresa['CostoProductoEmpresa']."',IVAProductoEmpresa= '".$arrayProductosEmpresa['IVAProductoEmpresa']."',DescripcionProductosEmpresa= '".$arrayProductosEmpresa['DescripcionProductosEmpresa']."',ObservacionProductosEmpresa= '".$arrayProductosEmpresa['ObservacionProductosEmpresa']."',Imagen= '".$arrayProductosEmpresa['Imagen']."' WHERE  IdEmpresa = '".$IdEmpresa."' AND IdProductosEmpresa = '".$IdProductosEmpresa."';";

		}
		$this->db->trans_start();
		//$this->db->where('IdProductosEmpresa', $IdProductosEmpresa)->where('IdEmpresa', $IdEmpresa);
		//$update = $this->db->update('ProductosEmpresa',$productosEmpresa);
		$update = $this->db->query($sql);
		$this->db->trans_complete();		
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function deleteProductosEmpresa($IdProductosEmpresa, $IdEmpresa){
		$this->db->where('IdProductosEmpresa', $IdProductosEmpresa)->where('IdEmpresa',$IdEmpresa);
		return $this->db->delete('ProductosEmpresa');
	}





}



 ?>