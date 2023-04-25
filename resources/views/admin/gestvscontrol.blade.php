@extends('layouts.app')
@section('content')
<div class="container">
@if(Auth::user()->id == "0")
    <h1>Control de competición</h1>

    @foreach ($vs as $v)
            

            <div class="list-group-item">
                    <h4>{{$v->gps_vs}}</h4>
                    <h5>Participantes: {{$v->users4}} {{@$v->users3}} <a>VS</a> {{$v->users1}} {{@$v->users2}}
                    {{-- No aparecen los usuarios "null" que es del campo "nadie" de el apartado VS --}}
                    </h5>
                    <a>Empieza: {{$v->time_vs}} {{$v->date_vs}} </a><a>Creado por: {{$v->users4}}</a> 
                <div class="right2">
                        {!! Form::open(['action' => ['MatchController@destroy', $v->id], 'method' => 'POST']) !!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Borrar evento', ['class'=>"btn btn-danger"])}}
                    {!! Form::close() !!}
                    
                </div>       
            </div>    

    @endforeach

    @else
        <script>window.location = "/";</script>          
@endif
    <hr><a href="/admin" class="btn btn-back">Atrás</a>
    </div>  
@endsection