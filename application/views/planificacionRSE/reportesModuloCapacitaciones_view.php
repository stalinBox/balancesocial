<link href="<?php echo base_url()?>css/estilospdf.css" rel="stylesheet" type="text/css">
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/jquery-1.12.4.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/jquery.dataTables.min.js"></script>
<!--
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/jquery.dataTables.min.css">
-->
<script type="text/javascript">
  function verPDF(){
    seleccionado = document.getElementById('selectTablaFiltro').value;
    window.open("<?php echo base_url()?>planificacionRSE/reporteSubModuloCapacitacionesPDF/"+seleccionado+"");    
  }

  function regresar(){
    window.location="<?php echo base_url()?>planificacionRSE/capacitaciones";
  }
  function denegado() {
    alert("No cuenta con el permiso");
  }
</script>

<div id="MANIPULACIONDATOS">
  <div id="menumanipulaciondatos">
    <ul class="manipdatos">
      <li> 
        <a href="#" title="Cancelar"><img src="<?php echo base_url()?>imagenes/cancelarmfiltros.png" width="20" height="20" alt=""/></a>
      </li>
    </ul>
    <ul class="manipdatos2">
      <li> 
        <a href="#" onclick="verPDF()" title="Ver Reporte"><img src="<?php echo base_url()?>imagenes/visualizarmfiltros.png" width="20" height="20" alt=""/></a>
      </li>
    </ul>
    <ul class="manipdatos">
      <li> 
        <a href="#" title=""><img src="<?php echo base_url()?>imagenes/actualizarmfiltros.png" width="20" height="20" alt=""/></a>
      </li>
    </ul>
    <ul class="manipdatos2">
      <li> 
        <a href="#" onclick="regresar()" title="Atras" ><img src="<?php echo base_url()?>imagenes/ATRAS.png" width="20" height="20" alt=""/></a>
      </li>
    </ul>
  </div>


     <div id="filtros">
      <div id="cont3filtros">

        <section class="fltro1">
          <section class="titulofiltro">
            Consulta por Sub - Módulo
          </section>
          <select name="selectTablaFiltro" id="selectTablaFiltro" class="selecfiltro">
            <option value="Comunicacion">Comunicación</option>
            <option value="CapacitacionSocios">Capacitación a Socios</option>
            <option value="CapacitacionEmpleados">Capacitación a Empleados</option>
            <option value="CapacitacionConsejos">Capacitación a Consejos</option>            
            <option value="CapacitacionResumen">Resumen de Capacitaciones</option>            
          </select>
        </section>
      </div>
    </div>






</div>