<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class pruebas extends CI_Controller{
	
	function __construct(){
		# code...
	}

	public function index(){
		echo "Este controlador es para las Pruebas";
		
	}


/* Campos para cada una de las variables dela tabla DatosTotales */
--Número de empleados Mujeres activas de la empresa
NumTEmpleadosM
SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE SexoEmpleado = "F" AND EstadoLaboralEmpleado = "Activo" OR EstadoLaboralEmpleado = "Reincorporado";
--Número de empleados Hombres activos de la empresa
NumTEmpleadosH
SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE SexoEmpleado = "M" AND EstadoLaboralEmpleado = "Activo" OR EstadoLaboralEmpleado = "Reincorporado";
--
NumTEmpleados
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE EstadoLaboralEmpleado = "Activo" OR EstadoLaboralEmpleado = "Reincorporado";
NumTEmpleadasAfro
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE EtniaEmpleado = "Afro Ecuatoriano" AND SexoEmpleado = "F";
NumTEmpleadosAfro
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE EtniaEmpleado = "Afro Ecuatoriano" AND SexoEmpleado = "M";
NumTEmpleadasBlancas
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE EtniaEmpleado = "Blanco" AND SexoEmpleado = "F";
NumTEmpleadosBlancos
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE EtniaEmpleado = "Blanco" AND SexoEmpleado = "M";
NumTEmpleadasIndigenas
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE EtniaEmpleado = "Indigena" AND SexoEmpleado = "F";
NumTEmpleadosIndigenas
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE EtniaEmpleado = "Indigena" AND SexoEmpleado = "M";
NumTEmpleadasMestizas
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE EtniaEmpleado = "Mestiza" AND SexoEmpleado = "F";
NumTEmpleadosMestizos
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE EtniaEmpleado = "Mestiza" AND SexoEmpleado = "M";
NumTClientesAnioAnterior	//Dato Base
NumTCientesNuevosPerido	//Dato Base
NumTClientesRetirados	//Dato Base
SaldoT10MayoresDepositantes //Dato Directo
-SELECT `SaldoT10MayoresDepositantes` FROM `DatosGeneralesAnualSeccD` WHERE YEAR(`FechaSistema`) = 2017;
SaldoTDepositos	//Dato Anual
NumTSocios50PorcientoOMasTotalDeDepositos //Dato Directo
-SELECT `NumTSocios50PorcientoOMasTotalDeDepositos` FROM `DatosGeneralesAnualSeccB` WHERE YEAR(`FechaSistema`) = 2017;
NumTSociosActivos
SELECT NumSociosActivos FROM Socios WHERE YEAR(MesPertenece) ORDER BY MesPertenece DESC LIMIT 1;
NumTReclamosPorViolacionInformacionClintes
-SELECT SUM(NoAtendidosReclamos) + SUM(ResueltosReclamos) FROM Reclamos WHERE TipoReclamos = "Violación de Información" AND DenuncianteReclamos ="Clientes" AND YEAR(FechaMes) = 2016; //Enviar parámetro de Año
//la variable Total Clientes existe en el caso de tener clientes OJO para el precoso
NumTClientes //Dato Anual
NumTSociosConCertificadoDeAportacion
-SELECT CantSociosConCertAportacion FROM Socios ORDER BY MesPertenece DESC LIMIT 1;
NumTSociosSinCertificadoDeAportacion
-SELECT CantSociosSinCertAportacion FROM Socios ORDER BY MesPertenece DESC LIMIT 1;
ValorTPorCertificadosDeAportacionAnioAnterior	//Dato base
ValorTCertificadoAportacionDevueltosAnioAnterior
ValorTPorCertificadosDeAportacion
-SELECT ValorTCertificadoAportacion FROM Socios ORDER BY MesPertenece DESC LIMIT 1;
ValorTCertificadoAportacionDevueltos
-SELECT ValorCertificadoAportacionDevueltos FROM Socios ORDER BY MesPertenece DESC LIMIT 1;
NumTSociosHombresConCertificadoDeAportacion
-SELECT NumSociosHombresConCertAportacion FROM Socios ORDER BY MesPertenece DESC LIMIT 1;
NumTSociosMujeresConCertificadoDeAportacion
-SELECT NumSociosMujeresConCertAportacion FROM Socios ORDER BY MesPertenece DESC LIMIT 1;
NumTReclamosResueltos //dato sumatoria
-SELECT SUM(ResueltosReclamos) FROM Reclamos WHERE YEAR(FechaMes) = 2016; //Enviar parámetro
NumTReclamos 	//Dato sumatoria
-SELECT SUM(NoAtendidosReclamos) + SUM(ResueltosReclamos) FROM Reclamos WHERE YEAR(FechaMes) = 2016;
NumTRelamosNoAtendidos
-SELECT SUM(NoAtendidosReclamos) FROM Reclamos WHERE YEAR(FechaMes) = 2016; //Parámetro
NumTDemandasAdministrativasAtendidas //Directo
-SELECT `NumTDemandasAdministrativasAtendidas` FROM `DatosGeneralesAnualSeccC` WHERE YEAR(`FechaSistema`) = 2017;
NumTDemandasAdministrativas //Directo
-SELECT `NumTDemandasAdministrativas` FROM `DatosGeneralesAnualSeccC` WHERE YEAR(`FechaSistema`) = 2017;
NumTComunicacionEjecutadas 
-SELECT COUNT(IdComunicacion) FROM Comunicacion WHERE EstadoComunicacion = "Ejecutada" AND YEAR(Fecha) = 2016;
NumTComunicacionPlanificadas
-SELECT COUNT(IdComunicacion) FROM Comunicacion WHERE EstadoComunicacion = "Planificada" AND YEAR(Fecha) = 2016;
NumTMecanismosInformarProductosServicios
-SELECT COUNT(IdComunicacion) FROM Comunicacion WHERE Dirigido = "Productos" OR Dirigido = "Servicios"  AND EstadoComunicacion = "Ejecutada" AND YEAR(Fecha) = 2016;
ValorTGastoPublicidad
-SELECT SUM(CostoComunicacion) FROM Comunicacion WHERE EstadoComunicacion = "Ejecutada" AND YEAR(Fecha) = 2016;
ValorTGastoEmpresa //dato general anual *********ELIMINAR ESTA COLUMNA, eliminado***********
NumTComunicacionVetadas
-SELECT COUNT(IdComunicacion) FROM Comunicacion WHERE ResultadoDeComunicacion = "Vetada" AND YEAR(Fecha) = 2016;
NumTComunicacion
-SELECT COUNT(IdComunicacion) FROM Comunicacion WHERE EstadoComunicacion = "Ejecutada" AND YEAR(Fecha) = 2016;
NumTComunicacionDenunciadas
-SELECT COUNT(IdComunicacion) FROM Comunicacion WHERE ResultadoDeComunicacion = "Denunciada" AND YEAR(Fecha) = 2016;
NumTHorasCapacitacioPorSocios
-SELECT SUM(NumeroAsistentes * HorasEjecutadas) FROM CapacitacionSocios WHERE YEAR(FechaEjecucion) = 2016;
NumTHorasEsperadasCapacitacionPorSociosEsperados
-SELECT SUM(ParticipantesEsperado * HorasPlanificadas) FROM CapacitacionSocios WHERE YEAR(FechaEjecucion) = 2016;
NumTCertificacionesObtenidas
-SELECT COUNT(idCertificacion) FROM Certificaciones WHERE YEAR(FechaDePlanificacion) = 2016;
NumTCertificacionesEsperados //Dato general anual
NumTEvaluacionesProductosYServiciosEfectuados
-SELECT SUM(NumEvaProdSerEfectuados) FROM EvaluacionProductoServicio WHERE YEAR(FechaMes) = 2016;
NumTEvaluacionesProductosYServiciosProgramados 
-SELECT SUM(NumEvaProdServProgramado) FROM EvaluacionProductoServicio WHERE YEAR(FechaMes) = 2016;
NumTProductosReclamosPorAfectarLaSalud
-SELECT SUM(NumProductosReclamadosAfectaSalud) FROM EvaluacionProductoServicio WHERE YEAR(FechaMes) = 2016;
NumTProductosYServicios 
-SELECT `NumTProductosYServicios` FROM `DatosGeneralesAnualSeccB` WHERE YEAR(`FechaSistema`) = 2017;
NumTProductosRetirados
-SELECT SUM(NumProductosRetirados) FROM EvaluacionProductoServicio WHERE YEAR(FechaMes) = 2016;
NumTProductos 	//dato acumulado
-SELECT NumProductos FROM EvaluacionProductoServicio WHERE YEAR(FechaMes) = 2016 ORDER BY FechaMes DESC LIMIT 1;
NumTProductosEtiquetados
-SELECT NumProductosEtiquetados FROM EvaluacionProductoServicio WHERE YEAR(FechaMes) = 2016;
NumProductoSujetosNormaEtiquetado
-SELECT NumProdConNormasEtiquetado FROM EvaluacionProductoServicio WHERE YEAR(FechaMes) = 2016;
NumTHorasCapacitacionPlanificadasPorEmpleados
-SELECT SUM(HorasPlanificadas * ParticipantesEsperados) FROM CapacitacionEmpleados WHERE YEAR(FechaPlanificada) = 2016;
NumTHorasCapacitarseEmpleadoAtencionCliente
-SELECT SUM(HorasPlanificadas * ParticipantesEsperados) FROM CapacitacionEmpleados WHERE TipoCapacitacion = "Atención al Cliente" AND YEAR(FechaPlanificada) = 2016;
ValorTPorcentajeSatisfaccionCliente
-SELECT SUM(ResultadoSatisfaccion) FROM SatisfaccionCliente WHERE TipoSatisfaccion = "Clientes" AND YEAR(Fecha) = 2016; 
-SELECT COUNT(IdSatisfaccionCliente) FROM SatisfaccionCliente WHERE YEAR(Fecha) = 2016 AND TipoSatisfaccion = "Clientes";
NumTMedidasSatisfaccionClientes 
-SELECT COUNT(IdSatisfaccionCliente) FROM SatisfaccionCliente WHERE YEAR(Fecha) = 2016 AND TipoSatisfaccion = "Clientes";
NumTMedidasSatisfaccionServFinancieros
-SELECT COUNT(IdSatisfaccionCliente) FROM SatisfaccionCliente WHERE YEAR(Fecha) = 2016 AND TipoSatisfaccion = "Servicios Financieros";
ValorTPorcentajeSatisfaccionServicioFinancieros
-SELECT SUM(ResultadoSatisfaccion) FROM SatisfaccionCliente WHERE TipoSatisfaccion = "Servicios Financieros" AND YEAR(Fecha) = 2016; 
NumTSugerenciasConstructivas //valor directo
-SELECT `NumTSugerenciasConstructivas` FROM `DatosGeneralesAnualSeccB` WHERE YEAR(`FechaSistema`) = 2017;
NumTSugerenciasRevisadas //valor directo
-SELECT `NumTSugerenciasRevisadas` FROM `DatosGeneralesAnualSeccB` WHERE YEAR(`FechaSistema`) = 2017;
NumTProductosServiciosEntregadosATiempoAClientes //valor directo
-SELECT `NumTProductosServiciosEntregadosATiempoAClientes` FROM `DatosGeneralesAnualSeccB` WHERE YEAR(`FechaSistema`) = 2017;
NumTProductosServiciosEntregadosAClientes //valor directo
-SELECT `NumTProductosServiciosEntregadosAClientes` FROM `DatosGeneralesAnualSeccC` WHERE YEAR(`FechaSistema`) = 2017;
MontoTGastoEnInformarSobreAsambleas //valor directo
-SELECT `MontoTGastoEnInformarSobreAsambleas` FROM `DatosGeneralesAnualSeccE` WHERE YEAR(`FechaSistema`) = 2017;
GastoTotalDeOrganizacion //valor directo
-SELECT `GastoTotalDeOrganizacion` FROM `DatosGeneralesAnualSeccE` WHERE YEAR(`FechaSistema`) = 2017;
MontoTGastoEnInformarSobreConsejoAdministracion //valor directo
-SELECT `MontoTGastoEnInformarSobreConsejoAdministracion` FROM `DatosGeneralesAnualSeccE` WHERE YEAR(`FechaSistema`) = 2017;
MontoTGastoEnInformarSobreOtraInformacion //valor directo
-SELECT MontoTGastoEnInformarSobreOtraInformacion FROM Acuerdos WHERE YEAR(`FechaSistema`) = 2016;

NumTAcuerdosEjecutadosConSociedadCivil
-SELECT COUNT(IdAcuerdos) FROM Acuerdos WHERE TipoOrganizacion = "Sociedad Civil" AND Estado = "Ejecutado" AND YEAR(FechaEjecucion) = 2016;
NumTAcuerdosPlanificadosConSociedadCivil
-SELECT COUNT(IdAcuerdos) FROM Acuerdos WHERE TipoOrganizacion = "Sociedad Civil" AND Estado = "Planificado" AND YEAR(FechaEjecucion) = 2016;
NumTAcuerdosEjecutadosConCOAC
-SELECT COUNT(IdAcuerdos) FROM Acuerdos WHERE TipoOrganizacion = "COAC" AND YEAR(FechaEjecucion) = 2016;
NumTAcuerdosPlanificadosConCOAC
-SELECT COUNT(IdAcuerdos) FROM Acuerdos WHERE TipoOrganizacion = "Sociedad Civil" AND Estado = "Planificado" AND YEAR(FechaEjecucion) = 2016;
NumTEventosMantieneConOtrasCOAC //Valor directo
-SELECT `NumTEventosMantieneConOtrasCOAC` FROM `DatosGeneralesAnualSeccB` WHERE YEAR(`FechaSistema`) = 2017;
NumTAcuerdosEnOrganismosIntegracionSectorial
-SELECT COUNT(IdAcuerdos) FROM Acuerdos WHERE TipoOrganizacion = "Organismos de Integración Sectorial" AND Estado = "Ejecutado" AND YEAR(FechaEjecucion) = 2016;
NumTAcuerdosConOtrasInstitucionesQueBrindanOtrosServicios
-SELECT COUNT(IdAcuerdos) FROM Acuerdos WHERE TipoOrganizacion = "Otros" AND Estado = "Ejecutado" AND YEAR(FechaEjecucion) = 2016;
NumTConveniosPlanificadosConOtrasInstituciones
-SELECT COUNT(IdAcuerdos) FROM Acuerdos WHERE TipoOrganizacion = "Otros" AND Estado = "Planificado" AND YEAR(FechaEjecucion) = 2016;
NumTConveniosConOganizacionesGubernamentales
-SELECT COUNT(IdAcuerdos) FROM Acuerdos WHERE TipoOrganizacion = "Organizaciones Gubernamentales" AND Estado = "Ejecutado" AND YEAR(FechaEjecucion) = 2016;
NumTAcuerdosEjecutados
-SELECT COUNT(IdAcuerdos) FROM Acuerdos WHERE Estado = "Ejecutado" AND YEAR(FechaEjecucion) = 2016;
NumTBeneficiosNoFinancierosASocios	//valor directo
-SELECT `NumTBeneficiosNoFinancierosASocios` FROM `DatosGeneralesAnualSeccB` WHERE YEAR(`FechaSistema`) = 2017;
NumTCapacitacionEjecutadasEnValoresYPrincipiosAEmpleados
-SELECT COUNT(IdCapacitacionEmp) FROM CapacitacionEmpleados WHERE TipoCapacitacion = "Valores, Principio y Normas de Conducta" AND EstadoCapacitacion = "Ejecutado" AND  YEAR(FechaEjecucion) = 2016;
NumTCapacitacionPlanificadasEnValoresYPrincipiosAEmpleados
-SELECT COUNT(IdCapacitacionEmp) FROM CapacitacionEmpleados WHERE TipoCapacitacion = "Valores, Principio y Normas de Conducta" AND EstadoCapacitacion = "Planificado" AND  YEAR(FechaEjecucion) = 2016;
NumTDenunciasAspectosNoEticosResueltos	//valor directo
-SELECT `NumTDenunciasAspectosNoEticosResueltos` FROM `DatosGeneralesAnualSeccC` WHERE YEAR(`FechaSistema`) = 2017;
NumTDenunciasAspectosNoEticos 	//valor directo
-SELECT `NumTDenunciasAspectosNoEticos` FROM `DatosGeneralesAnualSeccC` WHERE YEAR(`FechaSistema`) = 2017;
NumTCasosDiscriminacionResueltos	//valor directo
-SELECT `NumTCasosDiscriminacionResueltos` FROM `DatosGeneralesAnualSeccC` WHERE YEAR(`FechaSistema`) = 2017;
NumTCasosDiscriminacion 	//valor directo
-SELECT `NumTCasosDiscriminacion` FROM `DatosGeneralesAnualSeccC` WHERE YEAR(`FechaSistema`) = 2017;
CantHorasCapacitacionEjecutadasEnNoDiscriminacionAEmpleados
-SELECT SUM(HorasEjecutadas * ParticipantesCapacitados) FROM CapacitacionEmpleados WHERE TipoCapacitacion = "Políticas de No Discriminación" AND EstadoCapacitacion = "Ejecutado" AND YEAR(FechaEjecucion) = 2016;
CantHorasCapacitacionPlanificadasEnNoDiscriminacionAEmpleados
-SELECT SUM(HorasPlanificadas * ParticipantesEsperados) FROM CapacitacionEmpleados WHERE TipoCapacitacion = "Políticas de No Discriminación" AND EstadoCapacitacion = "Planificado" AND YEAR(FechaEjecucion) = 2016;
CantHorasCapacitacionEjecutadasAnticorrupcionAEmpleados
-SELECT SUM(HorasEjecutadas * ParticipantesCapacitados) FROM CapacitacionEmpleados WHERE TipoCapacitacion = "Anticorrupción" AND EstadoCapacitacion = "Ejecutado" AND YEAR(FechaEjecucion) = 2016;
CantHorasCapacitacionPlanificadasAnticorrupcionAEmpleados
-SELECT SUM(HorasPlanificadas * ParticipantesEsperados) FROM CapacitacionEmpleados WHERE TipoCapacitacion = "Anticorrupción" AND EstadoCapacitacion = "Planificado" AND YEAR(FechaEjecucion) = 2016;
NumTProcesosConRiesgosDeCorrupcionAnalizados	//Valor directo
-SELECT `NumTProcesosConRiesgosDeCorrupcionAnalizados` FROM `DatosGeneralesAnualSeccC` WHERE YEAR(`FechaSistema`) = 2017;
NumTProcesosConRiesgosDeCorrupcionIdentificados	//valor directo
-SELECT `NumTProcesosConRiesgosDeCorrupcionIdentificados` FROM `DatosGeneralesAnualSeccC` WHERE YEAR(`FechaSistema`) = 2017;
NumTMedidasAnteIncidentesDeCorrupcion	//valor directo
-SELECT `NumTMedidasAnteIncidentesDeCorrupcion` FROM `DatosGeneralesAnualSeccC` WHERE YEAR(`FechaSistema`) = 2017;
NumTIncidentesDeCorrupcionOcurridos 	//valor directo
-SELECT `NumTIncidentesDeCorrupcionOcurridos` FROM `DatosGeneralesAnualSeccC` WHERE YEAR(`FechaSistema`) = 2017;
NumTEmpleadosHombresConCargosDirectivos
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE SexoEmpleado = "M" AND CargoEstructural = "Directivo" AND EstadoLaboralEmpleado = "Activo";
NumTEmpleadosConCargosDirectivos
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE CargoEstructural = "Directivo" AND EstadoLaboralEmpleado = "Activo";
NumTEmpleadosMujeresConCargosDirectivos
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE SexoEmpleado = "F" AND CargoEstructural = "Directivo" AND EstadoLaboralEmpleado = "Activo";
NumTEmpleadosHombresDirectivosNacionales
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE SexoEmpleado = "M" AND CargoEstructural = "Directivo" AND Nacionalidad = "Nacional" AND EstadoLaboralEmpleado = "Activo";
NumTEmpleadosMujeresDirectivosNacionales
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE SexoEmpleado = "F" AND CargoEstructural = "Directivo" AND Nacionalidad = "Nacional" AND EstadoLaboralEmpleado = "Activo";
NumTEmpleadosDiscapacitados
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE DiscapacidadEmpleado = "SI";
NumTEmpleadosHombresDiscapacitados
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE DiscapacidadEmpleado = "SI" AND SexoEmpleado = "M";
NumTEmpleadosMujeresDiscapacitados
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE DiscapacidadEmpleado = "SI" AND SexoEmpleado = "F";
PorcentajeEmpleadosDiscapacitadosPorLey	//Valor anual, tomar de general
NumTEmpleadosConInstruccionBasica
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE InstruccionEmpleado = "Básica";
NumTEmpleadosConInstruccionBachillerato
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE InstruccionEmpleado = "Bachillerato";
NumTEmpleadosConInstruccionSuperior
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE InstruccionEmpleado = "Superior";
NumTEmpleadosConInstruccionPostgrado
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE InstruccionEmpleado = "Postgrado";
NumTEmpleados18A30Anios
-SELECT  COUNT(CedulaEmpleado) FROM Empleado WHERE (YEAR(NOW()) - YEAR(FNacimientoEmpleado)) >= 18 AND (YEAR(NOW()) - YEAR(FNacimientoEmpleado)) <= 30 AND YEAR(FIngresoContratoEmpleado) = 2016;
NumTEmpleados31A50Anios
-SELECT  COUNT(CedulaEmpleado) FROM Empleado WHERE (YEAR(NOW()) - YEAR(FNacimientoEmpleado)) >= 31 AND (YEAR(NOW()) - YEAR(FNacimientoEmpleado)) <= 50 AND YEAR(FIngresoContratoEmpleado) = 2016;
NumTEmpleados51AniosAdelante
-SELECT  COUNT(CedulaEmpleado) FROM Empleado WHERE (YEAR(NOW()) - YEAR(FNacimientoEmpleado)) >= 51 AND YEAR(FIngresoContratoEmpleado) = 2016;
NumTCapacitacionesEjecutadas
-SELECT (SELECT COUNT(IdCapacirtacionSocioas) FROM CapacitacionSocios WHERE EstadoCapacitacion = "Ejecutado" AND YEAR(FechaEjecucion) = 2016) + 
(SELECT COUNT(IdCapacitacionCons) FROM CapacitacionConsejos WHERE EstadoCapacitacion = "Ejecutado" AND YEAR(FechaEjecucion) = 2016) + COUNT(IdCapacitacionEmp) FROM CapacitacionEmpleados WHERE EstadoCapacitacion = "Ejecutado" AND YEAR(FechaEjecucion) = 2016;
NumTCapacitacionesPlanificadas
-SELECT (SELECT COUNT(IdCapacirtacionSocioas) FROM CapacitacionSocios WHERE EstadoCapacitacion = "Planificado" AND YEAR(FechaEjecucion) = 2016) + 
(SELECT COUNT(IdCapacitacionCons) FROM CapacitacionConsejos WHERE EstadoCapacitacion = "Planificado" AND YEAR(FechaEjecucion) = 2016) + COUNT(IdCapacitacionEmp) FROM CapacitacionEmpleados WHERE EstadoCapacitacion = "Planificado" AND YEAR(FechaEjecucion) = 2016;
NumTHorasCapacitacionEjecutadasPorEmpleados
-SELECT SUM(HorasEjecutadas * ParticipantesCapacitados) FROM CapacitacionEmpleados WHERE EstadoCapacitacion = "Ejecutada" AND YEAR(FechaPlanificada) = 2016;
NumTEmpleadosCapacitados 
-SELECT SUM(ParticipantesCapacitados) FROM CapacitacionEmpleados WHERE EstadoCapacitacion = "Ejecutada" AND  YEAR(FechaPlanificada) = 2016;
CotsoTCapacitacionEmpleados
-SELECT SUM(Costo) FROM CapacitacionEmpleados WHERE EstadoCapacitacion = "Ejecutada" AND  YEAR(FechaPlanificada) = 2016;
CostoTPresupuestoCapacitacionEmpleados
-SELECT SUM(Presupuesto) FROM CapacitacionEmpleados WHERE YEAR(FechaPlanificada) = 2016;
NumTCapacitacionAEmpleadosEjecutadasPorCOAC	
-SELECT COUNT(IdCapacitacionEmp) FROM CapacitacionEmpleados WHERE EstadoCapacitacion = "Ejecutada" AND TipoCapacitacion = "Realizada por COAC" AND YEAR(FechaPlanificada) = 2016;
NumTCapacitacionAEmpleadosPlanificadasPorCOAC
-SELECT COUNT(IdCapacitacionEmp) FROM CapacitacionEmpleados WHERE TipoCapacitacion = "Realizada por COAC" AND YEAR(FechaPlanificada) = 2016;
NumTHorasEjerFisicoEjecutadaPorEmpleado
-SELECT SUM(HorasEjecutadas * Participantes) FROM SaludLaboralEmpleado WHERE EstadoSaludLaboral = "Ejecutada" AND YEAR(FechaFinEjecucion) = 2016;
NumTHorasEjerFisicoPlanificadaPorEmpleado
-SELECT SUM(HorasPlanificadas * ParticipantesEsperados) FROM SaludLaboralEmpleado WHERE TipoSaludLaboral = "Ejercicio Físico" AND EstadoSaludLaboral = "Planificada" AND YEAR(FechaFinEjecucion) = 2016;
NumTHorasEjerAntiEstresEjecutadaPorEmpleado
-SELECT SUM(HorasPlanificadas * ParticipantesEsperados) FROM SaludLaboralEmpleado WHERE TipoSaludLaboral = "Combatir Estrés" AND EstadoSaludLaboral = "Planificada" AND YEAR(FechaFinEjecucion) = 2016;
NumTHorasEjerAntiEstresPlanificadaPorEmpleado
-SELECT SUM(HorasPlanificadas * ParticipantesEsperados) FROM SaludLaboralEmpleado WHERE TipoSaludLaboral = "Combatir Estrés" AND AND EstadoSaludLaboral = "Planificada" YEAR(FechaFinEjecucion) = 2016;
CostoAnualTNutricionEmpleado	
-SELECT SUM(CostoTotalQueCubreEmpresa) FROM BeneficioLaboralEmpleado WHERE TipoBeneficioLaboral = "Nutrición" AND YEAR(FechaMes) = 2016;
NumTEmpleadosConBeneficioNutricion
-SELECT SUM(NumEmpleadosConServicio) FROM BeneficioLaboralEmpleado WHERE TipoBeneficioLaboral = "Nutrición" AND YEAR(FechaMes) = 2016;
NumTDiasDeBeneficioNutricion
-SELECT SUM(NumDiasOtorgadoElBeneficio) FROM BeneficioLaboralEmpleado WHERE TipoBeneficioLaboral = "Nutrición" AND YEAR(FechaMes) = 2016;
NumTDiasDescansoForzoso	//Valor directo Anual
-SELECT `NumTDiasDescansoForzoso` FROM `DatosGeneralesAnualSeccA` WHERE YEAR(`FechaSistema`) = 2017;
NumTDiasLaborados 	//Valor directo anual
-SELECT `NumTDiasLaborados` FROM `DatosGeneralesAnualSeccA` WHERE YEAR(`FechaSistema`) = 2017;
CostoAnualTtransporteEmpleado	
-SELECT SUM(CostoTotalQueCubreEmpresa) FROM BeneficioLaboralEmpleado WHERE TipoBeneficioLaboral = "Servicio de Transporte" AND YEAR(FechaMes) = 2016;
NumTEmpleadosConBeneficioTransporte
-SELECT SUM(NumEmpleadosConServicio) FROM BeneficioLaboralEmpleado WHERE TipoBeneficioLaboral = "Servicio de Transporte" AND YEAR(FechaMes) = 2016;
NumTDiasDeBeneficioTransporte
-SELECT SUM(NumDiasOtorgadoElBeneficio) FROM BeneficioLaboralEmpleado WHERE TipoBeneficioLaboral = "Servicio de Transporte" AND YEAR(FechaMes) = 2016;
NumTDiasDestinadosAEducacionFamiliar	//Valor directo anual
-SELECT `NumTDiasDestinadosAEducacionFamiliar` FROM `DatosGeneralesAnualSeccC` WHERE YEAR(`FechaSistema`) = 2017;
NumTHijos4AniosEnCnetroInicial
-SELECT COUNT(idHijoEmpleado) FROM HijoEmpleado WHERE (TIMESTAMPDIFF(YEAR, FechaNacimientoHijoEmpleado, CURDATE())) <= 4 AND CentroEducacionHijoEmpleado = "Educación Inicial" AND YEAR(FechaSistema) = 2016;
NumTHijos4Anios
-SELECT COUNT(idHijoEmpleado) FROM HijoEmpleado WHERE (TIMESTAMPDIFF(YEAR, FechaNacimientoHijoEmpleado, CURDATE())) <= 4 AND YEAR(FechaSistema) = 2016;
NumTHijos5A14AniosEnEduBasica
-SELECT COUNT(idHijoEmpleado) FROM HijoEmpleado WHERE (TIMESTAMPDIFF(YEAR, FechaNacimientoHijoEmpleado, CURDATE())) >=5 AND (TIMESTAMPDIFF(YEAR, FechaNacimientoHijoEmpleado, CURDATE())) <= 14 AND CentroEducacionHijoEmpleado = "Educación General Básica" AND YEAR(FechaSistema) = 2016;
NumTHijos5A14Anios
-SELECT COUNT(idHijoEmpleado) FROM HijoEmpleado WHERE (TIMESTAMPDIFF(YEAR, FechaNacimientoHijoEmpleado, CURDATE())) >= 5 AND (TIMESTAMPDIFF(YEAR, FechaNacimientoHijoEmpleado, CURDATE())) <= 14 AND YEAR(FechaSistema) = 2016;
NumTHijos15A17AniosEnEduBachillerato
-SELECT COUNT(idHijoEmpleado) FROM HijoEmpleado WHERE (TIMESTAMPDIFF(YEAR, FechaNacimientoHijoEmpleado, CURDATE())) >= 15 AND (TIMESTAMPDIFF(YEAR, FechaNacimientoHijoEmpleado, CURDATE())) <= 17 AND CentroEducacionHijoEmpleado = "Centro Educativo de Bachillerato Unificado" AND YEAR(FechaSistema) = 2016;
NumTHijos15A17Anios
SELECT COUNT(idHijoEmpleado) FROM HijoEmpleado WHERE (TIMESTAMPDIFF(YEAR, FechaNacimientoHijoEmpleado, CURDATE())) >= 15 AND (TIMESTAMPDIFF(YEAR, FechaNacimientoHijoEmpleado, CURDATE())) <= 17 AND YEAR(FechaSistema) = 2016;
NumTHijos3A17AniosDiscapacitadosEstudiando
-SELECT COUNT(idHijoEmpleado) FROM HijoEmpleado WHERE (TIMESTAMPDIFF(YEAR, FechaNacimientoHijoEmpleado, CURDATE())) >= 3 AND (TIMESTAMPDIFF(YEAR, FechaNacimientoHijoEmpleado, CURDATE())) <= 17 AND DiscapacidadHijoEmpleado = "SI" AND (CentroEducacionHijoEmpleado != "Sin Educación") 
AND (CentroEducacionHijoEmpleado != "Estudios Suspendidos") AND YEAR(FechaSistema) = 2016;
NumTHijos3A17AniosDiscapacitados
-SELECT COUNT(idHijoEmpleado) FROM HijoEmpleado WHERE (TIMESTAMPDIFF(YEAR, FechaNacimientoHijoEmpleado, CURDATE())) >= 3 AND (TIMESTAMPDIFF(YEAR, FechaNacimientoHijoEmpleado, CURDATE())) <= 17 AND DiscapacidadHijoEmpleado = "SI" AND YEAR(FechaSistema) = 2016;
NumTHijos3A17AniosSinEscolaridad
-SELECT COUNT(idHijoEmpleado) FROM HijoEmpleado WHERE (TIMESTAMPDIFF(YEAR, FechaNacimientoHijoEmpleado, CURDATE())) >= 3 AND (TIMESTAMPDIFF(YEAR, FechaNacimientoHijoEmpleado, CURDATE())) <= 17 AND DiscapacidadHijoEmpleado = "SI" AND CentroEducacionHijoEmpleado = "Sin Educación" AND YEAR(FechaSistema) = 2016;
NumTHijosDeEmpleados
-SELECT COUNT(idHijoEmpleado) FROM HijoEmpleado WHERE YEAR(FechaSistema) = 2016;
NumTSociosActivosInicioPeriodo
-SELECT NumSociosActivos FROM Socios WHERE Year(FechaSistema) = 2016 ORDER BY NumSociosActivos DESC LIMIT 1;
NumTSociosIncorporadosPeriodo
-SELECT NumSociosIncorporados FROM Socios WHERE Year(FechaSistema) = 2016 ORDER BY NumSociosActivos ASC LIMIT 1;
NumTSociosRetiradosPeriodo	//dato sumatoria de todo el año
-SELECT SUM(NumSociosRetirados) FROM Socios WHERE Year(FechaSistema) = 2016 ORDER BY NumSociosActivos ASC LIMIT 1;
NumTSocios
-SELECT NumSociosActivos + NumSociosIncorporados - NumSociosRetirados FROM Socios WHERE Year(FechaSistema) = 2016 ORDER BY NumSociosActivos ASC LIMIT 1;
NumTSociosActivosMujeres
-SELECT NumSociosMujeresActivas FROM Socios WHERE Year(FechaSistema) = 2016 ORDER BY NumSociosActivos ASC LIMIT 1;
NumTSociosActivosConCuentasAhorro
-SELECT NumSociosConCuentasDeAhooro FROM Socios WHERE Year(FechaSistema) = 2016 ORDER BY NumSociosActivos ASC LIMIT 1;
NumTPersonasNaturalesIncorporadas
-SELECT NumPersonasNaturalesIncorporadas FROM Socios WHERE Year(FechaSistema) = 2016 ORDER BY NumSociosActivos ASC LIMIT 1;
NumTPersonasJuridicasIncorporadas
-SELECT NumPersonasJuridicasIncorporadas FROM Socios WHERE Year(FechaSistema) = 2016 ORDER BY NumSociosActivos ASC LIMIT 1;
NumTSociosConCuentaAhorroMenorA18Anios
-SELECT NumSociosConCuentaAhorroMenorA18Anios FROM Socios WHERE Year(FechaSistema) = 2016 ORDER BY NumSociosActivos ASC LIMIT 1;
ValorTDepositoALaVista	//Valor directo anual
-SELECT `ValorTDepositoALaVista` FROM `DatosGeneralesAnualSeccD` WHERE YEAR(`FechaSistema`) = 2017;
ValorTDepositoAplazo	//Valor directo anual
-SELECT `ValorTDepositoAplazo` FROM `DatosGeneralesAnualSeccD` WHERE YEAR(`FechaSistema`) = 2017;
ValorTActivos 	//Valor directo anual
-SELECT `ValorTActivos` FROM `DatosGeneralesAnualSeccE` WHERE YEAR(`FechaSistema`) = 2017;
ValorCuotaIngreso	//Valor general variable en el año
ValorSalarioMinimoMensual	//Valor general variable en el año
-SELECT `ValorSalarioMinimoMensual` FROM `DatosGeneralesAnualSeccA` WHERE YEAR(`FechaSistema`) = 2017;
NumTSociosParticipanEnElecciones	//Valor directo anual
-SELECT `NumTSociosParticipanEnElecciones` FROM `DatosGeneralesAnualSeccB` WHERE YEAR(`FechaSistema`) = 2017;
NumTRepresentantesEmpadronados	//Valor directo anual
-SELECT `NumTRepresentantesEmpadronados` FROM `DatosGeneralesAnualSeccA` WHERE YEAR(`FechaSistema`) = 2017;
NumTTransacciones	//Valor directo anual
-SELECT `NumTTransacciones` FROM `DatosGeneralesAnualSeccA` WHERE YEAR(`FechaSistema`) = 2017;
NumTProveedoresLocales
-SELECT COUNT(IdProveedor) FROM Proveedor WHERE AlcanceProveedor = "Local";
NumTProveedores
-SELECT COUNT(IdProveedor) FROM Proveedor WHERE EstadoProveedor = "Activo";
GastoTServiciosBasicos
SELECT SUM(CostoGastosMes) FROM GastosMesEmpresa WHERE YEAR(FachaGastosMes) = 2016;
GastoTServiciosBasicosAnioAnterior //Valor directo base
NumTProgramasDeReciclaje //valor directo anual
-SELECT `NumTProgramasDeReciclaje` FROM `DatosGeneralesAnualSeccC` WHERE YEAR(`FechaSistema`) = 2017;
NumTComprobantesFisicosEmitidos	//valor directo anual
NumTComprobantesEmitidos 	//Valor directo anual
-SELECT `NumTComprobantesEmitidos` FROM `DatosGeneralesAnualSeccC` WHERE YEAR(`FechaSistema`) = 2017;
CostoComprobanteVentaRetencionAntesFacturacionElectronica	//Valor directo anual
-SELECT `CostoComprobanteVentaRetencionAntesFacturacionElectronica` FROM `DatosGeneralesAnualSeccE` WHERE YEAR(`FechaSistema`) = 2017;
CostoComprobanteVentaRetencionDespuesFacturaElectronica	//Valor directo anual
-SELECT `CostoComprobanteVentaRetencionDespuesFacturaElectronica` FROM `DatosGeneralesAnualSeccE` WHERE YEAR(`FechaSistema`) = 2017;
NumTComprobantesElectronicosEmitidos	//Valor diercto anual
-SELECT `NumTComprobantesElectronicosEmitidos` FROM `DatosGeneralesAnualSeccC` WHERE YEAR(`FechaSistema`) = 2017;
GastoTElectricidad
-SELECT SUM(CostoGastosMes) FROM GastosMesEmpresa WHERE UnidadMedidaGastosMes = "Kw" AND YEAR(FachaGastosMes) = 2016;
GastoTElectricidadAnioAnterior	//Valor directo base
CantTKwhElectricidad
-SELECT SUM(CantidadGastosMes) FROM GastosMesEmpresa WHERE UnidadMedidaGastosMes = "Kw" AND YEAR(FachaGastosMes) = 2016;
CantTKwhElectricidadAnioAnterior	//valor directo base
CantTGalonesGasolina
SELECT SUM(CantidadGastosMes) FROM GastosMesEmpresa WHERE UnidadMedidaGastosMes = "Galones" AND YEAR(FachaGastosMes) = 2016;
CantTGalonesGasolinaAnioAnterior	//valor directo base
GastoTGasolina
-SELECT SUM(CostoGastosMes) FROM GastosMesEmpresa WHERE UnidadMedidaGastosMes = "Galones" AND YEAR(FachaGastosMes) = 2016;
GastoTGasolinaAnioAnterior		//valor directo base
********OJO porque toca sumar la gasolina en envio y los gastos mensuales**********
GastoTGasolinaEnEnvioProductosServicios	//Valor directo anual
-SELECT `GastoTGasolinaEnEnvioProductosServicios` FROM `DatosGeneralesAnualSeccE` WHERE YEAR(`FechaSistema`) = 2017;
GastoTConsumoAgua
-SELECT SUM(CostoGastosMes) FROM GastosMesEmpresa WHERE UnidadMedidaGastosMes = "m3" AND YEAR(FachaGastosMes) = 2016;
GastoTConsumoAguaAnioAnterior	//Valor directo base
CantTm3AguaConsumida
-SELECT SUM(CantidadGastosMes) FROM GastosMesEmpresa WHERE UnidadMedidaGastosMes = "m3" AND YEAR(FachaGastosMes) = 2016;
CantTm3AguaConsumidaAnioAnterior	//Valor directo base
CantTm3Reutilizada	//valor directo anual
-SELECT `CantTm3Reutilizada` FROM `DatosGeneralesAnualSeccA` WHERE YEAR(`FechaSistema`) = 2017;
GastoTTelefono
-SELECT SUM(CostoGastosMes) FROM GastosMesEmpresa WHERE UnidadMedidaGastosMes = "Minutos" AND YEAR(FachaGastosMes) = 2016;
ValorTSancionAfectaAmbiente
-SELECT SUM(CostoSancion) FROM Sanciones WHERE TipoSancion = "Afectación al medio Ambiente" AND YEAR(FechaMes) = 2016;
ValorTSanciones 
-SELECT SUM(CostoSancion) FROM Sanciones WHERE YEAR(FechaMes) = 2016;
GastoTTelefonoAnioAnterior	//valor directo base
NumTReclamosAfectaAmbienteResueltos
-SELECT SUM(ResueltosReclamos) FROM Reclamos WHERE TipoReclamos = "Afectación al medio Ambiente" AND YEAR(FechaMes) = 2016;
NumTReclamosAfectaAmbiente
-SELECT SUM(NoAtendidosReclamos + ResueltosReclamos) FROM Reclamos WHERE TipoReclamos = "Afectación al medio Ambiente" AND YEAR(FechaMes) = 2016;
CantTMinutosTelefono
-SELECT SUM(CantidadGastosMes) FROM GastosMesEmpresa WHERE UnidadMedidaGastosMes = "Minutos" AND YEAR(FachaGastosMes) = 2016;
CantMinutosTelefonoAnioAnterior	//valor directo base
GastoTMultasNormasAmbientales	//valor directo anual
-SELECT `GastoTMultasNormasAmbientales` FROM `DatosGeneralesAnualSeccE` WHERE YEAR(`FechaSistema`) = 2017;
GastoTMultas //valor directo anual
NumTProgramasConcientizacionEjecutadas
-SELECT COUNT(idProgramasConcientizacion) FROM ProgramasConcientizacion WHERE EstadoPrograma = "Ejecutada" AND YEAR(
    FechaFinPrograma) = 2016;
NumTProgramasConcientizacion
-SELECT COUNT(idProgramasConcientizacion) FROM ProgramasConcientizacion WHERE YEAR(
    FechaFinPrograma) = 2016;
GastoTPapel
-SELECT SUM(CostoGastosMes) FROM GastosMesEmpresa WHERE UnidadMedidaGastosMes = "Resmas" AND YEAR(FachaGastosMes) = 2016;
GastoTPapelAnioAnterior	//variable directo base
CantTResmasPapel
-SELECT SUM(CantidadGastosMes) FROM GastosMesEmpresa WHERE UnidadMedidaGastosMes = "Resmas" AND YEAR(FachaGastosMes) = 2016;
CantTResmasPapelAnioAnterior	//variable directo base
CantTKwhEnergiaUtilizadaRenovable	//valor directo anual
-SELECT `CantTKwhEnergiaUtilizadaRenovable` FROM `DatosGeneralesAnualSeccA` WHERE YEAR(`FechaSistema`) = 2017;
CantTKwhEnergiaUtilizada 	//valor directo anual
GastoTEquipamiento 	//valor directo anual
-SELECT `GastoTEquipamiento` FROM `DatosGeneralesAnualSeccE` WHERE YEAR(`FechaSistema`) = 2017;
GastoTEquipamientoAnioAnterior //valor directo anual
GastoTAsignadoAEliminarResiduo //valor directo anual
-SELECT `GastoTAsignadoAEliminarResiduo` FROM `DatosGeneralesAnualSeccE` WHERE YEAR(`FechaSistema`) = 2017;
GastoTAsignadoAEliminarResiduoAnioAnterior	//valor directo base
GastoTLimpieza 	//valor directo anual
-SELECT `GastoTLimpieza` FROM `DatosGeneralesAnualSeccE` WHERE YEAR(`FechaSistema`) = 2017;
GastoTLimpiezaAnioAnterior	//valor directo base
NumTProgramasConcientizacionEjecutadasReduccionDeschos
-SELECT COUNT(idProgramasConcientizacion) FROM ProgramasConcientizacion WHERE TipoPrograma = "Concientizacion de reducción de Residuos" AND EstadoPrograma = "Ejecutada" AND YEAR(FechaFinPrograma) = 2016;
NumTBateriasSanitarias //Valor directo anual
-SELECT `NumTBateriasSanitarias` FROM `DatosGeneralesAnualSeccC` WHERE YEAR(`FechaSistema`) = 2017;
NumTBateriasSanitariasPorNormativa	//Valor directo anual
-SELECT `NumTBateriasSanitariasPorNormativa` FROM `DatosGeneralesAnualSeccA` WHERE YEAR(`FechaSistema`) = 2017;
-------------//Ver en la fila 139 y analizarla
NumEmpleadosQueCubreLasBaterias
-SELECT `NumEmpleadosQueCubreLasBaterias` FROM `DatosGeneralesAnualSeccA` WHERE YEAR(`FechaSistema`) = 2017;
NumTLimpiezasPorDia 	//valor directo anual
NumTLimpiezasProgramadasPorDia	//valor directo anual
NumTEmpleadosContratados
SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE YEAR(FIngresoContratoEmpleado) = 2016;
NumTEmpleadosContratadosAnioAnterior	//valor directo base
//Preguntar por numerador y denominador de contratos empleados
NumTEmpleadosContratadosNoIndefinido
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE TipoContrato != "Indefinido" AND YEAR(FIngresoContratoEmpleado) = 2016;
NumTEmpleadosContratadosIndefinido
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE TipoContrato = "Indefinido" AND YEAR(FIngresoContratoEmpleado) = 2016;
NumTEmpleadosAfiliadosIESS
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE AfiliadoIESSEmpleado = "SI";
NumTEmpleadosContratadosConClapsulas
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE NumClapsulasContrato != 0;
ValorTAportacionEmpleados	//valor directo anual
-SELECT `ValorTAportacionEmpleados` FROM `DatosGeneralesAnualSeccE` WHERE YEAR(`FechaSistema`) = 2017;
ValorTAportacionPatrono		//valor directo anual
-SELECT `ValorTAportacionPatrono` FROM `DatosGeneralesAnualSeccE` WHERE YEAR(`FechaSistema`) = 2017;
ValorTAportesAEmpleadosAJornadaCompleta	//valor directo anual
-SELECT `ValorTAportesAEmpleadosAJornadaCompleta` FROM `DatosGeneralesAnualSeccE` WHERE YEAR(`FechaSistema`) = 2017;
NumTBeneficiosAdicionalesAEmpleadosConContratoNoIndefinido	//valor directo anual
-SELECT `NumTBeneficiosAdicionalesAEmpleadosConContratoNoIndefinido` FROM `DatosGeneralesAnualSeccC` WHERE YEAR(`FechaSistema`) = 2017;
NumTBeneficiosAdicionalesAEmpleadosConContratoIndefinido 	//valor directo anual
-SELECT `NumTBeneficiosAdicionalesAEmpleadosConContratoIndefinido` FROM `DatosGeneralesAnualSeccC` WHERE YEAR(`FechaSistema`) = 2017;
NumTEmpeladosQueGozaronVacaciones	//valor directo anual
-SELECT `NumTEmpeladosQueGozaronVacaciones` FROM `DatosGeneralesAnualSeccB` WHERE YEAR(`FechaSistema`) = 2017;
NumTEmpeladosQueNoGozaronVacaciones	//valor directo anual
ValorTPagadoAEmpleadosPorVacacionesNoTomadasEnMenosDeAnio //valor directo anual
-SELECT `ValorTPagadoAEmpleadosPorVacacionesNoTomadasEnMenosDeAnio` FROM `DatosGeneralesAnualSeccE` WHERE YEAR(`FechaSistema`) = 2017;
ValorTPagadoPorVaciones 	//valor directo anual
-SELECT `ValorTPagadoPorVaciones` FROM `DatosGeneralesAnualSeccE` WHERE YEAR(`FechaSistema`) = 2017;
ValorTPagadoDecimoTercero	//valor directo anual
-SELECT `ValorTPagadoDecimoTercero` FROM `DatosGeneralesAnualSeccE` WHERE YEAR(`FechaSistema`) = 2017;
ValorTProvisionAnio		//valor directo anual
-SELECT `ValorTProvisionAnio` FROM `DatosGeneralesAnualSeccE` WHERE YEAR(`FechaSistema`) = 2017;
ValorTPorPagarProvisionDecimoTercero //valor directo anual
-SELECT `ValorTPorPagarProvisionDecimoTercero` FROM `DatosGeneralesAnualSeccE` WHERE YEAR(`FechaSistema`) = 2017;
ValorTPagadoDecimoCuarto	//valor directo anual
-SELECT `ValorTPagadoDecimoCuarto` FROM `DatosGeneralesAnualSeccE` WHERE YEAR(`FechaSistema`) = 2017;
ValorTPorPagarProvisionDecimoCuarto //valor directo anual ********VER**********
NumTEmpleadosLaboranMasDeAnio	//valor directo anual
-SELECT `NumTEmpleadosLaboranMasDeAnio` FROM `DatosGeneralesAnualSeccC` WHERE YEAR(`FechaSistema`) = 2017;
ValorTFondoReservaPagadoMensual	//valor directo anual
-SELECT `ValorTFondoReservaPagadoMensual` FROM `DatosGeneralesAnualSeccE` WHERE YEAR(`FechaSistema`) = 2017;
ValorTFondoReserva 	//valor directo anual
-SELECT `ValorTFondoReserva` FROM `DatosGeneralesAnualSeccE` WHERE YEAR(`FechaSistema`) = 2017;
NumTEmpleadasEmbarazadas	//valor directo anual
-SELECT `NumTEmpleadasEmbarazadas` FROM `DatosGeneralesAnualSeccC` WHERE YEAR(`FechaSistema`) = 2017;
NumTEmpleadosConPermisoPaternidad	//valor directo anual
-SELECT `NumTEmpleadosConPermisoPaternidad` FROM `DatosGeneralesAnualSeccC` WHERE YEAR(`FechaSistema`) = 2017;
NumTEmpleadasReincorporadasPorMaternidad	//valor directo anual
-SELECT `NumTEmpleadasReincorporadasPorMaternidad` FROM `DatosGeneralesAnualSeccC` WHERE YEAR(`FechaSistema`) = 2017;
NumTEmpĺeadasConPermisoMaternidad	//valor directo anual
-SELECT `NumTEmpĺeadasConPermisoMaternidad` FROM `DatosGeneralesAnualSeccC` WHERE YEAR(`FechaSistema`) = 2017;
NumTEmpleadosReincorporadosPorPaternidad	//valor directo anual
-SELECT `NumTEmpleadosReincorporadosPorPaternidad` FROM `DatosGeneralesAnualSeccC` WHERE YEAR(`FechaSistema`) = 2017;
NumTEmpĺeadosConPermisoPaternidad	//valor directo anual
-SELECT `NumTEmpĺeadosConPermisoPaternidad` FROM `DatosGeneralesAnualSeccC` WHERE YEAR(`FechaSistema`) = 2017;
NumTEmpleadasReincorporadasFueraDeTiempoEstablecido	//valor directo anual
-SELECT `NumTEmpleadasReincorporadasFueraDeTiempoEstablecido` FROM `DatosGeneralesAnualSeccC` WHERE YEAR(`FechaSistema`) = 2017;
NumTEmpleadasReincorporadasATiempoEstablecido 	//valor directo anual
-SELECT `NumTEmpleadasReincorporadasATiempoEstablecido` FROM `DatosGeneralesAnualSeccC` WHERE YEAR(`FechaSistema`) = 2017;
ValorTCubreSeguroContraIncendio 
-SELECT SUM(`MontoCubreSeguroL`) FROM `SeguroLaboral` WHERE `TipoSeguroL` = "Seguro de Contra Incendios" AND `SiniestroOcurrido` = "SI" AND YEAR(`FechaAdquiereSeguroL`) = 2016;
ValorTRealSeguroContraIncendio 
-SELECT SUM(`ValorRealSiniestro`) FROM `SeguroLaboral` WHERE `TipoSeguroL` = "Seguro de Contra Incendios" AND `SiniestroOcurrido` = "SI" AND YEAR(`FechaAdquiereSeguroL`) = 2016;
NumTIntegrantesComiteDeSalud
-SELECT IntegrantesComite FROM Comites WHERE tipoComite = "Comité de Salud" AND YEAR(FechaSistema) = 2016 ORDER BY FechaSistema DESC LIMIT 1;
NumTEmpleadosRecibenEquipoDeProteccion	//valor directo anual
-SELECT `NumTEmpleadosRecibenEquipoDeProteccion` FROM `DatosGeneralesAnualSeccB` WHERE YEAR(`FechaSistema`) = 2017;
NumTEmpleadosQueUsanEquiposDeProteccion	//valor directo anual
-SELECT `NumTEmpleadosQueUsanEquiposDeProteccion` FROM `DatosGeneralesAnualSeccB` WHERE YEAR(`FechaSistema`) = 2017;
NumTEmpleadosQueDebemUsarEquiposDeProteccion	//valor directo anual
-SELECT `NumTEmpleadosQueDebemUsarEquiposDeProteccion` FROM `DatosGeneralesAnualSeccB` WHERE YEAR(`FechaSistema`) = 2017;
NumTEvaluacionesAUtilizacionDeEquiDeProteccionEjecutadas	//valor directo anual
-SELECT `NumTEvaluacionesAUtilizacionDeEquiDeProteccionEjecutadas` FROM `DatosGeneralesAnualSeccB` WHERE YEAR(`FechaSistema`) = 2017;
NumTEvaluacionesAUtilizacionDeEquiDeProteccionProgramadas	//valor directo anual
-SELECT `NumTEvaluacionesAUtilizacionDeEquiDeProteccionProgramadas` FROM `DatosGeneralesAnualSeccB` WHERE YEAR(`FechaSistema`) = 2017;
NumTMantenimientosAInfraestructuraEjecutados	//valor directo anual
-SELECT `NumTMantenimientosAInfraestructuraEjecutados` FROM `DatosGeneralesAnualSeccB` WHERE YEAR(`FechaSistema`) = 2017;
NumTMantenimientosAInfraestructuraRequeridos	//valor directo anual
-SELECT `NumTMantenimientosAInfraestructuraRequeridos` FROM `DatosGeneralesAnualSeccB` WHERE YEAR(`FechaSistema`) = 2017;
MontoTInvertidoEnInfraestructura	//valor directo anual
-SELECT `MontoTInvertidoEnInfraestructura` FROM `DatosGeneralesAnualSeccD` WHERE YEAR(`FechaSistema`) = 2017;
NumTEmpleadosAccidentados
-SELECT COUNT(IdAccidente) FROM Accidentes WHERE YEAR(FechaAcidente) = 2016;
NumTEmpleadosAccidentadosConIncapacidadTemporal
-SELECT COUNT(IdAccidente) FROM Accidentes WHERE TipoIncapacidadAccidente = "Temporal" AND YEAR(FechaAcidente) = 2016;
NumTEmpleadosAccidentadosConIncapacidadParcial
-SELECT COUNT(IdAccidente) FROM Accidentes WHERE TipoIncapacidadAccidente = "Parcial" AND YEAR(FechaAcidente) = 2016;
NumTEmpleadosAccidentadosConIncapacidadTotal
SELECT COUNT(IdAccidente) FROM Accidentes WHERE TipoIncapacidadAccidente = "Total" AND YEAR(FechaAcidente) = 2016;
NumTEmpleadosAccidentadosConIncapacidadAbsoluta
SELECT COUNT(IdAccidente) FROM Accidentes WHERE TipoIncapacidadAccidente = "Absoluta" AND YEAR(FechaAcidente) = 2016;
NumTEmpleadosAccidentadosFallecidos
-SELECT COUNT(IdAccidente) FROM Accidentes WHERE Fallecimiento = "SI" AND YEAR(FechaAcidente) = 2016;
NumTDiasPerdidosEmpleadosAccidentados
-SELECT SUM(NumDiasPerdidos) FROM Accidentes WHERE YEAR(FechaAcidente) = 2016;
NumTEmpleadosAccidentadosIndemizados	
-SELECT COUNT(IdAccidente) FROM Accidentes WHERE Indemnizado = "SI" AND YEAR(FechaAcidente) = 2016;
NumTReclamosEnAspectosLaborales
-SELECT (NoAtendidosReclamos + ResueltosReclamos) FROM Reclamos WHERE TipoReclamos = "Aspectos Laborales" AND YEAR(FechaSistema) = 2016;
NumTReclamosEnAspectosLaboralesResueltos 
SELECT ResueltosReclamos FROM Reclamos WHERE TipoReclamos = "Aspectos Laborales" AND YEAR(FechaSistema) = 2016;
NumTSesionConsejoAdminYVigilancia
-SELECT COUNT(IdReuniones) FROM SesionesConsejos WHERE TipoSesion = "Consejo de Administración" OR TipoSesion = "Consejo de Vigilancia" AND EstadoReunion ="Ejecutada"  AND YEAR(FechaEjecucion) = 2016;
NumTSesionesDeConsejosEstablecidasPorLey	//Valor directo anual
NumTMujeresEnConsejoDeAdminYVigilancia	//dato {ultimo de la tabla
-SELECT NumeroMujeres FROM Consejos WHERE TipoCOnsejos = "Consejo de Administración" OR TipoConsejos = "Consejo de Vigilancia" AND YEAR(FechaSistema) = 2016 ORDER BY FechaSistema DESC LIMIT 1;
NumTIntegrantesConsejoAdminYVigilancia
-SELECT IntegrantesConsejos FROM Consejos WHERE TipoConsejos = "Consejo de Administración" OR TipoConsejos = "Consejo de Vigilancia" AND YEAR(FechaSistema) = 2016 ORDER BY FechaSistema DESC LIMIT 1;
NumTIntegrantesPresentesEnSesionConsejoAdminYVigilancia
-SELECT SUM(RepresentantesPresentes) FROM SesionesConsejos WHERE TipoSesion = "Consejo de Administración" OR TipoSesion = "Consejo de Vigilancia" AND EstadoReunion = "Ejecutada" AND YEAR(FechaEjecucion) = 2016;
NumTIntegrantesPlanificadosEnSesionConsejoAdminYVigilancia
-SELECT SUM(RepresentantesPlanificados) FROM SesionesConsejos WHERE TipoSesion = "Consejo de Administración" OR TipoSesion = "Consejo de Vigilancia" AND YEAR(FechaEjecucion) = 2016;
NumTEmpleadosHDirectivosYGerenciales
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE CargoEstructural = "Directivo" OR CargoEstructural = "Gerencial" AND SexoEmpleado = "M";
NumTEmpleadosDirectivosYGerenciales
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE CargoEstructural = "Directivo" OR CargoEstructural = "Gerencial";
NumTRepresentatesHAsambleaGeneral
-SELECT COUNT(RO.IdRepOrg) FROM Representante_Organismo RO, Representantes R WHERE RO.IdRepresentante = R.CedulaRepresentante AND R.SexoRepresentante = "M" AND RO.IdOrganismo = (SELECT IdOrganismo FROM Organismos WHERE NombreOrganismo = "Asamblea General de Socios o Representantes") AND YEAR(FechaPeriodoFinaliza) >= 2016;
NumTRepresentantesAsambleaGeneral
-SELECT COUNT(IdRepOrg) FROM Representante_Organismo WHERE YEAR(FechaPeriodoFinaliza) >= 2016;
NumTEmpleadosMDirectivosYGerenciales
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE CargoEstructural = "Directivo" OR CargoEstructural = "Gerencial" AND SexoEmpleado = "F";
NumTRepresentatesMAsambleaGeneral
-SELECT COUNT(RO.IdRepOrg) FROM Representante_Organismo RO, Representantes R WHERE RO.IdRepresentante = R.CedulaRepresentante AND R.SexoRepresentante = "F" AND RO.IdOrganismo = (SELECT IdOrganismo FROM Organismos WHERE NombreOrganismo = "Asamblea General de Socios o Representantes") AND YEAR(FechaPeriodoFinaliza) >= 2016;
NumTMiembrosOficinasMasSignificativas
-SELECT SUM(TotalVocalesRepresentantes) FROM SucursalEmpresa WHERE CumplePresupuesto = "Si Cumple" AND YEAR(FechaMes) = 2016;
NumTMiembrosConsejoDeOficinas
-SELECT SUM(TotalMiembrosConsejos) FROM SucursalEmpresa WHERE CumplePresupuesto = "Si Cumple" AND YEAR(FechaMes) = 2016;
NumTMiembrosConsejoAdminYVigilanciaCapacitados
-SELECT SUM(ParticipantesCapacitados) FROM CapacitacionConsejos WHERE EstadoCapacitacion = "Ejecutada" AND YEAR(FechaEjecucion) = 2016;
NumTMiembrosConsejoAdminYVigilanciaACapacitarSegunPOA
-SELECT SUM(ParticipantesEsperadosPOA) FROM CapacitacionConsejos WHERE YEAR(FechaEjecucion) = 2016;
NumTHorasCapacitacionEjecutadasAConsejos
-SELECT SUM(HorasEjecutadas) FROM CapacitacionConsejos WHERE EstadoCapacitacion = "Ejecutada" AND YEAR(FechaEjecucion) = 2016;
NumTHorasCapacitacionPlanificadasAConsejos
-SELECT SUM(HorasPlanificadas) FROM CapacitacionConsejos WHERE YEAR(FechaEjecucion) = 2016;
CostoTCapacitacionConsejosAdminYVigilancia
-SELECT SUM(Costo) FROM CapacitacionConsejos CC, Consejos C WHERE C.TipoConsejos = "Consejo de Administración" OR C.TipoConsejos = "Consejo de Vigilancia" AND CC.EstadoCapacitacion = "Ejecutada" AND YEAR(FechaEjecucion) = 2016 AND CC.IdConsejo = C.idConsejos;
PresupuestoTCapacitacionConsejosAdminYVigilancia
-SELECT SUM(CC.Presupuesto) FROM CapacitacionConsejos CC, Consejos C WHERE C.TipoConsejos = "Consejo de Administración" OR C.TipoConsejos = "Consejo de Vigilancia" AND YEAR(FechaEjecucion) = 2016 AND CC.IdConsejo = C.idConsejos;
NumTMiembrosConsejoAdminYVigilanciaCapacitadosEnAticorrupcion
.SELECT SUM(ParticipantesCapacitados) FROM CapacitacionConsejos WHERE EstadoCapacitacion = "Ejecutada" AND TipoCapacitacion = "Anticorrupción" AND YEAR(FechaEjecucion) = 2016;
NumTMiembrosConsejoAdminYVigilanciaEsperadosEnAticorrupcion
-SELECT SUM(ParticipantesEsperadosPOA) FROM CapacitacionConsejos WHERE EstadoCapacitacion = "Ejecutada" AND TipoCapacitacion = "Anticorrupción" AND YEAR(FechaEjecucion) = 2016;
NumTEmpleadosAJornadaCompleta	//Valor directo anual
-SELECT `NumTEmpleadosAJornadaCompleta` FROM `DatosGeneralesAnualSeccC` WHERE YEAR(`FechaSistema`) = 2017;
NumTEmpleadosAJornadaParcial	//Valor directo anual
-SELECT `NumTEmpleadosAJornadaParcial` FROM `DatosGeneralesAnualSeccC` WHERE YEAR(`FechaSistema`) = 2017;
NumTHorasExtrasTrabajadas	//Valor directo anual
-SELECT `NumTHorasExtrasTrabajadas` FROM `DatosGeneralesAnualSeccC` WHERE YEAR(`FechaSistema`) = 2017;
NumTHorasTrabajadas 	//Valor directo anual
-SELECT `NumTHorasTrabajadas` FROM `DatosGeneralesAnualSeccA` WHERE YEAR(`FechaSistema`) = 2017;
NumTHorasSuplementariasTrabajadas	//Valor directo anual
-SELECT `NumTHorasSuplementariasTrabajadas` FROM `DatosGeneralesAnualSeccC` WHERE YEAR(`FechaSistema`) = 2017;
NumTDiasDescansoForzosoLaborados	//Valor directo anual
-SELECT `NumTDiasDescansoForzosoLaborados` FROM `DatosGeneralesAnualSeccA` WHERE YEAR(`FechaSistema`) = 2017;
NumTOficinasCumplePresupuesto
SELECT COUNT(idSucursal) FROM SucursalEmpresa WHERE CumplePresupuesto = "Si Cumple" AND YEAR(FechaMes) = 2016;
NumTOficinas
SELECT COUNT(idSucursal) FROM SucursalEmpresa;
NumTPuntosEnComunidadesSinOtrasInstitucionesFinancieras //Valor directo anual
-SELECT `NumTPuntosEnComunidadesSinOtrasInstitucionesFinancieras` FROM `DatosGeneralesAnualSeccB` WHERE YEAR(`FechaSistema`) = 2017;
NumTPuntosDeAtencion	//Valor directo anual
-SELECT `NumTPuntosDeAtencion` FROM `DatosGeneralesAnualSeccB` WHERE YEAR(`FechaSistema`) = 2017;
NumTPuntosDeAtencionConAccesoADiscapacitados	//Valor directo anual
-SELECT `NumTPuntosDeAtencionConAccesoADiscapacitados` FROM `DatosGeneralesAnualSeccB` WHERE YEAR(`FechaSistema`) = 2017;
NumTFormasDeAtencionEnComunidadesRurales	
NumTFormasDeAtencion
-SELECT COUNT(IdFormaAtencion) FROM FormasDeAtencion;
NumTSociosCapacitadosEnEducacionFinnciera
-SELECT SUM(NumeroAsistentes) FROM CapacitacionSocios WHERE TipoCapacitacionSocios = "Educación Financiera" AND EstadoCapacitacion = "Ejecutada" AND YEAR(FechaEjecucion) = 2016;
NumTEmpleadosCapacitadosEnEducacionFinanciera
-SELECT SUM(ParticipantesCapacitados) FROM CapacitacionEmpleados WHERE TipoCapacitacion = "Educación Financiera" AND EstadoCapacitacion = "Ejecutada" AND YEAR(FechaEjecucion) = 2016;
NumTEmpleadosCapacitadosEnEducacionFinancieraEsperados
-SELECT SUM(ParticipantesEsperados) FROM CapacitacionEmpleados WHERE TipoCapacitacion = "Educación Financiera" AND EstadoCapacitacion = "Ejecutada" AND YEAR(FechaEjecucion) = 2016;
NumTParticipacionesLobbying	//Valor directo anual
-SELECT `NumTParticipacionesLobbying` FROM `DatosGeneralesAnualSeccB` WHERE YEAR(`FechaSistema`) = 2017;
NivelAprobacionActualizacionDePoliticas
-SELECT Calificacion FROM PoliticasAprobacionCredito WHERE IdAprobacionCredito  = 2; //Id es el parámetro
NumTEmpleadosPeriodoAnioAnterior
NumTEmpleadosIncorporados
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE YEAR(FIngresoContratoEmpleado) = 2016 AND YEAR(FSalidaEmpleado) > 2016;
NumTEmpleadosReincorporados
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE FReincorporacion IS NOT NULL AND YEAR(FReincorporacion) = 2016 AND YEAR(FFinReincorporacion) > 2016;
NumTEmpleadosDespedidos
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE EstadoLaboralEmpleado = "Despedido" AND YEAR(FSalidaEmpleado) = 2016;
NumTEmpleadosRenuncian
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE EstadoLaboralEmpleado = "Renuncia" AND YEAR(FSalidaEmpleado) = 2016;
NumTEmpleadosContratoMismoAnio
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE YEAR(FIngresoContratoEmpleado) = 2016 AND YEAR(FSalidaEmpleado) = 2016;
NumTEmpleadosContratoConcluido
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE EstadoLaboralEmpleado = "Contrato Concluido" AND YEAR(FSalidaEmpleado) = 2016;
NumTEmpleadosHRegionCosta
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE EstadoLaboralEmpleado = "Activo" AND SexoEmpleado = "M" AND RegionEmpleado = "Costa";
NumTEmpleadosHRegionSierra
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE EstadoLaboralEmpleado = "Activo" AND SexoEmpleado = "M" AND RegionEmpleado = "Sierra";
NumTEmpleadosHRegionOriente
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE EstadoLaboralEmpleado = "Activo" AND SexoEmpleado = "M" AND RegionEmpleado = "Oriente";
NumTEmpleadosHRegionInsular
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE EstadoLaboralEmpleado = "Activo" AND SexoEmpleado = "M" AND RegionEmpleado = "Insular";
NumTEmpleadosMRegionCosta
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE EstadoLaboralEmpleado = "Activo" AND SexoEmpleado = "F" AND RegionEmpleado = "Costa";
NumTEmpleadosMRegionSierra
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE EstadoLaboralEmpleado = "Activo" AND SexoEmpleado = "F" AND RegionEmpleado = "Sierra";
NumTEmpleadosMRegionOriente
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE EstadoLaboralEmpleado = "Activo" AND SexoEmpleado = "F" AND RegionEmpleado = "Oriente";
NumTEmpleadosMRegionInsular
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE EstadoLaboralEmpleado = "Activo" AND SexoEmpleado = "F" AND RegionEmpleado = "Insular";
NumTEmpleadosHContratados
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE SexoEmpleado = "M" AND YEAR(FIngresoContratoEmpleado) = 2016;
NumTEmpleadosHDespedidos
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE SexoEmpleado = "M" AND EstadoLaboralEmpleado = "Despedido" AND YEAR(FIngresoContratoEmpleado) = 2016;
NumTEmpleadosHRenucian
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE SexoEmpleado = "M" AND EstadoLaboralEmpleado = "Renuncia" AND YEAR(FIngresoContratoEmpleado) = 2016;
NumTEmpleadosHAnioAnterior	//valor directo base
NumTEmpleadosHFinPeriodo
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE SexoEmpleado = "M" AND EstadoLaboralEmpleado = "Activo" AND YEAR(FIngresoContratoEmpleado) = 2016;
NumTEmpleadosMContratados
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE SexoEmpleado = "F" AND YEAR(FIngresoContratoEmpleado) = 2016;
NumTEmpleadosMDespedidos
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE SexoEmpleado = "F" AND EstadoLaboralEmpleado = "Despedido" AND YEAR(FIngresoContratoEmpleado) = 2016;
NumTEmpleadosMRenucian
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE SexoEmpleado = "F" AND EstadoLaboralEmpleado = "Renuncia" AND YEAR(FIngresoContratoEmpleado) = 2016;
NumTEmpleadosMAnioAnterior	//valor directo base
NumTEmpleadosMFinPeriodo
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE SexoEmpleado = "F" AND EstadoLaboralEmpleado = "Activo" AND YEAR(FIngresoContratoEmpleado) = 2016;
NumTEmpleadosJubilados
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE EstadoLaboralEmpleado = "Jubilado" AND YEAR(FSalidaEmpleado) = 2016;
NumTPracticantes
SELECT COUNT(idPracticante) FROM Practicantes WHERE YEAR(FInicioPracticas) = 2016;
NumTHorasDesarrolloProfesionalEmpleado
-SELECT SUM(HorasMes) FROM Empleado_DesarrolloProfesional WHERE YEAR(FechaPertenece) = 2016;
NumTEmpleadosHDesarrolloProfesional
-SELECT COUNT(EDP.CiEmpleado) FROM Empleado_DesarrolloProfesional EDP, Empleado E WHERE YEAR(FechaPertenece) = 2016 AND E.SexoEmpleado = "M" AND EDP.CiEmpleado = E.CedulaEmpleado;
NumTEmpleadosMDesarrolloProfesional
-SELECT COUNT(EDP.CiEmpleado) FROM Empleado_DesarrolloProfesional EDP, Empleado E WHERE YEAR(FechaPertenece) = 2016 AND E.SexoEmpleado = "F" AND EDP.CiEmpleado = E.CedulaEmpleado;
NumTEmpleadosEvaluadosDesempenioProfesional //valor directo anual
NumTHorasCapacitarseEmpleadoDerechosHumanos
-SELECT SUM(HorasEjecutadas) FROM CapacitacionEmpleados WHERE TipoCapacitacion = "Derechos Humanos" AND EstadoCapacitacion = "Ejecutada" AND YEAR(FechaEjecucion) = 2016;
NumTHorasCapacitarseEmpleadoDerechosHumanosPlanificadas
-SELECT SUM(HorasPlanificadas) FROM CapacitacionEmpleados WHERE TipoCapacitacion = "Derechos Humanos" AND EstadoCapacitacion = "Ejecutada" OR EstadoCapacitacion = "Planificada" AND YEAR(FechaEjecucion) = 2016;
NumTPracticantesRequeridos	//valor directo anual
NumTPracticantesContratados
-SELECT COUNT(idPracticante) FROM Practicantes WHERE ContratadoDespuesDePracticas = "SI" AND YEAR(FFinPracticas) = 2016;
NumTPracticantesConConvenios
-SELECT COUNT(idPracticante) FROM Practicantes WHERE TipoConvenio != "Ninguno" AND YEAR(FInicioPracticas) = 2016;
AVGHorasDiaPracticantes
SELECT CAST(AVG(CantidadHorasPorDia) as signed integer) FROM Practicantes WHERE TipoConvenio != "Ninguno" AND YEAR(FInicioPracticas) = 2016;
NumTHorasLaboradasPorDiaEmpleados	//Valor a pregutar si es directo
NumTEmpleadosPerteneceASindicato
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE PerteneceSindicato IS NOT NULL;
NumTEmpleadosNoPerteneceAConsejo
-SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE PerteneceSindicato IS NULL;
NumTAsuntosAcordadosNoRespetadosPorDirectivos	//valor directo anual
-SELECT `NumTAsuntosAcordadosNoRespetadosPorDirectivos` FROM `DatosGeneralesAnualSeccB` WHERE YEAR(`FechaSistema`) = 2017;
NumTAsuntosAcordadosEnConveniosSindicales	//valor directo anual
-SELECT `NumTAsuntosAcordadosEnConveniosSindicales` FROM `DatosGeneralesAnualSeccB` WHERE YEAR(`FechaSistema`) = 2017;
NumTAsuntosAcordadosNoRespetadosPorEmpleados	//valor directo anual
-SELECT `NumTAsuntosAcordadosNoRespetadosPorEmpleados` FROM `DatosGeneralesAnualSeccB` WHERE YEAR(`FechaSistema`) = 2017;
NumTSesionesDeSindicatosConDirectivos
SELECT COUNT(IdReuniones) FROM SesionesConsejos WHERE TipoSesion = "Sindicatos con Directivos" AND EstadoReunion = "Ejecutada" AND YEAR(FechaEjecucion) = 2016;
NumTSesionesDeSindicatosConDirectivosPlanificada
-SELECT COUNT(IdReuniones) FROM SesionesConsejos WHERE TipoSesion = "Sindicatos con Directivos" AND EstadoReunion = "Ejecutada" OR EstadoReunion = "Planificada" AND YEAR(FechaEjecucion) = 2016;
ValorTActivosAnioAnterior 	//valor directo anual
ValorTPasivos 	//valor directo anual
-SELECT `ValorTPasivos` FROM `DatosGeneralesAnualSeccE` WHERE YEAR(`FechaSistema`) = 2017;
ValorTPasivosAnioAnterior 	//valor directo anual
ValorTPatrimonio 	//valor directo anual
-SELECT `ValorTPatrimonio` FROM `DatosGeneralesAnualSeccE` WHERE YEAR(`FechaSistema`) = 2017;
ValorTPatrimonioAnioAnterior 	//valor directo anual
ValorTCapitalSocial 	//valor directo anual
ValorTAportacionesCapitalSocial 	//valor directo anual
-SELECT `ValorTCapitalSocial` FROM `DatosGeneralesAnualSeccE` WHERE YEAR(`FechaSistema`) = 2017;
ValorTCapitalSocialAnioAterior 	//valor directo anual
-SELECT `ValorTCapitalSocialAnioAterior` FROM `DatosGeneralesAnualSeccE` WHERE YEAR(`FechaSistema`) = 2017;
ValorTAportaciones 	//valor directo anual
-SELECT `ValorTAportaciones` FROM `DatosGeneralesAnualSeccE` WHERE YEAR(`FechaSistema`) = 2017;
ValorTPatrimonioTecnicoConstituido 	//valor directo anual
-SELECT `ValorTPatrimonioTecnicoConstituido` FROM `DatosGeneralesAnualSeccE` WHERE YEAR(`FechaSistema`) = 2017;
ValorTPatrimonioTecnicoRequerido 	//valor directo anual
-SELECT `ValorTPatrimonioTecnicoRequerido` FROM `DatosGeneralesAnualSeccE` WHERE YEAR(`FechaSistema`) = 2017;
UtilidadTEjercicio 	//valor directo anual
-SELECT `UtilidadTEjercicio` FROM `DatosGeneralesAnualSeccE` WHERE YEAR(`FechaSistema`) = 2017;
UtilidadTEjercicioAnioAnterior 	//valor directo anual
ValorTReservaLegal 	//valor directo anual
-SELECT `ValorTReservaLegal` FROM `DatosGeneralesAnualSeccE` WHERE YEAR(`FechaSistema`) = 2017;
ValorTReservaLegalAnioAnterior 	//valor directo anual
ValorTReserva 		//valor directo anual
-SELECT `ValorTReserva` FROM `DatosGeneralesAnualSeccE` WHERE YEAR(`FechaSistema`) = 2017;
ValorTAdquisicionesDeFormaColectiva 	//valor directo anual
ValorTAdquisicionesDeFormaNoColectiva 	//valor directo anual
ValorTIngresosOperacionales 	//valor directo anual
-SELECT `ValorTIngresosOperacionales` FROM `DatosGeneralesAnualSeccD` WHERE YEAR(`FechaSistema`) = 2017;
ValorTIngresos 	//valor directo anual
-SELECT `ValorTIngresos` FROM `DatosGeneralesAnualSeccD` WHERE YEAR(`FechaSistema`) = 2017;
ValorTIngresosPorVentaDeActivosFijos 	//valor directo anual
-SELECT `ValorTIngresosPorVentaDeActivosFijos` FROM `DatosGeneralesAnualSeccD` WHERE YEAR(`FechaSistema`) = 2017;
ValorTVentas 	//valor directo anual
-SELECT `ValorTVentas` FROM `DatosGeneralesAnualSeccD` WHERE YEAR(`FechaSistema`) = 2017;
ValorTVentasAnioAnterior 	//valor directo anual
ValorTIngresosPorIntereses 	//valor directo anual
-SELECT `ValorTIngresosPorIntereses` FROM `DatosGeneralesAnualSeccD` WHERE YEAR(`FechaSistema`) = 2017;
ValorTIngresosGenerados 	//valor directo anual
ValorTVentasAContado 	//valor directo anual
-SELECT `ValorTVentasAContado` FROM `DatosGeneralesAnualSeccD` WHERE YEAR(`FechaSistema`) = 2017;
ValorTMargenFinanciero 	//valor directo anual
-SELECT `ValorTMargenFinanciero` FROM `DatosGeneralesAnualSeccD` WHERE YEAR(`FechaSistema`) = 2017;
ValorTGastosOperacionales 	//valor directo anual
-SELECT `ValorTGastosOperacionales` FROM `DatosGeneralesAnualSeccD` WHERE YEAR(`FechaSistema`) = 2017;
NumTCapacitacionesEjecutadasPorCOAC
-SELECT * FROM CapacitacionEmpleados WHERE TipoCapacitacion = "Realizada por COAC" AND EstadoCapacitacion = "Ejecutada"
ValorTSalarioEmpleadosM
-SELECT AVG(SalarioEmpleado) FROM Empleado WHERE EstadoLaboralEmpleado = "Activo" AND SexoEmpleado = "F";
ValorTGastoEnRemuneracion	//valor directo anual
ValorTSalarioEmpleadosH
-SELECT AVG(SalarioEmpleado) FROM Empleado WHERE EstadoLaboralEmpleado = "Activo" AND SexoEmpleado = "M";
ValorTSalarioEmpleadosHCargoOperativo
-SELECT AVG(SalarioEmpleado) FROM Empleado WHERE EstadoLaboralEmpleado = "Activo" AND SexoEmpleado = "M" AND CargoEstructural = "Operativo";
ValorTSalarioEmpleadosMCargoOperativo
-SELECT AVG(SalarioEmpleado) FROM Empleado WHERE EstadoLaboralEmpleado = "Activo" AND SexoEmpleado = "F" AND CargoEstructural = "Operativo";
ValorTSalarioEmpleadosHCargoDirectivo
-SELECT AVG(SalarioEmpleado) FROM Empleado WHERE EstadoLaboralEmpleado = "Activo" AND SexoEmpleado = "M" AND CargoEstructural = "Directivo";
ValorTSalarioEmpleadosMCargoDirectivo
-SELECT AVG(SalarioEmpleado) FROM Empleado WHERE EstadoLaboralEmpleado = "Activo" AND SexoEmpleado = "F" AND CargoEstructural = "Directivo";
ValorTSalarioEmpleadosHCargoGerencial
-SELECT AVG(SalarioEmpleado) FROM Empleado WHERE EstadoLaboralEmpleado = "Activo" AND SexoEmpleado = "M" AND CargoEstructural = "Gerecial";
ValorTSalarioEmpleadosMCargoGerencial
-SELECT AVG(SalarioEmpleado) FROM Empleado WHERE EstadoLaboralEmpleado = "Activo" AND SexoEmpleado = "F" AND CargoEstructural = "Gerecial";
ValorTSalarioEmpleadosHDiscapacitados
-SELECT AVG(SalarioEmpleado) FROM Empleado WHERE EstadoLaboralEmpleado = "Activo" AND SexoEmpleado = "M" AND DiscapacidadEmpleado = "SI";
ValorTSalarioEmpleadosMDiscapacitados
SELECT AVG(SalarioEmpleado) FROM Empleado WHERE EstadoLaboralEmpleado = "Activo" AND SexoEmpleado = "F" AND DiscapacidadEmpleado = "SI";
ValorSalarioMasAlto
-SELECT MAX(SalarioEmpleado) FROM Empleado WHERE EstadoLaboralEmpleado = "Activo";
ValorSalarioMasBajo
-SELECT MIN(SalarioEmpleado) FROM Empleado WHERE EstadoLaboralEmpleado = "Activo";
ValorTDonacionesEnEspecie
-SELECT SUM(MontoDonacion) FROM Donaciones WHERE TipoDonacion = "Especies" AND YEAR(FechaMes) = 2016;
ValorTDonaciones
-SELECT SUM(MontoDonacion) FROM Donaciones WHERE YEAR(FechaMes) = 2016;
ValorTGastosOperacionalesAnioAnterior //valor directo base
ValorTGastosNoOperacionales 	//valor directo anual
-SELECT `ValorTGastosNoOperacionales` FROM `DatosGeneralesAnualSeccD` WHERE YEAR(`FechaSistema`) = 2017;
ValorTGastosNoOperacionalesAnioAnterior	//valor directo base
ValorTSueldosYSalarios 
-SELECT `ValorTSueldosYSalarios` FROM `DatosGeneralesAnualSeccD` WHERE YEAR(`FechaSistema`) = 2017;
NivelIportanciaAuditoriaInterna //parámetro va el id de la respuesta
SELECT Valor FROM ImportanciaAuditoriaInternaSobreBalanceSocial WHERE IdImportancia = 1; 
ValorTEconomicoDistribuido
SELECT SUM(Saldo) FROM DistribucionValorEconomico WHERE `TipoDuistribucion` = "Distribuido" AND YEAR(FechaSistema) = 2016;
ValorTEconomicoGenderado
SELECT SUM(Saldo) FROM DistribucionValorEconomico WHERE `TipoDuistribucion` = "Generado" AND YEAR(FechaSistema) = 2016;
MontoTCreditoConsumoSocios 	//valor directo anual
-SELECT `MontoTCreditoConsumoSocios` FROM `DatosGeneralesAnualSeccD` WHERE YEAR(`FechaSistema`) = 2017;
MontoTCreditos 	//valor directo anual
-SELECT `MontoTCreditos` FROM `DatosGeneralesAnualSeccD` WHERE YEAR(`FechaSistema`) = 2017;
MontoTCreditoViviendaSocios 	//valor directo anual
-SELECT `MontoTCreditoViviendaSocios` FROM `DatosGeneralesAnualSeccD` WHERE YEAR(`FechaSistema`) = 2017;
MontoTCreditoMicrocreditoSocios 	//valor directo anual
-SELECT `MontoTCreditoMicrocreditoSocios` FROM `DatosGeneralesAnualSeccD` WHERE YEAR(`FechaSistema`) = 2017;
MontoTCreditoComercialSocios 	//valor directo anual
-SELECT `MontoTCreditoComercialSocios` FROM `DatosGeneralesAnualSeccD` WHERE YEAR(`FechaSistema`) = 2017;
MontoTCreditoInmobiliarioSocios 	//valor directo anual
-SELECT `MontoTCreditoInmobiliarioSocios` FROM `DatosGeneralesAnualSeccD` WHERE YEAR(`FechaSistema`) = 2017;
NumTCreditosVigentesAMujeres 	//valor directo anual
-SELECT `NumTCreditosVigentesAMujeres` FROM `DatosGeneralesAnualSeccB` WHERE YEAR(`FechaSistema`) = 2017;
NumTOperacionesDeCreditoVigentes 	//valor directo anual
-SELECT `NumTOperacionesDeCreditoVigentes` FROM `DatosGeneralesAnualSeccB` WHERE YEAR(`FechaSistema`) = 2017;
ValorTCarteraCreditoMujeres	//valor directo anual
-SELECT `ValorTCarteraCreditoMujeres` FROM `DatosGeneralesAnualSeccB` WHERE YEAR(`FechaSistema`) = 2017;
ValorTCarteraCredito 	//valor directo anual
-SELECT `ValorTCarteraCredito` FROM `DatosGeneralesAnualSeccD` WHERE YEAR(`FechaSistema`) = 2017;
NumTOperacionesDeCreditosConMontoMenorA30PorcientoPIB 	//valor directo anual
-SELECT `NumTOperacionesDeCreditosConMontoMenorA30PorcientoPIB` FROM `DatosGeneralesAnualSeccB` WHERE YEAR(`FechaSistema`) = 2017;
NumTOperacionesCreditoConCuotasVigentesMenosA1PorcientoPIB 	//valor directo anual
-SELECT `NumTOperacionesCreditoConCuotasVigentesMenosA1PorcientoPIB` FROM `DatosGeneralesAnualSeccB` WHERE YEAR(`FechaSistema`) = 2017;
TasaPasivaCaptacionDelPublicoPonderada //valor directo anual
InflacionAnualizada //valor directo anual
-SELECT `InflacionAnualizada` FROM `DatosGeneralesAnualSeccA` WHERE YEAR(`FechaSistema`) = 2017;
TEAMaximaCooperativa //valor directo anual
-SELECT `TEAMaximaCooperativa` FROM `DatosGeneralesAnualSeccA` WHERE YEAR(`FechaSistema`) = 2017;
TEAMaximaBCE //valor directo anual
-SELECT `TEAMaximaBCE` FROM `DatosGeneralesAnualSeccA` WHERE YEAR(`FechaSistema`) = 2017;
NumTSegmentosCreditoCumpleConPOA
-SELECT COUNT(IdSegmentosCredito) FROM SegmentosDeCredito WHERE Cumplimiento = "Si Cumple" AND YEAR(FechaMes) = 2016;
NumTSegmentosCredito
-SELECT COUNT(IdSegmentosCredito) FROM SegmentosDeCredito WHERE YEAR(FechaMes) = 2016;
ValorTCarteraCreditoAnioAnterior 	//valor directo base
SaldoTCarteraCreditoParaNecesidadSocial //valor directo anual
-SELECT `SaldoTCarteraCreditoParaNecesidadSocial` FROM `DatosGeneralesAnualSeccD` WHERE YEAR(`FechaSistema`) = 2017;
SaldoTCarteraCreditoParaNecesidadProductiva	//valor directo anual
-SELECT `SaldoTCarteraCreditoParaNecesidadProductiva` FROM `DatosGeneralesAnualSeccD` WHERE YEAR(`FechaSistema`) = 2017;
ValorTCarteraVencida 	//valor directo anual
-SELECT `ValorTCarteraVencida` FROM `DatosGeneralesAnualSeccD` WHERE YEAR(`FechaSistema`) = 2017;
ValorTCarteraTotal //preguntar si es la misma de ValorTCarteraCredito
MontoPromedioCreditoANivelConsolidado
-SELECT AVG(MontoColocado) FROM PromedioSegmentosCreditos WHERE TipoSegmentoCredito = "Concedidos a Nivel Consolidado" AND YEAR(FechaMes) = 2016;
MontoPromedioCreditoANivelConsolidadoAnioAnterior	//valor directo base
MontoPromedioCreditoConcedidoPrimeraVez
-SELECT AVG(MontoColocado) FROM PromedioSegmentosCreditos WHERE TipoSegmentoCredito = "Concedidos por Primera Vez" AND YEAR(FechaMes) = 2016;
MontoPromedioCreditoConcedidoPrimeraVezAnioANterior //valor directo base
MontoPromedioCreditoConcedidoAMujeres
-SELECT AVG(MontoColocado) FROM PromedioSegmentosCreditos WHERE TipoSegmentoCredito = "Concedidos a Mujeres" AND YEAR(FechaMes) = 2016;
MontoPromedioCreditoConcedidoAMujeresAnioAnterior	//valor directo base
VentasACredito //294
-SELECT `VentasACreditos` FROM `DatosGeneralesAnualSeccD` WHERE YEAR(`FechaSistema`) = 2017;
PromedioCuentasPorCobrar //294 preguntar por la tabla y el dato que parece que es directo
-SELECT `PromedioCuentasPorCobrar` FROM `DatosGeneralesAnualSeccA` WHERE YEAR(`FechaSistema`) = 2017;
ValorTEndeudamientoExterno
-SELECT `ValorTEndeudamientoExterno` FROM `DatosGeneralesAnualSeccD` WHERE YEAR(`FechaSistema`) = 2017;
ValorTActivosCorriente	//valor directo anual
-SELECT `ValorTActivosCorriente` FROM `DatosGeneralesAnualSeccE` WHERE YEAR(`FechaSistema`) = 2017;
ValorTPasivosCorriente	//valor directo anual
-SELECT `ValorTPasivosCorriente` FROM `DatosGeneralesAnualSeccE` WHERE YEAR(`FechaSistema`) = 2017;
NumTproveedoresPYMES
-SELECT COUNT(IdProveedor) FROM Proveedor WHERE TipoProveedor = "PYMES" AND EstadoProveedor = "Activo";
NumTCertificacionesObtenidasGestionCalidad
-SELECT COUNT(idCertificacion) FROM Certificaciones WHERE ObtenidoCertificacion = "SI" AND TipoCertificacion = "Gestión de la Calidad" AND YEAR(FechaObtencionCertificacion) = 2016;
NumTCertificacionesRequeridasEnElPOA	//valor directo anual
---// 300 preguntar por Numero de proveedores  que trabajan con la organización
NumTProveedoresTrabajanOrganizacion
-SELECT `NumTProveedoresTrabajanOrganizacion` FROM `DatosGeneralesAnualSeccA` WHERE YEAR(`FechaSistema`) = 2017;
---//Los proveedores cotinuuos, trbajan bien seguido
NumTProveedoresEvaluadosAmbientalmente
-SELECT COUNT(IdProveedor) FROM Proveedor WHERE TipoEvaluacion = "Ambiental" AND EstadoProveedor = "Activo";
NumTProveedoresEvaluados
-SELECT COUNT(IdProveedor) FROM Proveedor WHERE TipoEvaluacion != "Ninguno" AND EstadoProveedor = "Activo";
NumTProveedoresEvaluadosEnPracticasLaborales
-SELECT COUNT(IdProveedor) FROM Proveedor WHERE TipoEvaluacion = "Prácticas Laborales" AND EstadoProveedor = "Activo";
NumTPedidosEntregadosATiempo
-SELECT `NumTPedidosEntregadosATiempo` FROM `DatosGeneralesAnualSeccB` WHERE YEAR(`FechaSistema`) = 2017;
NumTPedidosEntregados
-SELECT `NumTPedidosEntregados` FROM `DatosGeneralesAnualSeccB` WHERE YEAR(`FechaSistema`) = 2017;
MontoTComprasAContado
-SELECT `MontoTComprasAContado` FROM `DatosGeneralesAnualSeccD` WHERE YEAR(`FechaSistema`) = 2017;
MontoTComprasACredito
-SELECT `MontoTComprasACredito` FROM `DatosGeneralesAnualSeccD` WHERE YEAR(`FechaSistema`) = 2017;
MontoTComprasAProveedoresLocales
-SELECT `MontoTComprasAProveedoresLocales` FROM `DatosGeneralesAnualSeccD` WHERE YEAR(`FechaSistema`) = 2017;
MontoTComprasAProveedores
MontoTComprasAProveedoresInternacionales
-SELECT `MontoTComprasAProveedoresInternacionales` FROM `DatosGeneralesAnualSeccD` WHERE YEAR(`FechaSistema`) = 2017;
MontoTComprasAAsociaciones
-SELECT `MontoTComprasAAsociaciones` FROM `DatosGeneralesAnualSeccD` WHERE YEAR(`FechaSistema`) = 2017;

MontoTCompras
**Sección F

NumTProductosYServiciosAdquiereLocalmente
-SELECT `NumTProductosYServiciosAdquiereLocalmente` FROM `DatosGeneralesAnualSeccD` WHERE YEAR(`FechaSistema`) = 2017;
PresupuestoAdquisicionesDestinadasAProveedoresLocales
-SELECT `PresupuestoAdquisicionesDestinadasAProveedoresLocales` FROM `DatosGeneralesAnualSeccD` WHERE YEAR(`FechaSistema`) = 2017;
ValorTPresupuestoAdquisicion
-SELECT `ValorTPresupuestoAdquisicion` FROM `DatosGeneralesAnualSeccD` WHERE YEAR(`FechaSistema`) = 2017;
NumTProductosDefectuososRechazados
-SELECT `NumTProductosDefectuososRechazados` FROM `DatosGeneralesAnualSeccC` WHERE YEAR(`FechaSistema`) = 2017;
NumTProductosRecibidos
-SELECT `NumTProductosRecibidos` FROM `DatosGeneralesAnualSeccC` WHERE YEAR(`FechaSistema`) = 2017;
NumTContratosConProveedoresLocales
-SELECT COUNT(PC.IdContrato) FROM Proveedor P, ProveedorContrato PC WHERE P.AlcanceProveedor = "Local" AND P.idProveedor = PC.IdProveedor;
NumTContratosConProveedores
-SELECT COUNT(IdContrato) FROM ProveedorContrato;
// 314 preguntar por asociaiones
NumTContratosConAsociaciones
-SELECT COUNT(PC.IdContrato) FROM Proveedor P, ProveedorContrato PC WHERE P.TipoProveedor = "Asociación" AND P.idProveedor = PC.IdProveedor; 
NumTContratosConProveedoresInternacionales
-SELECT COUNT(PC.IdContrato) FROM Proveedor P, ProveedorContrato PC WHERE P.AlcanceProveedor = "Internacional" AND P.idProveedor = PC.IdProveedor;
ValorTSancionesPorOrganismosDeControl 	//valor directo anual
-SELECT `ValorTSancionesPorOrganismosDeControl` FROM `DatosGeneralesAnualSeccD` WHERE YEAR(`FechaSistema`) = 2017;
NumTSancionesMonetarias		//valor directo anual
-SELECT `NumTSancionesMonetarias` FROM `DatosGeneralesAnualSeccC` WHERE YEAR(`FechaSistema`) = 2017;
ValorTPagadoPorIVA 	//valor directo anual
-SELECT `ValorTPagadoPorIVA` FROM `DatosGeneralesAnualSeccD` WHERE YEAR(`FechaSistema`) = 2017;
ValorTContribucionesAlEstado 	//valor directo anual
-SELECT `ValorTContribucionesAlEstado` FROM `DatosGeneralesAnualSeccD` WHERE YEAR(`FechaSistema`) = 2017;
ValorTPagadoPorRetenciones 	//valor directo anual
-SELECT `ValorTPagadoPorRetenciones` FROM `DatosGeneralesAnualSeccD` WHERE YEAR(`FechaSistema`) = 2017;
ValorTPagadoPorImpuestoALaRenta 	//valor directo anual
-SELECT `ValorTPagadoPorImpuestoALaRenta` FROM `DatosGeneralesAnualSeccD` WHERE YEAR(`FechaSistema`) = 2017;
ValorTSubvencionesGubernamentales 	//valor directo anual
-SELECT `ValorTSubvencionesGubernamentales` FROM `DatosGeneralesAnualSeccD` WHERE YEAR(`FechaSistema`) = 2017;
ValorTDonacionesEnEfectivo
-SELECT SUM(MontoDonacion) FROM Donaciones WHERE TipoDonacion = "Efectivo" AND YEAR(FechaMes) = 2016;
ValorTAtribuidoAlEstadoPorOrganismosDeControl	//valor directo anual
-SELECT `ValorTAtribuidoAlEstadoPorOrganismosDeControl` FROM `DatosGeneralesAnualSeccE` WHERE YEAR(`FechaSistema`) = 2017;
ValorTCaptacionProcedenteCOAC
-SELECT `ValorTCaptacionProcedenteCOAC` FROM `DatosGeneralesAnualSeccD` WHERE YEAR(`FechaSistema`) = 2017;
ValorTCaptaciones
-SELECT `ValorTCaptaciones` FROM `DatosGeneralesAnualSeccD` WHERE YEAR(`FechaSistema`) = 2017;






__________________Aumentados___________________
NumTEmpleadosGeneradosParaSocios
-SELECT `NumTEmpleadosGeneradosParaSocios` FROM `DatosGeneralesAnualSeccA` WHERE YEAR(`FechaSistema`) = 2017;
NumTPoliticasDeCotratacionDePersonal
-SELECT `NumTPoliticasDeCotratacionDePersonal` FROM `DatosGeneralesAnualSeccA` WHERE YEAR(`FechaSistema`) = 2017;
NumTContratosEnFuncionDeCV
-SELECT `NumTContratosEnFuncionDeCV` FROM `DatosGeneralesAnualSeccA` WHERE YEAR(`FechaSistema`) = 2017;
NumtSociosEnProgramaDeSeguroExequial
-SELECT `NumtSociosEnProgramaDeSeguroExequial` FROM `DatosGeneralesAnualSeccA` WHERE YEAR(`FechaSistema`) = 2017;
NumTSociosAportanAlFondoDeCesantia 
-SELECT `NumTSociosAportanAlFondoDeCesantia` FROM `DatosGeneralesAnualSeccA` WHERE YEAR(`FechaSistema`) = 2017;
NumTSociosYEmpleados
-Seleccionar y sumar de la tabla Empleados y Socios
NumTSociosAportanAlFondoMortuorio
-SELECT `NumTSociosAportanAlFondoMortuorio` FROM `DatosGeneralesAnualSeccA` WHERE YEAR(`FechaSistema`) = 2017;
NumTSociosAportanAlFondoDeEmpleadosOCooperativa
-SELECT `NumTSociosAportanAlFondoDeEmpleadosOCooperativa` FROM `DatosGeneralesAnualSeccA` WHERE YEAR(`FechaSistema`) = 2017;
NumTSociosAportanAlFondoDeAccidenteOCalamidades
-SELECT `NumTSociosAportanAlFondoDeAccidenteOCalamidades` FROM `DatosGeneralesAnualSeccA` WHERE YEAR(`FechaSistema`) = 2017;

ValorCreditoASociosConDepositoMenorA20Porciento
-Sección F
ValorCreditoASociosConAporteMenorALaMedia
-Sección F
ValorCreditoASociosConMinCapitalExigido
-Sección F
MontoPromedioCreditoConsumoConcedidoPrimeraVez
-Sección F
MontoPromedioCreditoConsumoConcedidoPrimeraVezAnioAnterior
-Sección F
MontoPromedioCreditoViviendaConcedidoPrimeraVez
-Sección F
MontoPromedioCreditoViviendaConcedidoPrimeraVezAnioAnterior
-Sección F
MontoPromedioMicrocreditoASociosNuevosPrimeraVez
-Sección F
MontoPromedioMicrocreditoASociosNuevosPrimeraVezAnioANterior
-Sección F
MontoPromedioCreditoComercioASociosNuevosPrimeraVez
-Sección F
MontoPromedioCreditoComercioASociosNuevosPrimeraVezAnioAnterior
-Sección F
MontoPromedioCreditosVinculados
-Sección F
MontoPromedioCreditosVinculadosAnioAnterior
-Sección F
Valor total de los aportes ingresados en el periodo
ValorTAportesIngresados //Para el final

MontoCertificadosAportacionPoseidosPorSocioMayoritario
-Sección F
ValorTPorCertificadosDeAportacion
-Sección F
MontoCertificadosAportacionPoseidosPorSocioMinorista
-Sección F
TasaMediaInteresSobreCertificadosDeAportacion
-Sección F
ValorAgregadoCooperativoDistribuidoATrabajadores
-Sección F
ValorTBeneficiosDeLey
-Sección F
ValorPrestacionesPersonales
-Sección F
ValorPrestacionesColectivas
-Sección F
GastoEnFormacionATrabajadores
-Sección F
ValorBecasAyudasServicios
-Sección F
ValorAgregadoCooperativoDistribuidoAComunidad
-Sección F
ValorImpuestoYTasaVarias
-Sección F
ValorDonacionFondoEducacion
-Sección F
ValorFondoDeSolidaridad
-Sección F
ValorDonativosAComunidad
-Sección F
ValorAgregadoCooperativoDistribuidoASocios
-Sección F
ValorExcedenteBruto
-Sección F
ValorImpuestosSobreExcedentes
-Sección F
ValorDotacionDeFondoEducacion
-Sección F
ValorFondoDeReservaIrrepartibles
-Sección F
ValorFondoDeReservaRepartibles
-Sección F
PrecioPagadoAAsociadosPorCompraDeMaterial
-Sección F
DescuentoRealizadoASociosEnVentasAProductores
-Sección F
GastosPorServiciosVoluntariosGratuitosASocios
-Sección F
ValorAgregadoCooperativoIncorporadoAPatrimonioComun
-Sección F
ValorDotacionFondoDeReservaIrrepartibles
-Sección F
ValorOtrasReservas
-Sección F
ValorComprasRealizadasAEntidadesReconocidasComoDeComercioJusto 
-Sección F
ValorVentasRealizadasAEntidadesReconocidasComoComercioJusto
-Sección F
ValorDepositosProcedenteDeEntidadesReconocidasComoComercioJusto
-Sección F
ValorCreditosOtorgadosAEntidadesReconocidasComoComercioJusto
-Sección F



S = I.ICResultado

V = Desde0		 W = Hasta0		 Y = Nota0
Z = Desde1		AA = Hasta1		AC = Nota1
AD = Desde2		AE = Hasta2		AG = Nota2
AH = Desde3		AI = Hasta3		AK = Nota3
AL = Desde4		AM = Hasta4		AO = Nota4
AP = Desde5		AQ = Hasta5		AS = Nota5






WHEN I.ICResultado = Desde0 THEN Nota0 WHEN I.ICResultado <= Hasta1 THEN Nota1 WHEN I.ICResultado <= Hasta2 THEN Nota2 WHEN I.ICResultado <= Hasta3 THEN Nota3 WHEN I.ICResultado <= Hasta4 THEN Nota4 WHEN I.ICResultado >= Desde5 THEN Nota5



WHEN I.ICResultado = Desde0  THEN Nota0 
WHEN I.ICResultado >= (Hasta5 + 0,0001) || I.ICResultado <= Hasta1 Then Nota1 
WHEN I.ICResultado <= Hasta2 THEN Nota2 
WHEN I.ICResultado <= Hasta3 THEN Nota3 
WHEN I.ICResultado <= Hasta4 THEN Nota4 
WHEN I.ICResultado <= Hasta5 THEN Nota5






}

 ?>