<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\cartasController;
use App\Http\Controllers\coleccionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ventasController;
use App\Http\Controllers\comprasController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('usuarios', 'UserController@store');
Route::post('login', 'UserController@login');

Route::group (['middleware' => 'auth:api'], function() {
	Route::post('logout', 'UserController@logout');
});

Route::prefix('cartas')->group(function () {
	Route::post('/crear',[NinjaController::class,"crearCarta"]);
	Route::post('/editar/{id}',[NinjaController::class,"editarCarta"]);
	Route::post('/baja/{id}',[NinjaController::class,"bajaCarta"]);
	Route::get('/consultar/{id}',[NinjaController::class,"verCarta"]);
	Route::get('/filtrar/{parametro}/{valor}',[NinjaController::class,"listarCartasFiltro"]);

});
Route::prefix('coleccion')->group(function () {
	Route::post('/crear',[MisionesController::class,"crearColeccion"]);
	Route::post('/editar/{id}',[NinjaController::class,"editarColeccion"]);
	Route::post('/baja/{id}',[NinjaController::class,"bajaColeccion"]);
	Route::get('/consultar/{id}',[NinjaController::class,"verColeccion"]);
	Route::get('/filtrar/{parametro}/{valor}',[NinjaController::class,"listarColeccionesFiltro"]);

});

Route::prefix('ventas')->group(function () {
		Route::post('/crear',[ClienteController::class,"crearVenta"]);

	});

	Route::prefix('comprar')->group(function () {
	Route::get('/filtrar/{parametro}/{valor}',[NinjaController::class,"listarCompraFiltro"]);
		});