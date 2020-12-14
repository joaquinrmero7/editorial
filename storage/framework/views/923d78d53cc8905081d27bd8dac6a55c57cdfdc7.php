<?php $__env->startSection('content'); ?>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <table class="table table-bordered" >
                    <thead class="table-primary">
                        <tr>
                            <th>Id</th> 
                            <th>Imagen</th> 
                            <th>Producto</th> 
                            <th>Cantidad</th> 
                            <th>Precio</th> 
                            <th>Total</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <th>
                                <img style="width: 100px;" src="<?php echo e(url('imagen/'.$l->image)); ?>">
                            </th> 
                            <td><?php echo e($l->nombre); ?></td>
                            <td><?php echo e($number); ?></td>
                            <td>Bs. <?php echo e($l->precio); ?></td>
                            <td>Bs. <?php echo e($number * $l->precio); ?></td>
                        </tr>
                    </tbody>
                </table>
                <div class=" float-right" style="width:100%;">
                    <div class="btn-group">

                        <?php if($number >= 40): ?>
                            <button type="button" id="ppagos" class="btn btn-info">Comprar con Plan de Pagos</button>
                        <?php endif; ?>  
                        <form role="form" action="<?php echo e(url('/ordenCompra')); ?>" method="POST">
                            <?php echo e(csrf_field()); ?>

                            <input type="text" name="_id" id="_id" hidden value="<?php echo e($l->id); ?>" >
                            <input type="text" name="_n" id="_n" hidden value="<?php echo e($number); ?>" >
                            <button type="submit" class="btn btn-primary">Comprar</button>
                           
                        </form>
                    </div>
                </div>
                <div class="py-5" style="display:none;" id="pppagos">
                    <?php if($number >= 40): ?>
                
                        <div class="card border-secondary mb-3" style="max-width: 30rem;">
                            <div class="card-header">Pagar a Plazos</div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Bs. <?php echo e((($number * $l->precio) / 3) .', Fecha Limite de Pago - '. \Carbon\Carbon::now()->addMonths(1)->format('d/m/Y')); ?> </li>
                                <li class="list-group-item">Bs. <?php echo e((($number * $l->precio) / 3) .', Fecha Limite de Pago - '.  \Carbon\Carbon::now()->addMonths(2)->format('d/m/Y')); ?></li>
                                <li class="list-group-item">Bs. <?php echo e((($number * $l->precio) / 3) .', Fecha Limite de Pago - '.  \Carbon\Carbon::now()->addMonths(3)->format('d/m/Y')); ?></li>
                            </ul>
                        </div>
    
                    <?php endif; ?>  
                </div>
                              
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('addscripts'); ?>
<script>
    $(document).ready(function() {
        $("#ppagos").click(function(){
            $("#pppagos").toggle();
        }); 
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>