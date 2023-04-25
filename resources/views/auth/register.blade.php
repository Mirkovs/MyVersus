@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registro') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        {{-- Nombre --}}

                        <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
    
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        {{-- Apellidos --}}

                        <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>
    
                                <div class="col-md-6">
                                    <input id="poblacion" type="text" class="form-control{{ $errors->has('apellidos') ? ' is-invalid' : '' }}" name="apellidos" value="{{ old('apellidos') }}" required autofocus>
    
                                    @if ($errors->has('apellidos'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('apellidos') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            {{-- Nick --}}
    
                            <div class="form-group row">
                                    <label for="nick" class="col-md-4 col-form-label text-md-right">{{ __('Nick') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="nick" type="text" class="form-control{{ $errors->has('nick') ? ' is-invalid' : '' }}" name="nick" value="{{ old('nick') }}" required>
        
                                        @if ($errors->has('nick'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('nick') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                        {{-- Población y provincia --}}

                        <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Población') }}</label>
    
                                <div class="col-md-6">
                                    <input id="poblacion" type="text" class="form-control{{ $errors->has('poblacion') ? ' is-invalid' : '' }}" name="poblacion" value="{{ old('poblacion') }}" required autofocus>
    
                                    @if ($errors->has('poblacion'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('poblacion') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Provincia') }}</label>
    
                                <div class="col-md-6">
                                    <input id="poblacion" type="text" class="form-control{{ $errors->has('provincia') ? ' is-invalid' : '' }}" name="provincia" value="{{ old('provincia') }}" required autofocus>
    
                                    @if ($errors->has('provincia'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('provincia') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        {{-- Fecha de nacimiento --}}

                        <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de nacimiento') }}</label>
    
                                <div class="col-md-6">
                                    <input id="birth" type="date" class="form-control{{ $errors->has('birth') ? ' is-invalid' : '' }}" name="birth" value="{{ old('birth') }}" required autofocus>
    
                                    @if ($errors->has('birth'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('birth') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            {{-- DNI --}}
    
                            <div class="form-group row">
                                <label for="dni" class="col-md-4 col-form-label text-md-right">{{ __('DNI') }}</label>
    
                                <div class="col-md-6">
                                    <input id="dni" type="text" class="form-control{{ $errors->has('dni') ? ' is-invalid' : '' }}" name="dni" value="{{ old('dni') }}" required>
    
                                    @if ($errors->has('dni'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('dni') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            {{-- E-mail --}}

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            {{-- Contraseña --}}

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar contraseña') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            {{-- Puntos(hidden) --}}
    
                            <div class="col-md-6" display="none">
                                    <input id="points" type="hidden" name="points" value="{{0}}">
                            </div>
                        

                            {{-- Captcha --}}

                            <div class="form-group row">
                                    <div class="col-md-6 offset-md-4" required>
                                    <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}"></div>
                                    @if($errors->has('g-recaptcha-response'))
                                        <span class="invalid-feedback" style="display:block">
                                            <strong>{{$errors->first('g-captcha-response')}}</strong>
                                        </span>
                                    @endif
                                    </div>
                                </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Registro') }}
                                    </button>
                                    <a href="{{ URL::previous() }}" class="btn btn-back">Atrás</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
