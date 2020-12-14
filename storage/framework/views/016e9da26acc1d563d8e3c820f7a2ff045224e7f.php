<?php $__env->startSection('content'); ?>
    <div id="ribbon">
        <ol class="breadcrumb">
            <li>Inicio</li><li>Modificar de Usuario</li>
        </ol>
    </div>
    <!-- Small boxes (Stat box) -->
    <div class="container">
        <div class="row" >
            <div class="">
                <div class="panel panel-default" id="panel-profin" style="margin-top:20px;">
                    <div class="panel-heading text-center textoHeader">Modificacion de Usuario</div>
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
                            <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('user/saveModificarUsuario')); ?>">
                                <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="id" value="<?php echo e($user->id); ?>">
                                <div class="form-group<?php echo e($errors->has('nombres') ? ' has-error' : ''); ?>">
                                    <label for="nombres" class="col-md-4 control-label">Nombres</label>

                                    <div class="col-md-6">
                                        <input id="nombres" type="text" class="form-control" name="nombres" value="<?php echo e($user->name); ?>">

                                        <?php if($errors->has('nombres')): ?>
                                            <span class="help-block">
                                        <strong><?php echo e($errors->first('nombres')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group<?php echo e($errors->has('lastname') ? ' has-error' : ''); ?>">
                                    <label for="lastname" class="col-md-4 control-label">Paterno</label>

                                    <div class="col-md-6">
                                        <input id="lastname" type="text" class="form-control" name="lastname" value="<?php echo e($user->lastname); ?>">

                                        <?php if($errors->has('lastname')): ?>
                                            <span class="help-block">
                                        <strong><?php echo e($errors->first('lastname')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group<?php echo e($errors->has('mlastname') ? ' has-error' : ''); ?>">
                                    <label for="mlastname" class="col-md-4 control-label">Materno</label>

                                    <div class="col-md-6">
                                        <input id="mlastname" type="text" class="form-control" name="mlastname" value="<?php echo e($user->mlastname); ?>">

                                        <?php if($errors->has('mlastname')): ?>
                                            <span class="help-block">
                                        <strong><?php echo e($errors->first('mlastname')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                    <label for="email" class="col-md-4 control-label">Email</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="<?php echo e($user->email); ?>">

                                        <?php if($errors->has('email')): ?>
                                            <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group<?php echo e($errors->has('rol') ? ' has-error' : ''); ?>">
                                    <label for="rol" class="col-md-4 control-label">Rol</label>
                                    <div class="col-md-6">
                                        
                                            <select name="rol" id="rol" class="form-control">
                                                <option value="ADMIN_ROLE" selected="selected">Administrador</option>
                                                <option value="VENDEDOR_ROLE">Gerente</option>
                                                <option value="USER_ROLE">Cajero</option>
                                            </select>
                                      
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 control-label">Contraseña</label>
        
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password"  required>
        
                                        <?php if($errors->has('password')): ?>
                                            <span class="invalid-feedback">
                                                <strong><?php echo e($errors->first('password')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="verfpassword" class="col-md-4 control-label">Verificar Contraseña</label>
        
                                    <div class="col-md-6">
                                        <input id="verfpassword" type="password" oninput="check(this)" class="form-control<?php echo e($errors->has('verfpassword') ? ' is-invalid' : ''); ?>" name="verfpassword"  required>
        
                                        <?php if($errors->has('verfpassword')): ?>
                                            <span class="invalid-feedback">
                                                <strong><?php echo e($errors->first('verfpassword')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <script language='javascript' type='text/javascript'>
                                    function check(input) {
                                        if (input.value != document.getElementById('password').value) {
                                            input.setCustomValidity('Contraseña deben ser Iguales');
                                        } else {
                                            // input is valid -- reset the error message
                                            input.setCustomValidity('');
                                        }
                                    }
                                </script>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-btn fa-user"></i> Modificar Usuario
                                        </button>
                                    </div>
                                </div>
                            </form>
                        <br><br>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('addscripts'); ?>
    <script type="text/javascript">
        function justNumbers(e)
        {
            var keynum = window.event ? window.event.keyCode : e.which;
            if ((keynum == 8) || (keynum == 46))
                return true;
            return /\d/.test(String.fromCharCode(keynum));
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Plantilla/plantilla', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>