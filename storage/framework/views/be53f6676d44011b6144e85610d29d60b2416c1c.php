<?php $__env->startSection('content'); ?>
    <div id="ribbon">
        <ol class="breadcrumb">
            <li>Inicio</li><li>Reportes</li>
        </ol>
    </div>
    <!-- Small boxes (Stat box) -->
    <div class="container">
        <div class="row" >
            <div class="">
                <div class="panel panel-default" id="panel-profin" style="margin-top:20px;">
                    <div class="panel-heading text-center textoHeader">Reportes</div>
                    <div class="panel-body">
                        <div class="col-md-3">
                            <a href="<?php echo e(url("generareporte/1")); ?>" class="btn btn-primary">
                                <i class="fa fa-btn fa-user"></i> Generar Reporte Ventas Diarias
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="<?php echo e(url("generareporte/2")); ?>" class="btn btn-primary">
                                <i class="fa fa-btn fa-user"></i> Generar Reporte Ventas Mensuales
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="<?php echo e(url("generareporte/3")); ?>" class="btn btn-primary">
                                <i class="fa fa-btn fa-user"></i> Generar Reporte Ventas Anuales
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" >
            <div class="">
                <div class="panel panel-default" id="panel-profin" style="margin-top:20px;">
                    <div class="panel-heading text-center textoHeader">Reportes por Fecha</div>
                    <div class="panel-body">

                        <div class="col-md-3 form-inline">
                            <label for="desde">De     : </label>
                            <input id="desde" type="date" class="form-control" name="desde">
                        </div>
                        <div class="col-md-3 form-inline">
                            <label for="hasta">Hasta  : </label>
                            <input id="hasta" type="date" class="form-control" name="hasta">
                        </div>
                        <div class="col-md-3">
                            <a href="<?php echo e(url("reportesFecha/desde/hasta")); ?>"class="btn btn-primary" id="reportes">
                                <i class="fa fa-btn fa-user"></i> Generar Reporte Ventas Anuales
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('addscripts'); ?>
    <script>
        $( document ).ready(function() {
            $('#reportes').on('click', function () {
                event.preventDefault();
                var desde = $('#desde').val();
                var hasta = $('#hasta').val();
                var url =  $('#reportes').attr('href').replace('desde', desde);
                url2 = url.replace("hasta", hasta);
                window.location.href = url2;
            });
            // $('#pobre').submit(function(event) {
            //
            //     event.preventDefault(); //this will prevent the default submit
            //
            //     var compra = []
            //     localStorage.setItem('compra', JSON.stringify(compra));
            //     $('#instr').show();
            //     $('#carro').hide();
            //
            //     $('#btn_comprar').hide()
            //     $(this).unbind('submit').submit(); // continue the submit unbind preventDefault
            // });

        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Plantilla/plantilla', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>