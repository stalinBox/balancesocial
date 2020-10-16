
// FUNCION PARA BUSCAR
function FilterByAnios(str) {
        $("#modalDuplicate .modal-dialog .modal-content .modal-body .form-control.input-sm").val(str)
        e = jQuery.Event("keyup");
        e.which = 13
        jQuery(".form-control.input-sm").trigger(e);
}

function changeSelect(){
    var opcionSelect = $("#modalDuplicate .modal-dialog .modal-content .modal-header .input-group #selectPeriodo").val();
    console.log("Este es el valor del select: "+opcionSelect )
    if(opcionSelect == "-- Seleccionar --"){
        console.log(true)
    }else{
        console.log(false)
    }
}

function viewdata($str1_MyTable, $str2_Post){
    //$("#modalDuplicate .modal-dialog .modal-content .modal-body .form-control.input-sm").css({ "display": "hide" });
    var base_url = $('#baseUrl').val();
    var mytable = $("#mytableModal").DataTable({
        ajax:{
            url: base_url+$str1_MyTable,   
            type:"POST",
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
        scrollCollapse: true,
        scrollY: 400,
        searching: true,
        info: false,
        paging: false

    });

    $('#modal-btn-yes').click(function(e){
    var form = this;
    var anioMigrar = $("#modalDuplicate .modal-dialog .modal-content .modal-header .input-group .input-group #txtPeriodo").val();
    var rowsel = mytable.column(0).checkboxes.selected();
    $.each(rowsel, function(index, rowId){
        $(form).append(
            $('<input>').attr('type','hidden').attr('name','id[]').val(rowId))
    });
    
    var id = rowsel.join(',');
    
    $.post(base_url+$str2_Post, {id: id,anioMigrar:anioMigrar}, function(data){
        mytable.ajax.reload( null, false );
        location.reload();
    })
    e.preventDefault()
    })

    $('#divPeriodo').datepicker({
        format: "yyyy",
        viewMode: "years", 
        minViewMode: "years"
    });
}

// LLAMADA A LA FUNCION DUPLICAR Y LA VENTANA MODAL
function duplicate(){
    if($("#modalDuplicate").modal('show')){
        console.log(true)
        //changeSelect()
        //$('#modalDuplicate .modal-dialog .modal-content .modal-header .input-group #selectPeriodo')
         //   .val('-- Seleccionar --')
          //  .trigger('change');

    }else{
        console.log(false)
    }


    $("#modal-btn-yes").on("click", function(){
        $("#modalDuplicate").modal('hide');
    });

    $("#modal-btn-not").on("click", function(){
        $("#modalDuplicate").modal('hide');
    });
}

