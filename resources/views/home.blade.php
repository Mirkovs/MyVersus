@extends('layouts.app')

@section('content')
<body onload="">
        <script>
            setTimeout(function(){
            window.location.href = '/';
            }, 5000);
        </script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Barra de estado</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif   
</body>
                    ¡Estas logeado!
                    <br>
                    <a href="/">Pulsa aquí para volver al inicio o espera 3 segundos</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
