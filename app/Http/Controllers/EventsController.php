<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
* 
*/
class EventsController extends Controller
{
	
	public function index(){
		return view('outings');
	}
	public function show_create_outing(){
		return view('create_outing');
	}

	
	public function create_outing(Request $request){
		return view('welcome');
	}
	

}
?>