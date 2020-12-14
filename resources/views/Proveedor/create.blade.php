@extends('Plantilla/plantilla')

@section('content')
    <div id="ribbon">
        <ol class="breadcrumb">
            <li><a href="{{ url("home")}}">Inicio</a></li>
            <li>Crear Proveedor</li>
        </ol>
    </div>
    <!-- Small boxes (Stat box) -->

    <div class="container">
       <div class="row">
           <div class="panel panel-default" id="panel-profin" style="margin-top:20px;">
               <div class="panel-heading">
                   <h3 class="panel-title" style="text-align: center">Crear Proveedor</h3>
               </div>
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
                         <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"  action="{{ route('proveedores.store') }}">
                             {{ csrf_field() }}
                             <div class="form-group {{ $errors->has('tittle') ? ' has-error' : '' }}">
                                 <label for="tittle" class="col-md-4 control-label">Nombre</label>

                                 <div class="col-md-6">
                                     <input id="tittle" type="text" class="form-control" name="tittle" required>
                                     @if ($errors->has('tittle'))
                                         <span class="help-block">
                                             <strong>{{ $errors->first('tittle') }}</strong>
                                         </span>
                                     @endif
                                 </div>
                             </div>
                             <div class="form-group {{ $errors->has('direccion') ? ' has-error' : '' }}">
                                 <label for="direccion" class="col-md-4 control-label">Direccion</label>
                                 <div class="col-md-6">
                                    <input id="direccion" type="text" class="form-control" name="direccion" required>
                                    @if ($errors->has('direccion'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('direccion') }}</strong>
                                        </span>
                                    @endif
                                </div>
                             </div>
                             <div class="form-group {{ $errors->has('nit') ? ' has-error' : '' }}">
                                <label for="nit" class="col-md-4 control-label">NIT</label>
                                <div class="col-md-6">
                                   <input id="nit" type="text" class="form-control" name="nit" required>
                                   @if ($errors->has('nit'))
                                       <span class="help-block">
                                           <strong>{{ $errors->first('nit') }}</strong>
                                       </span>
                                   @endif
                               </div>
                            </div>
                            <div class="form-group {{ $errors->has('telefonos') ? ' has-error' : '' }}">
                                <label for="telefonos" class="col-md-4 control-label">Telefonos</label>
                                <div class="col-md-6">
                                   <input id="telefonos" type="text" class="form-control" name="telefonos" required>
                                   @if ($errors->has('telefonos'))
                                       <span class="help-block">
                                           <strong>{{ $errors->first('telefonos') }}</strong>
                                       </span>
                                   @endif
                               </div>
                            </div>

                             <div class="form-group">
                                 <div class="col-md-6 col-md-offset-4">
                                   <button type="submit" class="btn btn-primary btn-block">
                                       <i class="fa fa-btn fa-user"></i> Crear Proveedor
                                   </button>
                                 </div>
                             </div>
                         </form>
                     <br><br>
                     {{$success = Session::get('success')}}
                     @if ($success)
                         <div class="alert alert-success">
                             <strong>!!Felicidades!!</strong> Se creo el Proveedor Correctamente <br><br>
                         </div>
                     @endif
                </div>
           </div>
       </div>
    </div>
@endsection