<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GruposController;
use App\Http\Controllers\MateriasController;
use App\Http\Controllers\ProfesoresController;
use App\Http\Controllers\AulasController;

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

Route::get('/', [GruposController::class, 'home']);

/*
**			Rutas para materias
*/
Route::get('/materias', [MateriasController::class, 'index']);
Route::post('/materias/crear', [MateriasController::class, 'store']);
Route::get('/materias/{id}/cambiar-estado', [MateriasController::class, 'changeStatus']);
Route::put('/materias/{id}/editar', [MateriasController::class, 'update']);
Route::delete('/materias/{id}/eliminar', [MateriasController::class, 'destroy']);
/*
**			Rutas para profesores
*/
Route::get('/profesores', [ProfesoresController::class, 'index']);
Route::post('/profesores/crear', [ProfesoresController::class, 'store']);
Route::get('/profesores/{id}/cambiar-estado', [ProfesoresController::class, 'changeStatus']);
Route::put('/profesores/{id}/editar', [ProfesoresController::class, 'update']);
Route::delete('/profesores/{id}/eliminar', [ProfesoresController::class, 'destroy']);
/*
**			Rutas para aulas
*/
Route::get('/aulas', [AulasController::class, 'index']);
Route::post('/aulas/crear', [AulasController::class, 'store']);
Route::get('/aulas/{id}/cambiar-estado', [AulasController::class, 'changeStatus']);
Route::put('/aulas/{id}/editar', [AulasController::class, 'update']);
Route::delete('/aulas/{id}/eliminar', [AulasController::class, 'destroy']);
/*
**			Rutas para grupos
*/
Route::get('/grupos', [GruposController::class, 'index']);
Route::post('/grupos/crear', [GruposController::class, 'store']);
Route::get('/grupos/{id}/cambiar-estado', [GruposController::class, 'changeStatus']);
Route::put('/grupos/{id}/editar', [GruposController::class, 'update']);
Route::delete('/grupos/{id}/eliminar', [GruposController::class, 'destroy']);