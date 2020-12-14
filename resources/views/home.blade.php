@extends('Plantilla/plantilla')
@section('content')
    <div id="ribbon">
        <ol class="breadcrumb">
            <li>Inicio</li>
        </ol>
    </div>
    <h2 class="text-center">Sistema de Administracion</h1>
    @if(Auth::user()->role == 'ADMIN_ROLE')
        <div class="alert alert-success">
            <center>
            <strong>Bienvenido </strong>Administrador <br><br>
            </center>
        </div>
    @elseif(Auth::user()->role == 'VENDEDOR_ROLE')
        <div class="alert alert-success">
            <strong>Bienvenido </strong>Vendedor<br><br>
        </div>
    @endif

    {{$success = Session::get('success')}}
    @if ($success)
        <div class="alert alert-success">
            <strong>!!Felicidades!!</strong>Se Modifico el usuario Correctamente <br><br>
        </div>
    @endif
    {{$error = Session::get('error')}}
    @if ($error)
        <div class="alert alert-danger">
            <strong>!!Error!! </strong>al modificar usuario<br><br>
        </div>
    @endif

@endsection