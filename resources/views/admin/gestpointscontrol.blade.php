@extends('layouts.app')
@section('content')
<div class="container">
@if(Auth::user()->id == "0") 
<h1>Control de puntos</h1>

    
    <table class="table table-striped">
            <tr>
                <th>Posición</th>
                <th>Usuario</th>
                <th>Puntos</th>
                <th>Editar</th>

        @foreach ($users as $users)
            {{-- El admin es el que tiene el id=0 no queremos que se muestre --}}
            @if($users->id == 0)
            @else    
            </tr>
            {{-- Numero de interacciones que hay en el foreach, se van creando los puestos conforme hay mas usuarios con loop --}}
            <tr>
                
                <td>{{"#"}}{{$loop->iteration}}</td>
                
            
                <td>{{$users->nick}}</td>
                <td>{{round($users->points)}}</td>
                <td><a href="/pointedit/{{$users->id}}" class="btn btn-success">Editar puntos</a></td>
            </tr>
            @endif
        @endforeach
    </table>
@else
    <script>window.location = "/";</script>
@endif
    <hr><a href="/admin" class="btn btn-back">Atrás</a> 
</div>
@endsection