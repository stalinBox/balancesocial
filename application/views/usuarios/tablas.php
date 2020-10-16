
<link href="<?php echo base_url()?>css/estilospdf.css" rel="stylesheet" type="text/css">
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/jquery-1.12.4.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/jquery.dataTables.min.css">

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
<div id="contenedorpdf"><!--Este el contenedor de la tabla principal -->
  <div class="tablapdf">
    <div id="tablapdf">
     <div id="Opciones">
       <input id="Imprimir" type="submit" name="submit" class="editar" value="Imprimir">
       <input id="Descargar" type="submit" name="submit" class="editar" value="Descargar">
     </div>     
     <table id="tablaPaginada" border="0" cellspacing="3px" width="70%">
       <thead>
        <tr class="encabezado">
         <th >Fase</th>
         <th >Indicador</th>
         <th >Pregunta</th>
         <th >CódigoGRI</th>
         <th >Dimension</th>
         <th >SubDimension</th>
         <th >Editar</th>
         <th >Borrar</th>
       </tr>
     </thead>
     <tbody >
      <?php foreach ($indicadorCualitativo as $key): ?>
       <tr class="filas">
        <td class="columnas"><?php echo $key->Fase ?></td>
        <td class="columnas"><?php echo $key->IndicadorCualitativo ?></td>
        <td class="columnas"><?php echo $key->Pregunta ?></td>
        <td class="columnas"><?php echo $key->CodigoGRI ?></td>
        <td class="columnas"><?php echo $key->Dimension ?></td>
        <td class="columnas"><?php echo $key->SubDimension ?></td>
        <td class="columnas">
         <a href="<?php echo base_url();?>principal/inicio/<?php echo $key->IdIndicadorCualitativo;?>">
          <button type="button" title="Editar" class="editar">
            <img src="<?php echo base_url();?>imagenes/update.jpg">
          </button>
        </a>
      </td>
      <td class="columnas">
       <a href="<?php echo base_url();?>principal/inicio/<?php echo $key->IdIndicadorCualitativo;?>">
        <button type="button" title="Eliminar" class="editar">
          <img src="<?php echo base_url();?>imagenes/eliminar-base.png">
        </button>
      </a>
    </td>
  </tr>
<?php endforeach ?>
</tbody>
</table>
</div>
</div> 