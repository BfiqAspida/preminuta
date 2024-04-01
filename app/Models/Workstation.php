<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workstation extends Model
{
    use HasFactory;
    protected $table = 'users_workstation';
    public function project()
    {
    	return $this->belongsTo('App\Models\Project');
    }
    public function modules()
    {
        return $this->hasMany('App\Models\ModulesByLicense', 'workstation_id_id', 'workstation_id');
    }
}