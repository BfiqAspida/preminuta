<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/login', function () {
    return view('signin');
})->name('login');
Route::get('/', function () {
    return view('signin');
});
Route::get('/dashboard', ['App\Http\Controllers\DashboardController', 'index'])->name('dashboard');
Route::resource('projects', 'App\Http\Controllers\ProjectController');
Route::get('workstations/{id}/', ['App\Http\Controllers\WorkstationController', 'indexbyproject']);
Route::get('workstations/{id}/routes/{workstation}/{inicial?}/{final?}', ['App\Http\Controllers\RouteController', 'routebyworkstation']);
Route::get('workstations/{id}/routes1/{workstation}/record/{route}', ['App\Http\Controllers\RouteController', 'recordsbyroute']);
Route::post('/login1', ['App\Http\Controllers\LoginController', 'login'])->name('login1');
Route::resource('vehicles', 'App\Http\Controllers\VehicleController');
Route::get('workstations/{id}/vehicle/{workstation}/{inicial?}/{final?}', ['App\Http\Controllers\VehicleController', 'index']);

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
