<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Crea un token y lo comparte en cada dialogo con la api (control de seguridad)

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/lectores', [App\Http\Controllers\lectorController::class, 'index']);

Route::get('/lector/{id}', [App\Http\Controllers\lectorController::class, 'show']);

Route::patch('/lector/{id}', [App\Http\Controllers\lectorController::class, 'update']);

Route::post('/lector/nuevo', [App\Http\Controllers\lectorController::class, 'store']);

Route::delete('/lector/{id}', [App\Http\Controllers\lectorController::class, 'destroy']);
