
@extends('layouts.base')

@section('content')
      <div class="container-master">
        <div class="container-btn">
        	<a class="btn btn-secondary btn-create" href="{{ route('create_outing')}}"><i class="fa fa-plus" aria-hidden="true"></i> Create Outlings</a>
	        <div>
	            <a class="btn btn-secondary btn-search" href="{{ route('show_create_outing')}}"><i class="fa fa-search" aria-hidden="true"></i> Search Outlings</a>
	        </div>
        </div>
      </div>
@endsection