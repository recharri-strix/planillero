<nav class="sidenav shadow-right sidenav-light">
    <div class="sidenav-menu">
        <div class="nav accordion" id="accordionSidenav">
            {{-- @role('super-admin') --}}
                <div class="sidenav-menu-heading">JEFE DE CAMPO</div>
                <a class="nav-link" href="{{ route('planillas.index') }}">
                    <div class="nav-link-icon"><i data-feather="bar-chart"></i></div>
                    Planillero
                </a>
                <a class="nav-link" href="{{ route('planillas.index') }}">
                    <div class="nav-link-icon"><i data-feather="printer"></i></div>
                    Informes
                </a>

                @role('super-admin')
                    <div class="sidenav-menu-heading">SEGURIDAD</div>
                    <a class="nav-link" href="{{ route('usuario.index') }}">ABM Usuarios</a>
                    <a class="nav-link" href="{{ route('permisos.index') }}">Permisos</a>
                    <a class="nav-link" href="{{ route('roles.index') }}">Perfiles</a>
                @endrole
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
