<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/utility.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layout.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icomoon/style.css') }}" rel="stylesheet">

    @yield('css')
</head>
<body>

    <div id="app">
    
        <nav class="navbar navbar-expand-md navbar-dark shadow" style="background: linear-gradient(90deg, rgba(7,0,117,1) 0%, rgba(13,0,255,1) 31%, rgba(2,179,215,1) 100%);">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img class="navbar-logo" src="{{ asset('images/capsule1.png') }}" style="padding:2px 0 2px 2px;">
                    <span style="color:#fff">{{ config('app.name', 'Laravel') }}<span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <form method="GET" action="{{ route('index') }}">
                            @csrf               
                            <input type="text" name="keyword" value="{{ old('keyword') }}" class="rounded-lg border-info">
                            <input type="submit" value="検索" class="rounded-lg border-info">
                        </form>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">ホーム画面（仮）</a>
                        </li>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">ログイン</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">新規登録</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a href="{{ route('create') }}" class='nav-link'>お薬を登録する</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        ログアウト
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
        <main class="main" style="background:#fff;">
        @if (session('flash_message'))
            <div class="flash_message bg-success text-center py-3 my-0 mb30">
                {{ session('flash_message') }}
            </div>
        @endif
            @yield('content')
        </main>
        <footer class="footer p20" style="background: linear-gradient(90deg, rgba(7,0,117,1) 0%, rgba(13,0,255,1) 31%, rgba(2,179,215,1) 100%);">
            @yield('footer')
            <a href="{{ url('/') }}" style="text-decoration: none;"><small style="color:white;">おくすり手帳 2020</small></a>
        </footer>
    </div>
</body>
</html>
