jQuery(function($) {
  "use strict";
	
	  	$("#formProducto").validate({
   
		    rules: {
		        nombre:{required: true, minlength:5},
		        empresa:{required: true, minlength:2},
		        correo:{required: true},
		        telefono:{required: true},
		        mensaje:{required: true, minlength: 5}
		        },
	        messages: {
	            nombre: {
	                        required: "Este campo es requerido.",
	                        minlength: "Por favor, introduzca al menos 5 caracteres."
	                    },
	            empresa:{
	                        required: "Este campo es requerido.",
	                        minlength: "Por favor, introduzca al menos 2 caracteres."
	                    },
	            correo: {
	                        required: "Por favor, introduzca su correo",
	                        minlength: "Por favor, introduzca el @ ."
	                    },
	            mensaje: {
	                        required: "Este campo es requerido.",
	                        minlength: "Por favor, introduzca al menos 5 caracteres."
	                    },
	            telefono: "Por favor, introduzca datos numéricos"
        	},

	        submitHandler: function(form) {
				var $form = $(form),
					$error = $form.find('.error-container'),
					action  = $form.attr('action');
				$.ajax({
					data: {
						"recaptcha" : $('#g-recaptcha-response').val(),
						"nombre" : $('#fnombre').val(),
						"correo" : $('#fcorreo').val(),
						"telefono" : $('#ftelefono').val(),
						"empresa" : $('#fempresa').val(),
						"producto_id" : $('#fprodid').val(),
						"mensaje" : $('#fmensaje').val()
					},
					url: 'frontend/productos/enviarInformacion',
					dataType: "json",
					type: 'post',
					beforeSend: function () {
						$error.html("Procesando, espere por favor...");
					},
					success: function (response) {
						$error.html(response.msj);
						$error.slideDown('slow');
						if(response.status=='1'){
							$("#form-inputs").load(location.href+" #form-inputs>*","");
						}
						grecaptcha.reset();
					},
					error: function (xhr, ajaxOptions, thrownError) {
						$error.html('<div class="alert alert-danger">ERROR!</div>');
						$error.slideDown('slow');
					}
				});
			return false;
			}
    	});

		$("#formServicio").validate({
   
		    rules: {
		        nombre:{required: true, minlength:5},
		        empresa:{required: true, minlength:2},
		        correo:{required: true},
		        telefono:{required: true},
		        mensaje:{required: true, minlength: 5}
		        },
	        messages: {
	            nombre: {
	                        required: "Este campo es requerido.",
	                        minlength: "Por favor, introduzca al menos 5 caracteres."
	                    },
	            empresa:{
	                        required: "Este campo es requerido.",
	                        minlength: "Por favor, introduzca al menos 2 caracteres."
	                    },
	            correo: {
	                        required: "Por favor, introduzca su correo",
	                        minlength: "Por favor, introduzca el @ ."
	                    },
	            mensaje: {
	                        required: "Este campo es requerido.",
	                        minlength: "Por favor, introduzca al menos 5 caracteres."
	                    },
	            telefono: "Por favor, introduzca datos numéricos"
	        },
	        submitHandler: function(form) {
	        	var $form = $(form),
					$error = $form.find('.error-container'),
					action  = $form.attr('action');
				$.ajax({
					data: {
						"recaptcha" : $('#g-recaptcha-response').val(),
						"nombre" : $('#fnombre').val(),
						"correo" : $('#fcorreo').val(),
						"telefono" : $('#ftelefono').val(),
						"empresa" : $('#fempresa').val(),
						"servicio_id" : $('#fservid').val(),
						"mensaje" : $('#fmensaje').val()
					},
					url: 'frontend/servicios/enviarInformacion',
					dataType: "json",
					type: 'post',
					beforeSend: function () {
						$error.html("Procesando, espere por favor...");
					},
					success: function (response) {
						$error.html(response.msj);
						$error.slideDown('slow');
						if(response.status=='1'){
							$("#form-inputs").load(location.href+" #form-inputs>*","");
						}
						grecaptcha.reset();
					},
					error: function (xhr, ajaxOptions, thrownError) {
						$error.html('<div class="alert alert-danger">ERROR!</div>');
						$error.slideDown('slow');
					}
				});
				return false;
	        }
    	});

    	$("#formSoloServicio").validate({
   
		    rules: {
		        nombre:{required: true, minlength:5},
		        empresa:{required: true, minlength:2},
		        correo:{required: true},
		        telefono:{required: true},
		        mensaje:{required: true, minlength: 5}
		        },
	        messages: {
	            nombre: {
	                        required: "Este campo es requerido.",
	                        minlength: "Por favor, introduzca al menos 5 caracteres."
	                    },
	            empresa:{
	                        required: "Este campo es requerido.",
	                        minlength: "Por favor, introduzca al menos 2 caracteres."
	                    },
	            correo: {
	                        required: "Por favor, introduzca su correo",
	                        minlength: "Por favor, introduzca el @ ."
	                    },
	            mensaje: {
	                        required: "Este campo es requerido.",
	                        minlength: "Por favor, introduzca al menos 5 caracteres."
	                    },
	            telefono: "Por favor, introduzca datos numéricos"
	        },
	        submitHandler: function(form) {
	        	var $form = $(form),
					$error = $form.find('.error-container'),
					action  = $form.attr('action');
				$.ajax({
					data: {
						"recaptcha" : $('#g-recaptcha-response').val(),
						"nombre" : $('#fnombre').val(),
						"correo" : $('#fcorreo').val(),
						"telefono" : $('#ftelefono').val(),
						"empresa" : $('#fempresa').val(),
						"servicio_id" : $('#fservid').val(),
						"mensaje" : $('#fmensaje').val()
					},
					url: 'frontend/solo_servicios/enviarInformacion',
					dataType: "json",
					type: 'post',
					beforeSend: function () {
						$error.html("Procesando, espere por favor...");
					},
					success: function (response) {
						$error.html(response.msj);
						$error.slideDown('slow');
						if(response.status=='1'){
							$("#form-inputs").load(location.href+" #form-inputs>*","");
						}
						grecaptcha.reset();
					},
					error: function (xhr, ajaxOptions, thrownError) {
						$error.html('<div class="alert alert-danger">ERROR!</div>');
						$error.slideDown('slow');
					}
				});
				return false;
	        }
    	});
	/*$('#formServicio2').submit(function(){

		var $form = $(this),
			$error = $form.find('.error-container'),
			action  = $form.attr('action');
		$.ajax({
			data: {
				"recaptcha" : $('#g-recaptcha-response').val(),
				"nombre" : $('#fnombre').val(),
				"correo" : $('#fcorreo').val(),
				"telefono" : $('#ftelefono').val(),
				"empresa" : $('#fempresa').val(),
				"servicio_id" : $('#fservid').val(),
				"mensaje" : $('#fmensaje').val()
			},
			url: 'frontend/servicios/enviarInformacion',
			dataType: "json",
			type: 'post',
			beforeSend: function () {
				$error.html("Procesando, espere por favor...");
			},
			success: function (response) {
				$error.html(response.msj);
				$error.slideDown('slow');
				if(response.status=='1'){
					$("#form-inputs").load(location.href+" #form-inputs>*","");
				}
				grecaptcha.reset();
			},
			error: function (xhr, ajaxOptions, thrownError) {
				$error.html('<div class="alert alert-danger">ERROR!</div>');
				$error.slideDown('slow');
			}
		});
		return false;
	});*/
});

function fnSuscripcion() {
	var correo =  $("#sp-email").val().trim();
	var emailReg = /^[a-z][\w.-]+@\w[\w.-]+\.[\w.-]*[a-z][a-z]$/i;
	//var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  	if ((emailReg.test( correo )) && correo!=="") {
		$.ajax({
			data: {"correo" : correo},
			url: 'frontend/inicio/addSuscripcion',
			dataType: "json",
			type:  'post',
			success: function (response) {
				console.log(response);
				$('#msj-suscriptor').html('<span class="success">'+response.msj+'</span>');
			},
			error: function (xhr, ajaxOptions, thrownError) {
				$('#msj-suscriptor').html('<span class="error">'+response.msj+'</span>');
			}
		});
  	}else{
  		$('#msj-suscriptor').html('<span class="error">Correo inválido*</span>');
  	}
}