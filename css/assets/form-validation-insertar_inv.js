var FormValidation = function () {

    var handleValidation1 = function() {
        // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation

            var form1 = $('#formiinv');
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
                   cedula: {
						 number: true,
						minlength: 10,
                    },
					 pasaporte: {
						 number: true,
						// minlength: 13,
						//required: true,
                    },
                    nombre:{
						minlength: 2,
                        required: true,
						regex: "^[a-zA-Z]",	
					},
					apellido:{
						minlength: 2,
                        required: true,
						regex: "^[a-zA-Z]",	
					},
					nacionalidad:{
						minlength: 2,
                       // required: true,
						regex: "^[a-zA-Z]",	
					},
					ciudad:{
						minlength: 2,
                        //required: true,
						regex: "^[a-zA-Z]",	
					},
					direccion:{
						minlength: 2,
                        //required: true,
						regex: "^[a-zA-Z]",	
					},
					
					 telefono: {
						 number: true,
						// minlength: 10,
						//required: true,
                     },
					celular: {
						number: true,
						//minlength: 7,
						//required: true,
                     },
					observacion:{
						minlength: 2,
                       // required: true,
						regex: "^[a-zA-Z]",	
					},
					 email: {
                        required: true,
                        email: true
                    },
					
					seleccione: {
                        required: true
                    }
					
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
					var dataString = 
					'&cod_inv='+$('#cod_inv').val()+
					'&ci_inv='+$('#ci_inv').val()+
					'&past_inv='+$('#past_inv').val()+
					'&nom_inv='+$('#nom_inv').val()+
					'&apel_inv='+$('#apel_inv').val()+
					'&naci_inv='+$('#naci_inv').val()+
					'&ciud_inv='+$('#ciud_inv').val()+
					'&dire_inv='+$('#dire_inv').val()+
					'&corr_inv='+$('#corr_inv').val()+
					'&tele_inv='+$('#tele_inv').val()+
					'&cargo_inv='+$('#cargo_inv').val()+
					'&obs_inv='+$('#obs_inv').val();
					//alert('&observa='+$('#observa').val());
            		$.ajax({
                	type: "POST",
                	url:"../Invitados/guardar_inv.php",
                	data: dataString,
                	success: function(data){
                    	$(".block-content collapse in").html(data);
                    	$(".block-content collapse in").show();
                    	$("#formiinv").hide();
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