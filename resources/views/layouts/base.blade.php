<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <title>Safety - @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
        <script src="/js/jquery.js" charset="utf-8"></script>
        <script src="/js/bootstrap.min.js" charset="utf-8"></script>
        @yield('morehead')

    </head>
    <body>
        <div class="navbar">
          @include('layouts.navbar')
        </div>
        <div class="body_container">
            @yield('content')
        </div>

        @yield('footer')
    </body>
</html>
