@extends('layouts.app')

@section('content')
<div class="container">
        
    <h1>Tablón de anuncios</h1>
    @if(count($posts) > 0)
        @foreach ($posts as $post)
        <div class="list-group-item">
             
        <h4><a href="/posts/{{$post->id}}">{{$post->title}}</a></h4>
        <small>Escrito en {{$post->created_at}} por {{$post->user->nick}}</small>
</div>
        @endforeach
        {{$posts->links()}}
        
    @else
    
        <p> No hay anuncios</p>
    
    @endif
    {{-- Si no estamos registrados no podremos añadir nuevos anuncios --}}
    @if(!Auth::guest())
    <hr><a href="/posts/create" class="btn btn-primary">Crear un nuevo anuncio</a> 
    @else
    <hr><h5>Debes iniciar sesión para poder añadir nuevos anuncios</h5><hr>
    @endif
        
@endsection    

