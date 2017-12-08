<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Outings;
use App\Models\Events;
use Auth;
/**
* 
*/
class EventsController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function index(){
		return view('outings');
	}
	
	public function show_create_outing(){
		return view('create_outing');
	}

	

	public function index(){
		return view('outings');
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
		$street_number=$request->street_number;
		$street_name=$request->street_name;
		$city=$request->city;
		$date=$request->date;
		Outings::create(['organizer'=>Auth::user()->id,'title'=>$name, 'street_number'=>$street_number, 'street_name'=>$street_name, 'city'=>$city, 'description'=>$description]);
	}


	public function index_event(){
		return view('event');
	}
	
	public function show_create_event(){
		return view('create_event');
	}
	public function create_event(Request $request){
		$name=$request->name;
		$description=$request->description;
		$street_number=$request->street_number;
		$street_name=$request->street_name;
		$city=$request->city;
		$date=$request->date;
		$category=$request->categorie;
		$date_end=$request->date_end;
		Events::create(['organizer'=>Auth::user()->id,'title'=>$name,'event_category'=>$category, 'street_number'=>$street_number, 'street_name'=>$street_name, 'city'=>$city, 'description'=>$description,'created_at'=>$date, 'end_at'=>$date_end]);
		$eventfounded=Events::where('title',$name)->first();
		return view('myevent', array('eventfounded'=>$eventfounded));
	}
	
}
?>