<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use DB;
use Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Traits\CacheForget;

class VehicleController extends Controller
{
    public function index(Request $request, $id, $workstation, $inicial, $final)
    {   
        
        if($request->session()->has('user')){
            //$inicial = '2024-03-01';
            //$final = '2024-04-01';
            //$id=1;
            //$workstation=1;
            $name = $request->session()->get('user')["name"];
            $vehicles = Vehicle::whereIn('Vehicles_vehicles_book.WorkStation_id_id', ['d842ea84-a431-11ee-a506-0242ac120002', '0977e274-a425-11ee-a506-0242ac120002', '5c0b11c6-8d6b-11ee-b9d1-0242ac120002'])
            ->whereBetween('created_at', [$inicial, $final." 23:59:59"])->get();
            return view('misc.vehicles',compact('vehicles', 'id', 'workstation', 'inicial', 'final','name'));
        }
        else
            return redirect('/login');
    }
}
