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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.0.0/magnific-popup.min.css" integrity="sha512-nIm/JGUwrzblLex/meoxJSPdAKQOe2bLhnrZ81g5Jbh519z8GFJIWu87WAhBH+RAyGbM4+U3S2h+kL5JoV6/wA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<body>
<div class="wrapper">
    {{--Header start--}}
    <header>
        <div class="container">
            <div class="header">
            <div class="header__logo">
                <a href="/">{{ config('app.name', 'Laravel') }}</a>
            </div>
            <div class="header__buttons">
                @if(auth()->check())
                    <div class="user">
                        <span>({{ \Illuminate\Support\Facades\Auth::user()->name }})</span>
                        <span>{{ \Illuminate\Support\Facades\Auth::user()->email }}</span>
                    </div>
                @endif
                <a href="{{ route('favorite') }}/{{ \Illuminate\Support\Facades\Auth::id() }}" class="button button__white"><i class="favorite"></i>Favorites</a>
                <a href="{{ route('upload') }}" class="button button__grey">Upload</a>
                @if(auth()->check())
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="button button__dark-grey">Logout</button>
                        </form>
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
