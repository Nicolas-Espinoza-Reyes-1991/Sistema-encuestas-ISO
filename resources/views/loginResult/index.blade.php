@extends('layouts.app')
@section('content')
<!--contenido-->
<div class="container mb-5">
    <div class="row mt-5 mb-3">
        <div class="col-lg-12 text-center text-primary">
            <h3 class="text-body">Ingreso de Administradores </h3>
        </div>
    </div>

    <div class="row pt-0 ps-5 pe-5 pb-4 bg-white mb-5">
        <div class="row mt-4 pb-4">
            <div class="col-12">
                <a href="{{url('')}}" type="button" class="btn btn-sm btn-success float-end">Ingresar como usuario <i class="fas fa-share"></i></a>
            </div>
        </div>
        <div class="col-lg-12 ps-0 pe-0 mt-4 bg-info rounded">
            <span class="d-block p-4 text-white">
                <p class="fs-6">Si se le ha proporcionado un pase, ingréselo a continuación y haga click en continuar.
                </p>
                <div class="col-lg-6 mb-3 pt-2">
                    <div id="contenFormTokenResult"></div>
                </div>
            </span>
        </div>
    </div>
</div>
<!--fin contenido-->
</body>

</html>


<script>
    $(document).ready(function () {

        $.post('{{asset("contenFormTokenResult")}}',{"_token": "{{ csrf_token() }}"},function(response){ 
        var obj= jQuery.parseJSON(response);
            $('#contenFormTokenResult').html(obj.view);
        });



    });





    
</script>

@endsection


