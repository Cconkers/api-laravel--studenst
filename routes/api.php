<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudiantesController;
use App\Http\Controllers\AuthController;

Route::post('/login', [AuthController::class,'login']);

Route::post('/register', [AuthController::class,'register']);

Route::middleware(['auth:sanctum'])->group( function () {
    
    Route::get('/logout', [AuthController::class,'logout']);

    Route::get('/estudiantes', [EstudiantesController::class, 'index']);
    
    Route::get('/estudiantes/{id}', [EstudiantesController::class, 'show']);
    
    Route::post('/estudiantes', [EstudiantesController::class, 'store']);
    
    Route::put('/estudiantes/{id}', [EstudiantesController::class, 'update']);
    
    Route::delete('/estudiantes/{id}', [EstudiantesController::class, 'destroy']);

});
