<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Student\StudentController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('/register', [AuthController::class, 'register']);
        Route::post('/login', [AuthController::class, 'login']);
    });

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/students', [StudentController::class, 'index']);
        Route::get('/students/{id}', [StudentController::class, 'show']);
        Route::post('/students/{id}', [StudentController::class, 'update']);
    });
});


// Next enchancement
Route::prefix('v2')->group(function () {
    // path api
});
