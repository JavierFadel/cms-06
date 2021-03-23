<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\StudioController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ScheduleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServicePr ovider within a group which
| contains the "web" middleware group. Now create something great!
|
*/	

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
	// Route for dashboard.	
	Route::get('/dashboard', function(){
		return view('dashboard');
	})->name('dashboard');

	// General routes.
	Route::resource('/schedule', ScheduleController::class);

	// Admin-only routes.
	Route::middleware('can:isAdmin')->group(function(){
		Route::resource('/branch', BranchController::class);
		Route::resource('/studio', StudioController::class);
		Route::resource('/movie', MovieController::class);
	});
});