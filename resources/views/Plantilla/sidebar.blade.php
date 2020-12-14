<aside id="left-panel">
    {{-- <div class="login-info">
				<span> <!-- User image size is adjusted inside CSS, it should stay as is -->
          Fundacion PROFIN
				</span>
    </div> --}}
    <!-- User info -->
    <div class="login-info">
        <span> <!-- User image size is adjusted inside CSS, it should stay as it -->

            <a class="nav-link text-success btn btn-outline-success" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
               <span>
                   Cerrar Sesion
               </span>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: one;">
                {{ csrf_field() }}
            </form>


        </span>
    </div>
    <!-- end user info -->

    <!-- NAVIGATION : This navigation is also responsive-->
    <nav>
        <!---
        NOTE: Notice the gaps after each icon usage <i></i>..
        Please note that these links work a bit different than
        traditional href="" links. See documentation for details.
        -->

        <ul>
            <li class="active">
                <a href="{{ url('/') }}" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Inicio</span></a>
            </li>
            @if(Auth::user()->role == 'ADMIN_ROLE')
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-user"></i> <span class="menu-item-parent">Gestion de Usuario</span></a>
                <ul>
                    <li>
                        <a href="{{ url('user/crear') }}">Crear Usuario</a>
                    </li>
                    <li>
                        <a href="{{ url('user/modificar') }}">Modificar Usuario</a>
                    </li>
                    <li>
                        <a href="{{ url('baja') }}">Usuarios Dados de Baja</a>
                    </li>
                </ul>
            </li>
            @endif
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-codepen"></i> <span class="menu-item-parent">Tipo de Productos</span></a>
                <ul>
                    <li>
                        <a href="{{ url('categorias/create') }}">
                            <i class="fa fa-lg fa-fw fa-upload"></i>
                            Crear Tipo de Producto
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('categorias.index') }}">
                            <i class="fa fa-lg fa-fw fa-upload"></i>
                            Gestion Tipo de Producto
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-book"></i> <span class="menu-item-parent">Productos</span></a>
                <ul>
                    <li>
                        <a href="{{ url('libros/create') }}">
                            <i class="fa fa-lg fa-fw fa-upload"></i>
                            Crear Productos
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('libros.index') }}">
                            <i class="fa fa-lg fa-fw fa-upload"></i>
                            Gestion Productos
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('libro/vendidos') }}">
                            <i class="fa fa-lg fa-fw fa-upload"></i>
                            Productos Vendidos
                        </a>
                    </li>
                </ul>
            </li>
            <!-- <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-book"></i> <span class="menu-item-parent">Creacion de Productos</span></a>
                <ul>
                    <li>
                        <a href="{{ url('libros/createunidad') }}">
                            <i class="fa fa-lg fa-fw fa-upload"></i>
                            Crear Productos por unidad
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('libros/createpeso') }}">
                            <i class="fa fa-lg fa-fw fa-upload"></i>
                            Crear Productos por peso
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('libro/createvolumen') }}">
                            <i class="fa fa-lg fa-fw fa-upload"></i>
                            Crear producto por volumen
                        </a>
                    </li>
                </ul>
            </li> -->
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-medkit"></i> <span class="menu-item-parent">Proveedores</span></a>
                <ul>
                    <li>
                        <a href="{{ route('proveedores.create') }}">
                            <i class="fa fa-lg fa-fw fa-upload"></i>
                            Crear Proveedor
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('proveedores.index') }}">
                            <i class="fa fa-lg fa-fw fa-upload"></i>
                            Gestion Proveedor
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-codepen"></i> <span class="menu-item-parent">Ventas</span></a>
                <ul>
                    <li>
                        <a href="{{ url('ventas/ventas') }}">
                            <i class="fa fa-lg fa-fw fa-upload"></i>
                            Realizar Ventas
                        </a>
                    </li>
                </ul>
            </li>         
            <li>
                <a href="{{ url('reportes/index') }}"><i class="fa fa-lg fa-fw fa-user"></i> <span class="menu-item-parent">Reportes</span></a>
            </li>
        </ul>
    </nav>


    <span class="minifyme" data-action="minifyMenu">
                    <i class="fa fa-arrow-circle-left hit"></i>
                </span>

</aside>
<!-- END NAVIGATION -->
