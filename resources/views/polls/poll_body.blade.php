@extends('layouts.app')
@section('content')

<!--contenido-->
<div class="container mb-5">
    <div class="row mt-5 mb-3">
        <div class="col-lg-12 text-center text-primary">
            <h3 class="text-black">Probabilidad de Amenaza:</h3>
        </div>

        <div class="col-lg-12 ps-0 pe-0 bg-info rounded">
            <span class="d-block p-4 text-dark">
                <p class="fs-6">En la siguiente encuesta usted llenada las probabilidades de amenazas que podria sifrir su empresa.
Categorizado por niveles <b>[1 = Insignificante, 2 = Baja,  3= Mediana, 4 = Alta]</b>
                </p>

            </span>
        </div>
        
    </div>
    <div id="pollBodyForm"> </div>
</div>

<script>
    $(document).ready(function () {
        tokenEncript='{{$tokenEncript}}';
        id_user='{{$id_user}}';
        $.post('{{asset("contenFormPoll")}}',{tokenEncript:tokenEncript,id_user:id_user,"_token": "{{ csrf_token() }}"},function(response){ 
        var obj= jQuery.parseJSON(response);
            $('#pollBodyForm').html(obj.view)
        });
    });
    function saveAndEdit(validator,identifier,id,typeSave) {
        if (typeSave==1) {
            var validatorConfirm = validar(validator);
            if (validatorConfirm == false) {
                alertaAcciones("center", "top", " Error", " Debe ingresar Campos Obligatorios", "#D44950", "#fff", "exclamation");
                return false;
            }
            $("#contenPollGeneral").css("display","none");
            $("#loaderContenPoll").css("display","block");
            saveAndEditGetMethod(validator,identifier,id,typeSave)
        }else{
            Swal.fire({
                title: '¿Quieres guardar los resultados de forma temporal para completarlos despues?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Guardar',
                denyButtonText: `Salir`,
                }).then((result) => {
                if (result.isConfirmed) {
                saveAndEditGetMethod(validator,identifier,id,typeSave);
                }else if (result.isDenied) {
                    Swal.fire('Los resultados no fueron guardados', '', 'info')
                    return false
                }
            })
        }
    }

    function saveAndEditGetMethod(validator,identifier,id,typeSave){
        var formData = $("#"+validator).serialize();
        $.post('{{asset("guardarEditarpolls")}}',{formData:formData,identifier:identifier,id:id,typeSave:typeSave,"_token": "{{ csrf_token() }}" },function(response){ 
            if (response==1) {
                window.location.href='{{url("/poll_body2")}}'+'/'+'{{$tokenEncript}}';
            }else if(response==2){
                Swal.fire('Resultados temporales, guardados correcatmente!', '', 'success')
            }
        });
    }

</script>
@endsection