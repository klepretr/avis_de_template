<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <title>Safety - @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="/css/outings.css">
        <link rel="stylesheet" href="/css/navbar.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="/js/jquery.js" charset="utf-8"></script>
        <script src="/js/bootstrap.min.js" charset="utf-8"></script>


    </head>
    <body>
        <div class="navbar">
          @include('layout.navbar')
        </div>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>