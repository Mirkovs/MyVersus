@extends('layouts.app')
@section('content')

<div class="container"><center>
    <h1>{{$title}}</h1>
    <div> 
        <H4>¡La competición comienza ahora!</H4><br>
        @if(Auth::user())
        @else
            <a href="{{ route('register') }}" class="btn btn-success">Regístrate</a>
            <a href="{{ route('login') }}" class="btn btn-primary">Iniciar sesión</a><br><br>
        @endif
        <img src="img/vs.png">
    </div>
</div></center>

@endsection
