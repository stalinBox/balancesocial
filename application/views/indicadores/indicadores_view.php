<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/jquery.dataTables.min.css">
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/jquery-1.12.4.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/jquery.dataTables.min.js"></script>
<link href="<?php echo base_url()?>css/estilospdf.css" rel="stylesheet" type="text/css">
<script>
  $(document).ready(function() {
    $('#tablaPaginada').DataTable( {
      "language": {
        "lengthMenu": "Mostrar _MENU_ registros por página",
        "zeroRecords": "No Encontrado - lo siento",
        "info": "Mostrando la página _PAGE_ de _PAGES_",
        "infoEmpty": "No hay registros disponibles",
        "loadingRecords": "Cargando...",
        "processing":     "Procesando...",
        "search": "Buscar",
        "infoFiltered": "(filtered from _MAX_ total registros)",
        "paginate": {
          "next": "Siguiente",
          "previous": "Anterior"
        },
      }
    } );
  } );
</script>  
<div id="contenedorpdf">
  <div id="tablapdf">
    <div id="Opciones">
      <input id="Imprimir" type="submit" name="submit" class="editar" value="Imprimir">
      <input id="Descargar" type="submit" name="submit" class="editar" value="Atras">
    </div>     
    <table id="tablaPaginada" border="0" cellspacing="5px" width="100%">
     <thead>
      <tr class="fila1">
       <td class="columna1">Fase</td>
       <td class="columna1">Indicador</td>
       <td class="columna1">Pregunta</td>
       <td class="columna1">CódigoGRI</td>
       <td class="columna1">Dimension</td>
       <td class="columna1">SubDimension</td>
       <td class="columna1">Editar</td>
       <td class="columna1">Borrar</td>
     </tr>
   </thead>
   <tbody>
    <?php 
    if (!empty($indicador)) {
      foreach ($indicadoresCuantitativos as $key):
        $id   = base64_encode($key->IdIndicador);
      ?>
      <tr class="filagris">
        <td class="columna1"><p><?php echo $key->Nombre ?></p></td>
        <td class="columna1"><p><?php echo $key->Resultado ?></p></td>
        <td class="columna1"><p><?php echo $key->Dimension ?></p></td>
        <td class="columna1"><p><?php echo $key->SubDimension ?></p></td>
        <td class="columna1"><p><?php echo $key->GrupoInteres ?></p></td>
        <td class="columna1"><p><?php echo $key->Herramienta ?></p></td>
        <td class="columna1"><p><?php echo $key->Area ?></p></td>
        <td class="columna1"><p><?php echo $key->FormulaResultado ?></p></td>
        <td class="columna6">
          <a href="<?php echo base_url();?>indicador/editarIndicadorCuantitativo/<?php echo $key->IdIndicador;?>">
            <button type="button" title="Editar">
              <img src="<?php echo base_url();?>imagenes/update.jpg">
            </button>
          </a>
        </td>
      </tr><!--final class filagris-->
    <?php endforeach;
  }
  ?>
</tbody>
</table>

</div>
</div>
