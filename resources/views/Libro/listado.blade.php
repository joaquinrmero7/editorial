@extends('welcome')

@section('content')
    <div class="album py-5 bg-light">
        <div class="container">
            @if($key == 1)
                <h3>Productos del Tipo de producto: <strong>{{$libros[0]->categoria->nombre}}</strong></h3>
            @endif
            <div class="row">
                @foreach($libros as $l)
                    <div class="col-md-3">
                        <div class="card mb-4 box-shadow">
                            <a href="{{ url('libro/'.$l->id) }}"><img class="card-img-top" src="{{ url('imagen/'.$l->image) }}" alt="Card image cap"></a>
                            <div class="card-body">
                            <h4>
                                <a href="{{ url('libro/'.$l->id) }}">
                                    {{ $l->nombre }}
                                </a>
                            </h4>
                            <p class="card-text">{{ $l->autor }}</p>
                            <span class="badge badge-success">{{ $l->categoria->nombre }}</span>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ url('libro/'.$l->id) }}" class="btn btn-sm btn-outline-info btn-block"> {{ $l->precio }} Bs. Ver</a>
     
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
