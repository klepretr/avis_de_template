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
class SearchController extends Controller
{
	public function search_event(){
		return view('search_event');
	}

	public function find_event(Request $request){
		$category=$request->category;
		$ville=$request->ville;
		$category=settype($category,'integer');

		$eventsfounded=Events::where('event_category',$category)->where("city",$ville)->get();
		return view('result_event',array('eventsfounded' => $eventsfounded));
	}

	public function myevent(int $id){
		$eventfounded=Events::where('id',$id)->first();
		return view('myevent',array('eventfounded'=>$eventfounded));
	}

	
}
?>