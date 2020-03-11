<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@section('title') News @show</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

        @if(! empty(Auth::user()->is_admin))
            @include('admin.menu')
            @else
            @include('layouts.menu')
        @endif


        <main class="py-4">

            @if(session('success') || session('danger'))
            <div class="container alert
            @if(session('success')) alert-success @else alert-danger @endif
             alert-dismissible fade show" role="alert">
                @if(session('success'))<strong>{{ session()->get('success')  }}</strong>
                    @else <strong>{{ session()->get('danger')  }}</strong>
            @endif
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @yield('content')
        </main>
    </div>
</body>
</html>
