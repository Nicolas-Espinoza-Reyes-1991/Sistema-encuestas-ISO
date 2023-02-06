@extends('layouts.app')
@section('content')
<!--contenido-->
<div class="container">
    <div class="row mt-5 mb-3">
        <div class="col-lg-12 text-center text-primary">
            <h2 class="text-black"><b>PORTAL DE ENCUESTAS</b></h2>
            <br><br>
            {{-- <p class="text-secondary texto1">Cuestionario normas ISO 27001
                <br><i class="mt-2">2022</i></p> --}}
        </div>
    </div>
    <div class="row pt-4 ps-5 pe-5 bg-white">
        <div class="col-lg-12 text-left text-body">
            {{-- <p class=" texto1">
                <h5><b>Seleccione encuesta a realizar</b></h5>
                <br>
            </p> --}}
        </div>
    </div>
    <div class="row pt-0 ps-5 pe-5 pb-4 bg-white">
        <div id="contenFormToken"></div>
        
    </div>
</div>
</body>
</html>
<script>
    $(document).ready(function () {
        $.post('{{asset("form_content")}}',{tokenEncript:'{{$tokenEncript}}',"_token": "{{ csrf_token() }}"},function(response){ 
        var obj= jQuery.parseJSON(response);
            $('#contenFormToken').html(obj.view);
        });
    });
</script>

@endsection


