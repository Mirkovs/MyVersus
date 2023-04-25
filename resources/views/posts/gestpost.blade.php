@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Gestor de anuncios</h1>
        @foreach ($posts as $post)
        {{-- Solo se van a ver los posts creados por ese usuario o todos por el propio admin --}}
            @if(Auth::user() == $post->user || Auth::user()->id == "0")
        
                <div class="list-group-item">
                    <h4><a href="/posts/{{$post->id}}">{{$post->title}}</a></h4>
                    <small>Escrito en {{$post->created_at}} por {{$post->user->name}}</small>
                <div class="right">
                    {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST']) !!}
                        <a href="/posts/{{$post->id}}/edit" class="btn btn-success">Editar anuncio</a> 
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Borrar anuncio', ['class'=>"btn btn-danger"])}}
                    {!! Form::close() !!}
                </div>       
    </div>  

            @endif
        @endforeach
        <br>{{$posts->links()}}
            {{-- Si la variable $post no existe significa que el usuario no tiene post creados por lo que ejecutaremos el siguiente if --}}
            @if( isset($post) && ($post!==null) )
                <hr><a href="/posts/create" class="btn btn-primary">Crear un nuevo anuncio</a>
            @else
                <hr><h5>No has creado ningun anuncio. ¿Quieres crear uno? <a href="/posts/create">Crear nuevo anuncio.</a></h5><hr>
            @endif  
@endsection