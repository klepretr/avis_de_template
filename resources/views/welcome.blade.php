<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <link href="css/agency.css" rel="stylesheet">
        <!--<link rel="stylesheet" href="/css/bootstrap-theme.min.css">-->
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/css/welcome.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
        <script src="/js/jquery.js" charset="utf-8"></script>
        <script src="/js/bootstrap.min.js" charset="utf-8"></script>
        <title>Safety</title>
        

    </head>
    <body>
        <header class="masthead">
            <div class="container">
                <div class="intro-text">
          <div class="intro-lead-in">Safety</div>
          <div class="intro-heading text-uppercase">App NDI</div>
          <div>
              <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#"><i class="fa fa-location-arrow" aria-hidden="true"></i><div>Situer</div></a>
          </div>

          <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="{{ route('index_event') }}"><i class="fa fa-calendar" aria-hidden="true"></i><div>Event</div></a>
          
          <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="{{ route('index_outings') }}"><i class="fa fa-beer" aria-hidden="true"></i><div>Party</div></a>
          <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#"><i class="fa fa-medkit" aria-hidden="true"></i><div>SOS</div></a>
          <div>
              <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#"><i class="fa fa-question" aria-hidden="true"></i><div>Aide</div></a>
          </div>
        </div>
      </div>
    </header>
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
    </body>
</html>
