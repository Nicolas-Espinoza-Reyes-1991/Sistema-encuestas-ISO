@extends('layouts.app')
@section('content')

<!--contenido-->
<div class="container mb-5">
    <div class="row mt-5 mb-3">
        <div class="col-lg-12 text-center text-primary">
            <h3 class="text-black">Resultados Grafico {{$number_graf}}</h3>
        </div>
        
    </div>
    <div id="pollBodyForm"> </div>
</div>

<script>
    $(document).ready(function () {
        tokenEncript='{{$tokenEncript}}';
        id_user='{{$id_user}}';
        number_graf='{{$number_graf}}';
        $.post('{{asset("bodyGrafIso")}}',{tokenEncript:tokenEncript,id_user:id_user,number_graf:number_graf,"_token": "{{ csrf_token() }}"},function(response){ 
        var obj= jQuery.parseJSON(response);
            $('#pollBodyForm').html(obj.view)
        });
    });

</script>
@endsection