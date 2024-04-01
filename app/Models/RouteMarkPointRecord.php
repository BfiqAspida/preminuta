<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RouteMarkPointRecord extends Model
{
    use HasFactory;
    protected $table = 'routes_mark_point_record';
    public function points()
    {
    	return $this->belongsTo('App\Models\RouteMarkPoint', 'physical_point_id_id', 'mark_point_id');
    }
}
