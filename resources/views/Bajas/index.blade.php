@extends('Plantilla/plantilla')

@section('content')
    <div id="ribbon">
        <ol class="breadcrumb">
            <li>Inicio</li><li>Bajas de Usuario</li>
        </ol>
    </div>
    <div class="container">
        <div class="row">
            <div class="table-responsive">
                <div class="panel panel-default" id="panel-profin" style="margin-top:20px;">
                    <div class="panel-heading textoHeader">Usuarios Dados de Baja</div>
                    <div class="panel-body">
                        <div>
                            <h3 class="pull-left">Existen {{ $bajas->total() }} Usuarios dados de baja</h3>
                        </div>
                        <table class="table table-striped">
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Paterno</th>
                                <th>Materno</th>
                                <th>CI</th>
                                <th>Pais</th>
                                <th>Correo Electronico</th>
                                <th colspan="2" class="text-center">Acciones</th>
                            </tr>
                            @foreach($bajas as $user)
                                <tr data-id="{{ $user->id }}">
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->lastname }}</td>
                                    <td>{{ $user->mlastname }}</td>
                                    <td>{{ $user->ci }}</td>
                                    <td>{{ Locale::getDisplayRegion('-'.$user->country, 'es') }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <a href="#" class="btn-delete btn btn-warning">Restaurar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {!! $bajas->setPath('bajas'); !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
    <form id="form-delete" role="form" method="POST" action="{{ route('baja.destroy', ':USER_ID') }}">

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
