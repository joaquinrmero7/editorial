@extends('welcome')

@section('content')
<script type="text/javascript">
    function pulsar1 (){
        alert ("Se guardo la calificación hacia el cajero como MALA")
}
    function pulsar2(){
        alert ("Se guardo la calificación hacia el cajero como BUENA") 
    }
    function pulsar3(){
        alert ("Se guardo la calificación hacia el cajero como EXCELENTE")
    }
    
</script>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <center>
                    
                
                <div class="row">
                    <div class="form-group row">
                                <label for="lastname" class="col-md-4 control-label">Nombre para la factura</label>
    
                                <div class="col-md-6">
                                    <input id="lastname" type="text" onkeypress="return alpha(event)" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ old('lastname') }}" required autofocus>
    
                                    @if ($errors->has('lastname'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('lastname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                <div class="row">
                                <label for="ci" class="col-md-4 control-label">NIT o CI para la factura</label>
    
                                <div class="col-md-6">
                                    <input id="ci" type="text" class="form-control{{ $errors->has('ci') ? ' is-invalid' : '' }}" name="ci" value="{{ old('ci') }}" required autofocus>
    
                                    @if ($errors->has('ci'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('ci') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                </div>
                </center>
                <table class="table table-bordered table-hover" id="carro">
                    <thead  class="table-primary">
                        <tr>
                            <th>Nombre</th>
                           <th>Autor</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>

                <div class="float-right" style="width:100%;">
                    <div class="btn-group">

                        <button type="button" id="ppagos" class="btn btn-info">Vender con Plan de Pagos</button>
                        



                        
                        <form role="form" id="pobre" action="{{ url('/comprar') }}" method="POST">
                            {{ csrf_field() }} 
                            <input type="hidden" id="plan" name="plan">
                            <input type="hidden" id="jcompra" name="jcompra">
                            <input type="hidden" id="jtotal" name="jtotal">


                            <button type="submit" class="btn btn-primary" id="btn_comprar">Comprar</button>
                        </form>
                        <br>
                        <a href="{{ url('/') }}" class="btn btn-info pull-right" >Comprar más</a>
                </div>

                

                <div class="py-5" id="pppagos">
                    <div class="card border-secondary mb-3" style="max-width: 30rem;">
                        <div class="card-header">Pagar a Plazos</div>
                        <ul class="list-group list-group-flush" id="lista">
                            {{-- <li class="list-group-item">Bs. {{ ', Fecha Limite de Pago - '. \Carbon\Carbon::now()->addMonths(1)->format('d/m/Y') }} </li>
                            <li class="list-group-item">Bs. {{ ', Fecha Limite de Pago - '.  \Carbon\Carbon::now()->addMonths(2)->format('d/m/Y') }}</li>
                            <li class="list-group-item">Bs. {{ ', Fecha Limite de Pago - '.  \Carbon\Carbon::now()->addMonths(3)->format('d/m/Y') }}</li> --}}
                        </ul>
                    </div>
                </div>
                <br><br>
                <div class="card" id="instr">
                    <div class="card-body">
                        <p class="card-text">Se realizo con exito la venta!!! 
                                <!-- a uno de las siguientes cuentas: <br>
                                - BNB 465798746546 a Nombre de Juan Perez<br>
                                - BISA 12312321331 a Nombre de Juan Perez<br>
                                Una vez realizado el deposito pasa por nuestras oficinas por el voucher para
                                recoger los libros. -->
                        </p>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            Calificación al cajero: 
                        </p>
                        <center>
                            <a href=""><img src="images/estrellas1.jpg" width="200" onclick="pulsar1()"></a>
                            <a href=""><img src="images/estrellas2.jpg" width="200" onclick="pulsar2()"></a>
                            <a href=""><img src="images/estrellas3.jpg" width="200" onclick="pulsar3()"></a>

                        </center>
                        
                    </div>
                </div>
               
                {{$success = Session::get('success')}}
                @if ($success)
                    <div class="alert alert-success">
                        <strong>!!Felicidades!!</strong>Se Realizo la compra exitosamente <br><br>
                    </div>
                    {{-- <script>
                        localStorage.removeItem('compra');
                    </script> --}}
                @endif
            </div>
        </div>
    </div>
@endsection

@section('addscripts')
    <script>
        $( document ).ready(function() {
            $('#instr').hide();
            var compra = JSON.parse(localStorage.getItem('compra'));
            $("#jcompra").val(JSON.stringify(compra));
            $("#jtotal").val(total);
            var cant;
            var id;
            var may = -1;
            var total = 0;
            compra.forEach(element => {
                var newRowContent = "<tr data-id=" + element.id + "><td>"+ element.nombre+"</td><td>"+element.autor+"</td><td>"+element.precio+"</td><td>"+element.unidades+"</td><td>"+element.total+"</td><td><a href='#' class='btn btn-danger btn-block delbtn'>Eliminar</a></td></tr>";
                $("#carro tbody").append(newRowContent);
                cant = element.unidades;
                if(cant > may) {
                    may = cant;
                }
                total += element.total;

            });
            var newRowContent = " <tr><td colspan='3'></td><td>Total</td><td>"+total+"</td></tr>";
            $("#carro tbody").append(newRowContent);

            $("#jtotal").val(total);
            var newRowContent = "<li class='list-group-item'>Bs. " + (total / 3) + ", Fecha Limite de Pago - " + '{{ \Carbon\Carbon::now()->addMonths(1)->format("d/m/Y") }}'  + "</li>";
            $("#lista").append(newRowContent);
            var newRowContent = "<li class='list-group-item'>Bs. "+ (total / 3) +", Fecha Limite de Pago - " + '{{ \Carbon\Carbon::now()->addMonths(2)->format("d/m/Y") }}'  + "</li>";
            $("#lista").append(newRowContent);
            var newRowContent = "<li class='list-group-item'>Bs. " + (total / 3) + ", Fecha Limite de Pago - " + '{{ \Carbon\Carbon::now()->addMonths(3)->format("d/m/Y") }}'  + "</li>";
            $("#lista").append(newRowContent);

            if(may >= 40){
                $('#ppagos').show()
                $('#pppagos').hide()
                $('#plan').val('si')
                
            }
            else{
                $('#ppagos').hide()
                $('#pppagos').hide()
                $('#plan').val('no')
            }
            $("#ppagos").click(function(){
                $("#pppagos").toggle();
            }); 
            $('.delbtn').on('click', function () {
                event.preventDefault();
                var table = $(this).parents('table');
                var row = $(this).parents('tr');
                var id = row.data('id');
                var compra = JSON.parse(localStorage.getItem('compra'));
                for (let index = 0; index < compra.length; index++) {
                    if(compra[index].id === id) {
                        compra.splice(index, 1);
                    }
                }
                localStorage.setItem('compra', JSON.stringify(compra));
                window.location.href = "{{ url('carrito') }}";
            });
            $('#pobre').submit(function(event) {

                event.preventDefault(); //this will prevent the default submit

                var compra = []
                localStorage.setItem('compra', JSON.stringify(compra));
                $('#instr').show();
                $('#carro').hide();

                $('#btn_comprar').hide()
                $(this).unbind('submit').submit(); // continue the submit unbind preventDefault
            });
            /* $('#btn_comprar').on('click', function () {
                event.preventDefault();
                console.log('asdsad');
                /* 
                var id = $('#input_eliminar').val();
                var row = $('#e'+id).parents('tr');
                var form = $('#form-delete');
                var url = form.attr('action').replace(':USER_ID', id);
                var data = form.serialize();
                var url =  "url('/ordenCompra')";
                //console.log(url);
                $.post(url, data, function(result)
                {
                row.fadeOut();
                console.log(result);
                }).fail(function()
                {
                    row.show();
                }); 
            }); */

        });
    </script>
@endsection