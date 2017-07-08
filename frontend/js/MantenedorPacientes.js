
jQuery(document).ready(function () {

    jQuery.ajaxSetup({
        "error": function (respuesta, jqXHR, errorMsg) {
            ocultarImagenCargando();
            alert("ha ocurrido el siguiente error: " + errorMsg);
        }
    });




    /**
     * Manejo del campo RUT
     */
    jQuery("input[name='rut']").Rut({format_on: 'keyup'});
    jQuery("input[name='rut']").blur(function () {
        if (this.value !== "") {

            if (!validarRut()) {
                jQuery(this).addClass("error");
                return;
            } else {
                jQuery(this).removeClass("error");
            }

            var rutSinFormato = jQuery.Rut.quitarFormato(this.value);
            var mantisa = rutSinFormato.slice(0, rutSinFormato.length - 1);

            //mostrarImagenCargando();
            jQuery.getJSON("/HorasMedicas/backend/info-cliente2.php", {id: mantisa}, function (resul) {

                jQuery("input[name='nombre']").val(resul.nombre);
                jQuery("input[name='nombre']").attr("readonly", true);

                jQuery("input[name='apellido']").val(resul.apellido);
                jQuery("input[name='apellido']").attr("readonly", true);

//                        jQuery("select[name='beneficiario'] option").remove();
//                        jQuery("select[name='beneficiario']").append("<option value=\"\">-- Seleccione el beneficiario --</option>");
//
//                        jQuery.each(titular.beneficiarios, function (indice, beneficiario) {
//                            jQuery("select[name='beneficiario']").append("<option value=\"" + beneficiario.id + "\">" + beneficiario.nombre + " " + beneficiario.apellido + "</option>");
//                        });

                //ocultarImagenCargando();

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