<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Vehicle;

class DashboardController extends Controller
{
    public function index (Request $request){
        if($request->session()->has('user')){
            $name = $request->session()->get('user')["name"];
            $project = $request->session()->get('user')["project_id"];
            $vehicles = Vehicle::select(DB::raw('DATE(created_at) as date'), DB::raw('count(id) as vehiculos'))
                ->whereIn('Vehicles_vehicles_book.WorkStation_id_id', ['d842ea84-a431-11ee-a506-0242ac120002', '0977e274-a425-11ee-a506-0242ac120002'])
                ->where('Vehicles_vehicles_book.created_at', '>', '2024-04-01')
                ->groupBy('date')
                ->orderBy('date')
                ->get()
                ;
            return view('misc.dashboard',compact('name', 'project', 'vehicles'));
        }
        else
            return redirect('/login');

    }
}
