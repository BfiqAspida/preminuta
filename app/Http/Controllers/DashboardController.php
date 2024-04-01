<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index (Request $request){
        //dd($request->session()->get('user'));
        if($request->session()->has('user')){
            $name = $request->session()->get('user')["name"];
            return view('misc.dashboard',compact('name'));
        }
        else
            return redirect('/login');

    }
}
