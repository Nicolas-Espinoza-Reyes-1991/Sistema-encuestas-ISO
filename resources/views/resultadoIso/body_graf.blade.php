<figure class="highcharts-figure">
  <div id="container"></div>
  <p class="highcharts-description">
  </p>
</figure>


<div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Preguntas Respondidas de forma Correctas &nbsp;<b> ({{$Countcorrecta}})</b>
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <ul>
          @foreach ($resultList as $correctas)
            @if ($correctas->valor==1)
              <li>{{$correctas->Pregunta}}</li>
            @endif
          @endforeach
        </ul>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
         Preguntas Respondidas de forma Incorrectas &nbsp;<b> ({{$Countincorrecta}})</b>
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <ul>
          @foreach ($resultList as $incorrectas)
            @if ($incorrectas->valor!=1 && $incorrectas->valor!=0)
              <li>{{$incorrectas->Pregunta}}</li>
            @endif
          @endforeach
        </ul>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Omitidas/Sin Responder &nbsp;<b> ({{$Countincompleta}})</b>
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <ul>
          @foreach ($resultList as $sinresponder)
            @if ($sinresponder->valor==0)
              <li>{{$sinresponder->Pregunta}}</li>
            @endif
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</div>



<script>
    
    $(document).ready(function () {
        $(".highcharts-credits").css('display','none');
    });


    Highcharts.setOptions({
  colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
    return {
      radialGradient: {
        cx: 0.5,
        cy: 0.3,
        r: 0.7
      },
      stops: [
        [0, color],
        [1, Highcharts.color(color).brighten(-0.3).get('rgb')] // darken
      ]
    };
  })
});

// Data retrieved from https://netmarketshare.com/
// Build the chart
Highcharts.chart('container', {
  chart: {
    plotBackgroundColor: null,
    plotBorderWidth: null,
    plotShadow: false,
    type: 'pie'
  },
  title: {
    text: '',
    align: 'left'
  },
  tooltip: {
    pointFormat: '<b>{point.percentage:.1f}%</b>'
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
        enabled: true
      },
      showInLegend: true
    }
  },
  series: [{
    
    colorByPoint: true,
    data: [{
      color: '#84E19F',
      name: 'Respuestas Correctas',
      y: {{$Countcorrecta}},
      sliced: true,
      selected: true
    },  {
    color: '#E19584',
      name: 'respuestas Incorrectas',
      y: {{$Countincorrecta}}
    },  {
      color: '#DADADA',
      name: 'Omitidas/Sin Responder',
      y: {{$Countincompleta}}
    }]
  }]
});
</script>