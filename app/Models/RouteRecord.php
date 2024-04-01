<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RouteRecord extends Model
{
    use HasFactory;
    protected $table = 'routes_route_record';
    public $keyType = 'string';
    public function routes()
    {
    	return $this->belongsTo('App\Models\Route', 'route_id_id', 'id');
    }
}
