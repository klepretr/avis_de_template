
@extends('layouts.base')

@section('content')
        <link rel="stylesheet" href="/css/outings.css">
      <div class="container-master">
        <div class="container-btn">
        	<a class="btn btn-secondary btn-create" href="{{ route('create_outing')}}"><i class="fa fa-plus" aria-hidden="true"></i> Create Outings</a>
	        <div>
	            <a class="btn btn-secondary btn-search" href="{{ route('show_create_outing')}}"><i class="fa fa-search" aria-hidden="true"></i> Search Outings</a>
	        </div>
        </div>
      </div>
@endsection