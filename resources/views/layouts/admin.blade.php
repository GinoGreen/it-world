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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim&family=Syne:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/admin/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        
        @include('admin.partials.header')

        <main class="back-end-main">
            <div class="container-fluid">
                <div class="row">
                    @auth
                    <div class="col-2 it-dashboard-box">
                        @include('admin.partials.dashboard')
                    </div>
                    @endauth
                    <div class="
                        @auth
                            col-10
                        @endauth

                        @guest
                            col-12
                        @endguest
                    
                    ">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
