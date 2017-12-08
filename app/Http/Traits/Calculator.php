<?php
namespace App\Http\Traits;

trait Calculator
{

	public function convertGPSToDist($city_latitude, $city_longitude, $point_latitude, $point_longitude)
	{
		$earth_radius = config('mathematics.earth_radius');
		$city_longitude = $this->convertGPSToRadian($city_longitude);
		$city_latitude = $this->convertGPSToRadian($city_latitude);
		$point_longitude = $this->convertGPSToRadian($point_longitude);
		$point_latitude = $this->convertGPSToRadian($point_latitude);
		$double_sin = sin($point_latitude)*sin($city_latitude);
		$triple_cos = cos($point_longitude-$city_longitude)*cos($point_latitude)*cos($city_latitude);
		$dist = $earth_radius*acos($double_sin+$triple_cos);
		dd($dist);
		exit;

	}

	public function convertGPSToRadian($gps)
	{
		return (pi()*$gps)/180;
	}
}