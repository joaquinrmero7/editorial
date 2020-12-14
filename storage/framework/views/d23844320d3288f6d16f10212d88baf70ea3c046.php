<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">
    <link rel="stylesheet" type="text/css" href="">

    <title>Proyecto LURAÑANI</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('bootstrap/css/bootstrap.min.css')); ?>">


    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">


    <!-- Custom styles for this template -->
    <link href="<?php echo e(asset('css/styles.css')); ?>" rel="stylesheet">

  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">
                <i class="fa fa-shopping-cart" style="margin-right: 10px;"> </i>
                <strong> Cajero de Supermercado</strong>
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo e(url('/')); ?>">Inicio <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Categorias
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                            <a class="dropdown-item" href="<?php echo e(url('categorias/'.$c->id)); ?>"><?php echo e($c->nombre); ?></a>
                                <div class="dropdown-divider"></div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                        </div>
                    </li>
                    <li class="nav-item">
                       <a class="nav-link" href="#">Contacto</a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    <?php if(auth()->guard()->guest()): ?>
                        <li>
                            <a class="btn btn-success" style="margin-right: 5px;" href="<?php echo e(route('login')); ?>">Ingresar</a>
                        </li>
                        <li>
                            <a class="btn btn-info" href="<?php echo e(route('register')); ?>">Registrarse</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                            </a>
                            <?php if(Auth::user()->role == 'ADMIN_ROLE' ): ?>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo e(url('panel')); ?>">
                                        Panel
                                    </a>
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        Salir
                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            <?php else: ?>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        Salir
                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                    </form>
                            </div>
                            <?php endif; ?>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(url('carrito')); ?>">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                Carrito
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <main role="main">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <!-- <footer class="footer">
        <div class="container">
            <p class="float-right">
                <a href="#">Volver Arriba</a>
            </p>
            <center>
            <p>Sistema Creado  por Estudiantes de la Unifranz &copy;</p>
            </center>
        </div>
    </footer> -->
    
        <center>
            <p>Sistema creado por estudiantes de la UNIFRANZ &copy; </p>
        </center>
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="<?php echo e(asset('bootstrap/js/jquery-slim.min.js')); ?>" ></script>
    <script src="<?php echo e(asset('bootstrap/js/bootstrap.min.js')); ?>" ></script>
    <script src="<?php echo e(asset('bootstrap/js/popper.min.js')); ?>" ></script>
    <script src="<?php echo e(asset('bootstrap/js/holder.min.js')); ?>" ></script>
    <?php echo $__env->yieldContent('addscripts'); ?>

  </body>
</html>
