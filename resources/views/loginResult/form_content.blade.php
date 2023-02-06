<div class="input-group">
    <input name="email" type="text" class="form-control form-control-sm" id="email"
        placeholder="Ingrese su Correo"
        >
    <input name="token" type="text" class="form-control form-control-sm" id="token"
        placeholder="Ingrese su código de acceso"
        >
    <a style="" class="btn btn-sm btn-primary" type="button" id="btnToken">Continuar</a>
</div>

<script>
    $(document).ready(function () {
     
    });

     $( "#btnToken" ).click( function() {
    
        tokenData= $("#token").val();
        email= $("#email").val();     
        if (tokenData=="" || email=="") {
            MensaToken();
            return false;
        }else{
            $.post('{{asset("validateTokenUserNacional")}}',{tokenData:tokenData,email:email,"_token": "{{ csrf_token() }}"},function(response){ 
            var obj = jQuery.parseJSON(response);
                confirmadato = obj['confirmadato'];
                tokenEncript = obj['tokenEncript'];
                urlData = obj['urlData'];
                if (confirmadato=="" || confirmadato==null) {
                    $("#token").val("");
                    MensaToken();
                    return false;
                }else{
                    window.location.href='{{url("/reportNacional")}}'+'/'+tokenEncript;
                }
            });
        }
    }); 

    function MensaToken() {
        Swal.fire({
        icon: 'error',
        title: 'Pase no valio',
        text: 'Favor Ingresar Pase Valido',
        })
        $( "#btnToken" ).prop( "href", "#" ); 
        return false;
    }



    
</script>