var FormValidation = function () {

    var handleValidation1 = function() {
        // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation

            var form1 = $('#formif');
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
                    actividad:{
						minlength: 2,
                        required: true,
						regex: "^[a-zA-Z]",	
					},
					resultados:{
						minlength: 2,
                        required: true,
						regex: "^[a-zA-Z]",	
					},
					observacion:{
						minlength: 2,
                        required: true,
						regex: "^[a-zA-Z]",	
					},
					proyectos: {
                        required: true
                    },
					actividades: {
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
					'&cod_mat_seg='+$('#cod_mat_seg').val()+
					'&acti_desa_mat_seg='+$('#acti_desa_mat_seg').val()+
					'&resu_mat_seg='+$('#resu_mat_seg').val()+
					'&fech_ini_mat_seg='+$('#fech_ini_mat_seg').val()+
					'&fech_fin_mat_seg='+$('#fech_fin_mat_seg').val()+
					'&cod_pro='+$('#cod_pro').val()+
					'&codigo='+$('#codigo').val();
					
					//alert('&codigo='+$('#codigo').val());
					//alert('&fech_fin_mat_seg='+$('#fech_fin_mat_seg').val());
					//alert('&cod_mat_seg='+$('#cod_mat_seg').val());
            		$.ajax({
                	type: "POST",
                	url:"../matrizSeguimiento/modificar2_ma.php",
                	data: dataString,
                	success: function(data){
                    	$(".block-content collapse in").html(data);
                    	$(".block-content collapse in").show();
                    	$("#formif").hide();
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