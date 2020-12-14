<?php $__env->startSection('content'); ?>
    <div id="ribbon">
        <ol class="breadcrumb">
            <li>Inicio</li><li>Bajas de Usuario</li>
        </ol>
    </div>
    <div class="container">
        <div class="row">
            <div class="table-responsive">
                <div class="panel panel-default" id="panel-profin" style="margin-top:20px;">
                    <div class="panel-heading textoHeader">Usuarios Dados de Baja</div>
                    <div class="panel-body">
                        <div>
                            <h3 class="pull-left">Existen <?php echo e($bajas->total()); ?> Usuarios dados de baja</h3>
                        </div>
                        <table class="table table-striped">
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Paterno</th>
                                <th>Materno</th>
                                <th>CI</th>
                                <th>Pais</th>
                                <th>Correo Electronico</th>
                                <th colspan="2" class="text-center">Acciones</th>
                            </tr>
                            <?php $__currentLoopData = $bajas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr data-id="<?php echo e($user->id); ?>">
                                    <td><?php echo e($user->id); ?></td>
                                    <td><?php echo e($user->name); ?></td>
                                    <td><?php echo e($user->lastname); ?></td>
                                    <td><?php echo e($user->mlastname); ?></td>
                                    <td><?php echo e($user->ci); ?></td>
                                    <td><?php echo e(Locale::getDisplayRegion('-'.$user->country, 'es')); ?></td>
                                    <td><?php echo e($user->email); ?></td>
                                    <td>
                                        <a href="#" class="btn-delete btn btn-warning">Restaurar</a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                        <?php echo $bajas->setPath('bajas');; ?>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <form id="form-delete" role="form" method="POST" action="<?php echo e(route('baja.destroy', ':USER_ID')); ?>">

        <input name="_method" type="hidden"  value="DELETE">
        <input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('addscripts'); ?>
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
                alert('El Usuario No fue Eliminado');
                row.show();
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Plantilla/plantilla', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>