<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class principal extends CI_Controller{
	
	function __construct(){
		parent:: __construct();
	}

	public function index(){
		if(isset($_SESSION["usuario"])){
			$dato["contenedor"] = "usuarios/modulosPrincipal";
			$inicio = base_url()."principal";
			$url = array($inicio => "Módulos" );
			$dato["ubicacionURL"] = $url;
			$this->load->view("plantilla", $dato);

		}else{
			redirect("inicio");
		}
	}
	public function inicio($IdModificar){
		if (isset($_SESSION["usuario"])) {
			$usuario = $this->session->userdata("usuario");
			echo "Sesión iniciada por ";
			echo "Dato obtenido :$IdModificar";
			//echo "<span> <h4> $usuario->MailUsuario </h4></span> <br>";
			//echo "<span> <h4> $usuario->ContraseniaUsuario </h4></span>";			
		}else{
			echo "No iniciado";	
		}
	}
	public function tabs(){
		if(isset($_SESSION["usuario"])){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$dato["contenedor"] = "usuarios/tabs";			
			//$this->load->view("plantilla", $dato);
			$this->load->view("usuarios/tabs");
		}else{
			redirect("inicio");
		}
	}
	public function tablas(){
		if(isset($_SESSION["usuario"])){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$this->load->model('Indicador_Modelo');
			$dato["contenedor"] = "usuarios/tablas";
			$dato['indicadorCualitativo'] = $this->Indicador_Modelo->getListIndicadorCualitativo();  
			$dato["titulo"] = "Titulo de algo"; 
			$dato["accion"] = "Ver";   
			$this->load->view("plantilla", $dato);
		}else{
			redirect("inicio");
		}
	}
	public function pagina(){
		if(isset($_SESSION["usuario"])){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$this->load->model('Indicador_Modelo');
			$dato["contenedor"] = "usuarios/paginacion";
			$dato['indicadorCualitativo'] = $this->Indicador_Modelo->getListIndicadorCualitativo();  
			$dato["titulo"] = "Titulo de algo"; 
			$dato["accion"] = "Ver";   
			$this->load->view("plantilla", $dato);			
		}else{
			redirect("inicio");
		}
	}
	public function paginas(){
		if(isset($_SESSION["usuario"])){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$this->load->model('Indicador_Modelo');
			$dato["contenedor"] = "usuarios/paginacion2";
			$dato['indicadorCualitativo'] = $this->Indicador_Modelo->getListIndicadorCualitativo();  
			$dato["titulo"] = "Titulo de algo"; 
			$dato["accion"] = "Ver";   
			$this->load->view("plantilla", $dato);			
		}else{
			redirect("inicio");
		}
	}
	public function modulos(){
		$dato["contenedor"] = "usuarios/borrar";
		$this->load->view("plantilla", $dato);
	}

/**
 * [cerrarSesion description]
 * Cierra y destruye toda la Información registrada en la sesión, redirecciona al Controlador Inicio
 * @return [type] [description]
 */
	public function cerrarSesion(){
		session_destroy();
		redirect("inicio");
	}

	public function prueba(){
		//
		//Obtengo la fórmula de cada indicador
		$formula = $this->db->query("SELECT idIndicador, I.idIndicadorCalificado, I.ICResultado, Formula FROM Indicador, IndicadorCalificado I WHERE idIndicador = I.idIndicadorCalificado");
		foreach ($formula->result() as $fila) {
			//echo $fila->idIndicador. "  " .$fila->Formula;
			echo "<br>";
			//Cargo cada fórmula para cada fila en otra consulta para retoranal la calificación
			//$sqlCalificacion = "SELECT CASE ".$fila->Formula." ELSE -1 END AS NotaRespuesta FROM indicadorCalificado2 WHERE ";
			echo "<br>";
			$sqlObtenerCalificacion = "SELECT I.idIndicadorCalificado, idIndicador, I.ICResultado, CASE ".$fila->Formula." ELSE -1 END AS NotaRespuesta FROM Indicador, IndicadorCalificado I WHERE idIndicador = I.idIndicadorCalificado AND I.idIndicadorCalificado = ".$fila->idIndicadorCalificado." LIMIT 1";
			echo $sqlObtenerCalificacion;
			echo "<br>";
			$obtengoCalificacion = $this->db->query($sqlObtenerCalificacion);
			foreach ($obtengoCalificacion->result() as $row) {
				echo "<br>";
				//Actualizo la tabla indicadorCalificado en el campo ICCalificacion
				$sqlUpdate = "UPDATE IndicadorCalificado SET ICCalificacion = ".$row->NotaRespuesta." WHERE idIndicadorCalificado = ".$row->idIndicadorCalificado."";
				echo $sqlUpdate;
				$resultado = $this->db->query($sqlUpdate);

			}
			echo "<br>";


		}

/*
		echo "<br>";
		//Crear aqui una variable de texto que sea enviada al modelo		
		$varSQL = "((Hasta1 + Hasta2 + Hasta3 + Hasta4 + Hasta5)/3)*Meta";

		$sql = "SELECT idIndicador, ". $varSQL." AS Resultado FROM indicadorCalificado2";
		
		//Eniviar consulta a la base de datos
		$resultado = $this->db->query($sql);		
		echo "El sql es :$sql";		
		echo "<br>";
		echo $resultado->num_rows();
		echo "<br>";
		foreach ($resultado->result() as $row) {
			echo $row->idIndicador;
			echo " ";
			echo $row->Resultado;
			$update = array('NotaFinal' => $row->Resultado);
			$this->db->where('idIndicador', $row->idIndicador);
			$this->db->update('indicadorCalificado2', $update);
			echo "<br>";
			//echo $row->Nota5;			
		}
		echo "<br>";
		*/
		//Actualizar el campo con la formula seleccionadas egún el indicador
		//print_r($resultado);
		//$dato["contenedor"] = "anonimos/borrar";
		//$this->load->view("plantilla", $dato);
	}
	
	public function caratula(){
		if($this->session->userdata("IdEmpresaSesion")){
			$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
			$this->load->model('Empresa_Modelo');
			$this->load->model('ValoresEmpresa_Modelo');
			$this->load->model('PrincipiosEmpresa_Modelo');
			$dato['empresa'] = $this->Empresa_Modelo->getEmpresa($IdEmpresaSesion);
			$dato['valores'] = $this->ValoresEmpresa_Modelo->getListValoresEmpresa($IdEmpresaSesion);
			$dato['principios'] = $this->PrincipiosEmpresa_Modelo->getListPrincipiosEmpresa($IdEmpresaSesion);			
			$this->load->view("impresion/caratula", $dato);

		}else{
			redirect('inicio');
		}
	}

	public function recorreTabla(){
		$dato["contenedor"] = "usuarios/borrar";
		$this->load->view("plantilla", $dato);
	}
	public function grafica(){
		//$dato["contenedor"] = "usuarios/grafica";
		//$this->load->view("plantilla", $dato);
		
		$pdfFilePath = "salida.pdf";
		
$data['page_title'] = 'Hello world';

if (file_exists($pdfFilePath) == FALSE){
	ini_set('memory_limit','32M'); // boost the memory limit if it's low ;)
	$html = $this->load->view('usuarios/grafica', $data, true); // render the view into HTML
	$this->load->library('pdf');
	$pdf = $this->pdf->load();
	$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date(DATE_RFC822)); // Add a footer for good measure ;)
	$pdf->WriteHTML($html); // write the HTML into the PDF
	$pdf->Output($pdfFilePath, 'F'); // save to file because we can
}




		$this->load->view("usuarios/grafica");
	}
	public function pruebaMemoria(){
		//$dato["contenedor"] = "usuarios/grafica";
		//$this->load->view("plantilla", $dato);
		$this->load->view("impresion/pruebaMemoria");
	}

	public function subirBalance(){
		$this->load->view("usuarios/subirBalance");
	}
	public function loadBalance(){
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
		$tiempo = time();
		$txtFecha = date("Y-m-d");
		$txtFechaSistema = date("Y-m-d H:i:s");
		//obtengo el nombre
		$fichero =  $_FILES["archivo"]["name"];
		//obtengo la dirección temporal
		$fichero_tmp = $_FILES["archivo"]["tmp_name"];
		$tipo = $_FILES["archivo"]["type"];
		echo $fichero;
		echo "<br>";
		echo $fichero_tmp;
		echo "<br>";
		echo $tipo;
		echo "<br>";
		//.txt de tipo text/plain
		//.csv de tipo text/csv
		try {
			if(!empty($_FILES['archivo']['tmp_name']) && file_exists($_FILES['archivo']['tmp_name'])) {
				$tipo = $_FILES["archivo"]["type"];
				if ($tipo == "text/csv") {
					$registros = 0;
					$handle = fopen($fichero_tmp, "r");  
					while (($data = fgetcsv($handle, 1000, " ")) !== FALSE) {
						$registros++; 
						$num = count($data);  
						$cadena = "insert into BalanceGeneral values(null,";  
						for ($c=0; $c < $num; $c++) {  
							if ($c ==($num-1)) 
								$cadena = $cadena."'".$data[$c] . "'"; 
							else 
								$cadena = $cadena."'".$data[$c] . "',"; 
						}

						$cadena = $cadena.",'".$txtFecha."','".$txtFechaSistema."', ".$IdEmpresaSesion.");";  

						echo $cadena; 
						echo "<br>";
					//$this->db->query($cadena);
					} 
					echo $registros. "Registros insertados";

					fclose($handle);
				}else{
					echo "No es tipo CSV";
				}


			}else{
				echo "no cargado";
			}
		} catch (Exception $e) {
			echo "Error ". $e->getMessage();
		}

	}
	public function multiSelect(){
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
		$this->load->model('IndicadorCualitativo_Modelo');
		$dato['cualitativos'] = $this->IndicadorCualitativo_Modelo->getListIndicadorCualitativoEmpresaPeriodo($IdEmpresaSesion, 2017);
		$dato["contenedor"] = "usuarios/multiSelect";
		//$this->load->view("usuarios/multiSelect", $dato);
		$this->load->view('plantilla', $dato);

	}
	public function multiSelectVer(){
		$IdEmpresaSesion = $this->session->userdata("IdEmpresaSesion");
		$this->load->model('IndicadorCualitativo_Modelo');
		$dato['cualitativos'] = $this->IndicadorCualitativo_Modelo->getListIndicadorCualitativoEmpresaPeriodo($IdEmpresaSesion, 2017);
		$respuestas = $_POST["respuesta"];
		$IdCualitativoMaestro = 1;
		echo "Número de Registros :".count($respuestas)."<br>";
		$ids = 0;
		foreach ($dato['cualitativos'] as $key) {
			//echo "Indicador ".$key->IdCualitativosEmpresa." Respuesta ".$respuestas[$ids] . "<br>";
			$sql = "INSERT INTO IndicadoresCualitativosCalificados VALUES(null, '".$key->Dimension."', '".$key->PrincipioSEPS."', '".$key->SubDimension."', '".$key->CodigosGRI."', '".$key->Fase."', '".$key->Estandar."', '".$key->Concepto."', '".$respuestas[$ids]."', ".$IdCualitativoMaestro.");";
			$ids++;
			echo $sql."<br>";
		}
		/*
		for ($i = 0; $i < count($respuestas); $i++){
		echo "<br> Respuesta " . $i . ": " . $respuestas[$i];    
		}
		*/
	}

	public function pruebaSelect(){
		$dato["contenedor"] = "usuarios/borrar";
		//$this->load->view("usuarios/multiSelect", $dato);
		$this->load->view('plantilla', $dato);
	}


}	

 ?>