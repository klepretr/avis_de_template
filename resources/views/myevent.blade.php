@extends('layout.base')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Manifestation : {{ $eventfounded->title }}</div>

                	<div class="panel-body">
							<div>Adresse : {{ $eventfounded->street_number }}, {{ $eventfounded->street_name }}  {{ $eventfounded->city}}</div> 
                            <div>Description: {{$eventfounded->description }}</div>
                            <div>Date de début : {{ $eventfounded->created_at }}</div>
                            <div>Date de fin : {{ $eventfounded->end_at}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection