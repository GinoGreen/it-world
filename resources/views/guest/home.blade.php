<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/guest/style.css') }}">
    <title>IT World</title>
</head>
<body>
    @if (session('deleted'))
        <div class="alert alert-success" role="alert">
            {{ session('deleted') }}
        </div>
    @endif
    <div id="app"></div>
    <script src="{{ asset('js/guest.js') }}"></script>
</body>
</html>