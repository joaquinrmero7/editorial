<?php $__env->startSection('content'); ?>
    <div id="ribbon">
        <ol class="breadcrumb">
            <li><a href="<?php echo e(url("home")); ?>">Inicio</a></li>
            <li>Crear Proveedor</li>
        </ol>
    </div>
    <!-- Small boxes (Stat box) -->

    <div class="container">
       <div class="row">
           <div class="panel panel-default" id="panel-profin" style="margin-top:20px;">
               <div class="panel-heading">
                   <h3 class="panel-title" style="text-align: center">Crear Proveedor</h3>
               </div>
               <div class="panel-body">
                     <?php if(count($errors) > 0): ?>
                         <div class="alert alert-danger">
                             <strong>Whoops!</strong> Hay problemas con tus Entradas<br><br>
                             <ul>
                                 <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <li><?php echo e($error); ?></li>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             </ul>
                         </div>
                     <?php endif; ?>
                         <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"  action="<?php echo e(route('proveedores.store')); ?>">
                             <?php echo e(csrf_field()); ?>

                             <div class="form-group <?php echo e($errors->has('tittle') ? ' has-error' : ''); ?>">
                                 <label for="tittle" class="col-md-4 control-label">Nombre</label>

                                 <div class="col-md-6">
                                     <input id="tittle" type="text" class="form-control" name="tittle" required>
                                     <?php if($errors->has('tittle')): ?>
                                         <span class="help-block">
                                             <strong><?php echo e($errors->first('tittle')); ?></strong>
                                         </span>
                                     <?php endif; ?>
                                 </div>
                             </div>
                             <div class="form-group <?php echo e($errors->has('direccion') ? ' has-error' : ''); ?>">
                                 <label for="direccion" class="col-md-4 control-label">Direccion</label>
                                 <div class="col-md-6">
                                    <input id="direccion" type="text" class="form-control" name="direccion" required>
                                    <?php if($errors->has('direccion')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('direccion')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                             </div>
                             <div class="form-group <?php echo e($errors->has('nit') ? ' has-error' : ''); ?>">
                                <label for="nit" class="col-md-4 control-label">NIT</label>
                                <div class="col-md-6">
                                   <input id="nit" type="text" class="form-control" name="nit" required>
                                   <?php if($errors->has('nit')): ?>
                                       <span class="help-block">
                                           <strong><?php echo e($errors->first('nit')); ?></strong>
                                       </span>
                                   <?php endif; ?>
                               </div>
                            </div>
                            <div class="form-group <?php echo e($errors->has('telefonos') ? ' has-error' : ''); ?>">
                                <label for="telefonos" class="col-md-4 control-label">Telefonos</label>
                                <div class="col-md-6">
                                   <input id="telefonos" type="text" class="form-control" name="telefonos" required>
                                   <?php if($errors->has('telefonos')): ?>
                                       <span class="help-block">
                                           <strong><?php echo e($errors->first('telefonos')); ?></strong>
                                       </span>
                                   <?php endif; ?>
                               </div>
                            </div>

                             <div class="form-group">
                                 <div class="col-md-6 col-md-offset-4">
                                   <button type="submit" class="btn btn-primary btn-block">
                                       <i class="fa fa-btn fa-user"></i> Crear Proveedor
                                   </button>
                                 </div>
                             </div>
                         </form>
                     <br><br>
                     <?php echo e($success = Session::get('success')); ?>

                     <?php if($success): ?>
                         <div class="alert alert-success">
                             <strong>!!Felicidades!!</strong> Se creo el Proveedor Correctamente <br><br>
                         </div>
                     <?php endif; ?>
                </div>
           </div>
       </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Plantilla/plantilla', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>