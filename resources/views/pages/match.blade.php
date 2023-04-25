@extends('layouts.app')
@section('content')
<div class="container">
  <meta charset="utf-8" />
  @if(!Auth::guest())
    <div> 
      <div class="rightbox"><a>Una vez acabado el evento debes mandar una imagen con el resultado al siguiente correo:</a>
        <a href="mailto:myvsus@gmail.com?Subject=Resultado%20evento%20Myvsus">myvsus@gmail.com</a>
      </div>
        <h1>Competición</h1>
        <label>Selecciona los usuarios con los que competir</label>
      <form method="POST" action="{{ action('MatchController@store') }}">
        @csrf
        {{-- Usuario 1 --}} {{-- El admin es el que tiene el id=0 no queremos que se muestre ni tampoco el usuario al que estamos logeados  --}}
        <select class="col-sm-2 form-control" name="users1" required> 
        
          @foreach($users1 as $users1)
            @if ($users1->id == 0 or $users1->id == Auth::user()->id);
            @else
            <option selected value="{{$users1->nick}}">{{$users1->nick}}</option> 
            
            @endif
          @endforeach
        
        </select><br>
        {{-- Usuario 2 --}}
        <select class="col-sm-2 form-control" name="users2">                              
            <option selected value=" ">Nadie</option>
          @foreach($users2 as $users2)
            @if ($users2->id == 0 or $users2->id == Auth::user()->id);
            @else
            <option value="{{$users2->nick}}">{{$users2->nick}}</option> 
            
            @endif
          @endforeach
        
        </select><br>
        {{-- Usuario 3 --}}  
        <label for="users3">Selecciona el usuario de tu equipo</label>
        <select class="col-sm-2 form-control" name="users3">
            <option selected value=" ">Nadie</option>
          @foreach($users3 as $users3)
            @if ($users3->id == 0 or $users3->id == Auth::user()->id);
            @else
            <option value="{{$users3->nick}}">{{$users3->nick}}</option> 
            
            @endif
          @endforeach
          
        </select>
        {{-- Usuario 4 oculto, somos nosotros--}}
        <input type="hidden" value="{{Auth::user()->nick}}" name="users4">

        {{-- Zona --}}
        <br>
        <label for="gps_vs">Selecciona la zona donde competir</label>
        <select class="col-sm-6 form-control"  name="gps_vs" required>
        
            @foreach($gpss as $gps)
        
              <option selected value="{{$gps->lugar}}">{{$gps->lugar}}</option>
              
        
            @endforeach
        
        </select>

        <br><label>Fecha de encuentro y hora</label>
        <input type="date" class="col-sm-2 form-control{{ $errors->has('fecha') ? ' is-invalid' : '' }}" name="date_vs" value="{{ old('date') }}" required autofocus><br><input type="time" class="col-sm-2 form-control" name ="time_vs"><br>
        
          @if ($errors->has('date_vs'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('date_vs') }}</strong>
              </span>
          @endif
          
        <label for="text">Detalles</label>
        {{Form::textarea('text', "Deporte, condiciones, reglas, puntuación...", ['class' => 'form-control', 'rows' => 2, 'cols' => 40])}}<hr>
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
      </form>
    </div>
</div>
  @endif
@endsection