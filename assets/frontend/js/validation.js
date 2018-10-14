/* ========================================================================
 * Validacion de Formularios
 * ======================================================================== */

 $(document).ready(function(){ 

    /* Comentarios */
   /* $('#comentform').submit(function() {
    	name = $('#name').val();
    	email = $('#email').val();
    	message = $('#message').val();
        if(is.empty(name.trim())) {
        	$('.alerta').removeClass('alert-success');
            $('.alerta').addClass('alert-danger');
            $('.result').css({'display':'block'});
            $('.sc_infobox').css({'display':'block'});        
        	$('.alerta').text('¿Cuál es su nombre?');
        	$('#name').focus();
            return false;
        }
        else if(is.not.email(email) || is.empty(email.trim())) {
        	$('.alerta').removeClass('alert-success');
            $('.alerta').addClass('alert-danger');
            $('.result').css({'display':'block'});
            $('.sc_infobox').css({'display':'block'});
        	$('.alerta').text('¿Cuál es su correo electrónico?');
        	$('#email').focus();
            return false;
        }
        else if(is.empty(message.trim())) {
        	$('.alerta').removeClass('alert-success');
            $('.alerta').addClass('alert-danger');
            $('.result').css({'display':'block'});
            $('.sc_infobox').css({'display':'block'});
        	$('.alerta').text('Falta tu comentario...');
        	$('#message').focus();
            return false;
        }
        else {
            $.ajax({
              type: 'POST',
              url: $(this).attr('action'),
              data: $(this).serialize(),
              success: function(data) {
                var mensaje = data.split('|');
                if(mensaje[0] === 'success') {
                	$('.alerta').removeClass('alert-danger');
                    $('.result').css({'display':'block'});
                    $('.sc_infobox').css({'display':'block'});
                	$('.alerta').addClass('alert-success');
                	$('.alerta').text(mensaje[1]);
                  	$('#name, #email, #message').val('');
                }else {
                	$('.alerta').removeClass('alert-success');
                    $('.alerta').addClass('alert-danger');
                    $('.result').css({'display':'block'});
                    $('.sc_infobox').css({'display':'block'});
                  	$('.alerta').text(mensaje[1]);
                }
              }
            })
            return false;
        }
    });*/
    /* Contacto */
   /* $('#contactform').submit(function() {
    	nombre = $('#nombre').val();
    	correo = $('#correo').val();
    	asunto = $('#asunto').val();
    	mensaje = $('#mensaje').val();
    	captcha = $('#captcha').val();

        if(is.empty(nombre.trim())) {
        	$('.alerta').removeClass('alert-success');
            $('.alerta').addClass('alert-danger');
            $('.result').css({'display':'block'});
            $('.sc_infobox').css({'display':'block'});
        	$('.alerta').text('Coloque su nombre.');
        	$('#nombre').focus();
            return false;
        }
        else if(is.not.email(correo) || is.empty(correo.trim())) {
        	$('.alerta').removeClass('alert-success');
            $('.alerta').addClass('alert-danger');
            $('.result').css({'display':'block'});
            $('.sc_infobox').css({'display':'block'});
        	$('.alerta').text('Coloque su correo electrónico.');
        	$('#correo').focus();
            return false;
        }
        else if(is.empty(asunto.trim())) {
        	$('.alerta').removeClass('alert-success');
            $('.alerta').addClass('alert-danger');
            $('.result').css({'display':'block'});
            $('.sc_infobox').css({'display':'block'});
        	$('.alerta').text('Coloque el asunto del mensaje...');
        	$('#asunto').focus();
            return false;
        }
        else if(is.empty(mensaje.trim())) {
        	$('.alerta').removeClass('alert-success');
            $('.alerta').addClass('alert-danger');
            $('.result').css({'display':'block'});
            $('.sc_infobox').css({'display':'block'});
        	$('.alerta').text('Escribe tu mensaje...');
        	$('#mensaje').focus();
            return false;
        }
        else if(is.empty(captcha.trim())) {
        	$('.alerta').removeClass('alert-success');
            $('.alerta').addClass('alert-danger');
            $('.result').css({'display':'block'});
            $('.sc_infobox').css({'display':'block'});
        	$('.alerta').text('Debes ingresar el código de verificación...');
        	$('#captcha').focus();
            return false;
        }
        else {
            $.ajax({
              type: 'POST',
              url: $(this).attr('action'),
              data: $(this).serialize(),
              success: function(data) {
                var mensaje = data.split('|');
                if(mensaje[0] === 'success') {
                    $('.result').css({'display':'block'});
                    $('.sc_infobox').css({'display':'block'});
                	$('.alerta').removeClass('alert-danger');
                	$('.alerta').addClass('alert-success');
                	$('.alerta').text(mensaje[1]);
                  	$('#nombre, #correo, #mensaje, #telefono, #asunto, #captcha').val('');
                }else {
                    $('.result').css({'display':'block'});
                    $('.sc_infobox').css({'display':'block'});
                	$('.alerta').removeClass('alert-success');
                    $('.alerta').addClass('alert-danger');
                  	$('.alerta').text(mensaje[1]);
                }
              }
            })
            return false;
        }
    });*/
    /* Registro */
    /*$('#registerform').submit(function() {

        nombre = $('#firstname').val();
        apellidos = $('#lastname').val();
        correo = $('#email').val();
        telefono = $('#phone').val();
        direccion = $('#address').val();
        id_pais = $('#id_pais').val();
        id_estado = $('#id_estado').val();
        password = $('#password').val();
        repetir = $('#repassword').val();
        captcha = $('#captcha').val();

        if(is.empty(nombre.trim())) {
            $('.alerta').removeClass('alert-success');
            $('.alerta').addClass('alert-danger');
            $('.result').css({'display':'block'});
            $('.sc_infobox').css({'display':'block'});
            $('.alerta').text('Coloque su nombre.');
            $('#firstname').focus();
            return false;
        }
        else if(is.empty(apellidos.trim())) {
            $('.alerta').removeClass('alert-success');
            $('.alerta').addClass('alert-danger');
            $('.result').css({'display':'block'});
            $('.sc_infobox').css({'display':'block'});
            $('.alerta').text('Coloque sus apellidos.');
            $('#lastname').focus();
            return false;
        }
        else if(is.not.email(correo) || is.empty(correo.trim())) {
            $('.alerta').removeClass('alert-success');
            $('.alerta').addClass('alert-danger');
            $('.result').css({'display':'block'});
            $('.sc_infobox').css({'display':'block'});
            $('.alerta').text('Coloque su correo electrónico.');
            $('#email').focus();
            return false;
        }
        else if(is.empty(telefono.trim())) {
            $('.alerta').removeClass('alert-success');
            $('.alerta').addClass('alert-danger');
            $('.result').css({'display':'block'});
            $('.sc_infobox').css({'display':'block'});
            $('.alerta').text('Coloque su teléfono.');
            $('#phone').focus();
            return false;
        }
        else if(is.empty(direccion.trim())) {
            $('.alerta').removeClass('alert-success');
            $('.alerta').addClass('alert-danger');
            $('.result').css({'display':'block'});
            $('.sc_infobox').css({'display':'block'});
            $('.alerta').text('Ingrese su dirección.');
            $('#address').focus();
            return false;
        }
        else if( is.null(id_pais) || is.empty(id_pais.trim())) {
            $('.alerta').removeClass('alert-success');
            $('.alerta').addClass('alert-danger');
            $('.result').css({'display':'block'});
            $('.sc_infobox').css({'display':'block'});
            $('.alerta').text('Seleccione su pais.');
            $('#id_pais').focus();
            return false;
        }
        else if( is.null(id_estado) || is.empty(id_estado.trim())) {
            $('.alerta').removeClass('alert-success');
            $('.alerta').addClass('alert-danger');
            $('.result').css({'display':'block'});
            $('.sc_infobox').css({'display':'block'});
            $('.alerta').text('Seleccione su ciudad.');
            $('#id_estado').focus();
            return false;
        }
        else if(is.empty(password.trim())) {
            $('.alerta').removeClass('alert-success');
            $('.alerta').addClass('alert-danger');
            $('.result').css({'display':'block'});
            $('.sc_infobox').css({'display':'block'});
            $('.alerta').text('Coloque una contraseña para su cuenta.');
            $('#password').focus();
            return false;
        }
        else if(is.empty(repetir.trim())) {
            $('.alerta').removeClass('alert-success');
            $('.alerta').addClass('alert-danger');
            $('.result').css({'display':'block'});
            $('.sc_infobox').css({'display':'block'});
            $('.alerta').text('Repita su contraseña.');
            $('#repassword').focus();
            return false;
        }
        else if(password != repetir) {
            $('.alerta').removeClass('alert-success');
            $('.alerta').addClass('alert-danger');
            $('.result').css({'display':'block'});
            $('.sc_infobox').css({'display':'block'});
            $('.alerta').text('Las contraseñas no coinciden.');
            $('#repassword').focus();
            return false;
        }
        else if(is.empty(captcha.trim())) {
            $('.alerta').removeClass('alert-success');
            $('.alerta').addClass('alert-danger');
            $('.result').css({'display':'block'});
            $('.sc_infobox').css({'display':'block'});
            $('.alerta').text('Debes ingresar el código de verificación...');
            $('#captcha').focus();
            return false;
        }
        else {
            $.ajax({
              type: 'POST',
              url: $(this).attr('action'),
              data: $(this).serialize(),
              success: function(data) {
                var mensaje = data.split('|');
                if(mensaje[0] === 'success') {
                    $('.alerta').removeClass('alert-danger');
                    $('.result').css({'display':'block'});
                    $('.sc_infobox').css({'display':'block'});
                    $('.alerta').addClass('alert-success');
                    $('.alerta').html(mensaje[1]);
                    $('#firstname, #lastname, #email, #phone, #password, #repassword, #address, #captcha').val('');
                }else {
                    $('.alerta').removeClass('alert-success');
                    $('.alerta').addClass('alert-danger');
                    $('.result').css({'display':'block'});
                    $('.sc_infobox').css({'display':'block'});
                    $('.alerta').text(mensaje[1]);
                }
              }
            })
            return false;
        }
    });*/

    /*function getCiudades(id_pais){
        $.ajax({
            type: 'POST',
            url: 'frontend/ajax/selectCiudades',
            data: {id_pais: id_pais},
            dataType : 'json',
            success: function(json) {
                envio = json.dato;
                cad = envio.split("@@");
                num = cad[0];
                str = '';
                str = '<label class="required" for="contact_form_subj">Ciudad</label>';
                str += '<select name="id_estado" id="id_estado">';
                if(num>0)
                {
                   str += '<option value="" disabled selected>Ciudad</option>';
                   for(e=1; e<=num; e++)
                   {
                       dat=cad[e].split("$$");
                       id_estado = dat[0];
                       estado = dat[1];        
                       str += '<option value="'+id_estado+'">'+estado+'</option>';                   
                   }
                }
                else
                {
                    str += '<option value="" disabled selected>Ciudad</option>';
                }
                str += '</select>';
                $("#divCiudades").html(str);
            }
        })
    }*/

    /* Login */
    /*$('#loginform').submit(function() {
        correo = $('#correo').val();
        password = $('#password').val();
        if(is.not.email(correo) || is.empty(correo.trim())) {
            $('.alerta').removeClass('alert-success');
            $('.alerta').addClass('alert-danger');
            $('.result').css({'display':'block'});
            $('.sc_infobox').css({'display':'block'});
            $('.alerta').text('Coloque su correo electrónico.');
            $('#correo').focus();
            return false;
        }
        else if(is.empty(password.trim())) {
            $('.alerta').removeClass('alert-success');
            $('.alerta').addClass('alert-danger');
            $('.result').css({'display':'block'});
            $('.sc_infobox').css({'display':'block'});
            $('.alerta').text('Coloque la contraseña que utilizó al registrarse.');
            $('#password').focus();
            return false;
        }
        else {
            $.ajax({
              type: 'POST',
              url: $(this).attr('action'),
              data: $(this).serialize(),
              success: function(data) {
                var mensaje = data.split('|');
                if(mensaje[0] === 'success') {
                    location.href = mensaje[1];
                }else {
                    $('.alerta').removeClass('alert-success');
                    $('.alerta').addClass('alert-danger');
                    $('.result').css({'display':'block'});
                    $('.sc_infobox').css({'display':'block'});
                    $('.alerta').text(mensaje[1]);
                }
              }
            })
            return false;
        }
    });*/
    /* Actualiza datos personales */
    /*$('#updateform').submit(function() {
        nombre = $('#firstname').val();
        apellidos = $('#lastname').val();
        telefono = $('#phone').val();
        direccion = $('#address').val();
        password = $('#password').val();
        repetir = $('#repassword').val();

        if(is.empty(nombre.trim())){
            $('.alerta').removeClass('alert-success');
            $('.alerta').addClass('alert-danger');
            $('.result').css({'display':'block'});
            $('.sc_infobox').css({'display':'block'});
            $('.alerta').text('Coloque su nombre.');
            $('#firstname').focus();
            return false;
        }
        else if(is.empty(apellidos.trim())) {
            $('.alerta').removeClass('alert-success');
            $('.alerta').addClass('alert-danger');
            $('.result').css({'display':'block'});
            $('.sc_infobox').css({'display':'block'});
            $('.alerta').text('Coloque su apellidos.');
            $('#lastname').focus();
            return false;
        }
        else if(is.empty(telefono.trim())) {
            $('.alerta').removeClass('alert-success');
            $('.alerta').addClass('alert-danger');
            $('.result').css({'display':'block'});
            $('.sc_infobox').css({'display':'block'});
            $('.alerta').text('Coloque su teléfono.');
            $('#phone').focus();
            return false;
        }
        else if(is.empty(direccion.trim())) {
            $('.alerta').removeClass('alert-success');
            $('.alerta').addClass('alert-danger');
            $('.result').css({'display':'block'});
            $('.sc_infobox').css({'display':'block'});
            $('.alerta').text('Coloque su dirección.');
            $('#address').focus();
            return false;
        }
        else if(is.empty(password.trim())) {
            $('.alerta').removeClass('alert-success');
            $('.alerta').addClass('alert-danger');
            $('.result').css({'display':'block'});
            $('.sc_infobox').css({'display':'block'});
            $('.alerta').text('Coloque una contraseña para su cuenta.');
            $('#password').focus();
            return false;
        }
        else if(is.empty(repetir.trim())) {
            $('.alerta').removeClass('alert-success');
            $('.alerta').addClass('alert-danger');
            $('.result').css({'display':'block'});
            $('.sc_infobox').css({'display':'block'});
            $('.alerta').text('Repita su contraseña.');
            $('#repassword').focus();
            return false;
        }
        else if(password != repetir) {
            $('.alerta').removeClass('alert-success');
            $('.alerta').addClass('alert-danger');
            $('.result').css({'display':'block'});
            $('.sc_infobox').css({'display':'block'});
            $('.alerta').text('Las contraseñas no coinciden.');
            $('#repassword').focus();
            return false;
        }
        else {
            $.ajax({
              type: 'POST',
              url: $(this).attr('action'),
              data: $(this).serialize(),
              success: function(data) {
                var mensaje = data.split('|');
                if(mensaje[0] === 'success') {
                    $('.alerta').removeClass('alert-danger');
                    $('.alerta').addClass('alert-success');
                    $('.result').css({'display':'block'});
                    $('.sc_infobox').css({'display':'block'});
                    $('.alerta').html(mensaje[1]);
                }else {
                    $('.alerta').removeClass('alert-success');
                    $('.alerta').addClass('alert-danger');
                    $('.result').css({'display':'block'});
                    $('.sc_infobox').css({'display':'block'});
                    $('.alerta').text(mensaje[1]);
                }
              }
            })
            return false;
        }
    });*/

    /* Carro */
    /*function checkIt(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            status = "Este campo solo acepta números.";
            return false;
        }
        status = "";
        return true;
    }

    function validaAgregado(){
        cantidad = $('#cantidad').val();
        stock = $('#stock').val();
        if(cantidad == 0 || is.empty(cantidad.trim())){
            swal({
                title:'Ingresa una cantidad.',
                confirmButtonText: 'Aceptar',
                confirmButtonColor: '#1BB4B9'
            });
            return false;
        }else if(stock == 0){
            swal({
                title:'El producto esta agotado.',
                confirmButtonText: 'Aceptar',
                confirmButtonColor: '#1BB4B9'
            });
            return false;
        }else if( parseInt(cantidad) > parseInt(stock)){
            swal({
                title:'No hay suficiente stock del producto.',
                confirmButtonText: 'Aceptar',
                confirmButtonColor: '#1BB4B9'
            });
            return false;
        }
    }*/

    /*$('#continuar_compra').click(function(e) {
        e.preventDefault();
        swal({
          title: "Confirmación para continuar con la compra.",
          text: "Por favor revise si los productos que se encuentran en la lista y sus cantidades son los que desea adquirir. Si es así continúe.",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Continuar",
          cancelButtonText: "Revisar",
          closeOnConfirm: false
        },
        function(){
            $('#form-continuar-compra').submit();
        });
    });*/

    function deleteCarro() {
        swal({
          title: "NEW CMS",
          text: "Esta a punto de eliminar su pedido. ¿Esta seguro que desea continuar?",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Eliminar",
          cancelButtonText: "Cancelar",
          closeOnConfirm: false
        },
        function(){
            $.ajax({
                type: 'POST',
                url: 'frontend/ajax/eliminaCarro',
                data: { },
                dataType : 'json',
                success: function(resultado) {
                    rpt=resultado.dato;
                    if(rpt=='ok'){
                        $('.post_text_area').addClass('vacio');
                        $('.vacio').html('Su carrito está vacío. Dirígete a la sección de nuestros productos para realizar una nueva compra dando click <a href="productos">aquí</a>');
                        $('#numItem').text(resultado.num);
                        swal({
                                title: 'NEW CMS',
                                text: 'Su pedido ha sido eliminado.',
                                html: true,
                                confirmButtonText: 'Aceptar',
                                confirmButtonColor: '#1BB4B9',
                                type : 'success'
                            },
                            function(){}
                        );
                    }
                }
            });
        });
    }

    function goProductos(url) {
        $.ajax({
            type: 'POST',
            url: 'frontend/ajax/seguirAgregando',
            data: { },
            dataType : 'json',
            success: function(resultado) {
                rpt=resultado.dato;
                if(rpt=='ok')
                {
                    location.href = url;
                }
            }
        }); 
    }

    /*function aplicarCupon(){
        cupon = $('#cupon').val();
        if(is.empty(cupon.trim())){
            swal({
                    title: 'NEW CMS',
                    text: 'Debe ingresar el código de descuento.',
                    html: true,
                    confirmButtonText: 'Aceptar',
                    confirmButtonColor: '#1BB4B9',
                },
                function(){
                    $("#cupon").focus();
                    return false;
                }
            );
        }else{
            $.ajax({
                    type: 'POST',
                    url: 'frontend/ajax/aplicarDescuento',
                    data: {
                        cupon : cupon
                    },
                    dataType : 'json',
                    success: function(resultado) {
                        rpt = resultado.msg;
                        if(rpt=='ok'){
                            swal({
                                    title: 'NEW CMS',
                                    text: 'El cupon de descuento fue aplicado a los precios del carrito correctamente.',
                                    html: true,
                                    confirmButtonText: 'Aceptar',
                                    confirmButtonColor: '#1BB4B9',
                                    type : 'success'
                                },
                                function(){
                                    $("#list_car").load(location.href+" #list_car>*","");
                                    $('#cupon').val('');
                                }
                            );
                        }else if(rpt == 'not'){
                            swal({
                                    title: 'NEW CMS',
                                    text: 'El codigo de descuento expiró o no existe.',
                                    html: true,
                                    confirmButtonText: 'Aceptar',
                                    confirmButtonColor: '#1BB4B9',
                                },
                                function(){
                                    $('#cupon').val('');
                                    $("#cupon").focus();
                                    return false;
                                }
                            );
                        }else if(rpt == 'rep'){
                            swal({
                                    title: 'NEW CMS',
                                    text: 'El codigo de descuento ya fue utilizado para este carro.',
                                    html: true,
                                    confirmButtonText: 'Aceptar',
                                    confirmButtonColor: '#1BB4B9',
                                },
                                function(){
                                    $('#cupon').val('');
                                    $("#cupon").focus();
                                    return false;
                                }
                            );
                        }else if(rpt == 'no-prod'){
                            swal({
                                    title: 'NEW CMS',
                                    text: 'El producto no se encuentra en la lista de compra.',
                                    html: true,
                                    confirmButtonText: 'Aceptar',
                                    confirmButtonColor: '#1BB4B9',
                                },
                                function(){
                                    $('#cupon').val('');
                                    $("#cupon").focus();
                                    return false;
                                }
                            );
                        }else if(rpt == 'no-cat'){
                            swal({
                                    title: 'NEW CMS',
                                    text: 'No hay productos de la categoría a la que quiere aplicar el código de descuento.',
                                    html: true,
                                    confirmButtonText: 'Aceptar',
                                    confirmButtonColor: '#1BB4B9',
                                },
                                function(){
                                    $('#cupon').val('');
                                    $("#cupon").focus();
                                    return false;
                                }
                            );
                        }

                    }
            });  

        }  
    }*/

    $('#tyc').click(function(e) {
        
        if($('#tyc').prop('checked')){
            $('#botonPagar').removeAttr("disabled");
        }else{
            $('#botonPagar').attr("disabled", true);
        }
    });


    function cargaPrecioTalla(id_producto){
        $.ajax({
            type: 'POST',
            url: 'frontend/ajax/cargaPrecioTalla',
            data: {id_producto: id_producto},
            dataType : 'json',
            success: function(json) {
                precio = json.precio;
                precio_oferta = json.precio_oferta;
                talla = json.talla;
                stock = json.stock;

                if(precio_oferta == 0.00){
                    $('#precio_mostrar').html('S./ ' + precio);
                    $('#precio_oferta_mostrar').html('');
                    $('.precio-ori').removeClass('precio-old');
                    $('.precio-ofe').addClass('hidden-precio');
                    $('#precio').val(precio);
                }else{
                    $('#precio_mostrar').html('S./ ' + precio);
                    $('#precio_oferta_mostrar').html('S./ ' + precio_oferta);
                    $('.precio-ori').addClass('precio-old');
                    $('.precio-ofe').removeClass('hidden-precio');
                    $('#precio').val(precio_oferta);
                }

                $('#id_producto').val(id_producto);
                $('#talla').val(talla);
                $('#stock_talla').html(stock);
                $('#stock').val(stock);
            }
        }); 
    }

});
function deleteItem(id) {
    swal({
        title: "NEW CMS",
        text: "¿Está seguro que desea eliminar el item?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Si",
        cancelButtonText: "No",
        closeOnConfirm: false
    },
    function(){
        $.ajax({
            type: 'POST',
            url: 'frontend/ajax/eliminaItemCarro',
            data: { id: id},
            dataType : 'json',
            success: function(resultado) {
                rpt=resultado.dato;
                if(rpt == 'ok'){
                    swal({
                        title: 'NEW CMS',
                        text: 'El item fue eliminado.',
                        html: true,
                        confirmButtonText: 'Aceptar',
                        confirmButtonColor: '#1BB4B9',
                        type : 'success'
                    },function(){}
                    );
                    $("#list_car").load(location.href+" #list_car>*","");
                    $('#numItem').text(resultado.num);
                    if(resultado.num == 0){
                        $('.post_text_area').addClass('vacio');
                        $('.vacio').html('Su carrito está vacío. Dirígete a la sección de nuestros productos para realizar una nueva compra dando click <a href="productos">aquí</a>');
                    }
                }
            }
        });
    });
}
function updateCantidad(id) {
    aux =  $("#cant_"+id).val();
    producto_id =  $("#prodID_"+id).val();
    atributo_id =  $("#atributo_"+id).val();
    cantidad = parseInt(aux);
    if( cantidad == 0 || isNaN(cantidad) || (aux.trim()) === '' ) {
        swal({
            title: 'SERVITEX',
            text: 'Debes ingresar una cantidad.',
            html: true,
            confirmButtonText: 'Aceptar',
            confirmButtonColor: '#1BB4B9',
            },
            function(){
                $("#cant_"+id).focus();
                return false;
            }
        );
    }else {
        $.ajax({
            type: 'POST',
            url: 'frontend/ajax/actualizaCarro',
            data: {
                carro_id:id,
                cantidad:cantidad,
                atributo_id:atributo_id,
                producto_id:producto_id
            },
            dataType : 'json',
            success: function(resultado) {
                if (resultado.estado == 2){
                    swal("Mensaje", resultado.mensaje , "warning");
                }else{
                    $("#detalleProducto").submit();
                    rpt = resultado.dato;
                    new_cantidad = resultado.new_cantidad;
                    new_subtotal = resultado.new_subtotal;
                    new_total = resultado.new_total;
                    if(rpt=='ok'){
                        swal({
                            title: 'NEW CMS',
                            text: 'El Item fue actualizado satisfactoriamente.',
                            html: true,
                            confirmButtonText: 'Aceptar',
                            confirmButtonColor: '#1BB4B9',
                            type : 'success'
                            },
                            function(){
                                $("#list_car").load(location.href+" #list_car>*","");
                                $('#cant_'+id).val(new_cantidad);
                                $('#new_subtotal_'+id).text(new_subtotal);
                                $('#new_total').text(new_total);
                            }
                        );
                    }
                }
            }
        });     
    }
}

