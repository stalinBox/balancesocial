  <script src="<?php echo base_url()?>js/jquery.min.js"></script>
  <link rel="stylesheet"  href="<?php echo base_url() ?>css/bootstrap.min.css">
  <script src="<?php echo base_url()?>js/jquery-1.11.3.min.js"></script>
  <script src="<?php echo base_url()?>js/bootstrap.min.js"></script>
  <link href="<?php echo base_url()?>css/dataTables.bootstrap.min.css" rel="stylesheet"/>

  <script type="text/javascript">
    function denegado() {
      alert("No cuenta con el permiso");
    }
  </script>
  <div class="error">
    <center>
      <?php  messages_flash('danger',validation_errors(),'Errores del formulario', true); ?>
    </center>
  </div>
  
<div id="contenedor">
<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#menu1">Sección A</a></li>
  <li><a data-toggle="tab" href="#menu2">Sección B</a></li>
  <li><a data-toggle="tab" href="#menu3">Sección C</a></li>
  <li><a data-toggle="tab" href="#menu4">Sección D</a></li>
  <li><a data-toggle="tab" href="#menu5">Sección E</a></li>
  <li><a data-toggle="tab" href="#menu6">Sección F</a></li>
</ul>

<div class="tab-content">

  <!-- MENU1 -->
  <div id="menu1" class="tab-pane fade in active">
   <div id="contenedor" style="margin:15px auto">
    <table id="tablaPaginadaA" class="table table-bordered table-striped table-hover">
          <thead>
            <tr class="horizontalazul">
              <th>Código</th>
              <th>Periodo</th>
              <th>Fecha de Registro</th>
              <th>Editar</th>
              <th>Eliminar</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            if (!empty($seccionA)) {
              foreach ($seccionA as $key):
                $id   = base64_encode($key->IdDGASA);
              ?>
              <tr class="horizontalcuerpo">
                <th ><?php echo $key->IdDGASA ?></th>
                <th ><?php echo $key->Periodo ?></th>
                <th ><?php echo $key->FechaSistema ?></th>
                <th >
                  <ul class="edittablamd">
                    <li> 
                      <a href="<?php echo base_url();?>datosAnuales/editarDGASA/<?php echo $key->IdDGASA;?>/menu1">
                        <img src="<?php echo base_url();?>imagenes/ACTUALIZAR.png" width="30" height="28" alt=""/></a>
                      </li>
                    </ul>
                  </th>
                  <th scope="col" class="clmn10">
                    <ul class="borrartablamd">
                      <li>
                        <a href="#" <?php
                        if (@$permisosSeccionA[0]->Eliminar == 1 OR @$admin == 1) { ?>
                        onclick="eliminarDGASA('<?php echo $key->IdDGASA; ?>','<?php echo $key->FechaSistema ?>');"
                        <?php }else{ ?>
                        onclick="denegado()"
                        <?php } ?>>
                        <!-- <a href="#" onclick="eliminarDGASA('<?php echo $id; ?>','<?php echo $key->FechaSistema ?>');"> -->
                        <img src="<?php echo base_url();?>imagenes/BORRAR1.png" width="30" height="28" alt=""/></a>
                      </li>
                    </ul>
                  </th>
                </tr>
              <?php endforeach;
            } ?>
          </tbody>
        </table>
        </div>
  </div>

  <!-- MENU2 -->
  <div id="menu2" class="tab-pane fade">
   <div id="contenedor" style="margin:15px auto">
          <input type="hidden" id="menu2" name="menu2" value="menu2">
    <table id="tablaPaginadaB" class="table table-bordered table-striped table-hover">
          <thead>
            <tr class="horizontalazul">
              <th >Código</th>
              <th >Periodo</th>
              <th >Fecha de Registro</th>
              <th >Editar</th>
              <th scope="col" class="clmn10">Eliminar</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            if (!empty($seccionB)) {
              foreach ($seccionB as $key):
                $id   = base64_encode($key->IdDGASB);
              ?>
              <tr class="horizontalcuerpo">
                <th ><?php echo $key->IdDGASB ?></th>
                <th ><?php echo $key->Periodo ?></th>
                <th ><?php echo $key->FechaSistema ?></th>
                <th >
                  <ul class="edittablamd">
                    <li> 
                      <a href="<?php echo base_url();?>datosAnuales/editarDGASB/<?php echo $key->IdDGASB;?>/menu2">
                        <img src="<?php echo base_url();?>imagenes/ACTUALIZAR.png" width="30" height="28" alt=""/></a>
                      </li>
                    </ul>
                  </th>
                  <th scope="col" class="clmn10">
                    <ul class="borrartablamd">
                      <li>
                       <a href="#" <?php
                       if (@$permisosSeccionB[0]->Eliminar == 1 OR @$admin == 1) { ?>
                       onclick="eliminarDGASB('<?php echo $id; ?>','<?php echo $key->FechaSistema ?>');"
                       <?php }else{ ?>
                       onclick="denegado()"
                       <?php } ?>>
                       <!-- onclick="eliminarDGASB('<?php echo $id; ?>','<?php echo $key->FechaSistema ?>');"> -->
                       <img src="<?php echo base_url();?>imagenes/BORRAR1.png" width="30" height="28" alt=""/></a>
                     </li>
                   </ul>
                 </th>
               </tr>
             <?php endforeach;
           } ?>
         </tbody>
       </table>
       </div>
  </div>

    <!-- MENU3 -->
  <div id="menu3" class="tab-pane fade">
   <div id="contenedor" style="margin:15px auto">
          <input type="hidden" id="menu3" name="menu3" value="menu3">
    <table id="tablaPaginadaC" class="table table-bordered table-striped table-hover">
        <thead>
          <tr class="horizontalazul">
            <th >Código</th>
            <th >Periodo</th>
            <th >Fecha de Registro</th>
            <th >Editar</th>
            <th scope="col" class="clmn10">Eliminar</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          if (!empty($seccionC)) {
            foreach ($seccionC as $key):
              $id   = base64_encode($key->IdDGASC);
            ?>
            <tr class="horizontalcuerpo">
              <th ><?php echo $key->IdDGASC ?></th>
              <th ><?php echo $key->Periodo ?></th>
              <th ><?php echo $key->FechaSistema ?></th>
              <th >
                <ul class="edittablamd">
                  <li> 
                    <a href="<?php echo base_url();?>datosAnuales/editarDGASC/<?php echo $key->IdDGASC;?>/menu3"><img src="<?php echo base_url();?>imagenes/ACTUALIZAR.png" width="30" height="28" alt=""/></a>
                  </li>
                </ul>
              </th>
              <th scope="col" class="clmn10">
                <ul class="borrartablamd">
                  <li>
                   <a href="#" <?php
                   if (@$permisosSeccionC[0]->Eliminar == 1 OR @$admin == 1) { ?>
                   onclick="eliminarDGASC('<?php echo $id; ?>','<?php echo $key->FechaSistema ?>');"
                   <?php }else{ ?>
                   onclick="denegado()"
                   <?php } ?>>
                   <!-- onclick="eliminarDGASC('<?php echo $id; ?>','<?php echo $key->FechaSistema ?>');"> -->
                   <img src="<?php echo base_url();?>imagenes/BORRAR1.png" width="30" height="28" alt=""/></a>
                 </li>
               </ul>
             </th>
           </tr>
         <?php endforeach;
       } ?>
      </tbody>
      </table>
      </div>
  </div>

    <!-- MENU4 -->
  <div id="menu4" class="tab-pane fade">
   <div id="contenedor" style="margin:15px auto">
          <input type="hidden" id="menu4" name="menu4" value="menu4">
    <table id="tablaPaginadaD" class="table table-bordered table-striped table-hover">
      <thead>
      <tr class="horizontalazul">
        <th >Código</th>
        <th >Periodo</th>
        <th >Fecha de Registro</th>
        <th >Editar</th>
        <th scope="col" class="clmn10">Eliminar</th>
      </tr>
      </thead>
      <tbody>
      <?php 
      if (!empty($seccionD)) {
        foreach ($seccionD as $key):
          $id   = base64_encode($key->IdDGASD);
        ?>
        <tr class="horizontalcuerpo">
          <th ><?php echo $key->IdDGASD ?></th>
          <th ><?php echo $key->Periodo ?></th>
          <th ><?php echo $key->FechaSistema ?></th>
          <th >
            <ul class="edittablamd">
              <li> 
                <a href="<?php echo base_url();?>datosAnuales/editarDGASD/<?php echo $key->IdDGASD;?>/menu4"><img src="<?php echo base_url();?>imagenes/ACTUALIZAR.png" width="30" height="28" alt=""/></a>
              </li>
            </ul>
          </th>
          <th scope="col" class="clmn10">
            <ul class="borrartablamd">
              <li>
               <a href="#" <?php
               if (@$permisosSeccionD[0]->Eliminar == 1 OR @$admin == 1) { ?>
               onclick="eliminarDGASD('<?php echo $id; ?>','<?php echo $key->FechaSistema ?>');"
               <?php }else{ ?>
               onclick="denegado()"
               <?php } ?>>
               <!-- onclick="eliminarDGASD('<?php echo $id; ?>','<?php echo $key->FechaSistema ?>');"> -->
               <img src="<?php echo base_url();?>imagenes/BORRAR1.png" width="30" height="28" alt=""/></a>
             </li>
           </ul>
         </th>
       </tr>
      <?php endforeach;
      } ?>
      </tbody>
      </table>
      </div>
  </div>

    <!-- MENU5 -->
  <div id="menu5" class="tab-pane fade">
   <div id="contenedor" style="margin:15px auto">
          <input type="hidden" id="menu5" name="menu5" value="menu5">
    <table id="tablaPaginadaE" class="table table-bordered table-striped table-hover">
      <thead>
      <tr class="horizontalazul">
        <th >Código</th>
        <th >Periodo</th>
        <th >Fecha de Registro</th>
        <th >Editar</th>
        <th scope="col" class="clmn10">Eliminar</th>
      </tr>
      </thead>
      <tbody>
      <?php 
      if (!empty($seccionE)) {
        foreach ($seccionE as $key):
          $id   = base64_encode($key->IdDGASE);
        ?>
        <tr class="horizontalcuerpo">
          <th ><?php echo $key->IdDGASE ?></th>
          <th ><?php echo $key->Periodo ?></th>
          <th ><?php echo $key->FechaSistema ?></th>
          <th >
            <ul class="edittablamd">
              <li> 
                <a href="<?php echo base_url();?>datosAnuales/editarDGASE/<?php echo $key->IdDGASE;?>/menu5"><img src="<?php echo base_url();?>imagenes/ACTUALIZAR.png" width="30" height="28" alt=""/></a>
              </li>
            </ul>
          </th>
          <th scope="col" class="clmn10">
            <ul class="borrartablamd">
              <li>
               <a href="#" <?php
               if (@$permisosSeccionE[0]->Eliminar == 1 OR @$admin == 1) { ?>
               onclick="eliminarDGASE('<?php echo $id; ?>','<?php echo $key->FechaSistema ?>');"
               <?php }else{ ?>
               onclick="denegado()"
               <?php } ?>>
               <!-- onclick="eliminarDGASE('<?php echo $id; ?>','<?php echo $key->FechaSistema ?>');"> -->
               <img src="<?php echo base_url();?>imagenes/BORRAR1.png" width="30" height="28" alt=""/></a>
             </li>
           </ul>
         </th>
       </tr>
      <?php endforeach;
      } ?>
      </tbody>
      </table>
      </div>
  </div>

  <!-- MENU6 -->
  <div id="menu6" class="tab-pane fade">
    <div id="contenedor" style="margin:15px auto">
    <input type="hidden" id="menu6" name="menu6" value="menu6">
    <table id="tablaPaginadaF" class="table table-bordered table-striped table-hover">
      <thead>
      <tr class="horizontalazul">
        <th >Código</th>
        <th >Periodo</th>
        <th >Fecha de Registro</th>
        <th >Editar</th>
        <th scope="col" class="clmn10">Eliminar</th>
      </tr>
      </thead>
      <tbody>
      <?php 
      if (!empty($seccionF)) {
        foreach ($seccionF as $key):
          $id   = base64_encode($key->IdDGASF);
        ?>
        <tr class="horizontalcuerpo">
          <th ><?php echo $key->IdDGASF ?></th>
          <th ><?php echo $key->Periodo ?></th>
          <th ><?php echo $key->FechaSistema ?></th>
          <th >
            <ul class="edittablamd">
              <li> 
                <a href="<?php echo base_url();?>datosAnuales/editarDGASF/<?php echo $key->IdDGASF;?>/menu6"><img src="<?php echo base_url();?>imagenes/ACTUALIZAR.png" width="30" height="28" alt=""/></a>
              </li>
            </ul>
          </th>
          <th scope="col" class="clmn10">
            <ul class="borrartablamd">
              <li>
               <a href="#" <?php
               if (@$permisosSeccionF[0]->Eliminar == 1 OR @$admin == 1) { ?>
               onclick="eliminarDGASF('<?php echo $id; ?>','<?php echo $key->FechaSistema ?>');"
               <?php }else{ ?>
               onclick="denegado()"
               <?php } ?>>
               <!-- onclick="eliminarDGASF('<?php echo $id; ?>','<?php echo $key->FechaSistema ?>');"> -->
               <img src="<?php echo base_url();?>imagenes/BORRAR1.png" width="30" height="28" alt=""/></a>
             </li>
           </ul>
         </th>
       </tr>
      <?php endforeach;
      } ?>
      </tbody>
      </table>
      </div>
  </div>

