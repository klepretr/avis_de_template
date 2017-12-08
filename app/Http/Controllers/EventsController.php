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
		return view('outlings');
	}
	public function show_create_outling(){
		return view('create_outling');
	}

	
	public function create_outling(Request $request){
		return view('welcome');
	}
	

}
?>