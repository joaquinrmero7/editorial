@extends('Plantilla/plantilla')

@section('content')
    <div id="ribbon">
        <ol class="breadcrumb">
            <li>Inicio</li><li>Modificar de Usuario</li>
        </ol>
    </div>
    <!-- Small boxes (Stat box) -->
    <div class="container">
        <div class="row" >
            <div class="">
                <div class="panel panel-default" id="panel-profin" style="margin-top:20px;">
                    <div class="panel-heading text-center textoHeader">Modificacion de Usuario</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> Hay problemas con tus Entradas<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('user/saveModificarUsuario') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $user->id }}">
                                <div class="form-group{{ $errors->has('nombres') ? ' has-error' : '' }}">
                                    <label for="nombres" class="col-md-4 control-label">Nombres</label>

                                    <div class="col-md-6">
                                        <input id="nombres" type="text" class="form-control" name="nombres" value="{{ $user->name }}">

                                        @if ($errors->has('nombres'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('nombres') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                                    <label for="lastname" class="col-md-4 control-label">Paterno</label>

                                    <div class="col-md-6">
                                        <input id="lastname" type="text" class="form-control" name="lastname" value="{{ $user->lastname }}">

                                        @if ($errors->has('lastname'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('mlastname') ? ' has-error' : '' }}">
                                    <label for="mlastname" class="col-md-4 control-label">Materno</label>

                                    <div class="col-md-6">
                                        <input id="mlastname" type="text" class="form-control" name="mlastname" value="{{ $user->mlastname }}">

                                        @if ($errors->has('mlastname'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('mlastname') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">Email</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}">

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('rol') ? ' has-error' : '' }}">
                                    <label for="rol" class="col-md-4 control-label">Rol</label>
                                    <div class="col-md-6">
                                        
                                            <select name="rol" id="rol" class="form-control">
                                                <option value="ADMIN_ROLE" selected="selected">Administrador</option>
                                                <option value="VENDEDOR_ROLE">Gerente</option>
                                                <option value="USER_ROLE">Cajero</option>
                                            </select>
                                      
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 control-label">Contraseña</label>
        
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"  required>
        
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="verfpassword" class="col-md-4 control-label">Verificar Contraseña</label>
        
                                    <div class="col-md-6">
                                        <input id="verfpassword" type="password" oninput="check(this)" class="form-control{{ $errors->has('verfpassword') ? ' is-invalid' : '' }}" name="verfpassword"  required>
        
                                        @if ($errors->has('verfpassword'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('verfpassword') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <script language='javascript' type='text/javascript'>
                                    function check(input) {
                                        if (input.value != document.getElementById('password').value) {
                                            input.setCustomValidity('Contraseña deben ser Iguales');
                                        } else {
                                            // input is valid -- reset the error message
                                            input.setCustomValidity('');
                                        }
                                    }
                                </script>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-btn fa-user"></i> Modificar Usuario
                                        </button>
                                    </div>
                                </div>
                            </form>
                        <br><br>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('addscripts')
    <script type="text/javascript">
        function justNumbers(e)
        {
            var keynum = window.event ? window.event.keyCode : e.which;
            if ((keynum == 8) || (keynum == 46))
                return true;
            return /\d/.test(String.fromCharCode(keynum));
        }
    </script>
@endsection
