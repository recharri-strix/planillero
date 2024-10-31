<nav class="sidenav shadow-right sidenav-light">
    <div class="sidenav-menu">
        <div class="nav accordion" id="accordionSidenav">
            {{-- @role('super-admin') --}}
                <div class="sidenav-menu-heading">SUPER ADMIN</div>
                <a class="nav-link" href="{{ route('planillas.index') }}">
                    <div class="nav-link-icon"><i data-feather="bar-chart"></i></div>
                    Planillero
                </a>
             {{-- @endrole --}}
                {{-- <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                    data-bs-target="#collapseUsuarios" aria-expanded="false" aria-controls="collapseUsuarios">
                    <div class="nav-link-icon"><i class="fa fa-user" aria-hidden="true"></i></div>
                    Usuarios
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseUsuarios" data-bs-parent="#DasboardSidenav">
                    <nav class="sidenav-menu-nested nav accordion" id="UsuariosSidenavPages">
                            <a class="nav-link" href="{{ route('usuario.index') }}">ABM Usuarios</a>
                    </nav>
                </div> --}}

        </div>
    </div>

    {{-- Sidenav Footer --}}
    <div class="sidenav-footer">
        <div class="sidenav-footer-content">
            <div class="sidenav-footer-subtitle">Usuario :</div>
            <div class="sidenav-footer-title">{{ auth()->user()->name }}</div>
        </div>
    </div>
</nav>
