@extends('layouts.app')
       
@section('content')
@if(Auth::user()->id == "0")      
<div class="container">
   
    <h1>Editar Puntos</h1>

    {!!Form::model($users, array('method' => 'PUT', 'route' => array('users.update', $users->id)))!!}
        {{Form::label('points', 'Puntos')}}
        {!!$users->nick!!}
        {{Form::text('points', round($users->points), ['class' => 'col-sm-2 form-control'])}}
        {{Form::hidden('_method', 'PUT')}}<hr>
        {{Form::submit('Enviar', ['class'=>'btn btn-primary'])}} <a href="{{ URL::previous() }}" class="btn btn-back">Atrás</a>
    {!! Form::close() !!}
    
</div>
@else
        <script>window.location = "/";</script>          
@endif
@endsection