</div> <!--final div content-->

<!-- VENTANA MODAL ELIMINAR REGISTRO -->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" id="modalDelete">
      <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3>¿Estás seguro que eliminar este registro?</h3>
           </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-md" id="modal-btn-si">Si</button>
        <button type="button" class="btn btn-danger btn-md" id="modal-btn-no">No</button>
      </div>
    </div>
  </div>
</div>

<script src="<?php echo base_url()?>js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url()?>js/dataTables.checkboxes.min.js"></script>
<script src="<?php echo base_url()?>js/table/table.js"></script>

<script type="text/javascript">
// LLAMADA A LA FUNCION ELIMINAR Y LA VENTANA MODAL
  function eliminarDGASA(id, nombre){
    var modalConfirm = function(callback){
          $("#modalDelete").modal('show');
        $("#modal-btn-si").on("click", function(){
            callback(true);
          $("#modalDelete").modal('hide');
      });
        $("#modal-btn-no").on("click", function(){
            callback(false);
          $("#modalDelete").modal('hide');
        });
    };

    modalConfirm(function(confirm){
      if (confirm==true){
        var idA=id;
        $.post('<?php echo base_url(); ?>datosAnuales/eliminarDGASA',{idA: idA},function(data) {
        location.reload();
        });
      }
    });
}

