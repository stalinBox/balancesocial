$(function(){
	$('#extenciones').on('change', function(){
		var id = $('#extenciones').val();
		var url = '../php/comboCarreras.php';
		$.ajax({
			type:'POST',
			url:url,
			data:'id='+id,
			success: function(data){
				$('#carreras option').remove();
				$('#carreras').append(data);
			}
		});
		return false;
	});
});
