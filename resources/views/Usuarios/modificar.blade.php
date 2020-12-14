@extends('Plantilla/plantilla')

@section('content')
    <div id="ribbon">
        <ol class="breadcrumb">
            <li>Inicio</li><li>Modificar Usuario</li>
        </ol>
    </div>
    <div class="container">
        <div class="row">
            <div class="table-responsive">
                <div class="panel panel-default" id="panel-profin" style="margin-top:20px;">
                    <div class="panel-heading textoHeader">Usuarios Registrados</div>
                    <div class="panel-body">
                        <div>
                            <h3 class="pull-left">Existen {{ $users->total() }} Usuarios</h3>
                            <a href="{{ url('user/crear') }}" class="btn btn-info pull-right" >Crear Usuario</a>
                        </div>
                        <table class="table table-striped">
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Paterno</th>
                                <th>Materno</th>
                                <th>ROL</th>
                                <th>CI</th>
                                <th>Pais</th>
                                <th>Correo Electronico</th>
                                <th colspan="2" class="text-center">Acciones</th>
                            </tr>
                            @foreach($users as $user)
                                <tr data-id="{{ $user->id }}">
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->lastname }}</td>
                                    <td>{{ $user->mlastname }}</td>
                                    @if($user->role == 'ADMIN_ROLE')
                                        <td>Administrador</td>
                                    @elseif($user->role == 'VENDEDOR_ROLE')
                                        <td>Vendedor</td>
                                    @elseif($user->role == 'USER_ROLE')
                                        <td>Usuario</td>
                                    @endif
                                    <td>{{ $user->ci }}</td>
                                    <td>{{ $user->country }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <form method="post" class="form-horizontal" role="form"  action="{{ url('user/modificarUsuario')  }}"  >
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="_idUser" value="{{ $user->id }}">
                                            <div class="">
                                                <button type="submit" class="btn btn-primary center-block">
                                                    Modificar
                                                </button>
                                            </div>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="#" class="btn-delete btn btn-warning">Dar de Baja</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {!! $users->setPath('users'); !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
    <form id="form-delete" role="form" method="POST" action="{{ route('users.destroy', ':USER_ID') }}">

        <input name="_method" type="hidden"  value="DELETE">
        <input name="_token" type="hidden" value="{{ csrf_token() }}">
    </form>
@endsection
@section('addscripts')
    <script>
        $('.btn-delete').click(function()
        {
            event.preventDefault();
            var row = $(this).parents('tr');
            var id = row.data('id');
            var form = $('#form-delete');
            var url = form.attr('action').replace(':USER_ID', id);
            var data = form.serialize();
            row.fadeOut();
            $.post(url, data, function(result)
            {
                alert(result);
            }).fail(function()
            {
                alert('El Usuario No fue Eliminado');
                row.show();
            });
        });
    </script>
@endsection
