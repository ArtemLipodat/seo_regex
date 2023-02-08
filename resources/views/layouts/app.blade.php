<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div class="wrapper">
    {{--Header start--}}
    <header>
        <div class="container">
            <div class="header">
            <div class="header__logo">
                <a href="">{{ config('app.name', 'Laravel') }}</a>
            </div>
            <div class="header__buttons">
                @if(auth()->check())
                    <div class="user">
                        <span>({{ \Illuminate\Support\Facades\Auth::user()->name }})</span>
                        <span>{{ \Illuminate\Support\Facades\Auth::user()->email }}</span>
                    </div>
                @endif
                <a href="" class="button button__white"><i class="favorite"></i>Favorites</a>
                <a href="" class="button button__grey">Upload</a>
                @if(auth()->check())
                    <a href="{{ route('logout') }}" class="button button__dark-grey">Logout</a>
                @else
                    <a href="{{ route('login') }}" class="button button__dark-grey">Login</a>
                @endif
            </div>
        </div>
        </div>
    </header>
    {{--Header end--}}

    <div class="container">
        <main id="app">
            @yield('content')
        </main>
    </div>

</div>


</body>
</html>
