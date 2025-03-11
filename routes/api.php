<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\business\CategoriaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/cliente', function (Request $request) {
        return $request->user();
    });
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::apiResource('/categoria', CategoriaController::class); // Expresión regular para números


    // Route::apiResource('/categoria', CategoriaController::class);
    // Route::get('/categoria', [CategoriaController::class, 'index']);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
