<style>

.contenedoreBtn {
    cursor: pointer;
    cursor: pointer;
    width: 60%;
}

.marginconten{
    margin-top: 12px;
}

</style>

<h3 class="">Encuesta Matriz de Riesgo</h3>
 <div class="col-lg-12 ps-0 pe-0 mt-4 bg-light rounded">
    <span class="d-block p-4 text-white">
        <div class="col-lg-12 ">
            <div class="row">
                <div class="col-7">
                    <a href="{{url("/poll_body/$tokenEncript")}}" type="button" class="btn btn-lg btn-outline-primary float-end contenedoreBtn"><i class="fas fa-share"></i> Ingresar encuesta de riesgo</a>
                </div>
                <div class="col-5">
                    @if ($riesgo_result==1)
                        <i class="fas fa-check fa-2x text-success marginconten"><span style="font-size:28px"> Completado</span></i> 
                    @else
                        <i class="far fa-clock fa-2x text-muted marginconten"><span style="font-size:28px"> Pendiente</span></i>
                        
                    @endif
                    
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-7">
                    <a href="{{url("/")}}" type="button" class="btn btn-lg btn-outline-info float-end contenedoreBtn"><i class="far fa-eye"></i> Ver resultados encuenta de riesgos</a>
                </div>
            </div>
        </div>
    </span>
 </div>
<br>

<h3 class="">Encuesta Test ISO 27001</h3>
 <div class="col-lg-12 ps-0 pe-0 mt-4 bg-light rounded">
    <span class="d-block p-4 text-white">
        <div class="col-lg-12 ">
            <div class="row">
                <div class="col-7">
                    @if ($iso1_result==1)
                        <button onclick="mensaje(1)" type="button" class="btn btn-lg btn-outline-secondary float-end contenedoreBtn"><i class="fas fa-share"></i> Encuesta ISO Test 1</button>
                    @else
                        <button onclick="encuestaIso(1)" type="button" class="btn btn-lg btn-outline-primary float-end contenedoreBtn"><i class="fas fa-share"></i> Encuesta ISO Test 1</button>
                    @endif
                </div>
                <div class="col-5">
                    @if ($iso1_result==1)
                        <i class="fas fa-check fa-2x text-success marginconten"><span style="font-size:28px"> Completado</span></i> 
                    @else
                        <i class="far fa-clock fa-2x text-muted marginconten"><span style="font-size:28px"> Pendiente</span></i> 
                    @endif
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-7">
                    @if ($iso1_result==1)
                        <button onclick="GraficoIso(1)" type="button" class="btn btn-lg btn-outline-info float-end contenedoreBtn"><i class="far fa-eye"></i> Ver Resultados Test 1</button>
                    @else 
                        <button onclick="mensaje2(1)" type="button" class="btn btn-lg btn-outline-secondary float-end contenedoreBtn"><i class="far fa-eye-slash"></i> Ver Resultados Test 1</button>
                    @endif
                </div>
            </div>
        </div>
    </span>
 </div>
 
 <div class="col-lg-12 ps-0 pe-0 mt-4 bg-light rounded">
    <span class="d-block p-4 text-white">
        <div class="col-lg-12 ">
            <div class="row">
                <div class="col-7">
                    @if ($iso2_result==1)
                        <button onclick="mensaje(2)" type="button" class="btn btn-lg btn-outline-secondary float-end contenedoreBtn"><i class="fas fa-share"></i> Encuesta ISO Test 2</button>
                    @else
                        <button onclick="encuestaIso(2)" type="button" class="btn btn-lg btn-outline-primary float-end contenedoreBtn"><i class="fas fa-share"></i> Encuesta ISO Test 2</button>
                    @endif
                </div>
                <div class="col-5">
                    @if ($iso2_result==1)
                        <i class="fas fa-check fa-2x text-success marginconten"><span style="font-size:28px"> Completado</span></i> 
                    @else
                        <i class="far fa-clock fa-2x text-muted marginconten"><span style="font-size:28px"> Pendiente</span></i>
                        
                    @endif
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-7">
                 @if ($iso2_result==1)    
                    <button onclick="GraficoIso(2)" type="button" class="btn btn-lg btn-outline-info float-end contenedoreBtn"><i class="far fa-eye"></i> Ver Resultados Test 2</button>
                    @else 
                        <button onclick="mensaje2(2)" type="button" class="btn btn-lg btn-outline-secondary float-end contenedoreBtn"><i class="far fa-eye-slash"></i> Ver Resultados Test 2</button>
                    @endif
                </div>
            </div>
        </div>
    </span>
 </div>


  <div class="col-lg-12 ps-0 pe-0 mt-4 bg-light rounded">
    <span class="d-block p-4 text-white">
        <div class="col-lg-12 ">
            <div class="row">
                <div class="col-7">
                    @if ($iso3_result==1)
                        <button onclick="mensaje(3)" type="button" class="btn btn-lg btn-outline-secondary float-end contenedoreBtn"><i class="fas fa-share"></i> Encuesta ISO Test 3</button>
                    @else
                        <button onclick="encuestaIso(3)" type="button" class="btn btn-lg btn-outline-primary float-end contenedoreBtn"><i class="fas fa-share"></i> Encuesta ISO Test 3</button>
                    @endif
                </div>
                <div class="col-5">
                    @if ($iso3_result==1)
                        <i class="fas fa-check fa-2x text-success marginconten"><span style="font-size:28px"> Completado</span></i> 
                    @else
                        <i class="far fa-clock fa-2x text-muted marginconten"><span style="font-size:28px"> Pendiente</span></i>
                        
                    @endif
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-7">
                 @if ($iso3_result==1)
                    <button onclick="GraficoIso(3)" type="button" class="btn btn-lg btn-outline-info float-end contenedoreBtn"><i class="far fa-eye"></i> Ver Resultados Test 3</button>
                    @else 
                        <button onclick="mensaje2(3)" type="button" class="btn btn-lg btn-outline-secondary float-end contenedoreBtn"><i class="far fa-eye-slash"></i> Ver Resultados Test 3</button>
                    @endif
                </div>
            </div>
        </div>
    </span>
