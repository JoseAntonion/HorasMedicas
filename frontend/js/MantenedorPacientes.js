
jQuery(document).ready(function () {

    jQuery.ajaxSetup({
        "error": function (respuesta, jqXHR, errorMsg) {
            ocultarImagenCargando();
            alert("ha ocurrido el siguiente error: " + errorMsg);
        }
    });

    
    $('#show-hide-passwd').on('click', function (e) {
            e.preventDefault();
            var current = $(this).attr('action');
            if (current == 'hide') {
                $(this).prev().attr('type', 'text');
                $(this).removeClass('glyphicon-eye-open').addClass('glyphicon-eye-close').attr('action', 'show');
            }
            if (current == 'show') {
                $(this).prev().attr('type', 'password');
                $(this).removeClass('glyphicon-eye-close').addClass('glyphicon-eye-open').attr('action', 'hide');
            }
        })
    


    /**
     * Busqueda por RUT
     */
    //jQuery("input[name='txtRut']").Rut({format_on:'keyup'});
    jQuery("#btnBuscar").click(function () {
        var rut = $("input[name='txtRut']").val();
        if (rut !== "") {

            mostrarImagenCargando();
            jQuery.getJSON("/HorasMedicas/backend/info-cliente2.php", {id: rut,opcion: 1}, function (resul) {

                jQuery("input[name='txtContrasena']").val(resul.contrasena);
                jQuery("input[name='txtNombre']").val(resul.nombre);
                jQuery("input[name='txtApellido']").val(resul.apellido);
                jQuery("input[name='dpFecha']").val(resul.fecha_nac);
                jQuery("input[name='txtDireccion']").val(resul.direccion);
                jQuery("select[name='cboSexo']").val(resul.sexo);

                ocultarImagenCargando();
            });

        }
    });

    jQuery("#btnAgregar").click(function () {
        var rut = $("input[name='txtRut']").val();
        var pass = $("input[name='txtContrasena']").val();
        var nombre = $("input[name='txtNombre']").val();
        var apellido = $("input[name='txtApellido']").val();
        var fecha_nac = $("#dpFecha").val();
        var direccion = $("input[name='txtDireccion']").val();
        var sexo = $("select[name='cboSexo']").val();
        var fono = $("input[name='txtFono']").val();
        if (rut !== "" && pass !== "" && nombre !== "" && apellido !== "" && fecha_nac !== "" &&
                direccion !== "" && sexo !== "") {

            jQuery.getJSON("/HorasMedicas/backend/info-cliente2.php",
            {rut: rut,pass:pass,nombre:nombre,apellido:apellido,
                fecha_nac:fecha_nac,direccion:direccion,sexo:sexo,
                fono:fono,id:1,opcion:2}, 
            function (resul) {
                if(resul){
                    jQuery("#mensaje").val("Paciente Agregado Correctamente");
                    jQuery("#mensaje").addClass("alert alert-success");
                }else{
                    
                }
            });

        }
    });


    /**
     * Manejo del campo Regiones
     */
//    mostrarImagenCargando();
//    jQuery.getJSON("https://apis.modernizacion.cl/dpa/regiones", function (regiones) {
//        jQuery.each(regiones, function (indice, region) {
//            jQuery("select[name='region']").append("<option value=\"" + region.codigo + "\">" + region.nombre + "</option>");            
//        });
//        
//        ocultarImagenCargando();
//    });



    /**
     * Manejo de provincias
     */
//    jQuery("select[name='region']").change(function () {
//        
//        mostrarImagenCargando();
//        jQuery.getJSON("https://apis.modernizacion.cl/dpa/regiones/" + jQuery(this).val() + "/provincias", function (provincias) {
//
//            jQuery("select[name='provincia'] option").remove();
//            jQuery("select[name='provincia']").append("<option value=\"\">-- Seleccione una provincia --</option>");
//
//            jQuery("select[name='comuna'] option").remove();
//            jQuery("select[name='comuna']").append("<option value=\"\">-- Seleccione una comuna --</option>");
//
//            jQuery.each(provincias, function (indice, provincia) {
//                jQuery("select[name='provincia']").append("<option value=\"" + provincia.codigo + "\">" + provincia.nombre + "</option>");                
//            });
//            
//            ocultarImagenCargando();
//        });
//    });


    /**
     * Manejo de provincias
     */
//    jQuery("select[name='provincia']").change(function () {
//        var codigoRegion = jQuery("select[name='region']").val();
//        var codigoProvincia = jQuery(this).val();
//
//        jQuery("select[name='comuna'] option").remove();
//        
//        mostrarImagenCargando();        
//        jQuery.getJSON("https://apis.modernizacion.cl/dpa/regiones/" + codigoRegion + "/provincias/" + codigoProvincia + "/comunas",
//                function (comunas) {
//                    jQuery("select[name='comuna']").append("<option value=\"\">-- Seleccione una comuna --</option>");
//                    jQuery.each(comunas, function (indice, comuna) {
//                        jQuery("select[name='comuna']").append("<option value=\"" + comuna.codigo + "\">" + comuna.nombre + "</option>");
//                    });
//                    
//                    ocultarImagenCargando();
//                }
//        );
//    });

});


function mostrarImagenCargando() {
    jQuery("#cargandoAjax").css("visibility", "visible");
}

function ocultarImagenCargando() {
    jQuery("#cargandoAjax").css("visibility", "hidden");
}

function validarRut() {
    var rut = jQuery("input[name='rut']").val();

    return jQuery.Rut.validar(rut);
}