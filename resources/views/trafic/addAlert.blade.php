@extends('layouts.base')

@section('title')
	Signaler
@endsection

@section('content')
<div id="error"></div>
	<form method="post" action="{{ route('addAlert') }}" id="myForm">
		{{ csrf_field() }}
		<select name="category">
			@foreach(App\Models\IncidentCategories::all() as $category)
				<option value="{{ $category->id }}">{{ ucfirst($category->label) }}</option>
			@endforeach
		</select>
		<input type="hidden" name="lat" id="lat" />
		<input type="hidden" name="lon" id="lon" />
		<input type="submit" id="submit" />
	</form>
	<script>
	var lat = $("#lat");
	var lon = $("#lon");
	var x = $("#error");
	$('document').ready(function(){
 		if (navigator.geolocation) {
        	navigator.geolocation.getCurrentPosition(showPosition);
    	} else {
        	x.innerHTML = "Geolocation is not supported by this browser.";
    	}
    	function showPosition(position) {
    		lat.val(position.coords.latitude);
    		lon.val(position.coords.longitude);
		}
	});


   


</script> 
@endsection