@extends('layouts.app')

@section('content')
{{-- Solo se podrá acceder al control de admin si el id=0 que solo pertenece al admin --}}
@if(Auth::user()->id == "0")
<div class="container">
<h1>{{$title}}</h1><br>
   <div class="table table-bordered table-responsive center">
         <a href="/gestpointscontrol" class="btn btn-primary">Control de puntos</a>
         <a href="/gestgpscontrol" class="btn btn-primary">Control de zonas</a>
         <a href="/gestusercontrol" class="btn btn-primary">Control de usuarios</a>
         <a href="/gestvscontrol" class="btn btn-primary">Control de competición</a>
   </div>
</div>
@else
{{-- Si el usuario no es admin se dirige a la pag inicial --}}
<script>window.location = "/";</script>
@endif
@endsection
