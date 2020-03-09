<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Санжыра">
    <meta name="keywords" content="санжыра; кыргыз;">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/815801c4a2.js" crossorigin="anonymous"></script>
</head>
<body id="body">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        {{-- <li class="nav-item">
                            <a class="nav-link {{ (Request::is('name/*') || Request::is('name') ? 'active' : '') }}" href="{{route('name')}}">Ысымдар</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (Request::is('famous/*') || Request::is('famous') ? 'active' : '') }}" href="{{route('famous-people')}}">Белгилүү инсандар</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (Request::is('category/*') || Request::is('category') ? 'active' : '') }}" href="{{route('category')}}">Категориялар</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (Request::is('article/*') || Request::is('article') ? 'active' : '') }}" href="{{route('article')}}">Макалалар</a>
                        </li> --}}
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        @include('sanjyra.search.main_search')
                        <!-- Authentication Links -->
                        @guest
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="container py-3">
            @yield('content')
        </main>

        <footer class="footer" id="footer">
            <div class="row m-0 p-3">
                <div class="col text-center">
                    <a href="https://www.facebook.com/groups/471779633154987/" target="_blank"><i class="fab fa-facebook-square fa-2x"></i></a><br>
                    Email: <a href="mailto:help@sanjyra.net">help@sanjyra.net</a>
                </div>
                <div class="col text-center"><br>
                    <a href="{{route('terms-of-use')}}">Колдонуу эрежелери</a><br>
                    &copy; 2020 <a href="{{route('man')}}">Sanjyra.net</a>
                </div>
            </div>
        </footer>
    </div>
    <script src="{{ asset('js/social.js') }}" defer></script>
</body>
</html>
