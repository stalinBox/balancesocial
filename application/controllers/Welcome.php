<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()	{
		print("Hola mundo con PHP");
		//$this->load->view('welcome_message');
	}

	//Variables de indicadores de la OSCUS
	NumTEmpleados	//Total de empleados	
		SELECT COUNT(CedulaEmpleado) FROM Empleado
	NumTEmpleadosMujeres	
		SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE SexoEmpleado = 'M'
	NumTEmpleadosHombres
		SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE SexoEmpleado = 'H'
	NumTEmpleadosDiscapacitados
		SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE DiscapacidadEmpleado = 'SI'
	//Tabla Capacitación (Modoficar y agregar la nueva tabla Capacitación)
	GastoTCapacitaciones	//Suma del Costo de cada capacitación
	CostoTPresupuestoParaCapacitacion
	//Tabla Grupos de Interés
	NumTSocios 		//Total de socios
		SELECT NumSocios FROM Socios //(Agregar campos CantSexoHombres
		, CantSexoMujeres, CantSexoOtro... ANALIZAR Y NORMALIZAR LA TABLA Grupos de Interés)
	NumTSociosActivos
	NumTSociosActivosMujeres
	NumTSociosConCuentaAhorros
	NumTSociosMenoresEdad
	((Depósitos a la vista + depósitos a plazo)/Total Activos)*100	Total ahorro voluntario 
	NumTSociosRetirados		//Socios retirados
	ValorCuotaIngreso 	
	SalarioMinimoMensual
	NumTSocioaParticipantesEnElecciones //Valor a ingresar
	NumTRepresentantesEmpadronados 	//Valor a ingresar
	//Tabla de Transacciones
	NumTTransacciones	//Valor a ingresar
	//Tabla Depósitos
	ValorTDepositos		//Valor a ingresar
		SELECT SaldoTotalDeposito FROM Depositos
	ValorTDiezMayoresDepositantes 	//Valor a ingresar
		SELECT Saldo10MayoresDepositantes FROM Depositos
	NumSocios50PorcientoDeDeposito
		SELECT NumSocios50PorcientoDeDeposito FROM Depositos
	NumTClientes(Socios)AnioAnterior 	//Valor a ingresar (Pensar en valor sueltos para organizarlos en una tabla)
	NumTClientes(Socios)Nuevos 	//Valor a ingresar (leer línea anterior)	
	//Tabla Mecanismos
	NumTMecanismosDeInformacionDeProductos
		SELECT COUNT(idComunicacion) FROM Comunicacion //Preguntar si es sólo la cantidad
	NumTCapanias
		SELECT COUNT(idCampaniasConcientizacion) FROM CampaniasConcientizacion
	NumTCapaniasVetadas
	//Tabla Atención GI
	NumTMedidasDeSatisfaccionDelCliente	//Preguntar de que dato necesita
	NumTMedidasDeSatisfaccionDeServiciosFinancieros //Preguntar de que dato necesita
	(Sumatoria de medidas de satisfacción de los servicios financieros /N° total unidades de medida de la satisfacción de servicios financieros) //Preguntar de donde salen los datos
	 (Número de iniciativas ejecutadas con organismos de la sociedad civil/N° de iniciatiplas planificadas con organismos de la sociedad civil //Preguntar que datos hay que obtener
	//NORMALIZAR Tabla Alianzas y Acuerdos (Obtener datos de Tabla Acuerdos)
	NumTAlianzasEjecutadasConOtrasCOAC
	NumTAlianzasPlanificadas
	NumTEventosEjecutadosConOtrasCOAC
	NumTEventosPlanificadosConOtrasCOAC
	NumTParticipacionesEnOrganismosDeIntegracionSectorial
	NumTConveniosConOtrasInstituciones
	NumTConveniosConGobiernosUOrganismosNacionales
	NumTBeneficiosNoFinancierosASocios
	//--Obtener de Discriminación, (Modificar tabla y crear OJO NORMALIZAR "Sociabilizar políticas")los mismos de la tabla
	NumTHorasDestinadasACapacitacionAntiCorrupcion
	NumTHorasDeCapacitacion //Preguntar si son las mismas horas de capacitación	a empleados (Modificar tabla)
	NumTProcesosDeCorrupccionIdentificados
	NumTProcesosDeCorrupccionAnalizados
	NumTMediadasTomadasAnteIncidentesDeCorrupccion
	NumTIncidentesDeCorrupccionOcurridos
	//--Obtener datos de materiales (NORMALIZAR GASTOS MES)
	GastoTAguaLuzTelfGasolinaPapel
		SELECT (SUM(GastosMesCosto) + SUM(GastosMesIva)) AS GastoTotalMes FROM GastosMesEmpresa
	//NORMALIZAR Materiales (OJO, ver con otras tablas )
	NumTProgramasDeReciclaje 

	//--NORMALIZAR Tabla Contratos (OJO, ver con tabla de Empleados el tipo de contrato)
	NumTEmpleadosConContratoIndefinido //Ver tabla empleados
	NumTEmpleadosNuevosFinAnio
		SELECT COUNT(CedulaEmpleado) AS EmpleadosNuevos FROM Empleado WHERE (SELECT DATE_FORMAT(FIngresoEmpleado," %Y ")) = $VariableAnio
	NumTEmpleadosDespedidosFinAnio
		SELECT COUNT(CedulaEmpleado) FROM Empleado WHERE EstadoLaboralempleado = 'Despedido'
	//--Obtener de Desarrollo Profesional (Modificar y crear la Tabla)
	NumTEmpleadosEvaluados
	//NORMALIZAR y crear Sindicatos (Detalle con Empleados)
	NumTEmpleadosCubiertosPorSindicatos
	-NumTEmpleados //Ya hay
	//--Obtener de rol histórico
	(Beneficios sociales adicionales que reciben los colaboradores con otro tipo de contrato o relación laboral/Beneficos sociales adicionales que reciben colaboradores con contrato indefinido)*100
	//-Obtener de accidentes
	NumTDiasPerdidosPorAccidenteEnfermedad
	NumTDiasLaborablesAnio
	//--Obtener de Consejos
	NumTMujeresRepresentanConsejoAdministracionVigilancia
	NumTRepresentanConsejoAdministracionVigilancia
	NumTRepresentantesAsistenAAsamblea
	NumTMiembrosOficinasSignificativas //Preguntar de donde obtengo el dato
	NumTMiembrosDeConsejo
	NumTMiembrosDeConsejoCapacitados
	NumTMiembrosDeConsejoACapacitar
	- NumTHorasDeCapacitacion //ya hay
	NumTHorasDeCapacitacionEfectuadas
	NumTHorasDeCapacitacionProgramadas
	GastoTCapacitacionConsejoAdministracionVigilancia
	ValorPresupuestoCapacitacioConsejoAdministracionVigilancia
	NumTMiembrosDeConsejoAsministracionVigilanciaFormadosAntiCorrupcion
	//--Ejecutivos
	NumTMiembrosHombresCargosMedioYGerencial
	NumTMiembrosCargosMedioYGerencial
	NumTMiembrosMujeresCargosMedioYGerencial
	NumTOficinasCumplenConPreuspuesto
	//-- Oficinas
	NumTOficinas
	NumTOfocinasEnComunidadesSinOtrasInstituciones
	NumTPuntosDeAccesoADiscapacitados
	//Preguntar por Total puntos de acceso
	NumTFormasDeAtencion
	NumTFormasDeAtencionEnComunidades
	NumTEmpleadosCapacitadosEnFormacionCooperativa
	NumTSocios(Colaboradores) //Preguntar si son empleados
	//--politicas
	NumTParticipacionDePoliticasYActividadesLobbying
	NivelAprobacionDePoliticas
	//-Cumplimiento de crédito, montos concedidos, créditos
	NumTSegmentosDeCreditoCumpleConPOA
	NumTSegmentosDeCredito
	MontoCreditoPorSegmentoANivelConsolidado
	MontoPromedioCreditoPorSegmentoANivelConsolidadoAnioAnterior
	MontoPromedioCreditoPorSegmentoConcedidoPrimeraVezAnioActual
	MontoPromedioCreditoPrimeraVezAnioAnterior
	MontoCreditoAMujeresPorSegementoDeCredito
	MontoCreditoAMujeresPorSegementoDeCreditoAnioAnterior
	NumTCreditosVigentesOtorgadosAMujeres
	NumTOperacionesCreditosVigentes // qué operaciones??
	ValorTCarteraCreditoMujeres
	ValorTCarteraCredito 
	(N° de operaciónes de créditos con montos <=al 30% del PIB per cápita/N° Total de operaciones de crédito)*100
	( N° de operaciones de créditos  con cuotas vigentes <= 1% del PIB Per capita/ Total operaciones de crédito vigentes) 
	((1+Tasa pasiva de captaciones del público ponderada)/(1+ inflación anualizada))-100
	(TEA máxima Cooperativa/TEA máxima BCE)
	SaldoTCarteraCreditoNecesidadSocial
	SaldoTCarteraCreditoNecesidadProductiva
	TotalCartera
	ValorTPasivo
	ValorTActivo
	(Endeudamiento externo(Obligaciones con Instituciones Financieras sector público, privado o del exterior)/Total Pasivo)
	//Tabla patrimonio
	PatrimonioTTecnitoConstituido
	PatrimonioTTecnitoRequerido
	ValorTReserva
	ValorTPatrimonio
	//Tabla Margen contra
	ValorTMargenFinanciero
	ValorTGastoOperacionales
	ValorTCapacitacionPrecedenteDeCOAC //Preguntar de que campo de la tabla
	// Tabla econimías de escalas
	ValorTAdquisicionDeFormaColectiva / ValorTAdquisicionDeNoColectiva
	//tabla compras a proveedores
	ValorTMontoComprasProveedoresLocales
	ValorTComprasAProveedores
	//Tabla empleados
	ValorTRemuneracionAnualMasAlta
	ValorTRemuneracionMensualMasBaja //(Preguntar si los dos valores son anuales)
	ValorTSalarioPromedioMujeresTodosLosCargos
	ValorTSalarioPromedioHombreTodosLosCargos
	//Tabla Multas
	ValorTMultasYSanciones
	NumTMultasYSanciones
	//Tabla Nivel Importancia
	NivelImportancia
	//Distrib VE
	ValorTEconomicoDistribuido
	ValorTEconomicoGenerado





















}
