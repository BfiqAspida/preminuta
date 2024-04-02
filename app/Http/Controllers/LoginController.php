<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Display login page.
     * 
     * @return Renderable
     */
    
    public function show()
    {
        return view('auth.login');
    }
    

    /**
     * Handle account login request
     * 
     * @param LoginRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();
        $password = Hash::make($credentials["password"]);
        //dd($password);
        //dd($credentials);
        if(!Auth::validate($credentials)):
            return redirect()->to('login')->withErrors(trans('auth.failed'));
        endif;
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        //dd(Auth::login($user), "***");
        if(Auth::attempt(['username' => $request['username'], 'password' => $request['password']])){
            //dd(Auth::check());
            Session::put('user', Auth::user());
            //return 'You have successfully logged in, ' . Auth::user()->name . '! <a href="/dashboard">Go back to Index</a>';
            return redirect('/dashboard');
            //Auth::login($user);
            //Redirect::to('dashboard');
        }
        else
            dd("no");
        
    }

    /**
     * Handle response after user authenticated
     * 
     * @param Request $request
     * @param Auth $user
     * 
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $user) 
    {
        return redirect()->intended("dashboard");
    }
}