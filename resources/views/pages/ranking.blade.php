@extends('layouts.app')
@section('content')
<div class="container">
<h1>Ranking</h1>

    
    <table class="table table-striped">
            <tr>
                <th>Posición</th>
                <th>Usuario</th>
                <th>Puntos</th>

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
            </tr>
            @endif
        @endforeach
    </table>
</div>

@endsection