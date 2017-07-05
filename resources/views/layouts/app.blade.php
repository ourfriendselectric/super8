<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @yield('nav')
        @yield('content') 

        <footer>
            <div class="container">
                <a href="#">terms &amp; conditions</a> &#124; <a href="#">join our mailing list</a> &#124; <a href="#">contact us</a>
            </div>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('/js/app.js') }}"></script>
</body>
</html>
