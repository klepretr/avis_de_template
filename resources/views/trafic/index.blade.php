@extends('layouts.base')

@section('title')
	Trafic
@endsection

@section('content')
	<form method="get" action="{{ route('overview') }}" id="myForm">
		Adresse : <input type="text" name="adress" id="adress"/>
		Rayon : <input type="numeric" name="km" id="km"/>
		<input type="submit" id="submit" />
	</form>
@endsection
