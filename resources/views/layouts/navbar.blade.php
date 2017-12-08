<nav class="navbar navbar-inverse navbar-fixed-top" id="mainNav">
  <div class="container">
    <div class="navbar-header">
php
      <a class="navbar-brand" href="{{ route('home_landing') }}">Safety</a>

      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">

        <li class="active"><a href="/">Home</a></li>
        <li><a href="/trafic">Traffic info</a></li>
        <li><a href="{{ route('index_outings') }}">Outings</a></li>
        <li><a href="/events">Events</a></li>

      </ul>
      @if( false )
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> John Doe <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="/account">My account</a></li>
              <li role="separator" class="divider"></li>
              <li class="dropdown-header">Gestion</li>
              <li><a href="/parameters">Settings</a></li>
              <li><a href="/logout">Logout</a></li>
            </ul>
          </li>
        </ul>
      @else
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <li><a href="/login">Sign in</a></li>
            <li><a href="/register">Sign up</a></li>
            </ul>
          </li>
        </ul>
        @endif

    </div><!--/.nav-collapse -->
  </div>
</nav>
