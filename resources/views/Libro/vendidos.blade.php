@extends('Plantilla/plantilla')

@section('content')
    <div id="ribbon">
        <ol class="breadcrumb">
            <li>Inicio</li><li>Modificar Libro</li>
        </ol>
    </div>
    <div class="container">
        <div class="row">
            <div class="table-responsive">
                <div class="panel panel-default" id="panel-profin" style="margin-top:20px;">
                    <div class="panel-heading textoHeader">Libros Vendidos</div>
                    <div class="panel-body">
                        <div>
                            <h3 class="pull-left">Existen {{ $libros->total() }} Libros</h3>
                            
                        </div>
                        <table class="table table-striped">
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Unidades</th>
                                <th>Total</th>
                                <th>Fecha de Compra</th>
                            </tr>
                            @foreach($libros as $c)
                                <tr data-id="{{ $c->id }}">
                                    <td>{{ $c->id }}</td>
                                    <td>{{ $c->nombre }}</td>
                                    <td>Bs. {{ $c->precio }}</td>
                                    <td>{{ $c->cantidad }}</td>
                                    <td>Bs. {{ $c->total }} </td>
                                    <td>{{ $c->created_at }} </td>
                                </tr>
                            @endforeach
                        </table>
                        {!! $libros->setPath('libros'); !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection