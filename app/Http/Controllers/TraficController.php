<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incidents;
use App\Http\Requests\Trafic\Create;
use App\Http\Requests\Trafic\Choose;
use App\Http\Traits\Calculator;
use Carbon\Carbon;

class TraficController extends Controller
{
	use Calculator;

	private $prefix_views = 'trafic';
	/**
	 * [__construct description]
	 */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Display the index of trafic contents
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	return view($this->prefix_views.'.index');
    }


    /**
     * Display the page where we choose the type of the alert
     * @return \Illuminate\Http\Response
     */
    
    public function mapj(Request $request)
    {
        $json=file_get_contents('http://nominatim.openstreetmap.org/search?format=json&limit=1&q='.$request->adress);
        $obj = json_decode($json, true);
        $latitude = $obj[0]['lat'];
        $longitude = $obj[0]['lon']; 
        $incidents = array();
        $incidents = $this->retrieveIncidents($latitude, $longitude, $request->km);
        foreach($incidents as $incident)
        {
            $incident->label = $incident->category->label;
        }
        return response()->json($incidents);
    }
    public function overview(Request $request)
    {
        $json=file_get_contents('http://nominatim.openstreetmap.org/search?format=json&limit=1&q='.$request->adress);
        $obj = json_decode($json, true);
        $latitude = $obj[0]['lat'];
        $longitude = $obj[0]['lon']; 
    	/**$latitude = 47.081012;
    	$longitude = 2.398782;**/
    	//$incidents = $this->retrieveIncidents($latitude, $longitude, 30);
    	/**dd($incidents);
    	exit;**/
        $incidents = array();
    	$incidents = $this->retrieveIncidents($latitude, $longitude, $request->km);
    	return view($this->prefix_views.'.overview', ['incidents'=>$incidents]);
    }

    /**
     * Handle the addition of a new alert
     * @param  Create $request [description]
     * @return \Illuminate\Http\Response
     */
    public function postAlert(Create $request)
    {
    	return view();
    }

    private function retrieveIncidents($latitude, $longitude, $km)
    {
    	$incidents = Incidents::all();
    	$targeted_incidents = array();
    	if(count($incidents))
    	{
	    	foreach ($incidents as $incident) 
	    	{
	    		$distance = $this->convertGPSToDist($latitude, $longitude, $incident->latitude, $incident->longitude);
	    		if($distance <= $km)
	    		{
	    			$targeted_incidents[] = $incident;
	    		}
	    	}
	    	
    	}
    	return $targeted_incidents;
    }

}
