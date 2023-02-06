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
.btn-flotante {
	font-size: 12px; /* Cambiar el tamaño de la tipografia */
	text-transform: uppercase; /* Texto en mayusculas */
	font-weight: bold; /* Fuente en negrita o bold */
	color: #ffffff; /* Color del texto */
	border-radius: 5px; /* Borde del boton */
	letter-spacing: 2px; /* Espacio entre letras */
	/* background-color: #E91E63; Color de fondo */
	padding: 14px 14px; /* Relleno del boton */
	position: fixed;
	bottom: 100px;
	right: 220px;
	transition: all 300ms ease 0ms;
	box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
	z-index: 99;
}
.btn-flotante:hover {
	background-color: #2c2fa5; /* Color de fondo al pasar el cursor */
	box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.3);
	transform: translateY(-2px);
}
@media only screen and (max-width: 600px) {
 	.btn-flotante {
		font-size: 14px;
		padding: 12px 20px;
		bottom: 100px;
		right: 1px;
	}
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



<div class="d-flex justify-content-center">
    <div style="display:none" id="loaderContenPoll"  class="loader"></div>
</div>


<div id="contenPollGeneral">
<div class="fade show">
<button onclick="saveAndEdit('encuestaForm','','{{$selectGet ? $selectGet->id_encuesta2:''}}','2')" class="btn-flotante btn btn-md btn-primary pulse" data-toggle="tooltip" data-placement="top" title="Guardar de forma temporal"><i class="fas fa-save"></i></button>
    <form id="encuestaForm">    
    <input type="hidden" id="id_usuario" name="id_usuario" value="{{$id_user}}">
    @php
    $num=1;
    @endphp
    @foreach ($Selectores as $select) 
        @if ($select->Variable)
            @php
                if($select->dimension!='')
                    $dimensionRepetir=$select->dimension;
            @endphp
            <div class="row">
                <div class="alert alert-primary" role="alert">
                    <strong>{{$dimensionRepetir}}</strong> {{$select->Variable}}
                </div>
            </div>
        @endif
        @php
            $pregAnt=$select->N;
        @endphp
        @if ($select->enunciado_valor=='' || $select->enunciado_valor=='11')
            <div class="row pt-4 ps-5 pe-5 mb-4 bg-white"></strong>
                <h5>{{$num}}. {{$select->Pregunta}}</h5>
                <hr>
        @endif


            @if ($select->enunciado!="")
                <div class="alert alert-secondary d-flex align-items-center" role="alert">
                    <span><strong>Contexto : </strong>{{$select->enunciado}}</span>
                </div>
            @endif

            <div class="col-lg-3 mb-3">
                <label for="" class="form-label pb-2 fw-bold fw-bold">Confidencial, Privado, Sensitivo</label>
               
                    <select id="p{{$num}}-1" name="p{{$num}}-1" class="form-control form-control-sm required" aria-label="">     
                        @foreach($SelectoresDato as $dato) 
                            @if ('p'.$dato->f1.'-1'=='p'.$num.'-1')
                                @php
                                    $numberp="p".$num.'-1';
                                    $numberValue=$dato->valor;
                                @endphp
                                @if (empty($selectGet->$numberp))
                                    <option value="{{$numberValue}}">{{$dato->alternativas}}</option>
                                @else
                                    <option {{$selectGet->$numberp == $numberValue ? 'selected="selected"' : ''}} value="{{$dato->valor}}">{{$dato->alternativas}}</option>
                                @endif
                            @endif
                        @endforeach
                </select>    
            </div>
            <div class="col-lg-4 mb-3">
                <label for="" class="form-label pb-2 fw-bold fw-bold">Obligación por ley / Contrato / Convenio</label>
                    <select id="p{{$num}}-2" name="p{{$num}}-2" class="form-control form-control-sm required" aria-label="">     
                        @foreach($SelectoresDato as $dato) 
                            @if ('p'.$dato->f1.'-2'=='p'.$num.'-2')
                                @php
                                    $numberp="p".$num.'-2';
                                    $numberValue=$dato->valor;
                                @endphp
                                @if (empty($selectGet->$numberp))
                                    <option value="{{$numberValue}}">{{$dato->alternativas}}</option>
                                @else
                                    <option {{$selectGet->$numberp == $numberValue ? 'selected="selected"' : ''}} value="{{$dato->valor}}">{{$dato->alternativas}}</option>
                                @endif
                            @endif
                        @endforeach
                </select>    
            </div>
            <div class="col-lg-5 mb-3">
                <label for="" class="form-label pb-2 fw-bold fw-bold">Costo de recuperación (tiempo, económico, material, imagen, emocional)</label>
                    <select id="p{{$num}}-3" name="p{{$num}}-3" class="form-control form-control-sm required" aria-label="">     
                        @foreach($SelectoresDato as $dato) 
                            @if ('p'.$dato->f1.'-3'=='p'.$num.'-3')
                                @php
                                    $numberp="p".$num.'-3';
                                    $numberValue=$dato->valor;
                                @endphp
                                @if (empty($selectGet->$numberp))
                                    <option value="{{$numberValue}}">{{$dato->alternativas}}</option>
                                @else
                                    <option {{$selectGet->$numberp == $numberValue ? 'selected="selected"' : ''}} value="{{$dato->valor}}">{{$dato->alternativas}}</option>
                                @endif
                            @endif
                        @endforeach
                </select>    
            </div>
            <div class="col-lg-5 mb-3">
                <label for="" class="form-label pb-2 fw-bold fw-bold">Magnitud de Daño</label>
                    <select id="p{{$num}}-4" name="p{{$num}}-4" class="form-control form-control-sm required" aria-label="">  
                        <option value="0">Seleccione</option> 
                        @foreach($magnitud as $mg)  
                                @php
                                    $numberp="p".$num.'-4';
                                    $numberValue=$dato->valor;
                                @endphp
                                    @if (empty($selectGet->$numberp))
                                    <option value="{{$mg->id_magnitud}}">{{$mg->descripcion}}</option>
                                @else
                                    <option {{  $selectGet->$numberp == $mg->id_magnitud ? 'selected="selected"' : ''}} value="{{$mg->id_magnitud}}">{{$mg->descripcion}}</option>
                                @endif
                        @endforeach
                    </select>
            </div>
        @if ($select->enunciado_valor=='' || $select->enunciado_valor=='13')
           </div> 
        @endif
        @php
            $num++;
        @endphp
    @endforeach
</form>

    <div class="row">
        <div class="col-12 pe-0">
                <button id="btnPollsSave" type="button" class="btn btn-lg btn-success float-end"
                onclick="saveAndEdit('encuestaForm','','{{$selectGet ? $selectGet->id_encuesta2:''}}','1')">Enviar mis respuestas <i class="fas fa-share"></i></button>
                <button type="button" class="btn btn-lg btn-default float-end" onclick="exitPoll()"><i class="fas fa-undo"></i> Volver </button>
        </div>
    </div>
</div>
</div>

<script>
    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})


function exitPoll(){
    Swal.fire({
        title: '¿Desea volver a Caracterización? Al volver, se perderán los datos no guardados.',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, volver',
        showCancelButton: true,
        reverseButtons:true,
        }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            window.location.href='{{url("/character")}}'+'/'+'{{$tokenEncript}}';
        } else if (result.isDenied) {
            
        }
    }) 
}


</script>

