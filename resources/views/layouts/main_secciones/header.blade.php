<nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white"
    id="sidenavAccordion">
    {{-- Sidenav Toggle Button --}}
    <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 me-2 ms-lg-2 me-lg-0" id="sidebarToggle"><i
            data-feather="menu"></i></button>

    <h6 class="dropdown-header d-flex align-items-center">
        <img style="height:51px;width:61px" class="dropdown-user-img" src="{{ asset('assets/img/logo.jpg') }}" />
    </h6>
    <ul class="navbar-nav align-items-center ms-auto">
        {{-- Navbar Search Dropdown --}}
        {{-- * * Note: * * Visible only below the lg breakpoint --}}
        <li class="nav-item dropdown no-caret me-3 d-lg-none">
            <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="searchDropdown" href="#"
                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                    data-feather="search"></i></a>
            {{-- Dropdown - Search --}}
            <div class="dropdown-menu dropdown-menu-end p-3 shadow animated--fade-in-up"
                aria-labelledby="searchDropdown">
                <form class="form-inline me-auto w-100">
                    <div class="input-group input-group-joined input-group-solid">
                        <input class="form-control pe-0" type="text" placeholder="Search for..." aria-label="Search"
                            aria-describedby="basic-addon2" />
                        <div class="input-group-text"><i data-feather="search"></i></div>
                    </div>
                </form>
            </div>
        </li>
        {{-- Alerts Dropdown --}}

        {{-- User Dropdown --}}
        <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-4">
            <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage"
                href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false"><img class="img-fluid" src="{{ asset('assets/img/usuario.png') }}" /></a>
            <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up"
                aria-labelledby="navbarDropdownUserImage">
                <a class="dropdown-item" href="{{ route('profile', ['id' => Auth()->user()->id]) }}">
                    <div class="dropdown-item-icon"><i data-feather="settings"></i></div>
                    Mi perfil
                </a>
                <a class="dropdown-item" href="#!">
                    <div class="dropdown-item-icon">
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i data-feather="log-out" class="me-1"></i>
                            <span>{{ __('Logout') }}</span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </a>
            </div>
        </li>
    </ul>
</nav>
