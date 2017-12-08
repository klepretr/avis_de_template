<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incidents;
use App\Http\Requests\Trafic\Create;
use App\Http\Requests\Trafic\Choose;
use App\Http\Traits\Calculator;

class TraficController extends Controller
{
	use Calculator;

	private $prefix_views = 'trafic';
	/**
	 * [__construct description]
	 */
    public function __construct()
    {

    }

    /**
     * Display the index of trafic contents
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	return view($prefix_views.'.index');
    }

    /**
     * Display the form in which we can choose the city
     * @return [type] [description]
     */
  	public function chooseCity()
  	{
  		return view($prefix_views.'city');
  	}

    /**
     * Display the page where we choose the type of the alert
     * @return \Illuminate\Http\Response
     */
    public function addAlert()
    {
    	$latitude = 47.081012;
    	$longitude = 2.398782;
    	$incidents = $this->retrieveIncidents($latitude, $longitude, 30);
    	dd($incidents);
    	exit;
    	//$incidents = $this->retrieveIncidents($request->latitude, $request->longitude);
    	return view($prefix_views.'.add', ['incidents'=>$incidents]);
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
