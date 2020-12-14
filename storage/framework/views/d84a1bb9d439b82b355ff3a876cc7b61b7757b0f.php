<?php $__env->startSection('content'); ?>
    <div class="album py-5 bg-light">
        <div class="container">
            <?php if($key == 1): ?>
                <h3>Libros de Categoria: <strong><?php echo e($libros[0]->categoria->nombre); ?></strong></h3>
            <?php endif; ?>
            <div class="row">
                <?php $__currentLoopData = $libros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-3">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" src="<?php echo e(url('imagen/'.$l->image)); ?>" alt="Card image cap">
                            <div class="card-body">
                            <h4>
                                <a href="<?php echo e(url('libro/'.$l->id)); ?>">
                                    <?php echo e($l->nombre); ?>

                                </a>
                            </h4>
                            <p class="card-text"><?php echo e($l->autor); ?></p>
                            <span class="badge badge-success"><?php echo e($l->categoria->nombre); ?></span>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="<?php echo e(url('libro/'.$l->id)); ?>" class="btn btn-sm btn-outline-info btn-block"> <?php echo e($l->precio); ?> Bs. Ver</a>
     
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('welcome', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>