<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png">
    <link rel="manifest" href="/favicons/manifest.json">
    <link rel="mask-icon" href="/favicons/safari-pinned-tab.svg" color="#ffb30c">
    <link rel="shortcut icon" href="/favicons/favicon.ico">
    <meta name="msapplication-config" content="/favicons/browserconfig.xml">
    <meta name="theme-color" content="#ffb30c">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Super 8 Music Video</title>

    <!-- Styles -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-105824738-1', 'auto');
        ga('send', 'pageview');
    </script>
</head>
<body class="@yield('body_class')">
    <div id="app">
    
        <header>
            <div class="super8">
                <img src="/images/logo.png" alt="Super8" width="190px">
            </div>

            <div class="social">
                <a href="mailto:entries@super8musicvideo.com" target="_blank"><img src="/images/email.png" alt="Email"></a>
                <a href="https://www.facebook.com/Super8MusicVideo/" target="_blank"><img src="/images/facebook.png" alt="Facebook"></a>
                <a href="https://www.instagram.com/super8musicvideo/" target="_blank"><img src="/images/instagram.png" alt="Instagram"></a>
            </div>
        </header>

        @yield('content') 

        <footer>
            <div class="container">
                <div class="row social">
                    <a href="mailto:entries@super8musicvideo.com" target="_blank"><img src="/images/email.png" alt="Email"></a>
                    <a href="https://www.facebook.com/Super8MusicVideo/" target="_blank"><img src="/images/facebook.png" alt="Facebook"></a>
                    <a href="https://www.instagram.com/super8musicvideo/" target="_blank"><img src="/images/instagram.png" alt="Instagram"></a>
                </div>
                <div class="row">
                    <a href="/?register=true">Terms &amp; Conditions</a> &#124; <a href="/?register=true">join our mailing list</a> &#124; <a href="mailto:entries@super8musicvideo.com">contact us</a>
                </div>
            </div>
        </footer>
    
    </div>

    <!-- Scripts -->
    <script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
