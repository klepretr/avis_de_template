<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!--<a class="navbar-brand" href="#">{{ app()->getLocale() }}</a>-->
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="/">Accueil</a></li>
        <li><a href="/trafic">Traffic infos</a></li>
        <li><a href="{{ route('index_outings') }}">Sortie entre amis</a></li>
        <li><a href="/event">Manifestations</a></li>
      </ul>
      @if( false )
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> John Doe <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="/account">Mon compte</a></li>
              <li role="separator" class="divider"></li>
              <li class="dropdown-header">Gestion</li>
              <li><a href="/parameters">Paramètres</a></li>
              <li><a href="/logout">Se déconnecter</a></li>
            </ul>
          </li>
        </ul>
      @else
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <li><a href="/login">Connexion</a></li>
            <li><a href="/register">Incription</a></li>
            </ul>
          </li>
        </ul>
      @endif

    </div><!--/.nav-collapse -->
  </div>
</nav>
