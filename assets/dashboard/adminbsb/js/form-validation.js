(function ($) {
    $.validator.setDefaults({ ignore: ":hidden:not(.chosen-select) + :hidden:not(#ckeditor)" })
    'use strict';
    $(document).ready(function () {
        //Init checkboxes;
        $('input[type="checkbox"],input[type="radio"]').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green'
        });

        //Form validations
        
        $("#formServicios").validate({
            rules: {
                'nombre': {minlength: 2 },
                'descripcion': { minlength: 5 },
                'orden': {number: true , min: 1 }, 
                'destacado': {number: true },
                'url': {solotexto: true }               
            },
            messages: {
                categoria_id: "Por favor, seleccione una categoria",
                nombre: {
                    required: "Por favor, introduzca el nombre del servicio",
                    minlength: "Por favor, introduzca al menos 2 caracteres."
                },
                url: {
                    required: "Por favor, introduzca su url",
                    solotexto: "Url no válido"
                },
                descripcion: {
                    required: "Por favor, introduzca su descripcion",
                    minlength: "Por favor, introduzca al menos 5 caracteres."
                },    
                orden: "Por favor, introduzca datos numéricos",
                destacado : "Por favor, introduzca datos numéricos 1:destacado / 0:no destacado",
                estado: "Por favor, seleccione un estado",
                imagen: "Por favor, introduzca su imagen",
                seo_title: "Por favor, introduzca su titulo",
                seo_keywords: "Por favor, introduzca su keywords",
                seo_description: "Por favor, introduzca su descripción"
            },
            highlight: function (element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function (element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            errorPlacement: function (error, element) {
                try {
                    var isCheckboxOrRadio = $(element).attr('type') !== undefined && ($(element).attr('type').toLowerCase() === 'radio' || $(element).attr('type').toLowerCase() === 'radio');

                    if (isCheckboxOrRadio) {
                        element.parents('.form-group').append(error);
                    } else {
                        element.after(error);
                    }
                } catch (e) { }
            }
        });

        $("#formSecciones").validate({
            rules: {
                'titulo': {minlength: 2 },
                // 'descripcion': { required: function() { CKEDITOR.instances.descripcion.updateElement(); }, minlength: 5 },            
                'orden': {number: true , min: 1 },
                'destacado': {number: true },
                'url': {solotexto: true }
            },
            messages: {
                titulo: {
                    required: "Por favor, introduzca su tìtulo",
                    minlength: "Por favor, introduzca al menos 2 caracteres."
                },
                url: {
                    required: "Por favor, introduzca su url",
                    solotexto: "Url no válido"
                },
                descripcion: {
                    required: "Por favor, introduzca su descripciòn",
                    minlength: "Por favor, introduzca al menos 5 caracteres."
                },
                orden: "Por favor, introduzca datos numéricos",
                destacado : "Por favor, seleccione",
                autor: {
                    required: "Por favor, introduzca el autor",
                    minlength: "Por favor, introduzca al menos 2 caracteres."
                },
                estado: "Por favor, seleccione un estado",
                imagen:"Por favor, introduzca su imagen",
                seo_title: "Por favor, introduzca su title",
                seo_keywords: "Por favor, introduzca su keywords",
                seo_description: "Por favor, introduzca su descripción"
            },
            highlight: function (element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function (element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            errorPlacement: function (error, element) {
                try {
                    var isCheckboxOrRadio = $(element).attr('type') !== undefined && ($(element).attr('type').toLowerCase() === 'radio' || $(element).attr('type').toLowerCase() === 'radio');

                    if (isCheckboxOrRadio) {
                        element.parents('.form-group').append(error);
                    } else {
                        element.after(error);
                    }
                } catch (e) { }
            }
        });

        $("#formArticulos").validate({
            rules: {
                'nombre': {minlength: 2 },
                // 'descripcion': { required: function() { CKEDITOR.instances.descripcion.updateElement(); }, minlength: 5 },            
                'orden': {number: true , min: 1 },
                'destacado': {number: true },
                'url': {solotexto: true }
            },
            messages: {
                nombre: {
                    required: "Por favor, introduzca su titulo",
                    minlength: "Por favor, introduzca al menos 2 caracteres."
                },
                url: {
                    required: "Por favor, introduzca su url",
                    solotexto: "Url no válido"
                },
                descripcion: {
                    required: "Por favor, introduzca su description",
                    minlength: "Por favor, introduzca al menos 5 caracteres."
                },
                orden: "Por favor, introduzca datos numéricos",
                destacado : "Por favor, seleccione",
                autor: {
                    required: "Por favor, introduzca el autor",
                    minlength: "Por favor, introduzca al menos 2 caracteres."
                },
                estado: "Por favor, seleccione un estado",
                imagen:"Por favor, introduzca su imagen",
                seo_title: "Por favor, introduzca su titulo",
                seo_keywords: "Por favor, introduzca su keywords",
                seo_description: "Por favor, introduzca su descripción"
            },
            highlight: function (element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function (element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            errorPlacement: function (error, element) {
                try {
                    var isCheckboxOrRadio = $(element).attr('type') !== undefined && ($(element).attr('type').toLowerCase() === 'radio' || $(element).attr('type').toLowerCase() === 'radio');

                    if (isCheckboxOrRadio) {
                        element.parents('.form-group').append(error);
                    } else {
                        element.after(error);
                    }
                } catch (e) { }
            }
        });

        $("#formDejarComentario").validate({
            rules: {
                'nombre': {minlength: 2 },
                'comentario': {minlength: 2 },
                'respuesta': {minlength: 2 }
            },
            messages: {
                nombre: {
                    required: "Por favor, introduzca su pregunta",
                    minlength: "Por favor, introduzca al menos 2 caracteres."
                },
                comentario: {
                    required: "Por favor, introduzca el comentario",
                    minlength: "Por favor, introduzca al menos 2 caracteres."
                },
                respuesta: {
                    required: "Por favor, introduzca su respuesta",
                    minlength: "Por favor, introduzca al menos 2 caracteres."
                },
                correo :{
                    required: "Por favor, introduzca su correo",
                    minlength: "Por favor, introduzca el @ ."
                },
                estado: "Por favor, seleccione un estado"
            },
            highlight: function (element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function (element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            errorPlacement: function (error, element) {
                try {
                    var isCheckboxOrRadio = $(element).attr('type') !== undefined && ($(element).attr('type').toLowerCase() === 'radio' || $(element).attr('type').toLowerCase() === 'radio');

                    if (isCheckboxOrRadio) {
                        element.parents('.form-group').append(error);
                    } else {
                        element.after(error);
                    }
                } catch (e) { }
            }
        });
        
        $("#formPrgFrecuentes").validate({
            rules: {
                'pregunta': {minlength: 2 },
                'orden': {number: true , min: 1 } 
            },
            messages: {
                pregunta: {
                    required: "Por favor, introduzca su pregunta",
                    minlength: "Por favor, introduzca al menos 2 caracteres."
                },
                 respuesta: {
                    required: "Por favor, introduzca su respuesta",
                    minlength: "Por favor, introduzca al menos 2 caracteres."
                },
                autor: {
                    required: "Por favor, introduzca el autor",
                    minlength: "Por favor, introduzca al menos 2 caracteres."
                },
                orden: "Por favor, introduzca datos numéricos",
                mail_autor :{
                    required: "Por favor, introduzca su correo",
                    minlength: "Por favor, introduzca el @ ."
                },
                
                estado: "Por favor, seleccione un estado"
            },
            highlight: function (element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function (element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            errorPlacement: function (error, element) {
                try {
                    var isCheckboxOrRadio = $(element).attr('type') !== undefined && ($(element).attr('type').toLowerCase() === 'radio' || $(element).attr('type').toLowerCase() === 'radio');

                    if (isCheckboxOrRadio) {
                        element.parents('.form-group').append(error);
                    } else {
                        element.after(error);
                    }
                } catch (e) { }
            }
        });

         $("#formProyectos").validate({
            rules: {
                'nombre': {minlength: 2 },
                'descripcion': { minlength: 5 },
                'orden': {number: true , min: 1 },
                'destacado': {number: true },
                'url': {solotexto: true }
            },
            messages: {
                nombre: {
                    required: "Por favor, introduzca su titulo",
                    minlength: "Por favor, introduzca al menos 2 caracteres."
                },
                url: {
                    required: "Por favor, introduzca su url",
                    solotexto: "Url no válido"
                },
                descripcion: {
                    required: "Por favor, introduzca su description",
                    minlength: "Por favor, introduzca al menos 5 caracteres."
                },
                orden: "Por favor, introduzca datos numéricos",
                destacado : "Por favor, introduzca datos numéricos 1:destacado / 0:no destacado",
             
                estado: "Por favor, seleccione un estado",
                imagen:"Por favor, introduzca su imagen",
                seo_title: "Por favor, introduzca su titulo",
                seo_keywords: "Por favor, introduzca su keywords",
                seo_description: "Por favor, introduzca su descripción"
            },
            highlight: function (element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function (element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            errorPlacement: function (error, element) {
                try {
                    var isCheckboxOrRadio = $(element).attr('type') !== undefined && ($(element).attr('type').toLowerCase() === 'radio' || $(element).attr('type').toLowerCase() === 'radio');

                    if (isCheckboxOrRadio) {
                        element.parents('.form-group').append(error);
                    } else {
                        element.after(error);
                    }
                } catch (e) { }
            }
        });

        $("#formGaleriaTrabajos").validate({
            
            rules: {  
                'nombre': {minlength: 2 },
                'descripcion': { minlength: 5 },      
                'orden': {number: true , min: 1 },
                'destacado': {number: true }
            },
            messages: {
                nombre: {
                    required: "Por favor, introduzca su titulo",
                    minlength: "Por favor, introduzca al menos 2 caracteres."
                },
                descripcion: {
                    required: "Por favor, introduzca su description",
                    minlength: "Por favor, introduzca al menos 5 caracteres."
                },
                proyecto_id: "Por favor, seleccione un proyecto",
                orden: "Por favor, introduzca datos numéricos",                
                destacado : "Por favor, introduzca datos numéricos 1:destacado / 0:no destacado",
                estado: "Por favor, seleccione un estado",
                imagen: "Por favor, introduzca su imagen",
                seo_title: "Por favor, introduzca su titulo",
                seo_description: "Por favor, introduzca su descripción",
                seo_keywords: "Por favor, introduzca su keywords"
            },
            highlight: function (element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function (element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            errorPlacement: function (error, element) {
                try {
                    var isCheckboxOrRadio = $(element).attr('type') !== undefined && ($(element).attr('type').toLowerCase() === 'radio' || $(element).attr('type').toLowerCase() === 'radio');

                    if (isCheckboxOrRadio) {
                        element.parents('.form-group').append(error);
                    } else {
                        element.after(error);
                    }
                } catch (e) { }
            }
        });

        $("#formFotosProyecto").validate({
            
            rules: {  
                'nombre': {minlength: 2 },  
                'galeria_proyecto_id': {chosen: true },
                'orden': {number: true , min: 1 }
            },
            messages: {
                nombre: {
                    required: "Por favor, introduzca su titulo",
                    minlength: "Por favor, introduzca al menos 2 caracteres."
                },
                galeria_proyecto_id: "Por favor, seleccione primero un proyecto",
                orden: "Por favor, introduzca datos numéricos",                
                estado: "Por favor, seleccione un estado",
                imagen: "Por favor, introduzca su imagen"
            },
            highlight: function (element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function (element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            errorPlacement: function (error, element) {
                try {
                    var isCheckboxOrRadio = $(element).attr('type') !== undefined && ($(element).attr('type').toLowerCase() === 'radio' || $(element).attr('type').toLowerCase() === 'radio');

                    if (isCheckboxOrRadio) {
                        element.parents('.form-group').append(error);
                    } else {
                        element.after(error);
                    }
                } catch (e) { }
            }
        });


         $("#formTestimonios").validate({
            rules: {
                'nombre': {minlength: 2 },
                'testimonio': { minlength: 5 }              
            },
            messages: {
                nombre: {
                    required: "Por favor, introduzca su nombre",
                    minlength: "Por favor, introduzca al menos 2 caracteres."
                },
                testimonio: {
                    required: "Por favor, introduzca su testimonio",
                    minlength: "Por favor, introduzca al menos 5 caracteres."
                },    
                estado: "Por favor, seleccione un estado",
                imagen: "Por favor, introduzca su imagen"
            },
            highlight: function (element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function (element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            errorPlacement: function (error, element) {
                try {
                    var isCheckboxOrRadio = $(element).attr('type') !== undefined && ($(element).attr('type').toLowerCase() === 'radio' || $(element).attr('type').toLowerCase() === 'radio');

                    if (isCheckboxOrRadio) {
                        element.parents('.form-group').append(error);
                    } else {
                        element.after(error);
                    }
                } catch (e) { }
            }
        });

        $("#formMensajes").validate({
            rules: {
                'nombre': {minlength: 2 }
            },
            messages: {
                nombre: {
                    required: "Por favor, introduzca su nombre",
                    minlength: "Por favor, introduzca al menos 2 caracteres."
                },                
                estado: "Por favor, seleccione un estado"
            },
            highlight: function (element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function (element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            errorPlacement: function (error, element) {
                try {
                    var isCheckboxOrRadio = $(element).attr('type') !== undefined && ($(element).attr('type').toLowerCase() === 'radio' || $(element).attr('type').toLowerCase() === 'radio');

                    if (isCheckboxOrRadio) {
                        element.parents('.form-group').append(error);
                    } else {
                        element.after(error);
                    }
                } catch (e) { }
            }
        });

        $("#formGaleriaFotos").validate({
            
            rules: {  
                'nombre': {minlength: 2 },   
                'orden': {number: true , min: 1 },
                'destacado': {number: true }
            },
            messages: {
                nombre: {
                    required: "Por favor, introduzca su titulo",
                    minlength: "Por favor, introduzca al menos 2 caracteres."
                },
                descripcion: {
                    required: "Por favor, introduzca su description",
                    minlength: "Por favor, introduzca al menos 5 caracteres."
                },
                album_id: "Por favor, seleccione un album",
                orden: "Por favor, introduzca datos numéricos",                
                destacado : "Por favor, introduzca datos numéricos 1:destacado / 0:no destacado",
                estado: "Por favor, seleccione un estado",
                imagen: "Por favor, introduzca su imagen"
            },
            highlight: function (element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function (element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            errorPlacement: function (error, element) {
                try {
                    var isCheckboxOrRadio = $(element).attr('type') !== undefined && ($(element).attr('type').toLowerCase() === 'radio' || $(element).attr('type').toLowerCase() === 'radio');

                    if (isCheckboxOrRadio) {
                        element.parents('.form-group').append(error);
                    } else {
                        element.after(error);
                    }
                } catch (e) { }
            }
        });

        $("#formGaleriaAlbumesFotos").validate({
            rules: {
                'nombre': {minlength: 2 },
                'orden': {number: true , min: 1 },
                'destacado': {number: true },
                'url': {solotexto: true }
            },
            messages: {
                nombre: {
                    required: "Por favor, introduzca su titulo",
                    minlength: "Por favor, introduzca al menos 2 caracteres."
                },
                descripcion: {
                    required: "Por favor, introduzca su description",
                    minlength: "Por favor, introduzca al menos 5 caracteres."
                },
                orden: "Por favor, introduzca datos numéricos",
                destacado : "Por favor, introduzca datos numéricos 1:destacado / 0:no destacado",
                url: {
                    required: "Por favor, introduzca su url",
                    solotexto: "Url no válido"
                },
                estado: "Por favor, seleccione un estado",
                imagen:"Por favor, introduzca su imagen",
                seo_title: "Por favor, introduzca su titulo",
                seo_keywords: "Por favor, introduzca su keywords",
                seo_description: "Por favor, introduzca su descripción"
            },
            highlight: function (element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function (element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            errorPlacement: function (error, element) {
                try {
                    var isCheckboxOrRadio = $(element).attr('type') !== undefined && ($(element).attr('type').toLowerCase() === 'radio' || $(element).attr('type').toLowerCase() === 'radio');

                    if (isCheckboxOrRadio) {
                        element.parents('.form-group').append(error);
                    } else {
                        element.after(error);
                    }
                } catch (e) { }
            }
        });
        
        $("#formGaleriaVideos").validate({
            rules: {  
                'nombre': {minlength: 2 },            
                 'orden': {number: true , min: 1 },
                 'destacado': {number: true } 
            },
            messages: {
                nombre: {
                    required: "Por favor, introduzca su titulo",
                    minlength: "Por favor, introduzca al menos 2 caracteres."
                },
                album_id: "Por favor, seleccione un album",
                orden: "Por favor, introduzca datos numéricos",                
                destacado : "Por favor, introduzca datos numéricos 1:destacado / 0:no destacado",
                estado: "Por favor, seleccione un estado",
                imagen: "Por favor, introduzca su imagen",
                link: "Por favor, introduzca su link de youtube"
            },
            highlight: function (element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function (element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            errorPlacement: function (error, element) {
                try {
                    var isCheckboxOrRadio = $(element).attr('type') !== undefined && ($(element).attr('type').toLowerCase() === 'radio' || $(element).attr('type').toLowerCase() === 'radio');

                    if (isCheckboxOrRadio) {
                        element.parents('.form-group').append(error);
                    } else {
                        element.after(error);
                    }
                } catch (e) { }
            }
        });

        $("#formGaleriaAlbumesVideos").validate({
            rules: {
                'nombre': {minlength: 2 },
                'orden': {number: true , min: 1 },
                'destacado': {number: true },
                'url': {solotexto: true }
            },
            messages: {
                nombre: {
                    required: "Por favor, introduzca su titulo",
                    minlength: "Por favor, introduzca al menos 2 caracteres."
                },
                orden: "Por favor, introduzca datos numéricos",
                destacado : "Por favor, introduzca datos numéricos 1:destacado / 0:no destacado",
                url: {
                    required: "Por favor, introduzca su url",
                    solotexto: "Url no válido"
                },
                estado: "Por favor, seleccione un estado",
                imagen:"Por favor, introduzca su imagen",
                seo_title: "Por favor, introduzca su titulo",
                seo_keywords: "Por favor, introduzca su keywords",
                seo_description: "Por favor, introduzca su descripción"
            },
            highlight: function (element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function (element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            errorPlacement: function (error, element) {
                try {
                    var isCheckboxOrRadio = $(element).attr('type') !== undefined && ($(element).attr('type').toLowerCase() === 'radio' || $(element).attr('type').toLowerCase() === 'radio');

                    if (isCheckboxOrRadio) {
                        element.parents('.form-group').append(error);
                    } else {
                        element.after(error);
                    }
                } catch (e) { }
            }
        });

        $("#formClientes").validate({
            rules: {
                'nombres': {minlength: 2 },
                'apellidos': {minlength: 2 },
                 'correo': {minlength: 2 },
                'orden': {number: true, min: 1 } 
            },
            messages: {
                nombres: {
                    required: "Por favor, introduzca su nombre completo",
                    minlength: "Por favor, introduzca al menos 2 caracteres."
                },
                apellidos: {
                    required: "Por favor, introduzca su apellido completo",
                    minlength: "Por favor, introduzca al menos 2 caracteres."
                },       
                correo :{
                    required: "Por favor, introduzca su correo",
                    minlength: "Por favor, introduzca el @ ."
                },
                telefono: "Por favor, introduzca datos numéricos",
                ruc: "Por favor, introduzca datos numéricos",
                logo: "Por favor, introduzca una imagen",
                estado: "Por favor, seleccione un estado"
            },
            highlight: function (element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function (element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            errorPlacement: function (error, element) {
                try {
                    var isCheckboxOrRadio = $(element).attr('type') !== undefined && ($(element).attr('type').toLowerCase() === 'radio' || $(element).attr('type').toLowerCase() === 'radio');

                    if (isCheckboxOrRadio) {
                        element.parents('.form-group').append(error);
                    } else {
                        element.after(error);
                    }
                } catch (e) { }
            }
        });

        $("#formClientesWeb").validate({
            rules: {
                'razon_social': {minlength: 2 },
                'url': {solotexto: true },
                'orden': {number: true, min: 1 } 
            },
            messages: {
                razon_social: {
                    required: "Por favor, introduzca su razon social",
                    minlength: "Por favor, introduzca al menos 2 caracteres."
                },   
                url: {
                    required: "Por favor, introduzca su url",
                    solotexto: "Url no válido"
                },
                logo: "Por favor, introduzca una imagen",
                estado: "Por favor, seleccione un estado"
            },
            highlight: function (element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function (element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            errorPlacement: function (error, element) {
                try {
                    var isCheckboxOrRadio = $(element).attr('type') !== undefined && ($(element).attr('type').toLowerCase() === 'radio' || $(element).attr('type').toLowerCase() === 'radio');

                    if (isCheckboxOrRadio) {
                        element.parents('.form-group').append(error);
                    } else {
                        element.after(error);
                    }
                } catch (e) { }
            }
        });


        $("#formConfiguraciones").validate({
            rules: {
                'llave': {minlength: 2 },
                // 'valor': {minlength: 2 },
                'descripcion': {minlength: 2 }
            },
            messages: {
                llave: {
                    required: "Por favor, introduzca su nombre completo",
                    minlength: "Por favor, introduzca al menos 2 caracteres."
                },
                valor: {
                    required: "Por favor, introduzca su apellido completo",
                    minlength: "Por favor, introduzca al menos 2 caracteres."
                },
                 descripcion: {
                    required: "Por favor, introduzca su razon social",
                    minlength: "Por favor, introduzca al menos 2 caracteres."
                },   
                estado: "Por favor, seleccione un estado"
            },
            highlight: function (element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function (element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            errorPlacement: function (error, element) {
                try {
                    var isCheckboxOrRadio = $(element).attr('type') !== undefined && ($(element).attr('type').toLowerCase() === 'radio' || $(element).attr('type').toLowerCase() === 'radio');

                    if (isCheckboxOrRadio) {
                        element.parents('.form-group').append(error);
                    } else {
                        element.after(error);
                    }
                } catch (e) { }
            }
        });

        $('#formProductos').validate({
            rules: {
                'nombre': {minlength: 2 },
                'categoria_id': {chosen: true },
                //'descripcion': { required: function() { CKEDITOR.instances.descripcion.updateElement(); }, minlength: 5 },
                'resumen': {minlength: 2 },
                'url': {solotexto: true },
                'orden': {number: true , min: 1 }/*,
                'files[]': {accept: "image/*"}*/
            },
            messages: {
                'categoria_id': "Por favor, seleccione una categoria",
                nombre: {
                    required: "Por favor, introduzca su titulo",
                    minlength: "Por favor, introduzca al menos 2 caracteres."
                },
                descripcion: "Por favor, introduzca su description",
                resumen: "Por favor, introduzca su resumen",
                url: {
                    required: "Por favor, introduzca su url",
                    solotexto: "Url no válido"
                },
                codigo: "Por favor, introduzca su codigo",
                estado: "Por favor, seleccione un estado",
                orden: "Por favor, introduzca datos numéricos",
                'files[]': {
                    required: "Por favor, introduzca su imagen",
                    accept: "Formato no valido"
                },
                seo_title: "Por favor, introduzca su titulo",
                seo_keywords: "Por favor, introduzca su keywords",
                seo_description: "Por favor, introduzca su descripción"
            },
            highlight: function (element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function (element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            errorPlacement: function (error, element) {
                try {
                    var isCheckboxOrRadio = $(element).attr('type') !== undefined && ($(element).attr('type').toLowerCase() === 'radio' || $(element).attr('type').toLowerCase() === 'radio');

                    if (isCheckboxOrRadio) {
                        element.parents('.form-group').append(error);
                    } else {
                        element.after(error);
                    }
                } catch (e) { }
            }
        });
        $('#formCategoria').validate({
            rules: {
                'nombre': {minlength: 2 },
                // 'descripcion': { required: function() { CKEDITOR.instances.descripcion.updateElement(); }, minlength: 5 },
                'url': {solotexto: true },
                'orden': {number: true , min: 1 }
            },
            messages: {
                nombre: {
                    required: "Por favor, introduzca su titulo",
                    minlength: "Por favor, introduzca al menos 2 caracteres."
                },
                descripcion: {
                    required: "Por favor, introduzca su description",
                    minlength: "Por favor, introduzca al menos 5 caracteres."
                },
                url: {
                    required: "Por favor, introduzca su url",
                    solotexto: "Url no válido"
                },
                estado: "Por favor, seleccione un estado",
                imagen: "Por favor, suba una imagen",
                orden: "Por favor, introduzca datos numéricos",
                imagen: "Por favor, introduzca su imagen",
                seo_title: "Por favor, introduzca su titulo",
                seo_keywords: "Por favor, introduzca su keywords",
                seo_description: "Por favor, introduzca su descripción"
            },
            highlight: function (element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function (element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            errorPlacement: function (error, element) {
                try {
                    var isCheckboxOrRadio = $(element).attr('type') !== undefined && ($(element).attr('type').toLowerCase() === 'radio' || $(element).attr('type').toLowerCase() === 'radio');

                    if (isCheckboxOrRadio) {
                        element.parents('.form-group').append(error);
                    } else {
                        element.after(error);
                    }
                } catch (e) { }
            }
        });
        $('#formSeccion').validate({
            rules: {
                'titulo': {minlength: 2 },
                'descripcion': { required: function() { CKEDITOR.instances.descripcion.updateElement(); }, minlength: 5 }
            },
            messages: {
                titulo: {
                    required: "Por favor, introduzca su titulo",
                    minlength: "Por favor, introduzca al menos 2 caracteres."
                },
                descripcion: {
                    required: "Por favor, introduzca su descripción",
                    minlength: "Por favor, introduzca al menos 2 caracteres."
                },
                seo_title: "Por favor, introduzca su titulo",
                seo_description: "Por favor, introduzca su descripción",
                seo_keywords: "Por favor, introduzca su keywords"
            },
            highlight: function (element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function (element) {
                $(element).closest('.form-group').removeClass('has-error');
            }
        });
        $('#formBanner').validate({
            rules: {
                'titulo': {minlength: 2 },
                'orden': { number: true , min: 1 }
            },
            messages: {
                titulo: {
                    required: "Por favor, introduzca su titulo",
                    minlength: "Por favor, introduzca al menos 2 caracteres."
                },
                subtitulo: {
                    required: "Por favor, introduzca su subtitulo",
                    minlength: "Por favor, introduzca al menos 2 caracteres."
                },
                resumen: {
                    required: "Por favor, introduzca su resumen",
                    minlength: "Por favor, introduzca al menos 2 caracteres."
                },
                tipo_banner_id:" Elegir un tipo de banner",
                link: {
                    required: "Por favor, introduzca su link",
                    minlength: "Por favor, introduzca al menos 2 caracteres."
                },
                orden: "Por favor, introduzca datos numéricos",
                imagen:"Por favor, introduzca su imagen",
                estado : "seleccionar un estado"
            },
            highlight: function (element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function (element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            errorPlacement: function (error, element) {
                try {
                    var isCheckboxOrRadio = $(element).attr('type') !== undefined && ($(element).attr('type').toLowerCase() === 'radio' || $(element).attr('type').toLowerCase() === 'radio');

                    if (isCheckboxOrRadio) {
                        element.parents('.form-group').append(error);
                    } else {
                        element.after(error);
                    }
                } catch (e) { }
            }
        });

        $("#Changepassword").validate({
            rules: {
                'nuevaClave': {minlength: 3 },
                'password': {minlength: 3}
            },
            messages: {
                nuevaClave: {
                    required: "Campo obligatorio",
                    minlength: "Por favor, introduzca al menos 6 caracteres."
                },                
                password: {
                    required: "Campo obligatorio",
                    minlength: "Por favor, introduzca al menos 6 caracteres."
                }
            },
            highlight: function (element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function (element) {
                $(element).closest('.form-group').removeClass('has-error');
            }
        });
        //Custom Validations ===============================================================================
        //creamos un metodo adicional para validar solo texto
        jQuery.validator.addMethod("solotexto", function(value, element) {
          return this.optional(element) || /^[a-z0-9 -]+$/i.test(value);
        }, "Solo letras");
        //Date
        $.validator.addMethod('customdate', function (value, element) {
            return value.match(/^\d\d\d\d?-\d\d?-\d\d$/);
        },
            'Please enter a date in the format YYYY-MM-DD.'
        );

        //Credit card
        $.validator.addMethod('creditcard', function (value, element) {
            return value.match(/^\d\d\d\d?-\d\d\d\d?-\d\d\d\d?-\d\d\d\d$/);
        },
            'Please enter a credit card in the format XXXX-XXXX-XXXX-XXXX.'
        );
        $.validator.addMethod('chosen', function (value, element, requiredValue) {
            return requiredValue == false || element.value != '';
        }, $.validator.messages.required);

        //==================================================================================================

        //Init switch buttons
        var $switchButtons = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $switchButtons.forEach(function (e) {
            var size = $(e).data('size');
            var options = {};
            options['color'] = '#009688';
            if (size !== undefined) options['size'] = size;

            var switchery = new Switchery(e, options);
        });
    });
}(jQuery));

function slugUrl(texto , url){
    $("."+texto).keyup(function(){
        var Text = $(this).val();
        Text = Text.replace(/^\s+|\s+$/g, ''); // trim
        Text = Text.toLowerCase();
        
        // remueve los acentos,ñ cambia por n, etc
        var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
        var to   = "aaaaeeeeiiiioooouuuunc------";
        for (var i=0, l=from.length ; i<l ; i++) {
            Text = Text.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
        }

        Text = Text.replace(/[^a-z0-9 -]/g, '') // remueve caracteres invalidos
            .replace(/\s+/g, '-') // Reemplaza los espocios por un guion(-)
            .replace(/-+/g, '-'); // Repetir guiones(-)
        $("."+url).val(Text);      
    });
}

jQuery('.slugUrl').keypress(function(tecla) {
if((tecla.charCode < 97 || tecla.charCode > 122) && (tecla.charCode < 65 || tecla.charCode > 90) && (tecla.charCode != 45) && (tecla.charCode < 48 || tecla.charCode > 57)) return false;
});