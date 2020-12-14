<?php $__env->startSection('content'); ?>
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
                            <h3 class="pull-left">Existen <?php echo e($libros->total()); ?> Libros</h3>
                            
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
                            <?php $__currentLoopData = $libros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr data-id="<?php echo e($c->id); ?>">
                                    <td><?php echo e($c->id); ?></td>
                                    <td><?php echo e($c->nombre); ?></td>
                                    <td>Bs. <?php echo e($c->precio); ?></td>
                                    <td><?php echo e($c->cantidad); ?></td>
                                    <td>Bs. <?php echo e($c->total); ?> </td>
                                    <td><?php echo e($c->created_at); ?> </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                        <?php echo $libros->setPath('libros');; ?>

                    </div>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Plantilla/plantilla', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>