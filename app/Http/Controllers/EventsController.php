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
	public function show_create_outling(){
		return view('create_outling');
	}

	
	public function create_outling(Request $request){
		return view('outings');
	}
	public function show_create_outing(){
		return view('create_outing');
	}

	
	public function create_outing(Request $request){
		$name=$request->name;
		$description=$request->description;
		$lieu=$request->lieu;
		$date=$request->date;
		DB::table('outings')->insert(['title'->$name,'description'->$description]);
	}
	

}
