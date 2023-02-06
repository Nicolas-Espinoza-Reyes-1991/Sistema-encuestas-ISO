
<figure class="highcharts-figure">
    <div id="graficData4-6"></div>

    <div class="accordion accordion-flush" id="accordionFlushExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
        <b>No iniciados ( {{$noIniciadoListCount}})</b>
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
        <table class="table table-sm table-hover table-bordered table-striped" style="text-transform:capitalize;">
          <tbody>
            @if ($noIniciadoList!="" AND $noIniciadoList!=NULL)
                @foreach ($noIniciadoList as $noiciado)
                    <tr><td>{{$noiciado}}</td></tr>
                @endforeach
            @endif
          </tbody>
        </table>            
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
      <b>En proceso ( {{$enProcesoListCount}} )</b>
      </button>
    </h2>
    <div id="flush-collapseTwo" class="accordion-collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
      <table class="table table-sm table-hover table-bordered table-striped" style="text-transform:capitalize;">
          <tbody>
              @if ($enProcesoList!="" AND $enProcesoList!=NULL)
                @foreach ($enProcesoList as $enProceso)
                <tr><td>{{$enProceso}}</td></tr>
                @endforeach
              @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
      <b>Completados ( {{$completoListCount}})</b>
      </button>
    </h2>
    <div id="flush-collapseThree" class="accordion-collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
        <table class="table table-sm table-hover table-bordered table-striped" style="text-transform:capitalize;">
          <tbody>
            @if ($completoList!="" AND $completoList!=NULL)
              @foreach ($completoList as $completo)
                <tr><td>{{$completo}}</td></tr>
              @endforeach
            @endif
          </tbody>
        </table>            
      </div>
    </div>
  </div>
</div>
</figure>

<script>

$(document).ready(function () {
$(".highcharts-credits").css('display','none');    
});


// Build the chart
Highcharts.chart('graficData4-6', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Dimensión {{$tituloDimension}}'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                connectorColor: 'silver'
            }
        }
    },
    series: [{
        name: 'Share',
        data: [
            { name: 'Completo', y: <?php echo  $totalPorDimensionMultiArray->completo ?> },
            { name: 'No iniciado', y: <?php echo  $totalPorDimensionMultiArray->noiniciado ?> },
            { name: 'En proceso', y: <?php echo  $totalPorDimensionMultiArray->enproceso ?> }
        ]
    }]
});
</script>
