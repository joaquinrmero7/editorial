@extends('welcome')

@section('content')
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img class="card-img-top" src="{{ url('imagen/'.$l->image) }}" alt="Card image cap">
                </div>
                <div class="col-md-8">
                    <div class="card mb-4 box-shadow">
                        <div class="card-body">
                            <h4>{{ $l->nombre }}</h4>
                            <p class="card-text">{{ $l->autor }}</p>
                            
                            <p class="card-text">{{ $l->descripcion }}</p>
                            <span class="badge badge-success">{{ $l->categoria->nombre }}</span>
                            <input type="text" name="_id" id="_id" hidden value="{{ $l->id }}" >
                            <div class="form-inline">
                                <div class="form-group">
                                    <label class="control-label pr-5" for="number">Cant.</label>
                                    <input class="form-control" value="1" type="number" name="cant" id="cant" min="1" max="{{ $l->stock}}" >
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="py-1">
                                    <button type="submit" class="btn btn-primary carrito">
                                        <i class="fa fa-btn fa-shopping-cart"></i> Bs. {{ $l->precio }}  Agregar al Carrito
                                    </button>
                                    <a href="{{ url('/') }}" class="btn btn-info pull-right" >Comprar mas productos</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('addscripts')
    <script>
        $(function() {
            $('.carrito').on('click', function () {
                event.preventDefault();
                alert('Se Agrego el Item al Carrito');
                var id = {{ $l->id }};
                var nombre = '{{ $l->nombre }}';
                var autor = '{{ $l->autor }}';
                var unidades = $('#cant').val();
                var precio = {{ $l->precio }};
                var total = unidades * precio;
                var flag = false;
                if(localStorage.getItem('compra') === null)
                {
                    var compra = [];   
                }
                else {
                    var compra = JSON.parse(localStorage.getItem('compra'));
                    for (let index = 0; index < compra.length; index++) {
                        if(compra[index].id === id) {
                            compra[index].unidades = unidades;
                            compra[index].total = unidades * precio;
                            flag = true;
                        }
                    }
                }
                if(!flag) {
                    var obj = {
                    'id': id,
                    'nombre': nombre,
                    'autor': autor,
                    'precio': precio,
                    'unidades': unidades,
                    'total': total
                    }
                    compra.push(obj);
                }
                
                localStorage.setItem('compra', JSON.stringify(compra));
                
            });
        });
    </script>
@endsection