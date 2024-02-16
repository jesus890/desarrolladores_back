<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DesarrolladoresController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('desarrolladores')->group(function(){
    Route::get('/listado', [DesarrolladoresController::class, 'listadoDesarrolladores']);
    Route::post('/crear', [DesarrolladoresController::class, 'crearDesarrollador']);
    Route::post('/actualizar/{id}', [DesarrolladoresController::class, 'actualizarDesarrollador']);
    Route::delete('/eliminar/{id}', [DesarrolladoresController::class, 'eliminarDesarrollador']);
});