function atributosAjax(){
    $.ajax({
        data:  {"atributo_id" : $("#selectAtributos").val(), "producto_id" : $("#productoID").val() },
        url:   'frontend/productos/getDatoAtributo',
        dataType: "json",
        type:  'post',
        success:  function (response) {
            if (response.estado == 1){
                $('#precio').text(response.d_precio);
                $('#precioOferta').text(response.d_precio_oferta);
                $('#inputPrecio').val(response.precio);
                if (response.cantidad < 1) {
                    $('#msjStock').text("agotado");
                }else{
                    $('#msjStock').text(response.cantidad);
                }
            }                           
        },
        error: function (xhr, ajaxOptions, thrownError) {
            swal("¡Error al borrar!", "Inténtalo de nuevo", "error");
        }
    });
}

function colorPrecioAjax(codigo){
    $.ajax({
        data:  {"atributo_id" : codigo, "producto_id" : $("#productoID").val() },
        url:   'frontend/productos/getDatoAtributo',
        dataType: "json",
        type:  'post',
        success:  function (response) {
            if (response.estado == 1){
                $('#precio').text(response.d_precio);
                $('#precioOferta').text(response.d_precio_oferta);
                $('#inputPrecio').val(response.precio);
                if (response.cantidad < 1) {
                    $('#msjStock').text("agotado");
                }else{
                    $('#msjStock').text(response.cantidad);
                    $('#selectAtributos').val(codigo);
                }
            }                           
        },
        error: function (xhr, ajaxOptions, thrownError) {
            swal("¡Error al borrar!", "Inténtalo de nuevo", "error");
        }
    });
}

