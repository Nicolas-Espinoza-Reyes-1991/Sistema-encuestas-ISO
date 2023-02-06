//Valida todos los inputs con las clases que se mencionan a continuación
/********clases a validar***********
 required: valida que el campo no venga vacío.
 numeric: valida que el campo contenga solo caracteres numéricos.
 validaRut: valida los campos de rut.
 En el caso de los inputs(radio-checkbox), es necesario declarar un label con la sintaxis: "dng-"+name input
idForm : Formulario a validar
 */
function validar(idForm) {
    var error = false;
    $("#"+idForm+" .required ").each(function(){

         
        if($(this).is(':disabled')){
            
        }else{
            var nombre = $(this).attr('name');
            var input = $('input[name=' + nombre + ']');
            var tipo = input.attr('type');
            if(typeof tipo === "undefined"){
                tipo = $(this)[0].tagName;
            }
            if (input.css('display') == 'none') {
                return true;
            }

            if (tipo == 'select-one' || tipo == 'text' || tipo == 'password' || tipo == 'TEXTAREA' ) {
                if ($(this).val() == "") {
                    $(this).parents().eq(0).addClass('control-group has-error');
                    $(this).prop("title", "Este campo no puede estar vacío");
                    $(this).attr("data-toggle","tooltip");
                    $('[data-toggle="tooltip"]').tooltip(); 
                    error = true;
                } else {
                    $(this).parents().eq(0).removeClass('control-group has-error');
                    $(this).prop("title", "");
                    $(this).removeAttr("data-toggle");
                    $(this).removeAttr("data-original-title");
                }
            } else if (tipo == 'radio' || tipo == 'checkbox') {
                var flag = false;
                for (var i = 0, len = input.length; i < len; ++i) {
                    if (input[i].checked) {
                        flag = true;
                    }
                }
                var label = "";
                if (flag == false) {
                    label = "dng-" + nombre;
                    $("#" + label).show();
                    error = true;
                } else {
                    label = "dng-" + nombre;
                    $("#" + label).hide();
                }
            }else if(tipo=="SELECT" || tipo=="select" ){
               
                if ($(this).val() == "") {
                    $(this).parents().eq(0).addClass('control-group has-error');
                    $(this).prop("title", "Debe seleccionar una opción");
                    $(this).attr("data-toggle","tooltip");
                    $('[data-toggle="tooltip"]').tooltip(); 
                    error = true;
                } else {
                    $(this).parents().eq(0).removeClass('control-group has-error');
                    $(this).prop("title", "");
                    $(this).removeAttr("data-toggle");
                    $(this).removeAttr("data-original-title");
                }
            }else if(tipo=="email"){
                
                $(this).parents().eq(0).removeClass('control-group has-error');
                $(this).prop("title", "");
                $(this).removeAttr("data-toggle");
                $(this).removeAttr("data-original-title");
                $(this).attr("data-toggle","tooltip");
                $('[data-toggle="tooltip"]').tooltip();

                if ($(this).val() != "") {
                    expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                    if ( !expr.test($(this).val()) ) {
                        $(this).parents().eq(0).addClass('control-group has-error');
                        $(this).prop("title", "Formato de correo no validos");
                        $("#email").attr("data-original-title", "Formato de correo no valido");
                        error = true;
                    }
                }else {
                    $(this).parents().eq(0).addClass('control-group has-error');
                    $(this).prop("title", "Este campo no puede estar vacío");
                    $("#email").attr("data-original-title", "Este campo no puede estar vacío");
                    error = true;
                }


            }
        }
    });

    $("#"+idForm+" .validaRut").each(function () {
        
        var nombre = $(this).attr('name');
        var input = $('input[name=' + nombre + ']');

        if (input.css('display') == 'none') {
            return true;
        }

        if ($(this).val() != "") {
            var result = Rut($(this).val(), $(this));
            if (result == true) {
                $(this).parents().eq(0).removeClass('control-group has-error');
                $(this).prop("title", "");
                $(this).removeAttr("data-toggle");
                //$(this).removeAttr("data-original-title");
            }
            else {
                $(this).parents().eq(0).addClass('control-group has-error');
                $(this).prop("title", "Rut Inválido");
                $(this).attr("data-toggle","tooltip");
                $('[data-toggle="tooltip"]').tooltip();
                error = true;
            }
        }
    });
    $("#"+idForm+" .numeric").each(function () {
        var nombre = $(this).attr('name');
        var input = $('input[name=' + nombre + ']');

        if (input.css('display') == 'none') {
            return true;
        }

        if ($(this).val() != "") {
            if (isNaN($(this).val())) {
                $(this).parents().eq(0).addClass('control-group has-error');
                error = true;
            } else {
                $(this).parents().eq(0).removeClass('control-group has-error');
            }
        }
    });

    if (error == true) {
        $('#ok-obligatorio').hide();
        $('#error-obligatorio').show();
        $('#mensaje_error').show();
        return false;
    } else {
        $('#mensaje_error').hide();
        return true;
    }
}

function revisarDigito(dvr, input)
{

    dv = dvr + ""
    if (dv != '0' && dv != '1' && dv != '2' && dv != '3' && dv != '4' && dv != '5' && dv != '6' && dv != '7' && dv != '8' && dv != '9' && dv != 'k' && dv != 'K')
    {
        $(input).focus();
        $(input).select();
        $(input).val( "");

        return false;
    }
    return true;
}

