<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GruposController;
use App\Http\Controllers\MateriasController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [GruposController::class, 'index']);

/*
**			Rutas para materias
*/
Route::get('/materias', [MateriasController::class, 'index']);