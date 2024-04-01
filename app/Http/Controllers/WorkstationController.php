<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workstation;
use App\Models\Project;
use DB;
use Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Traits\CacheForget;

class WorkstationController extends Controller
{
    
    public function indexbyproject (Request $request, $id){
        if($request->session()->has('user')){
            $workstations = Workstation::with('modules')->where("project_id_id", $id)->get();
            $name = $request->session()->get('user')["name"];
            return view('misc.workstations',compact('workstations', 'name'));
        }
        else
            return redirect('/login');
    }
}
