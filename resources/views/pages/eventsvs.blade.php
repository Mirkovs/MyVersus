@extends('layouts.app')
@section('content')
<div class="container">

    <h1>Eventos VS</h1>

    @foreach ($vs as $v)

            <div class="list-group-item">
                    <h4>{{$v->gps_vs}}</h4>
                    <h5>Participantes: {{$v->users4}} {{@$v->users3}} <a>VS</a> {{$v->users1}} {{@$v->users2}}
                    {{-- No aparecen los usuarios "null" que es del campo "nadie" de el apartado VS --}}
                    </h5>
                    <details>
                        <summary>Mas detalles</summary>
                        {!!$v->text!!}
                    </details> 
                    <a>Empieza: {{$v->time_vs}} {{$v->date_vs}} </a><a>Creado por: {{$v->users4}}</a>

                <div class="right2">
                    @if(Auth::user()->id == "0")                     
                    {!! Form::open(['action' => ['MatchController@destroy', $v->id], 'method' => 'POST']) !!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Borrar evento', ['class'=>"btn btn-danger"])}}
                    {!! Form::close() !!}
                    @endif
                </div>       
            </div>   
    @endforeach


    <hr><a href="/admin" class="btn btn-back">Atrás</a>
    </div>  
@endsection