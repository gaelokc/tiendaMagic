<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->middleware('auth.basic');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function() {
	Log::channel('abuse')->info('API endpoint abuse',[
		'user_id' =>1
	]);
});
