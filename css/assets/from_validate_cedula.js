// JavaScript Document

//   Esta es mi fincion para validara las cedula  ///
function validarForm(formulario) {
if(formulario.documento.value.length==10){
			alert('a entrado');
		var cedula = formulario.documento.value;
  		array = cedula.split( "" );
  		num = array.length;
  		if(cedula==2222222222){
			alert('La c\xe9dula NO es v\xe1lida!!!');
			formulario.documento.focus();
			//return false;
		}
		else{
			if ( num == 10 )
  			{
    		total = 0;
    		digito = (array[9]*1);
    		for( i=0; i < (num-1); i++ )
    		{
      			mult = 0;
      			if ( ( i%2 ) != 0 ) {
        			total = total + ( array[i] * 1 );
      			}
				else
    			{
    				mult = array[i] * 2;
        			if ( mult > 9 )
          				total = total + ( mult - 9 );
        			else
          			total = total + mult;
    			}	
    		}
    			decena = total / 10;
    			decena = Math.floor( decena );
    			decena = ( decena + 1 ) * 10;
    			final = ( decena - total );
    			if ( ( final == 10 && digito == 0 ) || ( final == digito ) ) {
      				//alert( "La c\xe9dula ES v\xe1lida!!!" );
      			//return true;
    			}
    			else
    			{
      				alert( "La c\xe9dula NO es v\xe1lida!!!" );
					formulario.documento.focus();
      				//return false;
    			}
  		}
  		else
  		{
  	  		alert("La c\xe9dula no puede tener menos de 10 d\xedgitos");
    		//return false;
  		}
			//alert('correcto');
		}
	}
}