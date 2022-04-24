<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
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

        @if (Auth::user())
        @if (Auth::user()->type == "platform_administrator")
        <a class="nav-link" href="{{ route('users.index') }}">Utilisateurs</a>
        <a class="nav-link" href="{{ route('campuses.index') }}">Campus</a>
        <a class="nav-link" href="{{ route('professors.index') }}">Intervenants</a>
        @endif
        @if (Auth::user()->type == "student")
        <a class="nav-link" href="{{ route('subjects.index') }}">Mes matières</a>

        <a class="nav-link" href="{{ route('gradebooks.show') }}">Mes notes</a>
        @endif
        @if (Auth::user()->type == "pedagogy_member")
        <a class="nav-link" href="{{ route('students.index') }}">Etudiants</a>
        <a class="nav-link" href="{{ route('professors_campus.index') }}">Intervenants</a>
        @endif

        @if (Auth::user()->type == "academic_direction")
        <a class="nav-link" href="{{ route('academic_students.index') }}">Etudiants</a>
        <a class="nav-link" href="{{ route('academic_subjects.index') }}">Matières</a>
        <a class="nav-link" href="{{ route('sponsorships.index') }}">Partenariats</a>
        @endif
        @endif


        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <li>Interface {{ $interface }}</li>
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->first_name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
