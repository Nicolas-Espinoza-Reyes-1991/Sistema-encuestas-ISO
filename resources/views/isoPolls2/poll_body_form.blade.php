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

.time-flotante {
	font-size: 15px; /* Cambiar el tamaño de la tipografia */
	text-transform: uppercase; /* Texto en mayusculas */
	font-weight: bold; /* Fuente en negrita o bold */
	color: black; /* Color del texto */
	border-radius: 5px; /* Borde del boton */
	letter-spacing: 2px; /* Espacio entre letras */
	background-color:#E3EDF2 ; border: 3px solid #b6d4fe;
	padding: 14px 14px; /* Relleno del boton */
	position: fixed;
    top:30px;
	right: 160px;
	transition: all 300ms ease 0ms;
	box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
	z-index: 99;
    /* border: 3px solid #f1e4ba; */
}
.time-flotante:hover {
	background-color: #e4f5fd; /* Color de fondo al pasar el cursor */
	box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.3);
	transform: translateY(-2px);
}

.footer {
  position: fixed;
  left: 287px;
  bottom:0px;
  width: 70%;
  text-align: center;
}

.rounded {
    background-color:#e3edf2 ; 
    border: 3px solid #b6d4fe;
}


.rounded:hover {
	background-color: #e4f5fd; 
	box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.3);
	transform: translateY(-2px);
}


.contenFooter {
  width: 50%;
  text-align: center; 
}


.barra {
  border-radius: 20px;
}


.progress {
    display: flex;
    height: 1rem;
    overflow: hidden;
    font-size: .75rem;
    background-color: #ffffff;
    border-radius: 0.25rem;
}

bg-info {
    background-color: #cfe2ff !important;
}

@media only screen and (max-width: 600px) {
 	.time-flotante {
		font-size: 10px;
		padding: 12px 20px;
		bottom: 500px;
		right: 1px;
	}

    .footer {
        position: fixed;
        left: 60px;
        bottom:0px;
        width: 70%;
        height: 65px;
        /* color: white; */
        text-align: center;
        font-size: 12px;
    }

    .btn-flotante {
		font-size: 14px;
		padding: 12px 20px;
		bottom: 188px;
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
<div id="contenPollGeneral" style="display:none">
<div class="fade show">
{{-- <button onclick="saveAndEdit('encuestaForm','','{{$selectGet ? $selectGet->id_encuesta:''}}','2')" class="btn-flotante btn btn-md btn-primary pulse" data-toggle="tooltip" data-placement="top" title="Guardar de forma temporal"><i class="fas fa-save"></i></button> --}}
<span id="timeId" class="time-flotante"></span>
    <form id="encuestaForm" >    
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
        @endif

            @if ($select->enunciado!="")
                <div class="alert alert-secondary d-flex align-items-center" role="alert">
                    <span><strong>Contexto : </strong>{{$select->enunciado}}</span>
                </div>
            @endif

            <div class="col-lg-12 mb-3">
                <label for="" class="form-label pb-2 fw-bold fw-bold">{{$num}}. {{$select->Pregunta}}</label>
                    <select id="p{{$num}}" name="p{{$num}}" class="form-control form-control-sm required progressData" aria-label="">     
                        <option value="0">Seleccione</option>
                        @foreach($SelectoresDato as $dato) 
                            @if ($dato->f1==$num)
                                @php
                                    $numberp="p".$num;
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
                onclick="saveAndEdit('encuestaForm','','{{$selectGet ? $selectGet->id_encuesta:''}}','1')">Enviar mis respuestas <i class="fas fa-share"></i></button>
                <button type="button" class="btn btn-lg btn-default float-end" onclick="exitPoll()"><i class="fas fa-undo"></i> Volver </button>
        </div>
        <br>
    </div>
</div>


    <br><br><br>
    <div class="footer">
        <div class="rounded" style="">
            <div class="contenFooter"></div>
                <p style="color: black"><span id="numberBar">0</span> de 20</p>
                <div class="progress">
                <div id="progressBar" class="progress-bar progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 0%; background-color:#b2ccf1;"></div>
                </div>
            <br>
        </div>
    </div>

</div>
<script>
    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})


$(".progressData").change(function (e) { 
    progressBar();
});

$(document).ready(function () {
    progressBar();
    timer='{{$timer}}'
    timer = new Date(timer);
    actual=new Date();
    minutes=30;
    var fecha1 = moment(timer, "YYYY-MM-DD HH:mm:ss").add(minutes, 'minutes');
    fecha2= moment(actual,"YYYY-MM-DD HH:mm:ss");
    var diffs = fecha1.diff(fecha2, 's'); 
    if (diffs<0) {
        $("#contenPollGeneral").css('display','none')
         saveAndEdit('encuestaForm','','{{$selectGet ? $selectGet->id_encuesta:''}}','0');
        
    }else{
        $("#contenPollGeneral").css('display','block')
        diffs=secondsToString(diffs);
        var minutes = moment(diffs, "m");
        data=diffs.split(':');
        min = data[1];
        sec = data[2];
        data=min+'m'+sec+'s';
        $('#timeId').timer({
            countdown: true,
            duration: data,
            callback: function() {
                $("#contenPollGeneral").css('display','none')
                saveAndEdit('encuestaForm','','{{$selectGet ? $selectGet->id_encuesta:''}}','0')
            }
        });
    }

});

function secondsToString(seconds) {
  var hour = Math.floor(seconds / 3600);
  hour = (hour < 10)? '0' + hour : hour;
  var minute = Math.floor((seconds / 60) % 60);
  minute = (minute < 10)? '0' + minute : minute;
  var second = seconds % 60;
  second = (second < 10)? '0' + second : second;
  return hour + ':' + minute + ':' + second;
}

function exitPoll(){
    Swal.fire({
        title: '¿Desea volver a portal de encuesta? Al volver, se perderán los datos no guardados.',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, volver',
        showCancelButton: true,
        reverseButtons:true,
        }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            window.location.href='{{url("/homePolls")}}'+'/'+'{{$tokenEncript}}';
        } else if (result.isDenied) {
            
        }
    }) 
}


</script>

