
@extends('layout.base')

@section('content')
      <div class="container-master">
        <div class="container-btn">
        	<a class="btn btn-secondary btn-create" href="{{ route('create_event')}}"><i class="fa fa-plus" aria-hidden="true"></i> Create event</a>
	        <div>
	            <a class="btn btn-secondary btn-search" href="{{ route('show_create_event')}}"><i class="fa fa-search" aria-hidden="true"></i> Search events</a>
	        </div>
        </div>
      </div>
@endsection