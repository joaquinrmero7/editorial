<?php $__env->startSection('content'); ?>
    <div id="ribbon">
        <ol class="breadcrumb">
            <li>Inicio</li>
        </ol>
    </div>
    <h2 class="text-center">Sistema de Administracion</h1>
    <?php if(Auth::user()->role == 'ADMIN_ROLE'): ?>
        <div class="alert alert-success">
            <center>
            <strong>Bienvenido </strong>Administrador <br><br>
            </center>
        </div>
    <?php elseif(Auth::user()->role == 'VENDEDOR_ROLE'): ?>
        <div class="alert alert-success">
            <strong>Bienvenido </strong>Vendedor<br><br>
        </div>
    <?php endif; ?>

    <?php echo e($success = Session::get('success')); ?>

    <?php if($success): ?>
        <div class="alert alert-success">
            <strong>!!Felicidades!!</strong>Se Modifico el usuario Correctamente <br><br>
        </div>
    <?php endif; ?>
    <?php echo e($error = Session::get('error')); ?>

    <?php if($error): ?>
        <div class="alert alert-danger">
            <strong>!!Error!! </strong>al modificar usuario<br><br>
        </div>
    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Plantilla/plantilla', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>