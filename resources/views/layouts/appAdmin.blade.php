<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'EducApp') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/admin.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>

<body id="body-pd">

    <header class="header " id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <nav class="navbar navbar-expand navbar-light ">
            <div class="container">

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Admin -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            {{ Auth::user()->name }}
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="/" class="nav_logo">
                    <i class='bx bxs-school nav_logo-icon'></i>
                    <span class="nav_logo-name">KIRA-SCHOOLS</span>
                </a>
                <div class="nav_list">
                    <a href="{{ route('home') }}" class="nav_link {{ Request::is('home') ? 'active' : '' }}">
                        <i class='bx bx-grid-alt nav_icon'></i>
                        <span class="nav_name">Dashboard</span>
                    </a>

                    <a href="{{ route('matieres') }}"
                        class="nav_link {{ str_contains(Route::currentRouteName(), 'matieres') ? 'active' : '' }}">
                        <i class='bx bxs-briefcase nav_icon'></i>
                        <span class="nav_name">Matieres</span>
                    </a>
                    <a href="{{ route('classes') }}"
                        class="nav_link {{ str_contains(Route::currentRouteName(), 'classes') ? 'active' : '' }}">
                        <i class='bx bxs-graduation nav_icon'></i>
                        <span class="nav_name">Classes</span>
                    </a>
                    <a href=" {{ route('professeurs') }}"
                        class="nav_link {{ str_contains(Route::currentRouteName(), 'professeurs') ? 'active' : '' }}">
                        <i class='bx bx-user nav_icon'></i>
                        <span class="nav_name">Professeurs</span>
                    </a>
                    <a href="{{ route('emplois_prof') }}"
                        class="nav_link {{ str_contains(Route::currentRouteName(), 'emplois_prof') ? 'active' : '' }}">
                        <i class='bx bx-folder nav_icon'></i>
                        <span class="nav_name">Emplois Enseignants</span>
                    </a>
                    <a href=" {{ route('parents') }}"
                        class="nav_link {{ str_contains(Route::currentRouteName(), 'parents') ? 'active' : '' }}">
                        <i class='bx bx-group nav_icon'></i>
                        <span class="nav_name">Parents</span>
                    </a>

                    <a href="{{ route('eleves') }}"
                        class="nav_link {{ str_contains(Route::currentRouteName(), 'eleves') ? 'active' : '' }}">
                        <i class='bx bxs-face nav_icon'></i>
                        <span class="nav_name">Eleves</span>
                    </a>
                    <a href="{{ route('home_works') }}"
                        class="nav_link {{ str_contains(Route::currentRouteName(), 'home_works') ? 'active' : '' }}">
                        <i class='bx bxs-book-content nav_icon'></i>
                        <span class="nav_name">Homeworks</span>
                    </a>
                    <a href="{{ route('reclamations') }}"
                        class="nav_link {{ str_contains(Route::currentRouteName(), 'reclamations') ? 'active' : '' }}">
                        <i class='bx bx-error-circle nav_icon'></i>
                        <span class="nav_name">Réclamations</span>
                    </a>
                    <a href="{{ route('reponses') }}"
                        class="nav_link {{ str_contains(Route::currentRouteName(), 'reponses') ? 'active' : '' }}">
                        <i class='bx bx-message-square-detail nav_icon'></i>
                        <span class="nav_name">Réponses</span>
                    </a>
                    <a href="{{ route('bulletins') }}"
                        class="nav_link {{ str_contains(Route::currentRouteName(), 'bulletins') ? 'active' : '' }}">
                        <i class='bx bxs-spreadsheet nav_icon'></i>
                        <span class="nav_name">Bulletins</span>
                    </a>

                </div>
            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                class="nav_link">
                <i class='bx bx-log-out-circle nav_icon'></i>
                <span class="nav_name">SignOut</span>
            </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="pt-4">
        @yield('content')
    </div>

</body>

</html>
