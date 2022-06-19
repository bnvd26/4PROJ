<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
            aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <img src="{{ asset('images/supinfo.png') }}" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-1-800x800.jpg">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                    </div>


                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item"
                        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('argon') }}/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse"
                            data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                            aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended"
                        placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Divider -->
            <hr class="my-3">
            @php
            $interface = '';

            if(Auth::user()) {

                            switch (Auth::user()->type) {
                                case 'platform_administrator':
                                    $interface = 'Administrateur de la plateforme';
                                    break;
                                case 'pedagogy_member':
                                    $interface = 'Pédagogie';
                                    break;
                                case 'student':
                                    $interface = 'Etudiant';
                                    break;
                                case 'academic_direction':
                                    $interface = 'Direction Académique';
                                    break;
                            }
                        }
            @endphp
            <!-- Heading -->
            <h6 class="navbar-heading text-muted">{{ $interface }}</h6>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="ni ni-tv-2 text-primary"></i> {{ __('Dashboard') }}
                    </a>
                </li>
                @if (Auth::user()->type == 'platform_administrator')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.index') }}">
                            <i class="ni ni-planet text-blue"></i> Utilisateurs
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('campuses.index') }}">
                            <i class="ni ni-planet text-blue"></i> Campuses
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('professors.index') }}">
                            <i class="ni ni-planet text-blue"></i> Intervenants
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin_subjects.index') }}">
                            <i class="ni ni-planet text-blue"></i> Sujets
                        </a>
                    </li>
                @endif


                @if (Auth::user()->type == 'student')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('subjects.index') }}">
                            <i class="ni ni-planet text-blue"></i> Mes matières
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('gradebooks.show') }}">
                            <i class="ni ni-planet text-blue"></i> Mes notes
                        </a>
                    </li>
                @endif

                @if (Auth::user()->type == 'pedagogy_member')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('students.index') }}">
                            <i class="ni ni-planet text-blue"></i> Etudiants
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('professors_campus.index') }}">
                            <i class="ni ni-planet text-blue"></i> Intervenants
                        </a>
                    </li>
                @endif


                @if (Auth::user()->type == 'academic_direction')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('academic_students.index') }}">
                            <i class="ni ni-planet text-blue"></i> Etudiants
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('academic_subjects.index') }}">
                            <i class="ni ni-planet text-blue"></i> Matières
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('sponsorships.index') }}">
                            <i class="ni ni-planet text-blue"></i> Partenariats
                        </a>
                    </li>
                @endif
            </ul>


        </div>
    </div>
</nav>
