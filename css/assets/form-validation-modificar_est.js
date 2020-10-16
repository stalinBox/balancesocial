var FormValidation = function () {

    var handleValidation1 = function() {
        // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation

            var form1 = $('#formmest');
            var error1 = $('.alert-error', form1);
            var success1 = $('.alert-success', form1);
			
			$.validator.addMethod("regex",function(value, element, regexp){
			var re=new RegExp(regexp);
			return this.optional(element)||re.test(value);
			},"solo letras");

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-inline', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    nombreEst:{
						minlength: 2,
                        required: true,
						regex: "^[a-zA-Z]",	
					},
					apellidoEst:{
						minlength: 2,
                        required: true,
						regex: "^[a-zA-Z]",	
					},
					
					nacionalidadEst:{
						minlength: 2,
                        required: true,
						regex: "^[a-zA-Z]",	
					},
					ciudadEst:{
						minlength: 2,
                        required: true,
						regex: "^[a-zA-Z]",	
					},
					
					direcciEst:{
						//minlength: 2,
                        //required: true,
						regex: "^[a-zA-Z]",	
					},
					
                    email: {
                        
                        email: true
                    },
                    
                    number: {
                        required: true,
                        number: true
                    },
                    
                    
					carrerasEst:{
						minlength: 2,
                        required: true,
						regex: "^[a-zA-Z]",	
					},
					
					observacionEst:{
						minlength: 2,
                        required: true,
						regex: "^[a-zA-Z]",	
					},
					
					
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success1.hide();
                    error1.show();
                    FormValidation.scrollTo(error1, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.help-inline').removeClass('ok'); // display OK icon
                    $(element)
                        .closest('.control-group').removeClass('success').addClass('error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.control-group').removeClass('error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .addClass('valid').addClass('help-inline ok') // mark the current input as valid and display OK icon
                    .closest('.control-group').removeClass('error').addClass('success'); // set success class to the control group
                },

                submitHandler: function (form) {
                    success1.show();
                    error1.hide();
                },
				 submitHandler: function (form) {
                    success1.show();
                    error1.hide();
					var dataString = 
					'&cod_est='+$('#cod_est').val()+
					'&cedula_est='+$('#cedula_est').val()+
					'&pasaport_doc='+$('#pasaport_doc').val()+
					'&nombre_est='+$('#nombre_est').val()+
					'&apel_est='+$('#apel_est').val()+
					'&nacionali_est='+$('#nacionali_est').val()+
					'&ciudad_est='+$('#ciudad_est').val()+
					'&direcci_est='+$('#direcci_est').val()+
					'&telefo_est='+$('#telefo_est').val()+
					'&celu_est='+$('#celu_est').val()+
					'&correo_est='+$('#correo_est').val()+
					'&observa='+$('#observa').val();
					
					 $.ajax({
                	 type: "POST",
                	 url:"../Estudiantes/modificar2_est.php",
                	 data: dataString,
                	 success: function(data){
                    	$(".block-content collapse in").html(data);
                    	$(".block-content collapse in").show();
                    	$("#formmest").hide();
                	}
            		});
	
                }
            });
    }

    return {
        //main function to initiate the module
        init: function () {

            handleValidation1();

        },

	// wrapper function to scroll to an element
        scrollTo: function (el, offeset) {
            pos = el ? el.offset().top : 0;
            jQuery('html,body').animate({
                    scrollTop: pos + (offeset ? offeset : 0)
                }, 'slow');
        }

    };

}();