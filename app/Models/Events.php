<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'organizer', 'description', 'event_category', 'street_number', 'street_name', 'city', 'end_at'
    ];
}
