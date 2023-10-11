<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\Api\UserController;
Use App\Http\Controllers\Api\LaporanController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'App\Http\Controllers\Api'], function() {
    Route::get('status', function() {
        return response()->json(['message' => 'Server is active']);
    });
    Route::post('users', [UserController::class, 'store']);
    Route::post('login', [UserController::class, 'login']);
    

    Route::group(['middleware' => ['auth:sanctum']], function() {
        Route::apiResource('users', UserController::class)->except('index','store','update');
        Route::put('users', [UserController::class, 'update']);
        Route::get('logout', [UserController::class, 'logout']);
        Route::apiResource('laporan', LaporanController::class)->except('index', 'show', 'update');
        Route::apiResource('kontakpenting', KontakController::class)->except('index', 'show');
        // Route::apiResource('laporan', LaporanController::class)->only('update')->middleware('admin');
        Route::put('laporan/{id}', [LaporanController::class, 'respond'])->middleware('admin');
    });
    
    Route::apiResource('laporan', LaporanController::class)->only('index', 'show');
    Route::get('user/laporan', [LaporanController::class, 'index_user']);
    Route::apiResource('kontakpenting', KontakController::class)->only('index', 'show');
});


