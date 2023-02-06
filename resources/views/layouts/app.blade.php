<!DOCTYPE html>
<html lang="en">

<head>
  <title>RRJB Security Encuentas ISO27001</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="{{asset('js/jquery.js')}}"></script>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap/boostrap.formcontrol.css') }}">
  <link href="{{ asset('css/fontawesome/css/all.css') }}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link href="{{asset('css/style.css')}}" rel="stylesheet">
  <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-bulma/bulma.css" rel="stylesheet">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
  <script src="{{ asset('js/validaciones.js') }}"></script>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/notify.css') }}">
  <script src="{{ asset('js/notify.js') }}"></script>
    <script src="{{ asset('js/moment.js') }}"></script>
  <script src="{{ asset('js/generic.js')}}"></script>
  <script src="{{ asset('js/highcharts.js')}}"></script>
  <script src="{{ asset('js/timer.jquery-master/dist/timer.jquery.js')}}"></script>
  <script src="{{ asset('js/timer.jquery-master/dist/timer.jquery.min.js')}}"></script>
  {{-- <script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script> --}}
</head>
<body class="bg-light">
  <div class="container" >
    <header class="bg-white d-flex flex-wrap justify-content-center py-4  ps-xs-2 pe-xs-2 ps-sm-2 pe-sm-2 ps-4 pe-4 mb-4 border-bottom border-3 border-secondary ">
      <a class="d-flex align-items-center">
        <img src="{{asset('img/logo1.png')}}" height="95">
      </a>
      {{-- <a class="align-middle my-auto me-2">
        <img class="vh-20" src="{{asset('img/leones.png')}}" height="60">
      </a> --}}
    </header>
  </div>
<main>
    @yield('content')
</main>


