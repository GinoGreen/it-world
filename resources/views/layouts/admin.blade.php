<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>IT World | @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/admin.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/admin/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        
        @include('admin.partials.header')

        <main class="py-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-2">
                        @include('admin.partials.dashboard')
                    </div>
                    <div class="col-10">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
