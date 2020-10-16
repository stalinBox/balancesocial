  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <meta charset="utf-8">

<div class="container">
  <div class="input-field col s12">
    <select id="selEstadosMateria">
      <option value="" disabled selected>Seleccionar</option>
      <option value="1">sólido</option>
      <option value="2">líquido</option>
      <option value="3">gaseoso</option>
    </select>
    <label>Estado de la Materia</label>
  </div>
  <a class="waves-effect waves-light btn btnRecorrer">Recorrer</a>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
<script>
   $(document).ready(function() {
    $('select').material_select();
  });
   $(".btnRecorrer").click(function(){
     var concatValor = '';
     $("#selEstadosMateria option").each(function(){
        if ($(this).val() != "" ){        
         concatValor += $(this).val()+' - '+$(this).text()+'\n';
        }
     });
     alert(concatValor);
   });
</script>
