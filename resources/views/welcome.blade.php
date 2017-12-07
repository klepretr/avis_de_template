<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <!--<link rel="stylesheet" href="/css/bootstrap-theme.min.css">-->
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/css/welcome.css">
        <script src="/js/jquery.js" charset="utf-8"></script>
        <script src="/js/bootstrap.min.js" charset="utf-8"></script>
        <title>Safety</title>
        

    </head>
    <body>
        <span id="app_name" class="text-center">Safety</span>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                
            </div>
        </div>
        <div class="row">
        <div class="col three">             
            <a href="#" class="btn btn-sunflower"><i class="fa fa-search" aria-hidden="true"></i></a>           
        </div>
        <div id="normal_use">
            <button type="button" class="btn btn-success btn-circle">
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </div>
        <div>
            <button type="button" class="btn btn-success btn-circle" id="party_use">
                <i class="fa fa-beer" aria-hidden="true"></i>
            </button>
        </div>
        <div>
            <button type="button" class="btn btn-success btn-circle" id="event_use">
                <i class="fa fa-calendar" aria-hidden="true"></i>
            </button>
        </div>
        <div>
            <button type="button" class="btn btn-info btn-circle" id="help_use">
                <i class="fa fa-question-circle" aria-hidden="true">  
            </i></button>
        </div>
    </body>
</html>
