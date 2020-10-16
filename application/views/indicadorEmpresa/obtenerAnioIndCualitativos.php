<script type="text/javascript">
    var anio = prompt("Ingrese el Año periodo");
if(anio)
    enviarAnio(anio);
else
	regresar();

	function enviarAnio(anio){
		window.location="<?php echo base_url()?>indicadorEmpresa/indicadoresCualitativosEmpresaCalificacion/"+anio+"";
	}
	function regresar(){
		window.location="<?php echo base_url()?>indicadorEmpresa/indicadoresCualitativosModulos";
	}
</script>