<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use DB;
use Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Traits\CacheForget;

class ProjectController extends Controller
{
    public function index(Request $request)
    {   
        
        if($request->session()->has('user')){
            $projectid = $request->session()->get('user')['project_id'];
            $projects = Project::where('project_id', $projectid)->get();
            $name = $request->session()->get('user')["name"];
            return view('misc.projects',[
                'projects' => $projects,
                'title' => 'Categorías',
                'link' => 'category/create',
                'nombreCrear' => 'Nueva Categoría',
                'name' => $name
            ]);
        }
        else
            return redirect('/login');
    }
}
