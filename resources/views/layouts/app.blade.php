<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Super 8 Music Video</title>

    <!-- Styles -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
</head>
<body class="@yield('body_class')">
    <div id="app">
        @yield('content') 

        <footer>
            <div class="container">
                <div class="row social">
                    <a href="#"><img src="/images/email.png" alt="Email"></a>
                    <a href="#"><img src="/images/facebook.png" alt="Facebook"></a>
                    <a href="#"><img src="/images/instagram.png" alt="Instagram"></a>
                </div>
                <div class="row">
                    <a href="#">terms &amp; conditions</a> &#124; <a href="#">join our mailing list</a> &#124; <a href="#">contact us</a>
                </div>
            </div>
        </footer>
    
    </div>

    <!-- Scripts -->
    <script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
