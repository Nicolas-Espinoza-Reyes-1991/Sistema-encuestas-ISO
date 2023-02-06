<div class="input-group">
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
        if (tokenData=="") {
            MensaToken();
            return false;
        }else{
            $.post('{{asset("validateTokenUser")}}',{tokenData:tokenData,"_token": "{{ csrf_token() }}"},function(response){ 
            var obj= jQuery.parseJSON(response);
                confirmadato = obj['confirmadato'];
                tokenEncript = obj['tokenEncript'];
                urlData = obj['urlData'];
                console.log(confirmadato);
                if (confirmadato=="" || confirmadato==null) {
                    $("#token").val("");
                    MensaToken();
                    return false;
                }else{
                    // if (urlData=="1") {
                    //     window.location.href='{{url("/result")}}'+'/'+tokenEncript;
                    // }else if(urlData=="2"){
                       window.location.href='{{url("/character")}}'+'/'+tokenEncript;
                    // }
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