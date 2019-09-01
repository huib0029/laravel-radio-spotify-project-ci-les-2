<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- favicon --!>
    {{ Html::favicon( '/favicon.ico' ) }}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plyr.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}"> <i class="fas fa-2x fa-music"></i>
                        {{ config('app.name') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        @guest
                            <li class="{{ (Request::is('/') ? 'active' : '') }}">
                                <a href="{{ url('') }}"><i class="fas fa-2x fa-signal"></i><br>Internet radio</a>
                            </li>
                            <li class="{{ (Request::is('spotify') ? 'active' : '') }} spotify">
                                <a href="{{ url('spotify') }}"><i class="fab fa-2x fa-spotify"></i><br>Spotify</a>
                            </li>
                            <li class="{{ (Request::is('youtube') ? 'active' : '') }} youtube">
                                <a href="{{ url('youtube') }}"><i class="fab fa-2x fa-youtube"></i><br>Youtube</a>
                            </li>
                            @else
                            <li class="{{ (Request::is('/') ? 'active' : '') }}">
                                <a href="{{ url('') }}"><i class="fas fa-2x fa-signal"></i><br>Internet radio</a>
                            </li>
                            <li class="{{ (Request::is('spotify') ? 'active' : '') }} spotify">
                                <a href="{{ url('spotify') }}"><i class="fab fa-2x fa-spotify"></i><br>Spotify</a>
                            </li>
                            <li class="{{ (Request::is('youtube') ? 'active' : '') }} youtube">
                                <a href="{{ url('youtube') }}"><i class="fab fa-2x fa-youtube"></i><br>Youtube</a>
                            </li>
                            <li class="{{ (Request::is('internetradiostationseditor') ? 'active' : '') }}">
                                <a href="{{ url('internetradiostationseditor') }}"><i class="fas fa-2x fa-signal"></i> <i class="fas fa-2x fa-edit"></i><br>Pas internet radio stations aan</a>
                            </li>
                        @endguest
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}"><i class="fas fa-2x fa-sign-in-alt"></i><br>Admin Login</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    <i class="fas fa-2x fa-user"></i><br> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>
    <div class="site-footer" role="contentinfo">By ©Teun Huibregtse, feel free to edit and use</div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/plyr.js') }}"></script>
    <script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
    @yield('local-scripts')
</body>
</html>
