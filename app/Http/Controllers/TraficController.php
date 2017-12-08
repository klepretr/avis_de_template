<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incidents;
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
        $this->middleware('auth');
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
            $incident->created_at = $incident->created_at->format('Le d/m/Y');
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
        foreach($incidents as $incident)
        {   
            $url = "http://maps.googleapis.com/maps/api/geocode/json?latlng=".$incident->latitude.",".$incident->longitude."&sensor=true";
            $data = @file_get_contents($url);
            $jsondata = json_decode($data,true);
            if(is_array($jsondata) && $jsondata['status'] == "OK")
            {
                  $incident->city = $jsondata['results']['0']['address_components']['2']['long_name'];
                  $incident->street = $jsondata['results']['0']['address_components']['1']['long_name'];
            }
        }
    	return view($this->prefix_views.'.overview', ['incidents'=>$incidents]);
    }

    public function addAlert()
    {
        return view($this->prefix_views.'.addAlert');
    }
    /**
     * Handle the addition of a new alert
     * @param  Create $request [description]
     * @return \Illuminate\Http\Response
     */
    public function postAlert(Request $request)
    {
        $date = Carbon::now();
        Incidents::create(['incident_category'=>$request->category, 'valid'=>1, 'over'=>0, 'latitude'=>$request->lat, 'longitude'=>$request->lon]);
    	return redirect(route('home_landing'));
    }

    private function retrieveIncidents($latitude, $longitude, $km)
    {
        $date = Carbon::now();
    	$incidents = Incidents::All();
        $targeted_incidents = $this->retrieveDist($incidents, $latitude, $longitude, $km);
    	return $targeted_incidents;
    }

    private function retrieveDist($incidents, $latitude, $longitude, $km)
    {
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
