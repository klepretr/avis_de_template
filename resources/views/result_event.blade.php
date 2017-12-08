@extends('layouts.base')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Resultat de la recherche d'une manifestation</div>

                	<div class="panel-body">
                        @foreach($eventsfounded as $key)
							<div> <a href="/my_event/{{$key->id}}"> {{ $key->title }} à {{ $key->city}} </a></div> 
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection