<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
     protected $fillable = [
    	'organizer', 'street_number', 'street_name', 'city', 'date', 'description', 'title', 'event_category','end_at', 'created_at'
    ];
}
