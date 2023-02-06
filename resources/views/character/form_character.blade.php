<style>

.loader {
  border: 16px solid #f3f3f3; /* Light grey */
  border-top: 16px solid #3498db; /* Blue */
  border-radius: 50%;
  width: 120px;
  height: 120px;
  animation: spin 2s linear infinite;
}
@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

.pulse {
  animation: pulse-animation 2s infinite;
}

@keyframes pulse-animation {
  0% {
    box-shadow: 0 0 0 0px rgba(11, 94, 215, 0.4);
  }
  100% {
    box-shadow: 0 0 0 20px rgba(0, 0, 0, 0);
  }
}

</style>

<!--bloque 1-->
<form id="FormCaracterizacion">
    <input type="hidden" id="id_usuario" name="id_usuario" value="{{$id_user}}">
    <div class="row pt-4 ps-5 pe-5 mb-4 bg-white">
        <div class="col-lg-3 mb-3">
            <label for="" class="form-label pb-2 fw-bold fw-bold">1. Nombre: </label>
            <input type="text" class="form-control form-control-sm required" id="nombre" name="nombre" aria-describedby="" value="{{$selectGet ? $selectGet->nombre:''}}">
            <!-- <div id="" class="form-text">Campo obligatorio</div> -->
        </div>
        <div class="col-lg-3 mb-3">
            <label for="" class="form-label pb-2 fw-bold fw-bold">2. Cargo: </label>
            <input type="text" class="form-control form-control-sm required" id="cargo" name="cargo" aria-describedby="" value="{{$selectGet ? $selectGet->cargo:''}}">
            <!-- <div id="" class="form-text">Campo obligatorio</div> -->
        </div>
        <div class="col-lg-3 mb-3">
            <label for="" class="form-label pb-2 fw-bold fw-bold">3. Meses de experiencia en el cargo: </label>
            <input type="text" class="form-control form-control-sm required" id="meses_experiencia" name="meses_experiencia" aria-describedby="" value="{{$selectGet ? $selectGet->meses_experiencia:''}}">
            <!-- <div id="" class="form-text">Campo obligatorio</div> -->
        </div>
        <div class="col-lg-3 mb-3">
            <label for="" class="form-label pb-2 fw-bold fw-bold">4. Unidad en que se desempeña: </label>
            <input type="text" class="form-control form-control-sm required" id="unidad_desempe" name="unidad_desempe" aria-describedby="" value="{{$selectGet ? $selectGet->unidad_desempe:''}}">
            <!-- <div id="" class="form-text">Campo obligatorio</div> -->
        </div>
        <div class="col-lg-3 mb-3">
            <label for="" class="form-label pb-2 fw-bold fw-bold">2. Región: </label>
            {{-- <input type="text" class="form-control form-control-sm required" id="region" name="region" aria-describedby=""> --}}
            <!-- <div id="" class="form-text">Campo obligatorio</div> -->
            <select class="form-control form-control-sm required" id="region" name="region">
                <option value="">Seleccione</option>
                @foreach($regiones as $reg)
                @if (empty($selectGet->region))
                <option value="{{$reg->id_region}}">{{$reg->nombre}}</option>
                @else
                <option {{  $selectGet->region == $reg->id_region ? 'selected="selected"' : ''}} value="{{$reg->id_region}}">{{$reg->nombre}}</option>
                @endif
                @endforeach
            </select>
        </div>
        <div class="col-lg-3 mb-3">
            <label for="" class="form-label pb-2 fw-bold fw-bold">3. Cantidad de trabajadores: </label>
            <input type="text" class="form-control form-control-sm required" id="cantidad_trabajadore" name="cantidad_trabajadores" aria-describedby="" value="{{$selectGet ? $selectGet->cantidad_trabajadores:''}}">
        </div>
        <div class="row">
            <div class="col-12 pe-0 mb-4">
                <button type="button" class="btn btn-lg btn-success float-end" onclick="saveAndEdit('FormCaracterizacion','2','{{$selectGet ? $selectGet->id_caracterizacion:''}}')">Continuar <i class="fas fa-angle-right"></i></button>
                <button type="button" class="btn btn-lg btn-default float-end" onclick="exitPoll()"><i class="fas fa-sign-out-alt"></i> Salir de la Encuesta </button>
            </div>
        </div>
    </div>
    <!--bloque 3-->
</form>

<script>
$(document).ready(function () {
    checkedDate(1);
    checkedDate(2);
    checkedDate(3);
    checkedDate(4);
    checkedDate(5);
    checkedDate(6);
});

function exitPoll(){
    Swal.fire({
        title: '¿Desea salir de la encuesta? Al salir, se perderán los datos no guardados.',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, Salir',
        showCancelButton: true,
        reverseButtons:true,
        }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
             window.location.href='{{url("/")}}';
        } else if (result.isDenied) {
            
        }
    }) 
}


function checkedDate(paramNumber){
    boleamResult = $("#check"+paramNumber).prop('checked');
   if (boleamResult==true) {
        $("#pro"+paramNumber).val("checked");
        $('#pro'+paramNumber+'_experiencia').addClass("required").prop('readonly' , false);
        $('#pro'+paramNumber+'_formacion').addClass("required").prop('readonly',false);
        $('#pro'+paramNumber+'_especializaciones').addClass("required").prop('readonly',false);
   }else if(boleamResult==false){
        $("#pro"+paramNumber).val("");
        $('#pro'+paramNumber+'_experiencia').val("").removeClass("required").prop('readonly' , true);
        $('#pro'+paramNumber+'_formacion').val("").removeClass("required").prop('readonly',true);
        $('#pro'+paramNumber+'_especializaciones').val("").removeClass("required").prop('readonly',true);
   }else{
    return false;
   }
}









</script>

