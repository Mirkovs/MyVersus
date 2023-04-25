@extends('layouts.app')
@section('content')

<!DOCTYPE html><html>
<div class="container">
  <meta charset="utf-8" />
<head>
  <script src="https://unpkg.com/leaflet@1.0.2/dist/leaflet.js"></script>
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.2/dist/leaflet.css" />
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">  
</head>
<body>
    <h1>{{$title}}</h1>
   <div id="map"></div>
{{-- Script del mapa --}}

@include('inc.map')<hr>

{{-- Si no esta resgistrado no podrá añadir nuevas zonas --}}
@if(!Auth::guest())
  <h5>¿Quieres agregar una nueva zona?. Completa los siguientes campos.</h5><hr>
  {!! Form::open(['action' => 'GpssController@store', 'method' => 'POST']) !!} 
    {{Form::label('lugar', 'Nombre del lugar')}}
    {{Form::text('lugar', '', ['class' => 'form-control', 'col-md-4'])}}
    {{Form::label('gps1', 'Primera Coordenada')}}
    {{Form::text('gps1', '', ['class' => 'form-control', 'col-md-4'])}}
    {{Form::label('gps2', 'Segunda Coordenada')}}
    {{Form::text('gps2', '', ['class' => 'form-control', 'col-md-4'])}}              
    {{Form::label('url', 'URL')}}              
    {{Form::text('url', '', ['class' => 'form-control', 'col-md-4'])}}<hr>
    {{Form::submit('Enviar', ['class'=>'btn btn-primary'])}}
  {!! Form::close() !!}
@else
  <h5>Debes iniciar sesión para poder añadir nuevas zonas al mapa</h5><hr>
@endif
  
  <br>
</body> 
 </html>
</div>

@endsection