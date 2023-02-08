<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="icon" href="https://img.freepik.com/premium-vector/astronaut-is-sitting-meteor-celebrating-new-year-doodle-icon-image-kawaii_10606-3342.jpg?w=740">
    <link rel="stylesheet" href="{{ asset("css/theme.css") }}">
</head>
<body>
<nav class="navbar navbar-expand bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route("page.index") }}">Lara Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <x-nav-link name="Home" url="{{ route('page.index') }}" />
                </li>
                    @auth()
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route("home") }}">Dashboard</a></li>
                            <li>
                                <hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                    @else
                    <li class="nav-item" >

                        <x-nav-link name="Login" url="{{ route('login') }}" />

{{--                        <a class="nav-link {{ request()->url() === route("login") ? "active" : "" }}" href="{{ route("login") }}">Login</a>--}}
                    </li>
                    <li class="nav-item" >
                        <x-nav-link name="Register" url="{{ route('register') }}" />

{{--                        <a class="nav-link {{ request()->url() === route("register") ? "active" : "" }}" href="{{ route("register") }}">Register</a>--}}
                    </li>
                    @endauth

            </ul>
        </div>
    </div>
</nav>
<section class="py-3">
    @yield("content")
</section>
<script src="{{asset("js/theme.js")}}"></script>
</body>
</html>
