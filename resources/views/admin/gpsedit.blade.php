@extends('layouts.app')
       
@section('content')
@if(Auth::user()->id == "0")      
<div class="container">
   
    <h1>Editar Zona</h1>

    {!!Form::model($gpss, array('method' => 'PUT', 'route' => array('gpss.update', $gpss->id)))!!}
        {{Form::label('lugar', 'Nombre del lugar')}}
        {{Form::text('lugar', $gpss->lugar, ['class' => 'form-control', 'col-md-4'])}}
        {{Form::label('gps1', 'Primera Coordenada')}}
        {{Form::text('gps1', $gpss->gps1, ['class' => 'form-control', 'col-md-4'])}}
        {{Form::label('gps2', 'Segunda Coordenada')}}
        {{Form::text('gps2', $gpss->gps2, ['class' => 'form-control', 'col-md-4'])}}
        {{Form::label('url', 'URL')}} 
        {{Form::text('url', $gpss->url, ['class' => 'form-control', 'col-md-4'])}}<hr>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Enviar', ['class'=>'btn btn-primary'])}} <a href="{{ URL::previous() }}" class="btn btn-back">Atrás</a>
    {!! Form::close() !!}
</div>
@else
    <script>window.location = "/";</script>          
@endif    
@endsection

