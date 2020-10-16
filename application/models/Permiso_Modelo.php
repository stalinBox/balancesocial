<?php 
/**
* 
*/
class Permiso_Modelo extends CI_Model{
	
	function __construct(){
		# code...
	}

	public function getlistPermisoRol($idEmpresa){
		$resultado = $this->db->select('*, pf.Nombre as nomPerfil')
		->from('permiso_rol as pr')
		->join('perfil as pf','pr.IdPerfil = pf.IdPerfil','inner')
		->join('tablasfunciones as tf','pr.IdTabla = tf.IdTabla','inner')
		->where('pf.IdEmpresa',$idEmpresa)
		->get();

		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}

	public function getComponents($idUsuario, $idEmpresa){
		$query = "SELECT comp.IdComp, pcomp.Habilitar FROM permiso_components pcomp INNER JOIN components comp ON pcomp.IdComponents = comp.IdComponents WHERE `IdPermisoRol` IN (SELECT `IdPermisoRol` FROM `permiso_rol` WHERE `idPerfil` IN( SELECT `IdPerfil` FROM `perfil` WHERE `IdPerfil` IN (SELECT `PerfilRolUsuario` FROM `usuarioEmpresa` WHERE `IdUsuario` = ".$idUsuario." AND `IdEmpresa`= ".$idEmpresa." )));";
		$resultado = $this->db->query($query);
		if($resultado->num_rows() > 0){
			return $resultado;
		}else {
			return false;
		}

	}