</div>
   <div class="col-lg-12 ps-0 pe-0 mt-4 bg-light rounded">
    <span class="d-block p-4 text-white">
        <div class="col-lg-12 ">
            <div class="row">
                <div class="col-7">
                    @if ($iso4_result==1)
                        <button onclick="mensaje(4)" type="button" class="btn btn-lg btn-outline-secondary float-end contenedoreBtn"><i class="fas fa-share"></i> Encuesta ISO Test 4</button>
                    @else
                        <button onclick="encuestaIso(4)" type="button" class="btn btn-lg btn-outline-primary float-end contenedoreBtn"><i class="fas fa-share"></i> Encuesta ISO Test 4</button>
                    @endif
                </div>
                <div class="col-5">
                    @if ($iso4_result==1)
                        <i class="fas fa-check fa-2x text-success marginconten"><span style="font-size:28px"> Completado</span></i> 
                    @else
                        <i class="far fa-clock fa-2x text-muted marginconten"><span style="font-size:28px"> Pendiente</span></i>
                        
                    @endif>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-7">
                 @if ($iso4_result==1)
                    <button onclick="GraficoIso(4)" type="button" class="btn btn-lg btn-outline-info float-end contenedoreBtn"><i class="far fa-eye"></i> Ver Resultados Test 4</button>
                    @else 
                        <button onclick="mensaje2(4)" type="button" class="btn btn-lg btn-outline-secondary float-end contenedoreBtn"><i class="far fa-eye-slash"></i> Ver Resultados Test 4</button>
                    @endif
                </div>
            </div>
        </div>
    </span>
 </div
        </div>
    </span>
 </div>
 <br><br><br>
<script>
    $(document).ready(function () {

    });

    function encuestaIso(numberEncuesta){
        encuestaName="isoPoll"+numberEncuesta+"_body";
        Swal.fire({
            title: 'Para realizar esta encuesta tendra un plazo de 30 minutos por formulario, la encuesta cuenta con un total de 4 formularios',
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: 'Continuar',
            denyButtonText: `Salir`,
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href='{{url("/")}}'+'/'+encuestaName+'/'+'{{$tokenEncript}}';
            }else if (result.isDenied) {
                return false
            }
        })
    }

        function GraficoIso(numberGraf){
            window.location.href='{{url("/graficos_iso")}}'+'/'+'{{$tokenEncript}}'+'/'+numberGraf;
        }

    function mensaje(number){
        Swal.fire({
        title: 'Atención!',
        text: "Esta encuesta ya fue ingresada favor, seleccionar otra",
        icon: 'warning',
        showCancelButton: false,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'OK'
        }).then((result) => {
        if (result.isConfirmed) {
            return false;
        }
        })
    }



    function mensaje2(number){
        Swal.fire({
        title: 'Atención!',
        text: "No tenemos datos para Graficar, favor llenar la encuesta",
        icon: 'warning',
        showCancelButton: false,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'OK'
        }).then((result) => {
        if (result.isConfirmed) {
            return false;
        }
        })
    }
    




    
</script>