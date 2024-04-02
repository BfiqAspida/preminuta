<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workstation;
use App\Models\Project;
use App\Models\Route;
use App\Models\RouteRecord;
use App\Models\RouteMarkPoint;
use App\Models\RouteMarkPointRecord;
use DB;
use Auth;
use DateTime;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Traits\CacheForget;

class RouteController extends Controller
{
    
    public function routebyworkstation (Request $request, $id, $workstation, $inicial, $final){
        //dd($inicial, $final);
        if($request->session()->has('user')){
            $routes = RouteRecord::with('routes')
                        ->whereBetween('start_time', [$inicial, $final." 23:59:59"])
                        ->whereRelation('routes', 'workstation_code_id', $workstation)
                        ->orderByDesc('route_id_id')->get();
            
            $prev_route = "";
            $totalmarkpoints = 0;
            for($i=0;$i<count($routes);$i++){
                if($prev_route!=$routes[$i]["route_id_id"]){
                    $markpoints = RouteMarkPoint::where('route_id_id',$routes[$i]["route_id_id"])->get();
                    $totalmarkpoints = count($markpoints);
                }
                $markpointrecords = RouteMarkPointRecord::where('route_record_id_id',$routes[$i]["route_record_id"])->get();
                //count($markpointrecords);
                $fdate = $routes[$i]["start_time"];
                $tdate = $routes[$i]["end_time"];
                if(is_null($tdate)){
                    $hours = "";
                    $datetime1 = new DateTime($fdate);
                    $routes[$i]["start_time"]=date_format($datetime1, 'Y-m-d H:i');
                }
                else{
                    $datetime1 = new DateTime($fdate);
                    $routes[$i]["start_time"]=date_format($datetime1, 'Y-m-d H:i');
                    $datetime2 = new DateTime($tdate);
                    $routes[$i]["end_time"]=date_format($datetime2, 'Y-m-d H:i');
                    $interval = $datetime1->diff($datetime2);
                    $hours = number_format(24*$interval->format('%d')+$interval->format('%h')+$interval->format('%i')/60,2);
                }
                $routes[$i]["time"]=$hours;
                $routes[$i]["markpoints"]=$totalmarkpoints;
                $routes[$i]["markpointrecords"]=count($markpointrecords);
                $routes[$i]["percentage"]=number_format(100*count($markpointrecords)/$totalmarkpoints,0);
            }
            $name = $request->session()->get('user')["name"];
            return view('misc.routes',compact('routes', 'id', 'workstation', 'inicial', 'final','name'));
        }
        else
            return redirect('/login');
    }
    
    public function recordsbyroute(Request $request, $id, $workstation, $route){
        if($request->session()->has('user')){
            $routes = RouteMarkPointRecord::with('points')->where('route_record_id_id',$route)->get();
            $name = $request->session()->get('user')["name"];
            return view('misc.routerecords',compact('routes','name'));
        }
        else
            return redirect('/login');

    }
}
