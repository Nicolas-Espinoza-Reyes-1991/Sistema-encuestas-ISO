@extends('layouts.app')
@section('content')
<!--contenido-->
<div class="container mb-5">
    <div class="row mt-5 mb-3">
        <div class="col-lg-12 text-center text-primary">
            <h3 class="text-body">Gestión de prevención ISO 27001</h3>
                {{-- <br><h4 class="text-body mt-2">2022</h4> --}}
        </div>
    </div>
    <div class="row pt-4 ps-5 pe-5 bg-white">
        <div class="col-lg-12 text-left text-body">
            <p class=" texto1">
                <h5><b>Cuestionario normas ISO 27001</b></h5>
                <br>
            </p>
        </div>
        <div class="row pb-4">
            <div class="col-12">
                <a href="{{url('/nacionalResult')}}" type="button" class="btn btn-sm btn-success float-end">Ingresar como administrador <i class="fas fa-share"></i></a>
            </div>
        </div>

        <div class="alert alert-warning alert-dismissible fade show" role="alert">
        Habiendo leído cuidadosamente estas condiciones de participación, ¿está dispuesto a participar en este estudio contestando este cuestionario?
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    </div>
    <div class="row pt-0 ps-5 pe-5 pb-4 bg-white mb-5">
        <div class="col-lg-12 ps-0 pe-0 mt-4 bg-info rounded">
            <span class="d-block p-4 text-white">
                <p class="fs-6">Si se le ha proporcionado un pase, ingréselo a continuación y haga click en continuar.
                </p>
                <div class="col-lg-6 mb-3 pt-2">
                    <div id="contenFormToken"></div>
                </div>
            </span>
        </div>
    </div>
</div>
</body>
</html>
<script>
    $(document).ready(function () {
        $.post('{{asset("contenFormToken")}}',{"_token": "{{ csrf_token() }}"},function(response){ 
        var obj= jQuery.parseJSON(response);
            $('#contenFormToken').html(obj.view);
        });
    });
</script>

@endsection


