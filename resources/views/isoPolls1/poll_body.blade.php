@extends('layouts.app')
@section('content')

<!--contenido-->
<div class="container mb-5">
    <div class="row mt-5 mb-3">
        <div class="col-lg-12 text-center text-primary">
            <h3 class="text-black">Formulario N°1 encuesta ISO:</h3>
        </div>

    </div>
    <div id="pollBodyForm"> </div>
    
</div>

<script>
    $(document).ready(function () {

        

        tokenEncript='{{$tokenEncript}}';
        id_user='{{$id_user}}';
        timer='{{$timer}}';
        
        $.post('{{asset("contenFormIsoPoll1")}}',{tokenEncript:tokenEncript,timer:timer,id_user:id_user,"_token": "{{ csrf_token() }}"},function(response){ 
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
        }else if(typeSave==2){
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
        }else{
            // Swal.fire({
            //     title: 'El tiempo para completar el formularioa a finalizado',
            //     showDenyButton: false,
            //     showCancelButton: false,
            //     confirmButtonText: 'Continuar',
            //     denyButtonText: `Salir`,
            //     backdrop: false,
            //     }).then((result) => {
            //         $("#contenPollGeneral").css("display","none");
            //         $("#loaderContenPoll").css("display","block");
            //     if (result.isConfirmed) {
                    saveAndEditGetMethod(validator,identifier,id,typeSave)
            //     }else if (result.isDenied) {
            //         window.location.href='{{url("/homePolls")}}'+'/'+'{{$tokenEncript}}';
            //     }
            // })




        }
    }

    function saveAndEditGetMethod(validator,identifier,id,typeSave){
        var formData = $("#"+validator).serialize();
        $.post('{{asset("guardarEditarIsopolls1")}}',{formData:formData,identifier:identifier,id:id,typeSave:typeSave,"_token": "{{ csrf_token() }}" },function(response){ 
            if (response==1) {
                window.location.href='{{url("/homePolls")}}'+'/'+'{{$tokenEncript}}';
            }else if(response==2){
                Swal.fire('Resultados temporales, guardados correcatmente!', '', 'success')
            }
        });
    }



    function progressBar(){
        contador=0;
        progreso=0;
        for (let index = 0; index < 20; index++) {
            contador++;
            valor = $("#p"+contador).val();
            if (valor!=0) {
                progreso++
            }   
        }
        console.log(progreso);
        $("#numberBar").text(progreso);
        var porcentaje= (progreso / 20)*100;
        var intPorcentaje = Math.round( porcentaje );
        $("#progressBar").css({"width": intPorcentaje+"%"});
    }

</script>
@endsection