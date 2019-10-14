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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
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

        <main class="py-4">
            @if(Auth::check())
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <ul class="list-group">
                            @if(Auth::user()->role == 1)
                                <li class="list-group-item">Super Admin</li>
                                <li class="list-group-item"><b>Books</b></li>
                                <li class="list-group-item"><a href="/superadmin/books/">Book List</a></li>
                                <li class="list-group-item"><a href="/superadmin/books/create">Insert New Book</a></li>
                                <li class="list-group-item"><a href="/superadmin/books/index">Edit</a></li>
                                <li class="list-group-item"><a href="/superadmin/books/index">Delete</a></li>
                                <li class="list-group-item"><b>Users</b></li>
                                <li class="list-group-item"><a href="/superadmin/users/">User List</a></li>
                                <li class="list-group-item"><a href="/superadmin/users/create">Create New User</a></li>
                                <li class="list-group-item"><a href="/superadmin/users/index">Edit</a></li>
                                <li class="list-group-item"><a href="/superadmin/users/index">Delete</a></li>
                            @elseif(Auth::user()->role == 2)
                                <li class="list-group-item">Admin</li>
                                <li class="list-group-item"><b>Books</b></li>
                                <li class="list-group-item"><a href="/admin/books/">Index</a></li>
                                <li class="list-group-item"><a href="/admin/books/create">Create</a></li>
                                <li class="list-group-item"><a href="/admin/books/index">Edit</a></li>
                                <li class="list-group-item"><a href="/admin/books/index">Delete</a></li>
                            @elseif(Auth::user()->role == 3)
                                <li class="list-group-item">Author</li>
                                <li class="list-group-item">Dapibus ac facilisis in</li>
                                <li class="list-group-item">Morbi leo risus</li>
                                <li class="list-group-item">Porta ac consectetur ac</li>
                                <li class="list-group-item">Vestibulum at eros</li>
                            @else
                                <li class="list-group-item">User</li>
                                <li class="list-group-item">Dapibus ac facilisis in</li>
                                <li class="list-group-item">Morbi leo risus</li>
                                <li class="list-group-item">Porta ac consectetur ac</li>
                                <li class="list-group-item">Vestibulum at eros</li>
                            @endif
                        </ul>
                    </div>
                    <div class="col-md-9">
                        @yield('content')
                    </div>
                </div>
            </div>
            @else
                @yield('content')
            @endif
        </main>
    </div>
</body>
</html>