function revisarDigito2(crut, input)
{
    largo = crut.length;
    if (largo < 2)
    {

        $(input).focus();
        $(input).select();
        $(input).val( "");

        return false;
    }
    if (largo > 2)
        rut = crut.substring(0, largo - 1);
    else
        rut = crut.charAt(0);
    dv = crut.charAt(largo - 1);
    revisarDigito(dv, input);

    if (rut == null || dv == null)
        return 0

    var dvr = '0'
    suma = 0
    mul = 2

    for (i = rut.length - 1; i >= 0; i--)
    {
        suma = suma + rut.charAt(i) * mul
        if (mul == 7)
            mul = 2
        else
            mul++
    }
    res = suma % 11
    if (res == 1)
        dvr = 'k'
    else if (res == 0)
        dvr = '0'
    else
    {
        dvi = 11 - res
        dvr = dvi + ""
    }
    if (dvr != dv.toLowerCase())
    {

        $(input).focus();
        $(input).select();
        $(input).val( "");

        return false
    }

    return true
}

function Rut(texto, input)
{

    var tmpstr = "";
    for (i = 0; i < texto.length; i++)
        if (texto.charAt(i) != ' ' && texto.charAt(i) != '.' && texto.charAt(i) != '-')
            tmpstr = tmpstr + texto.charAt(i);
    texto = tmpstr;
    largo = texto.length;

    if (largo < 2)
    {
        $(input).focus();
        $(input).select();
        $(input).val( "");

        return false;
    }

    for (i = 0; i < largo; i++)
    {
        if (texto.charAt(i) != "0" && texto.charAt(i) != "1" && texto.charAt(i) != "2" && texto.charAt(i) != "3" && texto.charAt(i) != "4" && texto.charAt(i) != "5" && texto.charAt(i) != "6" && texto.charAt(i) != "7" && texto.charAt(i) != "8" && texto.charAt(i) != "9" && texto.charAt(i) != "k" && texto.charAt(i) != "K")
        {

            $(input).focus();
            $(input).select();
            $(input).val( "");

            return false;
        }
    }

    var invertido = "";
    for (i = (largo - 1), j = 0; i >= 0; i--, j++)
        invertido = invertido + texto.charAt(i);
    var dtexto = "";
    dtexto = dtexto + invertido.charAt(0);
    dtexto = dtexto + '-';
    cnt = 0;

    for (i = 1, j = 2; i < largo; i++, j++)
    {
        //alert("i=[" + i + "] j=[" + j +"]" );        
        if (cnt == 3)
        {
            //dtexto = dtexto + '.';            
            dtexto = dtexto;
            j++;
            dtexto = dtexto + invertido.charAt(i);
            cnt = 1;
        }
        else
        {
            dtexto = dtexto + invertido.charAt(i);
            cnt++;
        }
    }

    invertido = "";
    for (i = (dtexto.length - 1), j = 0; i >= 0; i--, j++)
        invertido = invertido + dtexto.charAt(i);

    $(input).val(invertido.toUpperCase());

    if (revisarDigito2(texto, input)){
        $(input).parents().eq(0).removeClass('control-group has-error');
        return true;
    }else{
        $(input).parents().eq(0).addClass('control-group has-error');
        return false;
    } 
   
}

function alertaAcciones(posicion1, posicion2, textoE, textoA, backG, color, ikon) {
    $.notify(textoE + textoA, {
        align: posicion1, //left, center, right
        verticalAlign: posicion2, //top, middle, bottom
        background: backG, //#D44950
        color: color, //#fff
        animationType: "scale",
        icon: ikon,
        animation: true,
        close: true
    });
}

function formatearRut(id) {    //genera formato de rut mascara numerica
    var rutinicial = $("#"+id).val();
    rutinicial = rutinicial.replace(/\s/g, "");
    var actual = rutinicial.replace(/^0+/, "");
    if (actual != '' && actual.length > 1) {
        var sinPuntos = actual.replace(/\./g, "");
        var actualLimpio = sinPuntos.replace(/-/g, "");
        var inicio = actualLimpio.substring(0, actualLimpio.length - 1);
        var rutPuntos = "";
        var i = 0;
        var j = 1;
        for (i = inicio.length - 1; i >= 0; i--) {
            var letra = inicio.charAt(i);
            rutPuntos = letra + rutPuntos;
            if (j % 3 == 0 && j <= inicio.length - 1) {
                rutPuntos = "." + rutPuntos;
            }          
            j++;
        }
        var dv = actualLimpio.substring(actualLimpio.length - 1);
        rutPuntos = rutPuntos + "-" + dv;
        if (rutPuntos.length>=13) {
            
            $("#"+id).val("");
            return false;
        }
        $("#"+id).val(rutPuntos);
    }
}



function validateEmail(id){
    var email = $("#"+id).val();
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var reurnLast = regex.test(email);


    if (reurnLast==false || reurnLast=="") {
        $("#"+id).parents().eq(0).addClass('control-group has-error');
                            $("#"+id).prop("title", "Este campo no puede estar vacío");
                    $("#"+id).attr("data-toggle","tooltip");
                    $('[data-toggle="tooltip"]').tooltip(); 
                            $('#ok-obligatorio').hide();
        $('#error-obligatorio').show();
        $('#mensaje_error').show();
        error = true;
    }else if(reurnLast==true){
        $("#"+id).parents().eq(0).removeClass('control-group has-error');
                            $("#"+id).prop("title", "");
                    $("#"+id).removeAttr("data-toggle");
                    $("#"+id).removeAttr("data-original-title");
                            $('#mensaje_error').hide();
        return true;
    }

}