$("#btnAddCar").click(function() {
    atributo = $("#selectAtributos").val();
    stock = $("#inputCantidad").val();
    productoID = $("#productoID").val();
    if ($("#selectAtributos").length > 0) {
        if (atributo == '' || atributo == '0' || atributo < 1) {
            swal("Mensaje", "Seleccione un atributo del producto", "warning");
            return false;
        }
    }else{
        $("#detalleProducto").submit();
    }
    /*$.ajax({
        data:  {"atributo_id" : atributo, "producto_id" : productoID, "stock": stock},
        url:   'frontend/productos/verificarStock',
        dataType: "json",
        type:  'post',
        beforeSend: function () {
        },
        success:  function (response) {
            if (response.estado == 2){
                swal("Mensaje", response.mensaje , "warning");
            }else{
                $("#detalleProducto").submit();
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            swal("¡Error!", "Inténtalo de nuevo", "error");
        }
    });*/
});


$("#formCliente").validate({
    rules: {
        nombres:{required: true},
        apellidos:{required: true},
        correo:{required: true,email: true},
        telefono:{required: true},
        password: { 
            required: true,
            minlength: 6,
            maxlength: 10,
        } , 
        cfmPassword: { 
            equalTo: "#password",
            minlength: 6,
            maxlength: 10
        }
    },
    messages:{
        nombres: {required: "Este campo es requerido."},
        apellidos: {required: "Este campo es requerido."},
        correo: {required: "Este campo es requerido.",email: "Por favor, introduce una dirección de correo electrónico válida."},
        telefono: {required: "Este campo es requerido."},
        password: { 
            required:"Este campo es requerido.",
            minlength:"Introduzca al menos 6 caracteres."
        },
        cfmPassword:{equalTo:"Por favor, introduzca el mismo valor."}
    }
});

  // $("#formServicio").validate({
   
  //     rules: {
  //       nombre:{required: true, minlength:5},
  //       empresa:{required: true, minlength:2},
  //       correo:{required: true},
  //       telefono:{required: true},
  //       mensaje:{required: true, minlength: 5}
  //       },
  //       messages: {
  //           nombre: {
  //                       required: "Este campo es requerido.",
  //                       minlength: "Por favor, introduzca al menos 5 caracteres."
  //                   },
  //           empresa:{
  //                       required: "Este campo es requerido.",
  //                       minlength: "Por favor, introduzca al menos 2 caracteres."
  //                   },
  //           correo: {
  //                       required: "Por favor, introduzca su correo",
  //                       minlength: "Por favor, introduzca el @ ."
  //                   },
  //           mensaje: {
  //                       required: "Este campo es requerido.",
  //                       minlength: "Por favor, introduzca al menos 5 caracteres."
  //                   },
  //           telefono: "Por favor, introduzca datos numéricos"
  //       }

  //   });

  $("#formArticulo").validate({
   
        rules: {
        nombre: {required: true, minlength:5},
        correo: {required: true},
        comentario: {required: true, minlength: 5}
        },

        messages: {
            nombre: {
                        required: "Este campo es requerido.",
                        minlength: "Por favor, introduzca al menos 5 caracteres."
                    },
            correo: {
                        required: "Por favor, introduzca su correo",
                        minlength: "Por favor, introduzca el @ ."
                    },
            comentario: {
                        required: "Este campo es requerido.",
                        minlength: "Por favor, introduzca al menos 5 caracteres."
                    }
        }

    });

  $("#formContactenos").validate({
   
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
        }

    });

  // $("#formProducto").validate({
   
  //     rules: {
  //       nombre:{required: true, minlength:5},
  //       empresa:{required: true, minlength:2},
  //       correo:{required: true},
  //       telefono:{required: true},
  //       mensaje:{required: true, minlength: 5}
  //       },
  //       messages: {
  //           nombre: {
  //                       required: "Este campo es requerido.",
  //                       minlength: "Por favor, introduzca al menos 5 caracteres."
  //                   },
  //           empresa:{
  //                       required: "Este campo es requerido.",
  //                       minlength: "Por favor, introduzca al menos 2 caracteres."
  //                   },
  //           correo: {
  //                       required: "Por favor, introduzca su correo",
  //                       minlength: "Por favor, introduzca el @ ."
  //                   },
  //           mensaje: {
  //                       required: "Este campo es requerido.",
  //                       minlength: "Por favor, introduzca al menos 5 caracteres."
  //                   },
  //           telefono: "Por favor, introduzca datos numéricos"
  //       }

  //   });