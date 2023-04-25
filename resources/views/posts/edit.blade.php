@extends('layouts.app')
       
@section('content')
      
<div class="container">
    <h1>Editar Anuncio</h1>

    {!!Form::model($post, array('method' => 'PUT', 'route' => array('posts.update', $post->id)))!!}
    {{Form::text('title', $post->title, ['class' => 'form-control', 'col-md-4'])}}
    <br>
    {{Form::textarea('body', $post->body, ['class' => 'form-control', 'id' => 'article-ckeditor'])}}
    <hr>
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Enviar', ['class'=>'btn btn-primary'])}} <a href="/posts" class="btn btn-back">Atrás</a>
    {!! Form::close() !!}
    
</div>

<script>
    CKEDITOR.replace( 'article-ckeditor' );
</script>   
@endsection
