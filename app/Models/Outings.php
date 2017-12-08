<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Outings extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
    	'organizer', 'street_number', 'street_name', 'city', 'date', 'description', 'title'

    ];
}
