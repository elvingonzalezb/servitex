/*function actualizarEstado(){
	$.post("<?php echo Router::url(array('controller'=>'pedidos','action'=>'add', 'admin'=>false)); ?>", // Ruta hacia donde enviaremos el token vía POST
		{token: Culqi.token.id},
		function(data){
			var obj = JSON.parse(data);
			console.log(data);
			if (obj.type=='venta_exitosa') {
				window.location.href = "<?php echo Router::url(array('controller'=>'pedidos','action'=>'confirmacion', 'admin'=>false)); ?>";
				$("#ok-culqi").html("<div class='alert alert-success'><p>"+obj.user_message+"</p></div>");
				$("#ok-culqi").show();
				$(".culqi_ajax").hide();
				alert('¡Todo en orden! Token enviado.');
			} else {
				$("#error-culqi").html("<div class='alert alert-danger'><h3>"+obj.user_message+"</h3></div>");
				$("#error-culqi").show();
			}
		}
	);
}*/
									      