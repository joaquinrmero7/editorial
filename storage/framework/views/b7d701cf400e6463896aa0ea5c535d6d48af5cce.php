<?php $__env->startSection('content'); ?>
    <div id="ribbon">
        <ol class="breadcrumb">
            <li><a href="<?php echo e(url("home")); ?>">Inicio</a></li>
            <li>Crear Producto</li>
        </ol>
    </div>
    <!-- Small boxes (Stat box) -->

    <div class="container">
       <div class="row">
           <div class="panel panel-default" id="panel-profin" style="margin-top:20px;">
               <div class="panel-heading">
                   <h3 class="panel-title" style="text-align: center">Crear Producto</h3>
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
                         <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"  action="<?php echo e(url('libro/save')); ?>">
                             <?php echo e(csrf_field()); ?>

                             <div class="form-group <?php echo e($errors->has('tittle') ? ' has-error' : ''); ?>">
                                 <label for="tittle" class="col-md-4 control-label">Nombre del Producto</label>

                                 <div class="col-md-6">
                                     <input id="tittle" type="text" class="form-control" name="tittle" required>
                                     <?php if($errors->has('tittle')): ?>
                                         <span class="help-block">
                                             <strong><?php echo e($errors->first('tittle')); ?></strong>
                                         </span>
                                     <?php endif; ?>
                                 </div>
                             </div>
                            <div class="form-group <?php echo e($errors->has('autor') ? ' has-error' : ''); ?>">
                                    <label for="autor" class="col-md-4 control-label">Autor</label>
   
                                    <div class="col-md-6">
                                        <input id="autor" type="text" class="form-control" name="autor" required>
                                        <?php if($errors->has('autor')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('autor')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                            </div>
                             <div class="form-group <?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                                 <label for="description" class="col-md-4 control-label">Descripción</label>
                                 <div class="col-md-6">
                                     <textarea class="form-control" rows="6" name="description" style="overflow:hidden"></textarea>

                                     <?php if($errors->has('description')): ?>
                                         <span class="help-block">
                                             <strong><?php echo e($errors->first('description')); ?></strong>
                                         </span>
                                     <?php endif; ?>
                                 </div>
                             </div>

                             <div class="form-group <?php echo e($errors->has('mini') ? ' has-error' : ''); ?>">
                                 <label for="mini" class="col-md-4 control-label">Miniatura</label>

                                 <div class="col-md-6">
                                     <input id="mini" type="file" class="form-control" name="mini" required>
                                     <?php if($errors->has('mini')): ?>
                                         <span class="help-block">
                                             <strong><?php echo e($errors->first('mini')); ?></strong>
                                         </span>
                                     <?php endif; ?>
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label for="c_estado" class="col-md-4 control-label">Tipo de Producto </label>

                                 <div class="col-md-6">
                                   <select class="form-control" name="categoria">
                                      <?php $__currentLoopData = $cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($c->id); ?>"><?php echo e($c->nombre); ?></option>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                   </select>
                                 </div>
                             </div>
                             <div class="form-group">
                                <label for="c_estado" class="col-md-4 control-label">Proveedor </label>

                                <div class="col-md-6">
                                  <select class="form-control" name="proveedor">
                                     <?php $__currentLoopData = $prov; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <option value="<?php echo e($c->id); ?>"><?php echo e($c->nombre); ?></option>
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                  </select>
                                </div>
                            </div>
                            <div class="form-group <?php echo e($errors->has('precio') ? ' has-error' : ''); ?>">
                                 <label for="tittle" class="col-md-4 control-label">Precio</label>

                                 <div class="col-md-5">
                                     <input id="precio" type="text" class="form-control" name="precio" required>
                                     <?php if($errors->has('precio')): ?>
                                         <span class="help-block">
                                             <strong><?php echo e($errors->first('precio')); ?></strong>
                                         </span>
                                     <?php endif; ?>
                                 </div>
                                 <div class="col-md-1">
                                   <span>BOB.</span>
                                 </div>
                            </div>
                            <div class="form-group <?php echo e($errors->has('stock') ? ' has-error' : ''); ?>">
                                <label for="stock" class="col-md-4 control-label">Stock</label>

                                <div class="col-md-5">
                                    <input id="stock" type="number" class="form-control" name="stock" >
                                    <?php if($errors->has('stock')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('stock')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-1">
                                    <span>Unidades</span>
                                </div>
                            </div>
                            <div class="form-group <?php echo e($errors->has('stock') ? ' has-error' : ''); ?>">
                                <label for="stock" class="col-md-4 control-label">Stock</label>

                                <div class="col-md-5">
                                    <input id="stock" type="number" class="form-control" name="stock">
                                    <?php if($errors->has('stock')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('stock')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-1">
                                    <span>Cajas</span>
                                </div>
                            </div>
                            <div class="form-group <?php echo e($errors->has('stock') ? ' has-error' : ''); ?>">
                                <label for="stock" class="col-md-4 control-label">Stock</label>

                                <div class="col-md-5">
                                    <input id="stock" type="number" class="form-control" name="stock">
                                    <?php if($errors->has('stock')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('stock')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-1">
                                    <span>Paquetes</span>
                                </div>
                            </div>
                             <div class="form-group">
                                 <div class="col-md-6 col-md-offset-4">
                                   <button type="submit" class="btn btn-primary btn-block">
                                       <i class="fa fa-btn fa-user"></i> Crear Producto
                                   </button>
                                 </div>
                             </div>
                         </form>
                     <br><br>
                     <?php echo e($success = Session::get('success')); ?>

                     <?php if($success): ?>
                         <div class="alert alert-success">
                             <strong>!!Felicidades!!</strong>Se Creo el Producto Correctamente <br><br>
                         </div>
                     <?php endif; ?>
                </div>
           </div>
       </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Plantilla/plantilla', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>