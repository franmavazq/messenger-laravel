<!DOCTYPE html class="h-100">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="h-100">
    <div id="app" class="h-100">

        <b-navbar toggleable type="dark" variant="primary">
            <b-navbar-toggle target="nav_text_collapse"></b-navbar-toggle>
            <b-navbar-brand  href="{{ route('chat') }}">{{ config('app.name', 'Laravel') }}</b-navbar-brand>
            <b-collapse is-nav id="nav_text_collapse">
                <b-navbar-nav class="ml-auto">
                @guest
                    <b-nav-item href="{{ route('login') }}">Ingresar</b-nav-item>
                    <b-nav-item href="{{ route('register') }}">Registro</b-nav-item>
                @else
                    <b-nav-item-dropdown text="{{ Auth()->user()->name }}" right>
                        <b-dropdown-item href="{{ url('/profile') }}">
                            Modificar perfil
                        </b-dropdown-item>
                        <b-dropdown-item href="#" @click="logout">
                            Cerrar sesión
                        </b-dropdown-item>
                    </b-nav-item-dropdown>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest
                </b-navbar-nav>
            </b-collapse>
        </b-navbar>

            @yield('content')
        

    </div>
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</body>
</html>
