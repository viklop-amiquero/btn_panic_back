<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\business\CategoriaController;
use App\Http\Controllers\business\ReporteController;
use App\Http\Controllers\password\PasswordController;
use App\Http\Controllers\roles\MenuController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/cliente', function (Request $request) {
        return $request->user()->persona;
    });
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::apiResource('/reporte', ReporteController::class);

    Route::apiResource('/categoria', CategoriaController::class);

    Route::apiResource('/menu', MenuController::class);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/password-recover', [PasswordController::class, 'recoverPassword']);
