<aside class="navbar navbar-vertical navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark">
            <a class="text-decoration-none" href="{{ route('app.admin.dashboard') }}">
                <h1 class="d-flex justify-content-center align-items-center">
                    <i class="fa fa-capsules    "></i>
                    <span class="ms-2">{{ config('app.name') }}</span>
                </h1>
            </a>
        </h1>
        <div class="navbar-nav flex-row d-lg-none">
            <div class="nav-item dropdown d-none d-md-flex me-3">
                <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1"
                   aria-label="Show notifications">
                    <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                         viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path
                            d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6"/>
                        <path d="M9 17v1a3 3 0 0 0 6 0v-1"/>
                    </svg>
                    <span class="badge bg-red"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-card">
                    <div class="card">
                        <div class="card-body">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus ad amet
                            consectetur exercitationem fugiat in ipsa ipsum, natus odio quidem quod repudiandae
                            sapiente. Amet debitis et magni maxime necessitatibus ullam.
                        </div>
                    </div>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                   aria-label="Open user menu">
                    <span class="avatar avatar-sm" style="background-color: gray"></span>
                    <div class="d-none d-xl-block ps-2">
                        <div>Paweł Kuna</div>
                        <div class="mt-1 small text-muted">UI Designer</div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <a href="#" class="dropdown-item">Settings</a>
                    <a href="#" class="dropdown-item">Logout</a>
                </div>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="navbar-nav pt-lg-3">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('app.admin.dashboard') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="fa fa-home"></i>
                        </span>
                        <span class="nav-link-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('app.admin.media-center') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="fa fa-archive"></i>
                        </span>
                        <span class="nav-link-title">Media Center</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown"
                       data-bs-auto-close="false" role="button" aria-expanded="true">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="fa fa-user"></i>
                        </span>
                        <span class="nav-link-title">User Manager</span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="dropdown-menu-columns">
                            <div class="dropdown-menu-column">
                                <a class="dropdown-item" href="{{ route('app.admin.user.index') }}">
                                    Users
                                </a>
                                <a class="dropdown-item" href="{{ route('app.admin.role.index') }}">
                                    Roles
                                </a>
                                <a class="dropdown-item" href="{{ route('app.admin.permission.index') }}">
                                    Permissions
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</aside>
