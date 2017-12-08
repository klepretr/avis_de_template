<nav class="navbar navbar-inverse navbar-fixed-top" id="mainNav">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{ route('home_landing') }}">{{ config('app.name') }}</a>
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="/">Accueil</a></li>
        <li><a href="/trafic">Traffic infos</a></li>
        <li><a href="{{ route('index_outings') }}">Sortie entre amis</a></li>
        <li><a href="/event">Manifestations</a></li>
      </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <li><a href="/login">Connexion</a></li>
            <li><a href="/register">Incription</a></li>
            </ul>
          </li>
        </ul>

    </div><!--/.nav-collapse -->
  </div>
</nav>
