<?php $__env->startSection('content'); ?>
    <div id="ribbon">
        <ol class="breadcrumb">
            <li>Inicio</li><li>Modificar Proveedor</li>
        </ol>
    </div>
    <div class="container">
        <div class="row">
            <div class="table-responsive">
                <div class="panel panel-default" id="panel-profin" style="margin-top:20px;">
                    <div class="panel-heading textoHeader">Proveedores Registrados</div>
                    <div class="panel-body">
                        <div>
                            <h3 class="pull-left">Existen <?php echo e($proveedores->total()); ?> Proveedores</h3>
                            <a href="<?php echo e(route('proveedores.create')); ?>" class="btn btn-info pull-right" >Crear Proveedor</a>
                        </div>
                        <table class="table table-striped">
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Direccion</th>
                                <th>NIT</th>
                                <th>Telefono</th>
                                <th colspan="2" class="text-center">Acciones</th>
                            </tr>
                            <?php $__currentLoopData = $proveedores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr data-id="<?php echo e($c->id); ?>">
                                    <td><?php echo e($c->id); ?></td>
                                    <td><?php echo e($c->nombre); ?></td>
                                    <td><?php echo e($c->direccion); ?></td>
                                    <td><?php echo e($c->nit); ?></td>
                                    <td><?php echo e($c->telefono); ?></td>
                                    <td>
                                        <form method="post" class="form-horizontal" role="form"  action="<?php echo e(url('proveedores/modificar')); ?>"  >
                                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                            <input type="hidden" name="_idUser" value="<?php echo e($c->id); ?>">
                                            <div class="">
                                                <a href="<?php echo e(url('proveedores/'.$c->id.'/edit')); ?>"  class="btn btn-primary center-block">
                                                    Modificar
                                                </a>
                                            </div>
                                        </form>
                                    </td>
                                    <td>
                                        <?php if(Auth::user()->role == 'ADMIN_ROLE'): ?>
                                            <a href="#" class="btn-delete btn btn-warning">Eliminar</a>
                                        <?php else: ?>
                                            <a href="#" class="btn-delete btn btn-warning disabled">Eliminar</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                        <?php echo $proveedores->setPath('proveedores');; ?>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <form id="form-delete" role="form" method="POST" action="<?php echo e(route('proveedores.destroy', ':USER_ID')); ?>">

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
                alert('La Categoria No fue Eliminado');
                row.show();
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Plantilla/plantilla', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>