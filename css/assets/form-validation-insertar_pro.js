var FormValidation = function () {

    var handleValidation1 = function() {
        // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation
			//alert('hooola');
            var form1 = $('#formIpro');
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
                    nombre:{
						minlength: 2,
                        required: true,
						regex: "^[a-zA-Z]",	
					},
					
					
                    email: {
                        //required: true,
                        email: true
                    },
                    
                    number: {
                        required: true,
                        number: true
                    },
                    
                    digitos: {
                        required: true,
                        digits: true
                    },
					
					exteLabora:{
						minlength: 2,
                        required: true,
						regex: "^[a-zA-Z]",	
					},
					
					carreLabora:{
						minlength: 2,
                        required: true,
						regex: "^[a-zA-Z]",	
					},
					
					
					tituloPreDoc:{
						minlength: 2,
                        required: true,
						regex: "^[a-zA-Z]",	
					},
					
					tituloPosDoc:{
						minlength: 2,
                        required: true,
						regex: "^[a-zA-Z]",	
					},
					
					observacion:{
						minlength: 2,
                        required: true,
						regex: "^[a-zA-Z]",	
					},
					estado: {
                        required: true
                    },
					tip_pro: {
                        required: true
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
					'&cod_pro='+$('#cod_pro').val()+
					'&nom_pro='+$('#nom_pro').val()+
					'&obje_pro='+$('#obje_pro').val()+
					'&stado_pro='+$('#stado_pro').val()+
					
					'&obser_pro='+$('#obser_pro').val()+
					'&gasto_uni_pro='+$('#gasto_uni_pro').val()+
					'&gasto_horas_pro='+$('#gasto_horas_pro').val()+
					'&gasto_tota='+$('#gasto_tota').val()+
					'&car_ext='+$('#car_ext').val()+
					
					'&fecha_ini_inscripcion='+$('#fecha_ini_inscripcion').val()+
					'&fecha_ini_planificada='+$('#fecha_ini_planificada').val()+
					'&fecha_fin_planificada='+$('#fecha_fin_planificada').val()+
					'&fecha_entrega_infor_final='+$('#fecha_entrega_infor_final').val()+
					'&estudiantes_pro='+$('#estudiantes_pro').val()+
					'&tip_pro='+$('#tip_pro').val()+
					
					'&jefe_pro='+$('#jefe_pro').val()+
					'&correo_jefe_pro='+$('#correo_jefe_pro').val()+
					'&fono_jefe_pro='+$('#fono_jefe_pro').val()+
					'&nom_car='+$('#nom_car').val()+
					'&dedi_pro='+$('#dedi_pro').val()+
					'&hAsig_pro='+$('#hAsig_pro').val()
					;
					
					/*alert('&cod_pro='+$('#cod_pro').val());
					alert('&tip_pro='+$('#tip_pro').val());*/
					
					$.ajax({
                	 	type: "POST",
                	 	url:"../Proyectos/guardar_pro.php",
                	 	data: dataString,
                	 	success: function(data){
                    		$(".block-content collapse in").html(data);
                    		$(".block-content collapse in").show();
                    		$("#formIpro").hide();
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