@extends('layouts.app')
@section('content')
<div class="container">
@if(Auth::user()->id == "0")
    <h1>Control de usuarios</h1>

    @foreach ($users as $user)
    {{-- El admin es el que tiene el id=0 no queremos que se muestre --}}
        @if($user->id !== 0)        

            <div class="list-group-item">
                    <h4>{{$user->nick}}</h4>
                    <h5><a>DNI: {{$user->dni}}</a> <a>Puntos: {{round($user->points)}}</a> <a>Email: {{$user->email}}</a></h5>
                    
                <div class="right2">
                        {!! Form::open(['action' => ['RankingController@destroy', $user->id], 'method' => 'POST']) !!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Borrar usuario', ['class'=>"btn btn-danger"])}}
                    {!! Form::close() !!}
                    
                </div>       
    </div>    
        @endif
    @endforeach

    @else
        <script>window.location = "/";</script>          
@endif
    <hr><a href="/admin" class="btn btn-back">Atrás</a>
    </div>  
@endsection