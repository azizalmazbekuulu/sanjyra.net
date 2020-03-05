<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/custom.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/815801c4a2.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/admin') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ (Request::is('admin/man/*') || Request::is('admin/man') ? 'active' : '') }}" href="{{route('admin.man.index')}}">Адамдар</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (Request::is('admin/name/*') || Request::is('admin/name') ? 'active' : '') }}" href="{{route('admin.name.index')}}">Ысымдар</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (Request::is('admin/article/*') || Request::is('admin/article') ? 'active' : '') }}" href="{{route('admin.article.index')}}">Материалдар</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (Request::is('admin/category/*') || Request::is('admin/category') ? 'active' : '') }}" href="{{route('admin.category.index')}}">Категориялар</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (Request::is('admin/literature/*') || Request::is('admin/literature') ? 'active' : '') }}" href="{{route('admin.literature.index')}}">Колдонулган адабияттар</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (Request::is('admin/uruu/*') || Request::is('admin/uruu') ? 'active' : '') }}" href="{{route('admin.uruu.index')}}">Уруулар</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (Request::is('admin/user_management/user/*') || Request::is('admin/user_management/user') ? 'active' : '') }}" href="{{route('admin.user_management.user.index')}}">Колдонуучулар</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
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
    </div>
</body>
</html>
