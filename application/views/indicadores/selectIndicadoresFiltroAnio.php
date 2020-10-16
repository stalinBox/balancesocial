  <meta charset="utf-8">
  <script src="<?php echo base_url()?>js/jquery.min.js"></script>
  <link rel="stylesheet"  href="<?php echo base_url() ?>css/bootstrap.min.css">
  <script src="<?php echo base_url()?>js/jquery-1.11.3.min.js"></script>
  <script src="<?php echo base_url()?>js/bootstrap.min.js"></script>
  
  <link href="<?php echo base_url()?>css/dataTables.bootstrap.min.css" rel="stylesheet"/>
  <link href="<?php echo base_url()?>css/dataTables.checkboxes.css" rel="stylesheet"/>

  <script>
    function regresar(){
        window.location="<?php echo base_url()?>indicadorEmpresa/indicadoresAdicionModulos";
    }

    function showUser(str) {
      anio = document.getElementById("txtAnio").value;
      if(anio.length!=0){
        
        $(".form-control.input-sm").val(str)

        e = jQuery.Event("keyup");
        e.which = 13 //enter key
        jQuery(".form-control.input-sm").trigger(e);
      }else{
        $("#mostrarmodal").modal("show")
        $("#formCombos")[0].reset()
      }
    }

  function showUserDimension(str) {
    anio = document.getElementById("txtAnio").value;
      if(anio.length!=0){
        $(".form-control.input-sm").val(str)
        e = jQuery.Event("keyup");
        e.which = 13 //enter key
        jQuery(".form-control.input-sm").trigger(e);
        
        $('#selectIndicadorFiltroBySector').prop('selectedIndex',-1);
        $('#selectIndicadorFiltroBySubDimension').prop('selectedIndex',-1);

        }else{
        $("#mostrarmodal").modal("show")
        $("#formCombos")[0].reset()
      }
}

function showUserSubDimension(str) {
      anio = document.getElementById("txtAnio").value;
      if(anio.length!=0){
        
        $(".form-control.input-sm").val(str)

        e = jQuery.Event("keyup");
        e.which = 13 //enter key
        jQuery(".form-control.input-sm").trigger(e);
        $('#selectIndicadorFiltroBySector').prop('selectedIndex',-1);
        $('#selectIndicadorFiltroByDimension').prop('selectedIndex',-1);
        }else{
        $("#mostrarmodal").modal("show")
        $("#formCombos")[0].reset()
      }
}

</script>
<table class="table table-bordered table-striped table-hover" id="Tabla1" >
      <tbody>
        <tr>
        <th> Sector:      
      <select name="selectIndicadorFiltroBySector" onchange="showUser(this.value)" class="fltro2">
      <option value="-1" selected="true">- Seleccione -</option>
              <?php 
              foreach ($indicadores as $items) { ?>
                <option value="<?php echo $items->Sector; ?>"><?php echo $items->Sector;?></option>
                <?php } ?>
      </select>
      </th>

      <th>Dimensión: 
        <select name="selectIndicadorFiltroByDimension" onchange="showUserDimension(this.value)" class="fltro2">
           <option value="-1" selected="true">- Seleccione -</option>
           <?php 
              foreach ($indicadorByDim as $items) { ?>
                <option value="<?php echo $items->Dimension; ?>"><?php echo $items->Dimension;?></option>
                <?php } ?>
        </select>
      </th>

      <th>SubDimensión:
        <select name="selectIndicadorFiltroBySubDimension" onchange="showUserSubDimension(this.value)" class="fltro2">
           <option value="-1" selected="true">- Seleccione -</option>
           <?php 
              foreach ($indicadorBySubDim as $items) { ?>
                <option value="<?php echo $items->SubDimension; ?>"><?php echo $items->SubDimension;?></option>
                <?php } ?>
        </select>
      </th>

      <th>Ingrese el Periodo: *
          <input maxlength="4" class="formulario1" type="text" id="txtAnio" name="txtAnio" placeholder="yyyy" value="<?php echo set_value('txtAnio'); ?>">       
          <td><input type="submit" id="btnGuardar" class="btn btn-success" value="Guardar" ></td>
          <td><input type="button" onclick="regresar()" name="" class="btn btn-success" value="Regresar"></td> 
      </th>         
      </tr>
      </tbody>
    </table>

    <!-- Ventana Modal -->
    <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3 style="color:#FF0000";>Advertencia..!</h3>
           </div>
           <div class="modal-body">
              <h4>Debe ingresar un período</h4>
            </div>
           <div class="modal-footer">
              <a href="#" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
           </div>
        </div>
      </div>
    </div>
    <!-- Fin Ventana Modal -->
  <br>
  <div id="txtHint"><b></b></div>

<body onload="viewdata()">

<div class="contenedor">
    <table id="mytable" class="display nowrap table table-bordered table-striped table-hover text-centered table-sm" width="100%">
        <thead>
            <tr>    
                <th style="text-align:center;width:45px;"><input type="checkbox" id="checkall"/></th>
                <th >Id</th>
                <th >Nombre</th>
                <th >Sector</th>
                <th >Resultado</th>
                <th >Dimensión</th>
                <th >Sub-Dimensión</th>
                <th >Área</th>
                <th >Principios ACI</th>
                <th >Dimensiones ACI</th>
                <th >Fórmula</th>
            </tr>
        </thead>

        <tbody>
        </tbody>
  </table>
</div>

<script src="<?php echo base_url()?>js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url()?>js/dataTables.checkboxes.min.js"></script>

 <script>
    function viewdata(){
      var f = new Date();
      var yy = $("#txtAnio").val(f.getFullYear());
      $(".form-control.input-sm").attr("id","nom");
      var mytable = $("#mytable").DataTable({
            ajax:{  
                url:"<?php echo base_url() . 'indicador/filtroAnio2'; ?>",  
                type:"POST",
                data:{yy: yy.val()},
                },
            responsive: true,
            destroy: true,
            columnDefs: [
                {
                    targets: 0,
                    checkboxes: {
                        seletRow: true
                    }
                }
            ],
            select:{
                style: 'multi'
            },
            scrollX: true,
            scrollY: 400,
            order: [[1, 'asc']],
            "language": {
                "sProcessing":    "Procesando...",
                "sLengthMenu":    "Mostrar _MENU_ registros",
                "sZeroRecords":   "No se encontraron resultados",
                "sEmptyTable":    "Ningún dato disponible en esta tabla",
                "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":   "",
                "sSearch":        "Buscar:",
                "sUrl":           "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":    "Último",
                    "sNext":    "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        })

        $('#btnGuardar').click(function(e){
          var form = this
            var rowsel = mytable.column(0).checkboxes.selected();
            $.each(rowsel, function(index, rowId){
                $(form).append(
                    $('<input>').attr('type','hidden').attr('name','id[]').val(rowId)
                )
            })
            
        var id = rowsel.join(',');
        $.post('<?php echo base_url() . 'indicador/filtroAnioGuardarIndicadores'; ?>', {id: id , yy: yy.val()}, function(data){
          mytable.ajax.reload( null, false );
          location.reload();
        })
            e.preventDefault()
        })
    }


 </script>

 <style type="text/css">
  div.dataTables_wrapper {
        width: 800px;
        margin: 0 auto;
    }
</style>
</body>
