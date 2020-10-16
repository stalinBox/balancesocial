<?php 
/**
* 
*/
class CapacitacionEmpleado_Modelo extends CI_Model{
	
	function __construct(){
		
	}

	public function insertCapacitacionEmpleado($arrayCapacitacionEmpleado){
		$sql = "INSERT INTO CapacitacionEmpleados(IdCapacitacionEmp, NombreCapacitacion, FechaPlanificada, OrdenPedido, TipoCapacitacion, Presupuesto, HorasPlanificadas, ParticipantesEsperados, IdProveedor, EstadoCapacitacion, FechaEjecucion, ParticipantesCapacitados, HorasEjecutadas, AreaImpartida, Costo, EmpleadoResponsable, Imagen, Periodo, FechaSistema, IdEmpresa) VALUES (null, '".$arrayCapacitacionEmpleado['NombreCapacitacion']."', '".$arrayCapacitacionEmpleado['FechaPlanificada']."', '".$arrayCapacitacionEmpleado['OrdenPedido']."', '".$arrayCapacitacionEmpleado['TipoCapacitacion']."', '".$arrayCapacitacionEmpleado['Presupuesto']."', '".$arrayCapacitacionEmpleado['HorasPlanificadas']."', '".$arrayCapacitacionEmpleado['ParticipantesEsperados']."', '".$arrayCapacitacionEmpleado['IdProveedor']."', '".$arrayCapacitacionEmpleado['EstadoCapacitacion']."', '".$arrayCapacitacionEmpleado['FechaEjecucion']."', '".$arrayCapacitacionEmpleado['ParticipantesCapacitados']."', '".$arrayCapacitacionEmpleado['HorasEjecutadas']."', '".$arrayCapacitacionEmpleado['AreaImpartida']."', '".$arrayCapacitacionEmpleado['Costo']."', '".$arrayCapacitacionEmpleado['EmpleadoResponsable']."', '".$arrayCapacitacionEmpleado['Imagen']."', '".$arrayCapacitacionEmpleado['Periodo']."', '".$arrayCapacitacionEmpleado['FechaSistema']."', '".$arrayCapacitacionEmpleado['IdEmpresa']."');";	
		$this->db->trans_start();
		//$insert = $this->db->insert('CapacitacionEmpleados',$arrayCapacitacionEmpleado);
		$insert = $this->db->query($sql);
		$this->db->trans_complete();		
		if($insert){
			return true;
		}else{
			return false;
		}
	}

	public function getListCapacitacionEmpleado($IdEmpresa){
		$resultado = $this->db->where('IdEmpresa',$IdEmpresa)->get('CapacitacionEmpleados');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}
	public function getListCapacitacionEmpleadoPeriodo($Periodo, $IdEmpresa){
		$resultado = $this->db->where('IdEmpresa',$IdEmpresa)->where('Periodo', $Periodo)->where('EstadoCapacitacion', "Ejecutada")->get('CapacitacionEmpleados');
		$this->db->order_by('FechaEjecucion DESC');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else
			return false;
	}

	public function getCapacitacionEmpleado($IdCapacitacionEmp, $IdEmpresa){
		$this->db->where('IdCapacitacionEmp', $IdCapacitacionEmp)->where('IdEmpresa',$IdEmpresa);
		$resultado = $this->db->get('CapacitacionEmpleados');
		if($resultado->num_rows() > 0)
			return $resultado->result();
		else 
			return false;
	}

