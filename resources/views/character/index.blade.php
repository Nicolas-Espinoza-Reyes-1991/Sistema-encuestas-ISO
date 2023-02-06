@extends('layouts.app')
@section('content')

<!--contenido-->
<div class="container mb-5">
    <div class="row mt-5 mb-3">
        <div class="col-lg-12 text-center text-primary">
            <h3 class="text-black">Profesional a cargo de la encuesta</h3>
            <p class="text-secondary texto1">Cuestionario normas ISO 27001
                <br><i class="mt-2">2022</i></p>
        </div>
    </div>
    <div id="contenFormCharacter">

    </div>



    <script>


    $(document).ready(function () {
        id_user='{{$id_user}}';
        tokenEncript='{{$tokenEncript}}';
        $.post('{{asset("contenFormCharacter")}}',{id_user:id_user,tokenEncript:tokenEncript,"_token": "{{ csrf_token() }}"},function(response){ 
        var obj= jQuery.parseJSON(response);
            $('#contenFormCharacter').html(obj.view);
        });
    });



    function saveAndEdit(validator,identifier,id) {
        var validatorConfirm = validar(validator);
        if (validatorConfirm == false) {
            alertaAcciones("center", "top", " Error", " Debe ingresar Campos Obligatorios", "#D44950", "#fff", "exclamation");
            return false;
        }

        var formData = $("#"+validator).serialize();
        $.post('{{asset("guardarEditarCharacter")}}',{formData:formData,identifier:identifier,id:id,"_token": "{{ csrf_token() }}" },function(response){ 

            if (response==1) {
                window.location.href='{{url("/homePolls")}}'+'/'+'{{$tokenEncript}}';
            }
      
        });
    }




</script>
    @endsection

