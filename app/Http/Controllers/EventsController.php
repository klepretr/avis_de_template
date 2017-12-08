<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Outings;
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

	
	

}
?>