<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Incidents extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'incident_category', 'latitude', 'longitude', 'valid', 'over',
    ];

    /**
     * many-to-one relationship method
     *
     * @return QueryBuilder
     */
    public function category()
    {
        return $this->belongsTo('App\Models\IncidentCategories', 'incident_category');
    }
}
