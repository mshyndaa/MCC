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

use App\Http\Controllers\MapsController;

Route::get('/', [MapsController::class, 'index']);
Route::get('/index/{id}', [MapsController::class, 'indexbycompany']);
Route::get('/maps', [MapsController::class, 'maps']);
Route::get('/right', [MapsController::class, 'right']);
Route::get('/master', [MapsController::class, 'master']);
Route::get('/master/{id}', [MapsController::class, 'mastercompany']);
Route::get('/floor/{id}', [MapsController::class, 'floor']);
Route::get('/changefloor/{id}', [MapsController::class, 'changefloor']);
Route::post('/save', [MapsController::class, 'save']);
Route::get('/deletedata/{id}', [MapsController::class, 'delete']);
Route::get('/hibobdata/{name}', [MapsController::class, 'hibobdata']);
Route::get('/wifidatadetail/{nama}', [MapsController::class, 'wifidatadetail']);
Route::get('/cctvchange/{id}', [MapsController::class, 'cctvclick']);
Route::get('/pcclick/{id}', [MapsController::class, 'pcclick']);
Route::get('/cctv/{id}', [MapsController::class, 'cctv']);
Route::get('/heatmap', [MapsController::class, 'HeatMap']);
Route::get('/heatdata/{id}', [MapsController::class, 'HeatData']);