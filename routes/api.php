<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudiantesController;

Route::get('/estudiantes', [EstudiantesController::class, 'index']);

Route::get('/estudiantes/{id}', [EstudiantesController::class, 'show']);

Route::post('/estudiantes', [EstudiantesController::class, 'store']);

Route::put('/estudiantes/{id}', [EstudiantesController::class, 'update']);

Route::delete('/estudiantes/{id}', [EstudiantesController::class, 'destroy']);


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
