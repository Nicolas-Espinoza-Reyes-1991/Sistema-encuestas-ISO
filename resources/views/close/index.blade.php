@extends('layouts.app')
@section('content')
<!--contenido-->
<div class="container mb-5">
    <div class="row mt-5 mb-3">
        <div class="col-lg-12 text-center text-primary">
            <h3 class="text-black">GESTIÓN LOCAL DE LAS POLÍTICAS DE PREVENCIÓN </h3>
            <p class="text-secondary texto1">DE ALCOHOL Y OTRAS DROGAS
                <br><i class="mt-2">SENDA 2022</i></p>
        </div>
    </div>
    <!--pregunta 1-->
    <div class="row pt-4 pb-4 ps-5 pe-5 mb-4 bg-white">
        <div class="col-lg-12 text-center text-black-50">
            <p class=" texto1">
                <h5><b>¡Muchas gracias por responder esta encuesta!</b></h5>

                Tus respuestas son muy importantes para nosotros.
            </p>
        </div>
    </div>
    <div class="col-12 pe-0">
        <a type="button" href="{{url("/")}}" class="btn btn-sm btn-success float-end">Volver al inicio <i class="fas fa-undo"></i></a>
    </div>
    </body>

    </html>
    @endsection
