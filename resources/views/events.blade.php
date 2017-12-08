@extends('layout.base')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Création d'une sortie</div>

	                <div class="panel-body">
	                   <form class="form-horizontal" method="GET" action="{{ route('show_create_outing') }}">
							<button type="submit" class="btn btn-primary">Créer une sortie</button>
						</form>
						<form class="form-horizontal" method="GET" action="{{ route('show_create_event') }}">
							<button type="submit" class="btn btn-primary">Créer une manifestation</button>
						</form>
					</div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