// LLAMADA A LA FUNCION ELIMINAR Y LA VENTANA MODAL
  function eliminarDGASB(id, nombre){
    var modalConfirm = function(callback){
          $("#modalDelete").modal('show');
        $("#modal-btn-si").on("click", function(){
            callback(true);
          $("#modalDelete").modal('hide');
      });
        $("#modal-btn-no").on("click", function(){
            callback(false);
          $("#modalDelete").modal('hide');
        });
    };

    modalConfirm(function(confirm){
      if (confirm==true){
        var idB=id;
        $.post('<?php echo base_url(); ?>datosAnuales/eliminarDGASB',{idB: idB},function(data) {
        location.reload();
        });
      }
    });
}

// LLAMADA A LA FUNCION ELIMINAR Y LA VENTANA MODAL
  function eliminarDGASC(id, nombre){
    var modalConfirm = function(callback){
          $("#modalDelete").modal('show');
        $("#modal-btn-si").on("click", function(){
            callback(true);
          $("#modalDelete").modal('hide');
      });
        $("#modal-btn-no").on("click", function(){
            callback(false);
          $("#modalDelete").modal('hide');
        });
    };

    modalConfirm(function(confirm){
      if (confirm==true){
        var idC=id;
        $.post('<?php echo base_url(); ?>datosAnuales/eliminarDGASC',{idC: idC},function(data) {
        location.reload();
        });
      }
    });
}

