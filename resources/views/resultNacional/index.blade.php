@extends('layouts.app')
@section('content')
<!--contenido-->
<div class="container mb-5">
    <div class="row mt-5 mb-3">
        <div class="col-lg-12 text-center text-primary">
            <h3 class="text-black">REPORTE DE RESULTADOS </h3>
            <p class="text-secondary texto1">RRJB Security Encuentas 
                <br><i class="mt-2">ISO27001</i></p>
        </div>
    </div>

<div class="row pt-4 ps-5 pe-5 pb-4 mb-5 bg-white">
    <div class="mb-5">
        <h4>Reportes Matriz de Riesgo</h4>
    </div>  
    <div class="row">
        <div class="col-3">
        <a href="{{ url('excel/1/'.$tokenEncript) }}" class="btn btn-block btn-mat waves-effect waves-light btn-outline-primary mb-4">
            <i class="far fa-file-excel fa-1x"></i> <b>Descargar</b> encuesta 1</a>
        </div>
        <div class="col-3">
        <a href="{{ url('excel/2/'.$tokenEncript) }}" class="btn btn-block btn-mat waves-effect waves-light btn-outline-primary mb-4">
            <i class="far fa-file-excel fa-1x"></i> <b>Descargar</b> encuesta 2</a>
        </div>
        <div class="col-3">
            <a href="{{ url('excel/3/'.$tokenEncript) }}" class="btn btn-block btn-mat waves-effect waves-light btn-outline-primary mb-4">
            <i class="far fa-file-excel fa-1x"></i> <b>Descargar</b> encuesta 3</a>
        </div>
        <div class="col-3">
            <a href="{{ url('excel/4/'.$tokenEncript) }}" class="btn btn-block btn-mat waves-effect waves-light btn-outline-primary mb-5">
            <i class="far fa-file-excel fa-1x"></i> <b>Descargar</b> encuesta 4</a>
        </div>
    </div>
</div>

<div class="row pt-4 ps-5 pe-5 pb-4 mb-4 bg-white">
    <div class="mb-5">
        <h4>Reportes Encuestas Test ISO</h4>
    </div>  
    <div class="row">
        <div class="col-3">
        <a href="{{ url('excel/5/'.$tokenEncript) }}" class="btn btn-block btn-mat waves-effect waves-light btn-outline-primary mb-4">
            <i class="far fa-file-excel fa-1x"></i> <b>Descargar</b> encuesta Test ISO 1</a>
        </div>
        <div class="col-3">
        <a href="{{ url('excel/6/'.$tokenEncript) }}" class="btn btn-block btn-mat waves-effect waves-light btn-outline-primary mb-4">
            <i class="far fa-file-excel fa-1x"></i> <b>Descargar</b> encuesta Test ISO 2</a>
        </div>
        <div class="col-3">
            <a href="{{ url('excel/7/'.$tokenEncript) }}" class="btn btn-block btn-mat waves-effect waves-light btn-outline-primary mb-4">
            <i class="far fa-file-excel fa-1x"></i> <b>Descargar</b> encuesta Test ISO 3</a>
        </div>
        <div class="col-3">
            <a href="{{ url('excel/8/'.$tokenEncript) }}" class="btn btn-block btn-mat waves-effect waves-light btn-outline-primary mb-5">
            <i class="far fa-file-excel fa-1x"></i> <b>Descargar</b> encuesta Test ISO 4</a>
        </div>
    </div>
</div>



    <div class="row">
      <div class="col-12 pe-0">
        <a type="button" class="btn btn-sm btn-success float-end" href="{{url('/nacionalResult')}}">
          Finalizar proceso <i class="fas fa-times"></i></a>
      </div>
    </div>
</div>

<script>
    $(document).ready(function () {

    });


</script>


@endsection



