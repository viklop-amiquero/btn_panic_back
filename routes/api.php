<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\auth\roleMenuAuthController;
use App\Http\Controllers\business\CategoriaController;
use App\Http\Controllers\business\ReporteController;
use App\Http\Controllers\password\PasswordController;
use App\Http\Controllers\roles\MenuController;
use App\Http\Controllers\roles\PermisoController;
use App\Http\Controllers\roles\RoleController;
use App\Http\Controllers\roles\RoleMenuController;
use App\Http\Controllers\security\UserController;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Route;
// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
Route::middleware(['auth:sanctum'])->group(function () {

    // Route::get('/role-menu-auth', function (Request $request) {
    //     return $request->user()->persona;
    // });
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::apiResource('/reporte', ReporteController::class);

    Route::apiResource('/categoria', CategoriaController::class);

    Route::apiResource('/menu', MenuController::class);

    // Route::apiResource('/rol', RoleController::class);
    Route::apiResource('/rol', RoleMenuController::class);

    Route::apiResource('/roles', RoleController::class);

    Route::apiResource('/permiso', PermisoController::class);

    Route::apiResource('/user', UserController::class);

    Route::post('/password-reset/{user}', [PasswordController::class, 'resetPassword']);

    Route::get('/role-menu-auth', [roleMenuAuthController::class, 'show']);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/password-recover', [PasswordController::class, 'recoverPassword']);

Broadcast::routes(['middleware' => 'auth:sanctum']);
