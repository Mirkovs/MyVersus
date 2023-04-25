@extends('layouts.app')
@section('content')
@if(Auth::user()->id == "0")
<div class="container">
    <h1>Control de zonas</h1>

    @foreach ($gpss as $gps)
            

    <div class="list-group-item">
                <h4>{{$gps->lugar}}</h4>
                <h5>{{$gps->gps1}} {{$gps->gps2}} <a href="{!!$gps->url!!}">URL</a></h5>
                    
        <div class="right2">
                {!! Form::open(['action' => ['GpssController@destroy', $gps->id], 'method' => 'POST']) !!} <a href="/gpsedit/{{$gps->id}}" class="btn btn-success">Editar zona</a>
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Borrar zona', ['class'=>"btn btn-danger"])}}
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