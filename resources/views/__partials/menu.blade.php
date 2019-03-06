<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="user-wrapper">
                    <div class="profile-image">
                        <img src="{{asset('assets/images/faces/user.png')}}" alt="profile image"></div>
                    <div class="text-wrapper">
                        <p class="profile-name">{{\Illuminate\Support\Facades\Auth::user()->name}}  </p>
                        <div>
                            <small
                                class="designation text-muted">{{\Illuminate\Support\Facades\Auth::user()->rol}}</small>
                            <span class="status-indicator online"></span>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('home')}}"
               @if(Request::is('/') || Request::is('/home')) class="active" @endif>
                <i class="menu-icon fa fa-tachometer-alt"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#dashboard-dropdown" aria-expanded="false"
               aria-controls="dashboard-dropdown">
                <i class="menu-icon fa fa-cash-register"></i>
                <span class="menu-title">Productos</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="dashboard-dropdown">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('productos')}}"
                           @if(Request::is('/produtos')) class="active" @endif>
                            <i class="menu-icon fa fa-clipboard-list"></i>
                            <span class="menu-title">Productos</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('producto.add')}}"
                           @if(Request::is('/producto/agregar')) class="active" @endif>
                            <i class="menu-icon fa fa-plus-circle"></i>
                            <span class="menu-title">Agregar Producto</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('producto.edit')}}"
                           @if(Request::is('/producto/editar')) class="active" @endif>
                            <i class="menu-icon fa fa-pencil-alt"></i>
                            <span class="menu-title">Editar Producto</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('producto.exit')}}"
                           @if(Request::is('/producto/salida')) class="active" @endif>
                            <i class="menu-icon fa fa-shopping-cart"></i>
                            <span class="menu-title">Salida Producto</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        @if(\Illuminate\Support\Facades\Auth::user()->role == 'admin')
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.logs')}}"
                   @if(Request::is('/admin/logs')) class="active" @endif>
                    <i class="menu-icon fa fa-file-alt"></i>
                    <span class="menu-title">Logs</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.users')}}"
                   @if(Request::is('/admin/registrar/usuario')) class="active" @endif>
                    <i class="menu-icon fa fa-user-circle"></i>
                    <span class="menu-title">Usuarios</span>
                </a>
            </li>
        @endif
    </ul>
</nav>

