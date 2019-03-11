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
            <a class="nav-link" href="{{route('sections')}}"
               @if(Request::is('/secciones')) class="active" @endif>
                <i class="menu-icon fa fa-columns"></i>
                <span class="menu-title">Secciones</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('notices')}}"
               @if(Request::is('/noticias')) class="active" @endif>
                <i class="menu-icon fa fa-newspaper"></i>
                <span class="menu-title">Noticias</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('team')}}"
               @if(Request::is('/equipo')) class="active" @endif>
                <i class="menu-icon fa fa-user"></i>
                <span class="menu-title">Nuestro Equipo</span>
            </a>
        </li>
    </ul>
</nav>

