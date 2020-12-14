@extends('Plantilla/plantilla')

@section('content')
    <div id="ribbon">
        <ol class="breadcrumb">
            <li>Inicio</li><li>Modificar Tipo de Producto</li>
        </ol>
    </div>
    <div class="container">
        <div class="row">
            <div class="table-responsive">
                <div class="panel panel-default" id="panel-profin" style="margin-top:20px;">
                    <div class="panel-heading textoHeader">Tipos de Producto Registrados</div>
                    <div class="panel-body">
                        <div>
                            <h3 class="pull-left">Existen {{ $categorias->total() }} Tipo de Productos</h3>
                            <a href="{{ url('categorias/create') }}" class="btn btn-info pull-right" >Crear Tipo de Producto</a>
                        </div>
                        <table class="table table-striped">
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th colspan="2" class="text-center">Acciones</th>
                            </tr>
                            @foreach($categorias as $c)
                                <tr data-id="{{ $c->id }}">
                                    <td>{{ $c->id }}</td>
                                    <td>{{ $c->nombre }}</td>
                                    <td>{{ $c->descripcion }}</td>
                                    <td>
                                        <form method="post" class="form-horizontal" role="form"  action="{{ url('categoria/modificar')  }}"  >
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="_idUser" value="{{ $c->id }}">
                                            <div class="">
                                                <a href="{{ url('categorias/'.$c->id.'/edit') }}"  class="btn btn-primary center-block">
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
                        {!! $categorias->setPath('categorias'); !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
    <form id="form-delete" role="form" method="POST" action="{{ route('categorias.destroy', ':USER_ID') }}">

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