// LLAMADA A LA FUNCION ELIMINAR Y LA VENTANA MODAL
  function eliminarDGASD(id, nombre){
    var modalConfirm = function(callback){
          $("#modalDelete").modal('show');
        $("#modal-btn-si").on("click", function(){
            callback(true);
          $("#modalDelete").modal('hide');
      });
        $("#modal-btn-no").on("click", function(){
            callback(false);
          $("#modalDelete").modal('hide');
        });
    };

    modalConfirm(function(confirm){
      if (confirm==true){
        var idD=id;
        $.post('<?php echo base_url(); ?>datosAnuales/eliminarDGASD',{idD: idD},function(data) {
        location.reload();
        });
      }
    });
}

// LLAMADA A LA FUNCION ELIMINAR Y LA VENTANA MODAL
  function eliminarDGASE(id, nombre){
    var modalConfirm = function(callback){
          $("#modalDelete").modal('show');
        $("#modal-btn-si").on("click", function(){
            callback(true);
          $("#modalDelete").modal('hide');
      });
        $("#modal-btn-no").on("click", function(){
            callback(false);
          $("#modalDelete").modal('hide');
        });
    };

    modalConfirm(function(confirm){
      if (confirm==true){
        var idE=id;
        $.post('<?php echo base_url(); ?>datosAnuales/eliminarDGASE',{idE: idE},function(data) {
        location.reload();
        });
      }
    });
}

// LLAMADA A LA FUNCION ELIMINAR Y LA VENTANA MODAL
  function eliminarDGASF(id, nombre){
    var modalConfirm = function(callback){
          $("#modalDelete").modal('show');
        $("#modal-btn-si").on("click", function(){
            callback(true);
          $("#modalDelete").modal('hide');
      });
        $("#modal-btn-no").on("click", function(){
            callback(false);
          $("#modalDelete").modal('hide');
        });
    };

    modalConfirm(function(confirm){
      if (confirm==true){
        var idF=id;
        $.post('<?php echo base_url(); ?>datosAnuales/eliminarDGASF',{idF: idF},function(data) {
        location.reload();
        });
      }
    });
}
</script>
