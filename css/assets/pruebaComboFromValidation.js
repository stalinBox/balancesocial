var FormValidation = function () {

    var handleValidation1 = function() {
        

            var form1 = $('#formidoc');
            var error1 = $('.alert-error', form1);
            var success1 = $('.alert-success', form1);
			var combo = $('#combo');
			var errorcombo = $('.alert-error', combo);
            var successcombo = $('.alert-success', combo);
		
			alert("hoola");

            form1.validate({//Inicio 1
                errorElement: 'span', //default input error message container
                errorClass: 'help-inline', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {//rules inicio
                    nombreDoc:{
						minlength: 2,
                        required: true,
						regex: "^[a-zA-Z]",	
					  },
					
                },//rules fin
				
				
				 
                
            });//Fin 1
    }

    return {
        //función principal para iniciar el módulo
        init: function () {

            handleValidation1();

        },

	// función de contenedor para desplazarse a un elemento
        scrollTo: function (el, offeset) {
            pos = el ? el.offset().top : 0;
            jQuery('html,body').animate({
                    scrollTop: pos + (offeset ? offeset : 0)
                }, 'slow');
        }

    };

}();