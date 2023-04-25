@extends('layouts.app')

@section('content')
<div class="container">   
    <h1>{{$post->title}}</h1>
    
    <div class="list-group-item">
        {!!$post->body!!}
    </div>
    
    <small>Escrito en {{$post->created_at}} por {{$post->user->nick}}</small>
    <br>
    <hr>
    {{-- Si no esta registrado no puedes editar ni borrar --}}
    {{-- Evitamos de que otro usario borre o edite posts que no son suyos --}}
    @if(Auth::user() == $post->user)   
    
        {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST']) !!}
            {{Form::hidden('_method', 'DELETE')}} 
            {{Form::submit('Borrar anuncio', ['class'=>"btn btn-danger"])}}
            <a href="/posts/{{$post->id}}/edit" class="btn btn-success">Editar anuncio</a> <a href="{{ URL::previous() }}" class="btn btn-back">Atrás</a>  
            @else
            <a href="{{ URL::previous() }}" class="btn btn-back">Atrás</a>  
        {!! Form::close() !!}

    @endif
    
@endsection
</div>