	public function updateCapacitacionEmpleado($IdCapacitacionEmp, $arrayCapacitacionEmpleado, $IdEmpresa){
		if ($arrayCapacitacionEmpleado['Imagen'] == "") {
			$sql = "UPDATE CapacitacionEmpleados SET NombreCapacitacion = '".$arrayCapacitacionEmpleado['NombreCapacitacion']."',FechaPlanificada = '".$arrayCapacitacionEmpleado['FechaPlanificada']."',OrdenPedido = '".$arrayCapacitacionEmpleado['OrdenPedido']."',TipoCapacitacion = '".$arrayCapacitacionEmpleado['TipoCapacitacion']."',Presupuesto = '".$arrayCapacitacionEmpleado['Presupuesto']."',HorasPlanificadas = '".$arrayCapacitacionEmpleado['HorasPlanificadas']."',ParticipantesEsperados = '".$arrayCapacitacionEmpleado['ParticipantesEsperados']."',IdProveedor = '".$arrayCapacitacionEmpleado['IdProveedor']."',EstadoCapacitacion = '".$arrayCapacitacionEmpleado['EstadoCapacitacion']."',FechaEjecucion = '".$arrayCapacitacionEmpleado['FechaEjecucion']."',ParticipantesCapacitados = '".$arrayCapacitacionEmpleado['ParticipantesCapacitados']."',HorasEjecutadas = '".$arrayCapacitacionEmpleado['HorasEjecutadas']."',AreaImpartida = '".$arrayCapacitacionEmpleado['AreaImpartida']."',Costo = '".$arrayCapacitacionEmpleado['Costo']."',EmpleadoResponsable = '".$arrayCapacitacionEmpleado['EmpleadoResponsable']."',Periodo = '".$arrayCapacitacionEmpleado['Periodo']."',FechaSistema = '".$arrayCapacitacionEmpleado['FechaSistema']."' WHERE IdCapacitacionEmp = '".$IdCapacitacionEmp."' AND IdEmpresa = '".$IdEmpresa."'; ";



		}else{
			$sql = "UPDATE CapacitacionEmpleados SET NombreCapacitacion = '".$arrayCapacitacionEmpleado['NombreCapacitacion']."',FechaPlanificada = '".$arrayCapacitacionEmpleado['FechaPlanificada']."',OrdenPedido = '".$arrayCapacitacionEmpleado['OrdenPedido']."',TipoCapacitacion = '".$arrayCapacitacionEmpleado['TipoCapacitacion']."',Presupuesto = '".$arrayCapacitacionEmpleado['Presupuesto']."',HorasPlanificadas = '".$arrayCapacitacionEmpleado['HorasPlanificadas']."',ParticipantesEsperados = '".$arrayCapacitacionEmpleado['ParticipantesEsperados']."',IdProveedor = '".$arrayCapacitacionEmpleado['IdProveedor']."',EstadoCapacitacion = '".$arrayCapacitacionEmpleado['EstadoCapacitacion']."',FechaEjecucion = '".$arrayCapacitacionEmpleado['FechaEjecucion']."',ParticipantesCapacitados = '".$arrayCapacitacionEmpleado['ParticipantesCapacitados']."',HorasEjecutadas = '".$arrayCapacitacionEmpleado['HorasEjecutadas']."',AreaImpartida = '".$arrayCapacitacionEmpleado['AreaImpartida']."',Costo = '".$arrayCapacitacionEmpleado['Costo']."',EmpleadoResponsable = '".$arrayCapacitacionEmpleado['EmpleadoResponsable']."',Imagen = '".$arrayCapacitacionEmpleado['Imagen']."',Periodo = '".$arrayCapacitacionEmpleado['Periodo']."',FechaSistema = '".$arrayCapacitacionEmpleado['FechaSistema']."' WHERE IdCapacitacionEmp = '".$IdCapacitacionEmp."' AND IdEmpresa = '".$IdEmpresa."'; ";
		}
		$this->db->trans_start();
		//$this->db->where('IdCapacitacionEmp', $IdCapacitacionEmp)->where('IdEmpresa',$IdEmpresa);
		//$update = $this->db->update('CapacitacionEmpleados', $arrayCapacitacionEmpleado);
		$update = $this->db->query($sql);
		$this->db->trans_complete();
		if($update)
			return true;
		else
			return false;
	}

	public function deleteCapacitacionEmpleado($IdCapacitacionEmp, $IdEmpresa){
		$this->db->where('IdCapacitacionEmp', $IdCapacitacionEmp)->where('IdEmpresa', $IdEmpresa);
		return $this->db->delete('CapacitacionEmpleados');
	}



}

?>