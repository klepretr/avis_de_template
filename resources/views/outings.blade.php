@extends('layout.base')

@section('content')

      <div class="container-master">
        <div class="container-btn">
        	<a class="btn btn-secondary btn-create" href="{{ route('create_outing')}}">Create Outlings</a>
	        <div>
	            <a class="btn btn-secondary btn-search" href="{{ route('show_create_outing')}}">Search Outlings</a>
	        </div>
        </div>
      </div>


 
@endsection

