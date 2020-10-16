var FormValidation = function () {

    var handleValidation1 = function() {
        // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation
			//alert('hoola');
            var form1 = $('#formMdoc');
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
                       // required: true,
                        number: true,
						//minlength: 10,
                    },
					pasaporte: {
                       // required: true,
                        number: true,
						//minlength: 13,
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
                      //  required: true,
						regex: "^[a-zA-Z]",	
					},
					ciudad:{
						minlength: 2,
                       // required: true,
						regex: "^[a-zA-Z]",	
					},
					 telefono: {
                       // required: true,
                        number: true,
						//minlength: 15,
                    },
					 celular: {
                       // required: true,
                        number: true,
						///minlength: 10,
                    },
					 email: {
                        //required: true,
                        email: true
                    },
					 
					semestres: {
                        required: true
                    },
					
					observacion:{
						minlength: 2,
                       // required: true,
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
					var dataString = 
					'&cod_doc='+$('#cod_doc').val()+
					'&ci_doc='+$('#ci_doc').val()+
					'&pasaport_doc='+$('#pasaport_doc').val()+
					'&nom_doc='+$('#nom_doc').val()+
					'&apel_doc='+$('#apel_doc').val()+
					'&nacio_doc='+$('#nacio_doc').val()+
					'&ciud_doc='+$('#ciud_doc').val()+
					'&tele_doc='+$('#tele_doc').val()+
					'&celu_doc='+$('#celu_doc').val()+
					'&core_doc='+$('#core_doc').val()+
					'&fechnaci_doc='+$('#fechnaci_doc').val()+
					'&titpre_doc='+$('#titpre_doc').val()+
					'&titpos_doc='+$('#titpos_doc').val()+
					'&obse_doc='+$('#obse_doc').val()+
					'&cod_sem='+$('#cod_sem').val();
					//alert('&cod_doc='+$('#cod_doc').val());
					//alert('&nacio_doc='+$('#nacio_doc').val());
            		$.ajax({
                	type: "POST",
                	url:"../Docentes/modificar2_doc.php",
                	data: dataString,
                	success: function(data){
                    	$(".block-content collapse in").html(data);
                    	$(".block-content collapse in").show();
                    	$("#formMdoc").hide();
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