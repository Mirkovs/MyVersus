@extends('layouts.app')
       
@section('content')
      
<div class="container">
    <h1>Crear Anuncio</h1>
                

    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!} 
    {{Form::text('title', 'Nuevo Anuncio', ['class' => 'form-control', 'col-md-4'])}}
    <br>
    {{Form::textarea('body', '', ['class' => 'form-control', 'id' => 'article-ckeditor'])}}
    <hr>
    {{Form::submit('Enviar', ['class'=>'btn btn-primary'])}} <a href="/posts" class="btn btn-back">Atrás</a>
    {!! Form::close() !!}
                
</div>

<script>
    CKEDITOR.replace( 'article-ckeditor' );
</script>   
@endsection