	public function insertPermiso($arrayPermiso){
		//Especificar los campos de cada dato del array
		$permiso = array('IdTabla' => $arrayPermiso['IdTabla'],
					 	 'IdPerfil' => $arrayPermiso['IdPerfil'],
					 	 'Ver' => $arrayPermiso['Ver'],
					 	 'Agregar' => $arrayPermiso['Agregar'],
					 	 'Actualizar' => $arrayPermiso['Actualizar'],
					 	 'Eliminar' => $arrayPermiso['Eliminar']
					 	 //'IdEmpresa' => $arrayPermiso['IdEmpresa']
					 );
		$this->db->trans_start();
		$insert = $this->db->insert('Permiso_Rol',$permiso);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}
	}
	public function getListPermiso($IdEmpresa){
		$resultado = $this->db->where('IdEmpresa', $IdEmpresa)->get('Permiso_ROL');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}	
	public function getPermiso($IdPermisoRol, $IdEmpresa){
		$this->db->where('IdPermisoRol', $IdPermisoRol)->where('IdEmpresa', $IdEmpresa);
		$resultado = $this->db->get('Permiso_Rol');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function getPermisosRol($IdPerfil, $IdEmpresa){
		$resultado = $this->db->query("SELECT DISTINCT PR.IdPermisoRol, P.Nombre AS Perfil, TF.Nombre AS Tabla, PR.Ver, PR.Agregar, PR.Actualizar, PR.Eliminar  FROM Permiso_Rol PR, Perfil P, TablasFunciones TF WHERE P.IdPerfil = PR.IdPerfil AND P.IdPerfil = ".$IdPerfil." AND TF.IdTabla = PR.IdTabla AND P.IdEmpresa = ".$IdEmpresa);
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getPermisoRol($IdUsuarioSesion, $IdPerfil, $tablaControlador, $IdEmpresa){
		//$resultado = $this->db->query("SELECT DISTINCT PR.IdPermisoRol, P.Nombre AS Perfil, TF.Nombre AS Tabla, PR.Ver, PR.Agregar, PR.Actualizar, PR.Eliminar FROM Permiso_Rol PR, Perfil P, TablasFunciones TF WHERE P.IdPerfil = PR.IdPerfil AND TF.IdTabla = PR.IdTabla AND P.IdPerfil = '".$IdPerfil."' AND P.IdEmpresa = '".$IdEmpresa."' AND TF.ObjetoControlador = '".$tablaControlador."';");
		$sql = ("SELECT IF(SUM(Permisos.Ver) >= 1, 1, 0) AS Ver, IF(SUM(Permisos.Agregar)>= 1, 1, 0) AS Agregar, IF(SUM(Permisos.Actualizar)>= 1, 1, 0) AS Actualizar, IF(SUM(Permisos.Eliminar)>= 1, 1, 0) AS Eliminar FROM (SELECT TF.Nombre AS Tabla, PEU.Ver AS Ver, PEU.Agregar AS Agregar, PEU.Actualizar AS Actualizar, PEU.Eliminar AS Eliminar FROM UsuarioEmpresa UE, Permiso_Especial_Usuario PEU, TablasFunciones TF WHERE UE.IdUsuario = PEU.IdUsuario AND PEU.IdTabla = TF.IdTabla AND TF.ObjetoControlador = '".$tablaControlador."' AND PEU.IdUsuario = ".$IdUsuarioSesion." UNION SELECT TF.Nombre AS Tabla, PR.Ver AS Ver, PR.Agregar AS Agregar, PR.Actualizar AS Actualizar, PR.Eliminar AS Eliminar FROM Permiso_Rol PR, Perfil P, TablasFunciones TF WHERE P.IdPerfil = PR.IdPerfil AND TF.IdTabla = PR.IdTabla AND P.IdPerfil = ".$IdPerfil." AND P.IdEmpresa = ".$IdEmpresa." AND TF.ObjetoControlador = '".$tablaControlador."') AS Permisos");
		$resultado = $this->db->query($sql);		
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function getPermisoRolAccion($IdPerfil, $IdPermisoRol, $IdEmpresa){
		$resultado = $this->db->query("SELECT DISTINCT PR.IdPermisoRol, P.IdPerfil AS IdPerfil, P.Nombre AS Perfil, TF.IdTabla AS IdTabla, TF.Nombre AS Tabla, PR.Ver, PR.Agregar, PR.Actualizar, PR.Eliminar  FROM Permiso_Rol PR, Perfil P, TablasFunciones TF WHERE P.IdPerfil = PR.IdPerfil AND P.IdPerfil = ".$IdPerfil." AND TF.IdTabla = PR.IdTabla AND P.IdEmpresa = ".$IdEmpresa." AND PR.IdPermisoRol = ".$IdPermisoRol );
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}
	public function updatePermiso($IdPermisoRol, $arrayPermiso, $IdEmpresa){
		$permiso = array('IdTabla' => $arrayPermiso['IdTabla'],
					 	 'IdPerfil' => $arrayPermiso['IdPerfil'],
					 	 'Ver' => $arrayPermiso['Ver'],
					 	 'Agregar' => $arrayPermiso['Agregar'],
					 	 'Actualizar' => $arrayPermiso['Actualizar'],
					 	 'Eliminar' => $arrayPermiso['Eliminar']
					 	 //'IdEmpresa' => $arrayPermiso['IdEmpresa']
					 );
		$this->db->trans_start();
		$this->db->where('IdPermisoRol', $IdPermisoRol);
		$update = $this->db->update('Permiso_Rol',$permiso);
		$this->db->trans_complete();		
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function deletePermiso($IdPermisoRol){
		$this->db->where('IdPermisoRol', $IdPermisoRol);
		return $this->db->delete('Permiso_Rol');
	}

	/**
	Selección de Indicadores para cada Empresa
	**/
	public function selectIndicadoresEmpresa($IdEmpresa, $arraySeleccionados){
		//$sqlConsulta = "SELECT *, ".$IdEmpresa." AS IdEmpresa FROM Indicador WHERE IdIndicador IN (40, 41)";
		$sqlSelect = $this->db->select("* ,".$IdEmpresa." AS IdEmpresa");
		$resultado = $this->db->where_in('IdIndicador', $arraySeleccionados)->get('Indicador');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function updateIndicadoresSeleccionados($IdEmpresa, $arrayIndicadoresSeleccionados){
		//INSERT INTO IndicadoresEmpresa() SELECT *, 1 AS IdEmpresa FROM Indicador WHERE IdIndicador IN (38, 39);
		//$sqlInsert = "INSERT INTO IndicadoresEmpresa() SELECT *, ".$IdEmpresa." AS IdEmpresa FROM Indicador WHERE IdIndicador IN ".$arrayIndicadoresSeleccionados."";
		//$resultado = $this->db->query($sqlInsert);
		$sqlSelect = $this->db->select("* ,".$IdEmpresa." AS IdEmpresa");
		$resultado = $this->db->where_in('IdIndicador', $arrayIndicadoresSeleccionados)->get('Indicador');			
		//$this->db->set($resultado->result());
		foreach ($resultado->result() as $key) {
			$indicadorEmpresa = array(
								'IdIndicador' => $key->IdIndicador, 
								'Nombre' => $key->Nombre, 
								'CriterioIndicador' => $key->CriterioIndicador, 
								'Resultado' => $key->Resultado, 
								'Dimension' => $key->Dimension, 
								'SubDimension' => $key->SubDimension, 
								'PrincipiosSEPS' => $key->PrincipiosSEPS, 
								'PrincipiosPactoMundial' => $key->PrincipiosPactoMundial, 
								'GrupoInteres' => $key->GrupoInteres, 
								'Herramienta' => $key->Herramienta, 
								'CodigosGRI' => $key->CodigosGRI, 
								'CodigosISO2600' => $key->CodigosISO2600, 
								'Area' => $key->Area, 
								'Modulo' => $key->Modulo, 
								'SubModulo' => $key->SubModulo, 
								'Tabla' => $key->Tabla, 
								'FormulaResultado' => $key->FormulaResultado, 
								'Meta' => $key->Meta, 
								'Desde0' => $key->Desde0, 
								'Hasta0' => $key->Hasta0, 
								'Desc0' => $key->Desc0, 
								'Nota0' => $key->Nota0, 
								'Desde1' => $key->Desde1, 
								'Hasta1' => $key->Hasta1, 
								'Desc1' => $key->Desc1, 
								'Nota1' => $key->Nota1, 
								'Desde2' => $key->Desde2, 
								'Hasta2' => $key->Hasta2, 
								'Desc2' => $key->Desc2, 
								'Nota2' => $key->Nota2, 
								'Desde3' => $key->Desde3, 
								'Hasta3' => $key->Hasta3, 
								'Desc3' => $key->Desc3, 
								'Nota3' => $key->Nota3, 
								'Desde4' => $key->Desde4, 
								'Hasta4' => $key->Hasta4, 
								'Desc4' => $key->Desc4, 
								'Nota4' => $key->Nota4, 
								'Desde5' => $key->Desde5, 
								'Hasta5' => $key->Hasta5, 
								'Desc5' => $key->Desc5, 
								'Nota5' => $key->Nota5, 
								'FormulaCalificacion' => $key->FormulaCalificacion, 
								'IdEmpresa' => $key->IdEmpresa, 
								);

		$resp = $this->db->insert('IndicadoresEmpresa', $indicadorEmpresa);			
		}
	}
	public function insertIndicadorEmpresa($arrayIndicadoresSeleccionados){
		
	}
	/**
	Indicadores por Perfil
	*/
	public function insertIndcadorPorPerfil($idPerfil, $arrayIndicadoresSeleccionados){
		foreach ($arrayIndicadoresSeleccionados as $key => $value) {
			$sql = "INSERT INTO Perfil_Indicador(IdPerfilIndicador, IdPerfil, IdIndicador) VALUES (NULL, ".$idPerfil.", ".$value.")";
			$resp = $this->db->query($sql);			
		}
		if ($resp) {
			return true;
		}else{
			return false;
		}		
	}
	/**
	 * Permisos Especiales a Usuarios sobre las Tablas
	 */
	public function getListPermisoEspecialAUsuario($IdEmpresa){
		$query = "SELECT UE.IdUsuario, UE.ApellidosUsuario, UE.NombreUsuario, UE.MailUsuario, UE.DireccionUsuario, UE.TelefonoUsuario, UE.CelularUsuario, (SELECT Nombre FROM Perfil WHERE IdPerfil = UE.PerfilRolUsuario) AS Perfil, COUNT(PEU.IdUsuario) AS Permisos FROM UsuarioEmpresa UE, Permiso_Especial_Usuario PEU WHERE UE.IdUsuario=PEU.IdUsuario GROUP BY UE.IdUsuario ORDER BY UE.IdUsuario;";
		$resultado = $this->db->query($query);
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function insertPermisoEspecialUsario($arrayPermisoEspecial){
		$this->db->trans_start();
		$insert = $this->db->insert('Permiso_Especial_Usuario',$arrayPermisoEspecial);
		$this->db->trans_complete();
		if($insert){
			return true;
		}else{
			return false;
		}
	}
	public function getPermisoEspecialAUsuario($IdUsuario, $IdEmpresa){
		/*
		$this->db->select("*, IdPEU, (SELECT Nombre FROM Perfil WHERE IdPerfil = PerfilRolUsuario) AS Perfil");
		$this->db->from('UsuarioEmpresa');
		$this->db->join('Permiso_Especial_Usuario', 'Permiso_Especial_Usuario.IdUsuario = UsuarioEmpresa.IdUsuario');
		$resultado = $this->db->where('UsuarioEmpresa.IdEmpresa', $IdEmpresa)->where('IdPEU', $IdPermisoEspecialUsuario)->get();
		*/
		$query = "SELECT PEU.IdPEU, UE.IdUsuario, UE.ApellidosUsuario, UE.NombreUsuario, (SELECT Nombre FROM Perfil WHERE IdPerfil = UE.PerfilRolUsuario) AS Perfil, PEU.IdTabla, (SELECT Nombre FROM TablasFunciones WHERE IdTabla = PEU.IdTabla) AS Tabla, PEU.Ver, PEU.Agregar, PEU.Actualizar, PEU.Eliminar FROM UsuarioEmpresa UE, Permiso_Especial_Usuario PEU WHERE UE.IdUsuario=PEU.IdUsuario AND PEU.IdUsuario = ".$IdUsuario." AND UE.IdEmpresa = ".$IdEmpresa.";";
		$resultado = $this->db->query($query);
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function updatePermisoEspecialUsuario($IdPEU, $arrayPermisoEspecialUsuario, $IdEmpresa){
		$sqlUpdate = "UPDATE Permiso_Especial_Usuario SET Ver = ".$arrayPermisoEspecialUsuario['Ver'].", Agregar = ".$arrayPermisoEspecialUsuario['Agregar'].",
		Actualizar = ".$arrayPermisoEspecialUsuario['Actualizar'].",
		Eliminar =  ".$arrayPermisoEspecialUsuario['Eliminar']." WHERE IdPEU = ".$IdPEU.";";
		$this->db->trans_start();
		$update = $this->db->query($sqlUpdate);		
		$this->db->trans_complete();		
		if($update){
			return true;
		}else{
			return false;
		}
	}
	public function getPermisoEspecialAUsuarioEdit($IdPEU, $IdUsuario, $IdEmpresa){
		$query = "SELECT PEU.IdPEU, UE.IdUsuario, UE.ApellidosUsuario, UE.NombreUsuario, (SELECT Nombre FROM Perfil WHERE IdPerfil = UE.PerfilRolUsuario) AS Perfil, PEU.IdTabla, (SELECT Nombre FROM TablasFunciones WHERE IdTabla = PEU.IdTabla) AS Tabla, PEU.Ver, PEU.Agregar, PEU.Actualizar, PEU.Eliminar FROM UsuarioEmpresa UE, Permiso_Especial_Usuario PEU WHERE UE.IdUsuario = PEU.IdUsuario AND UE.IdUsuario = ".$IdUsuario." AND UE.IdEmpresa = ".$IdEmpresa." AND PEU.IdPEU = ".$IdPEU." ;";
		$resultado = $this->db->query($query);
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function deletePermisoEspecialUsuario($IdPermisoEspecial){
		$this->db->where('IdPEU', $IdPermisoEspecial);
		return $this->db->delete('Permiso_Especial_Usuario');
	}

/**
 * Función para Reportes 
 */
	public function getListPermisoPorPerfil($IdEmpresa){
		$query = "SELECT P.Nombre AS Perfil, TF.Nombre AS Tabla, PR.Ver, PR.Agregar, PR.Actualizar, PR.Eliminar FROM Permiso_Rol PR, TablasFunciones TF, Perfil P WHERE PR.IdTabla = TF.IdTabla AND PR.IdPerfil = P.IdPerfil AND P.IdEmpresa = ".$IdEmpresa." ORDER BY 1, 2;";
		$resultado = $this->db->query($query);
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getListPermisoEspecialPorUsuario($IdEmpresa){
		$query = "SELECT UE.ApellidosUsuario, UE.NombreUsuario, UE.MailUsuario, PEU.Ver, PEU.Agregar, PEU.Actualizar, PEU.Eliminar FROM Permiso_Especial_Usuario PEU, TablasFunciones TF, UsuarioEmpresa UE WHERE PEU.IdTabla = TF.IdTabla AND PEU.IdUsuario = UE.IdUsuario AND UE.IdEmpresa = ".$IdEmpresa." ORDER BY 1, 2;";
		$resultado = $this->db->query($query);
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}

} ?>