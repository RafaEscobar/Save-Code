<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\ProyectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('/proyects', ProyectController::class)->only(['index']);
Route::resource('/codes', CodeController::class)->only(['index']);
Route::controller(AuthController::class)->group(function() {
    Route::post('register', 'register')->name('auth.register');
});