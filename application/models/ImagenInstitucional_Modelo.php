<?php 

/**
* 
*/
class ImagenInstitucional_Modelo extends CI_Model{
	
	function __construct(){
		# code...
	}

	public function insertImagenInstitucional($ImagenInstitucional){
		$sql = "INSERT INTO ImagenesInstitucionales(IdImgInstucional, Icono, Logotipo, Eslogan, ImgPrincipalMemoria, ImgIntroduccionMemoria, FotoPresidente, FotoGerencia, FotoEjecutivos, FotoRepresentantes, FotoProductosServicios, FotosAporteComunidad, Periodo, FechaRegistro, FechaSistema, IdEmpresa) VALUES (
		null, 
		'".$ImagenInstitucional['Icono']."', 
		'".$ImagenInstitucional['Logotipo']."', 
		'".$ImagenInstitucional['Eslogan']."', 
		'".$ImagenInstitucional['ImgPrincipalMemoria']."', 
		'".$ImagenInstitucional['ImgIntroduccionMemoria']."', 
		'".$ImagenInstitucional['FotoPresidente']."', 
		'".$ImagenInstitucional['FotoGerencia']."', 
		'".$ImagenInstitucional['FotoEjecutivos']."', 
		'".$ImagenInstitucional['FotoRepresentantes']."', 
		'".$ImagenInstitucional['FotoProductosServicios']."', 
		'".$ImagenInstitucional['FotosAporteComunidad']."', 
		'".$ImagenInstitucional['Periodo']."', 
		'".$ImagenInstitucional['FechaRegistro']."', 
		'".$ImagenInstitucional['FechaSistema']."', 
		'".$ImagenInstitucional['IdEmpresa']."'); ";
		$this->db->trans_start();
		//$insert = $this->db->insert('imagenInstitucinals', $imagenInstitucinal);
		$insert = $this->db->query($sql);
		$this->db->trans_complete();
		if($insert){
			return true;
		}else{
			return false;
		}		
	}
	public function getListImagenInstitucinal($IdEmpresa){
		$resultado = $this->db->where('IdEmpresa',$IdEmpresa)->get('ImagenesInstitucionales');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getListImagenInstitucinalPeriodo($Periodo, $IdEmpresa){
		$resultado = $this->db->where('IdEmpresa',$IdEmpresa)->where('Periodo', $Periodo)->get('ImagenesInstitucionales');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getImagenInstitucinal($IdImgInstucional, $IdEmpresa){
		$this->db->where('IdImgInstucional', $IdImgInstucional)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('ImagenesInstitucionales');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;		
	}

	public function updateimagenInstitucinal($IdImgInstucional, $ImagenInstitucional, $IdEmpresa){
		$sw = 0;
		if ($ImagenInstitucional['Icono'] != "") {
			$sql = "UPDATE ImagenesInstitucionales SET
			 Icono = '".$ImagenInstitucional['Icono']."', 
			 Eslogan = '".$ImagenInstitucional['Eslogan']."', 
			 Periodo = '".$ImagenInstitucional['Periodo']."'
			 WHERE  IdImgInstucional = '".$IdImgInstucional."' AND IdEmpresa = '".$IdEmpresa."';";

			 $this->db->trans_start();
			 $update = $this->db->query($sql);
			 $this->db->trans_complete();
			 $sw = 1;
		}
		if ($ImagenInstitucional['Logotipo'] != "") {
			$sql = "UPDATE ImagenesInstitucionales SET
			 Logotipo = '".$ImagenInstitucional['Logotipo']."', 
			 Eslogan = '".$ImagenInstitucional['Eslogan']."', 
			 Periodo = '".$ImagenInstitucional['Periodo']."'
			 WHERE  IdImgInstucional = '".$IdImgInstucional."' AND IdEmpresa = '".$IdEmpresa."';";
			 $this->db->trans_start();
			 $update = $this->db->query($sql);
			 $this->db->trans_complete();
			 $sw = 1;
		}
		if ($ImagenInstitucional['ImgPrincipalMemoria'] != "") {
			$sql = "UPDATE ImagenesInstitucionales SET
			 ImgPrincipalMemoria = '".$ImagenInstitucional['ImgPrincipalMemoria']."', 
			 Eslogan = '".$ImagenInstitucional['Eslogan']."', 
			 Periodo = '".$ImagenInstitucional['Periodo']."'
			 WHERE  IdImgInstucional = '".$IdImgInstucional."' AND IdEmpresa = '".$IdEmpresa."';";
			 $this->db->trans_start();
			 $update = $this->db->query($sql);
			 $this->db->trans_complete();
			 $sw = 1;
		}
		if ($ImagenInstitucional['ImgIntroduccionMemoria'] != "") {
			$sql = "UPDATE ImagenesInstitucionales SET
			 ImgIntroduccionMemoria = '".$ImagenInstitucional['ImgIntroduccionMemoria']."', 
			 Eslogan = '".$ImagenInstitucional['Eslogan']."', 
			 Periodo = '".$ImagenInstitucional['Periodo']."'
			 WHERE  IdImgInstucional = '".$IdImgInstucional."' AND IdEmpresa = '".$IdEmpresa."';";			 
			 $this->db->trans_start();
			 $update = $this->db->query($sql);
			 $this->db->trans_complete();
			 $sw = 1;
		}
		if ($ImagenInstitucional['FotoPresidente'] != "") {
			$sql = "UPDATE ImagenesInstitucionales SET
			 FotoPresidente = '".$ImagenInstitucional['FotoPresidente']."', 
			 Eslogan = '".$ImagenInstitucional['Eslogan']."', 
			 Periodo = '".$ImagenInstitucional['Periodo']."'
			 WHERE  IdImgInstucional = '".$IdImgInstucional."' AND IdEmpresa = '".$IdEmpresa."';";
			 $this->db->trans_start();
			 $update = $this->db->query($sql);
			 $this->db->trans_complete();
			 $sw = 1;
		}
		if ($ImagenInstitucional['FotoGerencia'] != "") {
			$sql = "UPDATE ImagenesInstitucionales SET
			 FotoGerencia = '".$ImagenInstitucional['FotoGerencia']."', 
			 Eslogan = '".$ImagenInstitucional['Eslogan']."', 
			 Periodo = '".$ImagenInstitucional['Periodo']."'
			 WHERE  IdImgInstucional = '".$IdImgInstucional."' AND IdEmpresa = '".$IdEmpresa."';";
			 $this->db->trans_start();
			 $update = $this->db->query($sql);
			 $this->db->trans_complete();
			 $sw = 1;
		}
		if ($ImagenInstitucional['FotoEjecutivos'] != "") {
			$sql = "UPDATE ImagenesInstitucionales SET
			 FotoEjecutivos = '".$ImagenInstitucional['FotoEjecutivos']."', 
			 Eslogan = '".$ImagenInstitucional['Eslogan']."', 
			 Periodo = '".$ImagenInstitucional['Periodo']."'
			 WHERE  IdImgInstucional = '".$IdImgInstucional."' AND IdEmpresa = '".$IdEmpresa."';";
			 $this->db->trans_start();
			 $update = $this->db->query($sql);
			 $this->db->trans_complete();
			 $sw = 1;
		}
		if ($ImagenInstitucional['FotoRepresentantes'] != "") {
			$sql = "UPDATE ImagenesInstitucionales SET
			 FotoRepresentantes = '".$ImagenInstitucional['FotoRepresentantes']."', 
			 Eslogan = '".$ImagenInstitucional['Eslogan']."', 
			 Periodo = '".$ImagenInstitucional['Periodo']."'
			 WHERE  IdImgInstucional = '".$IdImgInstucional."' AND IdEmpresa = '".$IdEmpresa."';";
			 $this->db->trans_start();
			 $update = $this->db->query($sql);
			 $this->db->trans_complete();
			 $sw = 1;
		}
		if ($ImagenInstitucional['FotoProductosServicios'] != "") {
			$sql = "UPDATE ImagenesInstitucionales SET
			 FotoProductosServicios = '".$ImagenInstitucional['FotoProductosServicios']."', 
			 Eslogan = '".$ImagenInstitucional['Eslogan']."', 
			 Periodo = '".$ImagenInstitucional['Periodo']."'
			 WHERE  IdImgInstucional = '".$IdImgInstucional."' AND IdEmpresa = '".$IdEmpresa."';";
			 $this->db->trans_start();
			 $update = $this->db->query($sql);
			 $this->db->trans_complete();
			 $sw = 1;
		}
		if ($ImagenInstitucional['FotosAporteComunidad'] != "") {
			$sql = "UPDATE ImagenesInstitucionales SET
			 FotosAporteComunidad = '".$ImagenInstitucional['FotosAporteComunidad']."', 
			 Eslogan = '".$ImagenInstitucional['Eslogan']."', 
			 Periodo = '".$ImagenInstitucional['Periodo']."'
			 WHERE  IdImgInstucional = '".$IdImgInstucional."' AND IdEmpresa = '".$IdEmpresa."';";
			 $this->db->trans_start();
			 $update = $this->db->query($sql);
			 $this->db->trans_complete();
			 $sw = 1;
		}
		$sql = "UPDATE ImagenesInstitucionales SET
		 Eslogan = '".$ImagenInstitucional['Eslogan']."', 
		 Periodo = '".$ImagenInstitucional['Periodo']."'
		 WHERE  IdImgInstucional = '".$IdImgInstucional."' AND IdEmpresa = '".$IdEmpresa."';";
		 $this->db->trans_start();
		 $update = $this->db->query($sql);
		 $this->db->trans_complete();
		 if ($update) {
		 	$sw = 1;
		 }

/*

		if ($ImagenInstitucional['ImganenimagenInstitucinal'] == "") {
			$sql = "UPDATE ImagenesInstitucionales SET NombreimagenInstitucinal = '".$ImagenInstitucional['NombreimagenInstitucinal']."', TipoimagenInstitucinal = '".$ImagenInstitucional['TipoimagenInstitucinal']."', IntegrantesimagenInstitucinal = '".$ImagenInstitucional['IntegrantesimagenInstitucinal']."', FuncionimagenInstitucinal = '".$ImagenInstitucional['FuncionimagenInstitucinal']."', Periodo = '".$ImagenInstitucional['Periodo']."', FechaSistema = '".$ImagenInstitucional['FechaSistema']."'  WHERE  IdImgInstucional = '".$IdImgInstucional."' AND IdEmpresa = '".$IdEmpresa."';";
		}else{
			$sql = "UPDATE ImagenesInstitucionales SET
			 Icono = '".$ImagenInstitucional['Icono']."', 
			 Logotipo = '".$ImagenInstitucional['Logotipo']."', 
			 Eslogan = '".$ImagenInstitucional['Eslogan']."', 
			 ImgPrincipalMemoria = '".$ImagenInstitucional['ImgPrincipalMemoria']."', 
			 FotoEjecutivos = '".$ImagenInstitucional['FotoEjecutivos']."', 
			 FotoRepresentantes = '".$ImagenInstitucional['FotoRepresentantes']."', 
			 FotosAporteComunidad = '".$ImagenInstitucional['FotosAporteComunidad']."', 
			 Periodo = '".$ImagenInstitucional['Periodo']."', 
			    WHERE  IdImgInstucional = '".$IdImgInstucional."' AND IdEmpresa = '".$IdEmpresa."';";
		}
		*/
		if($sw == 1){
			return true;
		}else{
			return false;
		}

	}
	public function deleteImagenInstitucinal($IdImgInstucional, $IdEmpresa){
		$this->db->where('IdImgInstucional', $IdImgInstucional)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('ImagenesInstitucionales');
	}





}




 ?>