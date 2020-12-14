@extends('Plantilla/plantilla')

@section('content')
    <div id="ribbon">
        <ol class="breadcrumb">
            <li>Inicio</li><li>Modificar Proveedor</li>
        </ol>
    </div>
    <div class="container">
        <div class="row">
            <div class="table-responsive">
                <div class="panel panel-default" id="panel-profin" style="margin-top:20px;">
                    <div class="panel-heading textoHeader">Proveedores Registrados</div>
                    <div class="panel-body">
                        <div>
                            <h3 class="pull-left">Existen {{ $proveedores->total() }} Proveedores</h3>
                            <a href="{{ route('proveedores.create') }}" class="btn btn-info pull-right" >Crear Proveedor</a>
                        </div>
                        <table class="table table-striped">
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Direccion</th>
                                <th>NIT</th>
                                <th>Telefono</th>
                                <th colspan="2" class="text-center">Acciones</th>
                            </tr>
                            @foreach($proveedores as $c)
                                <tr data-id="{{ $c->id }}">
                                    <td>{{ $c->id }}</td>
                                    <td>{{ $c->nombre }}</td>
                                    <td>{{ $c->direccion }}</td>
                                    <td>{{ $c->nit }}</td>
                                    <td>{{ $c->telefono }}</td>
                                    <td>
                                        <form method="post" class="form-horizontal" role="form"  action="{{ url('proveedores/modificar')  }}"  >
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="_idUser" value="{{ $c->id }}">
                                            <div class="">
                                                <a href="{{ url('proveedores/'.$c->id.'/edit') }}"  class="btn btn-primary center-block">
                                                    Modificar
                                                </a>
                                            </div>
                                        </form>
                                    </td>
                                    <td>
                                        @if(Auth::user()->role == 'ADMIN_ROLE')
                                            <a href="#" class="btn-delete btn btn-warning">Eliminar</a>
                                        @else
                                            <a href="#" class="btn-delete btn btn-warning disabled">Eliminar</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {!! $proveedores->setPath('proveedores'); !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
    <form id="form-delete" role="form" method="POST" action="{{ route('proveedores.destroy', ':USER_ID') }}">

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
                alert('La Categoria No fue Eliminado');
                row.show();
            });
        });
    </script>
@endsection
