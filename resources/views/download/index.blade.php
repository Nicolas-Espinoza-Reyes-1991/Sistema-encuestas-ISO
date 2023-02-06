@extends('layouts.app')

@section('content')
<div class="container mb-5">
    <div class="row mt-5 mb-3">
        <div class="col-lg-12 text-center text-primary">
            <h3 class="text-black">REPORTE DE RESULTADOS </h3>
            <p class="text-secondary texto1">GESTIÓN LOCAL DE LAS POLÍTICAS DE PREVENCIÓN DE ALCOHOL Y OTRAS DROGAS
                <br><i class="mt-2">SENDA 2022</i></p>
        </div>
    </div>

<div id="grafico1"></div>
<div id="grafico2"></div>
<div id="grafico3"></div>
<div id="graficoDimension1" class="mt-3">

    {!!$grafico41!!}
    {{$id_user}}
</div>
<div id="graficoDimension2"></div>
<div id="graficoDimension3"></div>
<div id="graficoDimension4"></div>
<div id="graficoDimension5"></div>
<div id="graficoDimension6"></div>
<div id="graficoDimension7"></div>
<div id="graficoDimension8"></div>
<div id="graficoDimension9"></div>



</div>

<script>

    $(document).ready(function () {

        $.post('{{asset("graficos")}}',{ id_user: 2 ,"_token": "{{ csrf_token() }}"},function(response){ 
        var obj= jQuery.parseJSON(response);
            $('#grafico1').html(obj.grafico1);
            $('#grafico2').html(obj.grafico2);
            $('#grafico3').html(obj.grafico3);       
        });
 
        $.post('{{asset("modalGraficoDimensionDownload")}}',{titulo:1,dimension:1,id_user:2,cont:1,"_token": "{{ csrf_token() }}"},function(response){ 
        var obj= jQuery.parseJSON(response);
            $('#graficoDimension'+1).html(obj.modalResultGrafico);
        });

        $.post('{{asset("modalGraficoDimensionDownload")}}',{titulo:2,dimension:2,id_user:2,cont:2,"_token": "{{ csrf_token() }}"},function(response){ 
        var obj= jQuery.parseJSON(response);
            $('#graficoDimension'+2).html(obj.modalResultGrafico);
        });

        $.post('{{asset("modalGraficoDimensionDownload")}}',{titulo:3,dimension:3,id_user:2,cont:3,"_token": "{{ csrf_token() }}"},function(response){ 
        var obj= jQuery.parseJSON(response);
            $('#graficoDimension'+3).html(obj.modalResultGrafico);
        });

        $.post('{{asset("modalGraficoDimensionDownload")}}',{titulo:4,dimension:4,id_user:2,cont:4,"_token": "{{ csrf_token() }}"},function(response){ 
        var obj= jQuery.parseJSON(response);
            $('#graficoDimension'+4).html(obj.modalResultGrafico);
        });

        $.post('{{asset("modalGraficoDimensionDownload")}}',{titulo:5,dimension:5,id_user:2,cont:5,"_token": "{{ csrf_token() }}"},function(response){ 
        var obj= jQuery.parseJSON(response);
            $('#graficoDimension'+5).html(obj.modalResultGrafico);
        });

        $.post('{{asset("modalGraficoDimensionDownload")}}',{titulo:6,dimension:6,id_user:2,cont:6,"_token": "{{ csrf_token() }}"},function(response){ 
        var obj= jQuery.parseJSON(response);
            $('#graficoDimension'+6).html(obj.modalResultGrafico);
        });

        $.post('{{asset("modalGraficoDimensionDownload")}}',{titulo:7,dimension:7,id_user:2,cont:7,"_token": "{{ csrf_token() }}"},function(response){ 
        var obj= jQuery.parseJSON(response);
            $('#graficoDimension'+7).html(obj.modalResultGrafico);
        });

        $.post('{{asset("modalGraficoDimensionDownload")}}',{titulo:8,dimension:8,id_user:2,cont:8,"_token": "{{ csrf_token() }}"},function(response){ 
        var obj= jQuery.parseJSON(response);
            $('#graficoDimension'+8).html(obj.modalResultGrafico);
        });

        $.post('{{asset("modalGraficoDimensionDownload")}}',{titulo:9,dimension:9,id_user:2,cont:9,"_token": "{{ csrf_token() }}"},function(response){ 
        var obj= jQuery.parseJSON(response);
            $('#graficoDimension'+9).html(obj.modalResultGrafico);
        });

    });

</script>

@endsection