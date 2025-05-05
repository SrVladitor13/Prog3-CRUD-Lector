<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/nueva', function () {
    return view('F1.nueva_vista');
});
Route::get('/vista2', function () {
    return view('vista2');
});
Route::get('/multiplicacion/{numero}', function ($numero) {
    return view('F1.multiplicacion', ['numero'=>$numero]);
});

//Route::get('/vista2_C/{nombre}', "app\Http\Controllers\lectorController@index");
Route::get('/vista2_C/{nombre}', [App\http\Controllers\lectorController::class, 'index']);
