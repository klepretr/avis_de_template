@extends('layouts.base')

@section('title')
	Trafic
@endsection

@section('morehead')
	<link rel="stylesheet" type="text/css" href="/css/trafic.css">
@endsection

@section('content')
	<div class="container-master">
        <div class="container-btn">
        	<form method="get" action="{{ route('overview') }}" id="myForm">
  				<div class="form-group">
    				<div class="col-sm-10">
    					<input type="text" name="adress" placeholder="Adresse" id="adress" class="control-label col-sm-2" />
    				</div>
  				</div>
  				<div class="form-group">
    				<div class="col-sm-10">
    					<input type="numeric" name="km" id="km" placeholder="Km" class="control-label col-sm-2" />
    				</div>
  				</div>
  				<div class="form-group">
  					<div class="col-sm-10">
  						<input type="submit" name="Chercher"> 
  					</div>
  				</div>
			</form>	
		</div>
</div>
@endsection
