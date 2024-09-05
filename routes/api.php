<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ReservationsController;





Route::get('/reservations', [ReservationsController::class, 'index']);
Route::post('/reservations', [ReservationsController::class,'store']);
Route::get('/reservations/{id}', [ReservationsController::class, 'show']);
Route::put('/reservations/{id}', [ReservationsController::class, 'update']);
Route::delete('/reservations/{id}', [ReservationsController::class, 'destroy']);
