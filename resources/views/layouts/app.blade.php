<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #1e1e2f, #3b3b58);
            font-family: 'Nunito', sans-serif;
            color: #fff;
        }
        .navbar {
            background: linear-gradient(45deg, #6a11cb, #2575fc);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            border-radius: 12px;
        }
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: #d1c4e9;
            transition: color 0.3s;
        }
        .navbar-brand:hover {
            color: #b39ddb;
        }
        .navbar-nav .nav-link {
            color: #cfcfe8;
            font-weight: 500;
            transition: color 0.3s;
        }
        .navbar-nav .nav-link:hover {
            color: #8e99f3;
        }
        .btn-primary {
            background: linear-gradient(to right, #9a67ea, #6a11cb);
            border: none;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .btn-primary:hover {
            transform: scale(1.08);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
        }
        .dropdown-menu {
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
            background: rgba(29, 29, 43, 0.95);
        }
        .dropdown-item {
            color: #e0e0f8;
        }
        .dropdown-item:hover {
            background: rgba(72, 72, 112, 0.8);
        }
    </style>
</head>
<body>
<div id="app">

    <nav class="navbar navbar-expand-md navbar-dark bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    <!-- Add your other menu items here -->
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link btn btn-primary text-white mx-1" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link btn btn-secondary text-white mx-1" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            <span class="nav-link text-white mx-1">{{ Auth::user()->name }}</span>
                        </li>
                        <li class="nav-item">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger text-white mx-1">{{ __('Logout') }}</button>
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <main class="py-4 vh-100">
        @yield('content')
    </main>
</div>
</body>
</html>
